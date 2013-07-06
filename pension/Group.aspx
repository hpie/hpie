<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Group.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Group" %>

<%--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Untitled Page</title>
    <style type="text/css">
        .style1
        {
            width: 400px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 148px;
        }
        .style4
        {
            text-align: center;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <table cellpadding="0" cellspacing="0" class="style1">
            <tr>
                <td class="style4" colspan="2">
                    Group Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Group Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="Group_name" DataValueField="ID" Width="129px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" />
                    <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Update" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO [Group] (Group_name) VALUES (@Group_name)" 
                        SelectCommand="SELECT * FROM [Group]" 
                        UpdateCommand="UPDATE [Group] SET Group_name =@Group_name where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_name" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_name" 
                                PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>
</body>
</html>
--%><asp:Content ID="Content1" runat="server" contentplaceholderid="Content">

    <form id="form1" runat="server">
    <div>
    
        <table cellpadding="0" cellspacing="0" class="style1">
            <tr>
                <td class="style4" colspan="2">
                    Group Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Group Code</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Group Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="Group_name" DataValueField="ID" Width="129px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" />
                    <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Update" 
                        Visible="False" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO [Group] (ID,Group_name) VALUES (@ID,@Group_name)" 
                        SelectCommand="SELECT * FROM [Group]" 
                        UpdateCommand="UPDATE [Group] SET Group_name =@Group_name where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_name" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_name" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox2" Name="ID" PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>
        </asp:Content>
