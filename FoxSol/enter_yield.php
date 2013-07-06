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

$q="select lotno from yield_fixed where year='$kapa' and division='$divi'";
if(mysql_num_rows(mysql_query($q))>0)
{
	echo '<script type="text/javascript">
			alert ("Details Already Entered. Showing All.");
			//TODO:Sunil
			//window.location = "set_yield_fixed.php"
			</script>';

	/*header("Location: show_msg.php?msg='Details Already Entered '");
	 exit;*/
}



$data = mysql_query("SELECT lotno,division,exten FROM lot_desc where division='$divi'") or die("No table");

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
<div id="wrap"><?php include('includes/header.php'); ?> <!-- content-wrap starts here -->
<div id="content-wrap">
<div id="content">

<div id="sidebar"><?php include('includes/sidebar.php');	?></div>

<div id="main">

<div class="post">

<h1>
<div style="float: left">Entet the Yield Fixed by Director(South)</div>



<div style="float: right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
print date("jS F Y, g:i A");
?></font></div>
</h1>




<br><br />
<form action="Show_set_yield.php" method="post"
	enctype="multipart/form-data" id="form1">

<?php
echo "Enter the Yield Fixed Per section : ";
echo "<table><tr><td></td></tr>";
$_SESSION['numlots']=mysql_num_rows($data);
$i=0;
while($info = mysql_fetch_array( $data ))
{
	$lot=$info['lotno'];
	$divi=$info['division'];
	$exten=$info['exten'];
	$year=$_POST['year'];

	$yf_lot="";
	$yield_fixed="";
	$yf_data = mysql_query("SELECT lotno, yield_fixed FROM yield_fixed where lotno='".addslashes($lot)."'") or die("No table");
	while($yf_info = mysql_fetch_array( $yf_data ))
	{
		$yf_lot=$yf_info['lotno'];
		$yield_fixed=$yf_info['yield_fixed'];
	}
	
	if($lot==$yf_lot)
	{
		echo '<tr><td>'.$lot.'/'.$year.'('.$exten.') </td><td><input style="background-color:#ccc;" type="text" name="'.$i.'" value="'.$yield_fixed.'" readonly /></td></tr>';	
	}else{
		echo '<tr><td>'.$lot.'/'.$year.'('.$exten.') </td><td><input type="text" name="'.$i.'"/></td></tr>';
		
	}
	
	$i++;
	
}
echo '</table>';


?>
<input type=hidden name=count value=<?php echo $i ; ?> />
<input type="hidden" name='divi' value=<?php echo $divi ; ?> />
<input id="inputsubmit1" type="submit"
	style="background-color: #b6e38e; width: 60px;" name="inputsubmit1"
	value="Next" />
</p>

</form>

</div>



<br />

</div>

<!-- content-wrap ends here --></div>
</div>

<!-- footer starts here -->
<div id="footer"><?php include('includes/footer.php'); ?></div>
<!-- footer ends here --> <!-- wrap ends here --></div>

</body>
</html>
