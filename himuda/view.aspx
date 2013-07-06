<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="view.aspx.cs" Inherits="view" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">

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
        .style28
        {
            color: #B4B4B4;
        }
        .style29
        {
            font-size: small;
            font-family: Verdana;
        }
        </style>
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
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
 <div id="div1" runat="server"   >

    <table cellpadding="0" cellspacing="0">
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td>
                Select Ac Number </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                Start Date</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox1">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td>
                End Date</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox2">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td>
                Session</td>
            <td>
                <asp:DropDownList ID="DropDownList2" runat="server">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" Text="Search" onclick="Button1_Click" />
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Export</asp:LinkButton>
                                <asp:Button ID="btnPrint" runat="server" Text="Print" 
                    OnClientClick="return printDiv('div_print');" onclick="btnPrint_Click" />    </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        
        
    </table>
              
                         <div id="div_print">
                <table cellpadding="0" cellspacing="0" BORDER="1"
        style="border-width: 1px; border-color: #000000; font-size: large;" id="table" 
                    runat="server" visible="false">
        <tr>
            <td class="style18" colspan="2" style="text-align: center">
              
                    <b>SUBSCRIBER’S ANNUAL ACCOUNT Year</b>               
              
              <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>

            </td>
        </tr>
        <tr class="style25">
            <td class="style25">
                    Name of the Subscriber –
                    <asp:Label ID="Label2" runat="server" Text="Label"></asp:Label>
                    
                    <br />
                    
                    Account No:-
                    <asp:Label ID="Label3" runat="server" Text="Label"></asp:Label>
                    <br />
Rate of Interest =8%
            
            </td>
            <td class="style24">
                &nbsp;</td>
        </tr>
        <tr class="style23">
            <td class="slideDescription">
                Detail</td><td class="style25">
                <b>Subscribers 
                <br />
                contributions</b></td>
        </tr>
        <tr class="style25">
            <td> 
                
                Balance at Credit in account on
                <asp:Label ID="Label19" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
               
                <asp:Label ID="Label4" runat="server" Font-Bold="False" Text="Label"></asp:Label>
                
            </td>
        </tr>
        <tr>
            <td ></td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr class="style25">
            <td>
                
                    Subscription/Refund of Advance receivede during the year
            </td>
            <td>
                <asp:Label ID="Label6" runat="server" Font-Bold="False" Text="Label"></asp:Label>
                
            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr class="style25">
            <td >
                    Interest accrued during the year
            </td>
            <td >
                <asp:Label ID="Label8" runat="server" Font-Bold="False" Text="Label"></asp:Label>
                
            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style29">
                <strong>Total</strong></td>
            <td class="style29">
                <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>

            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr class="style25">
            <td>
                
                    Less Amount of Advance/ Withdrawal
            </td>
            <td >
                <asp:Label ID="Label12" runat="server" Font-Bold="False" Text="Label"></asp:Label>
                
            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                    <span class="style29">Balance at credit in account on</span>
                    <asp:Label ID="Label21" runat="server" CssClass="style29" Text="Label"></asp:Label>
               
            </td>
            <td>
                <asp:Label ID="Label16" runat="server" Text="Label" 
                    CssClass="style29"></asp:Label>
               
            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr>
            <td><span class="style28">Grand Total (A+B)</span>
            </td>
            <td >
                <asp:Label ID="Label18" runat="server" Text="0" style="color: #B4B4B4"></asp:Label>

            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
        <tr class="style25">
            <td colspan="2" 
                
                
>regard to the 
                correctness of the account, which the subscriber may wish to make should be made 
                in writing within one month from the date noted below to the CEO-cum-Secretary 
                of the Board.</td>
                    </tr>
        <tr>
            <td colspan="2" 
                
                
                style="mso-fareast-font-family: &quot;Times New Roman&quot;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">
                &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style20" 
                            style="mso-fareast-font-family: &quot;Times New Roman&quot;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA" 
                            valign="top">
                            Dated :</td>
                        <td class="style21">
                        </td>
                    </tr>
                    <tr>
                        <td class="style22" valign="bottom">
                            <b style="mso-bidi-font-weight:normal"><span class="style26" 
                                
                                style="mso-fareast-font-family: &quot;Times New Roman&quot;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">
                            Section Officer (A/c’s)</span></b></td>
            <td  valign="bottom" class="style27">
                <b style="mso-bidi-font-weight:normal"><span class="style8" 
                    style="mso-fareast-font-family: &quot;Times New Roman&quot;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">
                Chief
                Accounts Officer<span style="mso-spacerun:yes">&nbsp; </span></span></b>
            </td>
        </tr>
        <tr>
            <td class="style19" >
                <b style="mso-bidi-font-weight:normal"><span class="style26" 
                    
                    style="mso-fareast-font-family: &quot;Times New Roman&quot;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">
                HIMUDA SHIMLA </span></b>
            </td>
            <td >
                <b style="mso-bidi-font-weight:normal"><span class="style8" 
                    style="mso-fareast-font-family: &quot;Times New Roman&quot;; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">
                HIMUDA SHIMLA</span></b></td>
        </tr>
        </table>
    </div>
    
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" onrowdatabound="GridView1_RowDataBound1" ShowFooter="True" 
        style="font-family: Verdana; font-size: small" Visible="False">
        <RowStyle ForeColor="#000066" />
        <Columns>
            <asp:TemplateField HeaderText="Month">
                <ItemTemplate>
                    <asp:Label ID="Label20" runat="server" Text="<%# Container.DataItem %>"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="SUBSCRIPTION"></asp:TemplateField>
            <asp:TemplateField HeaderText="ARREAR"></asp:TemplateField>
            <asp:TemplateField HeaderText="RECOVERY"></asp:TemplateField>
            <asp:TemplateField HeaderText="SUB+REC"></asp:TemplateField>
            <asp:TemplateField HeaderText="ADV./WITHD."></asp:TemplateField>
            <asp:TemplateField HeaderText="TOT-(SUB-REC-ADV.-WITHD)"></asp:TemplateField>
            <asp:TemplateField HeaderText="MONTHLY BAL">
                <FooterTemplate>
                    <asp:Label ID="Label7" runat="server" Font-Bold="True" Text="Label"></asp:Label>
                </FooterTemplate>
            </asp:TemplateField>
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
    
    </div></div>
    </div>
</asp:Content>

