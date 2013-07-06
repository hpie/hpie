<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="auction_rate.aspx.cs" Inherits="auction_rate" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <br />
    Select Auction Date:&nbsp;
    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
    <br />
<br />
&nbsp;<asp:DropDownList ID="DropDownList1" runat="server" 
    DataSourceID="SqlDataSource_hsd" DataTextField="hsd_lot_no" 
    DataValueField="hsd_lot_no" Visible="False">
</asp:DropDownList>
<asp:SqlDataSource ID="SqlDataSource_hsd" runat="server" 
    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
    SelectCommand="SELECT [hsd_lot_no] FROM [tally_sheet] group by hsd_lot_no">
</asp:SqlDataSource>
<br />
    <asp:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
        Enabled="True" TargetControlID="TextBox1">
    </asp:CalendarExtender>
&nbsp;<asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
    <br />
    <br />
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" DataSourceID="SqlDataSource1" 
        onrowcommand="GridView1_RowCommand" ShowFooter="True" Width="796px" 
        style="margin-right: 0px" onrowdatabound="GridView1_RowDataBound">
        <Columns>
            <asp:TemplateField HeaderText="HSD Lot No" SortExpression="hsd_lot_no">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("hsd_lot_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="hsd_lot_no" runat="server" Text='<%# Bind("hsd_lot_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Species" SortExpression="spec">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox2" runat="server" Text='<%# Bind("spec") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="spec" runat="server" Text='<%# Bind("spec") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Kind" SortExpression="kind">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox3" runat="server" Text='<%# Bind("kind") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="kind" runat="server" Text='<%# Bind("kind") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox6" runat="server" Text='<%# Bind("as_per_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="no" runat="server" Text='<%# Bind("as_per_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Grade" SortExpression="grade">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox4" runat="server" Text='<%# Bind("grade") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="grade" runat="server" Text='<%# Bind("grade") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Size Type">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" Text='<%# Bind("size_type") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="size_type" runat="server" Text='<%# Bind("size_type") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
           <%-- <asp:TemplateField HeaderText="Bid Price">
                <ItemTemplate>
                    <asp:Label ID="bid" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>--%>
            <asp:TemplateField HeaderText="Rate">
                <FooterTemplate>
                    <asp:LinkButton ID="LinkButton2" runat="server" CommandName="add" 
                        ValidationGroup="a">Submit</asp:LinkButton>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:TextBox ID="rate" runat="server" ></asp:TextBox>
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                        ControlToValidate="rate" ErrorMessage="*" SetFocusOnError="True" 
                        ValidationGroup="a"></asp:RequiredFieldValidator>
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
        
        SelectCommand="SELECT [hsd_lot_no], [spec], [kind], size_type, [grade],  sum(as_per_no) as as_per_no FROM [tally_sheet] where auction_date=@auction_date  group by[hsd_lot_no], [spec], [kind], size_type, [grade]" 
        
        
    
    
    UpdateCommand="UPDATE tally_sheet SET rate=@rate, average=@average where auction_date=@auction_date and hsd_lot_no=@hsd_lot_no and spec=@spec and kind=@kind and grade=@grade and size_type=@size_type">
        <SelectParameters>
            <asp:ControlParameter ControlID="TextBox1" Name="auction_date" 
                PropertyName="Text" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="rate" />
            <asp:ControlParameter ControlID="TextBox1" Name="auction_date" 
                PropertyName="Text" />
            <asp:Parameter Name="hsd_lot_no" />
            <asp:Parameter Name="spec" />
            <asp:Parameter Name="kind" />
            <asp:Parameter Name="grade" />
            <asp:Parameter Name="size_type" />
            <asp:Parameter Name="average" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT rate, bid_amt FROM [tally_sheet] where auction_date=@auction_date and hsd_lot_no=@hsd_lot_no and spec=@spec and kind=@kind and grade=@grade and size_type=@size_type" 
        
        
        UpdateCommand="UPDATE tally_sheet SET rate=@rate where auction_date=@auction_date and hsd_lot_no=@hsd_lot_no and spec=@spec and kind=@kind and grade=@grade and size_type=@size_type">
        <SelectParameters>
            <asp:ControlParameter ControlID="TextBox1" Name="auction_date" 
                PropertyName="Text" />
            <asp:Parameter Name="hsd_lot_no" />
            <asp:Parameter Name="spec" />
            <asp:Parameter Name="kind" />
            <asp:Parameter Name="grade" />
            <asp:Parameter Name="size_type" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="rate" />
            <asp:ControlParameter ControlID="TextBox1" Name="auction_date" 
                PropertyName="Text" />
            <asp:Parameter Name="hsd_lot_no" />
            <asp:Parameter Name="spec" />
            <asp:Parameter Name="kind" />
            <asp:Parameter Name="grade" />
            <asp:Parameter Name="size_type" />
        </UpdateParameters>
    </asp:SqlDataSource>
</asp:Content>

