<?	ob_start();
	session_start();
	include("../include_files.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Timber";
	$arrError		= array();
	$id				= 0;
	$vc_name		= "";
	$i_department_id ="";


	$table			= 'm_timber';
	//$arrDepartment  = $common->getAllDepartments();
   
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		
		$Label	= "Edit Forest";
    	$vc_name  = $row[0]['vc_name'];
		//$i_department_id = $row[0]['i_department_id'];

	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);		
		
		foreach($_POST as $k=>$v){
			if($k == 'submit' )
				continue;
			//if($v)){
				$arFieldValues[$k] = $v;
			//}
		}

		if( $vc_name==''){
					
			if($vc_name==''){
			$arrError[] = "Please fill forest name";
			}
			
		}
		else{
		if(!$common->checkExistingOption($table,$id,$vc_name)){
		if(!$id){
			
			
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Timber Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Timber Record Updated Successfully";
		}
		if(isset($vc_name) && $vc_name != "" && $_POST['i_department_id'] != ""){
			$arConditions = array("id"=>$id);
			$arFieldPass  = array("vc_name"=>$vc_name);
			$db->update($table,$arFieldPass,$arConditions);
		}
		    ob_end_clean();
			header("Location: timbers.php");
			exit;
		}else{
            $arrError[] = "Option already added";
		}
			
		}
	}


	
	include("html/add_timber.php");
	include("html/footer.php");
 ?>