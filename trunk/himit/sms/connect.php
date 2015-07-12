<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');


/* Database config */

$db_host		= 'localhost';
$db_user		= 'hm030615_himit';
$db_pass		= 'h!m!t5m5';
$db_database	= 'hm030615_himitsms'; 

/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");

?>