<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="reset.aspx.cs" Inherits="admin_reset" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <br />
    <asp:DropDownList ID="DropDownList1" runat="server" ValidationGroup="a">
        <asp:ListItem Value="">Select -Table</asp:ListItem>
        <asp:ListItem>Atten_sheet</asp:ListItem>
        <asp:ListItem>marks_detail</asp:ListItem>
        <asp:ListItem>monthly_atten</asp:ListItem>
        <asp:ListItem>placement</asp:ListItem>
        <asp:ListItem>student_detail</asp:ListItem>
        <asp:ListItem>support_visit</asp:ListItem>
        <asp:ListItem>tb1</asp:ListItem>
        <asp:ListItem>tb2</asp:ListItem>
        <asp:ListItem>tb3</asp:ListItem>
    </asp:DropDownList>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
        ControlToValidate="DropDownList1" ErrorMessage="Select Table" 
        ForeColor="#990000" SetFocusOnError="True" ValidationGroup="a"></asp:RequiredFieldValidator>
    <br />
    <br />
    <asp:Button ID="Button1" runat="server" Text="Reset Table" 
        onclick="Button1_Click" 
        OnClientClick="if(!confirm('Sure to Delete?'))return false;" 
        ValidationGroup="a" />
&nbsp;<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
    SelectCommand="SELECT * FROM [atten_sheet]"></asp:SqlDataSource>
&nbsp;<asp:Label ID="Label1" runat="server" 
        style="font-weight: 700; color: #990000"></asp:Label>
    <br />
    <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
        Text="Execute Query" ValidationGroup="b" />
    <br />
    Enter Query<br />
    <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt" Height="59px" 
        TextMode="MultiLine" ValidationGroup="b" Width="610px"></asp:TextBox>
    <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
        ControlToValidate="TextBox1" ErrorMessage="*" 
        ForeColor="#990000" SetFocusOnError="True" ValidationGroup="b"></asp:RequiredFieldValidator>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <asp:GridView ID="GridView1" runat="server" EmptyDataText="-No Record Find-">
    </asp:GridView>
</asp:Content>

