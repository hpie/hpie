<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
    ConnectionString="<%$ ConnectionStrings:himuda %>" 
    SelectCommand="SELECT * FROM [Employee] order by ac" 
    UpdateCommand="UPDATE Employee SET OB = @OB, Ins_ob = @Ins_ob WHERE (AC = @ac)">
    <UpdateParameters>
        <asp:Parameter Name="OB" />
        <asp:Parameter Name="Ins_ob" />
        <asp:Parameter Name="ac" />
    </UpdateParameters>
</asp:SqlDataSource>
<asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Button" 
    Visible="False" />
<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:himuda %>" 
    SelectCommand="SELECT * FROM [Table1]"></asp:SqlDataSource>
</asp:Content>

