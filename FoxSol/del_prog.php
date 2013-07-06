<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
$year=range(date("Y")+1,2009,-1);
require('connectDB.php');
if(isset($_POST['year']) && ($_POST['wrk']) && ($_POST['month'])){
$yrop=$_POST['year'];
$_SESSION['yrt']=$yrop;
$wrk=$_POST['wrk'];
$_SESSION['wrk']=$wrk;
$mth=$_POST['month'];
$_SESSION['mth']=$mth;
if($wrk==1){
$chek ="SELECT * FROM bark_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'";
$r=mysql_query($chek) or die(mysql_error());
			
			if(mysql_num_rows($r)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no lot undergone for bark shaving for the selected year");
			window.location = "del_sel_prog_yr.php"
			</script>';
			}
}
else if($wrk==2){

$chek ="SELECT * FROM bark_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'";
$r=mysql_query($chek) or die(mysql_error());
			
			if(mysql_num_rows($r)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no lot undergone for crop setting for the selected year");
			window.location = "del_sel_prog_yr.php"
			</script>';
			}

}
else if($wrk==3){
$chek1 ="SELECT * FROM bark_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'";
$chek2 ="SELECT * FROM tap_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'";
$r1=mysql_query($chek1) or die(mysql_error());
$r2=mysql_query($chek2) or die(mysql_error());
			
			if(mysql_num_rows($r1)==0 || mysql_num_rows($r2)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no lot undergone for bark shaving or crop setting for the selected year");
			window.location = "del_sel_prog_yr.php"
			</script>';
			}
			

}
else{
echo '<script type="text/javascript">
			alert ("Select the type of work first");
			window.location = "del_sel_prog_yr.php"
			</script>';
}
}
else{
header("Location:show_msg.php?msg='Please supply all the information first'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<script language="javascript"  type="text/javascript">
function check()
{
if(document.forms["form1"]["lot"].value==0)
{
alert ("Select lot no");
return false;
}
else if(document.forms["form1"]["fdate"].value==0)
{
alert ("Select From Date");
return false;
}
else if(document.forms["form1"]["tdate"].value==0)
{
alert ("Select To Date");
return false;
}
else if(document.forms["form1"]["divi"].value==0)
{
alert ("Select Forest Division");
return false;
}
else
return true;



}
</script>

<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />


<title>FoxSolutions</title>
	
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
			
					
				<h1><div style="float:left">Delete Progress Report</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="del_prog_cnfrm.php">
					<p>
					
					
					
 <?php 
	// Connects to your Database
	if($wrk==1){
			$data = mysql_query("SELECT DISTINCT lotno FROM bark_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'") or die("No table");
$datan = mysql_query("SELECT DISTINCT division FROM bark_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'") or die("No table");			
		echo 	'<p>Select the lot Description No.<select name="lot">';
	    echo   '<option value="0">Select</option>';
		while($info = mysql_fetch_array( $data )) 
		{  
			$lot=$info['lotno'];
			echo "<option>" . $lot . "</option>";
		  		
		} 
		
		 echo		 '</select><br><br>Select the Forest Division of Lot<select name="divi"><option value="0">Select</option>';
		 while($info1 = mysql_fetch_array( $datan )) 
		{  
			$divi=$info1['division'];
			echo "<option>" . $divi . "</option>";
		  		
		} 
echo'</select> <br><br>From Date : <select name="fdate">
<option value="0">Select</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> &nbsp &nbsp &nbsp To Date : <select name="tdate">
<option value="0">Select</option><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option></select><br><br>';
		echo '<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Delete"  />
					</p>'; }
					else{
			$data = mysql_query("SELECT DISTINCT lotno FROM tap_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'") or die("No table"); 
			$datan = mysql_query("SELECT DISTINCT division FROM tap_store WHERE year='$yrop' AND frmmonth='$mth' AND tomonth='$mth'") or die("No table"); 
		echo 	'<p>Select the lot Description No.<select name="lot">';
	    echo   '<option value="0">Select</option>';
		while($info = mysql_fetch_array( $data )) 
		{  
			$lot=$info['lotno'];
			echo "<option>" . $lot . "</option>";
		  		
		} 
		
		 echo		 '</select><br><br>Select the Forest Division of Lot<select name="divi"><option value="0">Select</option>';
		 while($info1 = mysql_fetch_array( $datan )) 
		{  
			$divi=$info1['division'];
			echo "<option>" . $divi . "</option>";
		  		
		} 
echo'</select> <br><br>From Date : <select name="fdate">
<option value="0">Select</option><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option></select> &nbsp &nbsp &nbsp To Date : <select name="tdate">
<option value="0">Select</option><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option></select><br><br>';
		echo '<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Delete"  />
					</p>'; }?>
					
		

 		

					
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
