<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Division";
	$arrError		= array();
	$id				= 0;
	$lang_id		= "";
	$vc_name		= "";
	


	$table			= 'm_division';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		
		$Label	= "Edit Division";
    	$vc_name  = $row[0]['vc_name'];
		
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
		if($vc_name==''){
			if($vc_name==''){
			$arrError[] = "Please fill forest division name";
			}
			
		}
		else{
		if(!$common->checkExistingOption($table,$id,$vc_name)){
		if(!$id){
			
			
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Division Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Division Record Updated Successfully";
		}
		if(isset($vc_name) && $vc_name != ""){
			$arConditions = array("id"=>$id);
			$arFieldPass  = array("vc_name"=>$vc_name);
			$db->update($table,$arFieldPass,$arConditions);
		}
		    ob_end_clean();
			header("Location: division.php");
			exit;
		}else{
            $arrError[] = "Option already added";
		}
			
		}
	}


	
	include("html/add_division.php");
	include("html/footer.php");
 ?>