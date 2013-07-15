<script>

function loadSelectForest()
{
var xmlhttp;
if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
   }
else
   {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
  xmlhttp.onreadystatechange=function()
   {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("fl").innerHTML=xmlhttp.responseText;
    }
  }
  var dfoId=document.getElementById("i_department_id").value;
  var fileCall='../ajax_call.php?get=fs&depid='+dfoId;

  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}
</script>
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
					<td valign='top' align='left' width='20%' class='label'>Department</td>
					<td valign='top' align='left' width='80%'>
						<?php echo $db->makeSelectOptions($arrDepartment,"i_department_id",$i_department_id,"loadSelectForest");?>
						
					</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Forest</td>
					<td valign='top' align='left' width='80%'>
					<div id="fl">
					<?php echo $db->makeSelectOptions($arrForests,"i_forest_id",$i_forest_id);?>
					</div>	
					</td>
				</tr>
				
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Forest</td>
					<td valign='top' align='left' width='80%'>
					<div id="fl">
					<?php echo $db->makeSelectOptions($overHeadType,"i_overhead_type",$i_overhead_type);?>
					</div>	
					</td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='20%' class='label'>Value Type</td>
					<td valign='top' align='left' width='80%'>
					<div id="fl">
					<?php echo $db->makeSelectOptions($arrAllValueType,"i_value_type",$i_value_type);?>
					</div>	
					</td>
				</tr>
				
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Overhead Entity Name</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='vc_name' value ='<?=$vc_name;?>'></td>
				</tr>
				<tr class='odd'>
					<td valign='top' align='left' width='20%' class='label'>Overhead Entity Default Value</td>
					<td valign='top' align='left' width='80%'><input type ='text' name='vc_value' value ='<?=$vc_value;?>'></td>
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