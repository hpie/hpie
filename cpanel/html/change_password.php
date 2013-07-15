<form name='changePassword' method ='POST' action =''>
	<table width='50%' align='center' cellpadding='2' cellspacing='2' class='table' border='0'>
		<?
			if($msgStatus)
			{
			?>
				<tr>
					<td align='center' colspan='4' class='success'><?=$message;?></td>
				</tr>
			<?
			}
			if($errorStatus)
			{
			?>
				<tr>
					<td align='center' colspan='4' class='error'><?=$errorMsg;?></td>
				</tr>
			<?
			}
		?>
		<tr class='even'>
			<td align='center' class='title' colspan='4'><?=$passwordTitle;?></td>
		</tr>
		<tr class='odd'>
		<td align='left' class='title1' nowrap='nowrap' valign='top'>Old Password</td>
		<td align='center' valign='top'>:</td>
		<td align='left' valign='top'><input type='test' name='oldPassword' value ='' size='40' maxlength='40'></td>
	</tr>
	<tr class='even'>
		<td align='left' class='title1' nowrap='nowrap' valign='top'>New Password</td>
		<td align='center' valign='top'>:</td>
		<td align='left' valign='top'><input type='text' name='newPassword' size='40' value =''	 maxlength='40'></td>
	</tr>
	<tr class='odd'>
		<td align='center' colspan='4' valign='top'>
			<input type='hidden' name='passwordSubmitted' value='1'>
			<input type='hidden' name='userID' value='<?=$userID;?>'>
			<input type='button' class='btnSubmit' name='back' value='Back' onClick="javascript:history.back();">
			<input type='submit' class='btnSubmit' name='submit' value='<?=$submitLabel;?>'>
		</td>
	</tr>
</table>
</form>