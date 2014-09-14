<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master"  CodeFile="cpf.aspx.cs" Inherits="_Default" %>


<asp:Content ID="Content1" runat="server" 
    contentplaceholderid="ContentPlaceHolder1">

         <div>
    
        <table cellpadding="0" cellspacing="0" class="style1">
            <tr>
                <td class="style4" colspan="2">
                    Session Detail</td>
            </tr>
            <tr>
                <td class="style2">
                    Select Session</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                        onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="118px">
                    </asp:DropDownList>
                </td>
            </tr>
        </table>
    
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" 
            onrowcreated="GridView1_RowCreated" onrowdatabound="GridView1_RowDataBound" 
            style="font-family: Verdana; font-size: xx-small">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="Sr.No">
                    <ItemTemplate>
                        <asp:Label ID="Label3" runat="server" Text="<%# r %>"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Name &amp; Designation">
                    <ItemTemplate>
                        <asp:Label ID="Label1" runat="server" Text='<%# Eval("Name") %>'></asp:Label>
                         <asp:Label ID="Label7" runat="server" Text='<%# Eval("des") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="A/C No.">
                    <ItemTemplate>
                        <asp:Label ID="Label2" runat="server" Text='<%# Eval("AC") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="O.B.">
                    <HeaderTemplate>
                        OB
                        <asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
                    </HeaderTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label4" runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="During the year">
                    <ItemTemplate>
                        <asp:Label ID="Label5" runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Recovery of Advance">
                    <ItemTemplate>
                        <asp:Label ID="Label6" runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Total (4+5+6)"></asp:TemplateField>
                <asp:TemplateField HeaderText="CPF Advance"></asp:TemplateField>
                <asp:TemplateField HeaderText="Adjustments"></asp:TemplateField>
                <asp:TemplateField HeaderText="C.B."></asp:TemplateField>
                <asp:TemplateField HeaderText="O.B."></asp:TemplateField>
                <asp:TemplateField HeaderText="During the year"></asp:TemplateField>
                <asp:TemplateField HeaderText="Adjustment with LIC"></asp:TemplateField>
                <asp:TemplateField HeaderText="Total (11+12-13)"></asp:TemplateField>
                <asp:TemplateField HeaderText="O.B. as on"></asp:TemplateField>
                <asp:TemplateField HeaderText="During the year "></asp:TemplateField>
                <asp:TemplateField HeaderText="Adjustment"></asp:TemplateField>
                <asp:TemplateField HeaderText="Total (15+16-17)"></asp:TemplateField>
                <asp:TemplateField HeaderText="O.B. as on "></asp:TemplateField>
                <asp:TemplateField HeaderText="During the year "></asp:TemplateField>
                <asp:TemplateField HeaderText="Adjustment"></asp:TemplateField>
                <asp:TemplateField HeaderText="Total (19+20-21)"></asp:TemplateField>
                <asp:TemplateField HeaderText="Total Interest (Col.18+22)"></asp:TemplateField>
                <asp:TemplateField HeaderText="Grand Total (Col.10+ 14+23)"></asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        </asp:GridView>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:himuda %>" 
            
            
            SelectCommand="SELECT* from employee">
        </asp:SqlDataSource>
    
    </div>
        

</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="head">
    <style type="text/css">
    .style4
    {
        text-align: center;
    }
</style>







</asp:Content>

