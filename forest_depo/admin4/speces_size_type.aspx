<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="speces_size_type.aspx.cs" Inherits="speces_size_type" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 100%;
    }
    .style2
    {
        width: 190px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <br />
<table class="style1" style="text-align: left">
    <tr>
        <td class="style2">
            Select Kind</td>
        <td>
            <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource_spec" DataTextField="kind" DataValueField="kind" 
                onselectedindexchanged="DropDownList1_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource_spec" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                SelectCommand="SELECT * FROM [kind]"></asp:SqlDataSource>
        </td>
        <td rowspan="12">
            <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource_list" 
                DataTextField="size_type" DataValueField="code" Height="336px" Width="188px">
            </asp:ListBox>
            <asp:SqlDataSource ID="SqlDataSource_list" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                SelectCommand="SELECT * FROM [spec_size_type] where spec=@spec order by size_type">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="spec" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Select Size&nbsp; Type</td>
        <td>
            <asp:DropDownList ID="DropDownList2" runat="server" 
                DataSourceID="SqlDataSource_size_type" DataTextField="size_type" 
                DataValueField="size_type">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource_size_type" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                DeleteCommand="DELETE FROM spec_size_type where code=@code" 
                InsertCommand="INSERT INTO spec_size_type(spec, size_type) VALUES (@spec, @size_type)" 
                SelectCommand="SELECT * FROM [size_type]">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="code" 
                        PropertyName="SelectedValue" />
                </DeleteParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="spec" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="size_type" 
                        PropertyName="SelectedValue" />
                </InsertParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Add</asp:LinkButton>
&nbsp;|
            <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Delete</asp:LinkButton>
            <asp:SqlDataSource ID="SqlDataSource_chk" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                InsertCommand="INSERT INTO spec_size_type(spec, size_type) VALUES (@spec, @size_type)" 
                SelectCommand="SELECT * FROM [spec_size_type] where spec=@spec and size_type=@size_type">
                <InsertParameters>
                    <asp:Parameter Name="spec" />
                    <asp:Parameter Name="size_type" />
                </InsertParameters>
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="spec" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="size_type" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:Label ID="Label1" runat="server" ForeColor="#CC3300"></asp:Label>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
</table>
</asp:Content>

