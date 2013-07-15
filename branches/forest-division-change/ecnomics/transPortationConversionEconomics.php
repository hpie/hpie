<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$timberDO =  new TimberDO();
$timberlist=$timberDO->getTimberList();
$arrAllcontractors=$common->getAllcontractors();
$allForestPoints=$common->getAllForestPoints($markDetailId);

print_r($allForestPoints);
$treeId=$_GET['treeId'];
$timberPreviousValue = array();
$timberPreviousVolume = array();
$timberCurrentValue = array();
$timberCurrentVolume = array();

$markDetail =  new MarkDetailDO();
$i_year     =date('Y');
$i_month_id=date('m');
$i_contractor_id=$_GET['c_id'];
$markDetail =  new MarkDetailDO();
$volumeTableDetail=$markDetail->getTimberVolummeDetail();

if(isset($_POST['cancel'])){
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=conversionHome&markId=".$markDetailId);

}
if(isset($_POST['update'])){
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
	$db->delete('ecnomics_transportation_detail',$arrCondition);
	
	
	
	$timberDetailArray =array();
	$count=0;


	/**
	 * Block Added For checking the condition
	 */

	if($updatePrevious > 0)
	{
		$existingDetail=0;
	}
	else
	{
		$arFieldValues['i_mark_id']=$markDetailId;
		$arFieldValues['vc_month']=$i_month_id;
		$arFieldValues['vc_year']=$i_year;
		$list=$common->selectCondition('ecnomics_transportation_detail', $arFieldValues);
		$existingDetail=count($list);
	}
	if($existingDetail > 0 && ($updatePrevious == '' || $updatePrevious==0))
	{
		$errorMsg    ="Entry Already Exists for ".$_POST['month']."/".$_POST['year'] ."of this contractor ";
	}
	else
	{

		
		$db->deleteProgressTransportDetail($progressConversionId);
		$totalCount=0;
		$totalVolume=0;

		foreach ($treeId as $index=>$value	)
		{
				
			$c_tree_filling_detail['i_tree_id']=$value;
			$c_tree_filling_detail['i_overhead_id']=$transportationType[$index];
			$c_tree_filling_detail['i_progress_id']=$progressConversionId;
			$c_tree_filling_detail['i_contract_id']=$contract[$index];;
			$c_tree_filling_detail['vc_from']=$source[$index];
			$c_tree_filling_detail['vc_destination']=$destination[$index];
			$c_tree_filling_detail['i_volume']=$volume[$index];
			$c_tree_filling_detail['i_charges']=$charges[$index];
			$c_tree_filling_detail['i_exit']=$exit[$index];
			$c_tree_filling_detail['i_comission']=$comission[$index];
			$c_tree_filling_detail['i_distance']=$distance[$index];
			
			$id = $db->insert('ecnomics_transportation_detail',$c_tree_filling_detail);
		}
			

		ob_end_clean();
		header("location:index.php?page=transportationHome&markId=".$_REQUEST['markId']);

	}

}

//$markList=$markDetail->getTreeMarkDetail($markDetailId,$treeId);

$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];

if($timberRelationDetail != '')
{
	$timberCatDetail=$timberRelationDetail;
}

$overHeadEntry=$common->getOverheadEntity($markDetailId);
$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);

$transPortationDetail=$markDetail->getprogressTransportationDetailCompleteEconomics($ecnomicsId);


$allForestPoints=$common->getAllForestPoints($markDetailId);



foreach ($progressConversion as $tree=>$detail)
{
	?>
<input
	type='hidden' value='<?php echo $detail['i_volumne'];?>'
	id='<?php echo $tree;?>' name='<?php echo $tree;?>' />
	<?php
}

?>

<?php
include('header.php');
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screens</title>

<link rel="stylesheet" type="text/css" media="all"
	href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all"
	href="css/jqstyle.css" />

<script type="text/javascript" src="js/calendarDateInput.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>
  //script for validation	
   $(document).ready(function(){
     $("form").validate();
   });
</script>
<style>
#form input,#form textarea {
	width: 50%;
}
</style>

<!--accordion start -->

<link rel="stylesheet" href="css/accordion.css" />
<script type="text/javascript" src="js/jquery1.js"></script>

<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.dimensions.js"></script>
<script type="text/javascript" src="js/jquery.accordion.js"></script>

<script type="text/javascript">
	jQuery().ready(function(){
		// simple accordion
	
		jQuery('#list1b').accordion({
			autoheight: false
		});
		

		
		
		// bind to change event of select to control first and seconds accordion
		// similar to tab's plugin triggerTab(), without an extra method
		var accordions = jQuery('#list1a, #list1b, #list2, #list3, #navigation, #wizard');
		
		jQuery('#switch select').change(function() {
			accordions.accordion("activate", this.selectedIndex-1 );
		});
		jQuery('#close').click(function() {
			accordions.accordion("activate", -1);
		});
		jQuery('#switch2').change(function() {
			accordions.accordion("activate", this.value);
		});
		jQuery('#enable').click(function() {
			accordions.accordion("enable");
		});
		jQuery('#disable').click(function() {
			accordions.accordion("disable");
		});
		jQuery('#remove').click(function() {
			accordions.accordion("destroy");
			wizardButtons.unbind("click");
		});
	});
	</script>
</head>

<br>
<br>
<?php
include('ecnomics/ecnomicsHeader.php');
if(count($markedTreeList) > 0)
{
	?>
<form id="form" method="POST" action="">
<input type='hidden'
	name='treeId' id='treeId' value='<?php echo $treeId; ?>' /> 
<input
	type="hidden" value='<?php echo $markDetailId;?>' name='markId'
	id='markId' /> 
<input type='hidden' value='<?php echo $progressId?>'
	name='updatePrevious' id='updatePrevious' />


<table align="center" width="90%" border="0" cellspacing="0"
	cellpadding="">
	<tr>
		<td colspan='2' align="center"><label class="error"><?php echo $errorMsg;?></label>
		</td>
	</tr>
</table>
<table cellpadding="0px" cellspacing="0px" id='timberDetailTable'
	style="width: 886px;">
	
<?php 
  $count=0;
    if(count($transPortationDetail) > 0)
    {
    	?>
    	<tr>
		<td>Tree</td>
		<td>Transportation Type</td>
		<td>From-CP</td>
		<td>To-CP</td>
		<td>Volume</td>
		<td>Exit</td>
	</tr>
    	<?php 
    	 foreach ($transPortationDetail as $rowId=>$detail)
    	 {
    	 	
    	 	?>
    	 	
    	<tr>
		<td>
		<select disabled="disabled" onchange="checkExisting('<?php echo $count?>');" name='treeId[<?php echo $count?>]'
			id='treeId[<?php echo $count?>]' style='width: 100px'>
			<option value=''>Select A Value</option>
			<?php
			foreach($markedTreeList as $treeDetail=>$value){
				?>
			<option <?php echo ( ($detail['i_tree_id'] == $treeDetail)? "selected=selected" :"");?> value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
			<?php
			}
			?>
		</select>
		</td>
		<td>
		<select  disabled="disabled"  name='transportationType[<?php echo $count?>]' id='transportationType[<?php echo $count?>]'
			style='width: 100px' onchange="checkExisting('<?php echo $count?>');">
			<option value=''>Select A Value</option>
			<?php
			foreach ($overHeadEntry as $overHeadId=>$odetail)
			{
				?>
			<option <?php echo ( ($detail['i_overhead_id'] == $overHeadId)? "selected=selected" :"");?> value='<?php echo $overHeadId;?>'><?php echo $odetail['vc_name'];?></option>
			<?php
			}
			?>
		</select></td>
		<td>
		<?php
		   if($detail['vc_from'] == '-1')
		   {
		     echo 'Forest';
		   }
		   else 
		   {
		     echo $allForestPoints[$detail['vc_from']];
		   
		   }
		   ?>
		</td>
		<td>
		<?php
		   if($detail['vc_destination'] == '-1')
		   {
		     echo 'Forest';
		   }
		   else 
		   {
		     echo $allForestPoints[$detail['vc_destination']];
		   
		   }
		   ?>
		</td>
		<td>
		<?php echo $detail['i_volume']?></td>
		<td>
		<input disabled="disabled" type="checkbox" id='exit[<?php echo $count?>]' name='exit[<?php echo $count?>]' value='1'
			onchange="validateVolume(<?php echo $count?>);" 
			<?php echo ( ($detail['i_exit'] == 1)? "checked=checked" :"");?>  
			/></td>
			
		<td>
		<a href='indexThickBox.php?page=transportationEntryEcoDelete&markId=<?php echo $markDetailId;?>&id=<?php echo $rowId;	?>' >Delete </a>
		</td>	
		
	</tr>
    	 	
    	 	<?php 
    	 $count++;
    	 }
    }
    else
    {
     echo "No Record Entered,Please click  Add More For making entry ";
    }
?>
</table>
<table>
	<tr>

		<td colspan="2" align="center">
	<?php 	
	if($fromRSD == 1)
	{
		?> 
		
		<table style="width: 40%">
			<tr>
				<td><input type="button" name="Cancel" id="Cancel" value="Cancel"
					onclick="javascript:parent.location='index.php?page=transportationHomefromRSD&markId=<?php echo $markDetailId;?>'" /></td>
				<td colspan="2" align="right"><input type="button" name="Cancel" id="Cancel" value="Add More"
					onclick="javascript:parent.location='index.php?page=transportationEntryNewfromRSD&progressId=<?php echo $progressId;?>&markId=<?php echo $markDetailId;?>'" /></td>
			</tr>
		</table>
		<?php
	}
	else
	{
		?> 
		
		<table style="width: 40%">
			<tr>
				<td><a href='indexThickBox.php?page=transportationEntryEco&markId=<?php echo $markDetailId;?>' >Cancel</a></td>
				<td colspan="2" align="right">
				<a href='indexThickBox.php?page=transportationEntryEco&progressId=<?php echo $progressId;?>&markId=<?php echo $markDetailId;?>' >
				Add More</a>
				</td>
			</tr>
		</table>
		<?php
	}
	?>
				
		</td>
	</tr>
	<tr>
		<td colspan=2><br></br>

		</td>
	</tr>
</table>
</form>
			<?php
}
else
{
	?>
<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
	<tr>
		<td>There is no felling for this Lot</td>
	</tr>
	<tr>
		<td>
		<form method="post" action=""><input type='submit' class='btnStatus'
			name='cancel' value='Cancel' /></form>
		</td>

	</tr>

</table>
	<?php
}
?>

