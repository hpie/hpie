<div id="profileheader">

<table align="center">
<tr>
	<td colspan=2 style="color:#FF0000"><b><? echo $_SESSION['empMsg'];$_SESSION['empMsg']='';?></b> </td>
</tr>

<tr>
	<td>
		<h2>Welcome : <?=$row[0]['first_name'].' '.$row[0]['last_name'];?></h2>
		Add new <a href="<?=BASE_URL?>index.php?page=markTrees" title="Enter Marking details">Marking Details</a> or choose from links below to update existing markings
	</td>
	<td>
		<h4> <a href="<?=BASE_URL?>index.php?page=logout" title="Logout"> Logout </a></h4>
	</td>
</tr>
<tr>
<td>
<form method='post'>
<table style="width: 240px" >
<tr>
	<td><input type='text'  name='search' id='search'
	    value='<?php echo $_SESSION['search'];?>'
	/></td>
	<td>
	 <input type='submit'  value ='Search'/>
	</td>
</table>
</form>

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
