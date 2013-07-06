<%@ Page Language="C#" AutoEventWireup="true" CodeFile="PA.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="PA" %>

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
            width: 191px;
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
                    PA Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    PA Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    PA Name2</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Address</td>
                <td>
                    <asp:TextBox ID="TextBox3" runat="server" Height="53px" TextMode="MultiLine" 
                        Width="125px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    POBOx</td>
                <td>
                    <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Pincode</td>
                <td>
                    <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Telephone No</td>
                <td>
                    <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Country</td>
                <td>
                    <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    City</td>
                <td>
                    <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Region</td>
                <td>
                    <asp:TextBox ID="TextBox9" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" Width="128px"></asp:ListBox>
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
                        InsertCommand="INSERT INTO PA(Name, Name2, Address, PO, Pin, Tel, Country,City, Region) VALUES (@Name, @Name2, @Address, @PO, @Pin, @Tel, @Country,@City, @Region)" 
                        SelectCommand="SELECT * FROM [PA]" 
                        UpdateCommand="UPDATE PA SET Name =@Name, Name2 =@Name2, Address =@Address, PO =@PO, Pin =@Pin, Tel =@Tel, Country =@Country, City=@City,Region =@Region where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Name" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Name2" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox3" Name="Address" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox4" Name="PO" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox5" Name="Pin" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox6" Name="Tel" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox7" Name="Country" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox8" Name="City" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox9" Name="Region" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Name" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Name2" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox3" Name="Address" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox4" Name="PO" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox5" Name="Pin" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox6" Name="Tel" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox7" Name="Country" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox8" Name="City" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox9" Name="Region" PropertyName="Text" />
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
                <td class="style4" colspan="2">
                    PA Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    PA Name</td>
                <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    PA Name2</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Address</td>
                <td>
                    <asp:TextBox ID="TextBox3" runat="server" Height="53px" TextMode="MultiLine" 
                        Width="125px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    POBOx</td>
                <td>
                    <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Pincode</td>
                <td>
                    <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Telephone No</td>
                <td>
                    <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Country</td>
                <td>
                    <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    City</td>
                <td>
                    <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Region</td>
                <td>
                    <asp:TextBox ID="TextBox9" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td>
                    <asp:ListBox ID="ListBox1" runat="server" Width="171px" 
                        DataSourceID="SqlDataSource1" DataTextField="name" DataValueField="ID"></asp:ListBox>
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
                        InsertCommand="INSERT INTO PA(ID,Name, Name2, Address, PO, Pin, Tel, Country,City, Region) VALUES (@ID,@Name, @Name2, @Address, @PO, @Pin, @Tel, @Country,@City, @Region)" 
                        SelectCommand="SELECT * FROM [PA]" 
                        
                        UpdateCommand="UPDATE PA SET Name =@Name, Name2 =@Name2, Address =@Address, PO =@PO, Pin =@Pin, Tel =@Tel, Country =@Country, City=@City,Region =@Region where ID=@ID">
                        <UpdateParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Name" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Name2" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox3" Name="Address" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox4" Name="PO" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox5" Name="Pin" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox6" Name="Tel" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox7" Name="Country" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox8" Name="City" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox9" Name="Region" PropertyName="Text" />
                            <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                                PropertyName="SelectedValue" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Name" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox2" Name="Name2" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox3" Name="Address" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox4" Name="PO" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox5" Name="Pin" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox6" Name="Tel" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox7" Name="Country" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox8" Name="City" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox9" Name="Region" PropertyName="Text" />
                            <asp:Parameter Name="ID" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    
    </div>
    </form>
        </asp:Content>

