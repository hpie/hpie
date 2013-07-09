<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}

require('connectDB.php');
function getExten($lotno,$divi)
{
	$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
	$rs=mysql_query($q) or die("error");
	$data=mysql_fetch_array($rs);
	return ($data['exten']);
}
$year=$_POST['year'];
$lot=$_POST['lot'];
//$lot=addslashes($lot);
$divi=$_POST['divi'];




function getDDMMYY($dateyy)
{
	$date=array();
	if($dateyy!=0000-00-00)
	{
		$date=explode("-",$dateyy);
		$yy=$date[0];
		$mm=$date[1];
		$dd=$date[2];
		return $dd.'-'.$mm.'-'.$yy;
	}
	else
	return "Still Working";
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>



<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />

<title>FoxSolutions</title>

<style type="text/css">
<!--
.style2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<!-- wrap starts here -->
<div id="wrap"><?php include('includes/header.php'); ?> <!-- content-wrap starts here -->
<div id="content-wrap">
<div id="content">

<div id="sidebar"><?php include('includes/sidebar.php');	?></div>

<div id="main">

<div class="post">


<h1>
<div style="float: left">Showing LSM Details for Lot No.<?php echo $lot.'/'.$year.'('.getExten($lot,$divi).')' ;?></div>



<div style="float: right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
print date("jS F Y, g:i A");
?></font></div>
</h1>
<br><br />
<?php $rs=mysql_query("select * from current_lsm where lotno='$lot' and division='$divi' and year='$year' order by alotdate");
if(mysql_num_rows($rs)==0)
{
	echo '<script type="text/javascript">
			alert ("NO LSM details found for this lot");
			window.location = "sel_lotL.php"
			</script>';
}
echo '<table border=1><tr><td>Sr.No.</td><td>LSM Name</td><td>Date of Allotment of Work(dd-mm-yyyy)</td><td>Date of Starting Work(dd-mm-yyyy)</td><td>Date of Ending Work(dd-mm-yyyy)</td><td>Extraction/Carriage Rate(per Qtls)</td><td>Tranportation Rate(per Qtls)</td></tr>';
$i=1;
while($row=mysql_fetch_array($rs))
{
	$lsmname=$row['LSMName'];
	$alotdate=(getDDMMYY($row['alotdate'])=='00-00-0000')?"No Alotement":getDDMMYY($row['alotdate']);
	if(($row['fromdate']=='0000-00-00') and ($row['todate']=='0000-00-00'))
	{
		$fromdate="Not Started to work";
		$todate="NA";
	}
	else if(($row['fromdate']=='0000-00-00') and ($row['todate']!='0000-00-00'))
	{
		$fromdate="Never Worked";
		$todate=getDDMMYY($row['todate']);
	}
	else
	{
		$fromdate=getDDMMYY($row['fromdate']);
		$todate=$todate=getDDMMYY($row['todate']);


	}
	$ratecar=$row['ratecar'];
	$ratetrans=$row['ratetrans'];

	echo '<tr><td>'.$i.'</td><td>'.$lsmname.'</td><td>'.$alotdate.'</td><td>'.$fromdate.'</td><td>'.$todate.'</td><td>'.$ratecar.'</td><td>'.$ratetrans.'</td></tr>';



	$i++;

}
echo '</table>';
?>

</div>



<br />

</div>

<!-- content-wrap ends here --></div>
</div>

<!-- footer starts here -->
<div id="footer"><?php include('includes/footer.php'); ?></div>
<!-- footer ends here --> <!-- wrap ends here --></div>

</body>
</html>
