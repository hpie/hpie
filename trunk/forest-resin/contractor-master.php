<?php
	session_start();
	//include config
	include "config.php";
		
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			$db->query("UPDATE m_contractor SET contractor_fname='".$_POST['contractor_fname']."', contractor_lname='".$_POST['contractor_lname']."', contractor_ffname='".$_POST['contractor_ffname']."', contractor_flname='".$_POST['contractor_flname']."', contractor_gender='".$_POST['contractor_gender']."', contractor_address='".$_POST['contractor_address']."', contractor_po='".$_POST['contractor_po']."', contractor_teh='".$_POST['contractor_teh']."', contractor_distt='".$_POST['contractor_distt']."', contractor_pin='".$_POST['contractor_pin']."' ,contractor_phone='".$_POST['contractor_phone']."', contractor_mobile='".$_POST['contractor_mobile']."', contractor_class='".$_POST['contractor_class']."', contractor_valid_dt='".$_POST['contractor_valid_dt']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Contractor Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating contractor. Please try again.";
			}
			Header("Location: contractor-master.php");
		}else if($action=="save")
		{
			$db->query("INSERT INTO m_contractor (id, division_code, contractor_code, contractor_fname, contractor_lname, contractor_ffname, contractor_flname, contractor_gender, contractor_address, contractor_po, contractor_teh, contractor_distt, contractor_pin, contractor_phone, contractor_mobile, contractor_class, contractor_valid_dt, created_by) VALUES (NULL, '".$_POST['division_code']."', '".$_POST['contractor_code']."', '".$_POST['contractor_fname']."', '".$_POST['contractor_lname']."', '".$_POST['contractor_ffname']."', '".$_POST['contractor_flname']."', '".$_POST['contractor_gender']."', '".$_POST['contractor_address']."', '".$_POST['contractor_po']."', '".$_POST['contractor_teh']."', '".$_POST['contractor_distt']."', '".$_POST['contractor_pin']."', '".$_POST['contractor_phone']."', '".$_POST['contractor_mobile']."', '".$_POST['contractor_class']."', '".$_POST['contractor_valid_dt']."', '".$_POST['created_by']."')");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Contractor [".$_POST['contractor_code']."] Successfully Created.";
			}else
			{
				$_SESSION['msg']="Problem creating Contractor. Please try again.";
			}
			Header("Location: contractor-master.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE m_contractor SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE m_contractor SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Contractor [".$_POST['contractor_code']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating contractor. Please try again.";
			}
			Header("Location: contractor-master.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE m_contractor SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Contractor [".$_POST['contractor_code']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating contractor. Please try again.";
			}
			Header("Location: contractor-master.php");
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
                	<form action="contractor-master.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Create Forest</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="con_no">Contractor Reg No:</label>
								<input class="textbox" id="contractor_code" type="text" name="contractor_code" data-required="true" data-error-message="Reg No is required"/>
								<label for="con_fname">First Name:</label>
								<input class="textbox"  id="contractor_fname" type="text" name="contractor_fname" data-required="true" data-error-message="First Name is required" />
								<label for="con_lname">Last Name:</label>
								<input class="textbox"  id="contractor_lname" type="text" name="contractor_lname" data-required="true" data-error-message="Last Name is required" />
								<label for="con_ffname">Father&apos;s First Name:</label>
								<input class="textbox"  id="contractor_ffname" type="text" name="contractor_ffname" data-required="true" data-error-message="Father's First Name is required" />
								<label for="con_llname">Father&apos;s Last Name:</label>
								<input class="textbox"  id="contractor_flname" type="text" name="contractor_flname" data-required="true" data-error-message="Father's Last Name is required" />
								<label for="con_gen">Contractor Gender:</label>
								<input class="textbox" id="contractor_gender" type="text" name="contractor_gender" data-required="true" data-error-message="Gender is required"/>
								
								<label for="con_add">Contractor Address:</label>
								<textarea class="textbox" id="contractor_address" name="contractor_address" data-required="true" data-error-message="Address is required"></textarea>
								<label for="con_po">Post Office:</label>
								<input class="textbox" id="contractor_po" type="text" name="contractor_po" data-required="true" data-error-message="Post Office is required"/>
								<label for="con_teh">Tehsil:</label>
								<input class="textbox" id="contractor_teh" type="text" name="contractor_teh" data-required="true" data-error-message="Tehsil is required"/>
								<label for="con_distt">District:</label>
								<input class="textbox" id="contractor_distt" type="text" name="contractor_distt" data-required="true" data-error-message="District is required"/>
								<label for="con_pin">Pin:</label>
								<input class="textbox" id="contractor_pin" type="text" name="contractor_pin"/>
								<label for="con_phone">Phone:</label>
								<input class="textbox" id="contractor_phone" type="text" name="contractor_phone"/>
								<label for="con_phone">Mobile:</label>
								<input class="textbox" id="contractor_mobile" type="text" name="contractor_mobile"/>
								
								<label for="con_class">Class:</label>
								<input class="textbox" id="contractor_class" type="text" name="contractor_class" data-required="true" data-error-message="Class is required"/>
								<label for="con_phone">Valid Till:</label>
								<input class="textbox" id="contractor_valid_dt" type="text" name="contractor_valid_dt" data-required="true" data-error-message="Valid date is required"/>
													
								<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
								
								<br /><br />
								<input class="submit" id="addcon" type="submit" name="action" value="Save"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>
				  	<script>
				  	$j(function() {
				  		$j( "#contractor_valid_dt" ).datepicker(
				                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
					</script>
			  	<?php 
			  		}else if($action=="edit")
                	{
                		$contractor = $db->get_row("SELECT * FROM m_contractor WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="contractor-master.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Forest</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								
								<label for="con_no">Contractor reg No:</label>
								<input  class="lblText" readonly="readonly" id="contractor_code" type="text" name="contractor_code" data-required="true" data-error-message="Reg No is required" value="<?php echo($contractor['contractor_code']);?>"/>
								<label for="con_fname">First Name:</label>
								<input class="textbox"  id="contractor_fname" type="text" name="contractor_fname" data-required="true" data-error-message="First Name is required" value="<?php echo($contractor['contractor_fname']);?>"/>
								<label for="con_lname">Last Name:</label>
								<input class="textbox"  id="contractor_lname" type="text" name="contractor_lname" data-required="true" data-error-message="Last Name is required" value="<?php echo($contractor['contractor_lname']);?>"/>
								<label for="con_ffname">Father&apos;s First Name:</label>
								<input class="textbox"  id="contractor_ffname" type="text" name="contractor_ffname" data-required="true" data-error-message="Father's First Name is required" value="<?php echo($contractor['contractor_ffname']);?>"/>
								<label for="con_llname">Father&apos;s Last Name:</label>
								<input class="textbox"  id="contractor_flname" type="text" name="contractor_flname" data-required="true" data-error-message="Father's Last Name is required" value="<?php echo($contractor['contractor_flname']);?>"/>
								<label for="con_gen">Contractor Gender:</label>
								<input class="textbox" id="contractor_gender" type="text" name="contractor_gender" data-required="true" data-error-message="Gender is required" value="<?php echo($contractor['contractor_gender']);?>"/>
								
								<label for="con_add">Contractor Address:</label>
								<textarea class="textbox" id="contractor_address" name="contractor_address" data-required="true" data-error-message="Address is required"><?php echo($contractor['contractor_address']);?></textarea>
								<label for="con_po">Post Office:</label>
								<input class="textbox" id="contractor_po" type="text" name="contractor_po" data-required="true" data-error-message="Post Office is required" value="<?php echo($contractor['contractor_po']);?>"/>
								<label for="con_teh">Tehsil:</label>
								<input class="textbox" id="contractor_teh" type="text" name="contractor_teh" data-required="true" data-error-message="Tehsil is required" value="<?php echo($contractor['contractor_teh']);?>"/>
								<label for="con_distt">District:</label>
								<input class="textbox" id="contractor_distt" type="text" name="contractor_distt" data-required="true" data-error-message="District is required" value="<?php echo($contractor['contractor_distt']);?>"/>
								<label for="con_pin">Pin:</label>
								<input class="textbox" id="contractor_pin" type="text" name="contractor_pin" value="<?php echo($contractor['contractor_pin']);?>"/>
								<label for="con_phone">Phone:</label>
								<input class="textbox" id="contractor_phone" type="text" name="contractor_phone" value="<?php echo($contractor['contractor_phone']);?>"/>
								<label for="con_phone">Mobile:</label>
								<input class="textbox" id="contractor_mobile" type="text" name="contractor_mobile" value="<?php echo($contractor['contractor_mobile']);?>"/>
								
								<label for="con_class">Class:</label>
								<input class="textbox" id="contractor_class" type="text" name="contractor_class" data-required="true" data-error-message="Class is required" value="<?php echo($contractor['contractor_class']);?>"/>
								<label for="con_phone">Valid Till:</label>
								<input class="textbox" id="contractor_valid_dt" type="text" name="contractor_valid_dt" data-required="true" data-error-message="Valid date is required" value="<?php echo($contractor['contractor_valid_dt']);?>"/>
								
								<input name="rowid" type="hidden" value="<?php echo($contractor['id']);?>"/>
								<input name="updated_by" type="hidden" id="updated_by" value="<?php echo($_SESSION['userid']);?>" />
								
								<br /><br />
								<input class="submit" id="updatelot" type="submit" name="action" value="Update"/>
								<input name="submitted" type="hidden" id="submitted" value="1" />
								
							</div>
						</fieldset>
				  	</form>	
				  	<script>
				  	$j(function() {
				  		$j( "#contractor_valid_dt" ).datepicker(
			                 	{ dateFormat: 'yy-mm-dd', 
					                   showAnim: 'slide', 
					                   yearRange: '2000:2025' 
					                });
					  });
					</script>		  
				<?php 
			  		}else
                	{
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Contractors</h1> <table> <tr> <td>Reg No</td> <td>First Name</td> <td>Last Name</td> <td>Class</td> <td>Valid Till</td> <td>Phone</td><td>Status</td> <td>Action</td></tr>"); 
                		$contractors = $db->get_results("SELECT * FROM m_contractor WHERE division_code='".$_SESSION['division']."' ORDER BY contractor_fname, contractor_lname, contractor_class" ,ARRAY_A);
	
				         foreach ( $contractors as $contractor )
				         { 
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$contractor['contractor_code']."</td> <td>".$contractor['contractor_fname']."</td> <td>".$contractor['contractor_lname']."</td>");
				         	
				         	echo(" <td>".$contractor['contractor_class']."</td>");
				         	echo(" <td>".$contractor['contractor_valid_dt']."</td>");
				         	echo(" <td>".$contractor['contractor_mobile']."</td>");
				         	
				         	echo("<td>".$contractor['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="contractor-master.php" method="post" id="contactorActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($contractor['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($contractor['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($contractor['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="forest_code" type="hidden" value="<?php echo($contractor['contractor_code']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($contractor['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($contractor['id']);?>" />
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
              			<form action="contractor-master.php" method="post" id="contracrotForm">
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