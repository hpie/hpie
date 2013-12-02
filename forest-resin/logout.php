<?php
	session_start();
	/*$query = "UPDATE ".TBL_USERS." SET online_status=0  WHERE id=".$_SESSION['userId'];
	$result =$db->setXbyY($query);*/
	
	session_destroy();
	unset($_SESSION['userid']);
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);
	unset($_SESSION['email']);
	unset($_SESSION['role']);
	//unset($_SESSION['division']);
	$_SESSION['logged'] = FALSE;
	$_SESSION['msg']="You have successfully logged out from your account";
	//$refURL = $_SERVER['HTTP_REFERER'];
	header("Location: index.php");
?>