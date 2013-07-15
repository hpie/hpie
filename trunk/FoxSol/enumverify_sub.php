<?php
session_start();
require('connectDB.php');
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
}
if(isset($_SESSION['count']) && ($_SESSION['lot']) && ($_SESSION['range']) && ($_SESSION['ta']) && ($_SESSION['ext']) && ($_SESSION['unit']) && ($_SESSION['divi']) && ($_POST['val']) && ($_SESSION['forests']))
{
	if($_POST['val']=="insert")
	{
		$ppl = $_SESSION['count'];
		$lotno=$_SESSION['lot'];
		$frange=$_SESSION['range'];
		$type=$_SESSION['ta'];
		$mext=$_SESSION['ext'];

		$rsd=$_SESSION['rsd'];
		$unit=$_SESSION['unit'];
		$divi=$_SESSION['divi'];
		$exten=$_SESSION['exten'];



		$forest = $_SESSION['forests'];
		$ppll = explode(",", $forest);
		date_default_timezone_set('Asia/Calcutta');
		$kapa=$_SESSION['kapa'];
		//$nblazes =array();
		for($i = 0; $i <$ppl; $i++) {
			$y = $i + 3;
			$ert =$ppll[$i];


			$nblazest = $_SESSION['forestn'. $y];
			$sql="INSERT INTO enum (lotno,frange,forest, year, division,blazen,unit) VALUES('$lotno','$frange','$ert','$kapa','$divi','$nblazest','$unit')";
			if (!mysql_query($sql,$con))
			{
				die('Error: ' . mysql_error());
			}
		}

		//header("Location: show_msg.php?msg='Data entered successfully'");
		
		mysql_close($con);
		echo("<h2>Data Entered Successfully</h2>");
		echo("<input type=\"button\" onclick=\" javascript:window.location.assign('client.php')\"  value=\" Back\"  />");
		exit;
	}else if($_POST['val']=="update")
	{
		$ppl = $_SESSION['count'];
		$lotno=$_SESSION['lot'];
		$frange=$_SESSION['range'];
		$type=$_SESSION['ta'];
		$mext=$_SESSION['ext'];

		$rsd=$_SESSION['rsd'];
		$unit=$_SESSION['unit'];
		$divi=$_SESSION['divi'];
		$exten=$_SESSION['exten'];



		$forest = $_SESSION['forests'];
		$ppll = explode(",", $forest);
		date_default_timezone_set('Asia/Calcutta');
		$kapa=$_SESSION['kapa'];
		//$nblazes =array();
		for($i = 0; $i <$ppl; $i++) {
			$y = $i + 3;
			$ert =$ppll[$i];


			$nblazest = $_SESSION['forestn'. $y];
			$sql="UPDATE enum SET blazen='".$nblazest."',unit='".$unit."' WHERE lotno='".$lotno."' AND forest='".$ert."'";
			if (!mysql_query($sql,$con))
			{
				die('Error: ' . mysql_error());
			}
		}

		//header("Location: show_msg.php?msg='Data entered successfully'");
		
		mysql_close($con);
		echo("<h2>Data Entered Successfully</h2>");
		echo("<input type=\"button\" onclick=\" javascript:window.location.assign('client.php')\"  value=\" Back\"  />");
		exit;
	}
	
}
else{
	//header("Location: show_msg.php?msg='Please Fill in all the details'");
	
	mysql_close($con);
	echo("<h2>Please Fill in all the details</h2>");
	echo("<input type=\"button\" onclick=\" javascript:window.location.assign('client.php')\"  value=\" Back\"  />");
	exit;
}
?>