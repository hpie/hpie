<?php
	ob_start();
	session_start();
	
	include ("../include.php");
	require_once("../config.php");
	include("../constants.php");

	require_once("html/login_header.php");
	if(isset($_COOKIE['sessAdminID']) && $_COOKIE['sessAdminID'] != ""){
		ob_end_clean();
		header("Location: main.php");
		exit;
	}
	$arrError = array();
	$login = "";
	$password	= "";
	$division	= "";
	//$type		= "admin";
	
	if(isset($_POST['loginSubmitted']) && $_POST['loginSubmitted'] != ""){
		extract($_POST);
		if(empty($login)){
			$arrError[] = "Please enter user name";
		}else if(empty($password)){
			$arrError[] = "Please enter password";
		}else if(empty($division)){
			$arrError[] = "Please enter division";
		}else{
			//echo 111;
			 $_SESSION['centerKey']='';
			//echo $user->validateLogin($email,$password,$type);
			 if($admin->validateLogin($login,$password,$division))
			 {
				if($admin->doLogin($login,$password,$division)){
					ob_end_clean();
					header("Location: main.php");
					exit;
				}else {
					$arrError[]	= "Your login account is are not valid";
				}
			}else{
				$arrError[]	= "Your login credentials are not valid";
			}
		}	
	}
	require_once("html/login.php");
	require_once("html/login_footer.php");
?>