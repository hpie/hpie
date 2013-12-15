<?php
	session_start();
	//include config
	include "config.php";
	$titleMsg="Tender Form";
	$reportLot="";
	$reportSeason="";
	$zoneCode="";
	$emMode="";	
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
                <?php
                	if($action=="create")
                	{
                ?>	
                	<br />	
                	<form action="tender-form-details.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Crate Tender Entry</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="con_phone">Season Year:</label>
								<?php $common->getSeasonYearList($reportSeason,''); ?>
								<label for="con_no">Tender From No:</label>
								<input class="textbox" id="tender_form_no" type="text" name="tender_form_no" data-required="true" data-error-message="Form No is required"/>
								<label for="con_fname">Notice No:</label>
								<input class="textbox"  id="tender_notice_no" type="text" name="tender_notice_no" data-required="true" data-error-message="Notice No is required" />
								<label for="con_lname">Tender Date:</label>
								<input class="textbox"  id="tender_date" type="text" name="tender_date" data-required="true" data-error-message="Tender Date is required" />
								<label for="con_ffname">Form Cost:</label>
								<input class="textbox"  id="tender_value" type="text" name="tender_value" data-required="true" data-error-message="Tender Form Cost is required" value="100"/>
								
								<label for="con_llname">Lot No:</label>
								<select id="lot_no" name="lot_no" data-required="true" data-error-message="Lot Number is required" onchange="loadLotDetailsForTender(this);">
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
								</select>
								<div id="tender_lot_info_div"></div>
								
								<label for="con_gen">Zone:</label>
								<?php $common->getZoneList($zoneCode,"loadRateDetailsForTender"); ?>
								<div id="tender_exp_zone_div"></div>
								
								<label for="con_llname">Contractor Code:</label>
								<select id="contractor_code" name="contractor_code" data-required="true" data-error-message="Contractor is required" onchange="loadDetailsForContractor(this);">
									<option value=''>Select</option>
									 <?php 
									  $contractors = $db->get_results("SELECT * FROM m_contractor WHERE division_code='".$_SESSION['division']."' AND status_cd='A' ORDER BY contractor_fname"  ,ARRAY_A);
				 
							            foreach ( $contractors as $contractor )
							            {
							            	echo ("<option value='".$contractor['contractor_code']."'>".$contractor['contractor_fname'].", ".$contractor['contractor_lname']." [".$contractor['contractor_code']."] </option>");
							            }
									 ?>
								</select>
								<div id="tender_contractor_info_div"></div>
								
								<label for="con_add">Rate Offered:</label>
								<input class="textbox" id="rate_offered" name="rate_offered" data-required="true" data-error-message="Rate Offered is required" />
								<label for="con_po">EMD Mode:</label>
								<?php $common->getPaymentModeList($emMode,"setEmDesc"); ?>
								<label for="con_teh">EMD Draft No:</label>
								<input class="textbox" id="em_desc" type="text" name="em_desc" data-required="true" data-error-message="Draft No is required"/>
								<label for="con_distt">EMD Date:</label>
								<input class="textbox" id="em_date" type="text" name="em_date" data-required="true" data-error-message="EMD Date is required"/>
								<label for="con_pin">Ernest Money Deposited:</label>
								Rs.<input class="textbox" id="em_deposited" type="text" name="em_deposited"  data-required="true" data-error-message="EMD is required"/>
								
													
								<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
								
								<br /><br />
								<input class="submit" id="addcon" type="submit" name="action" value="Save"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
				  	<script>
				  	$j(function() {
				  		$j( "#contractor_valid_dt" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
					</script>
			  	<?php 
			  		}else if($action=="edit")
                	{
                		$contractor = $db->get_row("SELECT * FROM m_contractor WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="tender-form-details.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Tender Enrty</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								
								<label for="con_no">Contractor reg No:</label>
								<input  class="lblText" readonly="readonly" id="contractor_code" type="text" name="contractor_code" data-required="true" data-error-message="Reg No is required" value="<?php echo($contractor['contractor_code']);?>"/>
								<label for="con_fname">First Name:</label>
								<input class="textbox"  id="contractor_fname" type="text" name="contractor_fname" data-required="true" data-error-message="First Name is required" value="<?php echo($contractor['contractor_fname']);?>"/>
								<label for="con_lname">Last Name:</label>
								<input class="textbox"  id="contractor_lname" type="text" name="contractor_lname" data-required="true" data-error-message="Last Name is required" value="<?php echo($contractor['contractor_lname']);?>"/>
								<label for="con_ffname">Father&apos;s First Name:</label>
								<input class="textbox"  id="contractor_ffname" type="text" name="contractor_ffname" data-required="true" data-error-message="Father's First Name is required" value="<?php echo($contractor['contractor_ffname']);?>"/>
								<label for="con_llname">Father&apos;s Last Name:</label>
								<input class="textbox"  id="contractor_flname" type="text" name="contractor_flname" data-required="true" data-error-message="Father's Last Name is required" value="<?php echo($contractor['contractor_flname']);?>"/>
								<label for="con_gen">Contractor Gender:</label>
								<input class="textbox" id="contractor_gender" type="text" name="contractor_gender" data-required="true" data-error-message="Gender is required" value="<?php echo($contractor['contractor_gender']);?>"/>
								
								<label for="con_add">Contractor Address:</label>
								<textarea class="textbox" id="contractor_address" name="contractor_address" data-required="true" data-error-message="Address is required"><?php echo($contractor['contractor_address']);?></textarea>
								<label for="con_po">Post Office:</label>
								<input class="textbox" id="contractor_po" type="text" name="contractor_po" data-required="true" data-error-message="Post Office is required" value="<?php echo($contractor['contractor_po']);?>"/>
								<label for="con_teh">Tehsil:</label>
								<input class="textbox" id="contractor_teh" type="text" name="contractor_teh" data-required="true" data-error-message="Tehsil is required" value="<?php echo($contractor['contractor_teh']);?>"/>
								<label for="con_distt">District:</label>
								<input class="textbox" id="contractor_distt" type="text" name="contractor_distt" data-required="true" data-error-message="District is required" value="<?php echo($contractor['contractor_distt']);?>"/>
								<label for="con_pin">Pin:</label>
								<input class="textbox" id="contractor_pin" type="text" name="contractor_pin" value="<?php echo($contractor['contractor_pin']);?>"/>
								<label for="con_phone">Phone:</label>
								<input class="textbox" id="contractor_phone" type="text" name="contractor_phone" value="<?php echo($contractor['contractor_phone']);?>"/>
								<label for="con_phone">Mobile:</label>
								<input class="textbox" id="contractor_mobile" type="text" name="contractor_mobile" value="<?php echo($contractor['contractor_mobile']);?>"/>
								
								<label for="con_class">Class:</label>
								<input class="textbox" id="contractor_class" type="text" name="contractor_class" data-required="true" data-error-message="Class is required" value="<?php echo($contractor['contractor_class']);?>"/>
								<label for="con_phone">Valid Till:</label>
								<input class="textbox" id="contractor_valid_dt" type="text" name="contractor_valid_dt" data-required="true" data-error-message="Valid date is required" value="<?php echo($contractor['contractor_valid_dt']);?>"/>
								
								<input name="rowid" type="hidden" value="<?php echo($contractor['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<input class="submit" id="updatelot" type="submit" name="action" value="Update"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>	
				  	<script>
				  	$j(function() {
				  		$j( "#contractor_valid_dt" ).datepicker(
			                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
					</script>		  
				<?php 
			  		}else if($action=="report")
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
				     		echo("<h1>Tender Form for Resin Extraction & Carriage Work from Forests to Road Side Depot</h1>");
				     		
				     		// ".$_POST['lot_no']." for Season ".$_POST['season_year'].
				     		echo("<div class='divTable'>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Unit</span> <span class='divCellLeftBorder'>".$common->getUnitList("")."</span> <span class='divCellLeft'>Name of FWD</span> <span class='divCellLeftBorder'>".$_SESSION['division']."</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellRight'>Value Rs. 100</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Tender From Number</span> <span class='divCellLeft'>....................</span> </div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Notice No.</span> <span class='divCellLeft'>....................</span> </div> ");
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
				     				break;	
				     			}	
			            	}
			            	if($index==0)
			            	{
			            		$index=1;
			            	}
			            	$eowArray['distance_to_rsd']=$eowArray['distance_to_rsd']/$index;
			            	echo("<br />");
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
							echo("<div class='divRow'> <span class='divCellLeft'>IX)</span> <span class='divCellLeft'>Mate comission @ Rs <b>".$eowArray['cost_mate_commission']."</b> per qtl for <b>".$eowArray['turnout']."</b> qtls extraced resin </span> <span class='divCellRightBorder'>".$eowArray['exp_mate_commission']."</span> </div>" );
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>Total(I to IX):</span> <span class='divCellRightBorder'>".$reportData['total_eow']."</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		
				     		
			     			foreach ($comData as $com )
			            	{
				     			$index++;
			            		if($reportData['fwd']==1)
				     			{
				     				$comCurrent = $common->getCostOfMaretial($com['rate_calculation_for_lot_id'], $com['forest_code'], $com['com_code']);
				     				if(empty($comArray))
				     				{
				     					$comArray = $comCurrent;	
				     					
				     				}else 
				     				{
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
				     		
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>Total Expenditure(1+2):</span> <span class='divCellRightBorder'>".$reportData['total_expenditure']."</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeftBorder'>Rate per Qtl:</span> <span class='divCellRightBorder'>".$reportData['rate_calculated']."</span></div>");
				     		
							echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>&nbsp;</span></div>");				     		
				     		echo("</div>");
								
							echo(" </div>");
			     		
			     		}// if reportData
			     		
			     		
			     	}else
                	{
                ?>
                      <form action="tender-form-details.php" method="post" name="tenderReportForm" id="tenderReportForm"> 
								<table class="donotprint" border='1'> 
									<tr> 
										<td>Filter Lot No. : &nbsp; 
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
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Tenders</h1> <table> <tr> <td>Froms No</td> <td>Noice No</td> <td>Contractor</td> <td>Lot No</td> <td>Valid Till</td> <td>Rate Offered</td><td>EMD</td> <td>Status</td></tr>"); 
                		$tenders= $db->get_results("SELECT * FROM t_tender_form_resin WHERE division_code='".$_SESSION['division']."' ORDER BY tender_date, tender_form_no" ,ARRAY_A);
	
				         foreach ( $tenders as $tender )
				         { 
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$tender['tender_form_no']."</td> <td>".$tender['tender_notice_no']."</td> <td>".$tender['contractor_code']."</td>");
				         	
				         	echo(" <td>".$tender['lot_no']."</td>");
				         	echo(" <td>".$tender['contractor_valid_dt']."</td>");
				         	echo(" <td>".$tender['rate_offered']."</td>");
				         	echo(" <td>".$tender['em_deposited']."</td>");
				         	
				         	echo("<td>".$tender['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
					     	
				
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="tender-form-details.php" method="post" id="contactorActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($tender['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($tender['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($tender['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="tender_form_no" type="hidden" value="<?php echo($tender['tender_form_no']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($tender['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($tender['id']);?>" />
								<input name="submitted" type="hidden" id="submitted" value="1"/>
							</form>
			     <?php 
			         	 	echo(" </td>");
			         	 	
				         	echo(" <tr>");
				         	
				         }// lots loop
				         
				         echo(" </table> </div>");
				?>
              		<div>
              			<br /><br />
              			<form action="tender-form-details.php" method="post" id="tenderForm">
							<input class="submit" id="cancel" type="submit" name="action" value="Cancel"/>
							<input class="submit" id="newlot" type="submit" name="action" value="New"/>
							<input name="submitted" type="hidden" id="submitted" value="1" />
						</form>		
              		</div>
              	
              	<?php 
				         
			  		} // end else list 
			  		//$db->debug();
              	?>	
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