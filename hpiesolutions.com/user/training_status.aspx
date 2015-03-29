<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="training_status.aspx.cs" Inherits="user_training_status" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 753px;
        }
        .style3
        {
            height: 27px;
        }
        .style4
        {
            height: 46px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
   <div class="banner">Training Status !<asp:ScriptManager ID="ScriptManager1" 
           runat="server">
       </asp:ScriptManager>
    </div><br />

    <table class="style1">
       <tr>
        <td class="style2">
            Project Code</td>
        <td class="style2">
            <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource2" DataTextField="project_name" 
                DataValueField="code">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
        </td>
        <td class="style2">
        </td>
    </tr>
    <tr>
        <td>
            Course</td>
        <td>
            <asp:DropDownList ID="DropDownList2" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource1" DataTextField="course_name" 
                DataValueField="code" 
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
        <td>
            Training Status</td>
        <td>
                <asp:DropDownList ID="DropDownList5" runat="server" AutoPostBack="True" 
                     onselectedindexchanged="DropDownList5_SelectedIndexChanged" 
                    CssClass="ttxt2"> 
                                   
                    <asp:ListItem>Active</asp:ListItem>
                    <asp:ListItem>Completed</asp:ListItem>
                    <asp:ListItem>Dropped</asp:ListItem>
                    <asp:ListItem>Not Active</asp:ListItem>
                </asp:DropDownList>
        </td>
        <td>
            &nbsp;</td>
    </tr>
   
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style4">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataSourceID="SqlDataSource3" Width="913px" 
                    onrowdatabound="GridView1_RowDataBound" style="font-size: 8pt">
                    <Columns>
                        <asp:TemplateField HeaderText="Student ID" SortExpression="s_id">
                            <EditItemTemplate>
                                <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("s_id_main") %>'></asp:TextBox>
                            </EditItemTemplate>
                            <ItemTemplate>
                                <asp:Label ID="s_id" runat="server" Text='<%# Bind("s_id_main") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:BoundField DataField="s_name" HeaderText="Student Name" 
                            SortExpression="s_name" />
                        <asp:BoundField DataField="date_of_add" DataFormatString="{0:d}" 
                            HeaderText="Date of Admition" SortExpression="date_of_add" />
                        <asp:TemplateField HeaderText="Date of Starting Date">
                          
                            <ItemTemplate>
                                <asp:TextBox ID="TextBox4" runat="server" 
                                    Text='<%# Bind("tr_date", "{0:d}") %>'></asp:TextBox>
                                <ajaxToolkit:CalendarExtender ID="TextBox4_CalendarExtender" runat="server" 
                                    Enabled="True" TargetControlID="TextBox4">
                                </ajaxToolkit:CalendarExtender>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Training Status">
                            <ItemTemplate>
                                <asp:DropDownList ID="tr_status" runat="server" 
                                    SelectedValue='<%# Bind("tr_status") %>'>
                                    <asp:ListItem>Active</asp:ListItem>
                                    <asp:ListItem>Completed</asp:ListItem>
                                    <asp:ListItem>Dropped</asp:ListItem>
                                    <asp:ListItem>Not Active</asp:ListItem>
                                </asp:DropDownList>
                                <asp:Label ID="sts" runat="server" Text='<%# Eval("tr_status") %>' 
                                    Visible="False"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Training Completion/Dropping Date">
                           
                            <ItemTemplate>
                                <asp:TextBox ID="TextBox5" runat="server" 
                                    Text='<%# Bind("tr_com_date", "{0:d}") %>'></asp:TextBox>
                                <ajaxToolkit:CalendarExtender ID="TextBox5_CalendarExtender" runat="server" 
                                    Enabled="True" TargetControlID="TextBox5">
                                </ajaxToolkit:CalendarExtender>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Check">
                            <ItemTemplate>
                                <asp:CheckBox ID="chk" runat="server" />
                            </ItemTemplate>
                        </asp:TemplateField>
                    </Columns>
                    <RowStyle HorizontalAlign="Center" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                    
                    SelectCommand="SELECT * FROM [student_detail] WHERE (([project_code] = @project_code) AND ([course] = @course) and(tr_status=@tr_status) and([center_code]=@center_code))" 
                    
                    UpdateCommand="UPDATE student_detail SET tr_date =@tr_date, tr_com_date =@tr_com_date, tr_status =@tr_status WHERE ([s_id_main]=@id)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                            PropertyName="SelectedValue" Type="Int32" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                            PropertyName="SelectedValue" Type="Int32" />
                        <asp:ControlParameter ControlID="DropDownList5" Name="tr_status" 
                            PropertyName="SelectedValue" />
                        <asp:SessionParameter DefaultValue="" Name="center_code" 
                            SessionField="start_a" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="tr_date" />
                        <asp:Parameter Name="tr_com_date" />
                        <asp:Parameter Name="tr_status" />
                        <asp:Parameter Name="id" />
                    </UpdateParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td >
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                    
                    SelectCommand="SELECT * FROM [student_detail] WHERE (([project_code] = @project_code) AND ([course] = @course) and(tr_status=@tr_status) and([s_id_main]=@id))" 
                    
                    UpdateCommand="UPDATE student_detail SET tr_date =@tr_date, tr_com_date =@tr_com_date, tr_status =@tr_status WHERE (([project_code] = @project_code) AND ([course] = @course) and(tr_status=@tr_status) and ([s_id_main]=@id))">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                            PropertyName="SelectedValue" Type="Int32" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                            PropertyName="SelectedValue" Type="Int32" />
                        <asp:ControlParameter ControlID="DropDownList5" Name="tr_status" 
                            PropertyName="SelectedValue" />
                        <asp:Parameter Name="id" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="tr_date" />
                        <asp:Parameter Name="tr_com_date" />
                        <asp:Parameter Name="tr_status" />
                        <asp:Parameter Name="project_code" />
                        <asp:Parameter Name="course" />
                        <asp:Parameter Name="id" />
                    </UpdateParameters>
                </asp:SqlDataSource>
            </td
                 <td >
                cvbvc</td>
                  <td >
                      <asp:Button ID="Button1" runat="server" Text="Update" onclick="Button1_Click" />
            &nbsp;<asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
            </td>
        </tr>
    </table>

</asp:Content>

