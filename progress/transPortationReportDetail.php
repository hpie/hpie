<?php
$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$
$markDetail =  new MarkDetailDO();
$i_year     =date('Y');
$i_month_id=date('m');
$i_contractor_id=$_GET['c_id'];
$markDetail =  new MarkDetailDO();
$volumeTableDetail=$markDetail->getTimberVolummeDetail();



//$markList=$markDetail->getTreeMarkDetail($markDetailId,$treeId);

$applicableMonths=$markDetail->getTransPortationMonth($markDetailId);



$transPortationDetail=$markDetail->getprogressTransportationDetailComplete($progressId);
$overHeadEntry=$common->getOverheadEntity($markDetailId);
$markedTreeList=$markDetail->getProgressTreesOnly($markDetailId);

$progressConversion =$markDetail->getProgressConversionTreeWise($markDetailId);
$allForestPoints=$common->getAllForestPoints($markDetailId);

$allForestPoints1=array();
$allForestPoints1[-1]="Forest";
foreach ($allForestPoints as $pointId=>$name)
{
	$allForestPoints1[$pointId]=$name;
}
$allForestPoints=$allForestPoints1;

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
		href="index.php?page=transportationHome&markId=<?php echo $markDetailId;?>"
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



<table cellpadding="0px" cellspacing="0px" id='timberDetailTable'
	style="width: 700px;" >
	
<?php 
  $count=0;
  $pending= array();
    if(count($markedTreeList) > 0)
    {
    	?>
    	<tr>
		<td>Month-Year</td>
		<td>Point</td>
		<td>Trees</td>
		<td>Previous</td>
		<td>In</td>
		<td>Out</td>
		<td>Current(In-Out)</td>
		<td>Pending</td>
		
	   </tr>
    	<?php 

    	
    foreach ($applicableMonths as $year=>$detail)
    	{
    foreach ($detail as $detail=>$detail1)
    		{	
    		
    	 foreach ($allForestPoints as $pointId=>$name)
    	 {
    	 	$timberInoutDetail = array();

    	 	$pending[$pointId];
    	 	?>
    	 	
    	<tr>
    	<td>
    	
		<?php
		
		if($pointId == -1 || $pointId == 0  )
		{
			$timberInoutDetail=$markDetail->getForestInOut($markDetailId, $detail1['vc_month'], $detail1['vc_year']);
			
			
		}
		else
		{
			$timberInoutDetail=$markDetail->getPointInOut($markDetailId, $detail1['vc_month'], $detail1['vc_year'],$pointId);
		}
		
		
		echo $arrMonths[$detail1['vc_month']].'-'.$detail1['vc_year'];?>
		</td>
		<td>
		<?php echo $name;?>
		</td>
		<?php 
		if($timberInoutDetail != null && count($timberInoutDetail) > 0)
		{
			?>
				
					<?php 
					foreach ($timberInoutDetail as $treeId=>$InOutDetail)
					{
						$previousDetail= array();
						if($pointId == -1 || $pointId == 0 )
						{
						$previousDetail=$markDetail->getForestPrevInOut($markDetailId, $detail1['vc_month'], $detail1['vc_year'],$treeId);
						}
						else
						{
						$previousDetail=$markDetail->getPointPrevInOut($markDetailId, $detail1['vc_month'], $detail1['vc_year'],$pointId,$treeId);
						}
						?>
					</tr>
					<tr>
					<td colspan="2"></td>
					
					
					<td><?php echo $treeList[$InOutDetail['i_tree_id']]->vc_name;?></td>
					<td >
					 <?php 
					   if($previousDetail != '')
					   {
					      echo display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']);
					      
					   }
					 ?>
					</td>
					<td><?php echo display_float($InOutDetail['InVolume'],3);?></td>
					<td><?php echo display_float($InOutDetail['OutVolume'],3);?></td>
					<td><?php echo (display_float($InOutDetail['InVolume'],3)-display_float($InOutDetail['OutVolume'],3));?></td>
					
					<td><?php
					echo (display_float($InOutDetail['InVolume'],3)-display_float($InOutDetail['OutVolume'],3)) + display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']);
					?></td>
					<?php 
                    //Added for summary generation
                    $pending[$pointId][$treeId]+= (display_float($InOutDetail['InVolume'],3)-display_float($InOutDetail['OutVolume'],3));
					
					}
					?>
				 <?php  
		}
		else
		{
			
			?>
			<td>N.A</td>
			<td>N.A</td>
			<td>N.A</td>
			
			<?php
		}
		 ?>
		
		<td>
		
		</td>
		<td>
		
		</td>
		<td>
		<?php echo $detail['i_volume']?></td>
		<td>
		</td>
		
	</tr>
    	 	
    	 	<?php 
    	 $count++;
    	 }
    	 
    	 ?>
    	<tr style="background-color:gray" class="headrow">
    	  <td colspan="10"></td>
    	</tr>
    	<?php
    	
    	}
    	 
    	}
    	}
    else
    {
     echo "No Record Entered,Please click  Add More For making entry ";
    }
?>
</table>


  <table cellpadding="0px" cellspacing="0px" id='timberDetailTable'
	style="width: 700px;" > <tr>
     <td>Point</td>
     <td>Tree</td>
     <td>Pending</td>
    </tr>
   <?php 
					foreach ($pending as $pointId=>$treeDetailArray)
					{
	?>
					<tr>
				     <td><?php 
				          echo  $allForestPoints[$pointId];
				         ?></td>
				     <td>&nbsp;</td>
				     <td>&nbsp;</td>
				    </tr>
				   
	<?php 				
				foreach ($treeDetailArray as $treeIdFinalId=>$value)
					{
						?>
					<tr>
				     <td></td>
				     <td><?php echo $treeList[$treeIdFinalId]->vc_name; 
				      ?></td>
				     <td><?php echo $value?></td>
				    </tr>
					<?php 
					}
					}
					?></table>
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
	var pointMaster = document.getElementById('pointMaster');
	
	
	
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

var element1 = document.createElement("select");
    
    element1.name="source["+rowCount+"]";
   // element1.id="i_timber_id_"+(rowCount);;
    element1.id="source["+rowCount+"]";
    element1.setAttribute("onChange", "checkExisting('"+rowCount+"');");
    
    
    for (i=0; i< pointMaster.options.length; i++)
    {
            SelID=pointMaster.options[i].value;
            SelText=pointMaster.options[i].text;
            var newRow = new Option(SelText,SelID);
            element1.options[element1.length]=newRow;
        }
	cell2.appendChild(element1);

	
	
	var cell2 = row.insertCell(4);

	
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="volume["+rowCount+"]";
	elementcount.id="volume["+rowCount+"]";
//	elementcount.setAttribute("onBlur", "outFocus(this)");
	elementcount.setAttribute("onBlur", "validateVolume('"+rowCount+"')");
	
	elementcount.setAttribute("onFocus", "getFocus(this)");
	cell2.appendChild(elementcount);
	
	var cell2 = row.insertCell(5);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="charges["+rowCount+"]";
	elementcount.id="charges["+rowCount+"]";
	elementcount.setAttribute("onBlur", "outFocus(this)");
	elementcount.setAttribute("onFocus", "getFocus(this)");
	cell2.appendChild(elementcount);

	var cell2 = row.insertCell(6);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="comission["+rowCount+"]";
	elementcount.id="comission["+rowCount+"]";
	elementcount.setAttribute("onBlur", "outFocus(this)");
	elementcount.setAttribute("onFocus", "getFocus(this)");
	cell2.appendChild(elementcount);


	var cell2 = row.insertCell(7);
	var elementcount = document.createElement("input");
	elementcount.type = "text";
	elementcount.value='0';
	elementcount.name="distance["+rowCount+"]";
	elementcount.id="distance["+rowCount+"]";
	elementcount.setAttribute("onBlur", "outFocus(this)");
	elementcount.setAttribute("onFocus", "getFocus(this)");
	cell2.appendChild(elementcount);

	var cell2 = row.insertCell(8);
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

