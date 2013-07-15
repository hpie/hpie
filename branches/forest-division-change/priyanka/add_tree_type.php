<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Tree Type";
	$arrError		= array();
	$id				= 0;
	$vc_name		= "";
	$i_department_id ="";


	$table			= 'm_treetype';
	$arrDepartment  = $common->getAllDepartments();
   
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = (int)$_GET['id'];
		$row = $common->getInfo($table,$id);
		
		$Label	= "Edit Tree Type";
    	$vc_name  = $row[0]['vc_name'];
		$i_department_id = $row[0]['i_department_id'];

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

		if($_POST['i_department_id']=='' || $vc_name==''){
			if($_POST['i_department_id']==''){
			$arrError[] = "Please select forest department";
			}
         
		
			if($vc_name==''){
			$arrError[] = "Please fill tree type name";
			}
			
		}
		else{
		if(!isset($_GET['id']) ){
		if(!$common->checkExistingTreeTypeOption($table,$id,$vc_name,$_POST['i_department_id'])){
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Overhead Entity Record Added Successfully";
		}else{
              $arrError[] = "Option already added";
   		  }
		}
		
		
		
		if(isset($_GET['id']) && $_GET['id']!=''){
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Overhead Entity Record Updated Successfully";
		}
           if(empty($arrError)){
		    ob_end_clean();
			header("Location: tree_types.php");
			exit;
		 }
	  }
	}


	
	include("html/add_tree_type.php");
	include("html/footer.php");
 ?>