<?
	session_start();	
	require_once("../../config.php");
	//$admin  = $_SESSION['sessAdminName'];
	$date	= date('F d, Y (l) H:i:s A');
	//include("check-login.php");
	
?>
<style>
.toplabel{
	color:#ffffff;
	font-family:arial,helvetica,sans-serif;
	font-size:13px;
	text-decoration:none;	
}
.logOff{
	color:#9C3236;	
}
</style>
<body bgcolor='#557BA0'>
<table width='98%' align='center' cellpadding='0' cellspacing='0' border='0'>
	<tr>
		<td valign='top' colspan='5' align='right' class='toplabel'><?=$date;?></td>
	</tr>
	<tr>
		<td><a href ='<?=BASE_URL?>' target ='_blank' style ='color:#ffffff;text-decoration:none;' title ='View Front Panel'>View Front Panel</td>
		<td align='center' class='toplabel'><?php echo $adminTitle?></td>
		 <td align='left'><div  class='toplabel' style='font-weight:bold'>Welcome <?=$_COOKIE['sessAdminName'];?></div></td>
		<? if(isset($_COOKIE['sessAdminName'])){?>
			<td><a href='../change_password.php' style='text-decoration:underline;' class='toplabel' target='basefrm'>Change Password</a></td>
			<td align='left'>
			<div><a href='../logout.php' style='font-weight:bold;text-decoration:underline;' class='logOff' target='_top'> Log off</a></div>
			</td>
		<?}?>
	</tr>
</table>
</body> 