<%@ Page Language="C#" AutoEventWireup="true" CodeFile="recurring_view.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Joining_view" %>

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
                        <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" 
                            ValidationGroup="a" />
                        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                            ControlToValidate="TextBox2" ErrorMessage="RequiredFieldValidator" 
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
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" 
                BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                onrowdatabound="GridView1_RowDataBound" Width="100%">
                <RowStyle ForeColor="#000066" />
                <Columns>
                  <asp:TemplateField HeaderText="Srno"><ItemTemplate>
                    <%#sr %>
                    </ItemTemplate></asp:TemplateField>
                    <asp:BoundField DataField="ppo" HeaderText="PPO Number" 
                        SortExpression="ppo" />
                    <asp:BoundField DataField="panno" HeaderText="PAN Number" 
                        SortExpression="panno" />
                    <asp:BoundField />
                    <asp:BoundField DataField="cps" HeaderText="CPS No" SortExpression="cps" />
                    <asp:BoundField DataField="Last" HeaderText="Last" SortExpression="Last" />
                    <asp:BoundField DataField="First" HeaderText="First" SortExpression="First" />
                    <asp:TemplateField HeaderText="Date Of Birth">
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("birthdate") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField HeaderText="Personnel No" />
                    <asp:TemplateField HeaderText="Start date">
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Eval("start_date") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="End date">
                        <ItemTemplate>
                            <asp:Label ID="Label3" runat="server" Text='<%# Bind("end_Date") %>'></asp:Label>
                        </ItemTemplate>
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("end_Date") %>'></asp:TextBox>
                        </EditItemTemplate>
                    </asp:TemplateField>
                  
                    <asp:BoundField DataField="wage_type" HeaderText="Wage Type" />
                  
                    <asp:BoundField DataField="Amount" HeaderText="Amount" />
                  
                    <asp:BoundField DataField="remarks" HeaderText="Remarks" 
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
                
            
            
            
            SelectCommand="SELECT Joining.First, Joining.Last, Joining.Panno, Joining.BirthDate, Joining.GPF, Deduction.PPO, Deduction.CPS, Deduction.Personnel_no, Deduction.Start_Date, Deduction.End_Date, Deduction.Wage_Type, Deduction.Amount, Deduction.Remarks FROM Joining INNER JOIN Deduction ON Joining.Ppno = Deduction.PPO where deduction.User1=@User1 order by  Deduction.PPO ">
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

