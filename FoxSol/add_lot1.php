<?php
session_start();
require("connectDB.php");
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>



<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />

<title>FoxSolutions</title>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>	
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
			
					
				<h1>Create a Lot&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></h1>
				<br>
				
		<?php

		 echo "<form action='add_lot2.php' method='post'><table><tr><td>Lot Description No: </td><td><input id='inputtext1' type='text' name='lot_no' value=''/></td></tr>";
		 echo "<tr><td>Name: </td><td><input id='inputtext2' type='text' name='exten' value=''/>&nbsp;e.g Koti in Lot 1/2012(Koti)</td></tr>";
		 echo "<tr><td>Forest Division: </td><td><select name='divi'><option value='0'>Select</option>";
		 $q="select * from fdivision where corporation ='".$_SESSION['fwd']."'";
		 $data1=mysql_query($q);
		 while($data=mysql_fetch_array($data1))
		 {
		 $divi=$data['division'];
		 echo "<option value='".$divi."'>".$divi."</option>";
		 }
		 echo "</select></td></tr>";
		 
		 echo "<tr><td>Unit: </td><td><input id='inputtext3' type='text' name='unit' value=''/></td></tr>";
		echo "<tr><td>Range: </td><td><input id='inputtext2' type='text' name='range' value=''/></td></tr>";
		echo "<tr><td>Type of Area: </td><td><input id='inputtext3' type='text' name='type_area' value=''/></td></tr>";
		
		echo "<tr><td>Method of Extraction: </td><td><input id='inputtext4' type='text' name='ext_mthd' value='Rill' /></td></tr>";
		
		echo "<tr><td>Name of RSD: </td><td><input id='inputtext7' type='text' name='rsd' value=''/></td></tr>";
		echo "<tr><td>Forests/Compartments: </td><td><font color=\"red\">Please Enter the forest/compartments separated by comma</font></td></tr>";
		echo "<tr><td></td><td><TEXTAREA NAME='forest' ROWS='2' COLS='15'></TEXTAREA></td></tr><tr><td><input id='inputtext12' type='submit' style='background-color:#b6e38e; width: 120px;' name='blck' value='Create Lot'/></td></tr></table></form>";
		 
		?>
				
				
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
