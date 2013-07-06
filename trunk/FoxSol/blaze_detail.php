<?php
session_start();
require('connectDB.php');

if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
	}
	$_SESSION['frm_action']="insert";
	 $kapa=$_POST['year'];
	$_SESSION['kapa']=$kapa;	
	
	$lot = $_POST['lot'];
	$divi=$_POST['divi'];
	$_SESSION['divi']=$divi;

$q="select lotno from verify where lotno='".$lot."' and year='$kapa' and division='$divi'";
if(mysql_num_rows(mysql_query($q))>0)
{
echo '<script type="text/javascript">
			alert ("Details Already Entered");
			//window.location = "lot_create.php"
			</script>';
	$_SESSION['frm_action']="update";		
/*header("Location: show_msg.php?msg='Details Already Entered '");
exit;*/
}

function getExten($lotno,$divi)
{
$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['exten']);

}



function getBlazen($lotno,$divi,$year,$forest)
{
$rs=mysql_query("select blazen from enum where lotno='$lotno' and division='$divi' and year='$year' and forest='$forest'");
$row=mysql_fetch_array($rs);

return $row['blazen'];


}


$rss = mysql_query("SELECT lotno FROM  enum where lotno='$lot' and division='$divi' and year='$kapa'") or die("No table"); 
	
	if(mysql_num_rows($rss)<1)
{
echo '<script type="text/javascript">
			alert ("No details found in Enumeration List");
			window.location = "lot_create.php"
			</script>';
			

}

		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
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
			
			<h1><div style="float:left">Create the lot for the Verified List[2]</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			
			
			
			
			 	<br>
				<form action="verfy_list.php" method="post" enctype="multipart/form-data" id="form1">
					
				<?php
                   			
				echo "<table cellspacing=10><tr><td>Lot No: </td><td><input id='inputtext1' type='text' name='lotno' disabled='disabled' value='". $lot ."/". $kapa . "(".getExten($lot,$divi).")'/></td><td></td></tr>";
				
				$ql="SELECT * FROM lot_desc WHERE lotno = '$lot' and division='$divi' ORDER BY lotno ASC";
				$data = mysql_query($ql) or die("No table"); 
				
				
		
	while($info = mysql_fetch_array( $data )) 
		{  
			$range=$info['frange'];
			$forests=$info['forests'];
			$ta=$info['type_area'];
			$ext=$info['extract_method'];
			
			$rsd=$info['rsd'];
			$unit=$info['unit'];
			$exten=$info['exten'];
           		
		}
		$_SESSION['lot'] = $lot ;
		$_SESSION['range'] = $range;
		$_SESSION['forests'] = $forests;
		$_SESSION['ta'] = $ta;
		$_SESSION['ext'] = $ext;
		
		$_SESSION['rsd'] = $rsd;
		$_SESSION['unit'] = $unit;
		$_SESSION['divi']=$divi;
		$_SESSION['exten']=$exten;
		echo "<tr><td>Range: </td><td><input id='inputtext2' type='text' disabled='disabled' name='range' value='". $range ."'/></td><td></td></tr>";
		echo "<tr><td>Type of Area: </td><td><input id='inputtext3' type='text' disabled='disabled' name='type_area' value='". $ta ."'/></td><td></td></tr>";
		echo "<tr><td>Unit: </td><td><input id='inputtext3' type='text' disabled='disabled' name='unit' value='". $unit ."'/></td><td></td></tr>";
		echo "<tr><td>Method of Extraction: </td><td><input id='inputtext4' disabled='disabled' type='text' name='ext_mthd' value='". $ext ."'/></td><td></td></tr>";
		
		echo "<tr><td>Name of RSD: </td><td><input id='inputtext7' type='text' name='rsd' disabled='disabled' value='". $rsd ."'/></td><td></td></tr>";
		echo "<tr><td>Forest Wise Detail of Tentative Blazes: </td><td></td></tr>";
		echo "<tr><td>Name of the Forests/Compartment</td><td>Number of the Blazes (As per Enumeration List)</td><td>Number of the Blazes(Fit)</td></tr>";
		$ppl = explode(",", $forests);
for($i = 0; $i < count($ppl); $i++){
      $z = $i + 8;
      $y = $i + 3;
	  $v = $z+100;
	echo "<tr><td>" . $ppl[$i]. " </td><td>".getBlazen($lot,$divi,$kapa,$ppl[$i])."</td><td><input id='inputtext" . $z . "' type='text' name='forest" . $y . "' value='' onkeypress=\"return isNumberKey(event)\"/></td></tr><input id='inputtext" . $v . "' type='hidden' name='forestn" . $y . "' value='".getBlazen($lot,$divi,$kapa,$ppl[$i])."' onkeypress=\"return isNumberKey(event)\"/>";
} 
echo "</table>";
$_SESSION['count'] = count($ppl);
		?>
					
				
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
