<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="fc13.aspx.cs" Inherits="fc13"  %>

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
            width: 354px;
        }
        .style11
        {
            width: 453px;
            height: 83px;
        }
        .style15
        {
            width: 453px;
            }
        .style20
        {
            font-size: small;
            text-align: center;
        }
        .style21
        {
            width: 215px;
        }
        .style22
        {
            width: 215px;
            height: 83px;
        }
        .style27
        {
            width: 354px;
            height: 26px;
            font-size: small;
        }
        .style28
        {
            font-size: x-small;
        }
        .style29
        {
            width: 354px;
            height: 83px;
            font-size: x-small;
        }
        .style31
        {
            width: 215px;
            font-size: x-small;
        }
        .style32
        {
            width: 354px;
            height: 30px;
            font-size: x-small;
        }
        .style33
        {
            width: 354px;
            height: 26px;
            font-size: x-small;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
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
            <td class="style32">
                Factory Order
            No:-<br />
                        </td>
            <td class="style32">
                <asp:TextBox ID="TextBox1" runat="server" ReadOnly="True"></asp:TextBox>
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="fac_ord_no" 
                    DataValueField="fac_ord_no">
                </asp:DropDownList>
                <asp:Button ID="Button3" runat="server" onclick="Button3_Click" 
                    style="font-size: xx-small" Text="Search" Width="42px" Visible="False" />
                <asp:Button ID="Button5" runat="server" onclick="Button5_Click" 
                    style="font-size: xx-small" Text="Print" />
            </td>
            <td class="style31" rowspan="2" valign="top">
                Priority No.<br />
                <br />
                Your Order No.<br />
                <br />
                </td>
            <td class="style15" rowspan="2" valign="top">
                <span class="style28">
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                <br />
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                <br />
                </span>
                <cc1:MaskedEditExtender ID="TextBox4_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    TargetControlID="TextBox4" MaskType="Date" Mask="99/99/9999">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox4_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox4">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style33">
                Date</td>
            <td class="style27">
                <span class="style28">
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                </span>
            </td>
        </tr>
        <tr>
            <td class="style29">
        M/s</td>
            <td class="style29">
                <asp:TextBox ID="TextBox5" runat="server" Height="78px" TextMode="MultiLine" 
                    Width="295px"></asp:TextBox>
            </td>
            <td class="style22">
                <span class="style28"></td>
            <td class="style11">
                </span></td>
        </tr>
        <tr>
            <td class="style20" colspan="4">
                        &nbsp;</td>
        </tr>
        <tr>
            <td class="style20">
                Destination</td>
            <td class="style20">
                <asp:TextBox ID="TextBox19" runat="server"></asp:TextBox>
            </td>
            <td class="style21">
                Consignee</td>
            <td class="style5">
                <asp:TextBox ID="TextBox20" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style20" colspan="4">
                        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                            onrowdatabound="GridView1_RowDataBound" ShowFooter="True" 
                    DataKeyNames="code" DataSourceID="SqlDataSource1" CssClass="style28" 
                            onrowcommand="GridView1_RowCommand" onrowdeleting="GridView1_RowDeleting">
                            <Columns>
                                <asp:TemplateField HeaderText="Description of produce">
                                    <EditItemTemplate>
                                        <asp:TextBox ID="TextBox13" runat="server" Text='<%# Eval("des") %>'></asp:TextBox>
                                    </EditItemTemplate>
                                    <FooterTemplate>
                                        <asp:DropDownList ID="DropDownList3" runat="server" 
                                            DataSourceID="SqlDataSource1" DataTextField="name" DataValueField="name">
                                        </asp:DropDownList>
                                        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                            SelectCommand="SELECT * FROM [catgory]"></asp:SqlDataSource>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="Label4" runat="server" Text='<%# Eval("pro_size") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Quantity">
                                    <FooterTemplate>
                                        <asp:TextBox ID="TextBox18" runat="server" Width="57px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="Label9" runat="server" Text='<%# Eval("qty") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Qtl">
                                    <FooterTemplate>
                                        <asp:TextBox ID="TextBox22" runat="server" Width="56px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="Label10" runat="server" Text='<%# Eval("wtqtl") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Kg">
                                    <FooterTemplate>
                                        <asp:TextBox ID="TextBox23" runat="server" Width="56px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="Label11" runat="server" Text='<%# Eval("wtkg") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Rate">
                                    <EditItemTemplate>
                                        <asp:TextBox ID="TextBox15" runat="server" Text='<%# Eval("rate") %>' 
                                            Width="56px"></asp:TextBox>
                                    </EditItemTemplate>
                                    <FooterTemplate>
                                        <asp:TextBox ID="TextBox21" runat="server" Width="56px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="Label8" runat="server" Text='<%# Eval("rate") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Remarks">
                                    <EditItemTemplate>
                                        <asp:TextBox ID="TextBox16" runat="server" Text='<%# Eval("remark") %>'></asp:TextBox>
                                    </EditItemTemplate>
                                    <FooterTemplate>
                                        <asp:TextBox ID="TextBox12" runat="server"></asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="Label7" runat="server" Text='<%# Eval("remark") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField ShowHeader="False">
                                    <FooterTemplate>
                                        <asp:Button ID="Button4" runat="server" CommandName="Add" Text="Add" />
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="False" 
                                            CommandName="Delete" Text="Delete"></asp:LinkButton>
                                    </ItemTemplate>
                                </asp:TemplateField>
                            </Columns>
                        </asp:GridView>
                </td>
        </tr>
        <tr>
            <td class="style7">
            &nbsp;</td>
            <td class="style7">
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT  fac_ord_no FROM [fc13] where pro_size!='ss'  group by fac_ord_no  ORDER BY [fac_ord_no]">
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    ProviderName="<%$ ConnectionStrings:ForestConnectionString.ProviderName %>" 
                    SelectCommand="SELECT * FROM fc13 where fac_ord_no=@fac_ord_no" 
                    InsertCommand="INSERT INTO fc13(fac_ord_no, pri_no, your_o_no, dt, ms,desti,consi) VALUES (@fac_ord_no, @pri_no, @your_o_no, @dt, @ms,@desti,@consi)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList4" Name="fac_ord_no" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="fac_ord_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="pri_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="your_o_no" 
                            PropertyName="Text" />
                        <asp:Parameter Name="dt" />
                        <asp:ControlParameter ControlID="TextBox5" Name="ms" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox19" Name="desti" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="consi" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
            <td class="style21">
                &nbsp;</td>
            <td class="style5">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    
                    InsertCommand="INSERT INTO fc13(fac_ord_no, pri_no, your_o_no, dt, ms, pro_size, qty,wtqtl,wtkg, rate, remark, desti, consi) VALUES (@fac_ord_no, @pri_no, @your_o_no, @dt, @ms, @pro_size, @qty,@wtqtl,@wtkg, @rate, @remark, @desti, @consi)" 
                    DeleteCommand="DELETE FROM fc13 WHERE (code = @code)">
                    <DeleteParameters>
                        <asp:Parameter Name="code" />
                    </DeleteParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="fac_ord_no" 
                            PropertyName="Text" Type="String" />
                        <asp:ControlParameter ControlID="TextBox2" Name="pri_no" PropertyName="Text" 
                            Type="String" />
                        <asp:ControlParameter ControlID="TextBox3" Name="your_o_no" 
                            PropertyName="Text" Type="String" />
                        <asp:Parameter Name="dt" />
                        <asp:ControlParameter ControlID="TextBox5" Name="ms" PropertyName="Text" />
                        <asp:Parameter Name="pro_size" />
                        <asp:Parameter Name="qty" />
                        <asp:Parameter Name="rate" />
                        <asp:Parameter Name="remark" />
                        <asp:ControlParameter ControlID="TextBox19" Name="desti" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="consi" PropertyName="Text" />
                        <asp:Parameter Name="wtqtl" />
                        <asp:Parameter Name="wtkg" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
</asp:Content>

