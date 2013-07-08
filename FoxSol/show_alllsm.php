<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
}
require('connectDB.php');
function getForests($lotno,$divi,$year)
{
	$rs=mysql_query("select forest from verify where lotno='$lotno' and year='$year' and division='$divi'");

	$forestArr=array();
	while($row=mysql_fetch_array($rs))
	$forestArr[]=$row['forest'];

	$forests=implode(",",$forestArr);
	return $forests;



}


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
}

function getUnit($lotno,$divi)
{
	$q="select unit from lot_desc where lotno='$lotno' and division='$divi'";
	$rs=mysql_query($q) or die("error");
	$data=mysql_fetch_array($rs);
	return ($data['unit']);



}


function getExten($lotno,$divi)
{
	$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
	$rs=mysql_query($q) or die("error");
	$data=mysql_fetch_array($rs);
	return ($data['exten']);

}




$kapa=$_POST['year'];
$divi=$_POST['divi'];

//$data = mysql_query("SELECT SUM(blaze) FROM verify WHERE year='$kapa' GROUP BY lotno,division") or die("No table"); //
//$datan = mysql_query("SELECT DISTINCT (lotno+division)as lotno, division,frange FROM verify where division='$divi' and  year='$kapa' order by lotno") or die("No table");
$datan = mysql_query("SELECT DISTINCT lotno, division,frange FROM verify where division='$divi' and  year='$kapa' order by lotno") or die("No table");

?>
<html>
<head>
<title>Foxsolutions</title>
</head>
<body>
<div align=center>
<center>
<h1><b>Himachal Pradesh State Forest Corporation Limited<br>
Forest Working Division, <?php echo strtoupper($_SESSION['fwd']); ?></h1>
<h3>Current LSM List Detail for the Resin Season <?php echo $kapa;?></b></h3>
<?php

function	getLSMname($lotno,$divi,$year)
{

	$rs=mysql_query("select lsmname from current_lsm where year='$year' and division='$divi' and lotno='$lotno' and todate='0000-00-00'");
	$row=mysql_fetch_array($rs);
	return $row['lsmname'];
}

function getlsmDateStart($lotno,$divi,$year)
{
	$rs=mysql_query("select fromdate from current_lsm where year='$year' and division='$divi' and lotno='$lotno' and todate='0000-00-00'");
	$row=mysql_fetch_array($rs);

	return $row['fromdate'];

}

function getlsmDateAlot($lotno,$divi,$kapa)
{
	$rs=mysql_query("select alotdate from current_lsm where year='$kapa' and division='$divi' and lotno='$lotno' and todate='0000-00-00'");
	$row=mysql_fetch_array($rs);
	return $row['alotdate'];
}

echo "<table width=900px border=1><tr><td>S.No.</td><td>Lot No.</td><td>Range</td><td>Unit</td><td>Forests</td><td>Name of LSM</td><td>Date of Allotment(dd-mm-yy)</td><td>Working from date(dd-mm-yyyy)</td><td>Forest Division</td></tr>";
$i=1;
while($row = mysql_fetch_array( $datan ))
{
	$lotno=$row['lotno'];
	$lotno=addslashes($lotno);
	$frange=$row['frange'];
	$divi=$row['division'];
	$lsmname=getLSMname($lotno,$divi,$kapa);
	$fromdate=(getlsmDateStart($lotno,$divi,$kapa)=='0000-00-00')?"NOT STARTED YET":getDDMMYY(getlsmDateStart($lotno,$divi,$kapa));
	$alotdate=getlsmDateAlot($lotno,$divi,$kapa);





	echo "<tr><td>". $i . "</td><td>" . $lotno."/".$kapa. "(".getExten($lotno,$divi).")</td><td>" . $frange . "</td><td>" . getUnit($lotno,$divi) . "</td><td>" .getForests($lotno,$divi,$kapa). "</td><td>" . $lsmname. "</td><td>" . getDDMMYY($alotdate) . "</td><td>" . ($fromdate) . "</td><td>" . $divi . "</td></tr>";

	$i++;
}

echo "</table>";
?> <br>
<br>
<br>
<br>
<h3>Divisional Manager &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp Divisional Forest Officer<br>
Forest Working Division, <?php echo strtoupper($_SESSION['fwd']); ?>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbspForest Division , <?php echo $divi ; ?></h3>
</center>

<input type="button" name="but" onClick="print()" value="Print List"><br>
<br>
</div>
</body>
</html>
