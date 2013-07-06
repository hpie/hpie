<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc16.aspx.cs" Inherits="fc16" Title="Untitled Page" %>

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
            width: 25px;
            height: 31px;
        }
        .style4
        {
            width: 164px;
            height: 31px;
        }
        .style6
        {
            width: 221px;
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
        .style10
        {
            height: 29px;
        }
        .style11
        {
            width: 221px;
            height: 29px;
        }
        .style12
        {
            height: 29px;
        }
        .style13
        {
            height: 31px;
        }
        .style14
        {
            height: 29px;
            font-weight: bold;
        }
        .style15
        {
            width: 367px;
        }
        .style16
        {
            width: 24px;
            height: 31px;
        }
        .style17
        {
            height: 29px;
        }
        .style18
        {
            width: 28px;
            height: 31px;
        }
        .style19
        {
            width: 28px;
            height: 29px;
        }
        .style20
        {
            height: 28px;
        }
        .style21
        {
            height: 29px;
            width: 243px;
        }
        .style22
        {
            width: 243px;
            height: 31px;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <p>
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        <b><font size="2">ROSIN AND TURPENTINE FACTORY:</font>
       <asp:TextBox ID="TextBox1" runat="server" BorderColor="#003300" 
            BorderStyle="Solid" BorderWidth="1px"></asp:TextBox>
       <br />
    <br />
        <font size="2">Statement of Cost of Production of Rosin and T. Oil</font></b></p>
    <br />
    <br />
    <b>Input costing</b><br />
                <br />
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
&nbsp;Output (in Litre) <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox4" ErrorMessage="**Enter Production**"></asp:RequiredFieldValidator>
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
    <table class="style2" style="font-size: 11px">
        <tr>
            <td class="style3">
                1</td>
            <td class="style4">
                Resin</td>
                        <td class="style16">
                            &nbsp;</td>
                        <td class="style22">
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
                M.T.O. oil</td>
            <td class="style17">
    &nbsp;</td>
            <td class="style21">
                <asp:TextBox ID="TextBox8" runat="server">0</asp:TextBox>
&nbsp;Kg. @ Rs</td>
            <td class="style11">
                <asp:TextBox ID="TextBox9" runat="server">0</asp:TextBox>
&nbsp;/-per Ltrs.</td>
            <td class="style19">
                                = </td>
            <td class="style12">
                <asp:TextBox ID="TextBox10" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            3</td>
            <td class="style9">
                Lime unslaked</td>
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
                Steam coal</td>
            <td class="style13">
                            </td>
            <td class="style22">
                <asp:TextBox ID="TextBox14" runat="server">0</asp:TextBox>
Kg. @ Rs</td>
            <td class="style6">
                <asp:TextBox ID="TextBox15" runat="server">0</asp:TextBox>
/-per Kg.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:TextBox ID="TextBox16" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            5</td>
            <td class="style9">
                Labour charges</td>
            <td class="style17">
                @Rs.</td>
            <td class="style10" colspan="2">
                &nbsp;<asp:TextBox ID="TextBox17" runat="server">0</asp:TextBox>
 /-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox18" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            6</td>
            <td class="style9">
                Overhead charges</td>
            <td class="style17">
                @Rs</td>
            <td class="style10" colspan="2">
                &nbsp;<asp:TextBox ID="TextBox19" runat="server">0</asp:TextBox>
&nbsp;/-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox20" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td class="style14" colspan="3">
                Cost of Production:-</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:TextBox ID="TextBox27" runat="server" ReadOnly="True"></asp:TextBox>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            7</td>
            <td class="style9">
                Add: Profit</td>
            <td class="style17">
                @</td>
            <td class="style21">
                &nbsp;<asp:TextBox ID="TextBox21" runat="server">0</asp:TextBox>
&nbsp;%</td>
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
                            8</td>
            <td class="style9">
                Add: Commission to agent</td>
            <td class="style17">
                @</td>
            <td class="style21">
                &nbsp;<asp:TextBox ID="TextBox23" runat="server">0</asp:TextBox>
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
                            &nbsp;</td>
            <td class="style14" colspan="3">
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
                Selling price per litre. (Sales Value/production (in litre))</td>
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
                    InsertCommand="INSERT INTO fc16(preno, rosinturfactory, periodstart, periodend, production_ltr, resin_kg, resin_rs, resin_val, mto_ltre, mto_rs, mto_val, lime_kg, lime_rs, lime_val, steam_kg, steam_rs, steam_val, labour_rs, labour_val, overhead_rs, overhead_val, costpro_val, addprofit_per, addprofit_val, addcom_per, addcom_val, sale_val, sellinltr_val) VALUES (@preno, @rosinturfactory, @periodstart, @periodend, @production_ltr, @resin_kg, @resin_rs, @resin_val, @mto_ltre, @mto_rs, @mto_val, @lime_kg, @lime_rs, @lime_val, @steam_kg, @steam_rs, @steam_val, @labour_rs, @labour_val, @overhead_rs, @overhead_val, @costpro_val, @addprofit_per, @addprofit_val, @addcom_per, @addcom_val, @sale_val, @sellinltr_val)" 
                    SelectCommand="SELECT * FROM [fc16]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="preno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox1" Name="rosinturfactory" 
                            PropertyName="Text" />
                        <asp:Parameter Name="periodstart" />
                        <asp:Parameter Name="periodend" />
                        <asp:ControlParameter ControlID="TextBox4" Name="production_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" Name="resin_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="resin_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="resin_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox8" Name="mto_ltre" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="mto_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="mto_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox11" Name="lime_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox12" Name="lime_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox13" Name="lime_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox14" Name="steam_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox15" Name="steam_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox16" Name="steam_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox17" Name="labour_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox18" Name="labour_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox19" Name="overhead_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="overhead_val" 
                            PropertyName="Text" />
                     
                        <asp:ControlParameter ControlID="TextBox27" Name="costpro_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox21" Name="addprofit_per" 
                            PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox22" Name="addprofit_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox23" Name="addcom_per" 
                            PropertyName="Text" />
                             <asp:ControlParameter ControlID="TextBox24" Name="addcom_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox25" Name="sale_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox26" Name="sellinltr_val" 
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
    <br />
    <table class="style2">
        <tr>
            <td class="style15">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Factory 
                Manager</td>
            <td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                General Manager</td>
        </tr>
        <tr>
            <td class="style15">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

