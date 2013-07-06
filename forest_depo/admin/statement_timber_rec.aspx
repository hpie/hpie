<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="statement_timber_rec.aspx.cs" Inherits="statement_timber_rec" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        timber receipt register !
    </h2>
    <p>
        &nbsp;Select Date
        <asp:TextBox ID="TextBox1" runat="server" Width="80px"></asp:TextBox>
        <asp:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
            Enabled="True" TargetControlID="TextBox1">
        </asp:CalendarExtender>
&nbsp; to&nbsp;
        <asp:TextBox ID="TextBox2" runat="server" Width="80px"></asp:TextBox>
        <br />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="TextBox1" ErrorMessage="Enter First Date" 
            ForeColor="#CC3300"></asp:RequiredFieldValidator>
&nbsp;
        <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
            ControlToValidate="TextBox2" ErrorMessage="Enter Second Date" 
            ForeColor="#CC3300"></asp:RequiredFieldValidator>
        <asp:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
            Enabled="True" TargetControlID="TextBox2">
        </asp:CalendarExtender>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT * FROM [division]"></asp:SqlDataSource><br />
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
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
            EmptyDataText="No Data Available" onrowdatabound="GridView1_RowDataBound" 
            Width="905px">
            <Columns>
                <asp:TemplateField HeaderText="1">
              
                    <ItemTemplate>
                                       
                  
                        <asp:Label ID="sr" runat="server" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
               <asp:TemplateField HeaderText="1">
              
                    <ItemTemplate>

                     <asp:Label ID="specc" runat="server" Text='<%# Eval("spec") %>' Visible="false"></asp:Label>
                    <asp:Label ID="as_no" runat="server" Text='<%# Eval("as_per_no") %>'  ></asp:Label>-
                    <asp:Label ID="as_vol" runat="server" Text='<%# Eval("as_per_vol") %>' ></asp:Label>-
                        <asp:Label ID="division" runat="server" Text='<%# Eval("division") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>

                <asp:TemplateField HeaderText="4">
                    <ItemTemplate>
                        <asp:Label ID="truck_no" runat="server" Text='<%# Eval("truck_no") %>'></asp:Label>
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
                    <asp:Label ID="Label1" runat="server" Text='<%# Eval("as_per_no") %>' Visible="false" ></asp:Label>
                    <asp:Label ID="Label2" runat="server" Text='<%# Eval("as_per_vol") %>' Visible="false"></asp:Label>
                                     <asp:Label ID="as_no" runat="server" Text='<%# Eval("as_per_no") %>' Visible="false"></asp:Label>
                    <asp:Label ID="as_vol" runat="server" Text='<%# Eval("as_per_vol") %>' Visible="false"></asp:Label>

                 <asp:Label ID="division" runat="server" Text='<%# Eval("division") %>' Visible="false"></asp:Label>
           
                        <asp:Label ID="truck_no" runat="server" Text='<%# Eval("truck_no") %>' Visible="false"></asp:Label>
                       


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
            
            
            
            
            
            
            
            
            SelectCommand="SELECT        division, truck_no, spec, sum(as_per_no) as as_per_no, sum(as_per_vol) as as_per_vol
FROM            dbo.tally_sheet
WHERE        (CONVERT(datetime, date_of_rec, 101) BETWEEN @first AND @second)
GROUP BY division, truck_no, spec
ORDER BY division">
            <SelectParameters>
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

