<%@ Page Language="C#" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="true" CodeFile="Division.aspx.cs" Inherits="Admin_Division" Title="Untitled Page" %>

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
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td colspan="2">
                Division</td>
        </tr>
        <tr>
            <td>
                Name</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="RequiredFieldValidator">Not Empty</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                    DataTextField="div" DataValueField="id" Width="123px" AutoPostBack="True" 
                    onselectedindexchanged="ListBox1_SelectedIndexChanged"></asp:ListBox>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    DeleteCommand="DELETE FROM tbdiv WHERE (id = @id)" 
                    InsertCommand="INSERT INTO tbdiv(div) VALUES (@div)" 
                    SelectCommand="SELECT * FROM [tbdiv]" 
                    UpdateCommand="UPDATE tbdiv SET div =@div where id=@id">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="div" PropertyName="Text" />
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="div" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [tbdiv] WHERE ([id] = @id)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2" colspan="2">
                <asp:Button ID="Button1" runat="server" Text="Save" Width="50px" 
                    Enabled="False" onclick="Button1_Click" />
                <asp:Button ID="Button2" runat="server" Text="New Record" 
                    onclick="Button2_Click" />
                <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                    Text="Update" />
                <asp:Button ID="Button4" runat="server" Enabled="False" onclick="Button4_Click" 
                    Text="Delete" />
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:Label ID="Label1" runat="server"></asp:Label>
            </td>
        </tr>
    </table>
</asp:Content>

