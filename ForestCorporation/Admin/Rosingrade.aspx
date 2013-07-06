<%@ Page Language="C#" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="true" CodeFile="Rosingrade.aspx.cs" Inherits="Admin_Rosingrade" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 400px;
    }
    .style2
    {
    }
    .style4
    {
        height: 19px;
        text-align: center;
    }
    .style5
    {
        height: 35px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
    <tr>
        <td colspan="2" style="text-align: center">
            Rosin Grade</td>
    </tr>
    <tr>
        <td class="style5">
            Grade</td>
        <td class="style5">
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                ErrorMessage="RequiredFieldValidator" ControlToValidate="TextBox1" 
                ValidationGroup="a">Not Empty</asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource1" DataTextField="name" DataValueField="id" 
                onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="152px" 
                style="height: 70px">
            </asp:ListBox>
        </td>
    </tr>
    <tr>
        <td class="style4" colspan="2">
            <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                Text="Save" Width="53px" ValidationGroup="a" />
            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                Text="New Record" />
            <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                Text="Update" Width="53px" ValidationGroup="a" />
            <asp:Button ID="Button4" runat="server" Enabled="False" onclick="Button4_Click" 
                Text="Delete" />
        </td>
    </tr>
    <tr>
        <td class="style2" colspan="2">
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                DeleteCommand="DELETE FROM catgory WHERE (id = @id)" 
                InsertCommand="INSERT INTO catgory(name) VALUES (@name)" 
                SelectCommand="SELECT * FROM [catgory]" 
                UpdateCommand="UPDATE catgory SET name = @name WHERE (id = @id)">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </DeleteParameters>
                <UpdateParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="name" PropertyName="Text" />
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="name" PropertyName="Text" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:Label ID="Label1" runat="server"></asp:Label>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [catgory] where id=@id">
                <SelectParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2" colspan="2">
            &nbsp;</td>
    </tr>
</table>
</asp:Content>

