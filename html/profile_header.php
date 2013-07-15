

<?

if(isset($_SESSION['userId']) && !isset($_GET['id'])){?>

<style type="text/css">
	@import url(css/menu_style.css); 
</style>
<table align="center">
 <tr>
 <td>
 
<div id="menu3">
<ul id="menu">
<li>
<a id="<?php echo pageUrl("home",$currentPage)?>" href="<?=BASE_URL?>index.php" title="Goto Home Page">Home</a>
</li>
<li>

<a id="<?php  echo pageUrl("myprofile",$currentPage)?>" href="<?=BASE_URL?>index.php?page=profile" title="View your Profile">My Profile</a>
</li>
<li>

<a id="<?php  echo pageUrl("ecnomicreports",$currentPage)?>" href="<?=BASE_URL?>index.php?page=reportmain" title="View your Profile">Economics Reports</a>
</li>
<li>

<a id="<?php  echo pageUrl("yearProgress",$currentPage)?>" href="<?=BASE_URL?>index.php?page=detailProgressYearSelect" title="View your Profile">Progress Reports Yearly</a>
</li>
<li>

<a id="<?php  echo pageUrl("yearProgress",$currentPage)?>" href="<?=BASE_URL?>index.php?page=permormaReport	" title="View Performa">Performa Reports</a>
</li>
<li>
<a id="<?php  echo pageUrl("monthProgress",$currentPage)?>" href="<?=BASE_URL?>index.php?page=detailProgressMonthSelect" title="View your Profile">Progress Reports Monthly</a>
</li>
<li>

<a id="<?php  echo pageUrl("editprofile",$currentPage)?>" href="<?=BASE_URL?>index.php?page=editProfile" title="Update your infirmation and password">Edit Profile</a>
</li>
<li>

<a id="<?php echo pageUrl("marktrees",$currentPage)?>" href="<?=BASE_URL?>index.php?page=markTrees" title="Enter marking details">Mark Trees</a> 
</li>
<li>

<li>
<a id="<?php echo pageUrl("assignwork",$currentPage)?>" href="<?=BASE_URL?>index.php?page=assignWorkList" title="Assign Work">Assign Work</a>
</li>
</ul>
</div>
  <?}?>
  </td>
  </tr>
  </table>
 