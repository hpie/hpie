<?php 
$uid = $_SESSION["uid"];
?>
<table width="100%" style="">
	<tr>
		<td><a href="home.php?uid=<?php echo $uid?>">Home</a></td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=null">Manage</a></td>
		
		<td><a href="import-emp.php?uid=<?php echo $uid?>">Import Employee</a></td>
		<td><a href="import-empdetails.php?uid=<?php echo $uid?>">Import Employee Detail</a></td>
		<td><a href="import-pension.php?uid=<?php echo $uid?>">Import HPSEB Pension</a></td>
		<td><a href="import-bank-pension.php?uid=<?php echo $uid?>">Import Bank Pension</a></td>
		<td><a href="report.php?uid=<?php echo $uid?>">Reconsilation Report</a></td>
		<td><a href="#?uid=<?php echo $uid?>">Change Password</a></td>
		<td><a href="#?uid=<?php echo $uid?>">Manage User</a></td>
		<td><a href="logout.php">Log Out</a></td>
	</tr>
</table>