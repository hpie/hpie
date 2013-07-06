<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc25.aspx.cs" Inherits="fc24" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <p>
          &nbsp;</p>
    <p>
          Rosin Sale Register<asp:DropDownList ID="month" runat="server" AutoPostBack="True" 
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
          <asp:DropDownList ID="yer" runat="server" AutoPostBack="True" 
              onselectedindexchanged="yer_SelectedIndexChanged">
          </asp:DropDownList>
        </p>
    <p>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" onrowcreated="GridView1_RowCreated" 
            onrowdatabound="GridView1_RowDataBound" style="font-size: small">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="1">
                    <ItemTemplate>
              <asp:Label ID="Label2" runat="server" ></asp:Label> <asp:Label ID="Label1" runat="server" Text="<%# Container.DataItem %>"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="2.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="3.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="3.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="4.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="4.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="5.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="5.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="6.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="6.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="7.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="7.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="8.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="8.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="9.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="9.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="10.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="10.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="11.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="11.2"></asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        </asp:GridView>
        <br />
    </p>
    <p>
        &nbsp;</p>
</asp:Content>

