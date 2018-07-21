<?php
session_start();
//$DonorID = $_SESSION['DonorID'];

echo'
<head>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	
	<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
						<div style="padding:10px;">
					<form id="nedonor_activate_formnew" method="post" class="form-horizontal"  enctype="multipart/form-data">
					<div class="panel panel-default padlittle">
					<div class="panel-heading">Donor Details 
					</div>
					
					<div class="panel-body">						
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Item Type<span style="color:red">*</span></label>
							<div class="col-sm-4">
								<select name="itemname" id="itemname" class="form-control" >
										
										<option value="Food">Food</option>
										<option value="Utility">Utility</option>
								</select>
								
							</div>
							
						</div>
						<div class="form-group">
							<div id="utilitytg">
								
								<label class="col-sm-2 control-label">Utility Name<span style="color:red">*</span></label>
								<div class="col-sm-4">						
									<input type="text" name="utilitynm" id="utilitynm"  placeholder="Utility Name" class="form-control" >
								
								</div>
								
							</div>
						</div>
				
						<div class="form-group">
							<div id="toggitem">
								<label class="col-sm-2 control-label">Food Quantity<span style="color:red">*</span></label>
								<div class="col-sm-4">
									<input type="text" name="foodqnt" id="foodqnt" placeholder="Food Quantity" class="form-control">
									
								</div>
								
								<label class="col-sm-2 control-label">Food Name<span style="color:red">*</span></label>
								<div class="col-sm-4">						
									<input type="text" name="foodnm" id="foodnm"  placeholder="Food Name" class="form-control" >
								
								</div>
								<label class="col-sm-2 control-label">Cooked Before<span style="color:red">*</span></label>
								<div class="col-sm-4">						
									<input type="text" name="cookedbfr" id="cookedbfr"  placeholder="Cooked Before" class="form-control" >
				
								</div>
								
							</div>
						</div>
					</div>
					</div>
					<div class="panel panel-default padlittle">
						<div class="panel-body">
							
							<div class="col-md-12">
								<div class="pull-right">
									<div id="add_donate">
										<button type="button" class="btn btn-primary" name="add" id="dnadd" onclick="insert_donor();" >Add Donation</button>
									</div>
									
								</div>	
							</div>
						</div>
						</div>
						</form>
				<div>
					  
			
<script>
$(document).ready(function() {
			$("#utilitytg").hide();
			
});

	$("#itemname").change(function() {
		if($(this).val() == "Food")
		{
			$("#toggitem").show();
			$("#utilitytg").hide();
		}
		else if($(this).val() == "Utility")
		{
			$("#utilitytg").show();
			$("#toggitem").hide();
		}
			
	});
	
	function insert_donor(){
		
			var foodqnt = $("#foodqnt").val();
			var itemname = $("#itemname").val();
			var cookedbfr = $("#cookedbfr").val();
			var utilitynm = $("#utilitynm").val();
			var foodnm = $("#foodnm").val();
			
			
			$.ajax({
			  type: "POST",
			  url:"add_donor.php",
			  data: {
					 foodqnt : foodqnt,
					 cookedbfr : cookedbf,
					 itemname : Itemnm,
					 foodnm : Foodnm,
					 utilitynm : Utilnm
					 },
					success:function(result){
					$("#nedonor_activate_formnew").trigger("reset");
					$("#nedonor_alert").html(result);
					getglobaluid();
					showreloadedtable();
			  }
			});
	}
</script>
</body>';
?>

