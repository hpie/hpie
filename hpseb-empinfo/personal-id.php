<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_identification_details SET
		IDENTIFICATION_CODE='".$_POST['IDENTIFICATION_CODE']."',
		IDENTIFICATION_NUMBER= '".$_POST['IDENTIFICATION_NUMBER']."',
		IDENTIFICATION_PREV_NUMBER= '".$_POST['IDENTIFICATION_PREV_NUMBER']."',
		IDENTIFICATION_ISSUING_AUTHIROTY= '".$_POST['IDENTIFICATION_ISSUING_AUTHIROTY']."',
		IDENTIFICATION_ISSUING_NUMBER= '".$_POST['IDENTIFICATION_ISSUING_NUMBER']."',
		IDENTIFICATION_ISSUING_DT= '".$_POST['IDENTIFICATION_ISSUING_DT']."',
		IDENTIFICATION_VALID_DT= '".$_POST['IDENTIFICATION_VALID_DT']."',
		IDENTIFICATION_ISSUING_PLACE= '".$_POST['IDENTIFICATION_ISSUING_PLACE']."',
		IDENTIFICATION_ISSUING_COUNTRY= '".$_POST['IDENTIFICATION_ISSUING_COUNTRY']."',
		IDENTIFICATION_COUNTRY_CODE= '".$_POST['IDENTIFICATION_COUNTRY_CODE']."',
		IDENTIFICATION_VERIFIED= '".$_POST['IDENTIFICATION_VERIFIED']."',
		IDENTIFICATION_BEGIN_DT= '".$_POST['IDENTIFICATION_BEGIN_DT']."',
		IDENTIFICATION_END_DT= '".$_POST['IDENTIFICATION_END_DT']."',
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
		$db->query("INSERT INTO employee_identification_details
		(EMPLOYEE_ROW_ID, IDENTIFICATION_CODE,IDENTIFICATION_NUMBER,IDENTIFICATION_PREV_NUMBER, IDENTIFICATION_ISSUING_AUTHIROTY,IDENTIFICATION_ISSUING_NUMBER, IDENTIFICATION_ISSUING_DT, IDENTIFICATION_ISSUING_PLACE, IDENTIFICATION_ISSUING_COUNTRY, IDENTIFICATION_COUNTRY_CODE, IDENTIFICATION_VERIFIED, IDENTIFICATION_BEGIN_DT, IDENTIFICATION_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['IDENTIFICATION_CODE']."', '".$_POST['IDENTIFICATION_NUMBER']."', '".$_POST['IDENTIFICATION_PREV_NUMBER']."', '".$_POST['IDENTIFICATION_ISSUING_AUTHIROTY']."', '".$_POST['IDENTIFICATION_ISSUING_NUMBER']."', '".$_POST['IDENTIFICATION_ISSUING_DT']."', '".$_POST['IDENTIFICATION_ISSUING_PLACE']."', '".$_POST['IDENTIFICATION_ISSUING_COUNTRY']."', 
		 '".$_POST['IDENTIFICATION_COUNTRY_CODE']."','".$_POST['IDENTIFICATION_VERIFIED']."', '".$_POST['IDENTIFICATION_BEGIN_DT']."', '".$_POST['IDENTIFICATION_END_DT']."', '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Personal ID Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating Personal ID. Please try again.";
			echo($_SESSION['msg']);
		}
		// Removed Header receive-blazes.php
	}else if($action=="status")
	{
		$status="";
		if($_POST['status'] =="-1")
		{
			$db->query("UPDATE employee_identification_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_identification_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Active";
		}
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Personal ID status is now set to ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating employee Personal ID status. Please try again.";
			echo($_SESSION['msg']);
		}

	}else if($action=="delete")
	{
		$db->query("UPDATE employee_identification_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");

		$status="deleted";
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee communication is now marked as ".$status.".";
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
<h2>Employee Personal ID Information</h2>
<form action="personal-id.php" method="post" id="employeePersonalIDForm">
	<ul>
        <li>
            <label for="IDENTIFICATION_CODE">COMMUNICATION CODE:</label>
           <select id="IDENTIFICATION_CODE" name="IDENTIFICATION_CODE"
             	data-validation-help="Please enter Identification type code" 
            	data-validation="required" 
            	data-validation-error-msg="Identification type code is required"/>
                <option value="02">PAN Number</option>
				<option value="03">Gratuity for India</option>
				<option value="05">TAN Number</option>
				<option value="Z1">GPF Number</option>
				<option value="Z2">CPS Number</option>
				<option value="Z3">Health Insurance</option>            
            </select>
        </li>
       <li>
        	<label for="IDENTIFICATION_NUMBER">ID NUMBER:</label>
            <input type="text" 
            	   size="40" 
            	   id="IDENTIFICATION_NUMBER" 
            	   name="IDENTIFICATION_NUMBER"
             	   data-validation-help="Please enter ID Number"  
             	   data-validation="required" 
             	   data-validation-error-msg="ID Number is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_PREV_NUMBER">PREV. ID NUMBER:</label>
            <input type="text" 
            		size="20" 
            		id="IDENTIFICATION_PREV_NUMBER"  
            		name="IDENTIFICATION_PREV_NUMBER"
            		data-validation-help="Please enter Prev.ID Number" 
            		data-validation-error-msg="Prev.ID Number is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_AUTHIROTY">AUTHORITY:</label>
            <input type="text" 
            	   size="30"
            	   name="IDENTIFICATION_ISSUING_AUTHIROTY" 
            	   id="IDENTIFICATION_ISSUING_AUTHIROTY"  
            	   data-validation-help="Please enter Authority" 
            	   data-validation-error-msg="Authority is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_NUMBER">ISSUING NUMBER:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_ISSUING_NUMBER" 
            	   name="IDENTIFICATION_ISSUING_NUMBER"
            	   data-validation-help="Please enter Issuing Number"  
            	   data-validation-error-msg="Issuing Number is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_DT">DATE OF ISSUE:</label>
            <input type="text" 
            	   size="12" 
            	   id="IDENTIFICATION_ISSUING_DT" 
            	   name="IDENTIFICATION_ISSUING_DT"
            	   data-validation-help="Please enter Date of Issue" 
            	   data-validation-error-msg="Date of Issue is required"  />
        </li>
		<li>
        	<label for="IDENTIFICATION_VALID_DT">VALID TO DATE:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_VALID_DT" 
            	   name="IDENTIFICATION_VALID_DT"
            	   data-validation-help="Please enter Valid To date" 
            	   data-validation-error-msg="Valid To is required"  /> 
		</li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_PLACE">PLACE OF ISSUE:</label>
            <input type="text" 
            	   size="30" 
                   id="IDENTIFICATION_ISSUING_PLACE" 
                   name="IDENTIFICATION_ISSUING_PLACE"
                   data-validation-help="Please enter Place of Issue"  
                   data-validation-error-msg="Place of Issue is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_COUNTRY">COUNTRY OF ISSUE:</label>
            <input type="text" 
            	   size="3" 
            	   id="IDENTIFICATION_ISSUING_COUNTRY" 
            	   name="IDENTIFICATION_ISSUING_COUNTRY"
            	   value="IN" 
            	   data-validation-help="Please enter Country of Issue" 
            	   data-validation-error-msg="Country of Issue is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_COUNTRY_CODE">COUNTRY OF IDENTIFICATION:</label>
            <input type="text" 
            	   size="3" 
            	   id="IDENTIFICATION_COUNTRY_CODE" 
            	   name="IDENTIFICATION_COUNTRY_CODE"
            	   value="IN" 
            	   data-validation-help="Please enter Country" 
            	   data-validation-error-msg="Country is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_VERIFIED">VERIFIED:</label>
            <input type="text" 
            	   size="20" 
            	   id="IDENTIFICATION_VERIFIED" 
            	   name="IDENTIFICATION_VERIFIED"
            	   data-validation-help="Please enter the verification" 
            	   data-validation-error-msg="ID verification is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_BEGIN_DT">BEGIN DATE:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_BEGIN_DT"
            	   name="IDENTIFICATION_BEGIN_DT"
            	   data-validation-help="Please enter Begin date" 
            	   data-validation-error-msg="Begin date is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_END_DT">END DATE:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_END_DT"
            	   name="IDENTIFICATION_END_DT"
            	   data-validation-help="Please enter end date" 
            	   data-validation-error-msg="End date is required" />
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

		$personalID = $db->get_row("SELECT * FROM employee_identification_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Personal ID Information</h2>
<form action="personal-id.php" method="post" id="employeePersonalIDForm">
	<ul>
        <li>
            <label for="IDENTIFICATION_CODE">COMMUNICATION CODE:</label>
           <id="IDENTIFICATION_CODE" name="IDENTIFICATION_CODE"
             	data-validation-help="Please enter Identification type code" 
            	data-validation="required" 
            	data-validation-error-msg="Identification type code is required"/>
                <?php echo($common->getIdentificationType($personalID['IDENTIFICATION_CODE'])); ?>            
           </li>
       <li>
        	<label for="IDENTIFICATION_NUMBER">ID NUMBER:</label>
            <input type="text" 
            	   size="40" 
            	   id="IDENTIFICATION_NUMBER" 
            	   name="IDENTIFICATION_NUMBER" value="<?php echo($personalID['IDENTIFICATION_NUMBER']);?>"
             	   data-validation-help="Please enter ID Number"  
             	   data-validation="required" 
             	   data-validation-error-msg="ID Number is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_PREV_NUMBER">PREV. ID NUMBER:</label>
            <input type="text" 
            		size="20" 
            		id="IDENTIFICATION_PREV_NUMBER"  
            		name="IDENTIFICATION_PREV_NUMBER" value="<?php echo($personalID['IDENTIFICATION_PREV_NUMBER']);?>"
            		data-validation-help="Please enter Prev.ID Number" 
            		data-validation-error-msg="Prev.ID Number is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_AUTHIROTY">AUTHORITY:</label>
            <input type="text" 
            	   size="30"
            	   name="IDENTIFICATION_ISSUING_AUTHIROTY" 
            	   id="IDENTIFICATION_ISSUING_AUTHIROTY"  value="<?php echo($personalID['IDENTIFICATION_ISSUING_AUTHIROTY']);?>"
            	   data-validation-help="Please enter Authority" 
            	   data-validation-error-msg="Authority is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_NUMBER">ISSUING NUMBER:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_ISSUING_NUMBER" 
            	   name="IDENTIFICATION_ISSUING_NUMBER" value="<?php echo($personalID['IDENTIFICATION_ISSUING_NUMBER']);?>"
            	   data-validation-help="Please enter Issuing Number"  
            	   data-validation-error-msg="Issuing Number is required" />
        </li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_DT">DATE OF ISSUE:</label>
            <input type="text" 
            	   size="12" 
            	   id="IDENTIFICATION_ISSUING_DT" 
            	   name="IDENTIFICATION_ISSUING_DT" value="<?php echo($personalID['IDENTIFICATION_ISSUING_DT']);?>"
            	   data-validation-help="Please enter Date of Issue" 
            	   data-validation-error-msg="Date of Issue is required"  />
        </li>
		<li>
        	<label for="IDENTIFICATION_VALID_DT">VALID TO DATE:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_VALID_DT" 
            	   name="IDENTIFICATION_VALID_DT" value="<?php echo($personalID['IDENTIFICATION_VALID_DT']);?>"
            	   data-validation-help="Please enter Valid To date" 
            	   data-validation-error-msg="Valid To is required"  /> 
		</li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_PLACE">PLACE OF ISSUE:</label>
            <input type="text" 
            	   size="30" 
                   id="IDENTIFICATION_ISSUING_PLACE" 
                   name="IDENTIFICATION_ISSUING_PLACE" value="<?php echo($personalID['IDENTIFICATION_ISSUING_PLACE']);?>"
                   data-validation-help="Please enter Place of Issue"  
                   data-validation-error-msg="Place of Issue is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_ISSUING_COUNTRY">COUNTRY OF ISSUE:</label>
            <input type="text" 
            	   size="3" 
            	   id="IDENTIFICATION_ISSUING_COUNTRY" 
            	   name="IDENTIFICATION_ISSUING_COUNTRY"
            	   value="<?php echo($personalID['IDENTIFICATION_ISSUING_COUNTRY']);?>"
            	   data-validation-help="Please enter Country of Issue" 
            	   data-validation-error-msg="Country of Issue is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_COUNTRY_CODE">COUNTRY OF IDENTIFICATION:</label>
            <input type="text" 
            	   size="3" 
            	   id="IDENTIFICATION_COUNTRY_CODE" 
            	   name="IDENTIFICATION_COUNTRY_CODE"
            	   value="<?php echo($personalID['IDENTIFICATION_COUNTRY_CODE']);?>"
            	   data-validation-help="Please enter Country" 
            	   data-validation-error-msg="Country is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_VERIFIED">VERIFIED:</label>
            <input type="text" 
            	   size="20" 
            	   id="IDENTIFICATION_VERIFIED" 
            	   name="IDENTIFICATION_VERIFIED" value="<?php echo($personalID['IDENTIFICATION_VERIFIED']);?>"
            	   data-validation-help="Please enter the verification" 
            	   data-validation-error-msg="ID verification is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_BEGIN_DT">BEGIN DATE:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_BEGIN_DT"
            	   name="IDENTIFICATION_BEGIN_DT" value="<?php echo($personalID['IDENTIFICATION_BEGIN_DT']);?>"
            	   data-validation-help="Please enter Begin date" 
            	   data-validation-error-msg="Begin date is required" />
		</li>
		<li>
        	<label for="IDENTIFICATION_END_DT">END DATE:</label>
            <input type="text" 
            	   size="10" 
            	   id="IDENTIFICATION_END_DT"
            	   name="IDENTIFICATION_END_DT" value="<?php echo($personalID['IDENTIFICATION_END_DT']);?>"
            	   data-validation-help="Please enter end date" 
            	   data-validation-error-msg="End date is required" />
		</li>
		</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($personalID['ROW_ID']);?>" />
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
				<td>ID Type</td> <td>ID Number</td> <td>Authority</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_address_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_personalids = $db->get_results("SELECT * FROM employee_identification_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_personalids as $employee_personalid )
		           	{
		         		echo("<td>".$employee_personalid['IDENTIFICATION_CODE'] ."</td> <td>".$employee_personalid['IDENTIFICATION_NUMBER']."</td> <td>".$employee_personalid['IDENTIFICATION_ISSUING_AUTHIROTY']."</td> <td>".$employee_personalid['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="personal-id.php" method="post" id="employeeIDForm_<?php echo($employee_personalid['ROW_ID']);?>" name="employeeIDForm_<?php echo($employee_personalid['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_personalid['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_personalid['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_personalid['STATUS']=="1")
			         	 		{
			         	 			echo("<input class='statusAImgBut' id='status' type='submit' name='action' value='Status' title='Active record. Click to set as Inactive'/> &nbsp;");

			         	 			echo("<input class='editImgBut' id='editlot' type='submit' name='action' value='Edit' title='Edit this record'/> &nbsp;");
									//}
									
								    echo("<input class='deleteImgBut' id='deletelot' type='submit' name='action' value='Delete' title='Mark this record as deleted'/> &nbsp;");
								}// else status
							?>
							<!-- End row specific actions -->	
								<input name="status" type="hidden" value="<?php echo($employee_personalid['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_personalid['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_personalid['EMPLOYEE_ROW_ID']);?>" />
								<input name="submitted" type="hidden" id="submitted" value="1"/>
					</form>
					</td></tr>
			     <?php  	
		           }
				?>
				
		</table>
	</div>
	<div>
	    <br /><br />
	    <form action="personal-id.php" method="post" id="employeePersonalIDForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	