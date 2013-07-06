<style type="text/css">
	@import url(css/menu_style.css); 
</style>
<ul id="menu">
	<li><a id="<?php echo pageUrl("home",$currentPage)?>"
		href="<?=BASE_URL?>index.php" title="Goto Home Page">Home</a></li>
</ul>
<?php 
$markDetailId=$_REQUEST['markId'];
$markIdDetail=$common->getInfo('c_mark_detail',$markDetailId);
echo "<b>Working on Lot-No ".$markIdDetail[0]['vc_lotno']."</b>";
?>	