<?php
$markDetailId=$_GET['markid'];

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

if(isset($_POST['update'])){
	echo 'inside the Post';
	extract($_POST);
	if($treetype_id!=''){

		$count=0;
		$arFieldValues['i_mark_id']=$markDetailId;
        $arFieldValues['i_tree_id']=$_POST['treetype_id'];
		$arFieldValues['i_tree_volume']=$_POST['i_tree_volume'];
       
		$arrCondition = array('i_mark_id'=>$markDetailId,'i_tree_id'=>$treetype_id);
	    $db->delete('c_marked_opening_volume',$arrCondition);
	    
	    
	    
		$arrCondition = array('i_mark_detail_id'=>$markDetailId,'i_tree_id'=>$treetype_id);
	    $db->delete('r_tree_opening_category',$arrCondition);
     
	    
	    
	    
	    
	    
	    
	    $arMarkedPrice['i_mark_id']=$_POST['markid'];
	    $arMarkedPrice['i_tree_id']=$treetype_id;
	    $arMarkedPrice['i_value']=$unitPrice;
	    $arMarkedPrice['i_royality_price']=$royalityPrice;
	  
	    $id = $db->insert('c_marked_opening_price',$arMarkedPrice);
	     
	    

	    	
	    	
	    	
	    foreach($catVolume as $key=>$value){

	    	$arFieldValues['i_mark_id']=$_POST['markid'];
	    	$arFieldValues['i_tree_id']=$treetype_id;
	    	$arFieldValues['i_tree_volume']=$value;
	    	$arFieldValues['i_category_id']=$key;
	    	$id = $db->insert('c_marked_opening_volume',$arFieldValues);
	    }

	   $r_tree_category['i_mark_detail_id']=$_POST['markid'];
	   
	   
	   
	foreach ($catvalue as $k=>$v)
		{  foreach($v as $key=>$value){
		    
			$r_tree_category['i_tree_id']=$_POST['treetype_id'];
			$r_tree_category['i_category_id']=$catList[$key]->id;
			$r_tree_category['i_tree_type_id']=$k;
			$r_tree_category['i_value']=$value;
			$r_tree_category['i_volume']=$value*$volumeTableDetail[$_POST['treetype_id']][$catList[$key]->id]['volume'];
			$id = $db->insert('r_tree_opening_category',$r_tree_category);
		}
		}
      $common->updateEcmonicsDetails($_POST['markid']);
	}
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=addMarkingOpening&markId=".$_POST['markid']);
}
if(isset($_POST['cancel'])){
   ob_end_clean();
   header("Location:".BASE_URL."index.php?page=addMarkingOpening&markId=".$markDetailId);

}

$markList=$markDetail->getTreeMarkDetailOpening($markDetailId,$treeId);
$voulmeDetail=$markDetail->getMarkIdVolumeOpening($markDetailId,$treeId);
$treeEntryDetail=$markList;
$treeEntryList=$markDetail->getTreeMarkedDetailOpeningVolume($markDetailId);


$arrMarkDetail=$common->getInfo('c_mark_detail',$markDetailId);
$forestId     =$arrMarkDetail[0]['i_forest_id'];
$arrCondition = array('i_forest_id'=>$forestId);

$priceMasterNew =$common->selectCondition('m_price', $arrCondition);

foreach ($priceMasterNew as $priceMasterDetail)
{
	$priceMaster[$priceMasterDetail['i_tree_id']]=$priceMasterDetail;
	
}

$arrCondition = array('i_mark_id'=>$markDetailId,'i_tree_id'=>$treeId);
$currentPrice=$common->selectCondition('c_marked_opening_price',$arrCondition);
$unitPriceValue=0;
$defaultPrice=$priceMaster[$treeId]['price'];
if($currentPrice !='' && $currentPrice[0]['i_value'] > 0)
{
	$unitPriceValue=$currentPrice[0]['i_value'];
}
else 
{
	$unitPriceValue=$priceMaster[0]['price'];;
}


foreach ($priceMaster as $priceTreeId=>$detailPriceModel)
{
	
	?>
	<input type='hidden' id='tree_price_<?php echo $priceTreeId?>' value='<?php echo $priceMaster[$priceTreeId]['price'];?>' />
	<?php 
	
}



include('html/editAddHTML.php');
include('footer.php');
?>