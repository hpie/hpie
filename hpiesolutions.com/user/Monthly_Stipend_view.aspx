<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="Monthly_Stipend_view.aspx.cs" Inherits="user_Monthly_Stipend" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 885px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Monthly Stipend</div>
    <table class="style1">
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
       <tr>
            <td>
                Project Code</td>
            <td>
                                         <asp:DropDownList ID="p_code" runat="server" DataSourceID="SqlDataSource6" 
                                             DataTextField="project_name" 
                    DataValueField="code" CssClass="ttxt2">
                                         </asp:DropDownList>
                                         <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                                             ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                             SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Course Name</td>
            <td>
                <asp:DropDownList ID="c_name" runat="server" CssClass="ttxt2" DataTextField="course_name" 
                    DataValueField="code" 
                    onselectedindexchanged="c_name_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Date</td>
            <td>
            <asp:DropDownList ID="mont" runat="server" CssClass="ttxt2">
                <asp:ListItem Value="1">Jan</asp:ListItem>
                <asp:ListItem Value="2">Feb</asp:ListItem>
                <asp:ListItem Value="3">Mar</asp:ListItem>
                <asp:ListItem Value="4">Apr</asp:ListItem>
                <asp:ListItem Value="5">May</asp:ListItem>
                <asp:ListItem Value="6">Jun</asp:ListItem>
                <asp:ListItem Value="7">Jul</asp:ListItem>
                <asp:ListItem Value="8">Aug</asp:ListItem>
                <asp:ListItem Value="9">Sep</asp:ListItem>
                <asp:ListItem Value="10">Oct</asp:ListItem>
                <asp:ListItem Value="11">Nov</asp:ListItem>
                <asp:ListItem Value="12">Dec</asp:ListItem>
            </asp:DropDownList>
                <asp:DropDownList ID="yers" runat="server" CssClass="ttxt2">
            </asp:DropDownList>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            &nbsp;<asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">Export</asp:LinkButton>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                
                    InsertCommand="INSERT INTO monthly_stipend(project_code, course_code, center_code, date, p_name, f_name, s_code, categ, monthly_stip, tot_days, pre_days, per, tot_stip) VALUES (@project_code, @course_code, @center_code, @date, @p_name, @f_name, @s_code, @categ, @monthly_stip, @tot_days, @pre_days, @per, @tot_stip)">
                <InsertParameters>
                    <asp:ControlParameter ControlID="p_code" Name="project_code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="c_name" Name="course_code" 
                        PropertyName="SelectedValue" />
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:Parameter Name="date" />
                    <asp:Parameter Name="p_name" />
                    <asp:Parameter Name="f_name" />
                    <asp:Parameter Name="s_code" />
                    <asp:Parameter Name="categ" />
                    <asp:Parameter Name="monthly_stip" />
                    <asp:Parameter Name="tot_days" />
                    <asp:Parameter Name="pre_days" />
                    <asp:Parameter Name="per" />
                    <asp:Parameter Name="tot_stip" />
                </InsertParameters>
                <SelectParameters>
                    <asp:Parameter Name="first" />
                    <asp:Parameter Name="second" />
                    <asp:ControlParameter ControlID="c_name" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:SessionParameter Name="code" SessionField="start_a" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                
                    InsertCommand="INSERT INTO monthly_atten(center_code, course, s_id, name, f_name, categ, tot_days, p_days, abs, per, mont, year, date, date_act, project_code) VALUES (@center_code, @course, @s_id, @name, @f_name, @categ, @tot_days, @p_days, @abs, @per, @mont, @year, @date, @date_act, @project_code)" 
                    
                    SelectCommand="SELECT * FROM monthly_stipend where s_code=@s_code and date between @first and @last">
                <InsertParameters>
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:ControlParameter ControlID="course" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="s_id" />
                    <asp:Parameter Name="name" />
                    <asp:Parameter Name="f_name" />
                    <asp:Parameter Name="categ" />
                    <asp:Parameter Name="tot_days" />
                    <asp:Parameter Name="p_days" />
                    <asp:Parameter Name="abs" />
                    <asp:Parameter Name="per" />
                    <asp:ControlParameter ControlID="mont" Name="mont" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="yers" Name="year" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="date" />
                    <asp:Parameter Name="date_act" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" />
                </InsertParameters>
                <SelectParameters>
                    <asp:Parameter Name="s_code" />
                    <asp:Parameter Name="first" />
                    <asp:Parameter Name="last" />
                </SelectParameters>
            </asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
            <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                CellPadding="3" Height="133px" Width="912px" 
                EmptyDataText="----No Record Available----" 
                    onrowdatabound="GridView2_RowDataBound" ShowFooter="True">
                <Columns>
                 <asp:TemplateField HeaderText="Sr.No.">
        <ItemTemplate>
             <%#Container.DataItemIndex+1 %>
        </ItemTemplate>
    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Student ID">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Bind("s_code") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Participant Name" SortExpression="s_name">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Bind("p_name") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Father Name" SortExpression="s_f_name">
                      
                        <ItemTemplate>
                            <asp:Label ID="Label3" runat="server" Text='<%# Bind("f_name") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Category" SortExpression="social_status">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label4" runat="server" Text='<%# Bind("categ") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Monthly Stipend">
                        <FooterTemplate>
                            <asp:Label ID="month_stip_f" runat="server" ></asp:Label>
                        </FooterTemplate>
                        <ItemTemplate>
                            <asp:Label ID="month_stip" runat="server" Text='<%# Eval("monthly_stip") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Total Days">
                        <ItemTemplate>
                            <asp:Label ID="tot_days" runat="server" Text='<%# Eval("tot_days") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Present Days">
                        <ItemTemplate>
                            <asp:Label ID="Label5" runat="server" Text='<%# Eval("pre_days") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                  <%--  <asp:TemplateField HeaderText="Absent">
                        <ItemTemplate>
                            <asp:Label ID="Label6" runat="server" Text='<%# Eval("abs") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>--%>
                    <asp:TemplateField HeaderText="%Age">
                        <ItemTemplate>
                            <asp:Label ID="per" runat="server" Text='<%# Eval("per") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Total Stipend">
                        <FooterTemplate>
                            <asp:Label ID="tot_stip_f" runat="server"></asp:Label>
                        </FooterTemplate>
                        <ItemTemplate>
                            <asp:Label ID="tot_stip" runat="server" Text='<%# Eval("tot_stip") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                </Columns>
                <FooterStyle BackColor="White" ForeColor="#000066" Font-Bold="True" />
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
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataSourceID="SqlDataSource1" Visible="False" Width="876px">
                    <Columns>
                        <asp:BoundField DataField="p_name" HeaderText="Participant Name" 
                            SortExpression="p_name" />
                        <asp:BoundField DataField="f_name" HeaderText="Father Name" 
                            SortExpression="f_name" />
                        <asp:BoundField DataField="categ" HeaderText="Category" 
                            SortExpression="categ" />
                        <asp:BoundField DataField="monthly_stip" HeaderText="Monthly Stipend" 
                            SortExpression="monthly_stip" />
                        <asp:BoundField DataField="tot_days" HeaderText="Total Days" 
                            SortExpression="tot_days" />
                        <asp:BoundField DataField="pre_days" HeaderText="Present Days" 
                            SortExpression="pre_days" />
                        <asp:BoundField DataField="per" HeaderText="%Age" SortExpression="per" />
                        <asp:BoundField DataField="tot_stip" HeaderText="Total Stipend" 
                            SortExpression="tot_stip" />
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
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [monthly_stipend]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click" 
                    Visible="False">Submit</asp:LinkButton>
&nbsp;<asp:Label ID="Label7" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

