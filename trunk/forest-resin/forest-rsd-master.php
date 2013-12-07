<?php
	session_start();
	//include config
	include "config.php";
		
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			$db->query("UPDATE m_forest_rsd SET forest_rsd_name='".$_POST['forest_rsd_name']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Forest RSD Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating forest rsd. Please try again.";
			}
			Header("Location: forest-rsd-master.php");
		}else if($action=="save")
		{
			$exist = $db->get_row("SELECT forest_rsd_code FROM m_forest_rsd WHERE forest_rsd_code='".$_POST['forest_rsd_code']."' AND division_code='".$_SESSION['division']."'",ARRAY_A);
			if(isset($exist))
			{
				$_SESSION['msg']="Entry for RSD [".$_POST['forest_rsd_code']."] for Division already exists." ;	
			}else
			{
				foreach ($_POST['forest_code'] as $forest_code)
				{
				    $db->query("INSERT INTO m_forest_rsd (id, forest_rsd_code, forest_rsd_name, division_code, created_by) VALUES (NULL, '".$_POST['forest_rsd_code']."', '".$_POST['forest_rsd_name']."', '".$_SESSION['divisioin']."', '".$_POST['created_by']."')");
					//$db->debug();
					if($db->rows_affected>0)
					{ 
						$_SESSION['msg']="Forest RSD [".$_POST['forest_rsd_code']."] Successfully Created.";
					}else
					{
						$_SESSION['msg']="Problem creating forest rsd. Please try again.";
					}			        
				}
			}
			Header("Location: forest-rsd-master.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE m_forest_rsd SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE m_forest_rsd SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Forest RSD [".$_POST['forest_rsd_code']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating forest rsd. Please try again.";
			}
			Header("Location: forest-rsd-master.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE m_forest_rsd SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="Forest RSD [".$_POST['forest_rsd_code']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating forest rsd. Please try again.";
			}
			Header("Location: forest-rsd-master.php");
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
                	<form action="forest-rsd-master.php" method="post" id="forestRsdForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Create Forest RSD</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">Forest RSD Code:</label>
								<input class="textbox" id="forest_rsd_code" type="text" name="forest_rsd_code" data-required="true" data-error-message="Forest RSD Code is required"/>
								<label for="lot_desc">Forest RSD Name:</label>
								<input class="textbox"  id="forest_rsd_name" type="text" name="forest_rsd_name" data-required="true" data-error-message="Forest RSD Name is required" />
								
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
                		$forestRsd = $db->get_row("SELECT * FROM m_forest_rsd WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="forest-rsd-master.php" method="post" id="forestRsdForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update Forest RSD</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="forest_code">Forest RSD Code:</label>
								<input class="lblText" readonly="readonly" id="forest_rsd_code" type="text" name="forest_rsd_code" data-required="true" data-error-message="Forest RSD Code is required" value="<?php echo($forestRsd['forest_rsd_code']);?>"/>
								<label for="lot_desc">Forest RSD Name:</label>
								<input class="textbox"  id="forest_rsd_name" type="text" name="forest_rsd_name" data-required="true" data-error-message="Forest RSD Name is required" value="<?php echo($forestRsd['forest_rsd_name']);?>"/>
								
								<input name="rowid" type="hidden" value="<?php echo($forestRsd['id']);?>"/>
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
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Forest RSD</h1> <table> <tr> <td>Forest RSD Code</td> <td>Forest RSD Name</td> <td>Status</td> <td>Action</td></tr>"); 
                		$forestRsds = $db->get_results("SELECT fr.id, fr.forest_rsd_code, fr.forest_rsd_name, fr.status_cd FROM m_forest_rsd fr WHERE fr.division_code='".$_SESSION['division']."' ORDER BY fr.forest_rsd_name" ,ARRAY_A);
	
				         foreach ( $forestRsds as $forestRsd )
				         { 
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$forestRsd['forest_rsd_code']."</td> <td>".$forestRsd['forest_rsd_name']."</td>");
				         	
				         	echo("<td>".$forestRsd['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="forest-rsd-master.php" method="post" id="forestRsdActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($forestRsd['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($forestRsd['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($forestRsd['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="forest_rsd_code" type="hidden" value="<?php echo($forestRsd['forest_rsd_code']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($forestRsd['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($forestRsd['id']);?>" />
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
              			<form action="forest-rsd-master.php" method="post" id="forestRsdForm">
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