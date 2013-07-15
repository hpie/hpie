<?php 

$lotDetailList =$common->getAllLotDetail($lotNo);

$allDivisions=$common->getAllOption('m_division');

?>

<form id='formSubmit' action="index.php">
	<br> &nbsp; <br> <input type='hidden' name='page'
		value='detailProgressReport' />
	<table>
		<tr>
			<td>Year</td>
			<td><select name='year'  >
					<option value='2011'>Select Year</option>
					<option value='2008'>2008</option>
					<option value='2009'>2009</option>
					<option value='2010'>2010</option>
					<option value='2011'>2011</option>
					<option value='2012'>2012</option>
					<option value='2013'>2013</option>
			</select></td>
		</tr>
		
		<tr>

			<td>Division</td>
			<td>
			<select name='division' id='division' onchange="loadSelectlots();">
			   <option value=''>All</option>
			     <?php 
			     foreach ($allDivisions as $id=>$data)
			     {
			     	?>
			     	<option value='<?php echo $id;?>'> <?php  echo $data;?>
			     	
			     	</option>
			     	<?php 
			     }
			     
			     ?>
			 </select>    
			</td>
		</tr>
		
		<tr>

			<td>Lot-No</td>
			<td>
			<div id='lotNumbers'>
			<select name='markId'>
			   <option value=''>All</option>
			     <?php 
			     foreach ($lotDetailList as $id=>$data)
			     {
			     	?>
			     	<option value='<?php echo $id;?>'> <?php  echo $data['vc_lotno'];?>
			     	
			     	</option>
			     	<?php 
			     }
			     
			     ?>
			 </select>    
			</div>
			</td>
		</tr>
		
		
		<tr>
		 <td colspan="2">
		     <input type='Submit' value='Fetch Data' />
		 </td>
		</tr>
	</table>

</form>


<script>

function loadSelectlots()
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
    document.getElementById("lotNumbers").innerHTML=xmlhttp.responseText;
    }
  }
  var dfoId=document.getElementById("division").value;
  var fileCall='ajax_call.php?get=selectlots&division='+dfoId;

  xmlhttp.open("GET",fileCall,true);
  xmlhttp.send();
}



 

		
</script>
