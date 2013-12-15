<?php
	session_start();
	//include config
	include "config.php";
		
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			$db->query("UPDATE m_forest SET forest_name='".$_POST['forest_name']."', range_code='".$_POST['range_code']."', forest_rsd_code='".$_POST['forest_rsd_code']."', forest_rsd_distance='".$_POST['forest_rsd_distance']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Forest Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating forest. Please try again.";
			}
			Header("Location: forest-master.php");
		}else if($action=="save")
		{
			$db->query("INSERT INTO m_forest (id, forest_code, forest_name, range_code, forest_rsd_code, forest_rsd_distance, created_by) VALUES (NULL, '".$_POST['forest_code']."', '".$_POST['forest_name']."', '".$_POST['range_code']."', '".$_POST['forest_rsd_code']."', '".$_POST['forest_rsd_distance']."', '".$_POST['created_by']."')");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Forest [".$_POST['forest_code']."] Successfully Created.";
			}else
			{
				$_SESSION['msg']="Problem creating forest. Please try again.";
			}
			Header("Location: forest-master.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE m_forest SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE m_forest SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Forest [".$_POST['forest_code']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating forest. Please try again.";
			}
			Header("Location: forest-master.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE m_forest SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Forest [".$_POST['forest_code']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating forest. Please try again.";
			}
			Header("Location: forest-master.php");
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
                	<form action="forest-master.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Create Forest</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Forest Code:</label>
								<input class="textbox" id="forest_code" type="text" name="forest_code" data-required="true" data-error-message="Forest Code is required"/>
								<label for="lot_desc">Forest Name:</label>
								<input class="textbox"  id="forest_name" type="text" name="forest_name" data-required="true" data-error-message="Forest Name is required" />
								<label for="range_code">Forest Range:</label>
								<select id="range_code" name="range_code" data-required="true" data-error-message="Range is required">
								 <?php 
								  $ranges = $db->get_results("SELECT range_code, range_name FROM m_range WHERE division_code='".$_SESSION['division']."' AND status_cd='A'",ARRAY_A);
			 
						            foreach ( $ranges as $range )
						            {
						            	echo "<option value='".$range['range_code']."'>".$range['range_name']."</option>";
						            	
						            }
								 ?>
								</select>
								
								
								<label for="forest_rsd">Forest RSD:</label>
								<select id="forest_rsd_code" name="forest_rsd_code" data-required="true" data-error-message="RSD is required">
								<?php 
								  $rsds = $db->get_results("SELECT forest_rsd_code, forest_rsd_name FROM m_forest_rsd WHERE division_code='".$_SESSION['division']."' AND status_cd='A'",ARRAY_A);
			 					 
						            foreach ( $rsds as $rsd )
						            {
						            	echo "<option value='".$rsd['forest_rsd_code']."'>".$rsd['forest_rsd_name']."</option>";
						            	
						            }
								 ?>
								</select>
								<label for="rsd_distance">Forest RSD Distance:</label>
								<input class="textbox"  id="forest_rsd_distance" type="text" name="forest_rsd_distance" data-required="true" data-error-message="Forest RSD distance is required" data-type="number" data-type-number-message="Only number is allowed"/>
								
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
                		$forest = $db->get_row("SELECT * FROM m_forest WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="forest-master.php" method="post" id="forestForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Forest</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="forest_code">Forest Code:</label>
								<input class="lblText" readonly="readonly" id="forest_code" type="text" name="forest_code" data-required="true" data-error-message="Forest Code is required" value="<?php echo($forest['forest_code']);?>"/>
								<label for="lot_desc">Forest Name:</label>
								<input class="textbox"  id="forest_code" type="text" name="forest_name" data-required="true" data-error-message="Forest Name is required" value="<?php echo($forest['forest_name']);?>"/>
								<label for="forest_code">Forest Range:</label>
								<select id="range_code" name="range_code" data-required="true" data-error-message="Range is required">
									<option value=''>Select</option>
								 <?php 
								  $ranges = $db->get_results("SELECT range_code, range_name FROM m_range WHERE division_code='".$_SESSION['division']."' AND status_cd='A'",ARRAY_A);
			 
						            foreach ( $ranges as $range )
						            {
						            	if($range['range_code']==$forest['range_code'])
						            	{
						            		echo ("<option value='".$range['range_code']."' selected='selected'>".$range['range_name']."</option>");
						            	}else
						            	{
						            		echo ("<option value='".$range['range_code']."'>".$range['range_name']."</option>");
						            	}
						            	
						            }
								 ?>
								</select>
								
								<label for="forest_rsd">Forest RSD:</label>
								<select id="forest_rsd_code" name="forest_rsd_code" data-required="true" data-error-message="RSD is required">
								<?php 
								  $rsds = $db->get_results("SELECT forest_rsd_code, forest_rsd_name FROM m_forest_rsd WHERE division_code='".$_SESSION['division']."' AND status_cd='A'",ARRAY_A);
			 					 
						            foreach ( $rsds as $rsd )
						            {
						            	if($rsd['forest_rsd_code']==$forest['forest_rsd_code'])
						            	{
						            		echo "<option value='".$rsd['forest_rsd_code']."' selected='selected'>".$rsd['forest_rsd_name']."</option>";
						            	}else 
						            	{
						            		echo "<option value='".$rsd['forest_rsd_code']."'>".$rsd['forest_rsd_name']."</option>";
						            	}
						            	
						            }
								 ?>
								</select>
								<label for="rsd_distance">Forest RSD Distance:</label>
								<input class="textbox"  id="forest_rsd_distance" type="text" name="forest_rsd_distance" data-required="true" data-error-message="Forest RSD distance is required" data-type="number" data-type-number-message="Only number is allowed"  value="<?php echo($forest['forest_rsd_distance']);?>"/>
								<input name="rowid" type="hidden" value="<?php echo($forest['id']);?>"/>
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
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Forests</h1> <table> <tr> <td>Forest Code</td> <td>Forest Name</td> <td>Range</td> <td>RSD</td> <td>RSD Distnace</td><td>Status</td> <td>Action</td></tr>"); 
                		$forests = $db->get_results("SELECT f.id, f.forest_code, f.forest_name, f.range_code, f.forest_rsd_code, f.forest_rsd_distance, f.status_cd FROM m_forest f,  m_range r WHERE f.range_code=r.range_code AND r.division_code='".$_SESSION['division']."' ORDER BY f.forest_name" ,ARRAY_A);
	
				         foreach ( $forests as $forest )
				         { 
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$forest['forest_code']."</td> <td>".$forest['forest_name']."</td>");
				         	
				         	echo(" <td>".$forest['range_code']."</td>");
				         	echo(" <td>".$forest['forest_rsd_code']."</td>");
				         	echo(" <td>".$forest['forest_rsd_distance']."</td>");
				         	
				         	echo("<td>".$forest['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="forest-master.php" method="post" id="forestActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($forest['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($forest['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($forest['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="forest_code" type="hidden" value="<?php echo($forest['forest_code']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($forest['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($forest['id']);?>" />
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
              			<form action="forest-master.php" method="post" id="forestForm">
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