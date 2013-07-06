<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$timberDO =  new TimberDO();
$timberlist=$timberDO->getTimberList();


$allForestPoints=$common->getAllForestPoints($markDetailId);
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
		if($fromRSD == 1)
		{
			$arFieldValues['i_type ']=2;
		}
		else
		{
			$arFieldValues['i_type ']=1;
		}
		
		$list=$common->selectCondition('progress_transportation_master', $arFieldValues);
		$existingDetail=0;
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
			
			if($fromRSD == 1)
			{
				$arMarkedPrice['i_type ']=2;
			}
			else
			{
				$arMarkedPrice['i_type ']=1;
			}
				
			$progressConversionId = $db->insert('progress_transportation_master',$arMarkedPrice);
		}
		else
		{
			$progressConversionId=$updatePrevious;
		}

		echo $progressConversionId;
		$totalCount=0;
		$totalVolume=0;

		foreach ($treeId as $index=>$value	)
		{
				
			$c_tree_filling_detail['i_tree_id']=$value;
			$c_tree_filling_detail['i_overhead_id']=$transportationType[$index];
			$c_tree_filling_detail['i_progress_id']=$progressConversionId;
			$c_tree_filling_detail['i_contract_id']=$contract[$index];;
			$c_tree_filling_detail['vc_from']=$fromPoint;
			$c_tree_filling_detail['vc_destination']=$destination[$index];
			
			$masterVolume['id']=$i_timberType_id;
			
			$typeVolume = $common->selectCondition('m_timber_type',$masterVolume);
			
			
			
			$c_tree_filling_detail['i_volume']=$typeVolume[0]['volume']*$i_count[$index];
			$c_tree_filling_detail['i_count']=$i_count[$index];
			
			$c_tree_filling_detail['i_charges']=$charges[$index];
			$c_tree_filling_detail['i_exit']=$exit[$index];
			$c_tree_filling_detail['i_comission']=$comission[$index];
			$c_tree_filling_detail['i_distance']=$distance[$index];
			
			$c_tree_filling_detail['i_timber_id']=$i_timber_id;
			$c_tree_filling_detail['i_timber_Type_id']=$i_timberType_id;
			
			print_r($c_tree_filling_detail);
			$id = $db->insert('progress_transportation_detail',$c_tree_filling_detail);
		}
			

	ob_end_clean();
	//header("location:index.php?page=transportationHome&markId=".$_REQUEST['markId']);
	
	header("location:index.php?page=transportationEntryfromRSD&markId=".$markDetailId."&progressId=".$progressId);
	

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


if($fromRSD == 1)
{
$allForestPoints=$common->getAllForestPointsonType($markDetailId,2);
$arrAllcontractors=$common->getContractorWork($markDetailId,4);

}
else 
{
	$allForestPoints=$common->getAllForestPointsonType($markDetailId,1);
	$arrAllcontractors=$common->getContractorWork($markDetailId,3);
	
	
}

foreach ($progressConversion as $tree=>$detail)
{
	?>
<input
	type='hidden' value='<?php echo $detail['i_volumne'];?>'
	id='<?php echo $tree;?>' name='<?php echo $tree;?>' />
	<?php
}

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
	
		<?php 
		  if($fromRSD == 1)
		  {
		  	?>
		  <li><a id="<?php echo pageUrl("home",$currentPage)?>"
		href="index.php?page=transportationEntryfromRSD&progressId=<?php echo $progressId;?>&markId=<?php echo $markDetailId;?>"
		title="Goto Home Page">Transortation Home</a></li>	 
		  	<?php
		  }
		  else
		  {
		  	?>
		  <li><a id="<?php echo pageUrl("home",$currentPage)?>"
		href="index.php?page=transportationEntry&progressId=<?php echo $progressId;?>&markId=<?php echo $markDetailId;?>"
		title="Goto Home Page">Conversion Home</a></li>	<?php 
		  }
		    ?>
</ul>
<?php 
$markDetailId=$_REQUEST['markId'];
$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
echo "<b>Working on Lot-No ".$markIdDetail[0]['vc_lotno']."</b>";
?>
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
</select> 

<?php echo makeSelectOptions($arrAllcontractors,"contractorMaster",$i_contractor_id,"",0,"");?>
<?php echo makeSelectOptions($allForestPoints,"pointMaster",$i_contractor_id,"",100,"");?>
		
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
				<td><input name='i_month_id'  id='i_month_id' type='hidden'
					value='<?php echo $i_month_id;?>' /> <input id='i_year' name='i_year'
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
<table cellpadding="0px" cellspacing="0px" id='timberDetailTable'
	style="width: 886px;">
	<tr>
		<td>Tree</td>
		<td>Transportation Type</td>
		<td>Contractor</td>
		
		<td>Timber </td>
		<td>Timber-Type</td>
		
		<td>From-CP</td>
		<td>To-CP</td>
		
	</tr>

	<tr>
		<td><select onchange="loadSelectTimber(this.value,'<?php echo $markDetailId?>')" name='treeId[0]'
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
		
		<td><div id='timber'>
               <select style='width: 100px'>
                <option value=''>- select -</option>
               </select>
		     </div></td>
		<td><div id='timberType'>
               <select style='width: 100px'>
                <option value=''>- select -</option>
               </select>
		     </div></td>
		<td>
		     <div id='fromEntryPoint'>
               <select style='width: 100px'>
                <option value=''>- select -</option>
               </select>
		     </div>
		</td>

		<td>
		<?php echo makeSelectOptions($allForestPoints,"destination[0]",$i_contractor_id,"",100,"class='required'");?>
		</td>
		</tr>
		<tr>
		<td>Available To Transfer</td>
		<td>Count</td>
		<td>Charges</td>
		<td>Mate Comission</td>
		<td>Distance</td>
		</tr>
		<tr>
		<td><input type='text' id='volumetotransfer' name='volumetotransfer' readonly="readonly"/></td>
		
		<td>
		<input type='text' id='i_count[0]' name='i_count[0]'
			onfocus="getFocus(this)" onblur="validateVolume(0);"
				value='<?php echo $detail['i_volume']?>' /></td>
		<td><input type='text' id='charges[0]' name='charges[0]' /></td>
		
		<td>
		<input 
		    type='text' id='comission[<?php echo $count?>]' 
		    name='comission[<?php echo $count?>]'
		  	value='<?php echo $detail['i_comission']?>'  />
		</td>
		<td><input type='text' id='distance[0]' name='distance[0]' /></td>
		
		<td colspan="20" style='text-align: right;'>
		</td>

	</tr>
	<tr>
	 <td>Exit</td>
	<td><input type="checkbox" id='exit[0]' name='exit[0]' value='1'
			onchange="validateVolume(0);" /></td>
			
	</tr>

</table>
<table>
	<tr>

		<td colspan="2" align="center">
		<table style="width: 40%">
			<tr>
				<td><input type="button" name="Cancel" id="Cancel" value="Cancel"
					onclick="javascript:parent.location='index.php?page=transportationEntry&progressId=<?php echo $progressId;?>&markId=<?php echo $markDetailId;?>'" /></td>
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
function validateVolume(varCount)
{

  if(document.getElementById("i_count["+varCount+"]").value > parseFloat(document.getElementById('volumetotransfer').value))
	{
		document.getElementById("i_count["+varCount+"]").value=0;
	     alert("Not Able to move more value at conversion");
	     document.getElementById("i_count["+varCount+"]").focus();
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

function fetchVolumeAvailable(pointId)
{
//alert(pointId);
markDetailId="<?php echo $markDetailId?>";
treeId=document.getElementById("treeId[0]").value;

timberId=document.getElementById("i_timber_id").value;
timberTypeId=document.getElementById("i_timberType_id").value;
var xmlhttp;
if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
   }
else
   {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
  xmlhttp.onreadystatechange=function()
   {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("volumetotransfer").value=xmlhttp.responseText;
    }
  }

  <?php 
		  if($fromRSD == 1)
		  {
		  	?>
		  	var fileCall='ajax_call.php?get=volumefortransferRSD&markId='+markDetailId+'&treeId='+treeId+'&pointId='+pointId+"&i_timber_id="+timberId+"&i_timbertype_id="+timberTypeId;;
		  	 
		  	<?php
		  }
		  else
		  {
		  	?>
		  	var fileCall='ajax_call.php?get=volumefortransfer&markId='+markDetailId+'&treeId='+treeId+'&pointId='+pointId+"&i_timber_id="+timberId+"&i_timbertype_id="+timberTypeId;;
		  	 
		  	<?php 
		  }
		    ?>
   //alert(fileCall);
  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}

function loadSelectEntryPoints(timberTypeId,markDetailId,treeId,timberId)
{

month=document.getElementById("i_month_id").value;	

year=document.getElementById("i_year").value;	

var xmlhttp;
if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
   }
else
   {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
  xmlhttp.onreadystatechange=function()
   {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("fromEntryPoint").innerHTML=xmlhttp.responseText;
    }
  }
<?php 
if($fromRSD == 1)
{
	?>
	var fileCall='ajax_call.php?get=entryPointsRSD&markId='+markDetailId+'&treeId='+treeId+"&dateValue="+month+"&yearValue="+year+"&i_timber_id="+timberId+"&i_timbertype_id="+timberTypeId;
	  
	<?php
}
else
{
	?>
	var fileCall='ajax_call.php?get=entryPoints&markId='+markDetailId+'&treeId='+treeId+"&dateValue="+month+"&yearValue="+year+"&i_timber_id="+timberId+"&i_timbertype_id="+timberTypeId;
	  
	<?php 
}
  ?>
  //alert(fileCall);
  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}

function loadSelectTimber(treeId,markDetailId)
{

month=document.getElementById("i_month_id").value;	
year=document.getElementById("i_year").value;	

var xmlhttp;
if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
   }
else
   {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
  xmlhttp.onreadystatechange=function()
   {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("timber").innerHTML=xmlhttp.responseText;
    }
  }
  var fileCall='ajax_call.php?get=timberList&markId='+markDetailId+'&treeId='+treeId+"&dateValue="+month+"&yearValue="+year;
 // alert(fileCall);
  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}


function populateTimberType(timberId,markDetailId,treeId)
{
	month=document.getElementById("i_month_id").value;	
	year=document.getElementById("i_year").value;	
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	   {// code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	   }
	else
	   {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	   }
	  xmlhttp.onreadystatechange=function()
	   {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("timberType").innerHTML=xmlhttp.responseText;
	    }
	  }
	  var fileCall='ajax_call.php?get=timberTypeList&markId='+markDetailId+'&treeId='+treeId+"&dateValue="+month+"&yearValue="+year+"&i_timber_id="+timberId;
	
	  xmlhttp.open("GET",fileCall,true);
	  xmlhttp.send();
}




</script>

