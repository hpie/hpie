<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Conversion Filling";
	$arrError		   = array();
	$id				   = 0;
	$i_category_id	   = "";
	$i_forest_id	   = "";
    $i_conversion	   = "";
	$i_felling_charges = "";
    $i_value_type      = "1";

	$table			     = 'c_conversion_felling';
	$arrAllValueType     = array('0'=>"Rs",'1'=>"%age");
	$arrAllForests       = $common->getAllForests();
	$arrAllCategories    = $common->getAllCategories('A');
    $arrValues           =array();
    $arrForestsKey=array_keys($arrAllForests);
	$i_forest_id =$arrForestsKey[0];
	$arrCategoriesKey=array_keys($arrAllCategories);
	$i_category_id =$arrCategoriesKey[0];
	
	
	if( $_GET['fid'] && $_GET['fid'] != ""){
		$id = $_GET['id'];
		$i_forest_id    = $_GET['fid'];
		$arrValues      = $common->getConversionInfo($table,$i_forest_id);
         
		//$row = $common->getInfo($table,$id);
		
		$Label	        = "Edit Conversion Filling";
    	//$i_conversion   = $row[0]['i_conversion'];
		//$i_category_id  = $row[0]['i_category_id'];
		//$i_felling_charges = $row[0]['i_felling_charges'];
	//	$i_value_type   = $row[0]['i_value_type'];
	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);
		$coversion = $_POST['conversion'];
		$filling = $_POST['filling'];
		
		if($_POST['i_forest_id']==''  || $_POST['i_value_type']==''){
			if($_POST['i_forest_id']==''){
			$arrError[] = "Please select forest ";
			}
						
			if($_POST['i_value_type']==''){
			$arrError[] = "Please select Value type ";
			}
           //print_r($arrError);
		  }
		else{ 
		if(!$id){
		if(!$common->checkExistingConversionFilling($_POST['i_forest_id'])){
		   foreach($conversion as $key=>$value){
			$arFieldValues['i_forest_id']=$_POST['i_forest_id'];
			$arFieldValues['i_category_id']=$key;
	    	$arFieldValues['i_conversion']=$value;
			$arFieldValues['i_felling_charges']=$filling[$key];
			$arFieldValues['i_conversion_charges ']=$conversionCharges[$key];
			
			$arFieldValues['i_value_type']=$_POST['i_value_type'];
	    	
			$id = $db->insert($table,$arFieldValues);
		     
			 }
			 
			$_SESSION['empMsg'] = "Category timber Record Added Successfully";
			 ob_end_clean();
			 header("Location: conversion_fillings.php");
			 exit;
		}else{
            $arrError[] = "Option already added";
		}
		}else if(isset($_GET['id'])){
		 foreach($conversion as $key=>$value){
			$arFieldValuesUpdate['i_conversion']=$value;
			$arFieldValuesUpdate['i_felling_charges']=$filling[$key];
			$arFieldValuesUpdate['i_conversion_charges ']=$conversionCharges[$key];
			$arFieldValuesUpdate['i_value_type']=$_POST['i_value_type'];
			$arConditions = array("i_forest_id"=>$_POST['i_forest_id'],"i_category_id"=>$key);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
		 }
		// die();
			$_SESSION['empMsg'] = "Category timber Record Updated Successfully";
			 ob_end_clean();
			header("Location: conversion_fillings.php");
			exit;
		}

		   
		}
			
	}
	


	
	include("html/add_conversion_filling.php");
	include("html/footer.php");
 ?>