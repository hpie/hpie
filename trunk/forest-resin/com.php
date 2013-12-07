<?php
	session_start();
	//include config
	include "config.php";
	
	$rcal_id = $_GET['rcal_id'];
	$forest_code = $_GET['forest_code'];
	$com_code = $_GET['com_code'];
	$division_code=$_SESSION['division'];
	$unit_code=$_GET['unit_code'];
	$lot_no=$_GET['lot_no'];
	$blazes_received=$_GET['blazes_received'];
	//$yield_fixed=$_GET['yield_fixed'];
	//$turnout=$_GET['turnout'];
	//$distance_to_rsd=$_GET['distance_to_rsd'];
	$season_year=$_GET['season_year'];
	//$zone_code="";
	$number_of_mazdoor="0";
	$comArray['id']="0";

	$comArray = $common->getCostOfMaretial($rcal_id, $forest_code, $com_code);
	if($comArray['id']=="0")
	{
		//$comArray['id']="0";
		//$comArray['rate_calculation_for_lot_id']=$rcal_id;
		$comArray['division_code']=$division_code;
		$comArray['unit_code']=$unit_code;
		$comArray['lot_no']=$lot_no;
		//$comArray['forest_code']=$forest_code;
		//$comArray['com_code']=$com_code;
		$comArray['blazes_received']=$blazes_received;
		$comArray['number_of_mazdoor']="";
		$comArray['cost_blaze_frame']="";
		$comArray['exp_blaze_frame']="";
		$comArray['cost_bark_shaver']="";
		$comArray['exp_bark_shaver']="";
		$comArray['cost_groove_cutter']="";
		$comArray['exp_groove_cutter']="";
		$comArray['cost_freshning_knife']="";
		$comArray['exp_freshning_knife']="";
		$comArray['cost_spray_bottle']="";
		$comArray['exp__spray_bottle']="";
		$comArray['cost_hammer_nailpuller']="";
		$comArray['exp_hammer_nailpuller']="";
		$comArray['cost_pot_scrapper']="";
		$comArray['exp_pot_scrapper']="";
		$comArray['cost_pots']="";
		$comArray['exp_pots']="";
		$comArray['cost_lips']="";
		$comArray['exp_lips']="";
		$comArray['cost_wire_nails_5cm']="";
		$comArray['qty_wire_nails_5cm$']="";
		$comArray['exp_wire_nails_5cm$']="";
		$comArray['cost_wire_nails_2cm']="";
		$comArray['qty_wire_nails_2cm']="";
		$comArray['exp_wire_nails_2cm']="";
		$comArray['cost_solder']="";
		$comArray['qty_solder']="";
		$comArray['exp_solder']="";
		$comArray['cost_naushader']="";
		$comArray['qty_naushader']="";
		$comArray['exp_naushader']="";
		$comArray['cost_charcoal']="";
		$comArray['qty_charcoal']="";
		$comArray['exp_charcoal']="";
		$comArray['cost_tool_sharpen']="";
		$comArray['exp_tool_sharpen']="";
		$comArray['season_year']=$season_year;
		$comArray['status_cd']="A";
	}else
	{
		//$comArray['id']="0";
		//$eowArray['rate_calculation_for_lot_id']=$rcal_id;
		//$comArray['division_code']=$division_code;
		//$comArray['unit_code']=$unit_code;
		//$comArray['lot_no']=$lot_no;
		//$comArray['forest_code']=$forest_code;
		//$comArray['com_code']=$com_code;
		$comArray['blazes_received']=$blazes_received;
	}
	
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
                 	<form action="rate-calculation-lot.php" method="post" id="upsetPriceForm" data-validate="parsley" target="_parent">
              		<fieldset>
						<legend><font size=5 color=#72A545>Cost of Material for Forset <?php echo $forest_code; ?> for Season <?php echo $season_year; ?></font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
							<table style="position:relative" border="1">
								<tr>
									<td colspan="2">Division</td> <td colspan="2"><input class="lblText" readonly="readonly" id="division_code" type="text" name="division_code" value="<?php echo($comArray['division_code']);?>"/></td>
                                </tr>
                                <tr>
									<td colspan="2">Unit</td> <td colspan="2"><input class="lblText" readonly="readonly" id="unit_code" type="text" name="unit_code" value="<?php echo($comArray['unit_code']);?>"/></td>
                                </tr>
                                <tr>    
									<td>Lot Number </td> <td><input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" value="<?php echo($comArray['lot_no']);?>"/></td>
									<td>Season </td> <td><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($comArray['season_year']);?>"/></td>
                                </tr>
                                <tr>    
									<td>Forest</td> <td><input class="lblText" readonly="readonly" id="forest_code" type="text" name="forest_code" value="<?php echo($comArray['forest_code']);?>"/></td> 
									<td>Blazes received</td> <td><input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" value="<?php echo($comArray['blazes_received']);?>"/></td>
                                </tr>
                                
                                <tr>    
                                	<td  colspan="4"><input id="number_of_mazdoor" type="hidden" name="number_of_mazdoor" value="<?php echo($comArray['number_of_mazdoor']);?>" /></td>
                                </tr>
                                <tr>    
									<td colspan="4">Cost Details</td>
                                </tr>
                                <tr>    
									<td colspan="4">
										<table id="tblCostDetail"  style="position:relative" border="1">
										</table>
									</td>
                                </tr>	
										
								</table>
								
								<input id="rowid" name="rowid" type="hidden" value="<?php echo($comArray['id']);?>"/>
								<input id="rate_calculation_for_lot_id" name="rate_calculation_for_lot_id" type="hidden" value="<?php echo($comArray['rate_calculation_for_lot_id']);?>"/>
								<input id="com_code" name="com_code" type="hidden" value="<?php echo($comArray['com_code']);?>"/>
								<input name="season_year" type="hidden" value="<?php echo($season_year);?>"/>
								<?php
									if(!$comArray['id']=="0")
									{
										echo('<input name="updated_by" type="hidden" id="updated_by" value="'.$_SESSION['userid'].'" />');
									}else
									{
										echo('<input name="created_by" type="hidden" id="created_by" value="'.$_SESSION['userid'].'" />');
									}
								?>
								
								<br /><br />
								<?php
									if($_SESSION['role']=="admin" || $_SESSION['role']=="manager" || $_SESSION['role']=="director" || $_SESSION['role']=="sysadmin")
									{
								?>	
									<input class="submit" id="updatecom" type="submit" name="action" value="Set Cost" onclick="tb_remove();" />
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
                    	calculateCostOfMaterialDetails(number_of_mazdoor);
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