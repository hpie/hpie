<?php 

$lotDetailList =$common->getAllLotDetail($lotNo);

?>

<form id='formSubmit' action="index.php">
	<br> &nbsp; <br> <input type='hidden' name='page'
		value='detailProgressReportMonthly' />
	<table>
		<tr>
			<td>Year</td>
			<td><select name='year' onclick="form.submit" >
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

			<td>Lot-No</td>
			<td>
			<select name='markId'>
			 <option "">All</option>
			     <?php 
			     foreach ($lotDetailList as $id=>$data)
			     {
			     	?>
			     	<option value='<?php echo $id;?>'> <?php echo $data['vc_lotno'];?>
			     	
			     	</option>
			     	<?php 
			     }
			     
			     ?>
			 </select>    
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

 function submitForm()
 {
  document.getElementById('formSubmit').submit();
 }
</script>