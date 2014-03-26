<?php
	session_start();
	//include config
	include "config.php";
		
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			$db->query("UPDATE m_schedule_rate SET srate_desc='".$_POST['srate_desc']."', srate='".$_POST['srate']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Schedule Rate Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating srate. Please try again.";
			}
			Header("Location: srate-master.php");
		}else if($action=="save")
		{
			$db->query("INSERT INTO m_schedule_rate (id, srate_code, srate_name, division_code, created_by) VALUES (NULL, '".$_POST['srate_code']."', '".$_POST['srate_name']."', '".$_SESSION['division']."', '".$_POST['created_by']."')");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Unit [".$_POST['srate_code']."] Successfully Created.";
			}else
			{
				$_SESSION['msg']="Problem creating srate. Please try again.";
			}
			Header("Location: srate-master.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE m_schedule_rate SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE m_schedule_rate SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Unit [".$_POST['srate_code']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating srate. Please try again.";
			}
			Header("Location: srate-master.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE m_schedule_rate SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Unit [".$_POST['srate_code']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating srate. Please try again.";
			}
			Header("Location: srate-master.php");
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
                	<div style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?>  <?php echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php echo($_SESSION['division']);?> division.</font> </div>
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
                	<form action="srate-master.php" method="post" id="srateForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Create Unit</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="srate_no">Unit Code:</label>
								<input class="textbox" id="srate_code" type="text" name="srate_code" data-required="true" data-error-message="Unit Code is required"/>
								<label for="srate_name">Unit Name:</label>
								<input class="textbox"  id="srate_name" type="text" name="srate_name" data-required="true" data-error-message="Unit Name is required" />
								<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
								
								<br /><br />
								<input class="submit" id="addlot" type="submit" name="action" value="Save"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
			  	<?php 
			  		}else if($action=="edit")
                	{
                		$srate = $db->get_row("SELECT * FROM m_schedule_rate WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="srate-master.php" method="post" id="srateForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Schedule Rate</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="srate_code">Rate Code:</label>
								<input class="lblText" readonly="readonly" id="srate_code" type="text" name="srate_code" data-required="true" data-error-message="Rate Code is required" value="<?php echo($srate['srate_code']);?>"/>
								<label for="srate_name">Rate Name:</label>
								<input class="lblText"  readonly="readonly" id="srate_name" type="text" name="srate_name" data-required="true" data-error-message="Rate Name is required" value="<?php echo($srate['srate_name']);?>"/>
								<label for="srate_name">Rate Description:</label>
								<input class="textbox"  id="srate_desc" type="text" name="srate_desc" data-required="true" data-error-message="Rate Description is required" value="<?php echo($srate['srate_desc']);?>"/>
								<label for="srate_name">Rate Set:</label>
								<input class="textbox"  id="srate" type="text" name="srate" data-required="true" data-error-message="Rate is required" value="<?php echo($srate['srate']);?>"/>
								
								<input name="rowid" type="hidden" value="<?php echo($srate['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<?php
									if($_SESSION['role']=="manager" || $_SESSION['role']=="director" || $_SESSION['role']=="sysadmin")
									{
								?>	
									<input class="submit" id="updaterate" type="submit" name="action" value="Update"/>
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
				<?php 
			  		}else
                	{
                	?>
                	<br />
                 <?php
                 	$filterSeasonYear="";
                 	if($_SESSION['filter']==TRUE)
                 	{
                 		$filterSeasonYear=$_SESSION['filter-season'];
                 	}
                 ?>
                	<form action="srate-master.php" method="post" name="blazesReportForm" id="blazesReportForm"> 
						<table class="donotprint" border='1'> 
							<tr> 
								<td>Select Season/Year of Report: &nbsp; 
									<?php $common->getSeasonYearList($filterSeasonYear,''); ?> &nbsp; 
									<input class="submit" id="submit" type="submit" name="action" value="Filter"/>
									<input name="submitted" type="hidden" id="submitted" value="1" />
								</td> 
							</tr> 
						</table>
					</form>	
       
                	<?php 	
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Schedule Rates Master</h1> <form> <span> </span> <table> <tr> <td>Rate Code</td> <td>Rate Name</td> <td>Rate Description</td> <td>Current Rate</td> <td>Status</td> <td>Season</td> <td>Action</td></tr>"); 
                		$srates="";
                		if($_SESSION['filter']==TRUE)
                		{
                			$srates = $db->get_results("SELECT * FROM m_schedule_rate WHERE division_code='".$_SESSION['filter-division']."' AND season_year='".$_SESSION['filter-season']."' ORDER BY srate_name" ,ARRAY_A);
                		}else
                		{
                			$srates = $db->get_results("SELECT * FROM m_schedule_rate WHERE division_code='".$_SESSION['division']."' ORDER BY season_year, srate_name" ,ARRAY_A);	
                		}
                		
	
				         foreach ( $srates as $srate )
				         { 
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$srate['srate_code']."</td> <td>".$srate['srate_name']."</td>");
				         	echo(" <td>".$srate['srate_desc']."</td> <td>".$srate['srate']."</td>");
				         	echo("<td>".$srate['status_cd']."</td>");
				         	echo("<td>".date('Y', strtotime($srate['season_year']))."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="srate-master.php" method="post" id="srateActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($srate['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($srate['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($srate['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									
									//echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="srate_code" type="hidden" value="<?php echo($srate['srate_code']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($srate['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($srate['id']);?>" />
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
              			<form action="srate-master.php" method="post" id="srateForm">
							<input class="submit" id="cancel" type="submit" name="action" value="Cancel"/>
							<!--<input class="submit" id="newlot" type="submit" name="action" value="New"/>-->
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