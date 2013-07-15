<?php


//Fetching the Lots Details
  $arFieldValues['i_mark_id']=$markDetailId;
  $arFieldValues['i_contractor_id']=$i_contractor_id;
  $arFieldValues['vc_month']=$i_month_id;
  $arFieldValues['vc_year']=$i_year;
  
  $lotNo=$_GET['markId'];
  $lotDetailList =$common->getAllLotDetail(  $lotNo);

  $year=$_REQUEST['year'];		
   $_SESSION['year']=$year;  
       
       
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

.borderBottomLight
{
border-bottom:  1px solid 	#333333;;
border-top:  1px solid 	#333333;;
height:1px;
padding: 0 0 0 0 px;

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
width: 1px;

}

</style>
<br/>
&nbsp;
&nbsp;
 <h2>Progress Report(Proforma-2) for year <?php echo $year?></h2>
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

  
  <td colspan="3" align="center" class='completeBorder'>
    Felling Opening
  </td>
  
  <td colspan="3" align="center" class='completeBorder'>
    Felling During the Year
  </td>
  <td colspan="3" align="center" class='completeBorder'>
    Felling Total
  </td>
   <td colspan="3" align="center" class='completeBorder'>
   Conversion Opening
   </td>
  
   <td colspan="3" align="center" class='completeBorder'>
   Conversion During the Year</td>
  
  <td colspan="3" align="center" class='completeBorder'>
    Conversion Total
  </td>
  
   <td colspan="3" align="center" class='completeBorder'>
    Conversion Total
  </td>
  
  
  
 
  
  </tr>
  
  <tr style="completeBorder">
 
 
  <td colspan="5">
   </td>
  <td class='completeLeft completeRight' colspan="3">
   </td>
   
  
  <td class='completeLeft completeRight' colspan="3">
  <td class='completeLeft completeRight' colspan="3">
  <td class='completeLeft completeRight' colspan="3"></td>
   
   <td class='completeLeft completeRight' colspan="3">
  <td class='completeLeft completeRight' colspan="3">
  <td class='completeLeft completeRight' colspan="3"></td>
   <td class='completeLeft completeRight' colspan="3"></td>
 
   
  <tr >
  <td colspan="5">
  </td>
  <td align="center" class='completeLeft'>
   Count
  </td>
  <td align="center"  >
   Vol
  </td>
  <td align="center" class='completeRight' >
  Amount
  </td>
  
  <td align="center" >
   Count
  </td>
  <td align="center"  >
   Vol
  </td>
  <td align="center"  class='completeRight'>
  Amount
  </td>
  
  <td>
    Count
  </td>
  <td align="center"  >
   Vol
  </td>
  <td align="center"  class='completeRight'>
  Amount
  </td>
  <td align="center" class='completeLeft'>
   Count
  </td>
  <td align="center"  >
   Vol
  </td>
  <td align="center" class='completeRight' >
  Amount
  </td>
  
  <td align="center" >
   Count
  </td>
  <td align="center"  >
   Vol
  </td>
  <td align="center"  class='completeRight'>
  Amount
  </td>
  
  <td>
    Count
  </td>
  <td align="center"  >
   Vol
  </td>
  <td align="center"  class='completeRight'>
  Amount
  </td>
  <td>
    Count
  </td>
  <td align="center"  >
   Vol
  </td>
  <td align="center"  class='completeRight'>
  Amount
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
   <td class='completeLeft completeRight' colspan="3">
   <td class='completeLeft completeRight' colspan="3">
   <td class='completeLeft completeRight' colspan="3"></td>
 <td class='completeLeft completeRight' colspan="3">
   <td class='completeLeft completeRight' colspan="3">
   <td class='completeLeft completeRight' colspan="3"></td>
 <td class='completeLeft completeRight' colspan="3"></td>
  
  </tr>
	<?php 
	$markDetail =  new MarkDetailDO();
	$markedTreeList=$markDetail->getMarkedTreesOnly($key);
	
	
	
	
	//Block For Fetching Progress Detail 
	
	$fellingCurrent=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'1');
	
	$fellingPrevious=$markDetail->getProgressFellingTreeWiseYearBased($key,$year,'-1');
	
	$conversionCurrent=$markDetail->getConversionTreeWiseYearBased($key,$year,'1');
	
	$conversionPrevious=$markDetail->getConversionTreeWiseYearBased($key,$year,'-1');
	
	
	foreach ($markedTreeList as $treeId=>$TreeName)
	{
		$feelingTotalVolume=0;
		$feelingTotalCount=0;
		$royalityVolume;
		$markingEntryTotal=0;
		$markingEntryVolumeTotal=0;
		
		?>
		<tr class='borderBottomLight'>
		<td colspan="4">
		 </td>
		 <td>
		    <?php echo $TreeName;?>
		 </td>
 	    <td class='completeLeft'>
		    <?php echo ($fellingPrevious[$treeId]['i_count'] == '' ? '0' :$fellingPrevious[$treeId]['i_count']) ;
		    $feelingTotalCount+=$fellingPrevious[$treeId]['i_count'];
		    ?>
		 </td>
		 <td  >
		    <?php echo display_float($fellingPrevious[$treeId]['i_volumne'],3);
		    $feelingTotalVolume+=display_float($fellingPrevious[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 <td class='completeRight'>
		 </td>
		 
		 
		 <td >
		    <?php echo ($fellingCurrent[$treeId]['i_count'] == '' ? '0' :$fellingCurrent[$treeId]['i_count']) ;
		    $feelingTotalCount+=$fellingCurrent[$treeId]['i_count'];
		    ?>
		 </td>
		 <td>
		    <?php echo display_float($fellingCurrent[$treeId]['i_volumne'],3);
		    $feelingTotalVolume+=display_float($fellingCurrent[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 <td class='completeRight'>
		 </td>


		<td><?php echo $feelingTotalCount ;
		?>
		</td>
		<td><?php echo $feelingTotalVolume;?>
		</td>
		<td class='completeRight'></td>
		
		
		
		<!-- Converion  Opening -->
		
		<td class='completeLeft'>
		    <?php echo ($conversionPrevious[$treeId]['i_count'] == '' ? '0' :$conversionPrevious[$treeId]['i_count']) ;
		    $conversionTotalCount+=$conversionPrevious[$treeId]['i_count'];
		    ?>
		 </td>
		 <td  >
		    <?php echo display_float($conversionPrevious[$treeId]['i_volumne'],3);
		    $conversionTotalVolume+=display_float($conversionPrevious[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 <td class='completeRight'>
		 </td>
		
		<!-- Converion  Yearly -->
		<td class='completeLeft'>
		    <?php echo ($conversionCurrent[$treeId]['i_count'] == '' ? '0' :$conversionCurrent[$treeId]['i_count']) ;
		    $conversionTotalCount+=$conversionCurrent[$treeId]['i_count'];
		    ?>
		 </td>
		 <td  >
		    <?php echo display_float($conversionCurrent[$treeId]['i_volumne'],3);
		    $conversionTotalVolume+=display_float($conversionCurrent[$treeId]['i_volumne'],3);
		    ?>
		 </td>
		 <td class='completeRight'>
		 </td>
		
		
		<!-- Converion  Total -->
		
		<td><?php echo $conversionTotalCount ;
		?>
		</td>
		<td><?php echo $conversionTotalVolume;?>
		</td>
		<td class='completeRight'></td>
		
		<td><?php echo $feelingTotalCount-$conversionTotalCount ;
		?>
		</td>
		<td><?php echo $feelingTotalVolume-$conversionTotalVolume;
		$conversionTotalCount=0;
		$conversionTotalVolume=0;
		?>
		</td>
		<td class='completeRight'></td>

	</tr>
  	 
	<?php 
		
	}
	?>
	<tr>
	<?php
	for($i=0;$i<=29 ;$i++)
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


?>
</table>