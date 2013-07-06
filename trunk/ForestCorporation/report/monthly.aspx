<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="monthly.aspx.cs" Inherits="report_monthly" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 948px;
            font-size: x-small;
            border: 1px solid #000000;
        }
        .style5
        {
            height: 24px;
        }
        .style6
        {
        }
        .style7
        {
        }
        .style8
        {
        }
        .style9
        {
        }
        .style10
        {
        }
        .style11
        {
            font-size: small;
            text-align: center;
            font-weight: bold;
        }
        .style12
        {
            background-color: #E6E6E6;
        }
        .style13
        {
            background-color: #EAEAEA;
        }
        .style14
        {
            height: 20px;
        }
        .style15
        {
            width: 134px;
        }
        .style16
        {
            background-color: #E6E6E6;
            width: 134px;
        }
        .style17
        {
            background-color: #EAEAEA;
            width: 134px;
        }
        .style18
        {
            font-weight: bold;
        }
        .style19
        {
        }
        .style20
        {
            background-color: #E6E6E6;
            width: 87px;
        }
        .style21
        {
            background-color: #EAEAEA;
            width: 87px;
        }
        .style22
        {
            width: 62px;
        }
        .style26
        {
        }
        .style27
        {
            background-color: #E6E6E6;
            width: 62px;
        }
        .style28
        {
            background-color: #EAEAEA;
            width: 62px;
        }
        .style29
        {
            height: 20px;
            width: 62px;
        }
        .style30
        {
            text-align: center;
        }
        .style32
        {
            width: 62px;
            text-align: center;
        }
        .style33
        {
            width: 134px;
            text-align: center;
        }
        .style34
        {
            font-size: xx-small;
        }
        .style35
        {
            text-align: center;
            font-weight: bold;
        }
        .style36
        {
            width: 62px;
            text-align: center;
            font-weight: bold;
        }
    .style37
    {
        width: 134px;
        font-weight: bold;
    }
        .style38
        {
            background-color: #CACACA;
        }
        .style39
        {
            width: 62px;
            background-color: #CACACA;
        }
        .style40
        {
            width: 134px;
            background-color: #CACACA;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style11" colspan="10">
                MONTHLY PROGRESS REPORT OF ROSIN &amp; TURPENTINE OIL<br />
                Factory______ for the month(MM<asp:DropDownList ID="month" 
                    runat="server" AutoPostBack="True" 
                    onselectedindexchanged="month_SelectedIndexChanged" Width="32px">
                    <asp:ListItem>1</asp:ListItem>
                    <asp:ListItem>2</asp:ListItem>
                    <asp:ListItem>3</asp:ListItem>
                    <asp:ListItem>4</asp:ListItem>
                    <asp:ListItem>5</asp:ListItem>
                    <asp:ListItem>6</asp:ListItem>
                    <asp:ListItem>7</asp:ListItem>
                    <asp:ListItem>8</asp:ListItem>
                    <asp:ListItem>9</asp:ListItem>
                    <asp:ListItem>10</asp:ListItem>
                    <asp:ListItem>11</asp:ListItem>
                    <asp:ListItem>12</asp:ListItem>
                </asp:DropDownList>
                yyyy<asp:DropDownList ID="yer" runat="server" AutoPostBack="True" 
                    onselectedindexchanged="yer_SelectedIndexChanged">
                </asp:DropDownList>
                )<asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
                    Text="Search" />
            </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            
                            <b>1.RESIN STOCK WITH SAKKI</b></td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                Opening Balance as on 1/4/<asp:Label ID="year" runat="server"></asp:Label>
            </td>
            <td class="style5" colspan="2">
                Resin Receipt upto Previous month</td>
            <td class="style5" colspan="2">
                Resin Recipt during month</td>
            <td class="style5" colspan="2">
                Progressive total of resin reciept</td>
            <td class="style5" colspan="2">
                Grand Total with OB</td>
        </tr>
        <tr>
            <td class="style19">
                Tins</td>
            <td class="style15">
                Quantity(Qtl)</td>
            <td class="style7">
                Tins</td>
            <td>
                Quantity(Qtl)</td>
            <td class="style26">
                Tins</td>
            <td class="style22">
                Quantity(Qtl)</td>
            <td class="style9">
                Tins</td>
            <td>
                Quantity(Qtl)</td>
            <td class="style10">
                Tins</td>
            <td>
                Quantity(Qtl)</td>
        </tr>
        <tr>
            <td class="style19">
                1.1</td>
            <td class="style15">
                1.2</td>
            <td class="style7">
                2.1</td>
            <td>
                2.2</td>
            <td class="style26">
                3.1</td>
            <td class="style22">
                3.2</td>
            <td class="style9">
                4.1</td>
            <td>
                4.2</td>
            <td class="style10">
                5.1</td>
            <td>
                5.2</td>
        </tr>
        <tr>
            <td class="style20">
                <asp:Label ID="Label1" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style16">
                <asp:Label ID="Label2" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style12">
                <asp:Label ID="Label3" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style12">
                <asp:Label ID="Label4" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style12">
                <asp:Label ID="Label5" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style27">
                <asp:Label ID="Label6" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style12">
                <asp:Label ID="Label7" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style12">
                <asp:Label ID="Label8" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style12">
                <asp:Label ID="Label9" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style12">
                <asp:Label ID="Label10" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                Resin issued for processing upto Previous Month</td>
            <td class="style7" colspan="2">
                Resin issued for processing during current month</td>
            <td class="style8" colspan="2">
                Total resin processed</td>
            <td class="style9" colspan="2">
                Sold to private unit</td>
            <td class="style10" colspan="2">
                Closing Balance</td>
        </tr>
        <tr>
            <td class="style19">
                Tins</td>
            <td class="style15">
                Quantity(Qtl)</td>
            <td class="style7">
                Tins</td>
            <td>
                Quantity(Qtl)</td>
            <td class="style26">
                Tins</td>
            <td class="style22">
                Quantity(Qtl)</td>
            <td class="style9">
                Tins</td>
            <td>
                Quantity(Qtl)</td>
            <td class="style10">
                Tins</td>
            <td>
                Quantity(Qtl)</td>
        </tr>
        <tr>
            <td class="style19">
                1.1</td>
            <td class="style15">
                1.2</td>
            <td class="style7">
                2.1</td>
            <td>
                2.2</td>
            <td class="style26">
                3.1</td>
            <td class="style22">
                3.2</td>
            <td class="style9">
                4.1</td>
            <td>
                4.2</td>
            <td class="style10">
                5.1</td>
            <td>
                5.2</td>
        </tr>
        <tr>
            <td class="style21">
                <asp:Label ID="Label11" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style17">
                <asp:Label ID="Label12" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style13">
                <asp:Label ID="Label13" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style13">
                <asp:Label ID="Label14" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style13">
                <asp:Label ID="Label15" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style28">
                <asp:Label ID="Label16" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style13">
                <asp:Label ID="Label17" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style13">
                <asp:Label ID="Label18" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style13">
                <asp:Label ID="Label19" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style13">
                <asp:Label ID="Label20" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2" rowspan="2">
                <b>2.COMPARATIVE STATEMENT OF RESIN<br />
                PROCESSED(In Qtls)</b></td>
            <td class="style7" colspan="2">
                During current month</td>
            <td class="style8" colspan="2">
                Progressive total Current Year</td>
            <td class="style9" colspan="2">
                Progressive total Last Year</td>
            <td class="style10" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style7">
                Quantity(Qtl)</td>
            <td>
                %age</td>
            <td class="style26">
                Quantity(Qtl)</td>
            <td class="style22">
                %age</td>
            <td class="style9">
                Quantity(Qtl)</td>
            <td>
                %age</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style14" colspan="2">
                </td>
            <td class="style14">
                2.1</td>
            <td class="style14">
                2.2</td>
            <td class="style14">
                3.1</td>
            <td class="style29">
                3.2</td>
            <td class="style14">
                4.1</td>
            <td class="style14">
                4.2</td>
            <td class="style14">
                </td>
            <td class="style14">
                </td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                1.Resin Processed with Sakki</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                2.Sakki/fine particles,clay,mud etc. recovered</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                3.Resin under process previous month</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                4.Resin under process current month</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                5.Net resin processed</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                6.Rosin production</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                7.Turpentine oil production</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                8.Processing wastage</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                THE QUANTITY AND PERCENT OF ROSIN,TURPENTINE OIL AND PROCESSING WASTAGE IN THE 
                SAME MONTH LAST YEAR</td>
        </tr>
        <tr>
            <td class="style14" colspan="2">
                Rosin</td>
            <td class="style14" colspan="2">
                Turpentine Oil</td>
            <td class="style14" colspan="2">
                Processing Wastage</td>
            <td class="style14">
                </td>
            <td class="style14">
                </td>
            <td class="style14">
                </td>
            <td class="style14">
                </td>
        </tr>
        <tr>
            <td class="style19">
                Quantity in Qtls</td>
            <td class="style15">
                %age</td>
            <td class="style7">
                Quantity in Qtls</td>
            <td>
                %age</td>
            <td class="style26">
                Quantity in Qtls</td>
            <td class="style22">
                %age</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                1.1</td>
            <td class="style15">
                1.2</td>
            <td class="style7">
                2.1</td>
            <td>
                2.2</td>
            <td class="style26">
                3.1</td>
            <td class="style22">
                3.2</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                3.ROSIN PRODUCTION AND DESPATCHES</td>
        </tr>
        <tr>
            <td class="style19">
                GRADE</td>
            <td class="style15">
                Opening Balance as on
                <br />
                1/4/</td>
            <td class="style7">
                Prod. upto previous<br />
                Month</td>
            <td>
                Prod. During
                <br />
                month</td>
            <td class="style26">
                Total</td>
            <td class="style22">
                Grand Total<br />
&nbsp;with OB</td>
            <td class="style9">
                Despatches Upto prev.<br />
                Month</td>
            <td>
                Despatches<br />
                During month</td>
            <td class="style10">
                Total</td>
            <td>
                Closing Balance</td>
        </tr>
        <tr>
            <td class="style30">
                1</td>
            <td class="style33">
                2</td>
            <td class="style30">
                3</td>
            <td class="style30">
                4</td>
            <td class="style30">
                5</td>
            <td class="style32">
                6</td>
            <td class="style30">
                7</td>
            <td class="style30">
                8</td>
            <td class="style30">
                9</td>
            <td class="style30">
                10</td>
        </tr>
        <tr>
            <td class="style38">
                X</td>
            <td class="style40">
                <asp:Label ID="Label21" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label31" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label41" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label51" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label61" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                WW</td>
            <td class="style40">
                <asp:Label ID="Label22" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label32" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label42" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label52" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label62" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                WG</td>
            <td class="style40">
                <asp:Label ID="Label23" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label33" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label43" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label53" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label63" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                N</td>
            <td class="style40">
                <asp:Label ID="Label24" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label34" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label44" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label54" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label64" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                M</td>
            <td class="style40">
                <asp:Label ID="Label25" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label35" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label45" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label55" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label65" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                K</td>
            <td class="style40">
                <asp:Label ID="Label26" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label36" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label46" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label56" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label66" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                H</td>
            <td class="style40">
                <asp:Label ID="Label27" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label37" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label47" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label57" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label67" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                D</td>
            <td class="style40">
                <asp:Label ID="Label28" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label38" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label48" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label58" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label68" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                B</td>
            <td class="style40">
                <asp:Label ID="Label29" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label39" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label49" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label59" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label69" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                TOTAL</td>
            <td class="style40">
                <asp:Label ID="Label30" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label40" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label50" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                <asp:Label ID="Label60" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style39">
                <asp:Label ID="Label70" runat="server" Text="0"></asp:Label>
                        </td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
       <%-- <tr>
            <td class="style18" colspan="2">
                4.RECOVERY OF GRADES                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>--%>
        <tr>
            <td class="style18" colspan="2">
                4.RECOVERY OF GRADES</td>
            <td class="style7" colspan="2">
                During current month</td>
            <td class="style26" colspan="2">
                Progressive current month</td>
            <td class="style9" colspan="2">
                Correspoding month last year</td>
            <td class="style10">
                Remarks</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                Type</td>
            <td class="style7">
                Quantity(Qtls)</td>
            <td>
                %age</td>
            <td class="style26">
                Quantity(Qtls)</td>
            <td class="style22">
                %age</td>
            <td class="style9">
                Quantity(Qtls)</td>
            <td>
                %age</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                1</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                PALE</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                MEDIUM</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                DARK</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                TOTAL</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                5.TURPENTINE OIL PRODUCTION AND DESPATCHES(IN Lts.)</td>
        </tr>
        <tr>
            <td class="style19">
                Opening balance
                <br />
                as on 1/4/</td>
            <td class="style15">
                Production upto<br />
                Previous month</td>
            <td class="style7">
                Progressive total</td>
            <td>
                G.Total with OB</td>
            <td class="style26">
                Despatches upto<br />
                previous month</td>
            <td class="style22">
                Despatches during month</td>
            <td class="style9">
                Total</td>
            <td>
                Closing balance</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                1</td>
            <td class="style15">
                2</td>
            <td class="style7">
                3</td>
            <td>
                4</td>
            <td class="style26">
                5</td>
            <td class="style22">
                6</td>
            <td class="style9">
                7</td>
            <td>
                8</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19" colspan="7">
                PROGRESSIVE TOTAL OF TURPENTINE OIL PRODUCTION UPTO CURRENT MONTH</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style14" colspan="7">
                PROGRESSIVE TOTAL OF TURPENTINE OIL PRODUCTION UPTO CORRESPONDING MONTH PREVIOUS 
                YEAR</td>
            <td class="style14">
                </td>
            <td class="style14">
                </td>
            <td class="style14">
                </td>
        </tr>
        <tr>
            <td class="style19" colspan="7">
                PROGRESSIVE TOTAL OF TURPENTINE OIL DESPATCHED UPTO CURRENT MONTH</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19" colspan="7">
                PROGRESSIVE TOTAL OF TURPENTINE OIL DESPATCHED UPTO CORRESPONDING MONTH PREVIOUS 
                YEAR</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                6.SUBSIDIARY PRODUCTS PRODUCTION AND DESPATCHES (Qty in litres)</td>
        </tr>
        <tr>
            <td class="style19">
                Current month &amp; Year</td>
            <td class="style15">
                Opening balance as on<br />
                1/4/</td>
            <td class="style7">
                Production upto previous month</td>
            <td>
                Production during month</td>
            <td class="style26">
                Total</td>
            <td class="style22">
                G.Total with OB</td>
            <td class="style9">
                Despatches upto previous month</td>
            <td>
                Despatches during month</td>
            <td class="style10">
                Total</td>
            <td>
                Closing Balance</td>
        </tr>
        <tr>
            <td class="style30">
                1</td>
            <td class="style33">
                2</td>
            <td class="style30">
                3</td>
            <td class="style30">
                4</td>
            <td class="style30">
                5</td>
            <td class="style32">
                6</td>
            <td class="style30">
                7</td>
            <td class="style30">
                8</td>
            <td class="style30">
                9</td>
            <td class="style30">
                10</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Phenyle</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Varnish</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                B. Japan</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Total</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Correspoding month last year</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Phenyle</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Varnish</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                B.Japan</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Total</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                7.TIN PATRA BARRELS ACCOUNT</td>
        </tr>
        <tr>
            <td class="style19">
                Opening Balance</td>
            <td class="style15">
                Receipt during the month</td>
            <td class="style7">
                Total</td>
            <td>
                Used in production</td>
            <td class="style26">
                Used for BB,Turbid &amp; Floor sweeping</td>
            <td class="style22">
                Balance</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                1</td>
            <td class="style33">
                2</td>
            <td class="style30">
                3</td>
            <td class="style30">
                4</td>
            <td class="style30">
                5</td>
            <td class="style32">
                6</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                8.FLATTENED TINS ACCOUNT</td>
        </tr>
        <tr>
            <td class="style19">
                Opening Balance</td>
            <td class="style15">
                Reciept During the month</td>
            <td class="style7">
                Total</td>
            <td>
                Despatched</td>
            <td class="style26">
                Used for TPB</td>
            <td class="style22">
                Balance</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                1</td>
            <td class="style33">
                2</td>
            <td class="style30">
                3</td>
            <td class="style30">
                4</td>
            <td class="style30">
                5</td>
            <td class="style32">
                6</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                9.TOTAL WORKERS AND WORKING DAYS</td>
        </tr>
        <tr>
            <td class="style19">
                Month/Year</td>
            <td class="style15">
                Total Worker</td>
            <td class="style7">
                Regular</td>
            <td>
                Daily wager</td>
            <td class="style26">
                Home guard</td>
            <td class="style22">
                Working days current month</td>
            <td class="style9">
                Total working days</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                1</td>
            <td class="style33">
                2</td>
            <td class="style30">
                3</td>
            <td class="style30">
                4</td>
            <td class="style30">
                5</td>
            <td class="style32">
                6</td>
            <td class="style30">
                7</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Current month &amp; year</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Last month &amp; year</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                10.CONSUMPTION OF STEAM COAL/FUEL WOOD AND FURNANCE OIL</td>
        </tr>
        <tr>
            <td class="style19">
                Opening balance</td>
            <td class="style15">
                Receipt</td>
            <td class="style7">
                Total</td>
            <td>
                Consumption<br />
                in the month</td>
            <td class="style26">
                Balance</td>
            <td class="style22">
                Resin processed during the month</td>
            <td class="style9">
                Average per day</td>
            <td>
                Total charges</td>
            <td class="style10">
                Steam coal/Furnace oil</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                1</td>
            <td class="style33">
                2</td>
            <td class="style30">
                3</td>
            <td class="style30">
                4</td>
            <td class="style30">
                5</td>
            <td class="style32">
                6</td>
            <td class="style30">
                7</td>
            <td class="style30">
                8</td>
            <td class="style30">
                9</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr class="style34">
            <td class="style19">
                Steam coal/Furnace oil
                <br />
                in current month</td>
            <td class="style15">
                Progressive total of
                <br />
                resing processed in
                <br />
                the current year</td>
            <td class="style7">
                Progressive total of steam coal/Furnace oil consumed per Qtls in Current year</td>
            <td>
                Progressive total of steam coal/Furnace oil consumed per Qtls Upto corresponding 
                month of last year</td>
            <td class="style26">
                Progressive total of steam coal/Furnace oil consumed during the current year</td>
            <td class="style22">
                Progressive total of steam coal/Furnace oil consumed upto correspoding month 
                last year</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                10</td>
            <td class="style33">
                11</td>
            <td class="style30">
                12</td>
            <td class="style30">
                13</td>
            <td class="style30">
                14</td>
            <td class="style32">
                15</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                11.DETAIL OF FACTORY RUNNING DAYS</td>
        </tr>
        <tr>
            <td class="style19">
                Running days</td>
            <td class="style15">
                Closed days</td>
            <td class="style7">
                Total working days up to current month</td>
            <td>
                Total working days upto corresponding month last year</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                1</td>
            <td class="style33">
                2</td>
            <td class="style30">
                3</td>
            <td class="style30">
                4</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style32">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                &nbsp;</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18" colspan="10">
                12.SALE</td>
        </tr>
        <tr>
            <td class="style35" colspan="3">
                Previous</td>
            <td class="style35" rowspan="2">
                Excise Duty</td>
            <td class="style35" rowspan="2">
                CST</td>
            <td class="style36" rowspan="2">
                GST</td>
            <td class="style35" rowspan="2">
                TOTAL</td>
            <td class="style35" rowspan="2">
                Net Sale(Rs.)</td>
            <td class="style35">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18">
                Particulars</td>
            <td class="style37">
                Quantity</td>
            <td class="style18">
                Value(Rs)</td>
            <td class="style18">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                1.1</td>
            <td class="style33">
                1.2</td>
            <td class="style30">
                1.3</td>
            <td class="style30">
                2</td>
            <td class="style30">
                3</td>
            <td class="style32">
                4</td>
            <td class="style30">
                5</td>
            <td class="style30">
                6</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Rosin</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Turpentine Oil</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Phenyle</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Varnish</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Black Japan</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Misc.</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Total</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style35" colspan="3">
                Current</td>
            <td class="style35" rowspan="2">
                Excise Duty</td>
            <td class="style35" rowspan="2">
                CST</td>
            <td class="style36" rowspan="2">
                GST</td>
            <td class="style35" rowspan="2">
                TOTAL</td>
            <td class="style35" rowspan="2">
                Net Sale(Rs.)</td>
            <td class="style35">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18">
                Particulars</td>
            <td class="style37">
                Quantity</td>
            <td class="style18">
                Value(Rs)</td>
            <td class="style18">
                &nbsp;</td>
            <td>
                <b></b></td>
        </tr>
        <tr>
            <td class="style30">
                1.1</td>
            <td class="style33">
                1.2</td>
            <td class="style30">
                1.3</td>
            <td class="style30">
                2</td>
            <td class="style30">
                3</td>
            <td class="style32">
                4</td>
            <td class="style30">
                5</td>
            <td class="style30">
                6</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Rosin</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Turpentine Oil</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Phenyle</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Varnish</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Black Japan</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Misc.</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Total</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style35" colspan="3">
                Progressive</td>
            <td class="style35" rowspan="2">
                Excise Duty</td>
            <td class="style35" rowspan="2">
                CST</td>
            <td class="style36" rowspan="2">
                GST</td>
            <td class="style35" rowspan="2">
                TOTAL</td>
            <td class="style35" rowspan="2">
                Net Sale(Rs.)</td>
            <td class="style35">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style18">
                Particulars</td>
            <td class="style37">
                Quantity</td>
            <td class="style18">
                Value(Rs)</td>
            <td class="style18">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style30">
                1.1</td>
            <td class="style33">
                1.2</td>
            <td class="style30">
                1.3</td>
            <td class="style30">
                2</td>
            <td class="style30">
                3</td>
            <td class="style32">
                4</td>
            <td class="style30">
                5</td>
            <td class="style30">
                6</td>
            <td class="style30">
                &nbsp;</td>
            <td class="style30">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Rosin</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Turpentine Oil</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Phenyle</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Varnish</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Black Japan</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Misc.</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style19">
                Total</td>
            <td class="style15">
                &nbsp;</td>
            <td class="style7">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style26">
                &nbsp;</td>
            <td class="style22">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

