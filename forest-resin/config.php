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
	include "./db/db.php";
	
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
		
		// report actions
		if($_POST['action']=="Show Report")
		{
			$action="report";
			//$reportLot=$_POST['lot_no'];
			//$reportSeason=$_POST['season_year'];
		}else 
		{
			//$reportLot="";
			//$reportSeason="";
		}
		
		
		//page specific actions
		//proposed-yield-blazes.php
		if($_POST['action']=="Proposed Yield")
		{
			$action="proposedYieldForLot";
		}else if($_POST['action']=="Set Yield")
		{
			$action="setYieldForLot";
		}
		
		//rate-calculation-lot.php
		if($_POST['action']=="Upset Price")
		{
			$action="upsetPriceForLot";
		}else if($_POST['action']=="Save Rate")
		{
			$action="setRateForLot";
		}else if($_POST['action']=="Set Expenditure")
		{
			$action="setExpenditureOnWork";
		}else if($_POST['action']=="Set Cost")
		{
			$action="setCostofMaterial";
		}else if($_POST['action']=="Set Upset Price")
		{
			$action="setRateCalculatedForLot";
		}else if($_POST['action']=="Save Upset Price")
		{
			$action="setExpCostRateCalculatedForLot";
		}
		
		
		//work-progress-lot.php
		if($_POST['action']=="Show Progress")
		{
			$action="workProgressForLot";
		}else if($_POST['action']=="Save Tapping")
		{
			$action="setTappingForLot";
		}else if($_POST['action']=="Save Carriage")
		{
			$action="setCarriageForLot";
		}else if($_POST['action']=="Save Transport")
		{
			$action="setTransportForLot";
		}else if($_POST['action']=="Mark Complete")
		{
			$action="markComplete";
		}else if($_POST['action']=="Re-Open")
		{
			$action="reOpen";
		}
		
		//page specific actions
		//proposed-rate-blazes.php
		if($_POST['action']=="Proposed Rate")
		{
			$action="proposedRateForLot";
		}else if($_POST['action']=="Set Rate")
		{
			$action="setRateForLot";
		}
		
		//tender-form-details.php
		if($_POST['action']=="Negotiate")
		{
			$action="negotiate";
		}
		
		
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
	$common	= new common($_SESSION['division']);
	
	
?>