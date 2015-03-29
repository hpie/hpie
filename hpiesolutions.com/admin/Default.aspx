<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 98%;
            margin-left: 0px;
        }
        .style2
        {
            height: 39px;
        }
        .style5
        {
        }
        .style6
        {
            width: 15px;
        }
        .style8
        {
            height: 45px;
        }
        .style9
        {
            width: 634px;
        }
        .style10
        {
            width: 279px;
        }
        .style11
        {
            width: 430px;
        }
        .style12
        {
            width: 90px;
        }
        .style14
        {
            width: 7px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
   <div class="banner"> Add New Center
      
    </div> <asp:ScriptManager ID="ScriptManager1" 
           runat="server">
       </asp:ScriptManager><br />
    <asp:Wizard ID="Wizard1" runat="server" ActiveStepIndex="0" BackColor="#EFF3FB" 
        BorderColor="#B5C7DE" BorderWidth="1px" 
        Font-Names="Verdana" Font-Size="10pt" Height="351px" 
        onfinishbuttonclick="Wizard1_FinishButtonClick" Width="905px" 
        CssClass="ttxt">
        <HeaderStyle BackColor="#284E98" BorderStyle="Solid" Font-Bold="True" 
            Font-Size="0.9em" ForeColor="White" HorizontalAlign="Center" 
            VerticalAlign="Top" BorderColor="#EFF3FB" BorderWidth="2px" />
        <NavigationButtonStyle BackColor="White" BorderColor="#507CD1" 
            BorderStyle="Solid" BorderWidth="1px" Font-Names="Verdana" Font-Size="0.8em" 
            ForeColor="#284E98" />
        <SideBarButtonStyle Font-Names="Verdana" ForeColor="White" 
            BackColor="#507CD1" />
        <SideBarStyle BackColor="#507CD1" Font-Size="0.9em" 
            VerticalAlign="Top" Width="250px" />
        <StepStyle ForeColor="#333333" VerticalAlign="Top" Font-Size="0.8em" />
        <WizardSteps>
            <asp:WizardStep runat="server" title="Company &amp; Mailing Address Details">
                <table class="style1" cellpadding="2px">
                    <tr>
                        <td class="style2" colspan="3">
                            <h1>
                                Login Details</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Email ID
                        </td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="email" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                                ControlToValidate="name" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Password</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="pass" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                                ControlToValidate="pass" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style8" colspan="3">
                            <h1>
                                Company Details</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Name</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="name" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                                ControlToValidate="name" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Website</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="website" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style2" colspan="3">
                            <h1>
                                Mailing Address Details</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Address</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="addr" runat="server" Height="49px" TextMode="MultiLine" 
                                Width="310px" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                                ControlToValidate="addr" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Phone No.</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <table class="style11">
                                <tr>
                                    <td class="style12">
                                        <asp:TextBox ID="phone_std" runat="server" CssClass="ttxt" MaxLength="5" 
                                            Width="47px"></asp:TextBox>
                                        <ajaxToolkit:FilteredTextBoxExtender ID="phone_std_FilteredTextBoxExtender" 
                                            runat="server" Enabled="True" FilterType="Numbers" TargetControlID="phone_std">
                                        </ajaxToolkit:FilteredTextBoxExtender>
                                        <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                                            ControlToValidate="phone" ErrorMessage="*" ForeColor="#CC3300" 
                                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                                    </td>
                                    <td class="style14">
                                       _</td>
                                    <td>
                                        <asp:TextBox ID="phone" runat="server" CssClass="ttxt" MaxLength="7" 
                                            Width="90px"></asp:TextBox>
                                        <ajaxToolkit:FilteredTextBoxExtender ID="phone_FilteredTextBoxExtender" 
                                            runat="server" Enabled="True" FilterType="Numbers" TargetControlID="phone">
                                        </ajaxToolkit:FilteredTextBoxExtender>
                                        <asp:RequiredFieldValidator ID="RequiredFieldValidator75" runat="server" 
                                            ControlToValidate="phone_std" ErrorMessage="*" ForeColor="#CC3300" 
                                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                                    </td>
                                </tr>
                            </table>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style5">
                            State</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:DropDownList ID="DropDownList2" runat="server" CssClass="ttxt2">
                                <asp:ListItem>Himachal Pradesh</asp:ListItem>
                            </asp:DropDownList>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            District</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:DropDownList ID="DropDownList3" runat="server" AutoPostBack="True" 
                                DataSourceID="SqlDataSource2" DataTextField="distt" DataValueField="code" 
                                OnSelectedIndexChanged="DropDownList3_SelectedIndexChanged" 
                                CssClass="ttxt2">
                                <asp:ListItem></asp:ListItem>
                            </asp:DropDownList>
                            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                SelectCommand="SELECT * FROM [distt] order by distt" 
                                
                                InsertCommand="INSERT INTO login(un, up, role, date, center_code_main) VALUES (@un, @up, @role, @date, @center_code_main)">
                                <InsertParameters>
                                    <asp:ControlParameter ControlID="email" Name="un" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="pass" Name="up" PropertyName="Text" />
                                    <asp:Parameter DefaultValue="user" Name="role" />
                                    <asp:Parameter DefaultValue="" Name="date" />
                                    <asp:Parameter Name="center_code_main" />
                                </InsertParameters>
                            </asp:SqlDataSource>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            City</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:DropDownList ID="DropDownList4" runat="server" 
                                DataSourceID="SqlDataSource3" DataTextField="city" DataValueField="code" 
                                CssClass="ttxt2">
                            </asp:DropDownList>
                            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                SelectCommand="SELECT * FROM [city] WHERE ([distt] = @distt) order by city">
                                <SelectParameters>
                                    <asp:ControlParameter ControlID="DropDownList3" Name="distt" 
                                        PropertyName="SelectedValue" Type="String" />
                                </SelectParameters>
                            </asp:SqlDataSource>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Postal Code</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox runat="server" ID="p_code" CssClass="ttxt"></asp:TextBox>

                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                                ControlToValidate="p_code" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            &nbsp;</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                InsertCommand="INSERT INTO tb1(email, name, website, address, ph, country, state, dist, city, pcode, center_code, pass, center_code_main, role, std_code) VALUES (@email, @name, @website, @address, @ph, @country, @state, @dist, @city, @pcode, @center_code, @pass, @center_code_main, @role, @std_code)" 
                                SelectCommand="SELECT * FROM [city]">
                                <InsertParameters>
                                    <asp:ControlParameter ControlID="email" Name="email" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="name" Name="name" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="website" Name="website" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="addr" Name="address" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="phone" Name="ph" PropertyName="Text" />
                                    <asp:Parameter DefaultValue="India" Name="country" />
                                    <asp:ControlParameter ControlID="DropDownList2" Name="state" 
                                        PropertyName="SelectedValue" />
                                    <asp:ControlParameter ControlID="DropDownList3" DefaultValue="" Name="dist" 
                                        PropertyName="SelectedValue" />
                                    <asp:ControlParameter ControlID="DropDownList4" Name="city" 
                                        PropertyName="SelectedValue" />
                                    <asp:ControlParameter ControlID="p_code" Name="pcode" PropertyName="Text" />
                                    <asp:Parameter Name="center_code" />
                                    <asp:ControlParameter ControlID="pass" Name="pass" PropertyName="Text" />
                                    <asp:Parameter Name="center_code_main" />
                                    <asp:Parameter DefaultValue="user" Name="role" />
                                    <asp:ControlParameter ControlID="phone_std" Name="std_code" 
                                        PropertyName="Text" />
                                </InsertParameters>
                            </asp:SqlDataSource>
                            <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                SelectCommand="SELECT * FROM [tb1] WHERE (([dist] = @dist) AND ([city] = @city))">
                                <SelectParameters>
                                    <asp:ControlParameter ControlID="DropDownList3" Name="dist" 
                                        PropertyName="SelectedValue" Type="Int32" />
                                    <asp:ControlParameter ControlID="DropDownList4" Name="city" 
                                        PropertyName="SelectedValue" Type="Int32" />
                                </SelectParameters>
                            </asp:SqlDataSource>
                        </td>
                    </tr>
                </table>
            </asp:WizardStep>
            <asp:WizardStep runat="server" title="Contact Personal Details">
                <table class="style1">
                    <tr>
                        <td class="style2" colspan="2">
                            <h1>
                                Contact Personal Details</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style5" colspan="2">
                            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                                OnSelectedIndexChanging="GridView1_SelectedIndexChanging" ShowFooter="True" 
                                Width="524px" OnRowDataBound="GridView1_RowDataBound" 
                                OnRowDeleting="GridView1_RowDeleting1">
                                <Columns>
                                    <asp:TemplateField HeaderText="Name">
                                        <FooterTemplate>
                                            <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                                            
                                        </FooterTemplate>
                                        <ItemTemplate>
                                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("name") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Job Title">
                                        <FooterTemplate>
                                            <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                                           
                                        </FooterTemplate>
                                        <ItemTemplate>
                                            <asp:Label ID="Label2" runat="server" Text='<%# Eval("job_title") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Email ID">
                                        <FooterTemplate>
                                            <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                                           
                                        </FooterTemplate>
                                        <ItemTemplate>
                                            <asp:Label ID="Label3" runat="server" Text='<%# Eval("email") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Mobile">
                                        <FooterTemplate>
                                            <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
                                           
                                        </FooterTemplate>
                                        <ItemTemplate>
                                            <asp:Label ID="Label4" runat="server" Text='<%# Eval("mobile") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField>
                                        <FooterTemplate>
                                            <asp:LinkButton ID="LinkButton1" runat="server" CommandName="select">Add</asp:LinkButton>
                                        </FooterTemplate>
                                        <ItemTemplate>
                                            <asp:ImageButton Visible="false" ID="img1" runat="server" CommandName="delete" Height="21px" 
                                                ImageUrl="~/Gnome-Edit-Delete-48.png" Width="18px" />
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                </Columns>
                            </asp:GridView>
                            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                SelectCommand="SELECT * FROM [tb2]" 
                                InsertCommand="INSERT INTO tb2(center_code, name, job_title, email, mobile) VALUES (@center_code, @name, @job_title, @email, @mobile)">
                                <InsertParameters>
                                    <asp:Parameter Name="center_code" />
                                    <asp:Parameter Name="name" />
                                    <asp:Parameter Name="job_title" />
                                    <asp:Parameter Name="email" />
                                    <asp:Parameter Name="mobile" />
                                </InsertParameters>
                            </asp:SqlDataSource>
                        </td>
                    </tr>
                </table>
            </asp:WizardStep>
            <asp:WizardStep runat="server" Title="Project Details &amp; Business Detail">
                <table class="style1">
                    <tr>
                        <td class="style2" colspan="3">
                            <h1>
                                Project Details</h1>
                        </td>
                        <td class="style2">
                            &nbsp;</td>
                        <td class="style2">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Capacity</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="capacity" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;</td>
                        <td colspan="2">
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator71" runat="server" 
                                ControlToValidate="capacity" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            &nbsp;</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style8" colspan="3">
                            <h1>
                                Business Details</h1>
                        </td>
                        <td class="style8">
                            &nbsp;</td>
                        <td class="style8">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style5">
                            Total Working Space</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="tot_wor_space" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                                ControlToValidate="tot_wor_space" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                        <td>
                            No. of Classrooms</td>
                        <td>
                            <asp:TextBox ID="no_class_room" runat="server"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator11" runat="server" 
                                ControlToValidate="no_class_room" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            No. of PCs</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="no_pc" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator9" runat="server" 
                                ControlToValidate="no_pc" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                        <td>
                            No. of Labs</td>
                        <td>
                            <asp:TextBox ID="no_labs" runat="server"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator12" runat="server" 
                                ControlToValidate="no_labs" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            No. of PCs On Lan</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            <asp:TextBox ID="no_pc_lan" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator10" runat="server" 
                                ControlToValidate="no_pc_lan" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                        <td>
                            Power Backup</td>
                        <td>
                            <asp:TextBox ID="power_backup" runat="server"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator13" runat="server" 
                                ControlToValidate="power_backup" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                            &nbsp;</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style5">
                            &nbsp;</td>
                        <td class="style6">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                        <td>
                            <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                InsertCommand="INSERT INTO tb3(center_code, capacity, tot_working_space, no_of_pc, pc_on_lan, no_of_room, no_of_lab, power_backup) VALUES (@center_code, @capacity, @tot_working_space, @no_of_pc, @pc_on_lan, @no_of_room, @no_of_lab, @power_backup)" 
                                SelectCommand="SELECT * FROM [tb1] order by code desc">
                                <InsertParameters>
                                    <asp:Parameter Name="center_code" />
                                    <asp:ControlParameter ControlID="capacity" Name="capacity" 
                                        PropertyName="Text" />
                                    <asp:ControlParameter ControlID="tot_wor_space" Name="tot_working_space" 
                                        PropertyName="Text" />
                                    <asp:ControlParameter ControlID="no_pc" Name="no_of_pc" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="no_pc_lan" Name="pc_on_lan" 
                                        PropertyName="Text" />
                                    <asp:ControlParameter ControlID="no_class_room" Name="no_of_room" 
                                        PropertyName="Text" />
                                    <asp:ControlParameter ControlID="no_labs" Name="no_of_lab" 
                                        PropertyName="Text" />
                                    <asp:ControlParameter ControlID="power_backup" Name="power_backup" 
                                        PropertyName="Text" />
                                </InsertParameters>
                            </asp:SqlDataSource>
                        </td>
                    </tr>
                </table>
            </asp:WizardStep>
            <asp:WizardStep runat="server" Title="Bank Details">
                <table class="style9">
                    <tr>
                        <td class="style10">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style10">
                            AC No</td>
                        <td>
                            <asp:TextBox ID="ac_no" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator72" runat="server" 
                                ControlToValidate="ac_no" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Bank Name</td>
                        <td>
                            <asp:DropDownList ID="bank_name" runat="server" CssClass="ttxt2" 
                                DataSourceID="bank_sql" DataTextField="bank_name" DataValueField="bank_name">
                            </asp:DropDownList>
                        </td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Branch Name</td>
                        <td>
                            <asp:TextBox ID="branch_name" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator73" runat="server" 
                                ControlToValidate="branch_name" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                        </tr>
                        <tr>
                        <td class="style10">
                            IFSC Code</td>
                        <td>
                            <asp:TextBox ID="ifc_code" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator74" runat="server" 
                                ControlToValidate="ifc_code" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Pan No.</td>
                        <td>
                            <asp:TextBox ID="pan_no" runat="server" CssClass="ttxt"></asp:TextBox>
                            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator76" runat="server" 
                                ControlToValidate="pan_no" ErrorMessage="*" ForeColor="#CC3300" 
                                SetFocusOnError="True"></asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td class="style10">
                            &nbsp;</td>
                        <td>
                            <asp:SqlDataSource ID="bank_sql" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                InsertCommand="INSERT INTO tb4(ac_no, bank_name, ifsc, branch, center_code, pan_no) VALUES (@ac_no, @bank_name, @ifsc, @branch, @center_code, @pan_no)" 
                                SelectCommand="SELECT * FROM [bank_detail]">
                                <InsertParameters>
                                    <asp:ControlParameter ControlID="ac_no" Name="ac_no" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="bank_name" Name="bank_name" 
                                        PropertyName="SelectedValue" />
                                    <asp:ControlParameter ControlID="ifc_code" Name="ifsc" PropertyName="Text" />
                                    <asp:ControlParameter ControlID="branch_name" Name="branch" 
                                        PropertyName="Text" />
                                    <asp:Parameter Name="center_code" />
                                    <asp:ControlParameter ControlID="pan_no" Name="pan_no" PropertyName="Text" />
                                </InsertParameters>
                            </asp:SqlDataSource>
                        </td>
                    </tr>
                </table>
            </asp:WizardStep>
            <asp:WizardStep runat="server" Title="Finish">
                &nbsp;
                <br />
                &nbsp;Click on Finish Button.....<br />__________________________________________________________________<br />&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Label ID="Label7" runat="server" Font-Bold="True" ForeColor="#CC3300" 
                    Visible="False"></asp:Label>
                <br />
                &nbsp;&nbsp;&nbsp;
                <asp:Label runat="server" Font-Bold="True" ForeColor="#CC3300" ID="Label6"></asp:Label>

                <br />
                <br />
                &nbsp;&nbsp;&nbsp;
                <asp:Label runat="server" Font-Bold="True" ForeColor="#CC3300" ID="Label5"></asp:Label>

                <br />
                <br />
                <br />
                <asp:LinkButton ID="LinkButton2" runat="server" OnClick="LinkButton2_Click" 
                    Visible="False">click here to countinew..</asp:LinkButton>
            </asp:WizardStep>
        </WizardSteps>
    </asp:Wizard>
</asp:Content>

