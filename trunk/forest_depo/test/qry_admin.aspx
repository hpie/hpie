<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="qry_admin.aspx.cs" Inherits="admin_qry_admin" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:TextBox ID="TextBox1" runat="server" Height="89px" TextMode="MultiLine" 
        Width="509px"></asp:TextBox>
    <br />
    <br />
    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
        Text="Execute" />
&nbsp;<asp:Label ID="Label1" runat="server" style="color: #CC3300"></asp:Label>
    <br />
    <asp:GridView ID="GridView1" runat="server">
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [actv]"></asp:SqlDataSource>
</asp:Content>

