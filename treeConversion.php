<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
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
		$existingDetail=$markDetail->getExistingTimber($mark_detail);
	}
	if($existingDetail > 0 && ($updatePrevious == '' || $updatePrevious==0))
	{
		$errorMsg    ="Entry Already Exists for ".$_POST['month']."/".$_POST['year'] ."of this contractor ";
	}
	else
	{
		/*
		 * Block added to checking already  end
		 */
		if($treetype_id> 0)
		{

			$db->deleteConversion($treetype_id,$markDetailId,$_POST['i_month_id'],$_POST['i_year'],$_POST['i_contractor_id']);

			foreach ($i_timber_id_ as $timber=>$array)
			{
				foreach ($array as $index=>$selectedType)
				{
						
					if($selectedType != '')
					{
						
						$c_tree_filling_detail['i_timber_id']=$timber;
						$c_tree_filling_detail['i_timber_type_id']=$selectedType;
						$c_tree_filling_detail['i_contractor_id']=$_POST['i_contractor_id'];
						$c_tree_filling_detail['month']=$_POST['i_month_id'];
						$c_tree_filling_detail['year']=$_POST['i_year'];
						$c_tree_filling_detail['i_previous_count']= 0;
						$c_tree_filling_detail['i_previous_volume']=0;
						$c_tree_filling_detail['i_current_count']=$value[$timber][$index] ;
						$c_tree_filling_detail['i_current_volume']=$volume[$timber][$index];
						$c_tree_filling_detail['i_status']=1;
						$c_tree_filling_detail['i_tree_id']=$treetype_id;
						$c_tree_filling_detail['i_mark_id']=$markDetailId;
						$id = $db->insert('c_filling_detail',$c_tree_filling_detail);

					}
				}
			}
				
			/*foreach ($timberCurrentValue as $key=>$value)
			{
				foreach($value as $k=>$v){
					$c_tree_filling_detail['i_timber_id']=$key;
					$c_tree_filling_detail['i_timber_type_id']=$k;
					$c_tree_filling_detail['i_contractor_id']=$_POST['i_contractor_id'];
					$c_tree_filling_detail['month']=$_POST['i_month_id'];
					$c_tree_filling_detail['year']=$_POST['i_year'];
					$c_tree_filling_detail['i_previous_count']= 0;
					$c_tree_filling_detail['i_previous_volume']=0;
					$c_tree_filling_detail['i_current_count']=$timberCurrentValue[$key][$k] ;
					$c_tree_filling_detail['i_current_volume']=$timberCurrentVolume[$key][$k];
					$c_tree_filling_detail['i_status']=1;
					$c_tree_filling_detail['i_tree_id']=$treetype_id;
					$c_tree_filling_detail['i_mark_id']=$markDetailId;
					$id = $db->insert('c_filling_detail',$c_tree_filling_detail);
				}
			}*/

		}
		$arCondition = array('id'=>$markDetailId);
		$arFieldValues =array('i_conversion_status'=>'1');
		$id = $db->update('c_mark_detail',$arFieldValues,$arCondition);
		//die();
		removeFromSession('treeFillingArray');
		removeFromSession('treeConversionArray');
		ob_end_clean();
		header("location:index.php?page=markCompleteDetail&markId=".$_REQUEST['markId']);
	}

}

//$markList=$markDetail->getTreeMarkDetail($markDetailId,$treeId);
$preEntryDetail=$markDetail->getprevTimberDetail($treetype_id,$markDetailId,$c_id);

$month=$_GET['month'];
$year=$_GET['year'];
$c_id=$_GET['c_id'];
$countDetail=0;
if($month != '' && $year != '' && $c_id != '')
{
	$i_contractor_id=$c_id;
	$i_month_id =$month;
	$i_year     =$year;
	$countDetail=1;
	$preViousTimbedetail=$markDetail->getExistingDateWiseFull($treetype_id,$markDetailId,$month,$year,$c_id);

}

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
<form id="form" method="POST" action=""><input type='hidden'
	name='treeId' id='treeId' value='<?php echo $treeId; ?>' /> <input
	type="hidden" value='<?php echo $markDetailId;?>' name='markId'
	id='markId' /> <input type='hidden' value='<?php echo $countDetail?>'
	name='updatePrevious' id='updatePrevious' />

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
		<td>Contractor</td>
		<td><span style="position: relative;"> <?php echo makeSelectOptions($arrAllcontractors,"i_contractor_id",$i_contractor_id,"",0,"class='required'");?>
		</span></td>
	</tr>

	<tr>
		<td><?php echo $ctreetype; ?></td>
		<td><input type="hidden" name='treetype_id' id='treetype_id'
			value="<?php echo $treetype_id;?>" /> <input type="text"
			disabled="disabled" name='timberName' id='timberName'
			value="<?php echo $list[$treetype_id]->vc_name;?>" class="required" />
		</td>
	</tr>

	<tr>
		<td>For Month/Year</td>
		<td>
		<table border=0>
			<tr>
				<td width="30%"><?php echo makeSelectOptions($arrMonths,"i_month_id",$i_month_id,"",150,"class='required'");?></td>
				<td><?php echo makeSelectOptions($arrYears,"i_year",$i_year,"",70,"class='required'");?></td>
			</tr>
		</table>
		</td>
	</tr>



	<tr>
		<td colspan=2><!--start 1st div-->

		<div class="basic" style="float: left;" id="list1b"><?php
		if(isset($timberlist))
		{ $count=0;
		foreach($timberlist as $k){
			?> <a><?php echo $k->vc_name; ?>:</a>
		<div style='display:block;'>

		<table cellpadding="5px" cellspacing="5px"
			id='timberDetailTable_<?php echo $count;?>'>
			<tr>
				<td class="fill">Timber</td>
				<td class="fill">Current Count</td>
				<td class="fill">Current Volume</td>
			</tr>
			<?php
			$arrAllTimberType=$common->getAllTimberType($timberlist[$count]->id);
			?>
			<tr>
				<td colspan='4'>
				<div style='display:none;'>
			<?php 
			    $arrayList=$volumeTableDetail[$k->id];
			    foreach($arrayList as $k1=>$detail){
			    	
			    	
			    ?>
			     <input type='hidden'  value='<?php echo $detail['volume']; ?>' id='<?php echo $k1;?>' />
			    <?php
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
			
				foreach($arrayResult as $timberStoredType=>$resultDetail){
					$existingCount++;
			?>
			<tr>
				<td><?php 
						echo makeTimberlist($arrAllTimberType,"i_timber_id_[".$k->id."][".$existingCount."]",$timberStoredType,"selectValuesIndex(\"timberDetailTable_".$count."\",\"i_timber_id_[".$k->id."][".$existingCount."]\")",".$existingCount.","");
				?></td>
				<td><input onblur="outFocus(this,'i_timber_id_[<?php echo $k->id;?>][<?php echo $existingCount;?>]',<?php echo $k->id;?>,'<?php echo $existingCount;?>')" onfocus="getFocus(this);"
					size="5" class="number" name="value[<?php echo $k->id;?>][<?php echo $existingCount;?>]" id="value[<?php echo $k->id;?>][<?php echo $existingCount;?>]" value="<?php echo $resultDetail['i_current_count'];?>" /></td>
				<td><input readonly  
					size="5" class="number" name="volume[<?php echo $k->id;?>][<?php echo $existingCount;?>]" id="volume[<?php echo $k->id;?>][<?php echo $existingCount;?>]" value="<?php  echo $resultDetail['i_current_volume']; ?>" /></td>
				<td valign="top">
				<?php 
				if($existingCount==1)
				{
				?>
				<input type='button'
					onclick="addMore('timberDetailTable_<?php echo $count;?>','1','1','timberMaster_[<?php echo $k->id;?>]','<?php echo $k->id ?>')"
					value='Add More' />
				<?php 
				}
				?>
				
				</td>
				<td>
				<input type='hidden' value='' name='selectValues<?php $count; ?>' id='selectValues<?php echo  $count ;?>'/>
				</td>	
			</tr>
			
			<?php 
				}
			}
			else
			{
			?>
			<tr>
				<td><?php 
				echo makeTimberlist($arrAllTimberType,"i_timber_id_[".$k->id."][0]",$treetype_id,"selectValuesIndex(\"timberDetailTable_".$count."\",\"i_timber_id_[".$k->id."][0]\")",0,"");
				?></td>
				<td><input onblur="outFocus(this,'i_timber_id_[<?php echo $k->id;?>][0]',<?php echo $k->id;?>,'0')" onfocus="getFocus(this);"
					size="5" class="number" name="value[<?php echo $k->id;?>][0]" id="value[<?php echo $k->id;?>][0]" value="0" /></td>
				<td><input readonly  
					size="5" class="number" name="volume[<?php echo $k->id;?>][0]" id="volume[<?php echo $k->id;?>][0]" value="0" /></td>
				<td><input type='button'
					onclick="addMore('timberDetailTable_<?php echo $count;?>','1','1','timberMaster_[<?php echo $k->id;?>]','<?php echo $k->id ?>')"
					value='Add More' /></td>
				<td>
				<input type='hidden' value='' name='selectValues<?php $count; ?>' id='selectValues<?php echo  $count ;?>'/>
				</td>	
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

		<td colspan="2" align="right">
		<table style="width: 40%">
			<tr>
				<td><input type="button" name="Cancel" id="Cancel" value="Cancel"
					onclick="javascript:parent.location='index.php?page=markCompleteDetail&markId=<?php echo $markDetailId;?>'" /></td>
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
<script>

function selectValuesIndex(tableID,currentSelect,key)
{
	
    var table = document.getElementById(tableID);
	var currentValue =document.getElementById(currentSelect).value; 
	
	var rowCount = table.rows.length;
	for(i =0 ;i <rowCount ;i++)
	{
      
         try 
         {
        	if( currentValue  == document.getElementById('i_timber_id_['+key+']['+i+']').value && ('i_timber_id_['+key+']['+i+']') != currentSelect )
        	{
                alert('Value Already Entered');
                document.getElementById(currentSelect).value='';
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
	
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);

	var cell1 = row.insertCell(0);
	var element1 = document.createElement("select");
        element1.style.width='180px';
        element1.onChange="selectValuesIndex('"+tableID+"','i_timber_id_"+(rowCount)+"')";
        element1.setAttribute("onChange", "selectValuesIndex('"+tableID+"','i_timber_id_["+key+"]["+(rowCount)+"]','"+key+"')");
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


	var cell2 = row.insertCell(1);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.name="count["+key+"]["+rowCount+"]";
	elementcount.id="count["+key+"]["+rowCount+"]";
	elementcount.setAttribute("onBlur", "outFocus(this,'i_timber_id_["+key+"]["+rowCount+"]','"+key+"','"+rowCount+"')");
	elementcount.setAttribute("onFocus", "getFocus(this)");
	
	cell2.appendChild(elementcount);

	var cell3 = row.insertCell(2);
	var elementVolume = document.createElement("input");
	elementVolume.name="volume["+key+"]["+rowCount+"]";
	elementVolume.id="volume["+key+"]["+rowCount+"]";
	elementVolume.setAttribute("readonly", "trues");
	cell3.appendChild(elementVolume);

}


</script>

