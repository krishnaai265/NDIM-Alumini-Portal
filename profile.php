<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   $accessdenied_page = './index.php';
   header('Location: '.$accessdenied_page);
   exit;
}
$database = './usersdb.php';
if (filesize($database) == 0)
{
   die('User database not found!');
}
$error_message = '';
$db_username = '';
$db_fullname = '';
$db_email = '';
$db_avatar = '';
$db_extra1 = '';
$db_extra2 = '';
$db_extra3 = '';
$avatar_folder = 'avatars';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'editprofileform')
{
   $success_page = './NDIMlogo.html';
   $oldusername = $_SESSION['username'];
   $newusername = $_POST['username'];
   $newemail = $_POST['email'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   $extra1 = $_POST['extra1'];
   $extra2 = $_POST['extra2'];
   $extra3 = $_POST['extra3'];
   if ($newpassword != $confirmpassword)
   {
      $error_message = 'Password and Confirm Password are not the same!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$]{1,50}$/", $newusername))
   {
      $error_message = 'Username is not valid, please check and try again!';
   }
   else
   if (!empty($newpassword) && !preg_match("/^[A-Za-z0-9_!@$]{1,50}$/", $newpassword))
   {
      $error_message = 'Password is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9_!@$.' &]{1,50}$/", $newfullname))
   {
      $error_message = 'Fullname is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^.+@.+\..+$/", $newemail))
   {
      $error_message = 'Email is not a valid email address. Please check and try again.';
   }
   else
   {
      $avatar_max_width = 600;
      $avatar_max_height = 256;
      $newavatar = '';
      if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != "")
      {
         switch ($_FILES['avatar']['error'])
         {
            case UPLOAD_ERR_OK:
               if ($_FILES['avatar']['type'] == 'image/gif' || $_FILES['avatar']['type'] == 'image/jpeg' || $_FILES['avatar']['type'] == 'image/pjpeg' || $_FILES['avatar']['type'] == 'image/png' || $_FILES['avatar']['type'] == 'image/x-png')
               {
                  list($width, $height) = getimagesize($_FILES['avatar']['tmp_name']);
                  if ($width <= $avatar_max_width && $height <= $avatar_max_height)
                  {
                     $prefix = rand(111111, 999999);
                     $newavatar = $prefix . "_" . str_replace(" ", "_", $_FILES['avatar']['name']);
                     if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_folder . "/" . $newavatar))
                     {
                        $error_message = "Upload failed, please verify the folder's permissions.";
                     }
                  }
                  else
                  {
                     $error_message = "The image is too big.";
                  }
               }
               else
               {
                  $error_message = "Wrong file type, please only use jpg, gif or png images.";
               }
               break;
            case UPLOAD_ERR_INI_SIZE:
               $error_message = "The uploaded file exceeds the 'upload_max_filesize' directive.";
               break;
            case UPLOAD_ERR_FORM_SIZE:
               $error_message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
               break;
            case UPLOAD_ERR_PARTIAL:
               $error_message = "The uploaded file was only partially uploaded.";
               break;
            case UPLOAD_ERR_NO_FILE:
               $error_message = "No file was uploaded.";
               break;
            case UPLOAD_ERR_NO_TMP_DIR:
               $error_message = "Missing a temporary folder.";
               break;
            case UPLOAD_ERR_CANT_WRITE:
               $error_message = "Failed to write file to disk.";
               break;
            case UPLOAD_ERR_EXTENSION:
               $error_message = "File upload stopped by extension.";
               break;
         }
      }
      $items = file($database, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      if ($oldusername != $newusername)
      {
         foreach($items as $line)
         {
            list($username) = explode('|', trim($line));
            if ($newusername == $username)
            {
               $error_message = 'Username already used. Please select another username.';
                break;
            }
         }
      }
      if (empty($error_message))
      {
         $file = fopen($database, 'w');
         foreach($items as $line)
         {
            list($username, $password) = explode('|', trim($line));
            if ($oldusername == $username)
            {
               $line = $newusername;
               $line .= "|";
               if (empty($newpassword))
               {
                  $line .= $password;
               }
               else
               {
                  $line .= md5($newpassword);
               }
               $line .= "|";
               $line .= $newemail;
               $line .= "|";
               $line .= $newfullname;
               $line .= "|1|";
               $line .= "|";
               $line .= $extra1;
               $line .= "|";
               $line .= $extra2;
               $line .= "|";
               $line .= $extra3;
            }
            fwrite($file, $line);
            fwrite($file, "\r\n");
         }
         fclose($file);
         $_SESSION['username'] = $newusername;
         $_SESSION['fullname'] = $newfullname;
         header('Location: '.$success_page);
         exit;
      }
   }
}
$items = file($database, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach($items as $line)
{
   list($username, $password, $email, $name, $active, $code, $extra1, $extra2, $extra3) = explode('|', trim($line));
   if ($username == $_SESSION['username'])
   {
      $db_username = $username;
      $db_fullname = $name;
      $db_email = $email;
      $db_extra1 = $extra1;
      $db_extra2 = $extra2;
      $db_extra3 = $extra3;
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="ndimlogin.css" rel="stylesheet">
<link href="profile.css" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function()
{
   $("#avatar :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
});
</script>
</head>
<body style="background-color: #f8f8f8;">
<div id="container">
<div id="wb_Image2">
<img src="images/logo.png" id="Image2" alt=""></div>
<div id="wb_EditProfile1">
<form name="editprofileform" method="post" accept-charset="UTF-8" enctype="multipart/form-data" action="<?php echo basename(__FILE__); ?>" id="editprofileform">
<input type="hidden" name="form_name" value="editprofileform">
<table id="EditProfile1">
<tr>
   <td class="header">Edit Profile</td>
</tr>
<tr>
   <td class="label"><label for="fullname">Full Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="fullname" type="text" id="fullname" value="<?php echo $db_fullname; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="username">User Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $db_username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Password</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="password" type="password" id="password"></td>
</tr>
<tr>
   <td class="label"><label for="confirmpassword">Confirm Password</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="confirmpassword" type="password" id="confirmpassword"></td>
</tr>
<tr>
   <td class="label"><label for="email">E-mail</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="email" type="text" id="email" value="<?php echo $db_email; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="email">Profile Picture</label></td>
</tr>
<tr>
   <td class="row"><div class="input-group" id="avatar"><input class="input" type="text" readonly=""><label class="input-group-btn"><input type="file" name="avatar" style="display:none;"><span class="button">Browse...</span></label></div></td>
</tr>
<tr><td><div class="thumbnail"><div class="frame"><img alt="<?php echo $db_avatar; ?>" src="<?php echo $avatar_folder.'/'.$db_avatar; ?>"></div></div></td></tr>
<tr>
   <td class="label"><label for="extra1">Phone Number</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="extra1" type="text" id="extra1" value="<?php echo $db_extra1; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="extra2">Roll Number</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="extra2" type="text" id="extra2" value="<?php echo $db_extra2; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="extra3">Company</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="extra3" type="text" id="extra3" value="<?php echo $db_extra3; ?>"></td>
</tr>
<tr>
   <td><?php echo $error_message; ?></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="update" value="Update" id="update"></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>