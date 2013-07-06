<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;
	}
$ppl = $_SESSION['count'];
$auth=0;
for($u=0; $u<$ppl; $u++){
$p = $u + 3;
if(isset($_POST['forestn'. $p]))
{
	if(is_numeric($_POST['forestn'. $p]))
	{
	$auth=1;
	}
	else
	{
	$auth=2;
	}
}
}
if($auth==2)
{

echo '<script type="text/javascript">
			alert ("Enter Number of blazes for all Forest/Compartments");
			window.location = "lot_create.php"
			</script>';


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
			
			<h1><div style="float:left">Create Enumeration List</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			
			
			
				
			 	<br>
				<style type=”text/css”>
              p.guma { 
			  margin-left: 50px;
			  
                  }
</style>
				 <p class="guma"><font size=2>
				 <form action="verify_sub.php" method="post">
				<?php
				if($auth==1){
				$forest = $_SESSION['forests'];
				$ppl = explode(",", $forest);
                 $total = 0;
				 $ttl = 0;

				echo "<table cellspacing=10 cellpadding=10><tr><td>Lot No.</td><td><font color=#770404>" . $_SESSION['lot'] ."/".$_SESSION['kapa']."(".$_SESSION['exten'].") </font></td><td></td></tr><tr><td>Range</td><td><font color=#770404>" . $_SESSION['range'] . "</font></td><td></td></tr><tr><td>Unit</td><td><font color=#770404>" . $_SESSION['unit'] . "</font></td><td></td></tr><tr><td>Type of Area</td><td><font color=#770404>" . $_SESSION['ta'] . "</font></td><td></td></tr><tr><td>Method of Extraction</td><td><font color=#770404>" . $_SESSION['ext'] ."</font></td><td></td></tr><tr><tr><td>Name of the RSD</td><td><font color=#770404>" . $_SESSION['rsd'] . "</font></td><td></td></tr><tr><td>Details of the Blazes</td><td></td></tr><tr><td>Name of the Forest/Compartment</td><td>Number of the Blazes (as per Enumeration List)</td><td>Number of the Blazes(Fit)</td></tr>";
				$nblazes =array();
				for($i = 0; $i < count($ppl); $i++){
				$y = $i + 3;
				$nblazes[] = $_POST['forest'. $y];
				$nblazest[] = $_POST['forestn'. $y];
				$_SESSION['forestn'. $y] = $_POST['forestn'. $y];
				$_SESSION['forest'. $y] = $_POST['forest'. $y]; 
                echo "<tr><td>" . $ppl[$i] . "</td><td align=center><font color=#770404>" . $nblazest[$i] . "</td><td><font color=#770404>" . $nblazes[$i] . "</font></td></tr>";
				$total = $total + $nblazes[$i];
				$ttl = $ttl + $nblazest[$i];
				}
				echo "<tr><td>Total</td><td align=center><font color=#770404>" . $ttl . "</font></td><td align=center><font color=#770404>" . $total . "</td></tr>";
				
				echo "</table></font></p>";

				echo "<input type='submit' style='background-color:#b6e38e; width: 60px;'/>";
					if($_SESSION['frm_action']=="insert"){
						echo "<input type='hidden' name='val' value='insert'/>";	
					}else if($_SESSION['frm_action']=="update"){
						echo "<input type='hidden' name='val' value='update'/>";
					}
				}
				else
				{
				echo "Please Enter all the necessary details";
				}?>
			</form></div>
			
				
				
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
