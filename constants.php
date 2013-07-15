<?php ob_start(); session_start();

$virtualHost = 0;
if($virtualHost){
	define("BASE_URL","http://".$_SERVER['HTTP_HOST']."/");
}else{
	define("BASE_URL","http://".$_SERVER['HTTP_HOST']."/".basename(dirname(__FILE__))."/");
}
//echo BASE_URL;

//define("BASE_SITE_URL","http://".$_SERVER['HTTP_HOST']."/forest/");
//define("BASE_PATH",dirname(__FILE__)."/");

define('TBL_PAGES','pages');
define('TBL_ADMINS','admins');
define('TBL_USERS','users');


define("REC_PER_PAGE","20");
define("SHOW_PAGES","8");



define('USER_NAME','User Name');
define('HEAD1','Register As New User');
define('FIRST_NAME','First Name');
define('LAST_NAME','Last Name');
define('EMAIL','Email Address');
define('PASSWORD','Password');
define('ENTER_CODE','Enter Security Code Displayed Above');
define('AGREE','I Agree to the');
define('TERMS','terms of service');
define('OLD_PASSWORD','Old Password');
define('NEW_PASSWORD_AGAIN','New Password Again');
define('RE_PASSWORD','Re-type Password');
define('RE_EMAIL','Re-type Email');
define('LOGIN','Login Form');
define('EDIT_PROFILE','Edit Profile Form');


$cnameofforest="Name&nbsp;of&nbsp;the&nbsp;Forest";
$cnameofforest="DFO Name/Forest Name";
$cnameDivision ="Choose Division";
$cnameDFO     ="Choose DFO";
$cfordate     ="From Date";
$ctodate      ="To Date";
$carea        ="Area";
$ccategory    ="Category";
$ctreetype    ="Tree Type";
$cvalue       ="Value";
$catvalue     =array();
//$arrnameofforest=array(1=>'Forest1',2=>'Forest2',3=>'Forest3');
//$arrtreetype=array(1=>'tree1',2=>'tree2',3=>'tree3');
//$arrcategory=array(1=>'cat1',2=>'cat2',3=>'cat3');
$appliedToLot = array('0'=>'No','1'=>'Yes');
$stateOfExpense= array('0'=>'Before Conversion','1'=>'After Conversion');
$arraccept = array('0'=>'No','1'=>'Yes');
$overHeadType = array('0'=>'Transportation','1'=>'Others');
$forestPointId="-1";
$forestPointName="Forest";

$treeDO =  new TreeDO();
$list=$treeDO->getTreeList();
$treeList=$list;
$forestDO =  new ForestDO();
$flist=$forestDO->getForestList();
$catDO =  new CategoryDO();
$catList=$catDO->getCategoryList();
$arrMonths=array(1=>"January",2=>"February","March","April","May","June","July","August","September","October","November","December");
$maxYear=date("Y", strtotime(date('Y') . " +10 year"));

$arrYears=array();
for($y=2000;$y<=$maxYear;$y++){
 $arrYears[$y]=$y;
}

$dfoList=$common->getAllOptionOrder('m_forest_department','vc_name');
$divionList=$common->getAllOptionOrder('m_division','vc_name');
$divionLoginList=$common->getAllOptionByName('m_division','vc_name');

/* function */
function makeSelectOptions($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str=""){
	//echo '<pre>'; print_r($arrData); echo '<pre>';
	$strOptions= "";
	if(isset($javascript) && $javascript != ""){
		$callJs = "onchange ='javascript:".$javascript."(this.value)'";
	}else{
		$callJs= "";
	}
	if(!$size){
		$selectSize = "180px";
	}else{
		$selectSize = $size."px";
	}
    
	if(is_array($arrData) && count($arrData)>=0){
		$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
		
		$strOptions .= "<option value =''>-select-</option>";
		foreach($arrData as $k=>$v){
			$selected= "";
			if($selectedIndex == $k){
				$selected= "selected";
			}
			$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
		}
		$strOptions .= "</select>";
	}
	return $strOptions;
}





function makeSelectOptionsCustomize($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str=""){
	//echo '<pre>'; print_r($arrData); echo '<pre>';
	$strOptions= "";
	if(isset($javascript) && $javascript != ""){
		$callJs = "onchange ='javascript:".$javascript."'";
	}else{
		$callJs= "";
	}
	if(!$size){
		$selectSize = "180px";
	}else{
		$selectSize = $size."px";
	}
    
	if(is_array($arrData) && count($arrData)>=0){
		$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
		
		$strOptions .= "<option value =''>-select-</option>";
		foreach($arrData as $k=>$v){
			$selected= "";
			if($selectedIndex == $k){
				$selected= "selected";
			}
			$strOptions .= "<option value ='".$k."' ".$selected.">".$v."</option>";
		}
		$strOptions .= "</select>";
	}
	return $strOptions;
}

function makeForestlist($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str=""){
	/*echo '<pre>'; print_r($arrData); echo '<pre>';*/
	$strOptions= "";
	if(isset($javascript) && $javascript != ""){
		$callJs = "onchange ='javascript:".$javascript."(this.value)'";
	}else{
		$callJs= "";
	}
	if(!$size){
		$selectSize = "180px";
	}else{
		$selectSize = $size."px";
	}

	if(is_array($arrData) && count($arrData)>=0){
		$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
		$strOptions .= "<option value =''>-select-</option>";
		foreach($arrData as $k){
			$selected= "";
			if($selectedIndex == $k->id){
				$selected= "selected";
			}
			$strOptions .= "<option value ='".$k->id."' ".$selected.">".$k->vc_name."</option>";
		}
		$strOptions .= "</select>";
	}
	return $strOptions;
}
function makeTreelist($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str=""){

	$strOptions= "";
	if(isset($javascript) && $javascript != ""){
		$callJs = "onchange ='javascript:".$javascript."(this.value)'";
	}else{
		$callJs= "";
	}
	if(!$size){
		$selectSize = "180px";
	}else{
		$selectSize = $size."px";
	}

	if(is_array($arrData) && count($arrData)>=0){
		$strOptions = "<select name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
		$strOptions .= "<option value =''>-select-</option>";
		foreach($arrData as $k){
			
			$selected= "";
			if($selectedIndex == $k->id){
				$selected= "selected";
			}
			$strOptions .= "<option value ='".$k->id."' ".$selected.">".$k->vc_name."</option>";
		}
		$strOptions .= "</select>";
	}
	return $strOptions;
}

function makeTimberlist($arrData,$name,$selectedIndex=0,$javascript="",$size=0,$str="",$disable=false){

	
	$strOptions= "";
	if(isset($javascript) && $javascript != ""){
		$callJs = "onchange ='javascript:".$javascript."'";
	}else{
		$callJs= "";
	}
	if(!$size){
		$selectSize = "180px";
	}else{
		$selectSize = $size."px";
	}

	if(is_array($arrData) && count($arrData)>=0){
		$strOptions = "<select " ;
		if($disable == true)
		{
		$strOptions .="disabled='disabled' ";	
		}
		$strOptions .=" name ='".$name."' id ='".$name."' ".$callJs." style ='width:".$selectSize."' ".$str."  >";
		$strOptions .= "<option value =''>-select-</option>";
		foreach($arrData as $k=>$vc_name){
			
			$selected= "";
			if($selectedIndex == $k){
				$selected= "selected";
			}
			$strOptions .= "<option value ='".$k."' ".$selected.">".$vc_name."</option>";
		}
		$strOptions .= "</select>";
	}
	return $strOptions;
}

?>