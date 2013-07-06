<%@ Page Language="C#" AutoEventWireup="true" CodeFile="pensioner_view.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Joining_view" %>

<asp:Content ID="Content1" runat="server" contentplaceholderid="Content">


        <form id="form1" runat="server">
        <asp:Panel ID="Panel1" runat="server" Height="400px" 
                       Width="100%" ScrollBars="Both">
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Excel</asp:LinkButton>
            <br />
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                DataSourceID="SqlDataSource1" BackColor="White" BorderColor="#CCCCCC" 
                BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                onrowdatabound="GridView1_RowDataBound" Width="100%">
                <RowStyle ForeColor="#000066" />
                <Columns>
                    <asp:BoundField DataField="ppno" HeaderText="PPO Number" 
                        SortExpression="ppno" />
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
                </Columns>
                <FooterStyle BackColor="White" ForeColor="#000066" />
                <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
            </asp:GridView>
            </asp:Panel>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>" 
                
            SelectCommand="SELECT Joining.Ppno, Joining.First, Joining.Last, Nominee.CPS, Nominee.Nominee, Nominee.Address, Nominee.NBirth_Date, Nominee.Relition, Nominee.Share, Nominee.Gar_Address, Joining.Panno, Joining.BirthDate, Joining.GPF FROM Joining INNER JOIN Nominee ON Joining.Ppno = Nominee.PPO"></asp:SqlDataSource>
        </p>
    </form>
</asp:Content>
