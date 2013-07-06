<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Title.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Title" %>

<%--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Untitled Page</title>
    <style type="text/css">
        .style1
        {
            width: 500px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 213px;
        }
        .style4
        {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <table cellpadding="0" cellspacing="0" class="style1">
            <tr>
                <td class="style4" colspan="2">
                    Title Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Title</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Long Text</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Gender
                </td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource1" DataTextField="Gender" DataValueField="ID" 
                        Width="130px">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" Width="129px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" 
                        Width="52px" />
                    <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Update" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [Gender]"></asp:SqlDataSource>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO Title(FOA, Title, GenderCod) VALUES (@FOA, @Title, @GenderCod)" 
                        SelectCommand="SELECT * FROM [Title]" 
                        UpdateCommand="UPDATE Title SET FOA = @FOA, Title = @Title, GenderCod = @GenderCod WHERE (ID = @ID)">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="FOA" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Title" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList1" Name="GenderCod" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="FOA" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Title" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList1" Name="GenderCod" 
                                PropertyName="SelectedValue" />
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
                    Title Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Title Code</td>
                <td>
                    <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Title</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Long Text</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Gender
                </td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource1" DataTextField="Gender" DataValueField="ID" 
                        Width="130px">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" Width="129px" 
                        DataSourceID="SqlDataSource2" DataTextField="Title" DataValueField="ID"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" 
                        Width="52px" />
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
                        SelectCommand="SELECT * FROM [Gender]"></asp:SqlDataSource>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO Title(FOA, Title, Text,GenderCod) VALUES (@FOA, @Title,@Text, @GenderCod)" 
                        SelectCommand="SELECT * FROM [Title]" 
                        
                        UpdateCommand="UPDATE Title SET FOA = @FOA, Title = @Title, GenderCod = @GenderCod,Text=@Text WHERE (ID = @ID)">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox3" Name="FOA" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox1" Name="Title" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList1" Name="GenderCod" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Text" PropertyName="Text" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox3" Name="FOA" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox1" Name="Title" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList1" Name="GenderCod" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Text" PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>

        </asp:Content>
