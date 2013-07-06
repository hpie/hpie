<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');
if(isset($_POST['lot']) && ($_POST['inputsubmit']) && $_POST['divi']){

		
		$_SESSION['lotnu']=$_POST['lot'];
		$lotno = $_POST['lot'];
		$divi=$_POST['divi'];
		if($_POST['inputsubmit'] == "Edit Lot"){
		$data = mysql_query("SELECT * FROM lot_desc WHERE lotno='$lotno' and division='$divi'") or die("No table"); 
		}
		else{
		$datan = mysql_query("SELECT * FROM lot_desc WHERE lotno='$lotno' and division='$divi'") or die("No table"); 
		if(mysql_num_rows($datan)==0)
		{
		echo '<script type="text/javascript">
			alert ("No Lot Found");
			window.location = "edit_lot_sel.php"
			</script>';
		}
		@mysql_query("DELETE FROM lot_desc WHERE lotno = '$lotno' and division='$divi'") or die("No table"); 
		}
		}
		else{
		echo '<script type="text/javascript">
			alert ("please Select the lot first");
			window.location = "edit_lot_sel.php"
			</script>';
		//echo "please Select the lot first";
		}
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
			
				
				<h1>Edit a Lot&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></h1>
				<br>
				
		<?php
if($_POST['inputsubmit'] == "Delete Lot"){		
		 echo "Thank You ..... Your Lot has been successfully deleted";
		 }
		 else
		 {
		 		if(mysql_num_rows($data)==0)
				{	
				echo '<script type="text/javascript">
			alert ("No lot Found");
			window.location = "edit_lot_sel.php"
			</script>';
				}
		
				
			     while($info = mysql_fetch_array( $data )) 
			{  
			$range=$info['frange'];
			$forests=$info['forests'];
			$ta=$info['type_area'];
			$ext=$info['extract_method'];
			
			$rsd=$info['rsd'];
			$unit=$info['unit'];
			$divi=$info['division'];
			$exten=$info['exten'];
			$_SESSION['ext']=$ext;
			$_SESSION['lotno']=$lotno;
			$_SESSION['exten']=$exten;
			$_SESSION['divi']=$divi;
           		
			}
		 echo "<form action='update_lot.php' method='post'><table><tr><td>Lot Description No: </td><td><input id='inputtext1' type='text' name='lotno' value='". $lotno ."' disabled='disabled'/></td></tr>";
		 echo "<tr><td>Forest Division: </td><td><input id='inputtext2' type='text' name='divi' value='". $divi ."' disabled='disabled'/></td></tr>";
		  echo "<tr><td>Name: </td><td><input id='inputtext2' type='text' name='exten' value='". $exten ."' disabled='disabled'/>&nbsp;e.g Koti in Lot 1/2012(Koti)</td></tr>";
		  echo "<tr><td>Unit: </td><td><input id='inputtext3' type='text' name='unit' value='". $unit ."'/></td></tr>";
		echo "<tr><td>Range: </td><td><input id='inputtext2' type='text' name='range' value='". $range ."'/></td></tr>";
		echo "<tr><td>Type of Area: </td><td><input id='inputtext3' type='text' name='type_area' value='". $ta ."'/></td></tr>";
		
		echo "<tr><td>Method of Extraction: </td><td><input id='inputtext4' type='text' name='ext_mthd' value='". $ext ."' /></td></tr>";
		
		echo "<tr><td>Name of RSD: </td><td><input id='inputtext7' type='text' name='rsd' value='". $rsd ."'/></td></tr>";
		echo "<tr><td>Forests/Compartments: </td><td><font color=\"red\">Please Enter the forest/compartments separated by comma</font></td></tr>";
		echo "<tr><td></td><td><TEXTAREA NAME='forest' ROWS='2' COLS='15'>" . $forests . "</TEXTAREA></td></tr><tr><td><input id='inputtext12' type='submit' style='background-color:#b6e38e; width: 120px;' name='blck' value='Update'/></td></tr></table></form>";
		 }
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
