<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}

require('connectDB.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<script language="javascript"  type="text/javascript">
function check()
{
if(document.forms["form1"]["year"].value==0)
{
alert ("Select Year");
return false;
}

else
return true;



}
</script>


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
			
				
				<h1><div style="float:left">Showing economics</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br><br /><br />
				<?php
				$lotno=$_SESSION['lot'];
				$year=$_SESSION['year'];
				$divi=$_SESSION['divi'];
				$rs=mysql_query("select id,tenblazes,rate,tchargeavg from upset_price where lotno='$lotno' and division='$divi' and year='$year'");
				$i=1;
				echo '<table border=0 cellspacing=15 align=center><tr><td>Sr.No.</td><td>Tentative Blazes</td><Td>Carriage Upset Price</td><Td>Tranportation Upset Price</td><td></td></tr>';
				while($row=mysql_fetch_array($rs))
				{
				$ten=$row['tenblazes'];
				$rate=$row['rate'];
				$id=$row['id'];
				$transrate=$row['tchargeavg'];
				echo '<tr><td>'.$i.'</td><td>'.$ten.'</td><td>'.$rate.'</td><td>'.$transrate.'</td><td><a href="print_economicsm.php?id='.$id.'">View Economics</a></td><td><a href="del_eco.php?id='.$id.'">Delete</a></td></tr>';
				$i++;
				
				}
				echo '</table>';
				?>
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
