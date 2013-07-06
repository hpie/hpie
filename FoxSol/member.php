<?php
session_start();
if((!$_SESSION['logged']) || ($_SESSION['category'] != 'admin')){
	header("Location: index.php");
	exit;

}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
				<h1>Add a member&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<font size=2><?php 
 date_default_timezone_set('Asia/Calcutta');
 print date("jS F Y, g:i A");
?></font></h1>
				<br>
			<form action="addmember.php" method="post"><table><tr><td>
			Name : </td><td><input type="text" name='name' value=''/></td></tr><tr><td>
			Client ID : </td><td><input type="text" name='uname' value=''/></td></tr><tr><td>
			Password : </td><td><input type="password" name='pass' value=''/><br></td></tr><tr><td>
						Category : </td><td><select name='cat'><option value='admin'>Admin</option><option value='client'>Client</option></select></td></tr><tr><td>

				<input type="submit" style='background-color:#b6e38e; width: 120px;' value='Add Member'/></td></tr></table> 
			</form> 
				
				
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
