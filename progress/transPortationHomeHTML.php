
<script>

  function  displayTimber(id)
  {
   document.getElementById('fillingDetail'+id).style.display="block";
   document.getElementById(id+"Display").style.display="none";
   document.getElementById(id+"Hide").style.display="block";
   }
  function  hideTimber(id)
  {
   document.getElementById('fillingDetail'+id).style.display="none";
   document.getElementById(id+"Display").style.display="block";
   document.getElementById(id+"Hide").style.display="none";
  }
</script>
<?php
//Timber detail aarray start
if(!isset($_GET['f'])){
	removeFromSession('treeConversionArray');
}



/* start code update by priyanka 9/2/2011*/

if($_GET['page']=='markCompleteDetail'){
	//timber detail access start
	foreach ($markTressDetails as $key=>$value)
	{
		if($key> 0)
		{
			$timberDetail =  new TimberDO();
			$timberDetailArray=$timberDetail->getTimberDetail($key,$markDetailId);
			$treeConversionArray[$key]=$timberDetailArray;
		}
		$_SESSION['treeConversionArray']=serialize($treeConversionArray);
	}
	//timber detail access end
}




//Timber detail array ends

?>
<tr>
<td colspan="2">
  <a href='index.php?page=fellingHome&markId=<?php echo $markDetailId; ?>'>Felling</a>
 </td>
 <td colspan="2">
  <a href='index.php?page=conversionHomeStep1&markId=<?php echo $markDetailId; ?>'>Tree Converted</a>
 </td>
 <td colspan="2">
  <a href='index.php?page=conversionHome&markId=<?php echo $markDetailId; ?>'>Conversion Obtained</a>
 </td>
 
 <?php 
   if($fromRSD==1)
   {
   	?>
  <td colspan="2">
 
 <a href='index.php?page=transportationHome&markId=<?php echo $markDetailId; ?>'>
 
 Carriage Home</a> </td>
  <td colspan="2">
  
  Transportation  Home
 </td>
  <?php  	
   }
   else
   {
   	?>
<td colspan="2">
 
 
 
 Carriage Home</td>
  <td colspan="2">
  <a href='index.php?page=transportationHomefromRSD&markId=<?php echo $markDetailId; ?>'>
  Transportation  Home
  </a>
 </td>
   	<?php 
   }
 ?>
   
 
</tr>	
<tr>

 
<?php
if($fromRSD==1)
{
	?>
<td colspan="2">
  <a href='index.php?page=transportationEntryfromRSD&markId=<?php echo $markDetailId; ?>'>Add Master</a>
</td>
	<?php 
}
else
{
	?>
	<td colspan="2">
	<a href='index.php?page=transportationEntry&markId=<?php echo $markDetailId; ?>'>Add Master</a>
	</td>
	<?php	
	
}

?>
 
</tr>
<?php 
if(!isset($markList) || empty($markList)){

	echo "<tr><td colspan=2 align='center'>No Record Entered</tr>";

}
else{
	

	?>
	
<tr>
	<td><b>Month</b></td>
	<td><b>Year</b></td>
	</tr>
<?php 
foreach($markList as $detail){
	
	?>
<tr>
	<td><b><?php echo $arrMonths[$detail['vc_month']]; ?></b></td>
	<td><b><?php echo $arrYears[$detail['vc_year']]; ?></b></td>
	<td>
	  <table>
	    <tr>
				<?php
				if($fromRSD==1)
				{
					?>
				<td><a
					href='index.php?page=transportationEntryfromRSD&markId=<?php echo $detail['i_mark_id']; ?>&progressId=<?php echo $detail['id']; ?>'>
						Edit </a>
				</td>
				<?php 
				}
				else
				{
					?>
				<td><a
					href='index.php?page=transportationEntry&markId=<?php echo $detail['i_mark_id']; ?>&progressId=<?php echo $detail['id']; ?>'>
						Edit </a>
				</td>
				<?php
}
 	  ?>


			</tr>
	  </table>
	</td>

	<td>
	  <table>
	    <tr>
	      <td>
	        <a  onclick="displayAlert('index.php?page=deleteTransportationEntry&markId=<?php echo $detail['i_mark_id']; ?>&progressId=<?php echo $detail['id']; ?>');"> Delete </a>
 	        </td>
	    </tr>
	  </table>
	</td>
</tr>
	
	<?php 
}
}
?>

<script>

function displayAlert(loctions)
{
	
	var myconfirmation=confirm("Delete will delete all the rows , Please confirm");;
   
   if(myconfirmation)
   {
	   window.location=loctions;
   }	
}
</script>