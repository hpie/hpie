<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="detail1.aspx.cs" Inherits="detail" Title="Himuda CPF Board Share" %>
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
        
        #ContentPlaceHolder1_headerTable
        {
            width: 860px;
            background-color: #7779AF;
            /*text-align: right;*/
        }
        #ContentPlaceHolder1_headerTable td
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
        #ContentPlaceHolder1_footetTable
        {
            width: 480px;
             background-color: #CCCCCC;
            /*text-align: right;*/
        }
        #ContentPlaceHolder1_footetTable td
        {
            font-family: Verdana; 
            font-size: medium;
            border: 1px solid #000000;
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
        <br />
     </p>

   <div id="div_print"">

    <div id="divPrint" runat="server">
   
   <center>
        <div id="boardShareHeader">
        <table cellpadding="0" class="style3"  runat="server" visible="true"  id="headerTable">
            <tr>
                <td class="style4">
                    &nbsp;
                </td>
                <td> Year </td>
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
                <td> Name </td>
                <td class="style5">
                    <asp:Label ID="LabelName" runat="server"></asp:Label>
                    <!-- 
                    <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label11" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label12" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label13" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label15" runat="server" Text="Label"></asp:Label>
                    <asp:Label ID="Label16" runat="server" Text="Label"></asp:Label>
                    -->
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td class="style4">
                    &nbsp;
                </td>
                <td> Designation </td>
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
                <td> Account Number </td>
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
                <td> OPENING BALANCE </td>
                <td class="style5">
                    <asp:Label ID="LabelShareOpeningBalance" runat="server" Text="0"></asp:Label>
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
        </div>

      <br />
    <div>
    
    <%--
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" onrowdatabound="GridView1_RowDataBound1" 
        style="font-family: Verdana; font-size: small" 
              onrowcreated="GridView1_RowCreated" BackColor="White" 
              BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
              Width="462px">
        <Columns>
        
            <asp:TemplateField HeaderText="Month">
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server" Text="<%# Container.DataItem %>"></asp:Label>
                </ItemTemplate>
               

            </asp:TemplateField>
            
            <asp:TemplateField HeaderText="SHARE"></asp:TemplateField>
            <asp:TemplateField HeaderText="ARREAR" Visible="False"></asp:TemplateField>
            <asp:TemplateField HeaderText="RECOVERY" Visible="False"></asp:TemplateField>
            <asp:TemplateField HeaderText="SUB+REC" Visible="False"></asp:TemplateField>
            <asp:TemplateField HeaderText="ADV./WITHD." Visible="False"></asp:TemplateField>
            <asp:TemplateField HeaderText="TOT"></asp:TemplateField>
            <asp:TemplateField HeaderText="MONTHLY BAL">
                <FooterTemplate>
                    <asp:Label ID="Label7" runat="server" Font-Bold="True" Text="Label"></asp:Label>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Finel Payment" Visible="False"></asp:TemplateField>
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="Black" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <RowStyle ForeColor="#000066" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <SortedAscendingCellStyle BackColor="#F1F1F1" />
        <SortedAscendingHeaderStyle BackColor="#007DBB" />
        <SortedDescendingCellStyle BackColor="#CAC9C9" />
        <SortedDescendingHeaderStyle BackColor="#00547E" />
    </asp:GridView>
     --%>
    <div id="boardShareGrid">
     <asp:GridView ID="boardShareGridView" runat="server" AutoGenerateColumns="false" HeaderStyle-BackColor="#7779AF" HeaderStyle-ForeColor="Black" OnRowDataBound="boardShareGridView_RowDataBound"
     style="font-family: Verdana; font-size: small" BackColor="White"  BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" Width="860px">
        <Columns>
            <asp:BoundField DataField="t_account" HeaderText="Account No" Visible="false" />
            <asp:BoundField DataField ="t_monthCalculation" HeaderText="Month" />
            <asp:BoundField DataField="t_monthlyShare" HeaderText="Share" ItemStyle-HorizontalAlign="Right" />
            <asp:BoundField DataField="t_monthlyShareArrear" HeaderText="Board Share" ItemStyle-HorizontalAlign="Right"/>
            <asp:BoundField DataField="t_totalMonthly" HeaderText="Total" ItemStyle-HorizontalAlign="Right"/>
            <asp:BoundField DataField="t_sumYearlyShareBalance" HeaderText="Monthly Balance" ItemStyle-HorizontalAlign="Right"/>
            
        </Columns>
        </asp:GridView>
    </div>

    </div>
    <!-- 
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td class="style8">
                &nbsp;</td>
            <td class="style9">
                &nbsp;<td class="style7">
                <asp:Label ID="Label6" runat="server" style="font-weight: 700" Text="Label" Visible="true"></asp:Label>
            </td>
        </tr>
     </table>
     -->
    <br />
    <div id="boardShareFooter">
    <table cellpadding="0" cellspacing="0" class="style10" runat="server" visible="true" id="footetTable">
        <tr>
            <td class="style11">
                BALANCE FROM PREVIOUS YEAR</td>
            <td align="right">
                <asp:Label ID="LabelFShareOpeningBalance" runat="server" Text="0"></asp:Label>    
            </td>
        </tr>
        <tr>
            <td class="style11">DEPOSITS AND REFUNDS</td>
            <td align="right">
                <asp:Label ID="LabelFShareFinalPayment" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style11">INTEREST FOR <asp:Label ID="LabelFSession" runat="server" Text="Label"></asp:Label></td>
            <td align="right">
                <asp:Label ID="LabelFShareInterest" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style11">LESS ADVANCES/WITHDRAWLS(-)</td>
            <td align="right">
                 <asp:Label ID="LabelFAdvance" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style11">BALANCE AS ON</td>
            <td align="right">
                <asp:Label ID="LabelFShareCurrentBalance" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style11">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </div>
    </center>

  </div>
 <br />   
 </div>

</asp:Content>

