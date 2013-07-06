<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="rest_back.aspx.cs" Inherits="admin_rest_back" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Backup Database</asp:LinkButton>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Restore Database</asp:LinkButton>
</asp:Content>

