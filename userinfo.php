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

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}
$sql = "SELECT * FROM user1  WHERE Firstname='$FirstName' AND Lastname='$Lastname'";
$retval = mysqli_query($conn,$sql );
if(! $retval) {
  die('Could not get data: ' . mysqli_error());
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
  $UserID=$row['UserID'];
  $Firstname=$row['Firstname'];
  $Lastname=$row['Lastname'];
  $Location=$row['Location'];
  $Type=$row['Type'];
  $Username=$row['Username'];
  $data[] = $row;
}
?>