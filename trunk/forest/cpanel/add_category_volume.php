<?	ob_start();
	session_start();
	include("../config.php");
	include("check_session.php");
	include("html/header.php");
	
	
	$Label	= "Add Volume Entity";
	$arrError		 = array();
	$id				 = 0;
	$lang_id		 = "";
	$i_table_id	     = "";
    $i_tree_id	     = "";
	$volume           = "";
 

	$table			   = 'c_volume_detail';
	$arrVolumeTables   = $common->getAllVolumeTables();
    $arrAllCategories  = $common->getAllCategories('A');
	$arrAllTreeTypes   =$common->getAllTrees();
    $arrVolumeTablesKey     = array_keys($arrVolumeTables);
	$i_table_id       = $arrVolumeTablesKey[0];
	$arrCategoryKey    = array_keys($arrAllCategories);
	$i_tree_id =$arrCategoryKey[0];
	if(isset($_GET['taid']) && $_GET['taid'] != "" ){
		$i_table_id             =$_GET['taid'];
		$i_tree_type_id             = $_GET['trid'];
		$arrVolume      = $common->getVolumeInfo($table,$i_table_id,$i_tree_type_id);
		
		$Label	        = "Edit Volume Entity";
    	$id=$_GET['taid'];
		
	
		//print_r($arrVolume);
		
	}
		if(isset($_POST['submit']) && $_POST['submit'] != ""){

		if($_POST['id'] == '' ||  $_POST['id'] == '0')
		{
		extract($_POST);	
		$catVolume=$_POST['catVolume'];
		echo $i_tree_type_id=$_POST['i_tree_type_id'];
		
		echo $common->checkExistingVolumeOption($table,$id,$_POST['i_table_id'],$i_tree_type_id);
		if(!$common->checkExistingVolumeOption($table,$id,$_POST['i_table_id'],$i_tree_type_id)){

			foreach($catVolume as $key=>$value){
				$arFieldValues['i_table_id']=$_POST['i_table_id'];
				$arFieldValues['volume']=$value;
				$arFieldValues['i_tree_type_id']=$i_tree_type_id;
				$arFieldValues['i_category_id']=$key;

				$id = $db->insert($table,$arFieldValues);
				$_SESSION['userMsg'] = "Category Volume Entity Record Added Successfully";
				 
			}
		}
		else{
			$arrError[] = "Option already added";
		}
			
		
		}
		
		else{
			extract($_POST);
			 foreach($catVolume as $key=>$value){
			 
	    	 $arFieldPass['volume']=$value;
			 $arConditions = array("i_table_id"=>$_POST['i_table_id'],"i_category_id"=>$key,"i_tree_type_id"=>$i_tree_type_id);
	    	 
			 $db->update($table,$arFieldPass,$arConditions);
		     }	
			
			$_SESSION['userMsg'] = "volume Entity Record Updated Successfully";
		}
		
	      ob_end_clean();
		  header("Location: categories_volume.php");
		  //exit;
		}
			
		

	
	include("html/add_category_volume.php");
	include("html/footer.php");
 ?>