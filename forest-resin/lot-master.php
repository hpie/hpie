<?php
	session_start();
	//include config
	include "config.php";
		
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			//$db->query("UPDATE m_lot SET lot_desc='".$_POST['lot_desc']."', forest_code='".$_POST['forest_code']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$db->query("UPDATE m_lot SET lot_desc='".$_POST['lot_desc']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Lot Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating lot. Please try again.";
			}
			Header("Location: lot-master.php");
		}else if($action=="save")
		{
			$exist = $db->get_row("SELECT * FROM m_lot WHERE lot_no='".$_POST['lot_no']."' AND division_code='".$_SESSION['division']."'",ARRAY_A);
			if(isset($exist))
			{
				$_SESSION['msg']="Entry for Lot [".$_POST['lot_no']."] for Division already exists." ;	
			}else
			{
				foreach ($_POST['forest_code'] as $forest_code)
				{
				    $db->query("INSERT INTO m_lot (id, lot_no, lot_desc, forest_code, division_code, created_by) VALUES (NULL, '".$_POST['lot_no']."', '".$_POST['lot_desc']."', '".$forest_code."', '".$_SESSION['division']."', '".$_POST['created_by']."')");
					//$db->debug();
					if($db->rows_affected>0)
					{ 
						$_SESSION['msg']="Lot [".$_POST['lot_no']."] Successfully Created.";
					}else
					{
						$_SESSION['msg']="Problem creating lot. Please try again.";
					}			        
				}
			}
			Header("Location: lot-master.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE m_lot SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE lot_no='".$_POST['lot_no']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE m_lot SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE lot_no='".$_POST['lot_no']."'");
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
			Header("Location: lot-master.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE m_lot SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE lot_no='".$_POST['lot_no']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Lot [".$_POST['lot_no']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating lot. Please try again.";
			}
			Header("Location: lot-master.php");
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
                	<form action="lot-master.php" method="post" id="lotForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Create Lot</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Lot No:</label>
								<input class="textbox" id="lot_no" type="text" name="lot_no" data-required="true" data-error-message="Lot Number is required"/>
								<label for="lot_desc">Lot Description:</label>
								<input class="textbox"  id="lot_desc" type="text" name="lot_desc" data-required="true" data-error-message="Lot description is required" />
								<label for="forest_code">Forest:</label>
								<select multiple id="forest_code" name="forest_code[]" data-required="true" data-error-message="Forest is required" style="width:500px; height:300px;">
								 <?php 
								  $forests = $db->get_results("SELECT f.forest_code, f.forest_name, f.range_code FROM m_forest f,  m_range r WHERE f.range_code=r.range_code AND r.division_code='".$_SESSION['division']."' AND f.status_cd='A'",ARRAY_A);
			 
						            foreach ( $forests as $forest )
						            {
						            	echo "<option value='".$forest['forest_code']."'>".$forest['forest_name']."[ ".$forest['range_code']."]</option>";
						            	
						            }
								 ?>
								</select>
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
                		$lot = $db->get_row("SELECT * FROM m_lot WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="lot-master.php" method="post" id="lotForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Lot</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Lot No:</label>
								<input class="lblText" readonly="readonly" id="lot_no" type="text" name="lot_no" data-required="true" data-error-message="Lot Number is required" value="<?php echo($lot['lot_no']);?>"/>
								<label for="lot_desc">Lot Description:</label>
								<input class="textbox"  id="lot_desc" type="text" name="lot_desc" data-required="true" data-error-message="Lot description is required" value="<?php echo($lot['lot_desc']);?>"/>
								<label for="forest_code">Forest:</label>
								<select class="lblText" readonly="readonly" id="forest_code" name="forest_code" data-required="true" data-error-message="Forest is required">
									<option value=''>Select</option>
								 <?php 
								  $forests = $db->get_results("SELECT f.forest_code, f.forest_name, f.range_code FROM m_forest f,  m_range r WHERE f.range_code=r.range_code AND r.division_code='".$_SESSION['division']."' AND f.status_cd='A'",ARRAY_A);
			 
						            foreach ( $forests as $forest )
						            {
						            	if($forest['forest_code']==$lot['forest_code'])
						            	{
						            		echo ("<option value='".$forest['forest_code']."' selected='selected'>".$forest['forest_name']."[ ".$forest['range_code']."]</option>");
						            	}else
						            	{
						            		echo ("<option value='".$forest['forest_code']."'>".$forest['forest_name']."[ ".$forest['range_code']."]</option>");
						            	}
						            	
						            }
								 ?>
								</select>
								<input name="rowid" type="hidden" value="<?php echo($lot['id']);?>"/>
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
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Lots</h1> <table> <tr> <td>Lot No</td> <td>Lot Description</td> <td>Forest</td> <td>Status</td> <td>Action</td></tr>"); 
                		if($_SESSION['role']=="sysadmin")
                		{
                			$lots = $db->get_results("SELECT * FROM m_lot WHERE division_code='".$_SESSION['division']."' GROUP BY lot_no" ,ARRAY_A);
                		}else{
                			$lots = $db->get_results("SELECT * FROM m_lot WHERE division_code='".$_SESSION['division']."' AND status_cd<>'D' GROUP BY lot_no" ,ARRAY_A);
                		}

                		
				         foreach ( $lots as $lot )
				         { 
			         	 	$lotForests = $db->get_results("SELECT forest_code FROM m_lot WHERE lot_no='".$lot['lot_no']."'",ARRAY_A);
			 	            
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$lot['lot_no']."</td> <td>".$lot['lot_desc']."</td>");
				         	
				         	echo(" <td>");
				         	foreach ( $lotForests as $forest )
				         	{
				         		echo($common->getNameForCode($forest['forest_code'], "forest_code", "forest_name", "m_forest"));
				         		echo(" <br />");
				         	}
				         	echo(" </td>");
				         	
				         	echo("<td>".$lot['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="lot-master.php" method="post" id="lotActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($lot['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($lot['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($lot['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		if($db->num_rows==1)
				         	 		{
				         	 			echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									}
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="lot_no" type="hidden" value="<?php echo($lot['lot_no']);?>" />
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
              			<form action="lot-master.php" method="post" id="lotForm">
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