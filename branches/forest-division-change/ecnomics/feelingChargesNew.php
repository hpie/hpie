<?php 
$markDetailId=$_GET['markId'];
$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
//$arrMarkDetail=12;


if(isset($_POST['update'])){
	extract($_POST);

	$timberDetailArray =array();
	$count=0;

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
	echo $ecnomicsId;
	/**
	 * Block Added For checking the condition
	 */

	$arrCondition = array('i_mark_id'=>$markDetailId,'i_ecnomics_master_id'=>$ecnomicsId);
	$db->delete('ecnomics_felling_chargs',$arrCondition);

	
		$c_tree_filling_detail['i_mark_id']=$markDetailId;

		$c_tree_filling_detail['i_ecnomics_master_id']=$ecnomicsId;
		$c_tree_filling_detail['i_felling_charges']=$charges ;
		$c_tree_filling_detail['i_commission']=$comission;
		$c_tree_filling_detail['i_status']=$tree;
		$id = $db->insert('ecnomics_felling_chargs',$c_tree_filling_detail);
	
 /*
	$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
	$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);
	*/
	$common->updateEcmonicsDetails($markDetailId,$ecnomicsId);
	header("Location:".BASE_URL."indexThickBox.php?page=addProductDetial&markId=".$markDetailId);

}



$existing=$common->checkExistingEcnomics($markDetailId);
if($existing =='' )
{
	$economics_master['i_mark_id']=$markDetailId;
	$ecnomicsId = $db->insert('economics_master',$economics_master);
}
else
{
	$ecnomicsId=$existing['id'];
}

$markDetail =  new MarkDetailDO();


//$markedTreeList=$markDetail->getProgressTreesOnly($markDetailId);
$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);
$fellingCharges=$markDetail->getFellingChargesEco($ecnomicsId)



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


</head>
<style type="text/css">
	@import url(css/menu_style.css); 
</style>
<?php 
include('ecnomics/ecnomicsHeader.php');
if($ecmomicsMaster != '')
{
?>
<div>
 Last Generated On  <?php echo $ecmomicsMaster['dt_createDate']; ?> 
</div>
<?php 
}
?>
<br>

<br>
<?php 
if(count($markedTreeList) > 0)
{
?>
<form id="form" method="POST" action="">

<table style="align:center;">
	<tr>
		<td> 
			<h4>Proposed Felling  Charges of Species.</h4> 
			<input type='hidden' name='treeId' id='treeId' value='<?php echo $treeId; ?>' /> 
			<input type="hidden" value='<?php echo $markDetailId;?>' name='markId' id='markId' /> 
			<input type='hidden' value='<?php echo $progressId?>' name='updatePrevious' id='updatePrevious' />
		</td>
	</tr>
</table>


<table style="width: 75%" cellpadding="5px" cellspacing="5px"
			id='timberDetailTable_<?php echo $count;?>'>
		
			<tr>
				<td class="fill"><b>Fellin Charges</b></td>
				<td class="fill"><b><input 
				  value='<?php echo $fellingCharges[$ecnomicsId]['i_felling_charges'];?>'
				 type='text'  name='charges' id='charges' class='required number' /> </b></td>
			</tr>
				<tr>
				<td class="fill"><b>Mate Comission</b></td>
				<td class="fill"><b><input
				 value='<?php echo $fellingCharges[$ecnomicsId]['i_commission'];?>'
				 type='text' id='comission' name ='comission' class='required number' /> </b></td>
			
			</tr>	 

   <tr>
		<td colspan="3" align="center">
		<table style="width: 40%">
			<tr>
				<td colspan="2" align="right"><input type="submit" name="update"
					id="upadte" value="Finish" /></td>
			</tr>
		</table>
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
		<td>There is no Marking  for this Lot</td>
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
