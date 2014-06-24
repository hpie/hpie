<?php 
 if(isset($_GET['get']))
 { 
 	//initilize DB
	include "./db/db.php";
	require_once "./classes/common.php";
	$common	= new common();
	
	 if($_GET['get']=='subGroupCode')
	 {
	 	$groupCode=$_GET['groupCode'];
	  	$subGroupCodes = $db->get_results("SELECT sgp.EGS_CODE, sgp.EGS_NAME FROM m_employee_group_subgroup gp, m_employee_group_subtype sgp WHERE sgp.EGS_CODE=gp.EGS_CODE AND gp.EG_CODE='".$groupCode."'",ARRAY_A);
	  	$selectList.='<option value="">Select</option>';
	    foreach ( $subGroupCodes as $subGroupCode )
        {
 	       $selectList.='<option value="'.$subGroupCode['EGS_CODE'].'">'.$subGroupCode['EGS_NAME'].'</option>';
        }
 		
	   echo $selectList;
	   $db->debug();
	  
	 }
	 
  if($_GET['get']=='certificateCode')
	 {
	 	$eductionCode=$_GET['educationCode'];
	  	$certificateCodes = $db->get_results("SELECT ce.CERTIFICATE_CODE, ce.CERTIFICATE_DESC FROM m_employee_education_certificate ce, m_employee_education_code_certificate ced WHERE ce.CERTIFICATE_CODE=ced.CERTIFICATE_CODE AND ced.QUALIFICATION_LEVEL='".$eductionCode."'",ARRAY_A);
	  	$selectList.='<option value="">Select</option>';
	    foreach ( $certificateCodes as $certificateCode )
        {
 	       $selectList.='<option value="'.$certificateCode['CERTIFICATE_CODE'].'">'.$certificateCode['CERTIFICATE_DESC'].'</option>';
        }
 		
	   echo $selectList;
	   $db->debug();
	  
	 }
	 
 if($_GET['get']=='branchCode')
	 {
	 	$eductionCode=$_GET['educationCode'];
	  	$branchCodes = $db->get_results("SELECT eb.BRANCH_CODE, eb.BRANCH_DESCRIPTION FROM m_employee_education_branch eb, m_employee_education_code_branch ebd WHERE eb.BRANCH_CODE=ebd.BRANCH_CODE AND ebd.QUALIFICATION_LEVEL='".$eductionCode."'",ARRAY_A);
	  	$selectList.='<option value="">Select</option>';
	    foreach ( $branchCodes as $branchCode )
        {
 	       $selectList.='<option value="'.$branchCode['BRANCH_CODE'].'">'.$branchCode['BRANCH_DESCRIPTION'].'</option>';
        }
 		
	   echo $selectList;
	   $db->debug();
	  
	 }
	 
  if($_GET['get']=='reasonCode')
	 {
	 	$actionCode=$_GET['actionCode'];
	  	$reasonCodes = $db->get_results("SELECT ea.EAR_CODE, ea.EAR_NAME FROM m_employee_action_reason ea, m_employee_actions_reasons ear WHERE ear.EAR_CODE=ea.EAR_CODE AND ea.EA_CODE='".$reasonCodes."'",ARRAY_A);
	  	$selectList.='<option value="">Select</option>';
	    foreach ( $reasonCodes as $reasonCode )
        {
 	       $selectList.='<option value="'.$reasonCode['EAR_CODE'].'">'.$reasonCode['EAR_NAME'].'</option>';
        }
 		
	   echo $selectList;
	   $db->debug();
	  
	 }
	 
  if($_GET['get']=='reasonCode')
	 {
	 	$actionCode=$_GET['actionCode'];
	  	$reasonCodes = $db->get_results("SELECT ea.EAR_CODE, ea.EAR_NAME FROM m_employee_action_reason ea, m_employee_actions_reasons ear WHERE ear.EAR_CODE=ea.EAR_CODE AND ea.EA_CODE='".$reasonCodes."'",ARRAY_A);
	  	$selectList.='<option value="">Select</option>';
	    foreach ( $reasonCodes as $reasonCode )
        {
 	       $selectList.='<option value="'.$reasonCode['EAR_CODE'].'">'.$reasonCode['EAR_NAME'].'</option>';
        }
 		
	   echo $selectList;
	   $db->debug();
	  
	 }
	 
 if($_GET['get']=='subGroupCode')
	 {
	 	$groupCode=$_GET['groupCode'];
	  	$subGroupCodes = $db->get_results("SELECT ea.EAR_CODE, ea.EAR_NAME FROM m_employee_action_reason ea, m_employee_actions_reasons ear WHERE ear.EAR_CODE=ea.EAR_CODE AND ea.EA_CODE='".$groupCode."'",ARRAY_A);
	  	$selectList.='<option value="">Select</option>';
	    foreach ( $subGroupCodes as $subGroupCode )
        {
 	       $selectList.='<option value="'.$reasonCode['EAR_CODE'].'">'.$reasonCode['EAR_NAME'].'</option>';
        }
 		
	   echo $selectList;
	   $db->debug();
	  
	 }
 }
	 
  