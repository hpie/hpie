<?php
include("include/header.php");

include_once("include/config.php");
?>

<body>

<form name="login" method="post" action="verify.php" onSubmit="return verify()">
<table width="760px" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
if(isset($_GET))
{
	if($_GET["invalid"]==1)
	{
		echo"<tr><td></td><td><font color='red'>Incorrect Information!</font></td><td></td></tr>";
	}else if($_GET["invalid"]==2)
	{
		echo "<tr><td></td><td><font color=blue>Session Expired!</font></td><td></td></tr>";	
	}
}
?>
	<tr>
   		<td width="30%">&nbsp;</td> 
   		<td width="40%">
			<table cellpadding="0" cellspacing="2">
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td align="left">Login</td>
					<td align="center">
						<input type = "text" name="loginid" >
					</td>
				</tr>
				<tr>
					<td align="left">Password</td>
					<td align="center">
						<input type = "password" name="loginpass" >
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="center" >
					   <input type="button" name="button1" value="  Clear " onClick="clearvalues()">
					  <input type="submit" name="submit1" value="  Login  "> 
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
 
   		</td>
		<td width="30%">&nbsp;</td>
   </tr>
</table>
</form>

 
<script> 
login.textfield1.focus();

function verify()
{
	loginval = login.loginid.value;
	password = login.loginpass.value;
	if(loginval == ''){
	alert('Enter Login');
	login.loginid.focus();
	return false;
					}
	if(password == ''){
	alert('Enter Password');
	login.loginpass.focus();
	return false;
					}
}
function clearvalues()
{
	 login.loginid.value='';
	 login.loginpass.value='';
     login.loginid.focus();
}			
</script>
</body>
</html>