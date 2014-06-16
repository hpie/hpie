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
		CONTRACT_ER_ERNOTICE_PERIOD_CODE= '".$_POST['CONTRACT_ER_ERNOTICE_PERIOD_CODE']."',
		CONTRACT_EE_NOTICE_PERIOD_CODE= '".$_POST['CONTRACT_EE_NOTICE_PERIOD_CODE']."',
		CONTRACT_WORK_PERMIT_DT= '".$_POST['CONTRACT_WORK_PERMIT_DT']."',
		CONTRACT_BEGIN_DT= '".$_POST['CONTRACT_BEGIN_DT']."',
		CONTRACT_END_DT= '".$_POST['CONTRACT_END_DT']."',
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
	
	}else if($action=="save")
	{ 
		// check for dates
		$beginDT = $_POST['CONTRACT_BEGIN_DT'];
		$endDT = $_POST['CONTRACT_END_DT'];
		if($beginDT=="" || $endDT=="")
		{
			$employee = $db->get_row("SELECT * FROM employee WHERE ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
			if($beginDT=="")
			{
				$beginDT = $employee['EMP_BEGIN_DT'];	
			}
			if($endDT=="")
			{
				$endDT = $employee['EMP_END_DT'];	
			}
		}// end if check dates
		
		
		$db->query("INSERT INTO employee_contract_details
		(  EMPLOYEE_ROW_ID, CONTRACT_TYPE_CODE,CONTRACT_PROBATION,CONTRACT_PROBATION_UNITS,CONTRACT_ER_ERNOTICE_PERIOD_CODE,CONTRACT_EE_NOTICE_PERIOD_CODE,CONTRACT_WORK_PERMIT_DT, ADDRESS_DISTRICT, ADDRESS_REGION_CODE, ADDRESS_COUNTRY_CODE, ADDRESS_PHONE_NO, CONTRACT_BEGIN_DT, CONTRACT_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['CONTRACT_TYPE_CODE']."', '".$_POST['CONTRACT_PROBATION']."', '".$_POST['CONTRACT_PROBATION_UNITS']."', '".$_POST['CONTRACT_ER_ERNOTICE_PERIOD_CODE']."', '".$_POST['CONTRACT_EE_NOTICE_PERIOD_CODE']."', '".$_POST['CONTRACT_WORK_PERMIT_DT']."', '".$_POST['ADDRESS_DISTRICT']."',
		 '".$beginDT."', '".$endDT."', '1','".$_POST['created_by']."')");		
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

	}else if($action=="Status")
	{
		$status="";
		if($_POST['status_cd'] =="0")
		{
			$db->query("UPDATE employee_contract_details SET
			STATUS= '1',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="1";
		}else if($_POST['status_cd'] =="1")
		{
			$db->query("UPDATE employee_contract_details SET
			STATUS= '0',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="0";
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
			STATUS= '".$_POST['status_cd']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");

		$status="-1";
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
            <?php echo($common->getContractType("")); ?>
        </li>
        <li>
        	<label for="CONTRACT_PROBATION">CONTRACT PROBATION:</label>
            <input type="text" 
            size="2" 
            id="CONTRACT_PROBATION" name="CONTRACT_PROBATION"
            data-validation-help="Please enter Contract probation" 
            data-validation-error-msg="Contract probation is required"/>
        </li>
		<li>
        	<label for="CONTRACT_PROBATION_UNITS">CONTRACT PROBATION UNITS:</label>
            <?php echo($common->getContractUnitCodeList("")); ?>
        </li>
		<li>
        	<label for="CONTRACT_ER_ERNOTICE_PERIOD_CODE">CONTRACT ER ERNOTICE PERIOD CODE:</label>
           <?php echo($common->getContractERNoticePeriodlList("")); ?>
        </li>
		<li>
			<label for="CONTRACT_EE_NOTICE_PERIOD_CODE">CONTRACT EE NOTICE PERIOD CODE:</label>
           <?php echo($common->getContractEENoticePeriodlList("")); ?>
        </li>
		<li>
        	<label for="CONTRACT_WORK_PERMIT_DT">CONTRACT_WORK_PERMIT_DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_WORK_PERMIT_DT" name="CONTRACT_WORK_PERMIT_DT"
            data-validation-help="Please work permit date" 
            data-validation-error-msg="Work permit date is required"/>
        </li>
		<li>
        	<label for="CONTRACT_BEGIN_DT">CONTRACT_BEGIN_DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_BEGIN_DT" name="CONTRACT_BEGIN_DT"
            data-validation-help="Please enter START DATE" 
            data-validation-error-msg="Telephone Number is required"/>
		</li>
		<li>
        	<label for="CONTRACT_END_DT">CONTRACT END DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_END_DT" name="CONTRACT_END_DT"
            data-validation-help="Please enter end date" 
            data-validation-error-msg="End date is required"/>
		</li>
	</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Save">Save</button>
			<button type="submit" class="right" name="action" value="Cancel">Cancel</button>
			<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
</article>
<footer>

</footer>

<script>

	//date control script
	$(function() {
			$( "#CONTRACT_WORK_PERMIT_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
	
	$(function() {
			$( "#CONTRACT_BEGIN_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
	
	$(function() {
			$( "#CONTRACT_END_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
  
	  
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
            <?php echo($common->getContractType($contract['CONTRACT_TYPE_CODE'])); ?>
        </li>
        <li>
        	<label for="CONTRACT_PROBATION">CONTRACT PROBATION:</label>
            <input type="text" 
            size="40" 
            id="CONTRACT_PROBATION" name="CONTRACT_PROBATION" value="<?php echo($contract['CONTRACT_PROBATION']);?>" 
            data-validation-help="Please enter contract probation" 
            data-validation-error-msg="Contract probation is required"/>
        </li>
		<li>
        	<label for="CONTRACT_PROBATION_UNITS">CONTRACT PROBATION UNITS:</label>
        	<?php echo($common->getContractUnitCodeList('CONTRACT_TYPE_CODE')); ?>
        </li>
		<li>
        	<label for="CONTRACT_ER_ERNOTICE_PERIOD_CODE">CONTRACT ER ERNOTICE PERIOD CODE:</label>
            <?php echo($common->getContractERNoticePeriodlList("CONTRACT_ER_ERNOTICE_PERIOD_CODE"));?>
        </li>
		<li>
        	<label for="CONTRACT_EE_NOTICE_PERIOD_CODE">CONTRACT EE NOTICE PERIOD CODE:</label>
            <?php echo($common->getContractEENoticePeriodlList("CONTRACT_ER_ERNOTICE_PERIOD_CODE"));?>
        </li>
		<li>
        	<label for="CONTRACT_WORK_PERMIT_DT">CONTRACT WORK PERMIT DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_WORK_PERMIT_DT"  name="CONTRACT_WORK_PERMIT_DT" 
            value="<?php echo($contract['CONTRACT_WORK_PERMIT_DT']);?>"
            data-validation-help="Please enter work permit date" 
            data-validation-error-msg="Work permit date is required"/>
        </li>
		<li>
        	<label for="CONTRACT_BEGIN_DT">CONTRACT BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_BEGIN_DT" name="CONTRACT_BEGIN_DT"
            value="<?php echo($address['CONTRACT_BEGIN_DT']);?>"
            data-validation-help="Please enter contract begin date" 
            data-validation-error-msg="Contract begin date is required"/>
  		</li>
		<li>
        	<label for="CONTRACT_END_DT">CONTRACT END DT:</label>
            <input type="text" 
            size="10" 
            id="CONTRACT_END_DT" name="CONTRACT_END_DT"
            value="<?php echo($address['CONTRACT_END_DT']);?>"
            data-validation-help="Please enter contract end date" 
            data-validation-error-msg="Contract end date is required"/>
         </li>
		</ul>	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="submit" class="right" name="action" value="Cancel">Cancel</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($address['ROW_ID']);?>" />
			<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
	<script>

	 $.validate({
	   
	 });
	
	 // Restrict presentation length
	 $('#presentation').restrictLength( $('#pres-max-length') );

	// date control script
		$(function() {
	  		$( "#CONTRACT_WORK_PERMIT_DT" ).datepicker(
	                 	{ dateFormat: 'yy-mm-dd', 
		                   showAnim: 'slide' 
		                });
		});
		
		$(function() {
	  		$( "#CONTRACT_BEGIN_DT" ).datepicker(
	                 	{ dateFormat: 'yy-mm-dd', 
		                   showAnim: 'slide' 
		                });
		  });

		$(function() {
	  		$( "#CONTRACT_END_DT" ).datepicker(
	                 	{ dateFormat: 'yy-mm-dd', 
		                   showAnim: 'slide' 
		                });
		  });
		  
	</script>
</article>		
<?php
	}else
	{
?>
	<div class="CSSTableGenerator" >
	<table>
			<tr>
				<td>Contract Type</td> <td>Contract Probotaion</td> <td>ER Notice Period</td> <td>EE Notice Period</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 									
					$employee_contracts = $db->get_results("SELECT * FROM employee_contract_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_contracts as $employee_contract )
		           	{
		         		echo("<tr><td>".$employee_contract['CONTRACT_TYPE_CODE'] ."</td> <td>".$employee_contract['CONTRACT_PROBATION_UNITS']."".$employee_contract['CONTRACT_PROBATION']."</td> <td>".$employee_contract['CONTRACT_ER_ERNOTICE_PERIOD_CODE']."</td> <td>".$employee_contract['CONTRACT_ER_ERNOTICE_PERIOD_CODE']."</td>  <td>".$employee_contract['STATUS']."</td> ");
		         		
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
								<input name="status_cd" type="hidden" value="<?php echo($employee_contract['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_contract['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_contract['EMPLOYEE_ROW_ID']);?>" />
								<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
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