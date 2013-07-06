<?php
$markDetailId=$_GET['markId'];
$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
//$arrMarkDetail=12;

$forestID=$arrMarkDetail['i_forest_id'];

if(isset($_POST['update'])){
	echo 'form Posted';
	extract($_POST);

	header("Location:".BASE_URL."index.php?page=addProduct&markId=".$markDetailId);
}

$markDetail =  new MarkDetailDO();
$markListData=$markDetail->getMarkDetailVolumeDetail($markDetailId);

$ctegoryDetail=$markDetail->getConversionMaster($forestID);


$defaultPricingModel=$markDetail->getDefaultPriceModel($forestID);


$currentPricingModel=$markDetail->getCurrentMarkingPrice($markDetailId);



$pageKey="ecnomicreportsdetail";
$economicsId=$_REQUEST['i_ecnomics_master_id'];
if($economicsId == '')
{
	$ecmomicsMaster = $common->getEcnomicsMaster($markDetailId);
	$ecnomicsId=$ecmomicsMaster['id'];
	
}
else
{
	$ecnomicsId=$economicsId;
}





$timberDO =  new TimberDO();
$conversionDetail=$timberDO->getCategoryFillingRelation($markDetailId,$ecnomicsId);

$markDetail =  new MarkDetailDO();
$markList=$markDetail->getMarkIdVolumeDetailTree($markDetailId);

$timberDO =  new TimberDO();

$conversionDetail=$timberDO->getCategoryConversionRelation($markDetailId,$ecnomicsId);
$timberlist=$timberDO->getTimberList();


$timberCatDetail=$timberDO->getTimberCategoryDetail($forestID);

$timberRelationDetail=$timberDO->getTimberCategoryRelationDetail($markDetailId,$ecnomicsId);
if($timberRelationDetail != '')
{
	$timberCatDetail=$timberRelationDetail;
}
$fellingDetail=$timberDO->getCategoryFillingRelation($markDetailId,$ecnomicsId);
$overHeadDetail=$timberDO->getMarkingOverHeadRelation($markDetailId,$ecnomicsId);
$selectList=$common->getEcnomicsDateSelect($markDetailId);
if($selectList != '' && count($selectList) > 0) 
{

?>
<link
	rel="stylesheet" href="css/themes/base/jquery.ui.all.css">
<script src="js/jquery-1.6.2.js"></script>
<script
	src="js/ui/jquery.ui.core.js"></script>
<script
	src="js/ui/jquery.ui.widget.js"></script>
<script
	src="js/ui/jquery.ui.tabs.js"></script>
<link rel="stylesheet"
	href="css/demos.css">
	
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


<br>

<div  style='width: 280px;padding-left:0px;'>
<?php


printButton('800','javascript:window.print()','275px');



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
<div id="tabs-1">

<table width="300px" style="width: 800px">
<?php
if(!isset($markList) || empty($markList)){

	echo "<tr><td colspan=2 align='center'>No Record Entered</tr>";

}
else{


	$summaryDetailData= array();

	?>
	<tr>
		<td><b>Tree Name</b></td>
		<td><b>Unit Price</b></td>
		<td><b>Category</b></td>
		<td><b>Marked Volume</b></td>
		<td><b>Conversion(%)</b></td>
		<td><b>Total Volume</b></td>
		<td><b>Felling Charges</b></td>
		<td><b>Conversion Charges</b></td>
		<td><b>Fell\Cost</b></td>
		<td><b>Con\Cost</b></td>
		<td><b>Tot\Cost</b></td>


		<?php
		foreach($timberlist as $timberDetail){
			?>
		<td><?php echo $timberDetail->vc_name;	?></td>
		<?php
		}
	 ?>
		<td>Total Product</td>
	</tr>
	<?php





	$totaCount=0;
	$catTotal = array();
	$priceValue=0;
	foreach($markListData as $tree=>$treedetail){
		$totaCount=0;
		$productDetailArray=array();
		if($currentPricingModel[$tree] != '')
		{
			$priceValue=$currentPricingModel[$tree]['i_value'];
		}
		else
		{
			$priceValue=$defaultPricingModel[$tree]['price'];

		}
		$treeTimberVolume =  array();
		$totalMarkedVolume=0;
		$totalConvertedVolume=0;
		$totalConvrsionCharges=0;
		$totalFellingCharges=0;

		foreach($catList as $cat)
		{

			if($conversionDetail[$cat->id] != '' &&  $conversionDetail[$cat->id]>  0 )
			{
				$value=$conversionDetail[$cat->id];
			}
			else
			{
				$value=$ctegoryDetail[$cat->id]['i_conversion_charges'];
			}

			$volume=$treedetail[$cat->id]->i_value=='' ? '0' : $treedetail[$cat->id]->i_value;
			$catMarkedVolume=$volume;
			$totalMarkedVolume+=$catMarkedVolume;
			$volume=display_float(($volume*$value/100));
			$totalConvertedVolume+=$volume;
			$totaVolume+=$volume;
			$catTotal[$cat->id]+=$treedetail[$cat->id]->i_value;
			if($volume==0)
			continue;

			?>
	<tr>
		<td valign="top"><b><?php echo $treeList[$tree]->vc_name;?></b></td>
		<td valign="top"><b><?php echo $priceValue;?></b></td>
		<td><?php echo $catList[$cat->id]->vc_name ?></td>
		<td><?php echo display_float($catMarkedVolume);
		; ?>
		
		
		<td><?php echo $value; ?></td>
		<td><?php echo $volume; ?></td>
		<td><b><?php 
		echo $fellingDetail[$cat->id]['i_felling_charges']; ?></b></td>
		<td><b><?php 
		echo $fellingDetail[$cat->id]['i_conversion_charges']; ?></b></td>
		<td><b><?php $totalFellingCharges+=$volume*$fellingDetail[$cat->id]['i_felling_charges']; echo $volume*$fellingDetail[$cat->id]['i_felling_charges']; ?></b></td>
		<td><b><?php $totalConvrsionCharges+=$volume*$fellingDetail[$cat->id]['i_conversion_charges']; echo $volume*$fellingDetail[$cat->id]['i_conversion_charges']; ?></b></td>
		<td><b><?php echo $volume*$fellingDetail[$cat->id]['i_conversion_charges']+$volume*$fellingDetail[$cat->id]['i_felling_charges']; ?></b></td>

		<?php
		$totalTimberVolume=0;

		foreach($timberlist as $timberDetail){
			?>
		<td><?php
		$timberValue=0;
			
		if($timberCatDetail[$cat->id][$timberDetail->id]['i_value']!='')
		{
			$timberValue=$timberCatDetail[$cat->id][$timberDetail->id]['i_value'];
		}

		if($productDetailArray[$timberDetail->id]=='')
		{
			$productDetailArray[$timberDetail->id]=display_float($volume *$timberValue/100);
		}
		else
		{
			$productDetailArray[$timberDetail->id]+=display_float($volume *$timberValue/100);
		}

		if($treeTimberVolume[$timberDetail->id]=='')
		{
			$treeTimberVolume[$timberDetail->id]=display_float($volume *$timberValue/100);
		}
		else
		{
			$treeTimberVolume[$timberDetail->id]+=display_float($volume *$timberValue/100);
		}

		echo display_float($volume *$timberValue/100);

		?></td>
		<?php
		$totalTimberVolume+=display_float($volume *$timberValue/100);
		}
		?>
		<td><?php echo $totalTimberVolume;?></td>
	</tr>

	<?php
		}

		?>

	<tr class="headrow">
		<td style='height: 5px;' colspan="11"></td>
		<?php

		foreach($timberlist as $timberDetail)
		{
			?>
		<td><?php echo  display_float($treeTimberVolume[$timberDetail->id]);?></td>
		<?php
		}
		?>

	</tr>
	<?php
	$summaryDetailData['totalVolume']=$totaVolume;
	$summaryDetailData['totalMarkedVolume']=$totalMarkedVolume;
	$summaryDetailData['totalConvertedVolume']=$totalConvertedVolume;


	$summaryDetailData['fellingCoast']=$totalFellingCharges;
	$summaryDetailData['conversionCoast']=$totalConvrsionCharges;
	$summaryDetailData['totalCoast']=$totalFellingCharges+$totalConvrsionCharges;




	$summaryDetailData['productDetail']=$productDetailArray;
	$treeSummary[$tree]=$summaryDetailData;

	$catTotal['total']+=$totaCount;
	$catTotal['volume']+=$volumneList[$tree]->i_tree_volume;
	?>

	<?php
	}


}

$grandTotalDetail=array();
?>
	</tr>
</table>



<table>

	<tr>
		<td><b>Tree Name</b></td>
		<td><b>Marked Volume</b></td>
		<td><b>Total Converted</b></td>
		<td><b>Fell\Cost</b></td>
		<td><b>Con\Cost</b></td>
		<td><b>Tot\Cost</b></td>

		<?php
		foreach($timberlist as $timberDetail){
			?>
		<td><b><?php echo $timberDetail->vc_name;	?></td>
		<?php
		}
		?>


	</tr>
	<?php
	$totalCharges;
	foreach($treeSummary as $tree=>$productDetail){
		if($currentPricingModel[$tree] != '')
		{
			$priceValue=$currentPricingModel[$tree]['i_value'];
		}
		else
		{
			$priceValue=$defaultPricingModel[$tree]['price'];

		}
		$product=$productDetail['productDetail'];
		?>
	<tr>
		<td><b><?php
		echo $treeList[$tree]->vc_name;?></b></td>
		<td align="right"><?php $grandTotalDetail['totalMarkedVolume']+=display_float($productDetail['totalMarkedVolume']); echo display_float($productDetail['totalMarkedVolume']); ?></b></td>
		<td align="right"><?php $grandTotalDetail['totalConvertedVolume']+=display_float($productDetail['totalConvertedVolume']);echo display_float($productDetail['totalConvertedVolume']); ?></b></td>
		<td align="right"><?php $grandTotalDetail['fellingCoast']+=display_float($productDetail['fellingCoast']);echo display_float($productDetail['fellingCoast']); ?></b></td>
		<td align="right"><?php $grandTotalDetail['conversionCoast']+=display_float($productDetail['conversionCoast']);echo display_float($productDetail['conversionCoast']); ?></b></td>
		<td align="right"><?php  echo display_float($productDetail['conversionCoast']+$productDetail['fellingCoast']); ?></b></td>
		<?php
		foreach($timberlist as $timberDetail){
			?>
		<td align="right"><?php $productTotal[$timberDetail->id]+=$product[$timberDetail->id]; echo display_float($product[$timberDetail->id]);	?></td>
		<?php
		}
		?>



	</tr>
	<?php
	}

	?>

	<tr class="headrow">
		<td><b>Total</b></td>
		<td align="right"><b><?php echo display_float($grandTotalDetail['totalMarkedVolume']); ?></b></td>
		<td align="right"><b><?php echo display_float($grandTotalDetail['totalConvertedVolume']); ?></b></td>
		<td align="right"><b><?php echo display_float($grandTotalDetail['fellingCoast']); ?></b></td>
		<td align="right"><b><?php echo display_float($grandTotalDetail['conversionCoast']); ?></b></td>
		<td align="right"><b><?php $totalCharges+=display_float($grandTotalDetail['conversionCoast']+$grandTotalDetail['fellingCoast']); echo display_float($grandTotalDetail['conversionCoast']+$grandTotalDetail['fellingCoast']); ?></b></td>
		<?php
		foreach($timberlist as $timberDetail){
			?>
		<td align="right"><b><?php echo $productTotal[$timberDetail->id];	?></td>
		<?php
		}
		?>



	</tr>
	<?php
	$count=0;
	foreach($overHeadDetail as $id=>$overHead){
		$count++;
		$value=$overHead['vc_value'];
		if($overHeadDetail[$id] !='')
		{
			$value=$overHeadDetail[$id]['i_value'];
		}


		?>
	<tr>
		<td colspan="3"><?php echo $overHead['vc_name'] ?></td>
		<?php
		if($overHead['i_overhead_type'] ==1)
		{
			?>
		<td>From <?php echo $overHeadDetail[$id]['vc_source'];?></td>
		<td>To <?php echo $overHeadDetail[$id]['vc_destination'];?></td>

		<?php
		}
		else
		{
			?>
		<td>N.A.</td>
		<td>N.A.</td>

		<?php
		}
		?>
		<td align="right"><?php $totalCharges+=$overHead['vc_value']; echo display_float($overHead['vc_value']); ?></td>

		<?php
	}
	?>
	
	
	<tr class="headrow">
		<td colspan="5">Total Charges</td>
		<td align="right"><?php echo display_float($totalCharges); ?></td>
	</tr>
</table>



</div>
<?php 
}
else 
{
	echo "No Ecnomics Entry  for the Lot";
}
?>

