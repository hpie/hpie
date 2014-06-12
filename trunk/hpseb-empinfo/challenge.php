<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_challenge_details SET
		CHALLENGE_GROUP_CODE='".$_POST['CHALLENGE_GROUP_CODE']."',
		CHALLENGE_GROUP_TYPE= '".$_POST['CHALLENGE_GROUP_TYPE']."',
		DIGREE_OF_CHALLENGE= '".$_POST['DIGREE_OF_CHALLENGE']."',
		CHALLENGE_CREDITED= '".$_POST['CHALLENGE_CREDITED']."',
		CHALLENGE_BEGIN_DT= '".$_POST['CHALLENGE_BEGIN_DT']."',
		CHALLENGE_END_DT= '".$_POST['CHALLENGE_END_DT']."',
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
		$beginDT = $_POST['CHALLENGE_BEGIN_DT'];
		$endDT = $_POST['CHALLENGE_END_DT'];
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
		
		$db->query("INSERT INTO employee_challenge_details
		(  EMPLOYEE_ROW_ID, CHALLENGE_GROUP_CODE,CHALLENGE_GROUP_TYPE,DIGREE_OF_CHALLENGE,CHALLENGE_CREDITED,CHALLENGE_BEGIN_DT,CHALLENGE_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['CHALLENGE_GROUP_CODE']."', '".$_POST['CHALLENGE_GROUP_TYPE']."', '".$_POST['DIGREE_OF_CHALLENGE']."',  '".$_POST['CHALLENGE_CREDITED']."', '".$_POST['CHALLENGE_BEGIN_DT']."', '".$_POST['CHALLENGE_END_DT']."', '1','".$_POST['created_by']."')");		
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
			$db->query("UPDATE employee_challenge_details SET
			STATUS= '1',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="1";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_challenge_details SET
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
		$db->query("UPDATE employee_challenge_details SET
			STATUS= '-1',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE==now()
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
<h2>Employee Challenges Information</h2>
<form action="challenge.php" method="post" id="employeeChallengeForm">
	<ul>
        <li>
            <label for="CHALLENGE_GROUP_CODE">CHALLENGE GROUP CODE:</label>
            <?php echo($common->getChallengeCodeList("")); ?>
        </li>
        <li>
        	<label for="CHALLENGE_GROUP_TYPE">CHALLENGE GROUP TYPE:</label>
             <?php echo($common->getChallengeGroupList("")); ?>
        </li>
		<li>
        	<label for="DIGREE_OF_CHALLENGE">DIGREE OF CHALLENGE:</label>
            <input type="text" 
            size="3" id="DIGREE_OF_CHALLENGE" name="DIGREE_OF_CHALLENGE"
            data-validation-help="Please enter degree challenge" 
            data-validation="required" 
            data-validation-error-msg="Degree of challenge is required"/>
        </li>
		<li>
        	<label for="CHALLENGE_CREDITED">CHALLENGE CREDITED:</label>
            <input type="text" 
            size="3" 
            id="CHALLENGE_CREDITED"  name="CHALLENGE_CREDITED"
            data-validation-help="Please enter challenge credited" 
            data-validation="required" 
            data-validation-error-msg="Challenge credited is required"/>
        </li>
		<li>
        	<label for="CHALLENGE_BEGIN_DT">CHALLENGE BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="CHALLENGE_BEGIN_DT" name="CHALLENGE_BEGIN_DT"
            data-validation-help="Please enter Start date" 
            data-validation-error-msg="Start date is required"/>
		</li>
		<li>
        	<label for="CHALLENGE_END_DT">CHALLENGE END DT:</label>
            <input type="text" 
            size="14" 
            id="CHALLENGE_END_DT" name="CHALLENGE_END_DT"
            data-validation-help="Please enter End date" 
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

	//date control script
	$(function() {
			$( "#CHALLENGE_BEGIN_DT" ).datepicker(
	             	{ dateFormat: 'yy-mm-dd', 
	                   showAnim: 'slide' 
	                });
	  });
	
	$(function() {
			$( "#CHALLENGE_END_DT" ).datepicker(
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

		$challenges = $db->get_row("SELECT * FROM employee_challenge_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Challenges Information</h2>
<form action="challenge.php" method="post" id="employeeChallengeForm">
	<ul>
	<li>
		   <label for="CHALLENGE_GROUP_CODE">CHALLENGE GROUP CODE:</label>
           <?php echo($common->getChallengeCodeList($challenges['CHALLENGE_GROUP_CODE'])); ?>
        </li>
        <li>
        	<label for="CHALLENGE_GROUP_TYPE">CHALLENGE GROUP TYPE:</label>
            <id="CHALLENGE_GROUP_TYPE" name="CHALLENGE_GROUP_TYPE" />
            <?php echo($common->getChallengeGroupList($challenges['CHALLENGE_GROUP_TYPE']));?>
        </li>
		<li>
        	<label for="DIGREE_OF_CHALLENGE">DIGREE OF CHALLENGE:</label>
            <input type="text" 
            size="3" id="DIGREE_OF_CHALLENGE" name="DIGREE_OF_CHALLENGE"
            data-validation-help="Please enter challenge end time" 
            data-validation="required" 
            data-validation-error-msg="Challenge end time is required"/>
            value="<?php echo($challenges['DIGREE_OF_CHALLENGE']);?>"/>
        </li>
		<li>
        	<label for="CHALLENGE_CREDITED">CHALLENGE CREDITED:</label>
            <input type="text" 
            size="3" 
            id="CHALLENGE_CREDITED"  name="CHALLENGE_CREDITED"
            data-validation-help="Please enter challenge hours" 
            data-validation="required" 
            data-validation-error-msg="Challenge hours is required"/>
            value="<?php echo($challenges['CHALLENGE_CREDITED']);?>"/>
        </li>
        <li>
        	<label for="CHALLENGE_BEGIN_DT">CHALLENGE BEGIN DT:</label>
            <input type="text" 
            size="14" 
            id="CHALLENGE_BEGIN_DT" name="CHALLENGE_BEGIN_DT"
            data-validation-help="Please enter Start date" 
            data-validation-error-msg="Start date is required"
            value="<?php echo($challenges['CHALLENGE_BEGIN_DT']);?>"/>
		</li>
		<li>
        	<label for="CHALLENGE_END_DT">CHALLENGE END DT:</label>
            <input type="text" 
            size="14" 
            id="CHALLENGE_END_DT" name="CHALLENGE_END_DT"
            data-validation-help="Please enter End date" 
            data-validation-error-msg="End date is required"
            value="<?php echo($challenges['CHALLENGE_END_DT']);?>"/>
          </li>
		</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($challenges['ROW_ID']);?>" />
			<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</p>
</form>
</article>	

	<script>

	 $.validate({
	   
	 });
	
	 // Restrict presentation length
	 $('#presentation').restrictLength( $('#pres-max-length') );

	// date control script
		$(function() {
	  		$( "#CHALLENGE_BEGIN_DT" ).datepicker(
	                 	{ dateFormat: 'yy-mm-dd', 
		                   showAnim: 'slide' 
		                });
		  });

		$(function() {
	  		$( "#CHALLENGE_END_DT" ).datepicker(
	                 	{ dateFormat: 'yy-mm-dd', 
		                   showAnim: 'slide' 
		                });
		  });
		  
	</script>

	
<?php
	}else
	{
?>
	<div class="CSSTableGenerator" >
	<table>
			<tr>
				<td>Challenge Code</td> <td>Challenge Type</td> <td>Degree of Challenge</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 										
					$employee_challenges = $db->get_results("SELECT * FROM employee_challenge_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_challenges as $employee_challenge )
		           	{
		         		echo("<tr><td>".$employee_challenge['CHALLENGE_GROUP_CODE'] ."</td> <td>".$employee_challenge['CHALLENGE_GROUP_TYPE']."</td> <td>".$employee_challenge['DIGREE_OF_CHALLENGE']."</td> <td>".$employee_challenge['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="challenge.php" method="post" id="employeeChallengeForm_<?php echo($employee_challenge['ROW_ID']);?>" name="employeeChallengeForm_<?php echo($employee_challenge['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_challenge['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_challenge['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_challenge['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_challenge['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_challenge['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_challenge['EMPLOYEE_ROW_ID']);?>" />
								<input name="modified_by" type="hidden" id="modified_by" value="<?php echo($_SESSION['userid'])?>" />
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
	    <form action="challenge.php" method="post" id="employeeChallengeForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	