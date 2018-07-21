<!DOCTYPE>


<?php 
include("db.php");
echo "<br><br><br><center>";
echo "<h1> Volunteers (on same Delivery)";
$check_pro = "select User.Firstname,User.Contact from User,volunteerdelivery where User.UserID=volunteerdelivery.VolunteerID";
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
$check_pro = "select User.Firstname,User.Contact from User,volunteerdelivery,Donation where User.UserID=2";//userid of donor
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