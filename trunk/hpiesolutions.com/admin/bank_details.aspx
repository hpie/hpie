<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="bank_details.aspx.cs" Inherits="admin_bank_details" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 739px;
        }
        .style2
        {
            width: 149px;
        }
        .style3
        {
            width: 149px;
            height: 49px;
        }
        .style4
        {
            height: 49px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Banks Detail&nbsp;&nbsp;&nbsp; </div>
    <br />
    <table class="style1">
        <tr>
            <td class="style2">
                Enter Bank Name</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt" Width="305px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td rowspan="2" valign="top">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataSourceID="SqlDataSource1">
                    <Columns>
                        <asp:BoundField DataField="bank_name" HeaderText="bank_name" 
                            SortExpression="bank_name" />
                    </Columns>
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    InsertCommand="INSERT INTO bank_detail(bank_name) VALUES (@bank_name)" 
                    SelectCommand="SELECT * FROM [bank_detail]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" DefaultValue="" Name="bank_name" 
                            PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
            </td>
            <td class="style4">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
            &nbsp;
                <asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    InsertCommand="INSERT INTO bank_detail(bank_name) VALUES (@bank_name)" 
                    SelectCommand="SELECT * FROM [bank_detail] where bank_name=@bank">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" DefaultValue="" Name="bank_name" 
                            PropertyName="Text" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="bank" PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
</asp:Content>

