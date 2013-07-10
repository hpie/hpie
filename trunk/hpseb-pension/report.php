<?php
include("include/header.php");
?>

<body>
<?php
	include("include/links.php");
?>
<br /> <br />

<form method="post">
<table border="1" width="40%" align="center">
<tr >
<td colspan="4" align="center"><strong>View Report For</strong></td>
</tr>

<tr>
	<td align="left">Period From:</td> <td><input type="text" name="fromdt" id="fromdt"/></td>
	<td align="left">Period To:</td>   <td><input type="text" name="todt" id="todt"/>    </td>
</tr>
<tr >
<td colspan="4" align="center"> <input type="submit" name="Report" value="Report" /></td>
</tr>
</table>
</form>
<script>
$(function() {
  $( "#fromdt" ).datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 3,
    onClose: function( selectedDate ) {
	  $( "#fromdt" ).datepicker( "option", "dateFormat", "yy-mm-dd" );  
      $( "#todt" ).datepicker( "option", "minDate", selectedDate );
    }
  });
  $( "#todt" ).datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 3,
    onClose: function( selectedDate ) {
	  $( "#todt" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      $( "#fromdt" ).datepicker( "option", "maxDate", selectedDate );
    }
  });
});
</script>
<?php
if(isset($_POST["Report"]))
{
include_once("include/config.php");	
?>
<center> </center><h2>Report Period: &nbsp; &nbsp; &nbsp; From:<?php echo($_POST['fromdt']);?>  &nbsp; &nbsp; To:<?php echo($_POST["todt"]);?> </h2> </center>
<?php	

	$sql = "SELECT 
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
			emp.employee_bank_ppo_no,
			ep.employee_pension_net_payable,
			bp.employee_bank_net_payable 	 
			FROM
			hpseb_employee emp , hpseb_employee_pension ep, hpseb_employee_bank_pension bp
			WHERE
			emp.employee_ID=ep.employee_ID AND emp.employee_bank_ppo_no=bp.employee_bank_ppo_no";
			//AND ep.employee_pension_period
	            
	$result = mysql_query($sql) or die(mysql_error());


	//$row = mysql_fetch_array($result) or die(mysql_error());
	
	//print_r($result);
	if($result)
	{
?>
<table width="100%" border="1">
	<tr>
	 <td>Sr. No.</td> <td>Name</td> <td>PPO Number</td> <td>Bank Account Number</td> <td>Net Pension Payable<br /> as per Bank</td> <td>Net Pension Payable<br /> as per HPSEB</td> <td>Difference</td> <td>More/Less</td>
	</tr>

<?php
    $count=1;
    while ( $row = mysql_fetch_array( $result ) )
    {	
	    echo("<tr>");
		 echo("<td> $count </td> <td> $row[0] $row[1] $row[2]</td> <td>$row[9]</td> <td>$row[8]</td> <td>$row[13]</td> <td>$row[12]</td> <td>".sprintf("%.2f", $row[12]-$row[13])."</td> <td>00</td>");
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
	}
}// post
?>


</body>
</html>