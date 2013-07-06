<?php
$markDetailId=$_REQUEST['markId'];
$arCondition = array('id'=>$markDetailId);
$arFieldValues =array('i_fixed_status'=>'1');
$id = $db->update('c_mark_detail',$arFieldValues,$arCondition);
header("location:index.php");
?>