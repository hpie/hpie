<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_decipline_details SET
		DECIPLINE_CASE_NO='".$_POST['DECIPLINE_CASE_NO']."',
		DECIPLINE_ACTION_CODE= '".$_POST['DECIPLINE_ACTION_CODE']."',
		DECIPLINE_ACTION_SOURCE_CODE= '".$_POST['DECIPLINE_ACTION_SOURCE_CODE']."',
		DECIPLINE_OFFENCE_DT= '".$_POST['DECIPLINE_OFFENCE_DT']."',
		DECIPLINE_ACTION_STATUS_CODE= '".$_POST['DECIPLINE_ACTION_STATUS_CODE']."',
		DECIPLINE_ACTION_OUTCOME_CODE= '".$_POST['DECIPLINE_ACTION_OUTCOME_CODE']."',
		DECIPLINE_ACTION_FROM_DT= '".$_POST['DECIPLINE_ACTION_FROM_DT']."',
		DECIPLINE_ACTION_TO_DT= '".$_POST['DECIPLINE_ACTION_TO_DT']."',
		DECIPLINE_SENTENCE_PENALTY= '".$_POST['DECIPLINE_SENTENCE_PENALTY']."',
		DECIPLINE_SENTENCE_PERIOD= '".$_POST['DECIPLINE_SENTENCE_PERIOD']."',
		DECIPLINE_SENTENCE_PERIOD_UNIT= '".$_POST['DECIPLINE_SENTENCE_PERIOD_UNIT']."',
		DECIPLINE_BEGIN_DT= '".$_POST['DECIPLINE_BEGIN_DT']."',
		DECIPLINE_END_DT= '".$_POST['DECIPLINE_END_DT']."',
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
		$db->query("INSERT INTO employee_decipline_details
		(  EMPLOYEE_ROW_ID, DECIPLINE_CASE_NO,DECIPLINE_ACTION_CODE,DECIPLINE_ACTION_SOURCE_CODE,DECIPLINE_OFFENCE_DT,DECIPLINE_ACTION_STATUS_CODE,DECIPLINE_ACTION_OUTCOME_CODE, DECIPLINE_ACTION_FROM_DT, DECIPLINE_ACTION_TO_DT, DECIPLINE_SENTENCE_PENALTY, DECIPLINE_SENTENCE_PERIOD, DECIPLINE_SENTENCE_PERIOD_UNIT, DECIPLINE_BEGIN_DT, DECIPLINE_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['DECIPLINE_CASE_NO']."', '".$_POST['DECIPLINE_ACTION_CODE']."', '".$_POST['DECIPLINE_ACTION_SOURCE_CODE']."', '".$_POST['DECIPLINE_OFFENCE_DT']."', '".$_POST['DECIPLINE_ACTION_STATUS_CODE']."', '".$_POST['DECIPLINE_ACTION_OUTCOME_CODE']."', '".$_POST['DECIPLINE_ACTION_FROM_DT']."',
		 '".$_POST['DECIPLINE_ACTION_TO_DT']."', '".$_POST['DECIPLINE_SENTENCE_PENALTY']."', '".$_POST['DECIPLINE_SENTENCE_PERIOD']."', '".$_POST['DECIPLINE_SENTENCE_PERIOD_UNIT']."', '".$_POST['DECIPLINE_BEGIN_DT']."', '".$_POST['DECIPLINE_END_DT']."', '1','".$_POST['created_by']."')");		
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
			$db->query("UPDATE employee_decipline_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_decipline_details SET
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
		$db->query("UPDATE employee_decipline_details SET
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
<h2>Employee Disciplinary Information</h2>
<form action="discipline.php" method="post" id="employeeDisciplineForm">
	<ul>
        <li>
           <label for="DECIPLINE_CASE_NO">DESCIPLINE CASE NO:</label>
           <input type="text"
           size="6"
           id="DECIPLINE_CASE_NO" name="DECIPLINE_CASE_NO"
            data-validation-help="Please enter discipline case number" 
            data-validation="required" 
            data-validation-error-msg="Discipline case number is required"/>
        </li>
        <li>
        	<label for="DECIPLINE_ACTION_CODE">DESCIPLINE ACTION CODE:</label>
            <select id="DECIPLINE_ACTION_CODE" name="DECIPLINE_ACTION_CODE"
            data-validation-help="Please enter discipline action code" 
            data-validation="required" 
            data-validation-error-msg="Discipline action code is required"/>
            <option value="Z001">Habitual absenteeism</option>
            <option value="Z002">Irregular attendance</option>
            <option value="Z003">Habitual late coming</option>
            <option value="Z004">Disobedience</option>
            <option value="Z005">Assaulting</option>
            <option value="Z006">Misappropriation</option>
            <option value="Z007">Taking bribe</option>
            <option value="Z008">Fraud in official dealings</option>
            <option value="Z009">Theft</option>
            <option value="Z010">Cheating the company</option>
            <option value="Z011">Neglect of duty</option>
            <option value="Z012">Damage of company property</option>
            <option value="Z013">Drunkenness</option>
            <option value="Z014">Riotous behaviour</option>
            <option value="Z015">Gambling</option>
            <option value="Z016">Abetment</option>
            <option value="Z017">Sleeping while on duty</option>
            <option value="Z018">Striking work</option>
            <option value="Z019">Failure to observe safety instructions.</option>
            <option value="Z020">Conviction in court of law</option>
            <option value="Z021">Others</option>
            </select>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_SOURCE_CODE">DECIPLINE ACTION SOURCE CODE:</label>
            <select id="DECIPLINE_ACTION_SOURCE_CODE" name="DECIPLINE_ACTION_SOURCE_CODE"
            data-validation-help="Please enter descipline action source code" 
            data-validation="required" 
            data-validation-error-msg="Descipline action source code is required"/>
            <option value="01">Controlling Officer</option>
            <option value="02">DDO</option>
            <option value="03">Head of Office</option>
            <option value="04">Other Employee</option>
            <option value="05">Customer</option>
            <option value="06">Vendor</option>
            <option value="07">Complaint through vigilance dept.</option>
            <option value="08">Anti corruption unit</option>
            <option value="09">Departmental inspection reports</option>
            <option value="10">Stock verification surveys</option>
            <option value="11">Scrutiny of property statement</option>
            <option value="12">Scrutiny of transaction -Conduct Rules</option>
            <option value="13">Ire-regularity - routine audit of Accnt.</option>
            <option value="14">Audit report on Board accounts</option>
            <option value="15">Report of Vidhan Sabha committees</option>
            <option value="16">Complaints/allegation Press conferences</option>
            <option value="17">Others</option>
            </select>
        </li>
		<li>
        	<label for="DECIPLINE_OFFENCE_DT">DECIPLINE OFFENCE DT:</label>
            <input type="text" 
            size="10" 
            id="DECIPLINE_OFFENCE_DT"  name="DECIPLINE_OFFENCE_DT"
            data-validation-help="Please enter descipline offense date" 
            data-validation="required" 
            data-validation-error-msg="Descipline offense date is required"/>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_STATUS_CODE">DECIPLINE ACTION STATUS CODE:</label>
            <select id="DECIPLINE_ACTION_STATUS_CODE" name="DECIPLINE_ACTION_STATUS_CODE"
            data-validation-help="Please enter discipline action status code" 
            data-validation="required" 
            data-validation-error-msg="Discipline action status code is required"/>
            <option value="001">Approved by DA for issue of CS</option>
            <option value="002">Issued chargesheet</option>
            <option value="003">Reply submitted</option>
            <option value="004">Enquiry in progress</option>
            <option value="005">Enquiry report submitted</option>
            <option value="006">Case Disposed</option>
            <option value="007">Appealed</option>
            <option value="008">Review</option>
            <option value="009">Charges Dropped</option>
            </select>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_OUTCOME_CODE">DECIPLINE ACTION OUTCOME CODE:</label>
            <input id="DECIPLINE_ACTION_OUTCOME_CODE" name="DECIPLINE_ACTION_OUTCOME_CODE"
            data-validation-help="Please enter discipline action outcome code" 
            data-validation="required" 
            data-validation-error-msg="Discipline action outcome code required"/>
            <option value="Z01">Sentenced/Imprisonment</option>
            <option value="Z02">Written warning</option>
            <option value="Z03">Suspension</option>
            <option value="Z04">Minor Penalty-Censure</option>
            <option value="Z05">Minor Penalty-Withholding of Promotion</option>
            <option value="Z06">Minor Penalty-Recovery from pay</option>
            <option value="Z07">Minor Penalty-Reduction to Lower Pay Scale</option>
            <option value="Z08">Minor Penalty-Withholding Increment with Cumulative Effect</option>
            <option value="Z09">Minor Penalty-Withholding Increment without Cumulative Effect</option>
            <option value="Z10">Major Penalty-Reduction to Lower Time Scale</option>
            <option value="Z11">Major Penalty-Reduction to Lower Post</option>
            <option value="Z12">Major Penalty-Dismissal</option>
            <option value="Z13">Major Penalty-Removal</option>
            <option value="Z14">Major Penalty-Cumpulsory Retirement</option>
            <option value="Z15">Exonerated</option>
            <option value="Z16">Sentenced/Imprisonment</option>
            </select>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_FROM_DT">DECIPLINE ACTION FROM DT:</label>
            <input type="text"
            size="10"
            id="DECIPLINE_ACTION_FROM_DT" name="DECIPLINE_ACTION_FROM_DT"
            data-validation-help="Please enter discipline action from date" 
            data-validation="required" 
            data-validation-error-msg="Discipline action from date is required"/>
        </li>
        <li>
            <label for="DECIPLINE_ACTION_TO_DT">DECIPLINE ACTION TO DT:</label>
            <input type="text"
            size=10 
            id="DECIPLINE_ACTION_TO_DT" name="DECIPLINE_ACTION_TO_DT"
            data-validation-help="Please enter discipline action to date" 
            data-validation="required" 
            data-validation-error-msg="Discipline action to date is required"/>
        </li>
		<li>
        	<label for="DECIPLINE_SENTENCE_PENALTY">DECIPLINE SENTENCE PENALTY:</label>
            <input type="text" 
            size="15" id="DECIPLINE_SENTENCE_PENALTY" name="DECIPLINE_SENTENCE_PENALTY"
            data-validation-help="Please enter discipline sentence penalty" 
            data-validation-error-msg="Discipline sentence penalty is required"/>
		</li>
		<li>
        	<label for="DECIPLINE_SENTENCE_PERIOD">DECIPLINE SENTENCE PERIOD:</label>
            <input type="text" 
            size="4" 
            id="DECIPLINE_SENTENCE_PERIOD" name="DECIPLINE_SENTENCE_PERIOD"
            data-validation-help="Please enter disciplien sentence period" 
            data-validation-error-msg="Disciplien sentence period is required"/>
		</li>
		<li>
        	<label for="DECIPLINE_SENTENCE_PERIOD_UNIT">DECIPLINE SENTENCE PERIOD UNIT:</label>
            <select id="ADDRESS_BEGIN_NO" name="DECIPLINE_SENTENCE_PERIOD_UNIT"
            data-validation-help="Please enter discipline sentence period unit" 
            data-validation-error-msg="Discipline sentence period unit is required"/>
            <option value="Y">Years</option>
            <option value="M">Months</option>
            <option value="D">Days</option>
		</li>
		<li>
        	<label for="DECIPLINE_BEGIN_DT">DECIPLINE BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="DECIPLINE_BEGIN_DT" name="DECIPLINE_BEGIN_DT"
            data-validation-help="Please enter discipline begin date" 
            data-validation-error-msg="Discipline begin date is required"/>
		</li>
			<li>
        	<label for="DECIPLINE_END_DT">DECIPLINE END DT:</label>
            <input type="text" 
            size="10" 
            id="DECIPLINE_END_DT" name="DECIPLINE_END_DT"
            data-validation-help="Please enter discipline end date" 
            data-validation-error-msg="Discipline end date is required"/>
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

		$discipline = $db->get_row("SELECT * FROM employee_decipline_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Disciplinary Information</h2>
<form action="discipline.php" method="post" id="employeeDisciplineForm">
<ul>
        <li>
           <label for="DECIPLINE_CASE_NO">DESCIPLINE CASE NO:</label>
           <input type="text"
           size="6"
           id="DECIPLINE_CASE_NO" name="DECIPLINE_CASE_NO"
            value="<?php echo($discipline['DECIPLINE_CASE_NO']);?>"
            data-validation-help="Please enter discipline case number" 
            data-validation="required" 
            data-validation-error-msg="Discipline case number is required"/>
        </li>
        <li>
        	<label for="DECIPLINE_ACTION_CODE">DESCIPLINE ACTION CODE:</label>
            <id="DECIPLINE_ACTION_CODE" name="DECIPLINE_ACTION_CODE" />
            value=<?php echo($common->getdisciplineCodeList($discipline['DECIPLINE_ACTION_CODE']));?>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_SOURCE_CODE">DECIPLINE ACTION SOURCE CODE:</label>
            <id="DECIPLINE_ACTION_SOURCE_CODE" name="DECIPLINE_ACTION_SOURCE_CODE" />
            value=<?php echo($common->getactionSourceCodeList($discipline['DECIPLINE_ACTION_SOURCE_CODE']));?>
        </li>
		<li>
        	<label for="DECIPLINE_OFFENCE_DT">DECIPLINE OFFENCE DT:</label>
            <input type="text" 
            size="10" 
            id="DECIPLINE_OFFENCE_DT"  name="DECIPLINE_OFFENCE_DT"
            value="<?php echo($discipline['DECIPLINE_OFFENCE_DT']);?>"
            data-validation-help="Please enter descipline offense date" 
            data-validation="required" 
            data-validation-error-msg="Descipline offense date is required"/>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_STATUS_CODE">DECIPLINE ACTION STATUS CODE:</label>
            <id="DECIPLINE_ACTION_STATUS_CODE" name="DECIPLINE_ACTION_STATUS_CODE" />
            value=<?php echo($common->getactionStatusCodeList($discipline['DECIPLINE_ACTION_STATUS_CODE']));?>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_OUTCOME_CODE">DECIPLINE ACTION OUTCOME CODE:</label>
            <input id="DECIPLINE_ACTION_OUTCOME_CODE" name="DECIPLINE_ACTION_OUTCOME_CODE" />
            value=<?php echo($common->getactionOutcomeCodeList($discipline['DECIPLINE_ACTION_OUTCOME_CODE']));?>
        </li>
		<li>
        	<label for="DECIPLINE_ACTION_FROM_DT">DECIPLINE ACTION FROM DT:</label>
            <input type="text"
            size="10"
            id="DECIPLINE_ACTION_FROM_DT" name="DECIPLINE_ACTION_FROM_DT"
            value="<?php echo($discipline['DECIPLINE_ACTION_FROM_DT']);?>"
            data-validation-help="Please enter discipline action from date" 
            data-validation="required" 
            data-validation-error-msg="Discipline action from date is required"/>
        </li>
        <li>
            <label for="DECIPLINE_ACTION_TO_DT">DECIPLINE ACTION TO DT:</label>
            <input type="text"
            size=10 
            id="DECIPLINE_ACTION_TO_DT" name="DECIPLINE_ACTION_TO_DT"
            value="<?php echo($discipline['DECIPLINE_ACTION_TO_DT']);?>"
            data-validation-help="Please enter discipline action to date" 
            data-validation="required" 
            data-validation-error-msg="Discipline action to date is required"/>
        </li>
		<li>
        	<label for="DECIPLINE_SENTENCE_PENALTY">DECIPLINE SENTENCE PENALTY:</label>
            <input type="text" 
            size="15" id="DECIPLINE_SENTENCE_PENALTY" name="DECIPLINE_SENTENCE_PENALTY"
            value="<?php echo($discipline['DECIPLINE_SENTENCE_PENALTY']);?>"
            data-validation-help="Please enter discipline sentence penalty" 
            data-validation-error-msg="Discipline sentence penalty is required"/>
		</li>
		<li>
        	<label for="DECIPLINE_SENTENCE_PERIOD">DECIPLINE SENTENCE PERIOD:</label>
            <input type="text" 
            size="4" 
            id="DECIPLINE_SENTENCE_PERIOD" name="DECIPLINE_SENTENCE_PERIOD"
            value="<?php echo($discipline['DECIPLINE_SENTENCE_PERIOD']);?>"
            data-validation-help="Please enter disciplien sentence period" 
            data-validation-error-msg="Disciplien sentence period is required"/>
		</li>
		<li>
        	<label for="DECIPLINE_SENTENCE_PERIOD_UNIT">DECIPLINE SENTENCE PERIOD UNIT:</label>
            <id="ADDRESS_BEGIN_NO" name="DECIPLINE_SENTENCE_PERIOD_UNIT" />
            value=<?php echo($common->getunitCodeList($discipline['DECIPLINE_SENTENCE_PERIOD_UNIT']));?>
		</li>
		<li>
        	<label for="DECIPLINE_BEGIN_DT">DECIPLINE BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="DECIPLINE_BEGIN_DT" name="DECIPLINE_BEGIN_DT"
            value="<?php echo($discipline['DECIPLINE_BEGIN_DT']);?>"
            data-validation-help="Please enter discipline begin date" 
            data-validation-error-msg="Discipline begin date is required"/>
		</li>
			<li>
        	<label for="DECIPLINE_END_DT">DECIPLINE END DT:</label>
            <input type="text" 
            size="10" 
            id="DECIPLINE_END_DT" name="DECIPLINE_END_DT"
            value="<?php echo($discipline['DECIPLINE_END_DT']);?>"
            data-validation-help="Please enter discipline end date" 
            data-validation-error-msg="Discipline end date is required"/>
		</li>
	</ul>
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($address['ROW_ID']);?>" />
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
				<td>Discipline case no</td> <td>Discipline action code</td> <td>Offence date</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_decipline_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_disciplines = $db->get_results("SELECT * FROM employee_decipline_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_disciplines as $employee_discipline )
		           	{
		         		echo("<td>".$employee_discipline['DECIPLINE_CASE_NO'] ."</td> <td>".$employee_discipline['DECIPLINE_ACTION_CODE']."</td> <td>".$employee_discipline['DECIPLINE_OFFENCE_DT']."</td> <td>".$employee_discipline['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="discipline.php" method="post" id="employeeDisciplineForm_<?php echo($employee_discipline['ROW_ID']);?>" name="employeeDisciplineForm_<?php echo($employee_discipline['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_discipline['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_discipline['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_discipline['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_discipline['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_discipline['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_discipline['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="discipline.php" method="post" id="employeeDisciplineForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	