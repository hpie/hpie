<?php
$host="localhost"; // Host name.
$db_user="root";
$db_password="";
$db='hpseb_pension'; // Database name.
$conn=mysql_connect($host,$db_user,$db_password) or die (mysql_error());
mysql_select_db($db) or die (mysql_error());
?>