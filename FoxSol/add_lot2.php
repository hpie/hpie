<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
	}
require('connectDB.php');
if(isset($_POST['lot_no']) && ($_POST['exten'])&& ($_POST['range']) && ($_POST['type_area']) && ($_POST['unit']) && ($_POST['ext_mthd']) && ($_POST['forest'])){
$lotno=$_POST['lot_no'];
$frange=$_POST['range'];
$type=$_POST['type_area'];
$unit=$_POST['unit'];
$ext=$_POST['ext_mthd'];

$rsd=$_POST['rsd'];
$forest=$_POST['forest'];

$divi=$_POST['divi'];
$Exten=$_POST['exten'];

	$rs=mysql_query("select lotno from lot_desc where lotno='$lotno' and division='$divi'");
	if(mysql_num_rows($rs)==1)
	{
	echo '<script type="text/javascript">
			alert ("Lot number' . $lotno . ' in Forest Division ' . $divi . ' already exits");
			window.location = "add_lot1.php"
			</script>';
		/*echo "Lot number $lotno in Forest Division $divi already exits if You want to make changes to the lot go the <a href=\"edit_lot_sel.php\">Edit Lot Description</a>";
		exit;*/
	}
	else
	{
	$sql="INSERT INTO lot_desc (lotno,exten, division,frange, forests, type_area, extract_method, rsd, unit)
	VALUES
	('$lotno','$Exten','$divi','$frange','$forest','$type','$ext','$rsd','$unit')";
	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	}
}
else
{
echo '<script type="text/javascript">
			alert ("please add all the informations.");
			window.location = "add_lot1.php"
			</script>';
/*echo "please add all the informations. ";
exit;*/
}

?>
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
			
				
				<h1><div style="float:left">Create a Lot</div>
				<div style="float:right"><font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
				<br>
				
		<?php

		 echo "Thank You a new lot has been successfuly created";
		
		 
		?>
				
				
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
