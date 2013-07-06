<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc07_report.aspx.cs" Inherits="fc07_report" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            height: 24px;
        }
        .style5
        {
            height: 35px;
        }
        .style6
        {
            height: 23px;
        }
        .style7
        {
            height: 42px;
        }
        .style8
        {
            height: 50px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td class="style4" colspan="2" style="text-align: center">
                <br />
                <br />
                <br />
            </td>
        </tr>
        <tr>
            <td class="style7">
                Credit not No:<asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Date:<asp:Label ID="Label12" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style7">
                Name of Division/Unit:
                <asp:Label ID="Label11" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    onrowdatabound="GridView1_RowDataBound" style="font-size: small" 
                    onselectedindexchanged="GridView1_SelectedIndexChanged">
                    <Columns>
                        <asp:TemplateField HeaderText="Sr.No">
                            <ItemTemplate>
                                <%--<%#r %>--%>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Name of unit/FWD">
                            <ItemTemplate>
                                <asp:Label ID="Label1" runat="server" Text='<%# Eval("ResFWD") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Name of LSM &amp; Lot No.">
                            <ItemTemplate>
                                <asp:Label ID="Label2" runat="server" Text='<%# Eval("name_lsm_name") %>'></asp:Label>
                                &nbsp;&amp;
                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("name_lsm_lot") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Challan No.">
                            <ItemTemplate>
                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("ChallanNo") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No of tins/drums">
                            <ItemTemplate>
                                <asp:Label ID="Label5" runat="server" Text='<%# Eval("SType") %>'></asp:Label>
                                -<asp:Label ID="Label6" runat="server" Text='<%# Eval("NoSType") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Gross wt. with tins/drums">
                            <ItemTemplate>
                                <asp:Label ID="Label7" runat="server" Text='<%# Eval("GrossWe") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Net wt. Resin recived with Sakki">
                            <ItemTemplate>
                                <asp:Label ID="Label8" runat="server" Text='<%# Eval("NetRWS") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Sakki wt.">
                            <ItemTemplate>
                                <asp:Label ID="Label9" runat="server" Text='<%# Eval("sakki_wt_fc03") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Net wt. without Sakki"></asp:TemplateField>
                        <asp:TemplateField HeaderText="Rate"></asp:TemplateField>
                        <asp:TemplateField HeaderText="Amount"></asp:TemplateField>
                        <asp:TemplateField></asp:TemplateField>
                    </Columns>
                </asp:GridView>
            </td>
        </tr>
        <tr>
            <td class="style8">
            </td>
            <td class="style8">
            </td>
        </tr>
        <tr>
            <td class="style6" colspan="2">
                NOTE:To be prepared in triplicated</td>
        </tr>
        <tr>
            <td class="style13" colspan="2">
                NOTE:To be prepared in triplicate<br />
                First Copy:To be&nbsp; sent to the division<br />
                Second copy:To be attached with the voucher<br />
                Third Copy:For record<br />
            </td>
        </tr>
        <tr>
            <td class="style7" colspan="2">
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

