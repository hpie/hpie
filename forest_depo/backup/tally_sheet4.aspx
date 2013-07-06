<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="tally_sheet4.aspx.cs" Inherits="tally_sheet4" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 300px;
            height: 79px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
 <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
   
    <table class="style1">
        <tr>
            <td>
   
    Select by</td>
            <td>
                <asp:RadioButtonList ID="RadioButtonList1" runat="server" AutoPostBack="True" 
                    Height="26px" onselectedindexchanged="RadioButtonList1_SelectedIndexChanged" 
                    RepeatDirection="Horizontal">
                    <asp:ListItem Selected="True">blank</asp:ListItem>
                    <asp:ListItem>filled</asp:ListItem>
    </asp:RadioButtonList>
            </td>
        </tr>
        <tr>
            <td>
    Select HSD Lot No:</td>
            <td>
    <asp:DropDownList ID="chl_d" runat="server" AutoPostBack="True" 
        DataSourceID="SqlDataSource2" DataTextField="hsd_lot_no" 
        DataValueField="hsd_lot_no" 
        onselectedindexchanged="DropDownList5_SelectedIndexChanged">
    </asp:DropDownList>
            </td>
        </tr>
    </table>
    <br />
<br />
    <br />
    &nbsp;<asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT hsd_lot_no FROM [tally_sheet] where mark_to_auction='false' or mark_to_auction is null GROUP BY hsd_lot_no"></asp:SqlDataSource>
    <br />
    <strong>HSD Lot No:
    <asp:Label ID="Label1" runat="server"></asp:Label>
    </strong>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [tally_sheet]">
    </asp:SqlDataSource>
    <br />
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    EnableModelValidation="False" 
        onrowupdating="GridView1_RowUpdating" DataKeyNames="code" 
        onrowcommand="GridView1_RowCommand" Width="949px" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
        onrowdatabound="GridView1_RowDataBound">
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
                    <asp:Label ID="hsd_lot" runat="server" Text='<%# Bind("hsd_lot_no") %>' Width="70px"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>

            <asp:TemplateField HeaderText="Mark for Auction">
                <ItemTemplate>
                    <asp:Label ID="id_i" runat="server" Text='<%# Eval("code") %>' Visible="False"></asp:Label>
                    <asp:Label ID="mark" runat="server" Text='<%# Eval("mark_to_auction") %>' 
                        Visible="False"></asp:Label>
                    <asp:CheckBox ID="chk" runat="server" />
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField ItemStyle-Width="100px">
                <HeaderTemplate>
                    <asp:LinkButton ID="LinkButton3" runat="server" CommandName="all">Update All</asp:LinkButton>
                </HeaderTemplate>
                <ItemTemplate>
                                &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" CommandName="update">Update</asp:LinkButton>
                                &nbsp;
                </ItemTemplate>
                <ItemStyle Width="100px"></ItemStyle>
            </asp:TemplateField>
        </Columns>
    </asp:GridView>
    <br />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT * FROM [tally_sheet] WHERE ([hsd_lot_no] = @stack)" 
        DeleteCommand="DELETE FROM dbo.tally_sheet where code=@code" 
        
    
        
        UpdateCommand="UPDATE dbo.tally_sheet SET mark_to_auction =@mark_to_auction where code=@code">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <SelectParameters>
            <asp:QueryStringParameter DefaultValue="challan_no" Name="stack" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="mark_to_auction" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
            </asp:Content>

