<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc12_report.aspx.cs" Inherits="fc12_report" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 678px;
            border: 1px solid #000000;
        }
        .style5
        {
            text-align: left;
        }
        .style6
        {
            width: 426px;
            height: 18px;
        }
        .style7
        {
            height: 18px;
        }
        .style8
        {
            text-align: left;
            height: 29px;
        }
        .style9
        {
            height: 29px;
        }
        .style10
        {
            text-align: left;
            height: 69px;
        }
        .style11
        {
            text-align: left;
            font-weight: bold;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
            <div id="divPrint">
    <table cellpadding="0" cellspacing="0" class="style4" 
        style="font-family: Verdana; font-size: 11px; text-align: left">
        <tr>
            <td colspan="3" 
                style="text-align: center; color: #FFFFFF; background-color: #0066FF">
                MATERIAL TRANSFER NOTE</td>
        </tr>
        <tr>
            <td class="style8">
                </td>
            <td class="style8">
                &nbsp;</td>
            <td class="style9">
                No.:<asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style6">
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style7">
                Date :
                 <asp:TextBox ID="TextBox1" runat="server" 
                    ontextchanged="TextBox1_TextChanged"></asp:TextBox>
            <ajaxToolkit:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
            </ajaxToolkit:MaskedEditExtender>
            <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
            </ajaxToolkit:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td class="style5">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5" colspan="3">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataSourceID="SqlDataSource1" onrowdatabound="GridView1_RowDataBound" 
                    BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" style="font-size: 10pt" Width="791px">
                    <RowStyle ForeColor="#000066" />
                    <Columns>
                        <asp:TemplateField HeaderText="Sr.No.">
                        <ItemTemplate>
                        <%#r %>
                        </ItemTemplate>
                        </asp:TemplateField>
                        <asp:BoundField DataField="des" HeaderText="Description" SortExpression="des" />
                                                <asp:BoundField DataField="no_pack" HeaderText="Packing size" 
                            SortExpression="no_pack" />
                        <asp:TemplateField HeaderText="No. of packings(TPB)" 
                            SortExpression="pack_size">
                            <EditItemTemplate>
                                <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("pack_size") %>'></asp:TextBox>
                            </EditItemTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label1" runat="server" Text='<%# Bind("pack_size") %>'></asp:Label>
                                
                            </ItemTemplate>
                        </asp:TemplateField>


                        <asp:BoundField DataField="wt" HeaderText="Weight" SortExpression="wt" />
                                                <asp:TemplateField HeaderText="No. of packings(PGI)" 
                            SortExpression="no_pack">
                            <EditItemTemplate>
                            </EditItemTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label5" runat="server" Text='<%# Eval("no_pack1") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:BoundField DataField="wt1" HeaderText="Weight" SortExpression="wt1" />

                        <asp:BoundField DataField="batch_no" HeaderText="Batch No." 
                            SortExpression="batch_no" />
                        <asp:BoundField DataField="remark" HeaderText="Remarks" 
                            SortExpression="remark" />
                    </Columns>
                    <FooterStyle BackColor="White" ForeColor="#000066" />
                    <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                    <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                    <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
                </asp:GridView>
            </td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td class="style5">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style11">
                Issued by</td>
            <td class="style11">
                Production Incharge</td>
            <td>
                <b>Received by</b></td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td class="style5">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style10">
                Notes:</td>
            <td class="style10" align="left" colspan="2">
                1. The material transfer note shall be prepared by the production department at 
                the time of transfer of finished goods to dispatch foreman.</td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td class="style5" colspan="2">
                2.Distribution of copies:</td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td class="style5" colspan="2">
                1st copy-Dispatch Foreman<br />
                2en copy-office copy (Production Department)</td>
        </tr>
        <tr>
            <td class="style5">
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc12_r] ORDER BY [PrNo]"></asp:SqlDataSource>
            </td>
            <td class="style5">
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Print</asp:LinkButton>
                <ajaxToolkit:ConfirmButtonExtender ID="LinkButton1_ConfirmButtonExtender" 
                    runat="server" ConfirmText="You Want To Print Report" Enabled="True" 
                    TargetControlID="LinkButton1">
                </ajaxToolkit:ConfirmButtonExtender>
            </td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc12] where no_pre=@no_pre order by cade" 
                    InsertCommand="INSERT INTO fc12_r(PrNo, Dt) VALUES (@PrNo, @Dt)">
                    <SelectParameters>
                        <asp:Parameter Name="no_pre" />
                    </SelectParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="PrNo" PropertyName="Text" />
                        <asp:Parameter Name="Dt" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    </div>
</asp:Content>

