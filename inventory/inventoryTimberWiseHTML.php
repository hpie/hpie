
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
<div  style='width: 280px;padding-left:0px;'>
<?php 

if($economicsId == '')
{
$common->generateForm ($_SERVER,$pageKey,$markDetailId,0);
}
else 
{
$common->generateForm ($_SERVER,$pageKey,$markDetailId,$economicsId);
}
?>	
</div>
<table border="1px">
<tr>
	<td><b>Trees/Product</b></td>
	<td><b>Timber</b></td>
	<td><b>Type</b></td>
	<td colspan="1" style="text-align:center"><b>Estimated Unit Price</b></td>
	<td colspan="1" style="text-align:center"><b>In Stock</b></td>
	<td colspan="1" style="text-align:center"><b>Produced Goods</b></td>
	<td colspan="1" style="text-align:right"><b>Pro.Vol</b></td>

	<td colspan="1" style="text-align:right"><b>Total Charges</b></td>
	<td colspan="1" style="text-align:right"><b>Estimated Price</b></td>

	<td colspan="1" style="text-align:center"><b>Item Sold</b></td>
	<td colspan="1" style="text-align:center"><b>Volume Sold</b></td>
	<td colspan="1" style="text-align:center"><b>Selling Price</b></td>

</tr>


<?php 
foreach($mconvertedTrees as $treeId=>$treeName){
	?>
	
	<?php 
	$totalCount=0;
	$totalVolume=0;
	$totalCharges=0;
    $stockDetail=0;
    $totalStock=0;
    $totalSold=0;
    $totalePrice=0;
    $totalSellingPrice=0;
    $totalSellingVolume=0;

    foreach($mtimberDetail as $key=>$name){
		if($getConvertedTimberDetail[$treeId][$key]['i_count']=='' || $getConvertedTimberDetail[$treeId][$key]['i_count']==0  )
		  continue;
		$finalTotal[$key]['count']+=($getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0');
		$finalTotal[$key]['volume']+=display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne']);
		$finalTotal[$key]['charges']+=display_float($getConvertedTimberDetail[$treeId][$key]['i_conversion_charges']);;
		
		
		
		$totalCount+=($getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0');
		$totalVolume+=display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne']);;
		$totalCharges+=display_float($getConvertedTimberDetail[$treeId][$key]['i_conversion_charges']* $getConvertedTimberDetail[$treeId][$key]['i_volumne']);
	   
		$stockDetail=$getSockTimberDetail[$treeId][$key]['i_count'] != '' ? $getSockTimberDetail[$treeId][$key]['i_count']: '0';
		$sold=$getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0';
		$stockDetail=($getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0');
		$stockDetail-=($sgetConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $sgetConvertedTimberDetail[$treeId][$key]['i_count']: '0');
		$totalStock+=$stockDetail;
		$totalePrice+=display_float(display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne']) * $unitPriceValue[$name['i_timber_id']]['i_value']);
		
		$totalSold+=($sgetConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $sgetConvertedTimberDetail[$treeId][$key]['i_count']: '0');;
		$totalSellingVolume+=display_float( $sgetConvertedTimberDetail[$treeId][$key]['i_volumne'],3);
		$totalSellingPrice+=display_float($sgetConvertedTimberDetail[$treeId][$key]['i_conversion_charges']* $sgetConvertedTimberDetail[$treeId][$key]['i_volumne']);
		
		
		
		
		?>
		<tr>
		<td style="text-align:left"><b><?php echo $treeName; ?></b></td>
		<td colspan="1" style="text-align:left"><?php echo ($name['vc_name']); ?></td>
		<td colspan="1" style="text-align:left"><?php echo ($name['timberType']); ?></td>
		<td colspan="1" style="text-align:right"><b><?php echo $unitPriceValue[$name['i_timber_id']]['i_value'];?></b></td>
	
		<td colspan="1" style="text-align:right"><?php echo $stockDetail; ?></td>
		
		<td colspan="1" style="text-align:right"><?php echo ($getConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $getConvertedTimberDetail[$treeId][$key]['i_count']: '0'); ?></td>
		<td colspan="1" style="text-align:right"><?php echo display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne'],3); ?></td>
		<td colspan="1" style="text-align:right"><?php echo display_float($getConvertedTimberDetail[$treeId][$key]['i_conversion_charges']* $getConvertedTimberDetail[$treeId][$key]['i_volumne']); ?></td>
    
       <td colspan="1" style="text-align:right"><?php echo display_float(display_float($getConvertedTimberDetail[$treeId][$key]['i_volumne']) * $unitPriceValue[$name['i_timber_id']]['i_value']); ?></td>
    
    	<td colspan="1" style="text-align:right"><?php echo ($sgetConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $sgetConvertedTimberDetail[$treeId][$key]['i_count']: '0'); ?></td>
		<td colspan="1" style="text-align:right"><?php echo display_float( $sgetConvertedTimberDetail[$treeId][$key]['i_volumne'],3); ?></td>
    	<td colspan="1" style="text-align:right"><?php echo display_float($sgetConvertedTimberDetail[$treeId][$key]['i_conversion_charges']* $sgetConvertedTimberDetail[$treeId][$key]['i_volumne']); ?></td>
    
	    
        </tr>  
	<?php 
	}
	
	?>
	
	<tr class="headrow">
	<td style="text-align:center" align="center"><b>&nbsp;</b></td>
	<td colspan="1" style="text-align:center"><b>&nbsp;</b></td>
	<td colspan="1" style="text-align:center"><b>&nbsp;</b></td>
	<td colspan="1" style="text-align:center" align="center"><b>&nbsp;</b></td>
	
	<td colspan="1" style="text-align:right"><b><?php $gtotalStock+=$totalStock; echo $totalStock?></b></td>
	<td colspan="1" style="text-align:right"><b><?php $gtotalCount+=$totalCount;echo $totalCount; ?></b></td>
	<td colspan="1" style="text-align:right"><b><?php $gtotalVolume+=$totalVolume;echo display_float($totalVolume,3);  ?></b></td>
	<td colspan="1" style="text-align:right"><b><?php $gtotalCharges+=$totalCharges;echo display_float($totalCharges);  ?></b></td>	
	<td colspan="1" style="text-align:right"><b><?php $gtotalePrice+=$totalePrice;echo display_float($totalePrice);  ?></b></td>	
	
	
	<td colspan="1" style="text-align:right"><b><?php $gtotalSold+=$totalSold;echo display_float($totalSold,0);  ?></b></td>
	<td colspan="1" style="text-align:right"><b><?php $gtotalSellingVolume+=$totalSellingVolume;echo display_float($totalSellingVolume,3);  ?></b></td>	
	<td colspan="1" style="text-align:right"><b><?php $gtotalSellingPrice+=$totalSellingPrice;echo display_float($totalSellingPrice,2);  ?></b></td>	
	
	
	</tr>
	<?php 
	}
	?>
	
	<tr>
	<td ></td>
	</tr>
<tr class="headrow">
	<td  style="text-align:center" align="center"><b>Total</b></td>
	<td colspan="1" style="text-align:center"><b>&nbsp;</b></td>
	<td colspan="1" style="text-align:center"><b>&nbsp;</b></td>
	<td colspan="1" style="text-align:center"><b>&nbsp;</b></td>
	<td colspan="1" style="text-align:right"><b><?php echo $gtotalStock; ?></b></td>
	
	<td colspan="1" style="text-align:right"><b><?php echo $gtotalCount; ?></b></td>
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalVolume,3);  ?></b></td>
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalCharges);  ?></b></td>	
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalePrice);  ?></b></td>	

	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalSold,0);  ?></b></td>
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalSellingVolume,3);  ?></b></td>	
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalSellingPrice,2);  ?></b></td>	
	

</tr>	
<?php 
}
?>
</table>