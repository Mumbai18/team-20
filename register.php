<?php

require "formconfig.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register.php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>    


  <style>
  .main{
  	border: 2px solid lightgray;
  }
.main:hover{
	border: 2px solid lightblue;
}


  </style>
</head>
<body>
<div class="container-fluid"><?php include('header.php')?></div>
<div class="container">
<div class="main" style="margin:50px; padding: 25px;">
<h2>Register Here</h2>
  	<form class="form-horizontal" action="register.php" method="post">
    	<div class="form-group">
          <label class="control-label col-sm-2" for="Firstname">Firstname:</label>
          <div class="col-sm-8">
            <input type="text" name="Firstname" class="form-control" id="Firstname" placeholder="Enter Firstname" required>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="Lastname">Lastname:</label>
          <div class="col-sm-8">          
            <input type="text" name="Lastname" class="form-control" id="Lastname" placeholder="Enter Lastname" required>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="Username">Username</label>
          <div class="col-sm-8">          
            <input type="text" name="Username" class="form-control" id="Username" placeholder="Enter Username" required>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2" for="email">Password:</label>
          <div class="col-sm-8">
            <input type="password" name="Password" class="form-control" id="Password" placeholder="Enter Password" required>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2" for="email">Confirm Password:</label>
          <div class="col-sm-8">
            <input type="password" name="ConfirmPassword" class="form-control" id="ConfirmPassword" placeholder="Enter Password" required>
          </div>
      </div>

      <div class="form-group">
          <label class="control-label col-sm-2" for="Location">Location:</label>
          <div class="col-sm-8">          
            <input type="text" name="Location" class="form-control" id="Location" placeholder="Enter Location" required>
          </div>
      </div>



<p id="demo"></p>

<script>

var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
    //$latitude =  position.coords.latitude;
   // $longitude = position.coords.longitude;
}

</script>



      <div class="form-group">
          <label class="control-label col-sm-12" for="Type">Type(0-Donor,1-Space Volunteer,2-Delivery Volunteers)</label>
          <div class="col-sm-8">          
            <input type="text" name="Type" class="form-control" id="Type" placeholder="Enter Type" required>
          </div>
      </div>

      <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit_btn" class="btn btn-default">Submit</button>
          </div>
      </div>

    </form>
</div>
</div>

<?php


$email = $password = $cpassword = $pass_len= " ";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(isset($_POST['submit_btn']))
{
	
	if (isset($_POST['Username'])) {
    	$email = $_POST['Username'];
	$type=$_POST['Type'];
      //echo $email;
	}

	if (isset($_POST['Password'])) {
    	$password = test_input($_POST['Password']);
    	$pass_len = strlen((string)$password);
	}
	if (isset($_POST['ConfirmPassword'])) {
    	$cpassword = test_input($_POST['ConfirmPassword']);
	}
	/* check password range */
	//if (filter_var($password, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$passmin, "max_range"=>$passmax))) === false)
	if($pass_len < 8)
	{
    	echo '<script type= "text/javascript"> alert ("password should have atleast 8 characters") </script> ';
	}
	else
	{

		if($password == $cpassword)
		{
			$query = "select * from User where Username = '$email' ";
			$query_run1 = mysqli_query($con,$query);

			if(mysqli_num_rows($query_run1)>0)
			{
				echo '<script type= "text/javascript"> alert ("username already exists") </script> ';
			}
			else
			{
        $random = rand();
				$query = "insert into User (UserID,Username,Password) values ('$random','$email','$password')";
				
				$query_run2 = mysqli_query($con,$query);
				echo $query_run2;
        echo $query;
			
				if($query_run2)
				{
					
					echo '<script type= "text/javascript"> alert ("registered successfully...Go to login page") </script> ';
					if($type==1) echo'<script type= "text/javascript"> window.location = "/cfg/Volunteer_home.php"</script>';
					if($type==2) echo'<script type= "text/javascript"> window.location = "/cfg/donorform.php"</script>';
					if($type==0) echo'<script type= "text/javascript"> window.location = "/cfg/adminindex.php"</script>';				
}
				else
				{
					echo '<script type= "text/javascript"> alert ("error") </script> ';
				}

			}
		}
	
		else
		{
			echo '<script type= "text/javascript"> alert ("passwords do not match") </script> ';
		}
	}

}



?>

</body>
</html>
