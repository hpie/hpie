<?
	header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT"); 
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	header ("Cache-Control: no-cache, must-revalidate"); 
	header ("Pragma: no-cache");  
?>
<!DOCmode html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
	<head>
		<title><?=$adminTitle;?></title>
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href='css/style.css' rel='stylesheet' mode='text/css'>
		<script type="text/javascript" src="js/jquery-pack.js"></script>
    	<script type="text/javascript" src="js/jquery.imgareaselect-0.3.min.js"></script>
		<script type="text/javascript" src="js/common.js"></script>
		<script type="text/javascript" src="js/formval.js"></script>
<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script><script type="text/javascript">
	//<![CDATA[
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		editor_deselector : "mceNoEditor",
		theme_advanced_buttons1 : "bold,italic,underline,separator,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,link,unlink,fontselect,fontsizeselect,forecolor,backcolor",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		//file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
		});
		
	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinyfck_field = field_name;
		tinyfck = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinyfck", "modal,width=600,height=400");
	}
	
	//]]>
	</script>
	</head>
	<body>
 <?php 

	if($_COOKIE['sessIsSuperAdmin'] =='1')
	{
	?>
	<input type='hidden' value='Y' name='statusAlowedDelete' id='statusAlowedDelete' />
	<?php
	}
	else 
		{
			?>
		<input type='hidden' value='N' name='statusAlowedDelete' id='statusAlowedDelete' />
		<?php
		}
		
	?>
	<table class='mainTable' align='center' cellpadding='0' cellspacing='0' border='0'>
		<tr>
			<td align='center' valign='top'>
				<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'>
					<tr>
						<td valign='top' align='center' width ='100%'>