<?php
session_start();
include('../../includes/functions.php');

$db = new DB_FUNCTIONS();

$DonorID = $_SESSION['DonorID'];
$results = $db->historyall($DonorID);
public function historyall($orgid){
		$query = "select * from donation where DonorId='$DonorID' ORDER BY last_update DESC";
		$result = mysqli_query($this->db,$query);
		if($result-> num_rows>0){
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
			return $data;
		}
	}
if($results)
{
	echo '
<head>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
</head>

<table id="all-donor-datatable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
											<thead>
											<tr>
												<th>Id</th>
												<th>Item Name</th>
												<th>Food Name</th>
												<th>Utility Name</th>
												<th>Food Quantity</th>
												<th>Status</th>
											</tr>
											</thead>
											<tbody>';
											foreach($results as $res)
											{
											echo '
												
											<tr>
											
												<td>'.$res["DonorId"].'</td>
												<td>'.$res["ItemName"].'</td>
												<td>'.$res["FoodName"].'</td>
												<td>'.$res["UtilName"].'</td>
												<td>'.$res["Food_quantity"].'</td>
												<td>'.$res["DonationStatus"].'</td>
											</tr>';
											
											}
										echo '</tbody>
										</table>';
}
echo 
'<script>

		$(document).ready(function() {
			$("#all-donor-datatable").dataTable({
				bSort : false,
				stateSave: true,
				"lengthMenu": [[-1], ["All"]],
				"deferRender": true
			});
			$("div.dt-buttons").css({"display":"inline-block"});
				$("div.dataTables_length").css({"display":"none"});
				$("div.dataTables_filter input").addClass("form-control");
				$("div.dataTables_filter input").attr("placeholder", "Search" );
				$("div.dataTables_filter").css({"color":"transparent","font-size":"1px"});	
		
		});
</script>';
?>