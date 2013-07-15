<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Timber Type";
	$arrError		= array();
	$id				= 0;
	$vc_name		= "";
	$volume         = 0;
	$i_timber_id    = "";
    $standard       = 1 ;
    $arrStandard    =array('0'=>'0','1'=>'1');
	$table			= 'm_timber_type';
	$arrTimber      = $common->getTimberNList();
   
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		$Label	= "Edit Forest";
    	$vc_name  = $row[0]['vc_name'];
		$i_timber_id = $row[0]['i_timber_id'];
		$volume	  = $row[0]['volume'];
		$standard	  = $row[0]['standard'];

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

		if($_POST['i_timber_id']=='' || $vc_name=='' || $_POST['standard']==''){
			if($_POST['i_timber_id']==''){
			$arrError[] = "Please select Timber";
			}
         	if($vc_name==''){
			$arrError[] = "Please fill forest name";
			}
			if($_POST['standard']){
            $arrError[] = "Please select standard ";
			}			
		}
		else{
		
		if(!$id){
			
			
			$id = $db->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Timber Type Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$db->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Timber Type Record Updated Successfully";
		}
		if(isset($vc_name) && $vc_name != "" && $_POST['i_timber_id'] != "" && $_POST['standard'] != ""){
			$arConditions = array("id"=>$id);
			$arFieldPass  = array("vc_name"=>$vc_name);
			$arFieldPass  = array("standard"=>$_POST['standard']);
			$db->update($table,$arFieldPass,$arConditions);
		}
		    ob_end_clean();
			header("Location: timbers_type.php");
			exit;
		}
			
		}
	


	
	include("html/add_timber_type.php");
	include("html/footer.php");
 ?>