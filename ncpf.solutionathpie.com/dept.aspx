<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="dept.aspx.cs" Inherits="des" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 500px;
        border: 1px solid #000000;
    }
    .style4
    {
        width: 118px;
        font-family: Verdana;
        font-size: small;
    }
    .style6
    {
        text-align: center;
        color: #FFFFFF;
        font-family: Verdana;
        font-size: small;
        font-weight: bold;
        height: 22px;
      
    }
    .style7
    {
        font-family: Verdana;
    }
    .style9
    {
        font-size: x-small;
    }
    .style10
    {
        font-family: Verdana;
        font-size: small;
    }
    .style11
    {
        font-size: small;
    }
    .style12
    {
        width: 118px;
        font-family: Verdana;
        font-size: small;
        color: #000000;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table cellpadding="0" cellspacing="0">
    <tr>
        <td class="style6" colspan="2">
            Department Detail<asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
                        </td>
    </tr>
    <tr>
        <td class="style12">
            Department</td>
        <td class="style10">
            <asp:TextBox ID="TextBox1" runat="server" ValidationGroup="a"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                ControlToValidate="TextBox1" ErrorMessage="Not Empty" ValidationGroup="a">*</asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style4">
            &nbsp;</td>
        <td>
            <span class="style7"><span class="style9"><span class="style11">
            <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource1" DataTextField="Dept" DataValueField="ID" 
                onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="123px">
            </asp:ListBox>
            </span></span></span>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:himuda %>" 
                DeleteCommand="DELETE FROM tbdept WHERE (ID = @ID)" 
                InsertCommand="INSERT INTO tbdept(Dept) VALUES (@dept)" 
                SelectCommand="SELECT * FROM [tbdept]" 
                UpdateCommand="UPDATE tbdept SET dept= @dept WHERE (ID = @ID)">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" />
                </DeleteParameters>
                <UpdateParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="dept" PropertyName="Text" />
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="dept" PropertyName="Text" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:himuda %>" 
                SelectCommand="SELECT * FROM [tbdept] WHERE ([ID] = @ID)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style4">
            &nbsp;</td>
        <td class="style10">
            <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                Text="Save" ValidationGroup="a" Width="65px" />
            <cc1:ConfirmButtonExtender ID="Button1_ConfirmButtonExtender" runat="server" 
                ConfirmText="Want To Save Record" Enabled="True" TargetControlID="Button1">
            </cc1:ConfirmButtonExtender>
            <asp:Button ID="Button2" runat="server" Enabled="False" onclick="Button2_Click" 
                Text="Update" ValidationGroup="a" Width="65px" />
            <cc1:ConfirmButtonExtender ID="Button2_ConfirmButtonExtender" runat="server" 
                ConfirmText="Want To Update Record" Enabled="True" TargetControlID="Button2">
            </cc1:ConfirmButtonExtender>
            <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                Text="Delete" ValidationGroup="a" Width="65px" />
            <cc1:ConfirmButtonExtender ID="Button3_ConfirmButtonExtender" runat="server" 
                ConfirmText="Want To Delete Record" Enabled="True" TargetControlID="Button3">
            </cc1:ConfirmButtonExtender>
            <asp:Button ID="Button4" runat="server" onclick="Button4_Click" 
                Text="New Record" Width="86px" />
            <cc1:ConfirmButtonExtender ID="Button4_ConfirmButtonExtender" runat="server" 
                ConfirmText="Want to Enter New Record" Enabled="True" 
                TargetControlID="Button4">
            </cc1:ConfirmButtonExtender>
        </td>
    </tr>
    <tr>
        <td class="style4">
            &nbsp;</td>
        <td class="style10">
            <asp:ValidationSummary ID="ValidationSummary1" runat="server" 
                ShowMessageBox="True" ShowSummary="False" />
        </td>
    </tr>
    <tr>
        <td class="style4">
            &nbsp;</td>
        <td class="style10">
            &nbsp;</td>
    </tr>
</table>
</asp:Content>

