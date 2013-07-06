<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc18_report.aspx.cs" Inherits="fc18_report" Title="Untitled Page" %>
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
        .style6
        {
            width: 222px;
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
        .style11
        {
            width: 222px;
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
        .style10
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
            width: 255px;
            height: 31px;
        }
        .style22
        {
            width: 255px;
            height: 29px;
        }
        .style23
     {
         width: 222px;
         height: 29px;
         font-weight: bold;
     }
     .style24
     {
         width: 25px;
         height: 144px;
     }
     .style25
     {
         height: 144px;
         font-weight: bold;
     }
     .style26
     {
         width: 222px;
         height: 144px;
     }
     .style27
     {
         width: 28px;
         height: 144px;
     }
     .style28
     {
         height: 144px;
     }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
<p>
            <b><font size="2">
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
            <br />
            ROSIN AND TURPENTINE FACTORY:
       <asp:Label style="font-weight: 700" ID="Label1" runat="server" BorderColor="#003300" 
           ></asp:Label>
            </font></b>
    </p>
    <p>
        <b>
        <font size="2">Statement of Cost and Selling Price of Black Japan Production</font></b></p>
    <p>
        &nbsp;</p>
    <table class="style2" style="font-size: 11px">
        <tr>
            <td class="style20">
                </td>
            <td class="style20">
                No:
                <asp:Label style="font-weight: 700" ID="Label001" runat="server" ></asp:Label>
            </td>
            <td class="style20">
                </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                Period&nbsp; <asp:Label style="font-weight: 700" ID="Label2" runat="server"></asp:Label>
&nbsp;&nbsp;To
                <asp:Label style="font-weight: 700" ID="Label3" runat="server"></asp:Label>
&nbsp;Output (in Litre): <asp:Label style="font-weight: 700" ID="Label4" runat="server"></asp:Label>
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
    <b>Input costing</b><br />
    <table class="style2" style="font-size: 11px">
        <tr>
            <td class="style3">
                1</td>
            <td class="style4">
                Resin B grade</td>
                        <td class="style16">
                            &nbsp;</td>
                        <td class="style21">
                            <asp:Label style="font-weight: 700" ID="Label5" runat="server" >0</asp:Label>
                            &nbsp;Kg. @ Rs.</td>
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
                M.T.O. oil</td>
            <td class="style17">
                &nbsp;</td>
            <td class="style22">
                <asp:Label style="font-weight: 700" ID="Label8" runat="server">0</asp:Label>
&nbsp;Ltrs. @ Rs.</td>
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
                Bitumen black</td>
            <td class="style17">
                &nbsp;</td>
            <td class="style22">
                <asp:Label style="font-weight: 700" ID="Label11" runat="server">0</asp:Label>
&nbsp;Kg. @ Rs.</td>
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
                Unslaked Lime</td>
            <td class="style13">
                            </td>
            <td class="style21">
                <asp:Label style="font-weight: 700" ID="Label14" runat="server">0</asp:Label>
                &nbsp;Kg. @ Rs.</td>
            <td class="style6">
                <asp:Label style="font-weight: 700" ID="Label15" runat="server">0</asp:Label>
/-per Kg.</td>
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
                B Linseed oil</td>
            <td class="style13">
                            &nbsp;</td>
            <td class="style21">
                <asp:Label style="font-weight: 700" ID="Label28" runat="server">0</asp:Label>
                &nbsp;Ltrs. @ Rs.</td>
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
                Lamp black</td>
            <td class="style13">
                            &nbsp;</td>
            <td class="style21">
                <asp:Label style="font-weight: 700" ID="Label31" runat="server">0</asp:Label>
                &nbsp;Gram. @ Rs.</td>
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
                        <td class="style3">
                            7</td>
            <td class="style13">
                Fuel wood/steam coal</td>
            <td class="style13">
                            &nbsp;</td>
            <td class="style21">
                <asp:Label style="font-weight: 700" ID="Label38" runat="server"></asp:Label>
                Kg. @ Rs.</td>
            <td class="style6">
                <asp:Label style="font-weight: 700" ID="Label39" runat="server"></asp:Label>
                /-per kg.</td>
            <td class="style18">
                &nbsp;</td>
            <td class="style13">
                <asp:Label style="font-weight: 700" ID="Label40" runat="server"></asp:Label>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            8</td>
            <td class="style9">
                Labour Charges</td>
            <td class="style17">
                @Rs.</td>
            <td class="style10" colspan="2">
                <asp:Label style="font-weight: 700" ID="Label17" runat="server">0</asp:Label>
 /-per Ltrs.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label18" runat="server" ReadOnly="True"></asp:Label>
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
                        /-Per Ltrs.</td>
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
                            12</td>
            <td class="style9">
                Add: Profit</td>
            <td class="style17">
                @</td>
            <td class="style22">
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
            <td class="style22">
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
                        <td class="style24">
                            </td>
            <td class="style25" colspan="3">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc18] where preno=@preno" 
                    
                    
                    InsertCommand="INSERT INTO fc18(preno, rosinturfactory, periodstart, periodend, output_ltr, rosinb_kg, rosinb_rs, rosinb_val, mto_oil, mto_rs, mto_val, bitu_kg, bitu_rs, bitu_val, uns_kg, uns_rs, uns_val, Blin_ltr, Blin_rs, Blin_val, lamp_grm, lamp_rs, lamp_val, fuel_kg, fuel_rs, fuel_val, labour_rs, labour_val, overhead_rs, overhead_val, costpro_val, profit_rs, profit_val, com_rs, com_val, sale_val, sellinltr_val) VALUES (@preno, @rosinturfactory, @periodstart, @periodend, @output_ltr, @rosinb_kg, @rosinb_rs, @rosinb_val, @mto_oil, @mto_rs, @mto_val, @bitu_kg, @bitu_rs, @bitu_val, @uns_kg, @uns_rs, @uns_val, @Blin_ltr, @Blin_rs, @Blin_val, @lamp_grm, @lamp_rs, @lamp_val, @fuel_kg, @fuel_rs, @fuel_val, @labour_rs, @labour_val, @overhead_rs, @overhead_val, @costpro_val, @profit_rs, @profit_val, @com_rs, @com_val, @sale_val, @sellinltr_val)">
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
                        <asp:ControlParameter ControlID="Label8" Name="mto_oil" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label9" Name="mto_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label10" Name="mto_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label11" Name="bitu_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label12" Name="bitu_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label13" Name="bitu_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label14" Name="uns_kg" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label15" Name="uns_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label16" Name="uns_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label28" Name="Blin_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label29" Name="Blin_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label30" Name="Blin_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label31" Name="lamp_grm" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label32" Name="lamp_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label33" Name="lamp_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label38" Name="fuel_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label39" Name="fuel_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label40" Name="fuel_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label17" Name="labour_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label18" Name="labour_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label34" Name="overhead_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label35" Name="overhead_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label27" Name="costpro_val" 
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
                    </InsertParameters>
                </asp:SqlDataSource>
                        </td>
            <td class="style26">
                        </td>
            <td class="style27">
                        </td>
            <td class="style28">
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            &nbsp;</td>
            <td class="style14" colspan="3">
                Factory Manager</td>
            <td class="style23">
                General Manager</td>
            <td class="style19">
                &nbsp;</td>
            <td class="style12">
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

