<?php
$mardDetail=getKeyObjectFromSession('mardDetail');
$arrTreeTypes=array();
$arrTreeTypes=$common->getTreeType($mardDetail->id);
$arrMarkedVolume=array();
$i_tree_volume='';
/*echo '<pre>';
print_R($arrTreeTypes);
echo '</pre>';*/
if(!empty($arrTreeTypes)){
if(isset($_POST['update'])){
	extract($_POST);
	if($treetype_id!=''){

		$_SESSION['screen3']['treetype_id']  =  $treetype_id;
		$_SESSION['screen3']['catvalue'][$treetype_id] =  $catvalue;
		
        
       
		$arrCondition = array('i_mark_id'=>$mardDetail->id,'i_tree_id'=>$treetype_id);
	    $db->delete('c_marked_volume',$arrCondition);
		$arrCondition = array('i_mark_detail_id'=>$mardDetail->id,'i_tree_id'=>$treetype_id);
	    $db->delete('r_tree_category',$arrCondition);
        //die();  
	    foreach($catVolume as $key=>$value){

	    	$arFieldValues['i_mark_id']=$mardDetail->id;
        	$arFieldValues['i_tree_id']=$treetype_id;
			$arFieldValues['i_tree_volume']=$value;
			$arFieldValues['i_category_id']=$key;
			
	    	$id = $db->insert('c_marked_volume',$arFieldValues);
	    	
	    }

		
		foreach ($catvalue as $k=>$v)
		{  foreach($v as $key=>$value){
			$treeMark= new TreeMarkingVO();
			$treeMark->categoryId=$catList[$key]->id;
			$treeMark->treetypeId=$k;
			$treeMark->categoryName=$catList[$key]->vc_name;
			$treeMark->categoryValue=$value;
			$treeMark->treetype_id=$treetype_id;
			$markDetaiArray[$k][$catList[$key]->id]=$treeMark;
		 }
		 
		}
         
		$markTressDetails=getArrayFromSession('markTressDetails');
		if(isset($markTressDetails) && ! empty($markTressDetails))
		{
			$markTressDetails[$treetype_id]=$markDetaiArray;
			$_SESSION['markTressDetails']=serialize($markTressDetails);
		}
		else
		{
			$markTressDetails = array();
			$markTressDetails[$treetype_id]=$markDetaiArray;
			$_SESSION['markTressDetails']=serialize($markTressDetails);
		}
      $markTressDetails=(array)unserialize($_SESSION['markTressDetails']);
      
	}

   $markDetailDO =  new MarkDetailDO();
	foreach($markTressDetails as $tree=>$v)
		{ 
		
		foreach($v as $ttype=>$detail){
		/*
		echo '<pre>';
	   print_R($detail);
	   echo '</pre>';*/
			if(isset($detail))
			{
				foreach($detail as $key)
				{
					$treeCategoryRelation =  new TreeCategoryVO();
					$treeCategoryRelation->i_category_id=$key->categoryId;
					$treeCategoryRelation->i_mark_detail_id=$mardDetail->id;
					$treeCategoryRelation->i_tree_id=$treetype_id;
					$treeCategoryRelation->i_tree_type_id=$ttype;
					$treeCategoryRelation->i_value=$key->categoryValue;
					$markDetailDO->insertTreeCategoryDetail($treeCategoryRelation);
				}
			}
		 }
		}
		
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=sc2");
}

$markTressDetails=getArrayFromSession('markTressDetails');

include('html/screen3HTML.php');
}
else{
 echo "There are no Tree Type entered for this department.";
 
}
include('footer.php');
?>