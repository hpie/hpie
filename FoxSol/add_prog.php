<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}
$year=range(date("Y")+1,2009,-1);
require('connectDB.php');
if(isset($_POST['year'])){
$yrop=$_POST['year'];
$_SESSION['yrop']=$yrop;
$chek ="SELECT DISTINCT year FROM verify WHERE year='$yrop'"; 
$r=mysql_query($chek) or die(mysql_error());
			
			if(mysql_num_rows($r)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no Lot in the Verified List with the selected year");
			window.location = "prog_sel_yr.php"
			</script>';
			
			}
}
else{
header("Location:show_msg.php?msg='Please go to the add progress report again and select the year first'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>



<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />



<script language="javascript"  type="text/javascript">
function check()
{
if(document.forms["form1"]["lot"].value==0)
{
alert ("Select Lot");
return false;

}
else if(document.forms["form1"]["divi"].value==0)
{
alert ("Select Forest Division");
return false;

}


else if(document.forms["form1"]["fromday"].value==0)
{
alert ("Select date in from date");
return false;

}
else if(document.forms["form1"]["frommon"].value==0)
{
alert ("Select month in from date");
return false;

}
else if(document.forms["form1"]["fromyear"].value==0)
{
alert ("Select year in from date");
return false;

}
else if(document.forms["form1"]["today"].value==0)
{
alert ("Select date in to date");
return false;

}
else if(document.forms["form1"]["tommon"].value==0)
{
alert ("Select month in to date");
return false;

}
else if(document.forms["form1"]["toyear"].value==0)
{
alert ("Select year in to date");
return false;

}
else if(document.forms["form1"]["work"].value==0)
{
alert ("Select The type of work");
return false;

}
else
return true;



}
</script>

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
			
					
				<h1><div style="float:left">Add Progress Report</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="create_prog.php">
					<p>
					
					
					
 <?php 
	// Connects to your Database
	
			$data = mysql_query("SELECT DISTINCT division FROM verify WHERE year='$yrop'") or die("No table"); 
			$datan = mysql_query("SELECT DISTINCT lotno FROM verify WHERE year='$yrop'") or die("No table"); 
		echo 	'<p>Select the lot Description No.<select name="lot">';
	    echo   '<option value="0">Select</option>';
		while($info = mysql_fetch_array( $datan )) 
		{  
			$lot=$info['lotno'];
			echo "<option>" . $lot . "</option>";
		  		
		} 
		
		 echo		 '</select><br><br>Select the Forest Division of Lot<select name="divi"><option value="0">Select</option>';
		 while($info1 = mysql_fetch_array( $data )) 
		{  
			$divi=$info1['division'];
			echo "<option>" . $divi . "</option>";
		  		
		} 
echo'</select> <br><br>From :'; ?><select name="fromday"><option value="0">Day</option><?php $day=range(1,31);
		foreach($day as $d)
		echo '<option value='.$d.'>'.$d.'</option>';
		echo '</select>'; ?>
	
		<select name="frommon" ><option value=0>Month</option><?php $months=array(1=>'Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec');
		foreach($months as $k => $m)
		echo '<option value='.$k.'>'.$m.'</option>';
		echo '</select>'; ?>
		<Select name="fromyear"><option value=0>Year</option><?php $year=range(date("Y")+1,2009,-1); foreach($year as $y) echo '<option value='.$y.'>'.$y.'</option>';
		echo '</select> &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  To :';?><select name="today"><option value=0>Day</option><?php $day=range(1,31);
		foreach($day as $d)
		echo '<option value='.$d.'>'.$d.'</option>';
		echo '</select>'; ?>
	
		<select name="tommon" ><option value=0>Month</option><?php $months=array(1=>'Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec');
		foreach($months as $k => $m)
		echo '<option value='.$k.'>'.$m.'</option>';
		echo '</select>'; ?>
		<Select name="toyear"><option value=0>Year</option><?php $year=range(date("Y")+1,2009,-1); foreach($year as $y) echo '<option value='.$y.'>'.$y.'</option>';
		echo '</select> <br>';
		 echo		 '<br><br>';
		echo "Select the Type of Work: &nbsp &nbsp &nbsp <select name='work'><option value='0'>Select</option><option value='Bark Shaving'>Bark Shaving</option><option value='Crop Setting'>Crop Setting</option><option value='both'>Crop Setting & Bark Shaving</option></select><br><br>";
		
		echo '<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Next"  />
					</p>'; ?>
		

 		

					
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
