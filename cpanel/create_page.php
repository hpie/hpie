<?php
	ob_start();
	session_start();
	include ('../include.php');
	include('../constants.php');
	include("../config.php");
	include("check_session.php");
	include("html/header.php");

	$id	= 0;
	$page_name				= "";	
	$meta_title				= "";
	$description			= "";
	$meta_keywords			= "";
	$meta_description		= "";
	$header					= "";
	$buy_now_link			= "";
	$footer					= "";
	$video_code				= "";
	$hyperlink_image		= "";
	$big_banner				= "";
	$portfolio_photo		= "";
	$product_image			= "";
	$header_text			= "";
	$header_text_color		= "";
	$slogan					= "";
	$opt_in_box				= "";
	$ftp_server				= "";
	$ftp_user_name			= "";
	$ftp_user_pass			= "";
	$destination_dir		= "";

	$right_title_text		= "";
	$right_below_title_text	= "";
	$sponsered_links		= "";
	$sponsered_link_image   = "";
	$additional_profile		= "";
	$from_address			= "";
	$address_to_people		= "";
	$profile				= "";
	$more_about_profile		= "";
	$buy_now_text			= "";
	$buy_now_price_description= "";
	$date					= "";
	$attention				= "";
	$below_header_text		= "";
	$from_name				= "";
	$inside_header_text		= "";
	$para1					= "";
	$para2					= "";
	$para3					= "";
	$para4					= "";
	$para5					= "";
	$para6					= "";
	$book_image				= "";
	$more_text				= "";
	$download_header_start	= "";
	$download_header_middle	= "";
	$download_header_end	= "";
	$download_header_below_text= "";
	$privacy_text			= "";
	$footer_links			= "";
	$footer_text			= "";
	$logo					= "";
	$detailLabel			= "Enter your Details";
	$errorFTPConnection		= "";
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$detailLabel			= "Edit your Details";
	}
	if(isset($_GET['users_id'])){
		$users_id = (int)$_GET['users_id'];
	}

	$templates_id	  = $_REQUEST['templates_id'];
	$arrErrors		  = array();
	$tbl_sqeeze_pages = TBL_SQUEEZE_PAGES."_".$templates_id;
	$arrTemplateFields = $html->load_template_fields($templates_id);
	//print_r($arrTemplateFields);
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$row = $db->select("SELECT * FROM ".$tbl_sqeeze_pages." WHERE id ='".$id."'");
		if(!empty($row[0])){
			foreach($row[0] as $k=>$v){
				${"$k"} = $v ;
			}
		}
	}

	//$tbl_sqeeze_pages		= "sqeeze_pages_1";
?>
<?php
if(isset($_POST['step2Submitted']) && $_POST['step2Submitted'] != ""){
	extract($_POST);
	$arrInsert = array();
	$tbl_sqeeze_pages = TBL_SQUEEZE_PAGES."_".$templates_id;
	foreach($_POST as $k=>$v){
		if($k=="step1Submitted" || $k =="step2Submitted" || stristr($k,'remLen'))
			continue;
		else
		$arrInsert[$k]=trim($v);
		if($k != 'id'){
			$arrCheckFields[$k]= trim($v);
		}
	}	
	$arrErrors = $form_validation->validate_form($arrCheckFields);	
	if(!($id)){
		if(is_array($_FILES)){
			foreach($_FILES as $type=>$a_files){		
			$a_files[$type]=$a_files;		
				if(isset($a_files[$type]) && $a_files[$type]['name'] == ""){
					$arrErrors[$type] = "Please upload the image";
				}//else{
					//echo $a_files[$type]['tmp_name']."<br/>";
					//list($width, $height, $type, $attr) = getimagesize($a_files[$type]['tmp_name']);
				//}
			}
		}
	}
	//die();
	if(!empty($arrErrors)){
		$tbl_sqeeze_pages = TBL_SQUEEZE_PAGES."_".$templates_id;
		$arrTemplateFields = $html->load_template_fields($templates_id);
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$row = $db->select("SELECT * FROM ".$tbl_sqeeze_pages." WHERE id ='".$id."'");
			if(!empty($row[0])){
				foreach($row[0] as $k=>$v){
					${"$k"} = $v ;
				}
			}
	}
	include("./html/create_page.php");
	include("html/footer.php");
	die();
	}else{
		$rowInserted = false; 
	if($id){
		$arrWhere = array('id'=>$id,'users_id'=>$users_id,'templates_id'=>$templates_id);
		foreach($arrInsert as $k=>$v){
			if($k == 'id' || $k == 'users_id' || $k == 'templates_id')
				continue;
			else
				$arrUpdate[$k]=$v;
		}
		$db->update($tbl_sqeeze_pages,$arrUpdate,$arrWhere);
		$rowInserted = true;
	}else{
		$arrInsert['users_id'] = $user_session_id;	
		if(!$html->checkExistingPage($arrInsert['page_name'],$user_session_id,$templates_id)){
			$id = $db->insert($tbl_sqeeze_pages,$arrInsert);
			$rowInserted = true;
		}
	}
	if($rowInserted){
	$upload		= new upload();

	foreach($_FILES as $type=>$a_files){		
		$a_files[$type]=$a_files;		
		if(isset($a_files[$type]) && $a_files[$type]['name'] != ""){
			switch($type){
				case "big_banner":
					$image_height = 170;
					$image_width  =	640;
					$p_name ='big';
				break;
				case "portfolio_photo":
					$image_height = 150;
					$image_width  =	100;
					$p_name ='port';
				break;
				case "product_image":
					if($templates_id == 5){
						$image_height = 146;
						$image_width  =	265;
						$p_name ='add_car';
					}elseif($templates_id == 6){
						$image_height = 260;
						$image_width  =	197;
						$p_name ='add_finance';
					}elseif($templates_id == 7){
						$image_height = 176;
						$image_width  =	230;
						$p_name ='add_sports';
					}elseif($templates_id == 8){
						$image_height = 235;
						$image_width  =	252;
						$p_name ='add_real_estate';
					}elseif($templates_id == 9){
						$image_height = 214;
						$image_width  =	98;
						$p_name ='add_music';
					}else{
						$image_height = 290;
						$image_width  =	400;
						$p_name ='add';
				}					
				break;
				case "image":
					$image_height = 100;
					$image_width  =	200;
					$p_name ='spon_link2';
				break;
				case "book_image":
					$image_height = 400;
					$image_width  =	300;
					$p_name ='book_image3';
				break;
				case "logo":
					if($templates_id =='5'){
						$image_height = 60;
						$image_width  =	185;
						$p_name ='logo5';
					}elseif($templates_id =='6'){
						$image_height = 178;
						$image_width  =	252;
						$p_name ='logo6';
					}else{
						$image_height = 90;
						$image_width  =	170;
						$p_name ='logo3';
					}
				break;
			}

			$arfilename = $upload->file_upload($templates_id.'_'.$id."_".$p_name,"{$type}",UPLOAD_PATH,'jpeg,gif,png,JPG,JPEG,jpeg');
			if(!empty($arfilename) && is_array($arfilename)){
				$upload->smart_resize_image(UPLOAD_PATH.$arfilename[0],$image_width,$image_height,UPLOAD_PATH,false,$arfilename[0],true);
				$arrWhere  = array("id"=>$id);
				$arrUpdate = array($type=>$arfilename[0]);	
				$db->update($tbl_sqeeze_pages,$arrUpdate,$arrWhere);
			}
		}
	}
	$html->generate_admin_html_code($id,$tbl_sqeeze_pages,$users_id);
	$tbl_sqeeze_pages= TBL_SQUEEZE_PAGES."_".$templates_id;
	//$page_name = $html->show_html_code($id,$tbl_sqeeze_pages);
	 $pagename = $html->get_page_name($templates_id,$id);
	 $unique_template_page_id = $templates_id."_".$id;
	 $page_name = SQUEEZE_PAGE_URL.$users_id."/".$unique_template_page_id."/".$pagename;	
	//echo "<textarea class='textarea mceNoEditor' rows ='30' cols='80' readonly>".$html->show_html_code($id,$tbl_sqeeze_pages)."</textarea>";
	}
}
	ob_end_clean();
	header("Location: view_pages.php?users_id=$users_id");
	exit;
}
include("./html/create_page.php");