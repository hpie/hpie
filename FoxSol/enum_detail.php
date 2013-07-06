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

$q="select * from enum where lotno='".$lot."' and Year='$kapa' and division='$divi'";
if(mysql_num_rows(mysql_query($q))>0)
{
echo '<script type="text/javascript">
			alert ("Details Already Entered");
			//window.location = "enum_list.php"
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
	  function check()
{
var num=(document.forms["form1"]["num"].value);
num=num*3;

if(document.forms["form1"]["forestn"+3].value=="")
{
alert ("Enter the number of blazes for all the Forest Compartments");

return false;

}

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
			
			<h1><div style="float:left">Create Enumeration List</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			
			
			
			
			 	<br>
				<form action="enumverfy_list.php" method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();">
					
				<?php
                   			
				echo "<table cellspacing=10><tr><td>Lot No: </td><td><input id='inputtext1' type='text' name='lotno' disabled='disabled' value='". $lot ."/". $kapa . "(".getExten($lot,$divi).")'/></td><td></td></tr>";
				
				$ql="SELECT * FROM lot_desc WHERE lotno = '$lot' and division='$divi' ORDER BY lotno ASC";
				$data = mysql_query($ql) or die("No table"); 
				if(mysql_num_rows($data)<1)
				{
				echo '<script type="text/javascript">
			alert ("No lot found with entered details");
			window.location = "Enum_list.php"
			</script>';
				/*header('Location:show_msg.php?msg="No lot found with entered details"');
				exit;*/
				
				}
				
		
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
		echo "<tr><td>Name of the Forests</td><td>Number of the Tentative Blazes</td></tr>";
		$ppl = explode(",", $forests);
		$num=count($ppl);
		echo '<input type=hidden value='.$num.' name=num />';
for($i = 0; $i < count($ppl); $i++){
      $z = $i + 8;
      $y = $i + 3;
	  $v = $z+100;
	echo "<tr><td>" . $ppl[$i]. " </td><td><input id='inputtext" . $v . "' type='text' name='forestn" . $y . "' value='' onkeypress=\"return isNumberKey(event)\"/></td></tr>";
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
