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
					<td valign='top' align='left' width='20%' class='label'>Volume Table</td>
					<td valign='top' align='left' width='80%'>
						<?=$db->makeSelectOptions($arrVolumeTables,"i_table_id",$i_table_id);?>
						
					</td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Tree</td>
					<td valign='top' align='left' width='80%'>
						<?=$db->makeSelectOptions($arrAllTreeTypes,"i_tree_type_id",$i_tree_type_id);?>
					</td>
				</tr>
				
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Category</td>
					<td valign='top' align='left' width='80%'>
					<? /*echo '<pre>';
					   print_r($arrVolume);
					   echo '</pre>';*/
					?>
                     <table>
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
						   <input  style="width:50px" type="text" name="catVolume[<?=$key?>]" id="catVolume[<?=$key?>]" value="<?=$arrVolume[$key];?>" onblur="outFocus(this)" onfocus="getFocus(this);"/>
						   </td>
                          </tr>
						 </table>
					     </td>
					    <?}?>
					  </tr>
					 </table>
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