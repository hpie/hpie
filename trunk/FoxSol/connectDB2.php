<?php

//$con=mysql_connect('208.91.198.197','foxsol_login','f0xs0l') or die('unable to connect');

//for testing
$con=mysql_connect('localhost','foxsol_login','f0xs0l') or die('unable to connect');


	$db=mysql_select_db('foxsol_login',$con);
?>