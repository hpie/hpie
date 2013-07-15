<?php 

$markDetailId=$_GET['markId'];


$pageKey="progressReportDetail";
$economicsId=$_REQUEST['i_ecnomics_master_id'];
if($economicsId == '')
{
	$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
	$ecnomicsId=$ecmomicsMaster['id'];
	
}
else
{
	$ecnomicsId=$economicsId;
}

$common->updateEcmonicsDetails($markDetailId,$ecnomicsId);
$markTressDetails=$common->getTreeMarked($_GET['markId']);	

$markDetail =  new MarkDetailDO();
$markList=$markDetail->getProgressFellingDetail($markDetailId);
$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
$markIdDetail['0']['id'];
$forestDetail=$common->getInfo('m_forest',$markIdDetail['0']['i_forest_id']);
$forestName=$forestDetail['0']['vc_name'];
$forestDFO=$dfoList[$forestDetail['0']['i_department_id']];

$markIdDetailHTML=$markDetail->getMarkIdDetailHTML($markDetailId,$forestDFO.'/'.$forestName);
if(isset($_POST['add_over_head'])){
    ob_end_clean();
	header("Location:".BASE_URL."index.php?page=addOverhead&markId=$markDetailId");
}else if(isset($_POST['add_conversion'])){
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=addConversion&markId=$markDetailId");
}


$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);


$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);
$fellingDetail=$markDetail->getProgressFellingTreeWise($markDetailId);
$conversionDetail=$markDetail->getProgressConversionTreeWise($markDetailId);
$progressOverHead=$markDetail->getProgressOverHeadWise($markDetailId);
$allForestPoints=$common->getAllForestPoints($markDetailId);
?>

<?php     
$markEntryDetail=$markDetail->getMarkDetailVolumeSummarry($markDetailId,$ecnomicsId);
$timberDO =  new TimberDO();
$overHeadDetail=$timberDO->getMarkingOverHeadRelation($markDetailId,$ecnomicsId);


$royalityList=$markDetail->getRoyalityMarkIdPrice($markDetailId);
$selectList=$common->getEcnomicsDateSelect($markDetailId);
$getRateDetail =$markDetail->getConverionCharges($ecnomicsId);
$markCountList=$markDetail->getMarkIdCountSummarry($markDetailId);

$conversionVolume=0;

if($selectList != '')
{
?>
<br>
<table cellpadding="1px" cellspacing="1px" style='width:1000px;' >
<tr>
<td>
<?php 

	include('progress/progressReportHtml.php');
	?>

</td>
</tr>
</table>
<?php 
}
else 
{
	
	echo "No Ecnomics Entry  for the Lot";
}
?>