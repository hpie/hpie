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
return "Not Entered";
}




$lot = $_SESSION['lot'];
$year=$_SESSION['year'];
$divi=$_SESSION['divi'];
$bmonth=$_POST['frommon'];
$bday=$_POST['fromday'];
$byear=$_POST['fromyear'];


if(isset($_POST['alotmon']))
{
$alotmonth=$_POST['alotmon'];
$alotday=$_POST['alotday'];
$alotyear=$_POST['alotyear'];
if(!checkdate($alotmonth,$alotday,$alotyear))
{
	echo '<script type="text/javascript">
			alert ("Enter valid date for Allotment Date");
			window.location = "sel_work.php"
			</script>';
			
		}
$_SESSION['alotdate']=$alotyear.'-'.$alotmonth.'-'.$alotday;		
}
else
{
$_SESSION['alotdate']=$_POST['alotdate'];
}

if($_POST['fromday']!=0)
if(!checkdate($bmonth,$bday,$byear))
{
	echo '<script type="text/javascript">
			alert ("Enter valid date for starting the work");
			window.location = "sel_work.php"
			</script>';
			
		}
$_SESSION['fromdate']=$byear.'-'.$bmonth.'-'.$bday;	


$auth=0;

if((!is_numeric($_POST['ratecar'])) || (!is_numeric($_POST['ratetrans'])))
{
$auth=2;

}


if($auth==2)
{
echo '<script type="text/javascript">
			alert ("Enter values for rates");
			window.location = "sel_work.php"
			</script>';


}
	
$_SESSION['lsmname']= $_POST['lsmname'];

$_SESSION['ratecar']= $_POST['ratecar'];
$_SESSION['ratetrans']= $_POST['ratetrans'];




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<script language="javascript"  type="text/javascript">
 
</script>


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
<div id="wrap">

	<?php include('includes/header.php'); ?>
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">		
		
		<div id="sidebar" >
		
			
			<?php include('includes/sidebar.php');	?>				
		</div>	
	
		<div id="main">		
		
			<div class="post">
			
				
				<h1><div style="float:left">Show the LSM Details</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="save_lsm.php">
					<font size="4"><?php 
					echo "Showing LSM details for Lot Number ". $lot."/".$year."(" .getExten($lot,$divi).") for review before save </font>";
		echo ' <table border =0>
		<tr><td> LSM Name</td><td>'. $_POST['lsmname'].'</td></tr>
		<tr><td> Date of Allotment the work</td><td>'. getDDMMYY($_SESSION['alotdate']).'&nbsp;&nbsp;(dd-mm-yyyy)</td></tr>
		<tr><td> Date of starting the work</td><td>'. getDDMMYY($_SESSION['fromdate']).'&nbsp;&nbsp;(dd-mm-yyyy)</td></tr>
		<tr><td> Negotiated rate for Extraction/carriage (per Qtls)</td><td>'. $_POST['ratecar'].'</td></tr>
		<tr><td>Negotiated rate for transportation (per Qtls)</td><td>'. $_POST['ratetrans'].'</td></tr>
		 </table>';
		 				
	echo '	<br><input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Save"  />
					<br> ';?>
				</p>

					
			  </form>
				
			</div>
			
				
				
				<br />				
										
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>

<!-- footer starts here -->	
<div id="footer">
<?php include('includes/footer.php'); ?>
</div>
<!-- footer ends here -->
	
<!-- wrap ends here -->
</div>

</body>
</html>
