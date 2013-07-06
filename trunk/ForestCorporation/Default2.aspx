<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="Default2.aspx.cs" Inherits="Default2" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
</asp:Content>

<asp:Content ID="Content3" runat="server" 
    contentplaceholderid="ContentPlaceHolder3">

    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Button" />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" InsertCommand="ALTER TABLE ob
ADD type varchar(20),session varchar(50)" 
        ProviderName="<%$ ConnectionStrings:ForestConnectionString.ProviderName %>">
    </asp:SqlDataSource>
    <br />

</asp:Content>


