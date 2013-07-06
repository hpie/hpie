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


function getTypeArea($lotno,$divi)
{
$q="select type_area from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['type_area']);

}

function getMethEx($lotno,$divi)
{
$q="select extract_method from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['extract_method']);

}

function getRSD($lotno,$divi)
{
$q="select rsd from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['rsd']);

}

function getFrange($lotno,$divi)
{
$q="select frange from lot_desc where lotno='$lotno' and division='$divi'";
$rs=mysql_query($q) or die("error");
$data=mysql_fetch_array($rs);
return ($data['frange']);

}

$lotno=$_SESSION['lot'];
$year=$_SESSION['year'];
$divi=$_SESSION['divi'];


function get_yield_fixed($lotno,$divi,$year)
				{
				
				$qur="select Yield_Fixed  from Yield_Fixed where lotno='$lotno' and year='$year' and division='$divi'";
				$rs=mysql_query($qur);
				$row=mysql_fetch_array($rs);
				if(mysql_num_rows($rs)>0)
				return $row['Yield_Fixed'];
				else
				return null;
				
				
				
				}



	

if(isset($_REQUEST['id']))
$id=$_REQUEST['id'];

$qr="select * from upset_price where lotno='$lotno' and division='$divi' and year='$year' and id='$id'";
$rss=mysql_query($qr) or die();
$sess=mysql_fetch_array($rss);

$numman=$sess['numman'];
$nummul=$sess['nummul'];	
$numtrac=$sess['numtrac'];		

		
$emptinC=round(($sess['emptinR'] * $sess['emptindis'] * $sess['emptinnum'])/100);
$emptinsolC=round($sess['emptinsolR'] * $sess['emptinnum']);

	

$tenblazes=$sess['tenblazes'];

$curyear=$year;
$yiefixed=$sess['yieldfixed'];

$totres=round((($tenblazes/1000)*$yiefixed),3);



$range=getFrange($lotno,$divi);

$cropsetR=$sess['cropsetR'];
$cropsetC=round($cropsetR * $tenblazes/1000);


$resExRate=$sess['ResinEx'];
$resExCharge=round($resExRate * $totres) ;


//if($tenblazes/1000>4.5)

$addmateRC=$sess['matecom'];
$addmateR=(($tenblazes/1000)>4.5 and ($totres > 20) )? $addmateRC:0;
$addmateC=round($addmateR * $totres);


$leadmanD=array();
$leadmanD=explode(",",$sess['leadmanD']);

$leadmanQ=array();
$leadmanQ=explode(",",$sess['leadmanQ']);


$manCarR=$sess['mancar'];


$c=1;
$manCarC=array();
$manCarCT=0;
while($c<=$numman)
{
$manCarC[]=round($manCarR * $leadmanD[$c-1]*$leadmanQ[$c-1],0);
$manCarCT += $manCarC[$c-1];

$c++;


}



$leadmulD=array();
$leadmulD=explode(",",$sess['leadmulD']);

$leadmulQ=array();
$leadmulQ=explode(",",$sess['leadmulQ']);


$mulCarR=$sess['mulcar'];

$c=1;
$mulCarC=array();
$mulCarCT=0;
while($c<=$nummul)
{
$mulCarC[]=round($mulCarR * $leadmulD[$c-1]*$leadmulQ[$c-1],0);
$mulCarCT += $mulCarC[$c-1];

$c++;


}




$leadtracD=array();
$leadtracD=explode(",",$sess['leadtracD']);

$leadtracQ=array();
$leadtracQ=explode(",",$sess['leadtracQ']);


$tracCarR=$sess['traccar'];

$c=1;
$tracCarC=array();
$tracCarCT=0;
while($c<=$numtrac)
{
$tracCarC[]=round($tracCarR * $leadtracD[$c-1]*$leadtracQ[$c-1],0);
$tracCarCT += $tracCarC[$c-1];

$c++;


}


$toolrate=$sess['tool'];
$toolcharges=round($toolrate * $totres);

$grandTotal= round($cropsetC + $addmateC + $resExCharge + $manCarCT + $mulCarCT + $tracCarCT + $toolcharges+$emptinsolC+$emptinC) ;
$avgrate="";
if($totres != 0 )
$avgrate= round($grandTotal/$totres,2) ;


$numtin= $sess['emptinnum'];//round($totres / 0.17);
$trate25=$sess['trate25'];
$trateb25=$sess['trateb25'];
$distancefact=$sess['distancefact'];
$tcharge25=0;
$tchargeb25=0;
$tchargetotal=0;
$lcharge50=0;
$lchargeb50=0;
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

$lrate50=$sess['lrate50'];
$lrateb50=$sess['lrateb50'];
$distanceload=$sess['distanceload'];


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





<title>FoxSolutions</title>

</head>

<body>
<!-- wrap starts here -->
	
		
			
				<table border="1" align="center" >
				
  <tr>
    <td colspan="5"><div align="center" class="style1"> <input type="button" onclick="javascript:window.location.assign('client.php')" value="Back" /> <span class="style4"><strong>HIMACHAL PRADESH STATE FOREST CORPORATION LIMITED</strong></span><input type="button" onclick="print()" value="Print" /><br />
  <strong>ECONOMICS FOR RESIN LOT NO. <?php echo $lotno."/".$year."(".getExten($lotno,$divi).")" ; ?></strong></div></td>
  </tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>1.</strong></span></div></td>
    <td colspan="3"><div align="left"><span class="style3">Type of area </span></div></td>
    <td><?php  echo getTypeArea($lotno,$divi) ; ?></td>
  </tr>
  <tr>
    <td width="56"><div align="right"><span class="style5"><strong>2.</strong></span></div></td>
    <td  colspan="3"><div align="left"><span class="style3">Tentative No. of resin blazes </span></div></td>
    <td width="108"><?php echo $tenblazes ; ?></td>
  </tr>
   <tr>
    <td width="56"><div align="right"><span class="style5"><strong>3.</strong></span></div></td>
    <td  colspan="3"><div align="left"><span class="style3">Number of Sections </span></div></td>
    <td width="108"><?php echo round($tenblazes/1000 , 0) ; ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>4.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Method of resin extraction </span></div></td>
    <td><?php echo getMethEx($lotno,$divi);  ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>5.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Yield fixed for <?php echo $curyear ; ?> resin season per Section(Qtls)</span></div></td>
    <td><?php echo $yiefixed   ; ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>6.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Name of RSDs </span></div></td>
    <td><?php echo  getRSD($lotno,$divi) ; ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>7.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Total quantity of resin likelly to be extracted as per yield fixed(Qtls)		
 </span></div></td>
    <td><?php echo  $totres  ; ?></td>
  </tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>8.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Carriage of <?php echo $sess['emptinnum']; ?> Number of empty tins from RSD to Forest over distance <?php echo $sess['emptindis']; ?> KMs @ <?php echo $sess['emptinR']; ?> per 100 tins		
 </span></div></td>
    <td><?php echo  $emptinC ; ?></td>
  </tr>
  
  
   <tr>
    <td><div align="right"><span class="style5"><strong>9.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Soldering of  <?php echo $sess['emptinnum']; ?> Number of Resin Filled  tins @ <?php echo $sess['emptinsolR']; ?>  per tin		
 </span></div></td>
    <td><?php echo  $emptinsolC ; ?></td>
  </tr>
 <tr> <td><div align="right"><span class="style5"><strong>10.</strong></span></div></td> <td><strong> Average distance  from forest to RSD (as per lead certificate):	</strong></td>
 <td><strong>Quantity in Qtls</strong></td>
 <td><strong>Distance in Kms.</strong></td>
 <td><strong>Amount</strong></td>
 </tr>
<?php 	
$c=0;
$manCarQ=0;
while($c<$numman)
{
echo '<tr><td>&nbsp;</td><td>Mannual Carriage</td><td>'. $leadmanQ[$c].'</td><td>'.$leadmanD[$c].'  </td><td>'. round($leadmanQ[$c] *$leadmanD[$c] * $manCarR).' </td></tr>';
$manCarQ += $leadmanQ[$c];
$c++;
}

if($manCarQ!=0)
{	
	echo '<tr><td>&nbsp;</td><td> <strong>Total Mannual Carriage</strong></td>
	<td>'.$manCarQ.'</td><td> </td><td>'. $manCarCT .'</td></tr>';
}
else
echo '<tr><td>&nbsp;</td><td colspan=4>No Mannual Carriage Details</td></tr>';
 ?>
 
 
<?php 	
$c=0;
$mulCarQ=0;
while($c<$nummul)
{
echo '<tr><td>&nbsp;</td><td>Mule Carriage</td><td>'. $leadmulQ[$c].'</td><td>'.$leadmulD[$c].'  </td><td>'. round($leadmulQ[$c] *$leadmulD[$c] * $mulCarR).' </td></tr>';
$mulCarQ += $leadmulQ[$c];
$c++;
}

if($mulCarQ!=0)
{	
	echo '<tr><td>&nbsp;</td><td> <strong>Total Mule Carriage</strong></td>
	<td>'.$mulCarQ.'</td><td> </td><td>'. $mulCarCT .'</td></tr>';
}
else
echo '<tr><td>&nbsp;</td><td colspan=4>No Mule Carriage Details</td></tr>';
 ?>
	

 
 
 
<?php 	
$c=0;
$tracCarQ=0;
while($c<$numtrac)
{
echo '<tr><td>&nbsp;</td><td>Tractor Carriage</td><td>'. $leadtracQ[$c].'</td><td>'.$leadtracD[$c].'  </td><td>'. round($leadtracQ[$c] *$leadtracD[$c] * $tracCarR).' </td></tr>';
$tracCarQ += $leadtracQ[$c];
$c++;
}

if($tracCarQ!=0)
{	
	echo '<tr><td>&nbsp;</td><td> <strong>Total Tractor Carriage</strong></td>
	<td>'.$tracCarQ.'</td><td> </td><td>'. $tracCarCT .'</td></tr>';
}
else
echo '<tr><td>&nbsp;</td><td colspan=4>No Tractor Carriage Details</td></tr>';
 ?>
 
 
 
 
  <tr>
    <td><div align="right"><span class="style5"><strong>11. </strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style5"><strong>RESIN EXTRACTION CHARGES As Per SSR </strong></span></div></td>
    <td><strong>RATE(Rs)</strong></td>
	<td><strong>AMOUNT(Rs)</strong></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>A.</strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style3">Crop setting charges per Section
     <td> <?php  echo "$cropsetR " ; ?> </td> 
   
    <td><?php  echo "$cropsetC " ; ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>B. </strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style3">Resin extraction charges per Qtls.</span></div></td>
	<td><?php echo $resExRate ;?>
    <td><?php  echo "$resExCharge " ; ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>C.</strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style3">Add. Mate commission per Qtls if no. of majdoors are not less than 5(five)
 </span></div></td>
     <td> <?php echo $sess['matecom'] ; ?></td>
    
    <td><?php  echo " $addmateC" ; ?></td>
  </tr>
  <tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>D.</strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style3">Carriage of resin from forest to RSD by Mannual per km./ quintal 

 </span></div></td>
     <td> <?php echo $manCarR ; ?></td>
    
    <td><?php  echo " $manCarCT " ; ?></td>
  </tr>
  <tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>E.</strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style3">Cariage of resin by Mule per km/quintal


 </span></div></td>
     <td> <?php echo $mulCarR ; ?></td>
    
    <td><?php  echo " $mulCarCT " ; ?></td>
  </tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>F.</strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style3">Cariage of resin by Tractor per km/quintal


 </span></div></td>
     <td> <?php echo $tracCarR ; ?></td>
    
    <td><?php  echo " $tracCarCT " ; ?></td>
  </tr>
  <tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>G.</strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style3">Add element of tools and implements i.e., lips /pots etc. per quintal</span></div></td>
     <td> <?php  echo "$toolrate " ; ?></td> 
      
     
   
    <td><?php  echo "$toolcharges " ; ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>H.</strong></span></div></td>
    <td colspan="3"><div align="left"><span class="style3">Grand Total </span></div></td>
    <td><?php  echo "$grandTotal" ; ?></td>
  </tr>
  <tr>
    <td><div align="right"><span class="style5"><strong>I.</strong></span></div></td>
    <td colspan="3"><div align="left"><span class="style3"><strong>Average rate per Qtls. </strong></span></div></td>
    <td><strong><?php echo  "$avgrate" ; ?></strong></td>
  </tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>12. </strong></span></div></td>
    <td colspan="2"><div align="left"><span class="style5"><strong>RESIN TRANSPORTATION CHARGES As Per SSR </strong></span></div></td></tr>
	
	 <tr>
    <td><div align="right"><span class="style5"><strong>A.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Loading Charges of <?php echo $sess['emptinnum']; ?> Number of resin filled tins over distance  <?php echo $sess['distanceload']; echo "@ Rs.". $sess['lrate50']." upto 50 mtrs or Rs.". $sess['lrateb50']." beyond 50 upto 100 mtrs per 100 tins"; ?> 
 </span></div></td>
    <td><?php echo $lcharge50 + $lchargeb50  ; ?></td>
  </tr>
	
	
   <tr>
    <td><div align="right"><span class="style5"><strong>A.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Transportation charges of <?php echo $sess['emptinnum']; ?> Number of resin filled tins from RSD to R & T for first 25 kms  @ <?php echo $sess['trate25']; ?> 
 </span></div></td>
    <td><?php echo $tcharge25  ; ?></td>
  </tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>B.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Transportation charges of <?php echo $sess['emptinnum']; ?> Number of resin filled tins from RSD to R & T beyond 25 kms  @ <?php echo $sess['trateb25']; ?> per 1 Km 
 </span></div></td>
    <td><?php echo $tchargeb25  ; ?></td>
  </tr>
   <tr>
    <td><div align="right"><span class="style5"><strong>C.</strong></span></div></td>
    <td colspan="3"><div align="left" ><span class="style3">Total Transportation charges
 </span></div></td>
    <td><?php echo $tchargetotal; ?></td>
  </tr>
	 <tr>
    <td><div align="right"><span class="style5"><strong>D.</strong></span></div></td>
    <td colspan="3"><div align="left"><span class="style3"><strong>Average Loading/Tranportation rate per Qtls. </strong></span></div></td>
    <td><strong><?php echo  $tchargeavg ; ?></strong></td>
  </tr>
			</table>	
				
			</body>
</html>
