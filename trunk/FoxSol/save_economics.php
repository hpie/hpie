<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}

if(!isset($_POST['rate']))
exit;
require('connectDB.php');
$lot=$_SESSION['lot'];
$year=$_SESSION['year'];
$divi=$_SESSION['divi'];
$avgrate=$_POST['rate'];
$leadManD=$_POST['leadManD'];
$leadMulD=$_POST['leadMulD'];
$leadtracD=$_POST['leadtracD'];
$leadManQ=$_POST['leadManQ'];
$leadMulQ=$_POST['leadMulQ'];
$leadtracQ=$_POST['leadtracQ'];
$cropset=$_SESSION['cropset'];
$resinex=$_SESSION['ResinEx'];
$mancar=$_SESSION['mancar'];
$mulcar= $_SESSION['mulcar'];
$traccar=$_SESSION['traccar'];
$matecom=$_SESSION['matecom'];
$tool=$_SESSION['tool'];
$tenblazes=$_POST['tenblazes'];
$emptinnum=$_SESSION['emptinnum'];
$emptindis=$_SESSION['emptindis'];
$emptinsolR=$_SESSION['emptinsolR'];
$emptinR=$_SESSION['emptinR'];
$yieldfixed=$_POST['YieldFixed'];

$trate25=$_POST['trate25'];
$trateb25=$_POST['trateb25'];
$distancefact=$_POST['distancefact'];
$tchargeavg=$_POST['tchargeavg'];

$lrate50=$_POST['lrate50'];
$lrateb50=$_POST['lrateb50'];
$distanceload=$_POST['distanceload'];
$numman=$_POST['numman'];
$nummul=$_POST['nummul'];
$numtrac=$_POST['numtrac'];



$_SESSION['rate']=$avgrate;






	$q="insert into upset_price(lotno,division,tenblazes,yieldfixed,rate,Year,leadmanD,leadmulD,leadtracD,leadmanQ,leadmulQ,leadtracQ,cropsetR,ResinEx,mateCom,manCar,mulCar,traccar,tool,emptinnum,emptindis,emptinR,emptinsolR,trate25,trateb25,distancefact,lrate50,lrateb50,distanceload,tchargeavg,numman,nummul,numtrac) values('$lot','$divi','$tenblazes','$yieldfixed','$avgrate','$year','$leadManD','$leadMulD','$leadtracD','$leadManQ','$leadMulQ','$leadtracQ','$cropset','$resinex','$matecom','$mancar','$mulcar','$traccar','$tool','$emptinnum','$emptindis','$emptinR','$emptinsolR','$trate25','$trateb25','$distancefact','$lrate50','$lrateb50','$distanceload','$tchargeavg','$numman','$nummul','$numtrac')";
	if(!mysql_query($q))
	{
	echo "Some Error Occured";
	exit;
	}
	

	header('Location:print_economics.php');
	
	

?>