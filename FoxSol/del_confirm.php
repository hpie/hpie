<?php 
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
 $id =FALSE;
 if(isset($_GET['id']) && is_numeric($_GET['id'])) {
 $_SESSION['idd']=(int) $_GET['id'];
 header("Location: del_thanks.php");
 exit;
 }
 else
 {
 echo "please firstly select the member you want to delete";
 exit;
 }
 ?>
 