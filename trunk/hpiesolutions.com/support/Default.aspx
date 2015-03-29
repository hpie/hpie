<%@ Page Title="" Language="C#" MasterPageFile="~/support/Site.master" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="user_support_visit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">

 p.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	}
    .style1
    {
        width: 768px;
    }
    .style2
    {
    }
    .style3
    {
        width: 163px;
        height: 47px;
        font-size: 10pt;
    }
    .style4
    {
        height: 47px;
    }
    .style5
    {
        width: 292px;
    }
    .style6
    {
        width: 292px;
        height: 47px;
    }
    .style7
    {
        width: 163px;
        font-size: 10pt;
    }
    .style8
    {
        font-size: 10pt;
    }
    .style9
    {
        width: 908px;
    }
    .style10
    {
        width: 408px;
    }
    .style12
    {
        width: 408px;
        font-size: 10pt;
    }
    .style13
    {
        width: 408px;
        font-size: 10pt;
        line-height: 115%;
    }
    .style14
    {
        width: 795px;
    }
    .style15
    {
        width: 391px;
        font-size: 10pt;
    }
    .style16
    {
        width: 391px;
        font-size: 10pt;
        line-height: 115%;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <p class="MsoNormal">
    <b style="mso-bidi-font-weight: normal">
    <span style="font-size: 8.0pt; line-height: 115%">
    <o:p>
    &nbsp;</o:p></span></b></p>
<p class="MsoNormal">
    <b style="mso-bidi-font-weight: normal">
    <span style="font-size: 13.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
    Visit Format
    <o:p>
    </o:p>
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    </span></b>
</p>
<p class="MsoNormal">
    <o:p>
    ______________________________________________________________________________________________________________</o:p></p>
<table class="style1">
    <tr>
        <td class="style7">
            Project Code</td>
        <td class="style5">
            <asp:DropDownList ID="DropDownList2" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource3" DataTextField="project_name" 
                DataValueField="code">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style7">
            <span style="mso-bidi-font-weight: normal"><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Center Name:</span></span></td>
        <td class="style5">
            <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource1" DataTextField="name" 
                DataValueField="center_code_main" 
                onselectedindexchanged="DropDownList1_SelectedIndexChanged" 
                AutoPostBack="True">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [tb1]"></asp:SqlDataSource>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style7">
            <span style="mso-bidi-font-weight: normal"><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Complete Address:</span></span></td>
        <td class="style5">
            <asp:TextBox ID="comp_addr" runat="server" CssClass="ttxt" Height="61px" 
                TextMode="MultiLine" Width="216px"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                ControlToValidate="comp_addr" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
        <td>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                
                SelectCommand="SELECT dbo.tb1.code, dbo.tb1.email, dbo.tb1.name, dbo.tb1.website, dbo.tb1.address, dbo.tb1.ph, dbo.tb1.country, dbo.tb1.state, dbo.tb1.pcode, dbo.tb1.center_code, dbo.tb1.pass, dbo.tb1.center_code_main, dbo.tb1.role, dbo.tb1.std_code, dbo.tb2.name AS name2, dbo.tb2.mobile, dbo.tb2.email AS Expr2, dbo.distt.distt, dbo.city.city AS city2 FROM dbo.tb1 INNER JOIN dbo.tb2 ON dbo.tb1.center_code_main = dbo.tb2.center_code INNER JOIN dbo.distt ON dbo.tb1.dist = dbo.distt.code INNER JOIN dbo.city ON dbo.tb1.city = dbo.city.code WHERE (dbo.tb1.center_code_main = @code)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="code" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style7">
            <span style="mso-bidi-font-weight: normal"><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Visit Date:</span></span></td>
        <td class="style5">
            <asp:TextBox ID="visit_date" runat="server" CssClass="ttxt"></asp:TextBox>
            <ajaxToolkit:CalendarExtender ID="visit_date_CalendarExtender" runat="server" 
                Enabled="True" TargetControlID="visit_date">
            </ajaxToolkit:CalendarExtender>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                ControlToValidate="visit_date" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style7">
            <span style="mso-bidi-font-weight: normal"><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Contact Person:</span></span></td>
        <td class="style5">
            <asp:TextBox ID="contact_per" runat="server" CssClass="ttxt"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                ControlToValidate="contact_per" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style7">
            <span style="mso-bidi-font-weight: normal"><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Phone:</span></span></td>
        <td class="style5">
            <asp:TextBox ID="phone" runat="server" CssClass="ttxt"></asp:TextBox>
            <ajaxToolkit:FilteredTextBoxExtender ID="phone_FilteredTextBoxExtender" 
                runat="server" Enabled="True" FilterType="Numbers" TargetControlID="phone">
            </ajaxToolkit:FilteredTextBoxExtender>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style7">
            <span style="mso-bidi-font-weight: normal"><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Mobile:</span></span></td>
        <td class="style5">
            <asp:TextBox ID="mobile" runat="server" CssClass="ttxt"></asp:TextBox>
            <ajaxToolkit:FilteredTextBoxExtender ID="mobile_FilteredTextBoxExtender" 
                runat="server" Enabled="True" FilterType="Numbers" TargetControlID="mobile">
            </ajaxToolkit:FilteredTextBoxExtender>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                ControlToValidate="mobile" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style3">
            <span style="mso-bidi-font-weight: normal"><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Email Id: </span>
            </span>
        </td>
        <td class="style6">
            <asp:TextBox ID="email" runat="server" CssClass="ttxt"></asp:TextBox>
        &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                ControlToValidate="email" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
        <td class="style4">
        </td>
    </tr>
    <tr>
        <td class="style8" colspan="2" style="mso-bidi-font-family: Calibri">
            Enrollment File prepared with all supporting Documents</td>
        <td>
            <asp:RadioButtonList ID="enrl_file_pre" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style8" colspan="2" style="mso-bidi-font-family: Calibri">
            Are all supporting documents attested</td>
        <td>
            <asp:RadioButtonList ID="all_are_sport" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style2" colspan="2">
            Lab / infrastructure is being provided to students as per norms set by the 
            department.</td>
        <td>
            <asp:RadioButtonList ID="lab_infra" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style2" colspan="2">
            Monthly attendance being sent to Distt. Welfare Office regularly<span 
                style="mso-spacerun: yes"> </span>
        </td>
        <td>
            <asp:RadioButtonList ID="monthly_atten_reg" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style2" colspan="2">
            <span style="mso-bidi-font-weight: normal"><u><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Observations:<o:p></o:p></span></u></span></td>
        <td>
            <asp:TextBox ID="visit_obesrv" runat="server" CssClass="ttxt" Height="86px" 
                TextMode="MultiLine" Width="201px"></asp:TextBox>
        &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                ControlToValidate="visit_obesrv" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
    </tr>
</table>
<p class="MsoNormal">
    <span style="mso-bidi-font-weight: normal">
    <span style="font-size: 13.0pt; line-height: 115%; mso-bidi-font-family: Calibri">&nbsp;</span></span></p>
<p class="MsoNormal" style="line-height: 150%">
    <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri">
    _________________________________________________________________________________________________<o:p></o:p></span></p>
<p align="center" class="MsoNormal" 
    style="text-align: center; text-indent: .5in; line-height: 150%">
    <b style="mso-bidi-font-weight: normal"><u>
    <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri; background: silver; mso-highlight: silver">
    Training:</span></u></b><o:p></o:p></p>
<o:p>
</o:p>
<table class="style9">
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Is Batch File Prepared?</td>
        <td>
            <asp:RadioButtonList ID="is_batch_file_pre" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Is Batch File maintained properly?<span style="mso-tab-count: 1">&nbsp; </span>
        </td>
        <td>
            <asp:RadioButtonList ID="is_batch_file_main" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Batch Timings are published on notice board?<span style="mso-tab-count: 4">&nbsp;
            </span>
        </td>
        <td>
            <asp:RadioButtonList ID="batch_timing_notice" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Course Plan Chart Prepared</td>
        <td>
            <asp:RadioButtonList ID="course_plan" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style12">
            Books / reading material issued to students on time</td>
        <td>
            <asp:RadioButtonList ID="books_reading" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Course Material Issued &amp; Records updated</td>
        <td>
            <asp:RadioButtonList ID="course_mater" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Student Open House conducted during the visit</td>
        <td>
            <asp:RadioButtonList ID="student_open_house" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Number of Beneficiaries attended Open House</td>
        <td>
            <asp:TextBox ID="no_of_ban_house" runat="server" CssClass="ttxt"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Any Dropouts<span style="mso-tab-count: 8"> </span>
        </td>
        <td>
            <asp:RadioButtonList ID="any_dropouts" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13" style="mso-bidi-font-family: Calibri">
            Total Number of Dropouts</td>
        <td>
            <asp:TextBox ID="total_dropouts" runat="server" CssClass="ttxt"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style13">
            Is there any visit by Local Social Welfare Officer in Center?<span 
                style="mso-tab-count: 2"> </span>
        </td>
        <td>
            <asp:RadioButtonList ID="is_visit_local_welfare_off" runat="server" 
                CssClass="ttxt2" RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style13">
            Are the students comfortable with the facilities provided in the Center ?</td>
        <td>
            <asp:RadioButtonList ID="are_student_comf" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style10">
            <span style="mso-bidi-font-weight: normal"><u><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Observations:</span></u></span></td>
        <td>
            <asp:TextBox ID="training_obesrv" runat="server" CssClass="ttxt" Height="99px" 
                TextMode="MultiLine" Width="325px"></asp:TextBox>
        &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" 
                ControlToValidate="training_obesrv" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
    </tr>
</table>
<p class="MsoNormal">
    <span style="font-size: 12.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
    <span style="mso-tab-count: 7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></span>
</p>
<p class="MsoNormal">
    <span style="font-size: 12.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
    <span style="mso-tab-count: 4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></span>
</p>
<p class="MsoNormal">
    <span style="font-size: 12.0pt; line-height: 115%">&nbsp;</span></p>
<p class="MsoNormal" style="line-height: 150%">
    <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri">
    ________________________________________________________________________________________________<o:p></o:p></span></p>
<p align="center" class="MsoNormal" style="text-align: center">
    <b style="mso-bidi-font-weight: normal">
    <span style="font-size: 14.0pt; line-height: 115%; mso-bidi-font-family: Calibri; background: silver; mso-highlight: silver">
    Placement</span></b><o:p></o:p></p>
<o:p>
</o:p>
<table class="style14">
    <tr>
        <td class="style16" style="mso-bidi-font-family: Calibri">
            Is placement coordinator of Training Centre Identified<span 
                style="mso-tab-count: 1">&nbsp; </span>
        </td>
        <td>
            <asp:RadioButtonList ID="is_placement_coor" runat="server" CssClass="ttxt2" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Yes</asp:ListItem>
                <asp:ListItem>No</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style16" style="mso-bidi-font-family: Calibri">
            Total Number of Organizations approached for placements<span 
                style="mso-tab-count: 3">&nbsp; </span>
        </td>
        <td>
            <asp:TextBox ID="tot_org_apr" runat="server" CssClass="ttxt"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style16" style="mso-bidi-font-family: Calibri">
            Total Number of Placement Opportunities generated<span style="mso-tab-count: 3">
            </span>
        </td>
        <td>
            <asp:TextBox ID="tot_no_of_placement" runat="server" CssClass="ttxt"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style16" style="mso-bidi-font-family: Calibri">
            Number of students who have attended Job Interviews<span 
                style="mso-tab-count: 3">&nbsp; </span>
        </td>
        <td>
            <asp:TextBox ID="no_of_student_att_intr" runat="server" CssClass="ttxt"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style16" style="mso-bidi-font-family: Calibri">
            Number of Students Placed</td>
        <td>
            <asp:TextBox ID="no_student_placed" runat="server" CssClass="ttxt"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style15">
            <span style="mso-bidi-font-weight: normal"><u><span class="style8" 
                style="line-height: 115%; mso-bidi-font-family: Calibri">Observations:<o:p></o:p></span></u></span></td>
        <td>
            <asp:TextBox ID="placement_observ" runat="server" CssClass="ttxt" Height="88px" 
                TextMode="MultiLine" Width="298px"></asp:TextBox>
        &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                ControlToValidate="placement_observ" ErrorMessage="*" ForeColor="#CC3300" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
    </tr>
</table>
<p class="MsoNormal">
    <span style="font-size: 12.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
    <span style="mso-tab-count: 1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
    <span style="mso-tab-count: 2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></span>
</p>
<p class="MsoNormal">
    &nbsp;</p>
<p class="MsoNormal" style="line-height: 150%">
    <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri">
    _________________________________________________________________________________________________</span></p>
<p class="MsoNormal">
    <b style="mso-bidi-font-weight: normal">
    <span style="font-size: 14.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
    Open House / Pending Issues (if Any)<o:p></o:p></span></b></p>
<p class="MsoNormal">
    <o:p>
    <asp:TextBox ID="open_house_pend_issue" runat="server" CssClass="ttxt" 
        Height="88px" TextMode="MultiLine" Width="298px"></asp:TextBox>
    </o:p>
</p>
<p class="MsoNormal" style="line-height: 150%">
    <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri">
    &nbsp;_________________________________________________________________________________________________<o:p></o:p></span></p>
<p class="MsoNormal">
    <b style="mso-bidi-font-weight: normal">
    <span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
    <span style="mso-tab-count: 2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span><span style="mso-spacerun: yes">&nbsp; </span></span></b>
    <span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
    <o:p>
    </o:p>
    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
&nbsp;<asp:Label ID="Label1" runat="server" ForeColor="#990000" 
        style="font-weight: 700"></asp:Label>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        InsertCommand="INSERT INTO support_visit(project_code, center_code, visit_date, c_person, c_ph, c_mobile, c_email, enrl_file_pre, all_are_sport, lab_infra, monthly_atten_reg, visit_obesrv, is_batch_file_pre, is_batch_file_main, batch_timing_notice, course_plan, books_reading, course_mater, student_open_house, no_of_ban_house, any_dropouts, total_dropouts, is_visit_local_welfare_off, are_student_comf, training_obesrv, is_placement_coor, tot_org_apr, tot_no_of_placement, no_of_student_att_intr, no_student_placed, placement_observ, open_house_pend_issue, date, addr, center_name) VALUES (@project_code, @center_code, @visit_date, @c_person, @c_ph, @c_mobile, @c_email, @enrl_file_pre, @all_are_sport, @lab_infra, @monthly_atten_reg, @visit_obesrv, @is_batch_file_pre, @is_batch_file_main, @batch_timing_notice, @course_plan, @books_reading, @course_mater, @student_open_house, @no_of_ban_house, @any_dropouts, @total_dropouts, @is_visit_local_welfare_off, @are_student_comf, @training_obesrv, @is_placement_coor, @tot_org_apr, @tot_no_of_placement, @no_of_student_att_intr, @no_student_placed, @placement_observ, @open_house_pend_issue, @date, @addr, @center_name)" 
        SelectCommand="SELECT * FROM [support_visit]" 
        onselecting="SqlDataSource2_Selecting">
        <InsertParameters>
            <asp:ControlParameter ControlID="DropDownList2" Name="project_code" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="DropDownList1" Name="center_code" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="visit_date" Name="visit_date" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="contact_per" Name="c_person" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="phone" Name="c_ph" PropertyName="Text" />
            <asp:ControlParameter ControlID="mobile" Name="c_mobile" PropertyName="Text" />
            <asp:ControlParameter ControlID="email" Name="c_email" PropertyName="Text" />
            <asp:ControlParameter ControlID="enrl_file_pre" Name="enrl_file_pre" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="all_are_sport" Name="all_are_sport" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="lab_infra" Name="lab_infra" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="monthly_atten_reg" Name="monthly_atten_reg" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="visit_obesrv" Name="visit_obesrv" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="is_batch_file_pre" Name="is_batch_file_pre" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="is_batch_file_main" Name="is_batch_file_main" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="batch_timing_notice" 
                Name="batch_timing_notice" PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="course_plan" Name="course_plan" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="books_reading" Name="books_reading" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="course_mater" Name="course_mater" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="student_open_house" Name="student_open_house" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="no_of_ban_house" Name="no_of_ban_house" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="any_dropouts" Name="any_dropouts" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="total_dropouts" Name="total_dropouts" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="is_visit_local_welfare_off" 
                Name="is_visit_local_welfare_off" PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="are_student_comf" Name="are_student_comf" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="training_obesrv" Name="training_obesrv" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="is_placement_coor" Name="is_placement_coor" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="tot_org_apr" Name="tot_org_apr" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="tot_no_of_placement" 
                Name="tot_no_of_placement" PropertyName="Text" />
            <asp:ControlParameter ControlID="no_of_student_att_intr" 
                Name="no_of_student_att_intr" PropertyName="Text" />
            <asp:ControlParameter ControlID="no_student_placed" Name="no_student_placed" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="placement_observ" Name="placement_observ" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="open_house_pend_issue" 
                Name="open_house_pend_issue" PropertyName="Text" />
            <asp:Parameter Name="date" />
            <asp:ControlParameter ControlID="comp_addr" Name="addr" PropertyName="Text" />
            <asp:SessionParameter Name="center_name" SessionField="start_a" />
        </InsertParameters>
    </asp:SqlDataSource>
    <br />
    </span>
</p>
</asp:Content>

