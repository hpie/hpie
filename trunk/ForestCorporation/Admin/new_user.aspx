<%@ Page Language="C#" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="true" CodeFile="new_user.aspx.cs" Inherits="new_user" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 730px;
        border: 1px solid #000000;
    }
    .style2
    {
        width: 187px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            User Name</td>
        <td>
            <asp:TextBox ID="TextBox1" runat="server" AutoPostBack="True" 
                ontextchanged="TextBox1_TextChanged"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                ControlToValidate="TextBox1" ErrorMessage="Not Empty" ValidationGroup="a">*</asp:RequiredFieldValidator>
            <asp:Label ID="Label1" runat="server"></asp:Label>
            <asp:Label ID="Label3" runat="server" Text="Label" Visible="False"></asp:Label>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Password</td>
        <td>
            <asp:TextBox ID="TextBox2" runat="server" TextMode="Password"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Role</td>
        <td>
            <asp:CheckBoxList ID="CheckBoxList1" runat="server" 
                DataSourceID="SqlDataSource1" DataTextField="Des" DataValueField="role">
            </asp:CheckBoxList>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [tbrole]"></asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource2" DataTextField="user_id" DataValueField="id" 
                onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="131px">
            </asp:ListBox>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                DeleteCommand="DELETE FROM tblogin WHERE (id = @id)" 
                InsertCommand="INSERT INTO tblogin(user_id, password, role) VALUES (@user_id, @password, @role)" 
                SelectCommand="SELECT * FROM [tblogin]" 
                UpdateCommand="UPDATE tblogin SET user_id =@user_id, password =@password, role =@role where id=@id">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </DeleteParameters>
                <UpdateParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="user_id" PropertyName="Text" />
                    <asp:Parameter Name="password" />
                    <asp:Parameter Name="role" />
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="user_id" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox2" Name="password" 
                        PropertyName="Text" />
                    <asp:Parameter Name="role" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [tblogin] WHERE ([id] = @id)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                Text="Save" ValidationGroup="a" />
            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                Text="New User" />
            <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                Text="Update" ValidationGroup="a" />
            <asp:Button ID="Button4" runat="server" Enabled="False" onclick="Button4_Click" 
                Text="Delete" ValidationGroup="a" />
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:Label ID="Label2" runat="server"></asp:Label>
        </td>
    </tr>
</table>
</asp:Content>

