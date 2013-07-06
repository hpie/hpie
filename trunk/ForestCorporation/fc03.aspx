<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="fc03.aspx.cs" Inherits="fc03" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 100%;
            border: 1px solid #000000;
        font-size: 11pt;
    }
        .style2
        {
        text-align: center;
        height: 45px;
        font-size: xx-large;
        color: #FFFFFF;
    }
        .style3
        {
            text-align: center;
        }
        .style4
        {
            text-align: left;
            width: 363px;
        }
        .style5
        {
            text-align: center;
            width: 53px;
        }
        .style6
        {
            text-align: center;
            width: 53px;
            height: 19px;
        }
        .style7
        {
            text-align: left;
            width: 363px;
            height: 19px;
        }
        .style8
        {
            text-align: center;
            height: 19px;
        }
        .style9
        {
            text-align: center;
            height: 77px;
        }
    .style10
    {
        text-align: center;
        width: 53px;
        height: 13px;
    }
    .style11
    {
        text-align: left;
        width: 363px;
        height: 13px;
    }
    .style12
    {
        text-align: center;
        height: 13px;
    }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style9" colspan="2" align="center">
                SAKKI ANALYSIS REPORT</td>
        </tr>
        <tr>
            <td class="style2">
                No.<asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style2">
                Date_______________</td>
        </tr>
        </table>
        <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style10">
                S. No</td>
            <td class="style11">
                Particulars</td>
            <td class="style12">
                Unit/Div__________________</td>
        </tr>
        <tr>
            <td class="style5">
                .</td>
            <td class="style4">
                1</td>
            <td class="style3">
                2</td>
        </tr>
        <tr>
            <td class="style5">
                1</td>
            <td class="style4">
                Name of the resin unit:</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                2</td>
            <td class="style4">
                Name of LSM/Contractor</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6">
                3</td>
            <td class="style7">
                Challan No.</td>
            <td class="style8">
                </td>
        </tr>
        <tr>
            <td class="style5">
                4</td>
            <td class="style4">
                Lot no.</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                5</td>
            <td class="style4">
                No. of Drums</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                6</td>
            <td class="style4">
                No. of tins</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                7</td>
            <td class="style4">
                Gross wt. with tins/drums:</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                8</td>
            <td class="style4">
                wt. of tins/drums</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                9</td>
            <td class="style4">
                net wt. of resin with Sakki</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                10</td>
            <td class="style4">
                Sakki wt. :</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                11</td>
            <td class="style4">
                Percentage of Sakki</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
    </table>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                InsertCommandType="StoredProcedure" SelectCommand="SELECT * FROM [fc03] order by ASr" 
                InsertCommand="fc01_ins">
                <InsertParameters>
                    <asp:Parameter Name="Date" Type="DateTime" />
                    <asp:ControlParameter ControlID="Label1" Name="SType" PropertyName="Text" 
                        Type="String" />
                    <asp:ControlParameter ControlID="tins" Name="NoSType" PropertyName="Text" 
                        Type="Int32" />
                    <asp:ControlParameter ControlID="gross_w_w_t" Name="GrossWe" 
                        PropertyName="Text" Type="Decimal" />
                    <asp:ControlParameter ControlID="empty_t_weight" Name="EmptyTruckWe" 
                        PropertyName="Text" Type="Decimal" />
                    <asp:ControlParameter ControlID="gross_w_w_tin" Name="GrossWetin" 
                        PropertyName="Text" Type="Decimal" />
                    <asp:ControlParameter ControlID="standard_l_weight" Name="StTinWe" 
                        PropertyName="Text" Type="Decimal" />
                    <asp:ControlParameter ControlID="net_resin" Name="NetRWS" PropertyName="Text" 
                        Type="Decimal" />
                    <asp:ControlParameter ControlID="challan_no" Name="ChallanNo" 
                        PropertyName="Text" Type="String" />
                    <asp:Parameter Name="Dated" Type="DateTime" />
                    <asp:ControlParameter ControlID="vehicle_n" Name="VehicleNo" 
                        PropertyName="Text" Type="String" />
                    <asp:ControlParameter ControlID="time" Name="Time" PropertyName="Text" 
                        Type="DateTime" />
                    <asp:ControlParameter ControlID="resin_u" Name="ResFWD" PropertyName="Text" 
                        Type="String" />
                </InsertParameters>
            </asp:SqlDataSource>
            </asp:Content>

