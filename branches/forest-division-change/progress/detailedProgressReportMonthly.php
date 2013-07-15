	<?php


//Fetching the Lots Details
  $arFieldValues['i_mark_id']=$markDetailId;
  $arFieldValues['i_contractor_id']=$i_contractor_id;
  $arFieldValues['vc_month']=$i_month_id;
  $arFieldValues['vc_year']=$i_year;
  
  $lotNo=$_GET['markId'];
  $division=$_GET['division'];
  $lotDetailList =$common->getAllLotDetail($lotNo,$division);

   $year=$_REQUEST['year'];
 		
      
       
       
?>
<style>
.treetotal
{
	background-color:#999999;
	color:white;
}

.classtotal
{
	background-color:#666666;
	color:white;
}

.overalltotal
{
	background-color:#333333;
	color:red; 
}

.headrow
{
	background-color:#aaaaaa;
}
.evenrow
{
	background-color:#cccccc;
}

.oddrow
{
	background-color:#eeeeee;
}

.completeBorder
{
	border-left:1px solid 	#333333;
	border-right: 1px solid 	#333333;
}

.completeLeft
{
	border-left:1px solid 	#333333;
}
.completeRight
{
	border-right: 1px solid 	#333333;
}

.borderBottom
{
 border-bottom:  1px solid 	#333333;;
 padding: 0 0 0 0 px;
}
.tableWithoutPadding
{
 padding: 0 0 0 0 px;

}
.fillcolor
{
background-color:#333333;
width: 2px;

}

</style>
<br/>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<br/>
<div>
  <h1>Progress Report for year <?php echo $year?></h1>

   <a href='index.php?page=detailProgressReportMonthlyxls&year=<?php echo $year?>&markId=<?php echo $lotNo;  ?>'  target=_blank> Export</a> <br>
   
   <a href='javascript:displyAll()' onclick="javascript:displyAll()"> Display All</a>

</div>
<script>

function display(id)
{
	document.getElementById(id).style.display="block";
}
function displyAll()
{
	<?php 
			  foreach ($arrMonths as $month=>$description )
			  {
			?>
			document.getElementById('<?php echo $description; ?>').style.display="block";
			<?php 
				}
			?>	
}
</script>
<?php 
$previousCount=0;
$prevYearTotalCount=0;
$previousYearTotalVolume=0;
$flag=0;
  foreach ($arrMonths as $month=>$description )
  {
  	$previousCount++;
?>

<div style='display:block ;border: 1px solid black' >
   <a href="javascript:display('<?php echo $description?>')" onclick="javascript:display('<?php echo $description?>')"><?php echo $description ;?></a>
</div>
&nbsp;
<div style='display:block ;' id='<?php echo $description; ?>'>
<table cellpadding="0px" cellspacing="0px">
  <tr class="headrow">
  <td>
    Name Of Forest
  </td>
  
  <td>
    Name Of Unit
  </td>
  
  <td>
    Lot-Vol
  </td>
  <td title="Date of taken out of the lot">
    Start Date
  </td>
  <td>
    Specis
  </td>
  <td colspan="2" align="center" class='completeBorder'>
    Standing Values Marking
  </td>
  <td colspan="6" align="center">
    Felling Of Trees
  </td>
  <td colspan="2" align="center">
    Balance To Be Filled
  </td>
  
  <td colspan="6" align="center" > 
    Timber Obtained At Conversion
  </td>
  
  <td colspan="2" align="center">
    Timber At Varous Heads
  </td>
  
  </tr>
  
  <tr style="completeBorder">
  <td colspan="7">
  </td>
  <td colspan="2" align="center" class='completeLeft'>
    Previous
  </td>
  <td colspan="2" align="center">
   Current
   </td>
  <td colspan="2" align="center" class='completeRight'>
   Total
   </td> 
   <td colspan="2" align="center" class='completeLeft completeRight'>
   </td>
   <td colspan="2" align="center" class='completeLeft'>
    Previous
  </td>
  <td colspan="2" align="center">
   Current
   </td>
  <td colspan="2" align="center" class='completeRight'>
   Total
   </td>
    <td align="center" class='completeLeft'>
    Head 
  </td>
  <td align="center" class='completeRight'>
     Volume
   </td>
  <tr >
  <td colspan="5">
  </td>
  <td align="center" class='completeLeft'>
   Numbers
  </td>
  <td align="center"  class='completeRight'>
   Vol
  </td>
  
  <td align="center">
   Numbers
  </td>
  <td align="center">
   Vol
  </td>
  <td align="center">
   Numbers
  </td>
  <td align="center">
   Vol
  </td>
  <td align="center">
   Numbers
  </td>
  <td align="center">
   Vol
  </td>
   <td align="center"  class='completeLeft'>
   Numbers
  </td>
  <td align="center">
   Vol
  </td>
  
  
  <td align="center" class='completeLeft'>
   Numbers
  </td>
  <td align="center">
   Vol
  </td>
  <td align="center">
   Numbers
  </td>
  <td align="center">
   Vol
  </td>
   <td align="center">
   Numbers
  </td>
  <td align="center" class='completeRight'>
   Vol
  </td>
   <td align="center">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
  <td align="center" class='completeRight'>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </td>
  
  </tr>
<?php 

foreach ($lotDetailList as $key=>$detail)
{
	
	?>
<tr >

  <td>
   <?php 	
        echo $detail['forest'];
    ?>
  </td>
  <td>
   <?php
   echo $detail['division'];
   
   ?>
  </td>
  <td>
    <?php 
      echo "Lot-No ".$detail['id']
    ?>
  </td>
  <td title="Date of taken out of the lot">
    <?php
    echo $detail['dt_created'];
    ?>
  </td>
  <td>
  </td>
  <td class='completeLeft completeRight' colspan="2">
   </td>
  <td class='completeLeft completeRight' colspan="6">
   </td>
  <td class='completeLeft completeRight' colspan="2">
   </td>
  <td class='completeLeft completeRight' colspan="6">
   </td>
  <td class='completeLeft completeRight' colspan="2">
   </td>
  
  </tr>
	<?php 
	$markDetail =  new MarkDetailDO();
	$markedTreeList=$markDetail->getMarkedTreesOnly($key);
	$markEntryVolume=$markDetail->getMarkIdVolumeSummarry($key);
	$markEntryCount=$markDetail->getMarkIdCountSummarry($key);
	
	
	//Block For Fetching Progress Detail 
	
	$fellingCurrent=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'1',$month);
	$fellingPrevious=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'-1',$month);
	
	
	$conversionDetailCurrent=$markDetail->getProgressConversionTreeWiseYearBased($key,$year,'1',$month);
	$conversionDetailPrevious=$markDetail->getProgressConversionTreeWiseYearBased($key,$year,'-1',$month);
	
	
	$allForestPoints=$common->getAllForestPoints($key);
	$allForestPoints1=array();
	$allForestPoints1[-1]="Forest";
	foreach ($allForestPoints as $pointId=>$name)
	{
		$allForestPoints1[$pointId]=$name;
	}
	$allForestPoints=$allForestPoints1;
	
	
	foreach ($markedTreeList as $treeId=>$TreeName)
	{
		
		$feelingTotalVolume=0;
		$feelingTotalCount=0;
		$conversionTotalCount=0;
		$conversionTotalVolume=0;
		?>
		<tr>
		<td colspan="4">
		 </td>
		 <td>
		    <?php echo $TreeName;?>
		 </td>
		 <td class='completeLeft'>
		    <?php echo $markEntryCount[$treeId]['i_value'] ; ?>
		 </td>
		 <td class='completeRight'>
		    <?php echo display_float($markEntryVolume[$treeId]->i_tree_volume,3);?>
		 </td>
		 
		 <td  >
		    <?php echo ($fellingPrevious[$treeId]['i_count'] == '' ? '0' :$fellingPrevious[$treeId]['i_count']) ;
		    $feelingTotalCount+=$fellingPrevious[$treeId]['i_count'];
		    ?>
		 </td>
		 <td >
		    <?php echo display_float($fellingPrevious[$treeId]['i_volumne'],3);
		    $feelingTotalVolume+=display_float($fellingPrevious[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 
		 
		 
		 <td>
		    <?php echo ($fellingCurrent[$treeId]['i_count'] == '' ? '0' :$fellingCurrent[$treeId]['i_count']) ;
		    $feelingTotalCount+=$fellingCurrent[$treeId]['i_count'];
		    ?>
		 </td>
		 <td>
		    <?php echo display_float($fellingCurrent[$treeId]['i_volumne'],3);
		    $feelingTotalVolume+=display_float($fellingCurrent[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		  <td >
		    <?php echo $feelingTotalCount ;
		    
		    ?>
		 </td>
		 <td class='completeRight'>
		    <?php echo $feelingTotalVolume;?>
		 </td>
		 
		  <td>
		    <?php echo $markEntryCount[$treeId]['i_value']-$feelingTotalCount ;
		    ?>
		 </td>
		 <td class='completeRight'>
		    <?php echo display_float($markEntryVolume[$treeId]->i_tree_volume,3)-$feelingTotalVolume;?>
		 </td>
		 
		 
		  
		 
		 
		 <td>
		    <?php echo ($conversionDetailPrevious[$treeId]['i_count'] == '' ? '0' :$conversionDetailPrevious[$treeId]['i_count']) ;
		    $conversionTotalCount+=$conversionDetailPrevious[$treeId]['i_count'];
		    ?>
		 </td>
		 <td>
		    <?php echo display_float($conversionDetailPrevious[$treeId]['i_volumne'],3);
		    $conversionTotalVolume+=display_float($conversionDetailPrevious[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 
		 <td>
		    <?php echo ($conversionDetailCurrent[$treeId]['i_count'] == '' ? '0' :$conversionDetailCurrent[$treeId]['i_count']) ;
		    $conversionTotalCount+=$conversionDetailCurrent[$treeId]['i_count'];
		    ?>
		 </td>
		 <td>
		    <?php echo display_float($conversionDetailCurrent[$treeId]['i_volumne'],3);
		    $conversionTotalVolume+=display_float($conversionDetailCurrent[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 
		 
		 <td>
		    <?php echo $conversionTotalCount;
		    ?>
		 </td>
		 <td  class='completeRight'>
		    <?php echo $conversionTotalVolume;;
		    ?>
		 </td>
		 <?php 
		//   if($conversionTotalVolume > 0)
		   {
		 ?>
		 <td colspan="2" align="center"  class='completeRight'>
		    <table  class=''>
		    <tr>
		      <td></td>
		      <td colspan="4">
		        Previous
		      </td>
		      <td colspan="4">
		        Current
		      </td>
		      <td colspan="2">
		        Total
		      </td>
		    </tr>
		    
		    <tr>
		      <td></td>
		      <td colspan="2">
		        In
		      </td>
		      <td colspan="2">
		        Out
		      </td>
		      <td colspan="2">
		        In
		      </td>
		      <td colspan="2">
		        Out
		      </td>
		      
		      <td colspan="2">
		        Total
		      </td>
		    </tr>
		    <tr>
		      <td></td>
		      <td>
		        Vol
		      </td>
		      <td>
		        Numbers
		      </td>
		      <td>
		        Vol
		      </td>
		      <td>
		        Numbers
		      </td>
		      
		      
		      <td>
		        Vol
		      </td>
		      <td>
		        Numbers
		      </td>
		      <td>
		        Vol
		      </td>
		      <td>
		        Numbers
		      </td>
		      <td>
		        Vol
		      </td>
		      <td>
		        Numbers
		      </td>
		    </tr>
		      <?php 
		      
		        
		         
		         foreach ($allForestPoints as $id=>$name)
		         {
		         	
		         	
		         	
		         	if($previousCount ==1)
		         	{
		         	
		         	if($id == '-1' || $id == '0' )
		         	{
		         		$previousDetailYear1=$markDetail->getForestPrevInOutY($key,$month,$year,$treeId);
		         	}
		         	else
		         	{
		         		$previousDetailYear1=$markDetail->getPointPrevInOutY($key,$month,$year,$id,$treeId);
		         	}
		         	
		         	$previousDetailYearResult[$treeId][$id] =$previousDetailYear1;
		         	
		         	
		         
		         	
		         	}
		         	
		         	
		         	
		         	$previousDetailYear=$previousDetailYearResult[$treeId][$id];
		         	
		         	
		         	
		         	$previousYearTotal=display_float((display_float($previousDetailYear[$treeId]['InVolume'],3)-display_float($previousDetailYear[$treeId]['OutVolume'],3)));
		         	$previousYearTotalCount=display_float((display_float($previousDetailYear[$treeId]['InCount'],3)-display_float($previousDetailYear[$treeId]['OutCount'],3)));
		         	
		         	//*/
		         	if($id == '-1' || $id == '0'  )
		         	{
		         		$timberInoutDetail=$markDetail->getForestInOut($key,$month,$year);
		         	}
		         	else
		         	{
		         		$timberInoutDetail=$markDetail->getPointInOut($key, $month,$year,$id);
		         	
		         	}
		         	
		         	$previousDetail= array();
		         	if($id == '-1' || $id == '0')
		         	{
		         		$previousDetail=$markDetail->getForestPrevInOut($key,$month,$year,$treeId);
		         	}
		         	else
		         	{
		         		$previousDetail=$markDetail->getPointPrevInOut($key,$month,$year,$id,$treeId);
		         		
		         	}
		         	
		         	
		         	?>
				<tr>
					<td><?php echo $name?></td>
					 
					<td >
					 <?php 
					 
					   if($previousDetail != '')
					   {
					   	
					   	
					   	echo display_float($previousDetail[$treeId]['InVolume'],3);
					      
					   }
					 ?>
					</td>
					<td >
					 <?php 
					
					   if($previousDetail != '')
					   {
					      echo display_float($previousDetail[$treeId]['InCount']);
					      
					   }
					 ?>
					</td>
					<td >
					 <?php 
					   if($previousDetail != '')
					   {
					      echo display_float($previousDetail[$treeId]['OutVolume'],3);
					      
					   }
					 ?>
					</td>
					<td >
					 <?php 
					   if($previousDetail != '')
					   {
					      echo display_float($previousDetail[$treeId]['OutCount']);
					      
					   }
					 ?>
					</td>
					<td>
					 <?php 
					
					    echo 
					      display_float($timberInoutDetail[$treeId]['InVolume'],3);
					 ?>
					</td>
					
					<td>
					 <?php 
					    echo 
					      display_float($timberInoutDetail[$treeId]['InCount']);
					 ?>
					</td>
					<td>
					 <?php 
					
					    echo 
					      display_float($timberInoutDetail[$treeId]['OutVolume'],3);
					 ?>
					</td>
					
					<td>
					 <?php 
					    echo 
					      display_float($timberInoutDetail[$treeId]['OutCount']);
					 ?>
					</td>
					
					 
					<td  ><?php
					echo display_float((display_float($timberInoutDetail[$treeId]['InVolume'],3)-display_float($timberInoutDetail[$treeId]['OutVolume'],3)) + 
							
							display_float(($previousYearTotal+display_float($previousDetail[$treeId]['InVolume'],3))-display_float($previousDetail[$treeId]['OutVolume'],3),3));
					
					
					
				
					
					?></td>
					
					<td  ><?php
					echo display_float((display_float($timberInoutDetail[$treeId]['InCount'],3)-display_float($timberInoutDetail[$treeId]['OutCount'],3)) +
							 display_float(($previousYearTotalCount+display_float($previousDetail[$treeId]['InCount'],3))-display_float($previousDetail[$treeId]['OutCount'],3),3));
					
					
					?></td>
				</tr>
				<?php 
		         }
		      ?>
		    </table>  
		 </td>
		 <?php 
		   }
		 ?>
		</tr>
   <tr>
   <?php 
     for($i=0;$i<=22 ;$i++)
     {
     ?>
     <td class='borderBottom fillcolor'   >
     </td>
     <?php 
     }
   ?>		 
</tr>		 
	<?php 
		
	}
}


?>
</table>
</div>
<?php
}
?>