<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="tally_sheet2.aspx.cs" Inherits="tally_sheet2" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    Select Species:
    <asp:DropDownList ID="chl_d" runat="server" AutoPostBack="True" 
        DataSourceID="SqlDataSource2" DataTextField="spec" 
        DataValueField="spec" 
        onselectedindexchanged="DropDownList5_SelectedIndexChanged">
    </asp:DropDownList>
    &nbsp;<asp:LinkButton ID="LinkButton4" runat="server" 
    CausesValidation="False" onclick="LinkButton4_Click">Search</asp:LinkButton>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT        spec
FROM            dbo.tally_sheet
WHERE        (hsd_lot_no IS NULL)
GROUP BY spec"></asp:SqlDataSource>
    <br />
    <strong>Species:
    <asp:Label ID="Label1" runat="server"></asp:Label>
    </strong>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [tally_sheet] WHERE ([spec] = @challan_no)">
        <SelectParameters>
            <asp:ControlParameter ControlID="chl_d" Name="challan_no" 
                PropertyName="SelectedValue" Type="String" />
        </SelectParameters>
    </asp:SqlDataSource>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
        ControlToValidate="stack_no" ErrorMessage="Enter Stack No First !" 
        ForeColor="#CC3300"></asp:RequiredFieldValidator>
    <asp:Label ID="Label2" runat="server" ForeColor="#CC3300"></asp:Label>
    <br />
    Enter Stack No:
    <asp:TextBox ID="stack_no" runat="server" BorderColor="Black" 
        BorderStyle="Solid" BorderWidth="1px"></asp:TextBox>
&nbsp;
    <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">Submit</asp:LinkButton>
    <br />
    <br />
   
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    onrowdeleting="GridView1_RowDeleting" 
                    EnableModelValidation="False" 
        onrowupdating="GridView1_RowUpdating" DataKeyNames="code" 
        onrowcommand="GridView1_RowCommand" BackColor="White" 
        BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="4" 
        ForeColor="Black" GridLines="Horizontal" 
        onrowdatabound="GridView1_RowDataBound">
                    <Columns>
                                        <asp:TemplateField HeaderText="Challan No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="challan_no0" runat="server" Text='<%# Eval("challan_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                       
                        <asp:TemplateField HeaderText="Lot No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="lot_no0" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                         <asp:TemplateField HeaderText="Scant No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="scant_no0" runat="server" Text='<%# Eval("scant_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                       <%--   <asp:TemplateField HeaderText="Date of Challan">
                            <FooterTemplate>
                                <asp:TextBox ID="date_of_chl" runat="server" Width="70px"></asp:TextBox>
                                <asp:CalendarExtender ID="date_of_chl_CalendarExtender" runat="server" 
                                    Enabled="True" TargetControlID="date_of_chl">
                                </asp:CalendarExtender>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="date_of_chl" runat="server" Text='<%# Eval("date_of_chl") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                      <asp:TemplateField HeaderText="Date of Receipt">
                            <FooterTemplate>
                                <asp:TextBox ID="date_of_rec" runat="server" Width="70px"></asp:TextBox>
                                <asp:CalendarExtender ID="date_of_rec_CalendarExtender" runat="server" 
                                    Enabled="True" TargetControlID="date_of_rec">
                                </asp:CalendarExtender>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="date_of_rec" runat="server" Text='<%# Eval("date_of_rec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>--%>
                      <%--  <asp:TemplateField HeaderText="Species">
              
                            <ItemTemplate>
                                <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>--%>

                          <asp:TemplateField HeaderText="Kind">
                          
                            <ItemTemplate>
                                <asp:Label ID="kind0" runat="server" Text='<%# Eval("kind") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                        <asp:TemplateField HeaderText="Size Type">
                          
                            <ItemTemplate>
                                <asp:Label ID="size_type3" runat="server" Text='<%# Eval("size_type") %>' ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol.">
                         
                            <ItemTemplate>
                                <asp:Label ID="vol0" runat="server" Text='<%# Eval("as_per_vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                       
                        <asp:TemplateField HeaderText="Grade/ Class">
                          
                            <ItemTemplate>
                                <asp:DropDownList ID="DropDownList6" runat="server" 
                                    DataSourceID="SqlDataSource1" DataTextField="grade" DataValueField="grade" 
                                    SelectedValue='<%# Bind("grade") %>'>
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [grade]"></asp:SqlDataSource>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Stack No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="stk" runat="server" Text='<%# Eval("stack") %>'></asp:Label>
                                <asp:CheckBox ID="CheckBox1" runat="server" />
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField ItemStyle-Width="100px">
                
                            <ItemTemplate>
                                &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" CommandName="update" 
                                    Visible="False">Update</asp:LinkButton>
                                &nbsp;<asp:LinkButton ID="LinkButton2" runat="server" CommandName="delete" 
                                    Visible="False">Delete</asp:LinkButton>
                            </ItemTemplate>

<ItemStyle Width="100px"></ItemStyle>
                        </asp:TemplateField>
                    </Columns>
                    <FooterStyle BackColor="#CCCC99" ForeColor="Black" />
                    <HeaderStyle BackColor="#333333" Font-Bold="True" ForeColor="White" />
                    <PagerStyle BackColor="White" ForeColor="Black" HorizontalAlign="Right" />
                    <SelectedRowStyle BackColor="#CC3333" Font-Bold="True" ForeColor="White" />
                    <SortedAscendingCellStyle BackColor="#F7F7F7" />
                    <SortedAscendingHeaderStyle BackColor="#4B4B4B" />
                    <SortedDescendingCellStyle BackColor="#E5E5E5" />
                    <SortedDescendingHeaderStyle BackColor="#242121" />
                </asp:GridView>
            <br />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT * FROM [tally_sheet] WHERE ([challan_no] = @challan_no)" 
        DeleteCommand="DELETE FROM dbo.tally_sheet where code=@code" 
        UpdateCommand="UPDATE dbo.tally_sheet SET stack =@stack, grade =@grade where code=@code">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <SelectParameters>
            <asp:QueryStringParameter DefaultValue="" Name="challan_no" 
                QueryStringField="challan_no" Type="String" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="stack" />
            <asp:Parameter Name="grade" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        DeleteCommand="DELETE FROM dbo.tally_sheet where code=@code" 
        
        UpdateCommand="UPDATE dbo.tally_sheet SET stack =@stack, grade =@grade where code=@code">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <UpdateParameters>
            <asp:Parameter Name="stack" />
            <asp:Parameter Name="grade" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
            </asp:Content>

