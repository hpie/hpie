<%@ Page Title="" Language="C#" MasterPageFile="~/reports/Site.master" AutoEventWireup="true" CodeFile="placement_view.aspx.cs" Inherits="user_placement_view" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 893px;
        }
        .style2
        {
            width: 137px;
        }
        .style3
        {
            width: 137px;
            height: 49px;
        }
        .style4
        {
            height: 49px;
        }
        .style5
        {
            width: 137px;
            height: 104px;
        }
        .style6
        {
            height: 104px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">
        Placement Detail
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
    </div>
    <table class="style1">
        <tr>
           <td class="style2">
               Select Center Name</td>
           <td>
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource6" DataTextField="name" 
                    DataValueField="center_code_main">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [tb1]"></asp:SqlDataSource>
           </td>
           <td>
               &nbsp;</td>
       </tr>
        <tr>
           <td class="style2">
               Project Code</td>
           <td>
            <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource2" DataTextField="project_name" 
                DataValueField="code">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td class="style2">
               Select Course</td>
           <td>
            &nbsp;<asp:RadioButtonList ID="RadioButtonList1" runat="server" 
                   AutoPostBack="True" 
                   onselectedindexchanged="RadioButtonList1_SelectedIndexChanged" 
                   RepeatDirection="Horizontal">
                   <asp:ListItem Selected="True" Value="1">Single Course</asp:ListItem>
                   <asp:ListItem Value="2">All Courses</asp:ListItem>
               </asp:RadioButtonList>
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
           <td class="style5">
               Select Student Code</td>
           <td class="style6">
            <asp:DropDownList ID="DropDownList3" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource4" DataTextField="s_id" 
                   DataValueField="s_id" 
                   onselectedindexchanged="DropDownList3_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   SelectCommand="SELECT code, center_code, project_code, s_id, c_name, c_add, city, desig, j_date, salary, c_per_name, c_per_no, date, course, name FROM placement WHERE (course = @course)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   
                   
                   
                   
                   SelectCommand="SELECT * FROM [placement] WHERE (([center_code] = @center_code) AND ([s_id] = @s_id) and (course=@course) and([project_code]=@pcode))">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList4" Name="center_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList3" Name="s_id" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="pcode" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   
                   
                   
                   
                   SelectCommand="SELECT * FROM [placement] WHERE ([center_code] = @center_code) and ([project_code]=@pcode)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList4" Name="center_code" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList3" Name="s_id" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="pcode" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
           </td>
           <td class="style6">
               </td>
       </tr>
       <tr>
           <td class="style3">
               </td>
           <td class="style4">
               <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
           &nbsp;
               <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
           </td>
           <td class="style4">
               </td>
       </tr>
       <tr>
           <td colspan="3">
               <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                   BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                   CellPadding="3" style="font-size: 9pt" 
                   Width="881px">
                   <Columns>
                       <asp:BoundField DataField="s_id" HeaderText="Student ID" 
                           SortExpression="s_id" />
                       <asp:BoundField DataField="name" HeaderText="Name" />
                       <asp:BoundField DataField="c_name" HeaderText="Company Name" 
                           SortExpression="c_name" />
                       <asp:BoundField DataField="c_add" HeaderText="Company Address" 
                           SortExpression="c_add" />
                       <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
                       <asp:BoundField DataField="desig" HeaderText="Designation" 
                           SortExpression="desig" />
                       <asp:BoundField DataField="j_date" DataFormatString="{0:dd MMM, yyyy}" 
                           HeaderText="Joining Date" SortExpression="j_date" />
                       <asp:BoundField DataField="salary" HeaderText="Salary" 
                           SortExpression="salary" />
                       <asp:BoundField DataField="c_per_name" HeaderText="Contact Person Name" 
                           SortExpression="c_per_name" />
                       <asp:BoundField DataField="c_per_no" HeaderText="Contact Person No." 
                           SortExpression="c_per_no" />
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
       </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
                <td>
                    &nbsp;</td>
        </tr>
    </table>
</asp:Content>

