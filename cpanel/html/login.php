<form name ='Login' action ='' method ='POST' onSubmit='return validateLoginForm();'>
<table width='100%' align ='center' cellpadding='1' cellspacing='1' style ='border:1px solid #316CA8'>
	<tr class='even'>
		<td valign='top' width='100%'>
			<table width='100%' align='center' cellpadding='4' cellspacing='2' border='0' bgcolor='#ffffff'>
				<tr class='even'><td valign='top' align='center' colspan='2' class='tableHeader'>Admin Login</td></tr>
				<?if(is_array($arrError) && count($arrError)){?>
					<tr class='odd'>
						<td>&nbsp;</td>
						<td valign='top' align='left' colspan='2' class='error'>		
							<?foreach($arrError as $error){?>
								<?=$error;?><br/>
							<?}?>	
					</td></tr>
				<?}?>
				<tr class='odd'>
					<td valign='top' align='left' width='30%' class='label'>Login</td>
					<td valign='top' align='left' width='70%'><input type ='text' class='loginField' name='login' id='login' value ='<?=$login?>' size='25' maxlength='50' autocomplete="off"></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' class='label'>Password</td>
					<td valign='top' align='left'><input type ='password' class='loginField' name='password' id ='password' value ='<?=$password?>' size='15' maxlength='15' autocomplete="off"></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' class='label'>Division</td>
					<td valign='top' align='left'>
						<?php echo(makeSelectOptions($divionLoginList, "division", "0", "", "", "")); ?>
					</td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' class='label'>&nbsp;</td>
					<td valign='top' align='left'>
						<input type ='hidden'  name='loginSubmitted' value ='1'>						
						<input type ='reset' class='btnSubmit' name='reset' id ='reset' value ='Reset'>
						<input type ='submit' class='btnSubmit' name='submit' id ='submit' value ='Submit'>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<br/>