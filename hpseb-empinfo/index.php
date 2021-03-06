<?php
	session_start();
	
	//Page messages
	$titleMsg="Welcome: Employee Module";
	$pageTitle="Login:";
	$action="";
	$error="";
	$msg="";
	
	if(!$_SESSION['logged'])
	{
		$msg=$_SESSION['msg'];
		$_SESSION['msg']="";
	}else 
	{
		if($_SESSION['msg']!="")
		{
			$msg=$_SESSION['msg'];
			$_SESSION['msg']="";
		}else
		{
			$msg="You are already logged in with user [ <b>".$_SESSION['userid']. "</b> ]. You can choose desired action from menu below or continue signing in with a different user." ;
		}
	}
	
	//initilize DB
	include "./db/db.php";
	print_r($_POST);
	if(isset($_POST['submitted']))
	{
		$username=$_POST['userid'];
		$pass=$_POST['pass'];
		
		echo("Incorrect Username".$username." or Password." .$pass);
		$user = $db->get_row("SELECT * FROM m_user WHERE user_id='$username' AND user_pass='".md5($pass)."'");
		
		print_r($user);
		if($user)
		{
			if($user->status_cd == "I")
			{
				$error="Account for ". $user->user_fname. " is inactive";
				$_SESSION['logged'] = FALSE;
			}else
			{
				$_SESSION['userid'] = $user->user_id;
				$_SESSION['fname'] = $user->user_fname;
				$_SESSION['lname'] = $user->user_lname;
				$_SESSION['email'] = $user->user_fname;
				$_SESSION['role'] = $user->role_code;
				
				$_SESSION['logged'] = TRUE;
				$_SESSION['msg'] = "";  
				
				Header("Location: home.php");  
			}
			
		}// if user
		else
		{
			$error="Incorrectdfghjk Username or Password.";
			$_SESSION['logged'] = FALSE;
		}
		//$db->debug();
	}// if submitted

?>

<!-- header start -->
	<?php include('includes/header.php'); ?>
    <!-- header end-->
    
<body>
<!-- wrap starts here -->
<div id="wrap">
	
    
<!-- content-wrap starts here -->
	<div id="content-wrap">
	<!-- content starts here -->		    	
        <div id="content">	
        	<div id="msgdiv"> 
        		<p style="color:#CC0000"><?php echo $msg; ?></p>
        	</div>	
	        
        <!-- post starts here -->				            
            <div class="post">
            
            	<h5>
                	<div style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?></div>
					<div style="float:right;">
                    	<?php 
							date_default_timezone_set('Asia/Calcutta');
							print date("jS F Y, g:i A");
						?>
                        
                     </div>
                 </h5>
       
                <br />
				<form action="index.php" method="post" id="loginForm" data-validate="parsley">
					<fieldset>
					<legend><font size=5 color=#72A545>Sign-In</font></legend><br />
						<p style="color:#CC0000"><?php echo $error; ?></p>
						<div style="margin:10px; 0px; 0px; 0px;">
							<label for="userid">User ID:</label>
							<input class="textbox required" id="userid" type="text" name="userid" data-required="true" data-error-message="User ID is required"/>
							<br />
							<label for="pass">Password:</label>
							<input class="textbox required"  id="pass" type="password" name="pass" data-required="true" data-error-message="Password is required" />
							
							<br /><br />
							<input class="submit" id="signin" type="submit" name="signin" value="Sign In" />
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
		<?php// include('includes/footer.php'); ?>
	</div>
<!-- footer ends here -->


</div>
<!-- wrap ends here -->

</body>
</html>    