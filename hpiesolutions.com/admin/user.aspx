<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="user.aspx.cs" Inherits="admin_user" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 909px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">User Details</div>

<br />
<table class="style1">
    <tr>
        <td>
            &nbsp;</td>
        <td>
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td colspan="3">
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                DataSourceID="SqlDataSource1" DataKeyNames="center_code_main" 
                onrowupdating="GridView1_RowUpdating" Width="869px">
                <Columns>
                    <asp:BoundField DataField="name" HeaderText="Center Name" 
                        SortExpression="name" ReadOnly="True" />
                    <asp:BoundField DataField="distt" HeaderText="Distt" SortExpression="dist" 
                        ReadOnly="True" />
                    <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" 
                        ReadOnly="True" />
                    <asp:BoundField DataField="un" HeaderText="User Name" SortExpression="up" 
                        ReadOnly="True" />
                    <asp:TemplateField HeaderText="Password" SortExpression="un">
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Bind("up") %>'></asp:Label>
                        </ItemTemplate>
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("up") %>'></asp:TextBox>
                        </EditItemTemplate>
                    </asp:TemplateField>
                    <asp:CommandField ShowEditButton="True" />
                </Columns>
            </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                SelectCommand="SELECT dbo.tb1.code, dbo.tb1.email, dbo.tb1.name, dbo.tb1.website, dbo.tb1.address, dbo.tb1.ph, dbo.tb1.country, dbo.tb1.state, dbo.tb1.pcode, dbo.tb1.center_code, dbo.tb1.pass, dbo.tb1.center_code_main, dbo.tb1.role, dbo.tb1.std_code, dbo.login.up, dbo.login.un, dbo.distt.distt, dbo.city.city FROM dbo.tb1 INNER JOIN dbo.login ON dbo.tb1.center_code_main = dbo.login.center_code_main INNER JOIN dbo.distt ON dbo.tb1.dist = dbo.distt.code INNER JOIN dbo.city ON dbo.tb1.city = dbo.city.code" 
                UpdateCommand="UPDATE login SET up =@up where center_code_main =@center_code_main">
                <UpdateParameters>
                    <asp:Parameter Name="up" />
                    <asp:ControlParameter ControlID="GridView1" Name="center_code_main" 
                        PropertyName="SelectedDataKey" />
                </UpdateParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
</table>
</asp:Content>

