<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc17.aspx.cs" Inherits="fc17" Title="Untitled Page" %>

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
        .style20
        {
            height: 28px;
        }
        .style3
        {
            width: 25px;
            height: 31px;
        }
        .style4
        {
            width: 164px;
            height: 31px;
        }
        .style16
        {
            width: 24px;
            height: 31px;
        }
        .style7
        {
            width: 218px;
            height: 31px;
        }
        .style6
        {
            width: 217px;
            height: 31px;
        }
        .style18
        {
            width: 28px;
            height: 31px;
        }
        .style13
        {
            height: 31px;
        }
        .style8
        {
            width: 25px;
            height: 29px;
        }
        .style9
        {
            height: 29px;
        }
        .style17
        {
            height: 29px;
        }
        .style10
        {
            height: 29px;
        }
        .style11
        {
            width: 217px;
            height: 29px;
        }
        .style19
        {
            width: 28px;
            height: 29px;
        }
        .style12
        {
            height: 29px;
        }
        .style14
        {
            height: 29px;
            font-weight: bold;
        }
        .style21
        {
            height: 29px;
            width: 218px;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        <p>
            <b><font size="2">ROSIN AND TURPENTINE FACTORY:
       <asp:TextBox ID="TextBox1" runat="server" BorderColor="#003300" 
            BorderStyle="Solid" BorderWidth="1px"></asp:TextBox>
            </font></b>
    </p>
    <p>
        <b>
        <font size="2">Statement of Cost of Production of Rosin and T. Oil<br />
        </font></b>
    </p>
    <table class="style2" style="font-size: 11px">
        <tr>
            <td class="style20">
                </td>
            <td class="style20">
                No:
                <asp:Label ID="Label1" runat="server"></asp:Label>
            </td>
            <td class="style20">
                </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                Period :<asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
                </cc1:CalendarExtender>
&nbsp;To
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
&nbsp;Output (in Litre) <asp:TextBox ID="TextBox4" runat="server" Height="22px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox4" ErrorMessage="**Enter Output**"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="TextBox2" ErrorMessage="Enter Start Date"></asp:RequiredFieldValidator>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ControlToValidate="TextBox3" ErrorMessage="Enter End Date"></asp:RequiredFieldValidator>
                        </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <br />
    <br />
    <br />
    <b>Input costing<br />
    </b>
    <table class="style2" style="font-size: 11px">
        <tr>
            <td class="style3">
                1</td>
            <td class="style4">
                Resin B grade</td>
                        <td class="style16">
                            &nbsp;</td>
                        <td class="style7">
                            <asp:TextBox ID="TextBox5" runat="server" >0</asp:TextBox>
                            &nbsp;Kg. @ Rs</td>
                        <td class="style6">
                            <asp:TextBox ID="TextBox6" runat="server">0</asp:TextBox>
                            &nbsp;/-per Kg.</td>
                        <td class="style18">
                            =</td>
                        <td class="style13">
                            <asp:TextBox ID="TextBox7" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
                    </tr>
                    <tr>
                        <td class="style8">
                            2</td>
            <td class="style9">
                Castroil</td>
            <td class="style17">
                &nbsp;</td>
            <td class="style21">
                <asp:TextBox ID="TextBox8" runat="server">0</asp:TextBox>
&nbsp;Ltrs. @ Rs</td>
            <td class="style11">
                <asp:TextBox ID="TextBox9" runat="server">0</asp:TextBox>
&nbsp;/-per Ltrs.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox10" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            3</td>
            <td class="style9">
                Caustic soda</td>
            <td class="style17">
                &nbsp;</td>
            <td class="style21">
                <asp:TextBox ID="TextBox11" runat="server">0</asp:TextBox>
&nbsp;Kg. @ Rs</td>
            <td class="style11">
                <asp:TextBox ID="TextBox12" runat="server">0</asp:TextBox>
&nbsp;/-per Kg.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox13" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style3">
                            4</td>
            <td class="style13">
                Light creosote oil</td>
            <td class="style13">
                            </td>
            <td class="style7">
                <asp:TextBox ID="TextBox14" runat="server">0</asp:TextBox>
                Ltrs. @ Rs</td>
            <td class="style6">
                <asp:TextBox ID="TextBox15" runat="server">0</asp:TextBox>
/-per Ltrs.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:TextBox ID="TextBox16" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style3">
                            5</td>
            <td class="style13">
                Cryslic acid</td>
            <td class="style13">
                            &nbsp;</td>
            <td class="style7">
                <asp:TextBox ID="TextBox28" runat="server">0</asp:TextBox>
                Ltrs. @ Rs</td>
            <td class="style6">
                <asp:TextBox ID="TextBox29" runat="server">0</asp:TextBox>
/-per Ltrs.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:TextBox ID="TextBox30" runat="server"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style3">
                            6</td>
            <td class="style13">
                Fuel wood</td>
            <td class="style13">
                            &nbsp;</td>
            <td class="style7">
                <asp:TextBox ID="TextBox31" runat="server">0</asp:TextBox>
                Kg. @ Rs</td>
            <td class="style6">
                <asp:TextBox ID="TextBox32" runat="server">0</asp:TextBox>
                /-per Kg.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:TextBox ID="TextBox33" runat="server"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            7&nbsp;</td>
            <td class="style9">
                Labour C/S</td>
            <td class="style17">
                @Rs.</td>
            <td class="style10" colspan="2">
                <asp:TextBox ID="TextBox17" runat="server">0</asp:TextBox>
 /-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox18" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            8</td>
            <td class="style9">
                Depreciation C/S</td>
            <td class="style17">
                @Rs.</td>
            <td class="style10" colspan="2">
                <asp:TextBox ID="TextBox19" runat="server">0</asp:TextBox>
&nbsp;/-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox20" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            9</td>
            <td class="style9">
                Over head charges</td>
            <td class="style17">
                @Rs.</td>
            <td class="style10" colspan="2">
                <asp:TextBox ID="TextBox34" runat="server">0</asp:TextBox>
                        </td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox35" runat="server"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            10</td>
            <td class="style9">
                &nbsp;</td>
            <td class="style14" colspan="3">
                Cost of Production:-</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox27" runat="server"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            11</td>
            <td class="style9">
                Add: Interest for 3 months</td>
            <td class="style17">
                @</td>
            <td class="style21">
                <asp:TextBox ID="TextBox21" runat="server">0</asp:TextBox>
&nbsp;% p.a.</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox22" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            12</td>
            <td class="style9">
                Add: Profit</td>
            <td class="style17">
                @</td>
            <td class="style21">
                <asp:TextBox ID="TextBox23" runat="server">0</asp:TextBox>
&nbsp;%</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox24" runat="server" ReadOnly="True"></asp:TextBox>
                            </td>
        </tr>
                    <tr>
                        <td class="style8">
                            13</td>
            <td class="style9">
                Add: Commission to agent</td>
            <td class="style17">
                @</td>
            <td class="style21">
                <asp:TextBox ID="TextBox36" runat="server">0</asp:TextBox>
&nbsp;%</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox37" runat="server"></asp:TextBox>
                            </td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style14" colspan="3">
                Total
                Sales value.</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox25" runat="server">0</asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style14" colspan="3">
                Selling price per litre. (Total Sales Value/output (in litre))</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox26" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style14" colspan="3">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc17]" 
                    InsertCommand="INSERT INTO fc17(preno, rosinturfactory, periodstart, periodend, output_ltr, rosinb_kg, rosinb_rs, rosinb_val, castoroil_kg, castoroil_rs, castoroil_val, caustic_kg, caustic_rs, caustic_val, light_ltr, light_rs, light_val, cry_ltr, cry_rs, cry_val, fuel_kg, fuel_rs, fuel_val, dep_rs, dep_val, labour_rs, labour_val, overhead_rs, overhead_val, costpro_val, inter_per, inter_val, profit_rs, profit_val, com_rs, com_val, sale_val, sellinltr_val) VALUES (@preno, @rosinturfactory, @periodstart, @periodend, @output_ltr, @rosinb_kg, @rosinb_rs, @rosinb_val, @castoroil_kg, @castoroil_rs, @castoroil_val, @caustic_kg, @caustic_rs, @caustic_val, @light_ltr, @light_rs, @light_val, @cry_ltr, @cry_rs, @cry_val, @fuel_kg, @fuel_rs, @fuel_val, @dep_rs, @dep_val, @labour_rs, @labour_val, @overhead_rs, @overhead_val, @costpro_val, @inter_per, @inter_val, @profit_rs, @profit_val, @com_rs, @com_val, @sale_val, @sellinltr_val)">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="preno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox1" Name="rosinturfactory" 
                            PropertyName="Text" />
                        <asp:Parameter Name="periodstart" />
                        <asp:Parameter Name="periodend" />
                        <asp:ControlParameter ControlID="TextBox4" Name="output_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" Name="rosinb_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="rosinb_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="rosinb_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox8" Name="castoroil_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="castoroil_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="castoroil_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox11" Name="caustic_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox12" Name="caustic_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox13" Name="caustic_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox14" Name="light_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox15" Name="light_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox16" Name="light_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox17" Name="labour_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox18" Name="labour_val" 
                            PropertyName="Text" />
                            
                                   <asp:ControlParameter ControlID="TextBox19" Name="dep_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="dep_val" 
                            PropertyName="Text" />
                            
                        <asp:ControlParameter ControlID="TextBox34" Name="overhead_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox35" Name="overhead_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox27" Name="costpro_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox21" Name="inter_per" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox22" Name="inter_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox23" Name="profit_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox24" Name="profit_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox36" Name="com_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox37" Name="com_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox25" Name="sale_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox26" Name="sellinltr_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox28" Name="cry_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox29" Name="cry_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox30" Name="cry_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox31" Name="fuel_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox32" Name="fuel_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox33" Name="fuel_val" 
                            PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                        </td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                &nbsp;</td>
            <td class="style12">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Calculate</asp:LinkButton>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style14" colspan="3">
                &nbsp;</td>
            <td class="style11">
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Submit" />
                            </td>
            <td class="style19">
                &nbsp;</td>
            <td class="style12">
                &nbsp;</td>
        </tr>
    </table>
    </asp:Content>

