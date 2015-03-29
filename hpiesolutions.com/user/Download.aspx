<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="Download.aspx.cs" Inherits="user_Download" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 651px;
    }
    .style2
    {
        width: 285px;
    }
    .style3
    {
        }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Download Items</div>
    <table class="style1">
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    
  
    <tr>
        <td class="style3" colspan="3">
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                DataSourceID="SqlDataSource1" 
                onselectedindexchanging="GridView1_SelectedIndexChanging" Width="662px" 
                CellPadding="5" style="text-align: left">
                <Columns>
                    <asp:BoundField DataField="des" HeaderText="Description" SortExpression="des" />
                    <asp:TemplateField HeaderText="Download" SortExpression="file_name">
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("file_name") %>'></asp:TextBox>
                        </EditItemTemplate>
                        <ItemTemplate>
                            <asp:ImageButton ID="ImageButton1" runat="server" CommandName="select" 
                                Height="33px" ImageUrl="~/images/download-icon.gif" Width="39px" />
                            &nbsp;<asp:Label ID="l1" runat="server" Text='<%# Eval("con_type") %>' 
                                Visible="False"></asp:Label>
                            <asp:Label ID="l2" runat="server" Text='<%# Eval("file_name") %>' 
                                Visible="False"></asp:Label>
                            <asp:Label ID="l3" runat="server" Text='<%# Eval("file_loc") %>' 
                                Visible="False"></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                </Columns>
                <HeaderStyle HorizontalAlign="Left" />
            </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [other_files]"></asp:SqlDataSource>
        </td>
    </tr>
</table>
</asp:Content>

