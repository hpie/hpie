<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="broad_level_timber_add.aspx.cs" Inherits="broad_level_timber_add" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <br />
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            InsertCommand="INSERT INTO auc_sale_list(lot_no, stack, size, no, vol, ctt, remarks, bid, name_party, challan_no, date) VALUES (@lot_no, @stack, @size, @no, @vol, @ctt, @remarks, @bid, @name_party, @challan_no, @date)" 
            
            SelectCommand="SELECT * FROM [auc_sale_list] where challan_no=@challan_no order by stack asc">
            <InsertParameters>
                <asp:Parameter Name="lot_no" />
                <asp:Parameter Name="stack" />
                <asp:Parameter Name="size" />
                <asp:Parameter Name="no" />
                <asp:Parameter Name="vol" />
                <asp:Parameter Name="ctt" />
                <asp:Parameter Name="remarks" />
                <asp:Parameter Name="name_party" />
                <asp:Parameter Name="challan_no" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="bid" />
            </InsertParameters>
        </asp:SqlDataSource>
        FOREST WORKING DIVISION NAHAN<asp:ScriptManager ID="ScriptManager1" 
        runat="server">
    </asp:ScriptManager>
    <br />
        BROAD LEAVED TIMBER<br />
    <br />
        DATE OF AUCTION :
        <asp:TextBox ID="TextBox2" runat="server" 
        ontextchanged="TextBox2_TextChanged"></asp:TextBox>
    <asp:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
        Enabled="True" TargetControlID="TextBox2">
    </asp:CalendarExtender>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="TextBox2" ErrorMessage="Enter Date First !" 
            ForeColor="#CC3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
    &nbsp;<asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT tally_sheet.scant_no, tally_sheet.lot_no, tally_sheet.size, tally_sheet.challan_no, tally_sheet.size_type, tally_sheet.stack, report_1.no, report_1.total_vol FROM tally_sheet INNER JOIN report_1 ON tally_sheet.stack = report_1.stack_no WHERE (tally_sheet.stack = @stack)">
        <SelectParameters>
            <asp:Parameter Name="stack" />
        </SelectParameters>
    </asp:SqlDataSource>
    <br />
    <br />
    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CC9966" BorderStyle="None" BorderWidth="1px" 
            CellPadding="4" EmptyDataText="No Record Available" ShowHeaderWhenEmpty="True" 
            Width="841px" ShowFooter="True" 
            onselectedindexchanged="GridView1_SelectedIndexChanged" 
            onrowcommand="GridView1_RowCommand" 
        onrowdatabound="GridView2_RowDataBound">
        <Columns>
            <%--  <asp:TemplateField HeaderText="S. No.">
                    <FooterTemplate>
                        <asp:Label ID="srn0" Text='<%#count-2%>' runat="server"></asp:Label>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="srn1" Text='<%#count-2%>' runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>--%>
            <asp:TemplateField HeaderText="Stack No.">
                <FooterTemplate>
                    <asp:DropDownList ID="stack_no" runat="server" AutoPostBack="True" 
                        DataSourceID="stack_data" DataTextField="stack" DataValueField="stack" 
                        onselectedindexchanged="stack_no_SelectedIndexChanged">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="stack_data" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT * FROM [tally_sheet]"></asp:SqlDataSource>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="stack" Text='<%#Eval("stack")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Challan No.">
                <FooterTemplate>
                    <asp:DropDownList ID="chl" runat="server" DataSourceID="chl_no" 
                            DataTextField="challan_no" DataValueField="challan_no">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="chl_no" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                            SelectCommand="SELECT challan_no FROM [tally_sheet]  group by challan_no">
                    </asp:SqlDataSource>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="challan_no" Text='<%#Eval("challan_no")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Lot No.">
                <FooterTemplate>
                    <asp:TextBox ID="lot_no" runat="server"  Width="60px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="lot_no" Text='<%#Eval("lot_no")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Size">
                <FooterTemplate>
                    <asp:DropDownList ID="size_drp" runat="server" DataSourceID="size_type" 
                            DataTextField="size_type" DataValueField="size_type">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="size_type" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                            SelectCommand="SELECT * FROM [size_type]"></asp:SqlDataSource>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="size" Text='<%#Eval("size")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No.">
                <FooterTemplate>
                    <asp:TextBox ID="no" runat="server" Width="60px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="no" Text='<%#Eval("no")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vol.">
                <FooterTemplate>
                    <asp:TextBox ID="vol" runat="server"  Width="60px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="vol" Text='<%#Eval("vol")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Ctt.">
                <FooterTemplate>
                    <asp:TextBox ID="ctt" runat="server"  Width="60px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="ctt" Text='<%#Eval("ctt")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Remarks">
                <FooterTemplate>
                    <asp:TextBox ID="remarks" runat="server"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="remarks" Text='<%#Eval("remarks")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Bid">
                <FooterTemplate>
                    <asp:TextBox ID="bid" runat="server"  Width="60px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="bid" Text='<%#Eval("bid")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Name of the Party">
                <FooterTemplate>
                    <asp:TextBox ID="name_party" runat="server"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="name_party" Text='<%#Eval("name_party")%>' runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField>
                <FooterTemplate>
                    <asp:LinkButton ID="LinkButton2" runat="server" CommandName="insert">Insert</asp:LinkButton>
                </FooterTemplate>
            </asp:TemplateField>
        </Columns>
        <FooterStyle ForeColor="#330099" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="#FFFFCC" />
        <PagerStyle BackColor="#FFFFCC" ForeColor="#330099" HorizontalAlign="Center" />
        <RowStyle BackColor="White" ForeColor="#330099" />
        <SelectedRowStyle BackColor="#FFCC66" Font-Bold="True" ForeColor="#663399" />
        <SortedAscendingCellStyle BackColor="#FEFCEB" />
        <SortedAscendingHeaderStyle BackColor="#AF0101" />
        <SortedDescendingCellStyle BackColor="#F6F0C0" />
        <SortedDescendingHeaderStyle BackColor="#7E0000" />
    </asp:GridView>
</asp:Content>

