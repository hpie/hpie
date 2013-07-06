<%@ Page Title="" Language="C#" MasterPageFile="~/report/MasterPage.master" AutoEventWireup="true" CodeFile="rosin_and_turpentine.aspx.cs" Inherits="report_rosin_and_turpentine" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#3366CC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="4" DataSourceID="SqlDataSource1" DataKeyNames="name" 
        onrowdatabound="GridView1_RowDataBound">
        <Columns>
            <asp:TemplateField HeaderText="Sr.No">

                <ItemTemplate>
                    <asp:Label ID="Label1" Text='<%#sr %>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:BoundField HeaderText="Name of Parties" DataField="name"  />

            <asp:TemplateField HeaderText="Current month details">
                <ItemTemplate>
                    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                        onrowdatabound="GridView2_RowDataBound" Width="865px">
                    <Columns>
            <asp:BoundField HeaderText="Bill no." DataField="sr" />
            <asp:BoundField HeaderText="Date" DataField="sdate" />
            <asp:BoundField HeaderText="Net Amount" DataField="namt" />
            <asp:BoundField HeaderText="X" />
            <asp:BoundField HeaderText="WW" />
            <asp:BoundField HeaderText="WG" />
            <asp:BoundField HeaderText="N" />
            <asp:BoundField HeaderText="M" />
            <asp:BoundField HeaderText="K" />
            <asp:BoundField HeaderText="H" />
            <asp:BoundField HeaderText="D" />
            <asp:BoundField HeaderText="B" />
            <asp:BoundField HeaderText="TOTAL" />
            <asp:BoundField HeaderText="G.TOTAL upto" />
                    </Columns>
                    </asp:GridView>
                    <asp:SqlDataSource ID="SqlDataSource12" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                        
                        
                        
                        SelectCommand="SELECT fc21.Sr, fc21.Sdate,rate as namt FROM fc21 INNER JOIN c21 ON fc21.Sr = c21.Srno WHERE (fc21.Name = @name) and c21.des!='Phenyl' and c21.des!='Turpentine Oil'  ORDER BY fc21.Sdate">
                        <SelectParameters>
                            <asp:Parameter Name="name" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </ItemTemplate>
            </asp:TemplateField>
        </Columns>
        <FooterStyle BackColor="#99CCCC" ForeColor="#003399" />
        <HeaderStyle BackColor="#003399" Font-Bold="True" ForeColor="#CCCCFF" />
        <PagerStyle BackColor="#99CCCC" ForeColor="#003399" HorizontalAlign="Left" />
        <RowStyle BackColor="White" ForeColor="#003399" />
        <SelectedRowStyle BackColor="#009999" Font-Bold="True" ForeColor="#CCFF99" />
        <SortedAscendingCellStyle BackColor="#EDF6F6" />
        <SortedAscendingHeaderStyle BackColor="#0D4AC4" />
        <SortedDescendingCellStyle BackColor="#D6DFDF" />
        <SortedDescendingHeaderStyle BackColor="#002876" />
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT name FROM [fc21] group by name"></asp:SqlDataSource>
</asp:Content>

