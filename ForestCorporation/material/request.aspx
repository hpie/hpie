<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="request.aspx.cs" Inherits="fc05" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 288px;
        }
        .style6
        {
            background-color: #0066FF;
            height: 16px;
            color: #FFFFFF;
        }
        .style7
        {
            width: 246px;
            margin-left: 40px;
        }
        .style9
        {
            height: 75px;
            width: 288px;
        }
        .style10
        {
            width: 246px;
            height: 75px;
        }
        .style11
        {
            width: 288px;
            height: 22px;
        }
        .style12
        {
            width: 246px;
            height: 22px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content3" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">

        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" 
        style="font-family: Verdana; font-size: small" DataKeyNames="preno" 
    onselectedindexchanged="GridView1_SelectedIndexChanged">
        <RowStyle ForeColor="#000066" />
        <Columns>
            <asp:TemplateField HeaderText="Date" SortExpression="Date">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("Date") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server" Text='<%#dt(Convert.ToDateTime( Eval("Date"))) %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            
            <asp:BoundField DataField="Particular" HeaderText="Particular" 
                SortExpression="Particular" />
            <asp:BoundField DataField="section" HeaderText="section" 
                SortExpression="section" />
            <asp:BoundField DataField="Des" HeaderText="Destination" SortExpression="Des" />
            <asp:BoundField DataField="Material" HeaderText="Material Required" 
                SortExpression="Material" />
            <asp:BoundField DataField="Qty" HeaderText="Qty" SortExpression="Qty" />
            <asp:BoundField DataField="Pur" HeaderText="Purpose" SortExpression="Pur" />
            <asp:BoundField DataField="Reqslipno" HeaderText="Req.Slip no" 
                SortExpression="Reqslipno" />
            <asp:BoundField DataField="stype" HeaderText="Type" SortExpression="stype" />
            <asp:BoundField DataField="notin" HeaderText="No." SortExpression="notin" />
            <asp:BoundField DataField="netsakki" HeaderText="Net Wt. With Sakki" 
                SortExpression="netsakki" />
            <asp:BoundField DataField="rem" HeaderText="Remarks" SortExpression="rem" />
            <asp:CommandField SelectText="Request" ShowSelectButton="True" />
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
        <table>
            <tr>
               
                <td valign="top">  
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc05] where section=@des">
        <SelectParameters>
            <asp:Parameter Name="des" />
        </SelectParameters>
                    </asp:SqlDataSource>
        
                </td>
            </tr>
        </table>
  
    

</asp:Content>


