<?php
if(!empty($_SESSION['role']))
{
	if($_SESSION['role']=='client')
	{
?>		
		<div class="sidebox">	
			<h1 class="clear">Main Menu</h1>
			
            	<ul class="sidemenu">
				<li><a href="home.php" class="top">My Page</a></li>
				<li><a href="change-password.php">Change My Password</a></li>
				<li><a href="#"></a></li>
				<li><a href="receive-blazes.php">View Blazes List</a></li>
				<li><a href="tender-form-details.php">Tender Forms</a></li>
				<li><a href="lot-progress.php">Work Progress</a></li>
				<li><a href="#"></a></li>
				<li><a href="logout.php">Logout</a></li>
								
			</ul>	
				
		</div>
            
<?php          
	}else if($_SESSION['role']=='sysadmin' || $_SESSION['role']=='admin' || $_SESSION['role']=='manager' || $_SESSION['role']=='director')
	{
			
?>
		<div class="sidebox">	
			<h1 class="clear">Main Menu</h1>
			
            		<ul class="sidemenu">
				<li><a href="home.php" class="top">My Page</a></li>
				<li><a href="change-password.php">Change My Password</a></li>
				<li><a href="unit-master.php">Manage Units</a></li>
				<li><a href="dfo-master.php">Manage DFOs</a></li>
				<li><a href="range-master.php">Manage Forest Ranges</a></li>
				<li><a href="forest-rsd-master.php">Manage Forest's RSD</a></li>
				<li><a href="forest-master.php">Manage Forests</a></li>
				<li><a href="contractor-master.php">Manage Contractors</a></li>
				<li><a href="srate-master.php">Schedule Rates</a></li>
				<li><a href="#"></a></li>
				<li><a href="lot-master.php">Manage Lots</a></li>
				<li><a href="receive-blazes.php">View Blazes List</a></li>
				<li><a href="tender-form-details.php">Tender Forms</a></li>
				<li><a href="lot-progress.php">Work Progress</a></li>
				<li><a href="#"></a></li>
				<li><a href="report-lot-blazes.php">Verify Blazes Report</a></li>
				<li><a href="report-range-blazes.php">Blazes Taken Over Report</a></li>
				<li><a href="report-proposed-extraction-yield.php">Proposed Resin Yield Report</a></li>
				<li><a href="report-proposed-upset-price.php">Proposed Upset Price Report</a></li>
				<li><a href="report-upset-price-details.php">Upset Price Report</a></li>
				<li><a href="report-tender-forms.php">Tender Forms Report</a></li>
				<li><a href="report-tender-negotiated-forms.php">Tender Negotiated Report</a></li>
				<li><a href="report-monthly-progress-tapping.php">Progress Tapping Report</a></li>
				<li><a href="report-monthly-progress-carriage.php">Progress Carriage Report</a></li>
				<li><a href="report-monthly-progress-carriage-remaining.php">Progress Remaining Report</a></li>
				<li><a href="logout.php">Logout</a></li>
									
			</ul>	
			
		</div>
<?php
	}
}else
{
	
?>

		<div class="sidebox">	
			<h1 class="clear">Main Menu</h1>
				
                	<ul class="sidemenu">			
                        	<li><a href="home.php" class="top">Home</a></li>
                        	<li><a href="index.php">Login</a></li>
                                        
			</ul>	
				
		</div>
<?php
}

?>