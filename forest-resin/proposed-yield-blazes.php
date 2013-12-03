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
			Header("Location: receive-blazes.php");
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
			Header("Location: receive-blazes.php");
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
			Header("Location: receive-blazes.php");
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
			Header("Location: receive-blazes.php");
		}else if($action=='proposedYieldForLot')
		{
			// this action does nothing here but in the UI below
			$action="proposedYieldForLot";
			
		}else if($action=='setYieldForLot')
		{
			$status=TRUE;
			$lot_no=$_POST['lot_no'];
			$season_year=$_POST['season_year'];
			// A approved P pending S sent R rejected
				$approval_yield_status="P";
				if($_POST['proposed_yield']!="")
				{
					$approval_yield_status="S";
				}
				if($_POST['approved_yield']!="")
				{
					$approval_yield_status="A";
				}
				$proposed_yield = $_POST['proposed_yield'];
				$approved_yield = $_POST['approved_yield'];
				$total_blazes = $_POST['total_blazes_received'];
				//$proposed_yield_per_blaze = ($proposed_yield/$total_blazes);
				//$approved_yield_per_blaze = ($approved_yield/$total_blazes);
				
				$db->query("DELETE from t_proposed_yield_form_blazes where division_code='".$_SESSION['division']."'AND lot_no='".$lot_no."' AND season_year='".$season_year."'");
				
				$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."'AND lot_no='".$lot_no."' AND season_year='".$season_year."' ORDER BY lot_no, forest_code",ARRAY_A);
				
				foreach ( $tappings as $tapping )
				{	
					//$db->query("INSERT INTO t_proposed_yield_form_blazes (id, division_code, unit_code, dfo_code, forest_code, lot_no, blazes_received, proposed_yield, approved_yield, approval_yield_status, season_year, created_by)
          			//VALUES (NULL, '".$_SESSION['division']."', '".$tapping['unit_code']."', '".$tapping['dfo_code']."', '".$tapping['forest_code']."', '".$tapping['lot_no']."', '".$tapping['blazes_received']."', '".($proposed_yield_per_blaze*$tapping['blazes_received'])."','".($approved_yield_per_blaze*$tapping['blazes_received'])."', '".$approval_yield_status."', '".$_POST['season_year']."', '".$_POST['created_by']."' )");
          			
					$db->query("INSERT INTO t_proposed_yield_form_blazes (id, division_code, unit_code, dfo_code, forest_code, lot_no, blazes_received, proposed_yield, approved_yield, approval_yield_status, season_year, created_by)
          			VALUES (NULL, '".$_SESSION['division']."', '".$tapping['unit_code']."', '".$tapping['dfo_code']."', '".$tapping['forest_code']."', '".$tapping['lot_no']."', '".$tapping['blazes_received']."', '".($proposed_yield)."','".($approved_yield)."', '".$approval_yield_status."', '".$_POST['season_year']."', '".$_POST['created_by']."' )");
				
				
					if($db->rows_affected>0)
					{ 
						
					}else
					{
						$status=FALSE;
					}
				}
				if($status)
				{	
					$_SESSION['msg']="Proposed yield for Lot [".$_POST['lot_no']."] and Season [".$_POST['season_year']."] Successfully Created.";
				}else 
				{
					$_SESSION['msg']="Problem setting yield for Lot. Please try again.";	
				}
				Header("Location: receive-blazes.php");
			
			//$action="setYieldForLot";
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
                	<form action="receive-blazes.php" method="post" id="blazesForm" data-validate="parsley">
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
              		<form action="receive-blazes.php" method="post" id="blazesForm" data-validate="parsley">
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
			  		}else if($action=="proposedYieldForLot")
                	{
                		$isNew=FALSE;
                		$unit_code="";
                		$dfo_code="";
                		$forest_code="";
                		$lot_no="";
                		$total_blazes_received="";
                		$proposed_yield="";
                		$approved_yield="";
                		$season_year="";
                		
                		$lot_no=$_POST['lot_no'];
                		$season_year=$_POST['season_year'];
                		$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."'AND lot_no='".$lot_no."' AND season_year='".$season_year."' ORDER BY lot_no, forest_code",ARRAY_A);
                		$proposedYield = $db->get_row("SELECT  SUM(proposed_yield) AS proposed_yield, SUM(approved_yield) AS approved_yield FROM t_proposed_yield_form_blazes WHERE lot_no='".$lot_no."' AND season_year='".$season_year."'",ARRAY_A);
                	?>

					<br />
                 	<form action="proposed-yield-blazes.php" method="post" id="yieldForm" data-validate="parsley">
              		<fieldset>
						<legend><font size=5 color=#72A545>Proposed/Approved Yield for Lot of Season <?php echo $season_year; ?></font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
							<table style="position:relative" border="1">
								<tr>    
									<td>Lot Number</td> <td><input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" value="<?php echo($lot_no);?>"/></td>
                                </tr>
                                <tr>
									<td colspan="3">Per section yield obtained for</td> 
	                            </tr>
	                                
                 					<?php $common->getPerSectionYieldForLastThreeSeason($season_year, $lot_no); ?>
	                                     
								<tr>	
									<td>Proposed Yield by DM</td> <td>
										<?php
											if($_SESSION['role']=="manager"  || $_SESSION['role']=="sysadmin")
											{
										?>
												<input class="textbox" id="proposed_yield" type="text" name="proposed_yield" value="<?php echo($proposedYield['proposed_yield']);?>"  data-required="true" data-error-message="Please enter Yield proposed" data-type="number" data-type-number-message="Only number is allowed" />
										<?php
											}else
											{
										?>		
												<input class="lblText" readonly="readonly" id="proposed_yield" type="text" name="proposed_yield" value="<?php echo($proposedYield['proposed_yield']);?>"/>
										<?php
											} // role DM 
										?>		
									</td>
                                </tr>
                                <tr>   
									<td>Approved Yield by Director</td> <td>
										<?php
											if($_SESSION['role']=="director" || $_SESSION['role']=="sysadmin")
											{
										?>
												<input class="textbox" id="approved_yield" type="text" name="approved_yield" value="<?php echo($proposedYield['approved_yield']);?>" data-required="true" data-error-message="Please enter Yield Approved" data-type="number" data-type-number-message="Only number is allowed" />
										<?php
											}else
											{
										?>			
												<input class="lblText" readonly="readonly" id="approved_yield" type="text" name="approved_yield" value="<?php echo($proposedYield['approved_yield']);?>"/>
										<?php
											} // role Director  
										?>		
									</td>
								</tr>
                
                	<?php
                		
                		foreach ( $tappings as $tapping )
				        {
				         
                			$proposedYield = $db->get_row("SELECT * FROM t_proposed_yield_form_blazes WHERE lot_no='".$tapping['lot_no']."' AND forest_code='".$tapping['forest_code']."' AND season_year='".$tapping['season_year']."'",ARRAY_A);
                		
	                		if(isset($proposedYield))
	                		{
	                			//$isNew=FALSE;
	                			// All Set // just update 
	                		}else
	                		{
	                			$isNew=TRUE;
	                			// atleast one not set // delete and insert
	                		}
	                ?>		
	                		
	                			<tr>
									<td>Unit</td> <td><input class="lblText" readonly="readonly" id="unit_code" type="text" name="unit_code" value="<?php echo($tapping['unit_code']);?>"/></td>
                                </tr>
                                <tr>    
									<td>Forest</td> <td>
										<input class="lblText" readonly="readonly" id="forest_code" type="text" name="forest_code" value="<?php echo($tapping['forest_code']);?>"/>
										<input id="dfo_code" type="hidden" name="dfo_code" value="<?php echo($tapping['dfo_code']);?>"/>
									</td>
                                 </tr>
                                 <tr>    
									<td>No of Blazes</td> <td><input class="lblText" readonly="readonly" id="blazes_received" type="text" name="blazes_received" value="<?php echo($tapping['blazes_received']);?>"/></td>
								 </tr>
					<?php 			 
	                		$total_blazes_received+=$tapping['blazes_received'];
	                	} // foreach tappping
	                	// calculate rate per blaze and update
                 	?>
                 				<tr>    
									<td><b>Total No of Blazes</b></td> <td><input class="lblText" readonly="readonly" id="total_blazes_received" type="text" name="total_blazes_received" value="<?php echo($total_blazes_received);?>"/></td>
								</tr>
                    			 		
								</table>
								
								
								<input name="lot_no" type="hidden" value="<?php echo($lot_no);?>"/>
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
									if($_SESSION['role']=="manager" || $_SESSION['role']=="director" || $_SESSION['role']=="sysadmin")
									{
								?>	
									<input class="submit" id="updatelot" type="submit" name="action" value="Set Yield" />
									<input name="submitted" type="hidden" id="submitted" value="1" />
								<?php
									}else
									{
								?>	
									<label>Login with privilage to update yield</label>
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
                		$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' ORDER BY season_year, created_dt, lot_no, range_code  ",ARRAY_A);

                		
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
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="receive-blazes.php" method="post" id="blazesActionForm">
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
              			<form action="receive-blazes.php" method="post" id="blazesForm">
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