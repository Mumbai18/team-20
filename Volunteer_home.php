<!DOCTYPE>
<?php 
include("db.php");

$check_pro = "select User.Firstname,Donation.Food_quantity from User,Donation where User.UserID=Donation.DonorID";
$result = mysqli_query($con, $check_pro); 
	
if(mysqli_num_rows($result)>0){
	
echo "<table border='1'>
<tr>
<th>Name</th>
<th>Quantity</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["Firstname"] . "</td>";
echo "<td>" . $row["Food_quantity"] . "</td>";
echo "</tr>";
}
echo "</table>";
	}
	
	
?>
<html>
	<head>
		<title>
</head>
	
<body>
</body>
</html>