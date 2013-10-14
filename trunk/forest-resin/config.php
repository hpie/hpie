<?php
	global $common;
	//Page messages
	$titleMsg="Welcome: Forest Resin Module";
	$pageTitle="Welcome:";
	$action="";
	$error="";
	$msg="";
	
	// check logged in status
	if(!$_SESSION['logged'])
	{
		$_SESSION['msg']="You need to Login to access this page";
		Header("Location: index.php");
	}else 
	{
		if($_SESSION['msg']!="")
		{
			$msg=$_SESSION['msg'];
			$_SESSION['msg']="";
		}
	}

	//initilize DB
	include "/db/db.php";
	
	// role based access
	if(isset($_POST['submitted']))
	{
		if($_POST['action']=="New")
		{
			$action="create";
		}else if($_POST['action']=="Edit")
		{
			$action="edit";
		}else if($_POST['action']=="Update")
		{
			$action="update";
		}else if($_POST['action']=="Save")
		{
			$action="save";
		}else if($_POST['action']=="Status")
		{
			$action="status";
		}else if($_POST['action']=="Delete")
		{
			$action="delete";
		}else if($_POST['action']=="Cancel")
		{
			$action="cancel";
			Header("Location: home.php");
		}
	}
	
	require_once "./classes/common.php";
	$common	= new common();
	
	
?>