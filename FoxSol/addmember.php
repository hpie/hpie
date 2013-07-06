<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;
}
require('connectDB2.php');
//$con=mysql_connect('localhost','root','') or die('unable to connect');

//	$db=mysql_select_db('foxsol_login',$con);


if(isset($_POST['name']) && ($_POST['pass']) && ($_POST['cat']) && ($_POST['uname'])){

$fwd=$_SESSION['fwd'];
$name=$_POST['name'];
$pass=md5($_POST['pass']);
$cat=$_POST['cat'];
$uname=$_POST['uname'];

$query = "SELECT * FROM login_detail WHERE username = '$uname'";
$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());
if(mysql_num_rows($result) == 1){
echo "A member with this username has already been registered, please use the different username";
exit;
}
else
{
$sql="INSERT INTO login_detail (name, username, password, category,fwd)
VALUES
('".$name."','".$uname."','".$pass."','".$cat."','".$fwd."')";
mysql_query($sql,$con);

}

}
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
			
				<a name="TemplateInfo"></a>	
				<h1><div style="float:left">Add a member Confirmation</div>
				<div style="float:right"><font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
				<br>
			<p>Thank You a member has been successfully added to the Solution</p>
				
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
