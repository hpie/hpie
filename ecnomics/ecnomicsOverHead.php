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

	$db->delete('ecnomics_overhead',$arrCondition);
	foreach($overhead as 	$overhead=>$productValue){
		$ecnomics_overhead['i_mark_id']=$markDetailId;
		$ecnomics_overhead['i_overhead_id']=$overhead;
		$ecnomics_overhead['i_value']=$productValue;
		$ecnomics_overhead['i_status']=1;
		$ecnomics_overhead['vc_source']=$vc_source[$overhead];
		$ecnomics_overhead['i_commission']=$comission[$overhead];
		$ecnomics_overhead['i_distance']=$distance[$overhead];
		
		$ecnomics_overhead['vc_destination']=$vc_destination[$overhead];
		$ecnomics_overhead['i_ecnomics_master_id']= $ecnomicsId;
			
		$id = $db->insert('ecnomics_overhead',$ecnomics_overhead);
	}

	$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);

	$_SESSION['empMsg']='Ecnomics details have been added for Lot-No '.	$markDetailId;
	header("Location:".BASE_URL."indexThickBox.php?page=addEcnomicsExpenses&markId=".$markDetailId);
}


$overHeadEntry=$common->getOverheadEntity($markDetailId);
$overHeadRSD=$common->getOverheadRSD($markDetailId);

$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];
$timberDO =  new TimberDO();
$overHeadDetail=$timberDO->getMarkingOverHeadRelation($markDetailId,$ecnomicsId);
$overTransportation=$timberDO->getMarkingTransPortationRelation($markDetailId,$ecnomicsId);
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
		<td> <h4>Carriage of Timber from Forest upto Road Side Depot (RSD).</h4> </td>
	</tr>
</table>
	
	<br />
<table style="width: 900px">
	<tr>
		<td><b>Sr.No</b></td>
		<td><b>Expense&nbsp;Type</b></td>
		<td><b>Default&nbsp;Charges</b></td>
		<td><b>Distance</b></td>
		<td><b>Applicable&nbsp;Charges</b></td>
		<td><b>Mate Comission</b></td>
		<td><b>Start Point</b></td>
		<td><b>End Point</b></td>
	</tr>

	<tr>
		<td colspan="8">&nbsp;</td>
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
			$comission=$overHeadDetail[$id]['i_commission'];
			$distance=$overHeadDetail[$id]['i_distance'];
		}


		?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $overHead['vc_name'] ?></td>
		<td align='center'>Rs. <?php echo $overHead['vc_value'] ?></td>
		<td><input style='width: 40px; display:inline;' type='text'
			value='<?php echo $distance ?>' name='distance[<?php echo $id;?>]'
			id='distance[<?php echo $id;?>]' /> KM</td>
		<td>Rs. <input style='width: 40px; display:inline;' type='text'
			value='<?php echo $value ?>' name='overhead[<?php echo $id;?>]'
			id='overhead[<?php echo $id;?>]' /></td>
		<td><input style='width: 40px; display:inline;' type='text'
			value='<?php echo $comission ?>' name='comission[<?php echo $id;?>]'
			id='comission[<?php echo $id;?>]' />  % of Expence</td>
			
			<?php
			if($overHead['i_overhead_type'] ==1)
			{
				?>
		<td><input type='text' value="<?php echo $source;?>"
			name='vc_source[<?php echo $id;?>]' id="vc_source[<?php echo $id;?>]"
			style="width: 100px;" /></td>
		<td><input type='text' value="<?php echo $destination;?>"
			name='vc_destination[<?php echo $id;?>]'
			id='vc_destination[<?php echo $id;?>]' style="width: 100px;" /></td>

			<?php
			}
			else
			{
		  ?>
		<td>N/A</td>
		<td>N/A</td>

		<?php
			}
			?>
	</tr>
	<?php
	}
	?>
	
	<tr>
	 <td colspan="8">
	  		<table style="width: 50%; align:center;">
				<tr>
					<td> <h4>Tranportation from Road Side Depot (RSD).</h4> </td>
				</tr>
			</table>
	  </td>
	</tr>
	
	<tr>
		<td><b>Sr.No</b></td>
		<td><b>Expense&nbsp;Type</b></td>
		<td><b>Default&nbsp;Charges</b></td>
		<td><b>Distance</b></td>
		<td><b>Applicable&nbsp;Charges</b></td>
		<td><b>Mate Comission</b></td>
		<td><b>Start Point</b></td>
		<td><b>End Point</b></td>
	</tr>

	<tr>
		<td colspan="8">&nbsp;</td>
	</tr>
	
	<?php
	$count=0;
	foreach($overHeadRSD as $id=>$overHead){
		$count++;
		$value=$overHead['vc_value'];
		$source="";
		$destination="";
		if($overTransportation[$id] !='')
		{
			$value=$overTransportation[$id]['i_value'];
			$source=$overTransportation[$id]['vc_source'];
			$destination=$overTransportation[$id]['vc_destination'];
			$comission=$overTransportation[$id]['i_commission'];
			$distance=$overTransportation[$id]['i_distance'];
		}


		?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $overHead['vc_name'] ?></td>
		<td align='center'>Rs. <?php echo $overHead['vc_value'] ?></td>
		<td><input style='width: 40px; display:inline;' type='text'
			value='<?php echo $distance ?>' name='distance[<?php echo $id;?>]'
			id='distance[<?php echo $id;?>]' /> KM</td>
		<td>Rs. <input style='width: 40px; display:inline;' type='text'
			value='<?php echo $value ?>' name='overhead[<?php echo $id;?>]'
			id='overhead[<?php echo $id;?>]' /></td>
		<td><input style='width: 40px; display:inline;' type='text'
			value='<?php echo $comission ?>' name='comission[<?php echo $id;?>]'
			id='comission[<?php echo $id;?>]' />  % of Expence</td>
			
			<?php
			if($overHead['i_overhead_type'] ==1 || $overHead['i_overhead_type'] ==5)
			{
				?>
		<td><input type='text' value="<?php echo $source;?>"
			name='vc_source[<?php echo $id;?>]' id="vc_source[<?php echo $id;?>]"
			style="width: 100px;" /></td>
		<td><input type='text' value="<?php echo $destination;?>"
			name='vc_destination[<?php echo $id;?>]'
			id='vc_destination[<?php echo $id;?>]' style="width: 100px;" /></td>

			<?php
			}
			else
			{
		  ?>
		<td>N/A</td>
		<td>N/A</td>

		<?php
			}
			?>
	</tr>
	<?php
	}
	?>
	
	<tr>
		<td colspan="8">
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
	<?php ?>

</form>

</div>



