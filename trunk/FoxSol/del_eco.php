<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}

require('connectDB.php');

$id=$_REQUEST['id'];

$q="delete from upset_price where id=".$id;

if(mysql_query($q))
echo "Successfully deleted";





?>
