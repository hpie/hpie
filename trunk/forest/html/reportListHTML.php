<?if(!empty($arrRecords)){?>

<form name='manageLots' method='POST' action =''>
<table width='100%' align='center' cellpadding='4' cellspacing='0' border='0'>
		<tr>
			<td colspan='8'><? $paging->displayPaging();?></td>
		</tr>
	      
			<tr style="background-color: #aaaaaa;font-weight: bold;">
				<td><a href="index.php?page=profile&ob=lot&o=<?=$lorderlink?>" title="Sort by Lot id">Lot No.</a></td>
				<td><a href="index.php?page=profile&ob=division&o=<?=$dorderlink?>" title="Sort by division id">Division Name</a></td>
				<td><a href="index.php?page=profile&ob=forest&o=<?=$forderlink?>" title="Sort by forest id">Forest Name</a></td>
				<td>Marking Summary</td>
				<td>Economics Summary</td>
				<td>Estimated Economics Summary</td>
				<td>Progress Report</td>
				
				
				
			</tr>
		<?
		
		$srNo = $page+1;	
		
		$coonversionPending=0;
    	$overheadePending=0;
    	$rowStyleOdd="style='background-color: #eeeeee;'";
    	$rowStyleEven="style='background-color: #cccccc;'";
    	$row=0;
		foreach($arrRecords as $records){
			$id				    = $records['id'];	
			$i_division_id	    = $records['i_division_id'];
			$i_forest_id     	= $records['i_forest_id'];
			$dt_fromDate	    = $records['dt_fromDate'];
			$dt_toDate     	    = $records['dt_toDate'];
			$forest_name        =$flist[$i_forest_id]->vc_name;
            $div_name           =$divionList[$i_division_id];
            $forest_area		=$records['f_area'];
			
			$coonversionPendingHTML = "Pending"; 
	        $overheadePendingHTML   = "Pending";
		
		   if($records['i_conversion_status'] ==1)
		    {
			 $coonversionPending=0;
			 $coonversionPendingHTML="Done";
		    }
		  if($records['i_overhead_status'] ==1)
		    {
			$overheadePending=0;
			$overheadePendingHTML="Done";
		    }

			$row++;
		?>
			
			<tr <? if($row%2==0){echo $rowStyleEven;}else{echo $rowStyleOdd;} ?>>
				<td >Lot&nbsp;No.<?=$id;?></td>
				<td ><?=$div_name;?></td>
				<td ><?=$forest_name;?></td>
				<td><a href="indexThickBox.php?page=markSummaryReport&markId=<?=$id;?>TB_iframe=true&height=480&width=1024"
					class="thickbox" title="Marking Summary Report" target="_blank" >
				     View</a></td>
				 <td><a href="indexThickBox.php?page=ecomonicsSummaryReport&markId=<?=$id;?>TB_iframe=true&height=480&width=1024" 
				 	class="thickbox" title="Economics Summary Report" target="_blank" >
				     View</a></td>    
				<td><a href="indexThickBox.php?page=ecnomicreportsdetail&markId=<?=$id;?>TB_iframe=true&height=480&width=1024"
				 	class="thickbox" title="Estimated Economics Summary Report" target="_blank" >
				     View</a></td>   
				 <td><a href="indexThickBox.php?page=actualEcmonicsReport&markId=<?=$id;?>TB_iframe=true&height=480&width=1024"
				 	class="thickbox" title="Progress Report" target="_blank" >
				     View</a></td>    
				
				
				</tr>
		<?
			
	} 
	?>
	
	<?
	?>
	</table>
	</form>
	<?
}

	
	?>
