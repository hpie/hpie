<%@ Page Language="C#" AutoEventWireup="true" CodeFile="PSA.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="PSA" %>

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
            width: 164px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <table cellpadding="0" cellspacing="0" class="style1">
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style2">
                    PA Name</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource2" DataTextField="Name" DataValueField="ID">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    PSA Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource2" 
                        DataTextField="PSAName" DataValueField="ID" Width="126px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" Text="Save" />
                    <asp:Button ID="Button2" runat="server" Text="Update" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [PSA]"></asp:SqlDataSource>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO PSA(PACode, PSAName) VALUES (@PACode, @PSAName)" 
                        SelectCommand="SELECT * FROM [PA]" 
                        UpdateCommand="UPDATE PSA SET PACode =@PACode, PSAName =@PSAName where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="PACode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox1" Name="PSAName" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="PACode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox1" Name="PSAName" PropertyName="Text" />
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
   <table cellpadding="0" cellspacing="0" class="style1">
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style2">
                    PA Name</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource2" DataTextField="Name" DataValueField="ID">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    PSA Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="PSAname" DataValueField="ID" Width="126px"></asp:ListBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" Text="Save" onclick="Button1_Click" />
                    <asp:Button ID="Button2" runat="server" Text="Update" onclick="Button2_Click" 
                        Visible="False" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [PSA]" 
                        InsertCommand="INSERT INTO PSA(PACode, PSAName) VALUES (@PACode, @PSAName)" 
                        UpdateCommand="UPDATE PSA SET PACode =@PACode, PSAName =@PSAName where id=@id">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="PACode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox1" Name="PSAName" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="id" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="PACode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox1" Name="PSAName" PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO PSA(ID,PACode, PSAName) VALUES (@ID,@PACode, @PSAName)" 
                        SelectCommand="SELECT * FROM [PA]" 
                        
                        UpdateCommand="UPDATE PSA SET PACode =@PACode, PSAName =@PSAName where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="PACode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox1" Name="PSAName" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="PACode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox1" Name="PSAName" PropertyName="Text" />
                            <asp:Parameter Name="ID" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
        </form>
</asp:Content>

