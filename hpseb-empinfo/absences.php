<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_absence_details SET
		ABSENCE_CODE='".$_POST['ABSENCE_CODE']."',
		ABSENCE_START_TIME= '".$_POST['ABSENCE_START_TIME']."',
		ABSENCE_END_TIME= '".$_POST['ABSENCE_END_TIME']."',
		ABSENCE_HOURS= '".$_POST['ABSENCE_HOURS']."',
		ABSENCE_BEGIN_DT= '".$_POST['ABSENCE_BEGIN_DT']."',
		ABSENCE_END_DT= '".$_POST['ABSENCE_END_DT']."',
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
		$db->query("INSERT INTO employee_absence_details
		(  EMPLOYEE_ROW_ID, ABSENCE_CODE,ABSENCE_START_TIME,ABSENCE_END_TIME,ABSENCE_HOURS,ABSENCE_BEGIN_DT,ABSENCE_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['ABSENCE_CODE']."', '".$_POST['ABSENCE_START_TIME']."', '".$_POST['ABSENCE_END_TIME']."', '".$_POST['ABSENCE_BEGIN_DT']."', '".$_POST['ABSENCE_END_DT']."', '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Address Successfully Created.";
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
			$db->query("UPDATE employee_absence_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_absence_details SET
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
		$db->query("UPDATE employee_absence_details SET
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
<h2>Employee Absences Information</h2>
<form action="absences.php" method="post" id="employeeAbsencesForm">
	<ul>
        <li>
            <label for="ABSENCE_CODE">ABSENCE CODE:</label>
           <id="ABSENCE_CODE" name="ABSENCE_CODE"
           data-validation-help="Please enter absence code" 
            data-validation="required" 
            data-validation-error-msg="Absence code is required"/>
                <option value="01">Earned Leave</option>
				<option value="02">Half Pay Leave</option>
				<option value="03">Commuted Leave</option>
				<option value="04">Extra Ordinary Leave</option>
				<option value="05">Maternity Leave</option>
				<option value="06">Paternity Leave</option>
				<option value="07">Casual Leave- Half Day</option>
				<option value="08">Joining Time</option>
				<option value="09">Restricted Holiday</option>
				<option value="10">Unauthorized Absence</option>
				<option value="11">Study Leave</option>
				<option value="12">Leave Not Due</option>
				<option value="13">Dies-Non</option>
				<option value="14">Special Casual Leave</option>
				<option value="15">Hospital Leave-Full Pay</option>
				<option value="16">Hospital Leave-Half Pay</option>
				<option value="17">Child Care Leave</option>
				<option value="18">Spl Disability Leave-Pay</option>
				<option value="19">HPL during Disability Lev</option>
				<option value="21">Child Adoption Leave</option>
				<option value="22">Departmental Leave</option>             
            </select>
        </li>
        <li>
        	<label for="ABSENCE_START_TIME">ABSENCE START TIME:</label>
            <input type="text" 
            size="40" 
            id="ABSENCE_START_TIME" name="ABSENCE_START_TIME"
            data-validation="required"
            data-validation-help="Please enter absence start time" 
            data-validation="required" 
            data-validation-error-msg="Absence start time is required"/>
        </li>
		<li>
        	<label for="ABSENCE_END_TIME">ABSENCE END TIME:</label>
            <input type="text" 
            size="40" id="ABSENCE_END_TIME" name="ABSENCE_END_TIME"
            data-validation-help="Please enter absence end time" 
            data-validation="required" 
            data-validation-error-msg="Absence end time is required"/>
        </li>
		<li>
        	<label for="ABSENCE_HOURS">ABSENCE HOURS:</label>
            <input type="text" 
            size="40" 
            id="ABSENCE_HOURS"  name="ABSENCE_HOURS"
            data-validation-help="Please enter absence hours" 
            data-validation="required" 
            data-validation-error-msg="Absence hours is required"/>
        </li>
		<li>
        	<label for="ABSENCE_BEGIN_DT">ABSENCE BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="ABSENCE_BEGIN_DT" name="ABSENCE_BEGIN_DT"
            data-validation-help="Please enter Start date" 
            data-validation-error-msg="Start date Number is required"/>
		</li>
		<li>
        	<label for="ABSENCE_END_DT">ABSENCE END DT:</label>
            <input type="text" 
            size="14" 
            id="ABSENCE_END_DT" name="ABSENCE_END_DT"
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

		$absences = $db->get_row("SELECT * FROM employee_absence_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Absences Information</h2>
<form action="absences.php" method="post" id="employeeAbsencesForm">
	<ul>
	<li>
		   <label for="ABSENCE_CODE">ABSENCE CODE:</label>
           <id="ABSENCE_CODE" name="ABSENCE_CODE" name="ABSENCE_CODE">
            <?php echo($common->getAbsenceCodeList($absences['ABSENCE_CODE']));?>
        </li>
        <li>
        	<label for="ABSENCE_START_TIME">ABSENCE START TIME:</label>
            <input type="text" 
            size="40" 
            id="ABSENCE_START_TIME" name="ABSENCE_START_TIME"
            data-validation="required"
            data-validation-help="Please enter absence start time" 
            data-validation="required" 
            data-validation-error-msg="Absence start time is required"/>
        </li>
		<li>
        	<label for="ABSENCE_END_TIME">ABSENCE END TIME:</label>
            <input type="text" 
            size="40" id="ABSENCE_END_TIME" name="ABSENCE_END_TIME"
            data-validation-help="Please enter absence end time" 
            data-validation="required" 
            data-validation-error-msg="Absence end time is required"/>
        </li>
		<li>
        	<label for="ABSENCE_HOURS">ABSENCE HOURS:</label>
            <input type="text" 
            size="40" 
            id="ABSENCE_HOURS"  name="ABSENCE_HOURS"
            data-validation-help="Please enter absence hours" 
            data-validation="required" 
            data-validation-error-msg="Absence hours is required"/>
        </li>
        <li>
        	<label for="ABSENCE_BEGIN_DT">ABSENCE BEGIN DT:</label>
            <input type="text" 
            size="14" 
            id="ABSENCE_BEGIN_DT" name="ABSENCE_BEGIN_DT"
            data-validation-help="Please enter Start date" 
            data-validation-error-msg="Start date is required"
            value="<?php echo($absences['ABSENCE_BEGIN_DT']);?>"/>
		</li>
		<li>
        	<label for="ABSENCE_END_DT">ABSENCE END DT:</label>
            <input type="text" 
            size="14" 
            id="ABSENCE_END_DT" name="ABSENCE_END_DT"
            data-validation-help="Please enter End date" 
            data-validation-error-msg="End date is required"
            value="<?php echo($absences['ABSENCE_END_DT']);?>"/>
            </li>
		</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($absences['ROW_ID']);?>" />
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
				<td>Absence Code</td> <td>Absence Start Time</td> <td>Absence End Time</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_absence_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_absences = $db->get_results("SELECT * FROM employee_absence_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_absences as $employee_absence )
		           	{
		         		echo("<td>".$employee_absence['ABSENCE_CODE'] ."</td> <td>".$employee_absence['ABSENCE_START_TIME']."</td> <td>".$employee_absence['ABSENCE_END_TIME']."</td> <td>".$employee_absence['ADDRESS_LINE_2']."</td>  <td>".$employee_absence['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="absences.php" method="post" id="employeeAbsencesForm_<?php echo($employee_absence['ROW_ID']);?>" name="employeeAbsencesForm_<?php echo($employee_absence['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_absence['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_absence['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_absence['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_absence['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_absence['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_absence['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="absences.php" method="post" id="employeeAbsencesForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	