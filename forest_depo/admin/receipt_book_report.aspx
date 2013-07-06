<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="receipt_book_report.aspx.cs" Inherits="receipt_book_report" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
   
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
   
    <style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
            width: 146px;
        }
        .style3
        {
            width: 721px;
        }
        .style4
        {
            width: 196px;
            height: 50px;
        }
        .style5
        {
            width: 33px;
            height: 50px;
        }
        .style6
        {
            height: 50px;
        }
        .style7
        {
            width: 146px;
            height: 118px;
        }
        .style8
        {
            width: 721px;
            height: 118px;
        }
        .style9
        {
            height: 118px;
        }
        .style10
        {
            width: 146px;
            height: 193px;
        }
        .style11
        {
            width: 721px;
            height: 193px;
        }
        .style12
        {
            height: 193px;
        }
        .style13
        {
            width: 342px;
        }
        .style14
        {
            width: 297px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    Select Receipt No :&nbsp;    
    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource1" DataTextField="no" 
        DataValueField="no" 
        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                    </asp:DropDownList>
                    <br />
                      <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
           <br />
    <br />
           <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" />
            <div id="div_print"> 
           <table class="style1">
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td class="style3">
           
                   
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                   <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT [no] FROM [receipt_book]"></asp:SqlDataSource>
            
                <h2><strong>receipt book </strong> </h2>
                
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT*FROM [receipt_book] where no=@book_no">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="book_no" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                    </asp:SqlDataSource>
                
                   
                <p><strong>Himkasth Sale Depot................................<br />
                    (A Unit of H.P. State Forest Corporation Limited)</strong></p>
                <p>&nbsp;</p>
                <table class="style1" style="text-align: left">
                    <tr>
                        <td class="style5">
                        </td>
                        <td class="style4">
                            <strong>No</strong>
                            <asp:Label ID="no" runat="server"></asp:Label>
                        </td>
                        <td class="style6">
                                   <strong>Date:</strong>
                            <asp:Label ID="rec_date" runat="server"></asp:Label></td>
                        <td class="style6">
                     
                            <strong>&nbsp;Book No. </strong>
                            <asp:Label ID="book_no" runat="server"></asp:Label>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style10">
                </td>
            <td class="style11" 
                style="text-align: left; vertical-align: top; line-height: 35px;">
                <strong>Received with thanks from M/s </strong>
                <asp:Label ID="pur_name" runat="server" style="text-decoration: underline"></asp:Label>
                <strong>&nbsp;the sum of Rs </strong>
                <asp:Label ID="rs" runat="server" style="text-decoration: underline"></asp:Label>
                <strong>&nbsp; (Rupees&nbsp; </strong>
                <asp:Label ID="rs_t" runat="server" style="text-decoration: underline"></asp:Label>
                <strong>) on account of sale proceeds/EMD of </strong>
                <asp:Label ID="emd" runat="server" style="text-decoration: underline"></asp:Label>
                <strong>&nbsp;by </strong>
                <asp:Label ID="payment_type" runat="server" style="text-decoration: underline"></asp:Label>
                <strong>&nbsp;:
                no. </strong>
                <asp:Label ID="pay_no" runat="server" style="text-decoration: underline"></asp:Label>
                <strong>&nbsp;dated </strong>
                <asp:Label ID="dat" runat="server" style="text-decoration: underline"></asp:Label>
                <strong>&nbsp;payable at </strong>
                <asp:Label ID="payable_at" runat="server" style="text-decoration: underline"></asp:Label>
            </td>
            <td class="style12">
                </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style8" style="text-align: left; vertical-align: top;">
                <table class="style1">
                    <tr>
                        <td class="style14">
                            <b>Cashier</b></td>
                        <td class="style13">
                            <b>Sr. Accountant</b></td>
                        <td>
                            <b>DM/Depot Officer</b></td>
                    </tr>
                    <tr>
                        <td class="style14">
                            &nbsp;</td>
                        <td class="style13">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                </table>
            </td>
            <td class="style9">
                &nbsp;</td>
        </tr>
    </table>
  </div>
</asp:Content>

