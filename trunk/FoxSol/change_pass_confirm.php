<?php
session_start();
require('connectDB2.php');
if(!$_SESSION['logged']){
	header("Location: index.php");
	exit;
}
else{
	if(isset($_POST['prepass']) && ($_POST['nrpass']) && ($_POST['npass'])){
		$prepass=$_POST['prepass'];
		$nrpass=$_POST['nrpass'];
		$npass=$_POST['npass'];
		if($nrpass==$npass){
			$prepass1=md5($prepass);
			$nrpass1=md5($nrpass);
			$npass1=md5($npass);
			$user=$_SESSION['uname'];
			$fwd=$_SESSION['fwd'];

			//$con=mysql_connect('localhost','root','') or die('unable to connect');

			//	$db=mysql_select_db('foxsol_login',$con);

			$query= "Select * from login_detail where username='$user' and password ='$prepass1' and  fwd='$fwd' limit 1" ;

			$r=mysql_query($query) or die(mysql_error());
			echo $user;
			if(mysql_num_rows($r)==1)
			{
				$user=$_SESSION['uname'];
					
				@mysql_query("UPDATE login_detail SET password='$npass1' WHERE username='$user' and fwd='$fwd' ") or die("No table");
				$error="Your Password Has been SuccessFully changed";
			}
			else
			{
				$error="No Record Has been found";
			}
		}
		else{
			$error="The new password entered twice do not matches, please go back enter the necessary details";
		}
	}
	else{
		$error="Please go back and fill all the details";
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
<div id="wrap"><?php include('includes/header.php'); ?> <!-- content-wrap starts here -->
<div id="content-wrap">
<div id="content">

<div id="sidebar"><?php include('includes/sidebar.php');	?></div>

<div id="main">

<div class="post">

<h1>
<div style="float: left">Change My Password</div>


<div style="float: right"><font size=2><?php 
date_default_timezone_set('Asia/Calcutta');
print date("jS F Y, g:i A");
?></font></div>
</h1>
<br> <?php echo $error; ?>

</div>



<br />

</div>

<!-- content-wrap ends here --></div>
</div>

<!-- footer starts here -->
<div id="footer"><?php include('includes/footer.php'); ?></div>
<!-- footer ends here --> <!-- wrap ends here --></div>

</body>
</html>
