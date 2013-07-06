<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="ajax.aspx.cs" Inherits="ajax" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">

<script type="text/javascript">
    function ShowProcessImage() {
        var autocomplete = document.getElementById('txtCountry');
        autocomplete.style.backgroundImage = 'url(loading1.gif)';
        autocomplete.style.backgroundRepeat = 'no-repeat';
        autocomplete.style.backgroundPosition = 'right';
    }
    function HideProcessImage() {
        var autocomplete = document.getElementById('txtCountry');
        autocomplete.style.backgroundImage = 'none';
    }
</script>

</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <asp:Timer ID="Timer1" runat="server">
    </asp:Timer>
    <br />
    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
    <asp:AutoCompleteExtender ID="TextBox1_AutoCompleteExtender" runat="server" 
        DelimiterCharacters="" Enabled="True" ServicePath="" TargetControlID="TextBox1">
    </asp:AutoCompleteExtender>
&nbsp;<asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Ajax</asp:LinkButton>
</asp:Content>

