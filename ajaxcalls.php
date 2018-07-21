<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass ='';
$db='annadhan' ;
$data = array(); // create a variable to hold the information
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
$ajaxcallschoice=$_POST['ajaxcallschoice'];
$returnstring='';

if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}

if($ajaxcallschoice==1)//AJAX called to change accept/reject value
{
	$sql = "SELECT * FROM user1  WHERE verfied= 0";
	$retval = mysqli_query($conn,$sql );
	if(! $retval) {
	  die('Could not get data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	  if ($returnstring=="") {
	  	$returnstring=$returnstring.$row['Firstname'];
	    $returnstring=$returnstring.','.$row['Lastname'];
	    // $returnstring=$returnstring.','.$row['Lastname'];

	  }
	  else
	  {
	  	$returnstring=$returnstring.','.$row['Firstname'];
	    $returnstring=$returnstring.','.$row['Lastname']; 	
	  }
	  $data[] = $row;
	}
	print_r($returnstring);
}
if($ajaxcallschoice==2)// AJAX calls for current drive
{
	$sql = "SELECT DonationID,DonorID,DonationStatus,DonorLocation FROM donation  WHERE DonationStatus='Pending'";
	$retval = mysqli_query($conn,$sql );
	if(! $retval) {
	  die('Could not get data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
	  if ($returnstring=="") {
	  	$returnstring=$returnstring.$row['DonationID'];
	    $returnstring=$returnstring.','.$row['DonorID'];
	    $returnstring=$returnstring.','.$row['DonationStatus'];
	    $returnstring=$returnstring.','.$row['DonorLocation'];

	  }
	  else
	  {
	  	$returnstring=$returnstring.','.$row['DonationID'];
	    $returnstring=$returnstring.','.$row['DonorID'];
	    $returnstring=$returnstring.','.$row['DonationStatus'];
	    $returnstring=$returnstring.','.$row['DonorLocation'];
	  }
	  $data[] = $row;
	}
	print_r($returnstring);
}
?>