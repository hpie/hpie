<?php
	session_start();
	//include config
	include "config.php";
	
	$rcal_id = $_GET['rcal_id'];
	$forest_code = $_GET['forest_code'];
	$eow_code = $_GET['eow_code'];
	$division_code=$_SESSION['division'];
	$unit_code=$_GET['unit_code'];
	$lot_no=$_GET['lot_no'];
	$blazes_received=$_GET['blazes_received'];
	$yield_fixed=$_GET['yield_fixed'];
	$turnout=round($_GET['turnout'],3);
	$distance_to_rsd=$_GET['distance_to_rsd'];
	$season_year=$_GET['season_year'];
	$zone_code="";
	$eowArray['id']="0";

	$eowArray = $common->getExpenditureOnWork($rcal_id, $forest_code, $eow_code);
	if($eowArray['id']=="0")
	{
		//$eowArray['id']="0";
		//$eowArray['rate_calculation_for_lot_id']=$rcal_id;
		$eowArray['division_code']=$division_code;
		$eowArray['unit_code']=$unit_code;
		$eowArray['lot_no']=$lot_no;
		//$eowArray['forest_code']=$forest_code;
		$eowArray['zone_code']="";
		$eowArray['eow_code']=$eow_code;
		$eowArray['blazes_received']=$blazes_received;
		$eowArray['yield_fixed']=$yield_fixed;
		$eowArray['cost_crop_setting']="";
		$eowArray['exp_crop_setting']="";
		$eowArray['cost_extr']="";
		$eowArray['turnout']=$turnout;
		$eowArray['exp_extr_turnout']="";
		$eowArray['total_tins']="";
		$eowArray['distance_to_rsd']=$distance_to_rsd;
		$eowArray['cost_tpt_tins_to_forest']="";
		$eowArray['exp_tpt_tins_to_forest']="";
		$eowArray['cost_tpt_tins_to_rsd']="";
		$eowArray['exp_tpt_tins_to_rsd']="";
		$eowArray['cost_tpt_drums_to_forest']="";
		$eowArray['exp_tpt_drums_to_forest']="";
		$eowArray['cost_tpt_drums_to_rsd']="";
		$eowArray['exp_tpt_drums_to_rsd']="";
		$eowArray['cost_carriage_mule_rsd']="";
		$eowArray['exp_carriage_mule_rsd']="";
		$eowArray['cost_carriage_manual_rsd']="";
		$eowArray['exp_carriage_manual_rsd']="";
		$eowArray['cost_soldering_of_resin']="";
		$eowArray['exp_soldering_of_resin']="";
		$eowArray['cost_mate_commission']="";
		$eowArray['exp_mate_commission']="";
		$eowArray['season_year']=$season_year;
		$eowArray['status_cd']="A";
	}else
	{
		//$eowArray['division_code']=$division_code;
		//$eowArray['unit_code']=$unit_code;
		//$eowArray['lot_no']=$lot_no;
		//$eowArray['forest_code']=$forest_code;
		//$eowArray['zone_code']="";
		//$eowArray['eow_code']=$eow_code;
		$eowArray['blazes_received']=$blazes_received;
		$eowArray['yield_fixed']=$yield_fixed;
		//$eowArray['cost_crop_setting']="";
		//$eowArray['exp_crop_setting']="";
		//$eowArray['cost_extr']="";
		$eowArray['turnout']=$turnout;
		//$eowArray['exp_extr_turnout']="";
		//$eowArray['total_tins']="";
		$eowArray['distance_to_rsd']=$distance_to_rsd;
		
		
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
						<legend><font size=5 color=#72A545>Expenditure on Work for  Forset <?php echo $forest_code; ?> for Season <?php echo $season_year; ?></font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
							<table style="position:relative" border="1">
								<tr>
									<td colspan="2">Division</td> <td colspan="2"><input class="lblText" readonly="readonly" id="division_code" type="text" name="division_code" value="<?php echo($eowArray['division_code']);?>"/></td>
                                </tr>
                                <tr>
									<td colspan="2">Unit</td> <td colspan="2"><input class="lblText" readonly="readonly" id="unit_code" type="text" name="unit_code" value="<?php echo($eowArray['unit_code']);?>"/></td>
                                </tr>
                                <tr>    
									<td colspan="2">Zone</td> <td colspan="2"><?php $common->getZoneList($eowArray['zone_code'], "calculateExpenditureDetails"); ?></td>
                                </tr>
                                <tr>    
									<td>Lot Number </td> <td><input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" value="<?php echo($eowArray['lot_no']);?>"/></td>
									<td>Season </td> <td><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($eowArray['season_year']);?>"/></td>
                                </tr>
                                <tr>    
									<td>Forest</td> <td><input class="lblText" readonly="readonly" id="forest_code" type="text" name="forest_code" value="<?php echo($eowArray['forest_code']);?>"/></td> 
									<td>Blazes received</td> <td><input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" value="<?php echo($eowArray['blazes_received']);?>"/></td>
                                </tr>
                                <tr>    
                                	<td>Proposed Yield</td> <td><input class="lblText" readonly="readonly" id="yield_fixed" type="text" name="yield_fixed" value="<?php echo($eowArray['yield_fixed']);?>"/></td>
                                	<td>Turn Out</td> <td><input class="lblText" readonly="readonly" id="turnout" type="text" name="turnout" value="<?php echo($eowArray['turnout']);?>"/></td>
                                </tr>
                                <tr>    
									<td>Distance to RSD</td> <td><input class="lblText" readonly="readonly" id="distance_to_rsd" type="text" name="distance_to_rsd" value="<?php echo($eowArray['distance_to_rsd']);?>"/></td>
									<td>Total Turnout</td> <td><input class="lblText" readonly="readonly" id="total_turnout" type="text" name="total_turnout" value="<?php echo($_SESSION['total_turnout']);?>"/></td>
                                </tr>	
                                <tr>    
									<td colspan="4">Expenditure Details</td>
                                </tr>
                                <tr>    
									<td colspan="4">
										<table id="tblExpenditureDetail"  style="position:relative" border="1">
										</table>
									</td>
                                </tr>	
										
								</table>
								
								<input id="rowid" name="rowid" type="hidden" value="<?php echo($eowArray['id']);?>"/>
								<input id="rate_calculation_for_lot_id" name="rate_calculation_for_lot_id" type="hidden" value="<?php echo($eowArray['rate_calculation_for_lot_id']);?>"/>
								<input id="eow_code" name="eow_code" type="hidden" value="<?php echo($eowArray['eow_code']);?>"/>
								<input name="season_year" type="hidden" value="<?php echo($season_year);?>"/>
								<?php
									if(!$eowArray['id']=="0")
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
									<input class="submit" id="updateeow" type="submit" name="action" value="Set Expenditure" onclick="tb_remove();" />
									<input class="submit" id="cancel" type="button" name="cancel" value="cancel" onclick="parent.tb_remove();" />
									<input name="submitted" type="hidden" id="submitted" value="1" />
								<?php
									}else
									{
								?>	
									<label>Login with privilage to update Expenditure</label>
								<?php
									} // role Director  
								?>		
								
							</div>
						</fieldset>
				  	</form>		  
					
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