<?php
	session_start();
	//include config
	include "config.php";
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo($titleMsg);?></title>
<link rel="stylesheet" href="./css/style.css" type="text/css" />	
<script type="text/javascript" src="./js/parsley-standalone.min.js"></script>
</head>

<body class='CSSTableGenerator'>
<!-- wrap starts here -->
<div id="wrap">
	<!-- header start -->
	<?php include('includes/header.php'); ?>
    <!-- header end-->
    
<!-- content-wrap starts here -->
	<div id="content-wrap">
	<!-- content starts here -->		    	
        <div id="content">	
        	<div id="msgdiv"> 
        		<p style="color:#CC0000"><?php echo $msg; ?></p>
        	</div>	
		<!-- sidebar starts here -->		       
			<div id="sidebar" >
    			<?php include('includes/sidebar.php');	?>        
            </div>
		<!-- sidebar ends here -->

        
        <!-- post starts here -->				            
            <div class="post">
            
            	<h1>
                	<div style="float:left; padding:0px 0px 0px 5px;"><?php echo($pageTitle);?> <?php echo($_SESSION['fname']);?>. <font size="1">You are currently working in <?php echo($_SESSION['division']);?> division.</font> </div>
					<div style="float:right;"><font size=2>
                    	<?php 
							date_default_timezone_set('Asia/Calcutta');
							print date("jS F Y, g:i A");
						?>
                       </font> 
                     </div>
                 </h1>
       
                <br />
				<p>&nbsp;</p>
				<p>&nbsp;</p>
					<center>
						<h1>Welcome, You are currently logged in with <?php echo($_SESSION['role'])?> privilages.</h1>
						<h1>Please choose from the actions avaliable in the menu to your left.</h1>
					</center>
			  
				
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