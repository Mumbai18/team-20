<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

$foodq= @addslashes($_POST['foodqnt']);
$cookedbf= @addslashes($_POST['cookedbf']);
$Itemnm= @addslashes($_POST['Itemnm']);
$Foodnm = @addslashes($_POST['Foodnm']);
$Utilnm = @addslashes($_POST['Utilnm']);
$DonorID = $_SESSION['DonorID'];


	$res = $don->insertdonordata($DonorID,$foodq,$cookedbf,$Itemnm,$Utilnm,$Foodnm);
if($res){
		echo '<div class="alert alert-warning alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-thumb"></i>
         '.$_POST['name'].' has been saved to Donor list.
		</div>';
	}
	else{
		echo 'error here';
	}

public function insertdonordata($DonorID,$foodq,$cookedbf,$Itemnm,$Utilnm,$Foodnm)
	{
        $datetime = date("Y-m-d H:i:s" ,time());
		$status = 0 ;
		$u_id = $this->get_rand_id(8);
		$u_id = $this->check_uniq($u_id);
		$sql = "INSERT INTO donation(DonationID,DonorID,Food_quantity,Cooked_before,ItemName,DonationStatus,FoodName,UtilName) VALUES('$u_id','$DonorID','$foodq','$cookedbf','$Itemnm','$status','$Utilnm','$Utilnm')";
	   	$enter = mysqli_query($this->db,$sql);
		return $enter;
	}

?>