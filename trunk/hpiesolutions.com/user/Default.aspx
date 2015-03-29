<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="user_Default" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
     
        .style1
        {
            width: 922px;
        }
        .style2
        {
            height: 39px;
        }
        .style3
        {
            height: 37px;
        }
        .style7
        {
            height: 33px;
        }
        .style8
        {
            height: 42px;
        }
        .style9
        {
            width: 159px;
        }
        .style10
        {
            height: 37px;
            width: 159px;
        }
        .style11
        {
            height: 39px;
            }
        .style19
        {
            height: 184px;
            width: 65px;
        }
        .style21
        {
        }
        .style22
        {
            width: 460px;
        }
        .style23
        {
            height: 21px;
        }
        .style24
        {
            width: 412px;
        }
        .style29
        {
            width: 156px;
        }
        .style31
        {
            height: 33px;
            width: 173px;
        }
        .style32
        {
            height: 42px;
            width: 173px;
        }
        .style35
        {
            width: 173px;
        }
        .style36
        {
            height: 37px;
            width: 173px;
        }
        .style37
        {
            width: 844px;
        }
        .style38
        {
            width: 65px;
        }
        .style39
        {
            height: 26px;
            width: 65px;
        }
        .style40
        {
            height: 39px;
            width: 65px;
        }
        .style41
        {
            height: 33px;
            width: 65px;
        }
        .style42
        {
            height: 42px;
            width: 65px;
        }
        .style43
        {
            height: 37px;
            width: 65px;
        }
    </style>

</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
       <div class="banner"> Add New Student<br />
      
    </div>
         <table class="style37">
               <tr class="style39" bgcolor="#293955">
                   <td>
                       &nbsp;</td>
                   <td>
                       &nbsp;</td>
               </tr>
               <tr>
                   <td>
                       Select Image</td>
                   <td>
                <asp:FileUpload ID="File112" runat="server" />
                                         <asp:RegularExpressionValidator runat="server" ID="valUpTest" ControlToValidate="File112"
ErrorMessage="Image Files Only (.jpg, .bmp, .png, .gif)" ValidationGroup="up"

ValidationExpression="^(([a-zA-Z]:)|(\\{2}\w+)\$?)(\\(\w[\w].*))(.jpg|.JPG|.gif|.GIF|.jpeg|.JPEG|.bmp|.BMP|.png|.PNG)$" 
                                             ForeColor="#990000" />
                   </td>
               </tr>
               </table>
 <asp:UpdatePanel ID="MyUpdatePanel" runat="server">
   <Triggers>
               <asp:PostBackTrigger ControlID="Button1" />
               </Triggers>
  <ContentTemplate>
    <table class="style1">
        <tr>
            <td class="style40">
                &nbsp;</td>
            <td colspan="2" class="style2">
                <strong>Personal Detail<br /> 
                ---------------------------------------------------------------------------------</strong></td>
            <td  colspan="2" class="style2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style41">
                &nbsp;</td>
            <td class="style31">
                Project Code</td>
            <td class="style7" colspan="3">
                                         <asp:DropDownList ID="p_code" runat="server" DataSourceID="SqlDataSource6" 
                                             DataTextField="project_name" DataValueField="code">
                                         </asp:DropDownList>
                                         <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                                             ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                             SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td  rowspan="4" class="style38">
                &nbsp;</td>
            <td class="style35">
                Student ID</td>
            <td>
                <asp:TextBox ID="s_id" runat="server" CssClass="ttxt" ReadOnly="True"></asp:TextBox>
                <asp:Label ID="t1" runat="server" Visible="False"></asp:Label>
            </td>
            <td colspan="2">
                <strong>Correspondent<br /> 
                -----------------------------------------------------------------------------------</strong></td>
        </tr>
        <tr>
            <td class="style35">
                Student First Name<asp:RequiredFieldValidator ID="RequiredFieldValidator1" 
                    runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                <asp:TextBox ID="s_name" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style9">
                Address<asp:RequiredFieldValidator ID="RequiredFieldValidator11" runat="server" 
                    ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                <asp:TextBox ID="c_addr" runat="server" CssClass="ttxt" Width="265px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style35">
                Student Middle Name</td>
            <td>
                <asp:TextBox ID="s_m_name0" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style9">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="c_addr2" runat="server" CssClass="ttxt" Width="265px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style35">
                Student Last name</td>
            <td>
                <asp:TextBox ID="s_l_name" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td >
                </td>
            <td>
                <asp:TextBox ID="c_addr3" runat="server" CssClass="ttxt" Width="265px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Father\Husband First Name<asp:RequiredFieldValidator 
                    ID="RequiredFieldValidator2" runat="server" ControlToValidate="s_name" 
                    ErrorMessage="*" ForeColor="#990000" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                                         <asp:TextBox ID="s_f_name" runat="server" CssClass="ttxt"></asp:TextBox>
</td>
            <td class="style9">
                State</td>
            <td>
                <asp:DropDownList ID="DropDownList4" runat="server" CssClass="ttxt2">
                    <asp:ListItem>Himachal Pradesh</asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Father\Husband Middle Name</td>
            <td>
                <asp:TextBox ID="f_m_name" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style9">
                District</td>
            <td>
                <asp:DropDownList ID="DropDownList2" runat="server" AutoPostBack="True" 
                    CssClass="ttxt2" DataSourceID="SqlDataSource1" DataTextField="distt" 
                    DataValueField="code" 
                    onselectedindexchanged="DropDownList2_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [distt]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Father\Husband Last Name</td>
            <td>
                <asp:TextBox ID="f_l_name" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style9">
                City/ Location</td>
            <td>
                <asp:DropDownList ID="DropDownList3" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource2" DataTextField="city" DataValueField="code">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [city] WHERE ([distt] = @distt)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList2" Name="distt" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Date of Birth<asp:RequiredFieldValidator ID="RequiredFieldValidator3" 
                    runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                                         <asp:TextBox ID="dob" runat="server" CssClass="ttxt" AutoPostBack="True" 
                                             ontextchanged="dob_TextChanged"></asp:TextBox>
                                         <ajaxToolkit:CalendarExtender ID="dob_CalendarExtender" runat="server" 
                                             DefaultView="Days" Enabled="True" PopupPosition="BottomLeft" 
                                             TargetControlID="dob">
                                         </ajaxToolkit:CalendarExtender>
                                         (mm/dd/yyyy)</td>
            <td class="style9">
                Postal Code<asp:RequiredFieldValidator ID="RequiredFieldValidator12" 
                    runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                <asp:TextBox ID="c_pin" runat="server" CssClass="ttxt" MaxLength="6"></asp:TextBox>
                <ajaxToolkit:FilteredTextBoxExtender ID="c_pin_FilteredTextBoxExtender" 
                    runat="server" Enabled="True" FilterType="Numbers" TargetControlID="c_pin">
                </ajaxToolkit:FilteredTextBoxExtender>
            </td>
        </tr>
        <tr>
            <td class="style42">
                &nbsp;</td>
            <td class="style32">
                Age</td>
            <td class="style8">
                <asp:TextBox ID="age" runat="server" CssClass="ttxt" ReadOnly="True"></asp:TextBox>
            </td>
            <td class="style8" colspan="2">
                <strong>Permanent&nbsp;&nbsp;&nbsp;
                <asp:CheckBox ID="CheckBox1" runat="server" AutoPostBack="True" 
                    oncheckedchanged="CheckBox1_CheckedChanged" Text="Same as above" />
                <br /> 
                -------------------------------------------------------------------------------------</strong></td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Gender</td>
            <td>
                <asp:RadioButtonList ID="RadioButtonList2" runat="server" CssClass="ttxt2" 
                    RepeatDirection="Horizontal">
                    <asp:ListItem Selected="True">Male</asp:ListItem>
                    <asp:ListItem>Female</asp:ListItem>
                </asp:RadioButtonList>
            </td>
            <td class="style9">
                Address</td>
            <td>
                <asp:TextBox ID="p_addr" runat="server" CssClass="ttxt" Width="265px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Marital status</td>
            <td>
                                         <asp:RadioButtonList ID="RadioButtonList4" runat="server" CssClass="ttxt2" 
                                             RepeatDirection="Horizontal">
                                             <asp:ListItem>Married</asp:ListItem>
                                             <asp:ListItem Selected="True">Unmarried</asp:ListItem>
                                         </asp:RadioButtonList>
            </td>
            <td class="style9">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="p_addr2" runat="server" CssClass="ttxt" Width="265px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Email-ID</td>
            <td>
                <asp:TextBox ID="email" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style9">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="p_addr3" runat="server" CssClass="ttxt" Width="265px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Landline</td>
            <td> <asp:TextBox ID="std" runat="server" CssClass="ttxt" Width="60px" 
                    MaxLength="5"></asp:TextBox>_
                <asp:TextBox ID="landline" runat="server" CssClass="ttxt" MaxLength="7" Width="80px"></asp:TextBox>
            </td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Mobile<asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                    ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                <asp:TextBox ID="mobile" runat="server" CssClass="ttxt" MaxLength="10"></asp:TextBox>
                <ajaxToolkit:FilteredTextBoxExtender ID="mobile_FilteredTextBoxExtender" 
                    runat="server" Enabled="True" FilterType="Numbers" TargetControlID="mobile">
                </ajaxToolkit:FilteredTextBoxExtender>
            </td>
            <td class="style9">
                State</td>
            <td>
                                         <asp:DropDownList ID="DropDownList7" runat="server" CssClass="ttxt2">
                                             <asp:ListItem>Himachal Pradesh</asp:ListItem>
                                         </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style43">
                &nbsp;</td>
            <td class="style36">
                Physically challenged</td>
            <td class="style3">
                <asp:RadioButtonList ID="RadioButtonList3" runat="server" CssClass="ttxt2" 
                    RepeatDirection="Horizontal">
                    <asp:ListItem>Yes</asp:ListItem>
                    <asp:ListItem Selected="True">No</asp:ListItem>
                </asp:RadioButtonList>
            </td>
            <td   class="style10">
                District</td>
                <td   class="style3">
                    <asp:DropDownList ID="DropDownList5" runat="server" AutoPostBack="True" 
                        CssClass="ttxt2" DataSourceID="SqlDataSource1" DataTextField="distt" 
                        DataValueField="code" 
                        onselectedindexchanged="DropDownList5_SelectedIndexChanged">
                    </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style43">
                &nbsp;</td>
            <td class="style36">
                Travel</td>
            <td class="style3">
                <asp:TextBox ID="travel" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style10">
                City/ Location</td>
            <td class="style3">
                <asp:DropDownList ID="DropDownList6" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource3" DataTextField="city" DataValueField="code">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [city] WHERE ([distt] = @distt)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList5" Name="distt" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td colspan="2">
                <strong>Bank Detail<br /> 
                ------------------------------------------------------------------------------------</strong></td>
            <td class="style9">
                Postal Code<asp:RequiredFieldValidator ID="RequiredFieldValidator10" 
                    runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                                         <asp:TextBox ID="p_pin" runat="server" CssClass="ttxt" MaxLength="6"></asp:TextBox>
                                         <ajaxToolkit:FilteredTextBoxExtender ID="p_pin_FilteredTextBoxExtender" 
                                             runat="server" Enabled="True" FilterType="Numbers" TargetControlID="p_pin">
                                         </ajaxToolkit:FilteredTextBoxExtender>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Bank Account Number
                <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                    ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                                         <asp:TextBox ID="bank_no" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style9">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                Bank Name<asp:RequiredFieldValidator ID="RequiredFieldValidator6" 
                    runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource8" DataTextField="bank_name" 
                    DataValueField="bank_name">
                    <asp:ListItem>SBI</asp:ListItem>
                    <asp:ListItem>PNB</asp:ListItem>
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource8" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [bank_detail]"></asp:SqlDataSource>
            </td>
            <td colspan="2">
                <strong>Qualification<br /> 
                --------------------------------------------------------------------------------------</strong></td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                IFSC CODE<asp:RequiredFieldValidator ID="RequiredFieldValidator7" 
                    runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                <asp:TextBox ID="ifsc_code" runat="server" CssClass="ttxt"></asp:TextBox>
            </td>
            <td class="style9">
                Degree</td>
            <td>
                <asp:DropDownList ID="DropDownList8" runat="server" CssClass="ttxt2">
                    <asp:ListItem Value="MCA">MCA</asp:ListItem>
                    <asp:ListItem>PGDCA</asp:ListItem>
                    <asp:ListItem>BCA</asp:ListItem>
                    <asp:ListItem>Graduation</asp:ListItem>
                    <asp:ListItem>Post Graduation</asp:ListItem>
                    <asp:ListItem>Other</asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style40">
                &nbsp;</td>
            <td class="style2" colspan="2">
                <strong>Social Status<br /> 
                -----------------------------------------------------------------------------------</strong></td>
            <td class="style11">
                Highest Qualification</td>
            <td class="style2">
                                         <asp:DropDownList ID="DropDownList9" runat="server" CssClass="ttxt2">
                                             <asp:ListItem>10+2</asp:ListItem>
                                             <asp:ListItem>10th</asp:ListItem>
                                             <asp:ListItem>Other</asp:ListItem>
                                             <asp:ListItem>Bcom</asp:ListItem>
                                             <asp:ListItem>BA</asp:ListItem>
                                             <asp:ListItem>BSce</asp:ListItem>
                                         </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style19">
            </td>
            <td class="style21" colspan="2" rowspan="2">
                <table class="style24">
                    <tr>
                        <td class="style29">
                            Social Status</td>
                        <td>
                            <asp:DropDownList ID="social_st" runat="server" CssClass="ttxt2" 
                                DataSourceID="SqlDataSource7" DataTextField="categ" DataValueField="categ">
                            </asp:DropDownList>
                        </td>
                    </tr>
                    <tr>
                        <td class="style29">
                            PL Card Number / IRDPB Number</td>
                        <td>
                            <asp:TextBox ID="bpl_irdp" runat="server" CssClass="ttxt"></asp:TextBox>
                        </td>
                    </tr>
                    <tr>
                        <td class="style29">
                            Annual Income</td>
                        <td>
                            <asp:TextBox ID="ann_inc" runat="server" CssClass="ttxt"></asp:TextBox>
                        </td>
                    </tr>
                    <tr>
                        <td class="style29">
                            Other Income</td>
                        <td>
                            <asp:TextBox ID="other_inc" runat="server" CssClass="ttxt"></asp:TextBox>
                        </td>
                    </tr>
                    <tr>
                        <td class="style29">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style29">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                </table>
                <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [categ]"></asp:SqlDataSource>
            </td>
            <td class="style21" colspan="2">
                <table class="style22">
                    <tr>
                        <td>
                            SSC Subject</td>
                        <td>
                            Year</td>
                        <td>
                            %</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <asp:TextBox ID="ssc" runat="server" CssClass="ttxt" Width="144px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:TextBox ID="ssc_year" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:TextBox ID="ssc_per" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            HSC Subject</td>
                        <td>
                            Year</td>
                        <td>
                            %</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <asp:TextBox ID="hsc" runat="server" CssClass="ttxt" Width="144px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:TextBox ID="hsc_year" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:TextBox ID="hsc_per" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            Graduation Subject</td>
                        <td>
                            Year</td>
                        <td>
                            %</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style23">
                            <asp:TextBox ID="Gradu" runat="server" CssClass="ttxt" Width="144px"></asp:TextBox>
                        </td>
                        <td class="style23">
                            <asp:TextBox ID="gradu_year" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td class="style23">
                            <asp:TextBox ID="gradu_per" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td class="style23">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Post Graduation Subject</td>
                        <td>
                            Year</td>
                        <td>
                            %</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <asp:TextBox ID="post_gradu" runat="server" CssClass="ttxt" Width="144px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:TextBox ID="post_gradu_year" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td>
                            <asp:TextBox ID="post_gradu_per" runat="server" CssClass="ttxt" Width="42px"></asp:TextBox>
                        </td>
                        <td>
                            &nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="style38">
                </td>
            <td colspan="2">
                <strong>Course Detail<br /> 
                ---------------------------------------------------------------------------------------</strong></td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                <asp:RequiredFieldValidator 
                    ID="RequiredFieldValidator8" runat="server" ControlToValidate="s_name" 
                    ErrorMessage="*" ForeColor="#990000" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
            <td class="style9">
                Course Name</td>
            <td>
                <asp:DropDownList ID="DropDownList11" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource5" DataTextField="course_name" DataValueField="code">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
            <td>
                                         &nbsp;</td>
            <td class="style9">
                Training Start Date</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="TextBox1">
                </ajaxToolkit:CalendarExtender>
                (mm/dd/yyyy)</td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35" >
                &nbsp;</td>
                 <td >
                     &nbsp;</td>
            <td class="style9">
               Training Completion Date</td>
               <td>
                   <asp:TextBox ID="TextBox2" runat="server" CssClass="ttxt"></asp:TextBox>
                   <ajaxToolkit:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                       Enabled="True" TargetControlID="TextBox2">
                   </ajaxToolkit:CalendarExtender>
                   (mm/dd/yyyy)</td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                                         &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
            <td>
                                         &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                                         &nbsp;</td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                                         &nbsp;</td>
        </tr>
        <tr>
            <td bgcolor="#293955" class="style38">
                &nbsp;</td>
            <td bgcolor="#293955" colspan="4">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Button ID="Button1" runat="server" CssClass="ttxt3" 
                    onclick="Button1_Click" Text="Submit" />
                &nbsp;<asp:Button ID="Button2" runat="server" CausesValidation="False" 
                    onclick="Button2_Click" Text="Button" Visible="False" />
                &nbsp;&nbsp;&nbsp;&nbsp;<asp:Label ID="Label1" runat="server" ForeColor="White" 
                    style="color: #FF0000"></asp:Label>
                &nbsp;<asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    InsertCommand="INSERT INTO student_detail(s_id, s_name, s_f_name, dob, gen, email, landline, mobile, addr, city, distt, state, p_code, degree, quli, an_income, social_status, phy_chall, bank_ac, bank_name, ifsc_code, bpl_irdp_no, center_code, p_addr, p_city, p_distt, p_state, p_p_code, s_id_main, img, course, date_of_add, sub_date, project_code, tr_status, tr_date, tr_com_date, s_name2, s_name3, f_name2, f_name3, m_status, addr2, addr3, travel, other_inc, tot_inc, age, SSC_Sub, SSC_Yr, SSC_Per, HSC_Sub, HSC_Yr, HSC_Per, Gra_Sub, Gra_Yr, Gra_Per, Post_Gra_Sub, Post_Gra_Yr, Post_Gra_Per, complevel, std_code, per_corres_same, p_addr2, p_addr3) VALUES (@s_id, @s_name, @s_f_name, @dob, @gen, @email, @landline, @mobile, @addr, @city, @distt, @state, @p_code, @degree, @quli, @an_income, @social_status, @phy_chall, @bank_ac, @bank_name, @ifsc_code, @bpl_irdp_no, @center_code, @p_addr, @p_city, @p_distt, @p_state, @p_p_code, @s_id_main, @img, @course, @date_of_add, @sub_date, @project_code, @tr_status, @tr_date, @tr_com_date, @s_name2, @s_name3, @f_name2, @f_name3, @m_status, @addr2, @addr3, @travel, @other_inc, @tot_inc, @age, @SSC_Sub, @SSC_Yr, @SSC_Per, @HSC_Sub, @HSC_Yr, @HSC_Per, @Gra_Sub, @Gra_Yr, @Gra_Per, @Post_Gra_Sub, @Post_Gra_Yr, @Post_Gra_Per, @complevel, @std_code, @per_corres_same, @p_addr2, @p_addr3)" 
                    
                    
                    
                    SelectCommand="SELECT * FROM [student_detail] where center_code=@code order by code desc">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="t1" Name="s_id" PropertyName="Text" />
                        <asp:ControlParameter ControlID="s_name" Name="s_name" PropertyName="Text" />
                        <asp:ControlParameter ControlID="s_f_name" Name="s_f_name" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="dob" Name="dob" PropertyName="Text" />
                        <asp:ControlParameter ControlID="RadioButtonList2" Name="gen" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="email" Name="email" PropertyName="Text" />
                        <asp:ControlParameter ControlID="landline" Name="landline" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="mobile" Name="mobile" PropertyName="Text" />
                        <asp:ControlParameter ControlID="c_addr" Name="addr" PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="city" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="distt" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList4" Name="state" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="c_pin" Name="p_code" PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList8" Name="degree" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList9" Name="quli" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="ann_inc" Name="an_income" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="social_st" Name="social_status" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="RadioButtonList3" Name="phy_chall" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="bank_no" Name="bank_ac" PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList1" Name="bank_name" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="ifsc_code" Name="ifsc_code" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="bpl_irdp" Name="bpl_irdp_no" 
                            PropertyName="Text" />
                        <asp:SessionParameter Name="center_code" SessionField="start_a" />
                        <asp:ControlParameter ControlID="p_addr" Name="p_addr" PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList6" Name="p_city" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList5" Name="p_distt" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList7" Name="p_state" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="p_pin" Name="p_p_code" PropertyName="Text" />
                        <asp:ControlParameter ControlID="s_id" Name="s_id_main" PropertyName="Text" />
                        <asp:Parameter Name="img" />
                        <asp:ControlParameter ControlID="DropDownList11" Name="course" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox1" Name="date_of_add" 
                            PropertyName="Text" />
                        <asp:Parameter Name="sub_date" />
                        <asp:ControlParameter ControlID="p_code" Name="project_code" 
                            PropertyName="SelectedValue" />
                        <asp:Parameter DefaultValue="Active" Name="tr_status" />
                        <asp:ControlParameter ControlID="TextBox1" Name="tr_date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="tr_com_date" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="s_m_name0" Name="s_name2" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="s_l_name" Name="s_name3" PropertyName="Text" />
                        <asp:ControlParameter ControlID="f_m_name" Name="f_name2" PropertyName="Text" />
                        <asp:ControlParameter ControlID="f_l_name" Name="f_name3" PropertyName="Text" />
                        <asp:ControlParameter ControlID="RadioButtonList4" DefaultValue="" 
                            Name="m_status" PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="c_addr2" Name="addr2" PropertyName="Text" />
                        <asp:ControlParameter ControlID="c_addr3" Name="addr3" PropertyName="Text" />
                        <asp:ControlParameter ControlID="travel" Name="travel" PropertyName="Text" />
                        <asp:ControlParameter ControlID="other_inc" Name="other_inc" 
                            PropertyName="Text" />
                        <asp:Parameter Name="tot_inc" />
                        <asp:ControlParameter ControlID="age" Name="age" PropertyName="Text" />
                        <asp:ControlParameter ControlID="ssc" Name="SSC_Sub" PropertyName="Text" />
                        <asp:ControlParameter ControlID="ssc_year" Name="SSC_Yr" PropertyName="Text" />
                        <asp:ControlParameter ControlID="ssc_per" Name="SSC_Per" PropertyName="Text" />
                        <asp:ControlParameter ControlID="hsc" Name="HSC_Sub" PropertyName="Text" />
                        <asp:ControlParameter ControlID="hsc_year" Name="HSC_Yr" PropertyName="Text" />
                        <asp:ControlParameter ControlID="hsc_per" Name="HSC_Per" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Gradu" Name="Gra_Sub" PropertyName="Text" />
                        <asp:ControlParameter ControlID="gradu_year" Name="Gra_Yr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="gradu_per" Name="Gra_Per" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="post_gradu" Name="Post_Gra_Sub" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="post_gradu_year" Name="Post_Gra_Yr" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="post_gradu_per" Name="Post_Gra_Per" 
                            PropertyName="Text" />
                        <asp:Parameter Name="complevel" />
                        <asp:ControlParameter ControlID="std" Name="std_code" PropertyName="Text" />
                        <asp:ControlParameter ControlID="CheckBox1" Name="per_corres_same" 
                            PropertyName="Checked" />
                        <asp:ControlParameter ControlID="p_addr2" Name="p_addr2" PropertyName="Text" />
                        <asp:ControlParameter ControlID="p_addr3" Name="p_addr3" PropertyName="Text" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:SessionParameter Name="code" SessionField="start_a" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style38">
                &nbsp;</td>
            <td class="style35">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                                         &nbsp;</td>
        </tr>
    </table>
    </ContentTemplate>    
    </asp:UpdatePanel>
   
   
</asp:Content>

