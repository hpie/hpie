<?php
session_start();

if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
}
require('connectDB.php');
function getForests($lotno,$divi,$year)
{
	$rs=mysql_query("select distinct forest from verify where lotno='$lotno' and year='$year' and division='$divi'");

	$forestArr=array();
	while($row=mysql_fetch_array($rs))
	$forestArr[]=$row['forest'];

	$forests=implode(",",$forestArr);
	return $forests;



}
function getExten($lotno,$divi)
{
	$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
	$rs=mysql_query($q) or die("error");
	$data=mysql_fetch_array($rs);
	return ($data['exten']);



}



function getTotBlazes($lotno,$divi,$year)
{
	$q="select sum(blazen) as blaze from verify where lotno='$lotno' and year='$year' and division='$divi'";
	$rs=mysql_query($q);
	$data=mysql_fetch_array($rs);
	return $data['blaze'];

}


function getFitBlazes($lotno,$divi,$year)
{
	$q="select sum(blaze) as blaze from verify where lotno='$lotno' and year='$year' and division='$divi'";
	$rs=mysql_query($q);
	$data=mysql_fetch_array($rs);
	return $data['blaze'];

}

function getUnit($lotno,$divi)
{
	$q="select unit from lot_desc where lotno='$lotno' and division='$divi'";
	$rs=mysql_query($q) or die("error");
	$data=mysql_fetch_array($rs);
	return ($data['unit']);



}




$kapa=$_POST['year'];
$divi=$_REQUEST['divi'];

//$data = mysql_query("SELECT SUM(blaze) FROM verify WHERE year='$kapa' GROUP BY lotno,division") or die("No table"); //
$datan = mysql_query("SELECT DISTINCT (lotno+division)as lotno, division FROM verify where  year='$kapa' order by lotno") or die("No table");

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
<h3>Verified List Detail for the Resin Season <?php echo $kapa;?></b></h3>
<?php
//$datan = mysql_query("SELECT DISTINCT (lotno+division)as lotno, division, frange,rsd FROM verify where division='$divi' and  year='$kapa' order by lotno") or die("No table");
$datan = mysql_query("SELECT DISTINCT lotno, division, frange,rsd FROM verify where division='$divi' and  year='$kapa' order by lotno") or die("No table");


$i=1;
$ttl=0;
$ttl1=0;
$ttl2=0;
echo "<table width=900px border=1><tr><td>S.No.</td><td>Lot No.</td><td>Unit</td><td>Range</td><td>Forests</td><td>Name of RSD</td><td>Forest Division</td><td>Actual No. of Blazes</td><td>No. of Blazes Declared Fit after Verification</td><td>No. of Blazes Declared Unfit</td></tr>";
while($row=mysql_fetch_array($datan))
{
	$lotno=$row['lotno'];
	$lotno=addslashes($lotno);
	$divi=$row['division'];
	$frange=$row['frange'];
	$rsd=$row['rsd'];
	$totBlaze=getTotBlazes($lotno,$divi,$kapa);
	$fitBlaze=getFitBlazes($lotno,$divi,$kapa);
	$unfitBlaze=$totBlaze-$fitBlaze;
	echo "<tr><td>". $i . "</td><td>" . $lotno."/".$kapa. "(".getExten($lotno,$divi).")</td><td>" . getUnit($lotno,$divi) . "</td><td>" . $frange . "</td><td>" .getForests($lotno,$divi,$kapa). "</td><td>" . $rsd. "</td><td>" . $divi . "</td><td>" . $totBlaze . "</td><td>" . $fitBlaze . "</td><td>" . $unfitBlaze . "</td></tr>";
	$ttl +=$totBlaze;
	$ttl1+=$fitBlaze;
	$ttl2+=$unfitBlaze;
	$i++;
}
echo "<tr><td colspan=7><b><font color=red>Total</td><td><b><font color=red>" . $ttl . "</td><td><b><font color=red>" . $ttl1 . "</td><td><b><font color=red>" . $ttl2 . "</td></tr>";
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
&nbsp &nbsp &nbsp Forest Division, <?php echo $divi ; ?></h3>
</center>
<input type="button"
	onclick="javascript:window.location.assign('client.php')" value="Back" />
<input type="button" name="but" onClick="print()" value="Print List"><br>
<br>
</div>
</body>
</html>
