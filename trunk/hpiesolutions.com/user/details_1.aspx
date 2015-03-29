<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="details_1.aspx.cs" Inherits="user_details_1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">

        .style1
        {
            width: 883px;
        }
        .style2
        {
        }
        .style3
        {
            height: 37px;
        }
        .style4
        {
            height: 43px;
        }
        .style5
        {
        }
        .style6
        {
            height: 37px;
            width: 251px;
        }
        .style7
        {
            height: 43px;
            width: 251px;
        }
        .style9
        {
            height: 37px;
            width: 209px;
        }
        .style10
        {
            height: 43px;
            width: 209px;
        }
        .style16
        {
            width: 209px;
        }
        .style17
        {
            width: 251px;
            height: 15px;
        }
        .style18
        {
            width: 209px;
            height: 15px;
        }
        .style19
        {
            height: 15px;
        }
        .style35
        {
            width: 173px;
        }
        .style31
        {
            height: 33px;
            width: 173px;
        }
        .style8
        {
            height: 42px;
        }
        .style32
        {
            height: 42px;
            width: 173px;
        }
        .style36
        {
            height: 37px;
            width: 173px;
        }
        .style11
        {
            height: 39px;
            }
        .style24
        {
            width: 412px;
        }
        .style29
        {
            width: 156px;
        }
        .style22
        {
            width: 460px;
        }
        .style23
        {
            height: 21px;
        }
        .style37
        {
            height: 25px;
        }
        .style38
        {
            width: 400px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Student Details<br />
       
    </div> <asp:Label ID="Label4" runat="server" 
        style="font-weight: 700; color: #990000"></asp:Label>
    &nbsp;<asp:Label ID="Label5" runat="server" 
        style="font-weight: 700; color: #990000"></asp:Label>
    &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" 
        onclick="LinkButton1_Click">Add More Student..</asp:LinkButton>
    <asp:DataList ID="DataList1" runat="server" DataSourceID="SqlDataSource1" 
        Width="927px" oneditcommand="DataList1_EditCommand" 
        onitemdatabound="DataList1_ItemDataBound" 
        onupdatecommand="DataList1_UpdateCommand" 
        oncancelcommand="DataList1_CancelCommand">
        <EditItemTemplate>
            <table class="style1">
                <tr>
                    <td>
                        &nbsp;</td>
                    <td colspan="2">
                        <asp:ScriptManager ID="ScriptManager1" runat="server">
                        </asp:ScriptManager>
                    </td>
                    <td colspan="2">
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#293955" class="style6">
                        &nbsp;</td>
                    <td align="center" bgcolor="#293955" class="style6" colspan="4">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style2">
                        &nbsp;</td>
                    <td class="style2" colspan="2">
                        <strong>Personal Detail<br />-----------------------------------------------------------------------------------</strong></td>
                    <td class="style2" colspan="2">
                        <asp:Button ID="Button2" runat="server" CommandName="update" Text="Update" />
                        &nbsp;<asp:Button ID="Button3" runat="server" CommandName="cancel" Text="Cancel" />
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Select Image</td>
                    <td>
                        <asp:FileUpload ID="File112" runat="server" />
                        <br />
                        <br />
                        <asp:RegularExpressionValidator ID="valUpTest" runat="server" 
                            ControlToValidate="File112" 
                            ErrorMessage="Image Files Only (.jpg, .bmp, .png, .gif)" ForeColor="#990000" 
                            ValidationExpression="^(([a-zA-Z]:)|(\\{2}\w+)\$?)(\\(\w[\w].*))(.jpg|.JPG|.gif|.GIF|.jpeg|.JPEG|.bmp|.BMP|.png|.PNG)$" 
                            ValidationGroup="up" />
                    </td>
                    <td class="style9">
                        <asp:Image ID="Image2" runat="server" Height="165px" 
                            ImageUrl='<%# Eval("img") %>' Width="193px" style="margin-right: 1px" />
                    </td>
                    <td>
                        <asp:Label ID="img" runat="server" Text='<%# Eval("img") %>' Visible="False"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style7">
                        &nbsp;</td>
                    <td class="style31">
                        Project Code</td>
                    <td class="style7" colspan="3">
                        <asp:DropDownList ID="p_code" runat="server" DataSourceID="SqlDataSource6" 
                            DataTextField="project_name" DataValueField="code" 
                            SelectedValue='<%# Eval("project_code") %>'>
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                            SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
                    </td>
                </tr>
                <tr>
                    <td rowspan="4">
                        &nbsp;</td>
                    <td class="style35">
                        Student ID</td>
                    <td>
                        <asp:TextBox ID="s_id" runat="server" CssClass="ttxt" ReadOnly="True" 
                            Text='<%# Eval("s_id_main") %>'></asp:TextBox>
                    </td>
                    <td colspan="2">
                        <strong>Correspondent<br />-----------------------------------------------------------------------------------</strong></td>
                </tr>
                <tr>
                    <td class="style35">
                        Student First Name<asp:RequiredFieldValidator ID="RequiredFieldValidator1" 
                            runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="s_name" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("s_name") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        Address<asp:RequiredFieldValidator ID="RequiredFieldValidator11" runat="server" 
                            ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="c_addr" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("addr") %>' Width="265px"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style35">
                        Student Middle Name</td>
                    <td>
                        <asp:TextBox ID="s_m_name" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("s_name2") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        &nbsp;</td>
                    <td>
                        <asp:TextBox ID="c_addr2" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("addr2") %>' Width="265px"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style35">
                        Student Last name</td>
                    <td>
                        <asp:TextBox ID="s_l_name" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("s_name3") %>'></asp:TextBox>
                    </td>
                    <td>
                    </td>
                    <td>
                        <asp:TextBox ID="c_addr3" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("addr3") %>' Width="265px"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Father\Husband First Name<asp:RequiredFieldValidator 
                            ID="RequiredFieldValidator2" runat="server" ControlToValidate="s_name" 
                            ErrorMessage="*" ForeColor="#990000" SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="s_f_name" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("s_f_name") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        State</td>
                    <td>
                        <asp:DropDownList ID="DropDownList4" runat="server" CssClass="ttxt2" 
                            SelectedValue='<%# Eval("state") %>'>
                            <asp:ListItem>Himachal Pradesh</asp:ListItem>
                        </asp:DropDownList>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Father\Husband Middle Name</td>
                    <td>
                        <asp:TextBox ID="f_m_name" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("f_name2") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        District</td>
                    <td>
                        <asp:DropDownList ID="DropDownList2" runat="server" AutoPostBack="True" 
                            CssClass="ttxt2"  DataTextField="distt" 
                            DataValueField="code" DataSourceID="SqlDataSource1">
                             
                           
                            
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                            SelectCommand="SELECT * FROM [distt]"></asp:SqlDataSource>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Father\Husband Last Name</td>
                    <td>
                        <asp:TextBox ID="f_l_name" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("f_name3") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        City/ Location</td>
                    <td>
                        <asp:DropDownList ID="DropDownList3" runat="server" CssClass="ttxt2" 
                            DataTextField="city" DataValueField="code" DataSourceID="cc_city" 
                            >
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="cc_city" runat="server" 
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
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Date of Birth<asp:RequiredFieldValidator ID="RequiredFieldValidator3" 
                            runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="dob" runat="server"  CssClass="ttxt" 
                             Text='<%# Eval("dob", "{0:d}") %>'></asp:TextBox>
                        <ajaxToolkit:CalendarExtender ID="dob_CalendarExtender" runat="server" 
                            DefaultView="Days" Enabled="True" PopupPosition="BottomLeft" 
                            TargetControlID="dob">
                        </ajaxToolkit:CalendarExtender>
                    </td>
                    <td class="style9">
                        Postal Code<asp:RequiredFieldValidator ID="RequiredFieldValidator12" 
                            runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="c_pin" runat="server" CssClass="ttxt" MaxLength="6" 
                            Text='<%# Eval("p_code") %>'></asp:TextBox>
                        <ajaxToolkit:FilteredTextBoxExtender ID="c_pin_FilteredTextBoxExtender" 
                            runat="server" Enabled="True" FilterType="Numbers" TargetControlID="c_pin">
                        </ajaxToolkit:FilteredTextBoxExtender>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        &nbsp;</td>
                    <td class="style32">
                        Age</td>
                    <td class="style8">
                        <asp:TextBox ID="age" runat="server" CssClass="ttxt" ReadOnly="True" 
                            Text='<%# Eval("age") %>'></asp:TextBox>
                    </td>
                    <td class="style8" colspan="2">
                        <strong>Permanent&nbsp;&nbsp;&nbsp;
                        <asp:CheckBox ID="CheckBox1" runat="server" AutoPostBack="True" 
                            Text="Same as above" />
                        <br />
                        -------------------------------------------------------------------------------------</strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Gender</td>
                    <td>
                        <asp:RadioButtonList ID="RadioButtonList2" runat="server" CssClass="ttxt2" 
                            RepeatDirection="Horizontal" SelectedValue='<%# Eval("gen") %>'>
                            <asp:ListItem>Male</asp:ListItem>
                            <asp:ListItem>Female</asp:ListItem>
                        </asp:RadioButtonList>
                    </td>
                    <td class="style9">
                        Address</td>
                    <td>
                        <asp:TextBox ID="p_addr" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("p_addr") %>' Width="265px"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Marital status</td>
                    <td>
                        <asp:RadioButtonList ID="RadioButtonList4" runat="server" CssClass="ttxt2" 
                            RepeatDirection="Horizontal" SelectedValue='<%# Eval("m_status") %>'>
                            <asp:ListItem>Married</asp:ListItem>
                            <asp:ListItem>Unmarried</asp:ListItem>
                        </asp:RadioButtonList>
                    </td>
                    <td class="style9">
                        &nbsp;</td>
                    <td>
                        <asp:TextBox ID="p_addr2" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("p_addr2") %>' Width="265px"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Email-ID</td>
                    <td>
                        <asp:TextBox ID="email" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("email") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        &nbsp;</td>
                    <td>
                        <asp:TextBox ID="p_addr3" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("p_addr3") %>' Width="265px"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Landline</td>
                    <td>
                        <asp:TextBox ID="std" runat="server" CssClass="ttxt" MaxLength="5" 
                            Text='<%# Eval("std_code") %>' Width="60px"></asp:TextBox>
                        _
                        <asp:TextBox ID="landline" runat="server" CssClass="ttxt" MaxLength="7" 
                            Text='<%# Eval("landline") %>' Width="80px"></asp:TextBox>
                    </td>
                    <td class="style9">
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Mobile<asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                            ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="mobile" runat="server" CssClass="ttxt" MaxLength="10" 
                            Text='<%# Eval("mobile") %>'></asp:TextBox>
                        <ajaxToolkit:FilteredTextBoxExtender ID="mobile_FilteredTextBoxExtender" 
                            runat="server" Enabled="True" FilterType="Numbers" TargetControlID="mobile">
                        </ajaxToolkit:FilteredTextBoxExtender>
                    </td>
                    <td class="style9">
                        State</td>
                    <td>
                        <asp:DropDownList ID="DropDownList7" runat="server" CssClass="ttxt2" 
                            SelectedValue='<%# Eval("p_state") %>'>
                            <asp:ListItem>Himachal Pradesh</asp:ListItem>
                        </asp:DropDownList>
                    </td>
                </tr>
                <tr>
                    <td class="style3">
                        &nbsp;</td>
                    <td class="style36">
                        Physically challenged</td>
                    <td class="style3">
                        <asp:RadioButtonList ID="RadioButtonList3" runat="server" CssClass="ttxt2" 
                            RepeatDirection="Horizontal" SelectedValue='<%# Eval("phy_chall") %>'>
                            <asp:ListItem>Yes</asp:ListItem>
                            <asp:ListItem>No</asp:ListItem>
                        </asp:RadioButtonList>
                    </td>
                    <td class="style10">
                        District</td>
                    <td class="style3">
                        <asp:DropDownList ID="DropDownList5" runat="server" AutoPostBack="True" 
                            CssClass="ttxt2" DataTextField="distt" 
                            DataValueField="code"                              
                            DataSourceID="SqlDataSource8">
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource8" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                            SelectCommand="SELECT * FROM [distt]"></asp:SqlDataSource>
                    </td>
                </tr>
                <tr>
                    <td class="style3">
                        &nbsp;</td>
                    <td class="style36">
                        Travel</td>
                    <td class="style3">
                        <asp:TextBox ID="travel" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("travel") %>'></asp:TextBox>
                    </td>
                    <td class="style10">
                        City/ Location</td>
                    <td class="style3">
                        <asp:DropDownList ID="DropDownList6" runat="server" CssClass="ttxt2" 
                            DataTextField="city" DataValueField="code" DataSourceID="cc_city2" 
                           >
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="cc_city2" runat="server" 
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
                    <td>
                        &nbsp;</td>
                    <td colspan="2">
                        <strong>Bank Detail<br />------------------------------------------------------------------------------------</strong></td>
                    <td class="style9">
                        Postal Code<asp:RequiredFieldValidator ID="RequiredFieldValidator10" 
                            runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="p_pin" runat="server" CssClass="ttxt" MaxLength="6" 
                            Text='<%# Eval("p_p_code") %>'></asp:TextBox>
                        <ajaxToolkit:FilteredTextBoxExtender ID="p_pin_FilteredTextBoxExtender" 
                            runat="server" Enabled="True" FilterType="Numbers" TargetControlID="p_pin">
                        </ajaxToolkit:FilteredTextBoxExtender>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Bank Account Number
                        <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                            ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="bank_no" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("bank_ac") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        Bank Name<asp:RequiredFieldValidator ID="RequiredFieldValidator6" 
                            runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                            SelectedValue='<%# Eval("bank_name") %>' DataSourceID="SqlDataSource_bank" 
                            DataTextField="bank_name" DataValueField="bank_name">
                            <asp:ListItem>SBI</asp:ListItem>
                            <asp:ListItem>PNB</asp:ListItem>
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource_bank" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                            SelectCommand="SELECT * FROM [bank_detail]"></asp:SqlDataSource>
                        <asp:SqlDataSource ID="SqlDataSource2" runat="server"></asp:SqlDataSource>
                    </td>
                    <td colspan="2">
                        <strong>Qualification<br />--------------------------------------------------------------------------------------</strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        IFSC CODE<asp:RequiredFieldValidator ID="RequiredFieldValidator7" 
                            runat="server" ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="ifsc_code" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("ifsc_code") %>'></asp:TextBox>
                    </td>
                    <td class="style9">
                        Degree</td>
                    <td>
                        <asp:DropDownList ID="DropDownList8" runat="server" CssClass="ttxt2" 
                            SelectedValue='<%# Eval("degree") %>'>
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
                    <td class="style2">
                        &nbsp;</td>
                    <td class="style2" colspan="2">
                        <strong>Social Status<br />-----------------------------------------------------------------------------------</strong></td>
                    <td class="style11">
                        Highest Qualification</td>
                    <td class="style2">
                        <asp:DropDownList ID="DropDownList9" runat="server" CssClass="ttxt2" 
                            SelectedItems='<%# Eval("quli") %>'>
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
                                        DataSourceID="SqlDataSource7" DataTextField="categ" DataValueField="categ" 
                                        SelectedValue='<%# Eval("social_status") %>'>
                                    </asp:DropDownList>
                                </td>
                            </tr>
                            <tr>
                                <td class="style29">
                                    PL Card Number / IRDPB Number</td>
                                <td>
                                    <asp:TextBox ID="bpl_irdp" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("bpl_irdp_no") %>'></asp:TextBox>
                                </td>
                            </tr>
                            <tr>
                                <td class="style29">
                                    Annual Income</td>
                                <td>
                                    <asp:TextBox ID="ann_inc" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("an_income") %>'></asp:TextBox>
                                </td>
                            </tr>
                            <tr>
                                <td class="style29">
                                    Other Income</td>
                                <td>
                                    <asp:TextBox ID="other_inc" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("other_inc") %>'></asp:TextBox>
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
                                    <asp:TextBox ID="ssc" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("SSC_Sub") %>' Width="144px"></asp:TextBox>
                                </td>
                                <td>
                                    <asp:TextBox ID="ssc_year" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("SSC_Yr") %>' Width="42px"></asp:TextBox>
                                </td>
                                <td>
                                    <asp:TextBox ID="ssc_per" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("SSC_Per") %>' Width="42px"></asp:TextBox>
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
                                    <asp:TextBox ID="hsc" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("HSC_Sub") %>' Width="144px"></asp:TextBox>
                                </td>
                                <td>
                                    <asp:TextBox ID="hsc_year" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("HSC_Yr") %>' Width="42px"></asp:TextBox>
                                </td>
                                <td>
                                    <asp:TextBox ID="hsc_per" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("HSC_Per") %>' Width="42px"></asp:TextBox>
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
                                    <asp:TextBox ID="Gradu" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("Gra_Sub") %>' Width="144px"></asp:TextBox>
                                </td>
                                <td class="style23">
                                    <asp:TextBox ID="gradu_year" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("Gra_Yr") %>' Width="42px"></asp:TextBox>
                                </td>
                                <td class="style23">
                                    <asp:TextBox ID="gradu_per" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("Gra_Per") %>' Width="42px"></asp:TextBox>
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
                                    <asp:TextBox ID="post_gradu" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("Post_Gra_Sub") %>' Width="144px"></asp:TextBox>
                                </td>
                                <td>
                                    <asp:TextBox ID="post_gradu_year" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("Post_Gra_Yr") %>' Width="42px"></asp:TextBox>
                                </td>
                                <td>
                                    <asp:TextBox ID="post_gradu_per" runat="server" CssClass="ttxt" 
                                        Text='<%# Eval("Post_Gra_Per") %>' Width="42px"></asp:TextBox>
                                </td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td colspan="2">
                        <strong>Course Detail<br />---------------------------------------------------------------------------------------</strong></td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        <asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                            ControlToValidate="s_name" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        &nbsp;</td>
                    <td class="style9">
                        Course Name</td>
                    <td>
                        <asp:DropDownList ID="DropDownList11" runat="server" CssClass="ttxt2" 
                            DataSourceID="SqlDataSource5" DataTextField="course_name" DataValueField="code" 
                             
                            SelectedValue='<%# Eval("course") %>'>
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                            SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                    <td class="style9">
                        Training Start Date</td>
                    <td>
                        <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("tr_date", "{0:d}") %>'></asp:TextBox>
                        <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                            Enabled="True" TargetControlID="TextBox1">
                        </ajaxToolkit:CalendarExtender>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td class="style35">
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                    <td class="style9">
                        Training Completion Date</td>
                    <td>
                        <asp:TextBox ID="TextBox2" runat="server" CssClass="ttxt" 
                            Text='<%# Eval("tr_com_date", "{0:d}") %>'></asp:TextBox>
                        <ajaxToolkit:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                            Enabled="True" TargetControlID="TextBox2">
                        </ajaxToolkit:CalendarExtender>
                    </td>
                </tr>
                <tr>
                    <td>
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
                    <td>
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
                    <td>
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
                    <td bgcolor="#293955">
                        &nbsp;</td>
                    <td bgcolor="#293955" colspan="4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>
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
        </EditItemTemplate>
        <ItemTemplate>
            <table class="style1">
                <tr>
                    <td colspan="2" class="style2" rowspan="7" valign="top">
                        <strong>Personal Detail<br />-------------------------------------------------------------------------------<asp:Image 
                            ID="Image1" runat="server" BorderColor="#333333" BorderWidth="1px" 
                            Height="103px" ImageUrl='<%# Eval("img") %>' Width="134px" />
                        <br />
                        -------------------------------------------------------------------------------</strong></td>
                    <td colspan="2" class="style37">
                        <asp:Button ID="Button1" runat="server" CommandName="edit" Text="Edit" />
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        Student ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <asp:Label ID="s_id" runat="server" ReadOnly="True" 
                            Text='<%# Eval("s_id_main") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        Student Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <asp:Label ID="s_name" runat="server" Text='<%# Eval("s_name") %>'></asp:Label>
                        -<asp:Label ID="Label6" runat="server" Text='<%# Eval("s_name2") %>'></asp:Label>
                        -<asp:Label ID="Label7" runat="server" Text='<%# Eval("s_name3") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        Course&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <asp:Label ID="Label1" runat="server" Text='<%# Eval("course_name") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        Admission Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <asp:Label ID="Label2" runat="server" 
                            Text='<%# Eval("date_of_add", "{0:MMMM dd, yyyy}") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>
                        <br />
                        <br />
                        <br />
                        <br />
                        Correspondent Address<br />---------------------------------------------------------------------------------------</strong></td>
                </tr>
                <tr>
                    <td class="style5">
                        &nbsp;</td>
                    <td class="style16">
                        &nbsp;</td>
                    <td>
                       
                        Address</td>
                    <td>
                        <asp:Label ID="c_addr" runat="server"    
                            Text='<%# Eval("addr") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style17">
                        Project Code</td>
                    <td class="style18">
                        <asp:Label ID="Label3" runat="server" Text='<%# Eval("project_name") %>'></asp:Label>
                    </td>
                    <td class="style19">
                        State</td>
                    <td class="style19">
                        <asp:Label ID="state" runat="server" Text='<%# Eval("state") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Father\Husband Name
                    </td>
                    <td class="style16">
                        <asp:Label ID="s_f_name" runat="server" Text='<%# Eval("s_f_name") %>'  ></asp:Label>
                        -<asp:Label ID="Label8" runat="server" Text='<%# Eval("f_name2") %>'></asp:Label>
                        -<asp:Label ID="Label9" runat="server" Text='<%# Eval("f_name3") %>'></asp:Label>
                    </td>
                    <td>
                        District</td>
                    <td>
                        <asp:Label ID="gen0" runat="server" Text='<%# Eval("distt") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Date of Birth
                    </td>
                    <td class="style16">
                        <asp:Label ID="dob" runat="server" Text='<%# Eval("dob", "{0:d}") %>'  ></asp:Label>
                        
                    </td>
                    <td>
                        City/ Location</td>
                    <td>
                        <asp:Label ID="gen1" runat="server" Text='<%# Eval("city") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Age</td>
                    <td class="style16">
                        <asp:Label ID="Label10" runat="server" Text='<%# Eval("age") %>'></asp:Label>
                    </td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style5">
                        Gender</td>
                    <td class="style16">
                        <asp:Label ID="gen" runat="server" Text='<%# Eval("gen") %>'></asp:Label>
                    </td>
                    <td>
                        Postal Code
                    </td>
                    <td>
                        <asp:Label ID="c_pin" runat="server" Text='<%# Eval("p_code") %>'  ></asp:Label>
                      
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Marital status</td>
                    <td class="style16">
                        <asp:Label ID="Label11" runat="server" Text='<%# Eval("m_status") %>'></asp:Label>
                    </td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style6">
                        Email-ID</td>
                    <td class="style9">
                        <asp:Label ID="email" runat="server" Text='<%# Eval("email") %>'  ></asp:Label>
                    </td>
                    <td class="style3" colspan="2">
                        <strong>Permanent Address<br />--------------------------------------------------------------------------------</strong></td>
                </tr>
                <tr>
                    <td class="style5">
                        Landline</td>
                    <td class="style16">
                        <asp:Label ID="Label12" runat="server" Text='<%# Eval("std_code") %>'></asp:Label>
                        -<asp:Label ID="landline" runat="server" Text='<%# Eval("landline") %>'  ></asp:Label>
                    </td>
                    <td>
                        Address</td>
                    <td>
                        <asp:Label ID="p_addr" runat="server"   
                             Text='<%# Eval("p_addr") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Mobile
                    </td>
                    <td class="style16">
                        <asp:Label ID="mobile" runat="server" Text='<%# Eval("mobile") %>'  ></asp:Label>
                       
                    </td>
                    <td>
                        State</td>
                    <td>
                        <asp:Label ID="gen2" runat="server" Text='<%# Eval("p_state") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Physically challenged</td>
                    <td class="style16">
                        <asp:Label ID="phy_chall" runat="server" Text='<%# Eval("phy_chall") %>'></asp:Label>
                    </td>
                    <td>
                        District</td>
                    <td>
                        <asp:Label ID="gen3" runat="server" Text='<%# Eval("distt2") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Travel</td>
                    <td class="style16">
                        <asp:Label ID="Label13" runat="server" Text='<%# Eval("travel") %>'></asp:Label>
                    </td>
                    <td>
                        City/ Location</td>
                    <td>
                        <asp:Label ID="gen4" runat="server" Text='<%# Eval("city2") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style2" colspan="2">
                        <strong>Bank Detail<br />--------------------------------------------------------------------------------</strong></td>
                    <td class="style2">
                        Postal Code
                    </td>
                    <td class="style2">
                        <asp:Label ID="p_pin" runat="server" Text='<%# Eval("p_p_code") %>'  ></asp:Label>
                        
                    </td>
                </tr>
                <tr>
                    <td class="style7">
                        Bank Account Number
                      
                    </td>
                    <td class="style10">
                        <asp:Label ID="bank_no" runat="server" Text='<%# Eval("bank_ac") %>'  ></asp:Label>
                    </td>
                    <td class="style4" colspan="2">
                        <strong>Qualification<br />---------------------------------------------------------------------------------</strong></td>
                </tr>
                <tr>
                    <td class="style5">
                        Bank Name
                    </td>
                    <td class="style16">
                        <asp:Label ID="bank_name" runat="server" Text='<%# Eval("bank_name") %>'></asp:Label>
                    </td>
                    <td>
                        Degree</td>
                    <td>
                        <asp:Label ID="gen5" runat="server" Text='<%# Eval("degree") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        IFSC CODE
                    </td>
                    <td class="style16">
                        <asp:Label ID="ifsc_code" runat="server" Text='<%# Eval("ifsc_code") %>'  ></asp:Label>
                    </td>
                    <td>
                        Qualification</td>
                    <td>
                        <asp:Label ID="gen6" runat="server" Text='<%# Eval("quli") %>'></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style5" colspan="2">
                        <strong>Social Status<br />------------------------------------------------------------------------------</strong></td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style5" colspan="2" valign="top">
                        <table class="style38">
                            <tr>
                                <td>
                                    Social Status</td>
                                <td>
                                    <asp:Label ID="Label27" runat="server" Text='<%# Eval("social_status") %>'></asp:Label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPL Card Number / IRDP Number
                                </td>
                                <td>
                                    <asp:Label ID="bpl_irdp" runat="server" Text='<%# Eval("bpl_irdp_no") %>'></asp:Label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Annual Income</td>
                                <td>
                                    <asp:Label ID="gen7" runat="server" Text='<%# Eval("an_income") %>'></asp:Label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Other Income</td>
                                <td>
                                    <asp:Label ID="Label26" runat="server" Text='<%# Eval("other_inc") %>'></asp:Label>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="2">
                        <table class="style22" border="1px" boredwidth="1" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>
                                    <b>SSC Subject</b></td>
                                <td>
                                    <b>Year</b></td>
                                <td>
                                    <b>%</b></td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <asp:Label ID="Label14" runat="server" Text='<%# Eval("SSC_Sub") %>'></asp:Label>
                                </td>
                                <td>
                                    <asp:Label ID="Label15" runat="server" Text='<%# Eval("SSC_Yr") %>'></asp:Label>
                                </td>
                                <td>
                                    <asp:Label ID="Label16" runat="server" Text='<%# Eval("SSC_Per") %>'></asp:Label>
                                </td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>HSC Subject</b></td>
                                <td>
                                    <b>Year</b></td>
                                <td>
                                    <b>%</b></td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <asp:Label ID="Label17" runat="server" Text='<%# Eval("HSC_Sub") %>'></asp:Label>
                                </td>
                                <td>
                                    <asp:Label ID="Label18" runat="server" Text='<%# Eval("HSC_Yr") %>'></asp:Label>
                                </td>
                                <td>
                                    <asp:Label ID="Label19" runat="server" Text='<%# Eval("HSC_Per") %>'></asp:Label>
                                </td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Graduation Subject</b></td>
                                <td>
                                    <b>Year</b></td>
                                <td>
                                    <b>%</b></td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="style23">
                                    <asp:Label ID="Label20" runat="server" Text='<%# Eval("Gra_Sub") %>'></asp:Label>
                                </td>
                                <td class="style23">
                                    <asp:Label ID="Label21" runat="server" Text='<%# Eval("Gra_Yr") %>'></asp:Label>
                                </td>
                                <td class="style23">
                                    <asp:Label ID="Label22" runat="server" Text='<%# Eval("Gra_Per") %>'></asp:Label>
                                </td>
                                <td class="style23">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Post Graduation Subject</b></td>
                                <td>
                                    <b>Year</b></td>
                                <td>
                                    <b>%</b></td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <asp:Label ID="Label23" runat="server" Text='<%# Eval("Post_Gra_Sub") %>'></asp:Label>
                                </td>
                                <td>
                                    <asp:Label ID="Label24" runat="server" Text='<%# Eval("Post_Gra_Yr") %>'></asp:Label>
                                </td>
                                <td>
                                    <asp:Label ID="Label25" runat="server" Text='<%# Eval("Post_Gra_Per") %>'></asp:Label>
                                </td>
                                <td>
                                    &nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="style5" colspan="2">
                        <strong>Course Detail<br />--------------------------------------------------------------------------------</strong></td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style5">
                        Course Name</td>
                    <td class="style16">
                        <asp:Label ID="Label28" runat="server" Text='<%# Eval("course_name") %>'></asp:Label>
                    </td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style5">
                        Training Start Date</td>
                    <td class="style16">
                        <asp:Label ID="Label29" runat="server" 
                            Text='<%# Eval("tr_date", "{0:dd MMM, yyyy}") %>'></asp:Label>
                    </td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style5">
                        Training Completion Date</td>
                    <td class="style16">
                        <asp:Label ID="Label30" runat="server" 
                            Text='<%# Eval("tr_com_date", "{0:dd MMM, yyyy}") %>'></asp:Label>
                    </td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td class="style5">
                        Training Status</td>
                    <td class="style16">
                        <asp:Label ID="Label31" runat="server" Text='<%# Eval("tr_status") %>'></asp:Label>
                    </td>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
            </table>
            <br />
        </ItemTemplate>
    </asp:DataList>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        
        
        
        
        
    SelectCommand="SELECT dbo.student_detail.course, student_detail.code, student_detail.s_id, student_detail.s_name, student_detail.s_f_name, student_detail.dob, student_detail.gen, student_detail.email, student_detail.landline, student_detail.mobile, student_detail.addr, student_detail.state, student_detail.p_code, student_detail.degree, student_detail.quli, student_detail.an_income, student_detail.social_status, student_detail.phy_chall, student_detail.bank_ac, student_detail.bank_name, student_detail.ifsc_code, student_detail.bpl_irdp_no, student_detail.center_code, student_detail.p_addr, student_detail.p_state, student_detail.p_p_code, student_detail.s_id_main, student_detail.img, student_detail.project_code, city.city, distt.distt, distt_1.distt AS distt2, city_1.city AS city2, student_detail.date_of_add, course_detail.course_name, project.project_name, student_detail.tr_date, student_detail.tr_com_date, student_detail.tr_status, student_detail.s_name2, student_detail.s_name3, student_detail.f_name2, student_detail.f_name3, student_detail.m_status, student_detail.addr2, student_detail.addr3, student_detail.travel, student_detail.other_inc, student_detail.tot_inc, student_detail.age, student_detail.SSC_Sub, student_detail.SSC_Yr, student_detail.SSC_Per, student_detail.HSC_Sub, student_detail.HSC_Yr, student_detail.HSC_Per, student_detail.Gra_Sub, student_detail.Gra_Yr, student_detail.Gra_Per, student_detail.Post_Gra_Sub, student_detail.Post_Gra_Yr, student_detail.Post_Gra_Per, student_detail.complevel, student_detail.std_code, student_detail.per_corres_same, student_detail.sub_date, student_detail.p_addr2, student_detail.p_addr3, city.code AS Expr1 FROM student_detail INNER JOIN city ON student_detail.city = city.code INNER JOIN distt ON student_detail.distt = distt.code INNER JOIN city AS city_1 ON student_detail.p_city = city_1.code INNER JOIN distt AS distt_1 ON student_detail.p_distt = distt_1.code INNER JOIN course_detail ON student_detail.course = course_detail.code INNER JOIN project ON student_detail.project_code = project.code WHERE (student_detail.s_id_main = @s_id_main) and (student_detail.center_code=@code)" 
    
        
        
        
        
        
        UpdateCommand="UPDATE student_detail SET s_name = @s_name, s_f_name = @s_f_name, dob = @dob, gen = @gen, email = @email, landline = @landline, mobile = @mobile, addr = @addr, city = @city, distt = @distt, state = @state, p_code = @p_code, degree = @degree, quli = @quli, an_income = @an_income, social_status = @social_status, phy_chall = @phy_chall, bank_ac = @bank_ac, bank_name = @bank_name, ifsc_code = @ifsc_code, bpl_irdp_no = @bpl_irdp_no, p_addr = @p_addr, p_city = @p_city, p_distt = @p_distt, p_state = @p_state, p_p_code = @p_p_code, img = @img, course = @course, date_of_add = @date_of_add, project_code = @project_code, tr_date = @tr_date, tr_com_date = @tr_com_date, s_name2 = @s_name2, s_name3 = @s_name3, f_name2 = @f_name2, f_name3 = @f_name3, m_status = @m_status, addr2 = @addr2, addr3 = @addr3, travel = @travel, other_inc = @other_inc, tot_inc = @tot_inc, age = @age, SSC_Sub = @SSC_Sub, SSC_Yr = @SSC_Yr, SSC_Per = @SSC_Per, HSC_Sub = @HSC_Sub, HSC_Yr = @HSC_Yr, HSC_Per = @HSC_Per, Gra_Sub = @Gra_Sub, Gra_Yr = @Gra_Yr, Gra_Per = @Gra_Per, Post_Gra_Sub = @Post_Gra_Sub, Post_Gra_Yr = @Post_Gra_Yr, Post_Gra_Per = @Post_Gra_Per, std_code = @std_code, per_corres_same = @per_corres_same, p_addr2 =@p_addr2, p_addr3 =@p_addr3 WHERE (s_id_main = @main)">
        <SelectParameters>
            <asp:QueryStringParameter Name="s_id_main" QueryStringField="sid" 
                Type="String" />
            <asp:SessionParameter Name="code" SessionField="start_a" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="s_name" />
            <asp:Parameter Name="s_f_name" />
            <asp:Parameter Name="dob" />
            <asp:Parameter Name="gen" />
            <asp:Parameter Name="email" />
            <asp:Parameter Name="landline" />
            <asp:Parameter Name="mobile" />
            <asp:Parameter Name="addr" />
            <asp:Parameter Name="city" />
            <asp:Parameter Name="distt" />
            <asp:Parameter Name="state" />
            <asp:Parameter Name="p_code" />
            <asp:Parameter Name="degree" />
            <asp:Parameter Name="quli" />
            <asp:Parameter Name="an_income" />
            <asp:Parameter Name="social_status" />
            <asp:Parameter Name="phy_chall" />
            <asp:Parameter Name="bank_ac" />
            <asp:Parameter Name="bank_name" />
            <asp:Parameter Name="ifsc_code" />
            <asp:Parameter Name="bpl_irdp_no" />
          
            <asp:Parameter Name="p_addr" />
            <asp:Parameter Name="p_city" />
            <asp:Parameter Name="p_distt" />
            <asp:Parameter Name="p_state" />
            <asp:Parameter Name="p_p_code" />
          
            <asp:Parameter Name="img" />
            <asp:Parameter Name="course" />
            <asp:Parameter Name="date_of_add" />
          
            <asp:Parameter Name="project_code" />
            <asp:Parameter Name="tr_date" />
            <asp:Parameter Name="tr_com_date" />
            
            <asp:Parameter Name="s_name2" />
            <asp:Parameter Name="s_name3" />
            <asp:Parameter Name="f_name2" />
            <asp:Parameter Name="f_name3" />
            <asp:Parameter Name="m_status" />
            <asp:Parameter Name="addr2" />
            <asp:Parameter Name="addr3" />
            <asp:Parameter Name="travel" />
            <asp:Parameter Name="other_inc" />
            <asp:Parameter Name="tot_inc" />
            <asp:Parameter Name="age" />
            <asp:Parameter Name="SSC_Sub" />
            <asp:Parameter Name="SSC_Yr" />
            <asp:Parameter Name="SSC_Per" />
            <asp:Parameter Name="HSC_Sub" />
            <asp:Parameter Name="HSC_Yr" />
            <asp:Parameter Name="HSC_Per" />
            <asp:Parameter Name="Gra_Sub" />
            <asp:Parameter Name="Gra_Yr" />
            <asp:Parameter Name="Gra_Per" />
            <asp:Parameter Name="Post_Gra_Sub" />
            <asp:Parameter Name="Post_Gra_Yr" />
            <asp:Parameter Name="Post_Gra_Per" />
            <asp:Parameter Name="std_code" />
            <asp:Parameter Name="per_corres_same" />
            <asp:QueryStringParameter Name="main" QueryStringField="sid" />
            <asp:Parameter Name="p_addr2" />
            <asp:Parameter Name="p_addr3" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        
        
        
        
        
    SelectCommand="SELECT student_detail.code, student_detail.s_id, student_detail.s_name, student_detail.s_f_name, student_detail.dob, student_detail.gen, student_detail.email, student_detail.landline, student_detail.mobile, student_detail.addr, student_detail.state, student_detail.p_code, student_detail.degree, student_detail.quli, student_detail.an_income, student_detail.social_status, student_detail.phy_chall, student_detail.bank_ac, student_detail.bank_name, student_detail.ifsc_code, student_detail.bpl_irdp_no, student_detail.center_code, student_detail.p_addr, student_detail.p_state, student_detail.p_p_code, student_detail.s_id_main, student_detail.img, student_detail.project_code, city.city, distt.distt, distt_1.distt AS distt2, city_1.city AS city2, student_detail.date_of_add, course_detail.course_name, project.project_name, student_detail.tr_date, student_detail.tr_com_date, student_detail.tr_status, student_detail.s_name2, student_detail.s_name3, student_detail.f_name2, student_detail.f_name3, student_detail.m_status, student_detail.addr2, student_detail.addr3, student_detail.travel, student_detail.other_inc, student_detail.tot_inc, student_detail.age, student_detail.SSC_Sub, student_detail.SSC_Yr, student_detail.SSC_Per, student_detail.HSC_Sub, student_detail.HSC_Yr, student_detail.HSC_Per, student_detail.Gra_Sub, student_detail.Gra_Yr, student_detail.Gra_Per, student_detail.Post_Gra_Sub, student_detail.Post_Gra_Yr, student_detail.Post_Gra_Per, student_detail.complevel, student_detail.std_code, student_detail.per_corres_same, student_detail.sub_date, student_detail.p_addr2, student_detail.p_addr3, city.code AS Expr1 FROM student_detail INNER JOIN city ON student_detail.city = city.code INNER JOIN distt ON student_detail.distt = distt.code INNER JOIN city AS city_1 ON student_detail.p_city = city_1.code INNER JOIN distt AS distt_1 ON student_detail.p_distt = distt_1.code INNER JOIN course_detail ON student_detail.course = course_detail.code INNER JOIN project ON student_detail.project_code = project.code WHERE (student_detail.s_id_main = @s_id_main) and (student_detail.center_code=@code)" 
    
        
        
        
        
        
        UpdateCommand="UPDATE student_detail SET s_name = @s_name, s_f_name = @s_f_name, dob = @dob, gen = @gen, email = @email, landline = @landline, mobile = @mobile, addr = @addr, city = @city, distt = @distt, state = @state, p_code = @p_code, degree = @degree, quli = @quli, an_income = @an_income, social_status = @social_status, phy_chall = @phy_chall, bank_ac = @bank_ac, bank_name = @bank_name, ifsc_code = @ifsc_code, bpl_irdp_no = @bpl_irdp_no, p_addr = @p_addr, p_city = @p_city, p_distt = @p_distt, p_state = @p_state, p_p_code = @p_p_code, img = @img, course = @course, date_of_add = @date_of_add, project_code = @project_code, tr_date = @tr_date, tr_com_date = @tr_com_date, s_name2 = @s_name2, s_name3 = @s_name3, f_name2 = @f_name2, f_name3 = @f_name3, m_status = @m_status, addr2 = @addr2, addr3 = @addr3, travel = @travel, other_inc = @other_inc, tot_inc = @tot_inc, age = @age, SSC_Sub = @SSC_Sub, SSC_Yr = @SSC_Yr, SSC_Per = @SSC_Per, HSC_Sub = @HSC_Sub, HSC_Yr = @HSC_Yr, HSC_Per = @HSC_Per, Gra_Sub = @Gra_Sub, Gra_Yr = @Gra_Yr, Gra_Per = @Gra_Per, Post_Gra_Sub = @Post_Gra_Sub, Post_Gra_Yr = @Post_Gra_Yr, Post_Gra_Per = @Post_Gra_Per, std_code = @std_code, per_corres_same = @per_corres_same, p_addr2 =@p_addr2, p_addr3 =@p_addr3 WHERE (s_id_main = @main)">
        <SelectParameters>
            <asp:QueryStringParameter Name="s_id_main" QueryStringField="sid" 
                Type="String" />
            <asp:SessionParameter Name="code" SessionField="start_a" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="s_name" />
            <asp:Parameter Name="s_f_name" />
            <asp:Parameter Name="dob" />
            <asp:Parameter Name="gen" />
            <asp:Parameter Name="email" />
            <asp:Parameter Name="landline" />
            <asp:Parameter Name="mobile" />
            <asp:Parameter Name="addr" />
            <asp:Parameter Name="city" />
            <asp:Parameter Name="distt" />
            <asp:Parameter Name="state" />
            <asp:Parameter Name="p_code" />
            <asp:Parameter Name="degree" />
            <asp:Parameter Name="quli" />
            <asp:Parameter Name="an_income" />
            <asp:Parameter Name="social_status" />
            <asp:Parameter Name="phy_chall" />
            <asp:Parameter Name="bank_ac" />
            <asp:Parameter Name="bank_name" />
            <asp:Parameter Name="ifsc_code" />
            <asp:Parameter Name="bpl_irdp_no" />
          
            <asp:Parameter Name="p_addr" />
            <asp:Parameter Name="p_city" />
            <asp:Parameter Name="p_distt" />
            <asp:Parameter Name="p_state" />
            <asp:Parameter Name="p_p_code" />
          
            <asp:Parameter Name="img" />
            <asp:Parameter Name="course" />
            <asp:Parameter Name="date_of_add" />
          
            <asp:Parameter Name="project_code" />
            <asp:Parameter Name="tr_date" />
            <asp:Parameter Name="tr_com_date" />
            
            <asp:Parameter Name="s_name2" />
            <asp:Parameter Name="s_name3" />
            <asp:Parameter Name="f_name2" />
            <asp:Parameter Name="f_name3" />
            <asp:Parameter Name="m_status" />
            <asp:Parameter Name="addr2" />
            <asp:Parameter Name="addr3" />
            <asp:Parameter Name="travel" />
            <asp:Parameter Name="other_inc" />
            <asp:Parameter Name="tot_inc" />
            <asp:Parameter Name="age" />
            <asp:Parameter Name="SSC_Sub" />
            <asp:Parameter Name="SSC_Yr" />
            <asp:Parameter Name="SSC_Per" />
            <asp:Parameter Name="HSC_Sub" />
            <asp:Parameter Name="HSC_Yr" />
            <asp:Parameter Name="HSC_Per" />
            <asp:Parameter Name="Gra_Sub" />
            <asp:Parameter Name="Gra_Yr" />
            <asp:Parameter Name="Gra_Per" />
            <asp:Parameter Name="Post_Gra_Sub" />
            <asp:Parameter Name="Post_Gra_Yr" />
            <asp:Parameter Name="Post_Gra_Per" />
            <asp:Parameter Name="std_code" />
            <asp:Parameter Name="per_corres_same" />
            <asp:QueryStringParameter Name="main" QueryStringField="sid" />
            <asp:Parameter Name="p_addr2" />
            <asp:Parameter Name="p_addr3" />
        </UpdateParameters>
    </asp:SqlDataSource>
</asp:Content>

