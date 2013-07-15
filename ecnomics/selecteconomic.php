<?php
$markDetailId=$_GET['markId'];
echo $markDetailId;
$pageKey="economicselector";
$economicsId=$_REQUEST['i_ecnomics_master_id'];

if($economicsId != '')
{
	$_SESSION['economicsincpontext']=$economicsId;
	header("Location:".BASE_URL."indexThickBox.php?page=ecnomics&markId=".$markDetailId);
	
}
?>
<link
	rel="stylesheet" href="css/themes/base/jquery.ui.all.css">
<script src="js/jquery-1.6.2.js"></script>
<script src="js/ui/jquery.ui.core.js"></script>
<script src="js/ui/jquery.ui.widget.js"></script>
<script src="js/ui/jquery.ui.tabs.js"></script>
<link rel="stylesheet" href="css/demos.css">
<style>
.treetotal {
	background-color: #999999;
	color: white;
}

.classtotal {
	background-color: #666666;
	color: white;
}

.overalltotal {
	background-color: #333333;
	color: red;
}

.headrow {
	background-color: #aaaaaa;
}

.evenrow {
	background-color: #cccccc;
}

.oddrow {
	background-color: #eeeeee;
}
</style>
<br>
<center>
<table style='width:500px'>
<tr>
<td>
Choose Eoconomics To Work
</td>
<td>
<div id="tabs-1"><?php 

$common->generateFormCreation ($_SERVER,$pageKey,$markDetailId,$economicsId);
?>
</div>
</td>
</tr>
</table>
</center>