<?
	session_start();
	include 'include.php';
 
 	include ("config.php");
 	   include('constants.php');

	/*$query = "UPDATE ".TBL_USERS." SET online_status=0  WHERE id=".$_SESSION['userId'];
	$result =$db->setXbyY($query);*/
	
	session_destroy();
	unset($_SESSION['userId']);
	$refURL = $_SERVER['HTTP_REFERER'];
	header("Location: index.php?pageName=login");
?>