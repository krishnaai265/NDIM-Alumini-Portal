<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
body{
	font-family: Arial, Helvetica, sans-serif;
}
table {
	border: 1px solid #dddddd;
    border-collapse: collapse;
    width: 100%;
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
</style>
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
</head>
<body>
    <?php
    header("Content-type: text/html");
    echo "<html>
    <body>";
     
    $file = fopen("usersdb.php","r") or die("Error");
    ?>
    <input id="myInput" type="text" placeholder="Search.."> 
	<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Model over -->
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
			if($i==1 or $i==4 or $i==5){}else{
				echo "<td>". trim($col[$i])."</td>";
			}
		}    	
    	echo "</tr>";
    }
    ?>
     </tbody>
    </table>
</body>
</html>