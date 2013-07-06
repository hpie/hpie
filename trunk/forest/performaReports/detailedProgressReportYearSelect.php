<?php 

if(isset($_GET['submit'])){
	
	echo 'Page--Submitted...???';
	
	extract($_GET);
	echo $page;
	$page=$reportType;
	if($page==1)
	{
		ob_end_clean();
		header("location:index.php?page=performa1&markId=".$_REQUEST['markId']."&year=".$year);
		
	}
	else if($page==2)
	{
		ob_end_clean();
		header("location:index.php?page=performa2&markId=".$_REQUEST['markId']."&year=".$year);
		
	}
	else if($page==3)
	{
		ob_end_clean();
		header("location:index.php?page=performa3&markId=".$_REQUEST['markId']."&year=".$year);
		
	}
	else if($page==4)
	{
		ob_end_clean();
		header("location:index.php?page=performa4&markId=".$_REQUEST['markId']."&year=".$year);
		
	}
	else if($page==5)
	{
		ob_end_clean();
		header("location:index.php?page=performa5&markId=".$_REQUEST['markId']."&year=".$year);
		
	}
	
}


$lotDetailList =$common->getAllLotDetail($lotNo);
?>

<form id='formSubmit' action="index.php" >
	<br> &nbsp; <br> <input type='hidden' name='page'
		value='permormaReport' />
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
			</td>
		</tr>

		<tr>

			<td>Performa Type</td>
			<td>
			<select name='reportType' onclick="form.submit" >
					<option value='1'>Select Year</option>
					<option value='1'>Performa-1</option>
					<option value='2'>Performa-2</option>
					<option value='3'>Performa-3</option>
					<option value='4'>Performa-4</option>
					<option value='5'>Performa-5</option>
			</select>  
			</td>
		</tr>
		
		<tr>
		 <td colspan="2">
		     <input type='Submit' value='Fetch Data' name='submit' />
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