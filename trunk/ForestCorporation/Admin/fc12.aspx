<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc12.aspx.cs" Inherits="fc12" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

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
    {            text-align: center;
            color: #FFFFFF;
            background-color: #0066CC;
        }
        .style7
        {
        }
        .style8
        {
            width: 354px;
            height: 39px;
            font-size: small;
        }
        .style9
        {
            width: 453px;
            height: 39px;
        }
        .style10
        {
            width: 354px;
            height: 83px;
            font-size: small;
        }
        .style11
        {
            width: 453px;
            height: 83px;
        }
        .style12
        {
            width: 354px;
            height: 37px;
            font-size: small;
        }
        .style13
        {
            width: 453px;
            height: 37px;
        }
        .style14
        {
            width: 354px;
            height: 30px;
            font-size: small;
        }
        .style15
        {
            width: 453px;
            height: 30px;
        }
        .style16
        {
            width: 354px;
            height: 41px;
            font-size: small;
        }
        .style17
        {
            width: 453px;
            height: 41px;
        }
        .style18
        {
            width: 354px;
            height: 43px;
            font-size: small;
        }
        .style19
        {
            width: 453px;
            height: 43px;
        }
        .style20
        {
            width: 354px;
            font-size: small;
        }
        .style28
        {
            font-size: x-small;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td class="style6" colspan="2">
            MATERIAL TRANSFER NOTE<asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
        </td>
    </tr>
    <tr>
        <td class="style14">
            No</td>
        <td class="style15">
            <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            <asp:DropDownList ID="DropDownList1" runat="server" 
                DataSourceID="SqlDataSource2" DataTextField="no_pre" 
                DataValueField="no_pre">
            </asp:DropDownList>
            <asp:Button ID="Button5" runat="server" onclick="Button5_Click" Text="Delete" />
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT no_pre  FROM [fc12] group by no_pre" 
                DeleteCommand="delete FROM [fc12] where no_pre=@no_pre">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="no_pre" 
                        PropertyName="SelectedValue" />
                </DeleteParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style12">
            Date</td>
        <td class="style13">
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
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
        <td class="style7" colspan="2">
                        <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                            ShowFooter="True" CssClass="style28" 
                            
                CellPadding="4" ForeColor="#333333" 
                GridLines="None" onrowcommand="GridView2_RowCommand" Width="746px" 
                            onrowdatabound="GridView2_RowDataBound" 
                            onrowdeleting="GridView2_RowDeleting">
                            <RowStyle BackColor="#F7F6F3" ForeColor="#333333" />
                            <Columns>
                                <asp:TemplateField HeaderText="Description of produce">
                                    <EditItemTemplate>
                                        <asp:TextBox ID="TextBox13" runat="server" Text='<%# Eval("des") %>'></asp:TextBox>
                                    </EditItemTemplate>
                                    <FooterTemplate>
                                        <asp:DropDownList ID="des1" runat="server" 
                                            DataSourceID="SqlDataSource3" DataTextField="name" DataValueField="name">
                                        </asp:DropDownList>
                                        <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                            SelectCommand="SELECT * FROM [catgory]"></asp:SqlDataSource>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="des" runat="server" Text='<%# Eval("des") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="No of Packings">
                                    <FooterTemplate>
                                        <asp:TextBox ID="no" runat="server" Width="57px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="no1" runat="server" Text='<%# Eval("no") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Packing Size(Qtls)(TPB)">
                                    <FooterTemplate>
                                        <asp:TextBox ID="wtqtl" runat="server" Width="56px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="wtqtl1" runat="server" Text='<%# Eval("wtqtl") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                                                <asp:TemplateField HeaderText="Weight">
                                    <FooterTemplate>
                                        <asp:TextBox ID="wtkg" runat="server" Width="56px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="wtkg1" runat="server" Text='<%# Eval("wtkg") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Packing Size(Qtls)(PGI)">
                                    <FooterTemplate>
                                        <asp:TextBox ID="TextBox17" runat="server" Width="59px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="Label5" runat="server" Text='<%# Eval("wtqtl1") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Weight">
                                    <FooterTemplate>
                                        <asp:TextBox ID="wtkg1" runat="server" Width="56px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="wtkg11" runat="server" Text='<%# Eval("wt1") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Batch No.">
                                
                                 <FooterTemplate>
                                        <asp:TextBox ID="batch" runat="server" Width="56px">0</asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="batch1" runat="server" Text='<%# Eval("batch") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Remarks">
                                    <EditItemTemplate>
                                        <asp:TextBox ID="TextBox16" runat="server" Text='<%# Eval("remark") %>'></asp:TextBox>
                                    </EditItemTemplate>
                                    <FooterTemplate>
                                        <asp:TextBox ID="remark" runat="server"></asp:TextBox>
                                    </FooterTemplate>
                                    <ItemTemplate>
                                        <asp:Label ID="remark1" runat="server" Text='<%# Eval("remark") %>'></asp:Label>
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
                            <FooterStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
                            <PagerStyle BackColor="#284775" ForeColor="White" HorizontalAlign="Center" />
                            <SelectedRowStyle BackColor="#E2DED6" Font-Bold="True" ForeColor="#333333" />
                            <HeaderStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
                            <EditRowStyle BackColor="#999999" />
                            <AlternatingRowStyle BackColor="White" ForeColor="#284775" />
                        </asp:GridView>
        </td>
    </tr>
    <tr>
        <td class="style7">
            &nbsp;</td>
        <td class="style5">
            <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
                Text="Save Record" />
            <cc1:ConfirmButtonExtender ID="Button1_ConfirmButtonExtender" runat="server" 
                ConfirmText="You want to save record" Enabled="True" TargetControlID="Button1">
            </cc1:ConfirmButtonExtender>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                InsertCommand="INSERT INTO fc12(des, no_pack, pack_size, wt, batch_no, remark, no_pre, dt,no_pack1,wt1) VALUES (@des, @no_pack, @pack_size, @wt, @batch_no, @remark, @no_pre, @dt,@no_pack1,@wt1)" 
                SelectCommand="SELECT * FROM [fc12] order by cade">
                <InsertParameters>
                    <asp:Parameter Name="des" />
                    <asp:Parameter Name="no_pack" />
                    <asp:Parameter Name="pack_size" />
                    <asp:Parameter Name="wt" />
                    <asp:Parameter Name="batch_no" />
                    <asp:Parameter Name="remark" />
                    <asp:Parameter Name="dt" />
                    <asp:ControlParameter ControlID="Label1" Name="no_pre" PropertyName="Text" />
                    <asp:Parameter Name="no_pack1" />
                    <asp:Parameter Name="wt1" />
                </InsertParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
</table>
</asp:Content>

