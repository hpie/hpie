<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc14.aspx.cs" Inherits="fc14" Title="Untitled Page" %>

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
            color: #FFFFFF;
            background-color: #003366;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style2">
                Search</td>
            <td class="style2">
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Select Grade</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="name" DataValueField="name">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [tbitems]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                Select Date</td>
            <td>
          <asp:DropDownList ID="month" runat="server" 
              onselectedindexchanged="month_SelectedIndexChanged">
              <asp:ListItem Value="1">Jan</asp:ListItem>
              <asp:ListItem Value="2">Feb</asp:ListItem>
              <asp:ListItem Value="3">March</asp:ListItem>
              <asp:ListItem Value="4">April</asp:ListItem>
              <asp:ListItem Value="5">May</asp:ListItem>
              <asp:ListItem Value="6">June</asp:ListItem>
              <asp:ListItem Value="7">July</asp:ListItem>
              <asp:ListItem Value="8">Aug</asp:ListItem>
              <asp:ListItem Value="9">Sep</asp:ListItem>
              <asp:ListItem Value="10">Oct</asp:ListItem>
              <asp:ListItem Value="11">Nov</asp:ListItem>
              <asp:ListItem Value="12">Dec</asp:ListItem>
          </asp:DropDownList>
          <asp:DropDownList ID="yer" runat="server" 
              onselectedindexchanged="yer_SelectedIndexChanged">
          </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
            </td>
        </tr>
    </table>
        <br />
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        onrowdatabound="GridView1_RowDataBound" style="font-size: small" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" onrowcreated="GridView1_RowCreated">
        <RowStyle ForeColor="#000066" />
    <Columns>
        <asp:TemplateField HeaderText="1">
            <ItemTemplate>
                <asp:Label ID="Label27" runat="server" Text="<%# Container.DataItem %>"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="2">
            <ItemTemplate>
                <asp:Label ID="Label28" runat="server" Text=""></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="3">
            <ItemTemplate>
                <asp:Label ID="Label29" runat="server" Text=""></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="4">
            <ItemTemplate>
                <asp:Label ID="Label30" runat="server" Text=""></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="5">
            <ItemTemplate>
                <asp:Label ID="Label31" runat="server" Text=""></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="6.1">
            <ItemTemplate>
                <asp:Label ID="Label32" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="6.2">
            <ItemTemplate>
                <asp:Label ID="Label33" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="6.3">
            <ItemTemplate>
                <asp:Label ID="Label34" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="7.1">
            <ItemTemplate>
                <asp:Label ID="Label35" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="7.2">
            <ItemTemplate>
                <asp:Label ID="Label36" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="7.3">
            <ItemTemplate>
                <asp:Label ID="Label37" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="8.1">
            <ItemTemplate>
                <asp:Label ID="Label38" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="8.2">
            <ItemTemplate>
                <asp:Label ID="Label39" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="8.3">
            <ItemTemplate>
                <asp:Label ID="Label40" runat="server" Text="0"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
        <asp:TemplateField HeaderText="9">
            <ItemTemplate>
                <asp:Label ID="Label41" runat="server"></asp:Label>
            </ItemTemplate>
        </asp:TemplateField>
    </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
</asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc14]"></asp:SqlDataSource>
</asp:Content>

