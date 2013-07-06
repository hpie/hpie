<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc22.aspx.cs" Inherits="fc221" Title="Untitled Page" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
 <style type="text/css">
        .style4
        {
            width: 815px;
            border: 1px solid #000000;
        }
        .style5
        {
        }
        .style6
        {
            width: 338px;
            height: 18px;
        }
        .style7
        {
            height: 18px;
        }
        .style8
        {
            height: 36px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
 <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td colspan="2">
                CASH MEMO<asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style5">
                Pre-Number:<asp:DropDownList ID="DropDownList5" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="Prno" DataValueField="Prno">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    
                    SelectCommand="SELECT prno FROM [fc22] where des!='ss' group by prno ORDER BY [Prno]">
                </asp:SqlDataSource>
                <asp:Button ID="Button3" runat="server"  Text="Search" 
                    onclick="Button3_Click" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                Pre No.:
                <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Date:<asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
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
            <td class="style6">
                No.<asp:TextBox ID="TextBox2" runat="server" 
                    ></asp:TextBox>
            </td>
            <td class="style7">
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                M/S<asp:TextBox ID="TextBox3" runat="server" Width="580px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    onrowcommand="GridView2_RowCommand" onrowdatabound="GridView2_RowDataBound" 
                    ShowFooter="True" DataKeyNames="code" 
                    onrowdeleting="GridView2_RowDeleting">
                 <Columns>
                        <asp:TemplateField HeaderText="S.No.">
                            <ItemTemplate>
                                <asp:Label ID="Label2" Text="<%#sr1 %>" runat="server" ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Description of goods">
                            <EditItemTemplate>
                                <asp:DropDownList ID="DropDownList2" runat="server">
                                    <asp:ListItem>X</asp:ListItem>
                                    <asp:ListItem>WW</asp:ListItem>
                                    <asp:ListItem>WG</asp:ListItem>
                                    <asp:ListItem>N</asp:ListItem>
                                    <asp:ListItem>M</asp:ListItem>
                                    <asp:ListItem>K</asp:ListItem>
                                    <asp:ListItem>H</asp:ListItem>
                                    <asp:ListItem>D</asp:ListItem>
                                    <asp:ListItem>B</asp:ListItem>
                                </asp:DropDownList>
                            </EditItemTemplate>
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList4" runat="server" 
                                    DataSourceID="SqlDataSource1" DataTextField="name" DataValueField="name">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                    SelectCommand="SELECT * FROM [catgory]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("des") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Qty">
                            <EditItemTemplate>
                                <asp:TextBox ID="TextBox9" runat="server" Text='<%# Eval("qty") %>'></asp:TextBox>
                            </EditItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("qty") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Rate">
                            <EditItemTemplate>
                                <asp:TextBox ID="TextBox10" runat="server" Text='<%# Eval("rate") %>'></asp:TextBox>
                            </EditItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label5" runat="server" Text='<%# Eval("rate") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Amount">
                            <ItemTemplate>
                                <asp:Label ID="Label6" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
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
                <br />
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT        *
FROM            fc22
WHERE        (Des = 'ss') OR
                         (prno= @prno)" 
                    
                    InsertCommand="INSERT INTO fc22(Prno, no, dt, ms, des, qty, rate, amt) VALUES (@Prno, @no, @dt, @ms, @des, @qty, @rate, @amt)" 
                    DeleteCommand="DELETE FROM fc22 WHERE (Code = @code)" 
                    
                    
                    
                    
                    UpdateCommand="UPDATE fc22 SET des =@des, qty =@qty, rate =@rate, amt =@amt where code=@code">
                    <SelectParameters>
                        <asp:Parameter Name="prno" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="code" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="des" />
                        <asp:Parameter Name="qty" />
                        <asp:Parameter Name="rate" />
                        <asp:Parameter Name="amt" />
                        <asp:Parameter Name="code" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:Parameter Name="Prno" />
                        <asp:Parameter Name="dt" />
                        <asp:Parameter Name="ms" />
                        <asp:Parameter Name="des" />
                        <asp:Parameter Name="qty" />
                        <asp:Parameter Name="rate" />
                        <asp:Parameter Name="amt" />
                        <asp:Parameter Name="no" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT prno FROM [fc22] ORDER BY [prno]">
                </asp:SqlDataSource>
                <br />
            </td>
        </tr>
        <tr>
            <td class="style8">
                </td>
            <td class="style8">
                Total:<asp:Label ID="Label7" runat="server" Text="0"></asp:Label>
                <br />
            </td>
        </tr>
        <tr>
            <td class="style5">
                <asp:Button ID="Button2" runat="server" Text="Print" onclick="Button2_Click" />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

