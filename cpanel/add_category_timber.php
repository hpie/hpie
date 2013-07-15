<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Category Timber";
	$arrError		 = array();
	$id				 = 0;
	$i_category_id		 = "";
	$i_forest_id	 = "";
    $i_timber_id	 = "";
	$i_value           = "";
    $i_value_type      = "1";

	$table			     = 'c_category_timber';
	$arrAllValueType     = array('0'=>"Rs",'1'=>"%age");
	$arrAllForests       = $common->getAllForests();
	$arrAllCategories    = $common->getAllCategories('A');
	$arrAllTimbers       = $common->getTimberNList('A');
    $arrForestsKey=array_keys($arrAllForests);
	$i_forest_id =$arrForestsKey[0];
	$arrCategoriesKey=array_keys($arrAllCategories);
	$i_category_id =$arrCategoriesKey[0];
	
	$arrTimbersKey=array_keys($arrAllTimbers);
	$i_timber_id =$arrTimbersKey[0];
	if(isset($_GET['cid']) && $_GET['cid'] != "" && $_GET['fid'] != ""){
		$i_forest_id= $_GET['fid'];
		$i_category_id= $_GET['cid'];
		$arrValues      = $common->getValueInfo($table,$i_forest_id,$i_category_id);
		
		$row = $common->getInfo($table,$id);
		
		$Label	        = "Edit Category Timber";
    	$i_value_type   = $row[0]['i_value_type'];
	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);		
		$arrValue=$_POST['value'];
		if($_POST['i_forest_id']=='' || $_POST['i_category_id']=='' || $_POST['i_value_type']==''){
			if($_POST['i_forest_id']==''){
			$arrError[] = "Please select forest ";
			}
			
			if($_POST['i_category_id']==''){
			$arrError[] = "Please select category ";
			}
			
			if($_POST['i_value_type']==''){
			$arrError[] = "Please select Value type ";
			}
           //print_r($arrError);
		  }
		else{ 
		if(!$_GET['id']){
			if(!$common->checkExistingCategoryTimber($_POST['i_forest_id'],$_POST['i_category_id'])){
		    foreach($arrValue as $key=>$value){
			$arFieldValues['i_forest_id']=$_POST['i_forest_id'];
			$arFieldValues['i_category_id']=$_POST['i_category_id'];
	    	$arFieldValues['i_timber_id']=$key;
			$arFieldValues['i_value']=$value;
			$arFieldValues['i_value_type']=$_POST['i_value_type'];
			$arFieldValues['id']='0a';
			$id = $db->insert($table,$arFieldValues);
			}
			$_SESSION['userMsg'] = "Category timber Record Added Successfully";
			 ob_end_clean();
			header("Location: category_timbers.php");
			exit;
		 }else{
            $arrError[] = "Option already added";
		 }
		}else if(isset($_GET['id'])){
		 foreach($arrValue as $key=>$value){
			$arFieldPass  = array("i_value_type"=>$_POST['i_value_type']);
			$arFieldPass  = array("i_value"=>$i_value);
			$arConditions = array('i_forest_id'=>$_POST['i_forest_id'],'i_category_id'=>$_POST['i_category_id'],'i_timber_id'=>$key);
			$arFieldPass['i_value']=$value;
			$arFieldPass['i_value_type']=$_POST['i_value_type'];
			$db->update($table,$arFieldPass,$arConditions);
		      }

			$_SESSION['userMsg'] = "Category timber Record Updated Successfully";
			 ob_end_clean();
			header("Location: category_timbers.php");
			exit;
		}

		   
		}
			
		
	}


	
	include("html/add_category_timber.php");
	include("html/footer.php");
 ?>