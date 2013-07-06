<link href="css/era404.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="../css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="../js/calendarDateInput.js"></script>
<style>
 select {
  width:auto !important;
 }
</style>
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
					<td valign='top' align='left' width='20%' class='label'>Contractor Name</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='contractor_name' value ='<?=$contractor_name;?>'></td>
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
				<!-- 
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Password</td>
					<td valign='top' align='left' width='80%'><input type ='password' name='password' value ='<?=$password;?>'></td>
				</tr>
			 -->
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Bank Name</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='bankname' value ='<?=$bankname;?>'></td>
				</tr>
			<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Bank A/C No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='accountnumber' value ='<?=$accountnumber;?>'>10 digit</td>
				</tr>
			<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Branch</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='branch' value ='<?=$branch;?>'>10 digit</td>
				</tr>
					<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>NEFT No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='nfntno' value ='<?=$nfntno;?>'></td>
				</tr>
			
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Phone No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='phone' value ='<?=$phone;?>'>10 digit</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Fax No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='fax' value ='<?=$fax;?>'>10 digit</td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Cell No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='mobile' value ='<?=$mobile;?>'>10 digit</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Address</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='address' value ='<?=$address;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>City</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='city' value ='<?=$city;?>'></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>State</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='state' value ='<?=$state;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Zip</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='zip' value ='<?=$zip;?>'>6 digit</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Pan No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='pan' value ='<?=$pan;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>GPF/EPF No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='gf' value ='<?=$gf;?>'></td>
				</tr>
				
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Registration No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='registration' value ='<?=$registration;?>'></td>
				</tr>
				
				
				
				
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'> Labour Licence No</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='license' value ='<?=$license;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Licence Expiration Date</td>
					<td valign='top' align='left' width='80%'>
					<?if(isset($licence_exp_date) && $licence_exp_date!=''){?>
					 <script>DateInput('licence_exp_date', true, 'DD-MM-YYYY','<?php echo $licence_exp_date;?>')</script>
					 <?}else{?>
					  <script>DateInput('licence_exp_date', true, 'DD-MM-YYYY')</script>
					  <?}?>
					</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Contrator Class</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='contractor_class' value ='<?=$contractor_class;?>'></td>
				</tr>
				<tr class='even'>
					<td valign='top' colspan='2' align='right'>
						<input type ='button'  class='btnReset' name='back' id ='back' value ='Back' onClick='javascript:history.back(-1);'>
						<input type ='hidden' name ='id' id ='id' value ='<?=$id;?>'>
						<input type ='hidden' name ='joined_on' id ='joined_on' value ='<?=$joined_on;?>'>
						<input type ='submit' class='btnSubmit' name='submit' id ='submit' value ='Submit'>
				</td>
	           </tr>
			   
</form>

</table>
<br/>