<?php
	session_start();
	//include config
	include "config.php";
		
	if(isset($_POST['submitted']))
	{
		if($action=="update")
		{
			$db->query("UPDATE m_dfo SET dfo_name='".$_POST['dfo_name']."', dfo_code='".$_POST['dfo_code']."', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="DFO Successfully Updated.";
			}else
			{
				$_SESSION['msg']="Problem updating dfo. Please try again.";
			}
			Header("Location: dfo-master.php");
		}else if($action=="save")
		{
			$db->query("INSERT INTO m_dfo (id, dfo_code, dfo_name, division_code, created_by) VALUES (NULL, '".$_POST['dfo_code']."', '".$_POST['dfo_name']."', '".$_SESSION['division']."', '".$_POST['created_by']."')");
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="DFO [".$_POST['dfo_code']."] Successfully Created.";
			}else
			{
				$_SESSION['msg']="Problem creating dfo. Please try again.";
			}
			Header("Location: dfo-master.php");
		}else if($action=="status")
		{
			$status="";
			if($_POST['status_cd'] =="A")
			{
				$db->query("UPDATE m_dfo SET status_cd='I', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Inactive";
			}else if($_POST['status_cd'] =="I")
			{
				$db->query("UPDATE m_dfo SET status_cd='A', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
				$status="Active";
			}
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="DFO [".$_POST['dfo_code']."] is now set to ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating dfo. Please try again.";
			}
			Header("Location: dfo-master.php");
		}else if($action=="delete")
		{
			$db->query("UPDATE m_dfo SET status_cd='D', updated_by='".$_POST['updated_by']."', updated_dt=now() WHERE id='".$_POST['rowid']."'");
			$status="deleted";
			//$db->debug();
			if($db->rows_affected>0)
			{ 
				$_SESSION['msg']="DFO [".$_POST['dfo_code']."] is now marked as ".$status.".";
			}else
			{
				$_SESSION['msg']="Problem updating dfo. Please try again.";
			}
			Header("Location: dfo-master.php");
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
                	<form action="dfo-master.php" method="post" id="dfoForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Create Forest DFO</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="lot_no">DFO Code:</label>
								<input class="textbox" id="dfo_code" type="text" name="dfo_code" data-required="true" data-error-message="DFO Code is required"/>
								<label for="lot_desc">DFO Name:</label>
								<input class="textbox"  id="dfo_name" type="text" name="dfo_name" data-required="true" data-error-message="DFO Name is required" />
								
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
                		$dfo = $db->get_row("SELECT * FROM m_dfo WHERE id='".$_POST['rowid']."'",ARRAY_A);
                		                	
              	?>
              		<br />
              		<form action="dfo-master.php" method="post" id="dfoForm" data-validate="parsley">
						<fieldset>
						<legend><font size=5 color=#72A545>Update DFO</font></legend><br />
							<p style="color:#CC0000"><?php echo $error; ?></p>
							<div style="margin:10px; 0px; 0px; 0px;">
								<label for="dfo_code">DFO Code:</label>
								<input class="lblText" readonly="readonly" id="dfo_code" type="text" name="dfo_code" data-required="true" data-error-message="DFO Code is required" value="<?php echo($dfo['dfo_code']);?>"/>
								<label for="lot_desc">DFO Name:</label>
								<input class="textbox"  id="dfo_code" type="text" name="dfo_name" data-required="true" data-error-message="DFO Name is required" value="<?php echo($dfo['dfo_name']);?>"/>
								
								<input name="rowid" type="hidden" value="<?php echo($dfo['id']);?>"/>
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
                		echo("<br /> <div class='CSSTableGenerator'> <h1>Manage Forest DFOs</h1> <table> <tr> <td>DFO Code</td> <td>DFO Name</td> <td>DFO</td> <td>Status</td> <td>Action</td></tr>"); 
                		$dfos = $db->get_results("SELECT * FROM m_dfo WHERE division_code='".$_SESSION['division']."' ORDER BY dfo_name" ,ARRAY_A);
	
				         foreach ( $dfos as $dfo )
				         { 
			         	 	echo(" <tr>");
			         	 	echo(" <td>".$dfo['dfo_code']."</td> <td>".$dfo['dfo_name']."</td>");
				         	
				         	echo(" <td>".$dfo['dfo_code']."</td>");
				         	
				         	echo("<td>".$dfo['status_cd']."</td>");
				         	
				         	echo(" <td>");
				         	
			     ?>
			     			<form style="margin:0px; border:0px; background-color:inherit;" action="dfo-master.php" method="post" id="dfoActionForm">
							<!-- Create row specific actions -->
			     			<?php 
								if($dfo['status_cd']=="D")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($dfo['status_cd']=="I")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($dfo['status_cd']=="A")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted' />");
							 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="dfo_code" type="hidden" value="<?php echo($dfo['dfo_code']);?>" />
								<input name="status_cd" type="hidden" value="<?php echo($dfo['status_cd']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($dfo['id']);?>" />
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
              			<form action="dfo-master.php" method="post" id="dfoForm">
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