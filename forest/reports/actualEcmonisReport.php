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


$pageKey="actualEcmonicsReport";
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


$ctegoryDetail=$markDetail->getConversionMaster($forestID);


$defaultPricingModel=$markDetail->getDefaultPriceModel($forestID);


$currentPricingModel=$markDetail->getCurrentMarkingPrice($markDetailId);



$timberDO =  new TimberDO();
$conversionDetail=$timberDO->getCategoryFillingRelation($markDetailId,$ecnomicsId);

$markDetail =  new MarkDetailDO();
$markList=$markDetail->getMarkIdVolumeDetailTree($markDetailId);



$conversionDetail=$timberDO->getCategoryConversionRelation($markDetailId,$ecnomicsId);

$timberlist=$timberDO->getTimberList();


$timberCatDetail=$timberDO->getTimberCategoryDetail($forestID);

$timberRelationDetail=$timberDO->getTimberCategoryRelationDetail($markDetailId,$ecnomicsId);
if($timberRelationDetail != '')
{
	$timberCatDetail=$timberRelationDetail;
}
$fellingDetail=$timberDO->getCategoryFillingRelation($markDetailId,$ecnomicsId);

$selectList=$common->getEcnomicsDateSelect($i_mark_id);
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
<table width="300px" style="width: 800px">
<?php
if(!isset($markList) || empty($markList)){

	echo "<tr><td colspan=2 align='center'>No Record Entered</tr>";

}
else{
	
	
	$summaryDetailData= array();
	
	?>
	
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
			$volume=display_float(($volume*$value/100),3);
			$totalConvertedVolume+=$volume;
			$totaVolume+=$volume;
			$catTotal[$cat->id]+=$treedetail[$cat->id]->i_value;
			if($volume==0)
			   continue;
			
			?>
		
	 
		 <?php 
		$totalTimberVolume=0;
		
		foreach($timberlist as $timberDetail){
			?>
		<?php
		$timberValue=0;
			
		if($timberCatDetail[$cat->id][$timberDetail->id]['i_value']!='')
		{
			$timberValue=$timberCatDetail[$cat->id][$timberDetail->id]['i_value'];
		}
		
		if($productDetailArray[$timberDetail->id]=='')
		{
		$productDetailArray[$timberDetail->id]=display_float($volume *$timberValue/100,3);
		}
		else
		{
		$productDetailArray[$timberDetail->id]+=display_float($volume *$timberValue/100,3);
		}
		
		if($treeTimberVolume[$timberDetail->id]=='')
		{
		$treeTimberVolume[$timberDetail->id]=display_float($volume *$timberValue/100,3);
		}
		else
		{
		$treeTimberVolume[$timberDetail->id]+=display_float($volume *$timberValue/100,3);
		}
		
		//echo display_float($volume *$timberValue/100);

		?>
		<?php
		$totalTimberVolume+=display_float($volume *$timberValue/100,3);
		}
		?>
       
		
		<?php
		}
		
		?>

		
	   <?php 
	   
	  
	   ?>
	   
	
		<?php 
		$summaryDetailData['totalVolume']=$totaVolume;
		$summaryDetailData['totalMarkedVolume']=$totalMarkedVolume;
		$summaryDetailData['totalConvertedVolume']=$totalConvertedVolume;
		
		
		$summaryDetailData['productDetail']=$productDetailArray;
		$treeSummary[$tree]=$summaryDetailData;
		
		$catTotal['total']+=$totaCount;
		$catTotal['volume']+=$volumneList[$tree]->i_tree_volume;
		?>
	 
		<?php
	}
	

}
?>

<?php 
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
	
		
		<?php
		foreach($timberlist as $timberDetail){
			?>
		<?php
		}
		?>
		
		
	<?php 
		}
		
		?>
<?php 
echo '<center><h2>Economics Summary Report</h2></center>';
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
		<td align='center'><b>Ecnomics Converted</b></td>
		<td align='center'><b>Estimated Price</b></td>
		<td align='center'><b>Actual Converted Volume</b></td>
		<td align='center'><b>Actual Price</b></td>
		<td align='center'><b>Conversion(%)</b></td>
		<td align='center'><b>Profit/Loss</b></td>
	</tr>
	<?php
	
	
	foreach($markList as $tree=>$detail){
		$totalArray['estimatedVolumne']+=$detail->i_value;;
		$totalArray['actualVolumne']+=$prevTimberSummary[$tree]['i_current_volume'];
		$totalArray['estimatedprice']+=display_float(($detail->i_value)* ($priceMaster[$tree]),2);;
		$totalArray['actualPrice']+=display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']) *($priceMaster[$tree]),3);
	
		?>
	<tr>
		<td align='center'><b><?php echo $treeList[$tree]->vc_name;?></b></td>
		<td align='center'><b><?php echo display_float($detail->i_value,3);?></b></td>
		<td align='center'><b><?php //echo $treeSummary;
		 $productDetail=$treeSummary[$tree];
		 echo display_float($productDetail['totalConvertedVolume'],3);
		 $totalArray['ecnomicConverted']+=display_float($productDetail['totalConvertedVolume'],3);
		?></b></td>
		
		<td align='center'><b><?php echo display_float(($detail->i_value)* ($priceMaster[$tree]),2);?></b></td>
		<td align='center'><b><?php echo display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']),3);?></b></td>
       <td align='center'><b><?php echo display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']) *($priceMaster[$tree]),3) ?></b></td>
        <td align='center'><b><?php echo display_float(100*(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume'])/$detail->i_value ),3);?></b></td>
	    <td align='center'><b><?php echo display_float(($prevTimberSummary[$tree]['i_current_volume'] == '' ? '0': $prevTimberSummary[$tree]['i_current_volume']) *($priceMaster[$tree]),2)-display_float(($detail->i_value)* ($priceMaster[$tree]),3)?></b></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td align='center'><b>Total</b></td>
		<td align='center'><b><?php echo display_float($totalArray['estimatedVolumne'],3);?></b></td>
		<td align='center'><b><?php echo display_float($totalArray['ecnomicConverted'],3);?></b></td>
		
		<td align='center'><b><?php echo display_float($totalArray['estimatedprice'],2);?></b></td>
		
		<td align='center'><b><?php echo display_float($totalArray['actualVolumne'],3);?></b></td>
        <td align='center'><b><?php echo display_float($totalArray['actualPrice'],2);?></b></td>
		<td align='center'><b><?php echo display_float(100*($totalArray['actualVolumne']/$totalArray['estimatedVolumne']),3);?></b></td>
		<td align='center'><b><?php echo display_float($totalArray['actualPrice'],2)-display_float($totalArray['estimatedprice'],2);?></b></td>
	
	</tr>
</table>

<?php
}//End of else ?>

<?php 
}
else 
{
	echo '<center><h2>Economics Summary Report</h2></center>';
	echo "No Ecnomics Entry  for the Lot";
}
?>
