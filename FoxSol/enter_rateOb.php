<?php
session_start();
require('connectDB.php');

if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
	}
	 $kapa=$_POST['year'];
	$_SESSION['kapa']=$kapa;	
	$divi=$_POST['divi'];
	
function getExten($lotno,$divi)
{
$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['exten']);



} 



		$data = mysql_query("SELECT distinct (lotno+division) as lotno from verify where division='$divi' and year='$kapa'  order by lotno") or die("No table"); 
		$_SESSION['numlots']=mysql_num_rows($data);
				
				if($_SESSION['numlots']==0)
				{
				echo '<script type="text/javascript">
			alert ("NO lot found for this year");
			window.location = "Set_rates_Obtained.php"
			</script>';
			
/*header("Location: show_msg.php?msg='Details Already Entered '");
exit;*/

				}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
 <SCRIPT type="text/javascript">
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
			
			<h1><div style="float:left">Entet the Obtained/Fixed After Negotiotion Per Section for year  <?php echo "$kapa  for Forest Division $divi" ; ?></div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			
			
			
			
			 	<br><br />
				<form action="Show_set_rateOb.php" method="post" enctype="multipart/form-data" id="form1">
					
				<?php
                   		echo " Enter Obtained Rates Per section in Qtls:";
				echo "<table><tr><td>Lot Number</td><td>LSM Name</td><td>Carriage Rate</td><td>Transportation Rate</td></tr>";
				$_SESSION['numlots']=mysql_num_rows($data);
				$i=0;
			     while($info = mysql_fetch_array( $data )) 
		{  
			$lot=$info['lotno'];
			
			
			//$year=$_POST['year'];
			echo '<tr><td>'.$lot.'/'.$kapa.'('.getExten($lot,$divi).')</td>
			
			<td><input type="text" name="lsm'.$i.'" onkeypress=\"return isNumberKey(event)\"/></td>
			<td><input type="text" name="ratecar'.$i.'" onkeypress=\"return isNumberKey(event)\"/></td>          <td><input type="text" name="ratetrans'.$i.'" onkeypress=\"return isNumberKey(event)\"/></td></tr>';
		  $i++; 		
		}
		echo '</table>';
 

		?>
					
					<input type="hidden" name='divi' value=<?php echo $divi ; ?> />
					<input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Next" />
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
