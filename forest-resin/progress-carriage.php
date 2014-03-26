<?php
	session_start();
	//include config
	include "config.php";
	
	$wprog_id = $_GET['wprog_id'];
	$division_code=$_SESSION['division'];
	$lot_no=$_GET['lot_no'];
	$total_resin_tins_tapped=$_GET['total_resin_tins_tapped'];
	$total_resin_tins_carriaged=$_GET['total_resin_tins_carriaged'];
	
	$resin_tins_carriaged="";
	$resin_carriaged="";
	$resin_carriage_mule="";
	$dist_carriage_mule="";
	$resin_carriage_manual="";	
	$dist_carriage_manual="";
	$resin_carriage_tractor="";
	$dist_carriage_tractor="";
	$resin_carriage_other="";
	$dist_carriage_other="";
	$contractor_code="";
	$progress_dt="";
	$season_year=$_GET['season_year'];

	$resin_tins_for_carriage = ($total_resin_tins_tapped-$total_resin_tins_carriaged);
		
?>

<!-- html head start -->
<?php include('includes/include.php'); ?>
<!-- html head  end-->


<body>
<!-- wrap starts here -->
<div id="wrap">
	<!-- header start -->
	<?php // include('includes/header.php'); ?>
    <!-- header end-->
    
<!-- content-wrap starts here -->
	<div id="content-wrap">
	<!-- content starts here -->		    	
        <div id="content">	
        	<div id="msgdiv"> 
        		<p style="color:#CC0000"><?php echo $msg; ?></p>
        	</div>
        	<?php 
        		if($action!="")
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
                	<div style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?>  <?php echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php echo($_SESSION['division']);?> division.</font></div>
					<div style="float:right;">
                    	<?php 
							date_default_timezone_set('Asia/Calcutta');
							print date("jS F Y, g:i A");
						?>
                        
                     </div>
                 </h1>
       
                <br />
                
                 	<br />
                 	<form action="work-progress-lot.php" method="post" id="carriageForm" data-validate="parsley" target="_parent">
              		<fieldset>
						<legend><font size=5 color=#72A545>Monthly Progress: Collection  for Lot<?php echo $lot_no; ?> for Season <?php echo $season_year; ?></font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
							<table style="position:relative" border="1">
								<tr>
									<td colspan="2">Division</td> <td colspan="2"><input class="lblText" readonly="readonly" id="division_code" type="text" name="division_code" value="<?php echo($division_code);?>"/></td>
                                </tr>
                                <tr>    
									<td>Lot Number </td> <td><input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" value="<?php echo($lot_no);?>"/></td>
									<td>Season </td> <td><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($season_year);?>"/></td>
                                </tr>
                                
                                <tr>    
									<td>Total Resin Collected</td> <td><input class="lblText" readonly="readonly" id="total_resin_tins_tapped" type="text" name="total_resin_tins_tapped" value="<?php echo($total_resin_tins_tapped);?>"/></td>
									<td>Availabe for Carriage</td> <td><input class="lblText" readonly="readonly" id="resin_tins_for_carriage" type="text" name="resin_tins_for_carriage" value="<?php echo($resin_tins_for_carriage);?>"/></td>
                                </tr>
                                
                                <tr>    
                                	<td colspan="4">&nbsp;</td>
                                </tr>
                                
								<tr>    
									<td>Contractor</td> <td><?php $common->getContractorList("",""); ?></td>
									<td>Progress for Month of</td> <td><input class="textbox" id="progress_dt" type="text" name="progress_dt" data-required="true" data-error-message="Valid date is required"/></td>
                                </tr>
                                
                                <tr>    
                                	<td colspan="4">&nbsp;</td>
                                </tr>
                                
                                 <tr>
									<td>Total Tins Carriaged</td>
									<td> <input class="textboxSmall" id="resin_tins_carriaged" type="text" name="resin_tins_carriaged" data-required="true" data-error-message="No of tins carriaged is required" data-type="number" data-type-number-message="Only number is allowed" onblur="validateTinsCarriaged(this, resin_tins_for_carriage); calculateResinCollected(this, resin_carriaged); "/></td> 
									<td>Quantity of Resin Carriaged </td>
									<td> <input class="lblTextSmall" readonly="readonly" id="resin_carriaged" type="text" name="resin_carriaged" /> kg</td>
								</tr>
                                
                                <tr>
	                                <td>Tins Carriage by Mules</td>
									<td> <input class="textboxSmall" id="resin_carriage_mule" type="text" name="resin_carriage_mule" value="0" data-type="number" data-type-number-message="Only number is allowed" /></td> 
									 <td> for a distance of </td>
									 <td> <input class="textboxSmall" id="dist_carriage_mule" type="text" name="dist_carriage_mule"  value="0" data-type="number" data-type-number-message="Only number is allowed" /> km</td>
								</tr>
								
								<tr>
									<td>Tins Carriage Manual</td>
									<td> <input class="textboxSmall" id="resin_carriage_manual" type="text" name="resin_carriage_manual"  value="0" data-type="number" data-type-number-message="Only number is allowed" /></td> 
									<td> for a distnace of </td>
									<td> <input class="textboxSmall" id="dist_carriage_manual" type="text" name="dist_carriage_manual"  value="0" data-type="number" data-type-number-message="Only number is allowed" /> km</td>
								</tr>
								
								<tr>
									<td>Tins Carriage by Tractor</td>
									<td> <input class="textboxSmall" id="resin_carriage_tractor" type="text" name="resin_carriage_tractor"  value="0" data-type="number" data-type-number-message="Only number is allowed" /></td> 
									<td> for a distance of </td>
									<td> <input class="textboxSmall" id="dist_carriage_tractor" type="text" name="dist_carriage_tractor"  value="0" data-type="number" data-type-number-message="Only number is allowed" /> km</td>
								</tr>
								
								<tr>
									<td>Tins Carriage by Other</td>
									<td> <input class="textboxSmall" id="resin_carriage_other" type="text" name="resin_carriage_other"  value="0" data-type="number" data-type-number-message="Only number is allowed" /></td> 
									<td> for a distance of </td>
									<td> <input class="textboxSmall" id="dist_carriage_other" type="text" name="dist_carriage_other"  value="0" data-type="number" data-type-number-message="Only number is allowed" /> km</td>
								</tr>
                               		
								</table>
								
								<input id="rowid" name="rowid" type="hidden" value="0"/>
								<input id="work_progress_for_lot_id" name="work_progress_for_lot_id" type="hidden" value="<?php echo($wprog_id);?>"/>
								<input name="season_year" type="hidden" value="<?php echo($season_year);?>"/>
								<?php
									//if(!$wprog_id=="0")
									//{
										echo('<input name="updated_by" type="hidden" id="updated_by" value="'.$_SESSION['userid'].'" />');
									//}else
									//{
										echo('<input name="created_by" type="hidden" id="created_by" value="'.$_SESSION['userid'].'" />');
									//}
								?>
								
								<br /><br />
								<?php
									if($_SESSION['role']=="admin" || $_SESSION['role']=="manager" || $_SESSION['role']=="director" || $_SESSION['role']=="sysadmin")
									{
								?>	
									<input class="submit" id="updatecom" type="submit" name="action" value="Save Carriage" onclick="tb_remove();" />
									<input class="submit" id="cancel" type="button" name="cancel" value="cancel" onclick="parent.tb_remove();" />
									<input name="submitted" type="hidden" id="submitted" value="1" />
								<?php
									}else
									{
								?>	
									<label>Login with privilage to update Costs</label>
								<?php
									} // role Director  
								?>		
								
							</div>
						</fieldset>
				  	</form>
				  	<script>
				  	$j(function() {
				  		$j( "#progress_dt" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '<?php echo(date('Y', strtotime($season_year)))?>:<?php echo(date('Y', strtotime($season_year)))?>' 
					                });
					  });
					</script>		  
	
				</div>
		<!-- post ends here -->		        

		</div>
	<!-- content ends here -->		        
    </div>
<!-- content-wrap ends here -->		
    

<!-- footer starts here -->	
	<div id="footer">
		<?php // include('includes/footer.php'); ?>
	</div>
<!-- footer ends here -->


</div>
<!-- wrap ends here -->

</body>
</html>    