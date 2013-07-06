<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="tally_sheet3.aspx.cs" Inherits="tally_sheet3" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    Select Stack No:
    <asp:DropDownList ID="chl_d" runat="server" AutoPostBack="True" 
        DataSourceID="SqlDataSource3" DataTextField="stack" 
        DataValueField="stack" 
        onselectedindexchanged="DropDownList5_SelectedIndexChanged">
    </asp:DropDownList>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT challan_no FROM [tally_sheet] GROUP BY challan_no"></asp:SqlDataSource>
    <br />
    <strong>Stack No:
    <asp:Label ID="Label1" runat="server"></asp:Label>
    </strong>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT        stack
FROM            dbo.tally_sheet
WHERE        (hsd_lot_no IS NULL)
GROUP BY stack">
    </asp:SqlDataSource>
    <br />
    <br />
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    onrowdeleting="GridView1_RowDeleting" 
                    EnableModelValidation="False" 
        onrowupdating="GridView1_RowUpdating" DataKeyNames="code" 
        onrowcommand="GridView1_RowCommand" Width="949px">
                    <Columns>
                        <asp:TemplateField HeaderText="Scant No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="scant_no0" runat="server" Text='<%# Eval("scant_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Lot No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="lot_no0" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
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
                        <asp:TemplateField HeaderText="Species">
              
                            <ItemTemplate>
                                <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

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
                        <asp:TemplateField HeaderText="No (as per receipt)">
                         
                            <ItemTemplate>
                                <asp:Label ID="size0" runat="server" Text='<%# Eval("size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol (as per receipt)">
                          
                            <ItemTemplate>
                                <asp:Label ID="size_vol0" runat="server" Text='<%# Eval("size_vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No (As per challan)">
                          
                            <ItemTemplate>
                                <asp:Label ID="as_per_no0" runat="server" Text='<%# Eval("as_per_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol (As per challan)">
                          
                            <ItemTemplate>
                                <asp:Label ID="as_per_vol0" runat="server" Text='<%# Eval("as_per_vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Grade/ Class">
                          
                            <ItemTemplate>
<%--                                <asp:DropDownList ID="DropDownList6" runat="server" 
                                    DataSourceID="SqlDataSource1" DataTextField="grade" DataValueField="grade" 
                                    SelectedValue='<%# Bind("grade") %>'>
                                </asp:DropDownList>--%>

                                <asp:Label ID="grade" runat="server" Text='<%# Eval("grade") %>'></asp:Label>
                               <%-- <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [grade]"></asp:SqlDataSource>--%>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Stack No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="stack" runat="server" Text='<%# Bind("stack") %>' Width="70px"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                           <asp:TemplateField HeaderText="HSD Lot No.">
                         
                            <ItemTemplate>
                                <asp:TextBox ID="hsd_lot" runat="server" Text='<%# Bind("hsd_lot_no") %>' Width="70px"></asp:TextBox>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField ItemStyle-Width="100px">
                
                            <ItemTemplate>
                                &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" CommandName="update">Update</asp:LinkButton>
                                &nbsp;<asp:LinkButton ID="LinkButton2" runat="server" CommandName="delete">Delete</asp:LinkButton>
                            </ItemTemplate>

<ItemStyle Width="100px"></ItemStyle>
                        </asp:TemplateField>
                    </Columns>
                </asp:GridView>
            <br />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT * FROM [tally_sheet] WHERE ([stack] = @stack)" 
        DeleteCommand="DELETE FROM dbo.tally_sheet where code=@code" 
        
    UpdateCommand="UPDATE dbo.tally_sheet SET hsd_lot_no =@hsd_lot_no where code=@code">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <SelectParameters>
            <asp:QueryStringParameter DefaultValue="challan_no" Name="stack" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="hsd_lot_no" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
            </asp:Content>

