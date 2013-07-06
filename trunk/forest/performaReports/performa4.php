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
 <h2>Progress Report(Proforma-4) for year <?php echo $year?></h2>
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
    Opening Balance
  </td>
  
  <td colspan="4" align="center" class='completeBorder'>
    Received During the Year
  </td>
  <td colspan="3" align="center" class='completeBorder'>
    Grand Total
  </td>
   <td colspan="9" align="center" class='completeBorder'>
   Transportation to Various locations
   
   </td>
  
   <td colspan="3" align="center" class='completeBorder'>
   Total Transfer
   </td>
  
   <td colspan="3" align="center" class='completeBorder'>
    Balance Total
  </td>
  
  
  
 
  
  </tr>
  
  <tr style="completeBorder">
 
 
  <td colspan="5">
   </td>
  <td class='completeLeft completeRight' colspan="3">
   </td>
   
  
  <td class='completeLeft completeRight' colspan="4">
  <td class='completeLeft completeRight' colspan="3">
  <td class='completeLeft completeRight' colspan="9"></td>
   
  
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
  <td align="center"  >
  Amount
  </td>
   <td align="center"  class='completeRight'>
  Expenses
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
  <td class='completeLeft completeRight' colspan="9">
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
   <td class='completeLeft completeRight' colspan="4">
   <td class='completeLeft completeRight' colspan="3"></td>
 <td class='completeLeft completeRight' colspan="9">
 
 <td class='completeLeft completeRight' colspan="3"></td>
  <td class='completeLeft completeRight' colspan="3"></td>
  </tr>
	<?php 
	$markDetail =  new MarkDetailDO();
	$markedTreeList=$markDetail->getMarkedTreesOnly($key);
	
	
	$allForestPoints=$common->getAllForestPoints($key);
	
	$allForestPoints=$common->getAllForestPointsonType($key, 2);
	
	
	//Block For Fetching Progress Detail 
	
	
	
	$carriageDetail=$markDetail->getCarriageDetail($key,$year,'-1');
	$carriageOpening=$markDetail->getCarriageDetailOpening($key,$year,'-1');
	
	
	
	$totalTransfer=$markDetail->getTotalTransfer($key,$year,'-1');
	

	foreach ($markedTreeList as $treeId=>$TreeName)
	{
	
		
		?>
		<tr class='borderBottomLight'>
		<td colspan="4">
		 </td>
		 <td class='completeRight'>
		    <?php echo $TreeName;?>
		 </td>
 	    
		<td><?php 
		
		
		echo $carriageOpening[$treeId]['i_count'];
		$conversionTotalCount1+=($carriageOpening[$treeId]['i_count']);
		?>
		</td>
		<td><?php echo 
		display_float($carriageOpening[$treeId]['i_volumne'],3);
		$conversionTotalVolume1+=display_float($carriageOpening[$treeId]['i_volumne'],3);
		?>
		</td>
		 
		 <td class='completeRight'>
		 </td>
		<td><?php 
		echo $carriageDetail[$treeId]['i_count'];
		$conversionTotalCount1+=$carriageDetail[$treeId]['i_count'];
		?>
		</td>
		<td><?php echo 
		display_float($carriageDetail[$treeId]['i_volumne'],3);
		$conversionTotalVolume1+=display_float($carriageDetail[$treeId]['i_volumne']);

		?>
		</td>
		<td>
		 </td>
<td class='completeRight'>
		 </td>

		 <td>
		    <?php echo $carriageOpening[$treeId]['i_count']+$carriageDetail[$treeId]['i_count'];;
		    ?>
		 </td>
		 <td  >
		    <?php echo display_float($carriageOpening[$treeId]['i_volumne']+$carriageDetail[$treeId]['i_volumne'],3);;;;
		    ?>
		 </td>
		<td class='completeRight'></td>
		
		
		
		<!-- Converion  Opening -->
		
			 <td colspan="9" align="center"  class='completeRight'>
		    <table  class=''>
		     <tr>
		      <td></td>
		      <td colspan=2 class='completeRight completeLeft'>
		        Previous
		      </td>
		      <td colspan=2 class='completeRight completeLeft'>
		        Current
		      </td>
		       <td colspan=2 class=''>
		        Total
		       </td>
		    </tr>
		    <tr>
		      <td></td>
		      <td class='completeLeft'>
		        Vol
		      </td>
		      <td class='completeRight'>
		        Count
		      </td>
		      <td>
		        Vol
		      </td>
		      <td class='completeRight'>
		        Count
		      </td>
		      <td>
		        Vol
		      </td>
		      <td>
		        Count
		      </td>
		    </tr>
		      <?php 
		      
		         foreach ($allForestPoints as $id=>$name)
		         {
		         	
		         	if($id == -1 || $id == 0  )
		         	{
		         		$timberInoutDetail=$markDetail->getForestInOutDetail($key,$year);
		         		;
		         	}
		         	else
		         	{
		         		$timberInoutDetail=$markDetail->getPointInOutDetail($key, $id,$year);
		         	}
		         	
		         	$previousDetail= array();
		         	if($id == -1 || $id == 0 )
		         	{
		         		$previousDetail=$markDetail->getForestPrevInOutDetail($key,$year,$treeId);
		         	}
		         	else
		         	{
		         		$previousDetail=$markDetail->getPointPrevInOutDetail($key,$year,$id,$treeId);
		         	}
		         	
		         	?>
				<tr>
					<td><?php echo $name?></td>
					 
					<td class='completeLeft'>
					 <?php 
					   if($previousDetail != '')
					   {
					      echo display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']);
					      
					   }
					 ?>
					</td>
					<td class='completeRight'>
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
					
					<td class='completeRight'>
					 <?php 
					    echo 
					      display_float($timberInoutDetail[$treeId]['InCount']-$timberInoutDetail[$treeId]['OutCount'],3);
					 ?>
					</td>
					 
					<td  ><?php
					echo display_float((display_float($timberInoutDetail[$treeId]['InVolume'],3)-display_float($timberInoutDetail[$treeId]['OutVolume'],3)) + display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']),3);
					if($id == -1 || $id == 0 )
					{
					$balance['InVolume']=display_float((display_float($timberInoutDetail[$treeId]['InVolume'],3)-display_float($timberInoutDetail[$treeId]['OutVolume'],3)) + display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']),3);
					}
					else
					{
						$carriage['InVolume']=display_float((display_float($timberInoutDetail[$treeId]['InVolume'],3)-display_float($timberInoutDetail[$treeId]['OutVolume'],3)) + display_float($previousDetail[$treeId]['InVolume']-$previousDetail[$treeId]['OutVolume']),3);
						
					}
					
					?></td>
					
					<td  ><?php
					echo display_float((display_float($timberInoutDetail[$treeId]['InCount'],3)-display_float($timberInoutDetail[$treeId]['OutCount'],3)) + display_float($previousDetail[$treeId]['InCount']-$previousDetail[$treeId]['OutCount']),3);
					if($id == -1 || $id == 0 )
					{
						$balance['InCount']=display_float((display_float($timberInoutDetail[$treeId]['InCount'],3)-display_float($timberInoutDetail[$treeId]['OutCount'],3)) + display_float($previousDetail[$treeId]['InCount']-$previousDetail[$treeId]['OutCount']),3);
					}
					
					?></td>
				</tr>
				<?php 
		         }
		         
		        
		         
		      ?>
		    </table>  
		 </td>
	
		<td>
		
		<?php 
		
		echo $totalTransfer[$treeId]['i_count'];
		?>
		</td>
		<td><?php echo 
					     display_float($totalTransfer[$treeId]['i_volumne'],3);
	
		?>
		</td>
		<td class='completeRight'></td>
	
	<td>
		    <?php echo $carriageOpening[$treeId]['i_count']+$carriageDetail[$treeId]['i_count']-$totalTransfer[$treeId]['i_count'];
		    ?>
		 </td>
		 <td  >
		    <?php echo display_float($carriageOpening[$treeId]['i_volumne']+$carriageDetail[$treeId]['i_volumne'],3)-display_float($totalTransfer[$treeId]['i_volumne'],3);
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