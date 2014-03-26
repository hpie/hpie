<?php
	session_start();
	//include config
	include "config.php";
	$titleMsg="Upset-Price-Detail-Report";
	$reportLot="";
	$reportSeason="";
	if(isset($_POST['submitted']))
	{
		if($action=="report")
		{
			$action="report";
		}
		$reportLot=$_POST['lot_no'];
		$reportSeason=$_POST['season_year'];
		//$db->debug();
		
	}// if submitted

?>

<!-- html head start -->
<?php include('includes/include.php'); ?>
<!-- html head  end-->


<body>
<!-- wrap starts here -->
<div id="wrap">
	<!-- header start -->
	<?php include('includes/header.php'); ?>
    <!-- header end-->
    
<!-- content-wrap starts here -->
	<div id="content-wrap">
	<!-- content starts here -->		    	
        <div id="content">	
        	<div id="msgdiv"> 
        		<p style="color:#CC0000"><?php echo $msg; ?></p>
        	</div>
        	<?php 
        		if($action!="" && $action!="report")
        		{
        	?>	
		<!-- sidebar starts here -->		       
			<div id="sidebar" >
    			<?php include('includes/sidebar.php');	?>        
            </div>
		<!-- sidebar ends here -->
			<?php 
        		}
        	?>
        
        <!-- post starts here -->				            
            <div class="post">
            
            	<h1>
                	<div class="donotprint" style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?>  <?php echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php echo($_SESSION['division']);?> division.</font></div>
					<div style="float:right;">
                    	<?php 
							date_default_timezone_set('Asia/Calcutta');
							print date("jS F Y, g:i A");
						?>
                        
                     </div>
                 </h1>
       
                <br />
                	<form action="report-upset-price-details.php" method="post" name="blazesReportForm" id="blazesReportForm"> 
						<table class="donotprint" border='1'> 
							<tr> 
								<td>Select Lot No. for Report: &nbsp; 
									<select id="lot_no" name="lot_no" data-required="true" data-error-message="Lot Number is required">
										<option value=''>Select</option>
										 <?php 
										  $lots = $db->get_results("SELECT lot_no, lot_desc FROM m_lot WHERE division_code='".$_SESSION['division']."' AND status_cd='A' GROUP BY lot_no"  ,ARRAY_A);
					 
								            foreach ( $lots as $lot )
								            {
								            	if($lot['lot_no']==$reportLot)
								            	{
								            		echo ("<option value='".$lot['lot_no']."' selected='selected'>".$lot['lot_no']."(".$lot['lot_desc'].")</option>");
								            	}else
								            	{
								            		echo ("<option value='".$lot['lot_no']."'>".$lot['lot_no']."(".$lot['lot_desc'].")</option>");
								            	}
								            	
								            }
										 ?>
									</select> &nbsp; 
									for Year: &nbsp; 
									<?php $common->getSeasonYearList($reportSeason,''); ?> &nbsp;
									<input class="submit" id="submit" type="submit" name="action" value="Show Report"/>
									<input name="submitted" type="hidden" id="submitted" value="1" />
								</td> 
							</tr> 
						</table>
					</form>	
							
			     <?php
			     	if($action=="report")
			     	{
			     		$reportData = $db->get_row("SELECT id, unit_code, lot_no, total_blazes, avg_yield_fixed, total_turnout, eow_code, com_code, total_eow, total_com, total_expenditure, rate_calculated, season_year, fwd from  t_rate_calculation_for_lot WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."'",ARRAY_A);
			     		if(isset($reportData))
			     		{
			     			$eowData = $db->get_results("SELECT * from t_expenditure_on_work WHERE rate_calculation_for_lot_id='".$reportData['id']."'",ARRAY_A);
			     			$comData = $db->get_results("SELECT * from t_cost_of_material WHERE rate_calculation_for_lot_id='".$reportData['id']."'",ARRAY_A);

			     			$index=0; 
				     		$total=0;
				     		$eowArray=array();
				     		$comArray=array();
				     		
				     		//$_POST['season_year'] 
				            
				     		echo("<div class='CSSTableGenerator'>");
				     		echo("<h2>Himachal Pradesh State Forest Development Corporation Limited</h2>");
				            echo("<h2>Forest Working Division ".$_SESSION['division']." </h2>");
				     		echo("<h1>Upset Price Details of Resin Lot ".$_POST['lot_no']." for Season ".$_POST['season_year']."</h1>");
				     		
				     		echo("<div class='divTable'>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>1.</span> <span class='divCellLeft'>Name of FWD</span> <span class='divCellLeftBorder'>".$_SESSION['division']."</span> </div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>2.</span> <span class='divCellLeft'>Lot No</span> <span class='divCellLeftBorder'>".$reportData['lot_no']."</span> </div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>3.</span> <span class='divCellLeft'>Name of Forest</span> <span class='divCellLeft'>Name of RSD</span> <span class='divCellLeft'>Zone</span> <span class='divCellLeft'>No of Blazes</span> </div> ");
				     		foreach ($eowData as $eow )
			            	{
				     			echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>".$common->getNameForCode($eow['forest_code'], "forest_code", "forest_name", "m_forest")."</span> <span class='divCellLeftBorder'>".$common->getNameForCode($common->getNameForCode($eow['forest_code'], "forest_code", "forest_rsd_code", "m_forest"), "forest_rsd_code", "forest_rsd_name", "m_forest_rsd")."</span> <span class='divCellLeftBorder'>".$eow['zone_code']."</span> <span class='divCellRightBorder'>".$eow['blazes_received']."</span> </div>");
			            	}
			            	echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'><b>Total</b></span> <span class='divCellRightBorder'>".$reportData['total_blazes']."</span> </div> ");
			            	echo("<div class='divRow'> <span class='divCellLeft'>4.</span> <span class='divCellLeft'>Yield Per Section</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellRightBorder'>".$reportData['avg_yield_fixed']." qtls</span> </div> ");
			            	echo("<div class='divRow'> <span class='divCellLeft'>5.</span> <span class='divCellLeft'>Total Out Turn</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellRightBorder'>".$reportData['total_turnout']." qtls</span> </div> ");
				     		echo("</div>");
							
				     		foreach ($eowData as $eow )
			            	{
				     			$index++;
			            		if($reportData['fwd']==1)
				     			{
				     				$eowCurrent = $common->getExpenditureOnWork($eow['rate_calculation_for_lot_id'], $eow['forest_code'], $eow['eow_code']);
				     				if(empty($eowArray))
				     				{
				     					$eowArray = $eowCurrent;	
				     					
				     				}else 
				     				{
				     					$eowArray['blazes_received']+=$eowCurrent['blazes_received'];
				     					$eowArray['exp_crop_setting']+=$eowCurrent['exp_crop_setting'];
				     					$eowArray['turnout']=$reportData['total_turnout'];
				     					$eowArray['exp_extr_turnout']+=$eowCurrent['exp_extr_turnout'];
				     					$eowArray['total_tins']+=$eowCurrent['total_tins'];
				     					$eowArray['distance_to_rsd']+=$eowCurrent['distance_to_rsd'];  // need to be average
				     					$eowArray['exp_tpt_tins_to_forest']+=$eowCurrent['exp_tpt_tins_to_forest'];
				     					$eowArray['exp_soldering_of_resin']+=$eowCurrent['exp_soldering_of_resin'];
				     					
				     					$eowArray['turnout_carriage_mule_rsd']+=$eowCurrent['turnout_carriage_mule_rsd'];
				     					$eowArray['dist_carriage_mule_rsd']=$eowCurrent['dist_carriage_mule_rsd'];   // no need ot sum it up should always by equal to rsd distance as its a manual entry
				     					$eowArray['exp_carriage_mule_rsd']+=$eowCurrent['exp_carriage_mule_rsd'];
				     					
				     					$eowArray['turnout_carriage_manual_rsd']+=$eowCurrent['turnout_carriage_manual_rsd'];
				     					$eowArray['dist_carriage_manual_rsd']=$eowCurrent['dist_carriage_manual_rsd'];  // no need ot sum it up should always by equal to rsd distance as its a manual entry
				     					$eowArray['exp_carriage_manual_rsd']+=$eowCurrent['exp_carriage_manual_rsd'];
				     					
				     					$eowArray['turnout_carriage_tractor_rsd']+=$eowCurrent['turnout_carriage_tractor_rsd'];
				     					$eowArray['dist_carriage_tractor_rsd']=$eowCurrent['dist_carriage_tractor_rsd'];  // no need ot sum it up should always by equal to rsd distance as its a manual entry
				     					$eowArray['exp_carriage_tractor_rsd']+=$eowCurrent['exp_carriage_tractor_rsd'];
				     					
				     					$eowArray['turnout_carriage_other_rsd']+=$eowCurrent['turnout_carriage_other_rsd'];
				     					$eowArray['dist_carriage_other_rsd']=$eowCurrent['dist_carriage_other_rsd'];  // no need ot sum it up should always by equal to rsd distance as its a manual entry
				     					$eowArray['exp_carriage_other_rsd']+=$eowCurrent['exp_carriage_other_rsd'];
				     					
				     					$eowArray['exp_mate_commission']+=$eowCurrent['exp_mate_commission'];
				     				}
				     					
				     			}else
				     			{
				     				$eowArray  =  $common->getExpenditureOnWork($eow['rate_calculation_for_lot_id'], $eow['forest_code'], $eow['eow_code']);
				     				$eowArray['blazes_received']=$reportData['total_blazes'];
				     				$eowArray['exp_crop_setting']=round((($reportData['total_blazes']*$eowArray['cost_crop_setting'])/1000),2);
				     				break;	
				     			}	
			            	}
			            	if($index==0)
			            	{
			            		$index=1;
			            	}
			            	$eowArray['distance_to_rsd']=$eowArray['distance_to_rsd']/$index;
			            	//echo("<br />");
				     		echo("<div class='divTable'>");
				     		echo("<div class='divRow'> <span class='divCellLeft'></span> <span class='divCellLeft'><b>1. Expenditure on Work </b></span> <span class='divCellLeft'></span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'></span> <span class='divCellLeft'></span> <span class='divCellLeft'>Amount</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>I)</span> <span class='divCellLeft'>Setting up of crop through rill method on <b>".$eowArray['blazes_received']."</b> resin blazes @Rs. <b>".$eowArray['cost_crop_setting']."</b> per section </span> <span class='divCellRightBorder'>".$eowArray['exp_crop_setting']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>II)</span> <span class='divCellLeft'>Extraction of <b>".$eowArray['turnout']."</b> qtls of resin @Rs. <b>".$eowArray['cost_extr']."</b> per qtl </span> <span class='divCellRightBorder'>".$eowArray['exp_extr_turnout']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>III)</span> <span class='divCellLeft'>Carriage of <b>".$eowArray['total_tins']."</b> No. of empty tins from RSD to Forest over a distnace of <b>".$eowArray['distance_to_rsd']."</b> km @Rs. <b>".$eowArray['cost_tpt_tins_to_forest']."</b> per 100 tins </span> <span class='divCellRightBorder'>".$eowArray['exp_tpt_tins_to_forest']."</span> </div>" );
							echo("<div class='divRow'> <span class='divCellLeft'>IV)</span> <span class='divCellLeft'>Soldering of <b>".$eowArray['total_tins']."</b> No. of resin filled tins @Rs. <b>".$eowArray['cost_soldering_of_resin']."</b> per tin </span> <span class='divCellRightBorder'>".$eowArray['exp_soldering_of_resin']."</span> </div>" );
							echo("<div class='divRow'> <span class='divCellLeft'>V)</span> <span class='divCellLeft'>Carriage of  <b>".$eowArray['turnout_carriage_mule_rsd']."</b> qtls of extracted resin by Mules from forest to RSD over a distance of <b>".$eowArray['dist_carriage_mule_rsd']."</b> km @Rs. <b>".$eowArray['cost_carriage_mule_rsd']."</b> per km </span> <span class='divCellRightBorder'>".$eowArray['exp_carriage_mule_rsd']."</span> </div>" );
							echo("<div class='divRow'> <span class='divCellLeft'>VI)</span> <span class='divCellLeft'>Carriage of  <b>".$eowArray['turnout_carriage_manual_rsd']."</b> qtls of extracted resin by Manual from forest to RSD over a distance of <b>".$eowArray['dist_carriage_manual_rsd']."</b> km @Rs. <b>".$eowArray['cost_carriage_manual_rsd']."</b> per km </span> <span class='divCellRightBorder'>".$eowArray['exp_carriage_manual_rsd']."</span> </div>" );
							echo("<div class='divRow'> <span class='divCellLeft'>VII)</span> <span class='divCellLeft'>Carriage of  <b>".$eowArray['turnout_carriage_tractor_rsd']."</b> qtls of extracted resin by Tractor from forest to RSD over a distance of <b>".$eowArray['dist_carriage_tractor_rsd']."</b> km @Rs. <b>".$eowArray['cost_carriage_tractor_rsd']."</b> per km </span> <span class='divCellRightBorder'>".$eowArray['exp_carriage_tractor_rsd']."</span> </div>" );
							echo("<div class='divRow'> <span class='divCellLeft'>VIII)</span> <span class='divCellLeft'>Carriage of  <b>".$eowArray['turnout_carriage_other_rsd']."</b> qtls of extracted resin by other means from forest to RSD over a distance of <b>".$eowArray['dist_carriage_other_rsd']."</b> km @Rs. <b>".$eowArray['cost_carriage_other_rsd']."</b> per km </span> <span class='divCellRightBorder'>".$eowArray['exp_carriage_other_rsd']."</span> </div>" );
							echo("<div class='divRow'> <span class='divCellLeft'>IX)</span> <span class='divCellLeft'>Transportation to Distance of   <b>".$eowArray['dist_transportation']."</b> km of extracted resin @ Rs. <b>".$eowArray['cost_transportation_initial_25']."</b> for initial 25 km and @Rs. <b>".$eowArray['cost_transportation_per_km']."</b> per km there after </span> <span class='divCellRightBorder'>".$eowArray['exp_transportation']."</span> </div>" );
							echo("<div class='divRow'> <span class='divCellLeft'>X)</span> <span class='divCellLeft'>Mate comission @ Rs <b>".$eowArray['cost_mate_commission']."</b> per qtl for <b>".$eowArray['turnout']."</b> qtls extraced resin </span> <span class='divCellRightBorder'>".$eowArray['exp_mate_commission']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>Total(I to X):</span> <span class='divCellRightBorder'>".$reportData['total_eow']."</span></div>");
				     		//echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		
				     		
			     			foreach ($comData as $com )
			            	{
				     			$index++;
			            		if($reportData['fwd']==1)
				     			{
				     				$comCurrent = $common->getCostOfMaretial($com['rate_calculation_for_lot_id'], $com['forest_code'], $com['com_code']);
				     				if(empty($comArray))
				     				{
				     					$comArray = $comCurrent;	
				     					//print_r($comCurrent);
				     				}else 
				     				{
				     					$comArray['blazes_received']+=$comCurrent['blazes_received'];
				     					$comArray['exp_blaze_frame']+=$comCurrent['exp_blaze_frame'];
				     					$comArray['exp_bark_shaver']+=$comCurrent['exp_bark_shaver'];
				     					$comArray['exp_groove_cutter']+=$comCurrent['exp_groove_cutter'];
				     					$comArray['exp_freshning_knife']+=$comCurrent['exp_freshning_knife'];
				     					$comArray['exp__spray_bottle']+=$comCurrent['exp__spray_bottle'];
				     					$comArray['exp_hammer_nailpuller']+=$comCurrent['exp_hammer_nailpuller'];
				     					$comArray['exp_pot_scrapper']+=$comCurrent['exp_pot_scrapper'];
				     					
				     					$comArray['qty_wire_nails_5cm']+=$comCurrent['qty_wire_nails_5cm'];
				     					$comArray['exp_wire_nails_5cm']+=$comCurrent['exp_wire_nails_5cm'];
				     					
				     					$comArray['qty_wire_nails_2cm']+=$comCurrent['qty_wire_nails_2cm'];
				     					$comArray['exp_wire_nails_2cm']+=$comCurrent['exp_wire_nails_2cm'];
				     					
				     					$comArray['qty_solder']+=$comCurrent['qty_solder'];
				     					$comArray['exp_solder']+=$comCurrent['exp_solder'];
				     					
				     					$comArray['qty_naushader']+=$comCurrent['qty_naushader'];
				     					$comArray['exp_naushader']+=$comCurrent['exp_naushader'];
				     					
				     					$comArray['qty_charcoal']+=$comCurrent['qty_charcoal'];
				     					$comArray['exp_charcoal']+=$comCurrent['exp_charcoal'];
				     					
				     					$comArray['qty_blower']+=$comCurrent['qty_blower'];
				     					$comArray['exp_blower']+=$comCurrent['exp_blower'];
				     					
				     					$comArray['qty_solder_iron']+=$comCurrent['qty_solder_iron'];
				     					$comArray['exp_solder_iron']+=$comCurrent['exp_solder_iron'];
				     					
				     					$comArray['qty_paint']+=$comCurrent['qty_paint'];
				     					$comArray['exp_paint']+=$comCurrent['exp_paint'];
				     					
				     					$comArray['qty_cylinder_50ml']+=$comCurrent['qty_cylinder_50ml'];
				     					$comArray['exp_cylinder_50ml']+=$comCurrent['exp_cylinder_50ml'];
				     					
				     					$comArray['qty_cylinder_500ml']+=$comCurrent['qty_cylinder_500ml'];
				     					$comArray['exp_cylinder_500ml']+=$comCurrent['exp_cylinder_500ml'];
				     					
				     					$comArray['qty_beaker_500ml']+=$comCurrent['qty_beaker_500ml'];
				     					$comArray['exp_beaker_500ml']+=$comCurrent['exp_beaker_500ml'];
				     					
				     					$comArray['qty_beaker_1000ml']+=$comCurrent['qty_beaker_1000ml'];
				     					$comArray['exp_beaker_1000ml']+=$comCurrent['exp_beaker_1000ml'];
				     					
				     					$comArray['qty_funnel']+=$comCurrent['qty_funnel'];
				     					$comArray['exp_funnel']+=$comCurrent['exp_funnel'];
				     					
				     					$comArray['qty_other']+=$comCurrent['qty_other'];
				     					$comArray['exp_other']+=$comCurrent['exp_other'];
				     				}
				     					
				     			}else
				     			{
				     				$comArray  =  $common->getCostOfMaretial($com['rate_calculation_for_lot_id'], $com['forest_code'], $com['com_code']);
				     				break;	
				     			}	
			            	}
				     		
				     		echo("<div class='divRow'> <span class='divCellLeft'></span> <span class='divCellLeft'><b>2. Cost of Material </b></span> <span class='divCellLeft'></span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>I)</span> <span class='divCellLeft'>Blaze frames <b>".$comArray['number_of_mazdoor']."</b> No. @Rs. <b>".$comArray['cost_blaze_frame']."</b> </span> <span class='divCellRightBorder'>".round($comArray['exp_blaze_frame'],1)."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>II)</span> <span class='divCellLeft'>Bark Shaver <b>".$comArray['number_of_mazdoor']."</b> No. @Rs. <b>".$comArray['cost_bark_shaver']."</b> </span> <span class='divCellRightBorder'>".round($comArray['exp_bark_shaver'],1)."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>III)</span> <span class='divCellLeft'>Center Groove Cutter <b>".$comArray['number_of_mazdoor']."</b> No. @Rs. <b>".$comArray['cost_groove_cutter']."</b> </span> <span class='divCellRightBorder'>".round($comArray['exp_groove_cutter'],1)."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>IV)</span> <span class='divCellLeft'>Freshening Knives <b>".$comArray['number_of_mazdoor']."</b> No. @Rs. <b>".$comArray['cost_freshning_knife']."</b> </span> <span class='divCellRightBorder'>".round($comArray['exp_freshning_knife'],1)."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>V)</span> <span class='divCellLeft'>Spray Bottles <b>".$comArray['number_of_mazdoor']."</b> No. @Rs. <b>".$comArray['cost_spray_bottle']."</b> </span> <span class='divCellRightBorder'>".round($comArray['exp__spray_bottle'],1)."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>VI)</span> <span class='divCellLeft'>Hammer-cum-Nail Pullers <b>".$comArray['number_of_mazdoor']."</b> No. @Rs. <b>".$comArray['cost_hammer_nailpuller']."</b> </span> <span class='divCellRightBorder'>".round($comArray['exp_hammer_nailpuller'],1)."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>VII)</span> <span class='divCellLeft'>Pot Scrapers <b>".$comArray['number_of_mazdoor']."</b> No. @Rs. <b>".$comArray['cost_pot_scrapper']."</b> </span> <span class='divCellRightBorder'>".round($comArray['exp_pot_scrapper'],1)."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>VIII)</span> <span class='divCellLeft'>Pots  50% <b>".ceil($comArray['blazes_received']/2)."</b> No. @Rs. <b>".$comArray['cost_pots']."</b> </span> <span class='divCellRightBorder'>".$comArray['exp_pots']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>IX)</span> <span class='divCellLeft'>Lips 100% <b>".$comArray['blazes_received']."</b> No. @Rs. <b>".$comArray['cost_lips']."</b> </span> <span class='divCellRightBorder'>".$comArray['exp_lips']."</span> </div>" );
				     		
				     		echo("<div class='divRow'> <span class='divCellLeft'>X)</span> <span class='divCellLeft'>Wire nails (5cm) <b>".$comArray['qty_wire_nails_5cm']."</b> kg. @Rs. <b>".$comArray['cost_wire_nails_5cm']."</b> per kg </span> <span class='divCellRightBorder'>".$comArray['exp_wire_nails_5cm']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XI)</span> <span class='divCellLeft'>Wire nails (2cm) <b>".$comArray['qty_wire_nails_2cm']."</b> kg. @Rs. <b>".$comArray['cost_wire_nails_2cm']."</b> per kg </span> <span class='divCellRightBorder'>".$comArray['exp_wire_nails_2cm']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XII)</span> <span class='divCellLeft'>Solder <b>".$comArray['qty_solder']."</b> kg. @Rs. <b>".$comArray['cost_solder']."</b> per kg </span> <span class='divCellRightBorder'>".$comArray['exp_solder']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XIII)</span> <span class='divCellLeft'>Naushadar <b>".$comArray['qty_naushader']."</b> kg. @Rs. <b>".$comArray['cost_naushader']."</b> per kg </span> <span class='divCellRightBorder'>".$comArray['exp_naushader']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XIV)</span> <span class='divCellLeft'>Charcoal <b>".$comArray['qty_charcoal']."</b> kg. @Rs. <b>".$comArray['cost_charcoal']."</b> per kg </span> <span class='divCellRightBorder'>".$comArray['exp_charcoal']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XV)</span> <span class='divCellLeft'>Material for sharping of tool @Rs. <b>".$comArray['cost_tool_sharpen']."</b> per Mazdoor </span> <span class='divCellRightBorder'>".$comArray['exp_tool_sharpen']."</span> </div>" );
				     		
				     		echo("<div class='divRow'> <span class='divCellLeft'>XVI)</span> <span class='divCellLeft'>Blower <b>".$comArray['qty_blower']."</b> @Rs. <b>".$comArray['cost_blower']."</b>.  per depot </span> <span class='divCellRightBorder'>".$comArray['exp_blower']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XVII)</span> <span class='divCellLeft'>Solder Iron<b>".$comArray['qty_solder_iron']."</b> @Rs. <b>".$comArray['cost_solder_iron']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_solder_iron']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XVII)</span> <span class='divCellLeft'>Paint <b>".$comArray['qty_paint']."</b> lts. @Rs. <b>".$comArray['cost_paint']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_paint']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XIX)</span> <span class='divCellLeft'>Cylinder 50ml <b>".$comArray['qty_cylinder_50ml']."</b> @Rs. <b>".$comArray['cost_cylinder_50ml']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_cylinder_50ml']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XX)</span> <span class='divCellLeft'>Cylinder 500ml <b>".$comArray['qty_cylinder_500ml']."</b> @Rs. <b>".$comArray['cost_cylinder_500ml']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_cylinder_500ml']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XXI)</span> <span class='divCellLeft'>Beaker 500ml <b>".$comArray['qty_beaker_500ml']."</b> @Rs. <b>".$comArray['cost_beaker_500ml']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_beaker_500ml']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XXII)</span> <span class='divCellLeft'>Beaker 1000ml <b>".$comArray['qty_beaker_1000ml']."</b> @Rs. <b>".$comArray['cost_beaker_1000ml']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_beaker_1000ml']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XXIII)</span> <span class='divCellLeft'>Funnel <b>".$comArray['qty_funnel']."</b> @Rs. <b>".$comArray['cost_funnel']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_funnel']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>XXIV)</span> <span class='divCellLeft'>Other <b>".$comArray['qty_other']."</b> @Rs. <b>".$comArray['cost_other']."</b> per depot </span> <span class='divCellRightBorder'>".$comArray['exp_other']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>Total(I to XXIV):</span> <span class='divCellRightBorder'>".$reportData['total_com']."</span></div>");
				     		
				     		//echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>Total Expenditure(1+2):</span> <span class='divCellRightBorder'>".$reportData['total_expenditure']."</span></div>");
				     		//echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>Rate per Qtl:</span> <span class='divCellRightBorder'>".$reportData['rate_calculated']."</span></div>");
				     		
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");				     		
				     		echo("</div>");
								
							echo(" </div>");
			     		
			     		}// if reportData
			     		
			     		
			     	}    
				 ?>
				 
				 	 <div>
              			<center>
              			<table class="signTable">
              				
              				<tr>
              					<td>
              						&nbsp; 
              					</td>
              					<td align="right">
              						Divisional Manager, <br />
              						Forest Working Division, <br />
              						<?php echo($_SESSION['division']);?>
              					</td>
              				</tr>	
              			</table>
              			</center>		
              		</div>
              		 
              		<div class="donotprint">
              			<br />
              			<form action="report-upset-price-details.php" method="post" name="reportForm" id="reportForm">
							<table class="donotprint" width="100%">
								<tr>
									<td align="left"> <input class="submit" id="cancel" type="submit" name="action" value="Cancel" /> <input name="submitted" type="hidden" id="submitted" value="1" /></td>
									<td align="right"> <img src="./images/button-print.png" alt="Print" onclick="javascript:window.print();" /> </td> 
								</tr>
							</table>	
						</form>		
              		</div>
              	
			</div>
		<!-- post ends here -->		        

		</div>
	<!-- content ends here -->		        
    </div>
<!-- content-wrap ends here -->		
    

<!-- footer starts here -->	
	<div id="footer">
		<?php include('includes/footer.php'); ?>
	</div>
<!-- footer ends here -->


</div>
<!-- wrap ends here -->

</body>
</html>    