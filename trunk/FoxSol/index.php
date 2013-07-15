<?php
session_start();

if(!empty($_SESSION['logged']))
{
		if($_SESSION['category'] == 'admin'){
			header("Location: admin.php");
			exit;
			}
		elseif($_SESSION['category'] == 'client')
		{
		header("Location: client.php");
			exit;
		}

}

$username="";
$pass="";
$error="";
$fwd="";
if(isset($_POST['submitted']))
{
	require('connectDB2.php');
 	if(empty($_POST['clientid'])|| empty($_POST['pass']) || $_POST['fwd']=='0')
	$error="Enter full login details";
	else
	{
	$username=$_POST['clientid'];
	$pass=$_POST['pass'];
	$fwd=$_POST['fwd'];
	//$con=mysql_connect('localhost','root','') or die('unable to connect');

//	$db=mysql_select_db('foxsol_login',$con);
	$query= "Select * from login_detail where username='$username' and password =md5('$pass')  and fwd= '$fwd' LIMIT 1" ;

			$r=mysql_query($query) or die(mysql_error());
			
			if(mysql_num_rows($r)>0)
			{
			$row = mysql_fetch_array($r);
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['category'] = $row['category'];
				$_SESSION['uname'] = $row['username'];
				$_SESSION['logged'] = TRUE;  
				$_SESSION['fwd']=$fwd;//set login & pass
				if($_SESSION['category']=="admin" ) {
       				 Header("Location: admin.php");  
				}
				else{
					Header("Location: client.php");  
					}
			}
			else
			{
			$error="Incorrect Username or Password";
			//$_SESSION['fwd']==null;
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
		<div style="float:left">Login Page</div>
				
				
 <div style="float:right"><font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
				<br>
				<form action="index.php" method="post" enctype="multipart/form-data" id="form1">
					<fieldset>
					<legend><font size=5 color=#72A545>Sign-In</font></legend><br>
					<p><label for="inputtext1">User ID:</label>
					<input id="inputtext1" type="text" name="clientid" value="" />
					<label for="inputtext2">Password:</label>
					<input id="inputtext2" type="password" name="pass" value="" />
					<label for="fwd">Select FWD:</label>
					<select name='fwd'><option value='0'>Select</option>";
					 <?php 
					 /*$q="select * from fcorporation";
					 $data1=mysql_query($q);
					 while($data=mysql_fetch_array($data1))
					 {
					 	$divid=$data['id'];
					 	$divi=$data['corporation'];
					 echo "<option value='".$divid."'>".$divi."</option>";
					 }
					 echo "</select>";
					*/?>
					<option value="Chamba">Chamba</option>
					<option value="Chopal">Chopal</option>
					<option value="Dharamsala">Dharamsala</option>
					<option value="Fatehpur">Fatehpur</option>
					<option value="Hamirpur">Hamirpur</option>
					<option value="Kullu">Kullu</option>
					<option value="Mandi">Mandi</option>
					<option value="Nahan">Nahan</option>
					<option value="Rampur">Rampur</option>
					<option value="Sawra">Sawra</option>
					<option value="Shimla">Shimla</option>
					<option value="Solan">Solan</option>
					<option value="SunderNagar">SunderNagar</option>
					<option value="Test">Test</option>
					<option value="Una">Una</option>
					</select>
					 
					 
					<br><br><input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Sign In" />
					<input name="submitted" type="hidden" id="submitted" value="1" /></br>
					<p style="color:#CC0000"><?php echo $error; ?></p>
					<p><a href="forget.php">Forgot your password?</a></p></p>
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
