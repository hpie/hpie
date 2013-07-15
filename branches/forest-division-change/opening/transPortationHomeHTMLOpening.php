
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
  <a href='index.php?page=transportationEntryNewOpening&markId=<?php echo $markDetailId; ?>'>Add Opening</a>
 </td>
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
	      <td>
	        <a href='index.php?page=transportationEntryOpening&markId=<?php echo $detail['i_mark_id']; ?>&progressId=<?php echo $detail['id']; ?>'> Edit </a>
 	        </td>
	    </tr>
	  </table>
	</td>
	
	<td>
	  <table>
	    <tr>
	      <td>
	        <a href='index.php?page=deleteTransportationEntryOpening&markId=<?php echo $detail['i_mark_id']; ?>&progressId=<?php echo $detail['id']; ?>'> Delete </a>
 	        </td>
	    </tr>
	  </table>
	</td>
</tr>
	
	<?php 
}
}
?>