<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$timberDO =  new TimberDO();
$timberlist=$timberDO->getTimberList();
$arrAllcontractors=$common->getAllcontractors();
$allForestPoints=$common->getAllForestPointsonType($markDetailId,1);
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
	

		$totalCount=0;
		$totalVolume=0;

		foreach ($treeId as $index=>$value	)
		{
				
			$c_tree_filling_detail['i_tree_id']=$value;
			$c_tree_filling_detail['i_overhead_id']=$transportationType[$index];
			$c_tree_filling_detail['i_ecnomics_master_id']=$ecnomicsId;
			
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
			$id = $db->insert('ecnomics_transportation_detail',$c_tree_filling_detail);
		}
			

	ob_end_clean();
	header("location:indexThickBox.php?page=transportationEntryEcnomics&markId=".$_REQUEST['markId']);

	

}

//$markList=$markDetail->getTreeMarkDetail($markDetailId,$treeId);


$overHeadEntry=$common->getOverheadEntity($markDetailId);

$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);

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
		<td colspan="2" align="center"><b>TransPortation Entry</b> <br></br>
		</td>
	</tr>
	<tr>
		<td colspan='2' align="center"><label class="error"><?php echo $errorMsg;?></label>
		</td>
	</tr>


	
</table>
<table cellpadding="0px" cellspacing="0px" id='timberDetailTable'
	style="width: 886px;">
	<tr>
		<td>Species</td>
		<td>Mode Of Carriage</td>
		
		
		<td>Kind Of Timber</td>
		<td>Timber Size</td>
		
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
		<td>Number</td>
		<td>Charges</td>
		<td>Mate Comission</td>
		<td>Chargeable Lead</td>
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
		<td>There is no Marking for this Lot</td>
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
		  	var fileCall='ajax_call.php?get=volumefortransferEco&markId='+markDetailId+'&treeId='+treeId+'&pointId='+pointId+"&i_timber_id="+timberId+"&i_timbertype_id="+timberTypeId;;
		  	 
		  	<?php 
		  }
		    ?>
   //alert(fileCall);
  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}

function loadSelectEntryPoints(timberTypeId,markDetailId,treeId,timberId)
{


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
	var fileCall='ajax_call.php?get=entryPointsRSD&markId='+markDetailId+'&treeId='+treeId+"&i_timber_id="+timberId+"&i_timbertype_id="+timberTypeId;
	  
	<?php
}
else
{
	?>
	var fileCall='ajax_call.php?get=entryPointsEco&markId='+markDetailId+'&treeId='+treeId+"&i_timber_id="+timberId+"&i_timbertype_id="+timberTypeId;
	  
	<?php 
}
  ?>
  //alert(fileCall);
  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}

function loadSelectTimber(treeId,markDetailId)
{



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
  var fileCall='ajax_call.php?get=timberListEconomics&markId='+markDetailId+'&treeId='+treeId;
 // alert(fileCall);
  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}


function populateTimberType(timberId,markDetailId,treeId)
{
	
	
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
	  var fileCall='ajax_call.php?get=timberTypeListEco&markId='+markDetailId+'&treeId='+treeId+"&i_timber_id="+timberId;
	
	  xmlhttp.open("GET",fileCall,true);
	  xmlhttp.send();
}




</script>

