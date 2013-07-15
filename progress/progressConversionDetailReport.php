<br>
<div style=' padding-left:50px;'>
<?php 
$markDetailId=$_GET['markId'];
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

$mtimberDetail=$markDetail->getConvertedTimberName($markDetailId);
$mconvertedTrees=$markDetail->getConvertedTreeName($markDetailId);

$fellingDetail=$markDetail->getProgressFellingCategoryWise($markDetailId);
$getConvertedTimberDetail=$markDetail->getConvertedTimberTreeWiseDetail($markDetailId);


?>
<?php 
printButton('800','javascript:window.print()','3px');
?>
<br>
<table cellpadding="1px" cellspacing="1px" style='width:700px;text-align:center' >
<?php 

	include('progress/progressConversionDetailReportHTML.php');
	?>
</table>
</div>