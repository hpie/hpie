<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="Details.aspx.cs" Inherits="user_Details" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 913px;
        }
        .style2
        {
            height: 65px;
        }
        .style3
        {
            width: 85px;
        }
        .style4
        {
            height: 65px;
            width: 85px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Student Details</div>
    <table class="style1">
        <tr>
            <td class="style3">
                Project Code</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="project_name" 
                    DataValueField="code">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Course</td>
            <td class="style2">
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="course_name" DataValueField="code">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            </td>
        </tr>
    </table>
    <br />
    <asp:GridView ID="GridView1" runat="server" AllowPaging="True" 
    AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
    BorderStyle="None" BorderWidth="1px" CellPadding="3" 
    DataSourceID="SqlDataSource1" PageSize="15" Width="654px" 
        DataKeyNames="s_id_main" 
        onselectedindexchanging="GridView1_SelectedIndexChanging" 
        onpageindexchanging="GridView1_PageIndexChanging">
    <Columns>
    <asp:TemplateField HeaderText="Sr.No.">
        <ItemTemplate>
             <%#Container.DataItemIndex+1 %>
        </ItemTemplate>
    </asp:TemplateField>
        <asp:BoundField DataField="s_id_main" HeaderText="Student ID" 
            SortExpression="s_id" />
        <asp:BoundField DataField="s_name" HeaderText="Student Name" 
            SortExpression="s_name" />
        <asp:BoundField DataField="s_f_name" HeaderText="Father Name" 
            SortExpression="s_f_name" />
        <asp:CommandField ShowSelectButton="True" />
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
<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
    
        
        SelectCommand="SELECT * FROM [student_detail] where  center_code=@code and course=@course and project_code=@project order by s_id">
    <SelectParameters>
        <asp:SessionParameter Name="code" SessionField="start_a" />
        <asp:ControlParameter ControlID="DropDownList2" Name="course" 
            PropertyName="SelectedValue" />
        <asp:ControlParameter ControlID="DropDownList1" Name="project" 
            PropertyName="SelectedValue" />
    </SelectParameters>
</asp:SqlDataSource>
</asp:Content>

