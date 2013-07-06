<?
$markId         =       $_GET['markId'];
$markDetailId         =       $_GET['markId'];
$progressId=$_REQUEST['progressId'];

$arrRecords     =		array();
$table			=		'm_overhead_entities';

$arFieldValues=array();

if(isset($_POST['submit'])=="Update"){

	extract($_POST);
	if($updatePrevious > 0)
	{
		$existingDetail=0;
	}
	else
	{
		$arFieldValues['i_mark_id']=$markDetailId;
		$arFieldValues['i_contractor_id']=$i_contractor_id;
		$arFieldValues['vc_month']=$i_month_id;
		$arFieldValues['vc_year']=$i_year;
		$list=$common->selectCondition('progress_overhead_master', $arFieldValues);
		$existingDetail=count($list);
	}


	if($existingDetail > 0 && ($updatePrevious == '' || $updatePrevious==0))
	{
		$errorMsg    ="Entry Already Exists for ".$_POST['month']."/".$_POST['year'] ."of this contractor ";
	}
	else
	{

		if($updatePrevious =='')
		{
			$arMarkedPrice['i_mark_id']=$markDetailId;
			$arMarkedPrice['i_contractor_id']=$i_contractor_id;
			$arMarkedPrice['vc_month']=$i_month_id;
			$arMarkedPrice['vc_year']=$i_year;
			$arMarkedPrice['i_total_marked']=0;
			$arMarkedPrice['i_total_Volume']=0;
			$progressConversionId = $db->insert('progress_overhead_master',$arMarkedPrice);
		}
		else
		{
			$progressConversionId=$updatePrevious;
		}
		
		$db->deleteProgressOverHeadDetail($progressConversionId);


		foreach($_POST as $k=>$v){
            
			 echo $k;
			if($k != 'i_month_id' &&  $k != 'i_year' && $k != 'updatePrevious' && $k != 'submit' &&  $k != 'i_mark_id' && $k != 'i_contractor_id'){
			$arFieldValues= array();
				foreach($_POST[$k] as $key=>$value){

					print_r($key);
					$arFieldValues[$key] = $value;
					$arFieldValues['i_mark_id']= $markId;
					$arFieldValues['i_progress_id']= $progressConversionId;
				}
				
				if($arFieldValues['i_applicable'] ==1)
				{
				$id = $db->insert('progress_overhead_detail',$arFieldValues);
				}
			}

			//die();
			ob_end_clean();
			header("Location:".BASE_URL."index.php?page=overHeadHomeHtml&markId=".$markId);
		}
	}
}
$arrRecords     =       $common->getOverheadEntity($markId);
$arrTreeType    =       $common->getAllOption("m_treetype");
$arrAllcontractors=$common->getAllcontractors();

if($progressId != '' && $progressId > 0)
{

	$arFieldValues['id']=$progressId;
	$progressMasterDetail=$common->selectCondition('progress_overhead_master', $arFieldValues);
	$i_contractor_id=$progressMasterDetail[0]['i_contractor_id'];
	$i_month_id=$progressMasterDetail[0]['vc_month'];
	$i_year=$progressMasterDetail[0]['vc_year'];
	//$preViousTimbedetail=$markDetail->getprogressConversionDetail($progressId);

}

if(!empty($arrRecords)){
	include("progressOverHeadDetailHtml.php");
}else{
	echo "There is no entity across this Forest Department.";
}
?>