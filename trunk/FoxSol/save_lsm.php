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
$alotdate=$_SESSION['alotdate'];
$ratecar=$_SESSION['ratecar'];
$ratetrans=$_SESSION['ratetrans'];



$rss=mysql_query("select lsmname from current_lsm where lotno='$lotno' and division='$divi' and year='$year' and todate='0000-00-00' and fromdate='0000-00-00'");
if(mysql_num_rows($rss)==0)
{
$q="insert into current_lsm (lotno,division,year,alotdate,fromdate,ratecar,ratetrans,lsmname) values('$lotno','$divi','$year','$alotdate','$fromdate','$ratecar','$ratetrans','$lsmname')";


}
else
{
$q="update current_lsm set fromdate='$fromdate'  where lotno='$lotno' and division='$divi' and year='$year' and todate='0000-00-00' and fromdate='0000-00-00'";


}




if(mysql_query($q))
{
	//header ("Location:show_msg.php?msg=LSM Added Successfully");
	echo("<h2>Data Entered Successfully</h2>");
}
?>
<input type="button" onclick="javascript:window.location.assign('client.php')" value="Back" />
