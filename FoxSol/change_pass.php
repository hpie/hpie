<?php
session_start();
require('connectDB.php');
if(!$_SESSION['logged']){
	header("Location: index.php");
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
			
			<h1>	
		<div style="float:left">		Change My Password</div>
				
				
 <div style="float:right"><font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
				<br>
				<form action="change_pass_confirm.php" method="post" enctype="multipart/form-data" id="form1">
					<fieldset>
					<legend><font size=5 color=#72A545>Fill in Details</font></legend><br>
					<p><label for="inputtext1">Enter Your Current Password:</label>
					<input id="inputtext1" type="password" name="prepass" value="" />
					<label for="inputtext2">Enter Your New Password:</label>
					<input id="inputtext2" type="password" name="npass" value="" />
					<label for="inputtext3">Re-Enter Your New Password:</label>
					<input id="inputtext3" type="password" name="nrpass" value="" />
					<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Submit" />
					</br>
					</p>
					</fieldset>
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