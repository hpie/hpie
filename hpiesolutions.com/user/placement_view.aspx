<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="placement_view.aspx.cs" Inherits="user_placement_view" %>

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
            <asp:DropDownList ID="DropDownList2" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource1" DataTextField="course_name" 
                DataValueField="code" AutoPostBack="True" 
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
           <td class="style2">
               Select Student Code</td>
           <td>
            <asp:DropDownList ID="DropDownList3" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource4" DataTextField="s_id" 
                   DataValueField="s_id" AutoPostBack="True" 
                   onselectedindexchanged="DropDownList3_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   SelectCommand="SELECT * FROM [placement] WHERE ([course] = @course) and (center_code=@code)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList2" Name="course" 
                        PropertyName="SelectedValue" Type="Int32" />
                    <asp:SessionParameter Name="code" SessionField="start_a" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                   
                   
                   
                   SelectCommand="SELECT * FROM [placement] WHERE (([center_code] = @center_code) AND ([s_id] = @s_id))" 
                   UpdateCommand="UPDATE dbo.placement SET c_name = @cname, c_add = @c_add, city = @city, desig = @desig, j_date = @j_date, salary = @salary, c_per_name = @c_per_name, c_per_no = @c_per_no WHERE (s_id = @sid)">
                <SelectParameters>
                    <asp:SessionParameter Name="center_code" SessionField="start_a" Type="String" />
                    <asp:ControlParameter ControlID="DropDownList3" Name="s_id" 
                        PropertyName="SelectedValue" Type="String" />
                </SelectParameters>
                <UpdateParameters>
                    <asp:Parameter Name="cname" />
                    <asp:Parameter Name="c_add" />
                    <asp:Parameter Name="city" />
                    <asp:Parameter Name="desig" />
                    <asp:Parameter Name="j_date" />
                    <asp:Parameter Name="salary" />
                    <asp:Parameter Name="c_per_name" />
                    <asp:Parameter Name="c_per_no" />
                    <asp:Parameter Name="sid" />
                </UpdateParameters>
            </asp:SqlDataSource>
           </td>
           <td>
               &nbsp;</td>
       </tr>
       <tr>
           <td colspan="3">
               <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                   BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                   CellPadding="3" DataSourceID="SqlDataSource5" style="font-size: 9pt" 
                   Width="881px" DataKeyNames="s_id" onrowupdating="GridView1_RowUpdating">
                   <Columns>
                       <asp:TemplateField HeaderText="Student ID" SortExpression="s_id">
                           <ItemTemplate>
                               <asp:Label ID="Label1" runat="server" Text='<%# Bind("s_id") %>'></asp:Label>
                           </ItemTemplate>
                        
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Name">
                           <ItemTemplate>
                               <asp:Label ID="Label2" runat="server" Text='<%# Bind("name") %>'></asp:Label>
                           </ItemTemplate>
                       
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Company Name" SortExpression="c_name">
                           <ItemTemplate>
                               <asp:Label ID="Label3" runat="server" Text='<%# Bind("c_name") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox3" runat="server" Text='<%# Bind("c_name") %>'></asp:TextBox>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Company Address" SortExpression="c_add">
                           <ItemTemplate>
                               <asp:Label ID="Label4" runat="server" Text='<%# Bind("c_add") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox4" runat="server" Text='<%# Bind("c_add") %>' 
                                   Height="60px" TextMode="MultiLine"></asp:TextBox>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="City" SortExpression="city">
                           <ItemTemplate>
                               <asp:Label ID="Label5" runat="server" Text='<%# Bind("city") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox5" runat="server" Text='<%# Bind("city") %>' 
                                   Width="50px"></asp:TextBox>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Designation" SortExpression="desig">
                           <ItemTemplate>
                               <asp:Label ID="Label6" runat="server" Text='<%# Bind("desig") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox6" runat="server" Text='<%# Bind("desig") %>' 
                                   Width="60px"></asp:TextBox>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Joining Date" SortExpression="j_date">
                           <ItemTemplate>
                               <asp:Label ID="Label7" runat="server" 
                                   Text='<%# Bind("j_date", "{0:dd MMM, yyyy}") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox7" runat="server" 
                                   Text='<%# Bind("j_date", "{0:dd MMM, yyyy}") %>' Width="60px"></asp:TextBox>
                               <ajaxToolkit:CalendarExtender ID="TextBox7_CalendarExtender" runat="server" 
                                   Enabled="True" TargetControlID="TextBox7">
                               </ajaxToolkit:CalendarExtender>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Salary" SortExpression="salary">
                           <ItemTemplate>
                               <asp:Label ID="Label8" runat="server" Text='<%# Bind("salary") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox8" runat="server" Text='<%# Bind("salary") %>' 
                                   Width="60px"></asp:TextBox>
                               <ajaxToolkit:FilteredTextBoxExtender ID="TextBox8_FilteredTextBoxExtender" 
                                   runat="server" Enabled="True" FilterType="Numbers" TargetControlID="TextBox8">
                               </ajaxToolkit:FilteredTextBoxExtender>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Contact Person Name" SortExpression="c_per_name">
                           <ItemTemplate>
                               <asp:Label ID="Label9" runat="server" Text='<%# Bind("c_per_name") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox9" runat="server" Text='<%# Bind("c_per_name") %>'></asp:TextBox>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="Contact Person No." SortExpression="c_per_no">
                           <ItemTemplate>
                               <asp:Label ID="Label10" runat="server" Text='<%# Bind("c_per_no") %>'></asp:Label>
                           </ItemTemplate>
                           <EditItemTemplate>
                               <asp:TextBox ID="TextBox10" runat="server" Text='<%# Bind("c_per_no") %>'></asp:TextBox>
                           </EditItemTemplate>
                       </asp:TemplateField>
                       <asp:CommandField ShowEditButton="True" />
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

