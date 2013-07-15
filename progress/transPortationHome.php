<?php 

$markDetailId=$_GET['markId'];
$markTressDetails=$common->getTreeMarked($_GET['markId']);	

$markDetail =  new MarkDetailDO();

if($fromRSD==1)
{
$markList=$markDetail->getProgressTransPortationDetailfromRSD($markDetailId);
}
else
{
	$markList=$markDetail->getProgressTransPortationDetail($markDetailId);
}
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


?>

<form id="form" action="" method="POST">
<table cellpadding="3px" cellspacing="3px" style='width:600px;' >
<?php 

	include('progress/transPortationHomeHTML.php');
	?>


</table>
