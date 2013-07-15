<?
    session_start();
    if($_SESSION['sessAdminID'] && isset($_SESSION['sessLoginName']) && $_SESSION['sessLoginName'] != ""){
		header("location: main.php");
	}else{
		header("location: login.php");
	}
?>