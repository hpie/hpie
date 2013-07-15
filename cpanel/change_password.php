<?php
	ob_start();
	session_start();
	include ('../include.php');
	include("../config.php");
	include('../constants.php');
	
	include("check_session.php");
	include("html/header.php");
	//require_once("classes/class.admin_users.php");
	$changePasswordForm	 = 	"html/change_password.php";
	//$objAdminUser	= new admin_users();
	$passwordTitle	= "Change Password";
	$submitLabel	= "Submit";
	$msgStatus		= false;
	$errorStatus	= false;
	$message		= "";
	$oPass			= "";

	if(isset($_POST['passwordSubmitted'])){
		$oldPassword	= trim($_POST['oldPassword']);
		$newPassword	= trim($_POST['newPassword']);
		if(!empty($oldPassword) &&  !empty($newPassword)){
			if($user->changePassword($oldPassword,$newPassword)){
				$msgStatus	= true;
				$message	= "Password changes successfully";
			}else{
				$errorStatus = true;
				$errorMsg	 = "Old Password is not correct";
			}
		}else{
			$errorStatus = true;
			$errorMsg	 = "Please enter value in both fields";
		}
	}
	include($changePasswordForm)
?>
<?php include("html/footer.php"); ?>