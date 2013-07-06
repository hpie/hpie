<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
	}
require('connectDB.php');
						date_default_timezone_set('Asia/Calcutta');
				$kapa=$_SESSION['kapa'];
				
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
			
				<h1><div style="float:left">Verified List</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
					
				<?php
				$infoarray1 = array();
				$divi=$_SESSION['divi'];
				$q1="select distinct lotno from verify where Year='$kapa' and division='$divi'";
				$q="select * from lot_desc join verify on verify.lotno=lot_desc.lotno and verify.Year='$kapa' and lot_desc.division=verify.division";
				$rs=mysql_query($q1) or die (mysql_error());
				$numrows=mysql_num_rows($rs);
				while($data=mysql_fetch_array($rs))
				{
				
				$q="select * from lot_desc where lotno='".$data['lotno']."'";
				$rs2=mysql_query($q) or die (mysql_error());
				while($data2=mysql_fetch_array($rs2))
				{
				$lotnum[]=$data2['lotno'];
				$unit[]=$data2['unit'];
				$range[]=$data2['frange'];
				$forests[]=$data2['forests'];
				$rsd[]=$data2['rsd'];
				}
				  
				
				}
				
				
				
                
		/*		$infoarray1 = array();
				$infoarray2 = array();
	    while($info1 = mysql_fetch_array( $data )) 
		{  
			$infoarray1[]=$info1['SUM(blaze)'];
           		
		}
	    while($info2 = mysql_fetch_array( $datan )) 
		{  
			$infoarray2[]=$info2['lotno'];
           		
		}*/
		echo "<table border=1><tr><td>S.No.</td><td>Lot No.</td><td>Unit</td><td>Range</td><td>Forests</td><td>Name of RSD</td><td>No. of Blazes</td></tr>";
		$num=1;
		for ($i=1; $i<=$numrows; $i++)
		{
		$q="select * from lot_desc where lotno='".$data['lotno']."' and division='".$divi."'";
				$rs2=mysql_query($q) or die (mysql_error());
				
		while($data2=mysql_fetch_array($rs2))
				{
				
				}
				
				
		echo "<tr>";
		echo "<td>";
		echo $i;
		echo "</td>";
		
		echo "<td>";
		$lotno=$lotnum[$i-1];
		echo  $lotnum[$i-1]."/".$kapa."(".getExten($lotnum[$i-1],$divi).")";
		echo "</td>";
		
		echo "<td>";
		echo  $unit[$i-1];
		echo "</td>";
		
		echo "<td>";
		echo  $range[$i-1];
		echo "</td>";
		
		echo "<td>";
		echo  $forests[$i-1];
		echo "</td>";
		
		echo "<td>";
		echo  $rsd[$i-1];
		echo "</td>";
		
		echo "<td>";
		$rs=mysql_query("select sum(blaze)as sum from verify where lotno='$lotno' and Year='$kapa' and division='$divi'");
		$dt=mysql_fetch_array($rs);
		echo $dt['sum'];
		echo "</td>";
		echo "<tr>";
		
		}
		
		echo "</table>";
		
	?>
			<br />
			<input type=submit value='Print the List' style="background-color:#b6e38e; width: 130px;" onclick="window.open('print.php','my','scrollbars=yes')">
        		
				
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
