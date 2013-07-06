<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc20.aspx.cs" Inherits="fc20_report" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 745px;
            border: 1px solid #000000;
        }
        .style5
        {
            height: 18px;
        }
        .style6
        {
            height: 18px;
            width: 556px;
        }
        .style7
        {
        }
        .style8
        {
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
&nbsp;<table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style6">
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="fac_ord_no" 
                    DataValueField="fac_ord_no" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="93px">
                </asp:DropDownList>
                <asp:Button ID="Button3" runat="server" onclick="Button3_Click" 
                    style="font-size: x-small" Text="Search" />
                <asp:DropDownList ID="DropDownList3" runat="server" 
                    DataSourceID="SqlDataSource5" DataTextField="Challanno" DataValueField="F_o_no">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc20] ORDER BY [Challanno]">
                </asp:SqlDataSource>
                <asp:Button ID="Button4" runat="server" Height="21px" onclick="Button4_Click" 
                    Text="Print" />
            </td>
            <td class="style5">
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Reg. Sr.No.:
                <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Date<asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox1">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Name of the party</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server" Height="89px" TextMode="MultiLine" 
                    Width="220px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Factory order no.<asp:Label ID="Label23" runat="server" Text="Label"></asp:Label>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc13] WHERE ([fac_ord_no] = @fac_ord_no)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="fac_ord_no" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    
                    SelectCommand="SELECT fac_ord_no FROM fc13 where pro_size!='ss' group by fac_ord_no "></asp:SqlDataSource>
            </td>
            <td>
                Date<asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox4_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox4">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox4_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox4">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style8">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style7" colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False"  
                    EmptyDataText="there is no data for this request" onrowdatabound="GridView1_RowDataBound" 
                    onrowcommand="GridView1_RowCommand" DataKeyNames="code" 
                    onrowdeleting="GridView1_RowDeleting" onrowediting="GridView1_RowEditing" 
                    onrowupdating="GridView1_RowUpdating">
                    <Columns>
                        <asp:TemplateField HeaderText="Sr.No">
                       <ItemTemplate>
                       <asp:Label ID="sr" Text="<%#sr %>" runat="server"></asp:Label>
                       </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Description of goods">
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label2" runat="server" Text='<%# Eval("pro_size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="TPB/PGI" SortExpression="type">
                            <EditItemTemplate>
                                <asp:DropDownList ID="DropDownList4" runat="server">
                                    <asp:ListItem>TPB</asp:ListItem>
                                    <asp:ListItem>PGI</asp:ListItem>
                                </asp:DropDownList>
                            </EditItemTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label1" runat="server" Text='<%# Bind("type") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No">
                            <EditItemTemplate>
                                <asp:TextBox ID="TextBox10" runat="server" Text='<%# Eval("qty") %>'></asp:TextBox>
                            </EditItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("qty") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Qtl./Litre">
                            <EditItemTemplate>
                                <asp:TextBox ID="TextBox7" runat="server" Text='<%# Eval("wtqtl") %>'></asp:TextBox>
                            </EditItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox7"  runat="server"></asp:TextBox>
                            </FooterTemplate>
                            <HeaderTemplate>
                                Qtl./Litre
                            </HeaderTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label22" runat="server" Text='<%# Eval("wtqtl") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Kg.">
                            <EditItemTemplate>
                                <asp:TextBox ID="TextBox12" runat="server" Text='<%# Eval("wtkg") %>'></asp:TextBox>
                            </EditItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label5" runat="server" Text='<%# Eval("wtkg") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                       
                          
                        <asp:CommandField ShowEditButton="True" />
                       
                          
                    </Columns>
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT       *
FROM            fc13
WHERE       
                         (fac_ord_no = @fac_ord_no)" 
                    
                    InsertCommand="INSERT INTO fc20( F_o_no, dt, Challanno) VALUES ( @F_o_no, @dt, @Challanno)" 
                    DeleteCommand="DELETE FROM fc20 WHERE (Code = @code)" 
                    
                    
                    UpdateCommand="UPDATE fc20 SET Description =@Description, No =@No, Qtl_lit =@Qtl_lit, Kg =@Kg where code =@code">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="fac_ord_no" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="code" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="Description" />
                        <asp:Parameter Name="No" />
                        <asp:Parameter Name="Qtl_lit" />
                        <asp:Parameter Name="Kg" />
                        <asp:Parameter Name="code" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label23" Name="F_o_no" PropertyName="Text" />
                        <asp:Parameter Name="Description" />
                        <asp:ControlParameter ControlID="Label1" Name="Challanno" PropertyName="Text" />
                        <asp:Parameter Name="dt" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT challanno FROM [fc20] ORDER BY [Challanno]">
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style8" colspan="2">
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                    style="margin-top: 0px" Text="Save" Width="68px" />
                <cc1:ConfirmButtonExtender ID="Button2_ConfirmButtonExtender" runat="server" 
                    ConfirmText="Print Document" Enabled="True" TargetControlID="Button2">
                </cc1:ConfirmButtonExtender>
            </td>
        </tr>
        <tr>
            <td class="style8">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

