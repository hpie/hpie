<%@ Page Language="C#" AutoEventWireup="true" CodeFile="nominee_view.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Joining_view" %>

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
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" 
                BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                onrowdatabound="GridView1_RowDataBound" Width="100%">
                <RowStyle ForeColor="#000066" />
                <Columns>
                    <asp:TemplateField HeaderText="Srno">
                        <ItemTemplate>
                            <%#sr %>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="ppno" HeaderText="PPO Number" ReadOnly="True" 
                        SortExpression="ppno" />
                    <asp:BoundField DataField="panno" HeaderText="PAN Number" ReadOnly="True" 
                        SortExpression="panno" />
                    <asp:BoundField DataField="GPF" HeaderText="GPF" ReadOnly="True" 
                        SortExpression="Gpf" />
                    <asp:BoundField DataField="cps" HeaderText="CPS No" ReadOnly="True" 
                        SortExpression="cps" />
                    <asp:BoundField DataField="First" HeaderText="First" ReadOnly="True" 
                        SortExpression="First" />
                    <asp:BoundField DataField="Last" HeaderText="Last" ReadOnly="True" 
                        SortExpression="Last" />
                    <asp:TemplateField HeaderText="Date Of Birth">
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("birthdate") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="nominee" HeaderText="Nominee" 
                        SortExpression="nominee" />
                    <asp:BoundField DataField="address" HeaderText="Nominee's Address" 
                        SortExpression="address" />
                    <asp:BoundField DataField="relition" HeaderText="Relation" 
                        SortExpression="relition" />
                    <asp:TemplateField HeaderText="Birth Date">
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Eval("nbirth_date") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="share" HeaderText="Share" SortExpression="share" />
                    <asp:BoundField DataField="gar_address" HeaderText="GUARDIAN'S ADDRESS" 
                        SortExpression="gar_address" />
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
                
            
            
            SelectCommand="SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF, Nominee.remarks FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO WHERE (Nominee.User1 = @User1)">
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

