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
if( isset($_SESSION['user']) )
{	
	if($_SESSION['user'])
	{
		
	}else
	{
		header("Location: index.php");
		exit;
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
    
    <script src="../js/common.js" type="text/javascript"></script>
        
    <?php echo $script; ?>
    
    <script>
    	function updateCountdown() 
		{
    		// 140 is the max message length
    		var maxsms=2;
			var cursms=0;
			//var remaining = 160 - jQuery('.message').val().length;
			var remaining = jQuery('.message').val().length;
			cursms = parseInt((remaining / 160)+1);
    		jQuery('.countdown').text(remaining + ' characters  / '+cursms+ ' of '+maxsms);
		}
		
		function clearFromData()
		{
			$("#frmMessageId").val("-1");
			//$("#frmMessage").val("");
			$("#frmGroup").val("-1");
			$("#frmContact").val("-1");
			updateCountdown();
		}
		
		//$('#sendtoGroup').attr("checked", "checked");
		function validateFromAndSendSms()
		{
			if($("#frmMessageId").val()=="-1")
			{
				alert("Please Select a Message to send");
				return false;
			}
			
			if($("input[@name='sendto']:checked").val()=="contact")
			{
				if( $("#frmContact").val()=="-1")
				{
					alert("Please pick a Contact to send the message");
					return false;	
				}
				
			} else if($("input[@name='sendto']:checked").val()=="group")
			{
				if( $("#frmGroup").val()=="-1")
				{
					alert("Please pick a Group to send the message");
					return false;	
				} 
			}else
			{
				alert("Please Choose a Contact or a Group");
				return false;
			}
			
			/*
			// don't know why the heck it didn't worked
			if($("#sendtoContact").is(':checked')) 
			{ 
				if( $("#frmContact").val()=="-1")
				{
					alert("Please pick a Contact to send the message");
					return false;	
				}
			}else if($('#sendtoGroup').attr("checked", "checked"))
			{ 
				if( $("#frmGroup").val()=="-1")
				{
					alert("Please pick a Group to send the message");
					return false;	
				} 
			}else
			{
				alert("Please Choose a Contact or a Group");
				return false;
			}
			*/	
					
			// ajax call to send SMS set $_SESSION['msg'] and reload page 
			
			return true;
		}
		
		jQuery(document).ready(function($) 
		{
    		updateCountdown();
    		$('.message').change(updateCountdown);
    		$('.message').keyup(updateCountdown);
			
			$("#btnClear").click(clearFromData);
			$("#btnSend").click(validateFromAndSendSms);
		});

    </script>
    
</head>

<body>

<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>HIM IT SMS System</h1>
				<h2>Pick YOur Menu</h2>		
				<p class="grey">
                	<a href="himit.com/index.php">HIMIT</a> | 
                    <a href="sms.himit.com/home.php">SMS Home</a> | 
                    <a href="/admin/index.php">Administration</a> |
                    <?php
					
						if( isset($_SESSION['smsadmin']) )
						{
							if($_SESSION['smsadmin'])
							{
					?>
                            <a href="/admin/index.php" title="Create / Update / View Contact Groups">Groups</a> |
                            <a href="/admin/index.php" title="Create / Update / View Contacts">Contacts</a> |
                            <a href="/admin/index.php" title="Create / Update / View Messages">Messages</a> |
                      <?php
							}
						}
					?>                  
                    <a href="/reports/index.php">Reports</a> |
                    <?php
					
						if( isset($_SESSION['smsreports']) )
						{
							if($_SESSION['smsreports'])
							{
					?>
                            <a href="/admin/index.php" title="Create / Update / View Contact Groups">Groups</a> |
                            <a href="/admin/index.php" title="Create / Update / View Contacts">Contacts</a> |
                            <a href="/admin/index.php" title="Create / Update / View Messages">Messages</a> |
                      <?php
							}
						}
					?>      
                </p>
			</div>
            
            
            <?php
				if(isset($_SESSION['id']) )
				{
					 if($_SESSION['id'])
					 {
			?>
                        <div class="left">
                        
                        <h1>Members panel</h1>
                        
                        <p>Welcome... <strong><?php echo $_SESSION['user']; ?></strong></p>
                        <a href="#">
                        	You have <strong> 1000 sms </strong> in your account <br />
                            Your pack will expire on <strong> 31/12/2015
                        </a>
                        <p>- - - - - - - - - - - - - - - - - - - - - - - - - -</p>
                        <a href="?logoff">Log off</a>
                        
                        </div>
                        
                        <div class="left right">
                        </div>
            <?php			
					}
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
        <h1>Send SMS</h1>
        <h2>Select a Message and then a Group or a Contract to send SMS to</h2>
        </div>
        
        <div class="container">
          <form>
          <table id="tblSendMessage" class="frmTbl">
          	<tr>
            	<td>Select Message</td>
                <td>
                	<select id="frmMessageId" name="messageId" class="frmSelect" onchange="getSelectedMessage(this)" onblur="updateCountdown()">
                    	<option value='-1'>--Select--</option>
						<?php
							$qry = "SELECT AC_ID, AC_Message_ID, AC_Message_Description FROM my_account_messages WHERE
							 STATUS_CD='A' AND AC_ID='{$_SESSION['id']}'";
							//echo($qry);
							$result = mysql_query($qry);

							if($result)
							{
							   	while($row = mysql_fetch_assoc($result))
								{
									echo("<option value='".$row['AC_Message_ID']."'>".$row['AC_Message_Description']."</option>");
								}
							}
									
						?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>SMS Content</td>
                <td>
                	<textarea id="frmMessage" name="message" class="message" rows="10" cols="50" maxlength="320" readonly="readonly"></textarea> 	
                    <br />
                    <span class="countdown"></span>
                </td>
            </tr>
            
            <tr>
            	<td>Send to</td>
                <td>
                	Contact <input type="radio" id="sendtoContact" name="sendto" class="frmRadio" value="contact" onchange="fetchAndShowGroupContact(this)" /> &nbsp;  
                    Group <input type="radio" id"sendtoGroup" name="sendto" class="frmRadio" value="group" onchange="fetchAndShowGroupContact(this)" />
                </td>
            </tr>
            <tr id="contactRow" style="display:none">
            	<td>Contact</td>
                <td>
                	<select id="frmContact" name="contact" class="frmSelect">
                    </select>
                </td>
            </tr>
            <tr id="groupRow" style="display:none">
            	<td>Group</td>
                <td>
                	<select id="frmGroup" name="group" class="frmSelect">
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td></td>
                <td align="right">
                	<!--<input type="button" id="btnClear" name="clearBtn" class="frmBtn" value="Clear"> &nbsp;-->
                    <input type="button" id="btnSend" name="sendBtn" class="frmBtn" value="Send SMS">
                </td>
            </tr>            
		   </table>
           </form>		
          <div class="clear"></div>
        </div>
        
        <div class="container">
          <p>
          		Use the panel above for more options. Start by clicking the <strong>Open Panel</strong> button above.
          </p>
          <p>
          	<a href="home.php">This page</a> is for <strong>registered users</strong> only. Please use it with caution. <br />
          </p>
          <p>  
            Ensure that you have chosen the right message and the right Receipient or the Group. SMS once triggered cannot be cancelled or stopped.
          </p>
          <div class="clear"></div>
        </div>
        
      <div class="container tutorial-info">
      	<span class="copy"> &copy; Copyright 2015 <a href="#">HIM IT</a>. All Rights Reserved</span> <span class="copy">Powered By <a target="_blank" href="http://hishimla.com">HIM IT</a></span>    
      </div>
    </div>
</div>

</body>
</html>
