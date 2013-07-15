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
 

	$table			= 'm_timber_price';
	$arrAllForests     = $common->getAllForests();
	$arrAllTimbers       = $common->getAllTimbers();
    $arrForestsKey=array_keys($arrAllForests);
	$i_forest_id =$arrForestsKey[0];
	$arrAllTimbersKey=array_keys($arrAllTimbers);
	$i_timber_id =$arrAllTimbersKey[0];
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $common->getInfo($table,$id);
		$Label	  = "Edit Price Entity";
    	$i_forest_id  = $row[0]['i_forest_id'];
		$arrprice     =$common->getTimberPrice($table,$i_forest_id);
	
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
//		if(!$common->checkExistingPriceOption($table,$id,$_POST['i_forest_id'])){
		if(!$id){
			
			foreach ($arrprice as $timberId=>$valueDetail)
			{
				$arFieldPass["i_forest_id"]  =$_POST['i_forest_id'];
				$arFieldPass["i_timber_id"]  = $timberId;
				$arFieldPass["i_status"]  = 1;
				$arFieldPass["price"]  = $valueDetail;
				$id = $db->insert($table,$arFieldPass);
			}
			$_SESSION['empMsg'] = "Timber Price Entity Record Added Successfully";
		}else{
			foreach ($arrprice as $timberId=>$valueDetail)
			{   $arFieldPass  =array();
				$arFieldPass["price"]  = $valueDetail;
				$arConditions = array("i_forest_id"=>$_POST['i_forest_id'],"i_timber_id"=>$timberId);
				$db->update($table,$arFieldPass,$arConditions);
			}
			
			$_SESSION['empMsg'] = "Timber Price Entity Record Updated Successfully";
		}
		
		   ob_end_clean();
		   header("Location: timber_price.php");
			exit;
/*		}else{
            $arrError[] = "Option already added";
		}
*/			
		}
	}


	
	include("html/add_timber_price.php");
	include("html/footer.php");
 ?>