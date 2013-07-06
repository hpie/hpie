<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="receipt_register.aspx.cs" Inherits="receipt_register" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        timber receipt register !
    </h2>
    <p>
        &nbsp;<asp:DropDownList runat="server" ID="DropDownList1" 
            DataSourceID="SqlDataSource3" DataTextField="challan_no" 
            DataValueField="challan_no" Visible="False">
        </asp:DropDownList>
&nbsp;<br />
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        <br />
        Name of FWD-<asp:DropDownList ID="DropDownList2" runat="server" 
            DataSourceID="SqlDataSource2" DataTextField="div" DataValueField="div">
        </asp:DropDownList>
        <br />
        <br />
        Select Date
        <asp:TextBox ID="TextBox1" runat="server" Width="80px"></asp:TextBox>
        <asp:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
            Enabled="True" TargetControlID="TextBox1">
        </asp:CalendarExtender>
&nbsp; to&nbsp;
        <asp:TextBox ID="TextBox2" runat="server" Width="80px"></asp:TextBox>
        <br />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="TextBox1" ErrorMessage="Enter First Date"></asp:RequiredFieldValidator>
&nbsp;
        <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
            ControlToValidate="TextBox2" ErrorMessage="Enter Second Date"></asp:RequiredFieldValidator>
        <asp:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
            Enabled="True" TargetControlID="TextBox2">
        </asp:CalendarExtender>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT * FROM [division]"></asp:SqlDataSource><br />
        <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
        <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT * FROM [gate_pass]"></asp:SqlDataSource>
    </p>
    <p>
        <asp:GridView ID="GridView1" runat="server" DataSourceID="SqlDataSource1" 
            AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
            BorderStyle="None" BorderWidth="1px" CellPadding="3" 
            onrowcreated="GridView1_RowCreated" style="font-size: 8pt" 
            EmptyDataText="No Data Available" onrowdatabound="GridView1_RowDataBound">
            <Columns>
                <asp:TemplateField HeaderText="1">
                    <FooterTemplate>
                        <asp:SqlDataSource ID="tes" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                            SelectCommand="SELECT * FROM [auc_sale_list]"></asp:SqlDataSource>
                        <asp:SqlDataSource ID="SqlDataSource1" runat="server"></asp:SqlDataSource>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="sr" runat="server" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2">
                    <ItemTemplate>
                    <asp:Label ID="specc" runat="server" Text='<%# Eval("spec") %>' Visible="false"></asp:Label>
                    <asp:Label ID="as_no" runat="server" Text='<%# Eval("as_per_no") %>' Visible="false" ></asp:Label>
                    <asp:Label ID="as_vol" runat="server" Text='<%# Eval("as_per_vol") %>' Visible="false"></asp:Label>

                   <%--  <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>' Visible="false"></asp:Label>--%>
                        <asp:Label ID="Label2" runat="server" Text='<%# Eval("challan_no") %>'></asp:Label>
                        &nbsp;&amp;&nbsp;
                        <asp:Label ID="Label4" runat="server" Text='<%# Eval("date_of_chl", "{0:d}") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3">
                    <ItemTemplate>
                        <asp:Label ID="Label3" runat="server" 
                            Text='<%# Eval("date_of_rec", "{0:d}") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4">
                    <ItemTemplate>
                        <asp:Label ID="Label5" runat="server" Text='<%# Eval("truck_no") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5">
                    <ItemTemplate>
                        <asp:Label ID="lot_no" runat="server" Text='<%# Eval("lot_no") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6">
                    <ItemTemplate>
                        <asp:Label ID="kind" runat="server" Text='<%# Eval("kind") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7">
                    <ItemTemplate>
                        <asp:Label ID="Label8" runat="server" Text='<%# Eval("size_type") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.1.1">
                    <ItemTemplate>
                        <asp:Label ID="deo_2" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.1.2">
                 <ItemTemplate>
                        <asp:Label ID="deo_1" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.2.1">
                 <ItemTemplate>
                        <asp:Label ID="deo_4" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.2.2">
                 <ItemTemplate>
                        <asp:Label ID="deo_3" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.3.1">
                 <ItemTemplate>
                        <asp:Label ID="deo_d2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8.3.2">
                 <ItemTemplate>
                        <asp:Label ID="deo_d1" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.1.1">
                 <ItemTemplate>
                        <asp:Label ID="kail_2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.1.2">
                 <ItemTemplate>
                        <asp:Label ID="kail_1" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.2.1">
                 <ItemTemplate>
                        <asp:Label ID="kail_4" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.2.2">
                 <ItemTemplate>
                        <asp:Label ID="kail_3" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.3.1">
                 <ItemTemplate>
                        <asp:Label ID="kail_d2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9.3.2">
                 <ItemTemplate>
                        <asp:Label ID="kail_d1" runat="server" Text="0"></asp:Label>
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
    </p>
        <asp:GridView ID="GridView2" runat="server" DataSourceID="SqlDataSource1" 
        AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
    BorderStyle="None" BorderWidth="1px" CellPadding="3" 
    onrowcreated="GridView2_RowCreated" style="font-size: 8pt" 
        EmptyDataText="No Data Available" onrowdatabound="GridView2_RowDataBound">
            <Columns>

<%--
              <asp:TemplateField HeaderText="2">
                    <ItemTemplate>
                     <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>' Visible="false"></asp:Label>
                        <asp:Label ID="Label2" runat="server" Text='<%# Eval("challan_no") %>'></asp:Label>
                        &nbsp;&amp;&nbsp;
                        <asp:Label ID="Label4" runat="server" Text='<%# Eval("date_of_chl", "{0:d}") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>--%>


                <asp:TemplateField HeaderText="10.1.1">
                 <ItemTemplate>
                 <asp:Label ID="specc" runat="server" Text='<%# Eval("spec") %>' Visible="false"></asp:Label>
                   <asp:Label ID="as_no" runat="server" Text='<%# Eval("as_per_no") %>' Visible="false"></asp:Label>
                    <asp:Label ID="as_vol" runat="server" Text='<%# Eval("as_per_vol") %>' Visible="false"></asp:Label>

                 <asp:Label ID="Label8" runat="server" Text='<%# Eval("size_type") %>' Visible="false"></asp:Label>
             <%--     <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>' Visible="false"></asp:Label>--%>
                        <asp:Label ID="Label2" runat="server" Text='<%# Eval("challan_no") %>' Visible="false"></asp:Label>
                        <asp:Label ID="chl_date" runat="server" Text='<%# Eval("date_of_chl") %>' Visible="false"></asp:Label>
                        <asp:Label ID="rec_date" runat="server" Text='<%# Eval("date_of_rec") %>' Visible="false"></asp:Label>
                        <asp:Label ID="lot_no" runat="server" Text='<%# Eval("lot_no") %>' Visible="false"></asp:Label>
                        <asp:Label ID="kind" runat="server" Text='<%# Eval("kind") %>' Visible="false"></asp:Label>
                        <asp:Label ID="size_type" runat="server" Text='<%# Eval("size_type") %>' Visible="false"></asp:Label>


                        <asp:Label ID="fir_2" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.1.2">
                 <ItemTemplate>
                        <asp:Label ID="fir_1" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.2.1">
                 <ItemTemplate>
                        <asp:Label ID="fir_4" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.2.2">
                 <ItemTemplate>
                        <asp:Label ID="fir_3" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.3.1">
                 <ItemTemplate>
                        <asp:Label ID="fir_d2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.3.2">
                 <ItemTemplate>
                        <asp:Label ID="fir_d1" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.1.1">
                 <ItemTemplate>
                        <asp:Label ID="chil_2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.1.2">
                 <ItemTemplate>
                        <asp:Label ID="chil_1" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.2.1">
                 <ItemTemplate>
                        <asp:Label ID="chil_4" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.2.2">
                 <ItemTemplate>
                        <asp:Label ID="chil_3" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.3.1">
                 <ItemTemplate>
                        <asp:Label ID="chil_d2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.3.2">
                 <ItemTemplate>
                        <asp:Label ID="chil_d1" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.1.1">
                 <ItemTemplate>
                        <asp:Label ID="other_2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.1.2">
                 <ItemTemplate>
                        <asp:Label ID="other_1" runat="server" Text="0" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.2.1">
                 <ItemTemplate>
                        <asp:Label ID="other_4" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.2.2">
                 <ItemTemplate>
                        <asp:Label ID="other_3" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.3.1">
                 <ItemTemplate>
                        <asp:Label ID="other_d2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.3.2">
                 <ItemTemplate>
                        <asp:Label ID="other_d1" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.1.1">
                 <ItemTemplate>
                        <asp:Label ID="tot_2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.1.2">
                 <ItemTemplate>
                        <asp:Label ID="tot_1" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.2.1">
                 <ItemTemplate>
                        <asp:Label ID="tot_4" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.2.2">
                 <ItemTemplate>
                        <asp:Label ID="tot_3" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.3.1">
                
                 <ItemTemplate>
                        <asp:Label ID="tot_d2" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.3.2">
                 <ItemTemplate>
                        <asp:Label ID="tot_d1" runat="server" Text="0"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="14">
                 <ItemTemplate>
                    <%--    <asp:Label ID="Label20" runat="server" Text='<%# Eval("remarks") %>'></asp:Label>--%>
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
    <p>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            
            
            
            
            
            
            
            
            SelectCommand="SELECT        challan_no, date_of_chl, date_of_rec, truck_no, lot_no, kind, spec, size_type, sum(as_per_no) as as_per_no, sum(as_per_vol) as as_per_vol
FROM            dbo.tally_sheet
WHERE        (division = @division) AND (CONVERT(datetime, date_of_rec, 101) BETWEEN @first AND @second)
GROUP BY challan_no, date_of_chl, date_of_rec, truck_no, lot_no, kind, spec, size_type
ORDER BY challan_no">
            <SelectParameters>
                <asp:ControlParameter ControlID="DropDownList2" Name="division" 
                    PropertyName="SelectedValue" />
                <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
            </SelectParameters>
        </asp:SqlDataSource>
        <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT [size_type] FROM [tally_sheet] group by size_type">
        </asp:SqlDataSource>
    </p>
</asp:Content>

