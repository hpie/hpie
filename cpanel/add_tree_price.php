<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Price Entity";
	$arrError		 = array();
	$id				 = 0;
	$lang_id		 = "";
	$i_forest_id	 = "";
    $i_tree_id	 = "";
	$arrprice        = array();
 

	$table			= 'm_price';
	$arrAllForests     = $common->getAllForests();
	$arrAllTrees       = $common->getAllTrees();
    $arrForestsKey=array_keys($arrAllForests);
	$i_forest_id =$arrForestsKey[0];
	$arrTreesKey=array_keys($arrAllTrees);
	$i_tree_id =$arrTreesKey[0];
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		$Label	  = "Edit Price Entity";
    	$i_forest_id  = $row[0]['i_forest_id'];
		$arrprice     =$common->getTreePrice($table,$i_forest_id);		
	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);		
		$arrprice=$_POST['price'];
		
		if($_POST['i_forest_id']==''  ){
			if($_POST['i_forest_id']==''){
			$arrError[] = "Please select forest ";
			}
			
			
		  }
		else{
		//if(!$common->checkExistingPriceOption($table,$id,$_POST['i_forest_id'])){
		if(!$id){
			
			foreach ($arrprice as $treeId=>$valueDetail)
			{
				$arFieldPass["i_forest_id"]  =$_POST['i_forest_id'];
				$arFieldPass["i_tree_id"]  = $treeId;
				$arFieldPass["i_status"]  = 1;
				$arFieldPass["price"]  = $valueDetail;
				$id = $db->insert($table,$arFieldPass);
			}
			$_SESSION['empMsg'] = "Tree Price Entity Record Added Successfully";
		}else{
			foreach ($arrprice as $treeId=>$valueDetail)
			{   $arFieldPass  =array();
				$arFieldPass["price"]  = $valueDetail;
				$arConditions = array("i_forest_id"=>$_POST['i_forest_id'],"i_tree_id"=>$treeId);
				$db->update($table,$arFieldPass,$arConditions);
			}
			
			$_SESSION['empMsg'] = "Tree Price Entity Record Updated Successfully";
		}
		
		   ob_end_clean();
		   header("Location: trees_price.php");
			exit;
	/*	}else{
            $arrError[] = "Option already added";
		}
	*/		
		}
	}


	
	include("html/add_tree_price.php");
	include("html/footer.php");
 ?>