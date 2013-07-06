<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="report_1.aspx.cs" Inherits="report_1" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        report-1
    </h2>
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <br />
    Select Challan no:
    <asp:DropDownList ID="DropDownList2" runat="server" AutoPostBack="True" 
        DataSourceID="chln" DataTextField="challan_no" DataValueField="challan_no" 
        onselectedindexchanged="DropDownList2_SelectedIndexChanged">
    </asp:DropDownList>
    <asp:SqlDataSource ID="chln" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT [challan_no] FROM [tally_sheet] group by challan_no">
    </asp:SqlDataSource>
    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Print Report</asp:LinkButton>
<br />
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" 
        onrowcommand="GridView1_RowCommand" onrowdatabound="GridView1_RowDataBound" 
        onrowdeleting="GridView1_RowDeleting" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
    ShowFooter="True">
        <Columns>
            <asp:TemplateField HeaderText="Challan No">
                <FooterTemplate>
                    <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                        DataSourceID="SqlDataSource1" DataTextField="challan_no" 
                        DataValueField="challan_no" 
                        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT challan_no FROM [tally_sheet] group by challan_no"></asp:SqlDataSource>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label8" runat="server" Text='<%# Eval("challan_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Date of Opening of Khata (of stack)" 
                SortExpression="date_of_opening">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("date_of_opening") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="date_open" runat="server" Width="70px"></asp:TextBox>
                    <asp:CalendarExtender ID="date_open_CalendarExtender" runat="server" 
                        Enabled="True" TargetControlID="date_open">
                    </asp:CalendarExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server" 
                        Text='<%# Bind("date_of_opening", "{0:d}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Stack No." SortExpression="stack_no">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox2" runat="server" ReadOnly="True" 
                        Text='<%# Bind("stack_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="Stack_no" runat="server" ReadOnly="True" Width="70px">--</asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label2" runat="server" Text='<%# Bind("stack_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Species &amp; Kind" SortExpression="speci_kind">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox3" runat="server" Text='<%# Bind("speci_kind") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="spec_kind" runat="server" ReadOnly="True">-Select Challan No-</asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label3" runat="server" Text='<%# Bind("speci_kind") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Size" SortExpression="size">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox4" runat="server" Text='<%# Bind("size") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:DropDownList ID="size" runat="server" DataSourceID="size_ty" 
                        DataTextField="size_type" DataValueField="size_type">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="size_ty" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT * FROM [size_type]"></asp:SqlDataSource>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label4" runat="server" Text='<%# Bind("size") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No" SortExpression="no">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" Text='<%# Bind("no") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="no" runat="server" Width="70px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label5" runat="server" Text='<%# Bind("no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Total No." SortExpression="total_no">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox6" runat="server" Text='<%# Bind("total_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="total_no" runat="server" Width="70px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label6" runat="server" Text='<%# Bind("total_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Total Vol." SortExpression="total_vol">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox7" runat="server" Text='<%# Bind("total_vol") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="total_vol" runat="server" Width="70px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label7" runat="server" Text='<%# Bind("total_vol") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField>
                <FooterTemplate>
                    <asp:LinkButton ID="Insert" runat="server" CommandName="insert">Insert</asp:LinkButton>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:ImageButton ID="ImageButton1" runat="server" CommandName="delete" 
                        Height="18px" ImageUrl="~/images.jpg" Width="23px" />
                </ItemTemplate>
            </asp:TemplateField>
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <RowStyle ForeColor="#000066" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <SortedAscendingCellStyle BackColor="#F1F1F1" />
        <SortedAscendingHeaderStyle BackColor="#007DBB" />
        <SortedDescendingCellStyle BackColor="#CAC9C9" />
        <SortedDescendingHeaderStyle BackColor="#00547E" />
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        DeleteCommand="DELETE FROM report_1 where code=@code" 
        SelectCommand="SELECT * FROM [report_1] where challan_no=@chl">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList2" Name="chl" 
                PropertyName="SelectedValue" />
        </SelectParameters>
    </asp:SqlDataSource>
    Must fill every fields.<br />
    <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        DeleteCommand="DELETE FROM report_1 where code=@code" 
        InsertCommand="INSERT INTO report_1(date_of_opening, stack_no, speci_kind, size, no, total_no, total_vol, challan_no) VALUES (@date_of_opening, @stack_no, @speci_kind, @size, @no, @total_no, @total_vol, @challan_no)" 
        SelectCommand="SELECT * FROM [tally_sheet] where challan_no=@chl">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="date_of_opening" />
            <asp:Parameter Name="stack_no" />
            <asp:Parameter Name="speci_kind" />
            <asp:Parameter Name="size" />
            <asp:Parameter Name="no" />
            <asp:Parameter Name="total_no" />
            <asp:Parameter Name="total_vol" />
            <asp:Parameter Name="challan_no" />
        </InsertParameters>
        <SelectParameters>
            <asp:Parameter Name="chl" />
        </SelectParameters>
    </asp:SqlDataSource>
</asp:Content>

