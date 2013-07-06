<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}
$year=range(date("Y")+1,2009,-1);
$selected = isset($_POST['year'])?$_POST['year']:date("Y");
require('connectDB.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
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
			
				<a name="TemplateInfo"></a>	
				<h1><div style="float:left">Create Monthly Progress Report</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="create_month_prog.php">
					<p>Select Resin Year for which progress report is to be created <select name="year" >
				<Option Value="<?php date("Y") ; ?>"><?php date("Y") ; ?></option>
					<?php
					
					 foreach($year as $year)
					{
					echo '<option value="'.$year.'"'.($selected !== null && $selected == $year?' selected="selected"':'').'>'.$year.'</option>';
					}
					?></select><br><br>
					Select Resin Month for which progress report is to be created <select name="month" >
				<Option Value="0">Select</option>
				<Option Value="4">April</option>
				<Option Value="5">May</option>
				<Option Value="6">June</option>
				<Option Value="7">July</option>
				<Option Value="8">August</option>
				<Option Value="9">September</option>
				<Option Value="10">October</option>
				<Option Value="11">November</option>
				<Option Value="12">December</option>
				<Option Value="1">January</option>
				</select><br><br>
<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Next" />	  </form>
				
				
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
