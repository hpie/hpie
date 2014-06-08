<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_appraisal_details SET
		APPRAISAL_SCALE_CODE='".$_POST['APPRAISAL_SCALE_CODE']."',
		APPRAISAL_PROMOTION_CODE= '".$_POST['APPRAISAL_PROMOTION_CODE']."',
		APPRAISAL_PERSONAL_NO= '".$_POST['APPRAISAL_PERSONAL_NO']."',
		APPRAISAL_REMARKS= '".$_POST['APPRAISAL_REMARKS']."',
		APPRAISAL_ADVERSE_FLAG= '".$_POST['APPRAISAL_ADVERSE_FLAG']."',
		APPRAISAL_ADVERSE_REMARKS= '".$_POST['APPRAISAL_ADVERSE_REMARKS']."',
		APPRAISAL_BEGIN_DT= '".$_POST['APPRAISAL_BEGIN_DT']."',
		APPRAISAL_END_DT= '".$_POST['APPRAISAL_END_DT']."',
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
		$db->query("INSERT INTO employee_appraisal_details
		(  EMPLOYEE_ROW_ID, APPRAISAL_SCALE_CODE,APPRAISAL_PROMOTION_CODE,APPRAISAL_PERSONAL_NO,APPRAISAL_REMARKS,APPRAISAL_ADVERSE_FLAG,APPRAISAL_ADVERSE_REMARKS, APPRAISAL_BEGIN_DT, APPRAISAL_END_DT,STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['APPRAISAL_SCALE_CODE']."', '".$_POST['APPRAISAL_PROMOTION_CODE']."', '".$_POST['APPRAISAL_PERSONAL_NO']."', '".$_POST['APPRAISAL_REMARKS']."', '".$_POST['APPRAISAL_ADVERSE_FLAG']."', '".$_POST['APPRAISAL_ADVERSE_REMARKS']."', '".$_POST['APPRAISAL_ADVERSE_REMARKS']."',
		 '".$_POST['APPRAISAL_BEGIN_DT']."', '".$_POST['APPRAISAL_END_DT']."', '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Details Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating Employee Details. Please try again.";
			echo($_SESSION['msg']);
		}
		// Removed Header receive-blazes.php
	}else if($action=="Status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_appraisal_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_appraisal_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Active";
		}
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee appraisal status is now set to ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating employee appraisal status. Please try again.";
			echo($_SESSION['msg']);
		}

	}else if($action=="delete")
	{
		$db->query("UPDATE employee_appraisal_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");

		$status="deleted";
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Address is now marked as ".$status.".";
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
<h2>Employee Appraisal Information</h2>
<form action="appraisal.php" method="post" id="employeeAppraisalForm">
	<ul>
        <li>
            <label for="APPRAISAL_SCALE_CODE">APPRAISAL CODE:</label>
           <select id="APPRAISAL_SCALE_CODE" name="APPRAISAL_SCALE_CODE"
             data-validation-help="Please enter Appraisal code" 
            data-validation="required" 
            data-validation-error-msg="Appraisal code is required"/>
                <option value="1">Poor</option>
				<option value="2">Average</option>
				<option value="3">Good</option>
				<option value="4">Very Good</option>
				<option value="5">Outstanding</option>             
            </select>
        </li>
        <li>
            <label for="APPRAISAL_PROMOTION_CODE">APPRAISAL PROMOTION CODE:</label>
           <select id="APPRAISAL_PROMOTION_CODE" name="APPRAISAL_PROMOTION_CODE"
             data-validation-help="Please enter Appraisal Promotion code" 
            data-validation="required" 
            data-validation-error-msg="Appraisal Promotion code is required"/>
                <option value="1">Not Yet Fit</option>
				<option value="2">Fit for Promotion</option>
				<option value="3">Fit for Promotion Out of Turn</option>           
            </select>
        </li>
        <li>
        	<label for="APPRAISAL_PERSONAL_NO">APPRAISAL PERSONAL NO:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_PERSONAL_NO" name="APPRAISAL_PERSONAL_NO"
            data-validation-help="Please enter Appraisal Personal no" 
            data-validation="required" 
            data-validation-error-msg="Appraisal Personal no is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_REMARKS">APPRAISAL REMARKS:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_REMARKS"  name="APPRAISAL_REMARKS"
            data-validation-help="Please enter Appraisal remarks" 
            data-validation="required" 
            data-validation-error-msg="Appraisal remarks no is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_ADVERSE_FLAG">APPRAISAL ADVERSE FLAG:</label>
            <input type="text" 
            size="10" 
            id="APPRAISAL_ADVERSE_FLAG" name="APPRAISAL_ADVERSE_FLAG"
            data-validation-help="Please enter Appraisal adverse flag" 
            data-validation="required" 
            data-validation-error-msg="Appraisal adverse flag is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_ADVERSE_REMARKS">APPRAISAL ADVERSE REMARKS:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_ADVERSE_REMARKS" name="APPRAISAL_ADVERSE_REMARKS"
            data-validation-help="Please Appraisal adverse remarks" 
            data-validation="required" 
            data-validation-error-msg="Appraisal adverse remarks is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_BEGIN_DT">APPRAISAL BEGIN DT:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_BEGIN_DT" name="APPRAISAL_BEGIN_DT"
            data-validation-help="Please enter Appraisal begin date" 
            data-validation="required" 
            data-validation-error-msg="Appraisal begin date is required"/>
		</li>
        <li>
            <label for="APPRAISAL_END_DT">APPRAISAL END DT:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_END_DT" name="APPRAISAL_END_DT"
            data-validation-help="Please enter Appraisal end date" 
            data-validation="required" 
            data-validation-error-msg="Appraisal end date is required"/>
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

		$appraisal = $db->get_row("SELECT * FROM employee_appraisal_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Appraisal Information</h2>
<form action="appraisal.php" method="post" id="employeeAppraisalForm">
	<ul>
        <li>
            <label for="APPRAISAL_SCALE_CODE">APPRAISAL CODE:</label>
            <id="APPRAISAL_SCALE_CODE" name="APPRAISAL_SCALE_CODE"
            <?php echo($common->getAppraisalCode($appraisal['COMMUNICATION_CODE'])); ?>
        </li>
        <li>
            <label for="APPRAISAL_PROMOTION_CODE">APPRAISAL PROMOTION CODE:</label>
            <id="APPRAISAL_PROMOTION_CODE" name="APPRAISAL_PROMOTION_CODE"
            <?php echo($common->getAppraisaPromotionlCode($appraisal['COMMUNICATION_CODE'])); ?>
        </li>
        <li>
        	<label for="APPRAISAL_PERSONAL_NO">APPRAISAL PERSONAL NO:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_PERSONAL_NO" name="APPRAISAL_PERSONAL_NO"
             value="<?php echo($appraisal['APPRAISAL_PERSONAL_NO']);?>"
            data-validation-help="Please enter Appraisal Personal no" 
            data-validation="required" 
            data-validation-error-msg="Appraisal Personal no is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_REMARKS">APPRAISAL REMARKS:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_REMARKS"  name="APPRAISAL_REMARKS"
            value="<?php echo($appraisal['APPRAISAL_REMARKS']);?>"
            data-validation-help="Please enter Appraisal remarks" 
            data-validation="required" 
            data-validation-error-msg="Appraisal remarks no is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_ADVERSE_FLAG">APPRAISAL ADVERSE FLAG:</label>
            <input type="text" 
            size="10" 
            id="APPRAISAL_ADVERSE_FLAG" name="APPRAISAL_ADVERSE_FLAG"
            value="<?php echo($appraisal['APPRAISAL_ADVERSE_FLAG']);?>"
            data-validation-help="Please enter Appraisal adverse flag" 
            data-validation="required" 
            data-validation-error-msg="Appraisal adverse flag is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_ADVERSE_REMARKS">APPRAISAL ADVERSE REMARKS:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_ADVERSE_REMARKS" name="APPRAISAL_ADVERSE_REMARKS"
            value="<?php echo($appraisal['APPRAISAL_ADVERSE_REMARKS']);?>"
            data-validation-help="Please Appraisal adverse remarks" 
            data-validation="required" 
            data-validation-error-msg="Appraisal adverse remarks is required"/>
        </li>
		<li>
        	<label for="APPRAISAL_BEGIN_DT">APPRAISAL BEGIN DT:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_BEGIN_DT" name="APPRAISAL_BEGIN_DT"
            value="<?php echo($appraisal['APPRAISAL_BEGIN_DT']);?>"
            data-validation-help="Please enter Appraisal begin date" 
            data-validation="required" 
            data-validation-error-msg="Appraisal begin date is required"/>
		</li>
        <li>
            <label for="APPRAISAL_END_DT">APPRAISAL END DT:</label>
            <input type="text" 
            size="40" 
            id="APPRAISAL_END_DT" name="APPRAISAL_END_DT"
            value="<?php echo($appraisal['APPRAISAL_END_DT']);?>"
            data-validation-help="Please enter Appraisal end date" 
            data-validation="required" 
            data-validation-error-msg="Appraisal end date is required"/>
        </li>
		</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($appraisal['ROW_ID']);?>" />
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
				<td>Appraisal Code</td> <td>Appraisal Promotion code</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_address_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_appraisals = $db->get_results("SELECT * FROM employee_appraisal_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_appraisals as $employee_appraisal )
		           	{
		         		echo("<td>".$employee_appraisal['APPRAISAL_SCALE_CODE'] ."</td> <td>".$employee_appraisal['APPRAISAL_PROMOTION_CODE']."</td>  <td>".$employee_appraisal['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="appraisal.php" method="post" id="employeeAddressForm_<?php echo($employee_appraisal['ROW_ID']);?>" name="employeeAddressForm_<?php echo($employee_appraisal['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_appraisals['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_appraisals['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_appraisals['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_address['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_address['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_address['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="appraisal.php" method="post" id="employeeAppraisalForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	