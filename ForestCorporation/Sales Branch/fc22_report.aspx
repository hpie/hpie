<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc22_report.aspx.cs" Inherits="fc221" Title="Untitled Page" %>
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
            width: 396px;
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
     .style9
     {
         height: 169px;
     }
     .style10
     {
         width: 396px;
     }
     .style11
     {
         height: 36px;
         width: 396px;
     }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
 <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td colspan="2" style="text-align: center">
                <b>CASH MEMO</b></td>
        </tr>
        <tr>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style10">
                Pre Numbered.:
                <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Dated:<asp:Label ID="TextBox1" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style6">
                No.<asp:Label ID="TextBox2" runat="server" 
                    ></asp:Label>
            </td>
            <td class="style7">
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                M/S<asp:Label ID="TextBox3" runat="server" Width="580px"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style9" colspan="2">
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    onrowcommand="GridView2_RowCommand" 
                    onrowdatabound="GridView2_RowDataBound" Height="89px" Width="818px">
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
                                <asp:DropDownList ID="DropDownList4" runat="server">
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
                    DeleteCommand="DELETE FROM fc20 WHERE (Code = @code)" 
                    
                    
                    
                    UpdateCommand="UPDATE fc22 SET des =@des, qty =@qty, rate =@rate, amt =@amt where code=@code">
                    <SelectParameters>
                        <asp:QueryStringParameter Name="prno" QueryStringField="ch" />
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
            <td class="style11">
                </td>
            <td class="style8">
                Total:<asp:Label ID="Label7" runat="server" Text="0"></asp:Label>
                <br />
                Ex.Duty:<asp:Label ID="Label8" runat="server" Text="0"></asp:Label>
                <br />
                G.S.T:<asp:Label ID="Label9" runat="server" Text="0"></asp:Label>
                <br />
                C.S.T:<asp:Label ID="Label10" runat="server" Text="0"></asp:Label>
                <br />
                G.Total:<asp:Label ID="Label11" runat="server" Text="0"></asp:Label>
                <br />
            </td>
        </tr>
        <tr>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style10">
                Prepared by&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                Cashier/Office manager<br />
                Sales Assistant</td>
            <td valign="top">
                Factory Manager/General Manager</td>
        </tr>
        <tr>
            <td class="style10">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

