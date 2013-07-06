<?php ob_start(); session_start();
   
    include('html/header.php');
	include 'include.php';
    include('constants.php');
 	include ("config.php");
    include('html/left_nevi.php');?>
	<!-- InstanceBeginEditable name="content" -->
	
	<div id="content">
	
    <h2>Welcome to Forest Economic</h2>
	
  
  <?php  if(isset($_GET['page'])){
	 if($_GET['page']=='register'){
     include('register.php');
     }
	
	 if($_GET['page']=='profile'){
	 include('profile_header.php');
	 include('profile.php');
	 }
	 
	 if($_GET['page']=='editProfile'){
	 include('profile_header.php');
     include('edit_profile.php');
     }
	 
	 if($_GET['page']=='sc1'){
      include('profile_header.php');
	 include('screen1.php');
     }
	  if($_GET['page']=='sc2'){
      include('profile_header.php');
	 include('screen2.php');
     }
	  if($_GET['page']=='sc3'){
     include('profile_header.php');
	 include('screen3.php');
     }
     if($_GET['page']=='login'){
     include('login.php');
     }

    }
	else{
		 include('login.php');
      }
	  ?>
  </div>
<!-- end of #content -->

<?php
    include('html/right_nevi.php');
 	include('html/footer.php');
?>