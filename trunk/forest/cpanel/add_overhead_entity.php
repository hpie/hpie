<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	$overHeadType = array('1'=>'Up-To RSD','2'=>'Others','3'=>'Up-To RSD-Without Source-Destination','4'=>'From RSD ','5'=>'From RSD (Source Destination) ');
	$arrAllValueType     = array('0'=>"Rs",'1'=>"%age");
	$Label	= "Add Overhead Entity";
	$arrError		 = array();
	$id				 = 0;
	$lang_id		 = "";
	$vc_name		 = "";
    $vc_value        = "";
 

	$table			= 'm_overhead_entities';
	$arrDepartment  = $common->getAllDepartments();
	$arrForests     = $common->getAllForests();
	
    $arrDepartmentKey=array_keys($arrDepartment);
	$i_department_id =$arrDepartmentKey[0];
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		
		$Label	= "Edit Overhead Entity";
    	$vc_name  = $row[0]['vc_name'];
		$vc_value = $row[0]['vc_value'];
		$i_forest_id = $row[0]['i_forest_id'];
		$i_department_id = $row[0]['i_department_id'];
		$i_overhead_type= $row[0]['i_overhead_type'];

	}

	
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);
		
		foreach($_POST as $k=>$v){
			if($k == 'submit' ){

			}else{			
				$arFieldValues[$k] = $v;
			}
		}
	
		if($_POST['i_department_id']=='' || $vc_name=='' || $_POST['i_forest_id'] ==''){
			if($_POST['i_department_id']==''){
			$arrError[] = "Please select forest department";
			}
			if($_POST['i_forest_id']==''){
            $arrError[] = "Please select forest";
			}
         
		
			if($vc_name==''){
			$arrError[] = "Please fill overhead entity name";
			}
			
		  }
		else{
		if(!isset($_GET['id']) ){ 
		if(!$common->checkExistingOverEntityOption($table,$id,$vc_name,$_POST['i_department_id'],$_POST['i_forest_id'])){
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Overhead Entity Record Added Successfully";
		}else{
              $arrError[] = "Option already added";
   		  }
		}
		
		
		
		if(isset($_GET['id']) && $_GET['id']!=''){
			
			foreach($arFieldValues as $k=>$v){
				if($k =='id' || $k=='submit')
				 continue;		
				$arFieldValuesUpdate[$k] = $v;
			    
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Overhead Entity Record Updated Successfully";
		}

          if(empty($arrError)){
		    ob_end_clean();
			header("Location: overhead_entities.php");
			exit;
		  }
		}
	}


	
	include("html/add_overhead_entity.php");
	include("html/footer.php");
 ?>