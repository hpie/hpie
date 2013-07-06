<?
if(!$_COOKIE['sessAdminID'] && !isset($_COOKIE['sessLoginName']) && $_COOKIE['sessLoginName'] == ""){
	ob_end_clean();
	header("Location: index.php");
	exit;
}
?>