<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_leave_details SET
		LEAVE_CODE='".$_POST['LEAVE_CODE']."',
		LEAVE_START_TIME= '".$_POST['LEAVE_START_TIME']."',
		LEAVE_END_TIME= '".$_POST['LEAVE_END_TIME']."',
		LEAVE_QUATA_CODE= '".$_POST['LEAVE_QUATA_CODE']."',
		LEAVE_FROM_DT= '".$_POST['LEAVE_FROM_DT']."',
		LEAVE_TO_DT= '".$_POST['LEAVE_TO_DT']."',
		LEAVE_BEGIN_DT= '".$_POST['LEAVE_BEGIN_DT']."',
		LEAVE_END_DT= '".$_POST['LEAVE_END_DT']."',
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
		$db->query("INSERT INTO employee_leave_details
		(  EMPLOYEE_ROW_ID, LEAVE_CODE,LEAVE_START_TIME,LEAVE_END_TIME,LEAVE_QUATA_CODE,LEAVE_FROM_DT,LEAVE_TO_DT, LEAVE_BEGIN_DT, LEAVE_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['LEAVE_CODE']."', '".$_POST['LEAVE_START_TIME']."', '".$_POST['LEAVE_END_TIME']."', '".$_POST['LEAVE_QUATA_CODE']."', '".$_POST['LEAVE_FROM_DT']."', '".$_POST['LEAVE_TO_DT']."', '".$_POST['LEAVE_BEGIN_DT']."',
		 '".$_POST['LEAVE_END_DT']."', '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee details Successfully Created.";
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
			$db->query("UPDATE employee_leave_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_leave_details SET
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
		$db->query("UPDATE employee_leave_details SET
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
<h2>Employee Leave Information</h2>
<form action="leave.php" method="post" id="employeeLeaveForm">
	<ul>
        <li>
            <label for="LEAVE_CODE"> LEAVE CODE:</label>
           <select id="LEAVE_CODE" name="LEAVE_CODE"
             data-validation-help="Please enter leave code" 
           	 data-validation="required" 
             data-validation-error-msg="Leave code is required"/>
                <option value="01">Earned Leave Quota</option>
				<option value="02">Casual Leave Quota</option>
				<option value="03">Half Pay Leave Quota</option>
				<option value="04">Restricted  Quota</option>
				<option value="05">EL from Previous Employer</option>
				<option value="06">Study Leave Quota</option>
				<option value="07">Special Casual Leave</option>           
            </select>
        </li>
        <li>
        	<label for="LEAVE_START_TIME">LEAVE START TIME:</label>
            <input type="text" 
            size="40" 
            id="LEAVE_START_TIME" name="LEAVE_START_TIME"
             data-validation-help="Please enter leave start time" 
           	 data-validation="required" 
             data-validation-error-msg="Leave start time is required"/>
         </li>
		<li>
        	<label for="LEAVE_END_TIME">LEAVE END TIME:</label>
            <input type="text" 
            size="40" id="LEAVE_END_TIME" name="LEAVE_END_TIME"
             data-validation-help="Please enter leave end time" 
           	 data-validation="required" 
             data-validation-error-msg="Leave end time is required"/>
         </li>
		<li>
        	<label for="LEAVE_QUATA_CODE">LEAVE QUATA CODE:</label>
            <select id="LEAVE_QUATA_CODE"  name="LEAVE_QUATA_CODE">
            <option value="01">Quota code</option>
            </select>                     
        </li>
		<li>
        	<label for="LEAVE_FROM_DT">LEAVE FROM DT:</label>
            <input type="text" 
            size="10" 
            id="LEAVE_FROM_DT" name="LEAVE_FROM_DT"
            data-validation-help="Please enter leave from date" 
            data-validation="required" 
            data-validation-error-msg="Leave from date is required"/>
        </li>
		<li>
        	<label for="LEAVE_TO_DT">LEAVE TO DT:</label>
            <input type="text" 
            size="10" 
            id="LEAVE_TO_DT" name="LEAVE_TO_DT"
            data-validation-help="Please enter leave to date" 
            data-validation="required" 
            data-validation-error-msg="Leave to date is required"/>
        </li>
		<li>
        	<label for="LEAVE_BEGIN_DT">LEAVE BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="LEAVE_BEGIN_DT" name="LEAVE_BEGIN_DT"
            data-validation-help="Please enter leave begin date" 
            data-validation="required" 
            data-validation-error-msg="Leave begin date is required"/>
		</li>
        <li>
            <label for="LEAVE_END_DT">LEAVE END DT:</label>
            <input  type="text" 
            size="10" 
            id="LEAVE_END_DT" name="LEAVE_END_DT"
            data-validation-help="Please enter leave end date" 
            data-validation="required" 
            data-validation-error-msg="Leave end date is required"/>
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

		$leave = $db->get_row("SELECT * FROM employee_leave_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Leave Information</h2>
<form action="leave.php" method="post" id="employeeLeaveForm">
	<ul>
        <li>
            <label for="LEAVE_CODE">LEAVE CODE:</label>
           <id="LEAVE_CODE" name="LEAVE_CODE" />
            <?php echo($common->getLeaveCodeList($leave['LEAVE_CODE'])); ?>
           </li>
        <li>
        	<label for="LEAVE_START_TIME">LEAVE START TIME:</label>
            <input type="text" 
            size="40" 
            id="LEAVE_START_TIME" name="LEAVE_START_TIME"
            value="<?php echo($leave['LEAVE_START_TIME']);?>"
            data-validation-help="Please enter leave start time" 
           	 data-validation="required" 
             data-validation-error-msg="Leave start time is required"/>
         </li>
		<li>
        	<label for="LEAVE_END_TIME">LEAVE END TIME:</label>
            <input type="text" 
            size="40" id="LEAVE_END_TIME" name="LEAVE_END_TIME"
            value="<?php echo($leave['LEAVE_END_TIME']);?>"
            data-validation-help="Please enter leave end time" 
           	 data-validation="required" 
             data-validation-error-msg="Leave end time is required"/>
         </li>
		<li>
        	<label for="LEAVE_QUATA_CODE">LEAVE QUATA CODE:</label>
            <select id="LEAVE_QUATA_CODE"  name="LEAVE_QUATA_CODE">
            <option value="01">Quota code</option>
            </select>                     
        </li>
		<li>
        	<label for="LEAVE_FROM_DT">LEAVE FROM DT:</label>
            <input type="text" 
            size="10" 
            id="LEAVE_FROM_DT" name="LEAVE_FROM_DT"
            value="<?php echo($leave['LEAVE_FROM_DT']);?>"
            data-validation-help="Please enter leave from date" 
            data-validation="required" 
            data-validation-error-msg="Leave from date is required"/>
        </li>
		<li>
        	<label for="LEAVE_TO_DT">LEAVE TO DT:</label>
            <input type="text" 
            size="10" 
            id="LEAVE_TO_DT" name="LEAVE_TO_DT"
            value="<?php echo($leave['LEAVE_TO_DT']);?>"
            data-validation-help="Please enter leave to date" 
            data-validation="required" 
            data-validation-error-msg="Leave to date is required"/>
        </li>
		<li>
        	<label for="LEAVE_BEGIN_DT">LEAVE BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="LEAVE_BEGIN_DT" name="LEAVE_BEGIN_DT"
            value="<?php echo($leave['LEAVE_BEGIN_DT']);?>"
            data-validation-help="Please enter leave begin date" 
            data-validation="required" 
            data-validation-error-msg="Leave begin date is required"/>
		</li>
        <li>
            <label for="LEAVE_END_DT">LEAVE END DT:</label>
            <input type="text"
            size="10"
            id="LEAVE_END_DT" name="LEAVE_END_DT"
            value="<?php echo($leave['LEAVE_END_DT']);?>"
            data-validation-help="Please enter leave end date" 
            data-validation="required" 
            data-validation-error-msg="Leave end date is required"/>
        </li>
		</ul>	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($leave['ROW_ID']);?>" />
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
				<td>Leave Code</td> <td>Leave Start Date</td> <td>Leave End Date</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 						
					$employee_leaves = $db->get_results("SELECT * FROM employee_leave_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_leaves as $employee_leave )
		           	{
		         		echo("<td>".$employee_leave['LEAVE_CODE'] ."</td> <td>".$employee_leave['LEAVE_START_TIME']."</td> <td>".$employee_leave['LEAVE_END_TIME']."</td> <td>".$employee_leave['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="leave.php" method="post" id="employeeLeaveForm_<?php echo($employee_leave['ROW_ID']);?>" name="employeeLeaveForm_<?php echo($employee_leave['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_leave['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_leave['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_leave['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_leave['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_leave['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_leave['EMPLOYEE_ROW_ID']);?>" />
								<input name="submitted" type="hidden" id="submitted" value="1"/>
					</form>
					</td>
			     <?php  	
		           }
				?>
				
		</table>
	</div>
	<div>
	    <br /><br />
	    <form action="leave.php" method="post" id="employeeLeaveForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	