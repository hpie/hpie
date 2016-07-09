<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="empdetail.aspx.cs" Inherits="empdetail" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 500px;
            border: 1px solid #000000;
        }
        .style2
        {
            width: 176px;
            font-family: Verdana;
            font-size: small;
        }
        .style5
        {
            font-family: Verdana;
        }
        .style6
        {
            font-family: Verdana;
            font-size: small;
        }
        .style7
        {
            font-size: small;
        }
        .style24
    {
        height: 120px;
    }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table cellpadding="0" cellspacing="0" style="width: 938px; height: 430px">
        <tr>
            <td colspan="2" style="text-align: center">
                <b>Employee Detail</b></td>
        </tr>
        <tr>
            <td>
                AC</td>
            <td >
                <asp:TextBox ID="TextBox1" runat="server" ValidationGroup="a"></asp:TextBox>
                <asp:Button ID="Button5" runat="server" onclick="Button5_Click" Text="Search" 
                    ValidationGroup="a" />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="RequiredFieldValidator" 
                    ValidationGroup="a">Enter Ac Number</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td>
                Name</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td>
                Department</td>
            <td>
                <span class="style5"><span class="style7">
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="Dept" DataValueField="Dept" 
                    Width="123px">
                </asp:DropDownList>
                </span></span>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [tbdept]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                Designation</td>
            <td>
                <span class="style5"><span class="style7">
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="Des" DataValueField="Des" 
                    Width="124px">
                </asp:DropDownList>
                </span></span>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [tbdes]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                Session</td>
            <td>
                <asp:DropDownList ID="DropDownList3" runat="server">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td>
                CPF
                OB Amount</td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                Share OB Amount</td>
            <td>
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td>
                Interest OB Amount</td>
            <td>
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            </td>
        </tr>
 <!-- Sunil added New-->       
        <tr>
            <td>
                 Board Share Interest OB</td>
            <td>
                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
            </td>
        </tr>
        


        <tr>
            <td class="style24">
                </td>
            <td class="style24">
                <asp:ListBox ID="ListBox1" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="ac" DataValueField="AC" 
                    onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="128px">
                </asp:ListBox>
                <br />
                <asp:Label ID="Label1" runat="server" ForeColor="Red"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                </td>
            <td>
                <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                    Text="Save" Width="61px" />
                <asp:Button ID="Button2" runat="server" Enabled="False" onclick="Button2_Click" 
                    Text="Update" Width="61px" />
                <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                    Text="Delete" Width="61px" Visible="False" />
                <asp:Button ID="Button4" runat="server" onclick="Button4_Click" 
                    Text="New Record" Width="88px" />
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    DeleteCommand="DELETE FROM Employee WHERE (ID = @ID)" 
                    InsertCommand="INSERT INTO Employee(AC, Name, OB, Dept, Des, Session,Share_ob,Ins_ob,Board_share_interest_OB) VALUES (@AC, @Name, @OB, @Dept, @Des, @Session,@Share_ob,@Ins_ob,@Brd_share_ins_ob)" 
                    SelectCommand="SELECT * FROM [Employee] order by ID" 
                    
                    
                    
                    UpdateCommand="UPDATE Employee SET Name = @Name, OB = @OB, Dept = @Dept, Des = @Des, Session = @Session,Share_ob=@Shared_ob,Ins_ob=@Ins_ob, Board_share_interest_OB= @Brd_share_ins_ob WHERE (AC = @AC)">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                            PropertyName="SelectedValue" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="AC" PropertyName="Text" 
                            DefaultValue="" />
                        <asp:ControlParameter ControlID="TextBox2" Name="Name" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="OB" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="DropDownList1" Name="Dept" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="Des" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="Session" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Shared_ob" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:ControlParameter ControlID="TextBox5" Name="Ins_ob" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="TextBox6" DefaultValue="0" Name="Brd_share_ins_ob" 
                            PropertyName="Text" />
                        
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="AC" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="Name" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="OB" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="DropDownList1" Name="Dept" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="Des" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="Session" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox4" DefaultValue="0" Name="Share_ob" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" DefaultValue="0" Name="Ins_ob" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" DefaultValue="0" Name="Brd_share_ins_ob" 
                            PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [Employee] WHERE ([AC] = @AC)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="AC" 
                            PropertyName="Text" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        </table>
</asp:Content>

