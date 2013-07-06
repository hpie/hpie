<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="login.aspx.cs" Inherits="login" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <p>
    </p>
</asp:Content>

<asp:Content ID="Content3" runat="server" 
    contentplaceholderid="ContentPlaceHolder3">
    <asp:Login ID="Login1" runat="server" BackColor="#E3EAEB" BorderColor="#E6E2D8" 
    BorderPadding="4" BorderStyle="Solid" BorderWidth="1px" Font-Names="Verdana" 
    Font-Size="0.8em" ForeColor="#333333" onauthenticate="Login1_Authenticate" 
        Height="151px" TextLayout="TextOnTop" Width="304px">
    <TextBoxStyle Font-Size="0.8em" />
    <LoginButtonStyle BackColor="White" BorderColor="#C5BBAF" BorderStyle="Solid" 
        BorderWidth="1px" Font-Names="Verdana" Font-Size="0.8em" ForeColor="#1C5E55" />
    <InstructionTextStyle Font-Italic="True" ForeColor="Black" />
    <TitleTextStyle BackColor="#1C5E55" Font-Bold="True" Font-Size="0.9em" 
        ForeColor="White" />
</asp:Login>
</asp:Content>


