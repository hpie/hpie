<?	ob_start();
	session_start();	
	setcookie('sessAdminID','',time()-3600);
	setcookie('sessAdminName','',time()-3600);
	setcookie('sessEmail','',time()-3600);
	setcookie('sessIsSuperAdmin','',time()-3600);
	ob_end_clean();
	header("Location: index.php");
	exit;
?>