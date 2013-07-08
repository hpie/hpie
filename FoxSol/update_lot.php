<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');
if(isset($_POST['range']) && ($_POST['type_area']) && ($_POST['unit']) && ($_POST['forest']))
{
	$lotno = $_SESSION['lotno'];
	$ranga =$_POST['range'];
	$typarea=$_POST['type_area'];
	$unita=$_POST['unit'];
	$extmhd=$_SESSION['ext'];

	$rsda=$_POST['rsd'];
	$frst=$_POST['forest'];
	$divi=$_SESSION['divi'];
	$exten=$_SESSION['exten'];

	$data = mysql_query("SELECT lotno FROM lot_desc WHERE lotno ='$lotno' and division='$divi'") or die("No table no");

	//	if(mysql_num_rows($data) == 1){
	@mysql_query("UPDATE lot_desc SET exten='$exten', frange='$ranga', forests='$frst', type_area='$typarea', extract_method='$extmhd',  rsd='$rsda', unit='$unita' WHERE lotno='$lotno' and division='$divi'") or die("No table");
	header("Location:show_msg.php?msg=Thank You ..... Your changes has been changed");
	//}
	//else
	//{
	//echo "some error occured";
	//exit;
	//}
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
<div id="wrap"><?php include('includes/header.php'); ?> <!-- content-wrap starts here -->
<div id="content-wrap">
<div id="content">

<div id="sidebar"><?php include('includes/sidebar.php');	?></div>

<div id="main">

<div class="post"><a name="TemplateInfo"></a>
<h1>Edit Lot &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp
&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp<font size=2><?php date_default_timezone_set('Asia/Calcutta');
print date("jS F Y, g:i A");
?></font></h1>
<br> <?php
echo "Thank You ..... Your changes has been changed";
?>

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
