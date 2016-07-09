<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="detail.aspx.cs" Inherits="detail" Title="Himuda EPF Subscription Details" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">

    <script language="javascript" type="text/javascript">
function ExportDivDataToExcel()
{
var html = $("#divExport").html();
html = $.trim(html);
html = html.replace(/>/g,'&gt;');
html = html.replace(/</g,'&lt;');
$("input[id$='HdnValue']").val(html);
}
</script>
 <script language="javascript" type="text/javascript">
     function printDiv(divID) {
         //Get the HTML of div
         var divElements = document.getElementById(divID).innerHTML;
         //Get the HTML of whole page
         var oldPage = document.body.innerHTML;

         //Reset the page's HTML with div's HTML only
         document.body.innerHTML = "<html><head><title>Subscription Details</title></head><body>" + divElements + "</body>";

         //Print Page
         window.print();

         //Restore orignal HTML
         document.body.innerHTML = oldPage;

         //disable postback on print button
         return false;
     }
    </script>

    <style type="text/css">
         @media print {
            @page {
                margin: 4.0cm;
            }
        }    
        .style1
        {
            width: 353px;
            border: 1px solid #000000;
            height: 399px;
        }
        .style2
        {
            width: 219px;
        }
        .style3
        {
            width: 749px;
            border-collapse: collapse;
            border: 1px solid #000000;
        }
        .style4
        {
            width: 143px;
        }
        .style5
        {
            width: 322px;
        }
        .style7
        {
            width: 249px;
            text-align: left;
        }
        .style8
        {
            width: 308px;
        }
        .style9
        {
            width: 746px;
            text-align: right;
        }
        .style10
        {
            width: 500px;
            border: 1px solid #000000;
        }
        .style11
        {
            width: 305px;
        }
        .style12
        {
            width: 129px;
        }
        .style17
        {
            width: 129px;
            height: 25px;
        }
        
        #subscriptionHeader
        {
        }
        
        #subscriptionHeader table
        {
            width: 860px;
            background-color: #7779AF;
            /*text-align: right;*/
        }
        #subscriptionHeader table td
        {
             font-family: Verdana; 
             font-size: medium;
             border: 1px solid #000000;
        }
        #subscriptionGrid
        {
          /*position:relative;
          top:50px;
          left:200px;*/
        }
        #subscriptionFooter
        {
        }
        #subscriptionFooter table
        {
            width: 480px;
             background-color: #CCCCCC;
            /*text-align: right;*/
        }
        #subscriptionFooter table td
        {
            font-family: Verdana; 
            font-size: medium;
            border: 1px solid #000000;
        }
    </style>
</asp:Content>

<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    
  <ajaxToolkit:ToolkitScriptManager runat="Server" ID="ScriptManager1" />

    <asp:Panel ID="Panel1" runat="server">
     

     <%-- Search header on Top--%>
        <table cellpadding="0" id="excel" runat="server" cellspacing="0" style="height: 82px">
            <tr>
                <td>
                    <br />
                    <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>  
                    <br />
                    <br />
                    &nbsp;<br />
                     
                </td>
                <td>
                   
                  
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style17">
                Select Ac Number</td>
                <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC" 
                        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style12">
                    Session</td>
                <td class="style2">
                <asp:DropDownList ID="DropDownList2" runat="server">
                </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style12">
                    &nbsp;</td>
                <td class="style2">
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:himuda %>" 
                        SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
                    <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" /></td>
            </tr>
        </table>
       
    </asp:Panel>
    

 <div id="print">

    <div id="divPrint" runat="server">
        <table cellpadding="0" class="style3"  runat="server" visible="false"  id="dd">
            <tr>
                <td class="style4">
                    Name</td>
                <td>
                    <asp:Label ID="Label2" runat="server"></asp:Label>
                </td>
                <td class="style5">
                    <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label11" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label12" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label13" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label15" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label16" runat="server" Text="Label"></asp:Label>
                </td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style4">
                    Account Number 
                </td>
                <td>
                    <asp:Label ID="Label3" runat="server"></asp:Label>
                </td>
                <td class="style5">
                    OPENING BALANCE&nbsp;
                    <asp:Label ID="Label4" runat="server" Text="0"></asp:Label>
                </td>
                <td>
                    Rs.<asp:Label ID="Label14" runat="server" Text="0"></asp:Label>
                    <asp:Label ID="Label5" runat="server" Text="0"></asp:Label>
                </td>
            </tr>
        </table>
              
    <br />

        <div id="div_print" style="">
 <center>
        <div id="subscriptionHeader">
            <table cellpadding="0" class="style3"  runat="server" visible="true"  id="subscriptionHeaderTable">
                <tr>
                    <td class="style4">
                        &nbsp;
                    </td>
                    <td>
                        Year   
                    </td>
                    <td class="style5">
                        <asp:Label ID="LabelSession" runat="server"></asp:Label>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        &nbsp;
                    </td>
                    <td>
                        Name of Subscriber   
                    </td>
                    <td class="style5">
                        <asp:Label ID="LabelName" runat="server"></asp:Label>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        &nbsp;
                    </td>
                    <td>
                        Designation   
                    </td>
                    <td class="style5">
                        <asp:Label ID="LabelDesignation" runat="server"></asp:Label>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        &nbsp;
                    </td>
                    <td>
                        Account No   
                    </td>
                    <td class="style5">
                        <asp:Label ID="LabelAccountNo" runat="server"></asp:Label>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        &nbsp;
                    </td>
                    <td>
                        Opening Balance   
                    </td>
                    <td class="style5">
                        <asp:Label ID="LabelOpeningBalance" runat="server"></asp:Label>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>     
            </table>
        </div>

        <div id="subscriptionGrid">
        <asp:GridView ID="subscriptionGridView" runat="server" AutoGenerateColumns="false" HeaderStyle-BackColor="#7779AF" HeaderStyle-ForeColor="Black" OnRowDataBound="subscriptionGridView_RowDataBound" style="font-family: Verdana; font-size: small" BackColor="White"  BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" Width="860px">
            <Columns>
                <asp:BoundField DataField="t_account" HeaderText="Account No" Visible="false" />
                <asp:BoundField DataField ="t_monthCalculation" HeaderText="Month" />
                <asp:BoundField DataField="t_monthlySub" HeaderText="Subscription" ItemStyle-HorizontalAlign="Right" />
                <asp:BoundField DataField="t_monthlyArrear" HeaderText="Arrear" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_monthlyRecovery" HeaderText="Recovery" ItemStyle-HorizontalAlign="Right"/>
                <%--<asp:BoundField DataField="t_monthlySharedArrear" HeaderText="Shared Arrear" ItemStyle-HorizontalAlign="Right"/>--%>
                <asp:BoundField DataField="t_monthlySubTotal" HeaderText="Sub + Adv" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_monthlyAdvance" HeaderText="Adv / With" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_totalMonthly" HeaderText="TOTAL" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_sumYearlyBalance" HeaderText="Monthly Balance" ItemStyle-HorizontalAlign="Right"/>
            </Columns>
        </asp:GridView>
        </div>

        <div id="subscriptionFooter">
            <table id="subscriptionFooterTable" cellpadding="0" cellspacing="0" class="style10" runat="server" visible="true">
                <tr>
                    <td class="style11">
                        BALANCE FROM PREVIOUS YEAR
                    </td>
                    <td align="right">
                        <asp:Label ID="LabelFOpeningBalance" runat="server"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style11">
                        DEPOSITS AND REFUNDS
                    </td>          
                    <td align="right">
                        <asp:Label ID="LabelFDepositRefunds" runat="server"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style11">
                        INTEREST FOR  <asp:Label ID="LabelFSession" runat="server"></asp:Label>
                    </td>
                    <td align="right">
                        <asp:Label ID="LabelFInterest" runat="server"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style11">
                        LESS ADVANCES/WITHDRAWLS(-)</td>
                    <td align="right">
                        <asp:Label ID="LabelFAdvance" runat="server"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style11">
                        FINAL PAYMENT
                    </td>
                    <td align="right">
                        <asp:Label ID="LabelFFinalPayment" runat="server"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style11">
                        BALANCE AS ON
                    </td>
                    <td align="right">
                        <asp:Label ID="LabelFCurrentBalance" runat="server"></asp:Label>
                    </td>
                </tr>        
            </table>
        </div>
</center>
        </div>  

        <table cellpadding="0" cellspacing="0">
            <tr>
                <td class="style8">
                    &nbsp;
                </td>
                <td class="style9">
                    &nbsp;
                </td>    
                <td class="style7">
                    <asp:Label ID="Label6" runat="server" style="font-weight: 700" Text="Label" Visible="False"></asp:Label>
                </td>
            </tr>
        </table>
   
    <br />
    </div>
 
    <br />   
 </div>


</asp:Content>

