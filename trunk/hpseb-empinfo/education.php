<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_education_details SET
		EDUCATION_ESTABLISHMENT_CODE='".$_POST['EDUCATION_ESTABLISHMENT_CODE']."',
		EDUCATION_TRAINING_INSTITUTE= '".$_POST['EDUCATION_TRAINING_INSTITUTE']."',
		EDUCATION_COURSE_LOCATION= '".$_POST['EDUCATION_COURSE_LOCATION']."',
		EDUCATION_COUNTRY_CODE= '".$_POST['EDUCATION_COUNTRY_CODE']."',
		EDUCATION_CERTIFICATE_CODE= '".$_POST['EDUCATION_CERTIFICATE_CODE']."',
		EDUCATION_COURSE_DURATION= '".$_POST['EDUCATION_COURSE_DURATION']."',
		EDUCATION_COURSE_DURATION_UNITS= '".$_POST['EDUCATION_COURSE_DURATION_UNITS']."',
		EDUCATION_COURSE_GRADE= '".$_POST['EDUCATION_COURSE_GRADE']."',
		EDUCATION_COURSE_BRANCH_CODE= '".$_POST['EDUCATION_COURSE_BRANCH_CODE']."',
		EDUCATION_INSTITUTE= '".$_POST['EDUCATION_INSTITUTE']."',
		EDUCATION_BEGIN_DT= '".$_POST['EDUCATION_BEGIN_DT']."',
		EDUCATION_END_DT= '".$_POST['EDUCATION_END_DT']."',
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
		$beginDT = $_POST['EDUCATION_BEGIN_DT'];
		$endDT = $_POST['EDUCATION_END_DT'];
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

		$db->query("INSERT INTO employee_education_details
		(  EMPLOYEE_ROW_ID, EDUCATION_ESTABLISHMENT_CODE,EDUCATION_TRAINING_INSTITUTE,EDUCATION_COURSE_LOCATION,EDUCATION_COUNTRY_CODE,EDUCATION_CERTIFICATE_CODE,EDUCATION_COURSE_DURATION, EDUCATION_COURSE_DURATION_UNITS, EDUCATION_COURSE_GRADE,  EDUCATION_COURSE_BRANCH_CODE,  EDUCATION_INSTITUTE, EDUCATION_BEGIN_DT, EDUCATION_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['EDUCATION_ESTABLISHMENT_CODE']."', '".$_POST['EDUCATION_TRAINING_INSTITUTE']."', '".$_POST['EDUCATION_COURSE_LOCATION']."', '".$_POST['EDUCATION_COUNTRY_CODE']."', '".$_POST['EDUCATION_CERTIFICATE_CODE']."', '".$_POST['EDUCATION_COURSE_DURATION']."', '".$_POST['EDUCATION_COURSE_DURATION_UNITS']."',
		 '".$_POST['EDUCATION_COURSE_GRADE']."', '".$_POST['EDUCATION_COURSE_BRANCH_CODE']."', '".$_POST['EDUCATION_INSTITUTE']."', '".$_POST['EDUCATION_BEGIN_DT']."','".$_POST['EDUCATION_END_DT']."', '1','".$_POST['created_by']."')");		
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
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_education_details SET
			STATUS= '1',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="1";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_education_details SET
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
		$db->query("UPDATE employee_education_details SET
			STATUS= '-1',
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
<h2>Employee Education Information</h2>
<form action="education.php" method="post" id="employeeEducationForm">
	<ul>
        <li>
           <label for="EDUCATION_ESTABLISHMENT_CODE">EDUCATION ESTABLISHMENT CODE:</label>
          <select id="EDUCATION_ESTABLISHMENT_CODE" name="EDUCATION_ESTABLISHMENT_CODE" onchange="loadCertificates(this);loadBranch(this);"  data-required="true" data-error-message="Education code is required">
				<option value=''>Select</option>
				 <?php 
				  $eductionCodes = $db->get_results("SELECT QUALIFICATION_LEVEL, QUALIFICATION_DESC FROM m_employee_education_establishment WHERE STATUS='1' GROUP BY QUALIFICATION_LEVEL"  ,ARRAY_A);
			
			       foreach ( $eductionCodes as $eductionCode )
						            {
						            	echo ("<option value='".$eductionCode['QUALIFICATION_LEVEL']."'>".$eductionCode['QUALIFICATION_DESC']."</option>");
						            	
						            }
				 ?>
		  </select>            
        </li>
        <li>
        	<label for="EDUCATION_TRAINING_INSTITUTE">EDUCATION TRAINING INSTITUTE:</label>
            <input type="text"
            size="80"
            id="EDUCATION_TRAINING_INSTITUTE" name="EDUCATION_TRAINING_INSTITUTE"
            data-validation-help="Please enter education training institute" 
            data-validation="required" 
            data-validation-error-msg="Education training institute is required"/>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_LOCATION">EDUCATION COURSE LOCATION:</label>
            <input type="text"
            size="80"
            id="EDUCATION_COURSE_LOCATION" name="EDUCATION_COURSE_LOCATION"
            data-validation-help="Please enter education course location" 
            data-validation="required" 
            data-validation-error-msg="Education course location is required"/>
        </li>
		<li>
        	<label for="EDUCATION_COUNTRY_CODE">EDUCATION COUNTRY CODE:</label>
			<?php echo($common->getEducationCountryCodeList("")); ?>         
        </li>
		<li>
        	<label for="EDUCATION_CERTIFICATE_CODE">EDUCATION CERTIFICATE CODE:</label>
       		<select id="EDUCATION_CERTIFICATE_CODE" name="EDUCATION_CERTIFICATE_CODE" />
       		<option value=''>Select</option>
            </select>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_DURATION">EDUCATION COURSE DURATION:</label>
            <input type="text"
            size="4"
            id="EDUCATION_COURSE_DURATION" name="EDUCATION_COURSE_DURATION"
            data-validation-help="Please enter education course duration" 
            data-validation="required" 
            data-validation-error-msg="Education course duration required"/>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_DURATION_UNITS">EDUCATION COURSE DURATION UNITS:</label>
            <?php echo($common->getEducationUnitCodeList("")); ?>
        </li>
        <li>
            <label for="EDUCATION_COURSE_GRADE">EDUCATION COURSE GRADE:</label>
            <input type="text"
            size="10" 
            id="EDUCATION_COURSE_GRADE" name="EDUCATION_COURSE_GRADE"
            data-validation-help="Please enter education course grade" 
            data-validation="required" 
            data-validation-error-msg="Education course grade is required"/>
        </li>
        <li>
        	<label for="EDUCATION_COURSE_BRANCH_CODE">EDUCATION COURSE BRANCH CODE:</label>
            <select id="EDUCATION_COURSE_BRANCH_CODE" name="EDUCATION_COURSE_BRANCH_CODE" />
       		<option value=''>Select</option>
            </select>
        </li>
		<li>
        	<label for="EDUCATION_INSTITUTE">EDUCATION INSTITUTE:</label>
            <input type="text"
            size="80" id="EDUCATION_INSTITUTE" name="EDUCATION_INSTITUTE"
            data-validation-help="Please enter education institute" 
            data-validation-error-msg="Education institute is required"/>
        </li>
		<li>
        	<label for="EDUCATION_BEGIN_DT">EDUCATION BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_BEGIN_DT" name="EDUCATION_BEGIN_DT"
            data-validation-help="Please enter eduction begin date" 
            data-validation-error-msg="Education begin date is required"/>
		</li>
			<li>
        	<label for="EDUCATION_END_DT">EDUCATION END DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_END_DT" name="EDUCATION_END_DT"
            data-validation-help="Please enter education end date" 
            data-validation-error-msg="Education end date is required"/>
		</li>
	</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Save">Save</button>
			<button type="reset" class="right">Reset</button>
			<input name="created_by" type="hidden" id="created_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="rowid" type="hidden" value="<?php echo($_POST['rowid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
</article>
<footer>

</footer>

<script>

	//date control script
	$(function() {
			$( "#EDUCATION_BEGIN_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
	
	$(function() {
			$( "#EDUCATION_END_DT" ).datepicker(
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

		$education = $db->get_row("SELECT * FROM employee_education_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Education Information</h2>
<form action="education.php" method="post" id="employeeEducationForm">
	<ul>
        <li>
           <label for="EDUCATION_ESTABLISHMENT_CODE">EDUCATION ESTABLISHMENT CODE:</label>
			<?php 
			$eductionCodeRow = $db->get_row("SELECT QUALIFICATION_DESC FROM m_employee_education_establishment ede, employee_education_details eed  WHERE  eed.ROW_ID='".$_POST['rowid']."' and eed.EDUCATION_ESTABLISHMENT_CODE=ede.QUALIFICATION_LEVEL " ,ARRAY_A);
			?>           
            <select id="EDUCATION_ESTABLISHMENT_CODE" name="EDUCATION_ESTABLISHMENT_CODE"
            onchange="loadCertificates(this);loadBranch(this);"  
            data-required="true" 
            data-error-message="Group code is required">
            <option value=''><?php echo($eductionCodeRow['QUALIFICATION_DESC']); ?></option>
				 <?php 
				  $eductionCodes = $db->get_results("SELECT QUALIFICATION_LEVEL, QUALIFICATION_DESC FROM m_employee_education_establishment WHERE STATUS='1' GROUP BY QUALIFICATION_LEVEL"  ,ARRAY_A);
			
			       foreach ( $eductionCodes as $eductionCode )
						            {
						            	echo ("<option value='".$eductionCode['QUALIFICATION_LEVEL']."'>".$eductionCode['QUALIFICATION_DESC']."</option>");
						            	
						            }
				 ?>
		   </select>   
		</li>
        <li>
        	<label for="EDUCATION_TRAINING_INSTITUTE">EDUCATION TRAINING INSTITUTE:</label>
            <input type="text"
            size="80"
            id="EDUCATION_TRAINING_INSTITUTE" name="EDUCATION_TRAINING_INSTITUTE"
            value="<?php echo($education['EDUCATION_TRAINING_INSTITUTE']);?>"
            data-validation-help="Please enter education training institute" 
            data-validation="required" 
            data-validation-error-msg="Education training institute is required"/>
         </li>
		<li>
        	<label for="EDUCATION_COURSE_LOCATION">EDUCATION COURSE LOCATION:</label>
            <input type="text"
            size="80"
            id="EDUCATION_COURSE_LOCATION" name="EDUCATION_COURSE_LOCATION"
            value="<?php echo($education['EDUCATION_COURSE_LOCATION']);?>"
            data-validation-help="Please enter education course location" 
            data-validation="required" 
            data-validation-error-msg="Education course location is required"/>
        </li>
		<li>
        	<label for="EDUCATION_COUNTRY_CODE">EDUCATION COUNTRY CODE:</label>
           <?php echo($common->getEducationCountryCodeList($education['EDUCATION_COUNTRY_CODE'])); ?>
        </li>
        <li>
		 	<label for="EDUCATION_CERTIFICATE_CODE">EDUCATION CERTIFICATE CODE</label>
		 	<select id="EDUCATION_CERTIFICATE_CODE" name="EDUCATION_CERTIFICATE_CODE"  />
           	<?php $eductionCertificateRow = $db->get_row("SELECT CERTIFICATE_DESC FROM m_employee_education_certificate edb, employee_education_details eed  WHERE  eed.ROW_ID='".$_POST['rowid']."' and eed.EDUCATION_CERTIFICATE_CODE=edb.CERTIFICATE_CODE " ,ARRAY_A); ?>
		 	<option value=''><?php echo($eductionCertificateRow['CERTIFICATE_DESC']); ?></option>
            </select>
        </li>    
		<li>
        	<label for="EDUCATION_COURSE_DURATION">EDUCATION COURSE DURATION:</label>
            <input type="text"
            size="4"
            id="EDUCATION_COURSE_DURATION" name="EDUCATION_COURSE_DURATION"
            value="<?php echo($education['EDUCATION_COURSE_LOCATION']);?>"
            data-validation-help="Please enter education course duration" 
            data-validation="required" 
            data-validation-error-msg="Education course duration required"/>
        </li>
		<li>
        	<label for="EDUCATION_COURSE_DURATION_UNITS">EDUCATION COURSE DURATION UNITS:</label>
           <?php echo($common->getEducationUnitCodeList($education['EDUCATION_COURSE_DURATION_UNITS'])); ?>
        </li>
        <li>
            <label for="EDUCATION_COURSE_GRADE">EDUCATION COURSE GRADE:</label>
            <input type="text"
            size="10" 
            id="EDUCATION_COURSE_GRADE" name="EDUCATION_COURSE_GRADE"
            value="<?php echo($education['EDUCATION_COURSE_LOCATION']);?>"
            data-validation-help="Please enter education course grade" 
            data-validation-error-msg="Education course grade is required"/>
        </li>
        <li>
        	<label for="EDUCATION_COURSE_BRANCH_CODE">EDUCATION COURSE BRANCH CODE:</label>
           	<select id="EDUCATION_COURSE_BRANCH_CODE" name="EDUCATION_COURSE_BRANCH_CODE" />
           	<?php $eductionBranchRow = $db->get_row("SELECT BRANCH_DESCRIPTION FROM m_employee_education_branch edb, employee_education_details eed  WHERE  eed.ROW_ID='".$_POST['rowid']."' and eed.EDUCATION_COURSE_BRANCH_CODE=edb.BRANCH_CODE " ,ARRAY_A); ?>
		 	<option value=''><?php echo($eductionBranchRow['BRANCH_DESCRIPTION']);?></option>
            </select>
        </li>
		<li>
        	<label for="EDUCATION_INSTITUTE">EDUCATION INSTITUTE:</label>
            <input id="EDUCATION_INSTITUTE" name="EDUCATION_INSTITUTE"
            value="<?php echo($education['EDUCATION_INSTITUTE']);?>"
            data-validation-help="Please enter education institute" 
            data-validation-error-msg="Education institute is required"/>
        </li>
		<li>
        	<label for="EDUCATION_BEGIN_DT">EDUCATION BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_BEGIN_DT" name="EDUCATION_BEGIN_DT"
            value="<?php echo($education['EDUCATION_BEGIN_DT']);?>"
            data-validation-help="Please enter eduction begin date" 
            data-validation-error-msg="Education begin date is required"/>
		</li>
			<li>
        	<label for="EDUCATION_END_DT">EDUCATION END DT:</label>
            <input type="text" 
            size="10" 
            id="EDUCATION_END_DT" name="EDUCATION_END_DT"
            value="<?php echo($education['EDUCATION_END_DT']);?>"
            data-validation-help="Please enter education end date" 
            data-validation-error-msg="Education end date is required"/>
		</li>
	</ul>
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($education['ROW_ID']);?>" />
			<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
</article>		

<script>

	//date control script
	$(function() {
			$( "#EDUCATION_BEGIN_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
	
	$(function() {
			$( "#EDUCATION_END_DT" ).datepicker(
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
	}else
	{
?>
	<div class="CSSTableGenerator" >
	<table>
			<tr>
				<td>Education Establishment</td> <td>Educaiton Institute</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 					//$employees_address = $db->get_results("SELECT * FROM e.EMP_FIRST_NAME,e.EMP_LAST_NAME, e.ROW_ID, ead.*  FROM employee e, employee_education_details ead
 					 //WHERE ead.EMPLOYEE_ROW_ID = '".$_POST['rowid']."' ORDER BY e.EMP_FIRST_NAME, e.EMP_LAST_NAME"  ,ARRAY_A);
					
					$employee_educations = $db->get_results("SELECT * FROM employee_education_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_educations as $employee_education )
		           	{
		         		echo("<td>".$employee_education['EDUCATION_ESTABLISHMENT_CODE'] ."</td> <td>".$employee_education['EDUCATION_TRAINING_INSTITUTE']."</td> <td>".$employee_education['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="education.php" method="post" id="employeeEducationForm_<?php echo($employee_education['ROW_ID']);?>" name="employeeEducationForm_<?php echo($employee_education['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_education['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_education['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_education['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_education['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_education['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_education['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="education.php" method="post" id="employeeEducationForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	