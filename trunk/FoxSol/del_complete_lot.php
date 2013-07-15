<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>



<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />

<title>FoxSolutions</title>
<script language="javascript" type="text/javascript">
function check()
{
if(document.forms["form1"]["lot"].value==0)
{
alert ("Select Lot");
return false;
}
else if(document.forms["form1"]["divi"].value==0)
{
alert ("Select Forest Division");
return false;
}
else
return true;
}
</script>
</head>

<body>
<!-- wrap starts here -->
<div id="wrap"><?php include('includes/header.php'); ?> <!-- content-wrap starts here -->
<div id="content-wrap">
<div id="content">

<div id="sidebar"><?php include('includes/sidebar.php');	?></div>

<div id="main">

<div class="post">


<h1>
<div style="float: left">Delete Lot & Details</div>



<div style="float: right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
print date("jS F Y, g:i A");
?></font></div>
</h1>

<?php 

if($_POST['delLot'])
{
	$lotNo = $_POST['lot'];
	$divi = $_POST['divi'];
	
	mysql_query("DELETE FROM bark_store WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Bark");
	
	mysql_query("DELETE FROM current_lsm WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete LSM");
	
	mysql_query("DELETE FROM enum WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete ENUM");
	
	mysql_query("DELETE FROM lot_desc WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Lot Description");
	
	mysql_query("DELETE FROM ssyield_obtained WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Yeald Report Data");
	
	mysql_query("DELETE FROM tap_store WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Progress");
	
	mysql_query("DELETE FROM upset_price WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Upsert Price");
	
	mysql_query("DELETE FROM verify WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Verify List");
	
	mysql_query("DELETE FROM yield_fixed WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Yield Fixed");
	
	mysql_query("DELETE FROM yield_obtained WHERE lotno = '$lotNo' and division='$divi'") or die("Not able to Delete Yield Report");
	
	echo("<br /> <br /> <br /> <br /> <h2> Deletion of data for Lot No: ".$lotNo." in Division: ".$divi." succesful </h2>");
	
	
}else {
?>
<br />

<form method="post" enctype="multipart/form-data" id="form1"
	onsubmit="return check();">


<p>Select the lot Description No.<select name="lot">
	<option value="0">Select</option>
	<?php
	// Connects to your Database
	$data = mysql_query("SELECT distinct lotno FROM lot_desc ORDER BY lotno ASC") or die("No table");
	while($info = mysql_fetch_array( $data ))
	{
		$lot=$info['lotno'];
		$divi=$info['division'];
		echo "<option value=\"$lot\">" . $lot . "</option>";
			
	}


	echo		 '</select><br><br>Select the Forest Division of Lot<select name="divi"><option value="0">Select</option>';
	$data = mysql_query("SELECT distinct division FROM lot_desc ORDER BY lotno ASC") or die("No table");
	while($info1 = mysql_fetch_array( $data ))
	{
		$divi=$info1['division'];
		echo "<option>" . $divi . "</option>";

	}

	?>
</select> <br />
<br />
 <input id="delLot" type="submit"
	style="background-color: #b6e38e; width: 60px;" name="delLot"
	value="Delete All Entries for the Lot" /></p>

</form>


</div>



<br />

</div>

<?php 
} //else close
?>
<!-- content-wrap ends here --></div>
</div>

<!-- footer starts here -->
<div id="footer"><?php include('includes/footer.php'); ?></div>
<!-- footer ends here --> <!-- wrap ends here --></div>

</body>
</html>
