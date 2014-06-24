<?php
session_start();
//include config
include "config.php";

if(isset($_POST['submitted']))
{
	if($action=="update")
	{
		$db->query("UPDATE employee_actions_details SET
		ACTION_CODE='".$_POST['ACTION_CODE']."',
		ACTION_REASON_CODE= '".$_POST['ACTION_REASON_CODE']."',
		ACTION_HISTORY_OTHERS= '".$_POST['ACTION_HISTORY_OTHERS']."',
		ACTION_POSITION= '".$_POST['ACTION_POSITION']."',
		ACTION_AREA_CODE= '".$_POST['ACTION_AREA_CODE']."',
		ACTION_RESULT_GROUP_CODE= '".$_POST['ACTION_RESULT_GROUP_CODE']."',
		ACTION_RESULT_SUBGROUP_CODE= '".$_POST['ACTION_RESULT_SUBGROUP_CODE']."',
		ACTION_SUBAREA_CODE= '".$_POST['ACTION_SUBAREA_CODE']."',
		ACTION_PAYROLL_AREA_CODE= '".$_POST['ACTION_PAYROLL_AREA_CODE']."',
		ACTION_BASIC_PAY= '".$_POST['ACTION_BASIC_PAY']."',
		ACTION_REMARKS= '".$_POST['ACTION_REMARKS']."',
		ACTION_BEGIN_DT= '".$_POST['ACTION_BEGIN_DT']."',
		ACTION_END_DT= '".$_POST['ACTION_END_DT']."',
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
		//Header("Location: receive-blazes.php");
	}else if($action=="save")
	{
		$db->query("INSERT INTO employee_actions_details
		(  EMPLOYEE_ROW_ID, ACTION_CODE,ACTION_REASON_CODE,ACTION_HISTORY_OTHERS,ACTION_POSITION,ACTION_AREA_CODE, ACTION_RESULT_GROUP_CODE, ACTION_RESULT_SUBGROUP_CODE, ACTION_SUBAREA_CODE, ACTION_PAYROLL_AREA_CODE, ACTION_BASIC_PAY, ACTION_REMARKS, ACTION_BEGIN_DT, ACTION_END_DT, STATUS, CREATED_BY) 
		 VALUES ( '".$_POST['empid']."','".$_POST['ACTION_CODE']."', '".$_POST['ACTION_REASON_CODE']."', '".$_POST['ACTION_HISTORY_OTHERS']."', '".$_POST['ACTION_POSITION']."', '".$_POST['ACTION_AREA_CODE']."','".$_POST['ACTION_RESULT_GROUP_CODE']."','".$_POST['ACTION_RESULT_SUBGROUP_CODE']."','".$_POST['ACTION_SUBAREA_CODE']."','".$_POST['ACTION_PAYROLL_AREA_CODE']."', '".$_POST['ACTION_BASIC_PAY']."', '".$_POST['ACTION_REMARKS']."', '".$_POST['ACTION_BEGIN_DT']."', '".$_POST['ACTION_END_DT']."','1','".$_POST['created_by']."')");		
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
		// Removed Header receive-blazes.php
	}else if($action=="Status")
	{
		$status="";
		if($_POST['status'] =="0")
		{
			$db->query("UPDATE employee_actions_details SET
			STATUS= '1',
			MODIFIED_BY= '".$_POST['modified_by']."',
			MODIFIED_DATE=now()
			WHERE ROW_ID='".$_POST['rowid']."'");
			$status="1";
		}else if($_POST['status'] =="1")
		{
			$db->query("UPDATE employee_actions_details SET
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
		$db->query("UPDATE employee_actions_details SET
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
<h2>Employee Historical Action Information</h2>
<form action="history-action.php" method="post" id="employeeHistoryActionForm">
	<ul>
        <li>
            <label for="ACTION_CODE">ACTION CODE:</label>
             <select id="ACTION_CODE" name="ACTION_CODE" data-required="true" data-error-message="Action code is required" onchange=loadActionReasons(this);>
				<option value=''>Select</option>
				 <?php 
				  $historyActionCodes = $db->get_results("SELECT EA_CODE, EA_NAME FROM m_employee_actions WHERE STATUS='1' GROUP BY EA_CODE",ARRAY_A);
			
			       foreach ( $historyActionCodes as $historyActionCode )
						            {
						            	echo ("<option value='".$historyActionCode['EA_CODE']."'>".$historyActionCode['EA_NAME']."</option>");
						            	
						            }
				 ?>
		     </select>		 
		</li>
        <li>
        	<label for="ACTION_REASON_CODE">ACTION REASON CODE:</label>
             <select id="ACTION_REASON_CODE" name="ACTION_REASON_CODE" />
             <option value=''>Select</option>
		     </select>
        </li>
        <li>
        	<label for="ACTION_HISTORY_OTHERS">ACTION HISTORY OTHERS:</label>
            	<input type="radio" name="ACTION_HISTORY_OTHERS" value="HISTORY" onclick="actionHistoryOthers(this)"/>YES
            	<input type="radio" name="ACTION_HISTORY_OTHERS" value="OTHERS" onclick="actionHistoryOthers(this"/>NO
        </li>
       	<li  id="ACTION_POSITION_ROW" style="display:none;" >
        	<label for="ACTION_POSITION">ACTION POSITION:</label>
            <input type="text" 
            size="10" 
            id="ACTION_POSITION" name="ACTION_POSITION"
            data-validation-help="Please enter action position" 
            data-validation-error-msg="Action position is required"/>
		</li>
		<li>
        	<label for="ACTION_AREA_CODE">ACTION AREA CODE:</label>
             <select id="ACTION_AREA_CODE" name="ACTION_AREA_CODE" data-required="true" data-error-message="Action code is required" onchange=loadSubArea(this);>
				<option value=''>Select</option>
				 <?php 
				  $personalAreaCodes = $db->get_results("SELECT PA_CODE, PA_NAME FROM m_personal_area WHERE STATUS='1' GROUP BY PA_CODE"  ,ARRAY_A);
			
			       foreach ( $personalAreaCodes as $personalAreaCode )
						            {
						            	echo ("<option value='".$personalAreaCode['PA_CODE']."'>".$personalAreaCode['PA_NAME']."</option>");
						            	
						            }
				 ?>
		     </select>
        </li>
		<li>
            <label for="ACTION_RESULT_GROUP_CODE">ACTION CODE:</label>
             <select id="ACTION_RESULT_GROUP_CODE" name="ACTION_RESULT_GROUP_CODE" data-required="true" data-error-message="Action code is required" onchange=loadSubGroups(this);>
				<option value=''>Select</option>
				 <?php 
				  $groupCodes = $db->get_results("SELECT EG_CODE, EG_NAME FROM m_employee_group WHERE STATUS='1' GROUP BY EG_CODE"  ,ARRAY_A);
			
			       foreach ( $groupCodes as $groupCode )
						            {
						            	echo ("<option value='".$groupCode['EG_CODE']."'>".$groupCode['EG_NAME']."</option>");
						            	
						            }
				 ?>
		     </select>		 
		</li>
		<li>
        	<label for="ACTION_RESULT_SUBGROUP_CODE">OTHER ACTION PAYROL AREA:</label>
            <select id="ACTION_RESULT_SUBGROUP_CODE" name="ACTION_RESULT_SUBGROUP_CODE" >
            	<option value=''>Select</option>				         
            </select>
		</li>
		<li>
        	<label for="ACTION_RESULT_SUBAREA_CODE">OTHER ACTION PAYROL AREA:</label>
            <select id="ACTION_RESULT_SUBAREA_CODE" name="ACTION_RESULT_SUBAREA_CODE" >
            	<option value=''>Select</option>				         
            </select>
		</li>
		<li  id="ACTION_BASIC_PAY_ROW" style="display:none;" >
        	<label for="ACTION_BASIC_PAY">ACTION_BASIC_PAY:</label>
            <input type="text" 
            size="40" 
            id="ACTION_BASIC_PAY"  name="ACTION_BASIC_PAY"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action begin date is required"/>
        </li>
        <li id="ACTION_REMARKS_ROW" style="display:none;" >
        	<label for="ACTION_REMARKS">ACTION_REMARKS:</label>
            <input type="text" 
            size="255" 
            id="ACTION_REMARKS"  name="ACTION_REMARKS"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action begin date is required"/>
        </li>
        <li  id="ACTION_PAYROLL_AREA_ROW" style="display:none;" >
        	<label for="ACTION_PAYROLL_AREA_CODE">ACTION POSITION:</label>
            <input type="text" 
            size="10" 
            id="ACTION_PAYROLL_AREA_CODE" name="ACTION_PAYROLL_AREA_CODE"
            data-validation-help="Please enter action position" 
            data-validation-error-msg="Action position is required"/>
		</li>
		<li>
        	<label for="ACTION_BEGIN_DT">OTHER ACTION BEGIN DT:</label>
            <input type="text" 
            size="40" 
            id="ACTION_BEGIN_DT"  name="ACTION_BEGIN_DT"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action begin date is required"/>
        </li>
        <li>
        	<label for="ACTION_END_DT">OTHER ACTION END DT:</label>
            <input type="text" 
            size="40" 
            id="ACTION_END_DT"  name="ACTION_END_DT"
            data-validation-help="Please enter action end date" 
            data-validation="required" 
            data-validation-error-msg="Action end date code is required"/>
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

		$historyActionss = $db->get_row("SELECT * FROM employee_actions_details WHERE ROW_ID='".$_POST['rowid']."'"  ,ARRAY_A);
?>

<article>
<h2>Employee Action Information</h2>
<form action="history-action.php" method="post" id="employeeHistoryActionForm">
	<ul>
        <li>
            <label for="ACTION_CODE">ACTION CODE:</label>
             <?php $historyActionCodeRow = $db->get_row("SELECT EA_NAME FROM m_employee_actions  WHERE STATUS='1' AND EA_CODE = '".$historyActionss['ACTION_CODE']."'");?>
             <select id="ACTION_CODE" name="ACTION_CODE" data-required="true" data-error-message="Action code is required" onchange=loadActionReasons(this);>
				<option value=''><?php echo($historyActionCodeRow['EA_NAME']); ?></option>
				 <?php 
				  $eductionCodes = $db->get_results("SELECT EA_CODE, EA_NAME FROM m_employee_actions WHERE STATUS='1' GROUP BY EA_CODE"  ,ARRAY_A);
			
			       foreach ( $historyActionCodes as $historyActionCode )
						            {
						            	echo ("<option value='".$historyActionCode['EA_CODE']."'>".$historyActionCode['EA_NAMEs']."</option>");
						            	
						            }
				 ?>
		     </select>		 
		</li>
        <li>
        	<label for="ACTION_REASON_CODE">ACTION REASON CODE:</label>
             <select id="ACTION_REASON_CODE" name="ACTION_REASON_CODE" />
             <option value=''>Select</option>
		     </select>
        </li>
        <li>
        	<label for="ACTION_HISTORY_OTHERS">ACTION HISTORY OTHERS:</label>
            	<input type="radio" name="ACTION_HISTORY_OTHERS" value="HISTORY" onclick="actionHistoryOthers(this)"/>YES
            	<input type="radio" name="ACTION_HISTORY_OTHERS" value="OTHERS" onclick="actionHistoryOthers(this"/>NO
        </li>
       	<li  id="ACTION_POSITION_ROW" style="display:none;" >
        	<label for="ACTION_POSITION">ACTION POSITION:</label>
            <input type="text" 
            size="10" 
            id="ACTION_POSITION" name="ACTION_POSITION"
            data-validation-help="Please enter action position" 
            data-validation-error-msg="Action position is required"/>
		</li>
		<li>
        	<label for="ACTION_AREA_CODE">ACTION AREA CODE:</label>
             <?php $historyActionAreaRow = $db->get_row("SELECT EAR_NAME FROM m_employee_personal_area  WHERE STATUS='1' AND EAR_CODE = '".$historyActionss['ACTION_AREA_CODE']."'");?>
             <select id="ACTION_AREA_CODE" name="ACTION_AREA_CODE" data-required="true" data-error-message="Action code is required" loadSubArea($historyActionss['ACTION_AREA_CODE'] );>
				<option value=''><?php echo($historyActionAreaRow['$historyActionAreaRow']); ?></option>
				 <?php 
				  $personalAreaCodes = $db->get_results("SELECT PA_CODE, PA_NAME FROM m_personal_area WHERE STATUS='1' GROUP BY PA_CODE"  ,ARRAY_A);
			
			       foreach ( $personalAreaCodes as $personalAreaCode )
						            {
						            	echo ("<option value='".$personalAreaCode['PA_CODE']."'>".$personalAreaCode['PA_NAME']."</option>");
						            	
						            }
				 ?>
		     </select>
        </li>
		<li>
            <label for="ACTION_RESULT_GROUP_CODE">ACTION RESULT GROUP CODE:</label>
             <?php $historyActionGroupRow = $db->get_row("SELECT EG_NAME FROM m_employee_group  WHERE STATUS='1' AND EG_CODE = '".$historyActionss['ACTION_RESULT_GROUP_CODE']."'");?> 
             <select id="ACTION_RESULT_GROUP_CODE" name="ACTION_RESULT_GROUP_CODE" data-required="true" data-error-message="Action code is required" loadSubArea($historyActionss['ACTION_RESULT_GROUP_CODE'] );>
				<option value=''><?php echo($historyActionGroupRow['EG_NAME']); ?></option>
				 <?php 
				  $groupCodes = $db->get_results("SELECT EG_CODE, EG_NAME FROM m_employee_group WHERE STATUS='1' GROUP BY EG_CODE"  ,ARRAY_A);
			
			       foreach ( $groupCodes as $groupCode )
						            {
						            	echo ("<option value='".$groupCode['EG_CODE']."'>".$groupCode['EG_NAME']."</option>");
						            	
						            }
				 ?>
		     </select>		 
		</li>
		<li>
        	<label for="ACTION_RESULT_SUBGROUP_CODE">ACTION RESULT SUBGROUP CODE:</label>
            <select id="ACTION_RESULT_SUBGROUP_CODE" name="ACTION_RESULT_SUBGROUP_CODE" >
            	<option value=''><?php echo($historyActionss['ACTION_RESULT_SUBGROUP_CODE']); ?></option>			         
            </select>
		</li>
		<li>
        	<label for="ACTION_RESULT_SUBAREA_CODE">ACTION RESULT SUBAREA CODE:</label>
            <select id="ACTION_RESULT_SUBAREA_CODE" name="ACTION_RESULT_SUBAREA_CODE" >
            	<option value=''><?php echo($historyActionss['ACTION_RESULT_SUBAREA_CODE']); ?></option>				         
            </select>
		</li>
		<li  id="ACTION_BASIC_PAY_ROW" style="display:none;" >
        	<label for="ACTION_BASIC_PAY">ACTION BASIC PAY:</label>
            <input type="text" 
            size="40" 
            id="ACTION_BASIC_PAY"  name="ACTION_BASIC_PAY"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action basic pay is required"/>
        </li>
        <li id="ACTION_REMARKS_ROW" style="display:none;" >
        	<label for="ACTION_REMARKS">ACTION REMARKS:</label>
            <input type="text" 
            size="255" 
            id="ACTION_REMARKS"  name="ACTION_REMARKS"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action remarks is required"/>
        </li>
        <li  id="ACTION_PAYROLL_AREA_ROW" style="display:none;" >
        	<input type="text" 
            size="2" 
            id="ACTION_PAYROLL_AREA"  name="ACTION_PAYROLL_AREA"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action pay roll area is required"/>
		</li>
		<li>
        	<label for="ACTION_BEGIN_DT">ACTION BEGIN DT:</label>
            <input type="text" 
            size="10" 
            id="ACTION_BEGIN_DT"  name="ACTION_BEGIN_DT"
            data-validation-help="Please enter action begin date" 
            data-validation="required" 
            data-validation-error-msg="Action begin date is required"/>
        </li>
        <li>
        	<label for="ACTION_END_DT">ACTION END DT:</label>
            <input type="text" 
            size="10" 
            id="ACTION_END_DT"  name="ACTION_END_DT"
            data-validation-help="Please enter action end date" 
            data-validation="required" 
            data-validation-error-msg="Action end date code is required"/>
        </li>
	</ul>
	
		<p>
			<button type="submit" class="action" name="action" value="Update">Update</button>
			<button type="reset" class="right">Reset</button>
			<input name="rowid" type="hidden" id="ROW_ID" value="<?php echo($historyActionss['ROW_ID']);?>" />
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
				<td>Pension Code</td> <td>Pension Start Time</td> <td>Pension End Time</td> <td>Status</td> <td>Actions</td> 
			</tr>	
			<?php 
 								
					$employee_historyActionss = $db->get_results("SELECT * FROM employee_actions_details WHERE EMPLOYEE_ROW_ID='".$_POST['empid']."'"  ,ARRAY_A);
			
		           	foreach ( $employee_historyActionss as $employee_historyActions )
		           	{
		         		echo("<td>".$employee_historyActions['ACTION_CODE'] ."</td> <td>".$employee_historyActions['ACTION_REASON_CODE']."</td> <td>".$employee_historyActions['ACTION_REASON_CODE']."</td> <td>".$employee_historyActions['STATUS']."</td> ");
		         		
		         ?>	
		         	<td>
		         	<form style="margin:0px; border:0px; background-color:inherit;" action="history-action.php" method="post" id="employeeHistoryActionForm_<?php echo($employee_historyActions['ROW_ID']);?>" name="employeeHistoryActionForm_<?php echo($employee_historyActions['ROW_ID']);?>">
							<!-- Create row specific actions -->
			     			<?php 
								if($employee_historyActions['STATUS']=="-1")
			         	 		{
			         	 			echo("<input class='statusDImgBut' id='status' type='submit' name='action' value='Status' title='This record is marked to be deleted. Contact Admin'/> &nbsp;");
								}else if($employee_historyActions['STATUS']=="0")
			         	 		{
				         	 		echo("<input class='statusIImgBut' id='status' type='submit' name='action' value='Status' title='This record is Inactive. Click to Activate'/> &nbsp;");
								
			         	 		}else if($employee_historyActions['STATUS']=="1")
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
								<input name="status" type="hidden" value="<?php echo($employee_historyActions['STATUS']);?>" />
								<input name="rowid" type="hidden" value="<?php echo($employee_historyActions['ROW_ID']);?>" />
								<input name="empid" type="hidden" value="<?php echo($employee_historyActions['EMPLOYEE_ROW_ID']);?>" />
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
	    <form action="history-action.php" method="post" id="employeeHistoryActionForm">
			<button type="submit" class="action" name="action" value="Cancel">Cancel</button>
			<button type="submit" class="action" name="action" value="New">New</button>
			<input name="empid" type="hidden" value="<?php echo($_POST['empid']);?>" />
			<input name="submitted" type="hidden" id="submitted" value="1" />
		</form>		
    </div>
	
<?php
	}
?>	