<?php
$nameofforest_id="";
$fordate     ="";
$todate      ="";
$area        ="";
$error       =0;
$errorMsg    ="";
if(isset($_POST['submit'])){
	extract($_POST);
	$markDetail =  new MarkDetailDO();
	$markList=$markDetail->getMarkDetailList($nameofforest_id);
    
   // ob_end_clean();
	//header("Location:".BASE_URL."index.php?page=sc2");
}
echo $_SESSION['cnameofforest'];
include('html/markDetailHTML.php');
include('footer.php');
//For Disconnection to  the database
include "coreClasses\datbaseDisConnect.php";
?>