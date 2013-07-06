<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="timber_rec.aspx.cs" Inherits="timber_rec" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        statement of timber receipt</h2>
    <p>
        &nbsp;
        <asp:DropDownList runat="server" ID="DropDownList1" 
            DataSourceID="SqlDataSource3" DataTextField="challan_no" 
            DataValueField="challan_no" Visible="False">
        </asp:DropDownList>
&nbsp;&nbsp;<asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        <br />
        Select Date
        <asp:TextBox ID="TextBox1" runat="server" Width="80px"></asp:TextBox>
        <asp:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
            Enabled="True" TargetControlID="TextBox1">
        </asp:CalendarExtender>
&nbsp; to&nbsp;
        <asp:TextBox ID="TextBox2" runat="server" Width="80px"></asp:TextBox>
        <asp:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
            Enabled="True" TargetControlID="TextBox2">
        </asp:CalendarExtender>
        <br />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="TextBox1" ErrorMessage="Enter First Date"></asp:RequiredFieldValidator>
&nbsp;
        <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
            ControlToValidate="TextBox2" ErrorMessage="Enter Second Date"></asp:RequiredFieldValidator>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT * FROM [division]"></asp:SqlDataSource>
        &nbsp;
        <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
        <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT * FROM [gate_pass]"></asp:SqlDataSource>
    </p>

        <asp:GridView ID="GridView1" runat="server" DataSourceID="SqlDataSource1" 
            AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
            BorderStyle="None" BorderWidth="1px" CellPadding="3" 
            onrowcreated="GridView1_RowCreated" style="font-size: 8pt">
            <Columns>
                <asp:TemplateField HeaderText="1">
                    <ItemTemplate>
                        <asp:Label ID="Label1" runat="server" Text='<%# Eval("scant_no") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2">
                    <ItemTemplate>
                        <asp:Label ID="Label2" runat="server" Text='<%# Eval("name_div") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3">
                    <ItemTemplate>
                        <asp:Label ID="Label3" runat="server" 
                            Text='<%# Eval("veh_no") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.1.1">
                    <ItemTemplate>
                        <asp:Label ID="Label9" runat="server" Text='<%# Eval("deodar_811") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.1.2">
                 <ItemTemplate>
                        <asp:Label ID="Label10" runat="server" Text='<%# Eval("deodar_812") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.2.1">
                 <ItemTemplate>
                        <asp:Label ID="Label11" runat="server" Text='<%# Eval("deodar_821") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.2.2">
                 <ItemTemplate>
                        <asp:Label ID="Label12" runat="server" Text='<%# Eval("deodar_822") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.3.1">
                 <ItemTemplate>
                        <asp:Label ID="Label13" runat="server" Text='<%# Eval("deodar_831") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.3.2">
                 <ItemTemplate>
                        <asp:Label ID="Label14" runat="server" Text='<%# Eval("deodar_832") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5.1.1">
                 <ItemTemplate>
                        <asp:Label ID="Label15" runat="server" Text='<%# Eval("kail_911") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5.1.2">
                 <ItemTemplate>
                        <asp:Label ID="Label16" runat="server" Text='<%# Eval("kail_912") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5.2.1">
                 <ItemTemplate>
                        <asp:Label ID="Label17" runat="server" Text='<%# Eval("kail_921") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5.2.2">
                 <ItemTemplate>
                        <asp:Label ID="Label18" runat="server" Text='<%# Eval("kail_922") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5.3.1">
                 <ItemTemplate>
                        <asp:Label ID="Label19" runat="server" Text='<%# Eval("kail_931") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5.3.2">
                 <ItemTemplate>
                        <asp:Label ID="Label20" runat="server" Text='<%# Eval("kail_932") %>'></asp:Label>
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
    <br />
        <asp:GridView ID="GridView2" runat="server" DataSourceID="SqlDataSource1" 
        AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
    BorderStyle="None" BorderWidth="1px" CellPadding="3" 
    onrowcreated="GridView2_RowCreated" style="font-size: 8pt">
            <Columns>
                <asp:TemplateField HeaderText="6.1.1">
                 <ItemTemplate>
                        <asp:Label ID="Label21" runat="server" Text='<%# Eval("fir_1011") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6.1.2">
                 <ItemTemplate>
                        <asp:Label ID="Label22" runat="server" Text='<%# Eval("fir_1012") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6.2.1">
                 <ItemTemplate>
                        <asp:Label ID="Label23" runat="server" Text='<%# Eval("fir_1021") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6.2.2">
                 <ItemTemplate>
                        <asp:Label ID="Label24" runat="server" Text='<%# Eval("fir_1022") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6.3.1">
                 <ItemTemplate>
                        <asp:Label ID="Label25" runat="server" Text='<%# Eval("fir_1031") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6.3.2">
                 <ItemTemplate>
                        <asp:Label ID="Label26" runat="server" Text='<%# Eval("fir_1032") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7.1.1">
                 <ItemTemplate>
                        <asp:Label ID="Label27" runat="server" Text='<%# Eval("chil_1111") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7.1.2">
                 <ItemTemplate>
                        <asp:Label ID="Label28" runat="server" Text='<%# Eval("chil_1112") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7.2.1">
                 <ItemTemplate>
                        <asp:Label ID="Label29" runat="server" Text='<%# Eval("chil_1121") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7.2.2">
                 <ItemTemplate>
                        <asp:Label ID="Label30" runat="server" Text='<%# Eval("chil_1122") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7.3.1">
                 <ItemTemplate>
                        <asp:Label ID="Label31" runat="server" Text='<%# Eval("chil_1131") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7.3.2">
                 <ItemTemplate>
                        <asp:Label ID="Label32" runat="server" Text='<%# Eval("chil_1132") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.1.1">
                 <ItemTemplate>
                        <asp:Label ID="Label33" runat="server" Text='<%# Eval("other_1211") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.1.2">
                 <ItemTemplate>
                        <asp:Label ID="Label34" runat="server" Text='<%# Eval("other_1212") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.2.1">
                 <ItemTemplate>
                        <asp:Label ID="Label35" runat="server" Text='<%# Eval("other_1221") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.2.2">
                 <ItemTemplate>
                        <asp:Label ID="Label36" runat="server" Text='<%# Eval("other_1222") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.3.1">
                 <ItemTemplate>
                        <asp:Label ID="Label37" runat="server" Text='<%# Eval("other_1231") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.3.2">
                 <ItemTemplate>
                        <asp:Label ID="Label38" runat="server" Text='<%# Eval("other_1232") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.1.1">
                 <ItemTemplate>
                        <asp:Label ID="Label39" runat="server" Text='<%# Eval("total_1311") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.1.2">
                 <ItemTemplate>
                        <asp:Label ID="Label40" runat="server" Text='<%# Eval("total_1312") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.2.1">
                 <ItemTemplate>
                        <asp:Label ID="Label41" runat="server" Text='<%# Eval("total_1321") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.2.2">
                 <ItemTemplate>
                        <asp:Label ID="Label42" runat="server" Text='<%# Eval("total_1322") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.3.1">
                
                 <ItemTemplate>
                        <asp:Label ID="Label43" runat="server" Text='<%# Eval("total_1331") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.3.2">
                 <ItemTemplate>
                        <asp:Label ID="Label44" runat="server" Text='<%# Eval("total_1332") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10">
                 <ItemTemplate>
                        <asp:Label ID="Label45" runat="server" Text='<%# Eval("remarks") %>'></asp:Label>
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
    <br />
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            
        
        
        
        SelectCommand="SELECT gate_pass.code, gate_pass.challan_no, gate_pass.date, gate_pass.sno, gate_pass.rel_order, gate_pass.name_add, gate_pass.veh_no, gate_pass.name_driver, gate_pass.name_div, gate_pass.date_auc, gate_pass.spec, gate_pass.name_kind, gate_pass.size, gate_pass.no, gate_pass.vol, gate_pass.amt, tally_sheet.code AS Expr1, tally_sheet.scant_no, tally_sheet.lot_no, tally_sheet.date_of_chl, tally_sheet.spec AS Expr2, tally_sheet.size AS Expr3, tally_sheet.grade, tally_sheet.stack, tally_sheet.remarks, tally_sheet.date_of_rec, tally_sheet.challan_no AS Expr4, spec_type.code AS Expr7, spec_type.deodar_811, spec_type.deodar_812, spec_type.deodar_821, spec_type.deodar_822, spec_type.deodar_831, spec_type.deodar_832, spec_type.kail_911, spec_type.kail_912, spec_type.kail_921, spec_type.kail_922, spec_type.kail_931, spec_type.kail_932, spec_type.fir_1011, spec_type.fir_1012, spec_type.fir_1021, spec_type.fir_1031, spec_type.fir_1032, spec_type.chil_1111, spec_type.chil_1112, spec_type.chil_1121, spec_type.chil_1122, spec_type.chil_1131, spec_type.chil_1132, spec_type.other_1211, spec_type.other_1212, spec_type.other_1221, spec_type.other_1222, spec_type.other_1231, spec_type.other_1232, spec_type.total_1311, spec_type.total_1312, spec_type.total_1321, spec_type.total_1322, spec_type.total_1331, spec_type.total_1332, spec_type.remarks AS Expr8, spec_type.challan_no AS Expr9, spec_type.fir_1022, tally_sheet.division, spec.code AS Expr5 FROM gate_pass INNER JOIN tally_sheet ON gate_pass.challan_no = tally_sheet.challan_no INNER JOIN spec ON tally_sheet.spec = spec.spec CROSS JOIN spec_type WHERE (CONVERT (datetime, tally_sheet.date_of_chl, 101) BETWEEN @first AND @second)">
            <SelectParameters>
                <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
            </SelectParameters>
        </asp:SqlDataSource>
    </asp:Content>

