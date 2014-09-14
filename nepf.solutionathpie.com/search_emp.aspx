<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="search_emp.aspx.cs" Inherits="search_emp" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
            width: 474px;
        }
        .style3
        {
        }
        .style4
        {
            width: 270px;
            height: 48px;
        }
        .style5
        {
            height: 34px;
        }
        .style6
        {
            height: 38px;
        }
        .style7
        {
            height: 48px;
        }
    .style8
    {
        height: 50px;
    }
    </style>
</asp:Content>




<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table class="style1">
        <tr>
            <td class="style3" colspan="2">
                <asp:Menu ID="Menu1" runat="server" BackColor="#E3EAEB" 
                    DynamicHorizontalOffset="2" Font-Names="Verdana" Font-Size="0.8em" 
                    ForeColor="#666666" Orientation="Horizontal" StaticSubMenuIndent="10px">
                    <StaticSelectedStyle BackColor="#1C5E55" />
                    <StaticMenuItemStyle HorizontalPadding="5px" VerticalPadding="2px" />
                    <DynamicHoverStyle BackColor="#666666" ForeColor="White" />
                    <DynamicMenuStyle BackColor="#E3EAEB" />
                    <DynamicSelectedStyle BackColor="#1C5E55" />
                    <DynamicMenuItemStyle HorizontalPadding="5px" VerticalPadding="2px" />
                    <StaticHoverStyle BackColor="#666666" ForeColor="White" />
                    <Items>
                        <asp:MenuItem NavigateUrl="~/upload.aspx" Text="Upload Excel File" 
                            Value="Upload Excel File"></asp:MenuItem>
                        <asp:MenuItem NavigateUrl="~/index.aspx" Text="Annual CPF Report" 
                            Value="Annual CPF Report"></asp:MenuItem>
                        <asp:MenuItem NavigateUrl="~/detail.aspx" Text="Month Wise Annual Report" 
                            Value="Month Wise Annual Report"></asp:MenuItem>
                        <asp:MenuItem NavigateUrl="~/cpf_detail.aspx" Text="Withdrewals Amount" 
                            Value="Withdrewals Amount"></asp:MenuItem>
                        <asp:MenuItem Text="Employee Detail" Value="Employee Detail">
                            <asp:MenuItem NavigateUrl="~/dept.aspx" Text="Department" Value="Department">
                            </asp:MenuItem>
                            <asp:MenuItem NavigateUrl="~/des.aspx" Text="Designation" Value="Designation">
                            </asp:MenuItem>
                        </asp:MenuItem>
                        <asp:MenuItem NavigateUrl="~/empdetail.aspx" Text="CPF Advance/Adjustments" 
                            Value="CPF Advance/Adjustments"></asp:MenuItem>
                        <asp:MenuItem NavigateUrl="~/view.aspx" Text="SUBSCRIBER’S ANNUAL ACCOUNT" 
                            Value="SUBSCRIBER’S ANNUAL ACCOUNT"></asp:MenuItem>
                    </Items>
                </asp:Menu>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style8">
                Search Employee</td>
            <td class="style8">
                </td>
            <td class="style8">
                </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                Enter Employee Name&nbsp;&nbsp;
            </td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server" Width="174px"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style4">
            </td>
            <td class="style7">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            </td>
            <td class="style7">
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataSourceID="SqlDataSource1" 
                    style="font-family: Verdana; font-size: x-small">
                    <RowStyle ForeColor="#000066" />
                    <Columns>
                        <asp:BoundField DataField="AC" HeaderText="AC" SortExpression="AC" />
                        <asp:BoundField DataField="Name" HeaderText="Name" SortExpression="Name" />
                        <asp:BoundField DataField="OB" HeaderText="OB" SortExpression="OB" />
                        <asp:BoundField DataField="Dept" HeaderText="Dept" SortExpression="Dept" />
                    </Columns>
                    <FooterStyle BackColor="White" ForeColor="#000066" />
                    <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                    <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                    <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [Employee] where Name=@name">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="name" PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        &nbsp;</p>
</asp:Content>

