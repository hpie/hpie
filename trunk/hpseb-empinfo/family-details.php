<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_family_details SET
		FAMILY_RELATION_CODE='".$_POST['FAMILY_RELATION_CODE']."',
		FAMILY_FIRST_NAME= '".$_POST['FAMILY_FIRST_NAME']."',
		FAMILY_LAST_NAME= '".$_POST['FAMILY_LAST_NAME']."',
		FAMILY_NICK_NAME= '".$_POST['FAMILY_NICK_NAME']."',
		FAMILY_NAME_INITIALS= '".$_POST['FAMILY_NAME_INITIALS']."',
		FAMILY_GENDER= '".$_POST['FAMILY_GENDER']."',
		FAMILY_BIRTH_DT= '".$_POST['FAMILY_BIRTH_DT']."',
		FAMILY_BIRTHPLACE= '".$_POST['FAMILY_BIRTHPLACE']."',
		FAMILY_BIRTH_COUNTRY= '".$_POST['FAMILY_BIRTH_COUNTRY']."',
		FAMILY_NATIONALITY= '".$_POST['FAMILY_NATIONALITY']."',
		FAMILY_COMMON_ORGANAZATION= '".$_POST['FAMILY_COMMON_ORGANAZATION']."',
		FAMILY_ID_TYPE= '".$_POST['FAMILY_ID_TYPE']."',
		FAMILY_ID_NUMBER= '".$_POST['FAMILY_ID_NUMBER']."',
		FAMILY_BEGIN_DT= '".$_POST['FAMILY_BEGIN_DT']."',
		FAMILY_END_DT= '".$_POST['FAMILY_END_DT']."',
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
		$beginDT = $_POST['FAMILY_BEGIN_DT'];
		$endDT = $_POST['FAMILY_END_DT'];
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
		
		
		$db->query("INSERT INTO employee_family_details
		(  EMPLOYEE_ROW_ID, FAMILY_RELATION_CODE,FAMILY_FIRST_NAME,FAMILY_LAST_NAME,FAMILY_NICK_NAME,FAMILY_NAME_INITIALS,FAMILY_GENDER, FAMILY_BIRTH_DT, FAMILY_BIRTHPLACE, FAMILY_BIRTH_COUNTRY, FAMILY_NATIONALITY, FAMILY_COMMON_ORGANAZATION,FAMILY_ID_TYPE, FAMILY_ID_NUMBER, FAMILY_ORGANAZATION_ADDRESS, FAMILY_BEGIN_DT , FAMILY_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['FAMILY_RELATION_CODE']."', '".$_POST['FAMILY_FIRST_NAME']."', '".$_POST['FAMILY_LAST_NAME']."', '".$_POST['FAMILY_NICK_NAME']."', '".$_POST['FAMILY_NAME_INITIALS']."', '".$_POST['FAMILY_GENDER']."', '".$_POST['FAMILY_BIRTH_DT']."',
		 '".$_POST['FAMILY_BIRTHPLACE']."', '".$_POST['FAMILY_BIRTH_COUNTRY']."', '".$_POST['FAMILY_NATIONALITY']."', '".$_POST['FAMILY_COMMON_ORGANAZATION']."', '".$_POST['FAMILY_ID_TYPE']."', '".$_POST['FAMILY_ID_NUMBER']."', '".$_POST['FAMILY_ORGANAZATION_ADDRESS']."', '".$beginDT."', '".$endDT."', '1','".$_POST['created_by']."')");		
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
			$db->query("UPDATE employee_family_details SET
			STATUS= '1',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="1";
		}else if($_POST['status_cd'] =="1")
		{
			$db->query("UPDATE employee_family_details SET
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
		$db->query("UPDATE employee_family_details SET
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
<h2>Employee Family Details Information</h2>
<form action="family-details.php" method="post" id="employeeFamilyDetailsForm">
	<ul>
        <li>
            <label for="FAMILY_RELATION_CODE">FAMILY RELATION CODE:</label>
            <?php echo($common->getFamilyMemberCode("")); ?>
        </li>
        <li>
        	<label for="FAMILY_FIRST_NAME">FAMILY FIRST NAME:</label>
            <input type="text" 
            size="40" 
            id="FAMILY_FIRST_NAME" name="FAMILY_FIRST_NAME"
            data-validation-help="Please family member frst name" 
            data-validation-error-msg="Family member first name is required"/>
        </li>
		<li>
        	<label for="FAMILY_LAST_NAME">FAMILY LAST NAME:</label>
            <input type="text" 
            size="40" id="FAMILY_LAST_NAME" name="FAMILY_LAST_NAME"
            data-validation-help="Please enter family member last name" 
            data-validation="required" 
            data-validation-error-msg="Family member last name is required"/>
        </li>
		<li>
        	<label for="FAMILY_NICK_NAME">FAMILY NICK NAME:</label>
            <input type="text" 
            size="40" 
            id="FAMILY_NICK_NAME"  name="FAMILY_NICK_NAME"
            data-validation-help="Please enter family member nick name" 
            data-validation-error-msg="Family member nick name is required"/>
        </li>
		<li>
        	<label for="FAMILY_NAME_INITIALS">FAMILY NAME INITIALS:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_NAME_INITIALS" name="FAMILY_NAME_INITIALS"
            data-validation-help="Please enter family member name initials" 
            data-validation="required" 
            data-validation-error-msg="Family member name initials is required"/>
        </li>
		<li>
        	<label for="FAMILY_GENDER">FAMILY GENDER:</label>
            <input type="text" 
            size="40" 
            id="FAMILY_GENDER" name="FAMILY_GENDER"
            data-validation-help="Please enter family member gender" 
            data-validation="required" 
            data-validation-error-msg="Family member gender is required"/>
        </li>
		<li>
        	<label for="FAMILY_BIRTH_DT">FAMILY BIRTH DT:</label>
            <input type="text" 
            size="40" 
            id="FAMILY_BIRTH_DT" name="FAMILY_BIRTH_DT"
            data-validation-help="Please enter family member birth date" 
            data-validation="required" 
            data-validation-error-msg="Family member birth date is required"/>
		</li>
        <li>
            <label for="FAMILY_BIRTHPLACE">FAMILY BIRTHPLACE:</label>
           <input type="text" 
            size="40" 
            id="FAMILY_BIRTH_DT" name="FAMILY_BIRTH_DT"
            data-validation-help="Please enter family member birth date" 
            data-validation="required" 
            data-validation-error-msg="Family member birth date is required"/>
        </li>
		<li>
        	<label for="FAMILY_BIRTH_COUNTRY">FAMILY BIRTH COUNTRY:</label>
           <input type="text" 
            size="40" 
            id="FAMILY_BIRTH_DT" name="FAMILY_BIRTH_DT"
            data-validation-help="Please enter family member birth country" 
            data-validation="required" 
            data-validation-error-msg="Family member birth country is required"/>
        </li>    
        <li>
        	<label for="FAMILY_NATIONALITY">FAMILY NATIONALITY:</label>
            <input type="text" 
            size="14" 
            id="FAMILY_NATIONALITY" name="FAMILY_NATIONALITY"
            data-validation-help="Please enter family member nationality" 
            data-validation-error-msg="Telephone Number is required"/>
		</li>
		<li>
        	<label for="FAMILY_COMMON_ORGANAZATION">SPOUSE COMMON ORGANAZATION:</label>
            	<input type="radio" name="FAMILY_COMMON_ORGANAZATION" value="Y" onclick="yesnoCheck(this)"/>YES
            	<input type="radio" name="FAMILY_COMMON_ORGANAZATION" value="N" onclick="yesnoCheck(this)"/>NO
		</li>
		<li id="FAMILY_ID_TYPE_ROW" style="display:none;">
        	<label for="FAMILY_ID_TYPE">SPOUSE ID TYPE:</label>
            <?php echo($common->getFamilyIDType("")); ?>
		</li>
		<li  id="FAMILY_ID_NUMBER_ROW" style="display:none;" >
        	<label for="FAMILY_ID_NUMBER">SPOUSE ID NUMBER:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_ID_NUMBER" name="FAMILY_ID_NUMBER"
            data-validation-help="Please enter spouse ID nubmer" 
            data-validation-error-msg="Spouse ID number is required"/>
		</li>
		<li>
        	<label for="FAMILY_ORGANAZATION_ADDRESS">FAMILY ORGANAZATION ADDRESS:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_ORGANAZATION_ADDRESS" name="FAMILY_ORGANAZATION_ADDRESS"
            data-validation-help="Please enter spouse organization address" 
            data-validation-error-msg="Spouse organization address is required"/>
		</li>
		<li>
        	<label for="FAMILY_BEGIN_DT">FAMILY BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_BEGIN_DT" name="FAMILY_BEGIN_DT"
            data-validation-help="Please enter start date" 
            data-validation-error-msg="Start date is required"/>
		</li>
		<li>
        	<label for="FAMILY_END_DT">FAMILY END DT:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_END_DT" name="FAMILY_END_DT"
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
			$( "#FAMILY_BIRTH_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
	
	$(function() {
			$( "#FAMILY_BEGIN_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
	
	$(function() {
			$( "#FAMILY_END_DT" ).datepicker(
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

		$familyDetails = $db->get_row("SELECT * FROM employee_family_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Family Details Information</h2>
<form action="family-details.php" method="post" id="employeeFamilyDetailsForm">
	<ul>
          <li>
            <label for="FAMILY_RELATION_CODE">FAMILY RELATION CODE:</label>
            <?php echo($common->getFamilyMemberCode("FAMILY_RELATION_CODE")); ?>
        </li>
        <li>
        	<label for="FAMILY_FIRST_NAME">FAMILY FIRST NAME:</label>
            <input type="text" 
            size="40" 
            id="FAMILY_FIRST_NAME" name="FAMILY_FIRST_NAME"
            data-validation-help="Please family member frst name"
            data-validation="required" 
            data-validation-error-msg="Family member first name is required"/>
            value="<?php echo($familyDetails['FAMILY_FIRST_NAME']); ?>"
        </li>
		<li>
        	<label for="FAMILY_LAST_NAME">FAMILY LAST NAME:</label>
            <input type="text" 
            size="40" id="FAMILY_LAST_NAME" name="FAMILY_LAST_NAME"
            data-validation-help="Please enter family member last name" 
            data-validation="required" 
            data-validation-error-msg="Family member last name is required"/>
            value="<?php echo($familyDetails['FAMILY_LAST_NAME']); ?>"
        </li>
		<li>
        	<label for="FAMILY_NICK_NAME">FAMILY NICK NAME:</label>
            <input type="text" 
            size="40" 
            id="FAMILY_NICK_NAME"  name="FAMILY_NICK_NAME"
            data-validation-help="Please enter family member nick name" 
            data-validation-error-msg="Family member nick name is required"/>
            value="<?php echo($familyDetails['FAMILY_NICK_NAME']); ?>"
        </li>
		<li>
        	<label for="FAMILY_NAME_INITIALS">FAMILY NAME INITIALS:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_NAME_INITIALS" name="FAMILY_NAME_INITIALS"
            data-validation-help="Please enter family member name initials" 
            data-validation-error-msg="Family member name initials is required"/>
            value="<?php echo($familyDetails['FAMILY_NAME_INITIALS']); ?>"
        </li>
		<li>
        	<label for="FAMILY_GENDER">FAMILY GENDER:</label>
            <?php echo($common->getGenderFamilyMemberList($familyDetails['FAMILY_GENDER'])); ?>
        </li>
		<li>
        	<label for="FAMILY_BIRTH_DT">FAMILY BIRTH DT:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_BIRTH_DT" name="FAMILY_BIRTH_DT"
            data-validation-help="Please enter family member birth date" 
            data-validation="required" 
            data-validation-error-msg="Family member birth date is required"/>
            value="<?php echo($familyDetails['FAMILY_BIRTH_DT']); ?>"
		</li>
        <li>
            <label for="FAMILY_BIRTHPLACE">FAMILY BIRTHPLACE:</label>
           <input type="text" 
            size="40" 
            id="FAMILY_BIRTH_DT" name="FAMILY_BIRTH_DT"
            data-validation-help="Please enter family member birth date" 
            data-validation="required" 
            data-validation-error-msg="Family member birth date is required"/>
            value="<?php echo($familyDetails['FAMILY_BIRTHPLACE']); ?>"
        </li>
		<li>
        	<label for="FAMILY_BIRTH_COUNTRY">FAMILY BIRTH COUNTRY:</label>
           <?php echo($common->getFamilyMemberCountryCodeList($familyDetails['FAMILY_BIRTH_COUNTRY'])); ?>
        </li>    
        <li>
        	<label for="FAMILY_NATIONALITY">FAMILY NATIONALITY:</label>
            <input type="text" 
            size="14" 
            id="FAMILY_NATIONALITY" name="FAMILY_NATIONALITY"
            data-validation-help="Please enter family member nationality" 
            data-validation-error-msg="Telephone Number is required"/>
            value="<?php echo($familyDetails['FAMILY_NATIONALITY']); ?>"
		</li>
		<li>
			<?php if($familyDetails['FAMILY_COMMON_ORGANAZATION'] == 'Y') 
				{
			?>	
				 	<input type="radio" name="FAMILY_COMMON_ORGANAZATION" value="Y"  onclick="yesnoCheck(this)" checked/>YES
            		<input type="radio" name="FAMILY_COMMON_ORGANAZATION" value="N"  onclick="yesnoCheck(this)"/>NO
            <?php 
				} else if($familyDetails['FAMILY_COMMON_ORGANAZATION'] == 'N') 
				{
			?>	
				 	<input type="radio" name="FAMILY_COMMON_ORGANAZATION" value="Y"  onclick="yesnoCheck(this)"/>YES
            		<input type="radio" name="FAMILY_COMMON_ORGANAZATION" value="N"  onclick="yesnoCheck(this)" checked/>NO
            <?php 
				}
			?>
		</li>
		<li>
		   	<label for="FAMILY_ID_TYPE">SPOUSE ID TYPE:</label>
            <?php echo($common->getFamilyIDType($familyDetails['FAMILY_ID_TYPE'])); ?>
		</li>
		<li>
        	<label for="FAMILY_ID_NUMBER">SPOUSE ID NUMBER:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_ID_NUMBER" name="FAMILY_ID_NUMBER"
            data-validation-help="Please enter spouse common organization" 
            data-validation-error-msg="Spouse common organization is required"/>
            value="<?php echo($familyDetails['FAMILY_ID_NUMBER']); ?>"
		</li>
		<li>
        	<label for="FAMILY_ORGANAZATION_ADDRESS">FAMILY ORGANAZATION ADDRESS:</label>
            <input type="text" 
            size="60" 
            id="FAMILY_ORGANAZATION_ADDRESS" name="FAMILY_ORGANAZATION_ADDRESS"
            data-validation-help="Please enter spouse organization address" 
            data-validation-error-msg="Spouse organization address is required"/>
            value="<?php echo($familyDetails['FAMILY_ORGANAZATION_ADDRESS']); ?>"
		</li>
		<li>
        	<label for="FAMILY_BEGIN_DT">FAMILY BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_BEGIN_DT" name="FAMILY_BEGIN_DT"
            data-validation-help="Please enter start date" 
            data-validation-error-msg="Start date is required"/>
            value="<?php echo($familyDetails['FAMILY_BEGIN_DT']); ?>"
		</li>
		<li>
        	<label for="FAMILY_END_DT">FAMILY END DT:</label>
            <input type="text" 
            size="10" 
            id="FAMILY_END_DT" name="FAMILY_END_DT"
            data-validation-help="Please enter end date" 
            data-validation-error-msg="End date is required"/>
            value="<?php echo($familyDetails['FAMILY_END_DT']); ?>"
		</li>
	</ul>	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="submit" class="right" name="action" value="Cancel">Cancel</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($familyDetails['ROW_ID']);?>" />
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
	  		$( "#FAMILY_BIRTH_DT" ).datepicker(
	                 	{ dateFormat: 'yy-mm-dd', 
		                   showAnim: 'slide' 
		                });
		  });

		$(function() {
	  		$( "#FAMILY_BEGIN_DT" ).datepicker(
	                 	{ dateFormat: 'yy-mm-dd', 
		                   showAnim: 'slide' 
		                });
		  });
		  
		$(function() {
	  		$( "#FAMILY_END_DT" ).datepicker(
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
				<td>Relation Code</td> <td>First Name</td> <td>Last Name</td> <td>Start Date</td> <td>End Date</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					
					$employee_family_details = $db->get_results("SELECT * FROM employee_family_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_family_details as $employee_family_detail )
		           	{
		         		echo("<tr><td>".$employee_family_detail['FAMILY_RELATION_CODE'] ."</td> <td>".$employee_family_detail['FAMILY_LAST_NAME']."</td> <td>".$employee_family_detail['FAMILY_NICK_NAME']."</td> <td>".$employee_family_detail['FAMILY_NICK_NAME']."</td>  <td>".$employee_family_detail['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="family-details.php" method="post" id="employeeFamilyDetailsForm_<?php echo($employee_family_detail['ROW_ID']);?>" name="employeeFamilyDetailsForm_<?php echo($employee_family_detail['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_family_detail['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_family_detail['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_family_detail['STATUS']=="1")
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
								<input name="status_cd" type="hidden" value="<?php echo($employee_family_detail['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_family_detail['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_family_detail['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="family-details.php" method="post" id="employeeFamilyDetailsForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	