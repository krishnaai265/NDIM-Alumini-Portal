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

?>
<!------------------------------------>
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "ndim2";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// define variables and set to empty values
$nameErr = $emailErr  = "";
$name = $comment = "";

function redirect($url){
    header('Location: ' . $url);
	exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
function test_input($data) {
  if (empty($_POST["name"])) {
      $message = "name is empty";
      redirect(NDIM.php);
  } else {
      $name = $_POST["name"];    
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $message = "Only letters and white space allowed";
		  redirect(NDIM.php);
       }
  }
  if (empty($_POST["comment"])) {
    $message = "comment is empty";
	redirect(NDIM.php);
  } 
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
	$re = $conn->query("select * FROM post");
	$row = $re->num_rows;

	date_default_timezone_set("Asia/Calcutta");

$id= $row + 1;
$name = test_input($_POST["name"]);
$comment = test_input($_POST["comment"]);
$date = date("d-m-Y H:i:s");
$sql = "INSERT INTO post VALUES('$id','$name','$comment', '$date')";

mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <style>
  body{
	font-family: Arial, Helvetica, sans-serif;
  }
  div div div div:hover {
    background-color: white; /*#EDEBEB*/
	border-radius: 6px;
  }
  div div div div{                /*block*/
      border-radius: 6px;
	  background-color:white; /*#F8F8F8 style="background-color:#F8F8F8;"	*/  
	/*  margin-left:10% !important;  */
  }
  div div div div div {           /*date*/
	  float:right;
	  margin-left:10px;
  }
    div div h1 {
	  font-size:2.3rem;
	  text-align:center;
  }
  div div h1 img {
	  margin-top:10px !important;
  }
  </style>
  <style>
  @media only screen and (max-width: 320px) {
  div div div div div {           /*date*/
	  float: none;
	  clear:both;
	  margin-left:10px !important;
	  font-size: .7rem;
  }
  div div div div br {
	  display:none;
  }
  div div div div h4 {
	  font-size:1.2rem;
  }
    div div div div p {
	  font-size:.8rem;
  }
  div div h1 {
	  font-size:1.8rem;
	  right: 20px;
  }
  div div h1 img {
	  margin-top:8px !important;
  }
    div div div div{               /*block*/ 
      border-radius: 4px;
	  margin-left:10% !important;
	  background-color:white; /*#F8F8F8 style="background-color:#F8F8F8;"	*/  
  }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>

  
<body class="border-primary" style="background-color:transparent">

  <div class="py-2" style="color:#2A8BE2">
    <div class="container">
	  <h1 class="col-md-10 text-center m-3 font-weight-bold" > Timeline<img style="float:right;" src="search.png" height="22" width="22" data-toggle="modal" data-target="#myModal" data-backdrop="false"></h1>
	  
        
    </div>
  </div>
  
  
  
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Search here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div class="row" style="mb-1">
		<?php

	/* Display and echo mobile specific stuff here */
	$sql = "SELECT name, comment, status FROM post ORDER BY id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row	
    while($row = $result->fetch_assoc()) {
		if($row['status']=='Inactive'){
        echo '<div class="col-md-9 mb-2 border" style="margin-left:10%;">'
          .'<h4 class="text-left m-1" style="color:#2A8BE2;float:left;" >'.$row['name'].'&nbsp;</h4>'  
           .'<div>'		  .$status = 'Active'.
		   .$comment = row["comment"].
                 .'<button type="button" onclick="'.$sql = "UPDATE post SET status=$status WHERE $comment ";mysqli_query($conn, $sql);.'" class="btn btn-primary btn-sm">Active</button>'
				 .'<button type="button" onclick="$sql = "DELETE FROM post WHERE $row['."comment".']";mysqli_query($conn, $sql); " class="btn btn-primary btn-sm">Delete</button>'
			.'</div>'	
            .'<br/>'		
            .'<br/>'			
          .'<p class="m-1 ml-2" style="color:black;float:left;">'.$row['comment'].'</p>'
        .'</div>';
		}
    }
} 
?>        

      </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Model over -->
  

  <script src="jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>