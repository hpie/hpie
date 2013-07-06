<?php

session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
$year=range(date("Y")+1,2009,-1);
$selected = isset($_POST['year'])?$_POST['year']:null;
require('connectDB.php');


$error="";
if(isset($_POST['submitted']))
{
	if(empty($_POST['CropSet']) || empty($_POST['ResEx']) || empty($_POST['AddMateCom']) || empty($_POST['CarMan']) || empty($_POST['CarMule'])|| empty($_POST['Tool']))
	$error="Enter all the values";
	
	
	elseif(!is_numeric($_POST['CropSet']) || !is_numeric($_POST['ResEx']) || !is_numeric($_POST['AddMateCom']) || !is_numeric($_POST['CarMan']) || !is_numeric($_POST['CarMule'])|| !is_numeric($_POST['Tool']))
	{
	$error="Enter Valid Charges";
	
	}
	else
	{	
	$cyear=$_POST['year'];
	$CropSet=$_POST['CropSet'];
		$ResEx=$_POST['ResEx'];
		$AddMateCom=$_POST['AddMateCom'];
		$CarMan=$_POST['CarMan'];
		$CarMule=$_POST['CarMule'];
		$Tool=$_POST['Tool'];
		
		if(mysql_num_rows(mysql_query("select * from charges where year='$cyear'"))==0)
				{
				$q="insert into charges (year,CropSet,ResEx,AddMateCom,CarMan,CarMul,Tool) values ('$cyear','$CropSet','$ResEx','$AddMateCom','$CarMan','$CarMule','$Tool')";
				mysql_query($q);
				}
		else
			{
				$q="update charges  SET  CropSet =  '$CropSet',ResEx =  '$ResEx',AddMateCom =  '$AddMateCom',CarMan =  '$CarMan',CarMul =  '$CarMule',
Tool =  '$Tool' WHERE  year='$year' ";
		mysql_query($q);
		}
		
		 $error="Data Entered Successfully";// or die mysql_error();
		}
	

}





?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<script language="javascript"  type="text/javascript">
function check()
{
if(document.forms["form1"]["year"].value==0)
{
alert ("Select Year");
return false;
}

else
return true;



}
</script>

<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />

<title>FoxSolutions</title>
	
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">

	<?php include('includes/header.php'); ?>
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">		
		
		<div id="sidebar" >
		
			
			<?php include('includes/sidebar.php');	?>				
		</div>	
	
		<div id="main">		
		
			<div class="post">
			
				
				<h1>
				<div style="float:left">Set the Charges</div><div style="float:right"><font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
				<br>
			<form action="set_rates.php" method="post"><table width="669">
			  <tr>
			   <td width="385">
			Select Year For which charges to be set</td>
			  <td width="272"><select name="year" >
				<Option Value="0">Select</option>
					<?php
					
					 foreach($year as $year)
					{
					echo '<option value="'.$year.'"'.($selected !== null && $selected == $year?' selected="selected"':'').'>'.$year.'</option>';
					}
					?></select>
					</td></tr><tr>
			    
			  <td width="385">
			Crop Setting Charges </td>
			  <td width="272"><input name='CropSet' type="text" id="CropSet" value=''/></td></tr><tr>
			    <td>
			Resin Extraction Charges Per Qtls </td>
			    <td><input name='ResEx' type="text" id="ResEx" value=''/></td></tr><tr>
			      <td>
			Add Mate Charges Per Qtls </td>
			      <td><input name='AddMateCom' type="text" id="AddMateCom" value=''/>
			      <br></td></tr><tr>
			        <td>
						Carriage Charges for Mannual Path Per Qtls Per KMs </td>
			        <td><input name="CarMan" type="text" id="CarMan" /></td>
			      </tr><tr>
			        <td >Carriage Charges for Mule Path Per Qtls Per KMs</td>
					<td><input name="CarMule" type="text" id="CarMule" /></td>
			      </tr>
			      <tr>
			        <td>Add element of tools </td>
			        <td><input name="Tool" type="text" id="Tool" /></td>
	          </tr>
			      <tr>
			        <td height="40"><input style='background-color:#b6e38e; width: 120px;' type="submit" name="Submit" value="Submit" />
		            <input name="submitted" type="hidden" id="submitted" value="1" /></td>
			        <td></td>
	          </tr>
			</table> 
			<p style="color:#CC0000"><?php echo $error; ?></p>
			</form> 
				
				
			</div>
			
				
				
				<br />				
										
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>

<!-- footer starts here -->	
<div id="footer">
<?php include('includes/footer.php'); ?>
</div>
<!-- footer ends here -->
	
<!-- wrap ends here -->
</div>

</body>
</html>
