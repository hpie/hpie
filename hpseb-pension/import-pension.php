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
<td colspan="2" align="center"><strong>Import HPSEB Pension CSV file</strong></td>
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
		<td><strong>Employee ID</strong></td> <td><strong>Basic</strong></td> <td><strong>Dearness %</strong></td> <td><strong>Dearness</strong></td>
		<td><strong>Medical</strong></td> <td><strong>Oldage</strong></td> <td><strong>Arrear</strong></td> 
		<td><strong>LTC</strong></td> <td><strong>Other</strong></td> <td><strong>Gross</strong></td>
		<td><strong>Commute</strong></td> <td><strong>Adjustment</strong></td> <td><strong>Deductions</strong></td>
		<td><strong>Net Payable</strong></td> <td><strong>Pension Month</strong></td> <td><strong>Comments</strong></td> <td><strong>Status</strong></td>
	</tr>");
 	
  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            //print_r($emapData);
            $sql = "INSERT into hpseb_employee_pension(
            		employee_ID, 	 	 
					employee_pension_basic, 	 	 
					employee_pension_dearness_per, 	 
					employee_pension_dearness_allo, 	 
					employee_pension_medical_allo, 	 
					employee_pension_oldage_allo, 	 
					employee_pension_arrear, 	 
					employee_pension_ltc, 	 	 
					employee_pension_other_allo, 	 
					employee_pension_gross, 	 	 
					employee_pension_commute_val, 	 
					employee_pension_adjustment, 	 
					employee_pension_total_deductions,
					employee_pension_net_payable, 	 
					employee_pension_period, 	 
					employee_pension_comments, 	 
					employee_pension_iseditable
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
		            '$emapData[12]',
		            '$emapData[13]',
		            '$emapData[14]',
		            '$emapData[15]',
		            '$emapData[16]'
            )";
            
            //echo ("<br />".$sql);
            echo("<tr >
					<td>$emapData[0]</td> <td>$emapData[1]</td> <td>$emapData[2]</td> <td>$emapData[3]</td>
					<td>$emapData[4]</td> <td>$emapData[5]</td> <td>$emapData[6]</td> 
					<td>$emapData[7]</td> <td>$emapData[8]</td> <td>$emapData[9]</td>
					<td>$emapData[10]</td> <td>$emapData[11]</td> <td>$emapData[12]</td>
					<td>$emapData[13]</td> <td>$emapData[14]</td> <td>$emapData[15]</td> <td><strong>".mysql_query($sql)."</strong></td>
			</tr>");
            
         }
         fclose($file);
         echo("</table>");
         echo "CSV File has been successfully Imported To Employee Pension Table ";
 }
 else
 echo "Invalid File:Please Upload CSV File";

}
?>


</body>
</html>