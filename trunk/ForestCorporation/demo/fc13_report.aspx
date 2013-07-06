<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="fc13_report.aspx.cs" Inherits="fc13_report" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
    .style4
    {
        width: 751px;
        border: 1px solid #000000;
    }
    .style5
    {
            width: 453px;
        }
    .style6
    {
            text-align: center;
            color: #FFFFFF;
            background-color: #0066CC;
            height: 34px;
        }
        .style7
        {
            width: 105px;
        }
        .style10
        {
            width: 105px;
            height: 83px;
            font-size: small;
        }
        .style11
        {
            width: 453px;
            height: 83px;
        }
        .style14
        {
            width: 105px;
            height: 30px;
            font-size: small;
        }
        .style15
        {
            width: 453px;
            }
        .style20
        {
            width: 105px;
            font-size: small;
        }
        .style22
        {
            width: 104px;
            height: 83px;
        }
        .style27
        {
            width: 105px;
            height: 47px;
            font-size: small;
        }
        .style31
        {
            height: 44px;
            font-size: small;
        }
        .style32
        {
            width: 104px;
            height: 44px;
        }
        .style33
        {
            width: 453px;
            height: 44px;
        }
        .style34
        {
            width: 932px;
            height: 30px;
            font-size: small;
        }
        .style35
        {
            width: 932px;
            height: 47px;
            font-size: small;
        }
        .style36
        {
            width: 932px;
            height: 83px;
            font-size: small;
        }
        .style37
        {
            height: 44px;
            font-size: 11pt;
            width: 932px;
        }
        .style38
        {
            width: 932px;
            font-size: small;
        }
        .style39
        {
            width: 932px;
        }
        .style40
        {
            height: 44px;
            font-size: 11pt;
            width: 105px;
        }
        .style41
        {
            width: 104px;
        }
        .style42
        {
            font-size: 11pt;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
      <input type="button" ID="btnPrint" value="Print"  Runat="Server" onClick="javascript:CallPrint('divPrint');" />
      <div id="divPrint">
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style6" colspan="3">
                <br />
                FACTORY ORDER<asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                </td>
            <td class="style6">
            </td>
        </tr>
        <tr>
            <td class="style14">
                Factory Order
            No:-<br />
                (Pre-numbered)</td>
            <td class="style34" valign="top">
                <asp:Label ID="Label5" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style41" rowspan="2" valign="top">
                Priority No.<br />
                <br />
                Your Order No.<br />
                <br />
                Date</td>
            <td class="style15" rowspan="2" valign="top">
                <asp:Label ID="Label6" runat="server" Text="Label"></asp:Label>
                <br />
                <br />
                <asp:Label ID="Label7" runat="server" Text="Label"></asp:Label>
                <br />
                <br />
                
                <asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style27">
                &nbsp;</td>
            <td class="style35">
            </td>
        </tr>
        <tr>
            <td class="style10">
                M/s</td>
            <td class="style36">
                <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style22">
                &nbsp;</td>
            <td class="style11">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style31" colspan="4">
                <asp:GridView ID="GridView1" runat="server" BackColor="White" 
                    BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                    DataSourceID="SqlDataSource1" AutoGenerateColumns="False" Width="723px">
                    <RowStyle ForeColor="#000066" />
                    <Columns>
                        <asp:TemplateField HeaderText="Products&lt;br&gt;(with packing size)">
                            <ItemTemplate>
                                <asp:Label ID="Label1" runat="server" Text='<%# Eval("pro_size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Quantity">
                            <ItemTemplate>
                                <asp:Label ID="Label2" runat="server" Text='<%# Eval("qty") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Rate">
                            <ItemTemplate>
                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("rate") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Remarks">
                            <ItemTemplate>
                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("remark") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                    </Columns>
                    <FooterStyle BackColor="White" ForeColor="#000066" />
                    <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                    <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                    <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
                </asp:GridView>
            </td>
        </tr>
        <tr>
            <td class="style40">
                Destination:-</td>
            <td class="style37">
                <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style32">
                <span class="style42">Consignee:-</td>
            <td class="style33">
                <asp:Label ID="Label11" runat="server" Text="Label"></asp:Label>
                </span>
            </td>
        </tr>
        <tr>
            <td class="style20">
                &nbsp;</td>
            <td class="style38">
                &nbsp;</td>
            <td class="style41">
                &nbsp;</td>
            <td class="style5">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style7">
                &nbsp;</td>
            <td class="style39">
                &nbsp;</td>
            <td class="style41">
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
                Text="Save Record" />
                <cc1:ConfirmButtonExtender ID="Button1_ConfirmButtonExtender" runat="server" 
                ConfirmText="You want to save record" Enabled="True" TargetControlID="Button1">
                </cc1:ConfirmButtonExtender>
            </td>
            <td class="style5">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO fc13(fac_ord_no, pri_no, your_o_no, dt, ms, pro_size, qty, rate, remark, desti, consi) VALUES (@fac_ord_no, @pri_no, @your_o_no, @dt, @ms, @pro_size, @qty, @rate, @remark, @desti, @consi)" 
                    SelectCommand="SELECT * FROM [fc13] where fac_ord_no=@ord">
                    <SelectParameters>
                        <asp:QueryStringParameter DefaultValue="" Name="ord" QueryStringField="qty" />
                    </SelectParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="fac_ord_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="pri_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="your_o_no" 
                            PropertyName="Text" />
                        <asp:Parameter Name="dt" />
                        <asp:ControlParameter ControlID="TextBox5" Name="ms" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="pro_size" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="qty" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox8" Name="rate" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="remark" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="desti" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox11" Name="consi" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    </div>
</asp:Content>

