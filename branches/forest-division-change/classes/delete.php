<?php 

$arrCondition = array('id'=>$_REQUEST['id']);
$db->delete('ecnomics_transportation_detail_RSD',$arrCondition);

header("location:indexThickBox.php?page=transportationEntryEcnomicsRSD&markId=".$_REQUEST['markId']);
?>