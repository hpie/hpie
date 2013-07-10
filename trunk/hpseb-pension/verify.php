<?php 
session_start();
include_once("include/config.php");
$login = $_POST["loginid"];
$pwd = $_POST["loginpass"];
$recordset = mysql_query("select * from  hpseb_users");
while($record = mysql_fetch_array($recordset)){
	if($login == $record["ulogin"] && $pwd == $record["upassword"]) {
	
	$_SESSION["ulogin"] = $record["ulogin"];
	$_SESSION["uid"] = $record["ID"];	
			if($record["utype"] == 0){
			$_SESSION["utype"] = $record["utype"];
			header("Location:home.php?uid=".$record["ID"]);
		    exit;
			}else{
		header("Location:home.php");
		exit;
		}
   }
} 
		   header("Location:index.php?invalid=1");  
?>