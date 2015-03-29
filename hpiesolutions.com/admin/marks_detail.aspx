<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="marks_detail.aspx.cs" Inherits="user_marks_detail" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 812px;
    }
    .style2
    {
        height: 45px;
    }
    .style3
    {
        height: 29px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Enter Marks Details</div>
    <asp:ScriptManager ID="ScriptManager2" runat="server">
    </asp:ScriptManager>
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
    <ContentTemplate>
   
    <table class="style1">
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td class="style2">
            &nbsp;</td>
        <td class="style2">
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            Select Center</td>
        <td class="style2">
            <asp:DropDownList ID="center_code" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource6" DataTextField="name" 
                DataValueField="center_code_main" 
                onselectedindexchanged="center_code_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [tb1]"></asp:SqlDataSource>
        </td>
        <td class="style2">
            &nbsp;</td>
    </tr>
        <tr>
            <td class="style2">
                Project Code</td>
            <td class="style2">
                <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                    CssClass="ttxt2" DataSourceID="SqlDataSource2" DataTextField="project_name" 
                    DataValueField="code" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
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
                onselectedindexchanged="DropDownList2_SelectedIndexChanged" 
                AutoPostBack="True">
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
            Subject</td>
        <td>
            <asp:DropDownList ID="DropDownList3" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource4" DataTextField="sub" DataValueField="code">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [subject] WHERE ([course] = @course)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td>
            &nbsp;</td>
        <td>
            <asp:DropDownList ID="DropDownList4" runat="server" CssClass="ttxt2" 
                DataSourceID="ssid" DataTextField="s_id" DataValueField="s_id">
            </asp:DropDownList>
            <asp:SqlDataSource ID="ssid" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [marks_detail] WHERE (([center_code] = @center_code) AND ([course] = @course) AND ([project_code] = @project_code))">
                <SelectParameters>
                    <asp:ControlParameter ControlID="center_code" Name="center_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td class="style3">
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
                CausesValidation="False">Search</asp:LinkButton>
        </td>
        <td class="style3">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                CellPadding="3" Height="133px" Width="912px" 
                onrowdatabound="GridView1_RowDataBound" 
                EmptyDataText="----No Record Available----" 
                onrowdeleting="GridView1_RowDeleting" onrowediting="GridView1_RowEditing" 
                DataKeyNames="code">
                <Columns>
                   <asp:TemplateField HeaderText="Sr.No.">
        <ItemTemplate>
             <%#Container.DataItemIndex+1 %>
        </ItemTemplate>
    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Student ID">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Bind("s_id") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Participant Name" SortExpression="s_name">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Bind("s_name") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="date" DataFormatString="{0:dd MMMM, yyyy}" 
                        HeaderText="Date" />
                    <asp:TemplateField HeaderText="Subject">
                        <ItemTemplate>
                            <asp:Label ID="sub_m" runat="server" Text='<%# Bind("sub1") %>'></asp:Label>
                            <asp:Label ID="sub_m12" runat="server" Text='<%# Bind("sub") %>'></asp:Label>
                        </ItemTemplate>
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox2" runat="server" Text='<%# Bind("sub1") %>'></asp:TextBox>
                        </EditItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Total Marks">
                        <ItemTemplate>
                            <asp:Label ID="tot_marks" runat="server" Text='<%# Bind("t_marks") %>'></asp:Label>
                        </ItemTemplate>
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("t_marks") %>'></asp:TextBox>
                        </EditItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Obtain Marks">
                       
                        <ItemTemplate>
                            <asp:TextBox ID="ob_marks" runat="server" Width="40px" 
                                Text='<%# Eval("t_ob") %>'></asp:TextBox>
                            <ajaxToolkit:FilteredTextBoxExtender ID="ob_marks_FilteredTextBoxExtender" 
                                runat="server" Enabled="True" FilterType="Numbers" TargetControlID="ob_marks">
                            </ajaxToolkit:FilteredTextBoxExtender>
                            &nbsp;
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="%Age">
                        <ItemTemplate>
                            <asp:Label ID="per" runat="server" Text='<%# Eval("per") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:CommandField ShowDeleteButton="True" />
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
            </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td>
            &nbsp;</td>
        <td>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                InsertCommand="INSERT INTO marks_detail(center_code, project_code, sub, course, date, s_id, s_name, t_marks, t_ob, per) VALUES (@center_code, @project_code, @sub, @course, @date, @s_id, @s_name, @t_marks, @t_ob, @per)" 
                
                
                SelectCommand="SELECT * FROM [marks_detail] WHERE (([center_code] = @center_code) AND ([project_code] = @project_code) AND ([course] = @course) AND ([sub] = @sub) and ([s_id]=@s_id))" 
                DeleteCommand="DELETE FROM dbo.marks_detail where code=@code" 
                
                UpdateCommand="UPDATE dbo.marks_detail SET t_marks =@t_marks, t_ob =@t_ob, per =@per WHERE (([center_code] = @center_code) AND ([project_code] = @project_code) AND ([course] = @course) AND ([sub] = @sub) and ([s_id]=@s_id))">
                <DeleteParameters>
                    <asp:Parameter Name="code" />
                </DeleteParameters>
                <InsertParameters>
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList3" Name="sub" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="date" />
                    <asp:Parameter Name="s_id" />
                    <asp:Parameter Name="s_name" />
                    <asp:Parameter Name="t_marks" />
                    <asp:Parameter Name="t_ob" />
                    <asp:Parameter Name="per" />
                </InsertParameters>
                <SelectParameters>
                    <asp:ControlParameter ControlID="center_code" Name="center_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:ControlParameter ControlID="DropDownList3" Name="sub" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:Parameter Name="s_id" />
                </SelectParameters>
                <UpdateParameters>
                    <asp:Parameter Name="t_marks" />
                    <asp:Parameter Name="t_ob" />
                    <asp:Parameter Name="per" />
                    <asp:ControlParameter ControlID="center_code" Name="center_code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="sub" />
                    <asp:Parameter Name="s_id" />
                </UpdateParameters>
            </asp:SqlDataSource>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td>
            &nbsp;</td>
        <td>
            <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click" 
                Visible="False">Calculate</asp:LinkButton>
&nbsp;<asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click" 
                Visible="False">Update</asp:LinkButton>
&nbsp;<asp:Label ID="Label3" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
                    </td>
        <td>
            &nbsp;</td>
    </tr>
</table>
 </ContentTemplate>
    </asp:UpdatePanel>
</asp:Content>

