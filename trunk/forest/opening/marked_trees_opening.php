
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





//Timber detail array ends

if(!isset($markList) || empty($markList)){

	echo "<tr><td colspan=2 align='center'>No Record Entered</tr>";

}
else{
	?>
<tr>
	<td><b>Tree Name</b></td>
	<?php

	foreach($catList as $cat)
	{
		?>
	<td><b><?php echo $cat->vc_name; ?></b></td>
	<?php
	}

	?>
	<td>Total Count</td>
	<td>Total Volume</td>
	<td>Royalty</td>
	<td>Total Royality</td>
</tr>
	<?php
	$totaCount=0;
	$catTotal = array();
	foreach($markList as $tree=>$detail){
		$totaCount=0;
		?>
<tr>
	<td valign="top"><b><?php echo $treeList[$tree]->vc_name;?></b></td>
	<?php
	foreach($catList as $cat)
	{
		$totaCount+=$detail[$cat->id]->i_value;
		$catTotal[$cat->id]+=$detail[$cat->id]->i_value;


		?>
	<td><?php echo ($detail[$cat->id]->i_value=='' ? '0' : $detail[$cat->id]->i_value); ?></td>
	<?php
	}
	$catTotal['total']+=$totaCount;
	$catTotal['volume']+=$volumneList[$tree]->i_tree_volume;
     $catTotal['royality']+=display_float($royalityList[$tree]['i_royality_price']*  $volumneList[$tree]->i_tree_volume) ;
	?>
	<td valign="top" style="text-align:right;"> <?php echo $totaCount;?></td>
	<td valign="top" nowrap style="text-align:right;"><?php echo display_float($volumneList[$tree]->i_tree_volume,3) ;?> m&sup3;</td>
	<td valign="top" nowrap style="text-align:right;">
	<?php echo display_float($royalityList[$tree]['i_royality_price']) ;?> Rs/m&sup3;
	</td>
	<td valign="top" nowrap style="text-align:right;"> 
	Rs. <?php echo display_float($royalityList[$tree]['i_royality_price']*  $volumneList[$tree]->i_tree_volume) ;?>
	</td>
	<td valign="top" style="text-align:right;">
	<table width='100%' cellpadding="0px" cellspacing="0px">
		<tr>
			<td valign="top"><a
				href='index.php?page=addMarkingOpeningDetil&markid=<?php echo $markDetailId;?>&treeid=<?php echo $tree ;?>' title="Edit the Marking and Royality details.">Edit</a>
			</td>
			<td><a href="javascript:confirmDelete('index.php?page=deleteTreeDetailOpening&markid=
				<?php echo $markDetailId;?>&treeid=<?php echo $tree ;?>');" title="Delete the Marking and Royality details.">Delete</a>
			</td>
		</tr>
	</table>
	
	</td>
</tr>
<tr>
	<td colspan='<?php echo count($catList)+3?>' align='right'>
	
	<?php
	//Added logic for fetching Tree Detail Starts
	$treeDetailSummary=$markDetail->getExistingDateWiseDetail($tree,$markDetailId);
	//print_r($treeDetailSummary);
	$arrAllcontractors=$common->getAllcontractors();
	if(count($treeDetailSummary) > 0)
	{
	?>
	<script>
	  document.getElementById("fillingLink<?php echo $tree ;?>").style.display="block";
	</script>
	<div style='border :1px solid green; display:none' id='fillingDetail<?php echo $tree ;?>'>
	<table width=70%>
		<tr> 
		    <td>Contractor</td> 
			<td>Month</td>
			<td>Year</td>
			<td>Total Volume</td>
			<td>Total Royalty</td>
			<td>&nbsp;</td>
		</tr>

		<?php
		foreach($treeDetailSummary as $treeDetail)
		{
			?>
		<tr>
		    <td><b><?php echo $arrAllcontractors[$treeDetail['i_contractor_id']]; ?></b></td>
			<td><b><?php echo $arrMonths[$treeDetail['month']];?></td>
			<td><b><?php echo $treeDetail['year'];?></td>
			<td><b><?php echo display_float($treeDetail['i_current_volume'],3);?></td>
			<td><a href='index.php?page=addtreeConversion&month=<?php echo $treeDetail['month']; ?>&year=<?php echo $treeDetail['year']; ?>&c_id=<?php echo $treeDetail['i_contractor_id']; ?>&treeId=<?php echo $tree ;?>&markId=<?php echo $markDetailId;?>' title="Edit the Marking and Royality details.">Edit</a> </td>
			<td>&nbsp;</td>
		</tr>
		<?php

		}
		?>
	</table>
	</div>
	<?php
	}
	//Added Logic for Fetching Conversion Detail Ends
	}
}
?>

</td>
</tr>
<tr>
	<td><b>Total </b></td>
	<?php
	foreach($catList as $cat)
	{
		?>
	<td><?php echo $catTotal[$cat->id];?></td>

	<?php
	}
	?>
	<td style="text-align:right;"><?php echo $catTotal['total'];?></td>
	<td style="text-align:right;"><?php echo display_float($catTotal['volume'],3);?> m&sup3;</td>
	<td>&nbsp;</td>
	<td nowrap style="text-align:right;">Rs. <?php echo display_float($catTotal['royality'],2);?></td>
</tr>

<script>

function confirmDelete(pageLocation)
{
	if(confirm("Are you  sure that you  want to delete ?"))
	{
		window.location=pageLocation;
	}
	
}
</script>
