<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}
$year=range(date("Y")+1,2010,-1);
$selected = isset($_POST['year'])?$_POST['year']:date("Y");
require('connectDB.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
if(document.forms["form1"]["divi"].value==0)
{
alert ("Select Forest Division");
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
			
				
				<h1><div style="float:left">Show Proposed Upset Price List</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="pro_upset_price.php">
					<p>Select Year for which Proposed Upset Price list is to be created <select name="year" >
				<Option Value="<?php date("Y") ; ?>"><?php date("Y") ; ?></option>
					<?php
					
					 foreach($year as $year)
					{
					echo '<option value="'.$year.'"'.($selected !== null && $selected == $year?' selected="selected"':'').'>'.$year.'</option>';
					}
					?></select>
					
					
					
 <?php 
  //TODO:Sunil $data = mysql_query("SELECT distinct division FROM upset_price") or die("No table");
  $data = mysql_query("select * from fdivision where corporation ='".$_SESSION['fwd']."'") or die("No table"); 
			
		echo 	'<p>Select the Forest Division <select name="divi">';
	    echo   '<option value="0">Select</option>';
		while($info = mysql_fetch_array( $data )) 
		{  
			$divi=$info['division'];
			echo "<option value=\"$divi\">" .$divi . "</option>";
		  		
		} 
		
		 echo		 '</select><br><br>';
	
		 
		 
	echo	'<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Next"  />
					</p>'; ?>
		

 		

					
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
