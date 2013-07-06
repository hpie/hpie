<style>
.treetotal
{
	background-color:#999999;
	color:white;
}

.classtotal
{
	background-color:#666666;
	color:white;
}

.overalltotal
{
	background-color:#333333;
	color:red; 
}

.headrow
{
	background-color:#aaaaaa;
}
.evenrow
{
	background-color:#cccccc;
}

.oddrow
{
	background-color:#eeeeee;
}
</style>
<script>

  function  displayTimber(id)
  {
   document.getElementById('fillingDetail'+id).style.display="block";
   document.getElementById(id+"Display").style.display="none";
   document.getElementById(id+"Hide").style.display="block";
   }
  function  hideTimber(id)
  {
   document.getElementById('fillingDetail'+id).style.display="none";
   document.getElementById(id+"Display").style.display="block";
   document.getElementById(id+"Hide").style.display="none";
  }
</script>
<?php
//Timber detail aarray start
if(!isset($_GET['f'])){
	removeFromSession('treeConversionArray');
}



/* start code update by priyanka 9/2/2011*/

if($_GET['page']=='markCompleteDetail'){
	//timber detail access start
	foreach ($markTressDetails as $key=>$value)
	{
		if($key> 0)
		{
			$timberDetail =  new TimberDO();
			$timberDetailArray=$timberDetail->getTimberDetail($key,$markDetailId);
			$treeConversionArray[$key]=$timberDetailArray;
		}
		$_SESSION['treeConversionArray']=serialize($treeConversionArray);
	}
	//timber detail access end
}




//Timber detail array ends

?>

<?php 
if(!isset($markList) || empty($markList)){

	echo "<tr><td colspan=2 align='center'>No Record Entered</tr>";

}
else{
	?>
<table border="1">	
<tr>
	<td><b>Category</b></td>
	<?php 
foreach($markedTreeList as $key=>$category){
	?>
	<td colspan="3" style='text-align:center' align="center"><b><?php echo $category; ?></b></td>
	<?php 
	}
	?>
	<td align='center'><b>Total</b></td>
</tr>
<tr>
	<td><b>&nbsp;</b></td>
	<?php 
foreach($markedTreeList as $key=>$category){
	?>
	<td align="center">Count</td>
	<td align="center">Volume</td>
	<td align="center">Charges</td>
	<?php 
	}
	?>
	<td align="center">Count</td>
	<td align="center">Volume</td>
	<td align="center">Charges</td>
	
</tr>
<?php 
$finalTotal =array();
$gtotalVolume=0;;
$gtotalCount=0;

foreach($catList as $key=>$categoryDetail){

	if($fellingDetail[$key] == '')
		continue;	
	?>

	<tr>
	<td><b><?php echo $categoryDetail->vc_name; ?></b></td>
	<?php 
	$totalCount=0;
	$totalVolume=0;
	$chargesTotal=0;
    
	foreach($markedTreeList as $treeId=>$category){
	$finalTotal[$treeId]['count']+=$fellingDetail[$key][$treeId]['i_count'];
	$finalTotal[$treeId]['volume']+=$fellingDetail[$key][$treeId]['i_volumne'];
	$finalTotal[$treeId]['charges']+=$fellingDetail[$key][$treeId]['i_felling_charges'];
	
	$totalCount+=($fellingDetail[$key][$treeId]['i_count'] != '' ? $fellingDetail[$key][$treeId]['i_count'] : '0');
	$totalVolume+=display_float($fellingDetail[$key][$treeId]['i_volumne']!= '' ? $fellingDetail[$key][$treeId]['i_volumne'] : '0',3);	
	$chargesTotal+=display_float($fellingDetail[$key][$treeId]['i_felling_charges']!= '' ? $fellingDetail[$key][$treeId]['i_felling_charges'] : '0',3);
	?>
	<td align="right"><?php echo ($fellingDetail[$key][$treeId]['i_count'] != '' ? $fellingDetail[$key][$treeId]['i_count'] : '0');?></td>
	<td align="right"><?php echo display_float($fellingDetail[$key][$treeId]['i_volumne']!= '' ? $fellingDetail[$key][$treeId]['i_volumne'] : '0',3);; ?></td>
	<td align="right"><?php echo display_float($fellingDetail[$key][$treeId]['i_felling_charges']!= '' ? $fellingDetail[$key][$treeId]['i_felling_charges'] : '0',2);; ?></td>
	
	<?php 
	}
	?>
	<td class="headrow" align="right"><b><?php $gtotalCount+=$totalCount; echo  $totalCount;?></b></td>
	<td class="headrow" align="right"><b><?php $gtotalVolume+=$totalVolume; echo $totalVolume;?></b></td>
	<td class="headrow" align="right"><b><?php $gchargesTotal+=$chargesTotal; echo display_float($chargesTotal,2);?></b></td>
</tr>
	<?php 
	
	
}
?>

<tr class="headrow">
	<td><b>Total</b></td>
	<?php 
	$totalCount=0;
	$totalVolume=0;
foreach($markedTreeList as $treeId=>$category){
	$totalCount+=($fellingDetail[$key][$treeId]['i_count'] != '' ? $fellingDetail[$key][$treeId]['i_count'] : '0');
	$totalVolume+=display_float($fellingDetail[$key][$treeId]['i_volumne']!= '' ? $fellingDetail[$key][$treeId]['i_volumne'] : '0',3);	
	
	?>
	<td align="right"><b><?php echo ($finalTotal[$treeId]['count']);?></b></td>
	<td align="right"><b><?php echo display_float($finalTotal[$treeId]['volume'],3);; ?></b></td>
	<td align="right"><b><?php echo display_float($finalTotal[$treeId]['charges'],2);; ?></b></td>
	
	<?php 
	}
	?>
	<td align="right"><b><?php echo  $gtotalCount;?></b></td>
	<td align="right"><b><?php  echo $gtotalVolume;?></b></td>
	<td align="right"><b><?php  echo $gchargesTotal;?></b></td>

	
</tr>
<?php 
}
?>
</table>