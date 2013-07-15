<ul id="sidebar">
<? echo showMenu('header');?>
	<li><?php echo $html->link(array('Template gallery'=>'create_page.php'),'header');?></li>
	<?if($user_session_id){?>
	  <li><?php echo $html->link(array('My web pages'=>'my_squeeze_pages.php'),'header');?></li>
	<!--<div id="libox"><div align ='center'><?php echo $html->link(array('Logout'=>'logout.php'),'header');?></div></div>-->
  <?}?>
</ul>