<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="marks_detail_view.aspx.cs" Inherits="user_marks_detail_view" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
    {
        width: 925px;
    }
    .style2
    {
        height: 45px;
    }
    .style3
    {
        height: 29px;
    }
        .style4
        {
            width: 431px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Marks Details</div>
    <table class="style1">
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td class="style2">
            <asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
        </td>
        <td class="style2">
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            Select Center Name</td>
        <td class="style2">
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource6" DataTextField="name" 
                    DataValueField="center_code_main">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [tb1]"></asp:SqlDataSource>
        &nbsp;</td>
        <td class="style2">
            &nbsp;</td>
    </tr>
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
                DataValueField="code" AutoPostBack="True" 
                onselectedindexchanged="DropDownList2_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
            <asp:DropDownList ID="DropDownList3" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource4" DataTextField="sub" DataValueField="code" 
                Enabled="False">
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
        <td class="style3">
            Session</td>
        <td class="style3">
            <table class="style4">
                <tr>
                    <td>
                        <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt"></asp:TextBox>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                            ControlToValidate="TextBox2" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
 to</td>
                    <td>
                        <asp:TextBox ID="TextBox2" runat="server" CssClass="ttxt"></asp:TextBox>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                            ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#990000" 
                            SetFocusOnError="True"></asp:RequiredFieldValidator>
                    </td>
                </tr>
            </table>
            <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                Enabled="True" TargetControlID="TextBox1">
            </ajaxToolkit:CalendarExtender>
&nbsp;&nbsp;&nbsp;
            <ajaxToolkit:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                Enabled="True" TargetControlID="TextBox2">
            </ajaxToolkit:CalendarExtender>
&nbsp;</td>
        <td class="style3">
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td class="style3">
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
        &nbsp;
            <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
        </td>
        <td class="style3">
        </td>
    </tr>
    <tr>
        <td colspan="2">
          
           

            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                onrowdatabound="GridView1_RowDataBound" style="font-size: 8pt" 
                onrowcreated="GridView1_RowCreated" ShowFooter="True">
                <Columns>
                    <asp:BoundField DataField="s_id" HeaderText="Student ID" 
                        SortExpression="s_id" />
                    <asp:BoundField DataField="s_name" HeaderText="Student Name" 
                        SortExpression="s_name" />
                    <asp:CommandField ShowEditButton="True" />
                </Columns>
            </asp:GridView>
           
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                
                
                SelectCommand="SELECT * FROM [student_detail] WHERE (([center_code] = @center_code) AND ([project_code] = @project_code) AND ([course] = @course)) order by s_id">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList4" Name="center_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
            <br />
            <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                SelectCommand="SELECT * FROM [marks_detail] WHERE (([center_code] = @center_code) AND ([project_code] = @project_code) AND ([course] = @course) and ([s_id]=@id) and (date between @first and @second))">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList4" Name="center_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList1" DefaultValue="" 
                        Name="project_code" PropertyName="SelectedValue" Type="Int32" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:Parameter Name="id" />
                    <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
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
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td>
            &nbsp;</td>
        <td>
&nbsp;&nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
</table>
</asp:Content>


