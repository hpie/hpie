<%@ Page Language="C#" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="true" CodeFile="unit.aspx.cs" Inherits="Admin_unit" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 400px;
        }
        .style2
        {
        width: 152px;
        font-family: Verdana;
        font-size: medium;
    }
        .style3
        {
            text-align: center;
        font-family: Verdana;
        font-size: medium;
    }
    .style4
    {
        font-family: Verdana;
    }
    .style5
    {
        font-family: Verdana;
        font-size: medium;
    }
    .style6
    {
        font-size: medium;
    }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td class="style5">
                Store Detail</td>
        </tr>
        <tr>
            <td class="style2">
                Select Division</td>
            <td>
                <span class="style4"><span class="style6">
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="div" DataValueField="id">
                </asp:DropDownList>
                </span></span>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [tbdiv]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Unit</td>
            <td class="style5">
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="RequiredFieldValidator">Not Empty</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td class="style5">
                <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                    DataTextField="unit" DataValueField="id" Width="132px" AutoPostBack="True" 
                    onselectedindexchanged="ListBox1_SelectedIndexChanged"></asp:ListBox>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                <asp:Button ID="Button1" runat="server" Enabled="False" Text="Save" 
                    onclick="Button1_Click" />
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                    Text="New Record" />
                <asp:Button ID="Button3" runat="server" Enabled="False" Text="Update" 
                    onclick="Button3_Click" />
                <asp:Button ID="Button4" runat="server" Enabled="False" Text="Delete" 
                    onclick="Button4_Click" />
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    DeleteCommand="DELETE FROM tbunit WHERE (id = @id)" 
                    InsertCommand="INSERT INTO tbunit(div, unit) VALUES (@div, @unit)" 
                    SelectCommand="SELECT * FROM [tbunit]" 
                    UpdateCommand="UPDATE tbunit SET div =@div, unit =@unit where id=@id">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="div" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox1" Name="unit" PropertyName="Text" />
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="div" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox1" Name="unit" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [tbunit] WHERE ([id] = @id)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <span class="style5">
                <asp:Label ID="Label1" runat="server"></asp:Label>
                </span>
            </td>
        </tr>
    </table>
</asp:Content>

