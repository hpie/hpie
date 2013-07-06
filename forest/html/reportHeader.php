<div id="profileheader">

<table align="center">
<tr>
	<td colspan=2 style="color:#FF0000"><b><?= $_SESSION['empMsg']?></b> </td>
</tr>

<tr>
	<td>
		<h2>Welcome : <?=$row[0]['first_name'].' '.$row[0]['last_name'];?></h2>
		 Choose from report links to View
	</td>
</tr>


<!-- 
<tr>
	<td><h2? <b><?//= USER_NAME?></b> :</td>
	<td><?//=$row[0]['user_name'];?></td>
</tr>
<tr>
	<td><b><?//= FIRST_NAME?></b> :</td>
	<td><?//=$row[0]['first_name'].' '.$row[0]['last_name'];?></td>
</tr>
<tr>
	<td><b><?//= LAST_NAME?></b> :</td>
	<td><?//=$row[0]['last_name'].' '.$row[0]['last_name'];?></td>
</tr>
<tr>
	<td><b><?//= EMAIL?></b> :</td>
	<td><?//=$row[0]['email'];?></td>
</tr>
-->
</table>
