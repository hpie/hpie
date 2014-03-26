<?php
	session_start();
	//include config
	include "config.php";
	$titleMsg="Tender-Forms-Detail-Report";
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
                	<form action="report-tender-forms.php" method="post" name="tenderReportForm" id="tenderReportForm"> 
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
			     		if($_POST['lot_no']=="")
			     		{
			     			$reportData = $db->get_results("SELECT 
			     		t.id, t.division_code, t.unit_code, t.tender_form_no, t.tender_notice_no, t.tender_date, t.tender_value, t.lot_no, t.blazes_received, t.yield_fixed, t.tender_slab, t.total_turnout, t.zone_code, t.cost_extr, t.cost_carriage_mule_rsd, t.cost_carriage_manual_rsd, t.cost_carriage_tractor_rsd, t.  cost_carriage_other_rsd, t.cost_crop_setting, t.total_com, t.cost_tool, t.contractor_code, t.contractor_class, t.contractor_valid_dt, t.rate_offered, t.em_mode, t.em_desc, t.em_date, t.em_deposited, t.season_year, t.status_cd,
			     		c.contractor_fname, c.contractor_lname, c.contractor_ffname, c.contractor_flname, c.contractor_gender, c.contractor_address, c.contractor_po, c.contractor_teh, c.contractor_distt, c.contractor_pin, c.contractor_phone, c.contractor_mobile FROM t_tender_form_resin t, m_contractor c WHERE t.contractor_code=c.contractor_code AND  t.division_code='".$_SESSION['division']."' AND season_year='".$_POST['season_year']."' ORDER BY t.lot_no, t.rate_offered ",ARRAY_A);
			     		}else
			     		{
			     			$reportData = $db->get_results("SELECT 
			     		t.id, t.division_code, t.unit_code, t.tender_form_no, t.tender_notice_no, t.tender_date, t.tender_value, t.lot_no, t.blazes_received, t.yield_fixed, t.tender_slab, t.total_turnout, t.zone_code, t.cost_extr, t.cost_carriage_mule_rsd, t.cost_carriage_manual_rsd, t.cost_carriage_tractor_rsd, t.  cost_carriage_other_rsd, t.cost_crop_setting, t.total_com, t.cost_tool, t.contractor_code, t.contractor_class, t.contractor_valid_dt, t.rate_offered, t.em_mode, t.em_desc, t.em_date, t.em_deposited, t.season_year, t.status_cd,
			     		c.contractor_fname, c.contractor_lname, c.contractor_ffname, c.contractor_flname, c.contractor_gender, c.contractor_address, c.contractor_po, c.contractor_teh, c.contractor_distt, c.contractor_pin, c.contractor_phone, c.contractor_mobile FROM t_tender_form_resin t, m_contractor c WHERE t.contractor_code=c.contractor_code AND t.lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' ORDER BY t.rate_offered ",ARRAY_A);
			     		}
			     		
			     		if(isset($reportData))
			     		{
			     			//$_POST['season_year'] 
				            
				     		echo("<div class='CSSTableGenerator'>");
				     		echo("<h2>Himachal Pradesh State Forest Development Corporation Limited</h2>");
				            echo("<h2>Forest Working Division ".$_SESSION['division']." </h2>");
				     		echo("<h1>Tender Results for REsin Lots ".$_POST['lot_no']." for Season ".$_POST['season_year']."</h1>");
				     		
				     		echo("<table class='reportTable'> <tr class='headRow'> <td>Sr. No.</td> <td>Lot No.</td> <td>No of Blazes</td> <td>Yield per Section</td>  <td>Total Turnout</td> <td>Tenderer Name and Address</td>  <td>Class</td>  <td>Rate Offred</td>  <td>Rate Fixed</td>  <td>Variation</td> <td>%age</td> <td>EMD</td>  <td>Remarks</td> </tr>");
				     		$index=0;
				     		foreach ($reportData as $data )
			            	{
			            		$record = $db->get_row("SELECT id, division_code, unit_code, lot_no, blazes_received, proposed_yield, approved_yield, approval_yield_status, total_turnout, total_expenditure, rate_calculated, proposed_rate, approved_rate, approval_rate_status, season_year FROM t_proposed_price_for_lot WHERE lot_no='".$data['lot_no']."' AND season_year='".$data['season_year']."'",ARRAY_A); 
				     			$index++;
				     			
				     			$rateOffered=$data['rate_offered'];
				     			$rateApproved=$record['approved_rate'];
				     			$variation=($rateOffered-$rateApproved);
				     			$percentage= round((($variation/$rateOffered)*100),2);
			            		echo("<tr> <td>".$index."</td> <td>".$data['lot_no']."</td> <td>".$data['blazes_received']."</td> <td>".$data['yield_fixed']."</td><td>".$data['total_turnout']."</td> <td>"
			            		.$data['contractor_fname']." ".$data['contractor_lname']." S/o Sh.".$data['contractor_ffname']." ".$data['contractor_flname']." <br />"
			            		.$data['contractor_address']." P.O.: ".$data['contractor_po']." Teh: ".$data['contractor_teh']." <br />Phone ".$data['contractor_phone']."/".$data['contractor_mobile'].
			            		"</td><td>".$data['contractor_class']."</td> <td>".$rateOffered."</td><td>".$rateApproved."</td> <td>".$variation."</td><td>".$percentage."</td> <td>".$data['em_deposited']." ".$data['em_mode']."</td> <td>rem</td></tr>");
			            	}
			     		
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