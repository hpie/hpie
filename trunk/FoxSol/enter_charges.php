<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}

require('connectDB.php');
function getExten($lotno,$divi)
{
$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['exten']);

}

function getTypeAr($lotno,$divi)
{
$q="select type_area from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['type_area']);

}



function get_yield_fixed($lotno,$divi,$year)
				{
				
				$qur="select yield_fixed  from yield_fixed where lotno='$lotno' and year='$year' and division='$divi'";
				$rs=mysql_query($qur);
				$row=mysql_fetch_array($rs);
				if(mysql_num_rows($rs)>0)
				return $row['yield_fixed'];
				else
				return null;
				
				
				
				}
				
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
else
{
{
echo '<script type="text/javascript">
			alert("Ask your administrator to enter the SSR rate first");
						window.location = "create_economy.php";
			</script>';
			

}


}			
				
$lot = $_POST['lot'];
$year=$_POST['year'];
$divi=$_POST['divi'];


if(get_yield_fixed($lot,$divi,$year)==null)
{
echo '<script type="text/javascript">
			alert("First Enter the Yield Fixed for this lot");
						window.location = "create_economy.php";
			</script>';
			

}

$_SESSION['lot']=$lot;
$_SESSION['year']=$year;
$_SESSION['divi']=$divi;
$q="select count(*) as num from upset_price where lotno='$lot' and year='$year' and division='$divi'";
$dm=mysql_query($q) or die();
$nums=mysql_fetch_array($dm);
if($nums['num']>0)
{
echo '<script type="text/javascript">
			var res=confirm ("Economics already generated. Click OK to view Economics and Click Cancel to create new economics");
			if(res)
			window.location = "show_economics.php";
			
			</script>';
			

}



$q="select count(*) as num from enum where lotno='".$lot."' and year='".$year."' and division='".$divi."'";
		$data = mysql_query($q) or die("No table");
		
		$row=mysql_fetch_array($data);
		if($row['num']==0)
		{
		echo '<script type="text/javascript">
			alert ("No details found for selected lot in Enumeration List");
			window.location = "index.php"
			</script>';
		}
		

$_SESSION['lot']=$lot;
$_SESSION['year']=$year;
$_SESSION['divi']=$divi;

$yiefixed=get_yield_fixed($lot,$divi,$year);;

$q="select sum(blazen) as sum from enum where lotno='".$lot."' and year='".$year."' and division='".$divi."'";
		$data = mysql_query($q) or die("No table");
		
		$row=mysql_fetch_array($data);
$tenblazes=$row['sum'];
$totres=round((($tenblazes/1000)*$yiefixed),3);

$numtin=round($totres*100/17,0);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<script src="includes/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript"  type="text/javascript">
function check()
{
var totalresin=(document.forms["form1"]["totalresin"].value!="")?parseInt(document.forms["form1"]["totalresin"].value,10):0;
var man1=(document.forms["form1"]["man1Q"].value!="")?parseInt(document.forms["form1"]["man1Q"].value,10):0;
var man2=(document.forms["form1"]["man2Q"].value!="")?parseInt(document.forms["form1"]["man2Q"].value,10):0;
var man3=(document.forms["form1"]["man3Q"].value!="")?parseInt(document.forms["form1"]["man3Q"].value,10):0;
var man4=(document.forms["form1"]["man4Q"].value!="")?parseInt(document.forms["form1"]["man4Q"].value,10):0;
var summan=man1+man2+man3+man4;

var mul1=(document.forms["form1"]["mul1Q"].value!="")?parseInt(document.forms["form1"]["mul1Q"].value,10):0;
var mul2=(document.forms["form1"]["mul2Q"].value!="")?parseInt(document.forms["form1"]["mul2Q"].value,10):0;
var mul3=(document.forms["form1"]["mul3Q"].value!="")?parseInt(document.forms["form1"]["mul3Q"].value,10):0;
var mul4=(document.forms["form1"]["mul4Q"].value!="")?parseInt(document.forms["form1"]["mul4Q"].value,10):0;
var summul=mul1+mul2+mul3+mul4;


var trac1=(document.forms["form1"]["trac1Q"].value!="")?parseInt(document.forms["form1"]["trac1Q"].value,10):0;
var trac2=(document.forms["form1"]["trac2Q"].value!="")?parseInt(document.forms["form1"]["trac2Q"].value,10):0;
var trac3=(document.forms["form1"]["trac3Q"].value!="")?parseInt(document.forms["form1"]["trac3Q"].value,10):0;
var trac4=(document.forms["form1"]["trac4Q"].value!="")?parseInt(document.forms["form1"]["trac4Q"].value,10):0;
var sumtrac=trac1+trac2+trac3+trac4;
if(document.forms["form1"]["YieldFixed"].value=="")
{
alert ("Yield for the selected lot is not set yet. Enter the Approved Yield First");
return false;
}
if(document.forms["form1"]["ResinEx"].value=="")
{

alert("Enter the resin extraction charges");
return false;
}
else if(document.forms["form1"]["cropset"].value=="")
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
else if(document.forms["form1"]["tool"].value=="")
{
alert ("Enter the Add Element tool Charges");
return false;

}
else if(document.forms["form1"]["man1Q"].value=="" || document.forms["form1"]["man1D"].value=="" )
{
alert ("Enter the Mannual Distance values");
return false;

}

else if(summan > totalresin )
{
alert ("Mannual Carriage Quantity Exceeding the total quantity");
return false;

}

else if(summul > totalresin )
{
alert ("Mule Carriage Quantity Exceeding the total quantity");
return false;

}

else if(sumtrac >totalresin)
{
alert ("Tractor Carriage Quantity Exceeding the total quantity");
return false;

}


else
return true;



}

function putyield()
{
var numblaze=document.forms["form1"]["tenblaze"].value;
var yield=document.forms["form1"]["YieldFixed"].value;
document.forms["form1"]["totalresin"].value=(numblaze * yield)/1000;
document.forms["form1"]["emptinnum"].value=Math.round((numblaze*yield)/170);

}



$(document).ready(function(){
			
				$('#checkman').click(function(){
				var isChecked = $('#checkman').attr('checked')?true:false;

					if(isChecked)
					{
					$('#numValueMan,#Man').show();
					$('#displayMan').empty();
					
					}
					else
					$('#numValueMan,#Man').hide();
					$('#displayMan').empty();
					});
				$('#numValueMan').keyup(function(){
					sendValueMan($(this).val());	
				});	
				
				
				
				
				$('#checkmul').click(function(){
				var isCheckedMul = $('#checkmul').attr('checked')?true:false;

					if(isCheckedMul)
					{
					$('#numValueMul,#Mule').show();
					$('#displayMul').empty();
					
					}
					else
					$('#numValueMul,#Mule').hide();
					$('#displayMul').empty();
					
					});
				$('#numValueMul').keyup(function(){
					sendValueMul($(this).val());	
				});	
				
				
				
				
					$('#checktrac').click(function(){
				var isCheckedTrac = $('#checktrac').attr('checked')?true:false;

					if(isCheckedTrac)
					{
					$('#numValueTrac,#Trac').show();
					$('#displayTrac').empty();
					
					}
					else
					$('#numValueTrac,#Trac').hide();
					$('#displayTrac').empty();
					
					});
				$('#numValueTrac').keyup(function(){
					sendValueTrac($(this).val());	
				});	
				
				
				
				
				
				
				
				
				
			});
			
			function sendValueMan(str){
				
				$.post("ajaxman.php", { sendToValue: str },
				function(data){
				    $('#displayMan').html(data);
				});
			}
			
			function sendValueMul(str){
			
				$.post("ajaxmul.php", { sendToValue: str },
				function(data){
				    $('#displayMul').html(data);
				});
			}

			
			function sendValueTrac(str){
			
				$.post("ajaxtrac.php", { sendToValue: str },
				function(data){
				    $('#displayTrac').html(data);
				});
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
				<form  method="post" enctype="multipart/form-data" name="form1" onsubmit="return check();" action="economics.php">
					<font size="4"><?php 
					echo "Enter the details for Lot Number ". $lot."/".$year."(" .getExten($lot,$divi).") from SSR "; ?></font>
		 <table border =0>
		 <tr><td>Tentative Number of blazes</td><td><input type = "text" name= "tenblaze" value="<?php echo $tenblazes; ?>" onkeyup="putyield();" onblur="putyield();" /></input></td></tr>
		 <tr><td>Type of Area</td><td><input type = "text" name= "type_area" value="<?php echo getTypeAr($lot,$divi); ?>"  /></input></td></tr>
		 
		 <tr><td>Yield Fixed</td><td><input type = "text" name= "YieldFixed1" value="<?php echo get_yield_fixed($lot,$divi,$year) ;?>" disabled=disabled /></input></td></tr><input type = "hidden" name= "YieldFixed" value="<?php echo get_yield_fixed($lot,$divi,$year) ;?>" />
		  <tr><td>Total quantity of resin likely to be extracted as per yield fixed(Qtls)		
</td><td><input type = "text" name= "totalresin" value="<?php echo $totres; ?>" disabled=disabled /></input></td></tr>
		 <tr><td>Resin Extraction Charges Per Qtls</td><td><input type = "text" name= "ResinEx" value="" onkeypress="return isNumberKey(event)"/></input></td></tr>
		 <tr><td>Crop Setting Charges per Section</td><td><input type = "text" name= "cropset" value="<?php echo $cropset ; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
		  <tr><td>Mate Commission*</td><td><input type = "text" name= "matecom" value="<?php echo $matecom; ?>" onkeypress="return isNumberKey(event)"/></input></td></tr>
		
		
		  
		  <tr><td>Add Element of tools Per Qtls</td><td><input type = "text" name= "tool" value="" onkeypress="return isNumberKey(event)" /></input></td></tr>
		   <tr><td>Carriage Charges of empty tins from RSD to Forest  per 100 tins</td><td><input type = "text" name= "emptinR" value="<?php echo $emptinR; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
		    <tr><td>Number of empty tins carried from RSD to Forest</td><td><input type = "text" name= "emptinnum" value="<?php echo $numtin ; ?>" onkeypress="return isNumberKey(event)" disabled=disabled /></input></td></tr>
		    <tr><td>Carriage distance for non empty tins from RSD to Forest</td><td><input type = "text" name= "emptindis" value="" onkeypress="return isNumberKey(event)" /></input></td></tr>
			
				 <tr><td>Soldering charges for resin tins per tin</td><td><input type = "text" name= "emptinsolR" value="<?php echo $emptinsolR; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
		 <tr><td colspan=2>&nbsp;</td></tr>
		 <tr><td colspan=2>Check this checkbox to enter  Mannual carriage details <input type="checkbox" id="checkman" name="checkman" value="1"></input></td></tr></table>
	<span id="Man"	style="display:none">	 <strong>Enter the number of lead distances  <input type="text" name="numValueMan" value="" id="numValueMan" style="display:none"></strong><br /><br />
		 Mannual Carriage Charges Per Qtls<input type = "text" name= "mancar" value="<?php echo $mancar; ?>" onkeypress="return isNumberKey(event)" /></input></span>
		   
		   <div id="displayMan"></div>
		  
			 
			<table> <tr><td colspan=2>&nbsp;</td></tr> 
			 <tr><td colspan=2>Check this checkbox to enter any Mule carriage details <input type="checkbox" id="checkmul" name="checkmul" value="1"></input></td></tr></table>
	<span id="Mule"	style="display:none">	 <strong>Enter the number of lead distances  <input type="text" name="numValueMul" value="" id="numValueMul" style="display:none"></strong><br /><br />
		 Mule Carriage Charges Per Qtls<input type = "text" name= "mulcar" value="<?php echo $mulcar; ?>" onkeypress="return isNumberKey(event)" /></input></span>
		   
		   <div id="displayMul"></div>
			 
			 
			 <table> <tr><td colspan=2>&nbsp;</td></tr> 
			 <tr><td colspan=2>Check this checkbox to enter any Tractor carriage details <input type="checkbox" id="checktrac" name="checktrac" value="1"></input></td></tr></table>
	<span id="Trac"	style="display:none">	 <strong>Enter the number of lead distances  <input type="text" name="numValueTrac" value="" id="numValueTrac" style="display:none"></strong><br /><br />
		 Tractor Carriage Charges Per Qtls<input type = "text" name= "traccar" value="<?php echo $traccar; ?>" onkeypress="return isNumberKey(event)" /></input></span>
		   
		   <div id="displayTrac"></div>
			 
			<table>  <tr><td colspan=2> <strong>Enter the Tranportation Details</strong></td>
			   <tr><td>Transportation Charges upto First 25 Kms</td><td><input type = "text" name= "trate25" value="<?php echo $trate25; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
			<tr><td>Transportation Charges per 1 Km beyond 25 Kms</td><td><input type = "text" name= "trateb25" value="<?php echo $trateb25; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr> 
			<tr><td>Distance of R & T Factory from RSD</td><td><input type = "text" name= "distancefact" value="" onkeypress="return isNumberKey(event)" /></input></td></tr>
			 <tr><td colspan=2> <strong>Enter the Loading Details</strong></td>
			   <tr><td>Loading Charges of resin filled tins per 100 tins upto 50 mts</td><td><input type = "text" name= "lrate50" value="<?php echo $lrate50; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr>
			<tr><td>Loading Charges of resin filled tins per 100 tins beyond 50 mts upto 100 mtrs</td><td><input type = "text" name= "lrateb50" value="<?php echo $lrateb50; ?>" onkeypress="return isNumberKey(event)" /></input></td></tr> 
			<tr><td>Distance for Loading</td><td><input type = "text" name= "distanceload" value="" onkeypress="return isNumberKey(event)" /></input></td></tr>
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
