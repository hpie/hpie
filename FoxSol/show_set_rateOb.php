<?php

session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}
function getExten($lotno,$divi)
{
	$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
	$rs=mysql_query($q) or die("error");
	$data=mysql_fetch_array($rs);
	return ($data['exten']);



}

require('connectDB.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>



<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />

<title>FoxSolutions</title>

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
<div style="float: left"><?php $name=$_SESSION['name']; echo "Welcome, " . $name; ?></div>



<div style="float: right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
print date("jS F Y, g:i A");
?></font></div>
</h1>
<br />
<br />
<?php
echo '<form action="save_rateOb.php" method="post">';
$divi=$_POST['divi'];
$year=$_SESSION['kapa'];
$data = mysql_query("SELECT distinct(lotno+division)as lotno FROM verify where division='$divi' and year='$year' order by lotno") or die("No table");

$num=$_SESSION['numlots'];

echo '<center><table border="1"><tr><td>Sr.No.</td><td>Lot Number</td><td>LSM Name</td><td>Carriage Rate</td><td>Transportation Rate</td></tr>';
$i=0;
while($info = mysql_fetch_array( $data ))
{
	$lot=$info['lotno'];
	$currlot=addslashes($lot);
	//$exten=$info['exten'];
	$lsm=$_POST['lsm'.$i];
	$ratecar=$_POST['ratecar'.$i];
	$ratetrans=$_POST['ratetrans'.$i];
	echo '<tr><td>'.($i+1).'</td><td>'.$lot.'/'.$year.'('.getExten($currlot,$divi).')</td><td>'.$lsm.'</td><td>'.$ratecar.'</td><td>'.$ratetrans.'</td></tr>';

	echo '<input type="hidden" name="lot'.$i.'" value="'.$lot.'"/>';
	echo '<input type="hidden" name="lsm'.$i.'" value="'.$lsm.'"/>';
	echo '<input type="hidden" name="ratecar'.$i.'" value="'.$ratecar.'"/>';
	echo '<input type="hidden" name="ratetrans'.$i.'" value="'.$ratetrans.'"/>';
	$i++;
}
echo '</table></center>';
echo '<input type="hidden" name="divi" value="'.$divi.'"/>
		<input type=submit value="Save"></form>';







?> <br />

</div>

<!-- content-wrap ends here --></div>
</div>

<!-- footer starts here -->
<div id="footer"><?php include('includes/footer.php'); ?></div>
<!-- footer ends here --> <!-- wrap ends here --></div>

</body>
</html>
