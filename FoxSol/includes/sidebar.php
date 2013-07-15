<?php
if(!empty($_SESSION['category']))
{
	if($_SESSION['category']=='client'){
echo '<div class="sidebox">	
			
				<h1 class="clear">Main Menu</h1>
				<ul class="sidemenu">
				
					<li><a href="client.php">My Page</a></li>
					<li><a href="change_pass.php">Change My Password</a></li>
					<li><a href="add_lot1.php">Add Lot Description</a></li>
					<li><a href="Enum_list.php">Enter Enumeration List</a></li>
					<li><a href="prop_yield.php">Proposed Yield</a></li>
					<li><a href="set_yield_fixed.php">Enter the Approved Yield</a></li>
					<li><a href="create_economy.php">Create the Economics</a></li>
					<li><a href="sel_year_upset.php">Show Proposed Upset Price List</a></li>
					
					<li><a href="lot_create.php" class="top">Enter the Approved Verified List</a></li>
					<li><a href="sel_year.php" class="top">Show Verified List</a></li>
					<li><a href="sel_work.php">Add/Edit LSM Details</a></li>
					<li><a href="sel_workD.php">Dellocate Work from LSM</a></li>
					<li><a href="sel_LotL.php">See LSM details for a Lot</a></li>
					<li><a href="sel_yearlsm.php">View Current LSM Details</a></li>
					
					<li><a href="prog_sel_yr.php">Add the Progress Report</a></li>
                                        <li><a href="sel_month_prog.php">Monthly Progress Report</a></li>
										<li><a href="set_yieldSS_Obtained.php">Enter/Edit the Yield Sent to Factory</a></li>
										<li><a href="set_yield_Obtained.php">Enter/Edit the Actual Yield Obtained </a></li>
										
					<li><a href="logout.php">Logout</a></li>
									
				</ul>	
				
			</div>';
			}
			else if($_SESSION['category']=='admin')
			{
			echo '<div class="sidebox">	
			
				<h1 class="clear">Main Menu</h1>
				<ul class="sidemenu">
				    <li><a href="admin.php" class="top">My Page</a></li>
					<li><a href="change_pass.php">Change My Password</a></li>
					<li><a href="member.php" class="top">Add a Member</a></li>
					<li><a href="del_sel_mem.php">Delete a Member</a></li>
					<li><a href="add_lot1.php">Add Lot Description</a></li>
					<li><a href="edit_lot_sel.php">Edit Lot Description</a></li>
					<li><a href="edit_ver_lot.php">Delete Verified Lot</a></li>
					<li><a href="del_sel_prog_yr.php">Delete Progress Report</a></li>
					<li><a href="set_charges.php">Enter/Edit the Schedule Rates</a></li>
					<li><a href="del_complete_lot.php">Delete Everything for Lot</a></li>
						<li><a href="logout.php">Logout</a></li>
									
				</ul>	
				
			</div>';
			}
}
			else
			{
			echo '<div class="sidebox">	
			
				<h1 class="clear">Main Menu</h1>
				<ul class="sidemenu">
				
					<li><a href="index.php" class="top">Home</a></li>
					<li><a href="index.php">Login</a></li>
					
									
				</ul>	
				
			</div>';
			}
			
			?>