<?php
session_start();
require('connectDB.php');

$username="";
$pass="";
$error="";
if(isset($_POST['submitted']))
{
 	if(empty($_POST['clientid'])|| empty($_POST['name']))
	$error="Enter full login details";
	else
	{
	$username=$_POST['clientid'];
	$pass=$_POST['name'];
	$query= "Select * from login_detail where username='$username' and name ='$pass'" ;

			$r=mysql_query($query) or die(mysql_error());
			
			if(mysql_num_rows($r)==1)
			{
			$digits = 4;
            $npass1=rand(pow(10, $digits-1), pow(10, $digits)-1);
			$npass=md5($npass1);
			@mysql_query("UPDATE login_detail SET password='$npass' WHERE username='$username'") or die("No table"); 
				
				$error="Your Password is " . $npass1;
			}
			else
			{
			$error="There is no record with this username and name";
			
			}
			
	}
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
		<div style="float:left">Recover My Password</div>
				
				
 <div style="float:right"><font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
				<br>
				<form action="forget.php" method="post" enctype="multipart/form-data" id="form1">
					<fieldset>
					<legend><font size=5 color=#72A545>Forget Your Password !!!</font></legend><br>
					<p><label for="inputtext1">Client ID:</label>
					<input id="inputtext1" type="text" name="clientid" value="" />
					<label for="inputtext2">Name:</label>
					<input id="inputtext2" type="text" name="name" value="" />
					<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Submit" />
					<input name="submitted" type="hidden" id="submitted" value="1" /></br>
					<p style="color:#CC0000"><?php echo $error; ?></p>
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
