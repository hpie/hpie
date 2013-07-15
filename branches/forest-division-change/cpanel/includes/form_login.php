<form name ='Login' action ='' method ='POST' onSubmit='return validateLoginForm();'>
	<tr class='even'> 
		<td valign='top' align ='center' width='100%'> 
			<table width='99%' align='center' cellpadding='4' cellspacing='2' border='0' bgcolor='#ffffff' style ='border:2px solid #999999;'> 
<tr class='even'><td colspan='2' align='center' valign='top' class='tableHeader style6' bgcolor="666666">Client Login</td>
</tr>
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
					<td valign='top' align='right' width='30%' class='label'>Email</td>
					<td valign='top' align='left' width='70%'><input type ='text' class='loginField' name='email' id='email' value ='<?=$email;?>' size='25' maxlength='50' autocomplete="off"></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='right' class='label'>Password</td>
					<td valign='top' align='left'><input type ='password' class='loginField' name='password' id ='password' value ='<?=$password;?>' size='25' maxlength='25' autocomplete="off"></td>
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
</form>
<br/>
  </div>
</div>