<?php
session_start();
require('connectDB.php');

if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
}
if(isset($_SESSION["yrop"]) && ($_POST["lot"]) && ($_POST["work"]) && ($_POST["divi"])){
	$lotno=$_POST["lot"] . "/" . $_SESSION["yrop"];
	$ltn=$_POST["lot"];
	//TODO:Sunil
	$ltn = addslashes($ltn);
	$_SESSION['lotnop']=$lotno;
	$work=$_POST["work"];
	$_SESSION['workp']=$work;























	//$ppl = explode("-", $_POST["input1"]);
	$frmm = $_REQUEST['frommon'];

	$frmd = $_REQUEST['fromday'];

	$frmy =$_REQUEST['fromyear'];

	//$pplt = explode("-", $_POST["input2"]);
	$tom = $_REQUEST['tommon'];

	$tod = $_REQUEST['today'];

	$toy = $_REQUEST['toyear'];
	$dif=$tod-$frmd;

	if(!checkdate($frmm,$frmd,$frmy))
	{
		echo '<script type="text/javascript">
			alert ("Enter valid  date in FROM:");
			window.location = "prog_sel_yr.php"
			</script>';

	}


	if(!checkdate($tom,$tod,$toy))
	{
		echo '<script type="text/javascript">
			alert ("Enter valid  date in To:");
			window.location = "prog_sel_yr.php"
			</script>';

	}




	$dvi=$_POST["divi"];
	$yrt=$_SESSION["yrop"];


	if(mysql_num_rows(mysql_query("select * from tap_store Where year='$yrt' AND lotno='$ltn' AND division='$dvi' AND frmmonth='$frmm' AND frmdate='$frmd'"))!=0 || mysql_num_rows(mysql_query("select * from bark_store Where year='$yrt' AND lotno='$ltn' AND division='$dvi' AND frmmonth='$frmm' AND frmdate='$frmd'"))!=0)
	{
		echo '<script type="text/javascript">
			alert ("You have already entered fortnightly report for the particular lot in particular month for the particular resin season");
			window.location = "prog_sel_yr.php"
			</script>';
	}


	$chek ="SELECT * FROM verify WHERE lotno='$ltn' AND division='$dvi' AND year='$yrt'";
	$r=mysql_query($chek) or die(mysql_error());
		
	if(mysql_num_rows($r)==0)
	{
		echo '<script type="text/javascript">
			alert ("There is no lot with lot no' . $ltn . ' and division ' . $dvi . ' and in year ' . $yrt . ' in the verified list, Firstly add the lot in the verified list");
			window.location = "prog_sel_yr.php"
			</script>';
		//echo "There is no lot with lot no " . $ltn . " and division " . $dvi . " and in year " . $yrt . " in the verified list, Firstly add the lot in the verified list";
		//exit;
	}
	if($frmd < $tod && $frmy == $toy && $dif >= 14){
		$_SESSION['divi']=$_POST["divi"];
		$_SESSION['frmm']=$frmm;
		$_SESSION['frmd']=$frmd;
		$_SESSION['frmy']=$frmy;
		$_SESSION['tom']=$tom;
		$_SESSION['tod']=$tod;
		$_SESSION['toy']=$toy;
	}
	else{
		echo "You Have Entered an Invalid date go back to enter new date";
		exit;
	}
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
     
	  
	  function check()
{
if(document.forms["form1"]["nblaze"].value=="")
{
alert ("Select No. of Blazes");
return false;
}
else if(document.forms["form1"]["nmazd"].value=="")
{
alert ("Select No. of Mazdoors");
return false;

}
else
return true;



}

	  function check1()
{
if((document.forms["form1"]["nblaze"].value=="") || (document.forms["form1"]["nmazd"].value=="") || (document.forms["form1"]["tinc"].value=="") || (document.forms["form1"]["tinca"].value==""))
{
alert ("Select No. of Blazes, No. of Mazdoors, No. of Tins Collected And No. of Tins Carried To RSD");
return false;
}
else if((document.forms["form1"]["tinda"].value=="") || (document.forms["form1"]["tindo"].value=="") || (document.forms["form1"]["tindl"].value==""))
{
alert ("Select No. of Tins Dispatched, No. of Tins Dispatched To Bilaspur Factory and No. of Tins Lost");
return false;
}
else
return true;
}

function check2()
{
if(document.forms["form1"]["nblazes"].value=="")
{
alert ("Select No. of Blazes Bark Shaving");
return false;
}
else if(document.forms["form1"]["nblaze"].value=="")
{
alert ("Select No. of Blazes Tapped");
return false;

}
else if(document.forms["form1"]["nmazd"].value=="")
{
alert ("Select No. of Mazdoors");
return false;

}
else if(document.forms["form1"]["tinc"].value=="")
{
alert ("Select No. of Tins Collected");
return false;

}
else if(document.forms["form1"]["tinca"].value=="")
{
alert ("Select No. of Tins Carried To RSD");
return false;

}
else if(document.forms["form1"]["tinda"].value=="")
{
alert ("Select No. of Tins Dispatched");
return false;

}
else if(document.forms["form1"]["tindo"].value=="")
{
alert ("Select No. of Tins Dispatched To other Factory");
return false;

}
else if(document.forms["form1"]["tindl"].value=="")
{
alert ("Select No. of Tins Lost");
return false;

}
else
return true;



}
      //-->


<!--

function validate(){

var value = document.getElementById("tincw").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){



alert(message);
document.getElementById("tincw").select();
document.getElementById("tincw").value="";

return false;

}else{

return true;

}

}
function validate1(){

var value = document.getElementById("tincaw").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){

alert(message);

document.getElementById("tincaw").select();
document.getElementById("tincaw").value="";


return false;

}else{

return true;

}

}
function validate2(){

var value = document.getElementById("tindw").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){

alert(message);

document.getElementById("tindw").select();
document.getElementById("tindw").value="";


return false;

}else{

return true;

}

}
function validate3(){

var value = document.getElementById("tindow").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){

alert(message);

document.getElementById("tindow").select();
document.getElementById("tindow").value="";


return false;

}else{

return true;

}

}
function validate4(){

var value = document.getElementById("tinlw").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){

alert(message);

document.getElementById("tinlw").select();
document.getElementById("tinlw").value="";


return false;

}else{

return true;

}

}
function validate5(){

var value = document.getElementById("tinltw").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){

alert(message);

document.getElementById("tinltw").select();
document.getElementById("tinltw").value="";


return false;

}else{

return true;

}

}
function validate6(){

var value = document.getElementById("tinlfw").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){

alert(message);

document.getElementById("tinlfw").select();
document.getElementById("tinlfw").value="";


return false;

}else{

return true;

}

}
function validate7(){

var value = document.getElementById("tinlow").value;

var message = "Please enter a decimal value";

if(isNaN(value)==true){

alert(message);

document.getElementById("tinlow").select();
document.getElementById("tinlow").value="";


return false;

}else{

return true;

}

}
-->


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
<div style="float: left">Enter the Progress Report Details</div>

<div style="float: right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
print date("jS F Y, g:i A");
?></font></div>
</h1>
<br> <?php
if($work=="Bark Shaving"){
	echo "<form action='verify_prog.php' method='post' enctype='multipart/form-data' id='form1' onsubmit='return check();'><table><tr><td>Lot No: </td><td><input id='inputtext1' type='text' name='lotno' disabled='disabled' value='". $lotno . "(".getExten($ltn,$dvi).")'/></td><td></td></tr>";


	echo "<tr><td>No. of Blazes undergone Bark Shaving : </td><td><input id='inputtext1' type='text' name='nblaze' value='' onkeypress=\"return isNumberKey(event)\" /></td><td></td></tr>";
	echo "<tr><td>No. of Mazdoors Present : </td><td><input id='inputtext1' type='text' name='nmazd' value='' onkeypress=\"return isNumberKey(event)\" /></td><td></td></tr>";
	echo "<tr><td>Remarks: </td><td><TEXTAREA NAME='remark' ROWS='2' COLS='15'></TEXTAREA></td><td></td></tr>";
	echo "</table><input id='inputsubmit1' type='submit' style='background-color:#b6e38e; width: 60px;' name='inputsubmit1' value='Next' /> </form>";
}
else if($work=="Crop Setting"){
	echo "<form action='verify_prog.php' method='post' enctype='multipart/form-data' id='form1' onsubmit='return check1();'><table width=700><tr><td>Lot No: </td><td><input id='inputtext1' type='text' name='lotno' disabled='disabled' value='". $lotno . "(".getExten($ltn,$dvi).")'/></td><td></td></tr>";


	echo "<tr><td>No. of Blazes undergone Crop Setting : </td><td><input id='inputtext1' type='text' name='nblaze' value='' onkeypress=\"return isNumberKey(event)\"/></td><td></td></tr>";
	echo "<tr><td>No. of Mazdoors Present : </td><td><input id='inputtext1' type='text' name='nmazd' value='' onkeypress=\"return isNumberKey(event)\" /></td><td></td></tr>";
	echo "<tr><td>No. of Resin Tins Collected : </td><td><input id='inputtext1' type='text' name='tinc' value='' onkeypress=\"return isNumberKey(event)\"></td><td><input id='tincw' type='text' name='tincw' value=''  onkeyup='javascript:validate();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";

	echo "<tr><td>No. of Resin Filled Tins carried from Forest to RSD : </td><td><input id='inputtext1' type='text' name='tinca' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tincaw' type='text' name='tincaw' value=''  onkeyup='javascript:validate1();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>No. of Resin Filled Tins dispatched to Nahan Factory : </td><td><input id='inputtext1' type='text' name='tind' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tindw' type='text' name='tindw' value=''  onkeyup='javascript:validate2();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>No. of Resin Filled Tins dispatched to Other Factory : </td><td><input id='inputtext1' type='text' name='tindo' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tindow' type='text' name='tindow' value=''  onkeyup='javascript:validate3();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>No. of Resin Tins Lost : </td><td></td><td></td></tr>";
	echo "<tr><td>Fire</td><td><input id='inputtext1' type='text' name='tinlfi' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinlw' type='text' name='tinlfiw' value=''  onkeyup='javascript:validate4();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Theft</td><td><input id='inputtext1' type='text' name='tinlt' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinltw' type='text' name='tinltw' value=''  onkeyup='javascript:validate5();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Flood</td><td><input id='inputtext1' type='text' name='tinlf' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinlfw' type='text' name='tinlfw' value=''  onkeyup='javascript:validate6();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Others</td><td><input id='inputtext1' type='text' name='tinlo' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinlow' type='text' name='tinlow' value=''  onkeyup='javascript:validate7();' /></td></tr>";

	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Remarks: </td><td colspan=2><TEXTAREA NAME='remark' ROWS='5' COLS='15'></TEXTAREA></td><td></td></tr>";

	echo "</table><input id='inputsubmit1' type='submit' style='background-color:#b6e38e; width: 60px;' name='inputsubmit1' value='Next' /> </form>";
}
else{
	echo "<form action='verify_prog.php' method='post' enctype='multipart/form-data' id='form1' onsubmit='return check2();'><table width=700><tr><td>Lot No: </td><td><input id='inputtext1' type='text' name='lotno' disabled='disabled' value='". $lotno . "(".getExten($ltn,$dvi).")'/></td><td></td></tr>";

	echo "<tr><td>No. of Blazes undergone Bark Shaving : </td><td><input id='inputtext1' type='text' name='nblazes' value='' onkeypress=\"return isNumberKey(event)\" /></td><td></td></tr>";

	echo "<tr><td>No. of Blazes undergone Crop Setting : </td><td><input id='inputtext1' type='text' name='nblaze' value='' onkeypress=\"return isNumberKey(event)\" /></td><td></td></tr>";
	echo "<tr><td>No. of Mazdoors Present : </td><td><input id='inputtext1' type='text' name='nmazd' value='' onkeypress=\"return isNumberKey(event)\" /></td><td></td></tr>";
	echo "<tr><td>No. of Resin Tins Collected : </td><td><input id='inputtext1' type='text' name='tinc' value='' onkeypress=\"return isNumberKey(event)\"></td><td><input id='tincw' type='text' name='tincw' value=''  onkeyup='javascript:validate();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";

	echo "<tr><td>No. of Resin Filled Tins carried from Forest to RSD : </td><td><input id='inputtext1' type='text' name='tinca' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tincaw' type='text' name='tincaw' value=''  onkeyup='javascript:validate1();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>No. of Resin Filled Tins dispatched to Nahan Factory : </td><td><input id='inputtext1' type='text' name='tind' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tindw' type='text' name='tindw' value=''  onkeyup='javascript:validate2();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>No. of Resin Filled Tins dispatched to Other Factory : </td><td><input id='inputtext1' type='text' name='tindo' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tindow' type='text' name='tindow' value=''  onkeyup='javascript:validate3();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>No. of Resin Tins Lost : </td><td></td><td></td></tr>";
	echo "<tr><td>Fire</td><td><input id='inputtext1' type='text' name='tinlfi' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinlw' type='text' name='tinlfiw' value=''  onkeyup='javascript:validate4();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Theft</td><td><input id='inputtext1' type='text' name='tinlt' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinltw' type='text' name='tinltw' value=''  onkeyup='javascript:validate5();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Flood</td><td><input id='inputtext1' type='text' name='tinlf' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinlfw' type='text' name='tinlfw' value=''  onkeyup='javascript:validate6();' /></td></tr>";
	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Others</td><td><input id='inputtext1' type='text' name='tinlo' value='' onkeypress=\"return isNumberKey(event)\" /></td><td><input id='tinlow' type='text' name='tinlow' value=''  onkeyup='javascript:validate7();' /></td></tr>";

	echo "<tr><td></td><td><font size=1 color=red>No. of Tins</font></td><td><font size=1 color=red>Weight of Resin(in qntls)</font></td></tr>";
	echo "<tr><td>Remarks: </td><td colspan=2><TEXTAREA NAME='remark' ROWS='5' COLS='15'></TEXTAREA></td><td></td></tr>";


	echo "</table><input id='inputsubmit1' type='submit' style='background-color:#b6e38e; width: 60px;' name='inputsubmit1' value='Next' /> </form>";
}

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
