<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='annadhan';
$data = array(); // create a variable to hold the information
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
$FirstName=mysqli_real_escape_string($conn,$_GET['FirstName']);
$Lastname=mysqli_real_escape_string($conn,$_GET['Lastname']);
$returnstring='';
$typeToPrint;
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
$sql = "SELECT * FROM user1  WHERE Firstname='$FirstName' AND Lastname='$Lastname'";
$retval = mysqli_query($conn,$sql );
$UserID="";
$Firstname="";
$Lastname="";
$Location="";
$Type="";
$Username="";
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
$UserID=$row['UserID'];
$Firstname=$row['Firstname'];
$Lastname=$row['Lastname'];
$Location=$row['Location'];
$Type=$row['Type'];
$Username=$row['Username'];

}
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
if ($Type==0)
{
	$typeToPrint="Donor";
}
elseif ($Type==1) {
	$typeToPrint="Storage Volunteer";
}
else
{
	$typeToPrint="Delivery Volunteer";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>    
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Userinfo</title>
		<!-- Bootstrap -->
		<!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" /> -->
		<!-- <link href="css/style.css" rel="stylesheet" /> -->
		<style type="text/css">
			th, td{
				padding: 5px;
			}			
		</style>
	</head>
	<body>
		<div class="container-fluid">
		<?php include('header.php')?>
		</div>
		<!-- This is the main section -->
		<table class="table table-striped table-dark">
		  <thead>
		    <tr>
				<th style="width: 10%;">Firstname</th>
				<td><?php echo $Firstname; ?></td>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
				<th style="width: 10%;">Id</th>
				<td><?php echo $UserID ;?></td>
		    </tr>
		    <tr>
				<th style="width: 10%;">Lastname</th>
				<td><?php echo $Lastname; ?></td>
		    </tr>
		    <tr>
				<th style="width: 10%;">Location</th>
				<td><?php echo $Location; ?></td>
		    </tr>
			<tr>
				<th style="width: 10%;">Type</th>
				<td><?php echo $typeToPrint; ?></td>
			</tr>
			<tr>
				<th style="width: 10%;">Username</th>
				<td><?php echo $Username; ?></td>
			</tr>		    
		  </tbody>
		</table>		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- <script src="assets/jquery.min.js"></script> -->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
		<!-- <script src="js/form.js"></script> -->
	</body>
</html>