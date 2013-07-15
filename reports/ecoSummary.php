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


printButton('800','javascript:window.print()','275px');


echo '<center><h2>Economics Summary Report</h2></center>';
$selectList=$common->getEcnomicsDateSelect($markDetailId);
if($selectList != '')
{

$markDetailId=$_GET['markId'];
$markTressDetails=$common->getTreeMarked($_GET['markId']);
$markDetail =  new MarkDetailDO();

$markList=$markDetail->getMarkDetailVolumeSummarry($markDetailId);
$volumneList=$markDetail->getMarkIdVolumeDetail($markDetailId);

$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);


$priceMaster=$markDetail->getPriceMaster($markIdDetail['0']['i_forest_id']);


$markIdDetail['0']['id'];
$forestDetail=$common->getInfo('m_forest',$markIdDetail['0']['i_forest_id']);
$forestName=$forestDetail['0']['vc_name'];
$forestDFO=$dfoList[$forestDetail['0']['i_department_id']];

$markIdDetailHTML=$markDetail->getMarkIdDetailHTML($markDetailId,$forestDFO.'/'.$forestName);
$prevTimberSummary=$markDetail->getprevTimberSum($_GET['markId']);

echo $markIdDetailHTML;


$totalArray = array();
if(!isset($markList) || empty($markList)){
	echo "<tr><td colspan=2 align='center'>No Record Entered";
} else{
	?>
<table border="1">
	<tr class="headrow">
		<td align='center'><b>Tree Name</b></td>
		<td align='center'><b>Marked Volume</b></td>
		<td align='center'><b>Estimated Price</b></td>
		<td align='center'><b>Converted Volume</b></td>
		<td align='center'><b>Actual Price</b></td>
		<td align='center'><b>Conversion(%)</b></td>
		<td align='center'><b>Profit/Loss</b></td>
	</tr>
	<?php
	
	foreach($markList as $tree=>$detail){
		$totalArray['estimatedVolumne']+=$detail->i_value;;
		$totalArray['actualVolumne']+=$prevTimberSummary[$tree]['i_current_volume'];
		
		$totalArray['estimatedprice']+=display_float(($detail->i_value)* ($priceMaster[$tree]));;
		
		$totalArray['actualPrice']+=display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']) *($priceMaster[$tree]));
		
		
		?>
	<tr>
		<td align='center'><b><?php echo $treeList[$tree]->vc_name;?></b></td>
		<td align='center'><b><?php echo display_float($detail->i_value);?></b></td>
		<td align='center'><b><?php echo display_float(($detail->i_value)* ($priceMaster[$tree]));?></b></td>
		<td align='center'><b><?php echo display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']));?></b></td>
       <td align='center'><b><?php echo display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']) *($priceMaster[$tree])) ?></b></td>
        <td align='center'><b><?php echo display_float(100*(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume'])/$detail->i_value ));?></b></td>
	    <td align='center'><b><?php echo display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']) *($priceMaster[$tree]))-display_float(($detail->i_value)* ($priceMaster[$tree]))?></b></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td align='center'><b>Total</b></td>
		<td align='center'><b><?php echo display_float($totalArray['estimatedVolumne']);?></b></td>
		<td align='center'><b><?php echo display_float($totalArray['estimatedprice']);?></b></td>
		
		<td align='center'><b><?php echo display_float($totalArray['actualVolumne']);?></b></td>
        <td align='center'><b><?php echo display_float($totalArray['actualPrice']);?></b></td>
		<td align='center'><b><?php echo display_float(100*($totalArray['actualVolumne']/$totalArray['estimatedVolumne']));?></b></td>
		<td align='center'><b><?php echo display_float($totalArray['actualPrice'])-display_float($totalArray['estimatedprice']);?></b></td>
	
	</tr>
</table>

<?php
}//End of else ?>
<?php 
}
else 
{
	
	
	echo "No Ecnomics Entry  for the Lot";
}
?>

