<?php
	global $db;
	/**********************************************************************
	*  ezSQL initialisation for mySQL
	*/

	// Include ezSQL core
	include_once "ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "ez_sql_mysql.php";

	// Initialise database object and establish a connection
	// at the same time - db_user / db_password / db_name / db_host
	$db = new ezSQL_mysql('root','','infotype','localhost');
	//$db = new ezSQL_mysql('forest_resin','f0r3st_r3sin','forest_resin','208.91.198.197');

?>