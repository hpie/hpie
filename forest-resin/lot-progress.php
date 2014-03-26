<?php
	session_start();
	//include config
	include "config.php";
		
	if(isset($_POST['submitted']))
	{

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
                 	$filterSeasonYear="";
                 	if($_SESSION['filter']==TRUE)
                 	{
                 		$filterLot=$_SESSION['filter-lot'];
                 		$filterSeasonYear=$_SESSION['filter-season'];
                 	}
                 ?>
                	<form action="lot-progress.php" method="post" name="progressForm" id="progressForm"> 
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
                	echo("<br /> <div class='CSSTableGenerator'> <h1>Work Progress on Lots</h1> <table> <tr> <td>Lot No</td> <td>Season Year</td> <td>Forest</td> <td>Status</td> <td>Action</td></tr>"); 
                	$lots="";
                	if($_SESSION['filter']==TRUE)
                	{
                		if($_SESSION['role']=="sysadmin")
                		{
                			$lots = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' AND lot_no='".$_SESSION['filter-lot']."' AND season_year='".$_SESSION['filter-season']."' GROUP BY lot_no, season_year" ,ARRAY_A);
                		}else{
                			$lots = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' AND lot_no='".$_SESSION['filter-lot']."' AND season_year='".$_SESSION['filter-season']."' AND status_cd<>'D' GROUP BY lot_no, season_year" ,ARRAY_A);
                		}
                	}else
                	{
                		if($_SESSION['role']=="sysadmin")
                		{
                			$lots = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' GROUP BY lot_no, season_year" ,ARRAY_A);
                		}else{
                			$lots = $db->get_results("SELECT * FROM t_blazes_for_tapping WHERE division_code='".$_SESSION['division']."' AND status_cd<>'D' GROUP BY lot_no, season_year" ,ARRAY_A);
                		}
                	}
					
                	
			         foreach ( $lots as $lot )
			         { 
		         	 	$lotForests = $db->get_results("SELECT forest_code FROM m_lot WHERE lot_no='".$lot['lot_no']."'",ARRAY_A);
		 	            
		         	 	echo(" <tr>");
		         	 	echo(" <td>".$lot['lot_no']."</td><td>".date('Y', strtotime($lot['season_year']))."</td>");
			         	
			         	echo(" <td>");
			         	foreach ( $lotForests as $forest )
			         	{
			         		echo($common->getNameForCode($forest['forest_code'], "forest_code", "forest_name", "m_forest"));
			         		echo(" <br />");
			         	}
			         	echo(" </td>");
			         	
			         	$lotProgress = $db->get_row("SELECT * FROM t_work_progress_for_lot WHERE lot_no='".$lot['lot_no']."' AND season_year='".$lot['season_year']."'",ARRAY_A);
			         	if(isset($lotProgress))
			         	{
			         		if($lotProgress['status_cd']=="C")
			         		{
			         			echo("<td>Completed</td>");
			         		}else if($lotProgress['status_cd']=="A")
			         		{
			         			echo("<td>In Progress</td>");
			         		}else if($lotProgress['status_cd']=="I")
			         		{
			         			echo("<td>Suspended</td>");
			         		}
			         		
			         	}else{
			         		echo("<td>Not Started</td>");
			         	}
			         	
			         	
			         	echo(" <td>");
				         	
			     ?>
		     			<form style="margin:0px; border:0px; background-color:inherit;" action="lot-progress.php" method="post" id="progressActionForm_<?php echo($lot['id']);?>" name="progressActionForm_<?php echo($lot['id']);?>">
						<!-- Create row specific actions -->
		     			<?php 
							if($lot['status_cd']=="D")
		         	 		{
		         	 			echo("<input class='statusDImgBut' id='status' type='button' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
							}else if($lot['status_cd']=="I")
		         	 		{
			         	 		echo("<input class='statusIImgBut' id='status' type='button' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
							
		         	 		}else if($lot['status_cd']=="A")
		         	 		{
		         	 			echo("<input class='statusAImgBut' id='status' type='button' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
		         	 		
			         	 		//if($db->num_rows==1)
			         	 		//{
			         	 			//echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
								//}
								
								//echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
								
		         	 			echo("<input class='actionTxtBut' id='progresslot' type='submit' name='action' value='Show Progress' title='Enter/View Work Progress for Lot' onClick='setFormAction(\"progressActionForm_".$lot['id']."\",\"work-progress-lot.php\")' /> &nbsp;");
						 
		         	 		}// else status
						?>
						<!-- End row specific actions -->	
							<input name="lot_no" type="hidden" value="<?php echo($lot['lot_no']);?>" />
							<input name="unit_code" type="hidden" value="<?php echo($lot['unit_code']);?>" />
							<input name="blazes_received" type="hidden" value="<?php echo($lot['blazes_received']);?>" />
							<input name="season_year" type="hidden" value="<?php echo($lot['season_year']);?>" />
							<input name="status_cd" type="hidden" value="<?php echo($lot['status_cd']);?>" />
							<input name="rowid" type="hidden" value="<?php echo($lot['id']);?>" />
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
              			<form action="lot-progress.php" method="post" id="lotProgress">
							<input class="submit" id="cancel" type="submit" name="action" value="Cancel"/>
							<!-- <input class="submit" id="newlot" type="submit" name="action" value="New"/>  -->
							<input name="submitted" type="hidden" id="submitted" value="1" />
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