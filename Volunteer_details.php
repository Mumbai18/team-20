<!DOCTYPE>


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
<html>
	<head>
		<title>
</head>
	
<body>
</body>
</html>