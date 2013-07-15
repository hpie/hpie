<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$treeId=$_GET['treeId'];
$markDetail =  new MarkDetailDO();

	
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
	
	/**
	 * Block Added For checking the condition
	 */

	$arrCondition = array('i_mark_id'=>$markDetailId,'i_ecnomics_master_id'=>$ecnomicsId);
	$db->delete('ecnomics_conversion_detail',$arrCondition);
	
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
						$c_tree_filling_detail['i_mark_id']=$markDetailId;
						
						$c_tree_filling_detail['i_timber_type_id']=$selectedType;
						$c_tree_filling_detail['i_ecnomics_master_id']=$ecnomicsId;
						$c_tree_filling_detail['i_current_count']=$value[$timber][$index] ;
						$c_tree_filling_detail['i_current_volume']=$volume[$timber][$index];
						$c_tree_filling_detail['i_status']=1;
						$c_tree_filling_detail['i_tree_id']=$treeArray[$index];
						$totalCount+=$value[$timber][$index];
						$totalVolume+=$volume[$timber][$index];
						$id = $db->insert('ecnomics_conversion_detail',$c_tree_filling_detail);

					}
				}
			}
			
		////	$common->insertDefaultEcnomicsConversion($forestID, $markDetailId, $ecnomicsId);
		//	$common->insertDefaultEcnomicsProduct($forestID, $markDetailId, $ecnomicsId);
			//$common->insertDefaultEcnomicsOverHeadCharges($forestID, $markDetailId, $ecnomicsId);
			//$common->insertDefaultEcnomicsCharges($forestID, $markDetailId, $ecnomicsId);
			$common->updateEcmonicsDetails($markDetailId);
		 ob_end_clean();
		 header("location:indexThickBox.php?page=addScheduleRate&markId=".$_REQUEST['markId']);
	
	}

$timberDO =  new TimberDO();
$timberlist=$timberDO->getTimberList();
$markDetail =  new MarkDetailDO();
$volumeTableDetail=$markDetail->getTimberVolummeDetail();
$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);
$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
$ecnomicsId=$ecmomicsMaster['id'];


$common->extractTempDataEconimics('ecnomics_category_timber_temp','ecnomics_category_timber',"where i_ecnomics_master_id='".$ecnomicsId."'",$ecnomicsId);

$preViousTimbedetail=$markDetail->getEcnomicsConDetail($ecnomicsId);
?>
<?php
//include('header.php');
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
<form id="form" method="POST" action=""><input type='hidden'
	name='treeId' id='treeId' value='<?php echo $treeId; ?>' /> <input
	type="hidden" value='<?php echo $markDetailId;?>' name='markId'
	id='markId' /> <input type='hidden' value='<?php echo $progressId?>'
	name='updatePrevious' id='updatePrevious' />

<table style="width: 50%;">
	<tr>
		<td> 
			<h4>Proposed timber/output to be generated.</h4> 
			<h6>Produce cannot exceed the volume available.</h6> 
		</td>
	</tr>
</table>

<div style='display: none;'>
<select id='treeMaster'>
 <option>Select</option>	 
<?php


foreach($markedTreeList as $treeDetail=>$value){
	?>
	<option value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
	<?php
}
?>
</select>
</div>


<table>
	<tr>
		<td colspan=2><!--start 1st div-->
		<div class="basic" style="float: left;" id="list1b"><?php
		if(isset($timberlist))
		{ $count=0;
		$common-> updateEcmonicsDetails( $markDetailId, $ecnomicsId);
		foreach($timberlist as $k){
			
			$common->updateProductDetails($markDetailId, $ecnomicsId, $k->id);
			$treeeVolume= $markDetail->getTimberProductVolume($markDetailId);
			
			
			$maxDetail=  array();
			foreach ($treeeVolume as $key=>$array)
			{
				$maxDetail[$key]=$array['productVolume'];
				?>
				   <input type ='hidden'  value='<?php echo $array['productVolume'];?>' id='<?php echo $k->id.'_'.$key;?>'
			    name='<?php echo $k->id.'_'.$key;?>' />	
			  <?php 
			}
			?> 
		<a><?php echo $k->vc_name; ?>:</a>
		<div style='display: block;'>

		<table cellpadding="5px" cellspacing="5px"
			id='timberDetailTable_<?php echo $count;?>'>
			<tr>
				<td class="fill">Tree</td>
				<td class="fill">Timber</td>
				<td class="fill">Max Volume</td>
				<td class="fill">Max Count</td>
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
					id='_<?php echo $k1;?>_' /> <?php
				}
					
				echo makeTimberlist($arrAllTimberType,"timberMaster_[".$k->id."]",$treetype_id,"",0,"");
				?></div>
				</td>
			</tr>
			<?php
			$existingCount=0;
			if(count($preViousTimbedetail[$k->id]) > 0)
			{
					
				foreach($preViousTimbedetail[$k->id] as $timberStoredType=>$arrayResult){
					{
						
						foreach($arrayResult as $timberStoredType=>$resultDetail){
							$existingCount++;
							?>
							<tr>
								<td><select
									id='i_tree_id[<?php echo $k->id;?>][<?php echo $existingCount; ?>]'
									name='i_tree_id[<?php echo $k->id;?>][<?php echo $existingCount; ?>]'
									onChange="calculateVolumeLeft(this.value,'<?php echo $k->id?>','<?php echo $existingCount; ?>')";>
										<option value=''>Select</option>
										<?php
										foreach($markedTreeList as $treeDetail=>$value){
											?>
										<option
										<?php echo ($resultDetail['i_tree_id']==$treeDetail ? "selected=selected":""); ?>
											value='<?php echo $treeDetail;?>'>
											<?php echo $value;?>
										</option>
										<?php
										}
										?>
								</select>
								</td>
								<td><?php 
								echo makeTimberlist($arrAllTimberType,"i_timber_id_[".$k->id."][".$existingCount."]",$resultDetail['i_timber_type_id'],"selectValuesIndex(\"timberDetailTable_".$count."\",\"i_timber_id_[".$k->id."][".$existingCount."]\",\"".$k->id."\",\"i_tree_id[".$k->id."][".$existingCount."]\",\"".$existingCount."\")",'160px',"");
								?>
								</td>
								<td><input type='text' readonly="readonly" class="number"
									style="background-color: #dcdcdc; width: 50px;"
									name="volumeLeft[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									id="volumeLeft[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									value="<?php echo display_float($maxDetail[$resultDetail['i_tree_id']],3);?>" />
								</td>
								<td><input type='text' readonly="readonly" class="number"
									style="background-color: #dcdcdc; width: 50px;"
									name="countLeft[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									id="countLeft[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									value="" />
								</td>
								
								<td><input
									onblur="outFocus(this,'i_timber_id_[<?php echo $k->id;?>][<?php echo $existingCount; ?>]',
									<?php echo $k->id;?>,'<?php echo $existingCount; ?>','volumeLeft[<?php echo $k->id;?>][<?php echo $existingCount; ?>]','<?php echo $k->id;?>')"
									onfocus="getFocus(this);" class="number"
									name="value[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									id="value[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									value="<?php echo $resultDetail['i_current_count'] ?>"
									style="width: 50px;" /></td>
								<td><input readonly class="number"
									style="background-color: #dcdcdc; width: 50px;"
									name="volume[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									id="volume[<?php echo $k->id;?>][<?php echo $existingCount; ?>]"
									value="<?php echo $resultDetail['i_current_volume'] ?>" /></td>
								<td><?php 
								$maxDetail[$resultDetail['i_tree_id']]-=$resultDetail['i_current_volume'];
								if($existingCount  == 1)
								{
									?> <input type='button'
									onclick="addMore('timberDetailTable_<?php echo $count;?>','1','1','timberMaster_[<?php echo $k->id;?>]','<?php echo $k->id ?>')"
									value='Add More' /> <?php 
								}
				?>
								</td>
								<td><input type='hidden' value=''
									name='selectValues<?php $count; ?>'
									id='selectValues<?php echo  $count ;?>' /></td>
							</tr>
							<?php 	
					
				}
				}
			}
			
			?>
			<input type='text' value='<?php echo $existingCount;?>'   name='existingCount[<?php echo $k->id;?>]'  id='existingCount[<?php echo $k->id;?>]' />
			<?php
			
			}//end of IF
			else 
			{
			?>
			<input type='hidden' value='<?php echo $existingCount;?>'   name='existingCount[<?php echo $k->id;?>]'  id='existingCount[<?php echo $k->id;?>]' />
			<tr>
				<td><select id='i_tree_id[<?php echo $k->id;?>][0]'
					name='i_tree_id[<?php echo $k->id;?>][0]' onChange="calculateVolumeLeft(this.value,'<?php echo $k->id?>','0')";>
				   <option  value=''>Select</option>	 
				<?php
					foreach($markedTreeList as $treeDetail=>$value){
						?>
					<option value='<?php echo $treeDetail;?>'><?php echo $value;?></option>
					<?php
					}
					?>
				</select></td>

				<td><?php 
				echo makeTimberlist($arrAllTimberType,"i_timber_id_[".$k->id."][0]",$treetype_id,"selectValuesIndex(\"timberDetailTable_".$count."\",\"i_timber_id_[".$k->id."][0]\",\"".$k->id."\",\"i_tree_id[".$k->id."][0]\",\"0\")",0,"");
				?></td>
				<td>
				<input type='text'
					readonly="readonly" class="number"  style="background-color: #dcdcdc; width:50px;"
					name="volumeLeft[<?php echo $k->id;?>][0]"
					id="volumeLeft[<?php echo $k->id;?>][0]" value="0" />
				</td>
				
				<td><input type='text' readonly="readonly" class="number"
									style="background-color: #dcdcdc; width: 50px;"
									name="countLeft[<?php echo $k->id;?>][0]"
									id="countLeft[<?php echo $k->id;?>][0]"
									value="0" />
								</td>
                <td>
					<input
					onblur="outFocus(this,'i_timber_id_[<?php echo $k->id;?>][0]','<?php echo $k->id;?>','0','volumeLeft[<?php echo $k->id;?>][0]','<?php echo $k->id;?>')"
					onfocus="getFocus(this);" size="10" class="number"
					name="value[<?php echo $k->id;?>][0]"
					id="value[<?php echo $k->id;?>][0]" value="0" 
					style="width:50px;"/></td>
				<td><input readonly size="5" class="number"  style="background-color: #dcdcdc; width:50px;"
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
		<?php $count++;
		 } ?> <!--end 1st div--> <?php
		}
		?>
</div>
		</td>
	</tr>

	<tr>

		<td colspan="2" align="center">
		<table style="width: 40%">
			<tr>
				<td colspan="2" align="right"><input type="submit" name="update"
					id="upadte" value="Save & Next" /></td>
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

function calculateVolumeLeft(treeId,timberId,rowCount)
{
  prevVolume=parseFloat(document.getElementById(timberId+"_"+treeId).value);
  for(i =0 ;i < rowCount ;i++)
	{
         try
         {
              if(document.getElementById('i_tree_id['+timberId+']['+rowCount+']').value == document.getElementById('i_tree_id['+timberId+']['+i+']').value )
              { 
      		  prevVolume-=parseFloat(document.getElementById('volume['+timberId+']['+i+']').value);            
              }
              }
         catch(erroe)
         {
         }
	}
  document.getElementById('volumeLeft['+timberId+']['+rowCount+']').value = roundNumber(prevVolume,3);;
}
function selectValuesIndex(tableID,currentSelect,key,treeId,columnIndex)
{
	
    var table = document.getElementById(tableID);
	var currentValue =document.getElementById(currentSelect).value; 
	currentValue="_"+currentValue+"_";
	//alert("_"+treeId+"_");
	var currentSelectedTree=document.getElementById(treeId).value
	
	var rowCount = table.rows.length;

	
	
	for(i =0 ;i <rowCount ;i++)
	{

	     try 
         {
            if(('i_timber_id_['+key+']['+i+']') == currentSelect)
            {
            	document.getElementById('value['+key+']['+i+']').value =0;
            	document.getElementById('volume['+key+']['+i+']').value =0;
             } 
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
	 if(document.getElementById("existingCount["+key+"]").value > 0)
	   {
	      
	       resetAllSubsequent(columnIndex,key);
	   }

	   
	 document.getElementById('countLeft['+key+']['+columnIndex+']').value = roundNumber(parseFloat(document.getElementById('volumeLeft['+key+']['+columnIndex+']').value)/parseFloat(document.getElementById(currentValue).value),0);;
	
}
function outFocus(control,i_timberDetail,rowindex,columnIndex,prevVolume,key_timberId)
{

	
	if(control.value=='')
	{
		control.value='0';
	}
	
	var selectedValue=document.getElementById(i_timberDetail).value;
	selectedValue="_"+selectedValue+"_"

	if(roundNumber(parseFloat(document.getElementById(selectedValue).value) * parseFloat(control.value),2) > document.getElementById(prevVolume).value )
	{
     alert("Volume Exceeds the limits");
     control.value='0';
     control.focus();
     return false;
	}
	

	document.getElementById('volume['+rowindex+']['+columnIndex+']').value=roundNumber(parseFloat(document.getElementById(selectedValue).value) * parseFloat(control.value),2) ;
   if(document.getElementById("existingCount["+key_timberId+"]").value > 0)
   {
      
       resetAllSubsequent(columnIndex,key_timberId);
   }

}

function resetAllSubsequent(currentIndex,timberId)
{
	
	for(i =parseInt(currentIndex)+1 ;i <= parseInt(document.getElementById("existingCount["+timberId+"]").value)+1 ;i++)
	{
      try{
	   if(document.getElementById('i_tree_id['+timberId+']['+i+']').value == document.getElementById('i_tree_id['+timberId+']['+currentIndex+']').value)
		{
			
			document.getElementById('i_tree_id['+timberId+']['+i+']').value='';
			document.getElementById('i_timber_id_['+timberId+']['+i+']').value='';
			document.getElementById('volumeLeft['+timberId+']['+i+']').value='0';
			document.getElementById('value['+timberId+']['+i+']').value='0';
			document.getElementById('volume['+timberId+']['+i+']').value='0';
			
		}
      }
      catch(error)
      {
      }
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

function addMore(tableID,value_id,count_id,masterSelect,key)
{

	var table = document.getElementById(tableID);
	var SS1 = document.getElementById(masterSelect);
	var treeMaster = document.getElementById('treeMaster');
	

	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);

	var cell1 = row.insertCell(0);
	var element1 = document.createElement("select");
        element1.style.width='120px';
        //element1.onChange="selectValuesIndex('"+tableID+"','i_timber_id_"+(rowCount)+"')";
        element1.setAttribute("onChange", "calculateVolumeLeft(this.value,'"+key+"','"+rowCount+"')");
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
        element1.style.width='120px';
        element1.onChange="selectValuesIndex('"+tableID+"','i_timber_id_"+(rowCount)+"')";
        element1.setAttribute("onChange", "selectValuesIndex('"+tableID+"','i_timber_id_["+key+"]["+(rowCount)+"]','"+key+"','i_tree_id["+key+"]["+(rowCount)+"]','"+rowCount+"')");
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
	elementcount.name="volumeLeft["+key+"]["+rowCount+"]";
	elementcount.id="volumeLeft["+key+"]["+rowCount+"]";
	elementcount.setAttribute("readonly", "true");
	elementcount.setAttribute("style", "background-color: #dcdcdc; width:50px;");
	cell2.appendChild(elementcount);

	var cell2 = row.insertCell(3);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.name="countLeft["+key+"]["+rowCount+"]";
	elementcount.id="countLeft["+key+"]["+rowCount+"]";
	elementcount.setAttribute("readonly", "true");
	elementcount.setAttribute("style", "background-color: #dcdcdc; width:50px;");
	
	cell2.appendChild(elementcount);
	var cell2 = row.insertCell(4);
	
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="value["+key+"]["+rowCount+"]";
	elementcount.id="value["+key+"]["+rowCount+"]";
	elementcount.setAttribute("onBlur", "outFocus(this,'i_timber_id_["+key+"]["+rowCount+"]','"+key+"','"+rowCount+"','volumeLeft["+key+"]["+rowCount+"]','"+key+"')");
	elementcount.setAttribute("onFocus", "getFocus(this)");
	elementcount.setAttribute("style", "background-color: #dcdcdc; width:50px;");
	
	cell2.appendChild(elementcount);

	var cell3 = row.insertCell(5);
	var elementVolume = document.createElement("input");
	elementVolume.name="volume["+key+"]["+rowCount+"]";
	elementVolume.id="volume["+key+"]["+rowCount+"]";
	elementVolume.value='0';
	elementVolume.setAttribute("readonly", "true");
	elementVolume.setAttribute("style", "background-color: #dcdcdc; width:50px;");
	cell3.appendChild(elementVolume);

	document.getElementById("existingCount["+key+"]").value= parseInt(document.getElementById("existingCount["+key+"]").value)+1;

}


</script>

