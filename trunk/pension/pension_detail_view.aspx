<%@ Page Language="C#" AutoEventWireup="true" CodeFile="pension_detail_view.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="Joining_view" %>

<asp:Content ID="Content1" runat="server" contentplaceholderid="Content">


        <form id="form1" runat="server">
        <asp:Panel ID="Panel1" runat="server" Height="400px" 
                       Width="100%" ScrollBars="Both">
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Excel</asp:LinkButton>
            <br />
            <table cellpadding="0" cellspacing="0" class="style1">
                <tr>
                    <td class="style2">
                        Enter&nbsp; PPO No</td>
                    <td>
                        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
                    </td>
                </tr>
                <tr>
                    <td class="style2">
                        &nbsp;</td>
                    <td>
                        <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="View" />
                    </td>
                </tr>
            </table>
            <br />
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" 
                BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                onrowdatabound="GridView1_RowDataBound" Width="100%">
                <RowStyle ForeColor="#000066" />
                <Columns>
                    <asp:TemplateField HeaderText="Sr.">
                    <ItemTemplate>
                    <%#sr %>
                    </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="panno" HeaderText="PAN Number" 
                        SortExpression="panno" />
                    <asp:BoundField DataField="ppno" HeaderText="PPO Number" 
                        SortExpression="ppno" />
                    <asp:BoundField DataField="Last" HeaderText="Last" SortExpression="Last" />
                    <asp:BoundField DataField="First" HeaderText="First" SortExpression="First" />
                    <asp:TemplateField HeaderText="Date Of Birth">
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("birthdate") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Personnel Number"></asp:TemplateField>
                    <asp:TemplateField HeaderText="Start Date">
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Eval("Start_date") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="End Date">
                        <ItemTemplate>
                            <asp:Label ID="Label3" runat="server" Text='<%# Eval("End_date") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Status">
                        <ItemTemplate>
                            <asp:Label ID="Label4" runat="server" Text='<%# Eval("status") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Family Member">
                        <ItemTemplate>
                            <asp:Label ID="Label5" runat="server" Text='<%# Eval("family_member") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="First name">
                        <ItemTemplate>
                            <asp:Label ID="Label6" runat="server" Text='<%# Eval("FFrist") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Last name">
                        <ItemTemplate>
                            <asp:Label ID="Label7" runat="server" Text='<%# Eval("Flast") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Birth date">
                        <ItemTemplate>
                            <asp:Label ID="Label8" runat="server" Text='<%# Eval("fbirth_date") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="ank Option Opted">
                        <ItemTemplate>
                            <asp:Label ID="Label9" runat="server" Text='<%#Eval("Bank_option") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Name of Bank/ Treasu">
                        <ItemTemplate>
                            <asp:Label ID="Label10" runat="server" Text='<%# Eval("bank_name") %>'></asp:Label>
                            &nbsp;<asp:Label ID="Label11" runat="server" Text='<%# Eval("bank_city") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Name of DDO/Branch">
                        <ItemTemplate>
                            <asp:Label ID="Label12" runat="server" Text='<%# Eval("Bank_branch") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Personnel area">
                        <ItemTemplate>
                            <asp:Label ID="Label13" runat="server" Text='<%# Eval("Personnal_area") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Medical allowance Op">
                        <ItemTemplate>
                            <asp:Label ID="Label14" runat="server" Text='<%# Eval("medical_all") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Commutation Percentage">
                        <ItemTemplate>
                            <asp:Label ID="Label15" runat="server" Text='<%# Eval("comm_per") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Proposed Retirement Date">
                        <ItemTemplate>
                            <asp:Label ID="Label16" runat="server" Text='<%# Eval("retirment") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Qualifying Service – YY">
                        <ItemTemplate>
                            <asp:Label ID="Label17" runat="server" Text='<%# Eval("quali_service_yy") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Qualifying Service-MM">
                        <ItemTemplate>
                            <asp:Label ID="Label18" runat="server" Text='<%# Eval("quali_service_mm") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Qualifying Service-DD">
                        <ItemTemplate>
                            <asp:Label ID="Label19" runat="server" Text='<%# Eval("quali_service_dd") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Six Monthy H Y">
                        <ItemTemplate>
                            <asp:Label ID="Label20" runat="server" Text='<%# Eval("six_month") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Pay Scale as on 01.01.1996">
                        <ItemTemplate>
                            <asp:Label ID="Label21" runat="server" Text='<%# Eval("pay_scale") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Existing Pension w/o 50 % DR as on 31.12.2005">
                        <ItemTemplate>
                            <asp:Label ID="Label22" runat="server" Text='<%# Eval("exst_pension") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Revised Pay Scale Group Range">
                        <ItemTemplate>
                            <asp:Label ID="Label23" runat="server" Text='<%# Eval("revi_scal") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Revised Pay Scale Level Amt">
                        <ItemTemplate>
                            <asp:Label ID="Label24" runat="server" Text='<%# Eval("rev_amt") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="50% of min of Rev Pay Scale">
                        <ItemTemplate>
                            <asp:Label ID="Label25" runat="server" Text='<%# Eval("rev_pay_scale") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Consol Pension">
                        <ItemTemplate>
                            <asp:Label ID="Label26" runat="server" Text='<%# Eval("con_pension") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Revised Pension as on 01.01.2006">
                        <ItemTemplate>
                            <asp:Label ID="Label27" runat="server" Text='<%# Eval("rev_pension") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Additional Pension">
                        <ItemTemplate>
                            <asp:Label ID="Label28" runat="server" Text='<%# Eval("add_pension") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Pension as on 01.01.2006">
                        <ItemTemplate>
                            <asp:Label ID="Label29" runat="server" Text='<%# Eval("pension") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Existing Family Pension w/o 50 % DR as on 31.12.2005">
                        <ItemTemplate>
                            <asp:Label ID="Label30" runat="server" Text='<%# Eval("ext_pension") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Family Pension consol as on 01.01.2006">
                        <ItemTemplate>
                            <asp:Label ID="Label31" runat="server" Text='<%# Eval("fam_pension") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="30% of min PB+ GP">
                        <ItemTemplate>
                            <asp:Label ID="Label32" runat="server" Text='<%# Eval("pb_gp") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="FP authorised as on 01.01.2006">
                        <ItemTemplate>
                            <asp:Label ID="Label33" runat="server" Text='<%# Eval("fp_au") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Additional F/Pension">
                        <ItemTemplate>
                            <asp:Label ID="Label34" runat="server" Text='<%# Eval("addtion_pn") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                </Columns>
                <FooterStyle BackColor="White" ForeColor="#000066" />
                <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
            </asp:GridView>
            </asp:Panel>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>"></asp:SqlDataSource>
        </p>
    </form>
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="Head">
    <style type="text/css">
        .style1
        {
            width: 500px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 176px;
        }
    </style>
</asp:Content>

