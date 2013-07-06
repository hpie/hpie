<%@ Page Language="C#" AutoEventWireup="true" CodeFile="bank_view.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Joining_view" %>

<asp:Content ID="Content1" runat="server" contentplaceholderid="Content">


        <form id="form1" runat="server">
        <asp:Panel ID="Panel1" runat="server" Height="400px" 
                       Width="100%" ScrollBars="Both">
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Excel</asp:LinkButton>
            <table cellpadding="0" cellspacing="0" class="style1">
                <tr>
                    <td class="style2">
                        Enter&nbsp; PPO No</td>
                    <td>
                        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" 
                            ValidationGroup="a" />
                        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                            ControlToValidate="TextBox1" ErrorMessage="RequiredFieldValidator" 
                            ValidationGroup="a">Not Empty</asp:RequiredFieldValidator>
                    </td>
                </tr>
                <tr>
                    <td class="style2">
                        &nbsp;</td>
                    <td>
                        <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                            Text="View All" />
                    </td>
                </tr>
            </table>
            <br />
            <br />
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" 
                BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                onrowdatabound="GridView1_RowDataBound" Width="1024px">
                <RowStyle ForeColor="#000066" />
                <Columns>
                  <asp:TemplateField HeaderText="Srno"><ItemTemplate>
                    <%#sr %>
                    </ItemTemplate></asp:TemplateField>
                    <asp:BoundField DataField="panno" HeaderText="PAN Number" 
                        SortExpression="panno" />
                    <asp:BoundField DataField="GPF" HeaderText="GPF" SortExpression="Gpf" />
                    <asp:BoundField DataField="cps" HeaderText="CPS No" SortExpression="cps" />
                    <asp:BoundField DataField="First" HeaderText="First" SortExpression="First" />
                    <asp:BoundField DataField="Last" HeaderText="Last" SortExpression="Last" />
                    <asp:TemplateField HeaderText="Date Of Birth">
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("birthdate") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="bank_ac" HeaderText="Bank account" 
                        SortExpression="bank_ac" />
                    <asp:BoundField DataField="payment_method" HeaderText="Payment method" 
                        SortExpression="payment_method" />
                    <asp:BoundField DataField="bank_name" HeaderText="Bank Name" 
                        SortExpression="bank_name" />
                    <asp:BoundField DataField="bank_city" HeaderText="Bank City" 
                        SortExpression="bank_city" />
                    <asp:BoundField DataField="branch_code" HeaderText="IFSC/Branch Code" 
                        SortExpression="branch_code" />
                    <asp:BoundField DataField="bank_branch" HeaderText="Bank Branch" 
                        SortExpression="bank_branch" />
                    <asp:BoundField DataField="bank_address" HeaderText="Bank House No and Street" 
                        SortExpression="bank_address" />
                    <asp:BoundField DataField="ppno" HeaderText="PPO Number" 
                        SortExpression="ppno" />
                    <asp:BoundField DataField="remarks" 
                        SortExpression="remarks" />
                </Columns>
                <FooterStyle BackColor="White" ForeColor="#000066" />
                <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
            </asp:GridView>
            </asp:Panel>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>" 
                
            
            
            SelectCommand="SELECT Joining.Ppno, Joining.First, Joining.Last, Joining.Panno, Joining.BirthDate, Joining.GPF, Bank_Detail.Bank_ac, Bank_Detail.Payment_method, Bank_Detail.Bank_name, Bank_Detail.Bank_City, Bank_Detail.Bank_branch, Bank_Detail.Branch_code, Bank_Detail.Bank_address, Bank_Detail.Remarks, Bank_Detail.CPS FROM Joining INNER JOIN Bank_Detail ON Joining.Ppno = Bank_Detail.PPO_NO where bank_detail.User1=@User1">
                <SelectParameters>
                    <asp:Parameter Name="User1" />
                </SelectParameters>
        </asp:SqlDataSource>
        </p>
    </form>
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="Head">
    <style type="text/css">

        .style1
        {
            width: 500px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 176px;
        }
    </style>
</asp:Content>

