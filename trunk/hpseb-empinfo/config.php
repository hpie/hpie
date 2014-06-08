<?php
	global $common;
	//Page messages
	$titleMsg="Welcome: HPSEB-Employee";
	$pageTitle="Welcome:";
	$action="";
	$error="";
	$msg="";
	
	// check logged in status
	/*if(!$_SESSION['logged'])
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
	}*/
	
	//initilize DB
	include "./db/db.php";
	
	print_r($_POST);
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
			Header("Location: index.php");
		}else if($_POST['action']=="Filter")
		{
			$_SESSION['filter']=TRUE;
			//Header("Location: home.php");
			$_SESSION['filter-lot']=$_POST['lot_no']; 
			$_SESSION['filter-season']=$_POST['season_year'];
			$_SESSION['filter-division']=$_SESSION['division'];
			
			if($_SESSION['filter-lot']=="" && $_SESSION['filter-season']=="")
			{
				$_SESSION['filter']=FALSE;
			}
		}
		
		
		
	echo("Action is ".$_POST['action']);	
	}
	
	// check for filters
	//if(!$_SESSION['filter'])
	//{
		//$_SESSION['msg']="You need to Filter to access this page";
		//Header("Location: index.php");
	//}else 
	//{
		//if($_SESSION['msg']!="")
		//{
		//	$msg=$_SESSION['msg'];
		//	$_SESSION['msg']="";
		//}
	//}
	
	require_once "./classes/common.php";
	$common	= new common();
	
	
?>