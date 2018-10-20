<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./index.php');
   exit;
}
if (isset($_SESSION['expires_by']))
{
   $expires_by = intval($_SESSION['expires_by']);
   if (time() < $expires_by)
   {
      $_SESSION['expires_by'] = time() + intval($_SESSION['expires_timeout']);
   }
   else
   {
      unset($_SESSION['username']);
      unset($_SESSION['expires_by']);
      unset($_SESSION['expires_timeout']);
      header('Location: ./index.php');
      exit;
   }
}
$roles = array("Administrator", "Student", "Faculty");
if (!in_array($_SESSION['role'], $roles))
{
   header('Location: ./index.php');
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NDIM Alumni Web Application</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="ndimlogin.css" rel="stylesheet">
<link href="protected.css" rel="stylesheet">
</head>
<body>
<div id="container">

</div>
</body>
</html>