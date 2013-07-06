<%@ Page Language="C#" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="true" CodeFile="store.aspx.cs" Inherits="Admin_store" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 400px;
    }
    .style2
    {
        text-align: center;
    }
    .style3
    {
        width: 106px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style3">
            Store</td>
        <td>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                ControlToValidate="TextBox1" ErrorMessage="RequiredFieldValidator" 
                ValidationGroup="a">Not Empty</asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td>
            <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource1" DataTextField="Store" DataValueField="ID" 
                onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="127px">
            </asp:ListBox>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                DeleteCommand="DELETE FROM Storename WHERE (ID = @id)" 
                InsertCommand="INSERT INTO Storename(Store) VALUES (@Store)" 
                SelectCommand="SELECT * FROM [Storename]" 
                UpdateCommand="UPDATE Storename SET Store =@Store where id=@id">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </DeleteParameters>
                <UpdateParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="Store" PropertyName="Text" />
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="Store" PropertyName="Text" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [Storename] WHERE ([ID] = @ID)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2" colspan="2">
            <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                Text="Save" ValidationGroup="a" />
            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                Text="New Record" />
            <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                Text="Update" ValidationGroup="a" />
            <asp:Button ID="Button4" runat="server" Enabled="False" onclick="Button4_Click" 
                Text="Delete" ValidationGroup="a" />
        </td>
    </tr>
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td>
            <asp:Label ID="Label1" runat="server"></asp:Label>
        </td>
    </tr>
</table>
</asp:Content>

