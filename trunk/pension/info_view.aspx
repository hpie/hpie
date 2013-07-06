<%@ Page Language="C#" AutoEventWireup="true" CodeFile="info_view.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Joining_view" %>

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
                    <asp:BoundField DataField="ppono" HeaderText="PPO Number" 
                        SortExpression="ppono" />
                    <asp:BoundField DataField="panno" HeaderText="PAN Number" 
                        SortExpression="panno" />
                    <asp:BoundField DataField="GPF" HeaderText="GPF" SortExpression="GPF" />
                    <asp:BoundField ConvertEmptyStringToNull="False" DataField="cpsno" 
                        HeaderText="CPS No" SortExpression="cpsno" />
                  
                    <asp:BoundField DataField="Last" HeaderText="Last" SortExpression="Last" />
                    <asp:BoundField DataField="First" HeaderText="First" SortExpression="First" />
                    <asp:TemplateField HeaderText="Date Of Birth">
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("birthdate") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField HeaderText="Personnel No" />
                    <asp:BoundField DataField="Actiontype" HeaderText="Action Type" 
                        SortExpression="Actiontype" />
                    <asp:TemplateField HeaderText="Start date">
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Eval("start_date") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="End date">
                        <ItemTemplate>
                            <asp:Label ID="Label3" runat="server" Text='<%# Eval("end_Date") %>'></asp:Label>
                        </ItemTemplate>
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("end_Date") %>'></asp:TextBox>
                        </EditItemTemplate>
                    </asp:TemplateField>
                  
                    <asp:BoundField DataField="Action_Reason" HeaderText="Reason for Action" 
                        SortExpression="Action_Reason" />
                    <asp:BoundField DataField="Position" HeaderText="Position" 
                        SortExpression="Position" />
                    <asp:BoundField DataField="personnelarea" HeaderText="Personnel Area" 
                        SortExpression="personnelarea" />
                    <asp:BoundField DataField="employee_group" HeaderText="EmployeeGroup" 
                        SortExpression="employee_group" />
                    <asp:BoundField DataField="employee_sub" HeaderText="Employee Subgroup" 
                        SortExpression="employee_sub" />
                    <asp:BoundField DataField="personnel_subarea" HeaderText="Personnel Subarea" 
                        SortExpression="personnel_subarea" />
                    <asp:BoundField DataField="payroll_area" HeaderText="Payroll Area" 
                        SortExpression="payroll_area" />
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
                
            
            
            
            
            
            
            SelectCommand="SELECT dbo.Joining.First, dbo.Joining.Last, dbo.Joining.Panno, dbo.Joining.BirthDate, dbo.Joining.GPF, dbo.Other_Action.ActionType, dbo.Other_Action.Start_Date, dbo.Other_Action.End_Date, dbo.Other_Action.Action_Reason, dbo.Other_Action.Position, dbo.Other_Action.Payroll_Area, dbo.Other_Action.Remarks, dbo.Other_Action.PPONo, dbo.Other_Action.CPSNo, dbo.Joining.PersonnelArea, dbo.Joining.Employee_group, dbo.Joining.Employee_Sub, dbo.Joining.Personnel_subarea FROM dbo.Joining INNER JOIN dbo.Other_Action ON dbo.Joining.Ppno = dbo.Other_Action.PPONo"></asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>"></asp:SqlDataSource>
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

