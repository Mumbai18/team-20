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
$row1= $row["Firstname"] ;
echo "<td>";
echo '<a href="/CFG/Maps.php?name=$row1">';
echo $row1;
echo '</a>';
echo "</td><td></td>";
echo "<td>";
 echo $row["Food_quantity"];
echo  "</td><td></td>";
echo "</tr>";
}
echo "</font></table>";
	}
	
echo "</center>"	
?>

</body>
</html>