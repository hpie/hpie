<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="support_visit_view.aspx.cs" Inherits="user_support_visit_view" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 905px;
    }
    .style14
    {
        width: 773px;
    }
    .style18
    {
        width: 421px;
    }
        .style19
        {
            width: 514px;
        }
        .style23
        {
            width: 1169px;
        }
        .style24
        {
            width: 604px;
        }
        .style25
        {
            width: 123px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Support Visit View</div>
<p class="MsoNormal">
    &nbsp;</p>
    <table border="1px" cellspacing="0" cellpadding="2"cellspacing="0" class="style24">
        <tr>
            <td class="style25">
                Select Visit Date</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource1" DataTextField="visit_date" 
                    DataTextFormatString="{0:dd MMM, yyyy}" DataValueField="visit_date" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT* FROM support_visit where center_code=@code">
                    <SelectParameters>
                        <asp:SessionParameter Name="code" SessionField="start_a" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style25">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
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
    <asp:DataList ID="DataList1" runat="server" DataSourceID="SqlDataSource2">
        <ItemTemplate>
            <table border="1px" cellspacing="0" cellpadding="2"cellspacing="0" class="style1">
                <tr>
                    <td class="style23">
                        Project Code</td>
                    <td>
                        <asp:Label ID="project_codeLabel" runat="server" 
                            Text='<%# Eval("project_name") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style23">
                        <span style="mso-bidi-font-weight: normal"><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Center Name:</span></span></td>
                    <td class="style5" colspan="2">
                        <asp:Label ID="center_codeLabel" runat="server" 
                            Text='<%# Eval("name") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style23">
                        <span style="mso-bidi-font-weight: normal"><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Complete Address:</span></span></td>
                    <td class="style5" colspan="2">
                        <asp:Label ID="addrLabel" runat="server" Text='<%# Eval("addr") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style23">
                        <span style="mso-bidi-font-weight: normal"><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Visit Date:</span></span></td>
                    <td class="style5" colspan="2">
                        <asp:Label ID="visit_dateLabel" runat="server" 
                            Text='<%# Eval("visit_date", "{0:d}") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style23">
                        <span style="mso-bidi-font-weight: normal"><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Contact Person:</span></span></td>
                    <td class="style5" colspan="2">
                        <asp:Label ID="c_personLabel" runat="server" Text='<%# Eval("c_person") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style23">
                        <span style="mso-bidi-font-weight: normal"><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Phone:</span></span></td>
                    <td class="style5" colspan="2">
                        <asp:Label ID="c_phLabel" runat="server" Text='<%# Eval("c_ph") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style23">
                        <span style="mso-bidi-font-weight: normal"><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Mobile:</span></span></td>
                    <td class="style5" colspan="2">
                        <asp:Label ID="c_mobileLabel" runat="server" Text='<%# Eval("c_mobile") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style23">
                        <span style="mso-bidi-font-weight: normal"><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Email Id: </span>
                        </span>
                    </td>
                    <td class="style19" colspan="2">
                        <asp:Label ID="c_emailLabel" runat="server" Text='<%# Eval("c_email") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style19" colspan="2" style="mso-bidi-font-family: Calibri">
                        Enrollment File prepared with all supporting Documents</td>
                    <td class="style19">
                        <asp:Label ID="enrl_file_preLabel" runat="server" 
                            Text='<%# Eval("enrl_file_pre") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style8" colspan="2" style="mso-bidi-font-family: Calibri">
                        Are all supporting documents attested</td>
                    <td>
                        <asp:Label ID="all_are_sportLabel" runat="server" 
                            Text='<%# Eval("all_are_sport") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        Lab / infrastructure is being provided to students as per norms set by the 
                        department.</td>
                    <td>
                        <asp:Label ID="lab_infraLabel" runat="server" Text='<%# Eval("lab_infra") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        Monthly attendance being sent to Distt. Welfare Office regularly<span 
                            style="mso-spacerun: yes"> </span>
                    </td>
                    <td>
                        <asp:Label ID="monthly_atten_regLabel" runat="server" 
                            Text='<%# Eval("monthly_atten_reg") %>' />
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        <span style="mso-bidi-font-weight: normal"><u><span class="style8" 
                            style="line-height: 115%; mso-bidi-font-family: Calibri">Observations:<p></p>
                        </span></u></span>
                    </td>
                    <td>
                        <asp:Label ID="visit_obesrvLabel" runat="server" 
                            Text='<%# Eval("visit_obesrv") %>' />
                    </td>
                </tr>
            </table>
            <p class="MsoNormal" style="line-height: 150%">
                <span style="font-size: 14.0pt; line-height: 100%; mso-bidi-font-family: Calibri">
                _________________________________________________________________________________________________</span><p>
                </p>
                <p align="center" class="MsoNormal" 
                    style="text-align: center; text-indent: .5in; line-height: 150%">
                    <b style="mso-bidi-font-weight: normal"><u>
                    <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri; background: silver; mso-highlight: silver">
                    Training:</span></u></b><p>
                    </p>
                    <p>
                    </p>
                    <p>
                    </p>
                    <table border="1px" cellspacing="0" cellpadding="2"cellspacing="0" class="style9">
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Is Batch File Prepared?</td>
                            <td>
                                <asp:Label ID="is_batch_file_preLabel" runat="server" 
                                    Text='<%# Eval("is_batch_file_pre") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Is Batch File maintained properly?<span style="mso-tab-count: 1">&nbsp; </span>
                            </td>
                            <td>
                                <asp:Label ID="is_batch_file_mainLabel" runat="server" 
                                    Text='<%# Eval("is_batch_file_main") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Batch Timings are published on notice board?<span style="mso-tab-count: 4">&nbsp;
                                </span>
                            </td>
                            <td>
                                <asp:Label ID="batch_timing_noticeLabel" runat="server" 
                                    Text='<%# Eval("batch_timing_notice") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Course Plan Chart Prepared</td>
                            <td>
                                <asp:Label ID="course_planLabel" runat="server" 
                                    Text='<%# Eval("course_plan") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style12">
                                Books / reading material issued to students on time</td>
                            <td>
                                <asp:Label ID="books_readingLabel" runat="server" 
                                    Text='<%# Eval("books_reading") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Course Material Issued &amp; Records updated</td>
                            <td>
                                <asp:Label ID="course_materLabel" runat="server" 
                                    Text='<%# Eval("course_mater") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Student Open House conducted during the visit</td>
                            <td>
                                <asp:Label ID="student_open_houseLabel" runat="server" 
                                    Text='<%# Eval("student_open_house") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Number of Beneficiaries attended Open House</td>
                            <td>
                                <asp:Label ID="no_of_ban_houseLabel" runat="server" 
                                    Text='<%# Eval("no_of_ban_house") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Any Dropouts<span style="mso-tab-count: 8"> </span>
                            </td>
                            <td>
                                <asp:Label ID="any_dropoutsLabel" runat="server" 
                                    Text='<%# Eval("any_dropouts") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13" style="mso-bidi-font-family: Calibri">
                                Total Number of Dropouts</td>
                            <td>
                                <asp:Label ID="total_dropoutsLabel" runat="server" 
                                    Text='<%# Eval("total_dropouts") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13">
                                Is there any visit by Local Social Welfare Officer in Center?<span 
                                    style="mso-tab-count: 2"> </span>
                            </td>
                            <td>
                                <asp:Label ID="is_visit_local_welfare_offLabel" runat="server" 
                                    Text='<%# Eval("is_visit_local_welfare_off") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style13">
                                Are the students comfortable with the facilities provided in the Center ?</td>
                            <td>
                                <asp:Label ID="are_student_comfLabel" runat="server" 
                                    Text='<%# Eval("are_student_comf") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style10">
                                <span style="mso-bidi-font-weight: normal"><u><span class="style8" 
                                    style="line-height: 115%; mso-bidi-font-family: Calibri">Observations:</span></u></span></td>
                            <td>
                                <asp:Label ID="training_obesrvLabel" runat="server" 
                                    Text='<%# Eval("training_obesrv") %>' />
                            </td>
                        </tr>
                    </table>
                    <p class="MsoNormal" style="line-height: 150%">
                        <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri">
                        ________________________________________________________________________________________________</span><p 
                            align="center" class="MsoNormal" style="text-align: center">
                            <b style="mso-bidi-font-weight: normal">
                            <span style="font-size: 14.0pt; line-height: 115%; mso-bidi-font-family: Calibri; background: silver; mso-highlight: silver">
                            Placement</span></b><table border="1px" cellspacing="0" cellpadding="2"cellspacing="0" class="style14">
                                <tr>
                                    <td class="style18" style="mso-bidi-font-family: Calibri">
                                        Is placement coordinator of Training Centre Identified<span 
                                            style="mso-tab-count: 1">&nbsp; </span>
                                    </td>
                                    <td>
                                        <asp:Label ID="is_placement_coorLabel" runat="server" 
                                            Text='<%# Eval("is_placement_coor") %>' />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style18" style="mso-bidi-font-family: Calibri">
                                        Total Number of Organizations approached for placements<span 
                                            style="mso-tab-count: 3">&nbsp; </span>
                                    </td>
                                    <td>
                                        <asp:Label ID="tot_org_aprLabel" runat="server" 
                                            Text='<%# Eval("tot_org_apr") %>' />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style18" style="mso-bidi-font-family: Calibri">
                                        Total Number of Placement Opportunities generated<span style="mso-tab-count: 3">
                                        </span>
                                    </td>
                                    <td>
                                        <asp:Label ID="tot_no_of_placementLabel" runat="server" 
                                            Text='<%# Eval("tot_no_of_placement") %>' />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style18" style="mso-bidi-font-family: Calibri">
                                        Number of students who have attended Job Interviews<span 
                                            style="mso-tab-count: 3">&nbsp; </span>
                                    </td>
                                    <td>
                                        <asp:Label ID="no_of_student_att_intrLabel" runat="server" 
                                            Text='<%# Eval("no_of_student_att_intr") %>' />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style18" style="mso-bidi-font-family: Calibri">
                                        Number of Students Placed</td>
                                    <td>
                                        <asp:Label ID="no_student_placedLabel" runat="server" 
                                            Text='<%# Eval("no_student_placed") %>' />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style18">
                                        <span style="mso-bidi-font-weight: normal"><u><span class="style8" 
                                            style="line-height: 115%; mso-bidi-font-family: Calibri">Observations:<p>
                                        </p>
                                        </span></u></span>
                                    </td>
                                    <td>
                                        <asp:Label ID="placement_observLabel" runat="server" 
                                            Text='<%# Eval("placement_observ") %>' />
                                    </td>
                                </tr>
                            </table>
                            <p class="MsoNormal">
                                <b style="mso-bidi-font-weight: normal">
                                <span style="font-size: 14.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
                                Open House / Pending Issues (if Any)</span></b><p class="MsoNormal">
                                    <span style="font-size: 12.0pt; line-height: 115%; mso-bidi-font-family: Calibri">
                                    <span style="mso-tab-count: 2">
                                    <asp:Label ID="open_house_pend_issueLabel" runat="server" 
                                        Text='<%# Eval("open_house_pend_issue") %>' />
                                    </span></span>
                                </p>
                                <p class="MsoNormal" style="line-height: 150%">
                                    <span style="font-size: 14.0pt; line-height: 150%; mso-bidi-font-family: Calibri">
                                    _________________________________________________________________________________________________</span><p 
                                        class="MsoNormal">
                                        <span style="mso-bidi-font-weight:normal"><u>
                                        <span style="font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri">
                                        Signature:</span></u></span><p>
                                        </p>
                                        <span style="mso-bidi-font-weight:normal">
                                        <p class="MsoNormal">
                                            <span style="font-size:12.0pt;mso-bidi-font-size:14.0pt;line-height:115%;mso-bidi-font-family:
Calibri">CEP <span style="mso-spacerun:yes">&nbsp;</span>Representative</span><span style="font-size:14.0pt;line-height:
115%;mso-bidi-font-family:Calibri"><span style="mso-tab-count:1">&nbsp; </span><span style="mso-tab-count:6">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                            </span>
                                            <span style="font-size:12.0pt;mso-bidi-font-size:
14.0pt;line-height:115%;mso-bidi-font-family:Calibri">Training Centre Head<span style="mso-tab-count:3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </span><span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp; </span><span style="mso-tab-count:1">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>
                                        </p>
                                        </span>
                                        <p class="MsoNormal">
                                            <span style="mso-bidi-font-weight:normal">
                                            <span style="font-size:12.0pt;mso-bidi-font-size:14.0pt;line-height:115%;mso-bidi-font-family:
Calibri">________________________</span></span><span style="mso-bidi-font-weight:
normal"><span style="font-size:14.0pt;line-height:115%;mso-bidi-font-family:
Calibri"><span style="mso-tab-count:1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-tab-count:4">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                                            <span style="mso-bidi-font-weight:normal">
                                            <span style="font-size:12.0pt;mso-bidi-font-size:
14.0pt;line-height:115%;mso-bidi-font-family:Calibri">____________________<span style="mso-tab-count:2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </span><span style="mso-spacerun:yes">&nbsp; </span></span></span>
                                            <span style="mso-bidi-font-weight:normal">
                                            <span style="font-size:12.0pt;
mso-bidi-font-size:14.0pt;line-height:115%;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;
mso-fareast-font-family:Calibri;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA">
                                            <br />
                                            (Name, Signature &amp; Seal)</span><span style="font-size:14.0pt;line-height:115%;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;
mso-fareast-font-family:Calibri;mso-ansi-language:EN-US;mso-fareast-language:
EN-US;mso-bidi-language:AR-SA"> <span style="mso-tab-count:2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="mso-tab-count:4">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </span>
                                            </span>
                                            <span style="font-size:12.0pt;mso-bidi-font-size:14.0pt;line-height:115%;font-family:
&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:Calibri;mso-ansi-language:EN-US;
mso-fareast-language:EN-US;mso-bidi-language:AR-SA">(Name, Signature &amp; Seal)<span style="mso-tab-count:1">&nbsp;&nbsp;&nbsp;<br />
                                            <br />
                                            <br />
                                            ___________________________________________________________________________________________________&nbsp;
                                            </span></span></span>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                        <p>
                                        </p>
                                    </p>
                                </p>
                            </p>
                        </p>
                    </p>
                </p>
            </p>
        </ItemTemplate>
    </asp:DataList>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        
        SelectCommand="SELECT dbo.support_visit.code, dbo.support_visit.project_code, dbo.support_visit.center_code, dbo.support_visit.visit_date, dbo.support_visit.c_person, dbo.support_visit.c_ph, dbo.support_visit.c_mobile, dbo.support_visit.c_email, dbo.support_visit.enrl_file_pre, dbo.support_visit.all_are_sport, dbo.support_visit.lab_infra, dbo.support_visit.monthly_atten_reg, dbo.support_visit.visit_obesrv, dbo.support_visit.is_batch_file_pre, dbo.support_visit.is_batch_file_main, dbo.support_visit.batch_timing_notice, dbo.support_visit.course_plan, dbo.support_visit.books_reading, dbo.support_visit.course_mater, dbo.support_visit.student_open_house, dbo.support_visit.no_of_ban_house, dbo.support_visit.any_dropouts, dbo.support_visit.total_dropouts, dbo.support_visit.is_visit_local_welfare_off, dbo.support_visit.are_student_comf, dbo.support_visit.training_obesrv, dbo.support_visit.is_placement_coor, dbo.support_visit.tot_org_apr, dbo.support_visit.tot_no_of_placement, dbo.support_visit.no_of_student_att_intr, dbo.support_visit.no_student_placed, dbo.support_visit.placement_observ, dbo.support_visit.open_house_pend_issue, dbo.support_visit.date, dbo.support_visit.addr, dbo.support_visit.center_name, dbo.project.project_name, dbo.tb1.name FROM dbo.support_visit INNER JOIN dbo.project ON dbo.support_visit.project_code = dbo.project.code INNER JOIN dbo.tb1 ON dbo.support_visit.center_code = dbo.tb1.center_code_main WHERE (dbo.support_visit.center_code = @center_code) AND (dbo.support_visit.visit_date = @date)">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList1" Name="date" 
                PropertyName="SelectedValue" />
            <asp:SessionParameter Name="center_code" SessionField="start_a" />
        </SelectParameters>
    </asp:SqlDataSource>
    </p>
</asp:Content>

