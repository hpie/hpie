<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_communication_details SET
		COMMUNICATION_CODE='".$_POST['COMMUNICATION_CODE']."',
		COMMUNICATION_DATA= '".$_POST['COMMUNICATION_DATA']."',
		COMMUNICATION_BEGIN_DT= '".$_POST['COMMUNICATION_BEGIN_DT']."',
		COMMUNICATION_END_DT= '".$_POST['COMMUNICATION_END_DT']."',
		STATUS= '".$_POST['status']."',
		MODIFIED_BY= '".$_POST['modified_by']."',
		MODIFIED_DATE==now()
		WHERE ROW_ID='".$_POST['rowid']."'");
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details Successfully Updated.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating Employee details. Please try again.";
			echo($_SESSION['msg']);
		}
		//Header("Location: receive-blazes.php");
	}else if($action=="save")
	{
		$db->query("INSERT INTO employee_communication_details
		(  EMPLOYEE_ROW_ID, COMMUNICATION_CODE,COMMUNICATION_DATA,COMMUNICATION_BEGIN_DT,COMMUNICATION_END_DT, STATUS, CREATED_BY) 
		 VALUES ('".$_POST['empid']."','".$_POST['COMMUNICATION_CODE']."', '".$_POST['COMMUNICATION_DATA']."', '".$_POST['COMMUNICATION_BEGIN_DT']."', '".$_POST['COMMUNICATION_END_DT']."', '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Details Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating employee details. Please try again.";
			echo($_SESSION['msg']);
		}
		// Removed Header receive-blazes.php
	}else if($action=="Status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_communication_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_communication_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Active";
		}
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details status is now set to ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating employee details status. Please try again.";
			echo($_SESSION['msg']);
		}

	}else if($action=="delete")
	{
		$db->query("UPDATE employee_communication_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");

		$status="deleted";
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details is now marked as ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating Employee. Please try again.";
			echo($_SESSION['msg']);
		}

	}




}// if submitted

?>

<!-- html head start -->
<?php include('includes/header.php'); ?>
<!-- html head  end-->


<body>

<h5>
	<div style="float:left;  padding:0px 0px 0px 5px;"><?php echo($pageTitle);?>  <?php // echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php// echo($_SESSION['division']);?> .</font></div>
	<div style="float:right;">
    <?php 
		date_default_timezone_set('Asia/Calcutta');
		print date("jS F Y, g:i A");
	?>
	</div>
</h5>
<br />

<?php
	if($action=="create")
	{
?>	
<article>
<h2>Employee Communication Details Information</h2>
<form action="communication.php" method="post" id="employeeCommunicationForm">
	<ul>
        <li>
            <label for="COMMUNICATION_CODE">COMMUNICATION CODE:</label>
            <select id="COMMUNICATION_CODE" name="COMMUNICATION_CODE"
            data-validation-help="Please enter Communication code" 
            data-validation="required" 
            data-validation-error-msg="Region code is required"/>
               <option value="0010">E-mail</option>
				<option value="0020">Office Number</option>
				<option value="0030">Private E-Mail Address</option>
				<option value="CELL">Cell Phone</option>           
            </select>
        </li>
        <li>
        	<label for="COMMUNICATION_DATA">COMMUNICATION DATA:</label>
            <input type="text" 
            size="40" id="COMMUNICATION_DATA" name="COMMUNICATION_DATA"
            data-validation-help="Please enter Communication data"  
            data-validation-help="Please enter Communication data" />
        </li>
		<li>
        	<label for="COMMUNICATION_BEGIN_DT">COMMUNICATION BEGIN DT:</label>
            <input type="text" 
            size="14" 
            id="COMMUNICATION_BEGIN_DT" name="COMMUNICATION_BEGIN_DT"
            data-validation-help="Please enter start date" 
            data-validation-error-msg="Start date is required"/>
		</li>
		<li>
        	<label for="COMMUNICATION_END_DT">COMMUNICATION END DT:</label>
            <input type="text" 
            size="14" 
            id="COMMUNICATION_END_DT" name="COMMUNICATION_END_DT"
            data-validation-help="Please enter End date" 
            data-validation-error-msg="End date is required"/>
		</li>
	</ul>
		<p>
			<button type="submit" class="action" name="action" value="Save">Save</button>
			<button type="reset" class="right">Reset</button>
			<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
</article>
<footer>

</footer>

<script>
 
  $.validate({
    
  });
 
  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );
 
</script>

<?php
	}else if($action=="edit")
	{

		$communication = $db->get_row("SELECT * FROM employee_communication_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Communication Details Information</h2>
<form action="communication.php" method="post" id="employeeCommunicationForm">
	<ul>
        <li>
            <label for="COMMUNICATION_CODE">COMMUNICATION CODE:</label>
            <id="COMMUNICATION_CODE" name="COMMUNICATION_CODE" 
            data-validation-help="Please enter Communication code" 
            data-validation="required" 
            data-validation-error-msg="Region code is required"/>
            <?php echo($common->getCommunicationType($communication['COMMUNICATION_CODE'])); ?>   
        </li>
        <li>
        	<label for="COMMUNICATION_DATA">COMMUNICATION DATA:</label>
            <input type="text" 
            size="40" id="COMMUNICATION_DATA" name="COMMUNICATION_DATA"
            value="<?php echo($communication['COMMUNICATION_DATA']);?>"
            data-validation-help="Please enter Communication data"  
            data-validation-help="Please enter Communication data" />
        </li>
		<li>
        	<label for="COMMUNICATION_BEGIN_DT">COMMUNICATION BEGIN DT:</label>
            <input type="text" 
            size="14" 
            id="COMMUNICATION_BEGIN_DT" name="COMMUNICATION_BEGIN_DT"
            value="<?php echo($communication['COMMUNICATION_BEGIN_DT']);?>"
            data-validation-help="Please enter start date" 
            data-validation-error-msg="Start date is required"/>
		</li>
		<li>
        	<label for="COMMUNICATION_END_DT">COMMUNICATION END DT:</label>
            <input type="text" 
            size="14" 
            id="COMMUNICATION_END_DT" name="COMMUNICATION_END_DT"
            value="<?php echo($communication['COMMUNICATION_END_DT']);?>"
            data-validation-help="Please enter End date" 
            data-validation-error-msg="End date is required"/>
		</li>
	</ul>
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($communication['ROW_ID']);?>" />
			<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
</article>
<?php
	}else
	{
?>
	<div class="CSSTableGenerator" >
	<table>
			<tr>
				<td>Communication code</td> <td>Communication data</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_address_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_communications = $db->get_results("SELECT * FROM employee_communication_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_communications as $employee_communication )
		           	{
		         		echo("<td>".$employee_communication['COMMUNICATION_CODE'] ."</td> <td>".$employee_communication['COMMUNICATION_DATA']."</td> <td>".$employee_communication['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="communication.php" method="post" id="employeeCommunicationForm_<?php echo($employee_communication['ROW_ID']);?>" name="employeeCommunicationForm_<?php echo($employee_communication['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_communication['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_communication['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_communication['STATUS']=="1")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		//if($db->num_rows==1)
				         	 		//{
				         	 			echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									//}
									
								        echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted'/> &nbsp;");
									     						
												 
			         	 		}// else status
							?>
							<!-- End row specific actions -->	
								<input name="status" type="hidden" value="<?php echo($employee_communication['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_communication['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_communication['EMPLOYEE_ROW_ID']);?>" />
								<input name="submitted" type="hidden" id="submitted" value="1"/>
					</form>
					</td> </tr>
			     <?php  	
		           }
				?>
				
		</table>
	</div>
	<div>
	    <br /><br />
	    <form action="communication.php" method="post" id="employeeCommunicationForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	