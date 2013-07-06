<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" CodeFile="Default.aspx.cs" Inherits="Default" %>

<asp:Content ContentPlaceHolderID="Head" Runat="Server"></asp:Content>

<asp:Content ContentPlaceHolderID="Content" Runat="Server">
    <form id="form1" runat="server">
<asp:Login ID="Login1" runat="server" onauthenticate="Login1_Authenticate1">
</asp:Login>
    Your content goes here.
</form>
</asp:Content>

<asp:Content ContentPlaceHolderID="Footer" Runat="Server"></asp:Content>

<asp:Content ContentPlaceHolderID="AfterBody" Runat="Server"></asp:Content>