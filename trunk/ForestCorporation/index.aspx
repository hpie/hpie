<%@ Page Language="C#" AutoEventWireup="true" CodeFile="index.aspx.cs" Inherits="index" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta charset="UTF-8" />
<meta name="Designer" content="PremiumPixels.com">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>
<body>
   <form class="box login" runat="server">
   <b>HP State Forest Corporation Ltd.</b> 
	<fieldset class="boxBody">
	  <label>Username</label>
        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
&nbsp;<label><a href="#" class="rLink" tabindex="5"><asp:Label ID="Label1" 
            runat="server"></asp:Label>
        </a>Password</label>&nbsp;
        <asp:TextBox ID="TextBox2" TextMode="Password" runat="server"></asp:TextBox>
	</fieldset>
    <footer>
	  &nbsp;<%--<input type="submit" class="btnLogin" value="Login" tabindex="4"><asp:Button 
        ID="Button1" runat="server" Text="Button" />--%>
    <asp:Button ID="Button2" class="btnLogin" runat="server" Text="Login" 
        onclick="Button2_Click" />

	  
	&nbsp;</footer></form>
</body>
</html>
