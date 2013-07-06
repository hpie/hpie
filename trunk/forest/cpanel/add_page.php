<?	ob_start();
	session_start();
	include ('../include.php');
	include("../config.php");
	include('../constants.php');
	
	include("check_session.php");
	include("html/header.php");
    include("fckeditor/fckeditor.php");
	$oFCKeditor = new FCKeditor('content') ;
 
	$pageLabel		= "Add Page";
	$arrError		= array();
	$page_title		= "";
	$meta_title		= "";
	$meta_keyword	= "";
	$meta_description= "";
	$selectedIndex	= 0;
	
	$id				= 0;
	$table			= TBL_PAGES;
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$row = $objpage->getPageInfo($id);
		
		$pageLabel		 = "Edit Page";
		$arrError		 = array();
		$oFCKeditor->Value 		 = $row[0]['content'];	
		$title		     = $row[0]['title'];
		$meta_title		 = $row[0]['meta_title'];
		$meta_keyword	 = $row[0]['meta_keyword'];
		$meta_description= $row[0]['meta_description'];
		//$arrDisplayPagesValues= $objpage->getDisplayValue($id);
	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);		
		foreach($_POST as $k=>$v){
			if($k == 'submit' || $k == 'display_in')
				continue;
			//if($v)){
				$arFieldValues[$k] = $v;
			//}
		}
		$search_name = friendlyURL($title);
		//$arFieldValues['search_name'] = $search_name;
		if(empty($title)){
			$arrError[] = 'Page Title can not be empty';
		}elseif($objpage->checkPageId($title,$id)){
			$arrError[] = 'Page Alread Exists';
		}
		else{
			if(!$id){
				$db->insert($table,$arFieldValues);
				ob_end_clean();
				header("Location: pages.php");
				exit;
			}else{
				foreach($arFieldValues as $k=>$v){
					if($k =='id')
					continue;
					$arFieldValuesUpdate[$k]=$v;
				}
				//$arFieldValuesUpdate['search_name'] = $search_name;
				$arConditions = array("id"=>$id);
				$db->update($table,$arFieldValuesUpdate,$arConditions);
			}
			/*$arrWhere = array('pages_id'=>$id);
			$db->delete(TBL_DISPLAY_PAGES,$arrWhere);	*/
			if(!empty($display_in)){
				foreach($display_in as $k=>$v){
					$arrInsert = array('pages_id'=>$id,'display_in'=>$k);
					$db->insert(TBL_DISPLAY_PAGES,$arrInsert);
				}
			}
			ob_end_clean();
			header("Location: pages.php");
			exit;
		}
	}
		
	include("html/add_page.php");
	include("html/footer.php");
 ?>