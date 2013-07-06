<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');
if(isset($_SESSION['wrk']) && ($_SESSION['mth']) && ($_SESSION['yrt']) && ($_POST['lot']) && ($_POST['divi']) && ($_POST['fdate']) && ($_POST['tdate'])){
$lotn=$_POST['lot'];
$mth=$_SESSION['mth'];
$yrop=$_SESSION['yrt'];
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$dv=$_POST['divi'];
if($_SESSION['wrk']==1){
$chek ="SELECT * FROM bark_store WHERE year='$yrop' AND lotno='$lotn' AND division='$dv' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'"; 
$r=mysql_query($chek) or die(mysql_error());
			
			if(mysql_num_rows($r)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no Lot with the selected year, selected lot no, selected Forest Division and other info");
			window.location = "del_sel_prog_yr.php"
			</script>';
}
else
{
@mysql_query("DELETE FROM bark_store WHERE lotno = '$lotn' AND division = '$dv' AND year='$yrop' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'") or die("No table"); 
			echo '<script type="text/javascript">
			alert ("The selected lot for the selected Forest Division and for the selected year has been successfully deleted");
			window.location = "admin.php"
			</script>';
}
}
else if($_SESSION['wrk']==2){
$chek ="SELECT * FROM tap_store WHERE year='$yrop' AND lotno='$lotn' AND division='$dv' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'"; 
$r=mysql_query($chek) or die(mysql_error());
			
			if(mysql_num_rows($r)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no Lot with the selected year, selected lot no, selected Forest Division and other info");
			window.location = "del_sel_prog_yr.php"
			</script>';
}
else
{
@mysql_query("DELETE FROM tap_store WHERE lotno = '$lotn' AND division = '$dv' AND year='$yrop' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'") or die("No table"); 
			echo '<script type="text/javascript">
			alert ("The selected lot for the selected Forest Division and for the selected year has been successfully deleted");
			window.location = "admin.php"
			</script>';
}
}
else{
$chek1 ="SELECT * FROM bark_store WHERE year='$yrop' AND lotno='$lotn' AND division='$dv' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'"; 
$chek2 ="SELECT * FROM tap_store WHERE year='$yrop' AND lotno='$lotn' AND division='$dv' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'"; 

$r=mysql_query($chek1) or die(mysql_error());
$q=mysql_query($chek2) or die(mysql_error());			
			if((mysql_num_rows($r)==0) || (mysql_num_rows($q)==0))
			{
			echo '<script type="text/javascript">
			alert ("There is no Lot with the selected year, selected lot no, selected Forest Division and other info");
			window.location = "del_sel_prog_yr.php"
			</script>';
}
else
{
@mysql_query("DELETE FROM bark_store WHERE lotno = '$lotn' AND division = '$dv' AND year='$yrop' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'") or die("No table"); 
@mysql_query("DELETE FROM tap_store WHERE lotno = '$lotn' AND division = '$dv' AND year='$yrop' AND frmmonth='$mth' AND frmdate='$fdate' AND todate='$tdate'") or die("No table"); 

			echo '<script type="text/javascript">
			alert ("The selected lot for the selected Forest Division and for the selected year has been successfully deleted");
			window.location = "admin.php"
			</script>';
}
}
}
else{
echo '<script type="text/javascript">
			alert ("Please Firstly fill in all the necessary information ");
			window.location = "del_sel_prog_yr.php"
			</script>';
}
?>