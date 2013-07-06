<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="basicpay.aspx.cs" Inherits="basicpay" Title="Untitled Page" %>

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
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                PPO No.</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="Ppno" DataValueField="Ppno" 
                    AutoPostBack="True" onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style2" colspan="2">
                <br />
                <asp:GridView ID="GridView3" runat="server" AutoGenerateColumns="False" 
                    DataSourceID="SqlDataSource3" onrowcommand="GridView3_RowCommand" 
                    onrowdatabound="GridView3_RowDataBound" ShowFooter="True">
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
                       <asp:TemplateField HeaderText="PS Type">
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox3" runat="server" Width="33px">P1</asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("PS_Type") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="PS Area">
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
                                    DataTextField="Pay_band" DataValueField="Pay_band">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="ps_group" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                                    SelectCommand="SELECT Pay_band FROM payband group by pay_band">
                                </asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="Label6" runat="server" Text='<%# Eval("PS_Group") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="PS Level">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList3" runat="server" DataSourceID="ps_level" 
                                    DataTextField="PS_level" DataValueField="PS_level">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="ps_level" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                                    SelectCommand="SELECT [PS_level] FROM [payband] group by ps_level">
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
                            <FooterTemplate>
                                <asp:Button ID="Button1" runat="server" CommandName="Add" Text="Add" />
                            </FooterTemplate>
                        </asp:TemplateField>
                    </Columns>
                    <FooterStyle BackColor="White" ForeColor="#000066" />
                    <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                    <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                    <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
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
                    InsertCommand="INSERT INTO basic_pat(PPO, Start_date, End_date, PS_Type, PS_area, PS_Group, PS_Level, Wage_type, Amount) VALUES (@PPO, @Start_date, @End_date, @PS_Type, @PS_area, @PS_Group, @PS_Level, @Wage_type, @Amount)" 
                    
                    SelectCommand="SELECT ID, PPO, Panno, GPF, CPS, Last, First, Date_of_birth, PA, Start_date, End_date, PS_Type, PS_area, PS_Group, PS_Level, Wage_type, Amount FROM basic_pat where ppo=@ppo or ppo='ss'">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="ppo" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="PPO" 
                            PropertyName="SelectedValue" />
                        <asp:Parameter Name="Start_date" />
                        <asp:Parameter Name="End_date" />
                        <asp:Parameter Name="PS_Type" />
                        <asp:Parameter Name="PS_area" />
                        <asp:Parameter Name="PS_Group" />
                        <asp:Parameter Name="PS_Level" />
                        <asp:Parameter Name="Wage_type" />
                        <asp:Parameter Name="Amount" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    InsertCommand="INSERT INTO basic_pat(PPO, Start_date, End_date, PS_Type, PS_area, PS_Group, PS_Level, Wage_type, Amount) VALUES (@PPO, @Start_date, @End_date, @PS_Type, @PS_area, @PS_Group, @PS_Level, @Wage_type, @Amount)" SelectCommand="SELECT * FROM [basic_pat]
 where ppo=@ppo or ppo='ss'">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="ppo" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="PPO" 
                            PropertyName="SelectedValue" />
                        <asp:Parameter Name="Start_date" />
                        <asp:Parameter Name="End_date" />
                        <asp:Parameter Name="PS_Type" />
                        <asp:Parameter Name="PS_area" />
                        <asp:Parameter Name="PS_Group" />
                        <asp:Parameter Name="PS_Level" />
                        <asp:Parameter Name="Wage_type" />
                        <asp:Parameter Name="Amount" />
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

