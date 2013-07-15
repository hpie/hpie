<?php 

$markDetailId=$_GET['markId'];
$markTressDetails=$common->getTreeMarked($_GET['markId']);	

$yearDetail=$_GET['yearDetailId'];
if($yearDetail !='')
{
	$markingMaster=$common->getInfo('marking_master_detail',$yearDetail);
	$markingMaster=$markingMaster[0];
	
}
else
{
	$markingMaster=$_SESSION['markingyearDetail'];
	
	
}
$_SESSION['markingyearDetail']=$markingMaster;

$markDetail =  new MarkDetailDO();
$markList=$markDetail->getMarkDetailSummarry($markDetailId,$markingMaster['from_vc_year']);


$volumneList=$markDetail->getMarkIdVolumeSummarry($markDetailId,$markingMaster['from_vc_year']);

$royalityList=$markDetail->getRoyalityMarkIdPrice($markDetailId,$markingMaster['from_vc_year']);
$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
$markIdDetail['0']['id'];
$arrVolumeTables   = $common->getAllVolumeTables();

$forestDetail=$common->getInfo('m_forest',$markIdDetail['0']['i_forest_id']);
$forestName=$forestDetail['0']['vc_name']."/".$arrVolumeTables[$markIdDetail['0']['i_table_id']];
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
	include('html/marked_trees.php');
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
			value="Cancel" onclick="javascript:parent.location='index.php?page=markCompleteDetailStep1&markId=<?php echo $markDetailId;?>'"/></td>
           	<td align='right'>
			&nbsp;
			 </td>
           
           </tr>
          
           <tr>
            <td align='left'><input type="button" name="add_conversion" id="add_conversion"
			value="Add Marking" onclick="javascript:parent.location='index.php?page=editTreeDetail&markid=<?php echo $markDetailId;?>'"/></td>
           	<td align='right'>
			&nbsp;
			 </td>
           
           </tr>
           </table>

		
		</td>
	</tr>
</table>

</form>