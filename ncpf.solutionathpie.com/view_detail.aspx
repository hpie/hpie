<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="view_detail.aspx.cs" Inherits="detail" Title="Untitled Page" %>
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
            width: 353px;
            border: 1px solid #000000;
            height: 399px;
        }
        .style2
        {
            width: 219px;
        }
        .style5
        {
            width: 322px;
        }
        .style7
        {
            width: 2677px;
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
        .style18
        {
            height: 51px;
            width: 353px;
            border: 1px solid #000000;
        }
        .style19
        {
            width: 2677px;
        }
        .style20
        {
            width: 2677px;
            height: 11px;
        }
        .style21
        {
            height: 11px;
        }
        .style22
        {
            width: 2677px;
            text-align: left;
            height: 100px;
        }
        .style23
        {
            font-size: medium;
            font-family: Verdana;
        }
        .style24
        {
            width: 746px;
            text-align: right;
            font-size: small;
            height: 29px;
        }
        .style25
        {
            font-size: small;
        }
        .style26
        {
            width: 308px;
            color: #B4B4B4;
        }
        .style27
        {
            height: 100px;
        }
        .style29
        {
            font-size: small;
            font-family: Verdana;
        }
        </style>
    <style type="text/css">
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
        .style18
        {
            width: 284px;
        }
        .style19
        {
            font-size: small;
            font-weight: bold;
            width: 500px;
        }
        .style20
        {
            width: 500px;
            text-align: left;
        }
        .style21
        {
            width: 348px;
        }
        .style22
        {
            width: 500px;
        }
        .style30
        {
            width: 500px;
            text-align: left;
            height: 13px;
        }
        .style31
        {
            width: 746px;
            text-align: right;
            height: 13px;
        }
        .style32
        {
            width: 500px;
            text-align: left;
            height: 29px;
        }
        .style34
        {
            height: 18px;
        }
        .style35
        {
            width: 500px;
            text-align: left;
            height: 18px;
        }
        .style37
        {
            height: 24px;
        }
        .style38
        {
            width: 500px;
            text-align: left;
            height: 24px;
        }
        .style40
        {
            height: 27px;
        }
        .style41
        {
            width: 500px;
            text-align: left;
            height: 27px;
        }
        .style43
        {
            font-size: small;
            font-family: Verdana;
            height: 21px;
        }
        .style44
        {
            width: 500px;
            text-align: left;
            height: 21px;
        }
        .style45
        {
            width: 500px;
            text-align: left;
            height: 26px;
        }
        .style46
        {
            height: 26px;
        }
        .style48
        {
            height: 29px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
    
  <ajaxToolkit:ToolkitScriptManager runat="Server" ID="ScriptManager1" />

    <asp:Panel ID="Panel1" runat="server">
     
        <table cellpadding="0" id="excel" runat="server" cellspacing="0" style="height: 82px">
            <tr>
                <td>
                    <br />
                    
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
                    DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC">
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
        <br />
 
        <br />   

 <div id="div_print">
 <table cellpadding="0" cellspacing="0" BORDER="1"
        style="border-width: 1px; border-color: #000000; font-size: large;" id="table" 
                    runat="server" visible="false" >
        <tr>
            <td class="style18" colspan="2" style="text-align: center">
                    <b>SUBSCRIBER’S ANNUAL ACCOUNT Year</b>               
              <asp:Label ID="LabelSession" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr class="style25">
            <td class="style32">
                    Name of the Subscriber –
                    <asp:Label ID="LabelName" runat="server" Text="Label"></asp:Label>
                    
                    <br />
                    Designation:-<asp:Label ID="LabelDesignation" runat="server" Text="Label"></asp:Label>
                    
                    <br />
                    
                    Account No:-
                    <asp:Label ID="LabelAccountNo" runat="server" Text="Label"></asp:Label>
                    <br />
                    Rate of Interest =8%
            </td>
            <td class="style24"></td>
        </tr>
        <tr class="style23">
            <td class="style19">
                Detail</td>
            <td class="style25">
                <b>Subscribers 
                <br />
                contributions</b>
            </td>
        </tr>
        <tr class="style25">
            <td class="style35"> 
                Balance at Credit in account on
                <asp:Label ID="LabelBalanceOn" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style34">
                <asp:Label ID="LabelBalance" runat="server" Text="Label"></asp:Label>
                
            </td>
        </tr>
        <tr>
            <td class="style30"></td>
            <td class="style31"></td>
        </tr>
        <tr class="style25">
            <td class="style38">     
                    Subscription/Refund of Advance receivede during the year
            </td>
            <td class="style37">
                <asp:Label ID="LabelRefundAdvance" runat="server" Font-Bold="False" Text="Label"></asp:Label>
                
            </td>
        </tr>
        <tr>
            <td class="style20">&nbsp;</td>
            <td class="style9">&nbsp;</td>
        </tr>
        <tr class="style25">
            <td class="style41" >
                    Interest accrued during the year
            </td>
            <td class="style40" >
                <asp:Label ID="LabelInterestDuringYear" runat="server" Font-Bold="False" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style20">&nbsp;</td>
            <td class="style9">&nbsp;</td>
        </tr>
        <tr>
            <td class="style44">
                <strong>Total</strong></td>
            <td class="style43">
                <asp:Label ID="LabelTotal" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style20">&nbsp;</td>
            <td class="style9">&nbsp;</td>
        </tr>
        <tr class="style25">
            <td class="style45">
                    Less Amount of Advance/ Withdrawal
            </td>
            <td class="style46" >
                <asp:Label ID="LabelWithdrawl" runat="server" Font-Bold="False" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style20">&nbsp;</td>
            <td class="style9">&nbsp;</td>
        </tr>
        <tr>
            <td class="style32">
                    <span class="style29">Balance at credit in account on</span>
                    <asp:Label ID="LabelCreditMonth" runat="server" CssClass="style29" Text="31 March"></asp:Label>
               
            </td>
            <td class="style48">
                <asp:Label ID="LabelCredit" runat="server" Text="Label" 
                    CssClass="style29"></asp:Label>
               
            </td>
        </tr>
        <tr>
            <td class="style20">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style22">&nbsp;</td>
            <td >
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style20">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr class="style25">
            <td colspan="2">As Regarding to the 
                correctness of the account, which the subscriber may wish to make should be made 
                in writing within one month  to the CEO-cum-Secretary 
                of the HIMUDA.
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="style20">&nbsp;</td>
            <td class="style21">&nbsp;</td>
        </tr>
        <tr>
            <td class="style22" valign="bottom">&nbsp;</td>
            <td  valign="bottom" class="style27">
                <b>Chief Accounts Officer</b>
            </td>
        </tr>
        <tr>
            <td class="style19" ></td>
            <td>
                <b>HIMUDA SHIMLA</b>
            </td>
        </tr>
        </table>
    </div>

</asp:Content>

