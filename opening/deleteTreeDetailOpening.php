<?php
$markDetailId=$_GET['markid'];
$treeId=$_GET['treeid'];
$arrCondition = array('i_mark_id'=>$markDetailId,'i_tree_id'=>$treeId);
$db->delete('c_marked_opening_volume',$arrCondition);
$arrCondition = array('i_mark_detail_id'=>$markDetailId,'i_tree_id'=>$treeId);
$db->delete('r_tree_opening_category',$arrCondition);
ob_end_clean();
header("Location:".BASE_URL."index.php?page=addMarkingOpening&markId=".$markDetailId);


?>