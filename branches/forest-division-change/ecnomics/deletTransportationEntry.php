<?php 

$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$db->deleteTransportation($progressId);
$db->deleteTransportationDetail($progressId);
header("location:index.php?page=transportationHome&markId=".$_REQUEST['markId']);
?>