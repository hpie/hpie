<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc17_report.aspx.cs" Inherits="fc17_report" Title="Untitled Page" %>

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
        <p>
            <b><font size="2">ROSIN AND TURPENTINE FACTORY:
       <asp:Label style="font-weight: 700" ID="Label1" runat="server" ></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label001" runat="server"></asp:Label>
            </td>
            <td class="style20">
                </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                Period :<asp:Label ID="Label2" runat="server"></asp:Label>
&nbsp;To
                <asp:Label style="font-weight: 700" ID="Label3" runat="server"></asp:Label>
&nbsp;Output (in Litre) <asp:Label style="font-weight: 700" ID="Label4" runat="server" ></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                            <asp:Label style="font-weight: 700" ID="Label5" runat="server"  >0</asp:Label>
                            &nbsp;Kg. @ Rs</td>
                        <td class="style6">
                            <asp:Label style="font-weight: 700" ID="Label6" runat="server">0</asp:Label>
                            &nbsp;/-per Kg.</td>
                        <td class="style18">
                            =</td>
                        <td class="style13">
                            <asp:Label style="font-weight: 700" ID="Label7" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label8" runat="server">0</asp:Label>
&nbsp;Ltrs. @ Rs</td>
            <td class="style11">
                <asp:Label style="font-weight: 700" ID="Label9" runat="server">0</asp:Label>
&nbsp;/-per Ltrs.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label10" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label11" runat="server">0</asp:Label>
&nbsp;Kg. @ Rs</td>
            <td class="style11">
                <asp:Label style="font-weight: 700" ID="Label12" runat="server">0</asp:Label>
&nbsp;/-per Kg.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label13" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label14" runat="server">0</asp:Label>
                Ltrs. @ Rs</td>
            <td class="style6">
                <asp:Label style="font-weight: 700" ID="Label15" runat="server">0</asp:Label>
/-per Ltrs.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:Label style="font-weight: 700" ID="Label16" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label28" runat="server">0</asp:Label>
                Ltrs. @ Rs</td>
            <td class="style6">
                <asp:Label style="font-weight: 700" ID="Label29" runat="server">0</asp:Label>
/-per Ltrs.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:Label style="font-weight: 700" ID="Label30" runat="server"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label31" runat="server">0</asp:Label>
                Kg. @ Rs</td>
            <td class="style6">
                <asp:Label style="font-weight: 700" ID="Label32" runat="server">0</asp:Label>
                /-per Kg.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:Label style="font-weight: 700" ID="Label33" runat="server"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label17" runat="server">0</asp:Label>
 /-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label18" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label19" runat="server">0</asp:Label>
&nbsp;/-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label20" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label34" runat="server">0</asp:Label>
                        </td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label35" runat="server"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label27" runat="server"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label21" runat="server">0</asp:Label>
&nbsp;% p.a.</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label22" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label23" runat="server">0</asp:Label>
&nbsp;%</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label24" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label36" runat="server">0</asp:Label>
&nbsp;%</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label37" runat="server"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label25" runat="server">0</asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label26" runat="server" ReadOnly="True"></asp:Label>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style14" colspan="3">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc17] where preno=@preno" 
                    
                    InsertCommand="INSERT INTO fc17(preno, rosinturfactory, periodstart, periodend, output_ltr, rosinb_kg, rosinb_rs, rosinb_val, castoroil_kg, castoroil_rs, castoroil_val, caustic_kg, caustic_rs, caustic_val, light_ltr, light_rs, light_val, cry_ltr, cry_rs, cry_val, fuel_kg, fuel_rs, fuel_val, dep_rs, dep_val, labour_rs, labour_val, overhead_rs, overhead_val, costpro_val, inter_per, inter_val, profit_rs, profit_val, com_rs, com_val, sale_val, sellinltr_val) VALUES (@preno, @rosinturfactory, @periodstart, @periodend, @output_ltr, @rosinb_kg, @rosinb_rs, @rosinb_val, @castoroil_kg, @castoroil_rs, @castoroil_val, @caustic_kg, @caustic_rs, @caustic_val, @light_ltr, @light_rs, @light_val, @cry_ltr, @cry_rs, @cry_val, @fuel_kg, @fuel_rs, @fuel_val, @dep_rs, @dep_val, @labour_rs, @labour_val, @overhead_rs, @overhead_val, @costpro_val, @inter_per, @inter_val, @profit_rs, @profit_val, @com_rs, @com_val, @sale_val, @sellinltr_val)">
                    <SelectParameters>
                        <asp:QueryStringParameter DefaultValue="" Name="preno" 
                            QueryStringField="preno" />
                    </SelectParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="preno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label1" Name="rosinturfactory" 
                            PropertyName="Text" />
                        <asp:Parameter Name="periodstart" />
                        <asp:Parameter Name="periodend" />
                        <asp:ControlParameter ControlID="Label4" Name="output_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label5" Name="rosinb_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label6" Name="rosinb_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label7" Name="rosinb_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label8" Name="castoroil_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label9" Name="castoroil_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label10" Name="castoroil_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label11" Name="caustic_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label12" Name="caustic_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label13" Name="caustic_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label14" Name="light_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label15" Name="light_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label16" Name="light_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label17" Name="labour_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label18" Name="labour_val" 
                            PropertyName="Text" />
                            
                                   <asp:ControlParameter ControlID="Label19" Name="dep_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label20" Name="dep_val" 
                            PropertyName="Text" />
                            
                        <asp:ControlParameter ControlID="Label34" Name="overhead_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label35" Name="overhead_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label27" Name="costpro_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label21" Name="inter_per" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label22" Name="inter_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label23" Name="profit_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label24" Name="profit_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label36" Name="com_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label37" Name="com_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label25" Name="sale_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label26" Name="sellinltr_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label28" Name="cry_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label29" Name="cry_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label30" Name="cry_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label31" Name="fuel_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label32" Name="fuel_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label33" Name="fuel_val" 
                            PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                        </td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                &nbsp;</td>
            <td class="style12">
                &nbsp;</td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style14" colspan="3">
                &nbsp;</td>
            <td class="style11">
                &nbsp;</td>
            <td class="style19">
                &nbsp;</td>
            <td class="style12">
                &nbsp;</td>
        </tr>
    </table>
    </asp:Content>