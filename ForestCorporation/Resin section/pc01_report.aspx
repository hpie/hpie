<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="pc01_report.aspx.cs" Inherits="pc01_report" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">

    <%--  <style type="text/css">

    .style2
    {
        height: 39px;
        font-size: small;
        color: #FFFFFF;
    }
    .style1
    {
        height: 771px;
            width: 660px;
            margin-right: 0px;
        font-size: medium;
        color: #000000;
    }
    .style4
    {
        height: 39px;
    }
    .style5
    {
        font-size: small;
    }
    .style6
    {
        height: 39px;
        font-size: small;
    }
        .style7
        {
            color: #333333;
        }
        .style8
        {
            height: 39px;
            font-size: small;
            color: #000000;
        }
        .style9
        {
            height: 43px;
        }
        .style10
        {
            height: 34px;
        }
        .style11
        {
            height: 118px;
        }
    </style>--%>
</asp:Content>
<asp:Content ID="Content2" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">

        <div id="divPrint">
    <asp:DataList ID="DataList1" runat="server" CellPadding="4" 
        DataSourceID="SqlDataSource1" ForeColor="#333333" Width="500px" 
        BorderColor="Black" BorderStyle="Solid" BorderWidth="1px" 
               style="font-size: medium">
        <FooterStyle BackColor="#990000" Font-Bold="True" ForeColor="White" />
        <AlternatingItemStyle BackColor="White" />
        <ItemStyle BackColor="#FFFBD6" ForeColor="#333333" />
        <SelectedItemStyle BackColor="#FFCC66" Font-Bold="True" ForeColor="Navy" />
        <HeaderTemplate>
            HP State Forest Corporation Ltd.
        </HeaderTemplate>
        <HeaderStyle BackColor="#990000" Font-Bold="True" ForeColor="White" />
        <ItemTemplate>
            <table class="style1">
                <tr>
                    <td style="text-align: center">
                        WEIGHMENT SLIP</td>
                    <td style="text-align: center">
                        &nbsp;</td>
                </tr>
                <tr class="style5">
                    <td class="style12">
                        Pre Numbered</td>
                    <td class="style12">
                        <asp:Label ID="PreNoLabel" runat="server" Text='<%# Eval("PreNo") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style13">
                        <span class="style7">Date</span></td>
        <td class="style13">
            <asp:Label ID="DateLabel" runat="server" 
                Text='<%# Eval("Date", " {0:d/MM/yyyy}") %>' />
    </td></date</td></td>
                </tr>
                <tr class="style5">
                    <td class="style13">
                        Type
                    </td>
                    <td class="style13">
                        <asp:Label ID="STypeLabel" runat="server" Text='<%# Eval("SType") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style14">
                        No Of&nbsp;
                        <asp:Label ID="Label1" runat="server">Tins</asp:Label>
                    </td>
                    <td class="style14">
                        <asp:Label ID="NoSTypeLabel" runat="server" Text='<%# Eval("NoSType") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Gross Weight with Truck</td>
                    <td class="style4">
                        <asp:Label ID="GrossWeLabel" runat="server" Text='<%# Eval("GrossWe") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Empty Truck Weight</td>
                    <td class="style4">
                        <asp:Label ID="EmptyTruckWeLabel" runat="server" 
                            Text='<%# Eval("EmptyTruckWe") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Gross Weight With Tin</td>
                    <td class="style4">
                        <asp:Label ID="GrossWetinLabel" runat="server" 
                            Text='<%# Eval("GrossWetin") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        Standard
                        <asp:Label ID="Label2" runat="server" Text="Label"></asp:Label>
                        &nbsp; Weight</td>
                    <td class="style8">
                        <asp:Label ID="StTinWeLabel" runat="server" Text='<%# Eval("StTinWe") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Net Resin Received With Sakki</td>
                    <td class="style4">
                        <asp:Label ID="NetRWSLabel" runat="server" Text='<%# Eval("NetRWS") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Challan No.</td>
                    <td class="style4">
                        <asp:Label ID="ChallanNoLabel" runat="server" Text='<%# Eval("ChallanNo") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Dated</td>
                    <td class="style4">
                        <asp:Label ID="DatedLabel" runat="server" 
                            Text='<%# Eval("Dated", " {0:d/MM/yyyy}") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Vehicle No.</td>
                    <td class="style4">
                        <asp:Label ID="VehicleNoLabel" runat="server" Text='<%# Eval("VehicleNo") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Time</td>
                    <td class="style4">
                        <asp:Label ID="TimeLabel" runat="server" 
                            Text='<%# tt(Convert.ToDateTime( Eval("Time"))) %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style4">
                        Water Contents</td>
                    <td class="style4">
                        <asp:Label ID="Label6" runat="server" Text='<%# Eval("Water") %>'></asp:Label>
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style15">
                        Resin unit</td>
                    <td class="style15">
                        <asp:Label ID="ResFWDLabel" runat="server" Text='<%# Eval("ResUnit") %>' />
                    </td>
                </tr>
                <tr class="style5">
                    <td class="style3">
                        Resin FWD</td>
                    <td class="style3">
                        <asp:Label ID="Label3" runat="server" Text='<%# Eval("ResFWD") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style8" valign="bottom">
                        Pvt. Resin Owner</td>
                    <td class="style8" valign="bottom">
                        <asp:Label ID="Label5" runat="server" Text='<%# Eval("pvt_name") %>'></asp:Label>
                        </td>
                </tr>
                <tr>
                    <td class="style17" valign="bottom">
                    </td>
                    <td class="style17" valign="bottom">
                    </td>
                </tr>
                <tr>
                    <td class="style18" valign="bottom">
                    </td>
                    <td class="style18" valign="bottom">
                    </td>
                </tr>
                <tr>
                    <td class="style18" valign="bottom">
                        &nbsp;</td>
                    <td class="style18" valign="bottom">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style18" valign="bottom">
                        &nbsp;</td>
                    <td class="style18" valign="bottom">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style19" valign="bottom">
                        Truck Driver</td>
                    <td class="style19" valign="bottom">
                        Weighbridge Clerk</td>
                </tr>
                <tr>
                    <td align="left"  colspan="2" valign="top">
                        ________________________________________________________________________________<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1st&nbsp;&nbsp; Copy of the Driver<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        2nd&nbsp; Copy of thr resin section<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3rd&nbsp;&nbsp; Copy of the account section<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        4th&nbsp; Copy of the retained as office copy
                    </td>
                </tr>
            </table>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                InsertCommand="fc01_ins" InsertCommandType="StoredProcedure" 
                SelectCommand="SELECT * FROM [fc01]">
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="Date" PropertyName="Text" 
                        Type="DateTime" />
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
                    <asp:ControlParameter ControlID="dt" Name="Dated" PropertyName="Text" 
                        Type="DateTime" />
                    <asp:ControlParameter ControlID="vehicle_n" Name="VehicleNo" 
                        PropertyName="Text" Type="String" />
                    <asp:ControlParameter ControlID="time" Name="Time" PropertyName="Text" 
                        Type="DateTime" />
                    <asp:ControlParameter ControlID="resin_u" Name="ResFWD" PropertyName="Text" 
                        Type="String" />
                </InsertParameters>
            </asp:SqlDataSource>
            <br />
        </ItemTemplate>
    </asp:DataList>
    </div>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc01] where PreNo=@pre">
        <SelectParameters>
            <asp:QueryStringParameter DefaultValue="" Name="pre" QueryStringField="code" />
        </SelectParameters>
    </asp:SqlDataSource>
  
    

</asp:Content>


