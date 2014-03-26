<?php
	session_start();
	//include config
	include "config.php";
	$titleMsg="Verify-Blazes-Report";
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
                	<form action="report-lot-blazes.php" method="post" name="blazesReportForm" id="blazesReportForm"> 
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
			     		
			     		$index=1; 
			     		$total=0;
			     		$gtotal=0;
			     		//$_POST['season_year'] 
			            echo("<div class='CSSTableGenerator'> <h1>Verified List of Resin Blazes Taken Over for Resin Tapping Season ".$_POST['season_year']."</h1>"); 
			            echo("<table> <tr> <td>Sr. No.</td> <td>Name of Range</td> <td>Name of Unit</td> <td>Lot No</td> <td>Name of Forest</td> <td>No of Blazes</td> <td>Taking Over Date</td></tr>");
			            
			            $range="";
			            $unit="";
			            $lot="";
			            $reportData = $db->get_results("SELECT range_code, unit_code, lot_no, forest_code, blazes_received, season_year from t_blazes_for_tapping WHERE season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."' AND status_cd<>'D' ",ARRAY_A);
			            foreach ($reportData as $data )
			            {
			            	
			            	if($lot!=$data['lot_no'])
			            	{
			            		if($lot!="")
			            		{
			            			echo(" <tr> <td colspan='5'><h4>Total:</h4></td> <td colspan='2'><h4>".$total."</h4></td> </tr>");
			            			$total=0;
			            			$index=1;
			            		}else 
			            		{
			            			echo("<tr> <td>".$index."</td>");
									echo("<td>".$common->getNameForCode($data['range_code'], "range_code", "range_name", "m_range")."</td>"); 	
									echo("<td>".$common->getNameForCode($data['unit_code'], "unit_code", "unit_name", "m_unit")."</td> <td>".$data['lot_no']."</td> <td>".$common->getNameForCode($data['forest_code'], "forest_code", "forest_name", "m_forest")."</td> <td>".$data['blazes_received']."</td> <td>".$data['season_year']."</td>");
									echo("</tr>");
			            		}
			            	}else 
			            	{
			            		echo("<tr> <td colspan='7'>&nbsp;</td> </tr>");
			            		echo("<tr> <td>".$index."</td>");
								echo("<td>".$data['range_code']."</td>"); 	
								echo("<td>".$data['unit_code']."</td> <td>".$data['lot_no']."</td> <td>".$data['forest_code']."</td> <td>".$data['blazes_received']."</td> <td>".$data['season_year']."</td>");
								echo("</tr>");
			            	} 
			            	$total+=$data['blazes_received'];
			            	$gtotal+=$data['blazes_received'];
							$index++;
						}
						echo(" <tr> <td colspan='5'><h4>Total:</h4></td> <td colspan='2'><h4>".$total."<h4></td> </tr>");
			            
			            echo(" <tr> <td colspan='7'>&nbsp;</td> </tr>");
			            
			            echo(" <tr> <td colspan='5'><h3>Total:</h3></td> <td colspan='2'><h3>".$gtotal."</h3></td> </tr>");
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
              			<form action="report-lot-blazes.php" method="post" name="reportForm" id="reportForm">
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