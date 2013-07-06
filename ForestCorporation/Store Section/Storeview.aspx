<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="Storeview.aspx.cs" Inherits="Storeview" Title="Untitled Page" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 400px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            background-color: #CBDCED;
        }
        .style3
        {
            width: 122px;
            background-color: #CBDCED;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <p>
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        <table class="style1">
            <tr>
                <td class="style3">
                    &nbsp;</td>
                <td class="style2">
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style3">
                    Start Date</td>
                <td class="style2">
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                  <ajaxToolkit:MaskedEditExtender ID="MaskedEditExtender1" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox4">
            </ajaxToolkit:MaskedEditExtender>
            <ajaxToolkit:CalendarExtender ID="CalendarExtender1" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox4">
            </ajaxToolkit:CalendarExtender>
            
                </td>
            </tr>
            <tr>
                <td class="style3">
                    End Date</td>
                <td class="style2">
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                  <ajaxToolkit:MaskedEditExtender ID="TextBox5_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox5">
            </ajaxToolkit:MaskedEditExtender>
            <ajaxToolkit:CalendarExtender ID="TextBox5_CalendarExtender" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox5">
            </ajaxToolkit:CalendarExtender>
            
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Items</td>
                <td class="style2">
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource2" DataTextField="name" DataValueField="name">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                        SelectCommand="SELECT * FROM [tbitems]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    &nbsp;</td>
                <td class="style2">
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
                    <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">View All</asp:LinkButton>
                </td>
            </tr>
        </table>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" 
            onrowdatabound="GridView1_RowDataBound" 
            onselectedindexchanged="GridView1_SelectedIndexChanged">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="Sr.No">
                <ItemTemplate>
                <%#r %>
                </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Date" SortExpression="Date">
                  <%--  <EditItemTemplate>
                        <asp:TextBox ID="TextBox1" runat="server" 
                             Text='<%# Container.DataItem %>'></asp:TextBox>
                             <ajaxToolkit:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
            </ajaxToolkit:MaskedEditExtender>
          <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
            </ajaxToolkit:CalendarExtender>
                    </EditItemTemplate>--%>
                    <ItemTemplate>
                        <asp:Label ID="Label1" runat="server" 
                           Text='<%# Container.DataItem %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:BoundField HeaderText="PartyName" />
                <asp:BoundField HeaderText="Items" />
                <asp:BoundField  HeaderText="BillNo" 
                     />
                <asp:TemplateField HeaderText="BillDate">
                 <%--   <EditItemTemplate>
                        <asp:TextBox ID="TextBox2" runat="server" 
                            Text='<%# Eval("billdate", " {0:d/MM/yyyy}") %>'></asp:TextBox>
                             <ajaxToolkit:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
            </ajaxToolkit:MaskedEditExtender>
          <ajaxToolkit:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
            </ajaxToolkit:CalendarExtender>
                    </EditItemTemplate>--%>
                    <ItemTemplate>
                       <%-- <asp:Label ID="Label2" runat="server" 
                            Text='<%# Eval("billdate", " {0:d/MM/yyyy}") %>'></asp:Label>--%>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:BoundField HeaderText="Reptno" />
                <asp:BoundField HeaderText="Qty" />
                <asp:BoundField HeaderText="Rate" />
                <asp:BoundField HeaderText="ReqSlipno" />
                <asp:BoundField HeaderText="IssueQty" />
                <asp:BoundField HeaderText="IssueRate" />
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        </asp:GridView>
        <br />
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
            
            SelectCommand="SELECT date,sum(Qty) as Qty,sum(rate) as Rate FROM [store] group by date"></asp:SqlDataSource>
    </p>
</asp:Content>

