<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Tree";
	$arrError		= array();
	$id				= 0;
	$lang_id		= "";
	$vc_name		= "";
	


	$table			= 'm_category';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		//$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		
		$Label	= "Edit Tree";
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
			$arrError[] = "Please fill category name";
			}
			
		}
		else{
		if(!$common->checkExistingOption($table,$id,$vc_name)){
		if(!$id){
			
			
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Tree Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Tree Record Updated Successfully";
		}
		if(isset($vc_name) && $vc_name != ""){
			$arConditions = array("id"=>$id);
			$arFieldPass  = array("vc_name"=>$vc_name);
			$db->update($table,$arFieldPass,$arConditions);
		}
		    ob_end_clean();
			header("Location: categories.php");
			exit;
		}else{
            $arrError[] = "Option already added";
		}
			
		}
	}


	
	include("html/add_category.php");
	include("html/footer.php");
 ?>