<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="div.aspx.cs" Inherits="div" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
    {
        width: 582px;
        border: 1px solid #000000;
    }
    .style2
    {
        width: 338px;
    }
    .style3
    {
        width: 160px;
    }
    .style5
    {
        text-align: center;
    }
</style>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td>
            <b>Division Detail</b></td>
    </tr>
    <tr>
        <td class="style3">
            Division</td>
        <td>
            <asp:TextBox ID="TextBox1" runat="server" Width="193px"></asp:TextBox>
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
                DataSourceID="SqlDataSource1" DataTextField="Div" DataValueField="ID" 
                onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="133px">
            </asp:ListBox>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:himuda %>" 
                InsertCommand="INSERT INTO tbdiv(Div) VALUES (@div)" 
                SelectCommand="SELECT * FROM [tbdiv]" 
                UpdateCommand="UPDATE tbdiv SET Div = @Div WHERE (ID = @id)">
                <UpdateParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="Div" PropertyName="Text" />
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="div" PropertyName="Text" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:himuda %>" 
                SelectCommand="SELECT * FROM [tbdiv] WHERE ([ID] = @ID)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style5" colspan="2">
            <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                Text="Save" ValidationGroup="a" Width="42px" />
            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                Text="New Record" />
            <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                Text="Update" ValidationGroup="a" />
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

