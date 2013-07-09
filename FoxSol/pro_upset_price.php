<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
}

require('connectDB.php');

$year=$_POST['year'];
$divi=$_REQUEST['divi'];
function getExten($lotno,$divi)
{
	$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
	$rs=mysql_query($q) or die("error");
	$data=mysql_fetch_array($rs);
	return ($data['exten']);



}


function get_yield_fixed($lotno,$divi,$year)
{

	$qur="select yield_fixed  from yield_fixed where lotno='$lotno' and year='$year' and division='$divi'";
	$rs=mysql_query($qur);
	$row=mysql_fetch_array($rs);
	if(mysql_num_rows($rs)>0)
	return $row['yield_fixed'];
	else
	return null;



}


?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>





<title>FoxSolutions</title>

</head>

<body>
<!-- wrap starts here -->



<table border="1" align="center" width="800">

	<tr>
		<td colspan="9">
		<div align="center" class="style1"><input type="button"
			onclick="javascript:window.location.assign('client.php')"
			value="Back" /> <span class="style4"><strong>HIMACHAL PRADESH STATE
		FOREST CORPORATION LIMITED</strong></span><input type="button"
			onclick="print()" value="Print" /><br />
		<strong>FOREST WORKING DIVISION, <?php echo strtoupper($_SESSION['fwd']); ?>
		</strong></div>
		</td>
	</tr>
	<tr>
		<td colspan="9">
		<div align="center"><strong>PROPOSED UPSET PRICE FOR THE RESIN TAPPING
		SEASON <?php echo $year ." Forest Division ".$divi ; ?></strong></div>
		</td>
	</tr>
	<tr>
		<td>Sr No.</td>
		<td>Lot Number</td>
		<td>Tentative Number of Blazes for year <?php echo $year ;?></td>
		<td>Yield Fixed for year <?php echo $year; ?> per Section in Qtls.</td>
		<td>Lead Mannual/Mule/Gattu carriage upto RSD (kms)</td>
		<td>Carriage Rate as per economics in Rs. Per Qtls</td>
		<td>Transportation Rate as per economics in Rs. Per Qtls</td>
		<td>Rates proposed by D.M. in Rs. Per Qtls</td>
		<td>Rates approved by Director(S) in Rs. per Qtls</td>
	</tr>



	<?php

	//$q="select distinct lotno,division,rate,leadmanD,leadmulD,leadtracD ,tenblazes,tchargeavg from upset_price where division='$divi' and   year='$year' and id in(select max(id) from upset_price where division='$divi' group by lotno+division+year) order by lotno";
	$q="select distinct lotno,division,rate,leadmanD,leadmulD,leadtracD ,tenblazes,tchargeavg from upset_price where division='$divi' and   year='$year' order by lotno";
	$rs=mysql_query($q) or die();
	$i=1;
	$totblazes=0;
	while($row=mysql_fetch_array($rs))
	{
		$lotno=$row['lotno'];
		
		$currlot=addslashes($lotno);
		$divi=$row['division'];
		$rate=$row['rate'];
		$transrate=$row['tchargeavg'];
		$tenblazes=$row['tenblazes'];
		$leadmanD=array();
		$leadmanD=explode(",",$row['leadmanD']);

		$leadmulD=array();
		$leadmulD=explode(",",$row['leadmulD']);

		$leadtracD=array();
		$leadtracD=explode(",",$row['leadtracD']);
		$totblazes+=$tenblazes;

		$leaddistance=($row['leadmanD']!=0)  .",". $row['leadmulD'];
		echo '<tr><td>'.$i.'</td><td>'.$lotno.'/'.$year.'('.getExten($currlot,$divi).')</td><td>'.$tenblazes.'</td><td>'.get_yield_fixed($currlot,$divi,$year).'</td><td>';foreach($leadmanD as $lead)
		{
			if($lead!=0)
			echo $lead.",";

		}

		foreach($leadmulD as $lead)
		{
			if($lead!=0)
			echo $lead.",";

		}
		foreach($leadtracD as $lead)
		{
			if($lead!=0)
			echo $lead.",";

		}echo '</td><td>'.$rate.'</td><td>'.$transrate.'</td><td></td><td></td></tr>';








		$i++;}?>
	<tr>
		<td></td>
		<td>Total</td>
		<td><?php echo $totblazes ; ?></td>
		<td colspan="6"></td>
	</tr>
	<tr>
		<td colspan="6"></td>
		<td colspan="3">Divisional Manager FWD, <?php echo strtoupper($_SESSION['fwd']); ?>
		HPSFC, Shimla-9</td>
	</tr>
</table>

</body>
</html>
