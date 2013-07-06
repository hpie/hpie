<?
	ob_start();
	session_start();	
	include ('../include.php');
	require_once("../config.php");
	include('../constants.php');
	
	//include("check_session.php");
	
?>
<HTML>
<HEAD>
<title><?=$adminTitle;?></title>
	<META http-equiv="Content-Type" Content="text/html; charset=utf-8">
</HEAD>
<frameset rows="50,*" marginwidth="0" marginheight="0" frameborder="0" border="0" borderwidth="0">
    <FRAME SRC="html/top.php" NORESIZE  SCROLLING="no" frameborder="0" name="treeframe">
<frameset cols="200,*" marginwidth="0" marginheight=	"0" frameborder="0" border="0" borderwidth="0">
    <FRAME SRC="html/menu.php" NORESIZE  SCROLLING="YES" frameborder="0" name="treeframe" valign='top'>
	<FRAME	SRC="html/welcome.php" frameborder="0" name='basefrm' valign='top'>	
</frameset>
</frameset>
<body bgcolor='#D8E3EA' onload="javascript:setTimeout('auto_reload()',10000);">
</body>
</HTML>