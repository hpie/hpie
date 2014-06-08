<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_workschedule_details SET
		WORKSCHEDULE_RULE_CODE='".$_POST['WORKSCHEDULE_RULE_CODE']."',
		WORKSCHEDULE_TIME_STATUS= '".$_POST['WORKSCHEDULE_TIME_STATUS']."',
		WORKSCHEDULE_BEGIN_DT= '".$_POST['WORKSCHEDULE_BEGIN_DT']."',
		WORKSCHEDULE_END_DT= '".$_POST['WORKSCHEDULE_END_DT']."',
		STATUS= '".$_POST['status']."',
		MODIFIED_BY= '".$_POST['modified_by']."',
		MODIFIED_DATE==now()
		WHERE ROW_ID='".$_POST['rowid']."'");
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee work schedule Successfully Updated.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating Employee details. Please try again.";
			echo($_SESSION['msg']);
		}
		//Header("Location: receive-blazes.php");
	}else if($action=="save")
	{
		$db->query("INSERT INTO employee_workschedule_details
		(  EMPLOYEE_ROW_ID, WORKSCHEDULE_RULE_CODE,WORKSCHEDULE_TIME_STATUS,WORKSCHEDULE_BEGIN_DT,WORKSCHEDULE_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['WORKSCHEDULE_RULE_CODE']."', '".$_POST['WORKSCHEDULE_TIME_STATUS']."', '".$_POST['WORKSCHEDULE_BEGIN_DT']."', '".$_POST['WORKSCHEDULE_END_DT']."', 
		 '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Work shcedule Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating employee work schedule. Please try again.";
			echo($_SESSION['msg']);
		}
		// Removed Header receive-blazes.php
	}else if($action=="Status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_workschedule_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_workschedule_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Active";
		}
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee work schedule status is now set to ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating employee work schedule status. Please try again.";
			echo($_SESSION['msg']);
		}

	}else if($action=="delete")
	{
		$db->query("UPDATE employee_workschedule_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");

		$status="deleted";
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee work schedule is now marked as ".$status.".";
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
<h2>Employee Planned Work Schedule Information</h2>
<form action="planned-work-schedule.php" method="post" id="employeeWorkScheduleForm">
	<ul>
        <li>
            <label for="WORKSCHEDULE_RULE_CODE">WORKING RULE:</label>
           <select id="WORKSCHEDULE_RULE_CODE" name="WORKSCHEDULE_RULE_CODE"
             data-validation-help="Please enter Working Rule" 
         	 data-validation="required" 
            data-validation-error-msg="Working Rule is required"/>
            <option value="HPNORM">HPSEB Normal Shift</option>
			<option value="HPWSRDF">HP Female Daily Wage</option>
			<option value="HPWSRDM">HP Male Daily Wage</option>
			<option value="HPWSRF">HP Female Regular Wrk Chg</option>
			<option value="HPWSRM">HP Male Regular Wrk Chrge</option>
			<option value="HPWSRPT">HP Part-Time employees</option>
			<option value="WSRCF">HP Female Contractual</option>
			<option value="WSRCM">HP Male Contractual</option>
			<option value="WSRFES">HPSEB Fri Evening Shift</option>
			<option value="WSRFMS">HPSEB Fri Morning Shift</option>
			<option value="WSRFNS">HPSEB Fri night Shift</option>
			<option value="WSRMAS">HPSEB Mon Evening Shift</option>
			<option value="WSRMMS">HPSEB Mon Morning Shift</option>
			<option value="WSRMNS">HPSEB Mon night Shift</option>
			<option value="WSRSAES">HPSEB Sat Evening Shift</option>
			<option value="WSRSAMS">HPSEB Sat Morning Shift</option>
			<option value="WSRSANS">HPSEB Sat night Shift</option>
			<option value="WSRSUES">HPSEB Sun Evening Shift</option>
			<option value="WSRSUMS">HPSEB Sun Morning Shift</option>
			<option value="WSRSUNS">HPSEB Sun night Shift</option>
			<option value="WSRTES">HPSEB Tue Evening Shift</option>
			<option value="WSRTHM">HPSEB Thur Morning Shift</option>
			<option value="WSRTHNS">HPSEB Thur night Shift</option>
			<option value="WSRTHS">HPSEB Thur Evening Shift</option>
			<option value="WSRTMS">HPSEB Tue Morning Shift</option>
			<option value="WSRTNS">HPSEB Tue night Shift</option>
			<option value="WSRWES">HPSEB Wed Evening Shift</option>
			<option value="WSRWMS">HPSEB Wed Morning Shift</option>
			<option value="WSRWNS">HPSEB Wed night Shift</option>             
            </select>
        </li>
        <li>
        	<label for="WORKSCHEDULE_TIME_STATUS">SCHEDULE STATUS:</label>
            <input type="text" 
            size="40" 
            id="WORKSCHEDULE_TIME_STATUS" name="WORKSCHEDULE_TIME_STATUS"
            data-validation-help="Please enter Working time status" 
            data-validation="required" 
            data-validation-error-msg="Working time status is required"/>
        </li>
		<li>
        	<label for="WORKSCHEDULE_BEGIN_DT">SCHEDULE BEGIN DATE:</label>
            <input type="text" 
            size="40" id="WORKSCHEDULE_BEGIN_DT" name="WORKSCHEDULE_BEGIN_DT"
             data-validation-help="Please enter Schedule beging date" 
            data-validation="required" 
            data-validation-error-msg="Schedule beging date is required"/>
        </li>
		<li>
        	<label for="WORKSCHEDULE_END_DT">SCHEDULE END DATE:</label>
            <input type="text" 
            size="40" 
            id="WORKSCHEDULE_END_DT"  name="WORKSCHEDULE_END_DT"
            data-validation-help="Please enter Schedule end date" 
            data-validation="required" 
            data-validation-error-msg="Schedule end date is required"/>
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

		$workschedule = $db->get_row("SELECT * FROM employee_workschedule_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Planned Work Schedule Information</h2>
<form action="planned-work-schedule.php" method="post" id="employeeWorkScheduleForm">
	<ul>
        <li>
            <label for="WORKSCHEDULE_RULE_CODE">WORKING RULE:</label>
           <id="WORKSCHEDULE_RULE_CODE" name="WORKSCHEDULE_RULE_CODE"
             data-validation-help="Please enter Working Rule" 
         	 data-validation="required" 
            data-validation-error-msg="Working Rule is required"/>
            <?php echo($common->getScheduleCode($workschedule['WORKSCHEDULE_RULE_CODE'])); ?>
         </li>
        <li>
        	<label for="WORKSCHEDULE_TIME_STATUS">SCHEDULE STATUS:</label>
            <input type="text" 
            size="40" 
            id="WORKSCHEDULE_TIME_STATUS" name="WORKSCHEDULE_TIME_STATUS"
            value="<?php echo($workschedule['WORKSCHEDULE_TIME_STATUS']);?>"
            data-validation-help="Please enter Working time status" 
            data-validation="required" 
            data-validation-error-msg="Working time status is required"/>
        </li>
		<li>
        	<label for="WORKSCHEDULE_BEGIN_DT">SCHEDULE BEGIN DATE:</label>
            <input type="text" 
            size="40" id="WORKSCHEDULE_BEGIN_DT" name="WORKSCHEDULE_BEGIN_DT"
            value="<?php echo($workschedule['WORKSCHEDULE_BEGIN_DT']);?>"
             data-validation-help="Please enter Schedule beging date" 
            data-validation="required" 
            data-validation-error-msg="Schedule beging date is required"/>
        </li>
		<li>
        	<label for="WORKSCHEDULE_END_DT">SCHEDULE END DATE:</label>
            <input type="text" 
            size="40" 
            id="WORKSCHEDULE_END_DT"  name="WORKSCHEDULE_END_DT"
            value="<?php echo($workschedule['WORKSCHEDULE_END_DT']);?>"
            data-validation-help="Please enter Schedule end date" 
            data-validation="required" 
            data-validation-error-msg="Schedule end date is required"/>
        </li>
		</ul>	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($workschedule['ROW_ID']);?>" />
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
				<td>Work Schduel Code</td> <td>Work Schdule Time Status</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 							
					$employee_workschdules = $db->get_results("SELECT * FROM employee_workschedule_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_workschdules as $employee_workschdule )
		           	{
		         		echo("<td>".$employee_workschdule['WORKSCHEDULE_RULE_CODE'] ."</td> <td>".$employee_workschdule['WORKSCHEDULE_TIME_STATUS']."</td> <td>".$employee_workschdule['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="planned-work-schedule.php" method="post" id="employeeWorkSchduleForm_<?php echo($employee_workschdule['ROW_ID']);?>" name="employeeWorkSchduleForm_<?php echo($employee_workschdule['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_workschdule['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_workschdule['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_workschdule['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_workschdule['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_workschdule['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_workschdule['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="planned-work-schedule.php" method="post" id="employeeWorkScheduleForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	