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
<script language="javascript"  type="text/javascript">
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
<div id="wrap">

	<?php include('includes/header.php'); ?>
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">		
		
		<div id="sidebar" >
		
			
			<?php include('includes/sidebar.php');	?>				
		</div>	
	
		<div id="main">		
		
			<div class="post">
			
				
				<h1><div style="float:left">Edit Lot</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" id="form1" onsubmit="return check();" action="edit_lot.php">
					
					
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
		</select>	
			<br /><br />	<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 100px;" name="inputsubmit" value="Delete Lot" />
					<input id="inputsubmit2" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit" value="Edit Lot" />
					</p>
					
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
