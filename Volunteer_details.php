<!DOCTYPE>

<html>
	<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>    


		<title></title>
</head>
	
<body>
<div class="container-fluid"><?php include('header.php')?></div>
<?php 
include("db.php");
global $donor;
$donor=1;
echo "<br><br><br><center>";
echo "<h1> Volunteers (on same Delivery)";
$check_pro = "select User.Firstname,User.Contact from User,volunteerdelivery,Donation where User.UserID=volunteerdelivery.VolunteerID AND volunteerdelivery.deliveryID=Donation.DonationID AND  Donation.DonorID='$donor'";
$result = mysqli_query($con, $check_pro); 
if(mysqli_num_rows($result)>0){
	
echo "<table width=40% border='1' ><font size='16'>
<tr>
<th>Name</th>
<th>Contact</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["Firstname"] . "</td>";
echo "<td>" . $row["Contact"] . "</td>";
echo "</tr>";
}
echo "</font></table>";
	}
echo "<br><br><br>";
echo "Donor Details:";
$check_pro = "select User.Firstname,User.Contact from User where User.UserID='$donor'";//userid of donor
$result = mysqli_query($con, $check_pro); 
if(mysqli_num_rows($result)>0){
	
echo "<table width=40% border='1' ><font size='16'>
<tr>
<th>Name</th>
<th>Contact</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["Firstname"] . "</td>";
echo "<td>" . $row["Contact"] . "</td>";
echo "</tr>";
}
echo "</font></table>";
	}
	
echo "</center>"	

?>

</body>
</html>