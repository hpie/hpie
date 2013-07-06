<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc03_report.aspx.cs" Inherits="fc03_report" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <style type="text/css">
        .style2
        {
            text-align: center;
            height: 45px;
        }
        .style3
       {
           width: 467px;
       }
        .style4
       {
           width: 81%;
           font-size: 8pt;
       }
       .style7
       {
           width: 61px;
       }
        .style9
        {
            width: 575px;
        }
        </style>
        <br /><br />
    <br />
  
               &nbsp;<input type="button" ID="btnPrint" value="Print"  Runat="Server" onClick="javascript:CallPrint('divPrint');" />
               
               <div id="divPrint">
               <table cellpadding="3" cellspacing="0" border="1" style="width: 655px; font-size: 8pt;">
        <tr>
            <td align="center" colspan="2">
                SAKKI ANALYSIS REPORT</td>
        </tr>
        <tr>
            <td class="style3">
                No.:&nbsp;
                <asp:Label ID="Label55" runat="server" Text='<%# Eval("Preno") %>'></asp:Label>
            </td>
            <td>
                Date:&nbsp;&nbsp;&nbsp; <asp:Label ID="TextBox3" runat="server" 
                    Text='<%# Eval("date_fc03", " {0:d/MM/yyyy}") %>'></asp:Label>
            </td>
        </tr>
    </table>
    <br />
    <table cellpadding="3" border="1" cellspacing="0" style="width: 653px; font-size: 8pt;">
        <tr>
            <td c="">
                S. No</td>
            <td>
                Particulars</td>
            <td>
                Unit/Div:<asp:Label ID="TextBox15" runat="server" 
                    Text='<%# Eval("resfwd") %>' Height="16px"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                .</td>
            <td>
                1</td>
            <td>
                2</td>
        </tr>
        <tr>
            <td>
                1</td>
            <td>
                Name of the resin unit:</td>
            <td>
                <asp:Label ID="TextBox4" runat="server" ReadOnly="True" 
                    Text='<%# Eval("resunit") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                2</td>
            <td>
                Name of LSM/Contractor</td>
            <td>
                <asp:Label ID="TextBox5" runat="server" Text='<%# Eval("name_lsm_name") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                3</td>
            <td>
                Challan No.</td>
            <td>
                <asp:Label ID="TextBox6" runat="server" ReadOnly="True" 
                    Text='<%# Eval("challanno") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                4</td>
            <td>
                Lot no.</td>
            <td>
                <asp:Label ID="TextBox7" runat="server" Text='<%# Eval("name_lsm_lot") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                5</td>
            <td>
                No. of
                <asp:Label ID="Label56" runat="server" Text='<%# Eval("Stype") %>'></asp:Label>
            </td>
            <td>
                <asp:Label ID="TextBox8" runat="server" ReadOnly="True" 
                    Text='<%# Eval("nostype") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                6</td>
            <td>
                Gross wt. with tins/drums:</td>
            <td>
                <asp:Label ID="TextBox10" runat="server" ReadOnly="True" 
                    Text='<%# Eval("grosswetin") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                7</td>
            <td>
                wt. of
                <asp:Label ID="Label57" runat="server" Text='<%# Eval("Stype") %>'></asp:Label>
            </td>
            <td>
                <asp:Label ID="TextBox11" runat="server" Text='<%# Eval("NoSType") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                8</td>
            <td>
                net wt. of resin with Sakki</td>
            <td>
                <asp:Label ID="TextBox12" runat="server" ReadOnly="True" 
                    Text='<%# Eval("netrws") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                9</td>
            <td c="">
                Sakki wt. :</td>
            <td>
                <asp:Label ID="TextBox14" runat="server" Text='<%# Eval("saaki_per") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                10</td>
            <td>
                Percentage of Sakki</td>
            <td>
                <asp:Label ID="TextBox13" runat="server" Text='<%# Eval("sakki_wt_fc03") %>'></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc01] WHERE ([PreNo] = @PreNo)">
                    <SelectParameters>
                        <asp:QueryStringParameter Name="PreNo" QueryStringField="code" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
                    <br />
                     <table cellpadding="3" cellspacing="0" border="1" style="width: 655px; font-size: 8pt;">
                        <tr>
                            <td class="brd" >
                                Signature of The Analyst</td>
                            <td class="brd" >
                               Signature of Factory Manager</td>
                       </tr>
                   </table>
                   <br />
                   <br />

    <br />
     <table cellpadding="3" cellspacing="0" border="1" style="width: 655px; font-size: 8pt;">
        <tr>
            <td class="style7" valign="top">
                Note:</td>
            <td class="style9">
                To be Prepared in quadruplicate<br />
                Forst Copy-resin section<br />
                Second copy-Account Department, to be sent to division alongwith the credit 
                note.<br />
                Third copy-Account Department to be kept for record.<br />
                Fourth copy-For record with laboratory.</td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
        </tr>
    </table>
        </div>
</asp:Content>

