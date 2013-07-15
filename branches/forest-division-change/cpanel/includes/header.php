<html>
<head>
<title><?=$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo $pageTitle?></title>
<?php echo $html->css(array('main.css','datepicker.css','tooltip.css')); ?>

<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jscolor.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/formval.js" type="text/javascript"></script>
<script src="js/tooltip.js" type="text/javascript"></script>
<script src="js/datepicker.js" type="text/javascript"></script>
<script>
	function pick_template(template_id){
		setCookie('templates_id',template_id,1);
		alert("You have successfully picked this template\nPlease click on next button to proceed\n");
	}
</script>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.1.css" media="screen" />
 	<link rel="stylesheet" href="fancyboxstyle.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox({
				'titleShow'		: false
			});

			$("a#example2").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'
			});

			$("a#example4").fancybox();

			$("a#example5").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example6").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
</script>
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

<script type="text/javascript">
	function Show_Popup(action, userid) {
	$('#popup').fadeIn('fast');
	$('#window').fadeIn('fast');
	}
	function Close_Popup() {
	$('#popup').fadeOut('fast');
	$('#window').fadeOut('fast');
	}
</script>
</head>
<body>
		<div id="headerContainer">
		<div id="header"><a title ='Go to Webinator.biz Home' href ='<?=BASE_URL?>create_page.php' target ='_self'><img src="images/logo.jpg" alt="logo" longdesc="images/logo.jpg" /></a></div>
        </div>
        <div id="navContainer">
        <ul id="nav">
			<? echo showMenu('header');?>
			<li><?php echo $html->link(array('Template gallery'=>'create_page.php'),'header');?></li>
			<?if($user_session_id){?>
			  <li><?php echo $html->link(array('My web pages'=>'my_squeeze_pages.php'),'header');?></li>
				<!--<div id="libox"><div align ='center'><?php echo $html->link(array('Logout'=>'logout.php'),'header');?></div></div>-->
			  <?}?>
        </div>
        <div id="pageContainer">