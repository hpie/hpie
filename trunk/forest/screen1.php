<?php
$nameofforest="";
$area        ="";
$error       =0;
$errorMsg    ="";
$nameOfDepartMent='';
$i_division_id  ='';
$fromdate ="";
$todate   ="";
$i_table_id='';
$table			   = 'm_volume_table';
$arrVolumeTables   = $common->getAllVolumeTables();
$arrUnits          = $common->getAllOption('m_units');
/*
 *  Removing Previous data from sesssion
 */
removeFromSession('mardDetail') ;
removeFromSession('markTressDetails');
$alreadyAdded=0;
$mark_detailCheck = new MarkingVO();
if(isset($_GET['markId'])){
	$result=$common->getInfo('c_mark_detail',$_GET['markId']);
	/*echo '<pre>';
	 print_R($result);
	 echo '</pre>';*/
	$nameofforest=$result[0]['i_forest_id'];
	$area        =$result[0]['f_area'];
	$nameOfDepartMent=$result[0]['i_division_id'];;
	$i_division_id  =$result[0]['i_division_id'];
	$fromdate       =date('d-m-Y',strtotime($result[0]['dt_fromDate']));
	$todate         =date('d-m-Y',strtotime($result[0]['dt_toDate']));
}
if(isset($_POST['submit'])){
	extract($_POST);
	$_SESSION['screen1']['nameofforest_id']=$nameofforest_id;
	$_SESSION['screen1']['fromdate']     =$fromdate;
	$_SESSION['screen1']['todate']      =$todate;
	$_SESSION['screen1']['area']        =$area;

	if($common->isgreterDate($fromdate,$todate)){

		$markDetailVO =  new MarkingVO();
		$markDetailVO->i_user_id=$_SESSION['userId'];
		$markDetailVO->i_division_id=$i_division_id;
		$markDetailVO->i_forest_id=$nameofforest_id;
		$markDetailVO->i_table_id=$i_table_id;
		$markDetailVO->f_area=$area;
		$markDetailVO->i_unit_id=$i_unit_id;
		$markDetailVO->dt_fromDate=date('Y-m-d',strtotime($fromdate));
		$markDetailVO->dt_toDate=date('Y-m-d',strtotime($todate));
		if($lotno != '')
		{
			$markDetailVO->vc_lotno='M_'.$lotno;
		}
		$markDetailVO->dt_completionDate=date('Y-m-d',strtotime($completionDate));

		$markDetailDO =  new MarkDetailDO();

		if(isset($_GET['markId']) && $_GET['markId'] !=''){
			$markDetailVO->id=$_GET['markId'];

		 $arCondition = array('id'=>$_GET['markId']);
		 $markDetailVO->m_id = $db->update('c_mark_detail',$markDetailVO,$arCondition);
		 $markDetailVO->m_id=$markDetail->id;
		 $_SESSION['mardDetail']=serialize($markDetailVO);
		 ob_end_clean();
		 header("Location:".BASE_URL."index.php?page=markCompleteDetail&markId=".$markDetail->id);
		 	
		}else{

	 	$alreadyAddedCount= $markDetailDO->getExistingEntry($markDetailVO);
	 	
	 	$alreadyAddedCount=1;
	 	$manualLot= $markDetailDO->checkManualLotNumber($markDetailVO);
	 	echo $alreadyAddedCount.'<br>';
	 	
	 	echo $manualLot.'<br>';
	 	if($manualLot > 0 || $manualLot >0)
	 	{
	 		// Redirest to profile
	 		$dateRangeString="&dt_fromDate=".$markDetailVO->dt_fromDate."&dt_toDate=".$markDetailVO->dt_toDate.
	 		$dateRangeString.="&i_division_id=".$markDetailVO->i_division_id."&i_forest_id=".$markDetailVO->i_forest_id.
	 		$dateRangeString.="&daterangeerror=error";
	 		if($manualLot > 0)
	 		{
	 			;
	 			$errorMsg    ='Manual Lot Already Exists ';
	 		}
	 		else
	 		{

	 			$errorMsg    ='Records  Already Added ';
	 		}
	 		// header("Location:".BASE_URL."index.php?page=profile".$dateRangeString);
	 		//  return;
	 	}

	 	else
	 	{
	 		$markDetail=$markDetailDO->insert($markDetailVO);
	 		//die();
	 		$markDetailVO->m_id=$markDetail->id;
	 		$_SESSION['mardDetail']=serialize($markDetailVO);
	 		ob_end_clean();
	 		header("Location:".BASE_URL."index.php?page=markCompleteDetailStep1&markId=".$markDetail->id);

	 	}
	 }


	}else{
		$errorMsg    ="From date can not be greater then to date";

	}


}
if(isset($_GET['nameOfDepartMent']))
{
	$nameOfDepartMent=$_GET['nameOfDepartMent'];
}


include('html/screen1HTML.php');
include('footer.php');
//For Disconnection to  the database
include "coreClasses\datbaseDisConnect.php";
?>