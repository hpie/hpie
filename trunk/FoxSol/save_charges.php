<?php 
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;
	}
	

	
	
	
require('connectDB.php');


if(!is_numeric($_POST['cropset']) || !is_numeric($_POST['mancar']) || !is_numeric($_POST['mulcar']) || !is_numeric($_POST['matecom']) || !is_numeric($_POST['traccar']) || !is_numeric($_POST['emptinR']) || !is_numeric($_POST['emptinsolR']) || !is_numeric($_POST['trate25']) || !is_numeric($_POST['trateb25']) || !is_numeric($_POST['lrate50']) || !is_numeric($_POST['lrateb50']))
{
echo '<script type="text/javascript">
			alert("Enter valid values");
						window.location = "set_charges.php";
			</script>';
			

}





		

$cropset=$_POST['cropset'];
$mancar=$_POST['mancar'];
 $mulcar=$_POST['mulcar'];
  $traccar=$_POST['traccar'];
 $matecom=$_POST['matecom'];		
 
$emptinR=$_POST['emptinR'];

$emptinsolR=$_POST['emptinsolR'];




$trate25=$_POST['trate25'];
$trateb25=$_POST['trateb25'];


$lrate50=$_POST['lrate50'];
$lrateb50=$_POST['lrateb50'];



$q="select * from charges limit 1";
$rs=mysql_query($q);
if(mysql_num_rows($rs)==1)
{
$qr="update charges set cropset='$cropset' , mancar='$mancar' , mulcar='$mulcar' , traccar='$traccar' , matecom='$matecom' , emptinR='$emptinR' , emptinsolR='$emptinsolR' , trate25='$trate25' , trateb25='$trateb25' , lrate50='$lrate50' , lrateb50 ='$lrateb50'";
}
else
{
$qr="INSERT INTO charges (cropset, mancar, mulcar, traccar, matecom, emptinR, emptinsolR, trate25, trateb25, lrate50, lrateb50) VALUES ('$cropset', '$mancar', '$mulcar', '$traccar', '$matecom', '$emptinR', '$emptinsolR', '$trate25', '$trateb25', '$lrate50', '$lrateb50')";

}


if(mysql_query($qr))
{
echo '<script type="text/javascript">
			alert ("Updated Successfully");
			window.location = "index.php"
			</script>';
}
else
{
echo '<script type="text/javascript">
			alert ("Some error occured");
			window.location = "set_charges.php"
			</script>';
}
?>







