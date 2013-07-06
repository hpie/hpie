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

function ifalotted($lotno,$divi,$year)

{
$rss=mysql_query("select lsmname from current_lsm where lotno='$lotno' and division='$divi' and year='$year' and todate='0000-00-00' and fromdate='0000-00-00' and alotdate!='0000-00-00'");
if(mysql_num_rows($rss)!=0)
return true;
else
return false;


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


if(!empty($_POST['lot']))
{
$lot = $_POST['lot'];
$year=$_POST['year'];
$divi=$_POST['divi'];


$_SESSION['lot']=$lot;
$_SESSION['year']=$year;
$_SESSION['divi']=$divi;

$rs=mysql_query("select lotno from verify where lotno='$lot' and division = '$divi' and year='$year'");

if(mysql_num_rows($rs)==0)
{
echo '<script type="text/javascript">
			alert ("NO lot found in the verified list of choosen year with selected criteria");
			window.location = "sel_work.php"
			</script>';
}

$rs1=mysql_query("select lsmname from current_lsm where lotno='$lot' and division='$divi' and year='$year' and todate='0000-00-00' and fromdate!='0000-00-00'");
if(mysql_num_rows($rs1)!=0)
{
echo '<script type="text/javascript">
			alert ("Starting Date for LSM is already entered.To Add New LSM delete the current LSM");
			window.location = "sel_work.php"
			</script>';
}



$alotinfors=mysql_query("select lsmname , alotdate  ,ratecar , ratetrans from current_lsm where lotno='$lot' and division='$divi' and year='$year' and todate='0000-00-00' and fromdate='0000-00-00' and alotdate!='0000-00-00'");
	if(mysql_num_rows($alotinfors)!=0)
	{
	$alotinfo=mysql_fetch_array($alotinfors);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<script language="javascript"  type="text/javascript">
function check()
{
if(document.forms["form1"]["lsmname"].value=="")
{
alert ("Enter the name of LSM Name");
return false;
}
if(document.forms["form1"]["alotday].value==0 || document.forms["form1"]["alotmonth"].value==0 || document.forms["form1"]["alotyear"].value=="")
{
alert ("Enter the date of Allotment");
return false;
}
else if(document.forms["form1"]["ratecar"].value=="")
{
alert ("Enter the carriage rate");
return false;

}
else if(document.forms["form1"]["ratetrans"].value=="")
{
alert ("Enter the Mannual transportation rate");
return false;


}

else
return true;



}


    
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
			
				
				<h1><div style="float:left">Enter the LSM Details</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="show_lsmdetails.php">
					<font size="4"><?php 
					echo "Enter the details for Lot Number ". $lot."/".$year."(" .getExten($lot,$divi).")"; ?></font>
				<?php	
					if(!ifalotted($lot,$divi,$year))
					{?>
					
					
		 <table border =0>
		<tr><td width="274"> Enter the LSM Name*</td>
		<td width="221"><input type="text" name="lsmname" /></td></tr>
		<tr><td> Date of Allotment of  the work*</td><td><select name="alotday"><option value=0>Day</option><?php $day=range(1,31);
		foreach($day as $d)
		echo '<option value='.$d.'>'.$d.'</option>';
		echo '</select>'; ?>
	
		<select name="alotmon" ><option value=0>Month</option><?php $months=array(1=>'Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec');
		foreach($months as $k => $m)
		echo '<option value='.$k.'>'.$m.'</option>';
		echo '</select>'; ?>
		<Select name="alotyear"><option value=0>Year</option><?php $year=range(date("Y")+1,2009,-1); foreach($year as $y) echo '<option value='.$y.'>'.$y.'</option>';
		echo '</select>';?> </td></tr>
		
		<tr><td> Date of starting the work*</td><td><select name="fromday"><option value=0>Day</option><?php $day=range(1,31);
		foreach($day as $d)
		echo '<option value='.$d.'>'.$d.'</option>';
		echo '</select>'; ?>
	
		<select name="frommon" ><option value=0>Month</option><?php $months=array(1=>'Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec');
		foreach($months as $k => $m)
		echo '<option value='.$k.'>'.$m.'</option>';
		echo '</select>'; ?>
		<Select name="fromyear"><option value=0>Year</option><?php $year=range(date("Y")+1,2009,-1); foreach($year as $y) echo '<option value='.$y.'>'.$y.'</option>';
		echo '</select>'; ?> </td></tr>
		<tr><td> Enter the negotiated rate for extraction/carriage (per Qtls)*</td><td><input type="text" name="ratecar" /></td></tr>
		<tr><td> Enter the negotiated rate for transportation (per Qtls)*</td><td><input type="text" name="ratetrans" /></td></tr>
		<tr><td colspan=2><font color=red> Fields Marked with * can no be altered later....</font></td></tr>
		 </table>
		 <?php
		 }else {
		?> 
		  <table border =0>
		<tr><td width="274">LSM Name</td>
		<td width="221"><?php echo $alotinfo['lsmname'] ; ?></td></tr>
		<tr><td> Date of Allotment of  the work</td><td><?php echo getDDMMYY($alotinfo['alotdate']).'&nbsp; &nbsp;(dd-mm-yyyy)' ;?> </td></tr>
		
		<tr><td> Date of starting the work</td><td><select name="fromday"><option value=0>Day</option><?php $day=range(1,31);
		foreach($day as $d)
		echo '<option value='.$d.'>'.$d.'</option>';
		echo '</select>'; ?>
	
		<select name="frommon" ><option value=0>Month</option><?php $months=array(1=>'Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec');
		foreach($months as $k => $m)
		echo '<option value='.$k.'>'.$m.'</option>';
		echo '</select>'; ?>
		<Select name="fromyear"><option value=0>Year</option><?php $year=range(date("Y")+1,2009,-1); foreach($year as $y) echo '<option value='.$y.'>'.$y.'</option>';
		echo '</select>'; ?> </td></tr>
		<tr><td> Enter the negotiated rate for extraction/carriage (per Qtls)</td><td><?php echo $alotinfo['ratecar']; ?></td></tr>
		<tr><td> Enter the negotiated rate for transportation (per Qtls)</td><td><?php echo $alotinfo['ratetrans']; ?></td></tr>
		<input type=hidden name=ratecar value=<?php echo $alotinfo['ratecar'] ;?>>
			<input type=hidden name=ratetrans value=<?php echo $alotinfo['ratetrans'] ;?>>
		<input type=hidden name=alotdate value=<?php echo $alotinfo['alotdate'] ;?>>
		<input type=hidden name=lsmname value=<?php echo $alotinfo['lsmname'] ;?>>
		 </table>
		 
		 
		 
		 
		 
		 				
	<?php }echo '	<br><input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Next"  />
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
