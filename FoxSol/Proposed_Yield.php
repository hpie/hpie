<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
}
require('connectDB.php');
date_default_timezone_set('Asia/Calcutta');
$kapa=$_POST['year'];
$divi=$_REQUEST['divi'];
//$kapa=2014;
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



<link rel="stylesheet" href="images/FoxSol1.css" type="text/css" />

<title>FoxSolutions</title>

</head>

<body>
<!-- wrap starts here -->

<!-- content-wrap starts here -->





<div align="center">

<?php $year=$_POST['year'];
echo " <h1> Proposed Yield List for the Year $year  </h1>
		<h2> Forest Division $divi </h2>";?>


<p><?php echo	    '<table width="1099" border="1">
                  <tr>
                    <th width="35" scope="col" rowspan="2">Sr.no</th>
                    <th width="28" scope="col" rowspan="2">Lot No. </th>
                    <th width="28" scope="col" colspan="3">Blazes received during the season </th>
                    <th width="28" scope="col">Tentative blazes for the currernt resin season </th>
                    <th width="28" scope="col">Yield Fixed Per Section </th>
                    <th width="28" scope="col">Total Yield in Qtls </th>
                    <th width="28" scope="col">Yield Obtained Per Section </th>
                    <th width="28" scope="col">Total Yield Obtained in Qtls </th>
                    <th scope="col">Yield Fixed Per Section </th>
                    <th scope="col">Total Yield in Qtls </th>
                    <th scope="col">Yield Obtained Per Section </th>
                    <th scope="col">Total Yield Obtained in Qtls </th>
                    <th scope="col">Yield Fixed Per Section </th>
                    <th scope="col">Total Yield in Qtls </th>
                    <th scope="col">Yield Obtained Per Section inc. Sakki </th>
                    <th scope="col">Total Yield Obtained in Qtls inc. Sakki</th>
                    <th width="28" scope="col" rowspan="2">Avg. Yield for last Three years </th>
                    <th width="28" scope="col" rowspan="2">Yield Proposed per Qtls per section by DM </th>
                    <th width="470" scope="col" rowspan="2">Approved by Director (S) </th>
                  </tr>
                  <tr>
				  
				 
                   
                    <td align="center">'.($kapa-3).'</td>
                    <td align="center">'.($kapa-2).'</td>
                    <td align="center">'.($kapa-1).'</td>
                    <td align="center">'.$kapa.'</td>
                    <td colspan="4" align="center">'.($kapa-3).'</td>
                    <td colspan="4" align="center">'.($kapa-2).'</td>
                    <td colspan="4" align="center">'.($kapa-1).'</td>
                  
                 
                
                  </tr>';
function sum_blazes($lotno,$divi,$year)
{
	$zero=0;
	$qur="select sum(blaze) as sum from verify where lotno='$lotno' and division ='$divi' and year='$year'";
	$rs=mysql_query($qur);
	$row=mysql_fetch_array($rs);
	if(mysql_num_rows($rs)>0)
	return $row['sum'];
	else
	return null;
}


function sum_tenblazes($lotno,$divi,$year)
{
	$zero=0;
	$qur="select sum(blazen) as sum from enum where lotno='$lotno' and division ='$divi' and year='$year'";
	$rs=mysql_query($qur);
	$row=mysql_fetch_array($rs);
	if(mysql_num_rows($rs)>0)
	return $row['sum'];
	else
	return null;
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


function get_yield_obtainedSS($lotno,$divi,$year)
{

	$qur="select yield_obtained  from ssyield_obtained where lotno='$lotno' and year='$year' and division='$divi'";
	$rs=mysql_query($qur);
	$row=mysql_fetch_array($rs);
	if(mysql_num_rows($rs)>0)
	return $row['yield_obtained'];
	else
	return 0;

}


function get_yield_obtained($lotno,$divi,$year)
{

	$qur="select yield_obtained  from yield_obtained where lotno='$lotno' and year='$year' and division='$divi'";
	$rs=mysql_query($qur);
	$row=mysql_fetch_array($rs);
	if(mysql_num_rows($rs)>0)
	return $row['yield_obtained'];
	else
	return 0;

}

function AvgYield($lotno,$divi,$kapa)
{
	$obt[]=array();
	$obt[0]=get_yield_obtainedSS($lotno,$divi,$kapa-1);
	$obt[1]=get_yield_obtained($lotno,$divi,$kapa-2);
	$obt[2]=get_yield_obtained($lotno,$divi,$kapa-3);

	$zero=0;
	for($i=0;$i<3;$i++)
	{
		if($obt[$i]==0)
		{
			$zero++;

		}
			
			
	}
	$sum=$obt[0]+$obt[1]+$obt[2];
	if($zero==3)
	return 0;
	else
	{
		$avg=$sum/(3-$zero);
			
		return round($avg,2);
	}

}





$Yield[]=array();
$info2[]=array();

/*	$data = mysql_query("SELECT SUM(blaze) FROM verify WHERE year='$kapa' GROUP BY lotno,division") or die("No table");
 while($info1 = mysql_fetch_array( $data ))
 {
 $infoarray1[]=$info1['SUM(blaze)'];

 }   */

$q1="SELECT distinct lotno ,division FROM enum WHERE division = '$divi' and year = '$kapa' order by lotno";
echo $q1."<br />";
$rs=mysql_query($q1) or die (mysql_error());
if(mysql_num_rows($rs)==0)

{
	echo '<script type="text/javascript">
			alert ("Enumeration list has not been entered yet");
			window.location = "index.php"
			</script>';

	/*header("Location: show_msg.php?msg='Details Already Entered '");
	 exit;*/

}

$i=1;
//$lotno="";
while($data=mysql_fetch_array($rs))
{
	//if(($lotno==$data['lotno']) && ($divi=$data['division']))
	//continue;
	$lotno=$data['lotno'];
	$divi=$data['division'];
	//".addslashes($lotno)."
	
	$lotno=addslashes($lotno);
	//	$sum=$data['sum'];




	echo ' <tr>
				  	 <td>'.$i.'</td>
                    <td>'.$data['lotno'].'/'.$kapa.'('.getExten($lotno,$divi).')</td>
                    <td>'.sum_blazes($lotno,$divi,$kapa-3).'</td>
                    <td>'.sum_blazes($lotno,$divi,$kapa-2).'</td>
                    <td>'.sum_blazes($lotno,$divi,$kapa-1).'</td>
                    <td>'.sum_tenblazes($lotno,$divi,$kapa).'</td>
                    <td>'.get_yield_fixed($lotno,$divi,$kapa-3).'</td>
                    <td>'.round((get_yield_fixed($lotno,$divi,$kapa-3) * sum_blazes($lotno,$divi,$kapa-3)/1000),2).' </td>
                    <td>'.get_yield_Obtained($lotno,$divi,$kapa-3).'</td>
                    <td>'.round((get_yield_Obtained($lotno,$divi,$kapa-3) * sum_blazes($lotno,$divi,$kapa-3)/1000),2).' </td>
                     <td>'.get_yield_fixed($lotno,$divi,$kapa-2).'</td>
                    <td>'.round((get_yield_fixed($lotno,$divi,$kapa-2) * sum_blazes($lotno,$divi,$kapa-2)/1000),2).' </td>
                    <td>'.get_yield_Obtained($lotno,$divi,$kapa-2).'</td>
                    <td>'.round((get_yield_Obtained($lotno,$divi,$kapa-2) * sum_blazes($lotno,$divi,$kapa-2)/1000),2).' </td>
                     <td>'.get_yield_fixed($lotno,$divi,$kapa-1).'</td>
                    <td>'.round((get_yield_fixed($lotno,$divi,$kapa-1) * sum_blazes($lotno,$divi,$kapa-1)/1000),2) .' </td>
                    <td>'.get_yield_ObtainedSS($lotno,$divi,$kapa-1).'</td>
                    <td>'.round((get_yield_ObtainedSS($lotno,$divi,$kapa-1) * sum_blazes($lotno,$divi,$kapa-1)/1000),2).' </td>
                    <td>'.AvgYield($lotno,$divi,$kapa).'</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>';
	$i++;
}

?>
</table>

<br />
<input type="button" onclick="javascript:window.location.assign('client.php')" value="Back" style="background-color: #b6e38e; width: 130px;"  />
<input type=submit value='Print the List'
	style="background-color: #b6e38e; width: 130px;" onclick="print()"></p>

</div>





<!-- content-wrap ends here -->

<!-- footer starts here -->


</body>
</html>
