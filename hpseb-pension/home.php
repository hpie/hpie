<?php
include_once("include/checksession.php");
include("include/header.php");

?>

<body bgcolor="#f2f2f2">
<?php
	include("include/links.php");
?>
<form name="login" method="post" action="verify.php" onSubmit="return verify()">
<table width="760px" border="0" align="center" cellpadding="0" cellspacing="0">

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
				<!--<tr>
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
					  <input type="submit" name="submit1" value="  Login  ">  
					  <input type="button" name="button1" value="  Clear " onClick="clearvalues()">
					</td>
				</tr>-->
				<tr>
					<td></td>
				</tr>
			</table>
 
   		</td>
		<td width="30%">&nbsp;</td>
   </tr>
</table>
</form>

</body>
</html>