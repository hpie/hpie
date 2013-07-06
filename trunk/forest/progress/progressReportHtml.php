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
#reportTable td
{
    border-color: #600;
    border-width: 1px 1px 0 0;
    border-style: solid;
    margin: 0;
    padding: 4px;
    background-color: #FFC;
}
</style>
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

<?php
if(!isset($markList) || empty($markList)){

	echo "<tr><td colspan=2 align='center'>No Record Entered</tr>";

}
else{


	?>
<div  style='width: 280px;padding-left:0px;'>
<?php 

if($economicsId == '')
{
$common->generateForm ($_SERVER,$pageKey,$markDetailId,0);
}
else 
{
$common->generateForm ($_SERVER,$pageKey,$markDetailId,$economicsId);
}
?>	
</div>
<table style='width: 400px;'>
	<tr>
		<td colspan="2"><a
			href='indexThickBox.php?page=progressFellingDetailReport&markId=<?php echo $markDetailId; ?>&TB_iframe=true&height=480&width=1024'
			 title="Felling Report - Detailed" class="thickbox" target="_blank">View Felling Details</a></td>
		<td colspan="2"><a
			href='indexThickBox.php?page=progressConversionDetailReport&markId=<?php echo $markDetailId; ?>&TB_iframe=true&height=480&width=1024'
			title="Conversion Summary" class="thickbox" target="_blank">View Conversion Summary</a></td>
		<td colspan="2"><a
			href='indexThickBox.php?page=progressConversionTimberReport&markId=<?php echo $markDetailId; ?>&TB_iframe=true&height=480&width=1024'
			title="Conversion Report - Detailed" class="thickbox" target="_blank">View Conversion Details</a></td>
		
		<td colspan="2"><a
			href='index.php?page=transportationReportDetail&markId=<?php echo $markDetailId; ?>' title="Transortation Report - Detailed" target="_blank">View Transportation Details</a></td>	
	</tr>
</table>
<table id='reportTable'>
	
	<tr>
		<td><b>Tree</b></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan='2' ><b> Ecomonics</b></td>
		
		<td  colspan='5'><b>Progressed</b></td>
	
		<td colspan='2'><b>Royality</b></td>
		
		<td colspan="2"><b>Progressed - Charges </b></td>
		
		<td><b>Ecomonics</b></td>
		<td><b>Progressed</b></td>
	</tr>
	<tr>
		<td><b>Tree</b></td>
		<td><b>Marked Volume</b></td>
		<td><b>Ecomonics Volume</b></td>
		<td><b>Felling Charges</b></td>
		<td><b>Conversion Charges</b></td>

		<td><b>Standing Count</b></td>
		<td><b>Felled Count </b></td>
		<td><b>Felled Volume </b></td>
		<td><b>Converted Units </b></td>
		<td><b>Converted Volume </b></td>
		<td><b>Per cum</b></td>
		<td><b>Total </b></td>
		<td><b>Felling Charges </b></td>
		<td><b>Conversion Charges </b></td>
		<td><b>Total Charges</b></td>
		<td><b>Total Charges</b></td>
	</tr>
	<?php
	$ecnomicsTotal;
	$actualTotal;
	$total =  array();
	foreach($markedTreeList as $key=>$category){

 
		?>
	<tr>
		<td><?php echo $category; ?></b></td>
		<td><?php $total['markVolume']+=($markEntryDetail[$key]->i_value); echo display_float($markEntryDetail[$key]->i_value,3); ?></b></td>
		<td style="text-align:right;"><?php 
		$total['ecnomicsVolume']+=($markEntryDetail[$key]->i_economics_volume);
		echo display_float($markEntryDetail[$key]->i_economics_volume,3); ?></b></td>
		<td style="text-align:right;"><?php 
		$total['fellingCharges']+=($markEntryDetail[$key]->i_felling_charges);
		echo display_float($markEntryDetail[$key]->i_felling_charges,2); ?></b></td>
		<td style="text-align:right;">&nbsp;</td>

		<td style="text-align:right;">
		<?php 
	;
		echo $markCountList[$key]['i_value']-$fellingDetail[$key]['i_count'];;?>
		
		</b></td>
		
		<td style="text-align:right;"><?php 
		$total['fellingCount']+=$fellingDetail[$key]['i_count'];
		echo $fellingDetail[$key]['i_count'];?></b></td>
		<td style="text-align:right;"><?php 
		$total['fellingVolume']+=$fellingDetail[$key]['i_volumne'];
		echo display_float($fellingDetail[$key]['i_volumne'],3);?></b></td>
		<td style="text-align:right;"><?php 
		$total['conversionCount']+=$conversionDetail[$key]['i_count'];
		echo $conversionDetail[$key]['i_count'];?></b></td>
		<td style="text-align:right;"><?php 
		$total['conversionVolume']+=display_float($conversionDetail[$key]['i_volumne'],3);
		echo display_float($conversionDetail[$key]['i_volumne'],3);?></b></td>
		
		<td style="text-align:right;" class="headrow">
		<?php 
		echo display_float($royalityList[$key]['i_royality_price'],2);
		?></td>
		<td style="text-align:right;" class="headrow"
		title="Marked Volume * Royality(Per cum)"
		>
		<?php 
		$total['totalRoyality']+=display_float($royalityList[$key]['i_royality_price'],2) * $markEntryDetail[$key]->i_value;
		echo display_float($royalityList[$key]['i_royality_price'] * $markEntryDetail[$key]->i_value);
		?>
		</td>
		
		
		<td style="text-align:right;"><?php 
		$total['fellingcharges']+=display_float($fellingDetail[$key]['i_felling_charges'],2);
		echo display_float($fellingDetail[$key]['i_felling_charges'],2);?></b></td>
		<td style="text-align:right;"><?php 
		$total['conversionCharges']+=display_float($conversionDetail[$key]['i_conversion_charges'],2);;
		
		
		echo display_float($conversionDetail[$key]['i_conversion_charges'],2);?></b></td>
		<td align="right" ><b><?php   
		 $ecnomicsTotal+=display_float($markEntryDetail[$key]->i_felling_charges+$markEntryDetail[$key]->i_conversion_charges,2); 
		 //echo display_float($markEntryDetail[$key]->i_felling_charges+$markEntryDetail[$key]->i_conversion_charges,2); ?></b></td>

		<td align="right" ><b><?php $actualTotal+=(display_float($fellingDetail[$key]['i_felling_charges'],2)+display_float($conversionDetail[$key]['i_conversion_charges'],2)); echo (display_float($fellingDetail[$key]['i_felling_charges'],2)+display_float($conversionDetail[$key]['i_conversion_charges'],3));?></b></td>

	</tr>

	<?php
	}
	?>
<tr class="headrow">
	<td >  Total</td>
	<td align="right"><b><?php echo display_float($total['markVolume'],3);?></b></td>
	<td align="right"><b><?php echo display_float($total['ecnomicsVolume'],3);?></b></td>
	<td align="right"><b>SCT</b></td>
	
	<td align="right"><b><?php echo display_float($total['fellingCharges'],2);?></b></td>
	<td align="right"><b>
	<div  id='converionDiv' style='position:absolute;z-index:123;display:none'>
	<table id='convTable'>
	<tr class="headrow">
	
		<td colspan="3">Converion Charges</td>
		<td align="right">
		<a href="javascript:hide('converionDiv');">
		 [X]</a>
		</td>
	</tr>

<?php 
$converionCharges=0;
foreach ( $getRateDetail as $id=> $converionDetail)
{
	?>
	
	<tr>
		<td colspan="3"><?php echo $converionDetail['vc_name'] ?></td>
		
		
		<td align="right" ><?php $totalChargesOver+=($overHeadCharges+$comission);
			 echo display_float($converionDetail['i_totalConversionCharge']); 
			 $converionCharges+=$converionDetail['i_totalConversionCharge']	;	
			 ?></td>
			
		<?php
}	
?>
<tr class="headrow">
		<td colspan="3">Total</td>
		<td align="right"><?php 
		   echo  display_float($converionCharges);
		?></td>
	</tr>
	</table>
	</div>
	<a href='javascript:return false;' onmouseover='display("converionDiv");' >
	<?php echo display_float($converionCharges,2);?></b>
	 </a>
	</td>
	<td align="right"><b><?php echo display_float($total['fellingCount'],0);?></b></td>
	<td align="right"><b><?php echo display_float($total['fellingVolume'],3);?></b></td>
	<td align="right"><b><?php echo display_float($total['conversionCount'],0);?></b></td>
	<td align="right"><b><?php echo display_float($total['conversionVolume'],3);?></b></td>
	<td align="right" class="headrow">
		&nbsp;</td>
		<td style="text-align:right;" class="headrow">
		<b><?php 
		echo display_float($total['totalRoyality']);
		?>
		</b></td>
	
	<td align="right" >
	<a
			href='indexThickBox.php?page=progressFellingDetailReport&markId=<?php echo $markDetailId; ?>&TB_iframe=true&height=480&width=1024'
			 title="Felling Report - Detailed" class="thickbox" target="_blank">
			 <?php echo display_float($total['fellingcharges'],2);?></a>
		</td>
	<td align="right"  >
	<a
			href='indexThickBox.php?page=progressConversionTimberReport&markId=<?php echo $markDetailId; ?>&TB_iframe=true&height=480&width=1024'
			title="Conversion Report - Detailed" class="thickbox" target="_blank"><?php echo display_float($total['conversionCharges'],2);?></a></td>
	
	<td align="right"
	title="Economics Felling Charges + Ecomonics Conversion Charges)"
	 ><b><?php echo display_float($total['fellingCharges']+$converionCharges,2); ?></b></td>
	<td align="right" ><b><?php echo $actualTotal; ?></b></td>
</tr>
 <tr>
   <td colspan="16">
      &nbsp;
    </td>
 </tr>
	<tr>
		<td><b>Transportantion Charges</b></td>
		<td colspan="13"></td>
		<td><b>Economics </b></td>
		<td><b>Progress </b></td>
		
	</tr>

	

<tr class="headrow">
	<td colspan="14" > Charges</td>
	
	<td><div id='exnomicsCharges' style='left:130px;position:absolute;z-index:123;display:none'>
		<table>
			<tr>
				<td colspan="3">Over Heads</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="right" colspan="3">Rate(cu)</td>
				<td align="right">Distance</td>
				<td align="right">Amount</td>
				<td align="right">Mate&nbsp;Comission(%)</td>
				<td align="right">Mate Comission(Rs.)</td>
				<td align="right">Charges
				<a href="javascript:hide('exnomicsCharges');">
		 [X]</a>
				</td>

			</tr>
			<?php
			$count=0;
			$volumeAfterConvesion=display_float($total['ecnomicsVolume'],3);
			
			foreach($overHeadDetail as $id=>$overHead){
				$count++;
				$value=$overHead['vc_value'];
				if($overHeadDetail[$id] !='')
				{
					$value=$overHeadDetail[$id]['i_value'];
				}


				?>

			<tr>
				<td colspan="3"><?php echo $overHead['vc_name'] ?></td>
				<?php
				if($overHead['i_overhead_type'] ==1)
				{
					?>
				<td>From <?php echo $overHeadDetail[$id]['vc_source'];?></td>
				<td>To <?php echo $overHeadDetail[$id]['vc_destination'];?></td>

				<?php
				}
				else
				{
					?>
				<td>N.A.</td>
				<td>N.A.</td>

				<?php
				}
				?>
				<td align="right" colspan="3"><?php  echo display_float($overHead['vc_value'],2); ?></td>
				<td align="right"><?php  echo display_float($overHead['i_distance'],2); ?></td>
				<td align="right"><?php
				$distance=$overHead['i_distance'] == '0' ? 1 :$overHead['i_distance'];
				$overHeadCharges= $volumeAfterConvesion*display_float($overHead['vc_value'],2)* $distance;;
				$comission=display_float($overHeadCharges*display_float($overHead['i_commission'],2)/100);;
				echo $volumeAfterConvesion*display_float($overHead['vc_value'],2); ?></td>
				<td align="right"><?php  echo display_float($overHead['i_commission'],2); ?></td>
				<td align="right"><?php  echo  $comission?></td>

				<td align="right"><?php $totalChargesOver+=($overHeadCharges+$comission);
			 echo display_float($overHeadCharges+$comission); ?></td>

				<?php
			}
			?>
			</tr>
			<tr class="headrow">
				<td colspan="3">Total - OverHeads</td>


				<td colspan="9"></td>
				<td align="right"><?php echo display_float($totalChargesOver,2);?></td>
			</tr>
		</table>
		</div>
			<a href='javascript:return false;' onmouseover='display("exnomicsCharges");' >
          <?php  echo $totalChargesOver;?>
          </a>
		</td>
	<td>
	<div id='progressOverHeads' style='left:160px;position:absolute;z-index:123;display:none'>
<table cellpadding="0px" cellspacing="0px" 
	>
	<tr>
		
		<td align='right'>Transportation Type</td>
		<td align='right'>Collection Point</td>
		<td align='right'>Distance</td>
		<td align='right'>Volume</td>
		<td align='right'>Charges</td>
		<td align='right'>Amount</td>
		<td align='right'>Mate Comission</td>
		<td align='right'>Total
		 <a href="javascript:hide('progressOverHeads');">
		 [X]</a>
		</td>
		
		</tr>
<?php 

  $count=0;
    if(count($progressOverHead) > 0)
    {
    	$conversionTotal=0;
    	 foreach ($progressOverHead as $rowId=>$detail)
    	 {
    	 	?>
    	 	
    	<tr>
		<td align='right'>
		 <?php 
		  echo  $detail['vc_name']; 
		 ?>
		</td>
		<td align='right'>
		 <?php 
		   echo $allForestPoints[$detail['vc_from']];
		 ?>
		</td>
		<td align='right'>
		 <?php 
		   echo $detail['i_distance'];
		 ?>
		</td>
		<td align='right'>
		 <?php 
		  echo  display_float($detail['i_volume'],3); 
		 ?>
			
		</td>
		<td align='right'>
		 <?php 
		  echo  display_float($detail['i_charges']); 
		 ?>
		
			</td>
		<td align='right'>
		 <?php 
		 $distance=$detail['i_distance'] =='0' ? 1 : $detail['i_distance'];
		 $total = $detail['i_charges'] * $detail['i_volume'] * $distance ; 
		  echo  $total; 
		 ?>
			</td>
			
		<td align='right'>
		 <?php 
		   $comission=display_float(($total * $detail['i_comission']/100),2);
		  echo  display_float(($total * $detail['i_comission']/100),2)	; 
		 ?>
			</td>	
		<td align='right'>
		<?php 
		 echo display_float($total+$comission);
		 $conversionProgressTotal+=($total+$comission);
		?>
		
		</td>
			</tr>
    	 	
<?php 
    	 $count++;
    	 }
    	 ?>
    <tr>
		
		<td align='right'>Total</td>
		<td align='right'>&nbsp;</td>
		<td align='right'>&nbsp;</td>
		<td align='right'>&nbsp;</td>
		<td align='right'>&nbsp;</td>
		<td align='right'>&nbsp;</td>
		<td align='right'>&nbsp;</td>
		<td align='right'><?php 
		  echo $conversionProgressTotal;
		?></td>
		
		</tr>
    	 <?php 
    	 
    }
 ?>
</table>
</div>
		<a href='javascript:return false;' onmouseover='display("progressOverHeads");' >
              <?php echo display_float($conversionProgressTotal); ?>
        </a>      
              </b></td>
</tr>
<?php 
}
?>
</table>

<script>

   
   function display(id)
   {
       hide('converionDiv');
       hide('exnomicsCharges')
       hide('progressOverHeads');

	   document.getElementById(id).style.display="block";
   }
   function hide(id)
   {
	   document.getElementById(id).style.display="none";
   }
   
</script>