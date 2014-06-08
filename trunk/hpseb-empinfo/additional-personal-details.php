<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_personal_details SET
		PERSONAL_MILITARY_CODE='".$_POST['PERSONAL_MILITARY_CODE']."',
		PERSONAL_DISABILITY_LEARNED_DT= '".$_POST['PERSONAL_DISABILITY_LEARNED_DT']."',
		PERSONAL_BEGIN_DT= '".$_POST['PERSONAL_BEGIN_DT']."',
		PERSONAL_END_DT= '".$_POST['PERSONAL_END_DT']."',
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
		$db->query("INSERT INTO employee_personal_details
		(  EMPLOYEE_ROW_ID, PERSONAL_MILITARY_CODE,PERSONAL_DISABILITY_LEARNED_DT,PERSONAL_BEGIN_DT,PERSONAL_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['PERSONAL_MILITARY_CODE']."', '".$_POST['PERSONAL_DISABILITY_LEARNED_DT']."', '".$_POST['PERSONAL_BEGIN_DT']."', '".$_POST['PERSONAL_END_DT']."',
		  '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee detailss Successfully Created.";
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
			$db->query("UPDATE employee_personal_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_personal_details SET
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
		$db->query("UPDATE employee_personal_details SET
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
<h2>Employee Address Information</h2>
<form action="additional-personal-details.php" method="post" id="employeePersonalDetailsForm">
	<ul>
        <li>
            <label for="PERSONAL_MILITARY_CODE">PERSONAL MILITARY CODE:</label>
           <select id="PERSONAL_MILITARY_CODE" name="PERSONAL_MILITARY_CODE"
             data-validation-help="Please enter military code" 
            data-validation="required" 
            data-validation-error-msg="Military code is required"/>
                <option value="Z1">GEN</option>
				<option value="Z2">SC</option>
				<option value="Z3">ST</option>
				<option value="Z4">OBC</option>           
            </select>
        </li>
        <li>
        	<label for="PERSONAL_DISABILITY_LEARNED_DT">PERSONAL DISABILITY LEARNED DT:</label>
            <input type="text" 
            size="40" 
            id="PERSONAL_DISABILITY_LEARNED_DT" name="PERSONAL_DISABILITY_LEARNED_DT"
            data-validation-help="Please enter disability learned date"  
            data-validation="required" 
            data-validation-error-msg="Disability learned date is required"/>
            </li>
		<li>
        	<label for="PERSONAL_BEGIN_DT">PERSONAL BEGIN DT:</label>
            <input type="text" 
            size="40" id="PERSONAL_BEGIN_DT" name="PERSONAL_BEGIN_DT"
            data-validation-help="Please enter begin date"  
            data-validation="required" 
            data-validation-error-msg="Begin date is required"/>
        </li>
		<li>
        	<label for="PERSONAL_END_DT">PERSONAL END DT:</label>
            <input type="text" 
            size="40" 
            id="PERSONAL_END_DT"  name="PERSONAL_END_DT"
            data-validation-help="Please enter end date"  
            data-validation="required" 
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

		$address = $db->get_row("SELECT * FROM employee_personal_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Address Information</h2>
<form action="additional-personal-details.php" method="post" id="employeePersonalDetailsForm">
	<ul>
        <li>
            <label for="PERSONAL_MILITARY_CODE">ADDRESS TYPE CODE:</label>
            <id="PERSONAL_MILITARY_CODE" name="PERSONAL_MILITARY_CODE" />
            <?php echo($common->getAddressType($address['PERSONAL_MILITARY_CODE'])); ?>
        </li>
        <li>
        	<label for="PERSONAL_DISABILITY_LEARNED_DT">ADDRESS CARE OF:</label>
            <input type="text" 
            size="40" 
            id="PERSONAL_DISABILITY_LEARNED_DT" name="PERSONAL_DISABILITY_LEARNED_DT" value="<?php echo($address['PERSONAL_DISABILITY_LEARNED_DT']);?>" 
            data-validation-help="Please enter address c/o" 
            data-validation="required" 
            data-validation-error-msg="Address c/o is required"/>
        </li>
		<li>
        	<label for="PERSONAL_BEGIN_DT">ADDRESS LINE 1:</label>
            <input type="text" 
            size="60" id="PERSONAL_BEGIN_DT" name="PERSONAL_BEGIN_DT" value="<?php echo($address['PERSONAL_BEGIN_DT']);?>"
            data-validation-help="Please enter address line 1" 
            data-validation="required" 
            data-validation-error-msg="Address line 1 is required"/>
        </li>
		<li>
        	<label for="PERSONAL_END_DT">ADDRESS LINE 2:</label>
            <input type="text" 
            size="40" 
            id="PERSONAL_END_DT"  name="PERSONAL_END_DT" value="<?php echo($address['PERSONAL_END_DT']);?>"
            data-validation-help="Please enter address line 2" 
            data-validation="required" 
            data-validation-error-msg="Address line 2 is required"/>
        </li>
		<li>
        	<label for="ADDRESS_POSTAL_CODE">ADDRESS POSTAL CODE:</label>
            <input type="text" 
            size="10" 
            id="ADDRESS_POSTAL_CODE" name="ADDRESS_POSTAL_CODE" 
            value="<?php echo($address['PERSONAL_END_DT']);?>"
            data-validation-help="Please enter address postal code" 
            data-validation="required" 
            data-validation-error-msg="Address postal code is required"/>
        </li>
		<li>
        	<label for="ADDRESS_CITY">ADDRESS CITY:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_CITY"  name="ADDRESS_CITY" 
            value="<?php echo($address['ADDRESS_CITY']);?>"
            data-validation-help="Please enter address city" 
            data-validation="required" 
            data-validation-error-msg="Address city is required"/>
        </li>
		<li>
        	<label for="ADDRESS_DISTRICT">ADDRESS DISTRICT:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_DISTRICT" name="ADDRESS_DISTRICT" 
            value="<?php echo($address['ADDRESS_DISTRICT']);?>"
            data-validation-help="Please enter District" 
            data-validation="required" 
            data-validation-error-msg="District is required"/>
		</li>
        <li>
            <label for="ADDRESS_REGION_CODE">ADDRESS REGION CODE:</label>
             <id="PERSONAL_MILITARY_CODE" name="ADDRESS_REGION_CODE" />
             <?php echo($common->getRegionList($address['ADDRESS_REGION_CODE'])); ?>
         </li>
		<li>
        	<label for="ADDRESS_COUNTRY_CODE">ADDRESS COUNTRY CODE:</label>
            <input type="text" 
            size="3" id="ADDRESS_COUNTRY_CODE" name="ADDRESS_COUNTRY_CODE" 
            value="<?php echo($address['ADDRESS_COUNTRY_CODE']);?>"
            value="IN" 
            data-validation-help="Please enter address country code" 
            data-validation="required" 
            data-validation-error-msg="Address country code is required"/>
        </li>
		<li>
        	<label for="ADDRESS_PHONE_NO">ADDRESS PHONE NO:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_PHONE_NO" name="ADDRESS_PHONE_NO" 
            value="<?php echo($address['ADDRESS_PHONE_NO']);?>"
            data-validation-help="Please enter address phone number" 
            data-validation="required" 
            data-validation-error-msg="Address phone number is required"/>
        </li>
		<li>
        	<label for="ADDRESS_BEGIN_DT">ADDRESS BEGIN DT:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_BEGIN_NO" name="ADDRESS_BEGIN_DT"
            value="<?php echo($address['ADDRESS_BEGIN_DT']);?>"
            data-validation-help="Please enter address begin date" 
            data-validation="required" 
            data-validation-error-msg="Address begin date is required"/>
  		</li>
		<li>
        	<label for="ADDRESS_END_DT">ADDRESS END DT:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_END_DT" name="ADDRESS_END_DT"
            value="<?php echo($address['ADDRESS_END_DT']);?>"
            data-validation-help="Please enter address end date" 
            data-validation="required" 
            data-validation-error-msg="Address end date is required"/>
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
				<td>Address Code</td> <td>ADDRESS LINE 1</td> <td>ADDRESS LINE 2</td> <td>Address 2</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_personal_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_addresses = $db->get_results("SELECT * FROM employee_personal_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_addresses as $employee_address )
		           	{
		         		echo("<td>".$employee_address['PERSONAL_MILITARY_CODE'] ."</td> <td>".$employee_address['PERSONAL_BEGIN_DT']."</td> <td>".$employee_address['PERSONAL_END_DT']."</td> <td>".$employee_address['PERSONAL_END_DT']."</td>  <td>".$employee_address['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="additional-personal-details.php" method="post" id="employeePersonalDetailsForm_<?php echo($employee_address['ROW_ID']);?>" name="employeePersonalDetailsForm_<?php echo($employee_address['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_address['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_address['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_address['STATUS']=="1")
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
	    <form action="additional-personal-details.php" method="post" id="employeePersonalDetailsForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	