<?php
	ob_start();
	session_start();
	
	include ('../include.php');
	require_once("../config.php");
	include('../constants.php');

	require_once("html/login_header.php");
	if(isset($_COOKIE['sessAdminID']) && $_COOKIE['sessAdminID'] != ""){
		ob_end_clean();
		header("Location: main.php");
		exit;
	}
	$arrError = array();
	$login = "";
	$password	= "";
	//$type		= "admin";
	
	if(isset($_POST['loginSubmitted']) && $_POST['loginSubmitted'] != ""){
		extract($_POST);
		if(empty($login)){
			$arrError[] = "Please enter user name";
		}
		if(empty($password)){
			$arrError[] = "Please enter password";
		}else{
			echo 111;
			//echo $user->validateLogin($email,$password,$type);
			 if($admin->validateLogin($login,$password)){
				if($admin->doLogin($login,$password)){
					ob_end_clean();
					header("Location: main.php");
					exit;
				}
			}else{
				$arrError[]	= "Your login credentials are not valid";
			}
		}	
	}
	require_once("html/login.php");
	require_once("html/login_footer.php");
?>