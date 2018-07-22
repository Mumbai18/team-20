<?php

require_once 'myfile.php'; 
$db = new myClass();
$getRows = $db->getRows("SELECT * FROM Donation");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/dataTables.bootstrap.min.css">
</head>
<body>
  <p><br/></p>
    <h1>History</h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>DonationID</th>
          <th>DonorID</th>
          <th>Food_quantity</th>
          <th>Cooked_before</th>
          <th>Timestamp</th>
          <th>Food Name</th>
		  <th>Utility Name</th>
          <th>Donation Status</th>
        </tr>
      </thead>
      <tbody>
<?php
         foreach ($getRows as $rows)
        {
        ?>
        <tr>
        <td><?php echo $rows['DonationID']; ?></td>
        <td><?php echo $rows['DonorID']; ?></td>
        <td><?php echo $rows['Food_quantity']; ?></td>
        <td><?php echo $rows['Cooked_before']; ?></td>
        <td><?php echo $rows['Timestamp']; ?></td>
        <td><?php echo $rows['FoodName']; ?></td>
		<td><?php echo $rows['UtilName']; ?></td>
        <td><?php echo $rows['DonationStatus']; ?></td>
        </tr>
        <?php
        }
        ?>
        
      </tbody>
    </table>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/jquery.dataTables.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/dataTables.bootstrap.min.js"></script>
  <script></script>

</body>
</html>
