<?php
$markDetailId=$_GET['markId'];
$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
//$arrMarkDetail=12;

$forestID=$arrMarkDetail['i_forest_id'];
$ctegoryDetail=$common->getDetailInfo('c_conversion_felling','i_forest_id',$forestID);
if(isset($_POST['update'])){
	echo 'form Posted';
	extract($_POST);


	$existing=$common->checkExistingEcnomicsUpdate($markDetailId);


	if($existing =='' )
	{
		$economics_master['i_mark_id']=$markDetailId;
		$ecnomicsId = $db->insert('economics_master',$economics_master);
	}
	else
	{
		$ecnomicsId=$existing['id'];
	}




	$arrCondition = array('i_mark_id'=>$markDetailId,'i_ecnomics_master_id'=>$ecnomicsId);

	$db->delete('ecnomics_extracharges',$arrCondition);
	foreach($overhead as 	$overhead=>$productValue){
		$ecnomics_overhead['i_mark_id']=$markDetailId;
		$ecnomics_overhead['i_overhead_id']=$overhead;
		$ecnomics_overhead['i_value']=$productValue;
		$ecnomics_overhead['i_status']=1;
		$ecnomics_overhead['vc_source']=$vc_source[$overhead];
		$ecnomics_overhead['vc_destination']=$vc_destination[$overhead];
		$ecnomics_overhead['i_ecnomics_master_id']= $ecnomicsId;
			
		$id = $db->insert('ecnomics_extracharges',$ecnomics_overhead);
		echo $id ;
	}

	$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);

	header("Location:".BASE_URL."indexThickBox.php?page=addSellingPrice&markId=".$markDetailId);
	
}




$overHeadEntry=$common->getExtraCharges($markDetailId);

$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];
$timberDO =  new TimberDO();
$overHeadDetail=$timberDO->getOtherExpensis($markDetailId,$ecnomicsId);

?>

<?php
include('ecnomics/ecnomicsHeader.php');
if($ecmomicsMaster != '')
{
	?>
<div>Last Generated On <?php echo $ecmomicsMaster['dt_createDate']; ?></div>
	<?php
}
?>
<div id="tabs-1">

<form id="form" method="post" action=""><input type='hidden'
	value='<?php echo $markDetailId?>' id='markid' name='markid' />
	
<table style="align:center;">
	<tr>
		<td> <h4>Other Expenses Incurred Timber Extraction .</h4> </td>
	</tr>
</table>
	
<table style="width: 75%">
	<tr>
		<td><b>Sr.No</b></td>
		<td><b>Expense Type</b></td>
		<td><b>Default Charges</b></td>
		<td><b>Applicable Charges</b></td>
	</tr>

	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>

	<?php
	$count=0;
	foreach($overHeadEntry as $id=>$overHead){
		$count++;
		$value=$overHead['vc_value'];
		$source="";
		$destination="";
		if($overHeadDetail[$id] !='')
		{
			$value=$overHeadDetail[$id]['i_value'];
			$source=$overHeadDetail[$id]['vc_source'];
			$destination=$overHeadDetail[$id]['vc_destination'];
		}


		?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $overHead['vc_name'] ?></td>
		<td align='center'><?php echo $overHead['vc_value'] ?> %</td>
		<td><input style='width: 40px; display:inline;' type='text'
			value='<?php echo $value ?>' name='overhead[<?php echo $id;?>]'
			id='overhead[<?php echo $id;?>]' /> %</td>
			
	</tr>
	<?php
	}
	?>
	<tr>
		<td colspan="4">
		<table>
			<tr>
				<td colspan='2' align="right">
				<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
					<tr>
						<td></td>

						<td><input type="submit" name="update" id="upadte" value="Save & Next" /></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
	<?php ?></form>
</div>
</div>


