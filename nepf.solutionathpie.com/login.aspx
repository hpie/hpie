<%@ Page Language="C#" MasterPageFile="log.master" AutoEventWireup="true" CodeFile="login.aspx.cs" Inherits="login" Title="Untitled Page" %>




<asp:Content ID="Content1" runat="server" 
    contentplaceholderid="ContentPlaceHolder1">

        
                    <asp:Login ID="Login1" runat="server" BackColor="#FFFBD6" BorderColor="#FFDFAD" 
    BorderPadding="4" BorderStyle="Solid" BorderWidth="1px" Font-Names="Verdana" 
    Font-Size="0.8em" ForeColor="#333333" onauthenticate="Login1_Authenticate" 
        Height="217px" Width="397px" TextLayout="TextOnTop" style="font-size: x-large">
    <TextBoxStyle Font-Size="0.8em" />
    <LoginButtonStyle BackColor="White" BorderColor="#CC9966" BorderStyle="Solid" 
        BorderWidth="1px" Font-Names="Verdana" Font-Size="0.8em" ForeColor="#990000" />
    <InstructionTextStyle Font-Italic="True" ForeColor="Black" />
    <TitleTextStyle BackColor="#990000" Font-Bold="True" Font-Size="0.9em" 
        ForeColor="White" />
</asp:Login>
        
        

</asp:Content>
