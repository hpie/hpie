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
		if($action=="update")
		{
			$db->query("UPDATE t_tender_form_resin SET unit_code='".$_POST['unit_code']."', tender_form_no='".$_POST['tender_form_no']."', tender_notice_no='".$_POST['tender_notice_no']."', tender_date='".$_POST['tender_date']."', tender_value='".$_POST['tender_value']."', lot_no='".$_POST['lot_no']."', blazes_received='".$_POST['blazes_received']."', yield_fixed='".$_POST['yield_fixed']."', tender_slab='".$_POST['tender_slab']."', total_turnout='".$_POST['total_turnout']."', zone_code='".$_POST['zone_code']."', cost_extr='".$_POST['cost_extr']."', cost_carriage_mule_rsd='".$_POST['cost_carriage_mule_rsd']."', cost_carriage_manual_rsd='".$_POST['cost_carriage_manual_rsd']."', cost_carriage_tractor_rsd='".$_POST['cost_carriage_tractor_rsd']."', cost_carriage_other_rsd='".$_POST['cost_carriage_other_rsd']."', cost_crop_setting='".$_POST['cost_crop_setting']."', total_com='".$_POST['total_com']."', cost_tool='".$_POST['cost_tool']."', contractor_code='".$_POST['contractor_code']."', contractor_class='".$_POST['contractor_class']."', contractor_valid_dt='".$_POST['contractor_valid_dt']."', rate_offered='".$_POST['rate_offered']."', negotiated_rate='".$_POST['negotiated_rate']."', em_mode='".$_POST['em_mode']."', em_desc='".$_POST['em_desc']."', em_date='".$_POST['em_date']."', em_deposited='".$_POST['em_deposited']."', season_year='".$_POST['season_year']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Tender Form Details Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating tender form details. Please try again.";
			}
			Header("Location: tender-form-details.php");
		}else if($action=="save")
		{
			$db->query("INSERT INTO t_tender_form_resin (id, division_code, unit_code, tender_form_no, tender_notice_no, tender_date, tender_value, lot_no, blazes_received, yield_fixed, tender_slab, total_turnout, zone_code, cost_extr, cost_carriage_mule_rsd, cost_carriage_manual_rsd, cost_carriage_tractor_rsd, cost_carriage_other_rsd, cost_crop_setting, total_com, cost_tool, contractor_code, contractor_class, contractor_valid_dt, rate_offered, em_mode, em_desc, em_date, em_deposited, season_year, created_by) VALUES (NULL, '".$_SESSION['division']."', '".$_POST['unit_code']."', '".$_POST['tender_form_no']."', '".$_POST['tender_notice_no']."', '".$_POST['tender_date']."', '".$_POST['tender_value']."', '".$_POST['lot_no']."', '".$_POST['blazes_received']."', '".$_POST['yield_fixed']."', '".$_POST['tender_slab']."', '".$_POST['total_turnout']."', '".$_POST['zone_code']."', '".$_POST['cost_extr']."', '".$_POST['cost_carriage_mule_rsd']."', '".$_POST['cost_carriage_manual_rsd']."', '".$_POST['cost_carriage_tractor_rsd']."', '".$_POST['cost_carriage_other_rsd']."', '".$_POST['cost_crop_setting']."', '".$_POST['total_com']."',  '".$_POST['cost_tool']."','".$_POST['contractor_code']."', '".$_POST['contractor_class']."', '".$_POST['contractor_valid_dt']."', '".$_POST['rate_offered']."', '".$_POST['em_mode']."', '".$_POST['em_desc']."', '".$_POST['em_date']."', '".$_POST['em_deposited']."', '".$_POST['season_year']."', '".$_POST['created_by']."')");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Tender Form No [".$_POST['tender_form_no']."] Successfully Created.";
			}else
			{
				$_SESSION['msg']="Problem creating tender form details. Please try again.";
			}
			Header("Location: tender-form-details.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE t_tender_form_resin SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE t_tender_form_resin SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Tender Form No [".$_POST['tender_form_no']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating tender form details. Please try again.";
			}
			Header("Location: tender-form-details.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE t_tender_form_resin SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Tender Form No [".$_POST['tender_form_no']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating tender form details. Please try again.";
			}
			Header("Location: tender-form-details.php");
		}else if($action=="report")
		{
			$action="report";
		}
		
		$reportLot=$_SESSION['filter-lot'];
		$reportSeason=$_SESSION['filter-season'];
		
		
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
								<label for="con_phone">Unit:</label>
								<?php $common->getUnitList(""); ?>
								<label for="con_phone">Season Year:</label>
								<?php $common->getSeasonYearList($reportSeason,''); ?>
								<label for="con_no">Tender From No:</label>
								<input class="textbox" id="tender_form_no" type="text" name="tender_form_no" data-required="true" data-error-message="Form No is required"/>
								<label for="con_fname">Notice No:</label>
								<input class="textbox"  id="tender_notice_no" type="text" name="tender_notice_no" data-required="true" data-error-message="Notice No is required" />
								<label for="con_lname">Tender Date:</label>
								<input class="textbox"  id="tender_date" type="text" name="tender_date" data-required="true" data-error-message="Tender Date is required" />
								<label for="con_ffname">Form Cost:</label>
								<input class="textbox"  id="tender_value" type="text" name="tender_value" data-required="true" data-error-message="Tender Form Cost is required"  data-type="number" data-type-number-message="Only number is allowed" value="100"/>
								
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
								<?php $common->getContractorList("","loadDetailsForContractor"); ?>
								<div id="tender_contractor_info_div"></div>
								
								<label for="con_add">Rate Offered:</label>
								<input class="textbox" id="rate_offered" name="rate_offered" data-required="true" data-error-message="Rate Offered is required" data-type="number" data-type-number-message="Only number is allowed"/>
								<label for="con_po">EMD Mode:</label>
								<?php $common->getPaymentModeList($emMode,"setEmDesc"); ?>
								<label for="con_teh">EMD Draft No:</label>
								<input class="textbox" id="em_desc" type="text" name="em_desc" data-required="true" data-error-message="Draft No is required"/>
								<label for="con_distt">EMD Date:</label>
								<input class="textbox" id="em_date" type="text" name="em_date" data-required="true" data-error-message="EMD Date is required"/>
								<label for="con_pin">Ernest Money Deposited:</label>
								Rs.<input class="textbox" id="em_deposited" type="text" name="em_deposited"  data-required="true" data-error-message="EMD is required" data-type="number" data-type-number-message="Only number is allowed"/>
								
													
								<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
								
								<br /><br />
								<input class="submit" id="addcon" type="submit" name="action" value="Save"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
				  	<script>
				  	$j(function() {
				  		$j( "#em_date" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
				  	$j(function() {
				  		$j( "#tender_date" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
				  	</script>
			  	<?php 
			  		}else if($action=="edit")
                	{
                		$tenderFormResin = $db->get_row("SELECT * FROM t_tender_form_resin WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="tender-form-details.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Tender Enrty</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="con_phone">Unit:</label>
								<?php $common->getUnitList($tenderFormResin['unit_code']); ?>
								<label for="con_phone">Season Year:</label>
								<input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" data-required="true" data-error-message="Season Year is required" value="<?php echo($tenderFormResin['season_year']);?>"/>  <?php // $common->getSeasonYearList($tenderFormResin['season_year'],''); ?>
								<label for="con_no">Tender From No:</label>
								<input class="lblText" readonly="readonly" id="tender_form_no" type="text" name="tender_form_no" data-required="true" data-error-message="Form No is required" value="<?php echo($tenderFormResin['tender_form_no']);?>"/>
								<label for="con_fname">Notice No:</label>
								<input class="lblText" readonly="readonly" id="tender_notice_no" type="text" name="tender_notice_no" data-required="true" data-error-message="Notice No is required" value="<?php echo($tenderFormResin['tender_notice_no']);?>"/>
								<label for="con_lname">Tender Date:</label>
								<input class="lblText" readonly="readonly" id="tender_date" type="text" name="tender_date" data-required="true" data-error-message="Tender Date is required" value="<?php echo($tenderFormResin['tender_date']);?>"/>
								<label for="con_ffname">Form Cost:</label>
								<input class="lblText" readonly="readonly" id="tender_value" type="text" name="tender_value" data-required="true" data-error-message="Tender Form Cost is required"  data-type="number" data-type-number-message="Only number is allowed" value="<?php echo($tenderFormResin['tender_value']);?>"/>
								
								<label for="con_llname">Lot No:</label>
								<input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" data-required="true" data-error-message="Lot No is required"  value="<?php echo($tenderFormResin['lot_no']);?>"/>
								<div id="tender_lot_info_div">
									<table> 
										<tr>
									 		<td>
									 			<label for="con_gen">Number of Blazes:</label>
												<input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" data-required="true" data-error-message="Total Blazes is required" value="<?php echo($tenderFormResin['blazes_received']);?>"/>
											</td>
											<td>
												<label for="con_gen">Yield:</label>
												<input class="lblText" readonly="readonly" id="yield_fixed" type="text" name="yield_fixed" data-required="true" data-error-message="Yield Fixed is required" value="<?php echo($tenderFormResin['yield_fixed']);?>"/>
											</td>
											</tr>
											<tr>
											<td>
												<label for="con_gen">Trunout:</label>
												<input class="lblText" readonly="readonly" id="total_turnout" type="text" name="total_turnout" data-required="true" data-error-message="Turnout is required" value="<?php echo($tenderFormResin['total_turnout']);?>"/>
											</td>
											<td>
											<label for="con_gen">Cost of Material:</label>
											<input class="lblText" readonly="readonly" id="total_com" type="text" name="total_com" data-required="true" data-error-message="Cost of Material is required" value="<?php echo($tenderFormResin['total_com']);?>"/>
											</td>
											<td>
											<label for="con_gen">Tool Charges:</label>
											<input class="lblText" readonly="readonly" id="cost_tool" type="text" name="cost_tool" data-required="true" data-error-message="Cost of Material is required" value="<?php echo($tenderFormResin['cost_tool']);?>"/>
											</td>
										</tr> 
									</table>
								</div>
								
								<label for="con_gen">Zone:</label>
								<input class="lblText" readonly="readonly" id="zone_code" type="text" name="zone_code" data-required="true" data-error-message="Zone is required"  value="<?php echo($tenderFormResin['zone_code']);?>"/>
								
								<div id="tender_exp_zone_div">
									<table> 
										<tr>
								 			<td>
								 				<label for="con_gen">Slab:</label>
												<input class="lblText" readonly="readonly" id="tender_slab" type="text" name="tender_slab" data-required="true" data-error-message="Slab is required" value="<?php echo($tenderFormResin['tender_slab']);?>"/>
											</td>
											<td>
												<label for="con_gen">Cost Extraction:</label>
												<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" data-required="true" data-error-message="Cost Extraction is required" value="<?php echo($tenderFormResin['cost_extr']);?>"/>
											</td>
										</tr>
									
										<tr>
											<td colspan="2">
												<label for="con_gen">Carriage Charges from Forest to RSD</label>
											</td>
										</tr>
									
										<tr>
											<td>
												<label for="con_gen">Mule:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_mule_rsd" type="text" name="cost_carriage_mule_rsd" data-required="true" data-error-message="Cost Mule Carriage is required" value="<?php echo($tenderFormResin['cost_carriage_mule_rsd']);?>"/>
											</td>
											<td>
												<label for="con_gen">Manual:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_manual_rsd" type="text" name="cost_carriage_manual_rsd" data-required="true" data-error-message="Cost Manual Carriage is required"  value="<?php echo($tenderFormResin['cost_carriage_manual_rsd']);?>"/>
											</td>
										</tr>
									
										<tr>
											<td>
												<label for="con_gen">Tractor:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_tractor_rsd" type="text" name="cost_carriage_tractor_rsd" data-required="true" data-error-message="Cost Tractor Carriage is required"  value="<?php echo($tenderFormResin['cost_carriage_tractor_rsd']);?>""/>
											</td>
											<td>
												<label for="con_gen">Other:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_other_rsd" type="text" name="cost_carriage_other_rsd" data-required="true" data-error-message="Cost Other Carriage is required"  value="<?php echo($tenderFormResin['cost_carriage_other_rsd']);?>""/>
											</td>
										</tr>
									
										<tr>
											<td>
												<label for="con_gen">Crop Setting:</label>
												<input class="lblText" readonly="readonly" id="cost_crop_setting" type="text" name="cost_crop_setting" data-required="true" data-error-message="Cost Crop setting required"  value="<?php echo($tenderFormResin['cost_crop_setting']);?>""/>
											</td>
										</tr> 
									</table>
								</div>
								
								<label for="con_llname">Contractor Code:</label>
								<input class="lblText" readonly="readonly"  id="contractor_code" type="text" name="contractor_code" data-required="true" data-error-message="Contractor Code"  value="<?php echo($tenderFormResin['contractor_code']);?>"/>

								<div id="tender_contractor_info_div">
									<table> 
										<tr>
									 		<td>
									 			<label for="con_gen">Contractor Class:</label>
												<input class="lblText" readonly="readonly" id="contractor_class" type="text" name="contractor_class" data-required="true" data-error-message="Total Blazes is required" value="<?php echo($tenderFormResin['contractor_class']);?>"/>
											</td>
											<td>
									 			<label for="con_gen">Contractor Valid Date:</label>
												<input class="lblText" readonly="readonly" id="contractor_valid_dt" type="text" name="contractor_valid_dt" data-error-message="Total Blazes is required" value="<?php echo($tenderFormResin['contractor_valid_dt']);?>"/>
											</td>
										</tr>
									</table>
								</div>
								
								<label for="con_add">Rate Offered:</label>
								<input class="textbox" id="rate_offered" name="rate_offered" data-required="true" data-error-message="Rate Offered is required"  data-type="number" data-type-number-message="Only number is allowed" value="<?php echo($tenderFormResin['rate_offered']);?>"/>
								<input type="hidden" id="negotiated_rate" name="negotiated_rate" value="0.0"/>
								<label for="con_po">EMD Mode:</label>
								<input class="lblText" readonly="readonly"  id="em_mode" type="text" name="em_mode" data-required="true" data-error-message="Payment mode is required" value="<?php echo($tenderFormResin['em_mode']);?>"/> <?php //$common->getPaymentModeList($emMode,"setEmDesc"); ?>
								<label for="con_teh">EMD Draft No:</label>
								<input class="textbox" id="em_desc" type="text" name="em_desc" data-required="true" data-error-message="Draft No is required" value="<?php echo($tenderFormResin['em_desc']);?>"/>
								<label for="con_distt">EMD Date:</label>
								<input class="textbox" id="em_date" type="text" name="em_date" data-required="true" data-error-message="EMD Date is required"  value="<?php echo($tenderFormResin['em_date']);?>"/>
								<label for="con_pin">Ernest Money Deposited:</label>
								Rs.<input class="textbox" id="em_deposited" type="text" name="em_deposited"  data-required="true" data-error-message="EMD is required" data-type="number" data-type-number-message="Only number is allowed" value="<?php echo($tenderFormResin['em_deposited']);?>"/>

								
								<input name="rowid" type="hidden" value="<?php echo($tenderFormResin['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<input class="submit" id="updatelot" type="submit" name="action" value="Update"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
				  	<script>
				  	$j(function() {
				  		$j( "#em_date" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
				  	</script>  
				<?php 
			  		}else if($action=="report")
			     	{
			     		$reportData = $db->get_row("SELECT * from t_tender_form_resin WHERE id='".$_POST['rowid']."'",ARRAY_A);
			     		if(isset($reportData))
			     		{
			     			//$_POST['season_year'] 
				            $contractor = $db->get_row("SELECT * from m_contractor WHERE contractor_code='".$reportData['contractor_code']."'",ARRAY_A);
				            
				     		echo("<div class='CSSTableGenerator'>");
				     		echo("<h2>Himachal Pradesh State Forest Development Corporation Limited</h2>");
				            echo("<h2>Forest Working Division ".$_SESSION['division']." </h2>");
				     		echo("<h1>Tender Form for Resin Extraction & Carriage Work from Forests to Road Side Depots </h1>");
				     		
				     		// ".$_POST['lot_no']." for Season ".$_POST['season_year'].
				     		echo("<div class='divTable'>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Lot Number</span> <span class='divCellLeft'><b>".$reportData['lot_no']."</b></span> </div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Unit</span> <span class='divCellLeft'><b>".$common->getNameForCode($reportData['unit_code'], "unit_code", "unit_name", "m_unit")."</b></span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>Name of FWD</span> <span class='divCellLeft'><b>".$_SESSION['division']."</b></span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellRightBorder'>Value Rs. 100</span></div>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Tender From Number</span> <span class='divCellLeft'><b>".$reportData['tender_form_no']."</b></span> <span class='divCellLeft'>&nbsp;</span></div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Notice No.</span> <span class='divCellLeft'><b>".$reportData['tender_notice_no']."</b></span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>Dated</span> <span class='divCellLeft'><b>".$reportData['tender_date']."</b></span></div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Approx. Resin Blazes</span> <span class='divCellLeft'><b>".$reportData['blazes_received']."</b></span> <span class='divCellLeft'>&nbsp;</span> <span class='divCellLeft'>Yield Fixed per section</span> <span class='divCellRight'><b>".$reportData['yield_fixed']."</b> Qtls</span> </div> ");
			            	echo("</div>");
											     		
			            	echo("<br />");
			            	echo("<div> <h2>Schedule Rate of the Corporation in Respect of Resin Extraction and Carriage upto Road Side Depots are as under</h2> </div>");
			            	echo("<div class='divTable'>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Slab</span> <span class='divCellLeft'>Zone</span> <span class='divCellLeft'>Rate per Qtl</span></div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>".$reportData['tender_slab']."</span> <span class='divCellLeft'>".$reportData['zone_code']."</span> <span class='divCellLeft'>".$reportData['cost_extr']."</span></div> ");
				     		echo("</div>");
				     		
				     		echo("<div> <h2>Carriages from Forest to Road Side Depots</h2> </div>");
			            	echo("<div class='divTable'>");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Mode</span> <span class='divCellLeft'>Mule</span> <span class='divCellLeft'>Manual</span> <span class='divCellLeft'>Tractor</span> <span class='divCellLeft'>Other</span></div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Rate per Qtl</span> <span class='divCellRight'><b>".$reportData['cost_carriage_mule_rsd']."</b></span> <span class='divCellRight'><b>".$reportData['cost_carriage_manual_rsd']."</b></span> <span class='divCellRight'><b>".$reportData['cost_carriage_tractor_rsd']."</b></span> <span class='divCellRight'><b>".$reportData['cost_carriage_other_rsd']."</b></span></div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Crop Setting Charges</span> <span class='divCellRight'><b>".$reportData['cost_crop_setting']."</b></span> </div> ");
				     		echo("<div class='divRow'> <span class='divCellLeft'>Crop Setting Material/Tool Charges</span> <span class='divCellRight'><b>".$reportData['cost_tool']."</b></span> </div> ");
				     		echo("</div>");
								
							echo("<br />");
			            	echo("<div>");
				     		echo("<pre>");
				     		echo("<p class='tenderPara'>");
				     		echo("I, ".$contractor['contractor_fname']." ".$contractor['contractor_lname']." S/o Sh.".$contractor['contractor_ffname']." ".$contractor['contractor_flname']." Village ".$contractor['contractor_address']." P.O. ".$contractor['contractor_po']." Tehsil ".$contractor['contractor_teh']." Distt. ".$contractor['contractor_distt']." (H.P.) <br />");
				     		echo("registered Labour Supply Mate(s)/Contractor(s) in Forest Working Division ".$reportData['division_code']." <br />");
				     		echo("under <b> regusteration No. ".$reportData['contractor_code']."</b> in <b>class ".$reportData['contractor_class']." renewed upto ".$reportData['contractor_valid_dt']."</b> quote my/our rates <br />");
				     		echo("for various operations pretaning to resin <b>lot No. ".$reportData['lot_no']."</b> FWD ".$reportData['division_code']." <br />");
				     		echo("I/we have studied/understand the tender conditions and schedule of rates carefully and accept the same  <br />");
				     		echo("without any reservation. <br />"); 
				     		echo("I/we agree to do resing extraction work and carriage from forest to Road Side Depots at the folowing rate.  <br />");
				     		echo("I/we tender(s) the following rate in respect of <b>lot No. ".$reportData['lot_no']."</b> FWD.".$reportData['division_code']."<br />");
				     		echo("Rate offered per quintal of net pure resin including carriage upto Raod Side Depot(s) <b>Rs. ".$reportData['rate_offered']."</b> <br />");
				     		echo("I/we also furnish herewith the EMD in <b>".$reportData['em_mode']."</b> Draft No <b>".$reportData['em_desc']." dated ".$reportData['em_date']."</b> <br />");
				     		echo("duely pledged in the name of Devisional Manager ".$reportData['division_code']."  for <b>Rs. ".$reportData['em_deposited']."</b> <br />");
				     		echo("<br />"); echo("<br />");
				     		echo("Signature of the tenderer <br />");
				     		echo("I, ".$contractor['contractor_fname']." ".$contractor['contractor_lname']." S/o Sh.".$contractor['contractor_ffname']." ".$contractor['contractor_flname']." Village ".$contractor['contractor_address']." P.O. ".$contractor['contractor_po']." Tehsil ".$contractor['contractor_teh']." Distt. ".$contractor['contractor_distt']."  (H.P.)");
				     		echo("<br />"); echo("<br />");
				     		echo("<br />"); echo("<br />");
				     		echo("Tender form scrutinized by <br />");
				     		echo("Name and Designation of the officer/official"); 
				     		echo("<br />"); echo("<br />");
				     		echo("Tender accepted for consideration / rejected due to reason <br />");
				     		echo("<br />"); echo("<br />");
				     		echo("Divisional Manager <br />");
				     		echo("FWD ".$reportData['division_code']." <br />");
				     		
				     		echo("<br />"); echo("<br />");
				     		echo("EMD in the shape of FDR or cash for Rs. ________ refunded to Sh. ________ received EMD back <br />");
				     		
				     		echo("<br />"); echo("<br />");
				     		echo("<br />"); echo("<br />");
				     		echo("Signature of the tenderer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Name of the officer/official");
				     		
				     		echo("<br />"); echo("<br />");
				     		echo("<br />"); echo("<br />");
				     		echo("Opened by Committee <br />");
				     		echo("<br />"); echo("<br />");
				     		echo("Member &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Member &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; Chairman <br />");
				     		echo("<br />"); echo("<br />");
				     		echo("<br />"); echo("<br />");
				     		echo("</p>");
				     		echo("</pre>");
				     		echo("</div>");
				     		
				     		
				     		echo(" </div>");
				     		
				     		echo('<div class="donotprint">');
              				echo('<br /><br />');
              				echo('<form action="tender-form-details.php" method="post" name="reportForm" id="reportForm">');
							echo('<table class="donotprint" width="100%">');
								echo('<tr>');
									echo('<td align="left"> <input class="submit" id="cancel" type="submit" name="action" value="Cancel" /> <input name="submitted" type="hidden" id="submitted" value="1" /></td>');
									echo('<td align="right"> <img src="./images/button-print.png" alt="Print" onclick="javascript:window.print();" /> </td> ');
								echo('</tr>');
								echo('</table>');	
							echo('</form>');		
              				echo('</div>');
			     		
			     		}// if reportData
			     		
			     		
			     	}else if($action=="negotiate")
                	{
                		$tenderFormResin = $db->get_row("SELECT * FROM t_tender_form_resin WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="tender-form-details.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Tender Enrty</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="con_phone">Unit:</label>
								<?php $common->getUnitList($tenderFormResin['unit_code']); ?>
								<label for="con_phone">Season Year:</label>
								<input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" data-required="true" data-error-message="Season Year is required" value="<?php echo($tenderFormResin['season_year']);?>"/>  <?php // $common->getSeasonYearList($tenderFormResin['season_year'],''); ?>
								<label for="con_no">Tender From No:</label>
								<input class="lblText" readonly="readonly" id="tender_form_no" type="text" name="tender_form_no" data-required="true" data-error-message="Form No is required" value="<?php echo($tenderFormResin['tender_form_no']);?>"/>
								<label for="con_fname">Notice No:</label>
								<input class="lblText" readonly="readonly" id="tender_notice_no" type="text" name="tender_notice_no" data-required="true" data-error-message="Notice No is required" value="<?php echo($tenderFormResin['tender_notice_no']);?>"/>
								<label for="con_lname">Tender Date:</label>
								<input class="lblText" readonly="readonly" id="tender_date" type="text" name="tender_date" data-required="true" data-error-message="Tender Date is required" value="<?php echo($tenderFormResin['tender_date']);?>"/>
								<label for="con_ffname">Form Cost:</label>
								<input class="lblText" readonly="readonly" id="tender_value" type="text" name="tender_value" data-required="true" data-error-message="Tender Form Cost is required"  data-type="number" data-type-number-message="Only number is allowed" value="<?php echo($tenderFormResin['tender_value']);?>"/>
								
								<label for="con_llname">Lot No:</label>
								<input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" data-required="true" data-error-message="Lot No is required"  value="<?php echo($tenderFormResin['lot_no']);?>"/>
								<div id="tender_lot_info_div">
									<table> 
										<tr>
									 		<td>
									 			<label for="con_gen">Number of Blazes:</label>
												<input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" data-required="true" data-error-message="Total Blazes is required" value="<?php echo($tenderFormResin['blazes_received']);?>"/>
											</td>
											<td>
												<label for="con_gen">Yield:</label>
												<input class="lblText" readonly="readonly" id="yield_fixed" type="text" name="yield_fixed" data-required="true" data-error-message="Yield Fixed is required" value="<?php echo($tenderFormResin['yield_fixed']);?>"/>
											</td>
											</tr>
											<tr>
											<td>
												<label for="con_gen">Trunout:</label>
												<input class="lblText" readonly="readonly" id="total_turnout" type="text" name="total_turnout" data-required="true" data-error-message="Turnout is required" value="<?php echo($tenderFormResin['total_turnout']);?>"/>
											</td>
											<td>
											<label for="con_gen">Cost of Material:</label>
											<input class="lblText" readonly="readonly" id="total_com" type="text" name="total_com" data-required="true" data-error-message="Cost of Material is required" value="<?php echo($tenderFormResin['total_com']);?>"/>
											</td>
											<td>
											<label for="con_gen">Tool Charges:</label>
											<input class="lblText" readonly="readonly" id="cost_tool" type="text" name="cost_tool" data-required="true" data-error-message="Cost of Material is required" value="<?php echo($tenderFormResin['cost_tool']);?>"/>
											</td>
										</tr> 
									</table>
								</div>
								
								<label for="con_gen">Zone:</label>
								<input class="lblText" readonly="readonly" id="zone_code" type="text" name="zone_code" data-required="true" data-error-message="Zone is required"  value="<?php echo($tenderFormResin['zone_code']);?>"/>
								
								<div id="tender_exp_zone_div">
									<table> 
										<tr>
								 			<td>
								 				<label for="con_gen">Slab:</label>
												<input class="lblText" readonly="readonly" id="tender_slab" type="text" name="tender_slab" data-required="true" data-error-message="Slab is required" value="<?php echo($tenderFormResin['tender_slab']);?>"/>
											</td>
											<td>
												<label for="con_gen">Cost Extraction:</label>
												<input class="lblText" readonly="readonly" id="cost_extr" type="text" name="cost_extr" data-required="true" data-error-message="Cost Extraction is required" value="<?php echo($tenderFormResin['cost_extr']);?>"/>
											</td>
										</tr>
									
										<tr>
											<td colspan="2">
												<label for="con_gen">Carriage Charges from Forest to RSD</label>
											</td>
										</tr>
									
										<tr>
											<td>
												<label for="con_gen">Mule:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_mule_rsd" type="text" name="cost_carriage_mule_rsd" data-required="true" data-error-message="Cost Mule Carriage is required" value="<?php echo($tenderFormResin['cost_carriage_mule_rsd']);?>"/>
											</td>
											<td>
												<label for="con_gen">Manual:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_manual_rsd" type="text" name="cost_carriage_manual_rsd" data-required="true" data-error-message="Cost Manual Carriage is required"  value="<?php echo($tenderFormResin['cost_carriage_manual_rsd']);?>"/>
											</td>
										</tr>
									
										<tr>
											<td>
												<label for="con_gen">Tractor:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_tractor_rsd" type="text" name="cost_carriage_tractor_rsd" data-required="true" data-error-message="Cost Tractor Carriage is required"  value="<?php echo($tenderFormResin['cost_carriage_tractor_rsd']);?>""/>
											</td>
											<td>
												<label for="con_gen">Other:</label>
												<input class="lblText" readonly="readonly" id="cost_carriage_other_rsd" type="text" name="cost_carriage_other_rsd" data-required="true" data-error-message="Cost Other Carriage is required"  value="<?php echo($tenderFormResin['cost_carriage_other_rsd']);?>""/>
											</td>
										</tr>
									
										<tr>
											<td>
												<label for="con_gen">Crop Setting:</label>
												<input class="lblText" readonly="readonly" id="cost_crop_setting" type="text" name="cost_crop_setting" data-required="true" data-error-message="Cost Crop setting required"  value="<?php echo($tenderFormResin['cost_crop_setting']);?>""/>
											</td>
										</tr> 
									</table>
								</div>
								
								<label for="con_llname">Contractor Code:</label>
								<input class="lblText" readonly="readonly"  id="contractor_code" type="text" name="contractor_code" data-required="true" data-error-message="Contractor Code"  value="<?php echo($tenderFormResin['contractor_code']);?>"/>

								<div id="tender_contractor_info_div">
									<table> 
										<tr>
									 		<td>
									 			<label for="con_gen">Contractor Class:</label>
												<input class="lblText" readonly="readonly" id="contractor_class" type="text" name="contractor_class" data-required="true" data-error-message="Total Blazes is required" value="<?php echo($tenderFormResin['contractor_class']);?>"/>
											</td>
											<td>
									 			<label for="con_gen">Contractor Valid Date:</label>
												<input class="lblText" readonly="readonly" id="contractor_valid_dt" type="text" name="contractor_valid_dt" data-error-message="Total Blazes is required" value="<?php echo($tenderFormResin['contractor_valid_dt']);?>"/>
											</td>
										</tr>
									</table>
								</div>
								
								<label for="con_add">Rate Offered:</label>
								<input class="lblText" readonly="readonly" id="rate_offered" name="rate_offered" data-required="true" data-error-message="Rate Offered is required"  data-type="number" data-type-number-message="Only number is allowed" value="<?php echo($tenderFormResin['rate_offered']);?>"/>
								<label for="con_add">Negotiated Rate:</label>
								<input class="textbox" id="negotiated_rate" name="negotiated_rate" data-required="true" data-error-message="Negotiated Rate is required"  data-type="number" data-type-number-message="Only number is allowed" value="<?php echo($tenderFormResin['negotiated_rate']);?>"/>
								<label for="con_po">EMD Mode:</label>
								<input class="lblText" readonly="readonly"  id="em_mode" type="text" name="em_mode" data-required="true" data-error-message="Payment mode is required" value="<?php echo($tenderFormResin['em_mode']);?>"/> <?php //$common->getPaymentModeList($emMode,"setEmDesc"); ?>
								<label for="con_teh">EMD Draft No:</label>
								<input class="lblText" readonly="readonly" id="em_desc" type="text" name="em_desc" data-required="true" data-error-message="Draft No is required" value="<?php echo($tenderFormResin['em_desc']);?>"/>
								<label for="con_distt">EMD Date:</label>
								<input class="lblText" readonly="readonly" id="em_date" type="text" name="em_date" data-required="true" data-error-message="EMD Date is required"  value="<?php echo($tenderFormResin['em_date']);?>"/>
								<label for="con_pin">Ernest Money Deposited:</label>
								Rs.<input class="lblText" readonly="readonly" id="em_deposited" type="text" name="em_deposited"  data-required="true" data-error-message="EMD is required" data-type="number" data-type-number-message="Only number is allowed" value="<?php echo($tenderFormResin['em_deposited']);?>"/>

								
								<input name="rowid" type="hidden" value="<?php echo($tenderFormResin['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<input class="submit" id="updatelot" type="submit" name="action" value="Update"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
				  	<script>
				  	$j(function() {
				  		$j( "#em_date" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
				  	</script>  
				<?php 
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
											<input class="submit" id="submit" type="submit" name="action" value="Filter"/>
											<input name="submitted" type="hidden" id="submitted" value="1" />
										</td> 
									</tr> 
								</table>
							</form>
				<?php 					
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Tenders</h1> <table> <tr> <td>Form No</td> <td>Notice No</td> <td>Contractor</td> <td>Lot No</td> <td>Valid Till</td> <td>Rate Offered</td><td>EMD</td> <td>Status</td> <td>Action</td></tr>"); 
						$sqlQuery = "SELECT * FROM t_tender_form_resin WHERE division_code='".$_SESSION['division']."' ORDER BY tender_date, tender_form_no"; 
                		if($reportLot!="")
                		{
                			$sqlQuery = "SELECT * FROM t_tender_form_resin WHERE division_code='".$_SESSION['division']."' AND lot_no='".$reportLot."' ORDER BY tender_date, tender_form_no";
                		}elseif ($reportSeason!="")
                		{
                			$sqlQuery = "SELECT * FROM t_tender_form_resin WHERE division_code='".$_SESSION['division']."' AND season_year='".$reportSeason."' ORDER BY tender_date, tender_form_no";
                		}elseif ($reportSeason!="")
                		{
                			$sqlQuery = "SELECT * FROM t_tender_form_resin WHERE division_code='".$_SESSION['division']."' AND lot_no='".$reportLot."' AND season_year='".$reportSeason."' ORDER BY tender_date, tender_form_no";
                		}
                			
                		$tenders= $db->get_results($sqlQuery,ARRAY_A);
	
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
					     	
				
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="tender-form-details.php" method="post" id="tenderActionForm_<?php echo($tender['id']);?>" name="tenderActionForm_<?php echo($tender['id']);?>">
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
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />  &nbsp;");
									
									echo("<input class='actionTxtBut' id='editTender' type='submit' name='action' value='Negotiate' title='Add Negotiated Price' />   &nbsp;");
									
									echo("<input class='actionTxtBut' id='viewReport' type='submit' name='action' value='Show Report' title='View Complete Tender Details' onClick='setFormAction(\"tenderActionForm_".$tender['id']."\",\"tender-form-details.php\")' />");
							 
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