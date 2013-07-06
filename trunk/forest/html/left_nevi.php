 <div id="sidebar-left">    
  
    <ul>
    	<li><a href="<?php echo BASE_URL;?>index.php">Home</a></li>
        <?php if(!isset($_SESSION['userId']))
 	 { ?> <li><a href="<?php echo BASE_URL;?>index.php?page=register"> Register</a></li><?php }?>
     </ul>
            
    <div class="address">
    	<h2>Address</h2>
    	<p></p>
    </div>
    
    <!-- <p class="bold">Find us - </p> -->
    </div>
	