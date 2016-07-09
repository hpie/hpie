<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="recalculate.aspx.cs" Inherits="div" Title="Untitled Page" %>

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
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style11" colspan="2">
                <b>Recalculate Interest and Payments</b><asp:ScriptManager ID="ScriptManager1" 
                    runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style28">
                AC Number</td>
            <td class="style8">
                <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style24">
                Employee Name</td>
            <td class="style25">
                <asp:Label ID="Label1" runat="server" Text=""></asp:Label>
            </td>
        </tr>

        <tr>
            <td class="style24">
                Session</td>
            <td class="style25">
            <asp:DropDownList ID="DropDownList2" runat="server">
            </asp:DropDownList>
            </td>
        </tr>
         <tr>
            <td class="style24">
                &nbsp;</td>
            <td class="style25">
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Recalculate" />
            </td>
        </tr>
        <tr>
            <td class="style12" colspan="2">
                <asp:Label ID="Label2" runat="server" ForeColor="#CC3300"></asp:Label>
            </td>
        </tr>

    </table>

</asp:Content>

