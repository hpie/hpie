<%@ Page Title="" Language="C#" MasterPageFile="~/Sales Branch/MasterPage.master" AutoEventWireup="true" CodeFile="fc28_entry.aspx.cs" Inherits="Sales_Branch_fc27_entry" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 500px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 148px;
        }
        .style4
        {
            text-align: center;
        }
        .style5
        {
            text-align: center;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style4" colspan="2">
                Goods Outward Register<asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Date</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="MaskedEditExtender1" runat="server" 
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
            <td class="style2">
                Time</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                     <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="TextBox2">
            </cc1:MaskedEditExtender>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Name Of Party</td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Gate pass no.</td>
            <td>
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Date</td>
            <td>
                <asp:TextBox ID="TextBox14" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="MaskedEditExtender3" runat="server" 
                            CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                            CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                            CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                            Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox14">
                        </cc1:MaskedEditExtender>
                        <cc1:CalendarExtender ID="CalendarExtender2" runat="server" 
                            Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox14">
                        </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Challan</td>
            <td>
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Invoice No.</td>
            <td>
                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Cash memo</td>
            <td>
                <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Date</td>
            <td>
                <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
                                <cc1:MaskedEditExtender ID="MaskedEditExtender2" runat="server" 
                            CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                            CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                            CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                            Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox8">
                        </cc1:MaskedEditExtender>
                        <cc1:CalendarExtender ID="CalendarExtender1" runat="server" 
                            Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox8">
                        </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Vehicle no.</td>
            <td>
                <asp:TextBox ID="TextBox10" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Name of driver</td>
            <td>
                <asp:TextBox ID="TextBox11" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Description of goods</td>
            <td>
                <asp:TextBox ID="TextBox9" runat="server" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                Quanitity</td>
        </tr>
        <tr>
            <td class="style2">
                No</td>
            <td>
                <asp:TextBox ID="TextBox12" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Weight</td>
            <td>
                <asp:TextBox ID="TextBox13" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" Text="Save" onclick="Button1_Click" />
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO fc28(dt, time, name, Gate, dt1, Challan, inv, cash, dt2, Veh, name_dr, des, no, we) VALUES (@dt, @time, @name, @Gate, @dt1, @Challan, @inv, @cash, @dt2, @Veh, @name_dr, @des, @no, @we)" 
                    SelectCommand="SELECT * FROM [fc27]">
                    <InsertParameters>
                        <asp:Parameter Name="dt" />
                        <asp:ControlParameter ControlID="TextBox2" Name="time" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="name" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Gate" PropertyName="Text" />
                        <asp:Parameter Name="dt1" />
                        <asp:ControlParameter ControlID="TextBox5" Name="Challan" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="inv" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="cash" PropertyName="Text" />
                        <asp:Parameter Name="dt2" />
                        <asp:ControlParameter ControlID="TextBox10" Name="Veh" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox11" Name="name_dr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="des" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox12" Name="no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox13" Name="we" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

