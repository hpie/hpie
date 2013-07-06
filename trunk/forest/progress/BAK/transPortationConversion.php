<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$timberDO =  new TimberDO();
$timberlist=$timberDO->getTimberList();
$arrAllcontractors=$common->getAllcontractors();
$treeId=$_GET['treeId'];
$timberPreviousValue = array();
$timberPreviousVolume = array();
$timberCurrentValue = array();
$timberCurrentVolume = array();
$treeFillingArray=getArrayFromSession('treeFillingArray');
$pre_vol  =$treeFillingArray[$treeId]->previousVolume;
$cur_vol  =$treeFillingArray[$treeId]->currentVolume;
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
		$list=$common->selectCondition('progress_transportation_master', $arFieldValues);
		$existingDetail=count($list);
	}
	if($existingDetail > 0 && ($updatePrevious == '' || $updatePrevious==0))
	{
		$errorMsg    ="Entry Already Exists for ".$_POST['month']."/".$_POST['year'] ."of this contractor ";
	}
	else
	{

		if($updatePrevious =='')
		{
			$arMarkedPrice['i_mark_id']=$markDetailId;
			$arMarkedPrice['vc_month']=$i_month_id;
			$arMarkedPrice['vc_year']=$i_year;
				
			$progressConversionId = $db->insert('progress_transportation_master',$arMarkedPrice);
		}
		else
		{
			$progressConversionId=$updatePrevious;
		}
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
			$id = $db->insert('progress_transportation_detail',$c_tree_filling_detail);
		}
			

		ob_end_clean();
		header("location:index.php?page=transportationHome&markId=".$_REQUEST['markId']);

	}

}

//$markList=$markDetail->getTreeMarkDetail($markDetailId,$treeId);

if($progressId != '' && $progressId > 0)
{

	$arFieldValues['id']=$progressId;
	$progressMasterDetail=$common->selectCondition('progress_transportation_master', $arFieldValues);
	$i_contractor_id=$progressMasterDetail[0]['i_contractor_id'];
	$i_month_id=$progressMasterDetail[0]['vc_month'];
	$i_year=$progressMasterDetail[0]['vc_year'];
	$preViousTimbedetail=$markDetail->getprogressConversionDetail($progressId);
	$transPortationDetail=$markDetail->getprogressTransportationDetailComplete($progressId);

}
$overHeadEntry=$common->getOverheadEntity($markDetailId);
$markedTreeList=$markDetail->getProgressTreesOnly($markDetailId);

$progressConversion =$markDetail->getProgressConversionTreeWise($markDetailId);

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
<style type="text/css">
@import url(css/menu_style.css);
</style>
<ul id="menu">
	<li><a id="<?php echo pageUrl("home",$currentPage)?>"
		href="index.php?page=conversionHome&markId=<?php echo $markDetailId;?>"
		title="Goto Home Page">Back</a></li>
</ul>
<br>
<br>
<?php
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

<div style='display: none;'><select id='treeMaster'>
	<option value=''>Select A Value</option>
	<?php
	foreach($markedTreeList as $treeDetail=>$value){
		?>
	<option value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
	<?php
	}
	?>
</select> <select id='transportMaster'>
	<option value=''>Select A Value</option>
	<?php
	foreach ($overHeadEntry as $overHeadId=>$detail)
	{
		?>
	<option value='<?php echo $overHeadId;?>'><?php echo $detail['vc_name'];?></option>
	<?php
	}
	?>
</select> <?php echo makeSelectOptions($arrAllcontractors,"contractorMaster",$i_contractor_id,"",0,"");?>
</div>
<table align="center" width="90%" border="0" cellspacing="0"
	cellpadding="">
	<tr>
		<td colspan="2" align="center"><b>Trees Filled</b> <br></br>
		</td>
	</tr>
	<tr>
		<td colspan='2' align="center"><label class="error"><?php echo $errorMsg;?></label>
		</td>
	</tr>


	<tr>
		<td>For Month/Year</td>
		<td>
		<table border=0 align="left">
		<?php
		if($progressId > 0)
		{
			?>
			<tr>
				<td width="30%"><?php echo $arrMonths[$i_month_id];?>/<?php echo $arrYears[$i_year];?></td>
				<td><input name='i_month_id' type='hidden'
					value='<?php echo $i_month_id;?>' /> <input name='i_year'
					type='hidden' value='<?php echo $i_year;?>' /></td>
			</tr>
			<?php
		}
		else
		{
			?>
			<tr>
				<td width="30%"><?php echo makeSelectOptions($arrMonths,"i_month_id",$i_month_id,"",150,"class='required'");?></td>
				<td><?php echo makeSelectOptions($arrYears,"i_year",$i_year,"",70,"class='required'");?></td>
			</tr>
			<?php
		}
		?>
		</table>
		</td>
	</tr>
</table>
<br>
<table cellpadding="0px" cellspacing="0px" id='timberDetailTable'
	style="width: 886px;">
	<tr>
		<td>Tree</td>
		<td>Transportation Type</td>
		<td>Contractor</td>
		<td>Source Point</td>
		<td>Destination Point</td>
		<td>Volume</td>
		<td>Charges</td>
		<td>Exit</td>
	</tr>

<?php 

  $count=0;
    if(count($transPortationDetail) > 0)
    {
    	
    	 foreach ($transPortationDetail as $rowId=>$detail)
    	 {
    	 	?>
    	 	
    	<tr>
		<td><select onchange="checkExisting('<?php echo $count?>');" name='treeId[<?php echo $count?>]'
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
		<td><select   name='transportationType[<?php echo $count?>]' id='transportationType[<?php echo $count?>]'
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
		<?php echo makeSelectOptions($arrAllcontractors,"contract[".$count."]",$i_contractor_id,"",100,"class='required'");?>
		</td>
		<td>
		<input type='text' 
		       id='source[<?php echo $count?>]' name='source[<?php echo $count?>]' 
		    value='<?php echo $detail['vc_from']?>'/>
		    
		<?php echo makeSelectOptions($arrAllcontractors,"contract[".$count."]",$i_contractor_id,"",100,"class='required'");?>
		    
		</td>
		<td>
			<input type='text' id='destination[<?php echo $count?>]' name='destination[<?php echo $count?>]' 
			value='<?php echo $detail['vc_destination']?>'
			/>
		</td>
		<td><input type='text' id='volume[<?php echo $count?>]' name='volume[<?php echo $count?>]'
			onfocus="getFocus(this)" onblur="validateVolume(<?php echo $count?>);"
				value='<?php echo $detail['i_volume']?>' /></td>
		<td><input type='text' id='charges[<?php echo $count?>]' name='charges[<?php echo $count?>]'
		  	value='<?php echo $detail['i_charges']?>'  /></td>
		<td><input type="checkbox" id='exit[<?php echo $count?>]' name='exit[<?php echo $count?>]' value='1'
			onchange="validateVolume(<?php echo $count?>);" 
			<?php echo ( ($detail['i_exit'] == 1)? "checked=checked" :"");?>  
			/></td>
		<td  style='text-align: right;'>
		<?php 
		if($count ==0)
		{
		?>
		<input type='button'
			onclick="addMore('<?php echo $count?>')" value='Add More' /></td>
       <?php 
		}
       ?>
	</tr>
    	 	
    	 	<?php 
    	 $count++;
    	 }
    }
    else
    {
?>

	<tr>
		<td><select onchange="checkExisting('0');" name='treeId[0]'
			id='treeId[0]' style='width: 100px'>
			<option value=''>Select A Value</option>
			<?php
			foreach($markedTreeList as $treeDetail=>$value){
				?>
			<option value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
			<?php
			}
			?>
		</select></td>
		<td><select name='transportationType[0]' id='transportationType[0]'
			style='width: 100px' onchange="checkExisting('0');">
			<option value=''>Select A Value</option>
			<?php
			foreach ($overHeadEntry as $overHeadId=>$detail)
			{
				?>
			<option value='<?php echo $overHeadId;?>'><?php echo $detail['vc_name'];?></option>
			<?php
			}
			?>
		</select></td>
		<td><?php echo makeSelectOptions($arrAllcontractors,"contract[0]",$i_contractor_id,"",100,"class='required'");?>
		</td>
		<td><input type='text' id='source[0]' name='source[0]' /></td>
		<td><input type='text' id='destination[0]' name='destination[0]' /></td>
		<td><input type='text' id='volume[0]' name='volume[0]'
			onfocus="getFocus(this)" onblur="validateVolume(0);" /></td>
		<td><input type='text' id='charges[0]' name='charges[0]' /></td>
		<td><input type="checkbox" id='exit[0]' name='exit[0]' value='1'
			onchange="validateVolume(0);" /></td>
		<td colspan="20" style='text-align: right;'><input type='button'
			onclick="addMore('0')" value='Add More' /></td>

	</tr>

<?php 
    }
?>
</table>
<table>
	<tr>

		<td colspan="2" align="center">
		<table style="width: 40%">
			<tr>
				<td><input type="button" name="Cancel" id="Cancel" value="Cancel"
					onclick="javascript:parent.location='index.php?page=conversionHome&markId=<?php echo $markDetailId;?>'" /></td>
				<td colspan="2" align="right"><input type="submit" name="update"
					id="upadte" value="Update" /></td>
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
<script>
function getFocus(control)
{
	if(control.value=='0')
	{
		control.value='';
		
	}
}
function outFocus(control)
{
	if(control.value=='')
	{
		control.value='0';
	}
}
function addMore(existingValue)
{
	var table = document.getElementById('timberDetailTable');
	var treeMaster = document.getElementById('treeMaster');
	var transportMaster = document.getElementById('transportMaster');
	var contractMaster = document.getElementById('contractorMaster');
	
	
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var cell1 = row.insertCell(0);
	var element1 = document.createElement("select");
        
        element1.name="treeId["+rowCount+"]";
       // element1.id="i_timber_id_"+(rowCount);;
        element1.id="treeId["+rowCount+"]";
        element1.setAttribute("onChange", "checkExisting('"+rowCount+"');");
        
        for (i=0; i< treeMaster.options.length; i++)
        {
                SelID=treeMaster.options[i].value;
                SelText=treeMaster.options[i].text;
                var newRow = new Option(SelText,SelID);
                element1.options[element1.length]=newRow;
            }
	cell1.appendChild(element1);

	var cell2 = row.insertCell(1);
	var element1 = document.createElement("select");
   
    element1.name="transportationType["+rowCount+"]";
   // element1.id="i_timber_id_"+(rowCount);;
    element1.id="transportationType["+rowCount+"]";
    element1.setAttribute("onChange", "checkExisting('"+rowCount+"');");
    
    
    for (i=0; i< transportMaster.options.length; i++)
    {
            SelID=transportMaster.options[i].value;
            SelText=transportMaster.options[i].text;
            var newRow = new Option(SelText,SelID);
            element1.options[element1.length]=newRow;
        }
	cell2.appendChild(element1);

	var cell2 = row.insertCell(2);
	var element1 = document.createElement("select");
    
    element1.name="contract["+rowCount+"]";
   // element1.id="i_timber_id_"+(rowCount);;
    element1.id="contract["+rowCount+"]";
    element1.setAttribute("onChange", "checkExisting('"+rowCount+"');");
    
    
    for (i=0; i< contractMaster.options.length; i++)
    {
            SelID=contractMaster.options[i].value;
            SelText=contractMaster.options[i].text;
            var newRow = new Option(SelText,SelID);
            element1.options[element1.length]=newRow;
        }
	cell2.appendChild(element1);


	var cell2 = row.insertCell(3);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="source["+rowCount+"]";
	elementcount.id="source["+rowCount+"]";
	cell2.appendChild(elementcount);
	
	var cell2 = row.insertCell(4);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="destination["+rowCount+"]";
	elementcount.id="destination["+rowCount+"]";
	cell2.appendChild(elementcount);

	var cell2 = row.insertCell(5);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="volume["+rowCount+"]";
	elementcount.id="volume["+rowCount+"]";
//	elementcount.setAttribute("onBlur", "outFocus(this)");
	elementcount.setAttribute("onBlur", "validateVolume('"+rowCount+"')");
	
	elementcount.setAttribute("onFocus", "getFocus(this)");
	cell2.appendChild(elementcount);
	
	var cell2 = row.insertCell(6);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="charges["+rowCount+"]";
	elementcount.id="charges["+rowCount+"]";
	elementcount.setAttribute("onBlur", "outFocus(this)");
	elementcount.setAttribute("onFocus", "getFocus(this)");
	cell2.appendChild(elementcount);

	var cell2 = row.insertCell(7);
	var elementcount = document.createElement("input");
	elementcount.type = "checkbox";
	elementcount.value='1';
	elementcount.name="exit["+rowCount+"]";
	elementcount.id="exit["+rowCount+"]";
	elementcount.setAttribute("onClick", "validateVolume('"+rowCount+"')");
	cell2.appendChild(elementcount);
	
}
function validateVolume(varCount)
{
	var table = document.getElementById('timberDetailTable');
	var rowCount = table.rows.length;
	var totalExit=0;
	var totalExitToInventory=0;
	

	var valueTreeId=document.getElementById("treeId["+varCount+"]").value;
	var transportationType=document.getElementById("transportationType["+varCount+"]").value;
	if(valueTreeId =='' || transportationType == '')
	{
		   
		   document.getElementById("volume["+varCount+"]").value=0;
	  		return;
	}	
	for(var i=0 ;i<= rowCount ;i++)
	{
	   try
	   {
		  
		    if(document.getElementById("treeId["+i+"]")  != null)
		    {
			    
              if(document.getElementById("treeId["+i+"]").value == valueTreeId )
              {

            	  totalExit+=parseFloat(document.getElementById("volume["+i+"]").value);
              }
		    }
		    if(varCount != i)
			   {
              if(document.getElementById("treeId["+i+"]").value == valueTreeId  && document.getElementById("exit["+i+"]").checked )
              {

            	  totalExitToInventory+=parseFloat(document.getElementById("volume["+i+"]").value);
              }
			}
	     
	   }
	   catch(error)
	   {
	   }	
	}
  alert(document.getElementById("volume["+varCount+"]").value+"totalExitToInventory"+totalExitToInventory);
	if(document.getElementById("volume["+varCount+"]").value > parseFloat(document.getElementById(valueTreeId).value-totalExitToInventory))
	{
		document.getElementById("volume["+varCount+"]").value=0;
	     alert("Not Able to move more value at conversion");
	}
}

function checkExisting(varCount)
{
	var table = document.getElementById('timberDetailTable');
	var rowCount = table.rows.length;
	

	var valueTreeId=document.getElementById("treeId["+varCount+"]").value;
	var transportationType=document.getElementById("transportationType["+varCount+"]").value;
	
	for(var i=0 ;i<= rowCount ;i++)
	{
	   try
	   {
		  
		   if(varCount != i)
		   {
		    if(document.getElementById("treeId["+i+"]")  != null)
		    {
			    
              if(document.getElementById("treeId["+i+"]").value == valueTreeId && document.getElementById("transportationType["+i+"]").value	 == transportationType )
              {

            	  document.getElementById("treeId["+varCount+"]").value='';
            	  document.getElementById("transportationType["+varCount+"]").value='';
                alert("Value Already Selected");  
              }
			}
		   }
	   }
	   catch(error)
	   {
	   }	
	}

	validateVolume(varCount);
}
</script>

