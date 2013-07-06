<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="rawana_challan.aspx.cs" Inherits="rawana_challan" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">

        .style1
        {
            width: 100%;
        }
        .style3
        {
            height: 45px;
            width: 591px;
        }
        .style2
        {
            height: 45px;
        }
        .style5
        {
            height: 104px;
        }
        .style6
        {
            width: 591px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>Rawana Challan</h2>
    <br />
    <table class="style1" __designer:mapid="5a1">
        <tr __designer:mapid="5a2">
            <td __designer:mapid="5a3" class="style3">
                &nbsp;</td>
            <td __designer:mapid="5a5" class="style2">
                &nbsp;</td>
            <td __designer:mapid="5a7" class="style2">
                Challan
                No.
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="challan_no" 
                    DataValueField="challan_no">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [tally_sheet]"></asp:SqlDataSource>
                <br />   
            </td>
        </tr>
        <tr __designer:mapid="5a2">
            <td __designer:mapid="5a3" class="style3">
                Book No. 
                <asp:TextBox runat="server" ID="book_no"></asp:TextBox>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
            <td __designer:mapid="5a5" class="style2">
                &nbsp;
            </td>
            <td __designer:mapid="5a7" class="style2">
                Date&nbsp;
                <asp:TextBox runat="server" ID="date"></asp:TextBox>
                <asp:CalendarExtender ID="date_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="date">
                </asp:CalendarExtender>
            </td>
        </tr>
        <tr __designer:mapid="5aa">
            <td __designer:mapid="5ab" class="style6">
                Time
                <asp:TextBox ID="time" runat="server"></asp:TextBox>
                <asp:MaskedEditExtender ID="time_MaskedEditExtender" runat="server" 
                    AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99:99" MaskType="Time" TargetControlID="time">
                </asp:MaskedEditExtender>
&nbsp;&nbsp;&nbsp;&nbsp; Release Order No.&nbsp;
                <asp:TextBox runat="server" ID="rel_no" AutoPostBack="True" 
                    ontextchanged="rel_no_TextChanged"></asp:TextBox>
                <asp:FilteredTextBoxExtender ID="rel_no_FilteredTextBoxExtender" runat="server" 
                    Enabled="True" FilterType="Numbers" TargetControlID="rel_no">
                </asp:FilteredTextBoxExtender>
            </td>
            <td __designer:mapid="5ad" colspan="2">
                in Word&nbsp;&nbsp; 
                <asp:Label ID="wrd" runat="server"></asp:Label>
            </td>
        </tr>
        <tr __designer:mapid="5aa">
            <td __designer:mapid="5ab" class="style6">
                <em style="font-style: italic; color: rgb(102, 102, 102); font-family: Tahoma, Arial, sans-serif; font-size: 12px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; ">
                <span style="font-size: 8pt; ">Tip: Type &#39;A&#39; or &#39;P&#39; to switch AM/PM</span></em><span 
                    style="color: rgb(102, 102, 102); font-family: Tahoma, Arial, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none; "><span 
                    class="Apple-converted-space">&nbsp;</span></span></td>
            <td __designer:mapid="5ad" colspan="2">
                &nbsp;</td>
        </tr>
        <tr __designer:mapid="5ae">
            <td __designer:mapid="5af" class="style5" colspan="2">
                Name and Address of the purchaser&nbsp;
                <asp:TextBox runat="server" TextMode="MultiLine" Height="65px" Width="308px" 
                    ID="name_add"></asp:TextBox>
            </td>
            <td __designer:mapid="5b1" class="style5">
            </td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style6">
                Vehicle 
                (Kind &amp; No.)&nbsp;
                <asp:TextBox runat="server" ID="veh_no" Width="300px"></asp:TextBox>
            &nbsp;</td>
            <td __designer:mapid="5b5" colspan="2">
                Name of Driver
                <asp:TextBox runat="server" ID="name_driver" Width="300px"></asp:TextBox>
            </td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style4" colspan="3">
                Place to witch consigned
                <asp:TextBox ID="place_consig" runat="server" Width="300px"></asp:TextBox>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Route alone check 
                and post prescribed for transport
                <asp:TextBox ID="for_trans" runat="server"></asp:TextBox>
&nbsp;
            </td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style6">
                Release Hammer mark&nbsp;
                <asp:TextBox ID="rel_hamm_mark" runat="server" Width="300px"></asp:TextBox>
            </td>
            <td __designer:mapid="5b5">
                &nbsp;</td>
            <td __designer:mapid="5b7">
                &nbsp;</td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style6">
                &nbsp;</td>
            <td __designer:mapid="5b5">
                &nbsp;</td>
            <td __designer:mapid="5b7">
                &nbsp;</td>
        </tr>
    </table>
<table class="style1" border="1px" bordercolor="black" cellspacing="2" cellpadding="2" style="border:1px;" >
    <tr>
        <td>
            Name of Division&nbsp;
        </td>
        <td>
            Date of Auction</td>
        <td>
            Lot No</td>
        <td>
            Stack No.</td>
        <td>
            Species (Name kind with Distintve Property and/or Kundan Mark</td>
        <td>
            Size</td>
        <td>
            No.</td>
        <td>
            Vol.</td>
        <td>
            Amount</td>
    </tr>
    <tr>
        <td style="margin-left: 160px">
            <asp:DropDownList ID="name_div" runat="server" DataSourceID="SqlDataSource6" 
                DataTextField="division" DataValueField="division">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                SelectCommand="SELECT [division] FROM [tally_sheet] group by division">
            </asp:SqlDataSource>
        </td>
        <td>
            <asp:TextBox ID="date_auc" runat="server" Width="80px"></asp:TextBox>
            <asp:CalendarExtender ID="date_auc_CalendarExtender" runat="server" 
                Enabled="True" TargetControlID="date_auc">
            </asp:CalendarExtender>
        </td>
        <td>
            <asp:DropDownList ID="lot_no" runat="server" DataSourceID="SqlDataSource3" 
                DataTextField="lot_no" DataValueField="lot_no">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                SelectCommand="SELECT [lot_no] FROM [tally_sheet] group by lot_no">
            </asp:SqlDataSource>
        </td>
        <td>
            <asp:DropDownList ID="stack_no" runat="server" DataSourceID="SqlDataSource4" 
                DataTextField="stack" DataValueField="stack">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                SelectCommand="SELECT [stack] FROM [tally_sheet] group by stack">
            </asp:SqlDataSource>
        </td>
        <td>
            <asp:TextBox ID="species" runat="server" Height="62px" TextMode="MultiLine" 
                Width="212px"></asp:TextBox>
        </td>
        <td>
            <asp:DropDownList ID="size" runat="server" DataSourceID="SqlDataSource5" 
                DataTextField="size_type" DataValueField="size_type">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                SelectCommand="SELECT [size_type] FROM [tally_sheet] group by size_type">
            </asp:SqlDataSource>
        </td>
        <td>
            <asp:TextBox ID="no" runat="server" Width="50px"></asp:TextBox>
        </td>
        <td style="margin-left: 40px">
            <asp:TextBox ID="vol" runat="server" Width="50px"></asp:TextBox>
        </td>
        <td>
            <asp:TextBox ID="amt" runat="server" Width="60px"></asp:TextBox>
        </td>
    </tr>
    </table>
 <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
&nbsp;&nbsp;&nbsp;
            <asp:Label ID="Label1" runat="server"></asp:Label>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                InsertCommand="INSERT INTO rawana_challan(no, book_no, time, rel_order, name_add, veh_kind_no, name_driver, place_to_consig, for_trans, hammer_mark, name_div, date_auc, lot_no, stack_no, species, size, no_2, vol, amt, date) VALUES (@no, @book_no, @time, @rel_order, @name_add, @veh_kind_no, @name_driver, @place_to_consig, @for_trans, @hammer_mark, @name_div, @date_auc, @lot_no, @stack_no, @species, @size, @no_2, @vol, @amt, @date)" 
                SelectCommand="SELECT * FROM [division]">
                <InsertParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="no" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="book_no" Name="book_no" PropertyName="Text" />
                    <asp:ControlParameter ControlID="time" Name="time" PropertyName="Text" />
                    <asp:ControlParameter ControlID="rel_no" Name="rel_order" PropertyName="Text" />
                    <asp:ControlParameter ControlID="name_add" Name="name_add" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="veh_no" Name="veh_kind_no" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="name_driver" Name="name_driver" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="place_consig" Name="place_to_consig" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="for_trans" Name="for_trans" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="rel_hamm_mark" Name="hammer_mark" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="name_div" Name="name_div" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="date_auc" Name="date_auc" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="lot_no" Name="lot_no" PropertyName="Text" />
                    <asp:ControlParameter ControlID="stack_no" Name="stack_no" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="species" Name="species" PropertyName="Text" />
                    <asp:ControlParameter ControlID="size" Name="size" PropertyName="Text" />
                    <asp:ControlParameter ControlID="no" Name="no_2" PropertyName="Text" />
                    <asp:ControlParameter ControlID="vol" Name="vol" PropertyName="Text" />
                    <asp:ControlParameter ControlID="amt" Name="amt" PropertyName="Text" />
                    <asp:ControlParameter ControlID="date" Name="date" PropertyName="Text" />
                </InsertParameters>
            </asp:SqlDataSource>
<br />
</asp:Content>

