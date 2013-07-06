<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$treeId=$_GET['treeId'];
$markDetail =  new MarkDetailDO();

if(isset($_POST['cancel'])){
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=conversionHome&markId=".$markDetailId);

}



	
	
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
	$db->delete('ecnomics_sale_price',$arrCondition);
	
			$totalCount=0;
			$totalVolume=0;
			foreach ($treeSalePrice as $tree=>$price)
			{
				
						$c_tree_filling_detail['i_mark_id']=$markDetailId;
						
						$c_tree_filling_detail['i_ecnomics_master_id']=$ecnomicsId;
						$c_tree_filling_detail['i_sale_pice']=$price ;
						$c_tree_filling_detail['i_status']=1;
						$c_tree_filling_detail['i_tree_id']=$tree;
						$totalCount+=$value[$timber][$index];
						$totalVolume+=$volume[$timber][$index];
						$id = $db->insert('ecnomics_sale_price',$c_tree_filling_detail);
			}
			
			$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
			$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
			$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
			$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);
			$common->updateEcmonicsDetails($markDetailId,$ecnomicsId);
			?>
<script>
		javascript:self.parent.tb_remove();
	  </script>
			<?php
	}

$markDetail =  new MarkDetailDO();
$volumeTableDetail=$markDetail->getTimberVolummeDetail();
//$markedTreeList=$markDetail->getProgressTreesOnly($markDetailId);
$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);


$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];
$treeConvertedVolume =$markDetail->getTimberDetailVolume($ecnomicsId);
$salePrice=$markDetail->getSalePrice($ecnomicsId)
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
<?php 
if(count($markedTreeList) > 0)
{
?>
<form id="form" method="POST" action="">

<table style="align:center;">
	<tr>
		<td> 
			<h4>Proposed Selling Price of Species.</h4> 
			<input type='hidden' name='treeId' id='treeId' value='<?php echo $treeId; ?>' /> 
			<input type="hidden" value='<?php echo $markDetailId;?>' name='markId' id='markId' /> 
			<input type='hidden' value='<?php echo $progressId?>' name='updatePrevious' id='updatePrevious' />
		</td>
	</tr>
</table>


<table style="width: 75%" cellpadding="5px" cellspacing="5px"
			id='timberDetailTable_<?php echo $count;?>'>
			<tr>
				<td class="fill"><b>Tree</b></td>
				<td class="fill"><b>Value To Be Sold</b></td>
				<td class="fill"><b>Sale Price</b></td>
				<td class="fill"><b>Total</b></td>
				
			</tr>	 
<?php
$count=0;
foreach($markedTreeList as $treeDetail=>$value){
$count++;
	?>
	<tr>
		<td class="fill"><?php echo $value;?></td>
		<td class="fill"><?php echo display_float($treeConvertedVolume[$treeDetail]['volume'],3);?>  m&sup3;</td>
		<td class="fill">
		<input 
		   style='width: 70px; display:inline;' 
		   type='text' 
		   name='treeSalePrice[<?php echo $treeDetail;?>]'
		   value='<?php echo $salePrice[$treeDetail]['i_sale_pice']?>'  
		   onfocus="getFocus(this);" 
		   onblur="outFocus(this,'<?php echo $count?>','<?php echo display_float($treeConvertedVolume[$treeDetail]['volume'],3);?>')"
		   
		   />
		Rs/m&sup3;    
		</td>
		<td class="fill">
		<div id='<?php echo $count;?>'>
		   
		   </div></td>
		 		
	</tr>
	<?php
}
?>

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
		<td>There is no felling  for this Lot</td>
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


<script>



function outFocus(control,itemId,volume)
{
	if(control.value=='')
	{
		control.value='0';
	}

	var total=roundNumber(parseInt(control.value) * volume,2);
	
	document.getElementById(itemId).innerHTML="Rs. <b>"+total+"</b>";
}

function roundNumber(num, dec) {
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}
function getFocus(control)
{
	if(control.value=='0')
	{
		control.value='';
		
	}
}


</script>

