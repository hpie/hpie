<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="placement.aspx.cs" Inherits="user_placement" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 875px;
    }
    .style2
    {
        width: 147px;
    }
        .style3
        {
            width: 147px;
            height: 40px;
        }
        .style4
        {
            height: 40px;
        }
        .style5
        {
            width: 147px;
            height: 26px;
        }
        .style6
        {
            height: 26px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">
        Placement Detail
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
</div>
   <table class="style1">
       <tr>
           <td class="style2">
               Project Code</td>
           <td>
            <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource2" DataTextField="project_name" 
                DataValueField="code">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Select Course</td>
           <td>
            <asp:DropDownList ID="DropDownList2" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource1" DataTextField="course_name" 
                DataValueField="code" AutoPostBack="True" 
                onselectedindexchanged="DropDownList2_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Select Student Code</td>
           <td>
            <asp:DropDownList ID="DropDownList3" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource4" DataTextField="s_id_main" 
                   DataValueField="s_id_main" AutoPostBack="True" 
                   onselectedindexchanged="DropDownList3_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   SelectCommand="SELECT * FROM [student_detail] WHERE ([course] = @course) and(center_code=@code)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:SessionParameter Name="code" SessionField="start_a" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   
                   SelectCommand="SELECT * FROM [student_detail] WHERE (([course] = @course) and([s_id_main]=@id))" 
                   
                   
                   InsertCommand="INSERT INTO dbo.placement(center_code, project_code, s_id, c_name, c_add, city, desig, j_date, salary, c_per_name, c_per_no, date, course, name) VALUES (@center_code, @project_code, @s_id, @c_name, @c_add, @city, @desig, @j_date, @salary, @c_per_name, @c_per_no, @date, @course, @name)" 
                   
                   UpdateCommand="UPDATE student_detail SET tr_com_date =@date, tr_status =@status where s_id_main=@id">
                <InsertParameters>
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList3" Name="s_id" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="c_name" Name="c_name" PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_add" Name="c_add" PropertyName="Text" />
                    <asp:ControlParameter ControlID="city" Name="city" PropertyName="Text" />
                    <asp:ControlParameter ControlID="desig" Name="desig" PropertyName="Text" />
                    <asp:ControlParameter ControlID="j_date" Name="j_date" PropertyName="Text" />
                    <asp:ControlParameter ControlID="salary" Name="salary" PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_per_name" Name="c_per_name" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="c_per_no" Name="c_per_no" 
                        PropertyName="Text" />
                    <asp:Parameter Name="date" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="name" Name="name" PropertyName="Text" />
                </InsertParameters>
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:ControlParameter ControlID="DropDownList3" Name="id" 
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
           <td class="style2">
               Student Name</td>
           <td>
               <asp:Label ID="name" runat="server"></asp:Label>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Company Name</td>
           <td>
               <asp:TextBox ID="c_name" runat="server" CssClass="ttxt"></asp:TextBox>
           &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                   ControlToValidate="c_name" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Company Address</td>
           <td>
               <asp:TextBox ID="c_add" runat="server" CssClass="ttxt" Height="68px" 
                   TextMode="MultiLine" Width="200px"></asp:TextBox>
           &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" 
                   ControlToValidate="c_add" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               City/Village</td>
           <td>
               <asp:TextBox ID="city" runat="server" CssClass="ttxt"></asp:TextBox>
           &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                   ControlToValidate="city" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Designation</td>
           <td>
               <asp:TextBox ID="desig" runat="server" CssClass="ttxt"></asp:TextBox>
           &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                   ControlToValidate="desig" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Join Date</td>
           <td>
               <asp:TextBox ID="j_date" runat="server" CssClass="ttxt"></asp:TextBox>
               <ajaxToolkit:CalendarExtender ID="j_date_CalendarExtender" runat="server" 
                   Enabled="True" TargetControlID="j_date">
               </ajaxToolkit:CalendarExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                   ControlToValidate="j_date" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Salary (Monthly)</td>
           <td>
               <asp:TextBox ID="salary" runat="server" CssClass="ttxt"></asp:TextBox>
               <ajaxToolkit:FilteredTextBoxExtender ID="salary_FilteredTextBoxExtender" 
                   runat="server" Enabled="True" FilterType="Numbers" TargetControlID="salary">
               </ajaxToolkit:FilteredTextBoxExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                   ControlToValidate="salary" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style5">
               Contact Person Name</td>
           <td class="style6">
               <asp:TextBox ID="c_per_name" runat="server" CssClass="ttxt"></asp:TextBox>
           &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                   ControlToValidate="c_per_name" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td class="style6">
               </td>
       </tr>
       <tr>
           <td class="style2">
               Contact Number</td>
           <td>
               <asp:TextBox ID="c_per_no" runat="server" CssClass="ttxt"></asp:TextBox>
               <ajaxToolkit:FilteredTextBoxExtender ID="c_per_no_FilteredTextBoxExtender" 
                   runat="server" Enabled="True" FilterType="Numbers" TargetControlID="c_per_no">
               </ajaxToolkit:FilteredTextBoxExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                   ControlToValidate="c_per_no" ErrorMessage="*" ForeColor="#990000" 
                   SetFocusOnError="True"></asp:RequiredFieldValidator>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style3">
               </td>
           <td class="style4">
               <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
           &nbsp;
               <asp:Label ID="Label1" runat="server" style="color: #990000; font-weight: 700"></asp:Label>
           </td>
           <td class="style4">
               </td>
       </tr>
</table>
&nbsp;
</asp:Content>

