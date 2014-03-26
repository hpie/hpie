<?php
	session_start();
	//include config
	include "config.php";
	
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			$db->query("UPDATE t_blazes_for_tapping SET blazes_received='".$_POST['blazes_received']."', season_year='".$_POST['season_year']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Blazes detail Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating blazes. Please try again.";
			}
			Header("Location: work-progress-lot.php");
		}else if($action=="save")
		{
			$db->query("INSERT INTO t_blazes_for_tapping (id, lot_no, forest_code, unit_code, dfo_code, range_code, blazes_received, taken_over_dt,	season_year, division_code, created_by) VALUES (NULL, '".$_POST['lot_no']."', '".$_POST['forest_code']."', '".$_POST['unit_code']."', '".$_POST['dfo_code']."', '".$_POST['range_code']."', '".$_POST['blazes_received']."', '".$_POST['season_year']."', '".$_POST['season_year']."', '".$_SESSION['division']."', '".$_POST['created_by']."')");
			$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Blazes for Lot [".$_POST['lot_no']."] Successfully Created.";
			}else
			{
				$_SESSION['msg']="Problem creating lot. Please try again.";
			}
			Header("Location: work-progress-lot.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE t_blazes_for_tapping SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE t_blazes_for_tapping SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Lot [".$_POST['lot_no']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating lot. Please try again.";
			}
			Header("Location: work-progress-lot.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE t_blazes_for_tapping SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Lot [".$_POST['lot_no']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating lot. Please try again.";
			}
			Header("Location: work-progress-lot.php");
		}else if($action=='markComplete')
		{
			// 
			$db->query("UPDATE t_work_progress_for_lot SET status_cd='C', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$action="workProgressForLot";
			
		}else if($action=='reOpen')
		{
			// 
			$db->query("UPDATE t_work_progress_for_lot SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$action="workProgressForLot";
			
		}else if($action=='workProgressForLot')
		{
			// this action does nothing here but in the UI below
			$action="workProgressForLot";
			
		}else if($action=='setTappingForLot')
		{	
          	$workProgress=$db->get_row("SELECT id, EXTRACT(YEAR_MONTH FROM progress_dt) as progress_dt from  t_monthly_resin_collection WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'", ARRAY_A);
          	$passed_progress_dt=date('Ym', strtotime($_POST['progress_dt']));

          	if($workProgress['progress_dt']==$passed_progress_dt)
          	{// update
          		$db->query("UPDATE t_monthly_resin_collection SET blazes_tapped='".$_POST['blazes_tapped']."', mazdoor_engaged='".$_POST['mazdoor_engaged']."', resin_tins_tapped='".$_POST['resin_tins_tapped']."', resin_tapped='".$_POST['resin_tapped']."', contractor_code='".$_POST['contractor_code']."', progress_dt='".$_POST['progress_dt']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$workProgress['id']."'");		
          	}else
          	{// insert
          		$db->query("INSERT INTO t_monthly_resin_collection (id, work_progress_for_lot_id, division_code, lot_no, blazes_tapped, mazdoor_engaged, resin_tins_tapped, resin_tapped, contractor_code, progress_dt, season_year, created_by) VALUES (NULL, '".$_POST['work_progress_for_lot_id']."', '".$_SESSION['division']."', '".$_POST['lot_no']."', '".$_POST['blazes_tapped']."', '".$_POST['mazdoor_engaged']."', '".$_POST['resin_tins_tapped']."', '".$_POST['resin_tapped']."', '".$_POST['contractor_code']."', '".$_POST['progress_dt']."', '".$_POST['season_year']."', '".$_POST['created_by']."')");
          	}
          	
          	
          	$workProgress=$db->get_row("SELECT work_progress_for_lot_id, sum(blazes_tapped) as blazes_tapped, max(mazdoor_engaged) as mazdoor_engaged, sum(resin_tins_tapped) as resin_tins_tapped, sum(resin_tapped) as resin_tapped FROM t_monthly_resin_collection WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'", ARRAY_A);
			
          	// update the overall progress
			$db->query("UPDATE t_work_progress_for_lot SET total_blazes_tapped='".$workProgress['blazes_tapped']."', total_mazdoor_engaged='".$workProgress['mazdoor_engaged']."', total_resin_tins_tapped='".$workProgress['resin_tins_tapped']."', total_resin_tapped='".$workProgress['resin_tapped']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$workProgress['work_progress_for_lot_id']."'");
         	if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Progress for Lot [".$_POST['lot_no']."] for Monthly Progress  [".$_POST['progress_dt']."]  Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updatin yield for Lot. Please try again.";
			}
			//Header("Location: work-progress-lot.php");
			
          	
			$action="workProgressForLot";
			//$db->debug();	
		}else if($action=='setCarriageForLot')
		{	
          	$workProgress=$db->get_row("SELECT id, EXTRACT(YEAR_MONTH FROM progress_dt) as progress_dt from  t_monthly_resin_carriage WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'", ARRAY_A);
          	$passed_progress_dt=date('Ym', strtotime($_POST['progress_dt']));

          	if($workProgress['progress_dt']==$passed_progress_dt)
          	{// update
          		$db->query("UPDATE t_monthly_resin_carriage SET resin_tins_carriaged='".$_POST['resin_tins_carriaged']."', resin_carriaged='".$_POST['resin_carriaged']."', resin_carriage_mule='".$_POST['resin_carriage_mule']."', dist_carriage_mule='".$_POST['dist_carriage_mule']."', resin_carriage_manual='".$_POST['resin_carriage_manual']."', dist_carriage_manual='".$_POST['dist_carriage_manual']."', resin_carriage_tractor='".$_POST['resin_carriage_tractor']."', dist_carriage_tractor='".$_POST['dist_carriage_tractor']."', resin_carriage_other='".$_POST['resin_carriage_other']."', dist_carriage_other='".$_POST['dist_carriage_other']."', contractor_code='".$_POST['contractor_code']."', progress_dt='".$_POST['progress_dt']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$workProgress['id']."'");		
          	}else
          	{// insert
          		$db->query("INSERT INTO t_monthly_resin_carriage (id, work_progress_for_lot_id, division_code, lot_no, resin_tins_carriaged, resin_carriaged, resin_carriage_mule, dist_carriage_mule, resin_carriage_manual, dist_carriage_manual, resin_carriage_tractor, dist_carriage_tractor, resin_carriage_other, dist_carriage_other, contractor_code, progress_dt, season_year, created_by) VALUES (NULL, '".$_POST['work_progress_for_lot_id']."', '".$_SESSION['division']."', '".$_POST['lot_no']."', '".$_POST['resin_tins_carriaged']."', '".$_POST['resin_carriaged']."', '".$_POST['resin_carriage_mule']."', '".$_POST['dist_carriage_mule']."', '".$_POST['resin_carriage_manual']."', '".$_POST['dist_carriage_manual']."', '".$_POST['resin_carriage_tractor']."', '".$_POST['dist_carriage_tractor']."', '".$_POST['resin_carriage_other']."', '".$_POST['dist_carriage_other']."', '".$_POST['contractor_code']."', '".$_POST['progress_dt']."', '".$_POST['season_year']."', '".$_POST['created_by']."')");
          	}
          	
          	//$db->debug();
          	$workProgress=$db->get_row("SELECT work_progress_for_lot_id, sum(resin_tins_carriaged) as resin_tins_carriaged, sum(resin_carriaged) as resin_carriaged FROM t_monthly_resin_carriage WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'", ARRAY_A);
			
          	// update the overall progress
			$db->query("UPDATE t_work_progress_for_lot SET total_resin_tins_carriaged='".$workProgress['resin_tins_carriaged']."', total_resin_carriaged='".$workProgress['resin_carriaged']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$workProgress['work_progress_for_lot_id']."'");
         	if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Progress for Lot [".$_POST['lot_no']."] for Monthly Progress  [".$_POST['progress_dt']."]  Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updatin Monthly Progress  for Lot. Please try again.";
			}
			//Header("Location: work-progress-lot.php");
			
          	
			$action="workProgressForLot";
			//$db->debug();	
		}else if($action=='setTransportForLot')
		{	
          	$workProgress=$db->get_row("SELECT id, EXTRACT(YEAR_MONTH FROM progress_dt) as progress_dt from  t_monthly_resin_transport WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'", ARRAY_A);
          	$passed_progress_dt=date('Ym', strtotime($_POST['progress_dt']));

          	if($workProgress['progress_dt']==$passed_progress_dt)
          	{// update
          		$db->query("UPDATE  t_monthly_resin_transport SET resin_tins_transported='".$_POST['resin_tins_transported']."', resin_transported='".$_POST['resin_transported']."', vehicle_number='".$_POST['vehicle_number']."', vehicle_type='".$_POST['vehicle_type']."', driver_name='".$_POST['driver_name']."', challan_number='".$_POST['challan_number']."', progress_dt='".$_POST['progress_dt']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$workProgress['id']."'");		
          	}else
          	{// insert
          		$db->query("INSERT INTO  t_monthly_resin_transport (id, work_progress_for_lot_id, division_code, lot_no, resin_tins_transported, resin_transported, vehicle_number, vehicle_type, driver_name, challan_number, progress_dt, season_year, created_by) VALUES (NULL, '".$_POST['work_progress_for_lot_id']."', '".$_SESSION['division']."', '".$_POST['lot_no']."', '".$_POST['resin_tins_transported']."', '".$_POST['resin_transported']."', '".$_POST['vehicle_number']."', '".$_POST['vehicle_type']."', '".$_POST['driver_name']."', '".$_POST['challan_number']."', '".$_POST['progress_dt']."', '".$_POST['season_year']."', '".$_POST['created_by']."')");
          	}
          	
          	
          	$workProgress=$db->get_row("SELECT work_progress_for_lot_id, sum(resin_tins_transported) as resin_tins_transported, sum(resin_transported) as resin_transported FROM  t_monthly_resin_transport WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'", ARRAY_A);
			
          	// update the overall progress
			$db->query("UPDATE t_work_progress_for_lot SET total_resin_tins_transported='".$workProgress['resin_tins_transported']."', total_resin_transported='".$workProgress['resin_transported']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$workProgress['work_progress_for_lot_id']."'");
         	if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Progress for Lot [".$_POST['lot_no']."] for Monthly Progress  [".$_POST['progress_dt']."]  Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updatin Monthly Progress  for Lot. Please try again.";
			}
			//Header("Location: work-progress-lot.php");
			
          	
			$action="workProgressForLot";
			//$db->debug();	
		}
		
		
		
		
		
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
                <?php
                	if($action=="create")
                	{
                ?>		
                	<form action="work-progress-lot.php" method="post" id="blazesForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Manage Blazes</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Lot No:</label>
								<select id="lot_no" name="lot_no" onchange="loadLotForests(this);" data-required="true" data-error-message="Lot Number is required">
									<option value=''>Select</option>
								 <?php 
								  $lots = $db->get_results("SELECT lot_no, lot_desc FROM m_lot WHERE division_code='".$_SESSION['division']."' AND status_cd='A' GROUP BY lot_no"  ,ARRAY_A);
			 
						            foreach ( $lots as $lot )
						            {
						            	echo ("<option value='".$lot['lot_no']."'>".$lot['lot_no']."(".$lot['lot_desc'].")</option>");
						            	
						            }
								 ?>
								</select>
								
								<label for="forest_code">Forest:</label>
								<div id='forest_code_div'>
								<select id="forest_code" name="forest_code" onchange="loadForestRangeAndDfo(this);" data-required="true" data-error-message="Forest is required">
								<option value="">Select</option>
								</select>
								</div>
								
								<label for="unit_code">Unit:</label>
								<select id="unit_code" name="unit_code" data-required="true" data-error-message="Unit is required">
									<option value=''>Select</option>
								 <?php 
								  $units = $db->get_results("SELECT unit_code, unit_name FROM m_unit WHERE division_code='".$_SESSION['division']."' AND status_cd='A'",ARRAY_A);
			 
						            foreach ( $units as $unit )
						            {
						            	echo ("<option value='".$unit['unit_code']."'>".$unit['unit_name']."</option>");
						            }
								 ?>
								</select>
								
								<div id='forest_range_dfo_div'>---</div>
								
								<label for="blazes_received">No of Blazes:</label>
								<input class="textbox" id="blazes_received" type="text" name="blazes_received" data-required="true" data-error-message="Blazes count is required" data-type="digits" data-type-digits-message="Only number is allowed" />
								
								<label for="season_year">Tapping Season:</label>
								<?php
									$common->getSeasonYearList(""); 
								?>
								
								<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid']); ?>" />
								
								<br /><br />
								<input class="submit" id="addlot" type="submit" name="action" value="Save"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
			  	<?php 
			  		}else if($action=="edit")
                	{
                		$blazes = $db->get_row("SELECT * FROM t_proposed_yield_form_blazes WHERE id='".$_POST['rowid']."'",ARRAY_A);
                ?>
              		<form action="work-progress-lot.php" method="post" id="blazesForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Lot</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Lot No:</label>
								<input class="lblText" readonly="readonly" id="lot_no" type="text" value="<?php echo($blazes['lot_no']);?>"/>
								<label for="forest_code">Forest:</label>
								<input class="lblText" readonly="readonly" id="forest_code" type="text" name="forest_code" value="<?php echo($blazes['forest_code']);?>"/>
								
								<label for="unit_code">Unit:</label>
								<input class="lblText" readonly="readonly" id="unit_code" type="text" name="unit_code" value="<?php echo($blazes['unit_code']);?>"/>
								
								<label for="dfo_code">DFO:</label>
								<input class="lblText" readonly="readonly" id="dfo_code" type="text" name="dfo_code" value="<?php echo($blazes['dfo_code']);?>"/>
							
								<label for="range_code">Range:</label>
								<input class="lblText" readonly="readonly" id="range_code" type="text" name="range_code" value="<?php echo($blazes['range_code']);?>"/>
								
								<label for="blazes_received">No of Blazes:</label>
								<input class="textbox" id="blazes_received" type="text" name="blazes_received" value="<?php echo($blazes['blazes_received']);?>" data-required="true" data-error-message="Blazes count is required" data-type="digits" data-type-digits-message="Only number is allowed" />
								
								<label for="season_year">Tapping Season:</label>
								 <?php 
								 	$common->getSeasonYearList($blazes['season_year']);
								 ?>
								
								
								<input name="rowid" type="hidden" value="<?php echo($blazes['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<input class="submit" id="updatelot" type="submit" name="action" value="Update"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
				 <?php 
			  		}else if($action=="workProgressForLot")
                	{
                		// workflow check
                		$wflow=$db->get_var("SELECT approved_rate FROM t_proposed_price_for_lot WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."'");
                		//$db->debug();
                		if(!isset($wflow))
                		{
                			$_SESSION['msg']="Rate is not set is not set. Please try again.";
                			//Header("Location: work-progress-lot.php");
                			echo("<script>location.href='lot-progress.php'</script>");
						}else if($wflow==0)
						{
							$_SESSION['msg']="Rate is not avaliable. Please get approval and try again.";
                			//Header("Location: work-progress-lot.php");
                			echo("<script>location.href='lot-progress.php'</script>");
						}
						
			
                		$isNew=FALSE;
                		$unit_code="";
                		$lot_no="";
                		$blazes_received=0;
                		$total_blazes_tapped=0;
						$number_of_mazdoor=0;
						$total_mazdoor_engaged=0;
						$total_turnout=0;
						$total_resin_tins_tapped=0;
						$total_resin_tapped=0;
						$total_resin_tins_carriaged=0;
						$total_resin_carriaged=0;
						$total_resin_tins_transported=0;
						$total_resin_transported=0;
                		$season_year="";
                		$status_cd="";
                		$rowid="0";
                		
                		$scheduleRate;
                		
                		$workProgress = $db->get_row("SELECT * FROM t_work_progress_for_lot WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."' AND division_code='".$_SESSION['division']."'",ARRAY_A);
                		
                		if(isset($workProgress))
                		{
                			$unit_code=$workProgress['unit_code'];
                			$lot_no=$workProgress['lot_no'];
                			$blazes_received=$workProgress['blazes_received'];
	                		$total_blazes_tapped=$workProgress['total_blazes_tapped'];
	                		$number_of_mazdoor=$workProgress['number_of_mazdoor'];
	                		$total_mazdoor_engaged=$workProgress['total_mazdoor_engaged'];
	                		$total_turnout=$workProgress['total_turnout'];
	                		$total_resin_tins_tapped=$workProgress['total_resin_tins_tapped'];
	                		$total_resin_tapped=$workProgress['total_resin_tapped'];
	                		$total_resin_tins_carriaged=$workProgress['total_resin_tins_carriaged'];
	                		$total_resin_carriaged=$workProgress['total_resin_carriaged'];
	                		$total_resin_tins_transported=$workProgress['total_resin_tins_transported'];
	                		$total_resin_transported=$workProgress['total_resin_transported'];
                			$season_year=$workProgress['season_year'];
                			$status_cd=$workProgress['status_cd'];
                			$rowid=$workProgress['id'];
                			$isNew=FALSE;
                		}else
                		{
                			$upsetPrice = $db->get_row("SELECT id, division_code, unit_code, lot_no, total_blazes, total_turnout, com_code FROM t_rate_calculation_for_lot WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."'",ARRAY_A);
                			$number_of_mazdoors = $db->get_var("SELECT number_of_mazdoor FROM t_cost_of_material WHERE com_code='".$upsetPrice['com_code']."'");
                			$db->query("INSERT INTO t_work_progress_for_lot (id, division_code, unit_code, lot_no, blazes_received, number_of_mazdoor, total_turnout, season_year, created_by)
          					VALUES (NULL, '".$_SESSION['division']."', '".$_POST['unit_code']."', '".$_POST['lot_no']."', '".$upsetPrice['total_blazes']."', '".$number_of_mazdoors."', '".$upsetPrice['total_turnout']."', '".$_POST['season_year']."', '".$_SESSION['userid']."' )");

                			$workProgress = $db->get_row("SELECT * FROM t_work_progress_for_lot WHERE lot_no='".$_POST['lot_no']."' AND season_year='".$_POST['season_year']."'",ARRAY_A);
                			
                			$unit_code=$workProgress['unit_code'];
                			$lot_no=$workProgress['lot_no'];
                			$blazes_received=$workProgress['blazes_received'];
	                		$total_blazes_tapped=$workProgress['total_blazes_tapped'];
	                		$number_of_mazdoor=$workProgress['number_of_mazdoor'];
	                		$total_mazdoor_engaged=$workProgress['total_mazdoor_engaged'];
	                		$total_turnout=$workProgress['total_turnout'];
	                		$total_resin_tins_tapped=$workProgress['total_resin_tins_tapped'];
	                		$total_resin_tapped=$workProgress['total_resin_tapped'];
	                		$total_resin_tins_carriaged=$workProgress['total_resin_tins_carriaged'];
	                		$total_resin_carriaged=$workProgress['total_resin_carriaged'];
	                		$total_resin_tins_transported=$workProgress['total_resin_tins_transported'];
	                		$total_resin_transported=$workProgress['total_resin_transported'];
                			$season_year=$workProgress['season_year'];
                			$status_cd=$workProgress['status_cd'];
                			$rowid=$workProgress['id'];
                			
//                			$unit_code=$_POST['unit_code'];
//                			$lot_no=$_POST['lot_no'];
//                			$total_blazes=0;
//                			$season_year=$_POST['season_year'];
//                			$rowid="0";

                			$isNew=TRUE;
                		}
                		
                 ?>
                 	<br />
                 	<form action="work-progress-lot.php" method="post" id="progressForm" data-validate="parsley"  onsubmit="return calculateScheduleRate(exp_eow, exp_com, total_turnout, total_eow, total_com, total_expenditure, rate_calculated)" >
              		<fieldset>
						<legend><font size=5 color=#72A545>Work Progress for Lot of Season <?php echo $season_year; ?></font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
							<table style="position:relative" border="1">
								<tr>
									<td colspan="2">Division</td> <td colspan="3"><input class="lblText" readonly="readonly" id="division_code" type="text" name="division_code" value="<?php echo($_SESSION['division']);?>"/></td>
                                </tr>
                                <tr>
									<td colspan="2">Unit</td> <td colspan="3"><?php echo $common->getNameForCode($unit_code, "unit_code", "unit_name", "m_unit");?> <input class="lblText" readonly="readonly" id="unit_code" type="hidden" name="unit_code" value="<?php echo($unit_code);?>"/></td>
                                </tr>
                                <tr>    
									<td>Lot Number </td> <td><input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" value="<?php echo($lot_no);?>"/></td>
									<td>Season </td> <td colspan="2"><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($season_year);?>"/></td>
                                </tr>
                                <tr>    
									<td>Total Blazes Available </td> <td><input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" value="<?php echo($blazes_received);?>"/></td>
									<td>Total Blazes Tapped </td> <td colspan="2"><input class="lblText" readonly="readonly" id="total_blazes_tapped" type="text" name="total_blazes_tapped" value="<?php echo($total_blazes_tapped);?>"/></td>
                                </tr>
                                
                                <tr>    
									<td>Number of Mazdoors </td> <td><input class="lblText" readonly="readonly" id="number_of_mazdoor" type="text" name="number_of_mazdoor" value="<?php echo($number_of_mazdoor);?>"/></td>
									<td>Mazdoors Engaged</td> <td colspan="2"><input class="lblText" readonly="readonly" id="total_mazdoor_engaged" type="text" name="total_mazdoor_engaged" value="<?php echo($total_mazdoor_engaged);?>"/></td>
                                </tr>
                                <tr>    
									<td colspan="2">Total Turnout </td> <td colspan="3"><input class="lblText" readonly="readonly" id="total_turnout" type="text" name="total_turnout" value="<?php echo($total_turnout);?>"/></td>
                                </tr>
                                
                                <tr>
							    	<td colspan="5"><b>Resin Collected</b></td>
							    </tr>
							    <tr>    
									<td>Total Tins </td> <td><input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" value="<?php echo($total_resin_tins_tapped);?>"/></td>
									<td>Total Resin </td> <td colspan="2"><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($total_resin_tapped);?>"/></td>
                                </tr>
                                
                                <tr>
							    	<td colspan="5"><b>Resin Carriaged</b></td>
							    </tr>
							    <tr>    
									<td>Tins Carriaged to RSD </td> <td><input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" value="<?php echo($total_resin_tins_carriaged);?>"/></td>
									<td>Resin Carriaged to RSD </td> <td colspan="2"><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($total_resin_carriaged);?>"/></td>
                                </tr>
                                
                                <tr>
							    	<td colspan="5"><b>Resin Tranpsorted</b></td>
							    </tr>
							    <tr>    
									<td>Tins Transported to Depot </td> <td><input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" value="<?php echo($total_resin_tins_transported);?>"/></td>
									<td>Resin Transported to Depot </td> <td colspan="2"><input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($total_resin_transported);?>"/></td>
                                </tr>
                                
                                <tr>
							    	<td colspan="5">&nbsp;</td>
							    </tr>
							    
							    <?php
							    	//$eow = $db->get_row("SELECT exp_eow FROM t_expenditure_on_work WHERE rate_calculation_for_lot_id='".$rowid."' AND forest_code='".$tapping['forest_code']."' AND lot_no='".$lot_no."' AND eow_code='". $eow_code."' AND season_year='".$season_year."'",ARRAY_A);
									//$com = $db->get_row("SELECT exp_com FROM t_cost_of_material WHERE rate_calculation_for_lot_id='".$rowid."' AND forest_code='".$tapping['forest_code']."' AND lot_no='".$lot_no."' AND com_code='". $com_code."' AND season_year='".$season_year."'",ARRAY_A);
							    ?>
							    
							    <tr>
				         	 		<td colspan="2">Enter Monthly Progress for Collection </td> <td colspan="3"><a href="progress-collection.php?wprog_id=<?php echo($rowid);?>&unit_code=<?php echo($unit_code);?>&lot_no=<?php echo($lot_no);?>&blazes_received=<?php echo($blazes_received);?>&season_year=<?php echo($season_year);?>&keepThis=true&TB_iframe=true&height=600&width=1000&modal=true" title="Enter Collection Details for the Lot" class="thickbox" >Monthly Collection <img src="./images/calculator_green_16.png" /></a></td>
				         	 	</tr>
				         	 	<tr>
				         	 		<td colspan="2">Enter Monthly Progress for Carriage </td> <td colspan="3"><a href="progress-carriage.php?wprog_id=<?php echo($rowid);?>&unit_code=<?php echo($unit_code);?>&lot_no=<?php echo($lot_no);?>&total_resin_tins_tapped=<?php echo($total_resin_tins_tapped);?>&total_resin_tins_carriaged=<?php echo($total_resin_tins_carriaged);?>&season_year=<?php echo($season_year);?>&keepThis=true&TB_iframe=true&height=600&width=1000&modal=true" title="Enter Carraige Details for the Lot" class="thickbox" >Monthly Carriage <img src="./images/calculator_green_16.png"/></a></td>
				         	 	</tr>
				         	 	<tr>
				         	 		<td colspan="2">Enter Monthly Progress for Transportation </td> <td colspan="3"><a href="progress-transportation.php?wprog_id=<?php echo($rowid);?>&unit_code=<?php echo($unit_code);?>&lot_no=<?php echo($lot_no);?>&total_resin_tins_tapped=<?php echo($total_resin_tins_tapped);?>&total_resin_tins_carriaged=<?php echo($total_resin_tins_carriaged);?>&total_resin_tins_transported=<?php echo($total_resin_tins_transported);?>&season_year=<?php echo($season_year);?>&keepThis=true&TB_iframe=true&height=600&width=1000&modal=true" title="Enter Transport Details for the Lot" class="thickbox" >Monthly Transport <img src="./images/calculator_green_16.png"/></a></td>
				         	 	</tr>
				         	 	
				         	 	<tr>
				         	 		<td colspan="5">&nbsp;</td>
				         	 	</tr>
				         	 	     								
										
								</table>
								
								<input name="rowid" type="hidden" value="<?php echo($rowid);?>"/>
								<input name="season_year" type="hidden" value="<?php echo($season_year);?>"/>
								<?php
									if(!$isNew)
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
									<input class="submit" id="updateprogress" type="submit" name="action" value="Show Progress" />
										<?php
											if($status_cd=="C")
											{
												if($_SESSION['role']=="manager" || $_SESSION['role']=="director" || $_SESSION['role']=="sysadmin")
												{
													echo('<input class="submit" id="updateprogress" type="submit" name="action" value="Re-Open" />');		
												}
											}else 
											{
												echo('<input class="submit" id="updateprogress" type="submit" name="action" value="Mark Complete" />');
											}
									 	?>
									<input name="submitted" type="hidden" id="submitted" value="1" />
								
								<?php
									}else
									{
								?>	
									<label>Login with privilage to update progress</label>
								<?php
									} // role Director  
								?>		
								
							</div>
						</fieldset>
				  	</form>		  
				<?php 
			  		}else
                	{
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Blazes Received</h1> <table> <tr> <td>Range</td> <td>Unit (DFO)</td> <td>Lot No</td> <td>Forest</td> <td>No of Blazes</td> <td>Season</td> <td>Status</td> <td>Action</td></tr>"); 
                		if($_SESSION['role']=="sysadmin")
                		{
                			$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' ORDER BY season_year, created_dt, lot_no, range_code  ",ARRAY_A);
                		}else{
                			$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' AND status_cd<>'D' ORDER BY season_year, created_dt, lot_no, range_code  ",ARRAY_A);
                		}

                		
				         foreach ( $tappings as $tapping )
				         { 
			         	 	//$lotForests = $db->get_results("SELECT forest_code FROM t_blazes_for_tapping WHERE lot_no='".$tapping['lot_no']."'",ARRAY_A);
			 	            
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$tapping['range_code']."</td> <td>".$tapping['unit_code']." (".$tapping['dfo_code'].")</td>  <td>".$tapping['lot_no']."</td>");
				         	
				         	echo(" <td>");
				         	//foreach ( $lotForests as $forest )
				         	//{
				         		//echo($forest['forest_code']." <br />");
				         		echo($tapping['forest_code']);
				         	//}
				         	echo(" </td>");
				         	
				         	//echo("<td>".$tapping['blazes_received']."</td> <td>".date('Y', strptime($tapping['season_year'], 'y/m/d'))."</td>");
				         	echo("<td>".$tapping['blazes_received']."</td> <td>".date('Y', strtotime($tapping['season_year']))."</td>");
				         	echo("<td>".$tapping['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="work-progress-lot.php" method="post" id="blazesActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($tapping['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($tapping['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($tapping['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		//if($db->num_rows==1)
				         	 		//{
				         	 			echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									//}
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted'/>");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="lot_no" type="hidden" value="<?php echo($tapping['lot_no']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($tapping['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($tapping['id']);?>" />
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
              			<form action="work-progress-lot.php" method="post" id="blazesForm">
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