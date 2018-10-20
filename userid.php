<?php
if (session_id() == "")
{
   session_start();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NDIM Alumni Web Application</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="ndimlogin.css" rel="stylesheet">
<link href="userid.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_LoginName1">
<span id="LoginName1"><?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['fullname'];
}
else
{
   echo 'Not logged in';
}
?></span></div>
</div>
</body>
</html>