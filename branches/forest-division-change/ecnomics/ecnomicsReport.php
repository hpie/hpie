<?php
$markDetailId=$_GET['markId'];
$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
//$arrMarkDetail=12;
$forestID=$arrMarkDetail[0]['i_forest_id'];
$ctegoryDetail=$common->getDetailInfo('c_conversion_felling','i_forest_id',$forestID);
if(isset($_POST['update'])){
	echo 'form Posted';
	extract($_POST);

	header("Location:".BASE_URL."index.php?page=addProduct&markId=".$markDetailId);
}



$pageKey="ecnomicreports";
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


$markListAll=$markDetail->getMarkIdVolumeDetailTree($markDetailId);
$volumneList=$markDetail->getMarkIdVolumeSummarry($markDetailId);

$royalityList=$markDetail->getRoyalityMarkIdPrice($markDetailId);

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
$overTransportation=$timberDO->getMarkingTransPortationRelation($markDetailId,$ecnomicsId);

$handlingCharges=$timberDO->getOtherExpensis($markDetailId,$ecnomicsId);

$getRateDetail =$markDetail->getConverionCharges($ecnomicsId);
$salePrice=$markDetail->getSalePrice($ecnomicsId);
//$markedTreeList=$markDetail->getProgressTreesOnly($markDetailId);
$markedTreeList=$markDetail->getMarkedTreesOnly($markDetailId);


$treeConvertedVolume =$markDetail->getTimberDetailVolume($ecnomicsId);




?>
<link
	rel="stylesheet" href="css/themes/base/jquery.ui.all.css">
<script src="js/jquery-1.6.2.js"></script>
<script src="js/ui/jquery.ui.core.js"></script>
<script src="js/ui/jquery.ui.widget.js"></script>
<script src="js/ui/jquery.ui.tabs.js"></script>
<link rel="stylesheet" href="css/demos.css">
<style>
.treetotal {
	background-color: #999999;
	color: white;
}

.classtotal {
	background-color: #666666;
	color: white;
}

.overalltotal {
	background-color: #333333;
	color: red;
}

.headrow {
	background-color: #aaaaaa;
}

.evenrow {
	background-color: #cccccc;
}

.oddrow {
	background-color: #eeeeee;
}
</style>
<br>
<?php
$selectList=$common->getEcnomicsDateSelect($markDetailId);
$totalVolume=0;
if($selectList != '')
{
	printButton('900','javascript:window.print()');
	?>
<a href="index.php?page=ecnomicreportsEls&markId=<?php echo $markDetailId;?>" target="_blank" >
Export
</a>	
<div id="tabs-1"><?php 

if($economicsId == '')
{
	$common->generateForm ($_SERVER,$pageKey,$markDetailId,0);
}
else
{
	$common->generateForm ($_SERVER,$pageKey,$markDetailId,$economicsId);
}
?>
<center>
<table width="300px" style="width: 800px" border="1px">
	<tr class="headrow">
		<td align='center'>Category</td>
		<td align='center'>Marked Volume</td>
		<td align='center'>Conversion %</td>
		<td align='center'>Estimated Volume</td>
		<td align='center' colspan="<?php echo count($timberlist);?>">Products  (By Volume)</td>
		<td align='center'>&nbsp;</td>
		<td align='center' colspan="2">Felling&nbsp;Charges</td>

	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<?php
		foreach($timberlist as $timberDetail){
			?>
		<td><?php echo $timberDetail->vc_name;	?></td>
		<?php
		}
	 ?>
		<td>&nbsp;</td>
	</tr>


	<?php

	$totalCharges;
	$totalMarkedVolume=0;
	$totalConvertedVolume=0;
	foreach ($markedTreeList as $treeId=>$TreeName	)
	{
		
		
		$totalChargest=0;
		$totalMarkedVolumet=0;
		$totalConvertedVolumet=0;
	?>
	<tr class="headrow">
		<td align='center'><?php echo $TreeName ;?></td>
		

	</tr>
	<?php 
	$markList=$markListAll[$treeId];
	
	foreach($ctegoryDetail as $category){

		if(display_float($markList[$category['i_category_id']]->i_tree_volume,2) == 0)
		{
			continue;
		}

		if($conversionDetail[$category['i_category_id']] != '' &&  $conversionDetail[$category['i_category_id']]>  0 )
		{
			$value=$conversionDetail[$category['i_category_id']];
		}
		else
		{
			$value=$category['i_conversion'];
		}
		if($fellingDetail[$category['i_category_id']] != '' &&  $fellingDetail[$category['i_category_id']]['i_felling_charges']>  0 )
		{
			$fellingCharges=$fellingDetail[$category['i_category_id']]['i_felling_charges'];
			$conversionCharges=$fellingDetail[$category['i_category_id']]['i_conversion_charges'];

		}
		else
		{
			$fellingCharges=$category['i_felling_charges'];
			$conversionCharges=$category['i_conversion_charges'];

		}
		$totalVolume+=display_float($markList[$category['i_category_id']]->i_tree_volume,3);
		$totalMarkedVolume+=display_float($markList[$category['i_category_id']]->i_tree_volume,3);
		$volumeAfterConvesion=display_float(display_float($markList[$category['i_category_id']]->i_tree_volume,3)*($value/100),3);
		$totalConvertedVolume+=$volumeAfterConvesion;
		
		
		
		$totalCharges;
		$totalMarkedVolumet+=display_float($markList[$category['i_category_id']]->i_tree_volume,3);;
		$totalConvertedVolumet+=$volumeAfterConvesion;
		?>
	<tr>
		<td><?php echo $catList[$category['i_category_id']]->vc_name ?></td>
		<td align="right" nowrap><?php echo display_float($markList[$category['i_category_id']]->i_tree_volume,3); ?> m&sup3;</td>
		<td align="right" nowrap><?php echo $value ?>%</td>
		<td align="right" nowrap><?php echo $volumeAfterConvesion;?> m&sup3;</td>
		<?php
		 $cols=0;
		foreach($timberlist as $timberDetail){
				$cols++;
			?>
		<td align="right" nowrap><?php
		$timberValue=0;
			
		if($timberCatDetail[$category['i_category_id']][$timberDetail->id]['i_value']!='')
		{
			$timberValue=$timberCatDetail[$category['i_category_id']][$timberDetail->id]['i_value'];
		}
		echo display_float($volumeAfterConvesion *$timberValue/100,2);

		?> m&sup3;</td>
		<?php
		}
		?>
		<td align="right">&nbsp;</td>
		<td align="right" colspan="2" title="Marked Volume (<?php echo(display_float($markList[$category['i_category_id']]->i_tree_volume,3));?>) x Felling Charges (<?php echo($fellingCharges); ?>) ">
		Rs. <?php $totalCharges+=display_float($fellingCharges*display_float($markList[$category['i_category_id']]->i_tree_volume,3),2);;
		         $totalChargest+=display_float($fellingCharges*display_float($markList[$category['i_category_id']]->i_tree_volume,3),2);;
		  echo display_float($fellingCharges*display_float($markList[$category['i_category_id']]->i_tree_volume,3),2); ?> </td>
	</tr>
	<?php
	
	}
	?>
	
	
	<tr class="headrow">
		<td><b>Total</b></td>
		<td align="right"><b><?php echo $totalMarkedVolumet;?> m&sup3;</b></td>
		<td></td>
		<td align="right"><b><?php echo $totalConvertedVolumet;?> m&sup3;</b></td>
		<td colspan="<?php echo($cols+3);?>" align="right" title="Total Felling Charges">Rs. <b><?php echo display_float($totalChargest,2);?> </b> </td>
	</tr>
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	     &nbsp; <br />
	  </td>
	</tr>
	
	<?php
	
	}
	?>

	
	
	<tr class="headrow">
		<td><b>Total All</b></td>
		<td align="right"><b><?php echo $totalMarkedVolume;?> m&sup3;</b></td>
		<td></td>
		<td align="right"><b><?php echo $totalConvertedVolume;?> m&sup3;</b></td>
		<td colspan="<?php echo($cols+3);?>" align="right" title="Total Felling Charges">Rs. <b><?php echo display_float($totalCharges,2);?> </b> </td>
	</tr>
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	     &nbsp; <br />
	  </td>
	</tr>
	
	<?php
	?>
	<tr class="headrow">
		<td colspan="2"><b>Royality Charges</b></td>
		<td align="right"><b></b></td>
		<td align="right"><b></b></td>
		<td colspan="2"></td>
		<td colspan="1"></td>
		<td  align="right" colspan="2"><b>Tree Name</b></td>
		<td  align="right" colspan="2" ><b>Tree Volume</b></td>
		<td > <b>Royality(m&sup3)</b> </td>
		<td colspan="2"> <b>Total&nbsp;Royality</b> </td>
	</tr>
	
	
		<?php
		$totalRoyality=0;
		foreach($royalityList as $royalityDetail){
			?>
		<tr>
		<td colspan="2">&nbsp;</td>
		<<td align="right"><b></b></td>
		<td align="right"><b></b></td>
		<td colspan="2"></td>
		<td colspan="1"></td>
		<td align="right" colspan="2">
		<?php echo  $treeList[$royalityDetail['i_tree_id']]->vc_name;	?></td>	
		<td align="right" colspan="2"><?php echo  display_float($volumneList[$royalityDetail['i_tree_id']]->i_tree_volume);?></td>
		<td colspan="1" align="right" title=" Royality Charges">
		Rs. <?php echo display_float($royalityDetail['i_royality_price']);	?></td>
	<td colspan="1" align="right" title=" Royality Charges">
		Rs. <?php echo display_float($royalityDetail['i_royality_price']) * display_float($volumneList[$royalityDetail['i_tree_id']]->i_tree_volume);	?></td>
	
	</tr>
		<?php
		$totalRoyality+=display_float($royalityDetail['i_royality_price']) * display_float($volumneList[$royalityDetail['i_tree_id']]->i_tree_volume);
		}
	 ?>
	<tr class="headrow">
		<td><b>Total</b></td>
		<td align="right"><b></b></td>
		<td></td>
		<td align="right"><b></b></td>
		<td colspan="<?php echo($cols+3);?>" align="right" title="Total Felling Charges">Rs. <b><?php echo display_float($totalRoyality,2);?> </b> </td>
	</tr>
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	     &nbsp; <br />
	  </td>
	</tr>	
	
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	     &nbsp; <br />
	  </td>
	<tr class="headrow">
		<td colspan="3">Transpportation Charges</td>
		
		
		<td colspan="<?php echo($cols+4);?>"></td>
		
	</tr>
	
	<tr>
		<td colspan="3">Transportation Type</td>
		<td colspan="2">From</td>
		<td colspan="2">To</td>
		<td align="right">Rate/m&sup3;</td>
  		<td align="right">Distance</td>
		<td align="right">Volume</td>
		<td align="right">Amount</td>
		
		<td align="right">Mate <br /> Comission</td>
		<td align="right">Total Comission</td>
		<td align="right" colspan="3">Total Transportation Charges</td>
		
   </tr>
   
   <?php
   
   
   $transPortationDetail=$markDetail->getprogressTransportationDetailCompleteEconomics($ecnomicsId);
   
   
   $overHeadEntry=$common->getOverheadEntity($markDetailId);
   $allForestPoints=$common->getAllForestPoints($markDetailId);
   $allForestPoints[-1]='Forest';
   
   
   foreach ($transPortationDetail as $rowId=>$detail)
   {
   	$distanc=$detail['i_distance'];
   	if($distance ==0 )
   	{
   		$distance=1;
   	}	
   	$value=$detail['i_charges'];
   	$volume=$detail['i_volume'];
   	$overHeadCharges=$value * $distance * $volume;
   	$comission=display_float($overHeadCharges*display_float($detail['i_comission'],2)/100);;
   	
   	 ?>
   	   <tr >
   	   <td colspan="3"><?php echo $overHeadEntry[$detail['i_overhead_id']]['vc_name'];?></td>
   	    <td colspan="2"><?php echo $allForestPoints[$detail['vc_from']];?></td>
		<td colspan="2"> <?php echo $allForestPoints[$detail['vc_destination']];?></td>
		<td align="right"><?php echo $detail['i_charges'];?></td>
  		<td align="right"><?php echo $detail['i_distance'];?></td>
		<td align="right"><?php echo $volume;?></td>
		<td align="right" title="Distance * Value * Volume"><?php echo ($overHeadCharges );?></td>
		<td align="right"><?php echo $detail['i_comission'];?></td>
		<td align="right"><?php echo $comission;?></td>
		<td align="right" colspan="3" title="Amount + Total Comission">Rs.
		 <?php $totalChargesOver+=($overHeadCharges+$comission);
			 echo display_float($overHeadCharges+$comission); ?></td>
   	 </tr>
   	 <?php 
   	  
   }
   
	$count=0;
	
	?>
	
	<tr class="headrow">
		<td colspan="4"><b>Total To RSD</b></td>
		
		
		<td colspan="<?php echo($cols);?>"></td>
		<td align="right" colspan="3">Rs. <b><?php echo display_float($totalChargesOver,2);?></b></td>
	</tr>
	
	
	
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	      &nbsp;
	  </td>
	</tr>
<tr>
		<td colspan="3">Transportation from RSD</td>
		<td  colspan="2" >From</td>
		<td  colspan="2" >To</td>
		<td align="right">Rate/m&sup3;</td>
  		<td align="right">Distance</td>
  		<td align="right">Volume</td>
		<td align="right">Amount</td>
		<td align="right">Mate <br />Comission</td>
		<td align="right">Total Comission</td>
		<td align="right" colspan="3">Totoal Transortation Charges</td>
		
   </tr>
   <?php 
   
  $transPortationDetail=$markDetail->getprogressTransportationDetailCompleteEconomicsRSD($ecnomicsId);
   
   
   $overHeadEntry=$common->getOverheadEntity($markDetailId);
   $allForestPoints=$common->getAllForestPoints($markDetailId);
   $allForestPoints[-1]='Forest';
   
   foreach ($transPortationDetail as $rowId=>$detail)
   {
   	$distanc=$detail['i_distance'];
   	if($distance ==0 )
   	{
   		$distance=1;
   	}	
   	$value=$detail['i_charges'];
   	$volume=$detail['i_volume'];
   	$overHeadCharges=$value * $distance * $volume;;
   	$comission=display_float($overHeadCharges*display_float($detail['i_comission'],2)/100);;
   	
   	 ?>
   	   <tr >
   	   <td colspan="3"><?php echo $overHeadEntry[$detail['i_overhead_id']]['vc_name'];?></td>
   	    <td colspan="2"><?php echo $allForestPoints[$detail['vc_from']];?></td>
		<td colspan="2"> <?php echo $allForestPoints[$detail['vc_destination']];?></td>
		<td align="right"><?php echo $detail['i_charges'];?></td>
  		<td align="right"><?php echo $detail['i_distance'];?></td>
  		<td align="right"><?php echo $volume;?></td>
  		
		<td align="right" title="Distance * Value * Volume"><?php echo $overHeadCharges;?></td>
		<td align="right"><?php echo $detail['i_comission'];?></td>
		<td align="right"><?php echo $comission;?></td>
		<td align="right" colspan="3" title="Amount + Total Comission">Rs.
		 <?php $totalChargesfromRSD+=($overHeadCharges+$comission);
			 echo display_float($overHeadCharges+$comission); ?></td>
   	 </tr>
   	 <?php 
   	  
   }
   
	$count=0;
	
	?>
	
	<tr class="headrow">
		<td colspan="4">Total From RSD</td>
		
		
		<td colspan="<?php echo($cols);?>"></td>
		<td align="right" colspan="3">Rs. <?php echo display_float($totalChargesfromRSD,2);?></td>
	</tr>
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	      &nbsp;
	  </td>
	</tr>
	<tr class="headrow">
		<td colspan="4">Total Transportation Charges</td>
		
		
		<td colspan="<?php echo($cols);?>"></td>
		<td align="right" colspan="3" title="Total Transportation Charges to RSD+Total Transportation Charges from RSD">Rs. <?php 
		$totalChargesOver+=$totalChargesfromRSD;
		echo display_float($totalChargesOver,2);?></td>
	</tr>
	
	<tr>
	  <td colspan="<?php echo($cols+7);?>">&nbsp;</td>
	</tr>
	<tr class="headrow">
		<td colspan="3">Converion Charges</td>
		
		
		<td colspan="<?php echo($cols+4);?>"></td>
		
	</tr>

<?php 
$converionCharges=0;
foreach ( $getRateDetail as $id=> $converionDetail)
{
	?>
	
	<tr>
		<td colspan="3"><?php echo $converionDetail['vc_name'] ?></td>
		<td>&nbsp;</td>
		<td align="right" colspan="<?php echo($cols);?>">&nbsp;</td>
		<td align="right" colspan="3"> Rs. <?php $totalChargesOver+=($overHeadCharges+$comission);
			 echo display_float($converionDetail['i_totalConversionCharge']); 
			 $converionCharges+=$converionDetail['i_totalConversionCharge']	;	
			 ?></td>
	</tr>		
		<?php
}	
?>

	<tr class="headrow">
		<td colspan="4">Total</td>
		
		
		<td colspan="<?php echo($cols);?>"></td>
		<td align="right" colspan="3"> Rs. <?php 
		   echo  display_float($converionCharges);
		?></td>
	</tr>
	<tr>
	  <td colspan="<?php echo($cols+7);?>">&nbsp;</td>
	</tr>
	<tr class="headrow">
		<td colspan="3">PROFITABILITY</td>
		<td colspan="<?php echo($cols+4);?>"></td>
	</tr>	
	
	<tr>
		<td colspan="3">Tree</td>
		<td colspan="<?php echo($cols);?>"></td>
		<td>Volume Produced</td>
		<td>Sale Rate/m&sup3;</td>
		<td colspan="3">Total Expeted Sale</td>
	</tr>
	<?php
$totalSsllingVolume=0;	
foreach($markedTreeList as $treeDetail=>$value){
	?>
	<tr>
		<td colspan="3"><?php echo $value;?></td>
		<td colspan="<?php echo($cols);?>"></td>
		<td align="right" nowrap><?php echo display_float($treeConvertedVolume[$treeDetail]['volume'],3);?> m&sup3;</td>
		<td align="right" nowrap>
		Rs. <?php echo $salePrice[$treeDetail]['i_sale_pice']?>
		</td>
		<td align="right" colspan="3" nowrap>Rs. 
		<?php
			$totalSsllingVolume+=$salePrice[$treeDetail]['i_sale_pice'] * display_float($treeConvertedVolume[$treeDetail]['volume'],3);
		echo 
		
				$salePrice[$treeDetail]['i_sale_pice'] * display_float($treeConvertedVolume[$treeDetail]['volume'],3); ?>
		</td>

	</tr>
	<?php
}

?>
<tr class="headrow">
		<td colspan="4">Total </td>
		<td colspan="<?php echo($cols);?>"></td>
		<td align="right" colspan="3">Rs. <?php echo $totalSsllingVolume;?></td>
	</tr>


<tr>
	  <td colspan="<?php echo($cols+7);?>">&nbsp; <br /> </td>
</tr>

<tr>
		<td colspan="3">Over Heads</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td align="right" colspan="3">&nbsp;</td>
  		<td align="right">&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td align="right">%</td>
		<td align="right">Total</td>
		<td align="right">Charges</td>
		
   </tr>
<?php
	$count=0;
	foreach($handlingCharges as $id=>$overHead){
		$count++;
		$value=$overHead['vc_value'];
		if($overHeadDetail[$id] !='')
		{
			$value=$overHeadDetail[$id]['i_value'];
		}


		?>
	
	<tr>
		<td colspan="3"><?php echo $overHead['vc_name'] ?></td>
		
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td align="right" colspan="3">
		&nbsp;</td>
		<td align="right">
		&nbsp;</td>
		<td align="right" >
		</td>
		<td align="right" >
		
		</td>
		
		<td align="right" >
		<?php echo $value;?></td>
		<td align="right" >
		<?php
         $otherExpenses+=display_float($totalSsllingVolume * $value/100,2);
		echo display_float($totalSsllingVolume * $value/100,2);?></td>
		
   </tr>
		<?php
	}
	?>
	
<tr class="headrow">
		<td colspan="4"><b>Total</b></td>
		
		
		<td colspan="<?php echo($cols);?>"></td>
		<td align="right" colspan="3">Rs. <b><?php echo display_float($otherExpenses,2);?></b></td>
	</tr>
	
	
	
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	      &nbsp;
	  </td>
	</tr>
<tr class="headrow">
		<td colspan="3">Net Profit (Before Royality)	</td>
		
		
		<td colspan="9"></td>
		<td align="right" title="Total Profitability -(Conversion Charges + Felling Charges  + Total Transportation Charges+ Total Overheads)"><?php echo display_float($totalSsllingVolume-$converionCharges-$totalCharges-$totalChargesOver-$otherExpenses);?></td>
	</tr>
	
	<tr>
	  <td colspan="<?php echo($cols+7);?>">
	      &nbsp;
	  </td>
	</tr>
<tr class="headrow">
		<td colspan="3">Net Profit(After Royality)	</td>
		
		
		<td colspan="9"></td>
		<td align="right" title="Total Profitability -(Conversion Charges + Felling Charges  + Total Transportation Charges+ Total Overheads+ Total Royality)"><?php echo display_float($totalSsllingVolume-$converionCharges-$totalCharges-$totalChargesOver-$otherExpenses-$totalRoyality);?></td>
	</tr>		
</table>
</center>
</div>


	<?php
}
else
{
	echo "No Ecnomics Entry  for the Lot";
}
?>

