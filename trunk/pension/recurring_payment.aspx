<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="recurring_payment.aspx.cs" Inherits="recurring_payment" Title="Untitled Page" %>

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
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Search" />
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
                        <asp:TemplateField HeaderText="Start Date ">
                            <ItemTemplate>
                                <asp:Label ID="Label1" runat="server" Text='<%#Eval("Start_date") %>'></asp:Label>
                            </ItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox1" runat="server" Width="90px"></asp:TextBox>
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
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="End Date">
                            <ItemTemplate>
                                <asp:Label ID="Label2" runat="server" Text='<%#Eval("End_date") %>'></asp:Label>
                            </ItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox2" runat="server" Width="90px"></asp:TextBox>
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
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Wage Type">
                            <ItemTemplate>
                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("Wage_Type") %>'></asp:Label>
                            </ItemTemplate>
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList2" runat="server" 
                                    DataSourceID="SqlDataSource1" DataTextField="Wage_text" 
                                    DataValueField="Wage_text">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                                    SelectCommand="SELECT * FROM [WageType] order by id1"></asp:SqlDataSource>
                            </FooterTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Amount">
                            <ItemTemplate>
                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("amount") %>'></asp:Label>
                            </ItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox3" runat="server" Width="90px"></asp:TextBox>
                            </FooterTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Remarks">
                            <ItemTemplate>
                                <asp:Label ID="Label5" runat="server" Text='<%# Eval("remarks") %>'></asp:Label>
                            </ItemTemplate>
                            <FooterTemplate>
                                <asp:TextBox ID="TextBox4" runat="server" TextMode="MultiLine" Width="93px"></asp:TextBox>
                                <asp:Button ID="Button1" runat="server" CommandName="Add" Text="Add" />
                            </FooterTemplate>
                        </asp:TemplateField>
                        <asp:CommandField ShowDeleteButton="True" />
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
                    InsertCommand="INSERT INTO Deduction(PPO, Start_Date, End_Date, Wage_Type, Amount, Remarks,User1) VALUES (@PPO, @Start_Date, @End_Date, @Wage_Type, @Amount, @Remarks,@User1)" 
                    
                    
                    
                    
                    SelectCommand="SELECT ID, PPO, PAN, CPS, Last, First, Birth_date, Personnel_no, Start_Date, End_Date, Wage_Type, Amount, Remarks FROM Deduction where ppo=@ppo or remarks='ss'" 
                    DeleteCommand="DELETE FROM Deduction WHERE (ID = @id)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox5" Name="ppo" 
                            PropertyName="Text" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="id" />
                    </DeleteParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox5" Name="PPO" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Start_Date" />
                        <asp:Parameter Name="End_Date" />
                        <asp:Parameter Name="Wage_Type" />
                        <asp:Parameter Name="Amount" />
                        <asp:Parameter Name="Remarks" />
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

