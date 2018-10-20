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
$database = "ndim";
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
	  
        <div class="row" style="mb-1">
		<?php

	/* Display and echo mobile specific stuff here */
	$sql = "SELECT name, comment, date FROM post ORDER BY id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row	
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-9 mb-2 border" style="margin-left:10%;">'
          .'<h4 class="text-left m-1" style="color:#2A8BE2;float:left;" >'.$row['name'].'&nbsp;</h4>'  
           .'<div>'		  
                 .$row['date']
			.'</div>'	
            .'<br/>'		
            .'<br/>'			
          .'<p class="m-1 ml-2" style="color:black;float:left;">'.$row['comment'].'</p>'
        .'</div>';
    }
} 
?>        
      </div>
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
          <style>
table {
	border: 1px solid #dddddd;
    border-collapse: collapse;
    width: 100%;
	overflow-x:auto;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #337AB7;
    color: white;
}
#myInput {
    padding: 6px;
    margin-top: 8px;
    margin-right: 16px;
	margin-bottom: 8px;
    font-size: 17px;
	border: 1px solid #e3e3e3;
	width: 100%;
	border-radius: 2px;
}
@media screen and (max-width: 600px) {
table {
      font-family: "Open Sans", sans-serif;
  line-height: 1.25;
  border: 0;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table tr {
  background-color: #f8f8f8 !important;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
	margin-left: 0px important;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: left;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
  .modal-body {
	  margin-left:1px !important;
  }
}
</style>

<?php
     
    $file = fopen("usersdb.php","r") or die("Error");
    ?>
    <input id="myInput" type="text" placeholder="Search.."> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>	
    <table>
	    <thead>
    	<tr>
    		<th>Username</th>
    		<th>Email</th>
    		<th>Name</th>
    		<th>Phone Number</th>
			<th>Roll Number</th>
			<th>Company</th>
    	</tr>
		</thead>
    	<tbody id="myTable">
    <?php
     
    while(($row = fgets($file)) != false) {
    	echo "<tr>";
    	$col = explode('|',$row);
    	$size = count($col);
		for ($i = 0; $i < $size; $i += 1) {
			if($i==1 or $i==4 or $i==5){ 
			    echo "";
			} else if($i==0){
				echo "<td>". trim($col[$i])."</td>";
			} else if($i==2){
				echo "<td>". trim($col[$i])."</td>";
			} else if($i==3){
				echo "<td>". trim($col[$i])."</td>";
			} else if($i==6){
				echo "<td>". trim($col[$i])."</td>";
			} else if($i==7){
				echo "<td>". trim($col[$i])."</td>";
			} else if($i==8){
				echo "<td>". trim($col[$i])."</td>";
			}
		}    	
    	echo "</tr>";
    }
    ?>
     </tbody>
    </table>
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