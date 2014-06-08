<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_pension_details SET
		OTHER_ACTION_CODE='".$_POST['OTHER_ACTION_CODE']."',
		OTHER_ACTION_REASON_CODE= '".$_POST['OTHER_ACTION_REASON_CODE']."',
		OTHER_ACTION_POSITION= '".$_POST['OTHER_ACTION_POSITION']."',
		ACTION_AREA_CODE= '".$_POST['ACTION_AREA_CODE']."',
		OTHER_ACTION_EMPLOYEE_GROUP_CODE= '".$_POST['OTHER_ACTION_EMPLOYEE_GROUP_CODE']."',
		OTHER_ACTION_SUBAREA_CODE= '".$_POST['OTHER_ACTION_SUBAREA_CODE']."',
		OTHER_ACTION_PAYROL:_AREA= '".$_POST['OTHER_ACTION_PAYROL:_AREA']."',
		OTHER_ACTION_BEGIN_DT= '".$_POST['OTHER_ACTION_BEGIN_DT']."',
		OTHER_ACTION_END_DT= '".$_POST['OTHER_ACTION_END_DT']."',
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
		$db->query("INSERT INTO employee_pension_details
		(  EMPLOYEE_ROW_ID, OTHER_ACTION_CODE,OTHER_ACTION_REASON_CODE,OTHER_ACTION_POSITION,ACTION_AREA_CODE,OTHER_ACTION_EMPLOYEE_GROUP_CODE,OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE, OTHER_ACTION_SUBAREA_CODE, OTHER_ACTION_PAYROL:_AREA, OTHER_ACTION_BEGIN_DT, OTHER_ACTION_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['OTHER_ACTION_CODE']."', '".$_POST['OTHER_ACTION_REASON_CODE']."', '".$_POST['OTHER_ACTION_POSITION']."', '".$_POST['OTHER_ACTION_EMPLOYEE_GROUP_CODE']."', '".$_POST['OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE']."','".$_POST['OTHER_ACTION_SUBAREA_CODE']."','".$_POST['OTHER_ACTION_PAYROL:_AREA']."','".$_POST['OTHER_ACTION_BEGIN_DT']."','".$_POST['OTHER_ACTION_END_DT']."', '1','".$_POST['created_by']."')");		
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
			$db->query("UPDATE employee_pension_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_pension_details SET
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
		$db->query("UPDATE employee_pension_details SET
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
<h2>Employee Historic Action Information</h2>
<form action="history-action.php" method="post" id="employeeHistoryActionForm">
	<ul>
        <li>
            <label for="OTHER_ACTION_CODE">OTHER ACTION CODE:</label>
           <select id="OTHER_ACTION_CODE" name="OTHER_ACTION_CODE"
            data-validation-help="Please enter action code" 
            data-validation="required" 
            data-validation-error-msg="Action code is required"/>
                <option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
        </li>
        <li>
        	<label for="OTHER_ACTION_REASON_CODE">OTHER_ACTION REASON CODE:</label>
            < <input type="text" 
            size="40" 
            id="OTHER_ACTION_REASON_CODE" name="OTHER_ACTION_REASON_CODE"
            data-validation="required"
            data-validation-help="Please enter action reason code" 
            data-validation-error-msg="Action reason code is required"/>
        </li>
		<li>
        	<label for="OTHER_ACTION_POSITION">OTHER ACTION POSITION:</label>
            <input type="text" 
            size="40" id="OTHER_ACTION_POSITION" name="OTHER_ACTION_POSITION"
            data-validation-help="Please enter action position" 
            data-validation="required" 
            data-validation-error-msg="Action position is required"/>
        </li>
		<li>
        	<label for="ACTION_AREA_CODE">ACTION AREA CODE:</label>
            <input type="text" 
            size="40" 
            id="ACTION_AREA_CODE"  name="ACTION_AREA_CODE"
            data-validation-help="Please enter action area code" 
            data-validation="required" 
            data-validation-error-msg="Action area code is required"/>
        </li>
		<li>
        	<label for="OTHER_ACTION_EMPLOYEE_GROUP_CODE">OTHER ACTION EMPLOYEE GROUP CODE:</label>
            <select id="OTHER_ACTION_EMPLOYEE_GROUP_CODE" name="OTHER_ACTION_EMPLOYEE_GROUP_CODE"
            data-validation-help="Please enter action group code" 
            data-validation-error-msg="action group code is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE">OTHER ACTION EMPLOYEE SUBGROUP CODE:</label>
            <select id="OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE" name="OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE"
            data-validation-help="Please enter action subgroup code" 
            data-validation-error-msg="Action subgroup code is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_SUBAREA_CODE">OTHER ACTION SUBAREA CODE:</label>
            <select id="OTHER_ACTION_SUBAREA_CODE" name="OTHER_ACTION_SUBAREA_CODE"
            data-validation-help="Please enter action subarea code" 
            data-validation-error-msg="Action subarea code is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_PAYROL_AREA">OTHER ACTION PAYROL AREA:</label>
            <select id="OTHER_ACTION_PAYROL_AREA" name="OTHER_ACTION_PAYROL_AREA"
            data-validation-help="Please enter action payrol area" 
            data-validation-error-msg="Action payrol area is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_BEGIN_DT">OTHER ACTION BEGIN DT:</label>
            <input type="text" 
            size="40" 
            id="OTHER_ACTION_BEGIN_DT"  name="OTHER_ACTION_BEGIN_DT"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action begin date is required"/>
        </li>
        <li>
        	<label for="OTHER_ACTION_END_DT">OTHER ACTION END DT:</label>
            <input type="text" 
            size="40" 
            id="OTHER_ACTION_END_DT"  name="OTHER_ACTION_END_DT"
            data-validation-help="Please enter action end date" 
            data-validation="required" 
            data-validation-error-msg="Action end date code is required"/>
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

		$historyActionss = $db->get_row("SELECT * FROM employee_pension_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Pensions Information</h2>
<form action="history-action.php" method="post" id="employeeHistoryActionForm">
	<ul>
        <li>
            <label for="OTHER_ACTION_CODE">OTHER ACTION CODE:</label>
           <select id="OTHER_ACTION_CODE" name="OTHER_ACTION_CODE"
            data-validation-help="Please enter action code" 
            data-validation="required" 
            data-validation-error-msg="Action code is required"/>
                <option value="JG">Joining</option>
                <option value="CN">Confirmation</option>
                <option value="TR">Relieved on Transfer</option>
                <option value="JT">Joining on Transfer</option>
                <option value="PR">Relieved on Promotion</option>
                <option value="JP">Joining on Grade Change</option>
                <option value="EL">Change In Employment Level</option>
                <option value="DP">Deputation-Out</option>
                <option value="RT">Repatriation</option>
                <option value="AC">Absconding</option>
                <option value="RY">Return from Absconding</option>
                <option value="SE">Separation</option>
                <option value="TM">Termination</option>
                <option value="RZ">Reinstatement on Termination</option>
                <option value="SP">Suspension</option>
                <option value="SR">Suspension Revocation</option>
                <option value="RP">Reduction in Post/ Pay</option>
                <option value="SL">Study Leave</option>
                <option value="RL">Return from Study Leave</option>
                <option value="IN">Increments</option>
                <option value="PA">Change in Payroll Area</option>
                <option value="CZ">Conversion Assign Action</option>
                <option value="CV">Conversion Hire Action</option>                         
            </select>
        </li>
        <li>
        	<label for="OTHER_ACTION_REASON_CODE">OTHER_ACTION REASON CODE:</label>
            < <input type="text" 
            size="40" 
            id="OTHER_ACTION_REASON_CODE" name="OTHER_ACTION_REASON_CODE"
            data-validation="required"
            data-validation-help="Please enter action reason code" 
            data-validation-error-msg="Action reason code is required"/>
        </li>
		<li>
        	<label for="OTHER_ACTION_POSITION">OTHER ACTION POSITION:</label>
            <input type="text" 
            size="40" id="OTHER_ACTION_POSITION" name="OTHER_ACTION_POSITION"
            data-validation-help="Please enter action position" 
            data-validation="required" 
            data-validation-error-msg="Action position is required"/>
        </li>
		<li>
        	<label for="ACTION_AREA_CODE">ACTION AREA CODE:</label>
            <input type="text" 
            size="40" 
            id="ACTION_AREA_CODE"  name="ACTION_AREA_CODE"
            data-validation-help="Please enter action area code" 
            data-validation="required" 
            data-validation-error-msg="Action area code is required"/>
        </li>
		<li>
        	<label for="OTHER_ACTION_EMPLOYEE_GROUP_CODE">OTHER ACTION EMPLOYEE GROUP CODE:</label>
            <select id="OTHER_ACTION_EMPLOYEE_GROUP_CODE" name="OTHER_ACTION_EMPLOYEE_GROUP_CODE"
            data-validation-help="Please enter action group code" 
            data-validation-error-msg="action group code is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE">OTHER ACTION EMPLOYEE SUBGROUP CODE:</label>
            <select id="OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE" name="OTHER_ACTION_EMPLOYEE_SUBGROUP_CODE"
            data-validation-help="Please enter action subgroup code" 
            data-validation-error-msg="Action subgroup code is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_SUBAREA_CODE">OTHER ACTION SUBAREA CODE:</label>
            <select id="OTHER_ACTION_SUBAREA_CODE" name="OTHER_ACTION_SUBAREA_CODE"
            data-validation-help="Please enter action subarea code" 
            data-validation-error-msg="Action subarea code is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_PAYROL_AREA">OTHER ACTION PAYROL AREA:</label>
            <select id="OTHER_ACTION_PAYROL_AREA" name="OTHER_ACTION_PAYROL_AREA"
            data-validation-help="Please enter action payrol area" 
            data-validation-error-msg="Action payrol area is required"/>
            	<option value="Z1">Recruited on Merit</option>
				<option value="Z2">DisabilityinService</option>				         
            </select>
		</li>
		<li>
        	<label for="OTHER_ACTION_BEGIN_DT">OTHER ACTION BEGIN DT:</label>
            <input type="text" 
            size="40" 
            id="OTHER_ACTION_BEGIN_DT"  name="OTHER_ACTION_BEGIN_DT"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action begin date is required"/>
        </li>
        <li>
        	<label for="OTHER_ACTION_END_DT">OTHER ACTION END DT:</label>
            <input type="text" 
            size="40" 
            id="OTHER_ACTION_END_DT"  name="OTHER_ACTION_END_DT"
            data-validation-help="Please enter action end date" 
            data-validation="required" 
            data-validation-error-msg="Action end date code is required"/>
        </li>
	</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($historyActionss['ROW_ID']);?>" />
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
				<td>Pension Code</td> <td>Pension Start Time</td> <td>Pension End Time</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 								
					$employee_historyActionss = $db->get_results("SELECT * FROM employee_pension_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_historyActionss as $employee_historyActions )
		           	{
		         		echo("<td>".$employee_historyActions['OTHER_ACTION_CODE'] ."</td> <td>".$employee_historyActions['OTHER_ACTION_REASON_CODE']."</td> <td>".$employee_historyActions['OTHER_ACTION_POSITION']."</td> <td>".$employee_historyActions['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="history-action.php" method="post" id="employeeHistoryActionForm_<?php echo($employee_historyActions['ROW_ID']);?>" name="employeeHistoryActionForm_<?php echo($employee_historyActions['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_historyActions['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_historyActions['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_historyActions['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_historyActions['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_historyActions['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_historyActions['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="history-action.php" method="post" id="employeeHistoryActionForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	