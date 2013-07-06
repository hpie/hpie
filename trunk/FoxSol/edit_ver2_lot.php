<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');
if(isset($_POST['year'])){
$yrop=$_POST['year'];
$_SESSION['yrope']=$yrop;
$chek ="SELECT DISTINCT year FROM verify WHERE year='$yrop'"; 
$r=mysql_query($chek) or die(mysql_error());
			
			if(mysql_num_rows($r)==0)
			{
			echo '<script type="text/javascript">
			alert ("There is no Lot in the Verified List with the selected year");
			window.location = "edit_ver_lot.php"
			</script>';
			
			}
}
else{
header("Location:show_msg.php?msg='Please go to the Edit Verified Lot again and select the year first'");
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
alert ("Select Lot");
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
			
					
				<h1><div style="float:left">Delete the Verified Lot</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="edit_ver3_lot.php">
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
echo'</select><br><br>';
echo '<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 70px;" name="inputsubmit1" value="Delete Lot"  />
					</p>';					?>
		

 		

					
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
