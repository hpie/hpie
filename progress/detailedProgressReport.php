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
 <h1>Progress Report for year <?php echo $year?></h1>
&nbsp;
&nbsp;
<br/>
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
  
  <td colspan="6" align="center">
    Conversion of Trees
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
      echo "Lot-No ".$detail['vc_lotno']
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
	
	$fellingCurrent=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'1');
	$fellingPrevious=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'-1');
	
	
	//$conversionCurrent=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'1');
	//$conversionPrevious=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'-1');
	
	$conversionCurrent=$markDetail->getConversionTreeWiseYearBased($key,$year,'1');
	
	$conversionPrevious=$markDetail->getConversionTreeWiseYearBased($key,$year,'-1');
	
	
	$conversionDetailCurrent=$markDetail->getProgressConversionTreeWiseYearBased($key,$year,'1');
	$conversionDetailPrevious=$markDetail->getProgressConversionTreeWiseYearBased($key,$year,'-1');
	
	
	$allForestPoints=$common->getAllForestPoints($key);
	$allForestPoints1=array();
	$allForestPoints1[-1]="Forest";
	foreach ($allForestPoints as $pointId=>$name)
	{
		$allForestPoints1[$pointId]=$name;
	}
	$allForestPoints=$allForestPoints1;
	
	if(count($markedTreeList) == 0 )
	{
	?>	
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
	
	foreach ($markedTreeList as $treeId=>$TreeName)
	{
		$feelingTotalVolume=0;
		$feelingTotalCount=0;
		$conversionTotalCount=0;
		$conversionTotalVolume=0;
		$conversionTotalCountt=0;
		
		$conversionTotalVolumet=0;
	
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
		 
		 
		   <td  >
		    <?php echo ($conversionPrevious[$treeId]['i_count'] == '' ? '0' :$conversionPrevious[$treeId]['i_count']) ;
		    $conversionTotalCount+=$conversionPrevious[$treeId]['i_count'];
		    ?>
		 </td>
		 <td >
		    <?php echo display_float($conversionPrevious[$treeId]['i_volumne'],3);
		    $conversionTotalVolume+=display_float($conversionPrevious[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 
		 
		  <td  >
		    <?php echo ($conversionCurrent[$treeId]['i_count'] == '' ? '0' :$conversionCurrent[$treeId]['i_count']) ;
		    $conversionTotalCount+=$conversionCurrent[$treeId]['i_count'];
		    ?>
		 </td>
		 <td >
		    <?php echo display_float($conversionCurrent[$treeId]['i_volumne'],3);
		    $conversionTotalVolume+=display_float($conversionCurrent[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 
		 
		 <td>
		 <?php echo $conversionTotalCount;
		    ?>
		 </td>
		 <td  class='completeRight'>
		 <?php echo $conversionTotalVolume;
		    ?>
		 </td>
		 
		 
		 <td>
		    <?php echo ($conversionDetailPrevious[$treeId]['i_count'] == '' ? '0' :$conversionDetailPrevious[$treeId]['i_count']) ;
		    $conversionTotalCountt+=$conversionDetailPrevious[$treeId]['i_count'];
		    ?>
		 </td>
		 <td>
		    <?php echo display_float($conversionDetailPrevious[$treeId]['i_volumne'],3);
		    $conversionTotalVolumet+=display_float($conversionDetailPrevious[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 
		 <td>
		    <?php echo ($conversionDetailCurrent[$treeId]['i_count'] == '' ? '0' :$conversionDetailCurrent[$treeId]['i_count']) ;
		    $conversionTotalCountt+=$conversionDetailCurrent[$treeId]['i_count'];
		    ?>
		 </td>
		 <td>
		    <?php echo display_float($conversionDetailCurrent[$treeId]['i_volumne'],3);
		    $conversionTotalVolumet+=display_float($conversionDetailCurrent[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 
		 
		 <td>
		    <?php echo $conversionTotalCountt;
		    ?>
		 </td>
		 <td  class='completeRight'>
		    <?php echo $conversionTotalVolumet;;
		    ?>
		 </td>
		 
		 <td colspan="2" align="center"  class='completeRight'>
		    <table  class=''>
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
		    </tr>
		      <?php 
		      
		         foreach ($allForestPoints as $id=>$name)
		         {
		         	
		         	if($id == '-1' || $id == '0' )
		         	{
		         		$timberInoutDetail=$markDetail->getForestInOutDetail($key,$year);
		         	}
		         	else
		         	{
		         		$timberInoutDetail=$markDetail->getPointInOutDetail($key, $id,$year);
		         	}
		         	
		         	$previousDetail= array();
		         	if($id == '-1' || $id == '0' )
		         	{
		         		$previousDetail=$markDetail->getForestPrevInOutDetail($key,$year,$treeId);
		         		
		         	}
		         	else
		         	{
		         		$previousDetail=$markDetail->getPointPrevInOutDetail($key,$year,$id,$treeId);
		         		
		         	}
		         	
		         
		         	
		         	
		         	
		         	?>
		         	
				<tr>
					<td>
					
					<?php 
					
					echo $name?></td>
					 
					<td >
					
		         	
					 <?php 
					
					   if($previousDetail != '')
					   {
					      echo display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']);
					      
					   }
					 ?>
					</td>
					<td >
					 <?php 
					   if($previousDetail != '')
					   {
					      echo display_float($previousDetail[$treeId]['InCount']-$previousDetail[$treeId]['OutCount']);
					      
					   }
					 ?>
					</td>
					
					<td>
					 <?php 
					    echo 
					      display_float($timberInoutDetail[$treeId]['InVolume']-$timberInoutDetail[$treeId]['OutVolume'],3);
					 ?>
					</td>
					
					<td>
					 <?php 
					    echo 
					      display_float($timberInoutDetail[$treeId]['InCount']-$timberInoutDetail[$treeId]['OutCount'],3);
					 ?>
					</td>
					 
					<td  ><?php
					echo display_float((display_float($timberInoutDetail[$treeId]['InVolume'],3)-display_float($timberInoutDetail[$treeId]['OutVolume'],3)) + display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']),3);
					?></td>
					
					<td  ><?php
					echo display_float((display_float($timberInoutDetail[$treeId]['InCount'],3)-display_float($timberInoutDetail[$treeId]['OutCount'],3)) + display_float($previousDetail[$treeId]['InCount']-$previousDetail[$treeId]['OutCount']),3);
					?></td>
				</tr>
				<?php 
		         }
		      ?>
		    </table>  
		 </td>
		</tr>
   <tr>
   <?php 
     for($i=0;$i<=28 ;$i++)
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