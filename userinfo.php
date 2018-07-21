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
		<!-- This is the main section -->
		<div class="container-fluid" align="center">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<div class="main">
								    <table id="theTable" style="padding: 5px;">

 											<tr style="background-color: #5bc0de; color: white;">
										    <th style="width: 10%;">Id</th>
										    <td><?php echo $UserID ;?></td>
 											</tr>
									    <tr style="background-color: #5bc0de; color: white;">
										    <th style="width: 10%;">Firstname</th>
										    <td><?php echo $Firstname; ?></td>
									    </tr>
									    <tr style="background-color: #5bc0de; color: white;">
										    <th style="width: 10%;">Lastname</th>
										    <td><?php echo $Lastname; ?></td>
									    </tr>
									    <tr style="background-color: #5bc0de; color: white">
										    <th style="width: 10%;">Location</th>
										    <td><?php echo $Location; ?></td>
									    </tr>
									    <tr style="background-color: #5bc0de; color: white">
										    <th style="width: 10%;">Type</th>
										    <td><?php echo $typeToPrint; ?></td>
									    </tr>
									    <tr style="background-color: #5bc0de; color: white">
										    <th style="width: 10%;">Username</th>
										    <td><?php echo $Username; ?></td>
									    </tr>

									</table>
					</div>
				</div>
			</div>
		</div> 
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- <script src="assets/jquery.min.js"></script> -->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
		<!-- <script src="js/form.js"></script> -->
	</body>
</html>