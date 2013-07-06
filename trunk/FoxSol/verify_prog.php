<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'client')){
	header("Location: index.php");
	exit;

}
require('connectDB.php');
if(isset($_SESSION['workp']) && $_SESSION['frmm'] && $_SESSION['frmd'] && $_SESSION['frmy'] && $_SESSION['tom'] && $_SESSION['tod'] && $_SESSION['toy']){
$pplt = explode("/", $_SESSION['lotnop']);
$ppl = $pplt[0];
$yr = $pplt[1];
$divi =$_SESSION['divi'];
$frmd = $_SESSION['frmd'];
$frmm = $_SESSION['frmm'];
$frmy = $_SESSION['frmy'];
$tod = $_SESSION['tod'];
$tom = $_SESSION['tom'];
$toy = $_SESSION['toy'];
$remark =$_POST['remark'];

	if($_SESSION['workp']=="Bark Shaving"){
		if($_POST['nblaze']==null || $_POST['nmazd']==null){
		echo '<script type="text/javascript">
			alert ("Please go back and firstly enter all the necessary information");
			window.location = "prog_sel_yr.php"
			</script>';
		}
		else
		{
		$nmzd=$_POST['nmazd'];
		$nblazes=$_POST['nblaze'];
		$quty="SELECT frange FROM verify WHERE lotno='$ppl' AND division='$divi' AND year='$yr'";
		$utit = mysql_query($quty) or die(mysql_error());
		$frng = array();
		while($info = mysql_fetch_array( $utit )) 
		{  
			$frng[]=$info['frange'];
			
		  		
		} 
		$frng = $frng[0];
			if(mysql_num_rows(mysql_query("Select * FROM bark_store WHERE year='$yr' AND lotno='$ppl' AND division='$divi' AND frmmonth='$frmm' AND frmdate='$frmd'"))==0)
				{
				$q="insert into bark_store (lotno, division, year, frmdate, frmmonth, frmyear, todate, tomonth, toyear, nblazes, nmazdoor, remark, frange) values ('$ppl','$divi','$yr','$frmd','$frmm','$frmy','$tod','$tom','$toy','$nblazes','$nmzd','$remark','$frng')";
				mysql_query($q);
				}
			else
			{
			echo '<script type="text/javascript">
			alert ("You have already entered fortnightly report for the particular lot in particular month for the particular resin season");
			window.location = "prog_sel_yr.php"
			</script>';
			/*echo "You have already entered fortnightly report for the particular lot in particular month for the particular resin season";
			exit;*/
			}
		/*echo "Please go back and firstly enter all the necessary information";
exit;*/
		}
	}
	else if($_SESSION['workp']=="Crop Setting"){
		if($_POST['nblaze']==null || $_POST['nmazd']==null || $_POST['tinc']==null || $_POST['tinca']==null || $_POST['tind']==null || $_POST['tinlfi']==null || $_POST['tinlt']==null || $_POST['tinlf']==null || $_POST['tinlo']==null || $_POST['tincw']==null || $_POST['tincaw']==null || $_POST['tindw']==null || $_POST['tinlfiw']==null || $_POST['tinltw']==null || $_POST['tinlfw']==null || $_POST['tinlow']==null || $_POST['tindo']==null || $_POST['tindow']==null){
		echo '<script type="text/javascript">
			alert ("Please go back and firstly enter all the necessary information");
			window.location = "prog_sel_yr.php"
			</script>';
		/*echo "Please go back and firstly enter all the necessary information";
		exit;*/
			
	}
	else
		{
			$nblaze=$_POST['nblaze'];
			$nmzd=$_POST['nmazd'];
			$tinc=$_POST['tinc'];
			$tinca=$_POST['tinca'];
			$tind=$_POST['tind'];
			$tinl=$_POST['tinlfi'];
			$tinlt=$_POST['tinlt'];
			$tinlf=$_POST['tinlf'];
			$tinlo=$_POST['tinlo'];
			$tindo=$_POST['tindo'];
			$tincw=$_POST['tincw'];
			$tincaw=$_POST['tincaw'];
			$tindw=$_POST['tindw'];
			$tinlw=$_POST['tinlfiw'];
			$tinltw=$_POST['tinltw'];
			$tinlfw=$_POST['tinlfw'];
			$tinlow=$_POST['tinlow'];
			$tindow=$_POST['tindow'];
						$quty="SELECT frange FROM verify WHERE lotno='$ppl' AND division='$divi' AND year='$yr'";
		$utit = mysql_query($quty) or die(mysql_error());
		$frng = array();
		while($info = mysql_fetch_array( $utit )) 
		{  
			$frng[]=$info['frange'];
			
		  		
		} 
		$frng = $frng[0];
			if(mysql_num_rows(mysql_query("select * from tap_store Where year='$yr' AND lotno='$ppl' AND division='$divi' AND frmmonth='$frmm' AND frmdate='$frmd'"))==0)
				{
				$q="insert into tap_store (lotno, division, year, frmdate, frmmonth, frmyear, todate, tomonth, toyear, nblazes, nmazdoor, remark, tin_collect, tin_carried, tin_dispatch, tin_dispatch_o, tin_lost_fi, frange, tin_collect_w, tin_carried_w, tin_dispatch_w, tin_dispatch_o_w, tin_lost_fi_w, tin_lost_f, tin_lost_t, tin_lost_o, tin_lost_f_w, tin_lost_t_w, tin_lost_o_w) values ('$ppl','$divi','$yr','$frmd','$frmm','$frmy','$tod','$tom','$toy','$nblaze','$nmzd','$remark','$tinc','$tinca','$tind','$tindo','$tinl','$frng','$tincw','$tincaw','$tindw','$tindow','$tinlw','$tinlf','$tinlt','$tinlo','$tinlfw','$tinltw','$tinlow')";
				mysql_query($q);
				}
			else
			{
			echo '<script type="text/javascript">
			alert ("You have already entered fortnightly report for the particular lot in particular month for the particular resin season");
			window.location = "prog_sel_yr.php"
			</script>';
			/*echo "You have already entered fortnightly report for the particular lot in particular month for the particular resin season";
			exit;*/
			}
		
		}
	}
	else
	{
	if($_POST['nblaze']==null || $_POST['nblazes']==null || $_POST['nmazd']==null || $_POST['tinc']==null || $_POST['tinca']==null || $_POST['tind']==null || $_POST['tinlfi']==null || $_POST['tinlt']==null || $_POST['tinlf']==null || $_POST['tinlo']==null || $_POST['tincw']==null || $_POST['tincaw']==null || $_POST['tindw']==null || $_POST['tinlfiw']==null || $_POST['tinltw']==null || $_POST['tinlfw']==null || $_POST['tinlow']==null || $_POST['tindo']==null || $_POST['tindow']==null){
		echo '<script type="text/javascript">
			alert ("Please go back and firstly enter all the necessary information");
			window.location = "prog_sel_yr.php"
			</script>';
		/*echo "Please go back and firstly enter all the necessary information";
		exit;*/	
	}
	else
		{
		$nblazes=$_POST['nblazes'];
			$nblaze=$_POST['nblaze'];
			$nmzd=$_POST['nmazd'];
			$tinc=$_POST['tinc'];
			$tinca=$_POST['tinca'];
			$tind=$_POST['tind'];
			$tinl=$_POST['tinlfi'];
			$tinlt=$_POST['tinlt'];
			$tinlf=$_POST['tinlf'];
			$tinlo=$_POST['tinlo'];
			$tindo=$_POST['tindo'];
			$tincw=$_POST['tincw'];
			$tincaw=$_POST['tincaw'];
			$tindw=$_POST['tindw'];
			$tinlw=$_POST['tinlfiw'];
			$tinltw=$_POST['tinltw'];
			$tinlfw=$_POST['tinlfw'];
			$tinlow=$_POST['tinlow'];
			$tindow=$_POST['tindow'];
			$quty="SELECT frange FROM verify WHERE lotno='$ppl' AND division='$divi' AND year='$yr'";
		$utit = mysql_query($quty) or die(mysql_error());
		$frng = array();
		while($info = mysql_fetch_array( $utit )) 
		{  
			$frng[]=$info['frange'];
			
		  		
		} 
		$frng = $frng[0];
			if(mysql_num_rows(mysql_query("select * from tap_store Where year='$yr' AND lotno='$ppl' AND division='$divi' AND frmmonth='$frmm' AND frmdate='$frmd'"))==0 || mysql_num_rows(mysql_query("select * from bark_store Where year='$yr' AND lotno='$ppl' AND division='$divi' AND frmmonth='$frmm' AND frmdate='$frmd'"))==0)
				{
				$q="insert into tap_store (lotno, division, year, frmdate, frmmonth, frmyear, todate, tomonth, toyear, nblazes, nmazdoor, remark, tin_collect, tin_carried, tin_dispatch, tin_dispatch_o, tin_lost_fi, frange, tin_collect_w, tin_carried_w, tin_dispatch_w, tin_dispatch_o_w, tin_lost_fi_w, tin_lost_f, tin_lost_t, tin_lost_o, tin_lost_f_w, tin_lost_t_w, tin_lost_o_w) values ('$ppl','$divi','$yr','$frmd','$frmm','$frmy','$tod','$tom','$toy','$nblaze','$nmzd','$remark','$tinc','$tinca','$tind','$tindo','$tinl','$frng','$tincw','$tincaw','$tindw','$tindow','$tinlw','$tinlf','$tinlt','$tinlo','$tinlfw','$tinltw','$tinlow')";
				$q1="insert into bark_store (lotno, division, year, frmdate, frmmonth, frmyear, todate, tomonth, toyear, nblazes, nmazdoor, remark, frange) values ('$ppl','$divi','$yr','$frmd','$frmm','$frmy','$tod','$tom','$toy','$nblazes','$nmzd','$remark','$frng')";
				mysql_query($q);
				mysql_query($q1);
				}
			else
			{
			echo '<script type="text/javascript">
			alert ("You have already entered fortnightly report for the particular lot in particular month for the particular resin season");
			window.location = "prog_sel_yr.php"
			</script>';
			/*echo "You have already entered fortnightly reports for the particular lot in particular month for the particular resin season";
		    exit;*/
			}
		
		
		
		}
}
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
			
				<a name="TemplateInfo"></a>	
				<h1><div style="float:left">Add Progress Report</div>
				
				
				
 <div style="float:right"><font size=2><?php date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></div></h1>
			 	<br>
				<p>Thank you your Information Has been stored</p>
				
				
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
