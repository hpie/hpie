<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc16_report.aspx.cs" Inherits="fc16_report" Title="Untitled Page" %>
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
            width: 217px;
            height: 31px;
        }
        .style7
        {
            width: 209px;
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
            width: 217px;
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
            width: 367px;
            height: 96px;
        }
        .style22
        {
            height: 96px;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <p>
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        <b><font size="2">ROSIN AND TURPENTINE FACTORY:</font>
       <asp:Label style="font-weight: 700" ID="Label1" runat="server" BorderColor="#003300" 
            ></asp:Label>
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
                <asp:Label ID="Label001" runat="server" style="font-weight: 700"></asp:Label>
                </td>
            <td class="style20">
                </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                Period :<asp:Label style="font-weight: 700" ID="Label2" runat="server"></asp:Label>
&nbsp;To
                <asp:Label style="font-weight: 700" ID="Label3" runat="server"></asp:Label>
&nbsp;Output (in Litre) <asp:Label style="font-weight: 700" ID="Label4" runat="server"></asp:Label>
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
    <table class="style2" style="font-size: 11px">
        <tr>
            <td class="style3">
                1</td>
            <td class="style4">
                Resin</td>
                        <td class="style16">
                            &nbsp;</td>
                        <td class="style7">
                            <asp:Label style="font-weight: 700" ID="Label5" runat="server" >0</asp:Label>
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
                M.T.O. oil</td>
            <td class="style17">
    &nbsp;</td>
            <td class="style10">
                <asp:Label style="font-weight: 700" ID="Label8" runat="server">0</asp:Label>
&nbsp;Kg. @ Rs</td>
            <td class="style11">
                <asp:Label style="font-weight: 700" ID="Label9" runat="server">0</asp:Label>
&nbsp;/-per Ltrs.</td>
            <td class="style19">
                =           =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label10" runat="server" ReadOnly="True"></asp:Label>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            3</td>
            <td class="style9">
                Lime unslaked</td>
            <td class="style17">
                &nbsp;</td>
            <td class="style10">
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
                Steam coal</td>
            <td class="style13">
                            </td>
            <td class="style13">
                <asp:Label style="font-weight: 700" ID="Label14" runat="server">0</asp:Label>
&nbsp;Kg. @ Rs</td>
            <td class="style6">
                <asp:Label style="font-weight: 700" ID="Label15" runat="server">0</asp:Label>
&nbsp;/-per Kg.</td>
            <td class="style18">
                =</td>
            <td class="style13">
                <asp:Label style="font-weight: 700" ID="Label16" runat="server" ReadOnly="True"></asp:Label>
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
                &nbsp;<asp:Label style="font-weight: 700" ID="Label17" runat="server">0</asp:Label>
 &nbsp;/-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label18" runat="server" ReadOnly="True"></asp:Label>
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
                &nbsp;<asp:Label style="font-weight: 700" ID="Label19" runat="server">0</asp:Label>
&nbsp;/-per Ltr.</td>
            <td class="style19">
                =</td>
            <td class="style12">
                <asp:Label style="font-weight: 700" ID="Label20" runat="server" ReadOnly="True"></asp:Label>
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
                <asp:Label style="font-weight: 700" ID="Label27" runat="server" ReadOnly="True"></asp:Label>
                        </td>
        </tr>
                    <tr>
                        <td class="style8">
                            7</td>
            <td class="style9">
                Add: Profit</td>
            <td class="style17">
                @</td>
            <td class="style10">
                &nbsp;<asp:Label style="font-weight: 700" ID="Label21" runat="server">0</asp:Label>
&nbsp;%</td>
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
                            8</td>
            <td class="style9">
                Add: Commission to agent</td>
            <td class="style17">
                @</td>
            <td class="style10">
                &nbsp;<asp:Label style="font-weight: 700" ID="Label23" runat="server">0</asp:Label>
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
                            &nbsp;</td>
            <td class="style14" colspan="3">
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
                Selling price per litre. (Sales Value/production (in litre))</td>
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
                    InsertCommand="INSERT INTO fc16(preno, rosinturfactory, periodstart, periodend, production_ltr, resin_kg, resin_rs, resin_val, mto_ltre, mto_rs, mto_val, lime_kg, lime_rs, lime_val, steam_kg, steam_rs, steam_val, labour_rs, labour_val, overhead_rs, overhead_val, costpro_val, addprofit_per, addprofit_val, addcom_per, addcom_val, sale_val, sellinltr_val) VALUES (@preno, @rosinturfactory, @periodstart, @periodend, @production_ltr, @resin_kg, @resin_rs, @resin_val, @mto_ltre, @mto_rs, @mto_val, @lime_kg, @lime_rs, @lime_val, @steam_kg, @steam_rs, @steam_val, @labour_rs, @labour_val, @overhead_rs, @overhead_val, @costpro_val, @addprofit_per, @addprofit_val, @addcom_per, @addcom_val, @sale_val, @sellinltr_val)" 
                    SelectCommand="SELECT * FROM [fc16] where preno=@preno">
                    <SelectParameters>
                        <asp:QueryStringParameter Name="preno" QueryStringField="preno" />
                    </SelectParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="preno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label1" Name="rosinturfactory" 
                            PropertyName="Text" />
                        <asp:Parameter Name="periodstart" />
                        <asp:Parameter Name="periodend" />
                        <asp:ControlParameter ControlID="Label4" Name="production_ltr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label5" Name="resin_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label6" Name="resin_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label7" Name="resin_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label8" Name="mto_ltre" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label9" Name="mto_rs" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label10" Name="mto_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label11" Name="lime_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label12" Name="lime_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label13" Name="lime_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label14" Name="steam_kg" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label15" Name="steam_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label16" Name="steam_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label17" Name="labour_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label18" Name="labour_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label19" Name="overhead_rs" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label20" Name="overhead_val" 
                            PropertyName="Text" />
                     
                        <asp:ControlParameter ControlID="Label27" Name="costpro_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label21" Name="addprofit_per" 
                            PropertyName="Text" />
                            <asp:ControlParameter ControlID="Label22" Name="addprofit_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label23" Name="addcom_per" 
                            PropertyName="Text" />
                             <asp:ControlParameter ControlID="Label24" Name="addcom_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label25" Name="sale_val" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Label26" Name="sellinltr_val" 
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
    <br />
    <table class="style2">
        <tr>
            <td class="style21">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Factory 
                Manager</td>
            <td class="style22">
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

