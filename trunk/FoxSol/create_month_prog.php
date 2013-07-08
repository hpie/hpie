<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client'))
{
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

if(isset($_POST['month']) && ($_POST['year']))
{
	$yr=$_POST['year'];
	$mon=$_POST['month'];
	//TODO:Sunil
	//$querty1="SELECT DISTINCT lotno, division FROM verify WHERE year='$yr' AND division='Shimla'";
	//	$querty1="SELECT DISTINCT lotno, division FROM verify WHERE year='$yr' AND division='".$_SESSION['fwd']."'";
	$querty1="SELECT DISTINCT lotno, division FROM verify WHERE year='$yr'";
	$dato89 = mysql_query($querty1);
	//TODO:Sunil
	//$querty999="SELECT DISTINCT lotno, division FROM verify WHERE year='$yr' AND division!='Shimla'";
	//	$querty999="SELECT DISTINCT lotno, division FROM verify WHERE year='$yr' AND division!='".$_SESSION['fwd']."'";
	$querty999="SELECT DISTINCT lotno, division FROM verify WHERE year='$yr'";
	$dato999 = mysql_query($querty999);

	//TODO:Sunil
	//$querty="SELECT * FROM verify WHERE year='$yr' AND division='Shimla'";
	//	$querty="SELECT * FROM verify WHERE year='$yr' AND division='".$_SESSION['fwd']."'";
	$querty="SELECT * FROM verify WHERE year='$yr'";
	$dato = mysql_query($querty);

	$result89 = mysql_num_rows($dato);
	$result = mysql_num_rows($dato89);
	$resulto = mysql_num_rows($dato999);

	//TODO:Sunil
	//$querty2="SELECT * FROM verify WHERE year='$yr' AND division!='Shimla'";
	//	$querty2="SELECT * FROM verify WHERE year='$yr' AND division!='".$_SESSION['fwd']."'";
	$querty2="SELECT * FROM verify WHERE year='$yr'";
	$dato90 = mysql_query($querty2);

	$result99 = mysql_num_rows($dato90);

	if($result89 !=0 && $result !=0)
	{
		$lotno=array();
		/*$frange=array();
		 $nblazes=array();
		 $nmazdoor=array();
		 $remarka=array();
		 $tinc=array();
		 $tinca=array();
		 $tind=array();
		 $tindo=array();
		 $tinl=array();*/
		$divi=array();
		$i=0;
		while($info33 = mysql_fetch_array( $dato89 ))
		{
			$lotno[]=$info33['lotno'];
			/*$frange[]=$info33['frange'];
			 $nblazes[]=$info33['nblazes'];
			 $nmazdoor[]=$info33['nmazdoor'];
			 $remarka[]=$info33['remark'];
			 $tinc[]=$info33['tin_collect'];
			 $tinca[]=$info33['tin_carried'];
			 $tind[]=$info33['tin_dispatch'];
			 $tindo[]=$info33['tin_dispatch_o'];
			 $tinl[]=$info33['tin_lost_fi'];*/
			$divi[]=$info33['division'];
			$i=$i+1;
		}
	}
	if($result99 !=0 && $resulto !=0)
	{
		$lotnos=array();
		/*$franges=array();
		 $nblazess=array();
		 $nmazdoors=array();
		 $remarkas=array();
		 $tincs=array();
		 $tincas=array();
		 $tinds=array();
		 $tindos=array();
		 $tinls=array();*/
		$divis=array();

		while($info76 = mysql_fetch_array( $dato999 ))
		{
			$lotnos[]=$info76['lotno'];
			/*$franges[]=$info76['frange'];
			 $nblazess[]=$info76['nblazes'];
			 $nmazdoors[]=$info76['nmazdoor'];
			 $remarkas[]=$info76['remark'];
			 $tincs[]=$info76['tin_collect'];
			 $tincas[]=$info76['tin_carried'];
			 $tinds[]=$info76['tin_dispatch'];
			 $tindos[]=$info76['tin_dispatch_o'];
			 $tinls[]=$info76['tin_lost_fi'];*/
			$divis[]=$info76['division'];

		}
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>FoxSolutions</title>

</head>

<body>


<center>
<table>
	<tr>
		<td><input type="button"
			onclick="javascript:window.location.assign('client.php')"
			value="Back" /></td>
		<td><input type="button" name="but" onclick="print()"
			value="Print this Monthly Report" /></td>
	</tr>
</table>
<h1>MONTHLY PROGRESS REPORT OF RESIN TAPPING AND CARRIAGE FOR THE MONTH
OF <?php echo $mon . "/" . $yr; ?>(Govt). IN RESPECT OF FOREST WORKING
DIVISION,<?php echo strtoupper($_SESSION['fwd']); ?></h1>
</center>
<table width="1000" border="1">
	<tr>
		<th width="30" scope="col" rowspan="3">S.No.</th>
		<th width="8" scope="col" rowspan="3">Lot No.</th>
		<th width="18" scope="col" rowspan="3">No. of Blazes Tapped last year
		</th>
		<th width="18" scope="col" rowspan="3">No. of Blazes Verified for
		Current year</th>
		<th width="18" scope="col" colspan="3">No.of Blazes Taken Over this
		Year</th>
		<th width="18" scope="col" colspan="2">No. of Mazdoors</th>
		<th width="18" scope="col" rowspan="3">Total Target Weight</th>
		<th width="18" scope="col" rowspan="3">Target Per Section</th>
		<th width="18" scope="col" colspan="6">Resin Collection</th>
		<th width="18" scope="col" colspan="2">Yield Per Section</th>
		<th width="18" scope="col" colspan="6">Carriage From Forest to RSD</th>
		<th width="18" scope="col" colspan="6">Resin Despatched to R&amp;T
		Nahan Factory</th>
		<th width="18" scope="col" colspan="2">Despatched to Other Factory</th>
		<th width="18" scope="col" colspan="8">Losses if Any</th>
		<th width="18" scope="col" colspan="4">Balance Resin</th>
		<th width="18" scope="col" rowspan="3">Remark</th>
	</tr>
	<tr>
		<td rowspan="2">No. of Blazes Tapped</td>
		<td rowspan="2">No.of Blazes Untapped</td>
		<td rowspan="2">Total</td>
		<td rowspan="2">Required</td>
		<td rowspan="2">Present</td>
		<td colspan="2">Previous</td>
		<td colspan="2">Current</td>
		<td colspan="2">Total</td>
		<td rowspan="2">Last Year</td>
		<td rowspan="2">Current Year</td>
		<td colspan="2">Previous</td>
		<td colspan="2">Current</td>
		<td colspan="2">Total</td>
		<td colspan="2">Previous</td>
		<td colspan="2">Current</td>
		<td colspan="2">Total</td>
		<td rowspan="2">No.of Tins</td>
		<td rowspan="2">Weight in Qui</td>
		<td colspan="2">Fire</td>
		<td colspan="2">Flood</td>
		<td colspan="2">Theft</td>
		<td colspan="2">Other</td>
		<td colspan="2">In RSD</td>
		<td colspan="2">At Forest</td>

	</tr>
	<tr>
		<td>No. of Tins</td>
		<td>Weight In Qui</td>
		<td>No. of Tins</td>
		<td>Weight in Qui</td>
		<td>No. of Tins</td>
		<td>Weight in Qui</td>
		<td>No.of Tins</td>
		<td>Weight in Qui</td>
		<td>No. of Tins</td>
		<td>Weight in Qui</td>
		<td>No.of Tins</td>
		<td>Weight in qui</td>
		<td>No.of Tins</td>
		<td>Weight in qui</td>
		<td>No.of Tins</td>
		<td>Weight in qui</td>
		<td>No.of Tins</td>
		<td>Weight in qui</td>
		<td>No. of Tins</td>
		<td>Weight in Qui.</td>
		<td>No. of Tins</td>
		<td>Weight in Qui.</td>
		<td>No. of Tins</td>
		<td>Weight in Qui.</td>
		<td>No. of Tins</td>
		<td>Weight in Qui.</td>
		<td>No. of Tins</td>
		<td>Weight in Qui.</td>
		<td>No. of Tins</td>
		<td>Weight in Qui.</td>
	</tr>
	<?php
	$ttl1=0;
	$ttl2=0;
	$ttl3=0;
	$ttl4=0;
	$ttl5=0;
	$ttl6=0;
	$ttl7=0;
	$ttl8=0;
	$ttl9=0;
	$ttl10=0;
	$ttl11=0;
	$ttl12=0;
	$ttl13=0;
	$ttl14=0;
	$ttl15=0;
	$ttl16=0;
	$ttl17=0;
	$ttl18=0;
	$ttl19=0;
	$ttl20=0;
	$ttl21=0;
	$ttl22=0;
	$ttl23=0;
	$ttl24=0;
	$ttl25=0;
	$ttl26=0;
	$ttl27=0;
	$ttl28=0;
	$ttl29=0;
	$ttl30=0;
	$ttl31=0;
	$ttl32=0;
	$ttl33=0;
	$ttl34=0;
	$ttl35=0;
	$ttl36=0;
	$ttl37=0;
	$ttl38=0;
	$ttl39=0;
	$ttl40=0;
	$ttl41=0;
	$ttl42=0;


	if($result89 !=0 && $result !=0)
	{

		for($i=0; $i<$result; $i++)
		{
			$k=$i+1;
			$yra=$yr-1;
			$currlotno=addslashes($lotno[$i]);
			//echo("<tr><td colspan='46'><b>Lot [ ".$currlotno." ]     DFO ".$divi[$i]."</b></td></tr>");
			$dato1 = mysql_query("SELECT SUM(nblazes) As blazetotal FROM tap_store WHERE year='$yra' AND lotno='$currlotno' AND division='$divi[$i]'");

			$dato12 = mysql_query("SELECT * FROM tap_store WHERE year='$yra' AND lotno='$currlotno' AND division='$divi[$i]'");
			$result6 = mysql_num_rows($dato12);
			if($result6==0)
			{
				$sum2 = 0;
			}
			else{
				while($info99 = mysql_fetch_array( $dato1 ))
				{
					$sum2=$info99['blazetotal'];
				}
			}
			$dato2 = mysql_query("SELECT SUM(blaze) As blazetotal FROM verify WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]'");
			$dato13 = mysql_query("SELECT * FROM verify WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]'");
			$result7 = mysql_num_rows($dato13);
			if($result7==0)
			{
				$sum3 =0;
			}
			else{
				while($info98 = mysql_fetch_array( $dato2 ))
				{
					$sum3=$info98['blazetotal'];
				}
			}
			if($mon==1)
			{
				$dato3 = mysql_query("SELECT SUM(nblazes) As blazetotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>='$mon'");
				$dato14 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>='$mon'");

			}
			else
			{
				$dato3 = mysql_query("SELECT SUM(nblazes) As blazetotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<='$mon'");
				$dato14 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<='$mon'");
			}
			$result8 = mysql_num_rows($dato14);
			if($result8==0)
			{
				$sum4 =0;
			}
			else
			{
				while($info97 = mysql_fetch_array( $dato3 ))
				{
					$sum4=$info97['blazetotal'];
				}
			}
			$sum5 = ($sum3) -($sum4);
			$rs1 = $sum3/1000;
			$rs2 = round($rs1, 2);
			$rs3 = round($rs2, 1);
			$rs4 = round($rs3);
			if($rs4==0 && $sum3 !=0){
				$rs4 = 1;
			}
			$dato4 = mysql_query("SELECT * FROM yield_fixed WHERE Year='$yr' AND lotno='$currlotno' AND division='$divi[$i]'");
			$result1 = mysql_num_rows($dato4);
			if($result1==0)
			{
				$sum6=0;
			}
			else
			{
				while($info96 = mysql_fetch_array( $dato4 ))
				{
					$sum6=$info96['yield_fixed'];
				}
			}

			$sum7=($sum6*$sum3)/1000;
			if($mon==1)
			{
				$dato5 = mysql_query("SELECT SUM(tin_collect) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
				$dato501 = mysql_query("SELECT SUM(tin_collect_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
				$dato6 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
			}
			else
			{
				$dato5 = mysql_query("SELECT SUM(tin_collect) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
				$dato501 = mysql_query("SELECT SUM(tin_collect_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
				$dato6 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
			}
			$result2 = mysql_num_rows($dato6);
			if($result2==0)
			{
				$sum8=0;
				$sum9=0;
			}
			else
			{
				while($info95 = mysql_fetch_array( $dato5 ))
				{
					$sum8=$info95['tintotal'];
				}
				while($info501 = mysql_fetch_array( $dato501 ))
				{
					$sum9=$info501['tintotalw'];
				}
			}
			$dato502 = mysql_query("SELECT SUM(tin_collect) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato503 = mysql_query("SELECT SUM(tin_collect_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato504 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result504 = mysql_num_rows($dato504);
			if($result504==0)
			{
				$sum504=0;
				$sum503=0;
			}
			else
			{
				while($info502 = mysql_fetch_array( $dato502 ))
				{
					$sum504=$info502['tintotal'];
				}
				while($info503 = mysql_fetch_array( $dato503 ))
				{
					$sum503=$info503['tintotalw'];
				}
			}



			$sum11 = $sum8 + $sum504;
			$sum12 = $sum9 + $sum503;
			if($mon==1)
			{
				$dato7 = mysql_query("SELECT SUM(tin_carried) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
				$dato510 = mysql_query("SELECT SUM(tin_carried_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
				$dato8 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");

			}
			else
			{
				$dato7 = mysql_query("SELECT SUM(tin_carried) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
				$dato510 = mysql_query("SELECT SUM(tin_carried_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
				$dato8 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
			}
			$result3 = mysql_num_rows($dato8);
			if($result3==0)
			{
				$sum13=0;
				$sum14=0;
			}
			else
			{
				while($info94 = mysql_fetch_array( $dato7 ))
				{
					$sum13=$info94['tintotal'];
				}
				while($info510 = mysql_fetch_array( $dato510 ))
				{
					$sum14=$info510['tintotalw'];
				}
			}

			$dato511 = mysql_query("SELECT SUM(tin_carried) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato512 = mysql_query("SELECT SUM(tin_carried_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato513 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result514 = mysql_num_rows($dato513);
			if($result514==0)
			{
				$sum521=0;
				$sum522=0;
			}
			else
			{
				while($info514 = mysql_fetch_array( $dato511 ))
				{
					$sum521=$info514['tintotal'];
				}
				while($info514 = mysql_fetch_array( $dato512 ))
				{
					$sum522=$info514['tintotalw'];
				}
			}


			$sum16=$sum13 + $sum521;
			$sum17=$sum14 + $sum522;
			if($sum3==0){
				$sum18=0;
			}
			else
			{
				$sum181=($sum12*1000)/$sum3;
				$sum18=round($sum181, 2);
			}
			if($mon==1)
			{
				$dato9 = mysql_query("SELECT SUM(tin_dispatch) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
				$dato601 = mysql_query("SELECT SUM(tin_dispatch_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
				$dato10 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>'$mon'");
			}
			else
			{
				$dato9 = mysql_query("SELECT SUM(tin_dispatch) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
				$dato601 = mysql_query("SELECT SUM(tin_dispatch_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
				$dato10 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<'$mon'");
			}
			$result4 = mysql_num_rows($dato10);
			if($result4==0)
			{
				$sum19=0;
				$sum20=0;
			}
			else
			{
				while($info93 = mysql_fetch_array( $dato9 ))
				{
					$sum19=$info93['tintotal'];
				}
				while($info601 = mysql_fetch_array( $dato601 ))
				{
					$sum20=$info601['tintotalw'];
				}
			}

			$dato701 = mysql_query("SELECT SUM(tin_dispatch) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato702 = mysql_query("SELECT SUM(tin_dispatch_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato703 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result701 = mysql_num_rows($dato703);
			if($result701==0)
			{
				$sum702=0;
				$sum703=0;
			}
			else
			{
				while($info701 = mysql_fetch_array( $dato701 ))
				{
					$sum702=$info701['tintotal'];
				}
				while($info702 = mysql_fetch_array( $dato702 ))
				{
					$sum703=$info702['tintotalw'];
				}
			}

			$dato801 = mysql_query("SELECT SUM(tin_dispatch_o) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato802 = mysql_query("SELECT SUM(tin_dispatch_o_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato803 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result801 = mysql_num_rows($dato803);
			if($result801==0)
			{
				$sum802=0;
				$sum803=0;
			}
			else
			{
				while($info801 = mysql_fetch_array( $dato801 ))
				{
					$sum802=$info801['tintotal'];
				}
				while($info802 = mysql_fetch_array( $dato802 ))
				{
					$sum803=$info802['tintotalw'];
				}
			}

			$dato301 = mysql_query("SELECT SUM(tin_lost_fi) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato302 = mysql_query("SELECT SUM(tin_lost_fi_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato303 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result301 = mysql_num_rows($dato303);
			if($result301==0)
			{
				$sum302=0;
				$sum303=0;
			}
			else
			{
				while($info301 = mysql_fetch_array( $dato301 ))
				{
					$sum302=$info301['tintotal'];
				}
				while($info302 = mysql_fetch_array( $dato302 ))
				{
					$sum303=$info302['tintotalw'];
				}
			}

			$dato304 = mysql_query("SELECT SUM(tin_lost_f) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato305 = mysql_query("SELECT SUM(tin_lost_f_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato306 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result304 = mysql_num_rows($dato306);
			if($result304==0)
			{
				$sum304=0;
				$sum305=0;
			}
			else
			{
				while($info304 = mysql_fetch_array( $dato304 ))
				{
					$sum304=$info304['tintotal'];
				}
				while($info305 = mysql_fetch_array( $dato305 ))
				{
					$sum305=$info305['tintotalw'];
				}
			}

			$dato307 = mysql_query("SELECT SUM(tin_lost_t) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato308 = mysql_query("SELECT SUM(tin_lost_t_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato309 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result307 = mysql_num_rows($dato309);
			if($result307==0)
			{
				$sum307=0;
				$sum308=0;
			}
			else
			{
				while($info307 = mysql_fetch_array( $dato307 ))
				{
					$sum307=$info307['tintotal'];
				}
				while($info308 = mysql_fetch_array( $dato308 ))
				{
					$sum308=$info308['tintotalw'];
				}
			}

			$dato310 = mysql_query("SELECT SUM(tin_lost_o) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato311 = mysql_query("SELECT SUM(tin_lost_o_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$dato312 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth='$mon'");
			$result313 = mysql_num_rows($dato312);
			if($result313==0)
			{
				$sum310=0;
				$sum311=0;
			}
			else
			{
				while($info310 = mysql_fetch_array( $dato310 ))
				{
					$sum310=$info310['tintotal'];
				}
				while($info311 = mysql_fetch_array( $dato311 ))
				{
					$sum311=$info311['tintotalw'];
				}
			}

			$sum22 = $sum19 +$sum702;
			$sum23 = $sum20 + $sum703;


			$sum26 = $sum11 - $sum16;
			$sum27 = $sum12-$sum17;
		 $sum28 = $sum16 - ($sum22+$sum802);
		 $sum29 = $sum17 - ($sum23+$sum803);
		 if($mon==1)
		 {
		 	$dato10 = mysql_query("SELECT SUM(tin_collect_w) As tintotal FROM tap_store WHERE year='$yra' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>='$mon'");
		 	$dato11 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth>='$mon'");
		 }
		 else
		 {
		 	$dato10 = mysql_query("SELECT SUM(tin_collect_w) As tintotal FROM tap_store WHERE year='$yra' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<='$mon'");
		 	$dato11 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND tomonth<='$mon'");
		 }
		 $result5 = mysql_num_rows($dato10);
		 if($result5==0)
		 {
		 	$sum30=0;
		 }
		 else
		 {
		 	while($info92 = mysql_fetch_array( $dato10 ))
		 	{
		 		$sum30=$info92['tintotal'];
		 	}
		 }
		 $sum40=$sum30;
		 if($sum2==0)
		 {
		 	$sum31=0;
		 }
		 else{
		 	$sum31=($sum40*1000)/$sum2;
		 }


		 $extt = mysql_query("SELECT exten FROM lot_desc WHERE lotno='$currlotno' AND division='$divi[$i]'");
		 $extr = mysql_num_rows($extt);
			if($extr==0)
			{
				$exta="Not Available";
			}
			else
			{
				while($info600 = mysql_fetch_array( $extt ))
				{
					$exta=$info600['exten'];
				}
			}
			$maxid = mysql_query("SELECT MAX(id) AS idw FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND frmmonth='$mon'");
		 while($info111 = mysql_fetch_array( $maxid ))
		 {
		 	$maxoid=$info111['idw'];
		 	 
		 }
		 $mazd = mysql_query("SELECT nmazdoor, remark FROM tap_store WHERE year='$yr' AND lotno='$currlotno' AND division='$divi[$i]' AND frmmonth='$mon' AND id='$maxoid'");
		 $maz = mysql_num_rows($mazd);
			if($maz==0)
			{
				$sum123=0;
				$sum456=0;
			}
			else
			{
				while($info900 = mysql_fetch_array( $mazd ))
				{
					$sum123=$info900['nmazdoor'];
					$sum456=$info900['remark'];
				}
			}

			echo '<tr>
    <td>' . $k . '</td>
	<td>' . $currlotno . '/' . $yr . '(' . getExten($currlotno,$divi[$i]). ')</td>
	<td>' . $sum2 . '</td>
	<td>' . $sum3 . '</td>
	<td>' . $sum4 . '</td>
	<td>' . $sum5 . '</td>
	<td>' . $sum3 . '</td>
	<td>' . $rs4 . '</td>
	<td>' . $sum123 . '</td>
	<td>' . $sum7 . '</td>
	<td>'. $sum6 . '</td>
	<td>' . $sum8 . '</td>
	<td>'. $sum9 . '</td>
	<td>' . $sum504 . '</td>
	<td>' . $sum503 . '</td>
	<td>' . $sum11 . '</td>
	<td>'. $sum12 . '</td>
	<td>' . $sum31 . '</td>
	<td>' . $sum18 . '</td>
	<td>'. $sum13 . '</td>
	<td>'. $sum14 . '</td>
	<td>' . $sum521 . '</td>
	<td>' . $sum522 . '</td>
	<td>' . $sum16 . '</td>
	<td>' . $sum17 . '</td>
	<td>' . $sum19 . '</td>
	<td>'. $sum20 . '</td>
	<td>' . $sum702 . '</td>
	<td>' . $sum703 . '</td>
	<td>' . $sum22 . '</td>
	<td>' . $sum23 . '</td>
	<td>' . $sum802 . '</td>
	<td>' . $sum803 . '</td>
	<td>' . $sum302 . '</td>
	<td>' . $sum303 . '</td>
	<td>' . $sum304 . '</td>
	<td>' . $sum305 . '</td>
	<td>' . $sum307 . '</td>
	<td>' . $sum308 . '</td>
	<td>' . $sum310 . '</td>
	<td>' . $sum311 . '</td>
	<td>' . $sum28 . '</td>
	<td>' . $sum29 . '</td>
	<td>' . $sum26 . '</td>
	<td>' . $sum27 . '</td>
	<td>' . $sum456 . '</td>
	</tr>';
			$ttl1=$ttl1+$sum2;
			$ttl2=$ttl2+$sum3;
			$ttl3=$ttl3+$sum4;
			$ttl4=$ttl4+$sum5;
			$ttl5=$ttl5+$rs4;
			$ttl6=$ttl6+$sum123;
			$ttl7=$ttl7+$sum7;
			$ttl8=$ttl8+$sum6;
			$ttl9=$ttl9+$sum8;
			$ttl10=$ttl10+$sum9;
			$ttl11=$ttl11+$sum504;
			$ttl12=$ttl12+$sum503;
			$ttl13=$ttl13+$sum11;
			$ttl14=$ttl14+$sum12;
			$ttl15=$ttl15+$sum31;
			$ttl16=$ttl16+$sum18;
			$ttl17=$ttl17+$sum13;
			$ttl18=$ttl18+$sum14;
			$ttl19=$ttl19+$sum521;
			$ttl20=$ttl20+$sum522;
			$ttl21=$ttl21+$sum16;
			$ttl22=$ttl22+$sum17;
			$ttl23=$ttl23+$sum19;
			$ttl24=$ttl24+$sum20;
			$ttl25=$ttl25+$sum702;
			$ttl26=$ttl26+$sum703;
			$ttl27=$ttl27+$sum22;
			$ttl28=$ttl28+$sum23;
			$ttl29=$ttl29+$sum802;
			$ttl30=$ttl30+$sum803;
			$ttl31=$ttl31+$sum302;
			$ttl32=$ttl32+$sum303;

			$ttl33=$ttl33+$sum304;
			$ttl34=$ttl34+$sum305;
			$ttl35=$ttl35+$sum307;
			$ttl36=$ttl36+$sum308;
			$ttl37=$ttl37+$sum310;
			$ttl38=$ttl38+$sum311;

			$ttl39=$ttl39+$sum28;
			$ttl40=$ttl40+$sum29;
			$ttl41=$ttl41+$sum26;
			$ttl42=$ttl42+$sum27;
		}
		echo '<tr>
    <td colspan="2"><b><font color=green>Grand Total for DFO</td>
	<td><b><font color=green>' . $ttl1 . '</td>
	<td><b><font color=green>' . $ttl2 . '</td>
	<td><b><font color=green>' . $ttl3 . '</td>
	<td><b><font color=green>' . $ttl4 . '</td>
	<td><b><font color=green>' . $ttl2 . '</td>
	<td><b><font color=green>' . $ttl5 . '</td>
	<td><b><font color=green>' . $ttl6 . '</td>
	<td><b><font color=green>' . $ttl7 . '</td>
	<td></td>
	<td><b><font color=green>' . $ttl9 . '</td>
	<td><b><font color=green>' . $ttl10 . '</td>
	<td><b><font color=green>' . $ttl11 . '</td>
	<td><b><font color=green>' . $ttl12 . '</td>
	<td><b><font color=green>' . $ttl13 . '</td>
	<td><b><font color=green>' . $ttl14 . '</td>
	<td><b><font color=green>' . $ttl15 . '</td>
	<td><b><font color=green>' . $ttl16 . '</td>
	<td><b><font color=green>' . $ttl17 . '</td>
	<td><b><font color=green>' . $ttl18 . '</td>
	<td><b><font color=green>' . $ttl19 . '</td>
	<td><b><font color=green>' . $ttl20 . '</td>
	<td><b><font color=green>' . $ttl21 . '</td>
	<td><b><font color=green>' . $ttl22 . '</td>
	<td><b><font color=green>' . $ttl23 . '</td>
	<td><b><font color=green>' . $ttl24 . '</td>
	<td><b><font color=green>' . $ttl25 . '</td>
	<td><b><font color=green>' . $ttl26 . '</td>
	<td><b><font color=green>' . $ttl27 . '</td>
	<td><b><font color=green>' . $ttl28 . '</td>
	<td><b><font color=green>' . $ttl29 . '</td>
	<td><b><font color=green>' . $ttl30 . '</td>
	<td><b><font color=green>' . $ttl31 . '</td>
	<td><b><font color=green>' . $ttl32 . '</td>
	<td><b><font color=green>' . $ttl33 . '</td>
	<td><b><font color=green>' . $ttl34 . '</td>
	<td><b><font color=green>' . $ttl35 . '</td>
	<td><b><font color=green>' . $ttl36 . '</td>
	<td><b><font color=green>' . $ttl37 . '</td>
	<td><b><font color=green>' . $ttl38 . '</td>
	<td><b><font color=green>' . $ttl39 . '</td>
	<td><b><font color=green>' . $ttl40 . '</td>
	<td><b><font color=green>' . $ttl41 . '</td>
	<td><b><font color=green>' . $ttl42 . '</td>
	<td></td>
	</tr>';

	}
	/*
	 if($result99 !=0 && $resulto !=0){
		$ttls1=0;
		$ttls2=0;
		$ttls3=0;
		$ttls4=0;
		$ttls5=0;
		$ttls6=0;
		$ttls7=0;
		$ttls8=0;
		$ttls9=0;
		$ttls10=0;
		$ttls11=0;
		$ttls12=0;
		$ttls13=0;
		$ttls14=0;
		$ttls15=0;
		$ttls16=0;
		$ttls17=0;
		$ttls18=0;
		$ttls19=0;
		$ttls20=0;
		$ttls21=0;
		$ttls22=0;
		$ttls23=0;
		$ttls24=0;
		$ttls25=0;
		$ttls26=0;
		$ttls27=0;
		$ttls28=0;
		$ttls29=0;
		$ttls30=0;
		$ttls31=0;
		$ttls32=0;
		$ttls33=0;
		$ttls34=0;
		$ttls35=0;
		$ttls36=0;
		$ttsl37=0;
		$ttls38=0;
		$ttls39=0;
		$ttls40=0;
		$ttls41=0;
		$ttls42=0;
		for($i=0; $i<$resulto; $i++){
		$k=$i+1;
		$yra=$yr-1;
		$dato1 = mysql_query("SELECT SUM(nblazes) As blazetotal FROM tap_store WHERE year='$yra' AND lotno='$lotnos[$i]' AND division='$divis[$i]'");

		$dato12 = mysql_query("SELECT * FROM tap_store WHERE year='$yra' AND lotno='$lotnos[$i]' AND division='$divis[$i]'");
		$result6 = mysql_num_rows($dato12);
		if($result6==0)
		{
		$sum2 = 0;
		}
		else{
		while($info99 = mysql_fetch_array( $dato1 ))
		{
		$sum2=$info99['blazetotal'];
		}
		}
		$dato2 = mysql_query("SELECT SUM(blaze) As blazetotal FROM verify WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]'");
		$dato13 = mysql_query("SELECT * FROM verify WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]'");
		$result7 = mysql_num_rows($dato13);
		if($result7==0)
		{
		$sum3 =0;
		}
		else{
		while($info98 = mysql_fetch_array( $dato2 ))
		{
		$sum3=$info98['blazetotal'];
		}
		}
		if($mon==1)
		{
		$dato3 = mysql_query("SELECT SUM(nblazes) As blazetotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>='$mon'");
		$dato14 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>='$mon'");

		}
		else
		{
		$dato3 = mysql_query("SELECT SUM(nblazes) As blazetotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<='$mon'");
		$dato14 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<='$mon'");
		}
		$result8 = mysql_num_rows($dato14);
		if($result8==0)
		{
		$sum4 =0;
		}
		else
		{
		while($info97 = mysql_fetch_array( $dato3 ))
		{
		$sum4=$info97['blazetotal'];
		}
		}
		$sum5 = ($sum3) -($sum4);
		$rs1 = $sum3/1000;
		$rs2 = round($rs1, 2);
		$rs3 = round($rs2, 1);
		$rs4 = round($rs3);
		if($rs4==0 && $sum3 !=0){
		$rs4 = 1;
		}
		$dato4 = mysql_query("SELECT * FROM yield_fixed WHERE Year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]'");
		$result1 = mysql_num_rows($dato4);
		if($result1==0)
		{
		$sum6=0;
		}
		else
		{
		while($info96 = mysql_fetch_array( $dato4 ))
		{
		$sum6=$info96['yield_fixed'];
		}
		}

		$sum7=($sum6*$sum3)/1000;
		if($mon==1)
		{
		$dato5 = mysql_query("SELECT SUM(tin_collect) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");
		$dato501 = mysql_query("SELECT SUM(tin_collect_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");
		$dato6 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");

		}
		else
		{
		$dato5 = mysql_query("SELECT SUM(tin_collect) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		$dato501 = mysql_query("SELECT SUM(tin_collect_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		$dato6 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		}
		$result2 = mysql_num_rows($dato6);
		if($result2==0)
		{
		$sum8=0;
		$sum9=0;
		}
		else
		{
		while($info95 = mysql_fetch_array( $dato5 ))
		{
		$sum8=$info95['tintotal'];
		}
		while($info501 = mysql_fetch_array( $dato501 ))
		{
		$sum9=$info501['tintotalw'];
		}
		}
		$dato502 = mysql_query("SELECT SUM(tin_collect) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato503 = mysql_query("SELECT SUM(tin_collect_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato504 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result504 = mysql_num_rows($dato504);
		if($result504==0)
		{
		$sum504=0;
		$sum503=0;
		}
		else
		{
		while($info502 = mysql_fetch_array( $dato502 ))
		{
		$sum504=$info502['tintotal'];
		}
		while($info503 = mysql_fetch_array( $dato503 ))
		{
		$sum503=$info503['tintotalw'];
		}
		}



		$sum11 = $sum8 + $sum504;
		$sum12 = $sum9 + $sum503;
		if($mon==1)
		{
		$dato7 = mysql_query("SELECT SUM(tin_carried) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");
		$dato510 = mysql_query("SELECT SUM(tin_carried_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");
		$dato8 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");

		}
		else
		{
		$dato7 = mysql_query("SELECT SUM(tin_carried) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		$dato510 = mysql_query("SELECT SUM(tin_carried_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		$dato8 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		}
		$result3 = mysql_num_rows($dato8);
		if($result3==0)
		{
		$sum13=0;
		$sum14=0;
		}
		else
		{
		while($info94 = mysql_fetch_array( $dato7 ))
		{
		$sum13=$info94['tintotal'];
		}
		while($info510 = mysql_fetch_array( $dato510 ))
		{
		$sum14=$info510['tintotalw'];
		}
		}

		$dato511 = mysql_query("SELECT SUM(tin_carried) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato512 = mysql_query("SELECT SUM(tin_carried_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato513 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result514 = mysql_num_rows($dato513);
		if($result514==0)
		{
		$sum521=0;
		$sum522=0;
		}
		else
		{
		while($info514 = mysql_fetch_array( $dato511 ))
		{
		$sum521=$info514['tintotal'];
		}
		while($info514 = mysql_fetch_array( $dato512 ))
		{
		$sum522=$info514['tintotalw'];
		}
		}


		$sum16=$sum13 + $sum521;
		$sum17=$sum14 + $sum522;
		if($sum3==0){
		$sum18=0;
		}
		else
		{
		$sum181=($sum12*1000)/$sum3;
		$sum18=round($sum181, 2);
		}
		if($mon==1)
		{
		$dato9 = mysql_query("SELECT SUM(tin_dispatch) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");
		$dato601 = mysql_query("SELECT SUM(tin_dispatch_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");
		$dato10 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>'$mon'");

		}
		else
		{
		$dato9 = mysql_query("SELECT SUM(tin_dispatch) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		$dato601 = mysql_query("SELECT SUM(tin_dispatch_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		$dato10 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<'$mon'");
		}
		$result4 = mysql_num_rows($dato10);
		if($result4==0)
		{
		$sum19=0;
		$sum20=0;
		}
		else
		{
		while($info93 = mysql_fetch_array( $dato9 ))
		{
		$sum19=$info93['tintotal'];
		}
		while($info601 = mysql_fetch_array( $dato601 ))
		{
		$sum20=$info601['tintotalw'];
		}
		}

		$dato701 = mysql_query("SELECT SUM(tin_dispatch) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato702 = mysql_query("SELECT SUM(tin_dispatch_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato703 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result701 = mysql_num_rows($dato703);
		if($result701==0)
		{
		$sum702=0;
		$sum703=0;
		}
		else
		{
		while($info701 = mysql_fetch_array( $dato701 ))
		{
		$sum702=$info701['tintotal'];
		}
		while($info702 = mysql_fetch_array( $dato702 ))
		{
		$sum703=$info702['tintotalw'];
		}
		}

		$dato801 = mysql_query("SELECT SUM(tin_dispatch_o) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato802 = mysql_query("SELECT SUM(tin_dispatch_o_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato803 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result801 = mysql_num_rows($dato803);
		if($result801==0)
		{
		$sum802=0;
		$sum803=0;
		}
		else
		{
		while($info801 = mysql_fetch_array( $dato801 ))
		{
		$sum802=$info801['tintotal'];
		}
		while($info802 = mysql_fetch_array( $dato802 ))
		{
		$sum803=$info802['tintotalw'];
		}
		}

		$dato301 = mysql_query("SELECT SUM(tin_lost_fi) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato302 = mysql_query("SELECT SUM(tin_lost_fi_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato303 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result301 = mysql_num_rows($dato303);
		if($result301==0)
		{
		$sum302=0;
		$sum303=0;
		}
		else
		{
		while($info301 = mysql_fetch_array( $dato301 ))
		{
		$sum302=$info301['tintotal'];
		}
		while($info302 = mysql_fetch_array( $dato302 ))
		{
		$sum303=$info302['tintotalw'];
		}
		}

		$dato304 = mysql_query("SELECT SUM(tin_lost_f) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato305 = mysql_query("SELECT SUM(tin_lost_f_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato306 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result304 = mysql_num_rows($dato306);
		if($result304==0)
		{
		$sum304=0;
		$sum305=0;
		}
		else
		{
		while($info304 = mysql_fetch_array( $dato304 ))
		{
		$sum304=$info304['tintotal'];
		}
		while($info305 = mysql_fetch_array( $dato305 ))
		{
		$sum305=$info305['tintotalw'];
		}
		}

		$dato307 = mysql_query("SELECT SUM(tin_lost_t) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato308 = mysql_query("SELECT SUM(tin_lost_t_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato309 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result307 = mysql_num_rows($dato309);
		if($result307==0)
		{
		$sum307=0;
		$sum308=0;
		}
		else
		{
		while($info307 = mysql_fetch_array( $dato307 ))
		{
		$sum307=$info307['tintotal'];
		}
		while($info308 = mysql_fetch_array( $dato308 ))
		{
		$sum308=$info308['tintotalw'];
		}
		}

		$dato310 = mysql_query("SELECT SUM(tin_lost_o) As tintotal FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato311 = mysql_query("SELECT SUM(tin_lost_o_w) As tintotalw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$dato312 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth='$mon'");
		$result313 = mysql_num_rows($dato312);
		if($result313==0)
		{
		$sum310=0;
		$sum311=0;
		}
		else
		{
		while($info310 = mysql_fetch_array( $dato310 ))
		{
		$sum310=$info310['tintotal'];
		}
		while($info311 = mysql_fetch_array( $dato311 ))
		{
		$sum311=$info311['tintotalw'];
		}
		}

		$sum22 = $sum19 +$sum702;
		$sum23 = $sum20 + $sum703;


		$sum26 = $sum11 - $sum16;
		$sum27 = $sum12- $sum17;
		$sum28 = $sum16 - ($sum22+$sum802);
		$sum29 = $sum17 - ($sum23+$sum803);
		if($mon==1)
		{
		$dato10 = mysql_query("SELECT SUM(tin_collect_w) As tintotal FROM tap_store WHERE year='$yra' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>='$mon'");
		$dato11 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth>='$mon'");
		}
		else
		{
		$dato10 = mysql_query("SELECT SUM(tin_collect_w) As tintotal FROM tap_store WHERE year='$yra' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<='$mon'");
		$dato11 = mysql_query("SELECT * FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND tomonth<='$mon'");
		}
		$result5 = mysql_num_rows($dato10);
		if($result5==0)
		{
		$sum30=0;
		}
		else
		{
		while($info92 = mysql_fetch_array( $dato10 ))
		{
		$sum30=$info92['tintotal'];
		}
		}
		$sum40=$sum30;
		if($sum2==0)
		{
		$sum31=0;
		}
		else{
		$sum31=($sum40*1000)/$sum2;
		}


		$extt = mysql_query("SELECT extension FROM lot_desc WHERE lotno='$lotnos[$i]' AND division='$divis[$i]'");
		//$extr = mysql_num_rows($extt);
		$extr=0;
		if($extr==0)
		{
		$exta="Not Available";
		}
		else
		{
		while($info600 = mysql_fetch_array( $extt ))
		{
		$exta=$info600['extension'];
		}
		}
		$maxid = mysql_query("SELECT MAX(id) AS idw FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND frmmonth='$mon'");
		while($info111 = mysql_fetch_array( $maxid ))
		{
		$maxoid=$info111['idw'];
			
		}
		$mazd = mysql_query("SELECT nmazdoor, remark FROM tap_store WHERE year='$yr' AND lotno='$lotnos[$i]' AND division='$divis[$i]' AND frmmonth='$mon' AND id='$maxoid'");
		$maz = mysql_num_rows($mazd);
		if($maz==0)
		{
		$sum123=0;
		$sum456=0;
		}
		else
		{
		while($info900 = mysql_fetch_array( $mazd ))
		{
		$sum123=$info900['nmazdoor'];
		$sum456=$info900['remark'];
		}
		}

		echo '<tr>
		<td>' . $k . '</td>
		<td>' . $lotnos[$i] . '/' . $yr . '(' . getExten($lotnos[$i],$divis[$i]). ')</td>
		<td>' . $sum2 . '</td>
		<td>' . $sum3 . '</td>
		<td>' . $sum4 . '</td>
		<td>' . $sum5 . '</td>
		<td>' . $sum3 . '</td>
		<td>' . $rs4 . '</td>
		<td>' . $sum123 . '</td>
		<td>' . $sum7 . '</td>
		<td>'. $sum6 . '</td>
		<td>' . $sum8 . '</td>
		<td>'. $sum9 . '</td>
		<td>' . $sum504 . '</td>
		<td>' . $sum503 . '</td>
		<td>' . $sum11 . '</td>
		<td>'. $sum12 . '</td>
		<td>' . $sum31 . '</td>
		<td>' . $sum18 . '</td>
		<td>'. $sum13 . '</td>
		<td>'. $sum14 . '</td>
		<td>' . $sum521 . '</td>
		<td>' . $sum522 . '</td>
		<td>' . $sum16 . '</td>
		<td>' . $sum17 . '</td>
		<td>' . $sum19 . '</td>
		<td>'. $sum20 . '</td>
		<td>' . $sum702 . '</td>
		<td>' . $sum703 . '</td>
		<td>' . $sum22 . '</td>
		<td>' . $sum23 . '</td>
		<td>' . $sum802 . '</td>
		<td>' . $sum803 . '</td>
		<td>' . $sum302 . '</td>
		<td>' . $sum303 . '</td>
		<td>' . $sum304 . '</td>
		<td>' . $sum305 . '</td>
		<td>' . $sum307 . '</td>
		<td>' . $sum308 . '</td>
		<td>' . $sum310 . '</td>
		<td>' . $sum311 . '</td>
		<td>' . $sum28 . '</td>
		<td>' . $sum29 . '</td>
		<td>' . $sum26 . '</td>
		<td>' . $sum27 . '</td>
		<td>' . $sum456 . '</td>
		</tr>';
		$ttls1=$ttl1+$sum2;
		$ttls2=$ttl2+$sum3;
		$ttls3=$ttl3+$sum4;
		$ttls4=$ttl4+$sum5;
		$ttls5=$ttl5+$rs4;
		$ttls6=$ttl6+$sum123;
		$ttls7=$ttl7+$sum7;
		$ttls8=$ttl8+$sum6;
		$ttls9=$ttl9+$sum8;
		$ttls10=$ttl10+$sum9;
		$ttls11=$ttl11+$sum504;
		$ttls12=$ttl12+$sum503;
		$ttls13=$ttl13+$sum11;
		$ttls14=$ttl14+$sum12;
		$ttls15=$ttl15+$sum31;
		$ttls16=$ttl16+$sum18;
		$ttls17=$ttl17+$sum13;
		$ttls18=$ttl18+$sum14;
		$ttls19=$ttl19+$sum521;
		$ttls20=$ttl20+$sum522;
		$ttls21=$ttl21+$sum16;
		$ttls22=$ttl22+$sum17;
		$ttls23=$ttl23+$sum19;
		$ttls24=$ttl24+$sum20;
		$ttls25=$ttl25+$sum702;
		$ttls26=$ttl26+$sum703;
		$ttls27=$ttl27+$sum22;
		$ttls28=$ttl28+$sum23;
		$ttls29=$ttl29+$sum802;
		$ttls30=$ttl30+$sum803;
		$ttls31=$ttl31+$sum302;
		$ttls32=$ttl32+$sum303;

		$ttls33=$ttl33+$sum304;
		$ttls34=$ttl34+$sum305;
		$ttls35=$ttl35+$sum307;
		$ttls36=$ttl36+$sum308;
		$ttls37=$ttl37+$sum310;
		$ttls38=$ttl38+$sum311;

		$ttls39=$ttl39+$sum28;
		$ttls40=$ttl40+$sum29;
		$ttls41=$ttl41+$sum26;
		$ttls42=$ttl42+$sum27;

		}
		echo '<tr>
		<td colspan="2"><b><font color=green>G. Total</td>
		<td><b><font color=green>' . $ttls1 . '</td>
		<td><b><font color=green>' . $ttls2 . '</td>
		<td><b><font color=green>' . $ttls3 . '</td>
		<td><b><font color=green>' . $ttls4 . '</td>
		<td><b><font color=green>' . $ttls2 . '</td>
		<td><b><font color=green>' . $ttls5 . '</td>
		<td><b><font color=green>' . $ttls6 . '</td>
		<td><b><font color=green>' . $ttls7 . '</td>
		<td></td>
		<td><b><font color=green>' . $ttls9 . '</td>
		<td><b><font color=green>' . $ttls10 . '</td>
		<td><b><font color=green>' . $ttls11 . '</td>
		<td><b><font color=green>' . $ttls12 . '</td>
		<td><b><font color=green>' . $ttls13 . '</td>
		<td><b><font color=green>' . $ttls14 . '</td>
		<td><b><font color=green>' . $ttls15 . '</td>
		<td><b><font color=green>' . $ttls16 . '</td>
		<td><b><font color=green>' . $ttls17 . '</td>
		<td><b><font color=green>' . $ttls18 . '</td>
		<td><b><font color=green>' . $ttls19 . '</td>
		<td><b><font color=green>' . $ttls20 . '</td>
		<td><b><font color=green>' . $ttls21 . '</td>
		<td><b><font color=green>' . $ttls22 . '</td>
		<td><b><font color=green>' . $ttls23 . '</td>
		<td><b><font color=green>' . $ttls24 . '</td>
		<td><b><font color=green>' . $ttls25 . '</td>
		<td><b><font color=green>' . $ttls26 . '</td>
		<td><b><font color=green>' . $ttls27 . '</td>
		<td><b><font color=green>' . $ttls28 . '</td>
		<td><b><font color=green>' . $ttls29 . '</td>
		<td><b><font color=green>' . $ttls30 . '</td>
		<td><b><font color=green>' . $ttls31 . '</td>
		<td><b><font color=green>' . $ttls32 . '</td>
		<td><b><font color=green>' . $ttls33 . '</td>
		<td><b><font color=green>' . $ttls34 . '</td>
		<td><b><font color=green>' . $ttls35 . '</td>
		<td><b><font color=green>' . $ttls36 . '</td>
		<td><b><font color=green>' . $ttls37 . '</td>
		<td><b><font color=green>' . $ttls38 . '</td>
		<td><b><font color=green>' . $ttls39 . '</td>
		<td><b><font color=green>' . $ttls40 . '</td>
		<td><b><font color=green>' . $ttls41 . '</td>
		<td><b><font color=green>' . $ttls42 . '</td>
		<td></td>
		</tr>';
		}

		*/
	?>
</table>

</body>
</html>
