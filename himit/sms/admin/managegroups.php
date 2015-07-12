<?php
define('INCLUDE_CHECK',true);
require '../connect.php';
require '../functions.php';
// Those two files can be included only if INCLUDE_CHECK is defined

session_name('smsLogin');
// Starting the session

//session_set_cookie_params(2*7*24*60*60);
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
    
    <link rel="stylesheet" type="text/css" href="../himit.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../login_panel/css/slide.css" media="screen" />
    
    <script type="text/javascript" src="../../js/jquery-1.7.2.min.js"></script>
    
    <!-- PNG FIX for IE6 -->
    <!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
    <!--[if lte IE 6]>
        <script type="text/javascript" src="../login_panel/js/pngfix/supersleight-min.js"></script>
    <![endif]-->
    
    <script src="../login_panel/js/slide.js" type="text/javascript"></script>
    
    <script src="../../js/common.js" type="text/javascript"></script>
    
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="easyui/demo.css">
    <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
        
    <?php echo $script; ?>
    
    
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
        <h1>Manage Groups</h1>
        <h2>
        	<?php
					
				//if( isset($_SESSION['smsadmin']) )
				//{
					//if($_SESSION['smsadmin'])
					//{
			?>
					<a href="/admin/managegroups.php" title="Create / Update / View Contact Groups">Manage Groups</a> |
					<a href="/admin/managecontactssphp" title="Create / Update / View Contacts">Manage Contacts</a> |
					<a href="/admin/managemessages.php" title="Create / Update / View Messages">Manage Messages</a> |
			  <?php
					//}
				//}
			?>        
        </h2>
        </div>
        
        <div class="container">
          <table id="tblData" title="Contact Groups" class="easyui-datagrid" style="width:760px;height:250px"
			url="get_groups.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
			<thead>
                <tr>
                    <th field="AC_Contact_Group_ID" width="15">Group ID</th>
                    <th field="AC_Contact_Group_Name" width="25">Group Name</th>
                    <th field="AC_Contact_Group_Description" width="60">Group Description</th>
                </tr>
			</thead>
		</table>
	
    <div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newGroup()">
        	New Group
        </a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editGroup()">
        	Edit Group
        </a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyGroup()">
        	Remove Group
        </a>
	</div>
	
	<div id="divCrud" class="easyui-dialog" style="width:500px;height:380px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Group Information</div>
		<form id="frmSave" method="post" novalidate>
			<div class="fitem">
				<label>Group Id:</label>
				<input id="frmGroupId" name="AC_Contact_Group_ID" class="easyui-textbox" required>
			</div>
			<div class="fitem">
				<label>Group Name:</label>
				<input id="frmGroupName" name="AC_Contact_Group_Name" class="easyui-textbox" required>
			</div>
			<div class="fitem">
				<label>Group Description:</label>
				<input id="frmGroupDesc" name="AC_Contact_Group_Description" data-options="multiline:true" class="easyui-textbox" style="width:300px;height:100px">
			</div>
		</form>
	</div>
	
    <div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveGroup()" style="width:90px">
        	Save
        </a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#divCrud').dialog('close')" style="width:90px">
        	Cancel
        </a>
	</div>
    
	<script type="text/javascript">
		var url;
		function newGroup(){
			$('#divCrud').dialog('open').dialog('setTitle','New Group');
			$('#frmSave').form('clear');
			url = 'save_group.php';
		}
		function editGroup(){
			var row = $('#tblData').datagrid('getSelected');
			if (row){
				$('#divCrud').dialog('open').dialog('setTitle','Edit Group');
				$('#frmSave').form('load',row);
				url = 'update_group.php?id='+row.ROW_ID;
			}
		}
		function saveGroup(){
			$('#frmSave').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#divCrud').dialog('close');		// close the dialog
						$('#tblData').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function destroyGroup(){
			var row = $('#tblData').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this Group?',function(r){
					if (r){
						$.post('destroy_group.php',{id:row.id},function(result){
							if (result.success){
								$('#tblData').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
	</script>
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>		
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
