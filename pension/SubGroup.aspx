<%@ Page Language="C#" AutoEventWireup="true" CodeFile="SubGroup.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="SubGroup" %>

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
            width: 171px;
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
                    Group Name</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource1" DataTextField="Group_name" DataValueField="ID">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Sub Group Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Sub Group Code</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource2" 
                        DataTextField="Group_Des" DataValueField="ID" Width="128px"></asp:ListBox>
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
                        SelectCommand="SELECT * FROM [Group]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO SubGroup(Groupcode, Sub_Group, Group_des) VALUES (@Groupcode, @Sub_Group, @Group_des)" 
                        ProviderName="<%$ ConnectionStrings:pension.ProviderName %>" 
                        SelectCommand="SELECT * FROM SubGroup" 
                        UpdateCommand="UPDATE SubGroup SET Groupcode =@Groupcode, Sub_Group =@Sub_Group, Group_des =@Group_des where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="Groupcode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Sub_Group" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_des" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="Groupcode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Sub_Group" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_des" 
                                PropertyName="Text" />
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
    
        <table cellpadding="0" cellspacing="0" class="style1">
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style2">
                    Group Name</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource1" DataTextField="Group_name" DataValueField="ID">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Sub Group Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Sub Group Code</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource2" 
                        DataTextField="Group_Des" DataValueField="ID" Width="158px"></asp:ListBox>
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
                        SelectCommand="SELECT * FROM [Group]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO SubGroup(Groupcode, Sub_Group, Group_des) VALUES (@Groupcode, @Sub_Group, @Group_des)" 
                        ProviderName="<%$ ConnectionStrings:pension.ProviderName %>" 
                        SelectCommand="SELECT * FROM SubGroup" 
                        UpdateCommand="UPDATE SubGroup SET Groupcode =@Groupcode, Sub_Group =@Sub_Group, Group_des =@Group_des where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="Groupcode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Sub_Group" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_des" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="DropDownList1" Name="Groupcode" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Sub_Group" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox1" Name="Group_des" 
                                PropertyName="Text" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>
</asp:Content>

