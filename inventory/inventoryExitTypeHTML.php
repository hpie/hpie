
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

<table border="1px">
<tr>
	<td><b>Trees/Product</b></td>
	<td><b>Timber</b></td>
	<td><b>Type</b></td>
	<td colspan="1" style="text-align:center"><b>Item Sold</b></td>
	<td colspan="1" style="text-align:center"><b>Volume Sold</b></td>
	<td colspan="1" style="text-align:center"><b>Selling Price</b></td>
	<td colspan="1" style="text-align:center"><b>Exit Type</b></td>
	<td colspan="1" style="text-align:center"><b>Exit Location</b></td>

</tr>


<?php 
print_r($sgetConvertedTimberDetail);
foreach($sgetConvertedTimberDetail as $id=>$data){
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

    
		
		
		$totalSold+=($sgetConvertedTimberDetail[$treeId][$key]['i_count'] != '' ? $sgetConvertedTimberDetail[$treeId][$key]['i_count']: '0');;
		$totalSellingVolume+=display_float( $sgetConvertedTimberDetail[$treeId][$key]['i_volumne'],3);
		$totalSellingPrice+=display_float($sgetConvertedTimberDetail[$treeId][$key]['i_conversion_charges']* $sgetConvertedTimberDetail[$treeId][$key]['i_volumne']);
		?>
		<tr>
		<td style="text-align:left"><b><?php echo $data['i_tree_id']; ?></b></td>
		<td colspan="1" style="text-align:left"><?php echo ($name['vc_name']); ?></td>
		<td colspan="1" style="text-align:left"><?php echo ($name['timberType']); ?></td>
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
	
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalSold,0);  ?></b></td>
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalSellingVolume,3);  ?></b></td>	
	<td colspan="1" style="text-align:right"><b><?php echo display_float($gtotalSellingPrice,2);  ?></b></td>	
	

</tr>	

</table>