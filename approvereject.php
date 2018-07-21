<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='annadhan' ;
$data = array(); // create a variable to hold the information
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
$choice=$_POST['choice'];
$fullname=$_POST['id'];
$names = explode(" ", $fullname);
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

if($choice==1)
{
	$sql = "UPDATE user1 SET Verfied=1 where Firstname='$names[0]' and Lastname='$names[1]'" ;
	$retval = mysqli_query($conn,$sql );
	if(! $retval) {
	  die('Could not get data: ' . mysqli_error());
	}
	echo "Success";
}
if($choice==2)
{

	$sql = "DELETE FROM user1 where  Firstname='$names[0]' and Lastname='$names[1]'" ;
	$retval = mysqli_query($conn,$sql );
	if(! $retval) {
	  die('Could not get data: ' . mysqli_error());
	}
}
?>