<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="store.aspx.cs" Inherits="store_store" Title="Untitled Page" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style2
        {
            width: 500px;
            border: 1px solid #000000;
        }
        .style3
        {
            width: 207px;
        }
        .style5
        {
            text-align: center;
        }
        .style6
        {
            font-weight: bold;
            text-align: center;
            color: #FFFFFF;
            background-color: #336699;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table class="style2">
        <tr>
            <td class="style6" colspan="2">
                Store Detail<asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                            </td>
                        </tr>
                        <tr>
                            <td class="style3">
                                Date</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <ajaxToolkit:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
            </ajaxToolkit:MaskedEditExtender>
          <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
            </ajaxToolkit:CalendarExtender>
            
         <%-- <ajaxToolkit:MaskedEditValidator ID="MaskedEditValidator7" runat="server"
            ControlExtender="dt_MaskedEditExtender"
            ControlToValidate="TextBox1"
            EmptyValueMessage="Date is required"
            InvalidValueMessage="Date is invalid"
            Display="Dynamic"
            TooltipMessage="Input a date"
            EmptyValueBlurredText="*"
            InvalidValueBlurredMessage="*"
            ValidationGroup="MKE" ErrorMessage="Dated" />--%>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="Not Empty" 
                    style="font-size: x-small"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Party Name</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server" Height="69px" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Items</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="name" DataValueField="name">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [tbitems]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Bill No.</td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Bill Date</td>
            <td>
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                  <ajaxToolkit:MaskedEditExtender ID="MaskedEditExtender1" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox4">
            </ajaxToolkit:MaskedEditExtender>
            <ajaxToolkit:CalendarExtender ID="CalendarExtender1" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox4">
            </ajaxToolkit:CalendarExtender>
            
            <%--<ajaxToolkit:MaskedEditValidator ID="MaskedEditValidator1" runat="server"
            ControlExtender="dt_MaskedEditExtender"
            ControlToValidate="TextBox4"
            EmptyValueMessage="Date is required"
            InvalidValueMessage="Date is invalid"
            Display="Dynamic"
            TooltipMessage="Input a date"
            EmptyValueBlurredText="*"
            InvalidValueBlurredMessage="*"
            ValidationGroup="MKE" ErrorMessage="Dated" />--%><asp:RequiredFieldValidator 
                    ID="RequiredFieldValidator2" runat="server" ControlToValidate="TextBox4" 
                    ErrorMessage="Not Empty" style="font-size: x-small"></asp:RequiredFieldValidator>
&nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                Receipt Voucher No.</td>
            <td>
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Quantity</td>
            <td>
                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Rate</td>
            <td>
                <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="TextBox9" runat="server" Visible="False"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="TextBox10" runat="server" Visible="False"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="TextBox11" runat="server" Visible="False"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" Text="Save" Width="54px" 
                    onclick="Button1_Click" ValidationGroup="MKE" />
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO store(Date,PartyName, BillNo, BillDate, Reptno, Qty, Rate, ReqSlipno, IssueQty, IssueRate,Items) VALUES (@Date,@PartyName, @BillNo, @BillDate, @Reptno, @Qty, @Rate, @ReqSlipno, @IssueQty, @IssueRate,@Items)" 
                    SelectCommand="SELECT * FROM [store]">
                    <InsertParameters>
                        <asp:Parameter Name="Date" />
                        <asp:ControlParameter ControlID="TextBox2" Name="PartyName" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="BillNo" PropertyName="Text" />
                        <asp:Parameter Name="BillDate" />
                        <asp:ControlParameter ControlID="TextBox5" Name="Reptno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="Qty" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="Rate" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="ReqSlipno" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="IssueQty" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox11" Name="IssueRate" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList1" Name="Items" 
                            PropertyName="SelectedValue" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

