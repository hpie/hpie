<?php 

$markDetailId=$_REQUEST['markId'];
$treetype_id=$_REQUEST['treeId'];
$progressId=$_REQUEST['progressId'];
$db->deleteTransportationOpening($progressId);
$db->deleteTransportationDetailOpening($progressId);
header("location:index.php?page=transportationHomeOpening&markId=".$_REQUEST['markId']);
?>