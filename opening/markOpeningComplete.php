<?php 

$markDetailId=$_GET['markId'];



$markDetail =  new MarkDetailDO();

$markList=$markDetail->getMarkDetailSummarryOpening($markDetailId);

$volumneList=$markDetail->getMarkIdOpeningVolumeSummarry($markDetailId);

$royalityList=$markDetail->getRoyalityMarkIdPrice($markDetailId);


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
<table cellpadding="3px" cellspacing="3px" >
<?php 
if(!isset($markList) || empty($markList)){
	echo "<tr><td colspan=2 align='center'>No Record Entered";
} else{
	include('marked_trees_opening.php');
	?>
<?php 
}
?>
</table>
<table >
	<tr>
		<td align='right' >
           <table border=0 style="width:20%" cellspacing="0" cellpadding="0">
           <tr>
            <td align='left'><input type="button" name="add_conversion" id="add_conversion"
			value="Add Marking" onclick="javascript:parent.location='index.php?page=addMarkingOpeningDetil&markid=<?php echo $markDetailId;?>'"/></td>
           	<td align='right'>
			&nbsp;
			 </td>
           
           </tr>
           </table>

		
		</td>
	</tr>
</table>

</form>