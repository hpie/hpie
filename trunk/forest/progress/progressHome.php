<?php
$markDetailId=$_GET['markId'];
$progressID=$_GET['progressId'];
$treeId=$_GET['treeid'];
$arrTreeTypes=array();
$arrTreeTypes=$common->getTreeType($markDetailId);
$arrMarkedVolume=array();
$i_tree_volume='';

$markDetail =  new MarkDetailDO();
$volumeTableDetail=$markDetail->getVolumeLevelDetail($markDetailId);

if(isset($_GET['treeid'])){
	$i_tree_volume=$common->getMarkedVolume($markDetailId,$treeId);
}

if(isset($_POST['update']))
{
	
	extract($_POST);

	$count=0;
if($updatePrevious > 0)
	{
		$existingDetail=0;
	}
	else 
	{
	$arFieldValues['i_mark_id']=$markDetailId;
	$arFieldValues['i_contractor_id']=$i_contractor_id;
	$arFieldValues['vc_month']=$i_month_id;
	$arFieldValues['vc_year']=$i_year;
	$list=$common->selectCondition('progress_felling_master', $arFieldValues);
	echo count($list);
	echo '<br>'.$updatePrevious;
	$existingDetail=count($list);
	}
	echo $existingDetail;
	echo '<br>'.$updatePrevious;
	if($existingDetail > 0 && ($updatePrevious == '' || $updatePrevious=='0'))
	{
		$errorMsg    ="Entry Already Exists for ".$_POST['month']."/".$_POST['year'] ."of this contractor ";
	}
	else
	{
	
		
		if(($updatePrevious == '' || $updatePrevious=='0'))
		{	
		echo 'No Data inside the table';
		$arMarkedPrice['i_mark_id']=$markDetailId;
		$arMarkedPrice['i_contractor_id']=$i_contractor_id;
		$arMarkedPrice['i_current_count']=0;
		$arMarkedPrice['vc_month']=$i_month_id;
		$arMarkedPrice['vc_year']=$i_year;
		$arMarkedPrice['i_total_marked']=0;
		$arMarkedPrice['i_total_Volume']=0;
	    $progressId = $db->insert('progress_felling_master',$arMarkedPrice);
		}
		else
		{
			$progressId=$updatePrevious;
		}
		echo $progressId;
		$db->deleteProgressFellingDetail($progressId);
		$db->deleteProgressFellingCharges($progressId);
		$totalCount=0;
		$totalVolume=0;
		print_r($catvalue);
		foreach($catvalue as $key=>$categoryValueArray){
			
			foreach($categoryValueArray as $id=>$value){
				print_r($value);
				$fellingDetail['i_progress_id']=$progressId ;
				$fellingDetail['i_tree_id']=$key;
				$fellingDetail['i_category_id']=$id;
				$fellingDetail['i_count']=$value;
				$fellingDetail['i_volume']=($volumeTableDetail[$key][$id]['volume']*$value);
				$fellingDetail['i_felling_charges']=($fellingCharges[$key]*$volumeTableDetail[$key][$id]['volume']*$value);
				
				$totalCount+=$value;
				$totalVolume+=($volumeTableDetail[$key][$id]['volume']*$value);
				$id = $db->insert('progress_felling_detail',$fellingDetail);
				
				
			}
		}
		
		
		$fellingChargesArray=array();
		foreach ($fellingCharges as $key=>$categoryValueArray)
		{
			$fellingChargesArray['i_progress_id']=$progressId ;
			$fellingChargesArray['i_category_id']=$key;
			$fellingChargesArray['i_felling_charges']=$categoryValueArray;
			$chargesId = $db->insert('progress_felling_charges',$fellingChargesArray);
			
		}
	  
	     $arCondition = array('id'=>$progressId);
		 $arFieldValues['i_total_marked']=$totalCount;
		 $arFieldValues['i_total_Volume']=$totalVolume;
		 
		 $id = $db->update('progress_felling_master',$arFieldValues,$arCondition);
	  

	}
	ob_end_clean();
   header("Location:".BASE_URL."index.php?page=fellingHome&markId=".$markDetailId);

}

if(isset($_POST['cancel'])){
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=fellingHome&markId=".$markDetailId);

}

$markList=$markDetail->getTreeMarkDetail($markDetailId,$treeId);


$treeEntryDetail=$markList;

if($progressID !='')
{
$arFieldValues['id']=$progressID;
$progressMasterDetail=$common->selectCondition('progress_felling_master', $arFieldValues);

$i_contractor_id=$progressMasterDetail[0]['i_contractor_id'];
$i_month_id=$progressMasterDetail[0]['vc_month'];
$i_year=$progressMasterDetail[0]['vc_year'];

$voulmeDetail=$markDetail->getFellingConversionDetail($progressID);

$tableP= 'progress_felling_charges';
$fellingCharges= $common->getProgressChargesInfo($tableP,$progressID);
}
else 
{
$i_contractor_id='';
$i_month_id='';
$i_year='';
}

$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
$forestId     =$arrMarkDetail[0]['i_forest_id'];
$arrCondition = array('i_forest_id'=>$forestId,'i_tree_id'=>$treeId);

$priceMaster =$common->selectCondition('m_price', $arrCondition);
$arrCondition = array('i_mark_id'=>$markDetailId,'i_tree_id'=>$treeId);
$currentPrice=$common->selectCondition('c_marked_price',$arrCondition);
$unitPriceValue=0;
$defaultPrice=$priceMaster[0]['price'];
if($currentPrice !='' && $currentPrice[0]['i_value'] > 0)
{
	$unitPriceValue=$currentPrice[0]['i_value'];
}
else
{
	$unitPriceValue=$priceMaster[0]['price'];;
}

$markList=$markDetail->getMarkDetailSummarry($markDetailId,'','Y');
$voulmePrevDetail=$markDetail->getFellingPreviousConversionDetail($markDetailId,$progressID);
$arrAllcontractors=$common->getContractorWork($markDetailId,1);

if($fellingCharges == '')
{
$table= 'c_conversion_felling';
$fellingCharges= $common->getConversionInfo($table,$forestId);
}


?>
<head>


<link rel="stylesheet" type="text/css" media="all"
	href="css/jsDatePick_ltr.min.css" />
<link rel="stylesheet" type="text/css" media="all"
	href="css/jqstyle.css" />
<style>


.showDiv {
	display: block;
}

.hideDiv {
	display: none;
}
</style>
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>

//script for validation	
  $(document).ready(function(){
    $("form").validate();
  });
 
  function addNextDiv(divId){
   document.getElementById('typeDiv_'+divId).className="showDiv"
 
   var x=2;
   for(x==2;x<=divId;x++){
   document.getElementById('typeSpan_'+x).innerHTML="<a href='javascript:hideDiv("+x+")'>Delete</a>";
   }

  }
  function hideDiv(divId){
   document.getElementById('typeDiv_'+divId).className="hideDiv";
   var total_cat=document.getElementById('total_cat').value;
   var x=1;
   var catIds=document.getElementById('categoryids').value;
   var catArray=catIds.split(",");
   for(x=0;x<catArray.length;x++){
            document.getElementById("catvalue["+divId+"]["+catArray[x]+"]").value=0;
   }
   calculateVolumne();
  }

 function calculateVolumne(treeId)
 {
	
	 var treesid=document.getElementById('treeTypeHidden').value;
	 var treesArray=treesid.split(",");
	 var catIds=document.getElementById('categoryids').value;
	 var catArray=catIds.split(",");
	    for(x=0;x<catArray.length;x++)
	    	{
	    		document.getElementById('catVolume['+catArray[x]+']').value='0';
		    }
    
	for(y=0;y<treesArray.length;y++){
	    for(x=0;x<catArray.length;x++){
           var catValue=document.getElementById("catvalue["+treesArray[y]+"]["+catArray[x]+"]").value;
		   
           var catVolume=0;
             try 
             {
            	 
                  
             	 catVolume=document.getElementById(catArray[x]+"_"+treesArray[y]).value;
                
                  }
             catch(error)
             {
                
                 }
            var exisVolume=document.getElementById('catVolume['+catArray[x]+']').value;;
           exisVolume=parseFloat(exisVolume)+parseFloat(catVolume)* parseFloat(catValue);
       	   document.getElementById('catVolume['+catArray[x]+']').value=roundNumber(exisVolume,3);
      }
    }
	   
 } 

	//Function for calender
	
	
</script>
</head>
<style type="text/css">
	@import url(css/menu_style.css); 
</style>
<ul id="menu">
	<li><a id="<?php echo pageUrl("home",$currentPage)?>"
		href="index.php?page=fellingHome&markId=<?php echo $markDetailId;?>" title="Goto Home Page">Back</a></li>
</ul>

<br>
<?php 
$markDetailId=$_REQUEST['markId'];
$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
echo "<b>Working on Lot-No ".$markIdDetail[0]['vc_lotno']."</b>";
?>		
<?php 
	if(count($markList) > 0)
	{
	?>

<form id="form" method="post" action=""><input type='hidden'
	value='<?php echo $markDetailId?>' id='markid' name='markid' />
	<input type='hidden' value='<?php echo $progressID?>'
	name='updatePrevious' id='updatePrevious' />
<table align="center" width="90%" border="0" cellspacing="0"
	cellpadding="">
	
	<tr>
	<td colspan="5">
	  <?php 
	   echo $errorMessage;
	  ?>
	 </td>
	</tr>
	<tr>
		<td colspan="2" align="center"><b><u>Mark Trees</u></b> <br></br>
		</td>
	</tr>
	<tr>
		<td>Contractor</td>
		<?php 
		 if($progressID > 0)
		  {
		  	
			?>
		   <td>
		   <?php 
		   echo $arrAllcontractors[$i_contractor_id];
		  	?>
		   </td>
		  <?php	
		  }
		  else 
		  {
		  	?>
		<td colspan="3"><span style="position: relative;"> <?php echo makeSelectOptions($arrAllcontractors,"i_contractor_id",$i_contractor_id,"",0,"class='required'");?>
		</span></td>
	    <?php 
		  }
		 ?>
	</tr>
	<tr>
		<td colspan="1">Month/Year</td>
		<td colspan="3" align="left">
		<table border=0>
		<?php 
		  if($progressID > 0)
		  {
		  ?>
			<tr>
				<td width="30%"><?php echo $arrMonths[$i_month_id];?>/<?php echo $arrYears[$i_year];?></td>
				<td>
				<input name='i_month_id' type='hidden' value='<?php echo $i_month_id;?>' />
				<input name='i_year'     type='hidden' value='<?php echo $i_year;?>' />
				</td>
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
	
	
	
	<tr>
		<td align="left" class="fill" colspan="3">&nbsp;&nbsp;Tree Name/<?php echo $ccategory;?>&nbsp;&nbsp;
		</td>
	
	
	<tr>
		<td style="width: 20px">&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden"
			name="total_cat" id="total_cat" value="<?=count($catList); ?>" /></td>
			<?php
			$cathidden='';
			foreach($catList as $key=>$category){

					
				if($cathidden =='')
				{
					$cathidden=$category->id;
				}
				else
				{
					$cathidden.=','.$category->id;
				}
				?>

		<td style="width: 20px"><?php echo $category->vc_name;?></td>

		<?php
			}
			?>

	</tr>
	<tr>
	<?php
	$count=0;
	$treeTypeHidden='';
	foreach($markList as $k=>$v){
		$count++;
		if($treeTypeHidden =='')
		{
			$treeTypeHidden=$k;
		}
		else
		{
			$treeTypeHidden.=','.$k;
		}
		echo '<tr><td style="width:20%" valign="midle">'.$treeList[$k]->vc_name.'</td>';
		$addCount=0;
		foreach($catList as $key=>$category){
			$addMore="";

			if($key==count($catList) && $k<count($arrTreeTypes)){
				$addMore="Add More";
			}
			?>


		<td style="width: 20%">
		<table>
		<td>
		<input
			onblur="outFocus(this,'<?php echo $volumeTableDetail[$category->id]['volume']?>','<?php echo $category->id;?>','<?php echo $k;?>','prevcatvalue[<?php echo $k;?>][<?php echo $category->id;?>]')"
			onfocus="getFocus(this);" class="required number"
			name="catvalue[<?php echo $k;?>][<?php echo $category->id;?>]"
			id="catvalue[<?php echo $k;?>][<?php echo  $category->id;?>]"
			value="<?php echo ($voulmeDetail[$k][$category->id]->i_count =='' ? '0' :$voulmeDetail[$k][$category->id]->i_count );?>"
			style="width: 50px;" />
		</td>
		<tr>	
		<td>
		(
		<?php
             echo ($v[$category->id]->i_value-$voulmePrevDetail[$k][$category->id]->i_count);	
		?>)
		<input type='hidden'
			name="prevcatvalue[<?php echo $k;?>][<?php echo $category->id;?>]"
			id="prevcatvalue[<?php echo $k;?>][<?php echo  $category->id;?>]"
			value="<?php echo ($v[$category->id]->i_value-$voulmePrevDetail[$k][$category->id]->i_count);?>"
			style="width: 50px;" />
		
		</td>
	    </tr>
		</table>
		
			</td>
			<?
			if($treeEntryDetail[$k][$category->id]->i_value >0)
			{
				$addCount++;
			}
		}

	}
	?>

	</tr>
	<tr>

		<td style="width: 20%">Volume</td>
		<?php
		foreach($catList as $key=>$category)
		{
			?>
		<td style="width: 20%"><input style="background-color: #dcdcdc; width:50px;" class="required number"
			name="catVolume[<?php echo $category->id;?>]"
			id="catVolume[<?php echo  $category->id;?>]"
			value="<?php   echo($voulmeDetail[$category->id]->i_tree_volume == '' ? '0': $voulmeDetail[$category->id]->i_tree_volume); ?>"
			readonly /></td>
			<?
		}
		?>
	</tr>

    <tr>

		<td style="width: 20%">Felling Charges</td>
		<?php
		foreach($catList as $key=>$category)
		{
			?>
		<td style="width: 20%"><input class="required number"
			name="fellingCharges[<?php echo $category->id;?>]"
			id="fellingCharges[<?php echo  $category->id;?>]"
			onfocus="getFocus(this);"
			value="<?php   echo(($fellingCharges[$category->id]['i_felling_charges']=='' ?'0':$fellingCharges[$category->id]['i_felling_charges'])); ?>"
			style="width: 50px;"  /></td>
			<?
		}
		?>
	</tr>
	<tr>
		<td align="left" colspan="5">
		<table>
			<tr>
				<td colspan='2' align="right">
				<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
					<tr>
						<td><input type="button" name="Cancel" id="Cancel" value="Cancel"
					onclick="javascript:parent.location='index.php?page=fellingHome&markId=<?php echo $markDetailId;?>'" /></td>
			

						<td><input type="submit" name="update" id="upadte" value="Update" /></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan=2><br></br>

		</td>
	</tr>
</table>
<input type='hidden' value='<?php echo $cathidden?>' id='categoryids' />
<input type='hidden' value='<?php echo $treeTypeHidden?>'
	id='treeTypeHidden' /> <?php 
	foreach($volumeTableDetail as $key=>$volumeTable){

		foreach($volumeTable as $category=>$detail)
		{
			?> <input type='hidden'
	id='<?php echo $category ;?>_<?php echo $key ;?>'
	value='<?php echo $detail['volume'] ;?>' /> <?php
		}
	}
	?></form>
<?php 
	}
	else 
	{
		?>
		<table border=0 style="width: 20%" cellspacing="0" cellpadding="0">
			<tr>
			 <td>There is no marking for this Lot</td>
			</tr>	
					<tr>
						<td>
						<form method="post" action="">
						<input type='submit' class='btnStatus' name='cancel'
							value='Cancel' />
						</form>
						</td>
					
							</tr>
							
		</table>
		<?php 
	}
?>

<script>
function outFocus(control,volume,category,tree,preValue)
{
	

	if(volume=='')
	{
    volume=0;
		}

	if(parseInt(document.getElementById(preValue).value) < parseInt(control.value))
	{
	   control.value='0';
       alert("You have exceed the maximum value");
       return;
  	}
	if(control.value=='')
	{
		control.value='0';
	}
  calculateVolumne(tree);
	
}
function getFocus(control)
{
	if(control.value=='0')
	{
		control.value='';
		
	}
}

function roundNumber(num, dec) {
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}

calculateVolumne();
</script>
	<?php
	include('footer.php');
	?>