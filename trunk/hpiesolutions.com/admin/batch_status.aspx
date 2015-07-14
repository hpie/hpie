<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="batch_status.aspx.cs" Inherits="admin_batch_status" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 932px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Batch Status</div>

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
            Select Center Name</td>
        <td class="style2">
                <asp:DropDownList ID="cen_name" runat="server" 
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
            <asp:DropDownList ID="p_code" runat="server" CssClass="ttxt2" 
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
            <asp:DropDownList ID="course" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource1" DataTextField="course_name" 
                DataValueField="code">
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
            &nbsp;</td>
        <td>
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
&nbsp;|
            <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td colspan="3">
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                DataSourceID="SqlDataSource3" Width="918px" 
                EmptyDataText="-No Record Available -" DataKeyNames="code">
                <Columns>
                    <asp:TemplateField HeaderText="Sr. No.">   
                            <ItemTemplate>
                                <%# Container.DataItemIndex + 1 %>   
                            </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="project_name" HeaderText="Project Code" 
                        SortExpression="project_code" />
                    <asp:BoundField DataField="center_code" HeaderText="Center Code" 
                        SortExpression="center_code" />
                    <asp:BoundField DataField="batch_no" HeaderText="Batch No" 
                        SortExpression="batch_no" />
                    <asp:BoundField DataField="s_date" DataFormatString="{0:dd MMMM, yyyy}" 
                        HeaderText="Start Date" SortExpression="s_date" />
                    <asp:BoundField DataField="e_date" DataFormatString="{0:dd MMMM, yyyy}" 
                        HeaderText="Comletion Date" SortExpression="e_date" />
                    <asp:BoundField DataField="course_name" HeaderText="Course" 
                        SortExpression="course" />
                    <asp:BoundField DataField="sub" HeaderText="Subject" SortExpression="sub" />
                    <asp:CommandField ShowDeleteButton="True" />
                </Columns>
            </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                
                
                SelectCommand="SELECT batch_status.code, batch_status.project_code, batch_status.center_code, batch_status.batch_no, batch_status.date, batch_status.s_date, batch_status.e_date, batch_status.course, dbo.course_detail.course_name, dbo.subject.sub, dbo.project.project_name FROM batch_status INNER JOIN dbo.course_detail ON batch_status.course = dbo.course_detail.code INNER JOIN dbo.subject ON batch_status.sub = dbo.subject.code INNER JOIN dbo.project ON batch_status.project_code = dbo.project.code WHERE (batch_status.center_code = @center_code) AND (batch_status.project_code = @project_code) AND (batch_status.course = @course)" 
                DeleteCommand="DELETE FROM batch_status WHERE (code = @code)">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="GridView1" Name="code" 
                        PropertyName="SelectedDataKey" />
                </DeleteParameters>
                <SelectParameters>
                    <asp:ControlParameter ControlID="cen_name" Name="center_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="p_code" Name="project_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="course" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    </table>

</asp:Content>

