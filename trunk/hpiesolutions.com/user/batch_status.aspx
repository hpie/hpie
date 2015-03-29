<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="batch_status.aspx.cs" Inherits="user_batch_status" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 937px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Batch Status</div>

    <table class="style1">
        <tr>
            <td>
                &nbsp;</td>
            <td>
                                         <asp:ScriptManager ID="ScriptManager1" runat="server">
                                         </asp:ScriptManager>
            </td>
            <td rowspan="16" valign="top">
                                         <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                                             DataSourceID="SqlDataSource2" Width="465px">
                                             <Columns>
                                                 <asp:BoundField DataField="batch_no" HeaderText="Batch No." 
                                                     SortExpression="batch_no" />
                                                 <asp:BoundField DataField="s_date" DataFormatString="{0:dd MMM, yyyy}" 
                                                     HeaderText="Start Date" SortExpression="s_date" />
                                                 <asp:BoundField DataField="e_date" DataFormatString="{0:dd MMM, yyyy}" 
                                                     HeaderText="Completion Date" SortExpression="e_date" />
                                                 <asp:BoundField DataField="course_name" HeaderText="Course" 
                                                     SortExpression="course" />
                                                 <asp:BoundField DataField="sub" HeaderText="Subject" SortExpression="sub" />
                                             </Columns>
                                         </asp:GridView>
                                         <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                                             ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                             SelectCommand="SELECT batch_status.code, batch_status.project_code, batch_status.center_code, batch_status.batch_no, batch_status.date, batch_status.s_date, batch_status.e_date, batch_status.course, subject.sub, course_detail.course_name FROM batch_status INNER JOIN course_detail ON batch_status.course = course_detail.code INNER JOIN subject ON batch_status.sub = subject.code WHERE (batch_status.center_code = @center_code)">
                                             <SelectParameters>
                                                 <asp:SessionParameter Name="center_code" SessionField="start_a" Type="String" />
                                             </SelectParameters>
                                         </asp:SqlDataSource>
            </td>
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
        </tr>
        <tr>
           <td>
                Course Name</td>
            <td>
                <asp:DropDownList ID="c_name" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource5" DataTextField="course_name" 
                    DataValueField="code" AutoPostBack="True">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
           <td>
                Subject</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource1" DataTextField="sub" DataValueField="code">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    InsertCommand="INSERT INTO batch_status(project_code, center_code, batch_no, date, s_date, e_date, course, sub) VALUES (@project_code, @center_code, @batch_no, @date, @s_date, @e_date, @course, @sub)" 
                    SelectCommand="SELECT * FROM [subject] WHERE ([course] = @course)">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="p_code" Name="project_code" 
                            PropertyName="SelectedValue" />
                        <asp:SessionParameter Name="center_code" SessionField="start_a" />
                        <asp:ControlParameter ControlID="TextBox1" Name="batch_no" 
                            PropertyName="Text" />
                        <asp:Parameter Name="date" />
                        <asp:ControlParameter ControlID="TextBox2" Name="s_date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="e_date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="c_name" Name="course" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList1" Name="sub" 
                            PropertyName="SelectedValue" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:ControlParameter ControlID="c_name" Name="course" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
           <td>
                Batch No</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt"></asp:TextBox>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="TextBox1"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
           <td>
                Starting Date</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server" CssClass="ttxt"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="TextBox2">
                </ajaxToolkit:CalendarExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="TextBox2"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
           <td>
                Completion Date</td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server" CssClass="ttxt"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="TextBox3">
                </ajaxToolkit:CalendarExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ErrorMessage="*" SetFocusOnError="True" style="color: #990000" 
                    ControlToValidate="TextBox3"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
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
&nbsp;<asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
            </td>
        </tr>
        <tr>
           <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
           <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
           <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
           <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
           <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
           <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
           <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>

</asp:Content>

