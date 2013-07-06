<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="gate_pass.aspx.cs" Inherits="gate_pass" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    </asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">

    <h2>
        Rawana challan cum gate pass</h2>
    <p>
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        (Original/Duplicate/Triplicate/Quardruplicate)</p>

    <table class="style1">
        <tr>
            <td class="style3">
                Sr. No.
                <asp:TextBox ID="srno" runat="server"></asp:TextBox>
            </td>
            <td class="style2">
                Challan No.
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="challan_no" 
                    DataValueField="challan_no" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT challan_no FROM [tally_sheet]  group by challan_no"></asp:SqlDataSource>
            </td>
            <td class="style2">
                Date&nbsp;
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="TextBox3">
                </asp:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Release Order No.
                <asp:TextBox ID="rel_no" runat="server" AutoPostBack="True" 
                    OnTextChanged="rel_no_TextChanged"></asp:TextBox>
                <asp:FilteredTextBoxExtender ID="rel_no_FilteredTextBoxExtender" runat="server" 
                    Enabled="True" FilterType="Numbers" TargetControlID="rel_no">
                </asp:FilteredTextBoxExtender>
            </td>
            <td>
                in Word :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Label ID="wrd" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                Name and Address of the purchaser&nbsp;
                <asp:TextBox ID="name_add" runat="server" Height="65px" TextMode="MultiLine" 
                    Width="308px"></asp:TextBox>
            </td>
            <td class="style5">
            </td>
        </tr>
        <tr>
            <td class="style4">
                Vehicle No.&nbsp;
                <asp:TextBox ID="veh_no" runat="server"></asp:TextBox>
            </td>
            <td>
                Name of Driver
                <asp:TextBox ID="name_driver" runat="server"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <br />
    <table class="style1">
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td colspan="4">
                <asp:SqlDataSource ID="SqlDataSource11" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    InsertCommand="INSERT INTO gate_pass(challan_no, date, sno, rel_order, name_add, veh_no, name_driver, name_div, date_auc, spec, name_kind, size, no, vol, amt) VALUES (@challan_no, @date, @sno, @rel_order, @name_add, @veh_no, @name_driver, @name_div, @date_auc, @spec, @name_kind, @size, @no, @vol, @amt)" 
                    SelectCommand="SELECT * FROM [division]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="challan_no" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox3" Name="date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="srno" Name="sno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="rel_no" Name="rel_order" PropertyName="Text" />
                        <asp:ControlParameter ControlID="name_add" Name="name_add" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="veh_no" Name="veh_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="name_driver" Name="name_driver" 
                            PropertyName="Text" />
                        <asp:Parameter Name="name_div" />
                        <asp:Parameter Name="date_auc" />
                        <asp:Parameter Name="spec" />
                        <asp:Parameter Name="name_kind" />
                        <asp:Parameter Name="size" />
                        <asp:Parameter Name="no" />
                        <asp:Parameter Name="vol" />
                        <asp:Parameter Name="amt" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource12" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [gate_pass] WHERE ([challan_no] = @code)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="code" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <br />
                <asp:SqlDataSource ID="SqlDataSource13" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [tally_sheet] WHERE ([challan_no] = @code)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="code" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td colspan="2">
                <asp:Label ID="Label1" runat="server" ForeColor="#CC3300"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td colspan="8">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    ShowFooter="True" onrowcommand="GridView1_RowCommand" 
                    onrowdeleting="GridView1_RowDeleting">
                    <Columns>
                        <asp:TemplateField HeaderText="Name of Division">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList2" runat="server" 
                                    DataSourceID="SqlDataSource_div" DataTextField="div" DataValueField="div">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource_div" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [division]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="name_div" runat="server" Text='<%# Eval("name_div") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Date of Auction">
                            <FooterTemplate>
                                <asp:TextBox ID="date_auc" runat="server" Width="70px"></asp:TextBox>
                                <asp:CalendarExtender ID="date_auc_CalendarExtender" runat="server" 
                                    Enabled="True" TargetControlID="date_auc">
                                </asp:CalendarExtender>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="date_auc" runat="server" Text='<%# Eval("date_auc") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Species">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList3" runat="server" 
                                    DataSourceID="SqlDataSource_spec" DataTextField="spec" DataValueField="spec">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource_spec" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [spec]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Name and Kind">
                            <FooterTemplate>
                                <asp:TextBox ID="name_kind" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="name_kind" runat="server" Text='<%# Eval("name_kind") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Size">
                            <FooterTemplate>
                                <asp:TextBox ID="size" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="size" runat="server" Text='<%# Eval("size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No.">
                            <FooterTemplate>
                                <asp:TextBox ID="no" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="no" runat="server" Text='<%# Eval("no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol.">
                            <FooterTemplate>
                                <asp:TextBox ID="vol" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="vol" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Ammount Rs.">
                            <FooterTemplate>
                                <asp:TextBox ID="amt" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="amt" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField>
                            <FooterTemplate>
                                <asp:LinkButton ID="insert" runat="server" CommandName="insert">Add</asp:LinkButton>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:ImageButton ID="ImageButton1" runat="server" CommandName="delete" 
                                    Height="18px" ImageUrl="~/images.jpg" Width="23px" />
                            </ItemTemplate>
                        </asp:TemplateField>
                    </Columns>
                </asp:GridView>
            </td>
        </tr>
    </table>

    <br />
    <br />
                <asp:LinkButton ID="LinkButton1" runat="server" OnClick="LinkButton1_Click">Submit</asp:LinkButton>
    &nbsp;<asp:LinkButton ID="LinkButton2" runat="server" 
        onclick="LinkButton2_Click" Visible="False">Print</asp:LinkButton>
    <br />
    <br />
</asp:Content>

