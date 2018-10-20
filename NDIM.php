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
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">
<style>

</style>
  </head>

<body style="background:none transparent">
  <div class="py-3" style="color:#2A8BE2;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center font-weight-bold">Post</h1>      
          <form action="./blank.php" method="post">
            <div class="form-group" style="display: none;">
              <!--<label for="InputName">Your name</label>-->
              <input type="text"  class="form-control" id="InputName" name="name" value="<?php echo $_SESSION['fullname']; ?>" placeholder="Your name"><?php echo $_SESSION['fullname']; ?></input> </div>
            <div class="form-group">
              <label for="Textarea">Write your message:</label>
              <textarea class="form-control" id="Textarea" rows="5" name="comment" placeholder="Write Message here"></textarea>
            </div>
            <button type="submit" class="btn" style="background-color:#2A8BE2;color:white">POST</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>

</html>