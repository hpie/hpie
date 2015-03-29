<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="tracking_detail.aspx.cs" Inherits="user_tracking_detail" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 935px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Tracking Details</div>
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
                <asp:DropDownList ID="c_name" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource5" DataTextField="course_name" 
                    DataValueField="code" AutoPostBack="True" 
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
                Student Code</td>
            <td>
            <asp:DropDownList ID="s_code" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource4" DataTextField="s_code" 
                   DataValueField="s_code" 
                   onselectedindexchanged="s_code_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   
                    SelectCommand="SELECT * FROM [tracking] WHERE ([course] = @course) and(center_code=@code)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="c_name" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:SessionParameter Name="code" SessionField="start_a" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   
                   SelectCommand="SELECT * FROM [student_detail] WHERE (([course] = @course) and([s_id_main]=@id))" 
                   
                   
                   InsertCommand="INSERT INTO tracking(s_code, batch_no, c_contact_no, l_contact_date, c_comp_name, c_comp_add, city, c_per_name, c_e_contact_no, j_date, desig, salary, mode_of_cotr, tracking_status, work_status, per_contacted, relation, remarks, name_of_tracker, categ_of_tracker, comm_of_tracker, center_code, date, project_code, course) VALUES (@s_code, @batch_no, @c_contact_no, @l_contact_date, @c_comp_name, @c_comp_add, @city, @c_per_name, @c_e_contact_no, @j_date, @desig, @salary, @mode_of_cotr, @tracking_status, @work_status, @per_contacted, @relation, @remarks, @name_of_tracker, @categ_of_tracker, @comm_of_tracker, @center_code, @date, @project_code, @course)" 
                   
                   
                    
                    UpdateCommand="UPDATE student_detail SET tr_com_date =@date, tr_status =@status where s_id_main=@id">
                <InsertParameters>
                    <asp:ControlParameter ControlID="s_code" Name="s_code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="batch_no" Name="batch_no" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_contact_no" Name="c_contact_no" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="l_contact_date" Name="l_contact_date" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_comp_name" Name="c_comp_name" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_comp_add" Name="c_comp_add" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="city" Name="city" PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_per_name" Name="c_per_name" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_e_contact_no" Name="c_e_contact_no" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="j_date" Name="j_date" PropertyName="Text" />
                    <asp:ControlParameter ControlID="desig" Name="desig" PropertyName="Text" />
                    <asp:ControlParameter ControlID="salary" Name="salary" PropertyName="Text" />
                    <asp:ControlParameter ControlID="mode_of_cotr" Name="mode_of_cotr" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="tracking_status" Name="tracking_status" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="work_status" Name="work_status" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="per_contacted" Name="per_contacted" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="relation" Name="relation" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="remarks" Name="remarks" PropertyName="Text" />
                    <asp:ControlParameter ControlID="name_of_tracker" Name="name_of_tracker" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="categ_of_tracker" Name="categ_of_tracker" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="comm_of_tracker" Name="comm_of_tracker" 
                        PropertyName="Text" />
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:Parameter Name="date" />
                    <asp:ControlParameter ControlID="p_code" Name="project_code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="c_name" Name="course" 
                        PropertyName="SelectedValue" />
                </InsertParameters>
                <SelectParameters>
                    <asp:ControlParameter ControlID="c_name" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:ControlParameter ControlID="s_code" Name="id" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
                <UpdateParameters>
                    <asp:ControlParameter ControlID="j_date" Name="date" PropertyName="Text" />
                    <asp:Parameter DefaultValue="Completed" Name="status" />
                    <asp:ControlParameter ControlID="DropDownList3" DefaultValue="" Name="id" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
            </asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style1">
                Student Name</td>
            <td class="style1">
               <asp:Label ID="name" runat="server"></asp:Label>
            </td>
            <td class="style1">
                </td>
        </tr>
        <tr>
            <td class="style1">
                &nbsp;</td>
            <td class="style1">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
            &nbsp;
                <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
            </td>
            <td class="style1">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style1">
                &nbsp;</td>
            <td class="style1">
                &nbsp;</td>
            <td class="style1">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style1" colspan="3">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataSourceID="SqlDataSource1" style="font-size: 7pt" 
                    Width="929px">
                    <Columns>
                        <asp:BoundField DataField="s_code" HeaderText="CDAC Unique ID" 
                            SortExpression="s_code" />
                        <asp:BoundField DataField="batch_no" HeaderText="Batch No" 
                            SortExpression="batch_no" />
                        <asp:BoundField DataField="c_contact_no" HeaderText="Current Contact Number" 
                            SortExpression="c_contact_no" />
                        <asp:BoundField DataField="l_contact_date" HeaderText="Last Contact Date" 
                            SortExpression="l_contact_date" />
                        <asp:BoundField DataField="c_comp_name" HeaderText="Current Company Name" 
                            SortExpression="c_comp_name" />
                        <asp:BoundField DataField="c_comp_add" HeaderText="Current Company Address" 
                            SortExpression="c_comp_add" />
                        <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
                        <asp:BoundField DataField="c_per_name" HeaderText="Contact Person Name" 
                            SortExpression="c_per_name" />
                        <asp:BoundField DataField="c_e_contact_no" 
                            HeaderText="Current Employer Contact Number" SortExpression="c_e_contact_no" />
                        <asp:BoundField DataField="j_date" DataFormatString="{0:dd, MMM, yyyy}" 
                            HeaderText="Joining Date" SortExpression="j_date" />
                        <asp:BoundField DataField="desig" HeaderText="Designation" 
                            SortExpression="desig" />
                        <asp:BoundField DataField="salary" HeaderText="Salary(Monthly)" 
                            SortExpression="salary" />
                        <asp:BoundField DataField="mode_of_cotr" HeaderText="Mode Of Contact" 
                            SortExpression="mode_of_cotr" />
                        <asp:BoundField DataField="tracking_status" HeaderText="Tracking Status" 
                            SortExpression="tracking_status" />
                        <asp:BoundField DataField="work_status" HeaderText="Work Status" 
                            SortExpression="work_status" />
                        <asp:BoundField DataField="per_contacted" HeaderText="Person Contacted" 
                            SortExpression="per_contacted" />
                        <asp:BoundField DataField="relation" HeaderText="Relation" 
                            SortExpression="relation" />
                        <asp:BoundField DataField="remarks" HeaderText="Remarks" 
                            SortExpression="remarks" />
                        <asp:BoundField DataField="name_of_tracker" HeaderText="Name of tracker" 
                            SortExpression="name_of_tracker" />
                        <asp:BoundField DataField="categ_of_tracker" HeaderText="Category of tracker" 
                            SortExpression="categ_of_tracker" />
                        <asp:BoundField DataField="comm_of_tracker" HeaderText="Comments by tracker" 
                            SortExpression="comm_of_tracker" />
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
                    SelectCommand="SELECT * FROM [tracking] WHERE ([s_code] = @s_code)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="s_code" Name="s_code" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style1">
                &nbsp;</td>
            <td class="style1">
                &nbsp;</td>
            <td class="style1">
                &nbsp;</td>
        </tr>
    </table>

</asp:Content>

