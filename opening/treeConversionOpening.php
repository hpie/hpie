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

	if($updatePrevious != '0')
	{
		$existingDetail=0;
	}
	else
	{
		$arFieldValues['i_mark_id']=$markDetailId;
		$arFieldValues['i_contractor_id']=$i_contractor_id;
		$arFieldValues['vc_month']=$i_month_id;
		$arFieldValues['vc_year']=$i_year;
		$list=$common->selectCondition('opening_progress_conversion_master', $arFieldValues);
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
			$arMarkedPrice['i_contractor_id']=$i_contractor_id;
			$arMarkedPrice['vc_month']=$i_month_id;
			$arMarkedPrice['vc_year']=$i_year;
			$arMarkedPrice['i_total_marked']=0;
			$arMarkedPrice['i_total_Volume']=0;
			$progressConversionId = $db->insert('opening_progress_conversion_master',$arMarkedPrice);
		}
		else
		{
			$progressConversionId=$updatePrevious;
		}

		

			$db->deleteProgressDetail($progressConversionId);
			$db->deleteProgressConversionCharges($progressConversionId);	
			$totalCount=0;
			$totalVolume=0;
			foreach ($i_timber_id_ as $timber=>$array)
			{
				$treeArray=$i_tree_id[$timber];
				foreach ($array as $index=>$selectedType)
				{

					if($selectedType != '')
					{

						$c_tree_filling_detail['i_timber_id']=$timber;
						$c_tree_filling_detail['i_timber_type_id']=$selectedType;
						$c_tree_filling_detail['i_progress_id']=$progressConversionId;
						$c_tree_filling_detail['i_current_count']=$value[$timber][$index] ;
						$c_tree_filling_detail['i_current_volume']=$volume[$timber][$index];
						$c_tree_filling_detail['i_status']=1;
						$c_tree_filling_detail['i_tree_id']=$treeArray[$index];
						$c_tree_filling_detail['i_conversion_charges']=$volume[$timber][$index]* $fellingCharges[$timber] ;

						$totalCount+=$value[$timber][$index];
						$totalVolume+=$volume[$timber][$index];
						$id = $db->insert('opening_progress_conversion_detail',$c_tree_filling_detail);

					}
				}
			}
			
				
			
				
		 $arCondition = array('id'=>$progressConversionId);
		 $arFieldValues['i_total_marked']=$totalCount;
		 $arFieldValues['i_total_Volume']=$totalVolume;
		 	
		 $id = $db->update('opening_progress_conversion_master',$arFieldValues,$arCondition);
		 ob_end_clean();
		 header("location:index.php?page=conversionHomeOpening&markId=".$_REQUEST['markId']);
	
	}

}

//$markList=$markDetail->getTreeMarkDetail($markDetailId,$treeId);

if($progressId != '' && $progressId !='')
{

	$arFieldValues['id']=$progressId;
	$progressMasterDetail=$common->selectCondition('opening_progress_conversion_master', $arFieldValues);
	$i_contractor_id=$progressMasterDetail[0]['i_contractor_id'];
	$i_month_id=$progressMasterDetail[0]['vc_month'];
	$i_year=$progressMasterDetail[0]['vc_year'];
	$preViousTimbedetail=$markDetail->getprogressConversionDetailOpening($progressId);
	
   
}

$markedTreeList=$markDetail->getTreesOpeningOnly($markDetailId);

//Need to Add Check  For Validating the Fucntions


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
<?php 
if(count($markedTreeList) > 0)
{
?>
<form id="form" method="POST" action=""><input type='hidden'
	name='treeId' id='treeId' value='<?php echo $treeId; ?>' /> <input
	type="hidden" value='<?php echo $markDetailId;?>' name='markId'
	id='markId' /> <input type='hidden' value='<?php echo $progressId?>'
	name='updatePrevious' id='updatePrevious' />

<div style='display: none;'><select id='treeMaster'>
<?php
foreach($markedTreeList as $treeDetail=>$value){
	?>
	<option value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
	<?php
}
?>
</select></div>
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
				<td width="30%">
				<?php echo $arrMonths[$i_month_id];?>/<?php echo $arrYears[$i_year];?></td>
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
				<td width="30%">
				<input name='i_month_id' type='hidden'
					value='1' />
				<?php echo makeSelectOptions($arrYears,"i_year",$i_year,"",70,"class='required'");?></td>
			</tr>
			<?php
		}
		?>
		</table>
		</td>
	</tr>
</table>
	
<table>
	<tr>
		<td colspan=2><!--start 1st div-->

		<div class="basic" style="float: left;" id="list1b"><?php
		if(isset($timberlist))
		{ $count=0;
		foreach($timberlist as $k){
			?> <a><?php echo $k->vc_name; ?>:</a>
		<div style='display: block;'>

		<table cellpadding="5px" cellspacing="5px"
			id='timberDetailTable_<?php echo $count;?>'>
			<tr>
				<td class="fill">Tree</td>
				<td class="fill">Timber</td>
				<td class="fill">Current Count</td>
				<td class="fill">Current Volume</td>
			</tr>
			<?php
			$arrAllTimberType=$common->getAllTimberType($timberlist[$count]->id);
			?>
			<tr>
				<td colspan='4'>
				<div style='display: none;'><?php 
				$arrayList=$volumeTableDetail[$k->id];
				foreach($arrayList as $k1=>$detail){


					?> <input type='hidden' value='<?php echo $detail['volume']; ?>'
					id='<?php echo $k1;?>' /> <?php
				}
					
				echo makeTimberlist($arrAllTimberType,"timberMaster_[".$k->id."]",$treetype_id,"",0,"");
				?></div>
				</td>
			</tr>
			<?php
			$arrayResult=$preViousTimbedetail[$k->id];
			
			$existingCount=0;
			if( $arrayResult != '' && count($arrayResult) > 0)
			{
				foreach($arrayResult as $treeId=>$resultDetailTimber){	
				foreach($resultDetailTimber as $timberStoredType=>$resultDetail){
					$existingCount++;
					
					?>
			<tr>
				<td><select
					id='i_tree_id[<?php echo $k->id;?>][<?php echo $existingCount;?>]'
					name='i_tree_id[<?php echo $k->id;?>][<?php echo $existingCount;?>]'>
					<?php
					foreach($markedTreeList as $treeDetail=>$value){
						if($resultDetail['i_tree_id']==$treeDetail)
						$selected= "selected";
						else
						$selected="";
						?>
					<option <?php echo  $selected?> value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
					<?php
					}
					?>
				</select></td>
				<td><?php 
				echo makeTimberlist($arrAllTimberType,"i_timber_id_[".$k->id."][".$existingCount."]",$timberStoredType,"selectValuesIndex(\"timberDetailTable_".$count."\",\"i_timber_id_[".$k->id."][".$existingCount."]\",\"". $k->id."\",\"i_tree_id[". $k->id."][". $existingCount."]\")",".$existingCount.","");
				?></td>
				<td><input
					onblur="outFocus(this,'i_timber_id_[<?php echo $k->id;?>][<?php echo $existingCount;?>]','<?php echo $k->id;?>','<?php echo $existingCount;?>')"
					onfocus="getFocus(this);" size="5" class="number"
					name="value[<?php echo $k->id;?>][<?php echo $existingCount;?>]"
					id="value[<?php echo $k->id;?>][<?php echo $existingCount;?>]"
					value="<?php echo $resultDetail['i_current_count'];?>" /></td>
				<td><input readonly size="5" class="number"
					name="volume[<?php echo $k->id;?>][<?php echo $existingCount;?>]"
					id="volume[<?php echo $k->id;?>][<?php echo $existingCount;?>]"
					value="<?php  echo $resultDetail['i_current_volume']; ?>" /></td>
				<td valign="top"><?php 
				if($existingCount==1)
				{
					?> <input type='button'
					onclick="addMore('timberDetailTable_<?php echo $count;?>','1','1','timberMaster_[<?php echo $k->id;?>]','<?php echo $k->id ?>')"
					value='Add More' /> <?php 
				}
				?></td>
				<td><input type='hidden' value=''
					name='selectValues<?php $count; ?>'
					id='selectValues<?php echo  $count ;?>' /></td>
			</tr>

			<?php
				}
				}
			}
			else
			{
				?>
			<tr>
				<td><select id='i_tree_id[<?php echo $k->id;?>][0]'
					name='i_tree_id[<?php echo $k->id;?>][0]'>
					<?php
					foreach($markedTreeList as $treeDetail=>$value){
						?>
					<option value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
					<?php
					}
					?>
				</select></td>

				<td><?php 
				echo makeTimberlist($arrAllTimberType,"i_timber_id_[".$k->id."][0]",$treetype_id,"selectValuesIndex(\"timberDetailTable_".$count."\",\"i_timber_id_[".$k->id."][0]\",\"0\",\"i_tree_id[".$k->id."][0]\")",0,"");
				?></td>
				<td><input
					onblur="outFocus(this,'i_timber_id_[<?php echo $k->id;?>][0]','<?php echo $k->id;?>','0')"
					onfocus="getFocus(this);" size="5" class="number"
					name="value[<?php echo $k->id;?>][0]"
					id="value[<?php echo $k->id;?>][0]" value="0" /></td>
				<td><input readonly size="5" class="number"
					name="volume[<?php echo $k->id;?>][0]"
					id="volume[<?php echo $k->id;?>][0]" value="0" /></td>
				<td><input type='button'
					onclick="addMore('timberDetailTable_<?php echo $count;?>','1','1','timberMaster_[<?php echo $k->id;?>]','<?php echo $k->id ?>')"
					value='Add More' /></td>
				<td><input type='hidden' value=''
					name='selectValues<?php $count; ?>'
					id='selectValues<?php echo  $count ;?>' /></td>
			</tr>
			<?php
			}
			?>

		</table>
		</div>
		<?php $count++; } ?> <!--end 1st div--> <?php
		}
		?></div>




		</td>
	</tr>

	<tr>

		<td colspan="2" align="center">
		<table style="width: 40%">
			<tr>
				<td><input type="button" name="Cancel" id="Cancel" value="Cancel"
					onclick="javascript:parent.location='index.php?page=conversionHomeOpening&markId=<?php echo $markDetailId;?>'" /></td>
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

function selectValuesIndex(tableID,currentSelect,key,treeId)
{

    var table = document.getElementById(tableID);
	var currentValue =document.getElementById(currentSelect).value; 
	
	var currentSelectedTree=document.getElementById(treeId).value
	var rowCount = table.rows.length;
	for(i =0 ;i <rowCount ;i++)
	{

	 
         try 
         {
        	if( currentValue  == document.getElementById('i_timber_id_['+key+']['+i+']').value && ('i_timber_id_['+key+']['+i+']') != currentSelect )
        	{
               if(currentSelectedTree==document.getElementById('i_tree_id['+key+']['+i+']').value)
               {
            	   alert('Value Already Entered');
            	   document.getElementById(currentSelect).value='';
                     
               }
            }
         }
         catch(erro)
         {
        
         }
      
	}
   
	
	
}
function outFocus(control,i_timberDetail,rowindex,columnIndex)
{
	if(control.value=='')
	{
		control.value='0';
	}
	var selectedValue=document.getElementById(i_timberDetail).value;
	document.getElementById('volume['+rowindex+']['+columnIndex+']').value=roundNumber(parseFloat(document.getElementById(selectedValue).value) * parseFloat(control.value),2) ;
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

function addMore(tableID,value_id,count_id,masterSelect,key)
{

	var table = document.getElementById(tableID);
	var SS1 = document.getElementById(masterSelect);
	var treeMaster = document.getElementById('treeMaster');
	

	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);

	var cell1 = row.insertCell(0);
	var element1 = document.createElement("select");
        element1.style.width='160px';
        element1.onChange="selectValuesIndex('"+tableID+"','i_timber_id_"+(rowCount)+"')";
        element1.setAttribute("onChange", "selectValuesIndex('"+tableID+"','i_timber_id_["+key+"]["+(rowCount)+"]','"+key+"')");
        element1.name="i_tree_id["+key+"]["+(rowCount)+"]";
       // element1.id="i_timber_id_"+(rowCount);;
        element1.id="i_tree_id["+key+"]["+(rowCount)+"]";
      
        
        for (i=0; i< treeMaster.options.length; i++)
        {
                SelID=treeMaster.options[i].value;
                SelText=treeMaster.options[i].text;
                var newRow = new Option(SelText,SelID);
                element1.options[element1.length]=newRow;
            }
	cell1.appendChild(element1);
    var treeId="i_tree_id["+key+"]["+(rowCount)+"]";
	var cell1 = row.insertCell(1);
	var element1 = document.createElement("select");
        element1.style.width='180px';
        element1.onChange="selectValuesIndex('"+tableID+"','i_timber_id_"+(rowCount)+"')";
        element1.setAttribute("onChange", "selectValuesIndex('"+tableID+"','i_timber_id_["+key+"]["+(rowCount)+"]','"+key+"','"+treeId+"')");
        element1.name="i_timber_id_["+key+"]["+(rowCount)+"]";
       // element1.id="i_timber_id_"+(rowCount);;
        element1.id="i_timber_id_["+key+"]["+(rowCount)+"]";
        for (i=0; i< SS1.options.length; i++)
        {
                SelID=SS1.options[i].value;
                SelText=SS1.options[i].text;
                var newRow = new Option(SelText,SelID);
                element1.options[element1.length]=newRow;
            }
	cell1.appendChild(element1);
	var cell2 = row.insertCell(2);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.name="value["+key+"]["+rowCount+"]";
	elementcount.id="value["+key+"]["+rowCount+"]";
	elementcount.setAttribute("onBlur", "outFocus(this,'i_timber_id_["+key+"]["+rowCount+"]','"+key+"','"+rowCount+"')");
	elementcount.setAttribute("onFocus", "getFocus(this)");
	
	cell2.appendChild(elementcount);

	var cell3 = row.insertCell(3);
	var elementVolume = document.createElement("input");
	elementVolume.name="volume["+key+"]["+rowCount+"]";
	elementVolume.id="volume["+key+"]["+rowCount+"]";
	elementVolume.setAttribute("readonly", "trues");
	cell3.appendChild(elementVolume);

}


</script>

