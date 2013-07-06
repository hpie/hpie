<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="fc201.aspx.cs" Inherits="fc20" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 637px;
            border: 1px solid #000000;
        }
        .style5
        {
            width: 220px;
        }
        .style6
        {
            color: #FFFFFF;
            background-color: #0066CC;
            height: 19px;
            font-weight: bold;
            text-align: center;
        }
        .style7
        {
            width: 207px;
        }
        .style8
        {
            width: 207px;
            height: 31px;
        }
        .style9
        {
            width: 220px;
            height: 31px;
        }
        .style10
        {
            width: 207px;
            height: 40px;
        }
        .style11
        {
            width: 220px;
            height: 40px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style6" colspan="2">
                FACTORY CHALLAN</td>
        </tr>
        <tr>
            <td class="style10">
                Factory order no</td>
            <td class="style11">
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style10">
                Date</td>
            <td class="style11">
                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox6_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox6">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox6_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox6">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style10">
                Description of goods</td>
            <td class="style11">
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style7">
                No.</td>
            <td class="style5">
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Qtl./Litre</td>
            <td class="style9">
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style7">
                Kg</td>
            <td class="style5">
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style5">
                <asp:Button ID="Button1" runat="server" Height="26px" onclick="Button1_Click" 
                    Text="Save" Width="79px" />
                <cc1:ConfirmButtonExtender ID="Button1_ConfirmButtonExtender" runat="server" 
                    ConfirmText="You want to save record" Enabled="True" TargetControlID="Button1">
                </cc1:ConfirmButtonExtender>
            </td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style5">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO fc20(Description, No, Qtl_lit, Kg, F_o_no, dt) VALUES (@Description, @No, @Qtl_lit, @Kg, @F_o_no, @dt)" 
                    SelectCommand="SELECT * FROM [fc20]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="Description" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="No" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Qtl_lit" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Kg" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" Name="F_o_no" PropertyName="Text" />
                        <asp:Parameter Name="dt" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
</asp:Content>

