<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="addCourse.aspx.cs" Inherits="admin_addCourse" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 838px;
    }
        .style2
        {
            width: 221px;
        }
        .style3
        {
            width: 221px;
            height: 31px;
        }
        .style4
        {
            height: 31px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
    <ContentTemplate>
    
    <div class="banner"> Add Course</div>
   
   
     <table class="style1">
         <tr>
             <td class="style2">
                 Enter Course Name</td>
             <td>
                 <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt"></asp:TextBox>
             </td>
             <td rowspan="5" valign="top">
                 <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                     DataSourceID="SqlDataSource1" DataKeyNames="code">
                     <Columns>
                         <asp:BoundField DataField="course_name" HeaderText="Course Name" 
                             SortExpression="course_name" />
                         <asp:BoundField DataField="period" HeaderText="Duration" 
                             SortExpression="period" />
                         <asp:BoundField DataField="min_qui" HeaderText="Minimum Qualification" 
                             SortExpression="min_qui" />
                     </Columns>
                 </asp:GridView>
                 <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                     ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                     SelectCommand="SELECT * FROM [course_detail]" 
                     
                     InsertCommand="INSERT INTO course_detail(course_name, period, min_qui) VALUES (@course_name, @period, @min_qui)" 
                     DeleteCommand="Delete FROM [course_detail] where code=@code">
                     <DeleteParameters>
                         <asp:ControlParameter ControlID="GridView1" Name="code" 
                             PropertyName="SelectedDataKey" />
                     </DeleteParameters>
                     <InsertParameters>
                         <asp:ControlParameter ControlID="TextBox1" Name="course_name" 
                             PropertyName="Text" />
                         <asp:ControlParameter ControlID="DropDownList1" Name="period" 
                             PropertyName="SelectedValue" />
                         <asp:ControlParameter ControlID="DropDownList2" Name="min_qui" 
                             PropertyName="SelectedValue" />
                     </InsertParameters>
                 </asp:SqlDataSource>
             </td>
         </tr>
         <tr>
             <td class="style2">
                 Duration</td>
             <td>
                 <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2">
                     <asp:ListItem>1 Year</asp:ListItem>
                     <asp:ListItem>6 Months</asp:ListItem>
                 </asp:DropDownList>
             </td>
         </tr>
         <tr>
             <td class="style2">
                 Minimum Qualification</td>
             <td>
                 <asp:DropDownList ID="DropDownList2" runat="server" CssClass="ttxt2">
                     <asp:ListItem>Matric</asp:ListItem>
                     <asp:ListItem>10+1</asp:ListItem>
                     <asp:ListItem>10+2</asp:ListItem>
                     <asp:ListItem>Graduation</asp:ListItem>
                 </asp:DropDownList>
             </td>
         </tr>
         <tr>
             <td class="style3">
                 </td>
             <td class="style4">
                 <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
             </td>
         </tr>
         <tr>
             <td class="style3">
                 &nbsp;</td>
             <td class="style4">
                 <asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
             </td>
         </tr>
</table>
   
  <div class="banner">Add Subject</div>
    <table class="style1">
         <tr>
             <td class="style2">
                 Select Course</td>
             <td>
                 <asp:DropDownList ID="DropDownList3" runat="server" AutoPostBack="True" 
                     DataSourceID="SqlDataSource1" DataTextField="course_name" DataValueField="code" 
                     onselectedindexchanged="DropDownList3_SelectedIndexChanged">
                 </asp:DropDownList>
             </td>
             <td rowspan="10" valign="top">
                 <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                     DataSourceID="SqlDataSource2" DataKeyNames="code" 
                     onrowupdating="GridView2_RowUpdating" 
                     onrowdeleting="GridView2_RowDeleting">
                     <Columns>
                         <asp:TemplateField HeaderText="Subject" SortExpression="sub">
                             <EditItemTemplate>
                                 <asp:TextBox ID="sub" runat="server" Text='<%# Bind("sub") %>'></asp:TextBox>
                             </EditItemTemplate>
                             <ItemTemplate>
                                 <asp:Label ID="sub" runat="server" Text='<%# Bind("sub") %>'></asp:Label>
                             </ItemTemplate>
                         </asp:TemplateField>
                         <asp:BoundField DataField="course_name" HeaderText="Course" 
                             SortExpression="course" ReadOnly="True" />
                         <asp:TemplateField HeaderText="Duration" SortExpression="duration">
                             <EditItemTemplate>
                                 <asp:DropDownList ID="dur" runat="server" 
                                     SelectedValue='<%# Bind("duration") %>'>
                                     <asp:ListItem>10 Days</asp:ListItem>
                                     <asp:ListItem>15 Days</asp:ListItem>
                                     <asp:ListItem>1 Month</asp:ListItem>
                                     <asp:ListItem>2 Months</asp:ListItem>
                                     <asp:ListItem>3 Months</asp:ListItem>
                                     <asp:ListItem>4 Months</asp:ListItem>
                                     <asp:ListItem>6 Months</asp:ListItem>
                                     <asp:ListItem Selected="True"></asp:ListItem>
                                 </asp:DropDownList>
                             </EditItemTemplate>
                             <ItemTemplate>
                                 <asp:Label ID="Label1" runat="server" Text='<%# Bind("duration") %>'></asp:Label>
                             </ItemTemplate>
                         </asp:TemplateField>
                         <asp:CommandField ShowEditButton="True" />
                         <asp:CommandField ShowDeleteButton="True" />
                     </Columns>
                 </asp:GridView>
                 <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                     ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                     InsertCommand="INSERT INTO subject(sub, course, duration) VALUES (@sub, @course, @duration)" 
                     
                     SelectCommand="SELECT dbo.subject.code, dbo.subject.project_code, dbo.subject.center_code, dbo.subject.sub, dbo.subject.course, dbo.subject.duration, dbo.course_detail.course_name FROM dbo.subject INNER JOIN dbo.course_detail ON dbo.subject.course = dbo.course_detail.code WHERE (dbo.subject.course = @course)" 
                     
                     
                     UpdateCommand="UPDATE dbo.subject SET duration = @dur, sub =@sub WHERE (code = @code)" 
                     DeleteCommand="DELETE FROM dbo.subject where code=@code">
                     <DeleteParameters>
                         <asp:ControlParameter ControlID="GridView2" Name="code" 
                             PropertyName="SelectedDataKey" />
                     </DeleteParameters>
                     <InsertParameters>
                         <asp:ControlParameter ControlID="TextBox2" Name="sub" PropertyName="Text" />
                         <asp:ControlParameter ControlID="DropDownList3" Name="course" 
                             PropertyName="SelectedValue" />
                         <asp:ControlParameter ControlID="DropDownList4" Name="duration" 
                             PropertyName="SelectedValue" />
                     </InsertParameters>
                     <SelectParameters>
                         <asp:ControlParameter ControlID="DropDownList3" Name="course" 
                             PropertyName="SelectedValue" Type="Int32" />
                     </SelectParameters>
                     <UpdateParameters>
                         <asp:Parameter Name="dur" />
                         <asp:Parameter Name="sub" />
                         <asp:Parameter Name="code" />
                     </UpdateParameters>
                 </asp:SqlDataSource>
             </td>
         </tr>
         <tr>
             <td class="style2">
                 Enter Subject Name</td>
             <td>
                 <asp:TextBox ID="TextBox2" runat="server" CssClass="ttxt"></asp:TextBox>
             </td>
         </tr>
         <tr>
             <td class="style2">
                 Duration</td>
             <td>
                 <asp:DropDownList ID="DropDownList4" runat="server">
                     <asp:ListItem>10 Days</asp:ListItem>
                     <asp:ListItem>15 Days</asp:ListItem>
                     <asp:ListItem>1 Month</asp:ListItem>
                     <asp:ListItem>2 Months</asp:ListItem>
                     <asp:ListItem>3 Months</asp:ListItem>
                     <asp:ListItem>4 Months</asp:ListItem>
                     <asp:ListItem>6 Months</asp:ListItem>
                 </asp:DropDownList>
             </td>
         </tr>
         <tr>
             <td class="style2">
                 &nbsp;</td>
             <td>
                 <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Submit</asp:LinkButton>
             </td>
         </tr>
         <tr>
             <td class="style2">
                 &nbsp;</td>
             <td>
                 <asp:Label ID="Label2" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
             </td>
         </tr>
         <tr>
             <td class="style2">
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
         <tr>
             <td class="style2">
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
         <tr>
             <td class="style2">
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
         <tr>
             <td class="style2">
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
         <tr>
             <td class="style2">
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
</table>
 </ContentTemplate>
 </asp:UpdatePanel>
</asp:Content>

