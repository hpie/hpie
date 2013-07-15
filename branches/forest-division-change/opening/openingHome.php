<?php

$markDetailId=$_GET['markId'];

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
<a id="<?php echo pageUrl("home",$currentPage)?>" href='index.php' title="Goto To Home">
Home</a>
</li>
<li>
<a id="<?php echo pageUrl("markingOpening",$currentPage)?>" href='index.php?page=addMarkingOpening&markId=<?php echo $markDetailId;?>' title="Goto Marking Opening">
Marking Opening</a>
</li>
<li>

<a id="<?php  echo pageUrl("fellingOpening",$currentPage)?>" href='index.php?page=fellingHomeOpening&markId=<?php echo $markDetailId;?>' title="View your Profile">
Felling Opening</a>
</li>
<li>

<a id="<?php  echo pageUrl("conversionHomeOpening",$currentPage)?>" href='index.php?page=conversionHomeOpening&markId=<?php echo $markDetailId;?>' title="View your Profile">
Conversion Opening</a>
</li>
<li>

<a id="<?php  echo pageUrl("transportationHomeOpening",$currentPage)?>"  href='index.php?page=transportationHomeOpening&markId=<?php echo $markDetailId;?>'
				 title="View your Profile">
Transportation Opening</a>
</li>


</ul>
</div>
  <?}?>
  </td>
  </tr>
  </table>
 