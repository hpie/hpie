<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="temp_qry.aspx.cs" Inherits="temp_qry" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:TextBox ID="TextBox1" runat="server" Height="121px" TextMode="MultiLine" 
        Width="417px"></asp:TextBox>
    <br />
    <br />
    <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
        ControlToValidate="TextBox1" ErrorMessage="Enter Query" ForeColor="#CC3300" 
        SetFocusOnError="True"></asp:RequiredFieldValidator>
    <br />
    <br />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [gate_pass]"></asp:SqlDataSource>
    <br />
    <br />
    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
        Text="Execute" />
&nbsp;<asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="View" />
&nbsp;<asp:Label ID="Label1" runat="server" ForeColor="#CC3300"></asp:Label>
    <br />
    <asp:GridView ID="GridView1" runat="server">
    </asp:GridView>
</asp:Content>

