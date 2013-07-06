<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>



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
			
		<h1><div style="float:left"></div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>	
<?php 			
$num=$_SESSION['numlots'];
$divi=$_POST['divi'];
$kapa=$_SESSION['kapa'];
for($i=0;$i<$num;$i++)
{
$lotno=$_POST['lot'.$i];
$yield=$_POST['yield'.$i];

$q="select lotno from yield_fixed where lotno='".$lotno."' and year='".$kapa."' and division='".$divi."'";
echo $q;
if(mysql_num_rows(mysql_query($q))>0)
{
echo '<script type="text/javascript">
			alert ("Details Already Entered");
			window.location = "index.php"
			</script>';
			

}


else
{

$q="insert into yield_fixed (lotno,division,year,yield_fixed) values ('$lotno','$divi','$kapa','$yield')";

mysql_query($q) or die("error");

}
}

header("Location:show_msg.php?msg='Data Entered Successfully'");




?>




 
						
			
			
				
				
				
				
				
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
