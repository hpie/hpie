<?php
//session_start();
$fwd=(isset($_SESSION['fwd']))?$_SESSION['fwd']:"";

$dbuser='foxsol_'.$fwd;

if($fwd!="")
{
	if($fwd=="Dharamsala")
	{
		$dbuser="foxsol_Dharamsal";	
	}else if($fwd=="SunderNagar")
	{
		$dbuser="foxsol_SunderNag";
	}
	
	//$con=mysql_connect('208.91.198.197',$dbuser,'f0xs0l') or die('unable to connect');
	
	//for testing
	$con=mysql_connect('localhost',$dbuser,'f0xs0l') or die('unable to connect');

	$db=mysql_select_db('foxsol_'.$fwd,$con);
	//$db=mysql_select_db('foxsol_Shimla');
}
else
{
 	echo "No Division Database found";
	exit;
}

?>

