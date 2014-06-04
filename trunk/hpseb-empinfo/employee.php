<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee SET
		EMP_FIRST_NAME='".$_POST['EMP_FIRST_NAME']."',
		EMP_LAST_NAME= '".$_POST['EMP_LAST_NAME']."',
		EMP_PAN_NO= '".$_POST['EMP_PAN_NO']."',
		EMP_GPF_NO= '".$_POST['EMP_GPF_NO']."',
		EMP_CPS_NO= '".$_POST['EMP_CPS_NO']."',
		EMP_GENDER= '".$_POST['EMP_GENDER']."',
		EMP_BIRTH_DT= '".$_POST['EMP_BIRTH_DT']."',
		EMP_PERSONAL_NO= '".$_POST['EMP_PERSONAL_NO']."',
		EMP_BEGIN_DT= '".$_POST['EMP_BEGIN_DT']."',
		EMP_END_DT= '".$_POST['EMP_END_DT']."',
		MODIFIED_BY= '".$_POST['modified_by']."',
		MODIFIED_DATE=now()
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
		//Header("Location: employee.php");
	}else if($action=="save")
	{
		$db->query("INSERT INTO employee
		(   EMP_FIRST_NAME,EMP_LAST_NAME,EMP_PAN_NO,EMP_GPF_NO,EMP_CPS_NO,EMP_GENDER, EMP_BIRTH_DT, EMP_PERSONAL_NO,  EMP_BEGIN_DT, EMP_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['EMP_FIRST_NAME']."', '".$_POST['EMP_LAST_NAME']."', '".$_POST['EMP_PAN_NO']."' , '".$_POST['EMP_GPF_NO']."', '".$_POST['EMP_CPS_NO']."', '".$_POST['EMP_GENDER']."', '".$_POST['EMP_BIRTH_DT']."', 
		 '".$_POST['EMP_PERSONAL_NO']."', '".$_POST['EMP_BEGIN_DT']."', '".$_POST['EMP_END_DT']."' ,'1', '".$_POST['created_by']."' )");
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee [".$_POST['EMP_FIRST_NAME']."] Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating employee. Please try again.";
			echo($_SESSION['msg']);
		}
		// Header("Location: employee.php");
	}else if($action=="status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Active";
		}
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee [".$_POST['FIRST_NAME']."] is now set to ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating employee. Please try again.";
			echo($_SESSION['msg']);
		}

	}else if($action=="delete")
	{
		$db->query("UPDATE employee SET
		STATUS= '".$_POST['status']."',
		MODIFIED_BY= '".$_POST['modified_by']."',
		MODIFIED_DATE=now()
		WHERE ROW_ID='".$_POST['rowid']."'");

		$status="deleted";
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee [".$_POST['FIRST_NAME']."] is now marked as ".$status.".";
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


<body style="width:90%;align:center;">

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
	<h2>Employee Information</h2>
	<form action="employee.php" method="post" id="employeeForm">
		<ul>
			<li><label for="EMP_FIRST_NAME">FIRST NAME:</label> 
				<input type="text" 
				size="40" id="EMP_FIRST_NAME" name="EMP_FIRST_NAME"
				data-validation-help="Please enter First Name"
				data-validation="required"
				data-validation-error-msg="First Name is required" />
			</li>
			<li><label for="EMP_LAST_NAME">LAST NAME:</label> 
				<input type="text"
				size="40" id="EMP_LAST_NAME" name="EMP_LAST_NAME"
				data-validation-help="Please enter Last Name"
				data-validation="required"
				data-validation-error-msg="Last Name is required" />
			</li>

			<li><label for="EMP_PAN_NO">PAN NO:</label> 
				<input type="text"
				size="40" id="EMP_PAN_NO" name="EMP_PAN_NO"
				data-validation-help="Please enter PAN No"
				data-validation="required"
				data-validation-error-msg="PAN No. is required" />
			</li>
			<li><label for="EMP_GPF_NO">GPF NO:</label> 
				<input type="text"
				size="40" id="EMP_GPF_NO" name="EMP_GPF_NO"
				data-validation-help="Please enter GPF No"
				data-validation="required"
				data-validation-error-msg="GFP No is required" />
			</li>
			<li><label for="EMP_CPS_NO">CPS NO:</label> 
				<input type="text"
				size="40" id="EMP_CPS_NO" name="EMP_CPS_NO" 
				data-validation-help="Please enter CPS No"
				data-validation="required"
				data-validation-error-msg="CPS No is required" />
			</li>
			<li><label for="EMP_GENDER">GENDER:</label> 
				<input type="text"
				size="40" id="EMP_GENDER" name="EMP_GENDER" 
				data-validation-help="Please enter Gender"
				data-validation="required"
				data-validation-error-msg="Gender is required" />
			</li>
			<li><label for="EMP_BIRTH_DT">BIRTH DATE:</label> 
				<input type="text"
				size="40" id="EMP_BIRTH_DT" name="EMP_BIRTH_DT"
				data-validation-help="Please enter Date of Birth"
				data-validation="required"
				data-validation-error-msg="Date of Birth is required" />
			</li>

			<li><label for="EMP_PERSONAL_NO">PERSONAL NO:</label> 
				<input
				type="text" size="40" id="EMP_PERSONAL_NO" name="EMP_PERSONAL_NO"
				data-validation-help="Please enter Personal No"
				data-validation="required"
				data-validation-error-msg="Personal No is required" />
			</li>
			<li><label for="EMP_BEGIN_DT">BEGIN DATE:</label> 
				<input type="text"
				size="10" id="EMP_BEGIN_DT" name="EMP_BEGIN_DT"
				data-validation-help="Please enter Begin Date"
				data-validation="required date"
				data-validation-error-msg="Begin is required" />
			</li>
			<li><label for="EMP_END_DT">END DATE:</label> 
				<input type="text"
				size="10" id="EMP_END_DT" name="EMP_END_DT"
				data-validation-help="Please enter End Date"
				data-validation="required date"
				data-validation-error-msg="End Date is required" />
			</li>

		</ul>

		<p>
			<button type="submit" class="action" name="action" value="Save">Save</button>
			<button type="reset" class="right">Reset</button>
			<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
	</form>
	</article>
	<footer> </footer>
	<script>

	 $.validate({
	   
	 });
	
	 // Restrict presentation length
	 $('#presentation').restrictLength( $('#pres-max-length') );

	</script>
<?php
	}else if($action=="edit")
	{
		$employee = $db->get_row("SELECT * FROM employee WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>
	
	<h2>Employee Information</h2>
	<form action="employee.php" method="post" id="employeeForm">
		<ul>
			<li><label for="EMP_FIRST_NAME">FIRST NAME:</label> 
				<input type="text" 
				size="40" id="EMP_FIRST_NAME" name="EMP_FIRST_NAME" value="<?php echo($employee['EMP_FIRST_NAME']);?>"
				data-validation-help="Please enter First Name"
				data-validation="required"
				data-validation-error-msg="First Name is required" />
			</li>
			<li><label for="EMP_LAST_NAME">LAST NAME:</label> 
				<input type="text"
				size="40" id="EMP_LAST_NAME" name="EMP_LAST_NAME" value="<?php echo($employee['EMP_LAST_NAME']);?>"
				data-validation-help="Please enter Last Name"
				data-validation="required"
				data-validation-error-msg="Last Name is required" />
			</li>

			<li><label for="EMP_PAN_NO">PAN NO:</label> 
				<input type="text"
				size="40" id="EMP_PAN_NO" name="EMP_PAN_NO" value="<?php echo($employee['EMP_PAN_NO']);?>"
				data-validation-help="Please enter PAN No"
				data-validation="required"
				data-validation-error-msg="PAN No. is required" />
			</li>
			<li><label for="EMP_GPF_NO">GPF NO:</label> 
				<input type="text"
				size="40" id="EMP_GPF_NO" name="EMP_GPF_NO" value="<?php echo($employee['EMP_GPF_NO']);?>"
				data-validation-help="Please enter GPF No"
				data-validation="required"
				data-validation-error-msg="GFP No is required" />
			</li>
			<li><label for="EMP_CPS_NO">CPS NO:</label> 
				<input type="text"
				size="40" id="EMP_CPS_NO" name="EMP_CPS_NO" value="<?php echo($employee['EMP_CPS_NO']);?>"
				data-validation-help="Please enter CPS No"
				data-validation="required"
				data-validation-error-msg="CPS No is required" />
			</li>
			<li><label for="EMP_GENDER">GENDER:</label> 
				<input type="text"
				size="40" id="EMP_GENDER" name="EMP_GENDER" value="<?php echo($employee['EMP_GENDER']);?>"
				data-validation-help="Please enter Gender"
				data-validation="required"
				data-validation-error-msg="Gender is required" />
			</li>
			<li><label for="EMP_BIRTH_DT">BIRTH_DT:</label> 
				<input type="text"
				size="40" id="EMP_BIRTH_DT" name="EMP_BIRTH_DT" value="<?php echo($employee['EMP_BIRTH_DT']);?>"
				data-validation-help="Please enter Date of Birth"
				data-validation="required"
				data-validation-error-msg="Date of Birth is required" />
			</li>

			<li><label for="EMP_PERSONAL_NO">PERSONAL NO:</label> 
				<input
				type="text" size="40" id="EMP_PERSONAL_NO" name="EMP_PERSONAL_NO" value="<?php echo($employee['EMP_PERSONAL_NO']);?>"
				data-validation-help="Please enter Personal No"
				data-validation="required"
				data-validation-error-msg="Last Name is required" />
			</li>
			<li><label for="EMP_BEGIN_DT">BEGIN_DT:</label> 
				<input type="text"
				size="40" id="EMP_BEGIN_DT" name="EMP_BEGIN_DT" value="<?php echo($employee['EMP_BEGIN_DT']);?>"
				data-validation-help="Please enter Begin Date"
				data-validation="required date"
				data-validation-error-msg="Last Name is required" />
			</li>
			<li><label for="EMP_END_DT">END_DT:</label> 
				<input type="text"
				size="40" id="EMP_END_DT" name="EMP_END_DT" value="<?php echo($employee['EMP_END_DT']);?>"
				data-validation-help="Please enter End Date"
				data-validation="required date"
				data-validation-error-msg="Last Name is required" />
			</li>

		</ul>

		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($employee['ROW_ID']);?>" />
			<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
	</form>
	
	<script>

	 $.validate({
	   
	 });
	
	 // Restrict presentation length
	 $('#presentation').restrictLength( $('#pres-max-length') );

	</script>

<?php
	}else
	{
?>
	<div class="CSSTableGenerator" >
	<table>
		
			<tr>
				<td>Name</td> <td>PAN</TD> <td>GPF</td> <td>Begin DT</td> <td>End DT</td> <td>Status</td> <td>Actions</td> 
			</tr>	
		
		
			
				<?php 
 					$employees = $db->get_results("SELECT * FROM employee ORDER BY EMP_FIRST_NAME, EMP_LAST_NAME"  ,ARRAY_A);

		           	foreach ( $employees as $employee )
		           	{
		         		echo("<tr> <td>".$employee['EMP_FIRST_NAME'] ." ". $employee['EMP_LAST_NAME']."</td> <td>".$employee['EMP_PAN_NO']."</td> <td>".$employee['EMP_GPF_NO']."</td> <td>".$employee['EMP_BEGIN_DT']."</td> <td>".$employee['EMP_END_DT']."</td> <td>".$employee['STATUS']."</td>");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="employee.php" method="post" id="employeeActionForm_<?php echo($employee['ROW_ID']);?>" name="employeeActionForm_<?php echo($employee['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee['STATUS']=="1")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");
			         	 		
				         	 		//if($db->num_rows==1)
				         	 		//{
				         	 			echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									//}
									
									echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted'/> &nbsp;");
									
									echo("<input class='actionTxtBut' id='address' type='submit' name='action' value='address' title='Enter/View Address' onClick='setFormAction(\"employeeActionForm_".$employee['ROW_ID']."\",\"address.php\")' /> &nbsp;");
									
									echo("<input class='actionTxtBut' id='personalID' type='submit' name='action' value='personalID' title='Enter/View Personal ID' onClick='setFormAction(\"employeeActionForm_".$employee['ROW_ID']."\",\"personal-id.php\")' /> &nbsp;");
									
									echo("<input class='actionTxtBut' id='workSchdule' type='submit' name='action' value='workSchdule' title='Enter/View Work Schdule' onClick='setFormAction(\"employeeActionForm_".$employee['ROW_ID']."\",\"planned-work-schedule.php\")' /> &nbsp;");
									
									echo("<input class='actionTxtBut' id='communication' type='submit' name='action' value='communication' title='Enter/View Communication details' onClick='setFormAction(\"employeeActionForm_".$employee['ROW_ID']."\",\"communication.php\")' /> &nbsp;");
									
									echo("<input class='actionTxtBut' id='contract' type='submit' name='action' value='contract' title='Enter/View Contract details' onClick='setFormAction(\"employeeActionForm_".$employee['ROW_ID']."\",\"contract.php\")' /> &nbsp;");
									
									echo("<input class='actionTxtBut' id='absences' type='submit' name='action' value='absences' title='Enter/View Absences details' onClick='setFormAction(\"employeeActionForm_".$employee['ROW_ID']."\",\"absences.php\")' /> &nbsp;");
									
									echo("<input class='actionTxtBut' id='leave' type='submit' name='action' value='leave' title='Enter/View Leave details' onClick='setFormAction(\"employeeActionForm_".$employee['ROW_ID']."\",\"leave.php\")' /> &nbsp;");
																		
			         	 		}// else status
							?>
							<!-- End row specific actions -->
								<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />	
								<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
								<input name="status" type="hidden" value="<?php echo($employee['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee['ROW_ID']);?>" />
								<input name="submitted" type="hidden" id="submitted" value="1"/>
					</form>
					</td> </tr>
			     <?php  	
		           }
				?>
				
			</tr>
		
	</table>
	</div>
	
	<div>
	    <br /><br />
	    <form action="employee.php" method="post" id="employeeForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	