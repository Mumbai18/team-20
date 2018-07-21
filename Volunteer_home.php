<!DOCTYPE>


<?php 
include("db.php");
echo "<br><br><br><center>";
echo "<h1> Donors (within 4 Kms)</h1>";
$check_pro = "select User.Firstname,Donation.Food_quantity from User,Donation where User.UserID=Donation.DonorID";
$result = mysqli_query($con, $check_pro); 
if(mysqli_num_rows($result)>0){
	
echo "<table width=40% border='1' ><font size='16'>
<tr>
<th>Name</th>
<th>Distance</th>
<th>Quantity</th>
<th>No. of Volunteers</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["Firstname"] . "</td><td></td>";
echo "<td>" . $row["Food_quantity"] . "</td><td></td>";
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