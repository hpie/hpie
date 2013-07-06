<%@ Page Language="C#" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="true" CodeFile="items.aspx.cs" Inherits="Admin_items" Title="Untitled Page" %>

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
        text-align: center;
        font-weight: bold;
        font-family: Verdana;
    }
    .style3
    {
        width: 115px;
        font-family: Verdana;
    }
    .style5
    {
        text-align: center;
    }
    .style6
    {
        font-family: Verdana;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
    <tr>
        <td class="style2" colspan="2">
            Store Items</td>
    </tr>
    <tr>
        <td class="style3">
            Items</td>
        <td class="style6">
            <asp:TextBox ID="TextBox20" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td class="style6">
            <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource1" DataTextField="Name" DataValueField="ID" 
                onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="128px">
            </asp:ListBox>
        </td>
    </tr>
    <tr>
        <td class="style5" colspan="2">
            <span class="style6">
            <asp:Button ID="Button2" runat="server" Enabled="False" onclick="Button2_Click" 
                Text="Save" />
            <asp:Button ID="Button3" runat="server" onclick="Button3_Click" 
                Text="New Record" Width="106px" />
            <asp:Button ID="Button4" runat="server" Enabled="False" onclick="Button4_Click" 
                Text="Update" />
            </span>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                InsertCommand="INSERT INTO tbitems(Name) VALUES (@Name)" 
                ProviderName="<%$ ConnectionStrings:ForestConnectionString.ProviderName %>" 
                SelectCommand="SELECT * FROM tbitems" 
                UpdateCommand="UPDATE tbitems SET Name = @Name WHERE (ID = @ID)">
                <UpdateParameters>
                    <asp:ControlParameter ControlID="TextBox20" Name="Name" PropertyName="Text" />
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox20" Name="Name" PropertyName="Text" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                ProviderName="<%$ ConnectionStrings:ForestConnectionString.ProviderName %>" 
                SelectCommand="SELECT ID, Name FROM tbitems WHERE (ID = @ID)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
</table>
</asp:Content>

