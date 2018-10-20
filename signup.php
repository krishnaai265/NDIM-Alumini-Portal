<?php
$database = './usersdb.php';
$success_page = './login.php';
$error_message = "";
if (!file_exists($database))
{
   die('User database not found!');
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'signupform')
{
   $newusername = $_POST['username'];
   $newemail = $_POST['email'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   $extra1 = $_POST['extra1'];
   $extra2 = $_POST['extra2'];
   $extra3 = $_POST['extra3'];
   $code = 'NA';
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
   if (!preg_match("/^[A-Za-z0-9_!@$]{1,50}$/", $newpassword))
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
   if (strlen($extra2) == 0)
   {
      $error_message = 'Field cannot be empty (Roll Number)';
   }
   $avatar_folder = 'avatars';
   $avatar_max_width = 600;
   $avatar_max_height = 600;
   $newavatar = '';
   if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != "")
   {
      if (!file_exists($avatar_folder))
      {
         if (!mkdir($avatar_folder, 0777)) 
         { 
            die("Failed to create images directory.");
         }
      }
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
   foreach($items as $line)
   {
      list($username, $password, $email, $fullname) = explode('|', trim($line));
      if ($newusername == $username)
      {
         $error_message = 'Username already used. Please select another username.';
         break;
      }
   }
   if (empty($error_message))
   {
      $file = fopen($database, 'a');
      fwrite($file, $newusername);
      fwrite($file, '|');
      fwrite($file, md5($newpassword));
      fwrite($file, '|');
      fwrite($file, $newemail);
      fwrite($file, '|');
      fwrite($file, $newfullname);
      fwrite($file, '|0|');
      fwrite($file, $code);
      fwrite($file, '|');
      fwrite($file, $extra1);
      fwrite($file, '|');
      fwrite($file, $extra2);
      fwrite($file, '|');
      fwrite($file, $extra3);
      fwrite($file, "\r\n");
      fclose($file);
      $subject = 'Your new account';
      $message = 'A new account has been setup.';
      $message .= "\r\nUsername: ";
      $message .= $newusername;
      $message .= "\r\nPassword: ";
      $message .= $newpassword;
      $message .= "\r\n";
      $header  = "From: kamal.kundra@ndimdelhi.org"."\r\n";
      $header .= "Reply-To: kamal.kundra@ndimdelhi.org"."\r\n";
      $header .= "MIME-Version: 1.0"."\r\n";
      $header .= "Content-Type: text/plain; charset=utf-8"."\r\n";
      $header .= "Content-Transfer-Encoding: 8bit"."\r\n";
      $header .= "X-Mailer: PHP v".phpversion();
      mail($newemail, $subject, $message, $header);
      mail('kamal.kundra@ndimdelhi.org', $subject, $message, $header);
      header('Location: '.$success_page);
      exit;
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="ndimlogin.css" rel="stylesheet">
<link href="signup.css" rel="stylesheet">
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
<body>
<div id="container">
<div id="wb_Image2">
<img src="images/logo.png" id="Image2" alt=""></div>
<div id="wb_Signup1">
<form name="signupform" method="post" accept-charset="UTF-8" enctype="multipart/form-data" action="<?php echo basename(__FILE__); ?>" id="signupform">
<input type="hidden" name="form_name" value="signupform">
<table id="Signup1">
<tr>
   <td class="header">Sign up for a new account</td>
</tr>
<tr>
   <td class="label"><label for="fullname">Full Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="fullname" type="text" id="fullname"></td>
</tr>
<tr>
   <td class="label"><label for="username">User Name</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="username" type="text" id="username"></td>
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
   <td class="row"><input class="input" name="email" type="text" id="email"></td>
</tr>
<tr>
   <td class="label"><label for="email">Profile Photo</label></td>
</tr>
<tr>
   <td class="row"><div class="input-group" id="avatar"><input class="input" type="text" readonly=""><label class="input-group-btn"><input type="file" name="avatar" style="display:none;"><span class="button">Browse...</span></label></div></td>
</tr>
<tr>
   <td class="label"><label for="extra1">Phone Number</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="extra1" type="text" id="extra1"></td>
</tr>
<tr>
   <td class="label"><label for="extra2">Roll Number</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="extra2" type="text" id="extra2"></td>
</tr>
<tr>
   <td class="label"><label for="extra3">Company</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="extra3" type="text" id="extra3"></td>
</tr>
<tr>
   <td><?php echo $error_message; ?></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="signup" value="Signup" id="signup"></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>