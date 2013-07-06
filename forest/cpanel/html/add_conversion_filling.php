<table width='100%' align ='center' cellpadding='2' cellspacing='2' border='0'>
	<form name ='add_page' id ='add_page'method ='POST' action ='' enctype='multipart/form-data'>
		<tr class='even'>
			<td valign='top' align='center' colspan='2' class='tableHeader'><?=$Label;?></td>
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
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Forest</td>
					<td valign='top' align='left' width='80%'>
						<?=$db->makeSelectOptions($arrAllForests,"i_forest_id",$i_forest_id);?>	
					</td>
				</tr>
				
			     <tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>
					<table cellpadding="4" cellspacing="2">
						  <tr>
						   <td class='label'>
                            Category
						   </td>
						   </tr>
						   <tr>
						   <td class='label'>
                            Conversion %
						   </td>
						   </tr>
						   <tr>
						   <td class='label'>
                            Filling Charges
						   </td>
                          </tr>
                            <tr>
						   <td class='label'>
                            Conversion Charges
						   </td>
                          </tr>
                          </table>
						  </td>
					<td valign='top' align='left' width='80%'><table>
					   <tr>
					    <?foreach($arrAllCategories as $key=>$value){?>  
					     <td>
						 <table>
						  <tr>
						   <td>

						   <?=$value;?>
						   </td>
                          </tr>
						  <tr>
						   <td>
						   <input  style="width:50px" type="text" name="conversion[<?=$key?>]" id="conversion[<?=$key?>]" value="<?=$arrValues[$key]['i_conversion'];?>" onblur="outFocus(this)" onfocus="getFocus(this);"/>
						   </td>
                          </tr>
						  <tr>
						   <td>
						   <input  style="width:50px" type="text" name="filling[<?=$key?>]" id="filling[<?=$key?>]" value="<?=$arrValues[$key]['i_felling_charges'];?>" onblur="outFocus(this)" onfocus="getFocus(this);"/>
						   </td>
                          </tr>
                          <tr>
						   <td>
						   <input  style="width:50px" type="text" name="conversionCharges[<?=$key?>]" id="conversionCharges[<?=$key?>]" value="<?=$arrValues[$key]['i_conversion_charges'];?>" onblur="outFocus(this)" onfocus="getFocus(this);"/>
						   </td>
                          </tr>
						 </table>
					     </td>
					    <?}?>
					  </tr>
					 </table>
					
					</td>
				</tr>
				
				
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Value Type</td>
					<td valign='top' align='left' width='80%'>
						<?=$db->makeSelectOptions($arrAllValueType,"i_value_type",$i_value_type);?>	
					</td>
				</tr>
				
					
				<tr class='odd'>
					<td valign='top' colspan='2' align='right'>
						<input type ='button'  class='btnReset' name='back' id ='back' value ='Back' onClick='javascript:history.back(-1);'>
						<input type ='hidden' name ='id' id ='id' value ='<?=$id;?>'>
						<input type ='submit' class='btnSubmit' name='submit' id ='submit' value ='Submit'>
				</td>
	</tr>
</form>
</table>
<br/>
<script>
function outFocus(control)
{
	if(control.value=='')
	{
		control.value='0';
	}
}
function getFocus(control)
{
	if(control.value=='0')
	{
		control.value='';
		
	}
}
</script>