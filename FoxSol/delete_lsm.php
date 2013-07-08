<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}
require('connectDb.php');
$lotno=$_SESSION['lot'];
$divi=$_SESSION['divi'];
$year=$_SESSION['year'];
$lsmname=$_SESSION['lsmname'];
$fromdate=$_SESSION['fromdate'];
$ratecar=$_SESSION['ratecar'];
$ratetrans=$_SESSION['ratetrans'];
$todate=$_SESSION['todate'];


$q="update  current_lsm set todate='$todate' where lotno='".$lotno."' and division='$divi' and year='$year' and todate='0000-00-00'";

if(mysql_query($q))
header ("Location:show_msg.php?msg=LSM Dellocated Successfully");
?>
