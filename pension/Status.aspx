<%@ Page Language="C#" AutoEventWireup="true"  CodeFile="Status.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="_Default" %>

<%--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Untitled Page</title>
    <style type="text/css">
        .style1
        {
            width: 360px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 156px;
        }
        .style4
        {
            text-align: center;
            font-weight: bold;
        }
        .style5
        {
            width: 282px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <table cellpadding="0" cellspacing="0" class="style1" 
            style="font-family: Verdana; font-size: small">
            <tr>
                <td class="style4" colspan="2">
                    Gender Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Gender</td>
                <td class="style5">
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="Gender" DataValueField="ID" Width="129px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    <asp:Button ID="Button1" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button1_Click" Text="Save" Width="53px" />
                    <asp:Button ID="Button2" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button2_Click" Text="Update" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        DeleteCommand="DELETE FROM Gender WHERE (ID = @id)" 
                        InsertCommand="INSERT INTO Gender(Gender) VALUES (@Gender)" 
                        SelectCommand="SELECT * FROM [Gender]" 
                        UpdateCommand="UPDATE Gender SET Gender = @Gender WHERE (ID = @id)">
                        <DeleteParameters>
                            <asp:ControlParameter ControlID="ListBox1" Name="id" 
                                PropertyName="SelectedValue" />
                        </DeleteParameters>
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Gender" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="id" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Gender" PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>
</body>
</html>--%><asp:Content ID="Content1" runat="server" 
    contentplaceholderid="Content">
 <form id="form1" runat="server">
    <div>
    
        <table cellpadding="0" cellspacing="0" class="style1" 
            style="font-family: Verdana; font-size: small">
            <tr>
                <td class="style4" colspan="2">
                    Gender Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Gender</td>
                <td class="style5">
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="Gender" DataValueField="ID" Width="129px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    <asp:Button ID="Button1" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button1_Click" Text="Save" Width="53px" />
                    <asp:Button ID="Button2" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button2_Click" Text="Update" Visible="False" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        DeleteCommand="DELETE FROM Gender WHERE (ID = @id)" 
                        InsertCommand="INSERT INTO Gender(Gender) VALUES (@Gender)" 
                        SelectCommand="SELECT * FROM [Gender]" 
                        UpdateCommand="UPDATE Gender SET Gender = @Gender WHERE (ID = @id)">
                        <DeleteParameters>
                            <asp:ControlParameter ControlID="ListBox1" Name="id" 
                                PropertyName="SelectedValue" />
                        </DeleteParameters>
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Gender" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="id" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Gender" PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>

        </asp:Content>

