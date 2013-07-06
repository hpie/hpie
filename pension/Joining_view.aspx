<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Joining_view.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Joining_view" %>

<asp:Content ID="Content1" runat="server" contentplaceholderid="Content">


        <form id="form1" runat="server">
        <asp:Panel ID="Panel1" runat="server" Height="400px" 
                       Width="100%" ScrollBars="Both">
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Excel</asp:LinkButton>
            <br />
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" 
                BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                onrowdatabound="GridView1_RowDataBound">
                <RowStyle ForeColor="#000066" />
                <Columns>
                    <asp:TemplateField HeaderText="Srno"><ItemTemplate>
                    <%#sr %>
                    </ItemTemplate></asp:TemplateField>
                    <asp:BoundField DataField="Panno" HeaderText="Panno" SortExpression="Panno" />
                    <asp:BoundField DataField="IdType" HeaderText="IdType" 
                        SortExpression="IdType" />
                    <asp:BoundField DataField="GPF" HeaderText="GPF" SortExpression="GPF" />
                    <asp:BoundField DataField="Ppno" HeaderText="Ppno" SortExpression="Ppno" />
                    <asp:TemplateField HeaderText="JoinDate" SortExpression="JoinDate">
                      
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("JoinDate") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="PersonnelArea" HeaderText="PersonnelArea" 
                        SortExpression="PersonnelArea" />
                    <asp:BoundField DataField="Employee_group" HeaderText="Employee_group" 
                        SortExpression="Employee_group" />
                    <asp:BoundField DataField="Employee_Sub" HeaderText="Employee_Sub" 
                        SortExpression="Employee_Sub" />
                    <asp:TemplateField HeaderText="BirthDate" SortExpression="BirthDate">
                      
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Eval("BirthDate") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="Title" HeaderText="Title" SortExpression="Title" />
                    <asp:BoundField DataField="First" HeaderText="First" SortExpression="First" />
                    <asp:BoundField DataField="Last" HeaderText="Last" SortExpression="Last" />
                    <asp:BoundField DataField="Gender" HeaderText="Gender" 
                        SortExpression="Gender" />
                    <asp:BoundField DataField="Matrial_status" HeaderText="Matrial_status" 
                        SortExpression="Matrial_status" />
                    <asp:TemplateField HeaderText="Married_Since" SortExpression="Married_Since">
                      
                        <ItemTemplate>
                            <asp:Label ID="Label3" runat="server" Text='<%#Eval("Married_Since")%>' ></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="No_Child" HeaderText="No_Child" 
                        SortExpression="No_Child" />
                    <asp:BoundField DataField="Personnel_subarea" HeaderText="Personnel_subarea" 
                        SortExpression="Personnel_subarea" />
                    <asp:BoundField DataField="Payroll_area" HeaderText="Payroll_area" 
                        SortExpression="Payroll_area" />
                    <asp:BoundField DataField="Remark" HeaderText="Remark" 
                        SortExpression="Remark" />
                </Columns>
                <FooterStyle BackColor="White" ForeColor="#000066" />
                <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
            </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>" 
                ProviderName="<%$ ConnectionStrings:pension.ProviderName %>">
            </asp:SqlDataSource>
            </asp:Panel>
            </p>
    </form>
</asp:Content>
