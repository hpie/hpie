<?php 

$db->deleteTransportationSingle($_REQUEST['id']);
header("location:index.php?page=transportationEntry&markId=".$_REQUEST['markId']."&progressId=".$_REQUEST['progressId'])
;
?>