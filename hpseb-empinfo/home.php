<?php
	session_start();
	//include config
	include "config.php";
	
?>

<!-- header start -->
	<?php include('includes/header.php'); ?>
<!-- header end-->

<body class='CSSTableGenerator'>
<!-- wrap starts here -->
<div id="wrap">
	
    
<!-- content-wrap starts here -->
	<div id="content-wrap">
	<!-- content starts here -->		    	
        <div id="content">	
        	<div id="msgdiv"> 
        		<p style="color:#CC0000"><?php echo $msg; ?></p>
        	</div>	
		        
        <!-- post starts here -->				            
            <div class="post">
            
            	<h5>
                	<div style="float:left; padding:0px 0px 0px 5px;"><?php echo($pageTitle);?> <?php echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php echo($_SESSION['division']);?> division.</font> </div>
					<div style="float:right;"><font size=2>
                    	<?php 
							date_default_timezone_set('Asia/Calcutta');
							print date("jS F Y, g:i A");
						?>
                       </font> 
                     </div>
                 </h5>
       
                <br />
				<p>&nbsp;</p>
				<p>&nbsp;</p>
					<center>
						<h1>Welcome, You are currently logged in with <?php echo($_SESSION['role'])?> privilages.</h1>
					</center>
			  <h5><a href="employee.php" />Goto Employee Page </a></h5>
			  <h5><a href="#" />Goto Report Page </a></h5>	
			</div>
		<!-- post ends here -->		        

		</div>
	<!-- content ends here -->		        
    </div>
<!-- content-wrap ends here -->		
    

<!-- footer starts here -->	
	<div id="footer">
		<?php include('includes/footer.php'); ?>
	</div>
<!-- footer ends here -->


</div>
<!-- wrap ends here -->

</body>
</html>    