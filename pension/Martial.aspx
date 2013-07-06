<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Martial.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Martial" %>

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
            width: 132px;
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
                    Martial Status Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Martial Status</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="Status" DataValueField="Code" Width="128px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button1_Click" Text="Save" Width="50px" />
                    <asp:Button ID="Button2" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button2_Click" Text="Update" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO status(Status) VALUES (@Status)" 
                        SelectCommand="SELECT * FROM [status]" 
                        UpdateCommand="UPDATE status SET Status = @Status WHERE (ID = @ID)">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Status" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Status" PropertyName="Text" />
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
                    Martial Status Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Martial Status</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="Status" DataValueField="ID" Width="128px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button1_Click" Text="Save" Width="50px" />
                    <asp:Button ID="Button2" runat="server" BorderStyle="Solid" BorderWidth="1px" 
                        onclick="Button2_Click" Text="Update" Visible="False" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO status(Status) VALUES (@Status)" 
                        SelectCommand="SELECT * FROM [status]" 
                        UpdateCommand="UPDATE status SET Status = @Status WHERE (ID = @ID)">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Status" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Status" PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>

        </asp:Content>
