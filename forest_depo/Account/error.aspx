<%@ Page Title="" Language="C#" MasterPageFile="~/Account/Site.master" AutoEventWireup="true" CodeFile="error.aspx.cs" Inherits="Account_error" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <p>
        Wrong Username or Password ....
        <asp:LinkButton ID="LinkButton1" runat="server" 
            PostBackUrl="~/Account/Login.aspx">Try Again</asp:LinkButton>
    </p>
</asp:Content>

