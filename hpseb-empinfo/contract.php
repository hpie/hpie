<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_contract_details SET
		CONTRACT_TYPE_CODE='".$_POST['CONTRACT_TYPE_CODE']."',
		CONTRACT_PROBATION= '".$_POST['CONTRACT_PROBATION']."',
		CONTRACT_PROBATION_UNITS= '".$_POST['CONTRACT_PROBATION_UNITS']."',
		CONTRACT_EE_NOTICE_PERIOD_CODE= '".$_POST['CONTRACT_EE_NOTICE_PERIOD_CODE']."',
		CONTRACT_WORK_PERMIT_DT= '".$_POST['CONTRACT_WORK_PERMIT_DT']."',
		CONTRACT_BEGIN_DT= '".$_POST['CONTRACT_BEGIN_DT']."',
		CONTRACT_END_DT= '".$_POST['CONTRACT_END_DT']."',
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
		$db->query("INSERT INTO employee_contract_details
		(  EMPLOYEE_ROW_ID, CONTRACT_TYPE_CODE,CONTRACT_PROBATION,CONTRACT_PROBATION_UNITS,CONTRACT_EE_NOTICE_PERIOD_CODE,CONTRACT_WORK_PERMIT_DT,CONTRACT_BEGIN_DT, CONTRACT_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['CONTRACT_TYPE_CODE']."', '".$_POST['CONTRACT_PROBATION']."', '".$_POST['CONTRACT_PROBATION_UNITS']."', '".$_POST['CONTRACT_EE_NOTICE_PERIOD_CODE']."', '".$_POST['CONTRACT_WORK_PERMIT_DT']."', '".$_POST['CONTRACT_BEGIN_DT']."', '".$_POST['CONTRACT_END_DT']."',
		  '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Details Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating employee Details. Please try again.";
			echo($_SESSION['msg']);
		}
		// Removed Header receive-blazes.php
	}else if($action=="Status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_contract_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_contract_details SET
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
		$db->query("UPDATE employee_contract_details SET
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
<h2>Employee Contract Information</h2>
<form action="contract.php" method="post" id="employeeContractForm">
	<ul>
        <li>
            <label for="CONTRACT_TYPE_CODE">CONTRACT TYPE CODE:</label>
           <select id="CONTRACT_TYPE_CODE" name="CONTRACT_TYPE_CODE"
             data-validation-help="Please enter Contract code" 
            data-validation="required" 
            data-validation-error-msg="Contract code is required"/>
                <option value="Z1">On Probation</option>
				<option value="Z2">Confirmed</option>
				<option value="Z3">Ext. of Probation</option>
				<option value="Z4">Fixed term contract</option>
				<option value="Z5">Ext. of Contract</option>   
				<option value="Z6">Part-Time</option>   
				<option value="Z7">Daily Wage contract</option>
				<option value="Z8">Work Charge Contract</option>                
            </select>
        </li>
        <li>
        	<label for="CONTRACT_PROBATION">CONTRACT PROBATION:</label>
            <input type="text" 
            size="40" 
            id="CONTRACT_PROBATION" name="CONTRACT_PROBATION"
            data-validation-help="Please enter Contract Probation" 
            data-validation="required" 
            data-validation-error-msg="Contract Probation is required"/>
         </li>
		<li>
        	<label for="CONTRACT_PROBATION_UNITS">CONTRACT PROBATION UNITS:</label>
            <input type="text" 
            size="40" id="CONTRACT_PROBATION_UNITS" name="CONTRACT_PROBATION_UNITS"
            data-validation-help="Please enter Contract Probation unit" 
            data-validation="required" 
            data-validation-error-msg="Contract Probation unit is required"/>
        </li>
		<li>
        	<label for="CONTRACT_EE_NOTICE_PERIOD_CODE">CONTRACT NOTICE EE PERIOD CODE:</label>
            <select id="CONTRACT_EE_NOTICE_PERIOD_CODE"  name="CONTRACT_EE_NOTICE_PERIOD_CODE"
            data-validation-help="Please enter Contract notice period code" 
            data-validation="required" 
            data-validation-error-msg="Contract notice period code is required"/>
            	<option value="13">3 months</option>  
            	<option value="Z1">7 days</option>
				<option value="Z2">15 days</option>
				<option value="03">1 month</option>
				<option value="04">2 months</option>
			</select>
        </li>
		<li>
        	<label for="CONTRACT_WORK_PERMIT_DT">CONTRACT WORK PERMIT DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_WORK_PERMIT_DT" name="CONTRACT_WORK_PERMIT_DT"
            data-validation-help="Please enter Contract work permit date" 
            data-validation="required" 
            data-validation-error-msg="Contract work permit date is required"/>
        </li>
		<li>
        	<label for="CONTRACT_BEGIN_DT">CONTRACT BEGIN DT:</label>
            <input type="text" 
            size="40" 
            id="CONTRACT_BEGIN_DT" name="CONTRACT_BEGIN_DT"
            data-validation-help="Please enter Contract begin date" 
            data-validation="required" 
            data-validation-error-msg="Contract begin date is required"/>
        </li>
		<li>
        	<label for="CONTRACT_END_DT">CONTRACT END DT:</label>
            <input type="text" 
            size="40" 
            id="CONTRACT_END_DT" name="CONTRACT_END_DT"
            data-validation-help="Please enter Contract end date" 
            data-validation="required" 
            data-validation-error-msg="Contract end date is required"/>
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

		$contract = $db->get_row("SELECT * FROM employee_contract_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Contract Information</h2>
<form action="contract.php" method="post" id="employeeContractForm">
	<ul>
        <li>
            <label for="CONTRACT_TYPE_CODE">CONTRACT TYPE CODE:</label>
           <id="CONTRACT_TYPE_CODE" name="CONTRACT_TYPE_CODE" />
           <?php echo($common->getContractType($contract['CONTRACT_TYPE_CODE'])); ?>
          </li>
        <li>
        	<label for="CONTRACT_PROBATION">CONTRACT PROBATION:</label>
            <input type="text" 
            size="40" 
            id="CONTRACT_PROBATION" name="CONTRACT_PROBATION"
            value="<?php echo($contract['CONTRACT_PROBATION']);?>"
            data-validation-help="Please enter Contract Probation" 
            data-validation="required" 
            data-validation-error-msg="Contract Probation is required"/>
         </li>
		<li>
        	<label for="CONTRACT_PROBATION_UNITS">CONTRACT PROBATION UNITS:</label>
            <input type="text" 
            size="40" id="CONTRACT_PROBATION_UNITS" name="CONTRACT_PROBATION_UNITS"
            value="<?php echo($contract['CONTRACT_PROBATION_UNITS']);?>"
            data-validation-help="Please enter Contract Probation unit" 
            data-validation="required" 
            data-validation-error-msg="Contract Probation unit is required"/>
        </li>
		<li>
        	<label for="CONTRACT_EE_NOTICE_PERIOD_CODE">CONTRACT EE NOTICE PERIOD CODE:</label>
            <id="CONTRACT_EE_NOTICE_PERIOD_CODE"  name="CONTRACT_EE_NOTICE_PERIOD_CODE" />
           <?php echo($common->getContractNoticePeriodlList($contract['CONTRACT_EE_NOTICE_PERIOD_CODE'])); ?>
        </li>
		<li>
        	<label for="CONTRACT_WORK_PERMIT_DT">CONTRACT WORK PERMIT DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_WORK_PERMIT_DT" name="CONTRACT_WORK_PERMIT_DT"
            value="<?php echo($contract['CONTRACT_WORK_PERMIT_DT']);?>"
            data-validation-help="Please enter Contract work permit date" 
            data-validation="required" 
            data-validation-error-msg="Contract work permit date is required"/>
        </li>
		<li>
        	<label for="CONTRACT_BEGIN_DT">CONTRACT BEGIN DT:</label>
            <input type="text" 
            size="40" 
            id="CONTRACT_BEGIN_DT" name="CONTRACT_BEGIN_DT"
            value="<?php echo($contract['CONTRACT_BEGIN_DT']);?>"
            data-validation-help="Please enter Contract begin date" 
            data-validation="required" 
            data-validation-error-msg="Contract begin date is required"/>
        </li>
		<li>
        	<label for="CONTRACT_END_DT">CONTRACT END DT:</label>
            <input type="text" 
            size="40" 
            id="CONTRACT_END_DT" name="CONTRACT_END_DT"
            value="<?php echo($contract['CONTRACT_END_DT']);?>"
            data-validation-help="Please enter Contract end date" 
            data-validation="required" 
            data-validation-error-msg="Contract end date is required"/>
		</li>
       </ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($contract['ROW_ID']);?>" />
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
				<td>Contract Code</td> <td>Contract Probotion</td> <td>Contract Work Permit date</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 							
					$employee_contracts = $db->get_results("SELECT * FROM employee_contract_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_contracts as $employee_contract )
		           	{
		         		echo("<td>".$employee_contract['CONTRACT_TYPE_CODE'] ."</td> <td>".$employee_contract['CONTRACT_PROBATION']."</td> <td>".$employee_contract['CONTRACT_WORK_PERMIT_DT']."</td> <td>".$employee_contract['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="contract.php" method="post" id="employeeContractForm_<?php echo($employee_contract['ROW_ID']);?>" name="employeeContractForm_<?php echo($employee_contract['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_contract['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_contract['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_contract['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_contract['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_contract['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_contract['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="contract.php" method="post" id="employeeContractForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	