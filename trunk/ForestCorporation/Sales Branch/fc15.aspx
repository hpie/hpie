<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc15.aspx.cs" Inherits="fc15" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style2
        {
            width: 100%;
        }
        .style3
        {
            width: 521px;
        }
        .style4
        {
            width: 23px;
        }
        .style5
        {
            width: 402px;
        }
        .style6
        {
            width: 402px;
            font-style: italic;
        }
        .style7
        {
            width: 521px;
            height: 21px;
        }
        .style8
        {
            height: 21px;
        }
        .style9
        {
            width: 149px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
   <p>
       <asp:ScriptManager ID="ScriptManager1" runat="server">
       </asp:ScriptManager>
    </p>
    <p>
        <b>ROSIN AND TURPENTINE FACTORY:
       <asp:TextBox ID="TextBox1" runat="server" BorderColor="#003300" 
            BorderStyle="Solid" BorderWidth="1px"></asp:TextBox>
       <br />
    <br />
    Statement of Cost of Production of Rosin and T. Oil<br />
    </b>
    <br />
    <br /></p>
    <table class="style2" border="1" width="500px" style="font-size: 11px">
        <tr>
            <td class="style7">
                Period
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
                </cc1:CalendarExtender>
                to
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox3_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox3">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox3">
                </cc1:CalendarExtender>
            </td>
            <td class="style8">
                Productions: </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                Rosin (in Qtls):
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                T. Oil (in Ltrs):
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                        </td>
        </tr>
    </table>
    <br />
    <br />
    <table class="style2" border="1" width="500px" style="padding: 2px; font-size: 11px;" 
                    cellpadding="3">
        <tr>
            <td colspan="2" rowspan="3">
                Input Cost</td>
            <td colspan="2">
                Total</td>
        </tr>
        <tr>
            <td class="style9">
                Qtls.</td>
            <td>
                Value</td>
        </tr>
        <tr>
            <td class="style9">
                1</td>
            <td>
                2</td>
        </tr>
        <tr>
            <td class="style4">
                1</td>
            <td class="style5">
                Rosin issued for processing</td>
            <td class="style9">
                <asp:TextBox ID="TextBox6" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox7" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                2</td>
            <td class="style5">
                less: Sakki weight</td>
            <td class="style9">
                <asp:TextBox ID="TextBox8" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox9" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                3</td>
            <td class="style5">
                Net resin processed</td>
            <td class="style9">
                <asp:TextBox ID="TextBox10" runat="server" ReadOnly="True">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox11" runat="server" ReadOnly="True">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                4</td>
            <td class="style5">
                Wastage realisation if any</td>
            <td class="style9">
                <asp:TextBox ID="TextBox12" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox13" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                5</td>
            <td class="style5" style="text-align: right">
                Net Resin consumed</td>
            <td class="style9">
                <asp:Label ID="Label1" runat="server"></asp:Label>
            </td>
            <td>
                <asp:Label ID="Label2" runat="server"></asp:Label>
            &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Calculate</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style4">
                6</td>
            <td class="style5">
                Chemical</td>
            <td class="style9">
                <asp:TextBox ID="TextBox14" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox15" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                6</td>
            <td class="style5">
                Electricity &amp; fuel oil consumption</td>
            <td class="style9">
                <asp:TextBox ID="TextBox36" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox37" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                7</td>
            <td class="style5">
                Repair &amp; maintenance</td>
            <td class="style9">
                <asp:TextBox ID="TextBox16" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox17" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                8</td>
            <td class="style5">
                Packing express</td>
            <td class="style9">
                <asp:TextBox ID="TextBox18" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox19" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                9</td>
            <td class="style5">
                maintenance of factory building etc.</td>
            <td class="style9">
                <asp:TextBox ID="TextBox20" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox21" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                10</td>
            <td class="style5">
                Salary &amp; perks</td>
            <td class="style9">
                <asp:TextBox ID="TextBox22" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox23" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                11</td>
            <td class="style5">
                Over head charges</td>
            <td class="style9">
                <asp:TextBox ID="TextBox24" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox25" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                12</td>
            <td class="style5">
                Depreciation</td>
            <td class="style9">
                <asp:TextBox ID="TextBox26" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox27" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                13</td>
            <td class="style5">
                Other expenses</td>
            <td class="style9">
                <asp:TextBox ID="TextBox28" runat="server">0</asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox29" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                14</td>
            <td class="style6" style="text-align: right">
                Total cost of production</td>
            <td class="style9">
                <asp:Label ID="Label3" runat="server"></asp:Label>
            </td>
            <td>
                <asp:Label ID="Label4" runat="server"></asp:Label>
            &nbsp;<asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Calculate</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style4">
                15</td>
            <td class="style5">
                Less cost of by product (T. Oil)</td>
            <td class="style9">
                <asp:TextBox ID="TextBox30" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox31" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                16</td>
            <td class="style5">
                Cost of production of Rosin</td>
            <td class="style9">
                <asp:TextBox ID="TextBox32" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox33" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                17</td>
            <td class="style5">
                Cost per qtl. of Rosin</td>
            <td class="style9">
                <asp:TextBox ID="TextBox34" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="TextBox35" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style5">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO fc15(rosinturpenfactory, periodstart, periodend, rosin_qtl, toil_ltr, resinissued_qtl, resinissued_val, lesssakki_qtl, lesssakki_val, netresin_qtl, netresin_val, wastagereal_qtl, wastagereal_val, netresincon_qtl, netresincon_val, chemical_qtl, chemical_val, elecfuel_qtl, elecfuel_val, repair_qtl, repair_val, packing_qtl, packing_val, mainten_qtl, mainten_val, salary_qtl, salary_val, overhead_qtl, overhead_val, depri_qtl, depri_val, otherexp_qtl, otherexp_val, totalcost_qtl, totalcost_val, lescosttoil_qtl, lescosttoil_val, costrosin_qtl, costrosin_val, costrosinper_qtl, costrosinper_val) VALUES (@rosinturpenfactory, @periodstart, @periodend, @rosin_qtl, @toil_ltr, @resinissued_qtl, @resinissued_val, @lesssakki_qtl, @lesssakki_val, @netresin_qtl, @netresin_val, @wastagereal_qtl, @wastagereal_val, @netresincon_qtl, @netresincon_val, @chemical_qtl, @chemical_val, @elecfuel_qtl, @elecfuel_val, @repair_qtl, @repair_val, @packing_qtl, @packing_val, @mainten_qtl, @mainten_val, @salary_qtl, @salary_val, @overhead_qtl, @overhead_val, @depri_qtl, @depri_val, @otherexp_qtl, @otherexp_val, @totalcost_qtl, @totalcost_val, @lescosttoil_qtl, @lescosttoil_val, @costrosin_qtl, @costrosin_val, @costrosinper_qtl, @costrosinper_val)" 
                    SelectCommand="SELECT * FROM [fc15]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="rosinturpenfactory" 
                            PropertyName="Text" />
                        <asp:Parameter Name="periodstart" />
                        <asp:Parameter Name="periodend" />
                        <asp:ControlParameter ControlID="TextBox4" Name="rosin_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" Name="toil_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="resinissued_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="resinissued_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox8" Name="lesssakki_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="lesssakki_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="netresin_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox11" Name="netresin_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox12" Name="wastagereal_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox13" Name="wastagereal_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label1" Name="netresincon_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label2" Name="netresincon_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox14" Name="chemical_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox15" Name="chemical_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox36" Name="elecfuel_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox37" Name="elecfuel_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox16" Name="repair_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox17" Name="repair_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox18" Name="packing_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox19" Name="packing_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="mainten_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox21" Name="mainten_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox22" Name="salary_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox23" Name="salary_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox24" Name="overhead_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox25" Name="overhead_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox26" Name="depri_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox27" Name="depri_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox28" Name="otherexp_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox29" Name="otherexp_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label2" Name="totalcost_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label3" Name="totalcost_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox30" Name="lescosttoil_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox31" Name="lescosttoil_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox32" Name="costrosin_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox33" Name="costrosin_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox34" Name="costrosinper_qtl" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox35" Name="costrosinper_val" 
                            PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                        </td>
            <td class="style9">
                <asp:Button ID="Button1" runat="server" Text="Submit" onclick="Button1_Click" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <br />
    <br />
    <table class="style2" width="500px">
        <tr>
            <td>
                <b>Factory Managertory Manager</b></td>
            <td>
                <b>General Manager</b></td>
        </tr>
        </table>
</asp:Content>

