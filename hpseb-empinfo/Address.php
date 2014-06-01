<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_address_details SET
		ADDRESS_TYPE_CODE='".$_POST['ADDRESS_TYPE_CODE']."',
		ADDRESS_CARE_OF= '".$_POST['ADDRESS_CARE_OF']."',
		ADDRESS_LINE_1= '".$_POST['ADDRESS_LINE_1']."',
		ADDRESS_LINE_2= '".$_POST['ADDRESS_LINE_2']."',
		ADDRESS_POSTAL_CODE= '".$_POST['ADDRESS_POSTAL_CODE']."',
		ADDRESS_CITY= '".$_POST['ADDRESS_CITY']."',
		ADDRESS_DISTRICT= '".$_POST['ADDRESS_DISTRICT']."',
		ADDRESS_REGION_CODE= '".$_POST['ADDRESS_REGION_CODE']."',
		ADDRESS_COUNTRY_CODE= '".$_POST['ADDRESS_COUNTRY_CODE']."',
		ADDRESS_PHONE_NO= '".$_POST['ADDRESS_PHONE_NO']."',
		ADDRESS_BEGIN_DT= '".$_POST['ADDRESS_BEGIN_DT']."',
		ADDRESS_END_DT= '".$_POST['ADDRESS_END_DT']."',
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
		$db->query("INSERT INTO employee_address_details
		(  EMPLOYEE_ROW_ID, ADDRESS_TYPE_CODE,ADDRESS_CARE_OF,ADDRESS_LINE_1,ADDRESS_LINE_2,ADDRESS_POSTAL_CODE,ADDRESS_CITY, ADDRESS_DISTRICT, ADDRESS_REGION_CODE, ADDRESS_COUNTRY_CODE, ADDRESS_PHONE_NO, ADDRESS_BEGIN_DT, ADDRESS_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['ADDRESS_TYPE_CODE']."', '".$_POST['ADDRESS_CARE_OF']."', '".$_POST['ADDRESS_LINE_1']."', '".$_POST['ADDRESS_LINE_2']."', '".$_POST['ADDRESS_POSTAL_CODE']."', '".$_POST['ADDRESS_CITY']."', '".$_POST['ADDRESS_DISTRICT']."',
		 '".$_POST['ADDRESS_REGION_CODE']."', '".$_POST['ADDRESS_COUNTRY_CODE']."', '".$_POST['ADDRESS_PHONE_NO']."', '".$_POST['ADDRESS_BEGIN_DT']."', '".$_POST['ADDRESS_END_DT']."', '1','".$_POST['created_by']."')");		
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee Address Successfully Created.";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem creating employee address. Please try again.";
			echo($_SESSION['msg']);
		}
		// Removed Header receive-blazes.php
	}else if($action=="Status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_address_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Inactive";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_address_details SET
			STATUS= '".$_POST['status']."',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="Active";
		}
		//$db->debug();
		if($db->rows_affected>0)
		{
			$_SESSION['msg']="Employee address status is now set to ".$status.".";
			echo($_SESSION['msg']);
		}else
		{
			$_SESSION['msg']="Problem updating employee address status. Please try again.";
			echo($_SESSION['msg']);
		}

	}else if($action=="delete")
	{
		$db->query("UPDATE employee_address_details SET
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
<h2>Employee Address Information</h2>
<form action="address.php" method="post" id="employeeAddressForm">
	<ul>
        <li>
            <label for="ADDRESS_TYPE_CODE">ADDRESS TYPE CODE:</label>
           <select id="ADDRESS_TYPE_CODE" name="ADDRESS_TYPE_CODE"
             data-validation-help="Please enter Region code" 
            data-validation="required" 
            data-validation-error-msg="Region code is required"/>
                <option value="1">Permanent Residence</option>
				<option value="3">Present Residence</option>
				<option value="5">Mailing address</option>
				<option value="Z1">Address on Deputation</option>             
            </select>
        </li>
        <li>
        	<label for="ADDRESS_CARE_OF">ADDRESS CARE OF:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_CARE_OF" name="ADDRESS_CARE_OF"
            data-validation-help="Please enter C/O"  
            data-validation-help="Please enter C/O" />
        </li>
		<li>
        	<label for="ADDRESS_LINE_1">ADDRESS LINE 1:</label>
            <input type="text" 
            size="40" id="ADDRESS_LINE_1" name="ADDRESS_LINE_1"
            data-validation-help="Please enter Address line 1"  
            data-validation-help="Please enter Address line 1" />
        </li>
		<li>
        	<label for="ADDRESS_LINE_2">ADDRESS LINE 2:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_LINE_2"  name="ADDRESS_LINE_2"
            data-validation-help="Please enter Address line 2"  
            data-validation-help="Please enter Address line 2"  />
        </li>
		<li>
        	<label for="ADDRESS_POSTAL_CODE">ADDRESS POSTAL CODE:</label>
            <input type="text" 
            size="10" 
            id="ADDRESS_POSTAL_CODE" name="ADDRESS_POSTAL_CODE"
            data-validation-help="Please enter Postal code" 
            data-validation="required" 
            data-validation-error-msg="Postal code is required"/>
        </li>
		<li>
        	<label for="ADDRESS_CITY">ADDRESS CITY:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_CITY" name="ADDRESS_CITY"
            data-validation-help="Please enter City" 
            data-validation="required" 
            data-validation-error-msg="City is required"/>
        </li>
		<li>
        	<label for="ADDRESS_DISTRICT">ADDRESS DISTRICT:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_DISTRICT" name="ADDRESS_DISTRICT"
            data-validation-help="Please enter District" 
            data-validation="required" 
            data-validation-error-msg="District is required"/>
		</li>
        <li>
            <label for="ADDRESS_REGION_CODE">ADDRESS REGION CODE:</label>
            <select id="ADDRESS_REGION_CODE" name="ADDRESS_REGION_CODE"
             data-validation-help="Please enter Region code" 
            data-validation="required" 
            data-validation-error-msg="Region code is required"/>
            <option value="01">Andra Pradesh</option>
			<option value="02">Arunachal Pradesh</option>
			<option value="03">Assam</option>
			<option value="04">Bihar</option>
			<option value="05">Goa</option>
			<option value="06">Gujarat</option>
			<option value="07">Haryana</option>
			<option value="08">Himachal Pradesh</option>
			<option value="09">Jammu und Kashmir</option>
			<option value="10">Karnataka</option>
			<option value="11">Kerala</option>
			<option value="12">Madhya Pradesh</option>
			<option value="13">Maharashtra</option>
			<option value="14">Manipur</option>
			<option value="15">Megalaya</option>
			<option value="16">Mizoram</option>
			<option value="17">Nagaland</option>
			<option value="18">Orissa</option>
			<option value="19">Punjab</option>
			<option value="20">Rajasthan</option>
			<option value="21">Sikkim</option>
			<option value="22">Tamil Nadu</option>
			<option value="23">Tripura</option>
			<option value="24">Uttar Pradesh</option>
			<option value="25">West Bengal</option>
			<option value="26">Andaman und Nico.In.</option>
			<option value="27">Chandigarh</option>
			<option value="28">Dadra und Nagar Hav.</option>
			<option value="29">Daman und Diu</option>
			<option value="30">Delhi</option>
			<option value="31">Lakshadweep</option>
			<option value="32">Pondicherry</option>
			<option value="33">Chhaattisgarh</option>
			<option value="34">Jharkhand</option>
			<option value="35">Uttaranchal</option>  </select>
        </li>
		<li>
        	<label for="ADDRESS_COUNTRY_CODE">ADDRESS COUNTRY CODE:</label>
            <input type="text" 
            size="3" id="ADDRESS_COUNTRY_CODE" name="ADDRESS_COUNTRY_CODE"
            value="IN" 
            data-validation-help="Please enter Country" 
            data-validation-error-msg="Country is required"/>
		</li>
		<li>
        	<label for="ADDRESS_PHONE_NO">ADDRESS PHONE NO:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_PHONE_NO" name="ADDRESS_PHONE_NO"
            data-validation-help="Please enter Telephone#" 
            data-validation-error-msg="Telephone Number is required"/>
		</li>
		<li>
        	<label for="ADDRESS_BEGIN_DT">ADDRESS BEGIN DT:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_BEGIN_NO" name="ADDRESS_BEGIN_DT"
            data-validation-help="Please enter START DATE" 
            data-validation-error-msg="Telephone Number is required"/>
		</li>
		<li>
        	<label for="ADDRESS_END_DT">ADDRESS END DT:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_END_DT" name="ADDRESS_END_DT"
            data-validation-help="Please enter START DATE" 
            data-validation-error-msg="Telephone Number is required"/>
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

		$address = $db->get_row("SELECT * FROM employee_address_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Address Information</h2>
<form action="address.php" method="post" id="employeeAddressForm">
	<ul>
        <li>
            <label for="ADDRESS_TYPE_CODE">ADDRESS TYPE CODE:</label>
            <id="ADDRESS_TYPE_CODE" name="ADDRESS_TYPE_CODE" data-validation-help="Please enter Address type code" 
            data-validation="required" 
            data-validation-error-msg="Address type code is required"/>
            <?php echo($common->getAddressType($address['ADDRESS_TYPE_CODE'])); ?>
        </li>
        <li>
        	<label for="ADDRESS_CARE_OF">ADDRESS CARE OF:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_CARE_OF" name="ADDRESS_CARE_OF" value="<?php echo($address['ADDRESS_CARE_OF']);?>" 
            data-validation-help="Please enter C/O"  
            data-validation-help="Please enter C/O" />
        </li>
		<li>
        	<label for="ADDRESS_LINE_1">ADDRESS LINE 1:</label>
            <input type="text" 
            size="60" id="ADDRESS_LINE_1" name="ADDRESS_LINE_1" value="<?php echo($address['ADDRESS_LINE_1']);?>"
            data-validation-help="Please enter Address line 1"  d
            ata-validation-help="Please enter Address line 1" />
        </li>
		<li>
        	<label for="ADDRESS_LINE_2">ADDRESS LINE 2:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_LINE_2"  name="ADDRESS_LINE_2" value="<?php echo($address['ADDRESS_LINE_2']);?>"
            data-validation-help="Please enter Address line 2"  
            data-validation-help="Please enter Address line 2"  />
        </li>
		<li>
        	<label for="ADDRESS_POSTAL_CODE">ADDRESS POSTAL CODE:</label>
            <input type="text" 
            size="10" 
            id="ADDRESS_POSTAL_CODE" name="ADDRESS_POSTAL_CODE" value="<?php echo($address['ADDRESS_LINE_2']);?>"
            data-validation-help="Please enter Postal code" 
            data-validation="required" 
            data-validation-error-msg="Postal code is required"/>
        </li>
		<li>
        	<label for="ADDRESS_CITY">ADDRESS CITY:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_CITY"  name="ADDRESS_CITY" value="<?php echo($address['ADDRESS_CITY']);?>"
            data-validation-help="Please enter City" 
            data-validation="required" 
            data-validation-error-msg="City is required"/>
        </li>
		<li>
        	<label for="ADDRESS_DISTRICT">ADDRESS DISTRICT:</label>
            <input type="text" 
            size="40" 
            id="ADDRESS_DISTRICT" name="ADDRESS_DISTRICT" value="<?php echo($address['ADDRESS_DISTRICT']);?>"
            data-validation-help="Please enter District" 
            data-validation="required" 
            data-validation-error-msg="District is required"/>
		</li>
        <li>
            <label for="ADDRESS_REGION_CODE">ADDRESS REGION CODE:</label>
             <id="ADDRESS_TYPE_CODE" name="ADDRESS_REGION_CODE"
             data-validation-help="Please enter Region code" 
            data-validation="required" 
            data-validation-error-msg="Region code is required"/>
            <?php echo($common->getRegionList($address['ADDRESS_REGION_CODE'])); ?>
         </li>
		<li>
        	<label for="ADDRESS_COUNTRY_CODE">ADDRESS COUNTRY CODE:</label>
            <input type="text" 
            size="3" id="ADDRESS_COUNTRY_CODE" name="ADDRESS_COUNTRY_CODE" value="<?php echo($address['ADDRESS_COUNTRY_CODE']);?>"
            value="IN" 
            data-validation-help="Please enter Country" 
            data-validation-error-msg="Country is required"/>
		</li>
		<li>
        	<label for="ADDRESS_PHONE_NO">ADDRESS PHONE NO:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_PHONE_NO" name="ADDRESS_PHONE_NO" value="<?php echo($address['ADDRESS_PHONE_NO']);?>"
            data-validation-help="Please enter Telephone#" 
            data-validation-error-msg="Telephone Number is required"/>
		</li>
		<li>
        	<label for="ADDRESS_BEGIN_DT">ADDRESS BEGIN DT:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_BEGIN_NO" name="ADDRESS_BEGIN_DT"
            data-validation-help="Please enter START DATE" 
            data-validation-error-msg="Telephone Number is required"/>
		</li>
		<li>
        	<label for="ADDRESS_END_DT">ADDRESS END DT:</label>
            <input type="text" 
            size="14" 
            id="ADDRESS_END_DT" name="ADDRESS_END_DT"
            data-validation-help="Please enter START DATE" 
            data-validation-error-msg="Telephone Number is required"/>
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
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_address_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_addresses = $db->get_results("SELECT * FROM employee_address_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_addresses as $employee_address )
		           	{
		         		echo("<td>".$employee_address['ADDRESS_TYPE_CODE'] ."</td> <td>".$employee_address['ADDRESS_LINE_1']."</td> <td>".$employee_address['ADDRESS_LINE_2']."</td> <td>".$employee_address['ADDRESS_LINE_2']."</td>  <td>".$employee_address['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="address.php" method="post" id="employeeAddressForm_<?php echo($employee_address['ROW_ID']);?>" name="employeeAddressForm_<?php echo($employee_address['ROW_ID']);?>">
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
	    <form action="address.php" method="post" id="employeeAddressForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	