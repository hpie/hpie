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
<td colspan="2" align="center"><strong>Import Employee Details CSV file</strong></td>
</tr>

<tr>
<td align="center">CSV/Excel File:</td><td><input type="file" name="file" id="file" /></td></tr>
<tr >
<td colspan="2" align="center"><input type="submit" name="Import" value="Import" /></td>
</tr>
</table>
</form>
</body>
</html>

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
		<td><strong>Employee ID</strong></td> <td><strong>Address1</strong></td> <td><strong>Address2</strong></td> <td><strong>City</strong></td>
		<td><strong>State</strong></td> <td><strong>PIN</strong></td> <td><strong>Phone</strong></td> 
		<td><strong>Mobile</strong></td> <td><strong>Email</strong></td> <td><strong>Current</strong></td>
		<td><strong>Status</strong></td>
	</tr>");
  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            //print_r($emapData);
            $sql = "INSERT into hpseb_employee_details(
            		employee_ID, 	 	 	 
					employee_address_one, 	 	 	 
					employee_address_two, 	 	 	 	 	 	 	 	 	
					employee_city, 	 	 	 	 	 	 	 	 	
					employee_state, 	 	 	 	 	 	 
					employee_pin, 	 	 	 	 	 	 	 	 	
					employee_phone, 	 	 	 
					employee_mobile, 	 	 
					employee_email, 	 	 	 
					employee_iscurrent
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
		            '$emapData[9]'
            )";
            
            //echo ("\n".$sql);
            echo("<tr >
					<td>$emapData[0]</td> <td>$emapData[1]</td> <td>$emapData[2]</td> <td>$emapData[3]</td>
					<td>$emapData[4]</td> <td>$emapData[5]</td> <td>$emapData[6]</td> 
					<td>$emapData[7]</td> <td>$emapData[8]</td> <td>$emapData[9]</td>
					<td><strong>".mysql_query($sql)."</strong></td>
			</tr>");
            mysql_query($sql);
         }
         fclose($file);
         echo("</table>");
         echo "CSV File has been successfully Imported To Enployee Details Table ";
 }
 else
 echo "Invalid File:Please Upload CSV File";

}
?>

