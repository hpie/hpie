<?php
include_once("include/checksession.php");
include("include/header.php");

?>

<body bgcolor="#f2f2f2">

<?php
if(isset($_POST["addemp"]))
{
include_once("include/config.php");

echo("<br /> <br /> <br />");
echo("Data Status");

echo("<table border='1' width='100%' align='center'>
	<tr >
		<td><strong>Employee ID</strong></td> <td><strong>First Name</strong></td> <td><strong>Middle Name</strong></td> <td><strong>Last Name</strong></td>
		<td><strong>DOB</strong></td> <td><strong>DOR</strong></td> <td><strong>Designation</strong></td> 
		<td><strong>Bank</strong></td> <td><strong>Branch</strong></td> <td><strong>Account No</strong></td>
		<td><strong>PPO</strong></td> <td><strong>Pension Type</strong></td> <td><strong>Status</strong></td>
	</tr>");

//foreach ($_POST as $param_name => $param_val) {
    //echo "Param: $param_name; Value: $param_val<br />\n";
//}
	if($_POST['employee_middle_name']=="")
	{
		$middle_name=" ";	
	}else 
	{
		$middle_name=$_POST['employee_middle_name'];
	}

                $sql = "INSERT into  hpseb_employee(
            		employee_ID, 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_first_name, 	 	 	 	 	 	 	 	 	
					employee_middle_name, 	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
					employee_last_name, 	 	 	 	 	 	 	 	 	
					employee_dob, 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_dor, 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_retire_desig, 	 	 	 	 	 	 	 	 	
					employee_bank, 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_bank_branch, 	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
					employee_bank_acc_no, 	 	 	 	 	 	 	 	 	
					employee_bank_ppo_no, 	 	 	 	 	 	 	 	 	
					employee_pension_type, 	 	 	 	 	 	 	 	 	
					created_BY
					
            	) 
            values(
		            '".$_POST['employee_ID']."',
		            '".$_POST['employee_first_name']."',
		            '".$middle_name."',
		            '".$_POST['employee_last_name']."',
		            '".$_POST['employee_dob']."',
		            '".$_POST['employee_dor']."',
		            '".$_POST['employee_retire_desig']."',
		            '".$_POST['employee_bank']."',
		            '".$_POST['employee_bank_branch']."',
		            '".$_POST['employee_bank_acc_no']."',
		            '".$_POST['employee_bank_ppo_no']."',
		            '".$_POST['employee_pension_type']."',
		            '".$_POST['uid']."'
            )";
            
            //echo ("\n".$sql);
            echo("<tr >
					<td>".$_POST['employee_ID']."</td> <td>".$_POST['employee_first_name']."</td> <td>".$_POST['employee_middle_name']."</td> <td>".$_POST['employee_last_name']."</td>
					<td>".$_POST['employee_dob']."</td> <td>".$_POST['employee_dor']."</td> <td>".$_POST['employee_retire_desig']."</td> 
					<td>".$_POST['employee_bank']."</td> <td>".$_POST['employee_bank_branch']."</td> <td>".$_POST['employee_bank_acc_no']."</td>
					<td>".$_POST['employee_bank_ppo_no']."</td> <td>".$_POST['employee_pension_type']."</td> <td><strong>".mysql_query($sql)."</strong></td>
			</tr>");
         echo("</table>");

         echo("<br /> <br /> <br />");
//         echo("<table width='50%' border='1' align='center'>
//				<tr>
//					<td><a href='manage.php?uid=".$_POST['uid']."&act=viewemp'>View HPSEB Employee List</a></td>
//					<td><a href='manage.php?uid=".$_POST['uid']."&act=addemp'>Add New HPSEB Employee</a></td>
//         		</tr>
//         	   </table>");	
         
} //$_POST["addemp"])
else if(isset($_POST["updateemp"]))
{
include_once("include/config.php");

echo("<br /> <br /> <br />");
echo("Data Status");

echo("<table border='1' width='100%' align='center'>
	<tr >
		<td><strong>Employee ID</strong></td> <td><strong>First Name</strong></td> <td><strong>Middle Name</strong></td> <td><strong>Last Name</strong></td>
		<td><strong>DOB</strong></td> <td><strong>DOR</strong></td> <td><strong>Designation</strong></td> 
		<td><strong>Bank</strong></td> <td><strong>Branch</strong></td> <td><strong>Account No</strong></td>
		<td><strong>PPO</strong></td> <td><strong>Pension Type</strong></td> <td><strong>Status</strong></td>
	</tr>");

//foreach ($_POST as $param_name => $param_val) {
    //echo "Param: $param_name; Value: $param_val<br />\n";
//}

	if($_POST['employee_middle_name']=="")
	{
		$middle_name=" ";	
	}else 
	{
		$middle_name=$_POST['employee_middle_name'];
	}
	
                $sql = "UPDATE hpseb_employee
            		SET 
            		employee_ID 		='".$_POST['employee_ID']."', 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_first_name	='".$_POST['employee_first_name']."',	 	 	 	 	 	 	 	 	
					employee_middle_name='".$middle_name."', 	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
					employee_last_name	='".$_POST['employee_last_name']."', 	 	 	 	 	 	 	 	 	
					employee_dob		='".$_POST['employee_dob']."', 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_dor		='".$_POST['employee_dor']."', 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_retire_desig='".$_POST['employee_retire_desig']."', 	 	 	 	 	 	 	 	 	
					employee_bank		='".$_POST['employee_bank']."', 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
					employee_bank_branch='".$_POST['employee_bank_branch']."', 	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
					employee_bank_acc_no='".$_POST['employee_bank_acc_no']."', 	 	 	 	 	 	 	 	 	
					employee_bank_ppo_no='".$_POST['employee_bank_ppo_no']."', 	 	 	 	 	 	 	 	 	
					employee_pension_type='".$_POST['employee_pension_type']."', 	 	 	 	 	 	 	 	 	
					last_updated_DT		=now(),
					last_updated_BY		='".$_POST['uid']."' 
					WHERE
					ID='".$_POST['pkID']."'
					";
            
            //echo ("\n".$sql);
            echo("<tr >
					<td>".$_POST['employee_ID']."</td> <td>".$_POST['employee_first_name']."</td> <td>".$_POST['employee_middle_name']."</td> <td>".$_POST['employee_last_name']."</td>
					<td>".$_POST['employee_dob']."</td> <td>".$_POST['employee_dor']."</td> <td>".$_POST['employee_retire_desig']."</td> 
					<td>".$_POST['employee_bank']."</td> <td>".$_POST['employee_bank_branch']."</td> <td>".$_POST['employee_bank_acc_no']."</td>
					<td>".$_POST['employee_bank_ppo_no']."</td> <td>".$_POST['employee_pension_type']."</td> <td><strong>".mysql_query($sql)."</strong></td>
			</tr>");
         echo("</table>");

         echo("<br /> <br /> <br />");
         
} //$_POST["addemp"])

?>



<?php
	if(isset($_GET['act']))
	{
		
		if($_GET['act']=="viewemp")
		{
			include_once("include/config.php");	
?>
<!-- View Employee -->
<?php
	include("include/links.php");
?>
<br /> <br /> 
<!-- Manage Sub Links -->
<center>
<table width="50%" border="1" align="center">
	<tr>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=viewemp">View HPSEB Employee</a></td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=addemp">Add HPSEB Employee</a></td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=viewmaster">View Master Data</a></td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=addmaster"></a>Add Master Data</td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=viewuser">View User</a></td>	
	</tr>
</table>
</center>

<center> <h2>HPSEB EMPLOYEES </h2> </center>
<?php	

	$sql = "SELECT 
			emp.ID, 
			emp.employee_ID,
			emp.employee_first_name, 	 	 	 	 	 	 	 	 	
			emp.employee_middle_name,
			emp.employee_last_name,
			emp.employee_dob,
			emp.employee_dor,
			emp.employee_retire_desig,
			emp.employee_bank, 
			emp.employee_bank_branch,
			emp.employee_bank_acc_no, 	 	 	 	 	 	 	 	 	
			emp.employee_bank_ppo_no, 	 	 	 	 	 	 	 	 	
			emp.employee_pension_type,
			employee_iseditable
			FROM
			hpseb_employee emp";
			//WHERE
			//emp.employee_ID=ep.employee_ID AND emp.employee_bank_ppo_no=bp.employee_bank_ppo_no";
			//AND ep.employee_pension_period
	            
	$result = mysql_query($sql) or die(mysql_error());


	//$row = mysql_fetch_array($result) or die(mysql_error());
	
	//print_r($result);
	if($result)
	{
?>
<table width="100%" border="1">
	<tr>
	 <td>Sr. No.</td> <td>ID</td> <td>Name</td> <td>DOB</td> <td>DOR</td> <td>Desig</td> <td>Bank</td> <td>Branch</td> <td>Acc No.</td> <td>Bank PPO</td> <td>Pension Type</td>     
	</tr>

<?php
    $count=1;
    while ( $row = mysql_fetch_array( $result ) )
    {	
	    echo("<tr>");
		 echo("<td> $count </td> <td><a href='manage.php?uid=$uid&act=viewempdetail&empID=$row[1]&keepThis=true&TB_iframe=true&height=500&width=800' title='Employee Details' class='thickbox'> $row[1] </a></td>"); 
		 if($row[13]=='1')
		 {
		 	echo("<td><a href='manage.php?uid=$uid&act=editemp&pkID=$row[0]'> $row[2] $row[3] $row[4] </a> </td>");
		 }else
		 {
		 	echo("<td>$row[2] $row[3] $row[4] </td>");
		 }
		  
		 echo("<td> $row[5] </td> <td> $row[6] </td> <td> $row[7] </td> <td> $row[8] </td> <td> $row[9] </td> <td> $row[10] </td> <td> <a href='manage.php?uid=$uid&act=viewempbankpension&empPPO=$row[11]&keepThis=true&TB_iframe=true&height=500&width=1000' title='Employee Pension Details from Bank' class='thickbox'> $row[11] </a> </td> <td> <a href='manage.php?uid=$uid&act=viewemppension&empID=$row[1]&keepThis=true&TB_iframe=true&height=500&width=1000' title='Employee Pension Released from HPSEB' class='thickbox'> $row[12] </a></td>");
		echo("</tr>");
		$count++;
?>
	
<?php	
	}// while
?>
</table>

<?php
	}// if
	else
	{	
?>   
     No data found            
<?php
	}// else
?>
<!-- END View Employee -->

<?php
		} //$_GET['act']="viewemp"
		else if($_GET['act']=="addemp")
		{	
?>
<!-- Add Employee -->
<form name="addempfrm" method="post" onSubmit="return verify()">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>
   		<td width="30%">&nbsp;</td> 
   		<td width="40%">
			<table cellpadding="0" cellspacing="2">
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<h3>Add Employee</h3>
					</td>
				</tr>
				<tr>
					<td align="left">Employee ID*</td>
					<td align="center">
						<input type = "text" id="employee_ID" name="employee_ID" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee First Name*</td>
					<td align="center">
						<input type = "text" id="employee_first_name" name="employee_first_name" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Middle Name</td>
					<td align="center">
						<input type = "text" id="employee_middle_name" name="employee_middle_name" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Last Name*</td>
					<td align="center">
						<input type = "text" id="employee_last_name" name="employee_last_name" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Date of Birth*</td>
					<td align="center">
						<input type = "text" id="employee_dob" name="employee_dob" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Date of Retirement*</td>
					<td align="center">
						<input type = "text" id="employee_dor" name="employee_dor" >
					</td>
				</tr>
				<tr>
					<td align="left">Designation at Retirement*</td>
					<td align="center">
						<input type = "text" id="employee_retire_desig" name="employee_retire_desig" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank Name*</td>
					<td align="center">
						<input type = "text" id="employee_bank" name="employee_bank" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank Branch</td>
					<td align="center">
						<input type = "text" id="employee_bank_branch" name="employee_bank_branch" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank Acc No.*</td>
					<td align="center">
						<input type = "text" id="employee_bank_acc_no" name="employee_bank_acc_no" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank PPO*</td>
					<td align="center">
						<input type = "text" id="employee_bank_ppo_no" name="employee_bank_ppo_no" >
					</td>
				</tr>
				<tr>
					<td align="left">Employee Pension Type</td>
					<td align="center">
						<input type = "text" id="employee_pension_type" name="employee_pension_type" >
					</td>
				</tr>
				<tr>
					<td><input type = "hidden" id="uid" name="uid" value="<?php echo $_SESSION['uid']?>"></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="center" >
					  <input type="button" name="button1" value="  Cancel " onClick="cancelAct()">
					  <input type="submit" name="addemp" value="  AddEmployee  ">
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
 
   		</td>
		<td width="30%">&nbsp;</td>
   </tr>
</table>
</form>
<script>
$(function() {
    $( "#employee_dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
    	  $( "#employee_dob" ).datepicker( "option", "dateFormat", "yy-mm-dd" );  
      }    
    });
  });

$(function() {
    $( "#employee_dor" ).datepicker({
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
    	  $( "#employee_dor" ).datepicker( "option", "dateFormat", "yy-mm-dd" );  
      }
    });
  });  
</script>
<!-- END Add Employee -->
<?php
		} //$_GET['act']="addemp"
		else if($_GET['act']=="editemp")
		{	
			include_once("include/config.php");	
			
			$sql = "SELECT 
			emp.ID,
			emp.employee_ID,
			emp.employee_first_name, 	 	 	 	 	 	 	 	 	
			emp.employee_middle_name,
			emp.employee_last_name,
			emp.employee_dob,
			emp.employee_dor,
			emp.employee_retire_desig,
			emp.employee_bank, 
			emp.employee_bank_branch,
			emp.employee_bank_acc_no, 	 	 	 	 	 	 	 	 	
			emp.employee_bank_ppo_no, 	 	 	 	 	 	 	 	 	
			emp.employee_pension_type
			FROM
			hpseb_employee emp
			WHERE
			emp.ID=".$_GET['pkID'];
			//AND ep.employee_pension_period
	            
	$result = mysql_query($sql) or die(mysql_error());


	//$row = mysql_fetch_array($result) or die(mysql_error());
	
	//print_r($result);
	if($result)
	{
		while ( $row = mysql_fetch_array( $result ) )
    	{
?>
<!-- Edit Employee -->
<form name="editempfrm" method="post" onSubmit="return verify()">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>
   		<td width="30%">&nbsp;</td> 
   		<td width="40%">
			<table cellpadding="0" cellspacing="2">
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<h3>Add Employee</h3>
					</td>
				</tr>
				<tr>
					<td align="left">Employee ID*</td>
					<td align="center">
						<input type = "text" id="employee_ID" name="employee_ID" value="<?php echo $row[1]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee First Name*</td>
					<td align="center">
						<input type = "text" id="employee_first_name" name="employee_first_name" value="<?php echo $row[2]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Middle Name</td>
					<td align="center">
						<input type = "text" id="employee_middle_name" name="employee_middle_name" value="<?php echo $row[3]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Last Name*</td>
					<td align="center">
						<input type = "text" id="employee_last_name" name="employee_last_name" value="<?php echo $row[4]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Date of Birth*</td>
					<td align="center">
						<input type = "text" id="employee_dob" name="employee_dob" value="<?php echo $row[5]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Date of Retirement*</td>
					<td align="center">
						<input type = "text" id="employee_dor" name="employee_dor" value="<?php echo $row[6]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Designation at Retirement*</td>
					<td align="center">
						<input type = "text" id="employee_retire_desig" name="employee_retire_desig" value="<?php echo $row[7]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank Name*</td>
					<td align="center">
						<input type = "text" id="employee_bank" name="employee_bank" value="<?php echo $row[8]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank Branch</td>
					<td align="center">
						<input type = "text" id="employee_bank_branch" name="employee_bank_branch" value="<?php echo $row[9]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank Acc No.*</td>
					<td align="center">
						<input type = "text" id="employee_bank_acc_no" name="employee_bank_acc_no" value="<?php echo $row[10]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Bank PPO*</td>
					<td align="center">
						<input type = "text" id="employee_bank_ppo_no" name="employee_bank_ppo_no" value="<?php echo $row[11]?>">
					</td>
				</tr>
				<tr>
					<td align="left">Employee Pension Type</td>
					<td align="center">
						<input type = "text" id="employee_pension_type" name="employee_pension_type" value="<?php echo $row[12]?>">
					</td>
				</tr>
				<tr>
					<td>
						<input type = "hidden" id="pkID" name="pkID" value="<?php echo $row[0]?>">
						<input type = "hidden" id="uid" name="uid" value="<?php echo $_SESSION['uid']?>">
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="center" >
					  <input type="button" name="button1" value="  Cancel " onClick="cancelAct()">
					  <input type="submit" name="updateemp" value="  UpdateEmployee  ">
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
 
   		</td>
		<td width="30%">&nbsp;</td>
   </tr>
</table>
</form>
<script>
$(function() {
    $( "#employee_dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
    	  $( "#employee_dob" ).datepicker( "option", "dateFormat", "yy-mm-dd" );  
      }    
    });
  });

$(function() {
    $( "#employee_dor" ).datepicker({
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
    	  $( "#employee_dor" ).datepicker( "option", "dateFormat", "yy-mm-dd" );  
      }
    });
  });  
</script>
<!-- END Edit Employee -->
<?php
    	}// end if
	}// end while
?>

<?php
		} //$_GET['act']="editemp"
		else if($_GET['act']=="viewempdetail")
		{	
			include_once("include/config.php");	
?>
<!-- View Employee Details -->
<center> <h2>HPSEB EMPLOYEE DETAIL </h2> </center>
<?php	

	$sql = "SELECT 
			emp.employee_ID,
			emp.employee_first_name, 	 	 	 	 	 	 	 	 	
			emp.employee_middle_name, 	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
			emp.employee_last_name, 	 	 	 
			ed.employee_address_one, 	 	 	 
			ed.employee_address_two, 	 	 	 	 	 	 	 	 	
			ed.employee_city, 	 	 	 	 	 	 	 	 	
			ed.employee_state, 	 	 	 	 	 	 
			ed.employee_pin, 	 	 	 	 	 	 	 	 	
			ed.employee_phone, 	 	 	 
			ed.employee_mobile, 	 	 
			ed.employee_email, 	 	 	 
			ed.employee_iscurrent
			FROM
			hpseb_employee emp,
			hpseb_employee_details ed
			WHERE
			emp.employee_ID=ed.employee_ID
			AND
			emp.employee_ID=".$_GET['empID'];
			//AND ep.employee_pension_period
	            
	$result = mysql_query($sql) or die(mysql_error());


	//$row = mysql_fetch_array($result) or die(mysql_error());
	
	//print_r($result);
	if($result)
	{
?>
<table width="100%" border="1">
	<tr>
	 <td>Sr. No.</td> <td>ID</td> <td>Name</td> <td>Address1</td> <td>Address2</td> <td>City</td> <td>State</td> <td>PIN</td> <td>Phone</td> <td>Mobile</td> <td>Email</td> <td>Is Current</td>     
	</tr>

<?php
    $count=1;
    while ( $row = mysql_fetch_array( $result ) )
    {	
	    echo("<tr>");
		 echo("<td> $count </td> <td>$row[0]</td> <td>$row[1] $row[2] $row[3] </td> <td> $row[4] </td> <td> $row[5] </td> <td> $row[6] </td> <td> $row[7] </td> <td> $row[8] </td> <td> $row[9] </td> <td> $row[10] </td> <td>$row[11]</td> <td>$row[12]</td>");
		echo("</tr>");
		$count++;
?>
	
<?php	
	}// while
?>
</table>

<?php
	}// if
	else
	{	
?>   
     No data found            
<?php
	}// else
?>
<!-- END View Employee Details -->
<?php
		} //$_GET['act']="viewempdetail"
		else if($_GET['act']=="viewemppension")
		{	
			include_once("include/config.php");	
?>
<!-- View Employee Pension Details -->
<center> <h2>HPSEB EMPLOYEES PENSION </h2> </center>
<?php	

	$sql = "SELECT
			emp.employee_ID,
			emp.employee_first_name, 	 	 	 	 	 	 	 	 	
			emp.employee_middle_name, 	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
			emp.employee_last_name, 	 	 	 
			ep.employee_pension_basic, 	
			ep.employee_pension_dearness_per, 	
			ep.employee_pension_dearness_allo, 	
			ep.employee_pension_medical_allo, 	
			ep.employee_pension_oldage_allo, 	
			ep.employee_pension_arrear, 	
			ep.employee_pension_ltc, 	
			ep.employee_pension_other_allo, 	
			ep.employee_pension_gross, 
			ep.employee_pension_commute_val, 	
			ep.employee_pension_adjustment, 	
			ep.employee_pension_total_deductions, 
			ep.employee_pension_net_payable, 
			ep.employee_pension_period, 
			ep.employee_pension_comments, 	
			ep.employee_pension_iseditable 
			FROM
			hpseb_employee emp,
			hpseb_employee_pension ep
			WHERE
			emp.employee_ID=ep.employee_ID
			AND
			emp.employee_ID='".$_GET['empID']."'
			ORDER BY ep.employee_pension_period";
			//AND ep.employee_pension_period
	            
	$result = mysql_query($sql) or die(mysql_error());


	//$row = mysql_fetch_array($result) or die(mysql_error());
	
	//print_r($result);
	if($result)
	{
?>
<table width="100%" border="1">
	<tr>
	 <td>Sr. No.</td> <td>ID</td> <td>Name</td> <td>Basic</td> <td>Dearness %</td> <td>Dearness</td> <td>Medical</td> <td>Old Age</td> <td>Arrear</td> <td>LTC</td> <td>Other</td> <td><strong>Gross</strong></td> <td>Commute</td> <td>Adjustment</td> <td><strong>Totoal Deductions</strong></td> <td><strong>Net Payable</strong></td> <td>Pension Period</td> <td>Comments</td>         
	</tr>

<?php
    $count=1;
    while ( $row = mysql_fetch_array( $result ) )
    {	
	    echo("<tr>");
		 echo("<td> $count </td> <td>$row[0]</td> <td>$row[1] $row[2] $row[3] </td> <td> $row[4] </td> <td> $row[5] </td> <td> $row[6] </td> <td> $row[7] </td> <td> $row[8] </td> <td> $row[9] </td> <td> $row[10] </td> <td> $row[11] </td> <td><strong> $row[12] </strong></td> <td> $row[13] </td> <td> $row[14] </td> <td> <strong>$row[15]</strong> </td> <td> <strong>$row[16]</strong> </td> <td> $row[17] </td> <td> $row[18] </td>");
		echo("</tr>");
		$count++;
?>
	
<?php	
	}// while
?>
</table>

<?php
	}// if
	else
	{	
?>   
     No data found            
<?php
	}// else
?>
<!-- END View Employee Pension Details -->
<?php
		} //$_GET['act']="viewemppension"
		else if($_GET['act']=="viewempbankpension")
		{	
			include_once("include/config.php");	
?>
<!-- View Employee Pension Details -->
<center> <h2>HPSEB EMPLOYEES PENSION from Bank</h2> </center>
<?php	

		$sql = "SELECT
			emp.employee_ID,
			emp.employee_bank_ppo_no,
			emp.employee_first_name, 	 	 	 	 	 	 	 	 	
			emp.employee_middle_name, 	 	 	 	 	 	 	 	 		 	 	 	 	 	 	 	 	 	
			emp.employee_last_name, 	 	 	 
			bp.employee_bank_basic, 	
			bp.employee_bank_dearness_allo, 	
			bp.employee_bank_medical_allo, 	
			bp.employee_bank_oldage_allo, 	
			bp.employee_bank_arrear, 	
			bp.employee_bank_ltc, 	
			bp.employee_bank_other_allo, 	
			bp.employee_bank_gross, 
			bp.employee_bank_commute_val, 	
			bp.employee_bank_adjustment, 	
			bp.employee_bank_total_deductions, 
			bp.employee_bank_net_payable, 
			bp.employee_bank_pension_period, 
			bp.employee_bank_comments, 	
			bp.employee_bank_iseditable 
			FROM
			hpseb_employee emp,
			 hpseb_employee_bank_pension bp
			WHERE
			emp.employee_bank_ppo_no=bp.employee_bank_ppo_no
			AND
			emp.employee_bank_ppo_no='".$_GET['empPPO']."'
			ORDER BY bp.employee_bank_pension_period";
			//AND ep.employee_pension_period
	            
	$result = mysql_query($sql) or die(mysql_error());


	//$row = mysql_fetch_array($result) or die(mysql_error());
	
	//print_r($result);
	if($result)
	{
?>
<table width="100%" border="1">
	<tr>
	 <td>Sr. No.</td> <td>ID[PPO]</td> <td>Name</td> <td>Basic</td> <td>Dearness</td> <td>Medical</td> <td>Old Age</td> <td>Arrear</td> <td>LTC</td> <td>Other</td> <td><strong>Gross</strong></td> <td>Commute</td> <td>Adjustment</td> <td><strong>Totoal Deductions</strong></td> <td><strong>Net Payable</strong></td> <td>Pension Period</td> <td>Comments</td>         
	</tr>

<?php
    $count=1;
    while ( $row = mysql_fetch_array( $result ) )
    {	
	    echo("<tr>");
	    echo("<td> $count </td> <td>$row[0][$row[1]]</td> <td>$row[2] $row[3] $row[4] </td> <td> $row[5] </td> <td> $row[6] </td> <td> $row[7] </td> <td> $row[8] </td> <td> $row[9] </td> <td> $row[10] </td> <td> $row[11] </td> <td> <strong>$row[12]</strong>  </td> <td> $row[13] </td> <td> $row[14] </td> <td> <strong>$row[15]</strong> </td> <td> <strong>$row[16]</strong> </td> <td> $row[17] </td> <td> $row[18] </td>");
		echo("</tr>");
		$count++;
?>
	
<?php	
	}// while
?>
</table>

<?php
	}// if
	else
	{	
?>   
     No data found            
<?php
	}// else
?>
<!-- END View Employee Bank Pension Details -->
<?php
		} //$_GET['act']="viewempbankpension"
				else if($_GET['act']=="viewmaster")
		{	
			include_once("include/config.php");	
?>
<!-- View Master Data -->
<center> <h2>Master Data</h2> </center>
<?php	

		$sql = "SELECT
			ID,
			erm.records_master_name, 		
			erm.records_master_value, 		
			erm.records_master_group, 		
			erm.hpseb_employee_ID,
			erm.records_master_comments, 	
			erm.records_master_iseditable 
			FROM
			 hpseb_employee_records_master erm
			ORDER BY erm.records_master_name, erm.records_master_group";
	            
	$result = mysql_query($sql) or die(mysql_error());


	//$row = mysql_fetch_array($result) or die(mysql_error());
	
	//print_r($result);
	if($result)
	{
?>
<table width="100%" border="1">
	<tr>
	 <td>Sr. No.</td> <td>Name</td> <td>Value</td> <td>Group</td> <td>Employee</td> <td>Description</td>         
	</tr>

<?php
    $count=1;
    while ( $row = mysql_fetch_array( $result ) )
    {	
	    echo("<tr>");
	    echo("<td> $count </td> <td> $row[0] </td> <td> $row[1] </td> <td> $row[2] </td> <td> $row[3] </td> <td> $row[4] </td>");
		echo("</tr>");
		$count++;
?>
	
<?php	
	}// while
?>
</table>

<?php
	}// if
	else
	{	
?>   
     No data found            
<?php
	}// else
?>
<!-- END View Master Data -->
<?php
		} //$_GET['act']="viewmaster"
		
		else{			
?>	

<?php
	include("include/links.php");
?>
<br /> <br /> 
<!-- Manage Sub Links -->
<center>
<table width="50%" border="1" align="center">
	<tr>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=viewemp">View HPSEB Employee</a></td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=addemp">Add HPSEB Employee</a></td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=viewmaster">View Master Data</a></td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=addmaster"></a>Add Master Data</td>
		<td><a href="manage.php?uid=<?php echo $uid?>&act=viewuser">View User</a></td>	
	</tr>
</table>
</center>
<!-- End Manage Sub Links -->
 
<?php
		}// else
} // isset($_GET['act'])
?> 
<script> 
function  verify()
{
	var isvalidated=false;
	var msg="";

	if($.trim(document.getElementById("employee_ID").value)=="")
	{
		msg="Employee ID is required \n";
		document.getElementById("employee_ID").value="";
		document.getElementById("employee_ID").focus();
		
	}else if($.trim(document.getElementById("employee_first_name").value)=="")
	{
		msg="Employee First Name is required \n";
		document.getElementById("employee_first_name").value="";
		document.getElementById("employee_first_name").focus();
	}else if($.trim(document.getElementById("employee_middle_name").value)=="")
	{
		//msg="Employee First Name is required \n";
		document.getElementById("employee_middle_name").value="";
		//document.getElementById("employee_first_name").focus();
	}else if($.trim(document.getElementById("employee_last_name").value)=="")
	{
		msg="Employee Last Name is required \n";
		document.getElementById("employee_last_name").value="";
		document.getElementById("employee_last_name").focus();
		
	}else if($.trim(document.getElementById("employee_dob").value)=="")
	{
		msg="Employee Date of Birth is required \n";
		document.getElementById("employee_dob").value="";
		document.getElementById("employee_dob").focus();
		
	}else if($.trim(document.getElementById("employee_dor").value)=="")
	{
		msg="Employee Last Date of Retirement is required \n";
		document.getElementById("employee_dor").value="";
		document.getElementById("employee_dor").focus();
		
	}else if($.trim(document.getElementById("employee_retire_desig").value)=="")
	{
		msg="Employee Deisgnation is required \n";
		document.getElementById("employee_retire_desig").value="";
		document.getElementById("employee_retire_desig").focus();
		
	}else if($.trim(document.getElementById("employee_bank").value)=="")
	{
		msg="Employee Bank Name is required \n";
		document.getElementById("employee_bank").value="";
		document.getElementById("employee_bank").focus();
		
	}else if($.trim(document.getElementById("employee_bank_branch").value)=="")
	{
		//msg="Employee Bank Branch is required \n";
		//document.getElementById("employee_bank_branch").value="";
		//document.getElementById("employee_bank_branch").focus();
		
	}else if($.trim(document.getElementById("employee_bank_acc_no").value)=="")
	{
		msg="Employee Bank Account No is required \n";
		document.getElementById("employee_bank_acc_no").value="";
		document.getElementById("employee_bank_acc_no").focus();
		
	}else if($.trim(document.getElementById("employee_bank_ppo_no").value)=="")
	{
		msg="Employee PPO is required \n";
		document.getElementById("employee_bank_ppo_no").value="";
		document.getElementById("employee_bank_ppo_no").focus();
		
	}else if($.trim(document.getElementById("employee_pension_type").value)=="")
	{
		//msg="Employee Pension Type is required \n";
		//document.getElementById("employee_pension_type").value="";
		//document.getElementById("employee_pension_type").focus();
		
	}else
	{
		
	}

	if(msg!="")
	{
		alert(msg);
		isvalidated=false;
	}else
	{
		isvalidated=true;
	}
	return isvalidated;
}

function cancelAct()
{
	location.href="http://hishimla.com/hpseb/manage.php?uid=1&act=null";	
}

</script>
</body>
</html>