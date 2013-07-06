<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo $pageTitle?></title>
<?php echo $html->css(array('style.css','datepicker.css')); ?>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jscolor.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/tooltip.js" type="text/javascript"></script>
<script src="js/datepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script><script type="text/javascript">
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
		file_browser_callback : "fileBrowserCallBack",
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
<div id ="container">
<div id="header">
	<div id ="headin">
		<div id ="logo">
			<?php echo $title?>
		</div>
		<div id ="topservicemenu">
		</div>
	  </div>	
		<div id="menudiv">
			<div id ="mainmenu">
			<ul>				  
			  <?echo showMenu('header');?>
			  <font class='header'>&nbsp;|&nbsp;</font>
			  <li><?php echo $html->link(array('Create Page'=>'create_page.php')); ?></li>
			  <?if(isset($_SESSION['sessUserID'])){?>
				  <font class='header'>&nbsp;|&nbsp;</font>
				  <li><?php echo $html->link(array('My Sqeeze Pages'=>'my_squeeze_pages.php'));?></li>
				  <li style ='float:right'><?php echo $html->link(array('Logout'=>'logout.php'));?></li>
			  <?}?>
			  <!--<li class='spacer'>&nbsp;</li>
			 <li><?php echo $html->link(array('About Us'=>'about.php')); ?></li>-->
		     </ul>			
		</div>
		</div>
	 </div>	
<div id="wrapper">