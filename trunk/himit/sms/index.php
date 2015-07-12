<?php
define('INCLUDE_CHECK',true);
require 'connect.php';
require 'functions.php';
// Those two files can be included only if INCLUDE_CHECK is defined

session_name('smsLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();

if( isset($_SESSION['id']) )
{	
	if($_SESSION['id'] && !isset($_COOKIE['himitSmsRemember']) && !$_SESSION['rememberMe'])
	{
		// If you are logged in, but you don't have the tzRemember cookie (browser restart)
		// and you have not checked the rememberMe checkbox:
	
		$_SESSION = array();
		session_destroy();
		
		// Destroy the session
	}
}


if( isset($_GET['logoff']) )
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: index.php");
	exit;
}


if( isset($_POST['submit']) )
{
	if($_POST['submit']=='Login')
	{
		// Checking whether the Login form has been submitted
		
		$err = array();
		// Will hold our errors
		
		
		if(!$_POST['userid'] || !$_POST['password'])
			$err[] = 'All the fields must be filled in!';
		
		if(!count($err))
		{
			$_POST['userid'] = mysql_real_escape_string($_POST['userid']);
			$_POST['password'] = mysql_real_escape_string($_POST['password']);
			$_POST['rememberMe'] = (int)$_POST['rememberMe'];
			
			// Escaping all input data
			$qry = "SELECT AC_ID, AC_Name, AC_Email_ID, AC_Contact_No, STATUS_CD FROM my_account WHERE AC_ID='{$_POST['userid']}' AND AC_Password='".md5($_POST['password'])."'";
			//echo($qry);
			$row = mysql_fetch_assoc(mysql_query($qry));
	
			if($row['AC_ID'])
			{
				// If everything is OK login
				
				$_SESSION['id'] = $row['AC_ID'];
				$_SESSION['user']=$row['AC_Name'];
				$_SESSION['email'] = $row['AC_Email_ID'];
				$_SESSION['phone'] = $row['AC_Contact_No'];
				$_SESSION['rememberMe'] = $_POST['rememberMe'];
				
				// Store some data in the session
				
				setcookie('himitSmsRemember',$_POST['rememberMe']);
				header("Location: home.php");
				exit;
			}
			else $err[]='Wrong username and/or password!';
		}
		
		if($err)
		$_SESSION['msg']['login-err'] = implode('<br />',$err);
		// Save the error messages in the session
	
		header("Location: index.php");
		exit;
	}
	else if($_POST['submit']=='Register')
	{
		// If the Register form has been submitted
		
		$err = array();
		
		if(strlen($_POST['userid'])<4 || strlen($_POST['userid'])>32)
		{
			$err[]='Your User ID must be between 3 and 32 characters!';
		}
		
		if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['userid']))
		{
			$err[]='Your User ID contains invalid characters!';
		}
		
		if(!checkEmail($_POST['email']))
		{
			$err[]='Your email is not valid!';
		}
		
		if(!count($err))
		{
			// If there are no errors
			
			$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
			// Generate a random password
			
			$_POST['email'] = mysql_real_escape_string($_POST['email']);
			$_POST['phone'] = mysql_real_escape_string($_POST['phone']);
			$_POST['username'] = mysql_real_escape_string($_POST['username']);
			$_POST['userid'] = mysql_real_escape_string($_POST['userid']);
			
			// Escape the input data
			
			
			mysql_query("	INSERT INTO my_account(AC_ID, AC_Name,  AC_Password, AC_Contact_No, AC_Email_ID, AC_LOGIN_IP)
							VALUES(
								'".$_POST['userid']."',
								'".$_POST['username']."',
								'".md5($pass)."',
								'".$_POST['phone']."',
								'".$_POST['email']."',
								'".$_SERVER['REMOTE_ADDR']."'
							)");
			
			if(mysql_affected_rows($link)==1)
			{
				send_mail(	'noreply@himit.in',
							$_POST['email'],
							'Himit Registration System  - Your Account Details',
							'Thenk you for registering with us \n Your password is: '.$pass);
	
				$_SESSION['msg']['reg-success']='We sent you an email with your new password!';
			}
			else $err[]='This User ID is already taken!';
		}
	
		if(count($err))
		{
			$_SESSION['msg']['reg-err'] = implode('<br />',$err);
		}	
		
		header("Location: index.php");
		exit;
	}
}
$script = '';

if( isset($_SESSION['msg']) )
{
	if($_SESSION['msg'])
	{
		// The script below shows the sliding panel on page load
		
		$script = '
		<script type="text/javascript">
		
			$(function(){
			
				$("div#panel").show();
				$("#toggle a").toggle();
			});
		
		</script>';
		
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HIM IT SMS System</title>
    
    <link rel="stylesheet" type="text/css" href="himit.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="login_panel/css/slide.css" media="screen" />
    
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
	<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
    
    <!-- PNG FIX for IE6 -->
    <!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
    <!--[if lte IE 6]>
        <script type="text/javascript" src="login_panel/js/pngfix/supersleight-min.js"></script>
    <![endif]-->
    
    <script src="login_panel/js/slide.js" type="text/javascript"></script>
    
    <?php echo $script; ?>
</head>

<body>

<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>HIM IT SMS System</h1>
				<h2>Register/login to continue</h2>		
				<p class="grey">You should login to use this site. Register yourself or contact <a mailto="support@himit.in">HIM IT Support Team</a> to get registered</p>
			</div>
            
            
            <?php
				if(isset($_SESSION['id']) )
				{
					 if($_SESSION['id'])
					 {
			?>
                        <div class="left">
                        
                        <h1>Members panel</h1>
                        
                        <p>Welcome...</p>
                        <a href="registered.php">View a special member page</a>
                        <p>- or -</p>
                        <a href="?logoff">Log off</a>
                        
                        </div>
                        
                        <div class="left right">
                        </div>
            <?php			
					}
				}else
				{			
			?>
                    <div class="left">
                        <!-- Login Form -->
                        <form class="clearfix" action="" method="post">
                            <h1>Member Login</h1>
                            
                            <?php
                                if( isset($_SESSION['msg']) )
                                {
                                    if($_SESSION['msg']['login-err'])
                                    {
                                        echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
                                        unset($_SESSION['msg']['login-err']);
                                    }
                                }
                            ?>
                            
                            <label class="grey" for="userid">UserID:</label>
                            <input class="field" type="text" name="userid" id="userid" value="" size="23" />
                            <label class="grey" for="password">Password:</label>
                            <input class="field" type="password" name="password" id="password" size="23" />
                            <label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
                            <div class="clear"></div>
                            <input type="submit" name="submit" value="Login" class="bt_login" />
                        </form>
                    </div>
                    <div class="left right">			
                        <!-- Register Form -->
                        <form action="" method="post">
                            <h1>Not a member yet? Sign Up!</h1>		
                            
                            <?php
                                if( isset($_SESSION['msg']) )
                                {
									if( isset($_SESSION['msg']['reg-err']) )
                                	{
										if($_SESSION['msg']['reg-err'])
										{
											echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
											unset($_SESSION['msg']['reg-err']);
										}
									}
                                    
									if( isset($_SESSION['msg']['reg-success']) )
                                	{
										if($_SESSION['msg']['reg-success'])
										{
											echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
											unset($_SESSION['msg']['reg-success']);
										}
									}
                                }
                            ?>
                                    
                            <label class="grey" for="userid">UserID:</label>
                            <input class="field" type="text" name="userid" id="userid" value="" size="23" />
                            <label class="grey" for="username">Name:</label>
                            <input class="field" type="text" name="username" id="username" size="23" />
                            <label class="grey" for="email">Email:</label>
                            <input class="field" type="text" name="email" id="email" size="23" />
                            <label class="grey" for="email">Phone:</label>
                            <input class="field" type="text" name="phone" id="phone" size="23" />
                            <label>A password will be e-mailed to you.</label>
                            <input type="submit" name="submit" value="Register" class="bt_register" />
                        </form>
                    </div>                        
            <?php
				}
			?>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Hello <?php
						if( isset($_SESSION['user']) )
						{	
			 				echo $_SESSION['user'];
						}else
						{
							echo 'Guest';	
						}
			 		?>!
            </li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">
					<?php
						if( isset($_SESSION['id']) )
						{
						 	echo 'Open Panel';
                        }else
                        {
                        	echo 'Log In | Register';
                        }
					?>	
                </a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->

<div class="pageContent">
    <div id="main">
      <div class="container">
        <h1>HIM IT SMS System</h1>
        <h2>Easy to Broadcast and Promote Yourself</h2>
        </div>
        
        <div class="container">
          <p>You can start by clicking the <strong>Log In | Register</strong> button above.  After registration, an email will be sent to you with your new password.</p>
          <p><a href="registered.php" target="_blank">View a test page</a>, only accessible by <strong>registered users</strong>.</p>
          <div class="clear"></div>
        </div>
        
      <div class="container tutorial-info">
      	<span class="copy"> &copy; Copyright 2015 <a href="#">HIM IT</a>. All Rights Reserved</span> <span class="copy">Powered By <a target="_blank" href="http://hishimla.com">HIM IT</a></span>    
      </div>
    </div>
</div>

</body>
</html>
