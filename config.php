<?php
	global $db,$a_config,$conn,$page,$html,$common,$conn;
	
	$a_config =	array('host'=>'localhost',
					'user'=>'root',
					'password'=>'',
					'db_name'=>'hishimla_forest_new',
					'show_queries'=>false);
	
	/*$a_config =	array('host'=>'localhost',
					'user'=>'hishimla_forest',
					'password'=>'jag_deep_123',
					'db_name'=>'hishimla_forest_new',
					'show_queries'=>false);
	
*/
	  
		$virtualHost = 0;
		if($virtualHost){
			define("BASE_URL","http://".$_SERVER['HTTP_HOST']."/");
		}else{
			define("BASE_URL","http://".$_SERVER['HTTP_HOST']."/".basename(dirname(__FILE__))."/");
		}
		define("BASE_SITE_URL","http://".$_SERVER['HTTP_HOST']."/forest/");	
	    define("BASE_PATH",dirname(__FILE__)."/");
		define("ADMIN_DIR",'cpanel');
		
		
		//require_once BASE_PATH."/classes/html.php";
		require_once BASE_PATH."/classes/user.php";
		require_once BASE_PATH."/classes/admin.php";
		require_once BASE_PATH."/classes/db.php";
		require_once BASE_PATH."/classes/common.php";
		require_once BASE_PATH."/classes/paging.php";
		require_once BASE_PATH."/classes/page.php";
		require_once BASE_PATH."/classes/form_validation.php";
		require_once BASE_PATH."/classes/ps_pagination.php";
		
		//$html			= new html();
		//$javascript		= new javascript();
		$db				= new db($a_config);
		$user			= new user();
		$admin			= new admin();
		$common			= new common();
		$paging			= new paging();
		$objpage			= new page();
		$form_validation= new form_validation();
        

	$headerInclude	= "./includes/header.php";
	$footerInclude	= "./includes/footer.php";

	$pageTitle		= "Forest Site";
	$adminTitle		= "Forest Site";

	$title			= "Forest site";
	$adminTitle		= "Forest site";

	
		
	require_once dirname(__FILE__)."/common_functions.php";

	function showMenu($type){
		global $page,$html;
		$arrLinks = $page->getMenuItems($type);
		$strMenu = "";
		if(!empty($arrLinks)){
			$loopCounter = 0;			
			foreach($arrLinks as $page_link){
				if($type == "header"){
					if($loopCounter !=0 && count($arrLinks) != $loopCounter){
						//$strMenu .= "<font class='header'>&nbsp;|&nbsp;</font>";
					}
					$strMenu .= "<li>".$html->link($page_link,'header')."</li>";	
				}else if($type =="footer"){
					if($loopCounter !=0 && count($arrLinks) != $loopCounter){
						//$strMenu .= "<b>&nbsp;|&nbsp;</b>";
					}
					$strMenu .= $html->link($page_link); 
				}
				$loopCounter++;	
			}
		}
		echo $strMenu;
	}
	//print_r(showMenu('header'));

	if(stristr($_SERVER['REQUEST_URI'],'my_squeeze_pages.php')){
		$height ="1000px";
	}elseif(isset($_REQUEST['templates_id'])){
		if($_REQUEST['templates_id'] == 2){
			$height ="1700px";
		}elseif($_REQUEST['templates_id'] == 4){
			$height ="1900px";
		}elseif($_REQUEST['templates_id'] == 1){
			$height ="2000px";
		}elseif($_REQUEST['templates_id'] == 3){
			$height ="2800px";
		}
		elseif(isset($_REQUEST['step2Submitted'])){
			$height ="1000px";
		}
	}else{
		$height ="1000px";
	}	

	
?>