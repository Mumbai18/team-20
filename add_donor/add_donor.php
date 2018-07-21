<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "annadhan";
$foodq= @addslashes($_POST['foodqnt']);
$cookedbf= @addslashes($_POST['cookedbf']);
$Itemnm= @addslashes($_POST['itemname']);
$Foodnm = @addslashes($_POST['foodnm']);
$Utilnm = @addslashes($_POST['Utilnm']);
$DonorID = 11;
$status = 0;
$u_id = 8;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO donation(DonationID,DonorID,Food_quantity,Cooked_before,ItemName,DonationStatus,FoodName,UtilName) VALUES('$u_id','$DonorID','$foodq','$cookedbf','$Itemnm','$status','$Foodnm','$Utilnm')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>