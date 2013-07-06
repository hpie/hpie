<?php
$mardDetail=getKeyObjectFromSession('mardDetail');
$markTressDetails=getArrayFromSession('markTressDetails');
$markDetailId=$mardDetail->id;
/*echo '<pre>';
print_R($mardDetail);
echo '</pre>';
*/
$errorMsg="";
if(isset($_POST['cancel'])=="Cancel"){
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=sc1");
}
if(isset($_POST['marktrees'])=="Mark Trees"){
	ob_end_clean();
	header("Location:".BASE_URL."index.php?page=sc3");
}
 
 
if(isset($_POST['save_detail'])){
	 
	//parent.location='index.php?page=sc1';
	
	if(!isset($markTressDetails) &&  empty($markTressDetails))
	{
		$errorMsg='Enter Marking  Details';
	}
	else
	{
		$markDetailDO =  new MarkDetailDO();
		
		if(!isset($mardDetail->id) || $mardDetail->id=='0' || $mardDetail->id==''){
		$markDetail=$markDetailDO->insert($mardDetail);
		}else{
        $markDetail->id=$mardDetail->id;
		}

		
		
		$_SESSION['markTressDetails']='';
		$_SESSION['mardDetail']='';
		ob_end_clean();
		header("Location:".BASE_URL."index.php?page=markCompleteDetail&markId=".$markDetail->id);
	}
}
if(isset($_POST['editsc1'])){
        ob_end_clean();
		header("Location:".BASE_URL."index.php?page=sc1&markId=".$mardDetail->id);
 
}
if(isset($_POST['delete'])){
	    $arrCondition = array('i_mark_id'=>$mardDetail->id);
	    $db->delete('c_marked_volume',$arrCondition);
		$arrCondition = array('i_mark_detail_id'=>$mardDetail->id);
	    $db->delete('r_tree_category',$arrCondition);
		$arCondition = array('id'=>$mardDetail->id);
		$db->delete('c_mark_detail',$arCondition);
        ob_end_clean();
		header("Location:".BASE_URL."index.php?page=profile");
        $_SESSION['empMsg']="Entry deleted.";

}
if(isset($_POST['next'])){
        ob_end_clean();
		header("Location:".BASE_URL."index.php?page=sc1&markId=".$mardDetail->id);
 
}

include('html/screen2HTML.php');
include('footer.php');
?>