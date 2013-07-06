<table width='100%' align='center' cellpadding='2' cellspacing='2'
	border='0'>
	<form name='add_page' id='add_page' method='POST' action=''
		enctype='multipart/form-data'>
	<tr class='even'>
		<td valign='top' align='center' colspan='2' class='tableHeader'><?=$Label;?></td>
	</tr>
	<?if(is_array($arrError) && count($arrError)){?>
	<tr class='odd'>
		<td valign='top' align='left' colspan='2' class='error'><?foreach($arrError as $error){?>
		<?=$error;?><br />
		<?}?></td>
	</tr>
	<?}?>
	<tr class='even'>
		<td valign='top' align='left' width='20%' class='label'>Forest</td>
		<td valign='top' align='left' width='80%' colspan="7"><?=$db->makeSelectOptions($arrAllForests,"i_forest_id",$i_forest_id);?>
		</td>
	</tr>
	<tr class='even'>
		<td valign='top' align='left' width='20%' class='label'>Timber</td>
		<td>
		<table>
			<tr>
			<?php
			foreach ($arrAllTimbers as $timberId=>$value )
			{
				?>
				<td><?=$value;?></td>
				<?php
			}
			?>
			</tr>
			<tr>
			<?php
			foreach ($arrAllTimbers as $timberId=>$value )
			{
				?>
				<td><input style="width: 50px" width="40px" type='text' name='price[<?php echo $timberId;?>]'
					value='<?=$arrprice[$timberId];?>'></td>
					<?php
			}
			?>
			</tr>
		</table>
		</td>
	</tr>
	
	
	<tr class='odd'>
		<td valign='top' colspan='2' align='center'><input type='button'
			class='btnReset' name='back' id='back' value='Back'
			onClick='javascript:history.back(-1);'> <input type='hidden'
			name='id' id='id' value='<?=$id;?>'> <input type='submit'
			class='btnSubmit' name='submit' id='submit' value='Submit'></td>
	</tr>
	</form>
</table>
<br />
