<?php 

$arrCondition = array('id'=>$_REQUEST['id']);
$db->delete('ecnomics_transportation_detail',$arrCondition);
header("location:indexThickBox.php?page=transportationEntryEcnomics&markId=".$_REQUEST['markId']);
?>