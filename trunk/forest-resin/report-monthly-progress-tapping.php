<?php
	session_start();
	//include config
	include "config.php";
	$titleMsg="Monthly-Progress-Tapping-Report";
	if(isset($_POST['submitted']))
	{
		if($action=="report")
		{
			$action="report";
		}
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
                	<form action="report-monthly-progress-tapping.php" method="post" name="progressReportForm" id="progressReportForm" data-validate="parsley"> 
						<table class="donotprint" border='1'> 
							<tr> 
								<td>
									Select Month of Report: &nbsp; 
									<input class="textbox" readonly="readonly" id="progress_dt" type="text" name="progress_dt" data-required="true" data-error-message="Valid date is required"/> &nbsp; 
									<input class="submit" id="submit" type="submit" name="action" value="Show Report"/>
									<input name="submitted" type="hidden" id="submitted" value="1" />
								</td> 
							</tr> 
						</table>
					</form>	
					<script>
				  	$j(function() {
				  		$j( "#progress_dt" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide' 
					                });
					  });
					</script>	
							
			     <?php
			     	if($action=="report")
			     	{
			     		$passed_progress_year=date('Y', strtotime($_POST['progress_dt']));
			     		$passed_progress_month=date('m', strtotime($_POST['progress_dt']));
			     		$workProgressLot = $db->get_results("SELECT id, unit_code, lot_no, blazes_received, number_of_mazdoor, total_turnout, season_year FROM  t_work_progress_for_lot WHERE YEAR(season_year)='".$passed_progress_year."' AND division_code='".$_SESSION['division']."' ORDER BY unit_code, lot_no",ARRAY_A);

			     		//$reportData = $db->get_results("SELECT lot_no, sum(blazes_tapped) as blazes_tapped, max(mazdoor_engaged) as mazdoor_engaged, sum(resin_tins_tapped) as resin_tins_tapped, sum(resin_tapped) as resin_tapped,  season_year from t_proposed_yield_form_blazes WHERE season_year='".$_POST['season_year']."' AND progress_dt='".$_POST['progress_dt']."' AND division_code='".$_SESSION['division']."' ORDER BY lot_no",ARRAY_A);
			     		$index=1; 
			     		$total=0;
			     		//$_POST['season_year'] 
			            
			     		echo("<div class='CSSTableGenerator'>");
			     		echo("<h2>Himachal Pradesh State Forest Development Corporation Limited</h2>");
			            echo("<h2>Forest Working Division ".$_SESSION['division']." </h2>");
			     		echo("<h1>Statement Showing Monthly Progress Report of Resin Tapping and Collection for the Month of ".date('M Y', strtotime($_POST['progress_dt']))."</h1>"); 
			            echo("<table class='reportTable'> <tr class='headRow'> <td rowspan='4'>Sr. No.</td> <td rowspan='3'>Name of Unit</td> <td rowspan='3'>Lot No</td> <td rowspan='3'>No of Blazes Tapped Last Year</td>");
			            echo("<td colspan='2'>Number of Blazes Taken Over this Year</td> <td colspan='2'>Number of Mazdoor</td> <td  rowspan='3'>Total Target</td>  <td rowspan='3'>Per Section</td> <td colspan='6'>Resin Colection</td></tr>");
			            echo("<tr> <td rowspan='2'>No of Blazes tapped</td><td rowspan='2'>No of Blazes Untapped</td> <td rowspan='2'>Required</td><td rowspan='2'>Present</td> <td colspan='2'>Previous</td> <td colspan='2'>Current</td> <td  colspan='2'>Total</td></tr>");
			            echo("<tr> <td>Tins</td><td>Weight</td> <td>Tins</td><td>Weight</td> <td>Tins</td><td>Weight</td> </tr>");
			            echo("<tr><td>1</td> <td>1.A</td> <td>2</td>  <td>3.1</td><td>3.2</td> <td>4.1</td><td>4.2</td> <td>5</td> <td>6</td> <td>7.1.1</td><td>7.1.2</td><td>7.2.1</td><td>7.2.2</td><td>7.3.1</td><td>7.3.2</td></tr>");
			            
			     		foreach ($workProgressLot as $progress )
			     		{
			     			$eow = $db->get_row("SELECT division_code, unit_code, lot_no, yield_fixed, season_year FROM t_expenditure_on_work WHERE lot_no='".$progress['lot_no']."' AND YEAR(season_year)='".$passed_progress_year."' AND division_code='".$_SESSION['division']."'" ,ARRAY_A);
			     			$com = $db->get_row("SELECT division_code, unit_code, lot_no, number_of_mazdoor, season_year FROM  t_cost_of_material WHERE lot_no='".$progress['lot_no']."' AND YEAR(season_year)='".$passed_progress_year."' AND division_code='".$_SESSION['division']."'" ,ARRAY_A);
			     			
			     			$totalCollection = $db->get_row("SELECT lot_no, sum(blazes_tapped) as blazes_tapped, max(mazdoor_engaged) as mazdoor_engaged, sum(resin_tins_tapped) as resin_tins_tapped, sum(resin_tapped) as resin_tapped, progress_dt, season_year FROM t_monthly_resin_collection WHERE work_progress_for_lot_id='".$progress['id']."' AND MONTH(progress_dt)<='".$passed_progress_month."'" ,ARRAY_A);
			     			$monthlyCollection = $db->get_row("SELECT lot_no, blazes_tapped, mazdoor_engaged, resin_tins_tapped, resin_tapped, progress_dt, season_year FROM t_monthly_resin_collection WHERE work_progress_for_lot_id='".$progress['id']."' AND MONTH(progress_dt)='".$passed_progress_month."'" ,ARRAY_A);
							
			     			$untappedBlazes = $progress['blazes_received']-$totalCollection['blazes_tapped'];
			     			
			     			$collectionTinsPrevious = $totalCollection['resin_tins_tapped']-$monthlyCollection['resin_tins_tapped'];
			     			$collectionResinPrevious = ($totalCollection['resin_tapped']-$monthlyCollection['resin_tapped'])/100;
			     			echo("<tr> <td>".$index."</td> <td>".$progress['unit_code']."</td> <td>".$progress['lot_no']."</td> <td>".$progress['unit_code']."</td>  <td>".$totalCollection['blazes_tapped']."</td><td>".$untappedBlazes."</td> <td>".$com['number_of_mazdoor']."</td><td>".$totalCollection['mazdoor_engaged']."</td> <td>".$progress['total_turnout']."</td> <td>".$eow['yield_fixed']."</td> <td>".$collectionTinsPrevious."</td><td>".$collectionResinPrevious."</td><td>".$monthlyCollection['resin_tins_tapped']."</td><td>".($monthlyCollection['resin_tapped']/100)."</td><td>".$totalCollection['resin_tins_tapped']."</td><td>".($totalCollection['resin_tapped']/100)."</td></tr>");
						}
			            
//			            foreach ($reportData as $data )
//						{
//							echo("<tr class='dataRow'> <td>".$index."</td> <td>".$common->getNameForCode($data['unit_code'], "unit_code", "unit_name", "m_unit")."</td> <td>".$data['lot_no']."</td> <td>".$data['total_blazes_received']."</td> ");
//							$common->getPerSectionYieldForLastThreeSeasonForReport($data['season_year'], $data['lot_no']);
//							echo("<td>".$data['proposed_yield']."</td> <td>".$data['approved_yield']."</td></tr>");
//							//$total+=$data['total_blazes_received'];
//							$index++;
//						}
			            //echo(" </table> <table>");
			            //echo(" <tr class='totalRow'> <td colspan='2'><h3>Total:</h3></td> <td colspan='2'><h3>".$total."<h3></td> </tr>");
						echo(" </table> </div>");
			     	}    
				 ?>
				 
				 <!-- <div>
              			<br /><br />
              			<center>
              			<table class="signTable">
              				<tr>
              					<td>
              						Handed over <?php echo($total);?> No. Resin Blazes
              					</td>
              					<td>
              						Taken over <?php echo($total);?> No. Resin Blazes
              					</td>
              				</tr>
              				<tr>
              					<td>
              						&nbsp;
              					</td>
              					<td>
              						&nbsp;
              					</td>
              				</tr>
              				<tr>
              					<td>
              						Divisional Forest Officer, <br />
              						Divisional Forest Officer, <br /> 
              					</td>
              					<td>
              						Divisional Manager, <br />
              						Forest Working Division, <br />
              						<?php echo($_SESSION['division']);?>
              					</td>
              				</tr>	
              			</table>
              			</center>		
              		</div>
              		-->	
              		<div class="donotprint">
              			<br /><br />
              			<form action="report-proposed-extraction-yield.php" method="post" name="reportForm" id="reportForm">
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