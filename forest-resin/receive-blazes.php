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
			$exist = $db->get_row("SELECT * FROM t_blazes_for_tapping WHERE lot_no='".$_POST['lot_no']."' AND forest_code='".$_POST['forest_code']."' AND season_year='".$_POST['season_year']."'",ARRAY_A);
			if(isset($exist))
			{
				$_SESSION['msg']="Blazes entry for Lot [".$_POST['lot_no']."] and Forest [".$_POST['forest_code']."] already exist for Season [".$_POST['season_year']."]" ;	
			}else
			{
				$db->query("INSERT INTO t_blazes_for_tapping (id, lot_no, forest_code, unit_code, dfo_code, range_code, blazes_received, taken_over_dt,	season_year, division_code, created_by) VALUES (NULL, '".$_POST['lot_no']."', '".$_POST['forest_code']."', '".$_POST['unit_code']."', '".$_POST['dfo_code']."', '".$_POST['range_code']."', '".$_POST['blazes_received']."', '".$_POST['season_year']."', '".$_POST['season_year']."', '".$_SESSION['division']."', '".$_POST['created_by']."')");
				//$db->debug();
				if($db->rows_affected>0)
				{ 
					$_SESSION['msg']="Blazes for Lot [".$_POST['lot_no']."] Successfully Created.";
				}else
				{
					$_SESSION['msg']="Problem creating lot. Please try again.";
				}
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
                	<br />
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
                		$blazes = $db->get_row("SELECT * FROM t_blazes_for_tapping WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
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
								 	//$common->getSeasonYearList($blazes['season_year']);
								 ?>
								<input class="lblText" readonly="readonly" id="season_year" type="text" name="season_year" value="<?php echo($blazes['season_year']);?>"/>
								
								<input name="rowid" type="hidden" value="<?php echo($blazes['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<input class="submit" id="updatelot" type="submit" name="action" value="Update"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>			  
				<?php 
			  		}else
                	{
                ?>
                	<br />
                 <?php
                 	$filterSeasonYear="";
                 	if($_SESSION['filter']==TRUE)
                 	{
                 		$filterLot=$_SESSION['filter-lot'];
                 		$filterSeasonYear=$_SESSION['filter-season'];
                 	}
                 ?>
                	<form action="receive-blazes.php" method="post" name="blazesForm" id="blazesForm" data-validate="parsley"> 
						<table class="donotprint" border='1'> 
							<tr> 
								<td>Select Lot No. : &nbsp; 
									<select id="lot_no" name="lot_no" data-required="true" data-error-message="Lot Number is required">
										<option value=''>Select</option>
										 <?php 
										  $lots = $db->get_results("SELECT lot_no, lot_desc FROM m_lot WHERE division_code='".$_SESSION['division']."' AND status_cd='A' GROUP BY lot_no"  ,ARRAY_A);
					 
								            foreach ( $lots as $lot )
								            {
								            	if($lot['lot_no']==$filterLot)
								            	{
								            		echo ("<option value='".$lot['lot_no']."' selected='selected'>".$lot['lot_no']."(".$lot['lot_desc'].")</option>");
								            	}else
								            	{
								            		echo ("<option value='".$lot['lot_no']."'>".$lot['lot_no']."(".$lot['lot_desc'].")</option>");
								            	}
								            	
								            }
										 ?>
									</select> &nbsp; 
									for Year: &nbsp;<?php $common->getSeasonYearList($filterSeasonYear,''); ?> &nbsp; 
									<input class="submit" id="submit" type="submit" name="action" value="Filter"/>
									<input name="submitted" type="hidden" id="submitted" value="1" />
								</td> 
							</tr> 
						</table>
					</form>	
       
                	<?php
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Blazes Received</h1>");
                		 
                		echo("<table> <tr> <td>Range</td> <td>Unit (DFO)</td> <td>Lot No</td> <td>Forest</td> <td>No of Blazes</td> <td>Season</td> <td>Status</td> <td>Action</td></tr>"); 
                		$tappings="";
                		if($_SESSION['filter']==TRUE)
                		{
                			if($_SESSION['role']=="sysadmin")
                			{
                				$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' AND lot_no='".$_SESSION['filter-lot']."' AND season_year='".$_SESSION['filter-season']."' ORDER BY season_year, lot_no, range_code" ,ARRAY_A);
                			}else{
                				$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' AND lot_no='".$_SESSION['filter-lot']."' AND season_year='".$_SESSION['filter-season']."' AND status_cd<>'D' ORDER BY season_year, lot_no, range_code" ,ARRAY_A);
                			} 
                		}else
                		{
                			if($_SESSION['role']=="sysadmin")
                			{
                				$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' ORDER BY season_year, lot_no, range_code",ARRAY_A);
                			}else{
                				$tappings = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' AND status_cd<>'D' ORDER BY season_year, lot_no, range_code",ARRAY_A);
                			}
                		}

                		
				         foreach ( $tappings as $tapping )
				         { 
			         	 	//$lotForests = $db->get_results("SELECT forest_code FROM t_blazes_for_tapping WHERE lot_no='".$tapping['lot_no']."'",ARRAY_A);
			 	            
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$common->getNameForCode($tapping['range_code'], "range_code", "range_name", "m_range")."</td> <td>".$common->getNameForCode($tapping['unit_code'], "unit_code", "unit_name", "m_unit")." <br /> (".$common->getNameForCode($tapping['dfo_code'], "dfo_code", "dfo_name", "m_dfo").")</td>  <td>".$tapping['lot_no']."</td>");
				         	
				         	echo(" <td>");
				         	//foreach ( $lotForests as $forest )
				         	//{
				         		//echo($forest['forest_code']." <br />");
				         		echo($common->getNameForCode($tapping['forest_code'], "forest_code", "forest_name", "m_forest"));
				         	//}
				         	echo(" </td>");
				         	
				         	//echo("<td>".$tapping['blazes_received']."</td> <td>".date('Y', strptime($tapping['season_year'], 'y/m/d'))."</td>");
				         	echo("<td>".$tapping['blazes_received']."</td> <td>".date('Y', strtotime($tapping['season_year']))."</td>");
				         	echo("<td>".$tapping['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="receive-blazes.php" method="post" id="blazesActionForm_<?php echo($tapping['id']);?>" name="blazesActionForm_<?php echo($tapping['id']);?>">
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
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted'/> &nbsp;");
									
									echo("<input class='actionTxtBut' id='propyield' type='submit' name='action' value='Proposed Yield' title='Enter/View Proposed yield' onClick='setFormAction(\"blazesActionForm_".$tapping['id']."\",\"proposed-yield-blazes.php\")' /> &nbsp;");
									
									//echo("<input class='actionTxtBut' id='upsertprice' type='submit' name='action' value='Upset Price' title='Enter/View/Calculate Upsert Price' onClick='setFormAction(\"blazesActionForm_".$tapping['id']."\",\"rate-calculation-lot.php\")' /> &nbsp;");
									echo("<input class='actionTxtBut' id='upsertprice' type='submit' name='action' value='Upset Price' title='Enter/View/Calculate Upsert Price' onClick='setFormAction(\"blazesActionForm_".$tapping['id']."\",\"rate-calculation-lot-bylot.php\")' /> &nbsp;");
									
									echo("<input class='actionTxtBut' id='proposedrate' type='submit' name='action' value='Proposed Rate' title='Enter/View Proposed rate' onClick='setFormAction(\"blazesActionForm_".$tapping['id']."\",\"proposed-rate-blazes.php\")' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="lot_no" type="hidden" value="<?php echo($tapping['lot_no']);?>" />
								<input name="unit_code" type="hidden" value="<?php echo($tapping['unit_code']);?>" />
								<input name="dfo_code" type="hidden" value="<?php echo($tapping['dfo_code']);?>" />
								<input name="range_code" type="hidden" value="<?php echo($tapping['range_code']);?>" />
								<input name="forest_code" type="hidden" value="<?php echo($tapping['forest_code']);?>" />
								<input name="blazes_received" type="hidden" value="<?php echo($tapping['blazes_received']);?>" />
								<input name="season_year" type="hidden" value="<?php echo($tapping['season_year']);?>" />
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