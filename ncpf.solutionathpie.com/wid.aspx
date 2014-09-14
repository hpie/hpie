<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="wid.aspx.cs" Inherits="wid" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 500px;
        }
        .style5
        {
            width: 31px;
        }
        .style6
        {
            width: 65px;
        }
        .style7
        {
            width: 235px;
        }
        .style8
        {
            width: 235px;
            height: 21px;
        }
        .style9
        {
            height: 21px;
        }
        .style11
        {
            text-align: center;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style11" colspan="2">
                WITHDRAWLS DETAIL<asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style7">
                                        Select Account No</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Date</td>
            <td class="style9">
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style7">
                Amount</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" 
                    Width="67px" />
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    InsertCommand="INSERT INTO width(AC, date, amt) VALUES (@AC, @date, @amt)" 
                    SelectCommand="SELECT * FROM [width]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="AC" 
                            PropertyName="SelectedValue" />
                        <asp:Parameter Name="date" />
                        <asp:ControlParameter ControlID="TextBox2" Name="amt" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
</asp:Content>

