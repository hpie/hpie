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
	<td><b>Trees/Product</b></td>
	<?php 
foreach($mtimberDetail as $key=>$name){
	?>
	<td colspan="3" style='text-align:center' align="center"><b><?php echo $name; ?></b></td>
	<?php 
	}
	?>
	<td colspan="3" style='text-align:center'><b>Total</b></td>
</tr>

<tr>
	<td><b>Trees/Product</b></td>
	<?php 
foreach($mtimberDetail as $key=>$name){
	?>
	<td colspan="1" style='text-align:center'><b>Count</b></td>
	<td colspan="1" style='text-align:center'><b>Vol</b></td>
	<td colspan="1" style='text-align:center'><b>Charges</b></td>
	<?php 
	}
	?>
	<td colspan="1" style='text-align:center'><b>Count</b></td>
	<td colspan="1" style='text-align:center'><b>Vol</b></td>
	<td colspan="1" style='text-align:center'><b>Charges</b></td>
</tr>

<?php 
foreach($mconvertedTrees as $treeId=>$treeName){
	?>
	<tr>
	<td  style='text-align:center'><b><?php echo $treeName; ?></b></td>
	<?php 
	$totalCount=0;
	$totalVolume=0;
	$totalCharges=0;
	
	foreach($mtimberDetail as $key=>$name){
		$finalTotal[$key]['count']+=($getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0');
		$finalTotal[$key]['volume']+=display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne'],3);
		$finalTotal[$key]['charges']+=display_float($getConvertedTimberDetail[$treeId][$key]['i_conversion_charges'],2);;
		$totalCount+=($getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0');
		$totalVolume+=display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne'],3);;
		$totalCharges+=display_float($getConvertedTimberDetail[$treeId][$key]['i_conversion_charges'],3);
	?>
		<td colspan="1" style='text-align:right'><?php echo ($getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0'); ?></b></td>
		<td colspan="1" style='text-align:right'><?php echo display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne'],3); ?></b></td>
		<td colspan="1" style='text-align:right'><?php echo display_float($getConvertedTimberDetail[$treeId][$key]['i_conversion_charges'],2); ?></b></td>

	<?php 
	}
	?>
	
	<td class="headrow" colspan="1" style='text-align:right'><b><?php $gtotalCount+=$totalCount;echo $totalCount; ?></b></td>
	<td class="headrow" colspan="1" style='text-align:right'><b><?php $gtotalVolume+=$totalVolume;echo $totalVolume;  ?></b></td>
	<td class="headrow" colspan="1" style='text-align:right'><b><?php $gtotalCharges+=$totalCharges;echo $totalCharges;  ?></b></td>	
	</tr>
	<?php 
	}
	?>
<tr class="headrow">
	<td><b>Total</b></td>
	<?php 
foreach($mtimberDetail as $key=>$name){
	?>
	<td colspan="1" style='text-align:right'><b><?php echo $finalTotal[$key]['count'];?></b></td>
	<td colspan="1" style='text-align:right'><b><?php echo $finalTotal[$key]['volume']?></b></td>
	<td colspan="1" style='text-align:right'><b><?php  echo $finalTotal[$key]['charges']?></b></td>
	<?php 
	}
	?>
	<td colspan="1" style='text-align:right'><b><?php echo $gtotalCount; ?></b></td>
	<td colspan="1" style='text-align:right'><b><?php echo $gtotalVolume;  ?></b></td>
	<td colspan="1" style='text-align:right'><b><?php echo $gtotalCharges;  ?></b></td>	
</tr>	
<?php 
}
?>
</table>