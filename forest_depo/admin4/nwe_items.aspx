<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="nwe_items.aspx.cs" Inherits="nwe_items" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        EmptyDataText="-Enter Record-" 
        onrowcommand="GridView1_RowCommand" ShowFooter="True" 
    onrowdeleting="GridView1_RowDeleting">
        <Columns>
            <asp:TemplateField HeaderText="Sl. No." SortExpression="sl_no">
                <ItemTemplate>
                    <asp:Label ID="Label3" runat="server" Text='<%# sl %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="sl_no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Date of Disposal" SortExpression="date_of_dis">
                <ItemTemplate>
                    <asp:Label ID="Label4" runat="server" Text='<%# dtm%>' ></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox4" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="date_of_dis" runat="server" Width="70px"></asp:TextBox>
                    <asp:CalendarExtender ID="date_of_dis_CalendarExtender" runat="server" 
                        Enabled="True" TargetControlID="date_of_dis">
                    </asp:CalendarExtender>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Removal Order No." SortExpression="rem_ord_no">
                <ItemTemplate>
                    <asp:Label ID="Label5" runat="server" Text='<%# Bind("rem_ord_no") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="rem_ord" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Removal Date" SortExpression="rem_date">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox6" runat="server" Text='<%# Eval("rem_date", "{0:MM-dd-yyyy}") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="remo_date" runat="server" Width="70px"></asp:TextBox>
                    <asp:CalendarExtender ID="remo_date_CalendarExtender" runat="server" 
                        Enabled="True" TargetControlID="remo_date">
                    </asp:CalendarExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="rec_date" runat="server" Text='<%# Eval("rem_date", "{0:MM-dd-yyyy}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="How Disposed of" SortExpression="how_disp">
                <ItemTemplate>
                    <asp:Label ID="Label7" runat="server" Text='<%# Bind("how_disp") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox7" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="how_dis" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Challan No." SortExpression="challan_no">
                <ItemTemplate>
                    <asp:Label ID="Label8" runat="server" Text='<%# Bind("challan_no") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox8" runat="server" Text='<%# Bind("challan_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:DropDownList ID="challan_no" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="challan_no" DataValueField="challan_no">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT * FROM [tally_sheet]"></asp:SqlDataSource>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vehicle No." SortExpression="vehicle_no">
                <ItemTemplate>
                    <asp:Label ID="Label9" runat="server" Text='<%# Bind("vehicle_no") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox9" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="veh_no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Lot. No." SortExpression="lot_no">
                <ItemTemplate>
                    <asp:Label ID="Label10" runat="server" Text='<%# Bind("lot_no") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox10" runat="server" Text='<%# Bind("lot_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="lot_no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Species" SortExpression="species">
                <ItemTemplate>
                    <asp:Label ID="Label11" runat="server" Text='<%# Bind("species") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox11" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="species" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Size" SortExpression="size">
                <ItemTemplate>
                    <asp:Label ID="Label12" runat="server" Text='<%# Bind("size") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox12" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="size" runat="server" Width="50px"></asp:TextBox>
                    <asp:FilteredTextBoxExtender ID="size_FilteredTextBoxExtender" runat="server" 
                        Enabled="True" FilterType="Numbers" TargetControlID="size">
                    </asp:FilteredTextBoxExtender>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No." SortExpression="no">
                <ItemTemplate>
                    <asp:Label ID="Label13" runat="server" Text='<%# Bind("size") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox13" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vol" SortExpression="vol">
                <ItemTemplate>
                    <asp:Label ID="Label14" runat="server" Text='<%# Bind("vol") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox14" runat="server" Text='<%# Bind("vol") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="vol" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Remarks" SortExpression="remarks">
                <ItemTemplate>
                    <asp:Label ID="Label15" runat="server" Text='<%# rem %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox15" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="remarks" runat="server" Width="100px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField>
                <ItemTemplate>
                    <asp:ImageButton ID="ImageButton1" runat="server" CommandName="delete" 
                        Height="18px" ImageUrl="~/images.jpg" Width="23px" />
                </ItemTemplate>
                <FooterTemplate>
                    <asp:LinkButton ID="LinkButton1" runat="server" CommandName="insert">Insert</asp:LinkButton>
                </FooterTemplate>
            </asp:TemplateField>
        </Columns>
    </asp:GridView>
</asp:Content>

