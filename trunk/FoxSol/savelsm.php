<?php
session_start();

require('connectDb.php');
$lotno=$_SESSION['lot'];
$divi=$_SESSION['divi'];
$year=$_SESSION['year'];
$lsmname=$_POST['lsmname'];
$fromdate=$_POST['fromdate'];
$ratecar=$_POST['ratecar'];
$ratetrans=$_POST['ratetrans'];


$q="insert into current_lsm (lotno,division,year,fromdate,ratecar,ratetrans,lsmname) values('$lotno','$divi','$year','$fromdate','$ratecar','$ratetrans','$lsmname')";

mysql_query($q) or die();
?>

