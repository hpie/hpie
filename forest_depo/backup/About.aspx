<%@ Page Title="About Us" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true"
    CodeFile="About.aspx.cs" Inherits="About" %>

<asp:Content ID="HeaderContent" runat="server" ContentPlaceHolderID="HeadContent">


<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML; 
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;
            
            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
            
            //Print Page
            window.print();
            
            //Restore orignal HTML
            document.body.innerHTML = oldPage;
            
            //disable postback on print button
            return false;
        }
    </script>
</asp:Content>
<asp:Content ID="BodyContent" runat="server" ContentPlaceHolderID="MainContent">
    <h2>
        About
    </h2>
    <p>
        Put content here.
    </p>
   <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" />
    <div id="garbage1">I am not going to be print</div>
    <div id="div_print"><h1 style="color: Red">Only Zeeshan Umar loves Asp.Net will be printed :D</h1></div>
    <div id="garbage2">I am not going to be print</div>
</asp:Content>
