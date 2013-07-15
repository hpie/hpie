<table class='innerTable' width='100%' align ='center' cellpadding='2' cellspacing='2'>
<form name ='add_page' id ='add_page'method ='POST' action =''>
		<tr class='even'>
			<td valign='top' align='center' colspan='2' class='tableHeader'><?=$pageLabel?></td>
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
					<td valign='top' align='left' width='30%' class='label'>Page Title</td>
					<td valign='top' align='left' width='70%'><input type ='text' name='title' value ='<?=$title;?>'></td>
				</tr>
				
				<!-- <tr class='odd'>
					<td valign='top' align='left' width='30%' class='label'>Show Page Link In</td>
					<td valign='top' align='left' width='70%'>
						<? /*foreach($arrDisplayPages as $k=>$v){
							$checked = "";
							if(in_array($k,$arrDisplayPagesValues)){
								$checked = "checked";
							}
							echo "<input ".$checked." type ='checkbox' name='display_in[".$k."]' value='".$k."'>".$v;	
						}*/?>
					</td>
				</tr> -->
				<tr class='even'>
					<td valign='top' align='left' class='label' colspan='2'>Content</td>
				</tr>	
				<tr class='odd'>
					<td valign='top' align='left' colspan='2'>
						<?php  $oFCKeditor->Create();?>
					</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' class='label' colspan='2'>Meta Title</td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' colspan='2'>
					<textarea class="mceNoEditor textarea_small" name='meta_title' rows ='6' cols='85'><?=stripslashes($meta_title);?></textarea></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' class='label' colspan='2'>Meta Keywords</td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' colspan='2'>
					<textarea class="mceNoEditor textarea_small" name='meta_keyword' rows ='6' cols='85'><?=stripslashes($meta_keyword);?></textarea></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' class='label' colspan='2'>Meta Description</td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' colspan='2'>
					<textarea class="mceNoEditor textarea_small" name='meta_description' rows ='6' cols='85'><?=stripslashes($meta_description);?></textarea></td>
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