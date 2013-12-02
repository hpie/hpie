<?php
	session_start();
	
	//Page messages
	$titleMsg="Welcome: Change your password";
	$pageTitle="Welcome:";
	if(!$_SESSION['logged'])
	{
		$_SESSION['msg']="You need to Login to access this page";
		Header("Location: index.php");
	}else 
	{
		if($_SESSION['msg']!="")
		{
			$msg=$_SESSION['msg'];
		}
	}
	
	//initilize DB
	include "./db/db.php";
	
	if(isset($_POST['submitted']))
	{
		$pass=$_POST['pass'];
		$npass=$_POST['npass'];
		
		$user = $db->get_row("SELECT * FROM m_user WHERE user_id='".$_SESSION['userid']."' AND user_pass='".md5($pass)."' AND division_code='".$_SESSION['division']."'");
		
		if($user)
		{
			if($db->query("UPDATE m_user SET user_pass=('".md5($npass)."') WHERE id='".$user->id."'") ) 
			{
				$error="New Password set for ".$_SESSION['userid'];
			}
				
		}// if user
		else
		{
			$error="Wrong password for current user";
			//$_SESSION['logged'] = FALSE;
		}
		//$db->debug();
		
	}// if submitted

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo($titleMsg);?></title>
<link rel="stylesheet" href="./css/style.css" type="text/css" />	
<script type="text/javascript" src="./js/parsley-standalone.min.js"></script>
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
	<!-- header start -->
	<?php include('includes/header.php'); ?>
    <!-- header end-->
    
<!-- content-wrap starts here -->
	<div id="content-wrap">
	<!-- content starts here -->		    	
        <div id="content">	
        	<div id="msgdiv"> 
        		<p style="color:#CC0000"><?php echo $msg; ?></p>
        	</div>	
		<!-- sidebar starts here -->		       
			<div id="sidebar" >
    			<?php include('includes/sidebar.php');	?>        
            </div>
		<!-- sidebar ends here -->

        
        <!-- post starts here -->				            
            <div class="post">
            
            	<h1>
                	<div style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?>  <?php echo($_SESSION['fname']);?></div>
					<div style="float:right;">
                    	<?php 
							date_default_timezone_set('Asia/Calcutta');
							print date("jS F Y, g:i A");
						?>
                        
                     </div>
                 </h1>
       
                <br />
				<form action="change-password.php" method="post" id="changePassForm" data-validate="parsley">
					<fieldset>
					<legend><font size=5 color=#72A545>Change Password</font></legend><br />
						<p style="color:#CC0000"><?php echo $error; ?></p>
						<div style="margin:10px; 0px; 0px; 0px;">
							<label for="userid">Current Password:</label>
							<input class="textbox" id="pass" type="password" name="pass" data-required="true" data-error-message="Current Password is required"/>
							<label for="pass">New Password:</label>
							<input class="textbox"  id="npass" type="password" name="npass" data-required="true" data-error-message="New Password is required" />
							<label for="pass">Re-type New Password:</label>
							<input class="textbox"  id="rpass" type="password" name="rpass" data-required="true" data-error-message="Re-type New Password"  data-equalto="#npass"  data-equalto-message="Passwords do not match" />
							
							<br /><br />
							<input class="submit" id="changepass" type="submit" name="changepass" value="Change Password" style="width: 150px;"/>
							<input name="submitted" type="hidden" id="submitted" value="1" />
							<br />
							<p><a href="forget.php">Forgot your password?</a></p>
						</div>
					</fieldset>
			  </form>
				
			</div>
		<!-- post ends here -->		        

		</div>
	<!-- content ends here -->		        
    </div>
<!-- content-wrap ends here -->		
    

<!-- footer starts here -->	
	<div id="footer">
		<?php include('includes/footer.php'); ?>
	</div>
<!-- footer ends here -->


</div>
<!-- wrap ends here -->

</body>
</html>    