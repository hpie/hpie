<?	ob_start();
	session_start();
	include("../include_files.php");
	include("check_session.php");
	include("html/header.php");
	
	$arrAllForests     = $common->getAllForests();
	$Label	= "Add Volume Table";
	$arrError		= array();
	$id				= 0;
	$vc_name		= "";
	$i_department_id ="";


	$table			= 'm_forest_volume';
	//$arrDepartment  = $common->getAllDepartments();
   
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		
		$Label	= "Edit Volume Table";
    	$vc_name  = $row[0]['vc_name'];
		$i_forest_id    = $row[0]['i_forest_id'];
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

		if( $_POST['i_forest_id']=='' || $vc_name==''){
			if($_POST['i_forest_id']==''){
			$arrError[] = "Please select forest ";
			}	 	
			if($vc_name==''){
			$arrError[] = "Please fill table name";
			}
			
		}
		else{
		if(!$common->checkExistingTableOption($table,$id,$_POST['i_forest_id'],$vc_name)){
		if(!$id){
			
			
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Table Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Table Record Updated Successfully";
		}
		if(isset($vc_name) && $vc_name != ""  && $_POST['i_forest_id'] != "" ){
			$arConditions = array("id"=>$id);
			$arFieldPass  = array("vc_name"=>$vc_name);
			$arFieldPass  = array("i_forest_id"=>$_POST['i_forest_id']);
			$db->update($table,$arFieldPass,$arConditions);
		}
		    ob_end_clean();
			header("Location: volume_tables.php");
			exit;
		}else{
            $arrError[] = "Option already added";
		}
			
		}
	}


	
	include("html/add_volume_table.php");
	include("html/footer.php");
 ?>