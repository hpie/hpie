<?php
include("include/header.php");
?>
<body>
<?php
	include("include/links.php");
?>
<br /> <br />

<form enctype="multipart/form-data" method="post">
<table border="1" width="40%" align="center">
<tr >
<td colspan="2" align="center"><strong>Import HPSEB Employee CSV file</strong></td>
</tr>

<tr>
<td align="center">CSV/Excel File:</td><td><input type="file" name="file" id="file" /></td></tr>
<tr >
<td colspan="2" align="center"><input type="submit" name="Import" value="Import" /></td>
</tr>
</table>
</form>

<?php
if(isset($_POST["Import"]))
{
include_once("include/config.php");

echo $filename=$_FILES["file"]["tmp_name"];
//echo $ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));


 if($_FILES["file"]["size"] > 0)
 {
	echo("<table border='1' width='100%' align='center'>
	<tr >
		<td><strong>Employee ID</strong></td> <td><strong>First Name</strong></td> <td><strong>Middle Name</strong></td> <td><strong>Last Name</strong></td>
		<td><strong>DOB</strong></td> <td><strong>DOR</strong></td> <td><strong>Designation</strong></td> 
		<td><strong>Bank</strong></td> <td><strong>Branch</strong></td> <td><strong>Account No</strong></td>
		<td><strong>PPO</strong></td> <td><strong>Pension Type</strong></td> <td><strong>Status</strong></td>
	</tr>");

  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            //print_r($emapData);
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
					employee_iseditable
            	) 
            values(
		            '$emapData[0]',
		            '$emapData[1]',
		            '$emapData[2]',
		            '$emapData[3]',
		            '$emapData[4]',
		            '$emapData[5]',
		            '$emapData[6]',
		            '$emapData[7]',
		            '$emapData[8]',
		            '$emapData[9]',
		            '$emapData[10]',
		            '$emapData[11]',
		            '$emapData[12]'
            )";
            
            //echo ("\n".$sql);
            echo("<tr >
					<td>$emapData[0]</td> <td>$emapData[1]</td> <td>$emapData[2]</td> <td>$emapData[3]</td>
					<td>$emapData[4]</td> <td>$emapData[5]</td> <td>$emapData[6]</td> 
					<td>$emapData[7]</td> <td>$emapData[8]</td> <td>$emapData[9]</td>
					<td>$emapData[10]</td> <td>$emapData[11]</td> <td><strong>".mysql_query($sql)."</strong></td>
			</tr>");
            
         }
         fclose($file);
         echo("</table>");
         echo "CSV File has been successfully Imported to Employee Table";
 }
 else
 echo "Invalid File:Please Upload CSV File";

}
?>


</body>
</html>
