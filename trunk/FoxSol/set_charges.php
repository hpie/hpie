<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}

require('connectDB.php');

$cropset="";
$mancar="";
 $mulcar="";
  $traccar="";
 $matecom="";		
 
$emptinR="";

$emptinsolR="";




$trate25="";
$trateb25="";


$lrate50="";
$lrateb50="";


$cq="select * from charges limit 1";
$rsq=mysql_query($cq);
if(mysql_num_rows($rsq)==1)
{
$row=mysql_fetch_array($rsq);
$cropset=$row['cropset'];
$mancar=$row['mancar'];
 $mulcar=$row['mulcar'];
  $traccar=$row['traccar'];
 $matecom=$row['matecom'];		
 
$emptinR=$row['emptinR'];

$emptinsolR=$row['emptinsolR'];




$trate25=$row['trate25'];
$trateb25=$row['trateb25'];


$lrate50=$row['lrate50'];
$lrateb50=$row['lrateb50'];
}	




				












?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<script language="javascript"  type="text/javascript">
function check()
{



if(document.forms["form1"]["cropset"].value=="")
{
alert ("Enter the crop setting charges");
return false;

}
else if(document.forms["form1"]["mancar"].value=="")
{
alert ("Enter the Mannual Carriage Charges");
return false;

}
else if(document.forms["form1"]["mulcar"].value=="")
{
alert ("Enter the Mule Carriage Charges");
return false;

}
else if(document.forms["form1"]["traccar"].value=="")
{
alert ("Enter the Tractor Carriage Charges");
return false;

}
else if(document.forms["form1"]["matecom"].value=="")
{
alert ("Enter the Mate Commission Charges");
return false;

}

else if(document.forms["form1"]["emptinR"].value=="")
{
alert ("Enter the Mate Commission Charges");
return false;

}

else if(document.forms["form1"]["emptinsolR"].value=="")
{
alert ("Enter the Mate Commission Charges");
return false;

}

else if(document.forms["form1"]["trate25"].value=="")
{
alert ("Enter the Mate Commission Charges");
return false;

}
else if(document.forms["form1"]["trateb25"].value=="")
{
alert ("Enter the Mate Commission Charges");
return false;

}
else if(document.forms["form1"]["lrate50"].value=="")
{
alert ("Enter the Mate Commission Charges");
return false;

}
else if(document.forms["form1"]["lrateb50"].value=="")
{
alert ("Enter the Mate Commission Charges");
return false;

}
else
return true;



}


 }
    
</script>


<link rel="stylesheet" href="images/FoxSol.css" type="text/css" />

<title>FoxSolutions</title>
	
<style type="text/css">
<!--
.style2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
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
			
				
				<h1><div style="float:left">Enter the Charges</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="save_charges.php">
					<font size="4"><?php 
					echo "Enter the Schedule Rates "; ?></font>
		 <table border =0>
		
		 
		
		 
		
		 <tr><td>Crop Setting Charges per Section</td><td><input type = "text" name= "cropset" value="<?php echo $cropset ; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
		  <tr><td>Mate Commission*</td><td><input type = "text" name= "matecom" value="<?php echo $matecom; ?>" onkeypress="return isNumberKey(event)"/></input></td></tr>
		
		
		  
		
		   <tr><td>Carriage Charges of empty tins from RSD to Forest  per 100 tins</td><td><input type = "text" name= "emptinR" value="<?php echo $emptinR; ?>" onkeyup="return validate();" /></input></td></tr>
		
		   
			
				 <tr><td>Soldering charges for resin tins per tin</td><td><input type = "text" name= "emptinsolR" value="<?php echo $emptinsolR; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
		
		 <tr><td>Mannual Carriage Charges Per Qtls</td><td><input type = "text" name= "mancar" value="<?php echo $mancar; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
		  <tr><td>Mule Carriage Charges Per Qtls</td><td><input type = "text" name= "mulcar" value="<?php echo $mulcar; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
		  <tr><td>Tractor Carriage Charges Per Qtls</td><td><input type = "text" name= "traccar" value="<?php echo $traccar; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
			
			   <tr><td>Transportation Charges upto First 25 Kms</td><td><input type = "text" name= "trate25" value="<?php echo $trate25; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
			<tr><td>Transportation Charges per 1 Km beyond 25 Kms</td><td><input type = "text" name= "trateb25" value="<?php echo $trateb25; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr> 
		
			
			   <tr><td>Loading Charges of resin filled tins per 100 tins upto 50 mts</td><td><input type = "text" name= "lrate50" value="<?php echo $lrate50; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
			<tr><td>Loading Charges of resin filled tins per 100 tins beyond 50 mts upto 100 mtrs</td><td><input type = "text" name= "lrateb50" value="<?php echo $lrateb50; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr> 
		
		 </table>
		 				
	<?php echo '	<br><input id="inputsubmit1" type="submit" style="background-color:#b6e38e; width: 60px;" name="inputsubmit1" value="Next"  />
					<br> ';?>
				<font color="#FF0000">	* No Mate Commission will be provided if number of mazdoors are less than 5 or Collection is less than 20 Qtls.</font></p>

					
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
