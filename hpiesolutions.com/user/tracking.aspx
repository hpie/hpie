<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="tracking.aspx.cs" Inherits="user_tracking" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
   
    <style type="text/css">
    .style1
    {
        height: 21px;
    }
</style>
   
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Student Tracking Details</div>
    <table class="style1">
        <tr>
            <td>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
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
                DataSourceID="SqlDataSource4" DataTextField="s_id_main" 
                   DataValueField="s_id_main" AutoPostBack="True" 
                   onselectedindexchanged="s_code_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   SelectCommand="SELECT * FROM [student_detail] WHERE ([course] = @course) and(center_code=@code)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="c_name" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:SessionParameter Name="code" SessionField="start_a" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   
                   SelectCommand="SELECT * FROM [student_detail] WHERE s_id_main=@id" 
                   
                   
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
            <td>
                Batch No</td>
            <td>
                <asp:TextBox ID="batch_no" runat="server" CssClass="ttxt"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="batch_no"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Current Contact Number</td>
            <td>
                <asp:TextBox ID="c_contact_no" runat="server" CssClass="ttxt"></asp:TextBox>
                <ajaxToolkit:FilteredTextBoxExtender ID="c_contact_no_FilteredTextBoxExtender" 
                    runat="server" Enabled="True" FilterType="Numbers" 
                    TargetControlID="c_contact_no">
                </ajaxToolkit:FilteredTextBoxExtender>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="c_contact_no"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Last Contact Date</td>
            <td>
                <asp:TextBox ID="l_contact_date" runat="server" CssClass="ttxt"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="l_contact_date_CalendarExtender" 
                    runat="server" Enabled="True" TargetControlID="l_contact_date">
                </ajaxToolkit:CalendarExtender>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="l_contact_date"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Current Company Name</td>
            <td>
                <asp:TextBox ID="c_comp_name" runat="server" CssClass="ttxt"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="c_comp_name"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Current Company Address</td>
            <td>
                <asp:TextBox ID="c_comp_add" runat="server" CssClass="ttxt" Height="60px" 
                    TextMode="MultiLine"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                City</td>
            <td>
                <asp:TextBox ID="city" runat="server" CssClass="ttxt"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="city"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Contact Person Name</td>
            <td>
                <asp:TextBox ID="c_per_name" runat="server" CssClass="ttxt"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="c_per_name"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Current Employer Contact Number</td>
            <td>
                <asp:TextBox ID="c_e_contact_no" runat="server" CssClass="ttxt"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="c_e_contact_no"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Joining Date</td>
            <td>
                <asp:TextBox ID="j_date" runat="server" CssClass="ttxt"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="j_date_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="j_date">
                </ajaxToolkit:CalendarExtender>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="j_date"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Designation</td>
            <td>
                <asp:TextBox ID="desig" runat="server" CssClass="ttxt"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator9" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="desig"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Salary(Monthly)</td>
            <td>
                <asp:TextBox ID="salary" runat="server" CssClass="ttxt"></asp:TextBox>
                <ajaxToolkit:FilteredTextBoxExtender ID="salary_FilteredTextBoxExtender" 
                    runat="server" Enabled="True" FilterType="Numbers" TargetControlID="salary">
                </ajaxToolkit:FilteredTextBoxExtender>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator10" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="salary"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Mode Of Contact</td>
            <td>
                <asp:TextBox ID="mode_of_cotr" runat="server" CssClass="ttxt"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator11" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="mode_of_cotr"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Tracking Status</td>
            <td>
                <asp:TextBox ID="tracking_status" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Work Status</td>
            <td>
                <asp:TextBox ID="work_status" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Person Contacted</td>
            <td>
                <asp:TextBox ID="per_contacted" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Relation</td>
            <td>
                <asp:TextBox ID="relation" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Remarks</td>
            <td>
                <asp:TextBox ID="remarks" runat="server" CssClass="ttxt" Height="60px" 
                    TextMode="MultiLine"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Name of tracker</td>
            <td>
                <asp:TextBox ID="name_of_tracker" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Category of tracker</td>
            <td>
                <asp:TextBox ID="categ_of_tracker" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Comments by tracker</td>
            <td>
                <asp:TextBox ID="comm_of_tracker" runat="server" CssClass="ttxt" Height="60px" 
                    TextMode="MultiLine"></asp:TextBox>
            </td>
            <td>
                &nbsp;</td>
        </tr>
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
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
&nbsp;
                <asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        </asp:Content>

