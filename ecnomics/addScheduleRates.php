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
	$db->delete('ecnomics_schedule_rates',$arrCondition);
	
	
			foreach ($timberScheduleRate as $timberTypeId=>$rate)
			{
				
						$c_tree_filling_detail['i_mark_id']=$markDetailId;
						$c_tree_filling_detail['i_ecnomics_master_id']=$ecnomicsId;
						$c_tree_filling_detail['i_timber_type_id']=$timberTypeId ;
						$c_tree_filling_detail['i_total_volume']=$totalVolume[$timberTypeId];
						$c_tree_filling_detail['i_scedule_rate']=$rate;
						$c_tree_filling_detail['i_amount']=$amount[$timberTypeId];
						$c_tree_filling_detail['i_sm']=$sm[$timberTypeId];
						$c_tree_filling_detail['i_sm_value']=$smValue[$timberTypeId];
						
						$c_tree_filling_detail['i_matecomission']=$comission[$timberTypeId];
						$c_tree_filling_detail['i_comission_value']=$comission_value[$timberTypeId];
						
						$c_tree_filling_detail['i_total_cost']=$total[$timberTypeId];;
						$c_tree_filling_detail['i_average']=$average[$timberTypeId];;
						$id = $db->insert('ecnomics_schedule_rates',$c_tree_filling_detail);
			}
			
			$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
			$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
			$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
			$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);
			$common->updateEcmonicsDetails($markDetailId,$ecnomicsId);
	 ob_end_clean();
	 header("location:indexThickBox.php?page=addEcnomicsOverHead&markId=".$_REQUEST['markId']);
	
	}

$markDetail =  new MarkDetailDO();
$volumeTableDetail=$markDetail->getTimberVolummeDetail();
$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);

$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];
$timberName =$markDetail->getEcnomicsConvertedTimberName($ecnomicsId);
$timberDetail =$markDetail->getTimberDetailVolumeTimberWise($ecnomicsId);
$timberDetail =$markDetail->getTimberDetailVolumeTimberWise($ecnomicsId);
$getRateDetail =$markDetail->getSaleRateDetail($ecnomicsId);
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
if(count($timberName) > 0)
{
	$cols=0;
?>
<form id="form" method="POST" action=""><input type='hidden'
	name='treeId' id='treeId' value='<?php echo $treeId; ?>' /> <input
	type="hidden" value='<?php echo $markDetailId;?>' name='markId'
	id='markId' /> <input type='hidden' value='<?php echo $progressId?>'
	name='updatePrevious' id='updatePrevious' />

<table style="align:center;">
	<tr>
		<td> <h4>Conversion Charges Species wise/Kind wise and Schedule Rates.</h4> </td>
	</tr>
</table>

<table cellpadding="5px" cellspacing="5px"
	id='timberDetailTable_<?php echo $count;?>' border="1" >
	<tr>
		<td class="fill">KIND</td>
		<?php
		foreach($markedTreeList as $tree=>$value){
			$cols++;
			?>
		<td class="fill"><?php echo $value;?></td>
		<?php
		}
		?>
		<td class="fill">Total Volume</td>
		<td class="fill">Schedule&nbsp;rate (Rs.)</td>
		<td class="fill">Amount</td>
		<td class="fill">Scattered Marking(%)</td>
		<td class="fill">Scattered Marking<br> Charges</td>
		<td class="fill">Mate&nbsp;commission<br>&nbsp;(%)   </td>
		<td class="fill">Mate&nbsp;Charges<br></td>
		
		<td class="fill">Total</td>
		<td class="fill">Average</td>
	</tr>
	
	
	
		 
<?php
 $total=0;
foreach($timberName as $timberTypeId=>$value){
	$total=0;
	?>
	<tr>
		<td class="fill"><?php echo $value['timber'].'/'.$value['timberType'];?></td>
		<?php
		foreach($markedTreeList as $tree=>$value){
			$total+=$timberDetail[$tree][$timberTypeId]['volume'];
			?>
		<td class="fill" align="right" nowrap><?php echo display_float($timberDetail[$tree][$timberTypeId]['volume'] == '' ? '0' :$timberDetail[$tree][$timberTypeId]['volume'],3) ;?> m&sup3;</td>
		<?php
		}
  ?>
     <td class="fill" align="right" nowrap>
       <?php echo display_float($total,3);?> m&sup3;
         <input type='hidden'  value=' <?php echo display_float($total,3);?>' name='totalVolume[<?php echo $timberTypeId;?>]'
        id='totalVolume[<?php echo $timberTypeId;?>]'
        onblur="calculateDependcies('<?php echo $timberTypeId?>')" />
       
    </td>
    <td class="fill">
       <input value='<?php echo $getRateDetail[$timberTypeId]['i_scedule_rate'] ?>'
        type='text' name='timberScheduleRate[<?php echo $timberTypeId;?>]'
        id='timberScheduleRate[<?php echo $timberTypeId;?>]'
        onblur="calculateDependcies('<?php echo $timberTypeId?>')" onfocus="getFocus(this)" /> 
    </td>
   <script>
      function calculateDependcies(timberId)
      {
          
           var totalVolume=document.getElementById("totalVolume["+timberId+"]").value;
           var scheduleRate=document.getElementById("timberScheduleRate["+timberId+"]").value;
           var amount=totalVolume*scheduleRate;
            document.getElementById("amount["+timberId+"]").value=amount;
            var comission_per=document.getElementById("comission["+timberId+"]").value;
            var comission= amount * comission_per/100;
            document.getElementById("comission_value["+timberId+"]").value=comission; 
            var scatterMarking=document.getElementById("sm["+timberId+"]").value;
        	    scatterMarking= amount * scatterMarking/100;
        	document.getElementById("smValue["+timberId+"]").value=scatterMarking; 
            var totalCost= amount+  comission+scatterMarking;
            document.getElementById("total["+timberId+"]").value=totalCost; 
            var average=totalCost/totalVolume;
            document.getElementById("average["+timberId+"]").value=roundNumber(average,2); 

            
           
       }
   </script>
    
    <td class="fill" align="right" nowrap>
       <input style="background-color: #dcdcdc; width:50px;"
       value='<?php echo $getRateDetail[$timberTypeId]['i_amount'] ?>'
       readonly="readonly"  type='text' name='amount[<?php echo $timberTypeId;?>]'
        id='amount[<?php echo $timberTypeId;?>]'
        /> 
    </td>
	<td class="fill">
       <input 
         value='<?php echo $getRateDetail[$timberTypeId]['i_sm'] ?>'
         style="width:50px" onblur="calculateDependcies('<?php echo $timberTypeId?>')" 
         type='text' name='sm[<?php echo $timberTypeId;?>]'
        id='sm[<?php echo $timberTypeId;?>]'
        />
    </td>

    <td class="fill" align="right">
     
        <input style="background-color: #dcdcdc; width:50px;"
         value='<?php echo $getRateDetail[$timberTypeId]['i_sm_value'] ?>'
         readonly="readonly" 
         type='text' name='smValue[<?php echo $timberTypeId;?>]'
        id='smValue[<?php echo $timberTypeId;?>]'
        />  
    </td>
    
     <td class="fill">
       <input 
         value='<?php echo $getRateDetail[$timberTypeId]['i_matecomission'] ?>'
         style="width:50px" onblur="calculateDependcies('<?php echo $timberTypeId?>')" 
         type='text' name='comission[<?php echo $timberTypeId;?>]'
        id='comission[<?php echo $timberTypeId;?>]'
        />
    </td>
     <td class="fill" align="right" nowrap>
       
       <input style="background-color: #dcdcdc; width:50px;"
         value='<?php echo $getRateDetail[$timberTypeId]['i_comission_value'] ?>'
         readonly="readonly" 
         type='text' name='comission_value[<?php echo $timberTypeId;?>]'
        id='comission_value[<?php echo $timberTypeId;?>]'
        />  
    </td>
    <td class="fill" align="right" nowrap>
       
       <input style="background-color: #dcdcdc; width:50px;"
       value='<?php echo $getRateDetail[$timberTypeId]['i_total_cost'] ?>'
       readonly="readonly"  type='text' name='total[<?php echo $timberTypeId;?>]'
        id='total[<?php echo $timberTypeId;?>]'
        /> 
    </td>
	
    <td class="fill" align="right" nowrap>
       
       <input style="background-color: #dcdcdc; width:50px;"
       value='<?php echo $getRateDetail[$timberTypeId]['i_average'] ?>'
       readonly="readonly"  type='text' name='average[<?php echo $timberTypeId;?>]'
        id='average[<?php echo $timberTypeId;?>]'
        /> 
    </td>
	</tr>
	<?php
}
?>

	<tr>
		<td colspan="<?php echo ($cols+7);?>" align="right">
			&nbsp;
		</td>
		<td colspan="3" align="right">
			<input type="submit" name="update" id="upadte" value="Save & Next" />
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



function outFocus(control)
{
	if(control.value=='')
	{
		control.value='0';
	}
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

