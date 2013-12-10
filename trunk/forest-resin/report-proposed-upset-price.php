<?php
	session_start();
	//include config
	include "config.php";
	$titleMsg="Proposed-Upset-Price-Report";
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
                	<form action="report-proposed-upset-price.php" method="post" name="blazesReportForm" id="blazesReportForm"> 
						<table class="donotprint" border='1'> 
							<tr> 
								<td>Select Season/Year of Report: &nbsp; 
									<?php $common->getSeasonYearList($_POST['season_year'],''); ?> &nbsp; 
									<input class="submit" id="submit" type="submit" name="action" value="Show Report"/>
									<input name="submitted" type="hidden" id="submitted" value="1" />
								</td> 
							</tr> 
						</table>
					</form>	
							
			     <?php
			     	if($action=="report")
			     	{
			     		$reportData = $db->get_results("SELECT unit_code, lot_no, blazes_received, approved_yield, total_turnout, total_expenditure, rate_calculated, proposed_rate, approved_rate, season_year from  t_proposed_price_for_lot WHERE season_year='".$_POST['season_year']."'",ARRAY_A);
			     		$index=1; 
			     		$total=0;
			     		//$_POST['season_year'] 
			            
			     		echo("<div class='CSSTableGenerator'>");
			     		echo("<h2>Himachal Pradesh State Forest Development Corporation Limited</h2>");
			            echo("<h2>Forest Working Devision ".$_SESSION['division']." </h2>");
			     		echo("<h1>Statement Showing The Detail of Proposed Upset Price of Resin Lots for Season ".$_POST['season_year']."</h1>"); 
			            echo("<table class='reportTable'> <tr class='headRow'> <td>Sr. No.</td> <td>Lot No</td> <td>No of Blazes</td> <td>Yield Fixed</td> ");
			            echo("<td>Total Out Turn(Qtl)</td> <td>Total Expenditure of Lot(Rs)</td> <td>Rate per qtl.</td> <td>Rate proposed by DM</td> <td>Rate approved by Director</td></tr>");
			            foreach ($reportData as $data )
						{
							echo("<tr class='dataRow'> <td>".$index."</td> <td>".$data['lot_no']."</td> <td>".$data['blazes_received']."</td> <td>".$data['approved_yield']."</td>");
							echo("<td>".$data['total_turnout']."</td> <td>".$data['total_expenditure']."</td> <td>".$data['rate_calculated']."</td> <td>".$data['proposed_rate']."</td> <td>".$data['approved_rate']."</td></tr>");
							//$total+=$data['total_blazes_received'];
							$index++;
						}
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
              			<form action="report-proposed-upset-price.php" method="post" name="reportForm" id="reportForm">
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