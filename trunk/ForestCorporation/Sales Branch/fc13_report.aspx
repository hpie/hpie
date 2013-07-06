<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc13_report.aspx.cs" Inherits="fc13_report" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
    {
        width: 941px;
        border: 1px solid #000000;
    }
    .style6
    {
            text-align: center;
            color: #FFFFFF;
            background-color: #0066CC;
            height: 107px;
        }
        .style10
        {
            height: 92px;
            font-size: 9pt;
        }
        .style31
        {
            height: 256px;
            font-size: 9pt;
            text-align: center;
        }
        .style40
        {
            height: 44px;
            font-size: x-small;
            }
        .style43
        {
            font-size: 15pt;
        }
        .style44
        {
            font-size: x-small;
        }
        .style45
        {
            font-size: x-small;
            height: 11px;
        }
        .style46
        {
            font-size: x-small;
            height: 6px;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
      <input type="button" ID="btnPrint" value="Print"  Runat="Server" onClick="javascript:CallPrint('divPrint');" />
      <div id="divPrint">
    <table cellpadding="0" cellspacing="0" class="style4" 
              style="border: 1px solid #000000">
        <tr>
            <td class="style6" colspan="2" align="center">
               
                   <span class="style43">FACTORY ORDER<br />
                   <br />
                   </span>&nbsp;<asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                </td>
        </tr>
        <tr>
            <td class="style45" valign="top">
                Factory Order
            No:-
                <asp:Label ID="Label5" runat="server" Text="Label"></asp:Label>
                <br />
                </td>
            <td class="style44" rowspan="2" valign="top">
                Priority No.:-
                <asp:Label ID="Label6" runat="server" Text="Label"></asp:Label>
                <br />
                <br />
                Your Order No.:-
                <asp:Label ID="Label7" runat="server" Text="Label"></asp:Label>
                <br />
                <br />
                &nbsp;<br />
                <br />
                <br />
                <br />
                
                </td>
        </tr>
        <tr>
            <td class="style46">
                Date:-<asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
                </td>
        </tr>
        <tr>
            <td class="style10" colspan="2">
                <span class="style44">M/s-&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
                </span>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO fc13(fac_ord_no, pri_no, your_o_no, dt, ms, pro_size, qty, rate, remark, desti, consi) VALUES (@fac_ord_no, @pri_no, @your_o_no, @dt, @ms, @pro_size, @qty, @rate, @remark, @desti, @consi)" 
                    SelectCommand="SELECT * FROM [fc13] where fac_ord_no=@ord">
                    <SelectParameters>
                        <asp:QueryStringParameter DefaultValue="" Name="ord" QueryStringField="ord" />
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
        <tr>
            <td class="style31" colspan="2" valign="top">
                <asp:GridView ID="GridView1" runat="server" 
                    DataSourceID="SqlDataSource1" AutoGenerateColumns="False" Width="690px" 
                    CssClass="style44">
                    <Columns>
                        <asp:TemplateField HeaderText="Products&lt;br&gt;(with packing size)">
                            <ItemTemplate>
                                <asp:Label ID="Label1" runat="server" Text='<%# Eval("pro_size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:BoundField DataField="type" HeaderText="TPB/PGI" SortExpression="type" />
                        <asp:TemplateField HeaderText="Quantity">
                            <ItemTemplate>
                                <asp:Label ID="Label2" runat="server" Text='<%# Eval("qty") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Qtl">
                            <ItemTemplate>
                                <asp:Label ID="Label12" runat="server" Text='<%# Eval("wtqtl") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Kg">
                            <ItemTemplate>
                                <asp:Label ID="Label13" runat="server" Text='<%# Eval("wtkg") %>'></asp:Label>
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
                </asp:GridView>
            </td>
        </tr>
        <tr>
            <td class="style40">
                Destination:-
                <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style40">
                Consignee:- 
                <asp:Label ID="Label11" runat="server" Text="Label"></asp:Label>
                </span>
            </td>
        </tr>
        </table>
    </div>
</asp:Content>

