<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="Basic.aspx.cs" Inherits="recurring_payment" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="Head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 500px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" Runat="Server">
    <form id="form1" runat="server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style2">
                PPO Number</td>
            <td>
                <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                <asp:Button ID="Button2" runat="server" Text="Search" onclick="Button2_Click" />
            </td>
        </tr>
        <tr>
            <td class="style2" colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#999999" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataSourceID="SqlDataSource2" GridLines="Vertical" 
                    onrowcommand="GridView1_RowCommand" onrowdatabound="GridView1_RowDataBound" 
                    ShowFooter="True" style="font-size: xx-small" DataKeyNames="id" 
                    onrowdeleting="GridView1_RowDeleting">
                    <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
                    <Columns>
                        <asp:TemplateField HeaderText="Start Date">
                        <FooterTemplate>
                         <asp:TextBox ID="TextBox1" runat="server" Width="70px"></asp:TextBox>
                                <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                                </cc1:MaskedEditExtender>
                                <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
                                </cc1:CalendarExtender>
                                </FooterTemplate>
                         <ItemTemplate>
                                <asp:Label ID="Label1" runat="server" Text='<%# Eval("Start_date") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="End Date">
                         <FooterTemplate>
                                <asp:TextBox ID="TextBox2" runat="server" Width="70px"></asp:TextBox>
                                <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                                </cc1:MaskedEditExtender>
                                <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
                                </cc1:CalendarExtender>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("End_date") %>'></asp:Label>
                            </ItemTemplate>
                        
                        </asp:TemplateField>
                       <asp:TemplateField HeaderText="PS Type" Visible="False">
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox3" runat="server" Width="33px">P1</asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("PS_Type") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="PS Area" Visible="False">
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox4" runat="server" ForeColor="Black" Width="32px">HP</asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label5" runat="server" Text='<%# Eval("PS_area") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="PS Group ">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList2" runat="server" DataSourceID="ps_group" 
                                    DataTextField="pay" DataValueField="Pay_band" AutoPostBack="True" 
                                    onselectedindexchanged="DropDownList2_SelectedIndexChanged">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="ps_group" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                                    SelectCommand="SELECT pay,pay_band FROM payband group by pay,pay_band">
                                </asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label6" runat="server" Text='<%# Eval("PS_Group") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="PS Level">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList3" runat="server" 
                                    DataTextField="grade_pay" DataValueField="PS_level">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="ps_level" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                                    
                                    SelectCommand="SELECT [PS_level],grade_pay FROM [payband] group by  [PS_level],grade_pay">
                                </asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label7" runat="server" Text='<%# Eval("PS_Level") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Wage Type">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList4" runat="server" Width="120px">
                                    <asp:ListItem>1PIB-Pay in Pay band</asp:ListItem>
                                    <asp:ListItem>1GBP-Grade Pay</asp:ListItem>
                                </asp:DropDownList>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label8" runat="server" Text='<%# Eval("Wage_type") %>'></asp:Label>
                                <asp:Label ID="Label10" runat="server" Text='<%# Eval("ppo") %>' 
                                    Visible="False"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Amount">
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox5" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label9" runat="server" Text='<%# Eval("Amount") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField>
                         <ItemTemplate>
                                <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="False" 
                                    CommandName="Delete" Text="Delete"></asp:LinkButton>
                            </ItemTemplate>
                            <FooterTemplate>
                                <asp:Button ID="Button1" runat="server" CommandName="Add" Text="Add" />
                            </FooterTemplate>
                        </asp:TemplateField>
                     <%--   <asp:TemplateField ShowHeader="False">
                            <ItemTemplate>
                                <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="False" 
                                    CommandName="Delete" Text="Delete"></asp:LinkButton>
                            </ItemTemplate>
                        </asp:TemplateField>--%>
                    </Columns>
                    <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
                    <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
                    <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
                    <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
                    <AlternatingRowStyle BackColor="#DCDCDC" />
                </asp:GridView>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT [Ppno] FROM [Joining]"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    InsertCommand="INSERT INTO basic_pat(PPO, Start_date, End_date, PS_Type, PS_area, PS_Group, PS_Level, Wage_type, Amount,User1) VALUES (@PPO, @Start_date, @End_date, @PS_Type, @PS_area, @PS_Group, @PS_Level, @Wage_type, @Amount,@User1)" 
                    
                    
                    SelectCommand="SELECT * FROM basic_pat where ppo=@ppo or  ppo='ss'" 
                    DeleteCommand="DELETE FROM basic_pat WHERE (ID = @id)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox6" Name="ppo" 
                            PropertyName="Text" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="id" />
                    </DeleteParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox6" Name="PPO" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Start_date" />
                        <asp:Parameter Name="End_date" />
                        <asp:Parameter Name="PS_Type" />
                        <asp:Parameter Name="PS_area" />
                        <asp:Parameter Name="PS_Group" />
                        <asp:Parameter Name="PS_Level" />
                        <asp:Parameter Name="Wage_type" />
                        <asp:Parameter Name="Amount" />
                        <asp:Parameter Name="User1" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    </form>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="Footer" Runat="Server">
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="AfterBody" Runat="Server">
  
</asp:Content>

