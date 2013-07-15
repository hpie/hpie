<link href="css/era404.css" rel="stylesheet" type="text/css" />

<table width='100%' align ='center' cellpadding='2' cellspacing='2' border='0'>
	<form name ='add_page' id ='add_page'method ='POST' action ='' enctype='multipart/form-data' >
		<tr class='even'>
			<td valign='top' align='center' colspan='2' class='tableHeader'><?=$userLabel;?></td>
		</tr>
				<?if(is_array($arrError) && count($arrError)){?>
					<tr class='odd'>
						<td valign='top' align='left' colspan='2' class='error'>		
							<?foreach($arrError as $error){?>
								<?=$error;?><br/>
							<?}?>	
						</td>
					</tr>
				<?}?>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>User Name</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='user_name' value ='<?=$user_name;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>First Name</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='first_name' value ='<?=$first_name;?>'></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Last Name</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='last_name' value ='<?=$last_name;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Email Address</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='email' value ='<?=$email;?>'></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Password</td>
					<td valign='top' align='left' width='80%'><input type ='password' name='password' value ='<?=$password;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Phone</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='phone_no' value ='<?=$phone_no;?>'> 10 Digit Long</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Mobile</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='mobile_no' value ='<?=$mobile_no;?>'> 10 Digit Long</td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Address</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='address' value ='<?=$address;?>'></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>City</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='city' value ='<?=$city;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>State</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='state' value ='<?=$state;?>'></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Zip Code</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='zip' value ='<?=$zip;?>'>6 Digit Long </td>
				</tr>
				
				<tr class='even'>
					<td valign='top' colspan='2' align='right'>
						<input type ='button'  class='btnReset' name='back' id ='back' value ='Back' onClick='javascript:history.back(-1);'>
						<input type ='hidden' name ='id' id ='id' value ='<?=$id;?>'>
						<input type ='submit' class='btnSubmit' name='submit' id ='submit' value ='Submit'>
				</td>
	           </tr>
			   
</form>

</table>
<br/>