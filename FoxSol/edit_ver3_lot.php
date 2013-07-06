<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');
if(isset($_SESSION['yrope']) && ($_POST['lot'] &&($_POST['divi']))){
$lotn=$_POST['lot'];
$dv=$_POST['divi'];
$yrop=$_SESSION['yrope'];
$chek ="SELECT * FROM verify WHERE year='$yrop' AND lotno='$lotn' AND division='$dv'"; 
$r=mysql_query($chek) or die(mysql_error());
			
			if(mysql_num_rows($r)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no Lot in the Verified List with the selected year, selected lot no and selected Forest Division");
			window.location = "edit_ver_lot.php"
			</script>';
			
			}
			else
			{
			@mysql_query("DELETE FROM verify WHERE lotno = '$lotn' AND division = '$dv' AND year='$yrop'") or die("No table"); 
			echo '<script type="text/javascript">
			alert ("The selected lot for the selected Forest Division and for the selected year has been successfully deleted from the verified list");
			window.location = "admin.php"
			</script>';
			}
			
			}
			else
			{
			echo '<script type="text/javascript">
			alert ("Please add all the relevent and necessary information first");
			window.location = "edit_ver_lot.php"
			</script>';
			}