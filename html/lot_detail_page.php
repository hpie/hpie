<?if(!empty($arrRecords)){?>

<form name='manageLots' method='POST' action =''>
<table style='width:1024px' align='center' cellpadding='4' cellspacing='0' border='0'>
		<tr>
			<td colspan='8'><? $paging->displayPaging();?></td>
		</tr>
	      
			<tr style="background-color: #aaaaaa;font-weight: bold;">
				<td><a href="index.php?page=profile&ob=lot&o=<?=$lorderlink?>" title="Sort by Lot id">Lot No.</a></td>
				<td><a href="index.php?page=profile&ob=division&o=<?=$dorderlink?>" title="Sort by division id">Division Name</a></td>
				<td><a href="index.php?page=profile&ob=forest&o=<?=$forderlink?>" title="Sort by forest id">Forest Name/VolumeTable</a></td>
				<td><a href="index.php?page=profile&ob=fd&o=<?=$fdorderlink?>" title="Sort by From Date">From Date</a></td>
				<td><a href="index.php?page=profile&ob=td&o=<?=$tdorderlink?>" title="Sort by To Date">To Date</a></td>
				
				<td>Area</td>
				
				
				<td>Opening</td>
				
				<td>Generate Economics</td>
				<td>View</td>
				<td>Entry Status</td>
				<td>Progress Entry</td>
				<td>View Progress Reports</td>
				<td>Manage Inventory</td>
				<td>Inventory Reports</td>
				
			</tr>
		<?
		
		$srNo = $page+1;	
		
		$coonversionPending=0;
    	$overheadePending=0;
    	$fixedPending=0;
    	$fixedMessage=0;
    	
    	$rowStyleOdd="style='background-color: #eeeeee;'";
    	$rowStyleEven="style='background-color: #cccccc;'";
    	$row=0;
		foreach($arrRecords as $records){
			$id				    = $records['id'];
			$lotno 				=$records['vc_lotno'];	
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
		    
		  if($records['i_fixed_status'] ==0)
		    {
			$fixedPending=0;
    		$fixedMessage="<a href=\"index.php?page=fixedEntry&markId=".$id."\" title='Marked Entry As Fixed for Lot No ".$id."'>Mark As Fixed</a>";
		    }
		    else {
		    $fixedPending=0;
    		$fixedMessage="Fixed";
		    
		    }
		    

			$row++;
		?>
			
			<tr <? if($row%2==0){echo $rowStyleEven;}else{echo $rowStyleOdd;} ?>>
				<td ><a href="index.php?page=markCompleteDetailStep1&markId=<?=$id;?>" title="Edit/View Marking details"><?=$lotno;?></a></td>
				<td ><?=$div_name;?></td>
				<td ><?=$forest_name;?>/<?= $arrVolumeTables[$records['i_table_id']];?></td>
				<td><?=$dt_fromDate;?></td>
				<td><?=$dt_toDate;?></td>
				<td><?=$forest_area;?></td>
				<td>
				<a href="index.php?page=openingHome&markId=<?=$id;?>" title="Add/Edit Opening Detail" target="_self">Add Opening Detail</a></td>
				
				<td><a href="indexThickBox.php?page=economicselector&markId=<?=$id;?>&TB_iframe=true&height=480&width=1024&modal=true" 
					class="thickbox"  title="Generate Economics" target="_blank">Generate Economics</a></td>
				<td><a href="indexThickBox.php?page=ecnomicreports&markId=<?=$id;?>TB_iframe=true&height=480&width=1024"
			    	class="thickbox"  title="View Economics" target="_blank">View Economics </a></td>
				<td><?= $fixedMessage?></td>
				<td><a href="index.php?page=fellingHome&markId=<?=$id;?>" title="Add/Edit Progress details" target="_self">Add Progress</a></td>
				<td><a href="index.php?page=progressReportDetail&markId=<?=$id;?>" title="View Progress details" target="_self">View Progress Reports</a></td>
				<td><a href="index.php?page=inventoryHome&markId=<?=$id;?>" title="Manage Sock/Inventory" target="_self">Add Inventory</a></td>
				<td><a href="indexThickBox.php?page=inventoryLocationReport&markId=<?=$id;?>TB_iframe=true&height=480&width=1024" 
				    class="thickbox"  title="View Inventory details" target="_blank">View Inventory</a></td>
				
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
