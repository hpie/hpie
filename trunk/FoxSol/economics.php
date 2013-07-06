<?php 
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
	}
	
if(!isset($_POST['tenblaze']))
exit;


	
	function getExten($lotno,$divi)
{
$q="select exten from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['exten']);



}

require('connectDB.php');


$lotno=$_SESSION['lot'];
$year=$_SESSION['year'];
$divi=$_SESSION['divi'];


$q="select frange  from enum where lotno='".$lotno."' and year='".$year."' and division='".$divi."'";
		$data = mysql_query($q) or die("No table");
		
		$row=mysql_fetch_array($data);
		
		


$numman=(isset($_POST['numman']))?$_POST['numman']:0;
$nummul=(isset($_POST['nummul']))?$_POST['nummul']:0;	
$numtrac=(isset($_POST['numtrac']))?$_POST['numtrac']:0;	
	
		
 $_SESSION['ResinEx']=$_POST['ResinEx'];
 $_SESSION['cropset']=$_POST['cropset'];
 $_SESSION['mancar']=$_POST['mancar'];
 $_SESSION['mulcar']=$_POST['mulcar'];
  $_SESSION['traccar']=$_POST['traccar'];
 $_SESSION['matecom']=$_POST['matecom'];		
  $_SESSION['tool']=$_POST['tool'];	
 

$c=1;
while($c<=$numman)
{

$_SESSION['man'.$c.'Q']=0;
$_SESSION['man'.$c.'D']=0;
$c++;


}




$c=1;
while($c<=$numman)
{

$_SESSION['man'.$c.'Q']=$_POST['man'.$c.'Q'];
$_SESSION['man'.$c.'D']=$_POST['man'.$c.'D'];
$c++;


}


$c=1;
while($c<=$nummul)
{

$_SESSION['mul'.$c.'Q']=0;
$_SESSION['mul'.$c.'D']=0;
$c++;


}


$c=1;
while($c<=$nummul)
{

$_SESSION['mul'.$c.'Q']=$_POST['mul'.$c.'Q'];
$_SESSION['mul'.$c.'D']=$_POST['mul'.$c.'D'];
$c++;


}


$c=1;
while($c<=$numtrac)
{

$_SESSION['trac'.$c.'Q']=0;
$_SESSION['trac'.$c.'D']=0;
$c++;


}


$c=1;
while($c<=$numtrac)
{

$_SESSION['trac'.$c.'Q']=$_POST['trac'.$c.'Q'];
$_SESSION['trac'.$c.'D']=$_POST['trac'.$c.'D'];
$c++;


}





$_SESSION['emptinR']=$_POST['emptinR'];

$_SESSION['emptindis']=$_POST['emptindis'];
$_SESSION['emptinsolR']=$_POST['emptinsolR'];


$_SESSION['trate25']=$_POST['trate25'];
$_SESSION['trateb25']=$_POST['trateb25'];
$_SESSION['distancefact']=$_POST['distancefact'];





$tenblazes=$_REQUEST['tenblaze'];

$curyear=$year;
$yiefixed=$_REQUEST['YieldFixed'];

$totres=round((($tenblazes/1000)*$yiefixed),3);
$_SESSION['emptinnum']=round($tenblazes*$yiefixed/170);
$emptinC=round(($_SESSION['emptinR'] * $_SESSION['emptindis'] * $_SESSION['emptinnum'])/100);
$emptinsolC=round($_SESSION['emptinsolR'] * $_SESSION['emptinnum']);
$_SESSION['tenblaze']=$_REQUEST['tenblaze'];	

$range=$row['frange'];

$cropsetR=$_SESSION['cropset'];
$cropsetC=round($cropsetR * $tenblazes/1000);


$resExRate=$_SESSION['ResinEx'];
$resExCharge=round($resExRate * $totres) ;


//if($tenblazes/1000>4.5)
$addmateR=(($tenblazes/1000)>4.5 and ($totres > 20) )? $_SESSION['matecom']:0;
$addmateC=round($addmateR * $totres);

$manCarR=$_SESSION['mancar'];


$c=1;
$manCarC=array();
$manCarCT=0;
while($c<=$numman)
{
$manCarC[]=round($manCarR * $_SESSION['man'.$c.'D'] * $_SESSION['man'.$c.'Q'],0);
$manCarCT += $manCarC[$c-1];

$c++;


}






$mulCarR=$_SESSION['mulcar'];
$c=1;
$mulCarC=array();
$mulCarCT=0;
while($c<=$nummul)
{
$mulCarC[]=round($mulCarR * $_SESSION['mul'.$c.'D'] * $_SESSION['mul'.$c.'Q'],0);
$mulCarCT += $mulCarC[$c-1];

$c++;


}


$tracCarR=$_SESSION['traccar'];
$c=1;
$tracCarC=array();
$tracCarCT=0;
while($c<=$numtrac)
{
$tracCarC[]=round($tracCarR * $_SESSION['trac'.$c.'D'] * $_SESSION['trac'.$c.'Q'],0);
$tracCarCT += $tracCarC[$c-1];

$c++;


}


$toolrate=$_SESSION['tool'];
$toolcharges=round($toolrate * $totres);

$grandTotal= round($cropsetC + $addmateC + $resExCharge + $manCarCT + $mulCarCT + $tracCarCT + $toolcharges+$emptinsolC+$emptinC) ;
$avgrate="";
if($totres != 0 )
$avgrate= round($grandTotal/$totres,2) ;







$b=0;



$leadManD=array();
while($b<$numman)
{
$leadManD[] =$_SESSION['man'.($b+1).'D'];
$b++;
}




$d=0;



$leadMulD=array();

while($d<$nummul)
{
$leadMulD[] =$_SESSION['mul'.($d+1).'D'];
$d++;
}



$b=0;



$leadManQ=array();
while($b<$numman)
{
$leadManQ[] =$_SESSION['man'.($b+1).'Q'];
$b++;
}




$d=0;



$leadMulQ=array();

while($d<$nummul)
{
$leadMulQ[] =$_SESSION['mul'.($d+1).'Q'];
$d++;
}




$d=0;



$leadtracQ=array();

while($d<$numtrac)
{
$leadtracQ[] =$_SESSION['trac'.($d+1).'Q'];
$d++;
}


$d=0;



$leadtracD=array();

while($d<$numtrac)
{
$leadtracD[] =$_SESSION['trac'.($d+1).'D'];
$d++;
}

$numtin= $_SESSION['emptinnum'];//round($totres / 0.17);
$trate25=$_POST['trate25'];
$trateb25=$_POST['trateb25'];
$distancefact=$_POST['distancefact'];
if($distancefact<=25)
{
$tcharge25=$trate25*$numtin;
$tchargetotal=$tcharge25;
}
elseif($distancefact>25)
{
$tcharge25=$trate25*$numtin;
$tchargeb25=$trateb25 * ($distancefact -25)*$numtin;
$tchargetotal=$tcharge25 + $tchargeb25;
}

$lrate50=$_POST['lrate50'];
$lrateb50=$_POST['lrateb50'];
$distanceload=$_POST['distanceload'];

if($distanceload <=50)
{
$lcharge50=($numtin/100) * $lrate50;
$lchargeb50=0;
}
else
{
$lcharge50=0;
$lchargeb50=($numtin/100) * $lrateb50;
}






$tchargeavg="";
if($totres != 0 )
$tchargeavg= round(($tchargetotal+$lcharge50 + $lchargeb50)/$totres,2) ;


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
			
		<h1><div style="float:left">Proposed Average Rate</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>	
			
		<?php echo 	
			'<br><br><font size=2>Details  for Lot Number '.$lotno.'/'.$curyear.'('.getExten($lotno,$divi).')</font>';
			?>
			<form action='save_economics.php' method='post'>
			 <table border =0>
		 <tr><td>Tentative Number of blazes</td><td><input type = "text" name= "tenblazed" value="<?php echo $tenblazes; ?>" disabled="disabled" /></input></td></tr>
		 
		 
		 <tr><td>Yield Fixed</td><td><input type = "text" name= "YieldFixed" value="<?php echo $yiefixed ;?>" disabled="disabled" /></input></td></tr>
		  <tr><td>Total resin to be extracted in Qtls</td><td><input type = "text" name= "TotalResin" value="<?php echo $totres; ?>" disabled="disabled" /></input></td></tr>
		  <tr><td>Proposed Carriage Upset  Price</td><td><input type="text" value="<?php echo $avgrate ;?>"/></td></tr>
		  <tr><td>Proposed Tranportation Upset  Price</td><td><input type="text" value="<?php echo $tchargeavg ;?>"/></td></tr></table>
			
			
			
			
			
			
			<input type="hidden" name="leadManQ" value="<?php  echo implode($leadManQ,",") ;?>"/>
			<input type="hidden" name="leadMulQ" value="<?php echo implode($leadMulQ,",");?>"/>
			<input type="hidden" name="leadManD" value="<?php  echo implode($leadManD,",") ;?>"/>
			<input type="hidden" name="leadMulD" value="<?php echo implode($leadMulD,",");?>"/>
				<input type="hidden" name="leadtracQ" value="<?php echo implode($leadtracQ,",");?>"/>
			<input type="hidden" name="leadtracD" value="<?php echo implode($leadtracD,",");?>"/>
			<input type="hidden" value="<?php echo $tenblazes ;?>" name="tenblazes" />
			<input type="hidden" value="<?php echo $avgrate ;?>" name="rate" />
			<input type="hidden" value="<?php echo $yiefixed ;?>" name="YieldFixed" />
			<input type="hidden" value="<?php echo $trate25 ;?>" name="trate25" />
			<input type="hidden" value="<?php echo $trateb25 ;?>" name="trateb25" />
			<input type="hidden" value="<?php echo $distancefact ;?>" name="distancefact" />
			<input type="hidden" value="<?php echo $lrate50 ;?>" name="lrate50" />
			<input type="hidden" value="<?php echo $lrateb50 ;?>" name="lrateb50" />
			<input type="hidden" value="<?php echo $distanceload ;?>" name="distanceload" />
			<input type="hidden" value="<?php echo $tchargeavg ;?>" name="tchargeavg" />
			<input type="hidden" value="<?php echo $numman ;?>" name="numman" />
			<input type="hidden" value="<?php echo $nummul ;?>" name="nummul" />
			<input type="hidden" value="<?php echo $numtrac ;?>" name="numtrac" />
			<input type="submit" value="Save and Show Economics" /><br />
			
			</form>
				
				
				
				
				
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
