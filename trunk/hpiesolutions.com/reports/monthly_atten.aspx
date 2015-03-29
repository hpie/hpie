﻿<%@ Page Title="" Language="C#" MasterPageFile="~/reports/Site.master" AutoEventWireup="true" CodeFile="monthly_atten.aspx.cs" Inherits="user_monthly_atten" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 787px;
    }
    .style2
    {
        width: 621px;
    }
    .style3
    {
            width: 119px;
        }
        .style4
        {
            width: 119px;
            height: 31px;
        }
        .style5
        {
            width: 621px;
            height: 31px;
        }
        .style6
        {
            height: 31px;
        }
        .style7
        {
            width: 478px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Monthly Attendence </div>
    <table class="style1">
    <tr>
        <td class="style3">
            Select Center Name</td>
        <td class="style2">
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
        <td class="style3">
            Project Code</td>
        <td class="style2">
            <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                DataSourceID="SqlDataSource1" DataTextField="project_name" 
                DataValueField="code">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style3">
            Select Month &amp; year</td>
        <td class="style2">
            <asp:DropDownList ID="mont" runat="server" CssClass="ttxt2" 
                onselectedindexchanged="mont_SelectedIndexChanged">
                <asp:ListItem Value="1">Jan</asp:ListItem>
                <asp:ListItem Value="2">Feb</asp:ListItem>
                <asp:ListItem Value="3">Mar</asp:ListItem>
                <asp:ListItem Value="4">Apr</asp:ListItem>
                <asp:ListItem Value="5">May</asp:ListItem>
                <asp:ListItem Value="6">Jun</asp:ListItem>
                <asp:ListItem Value="7">Jul</asp:ListItem>
                <asp:ListItem Value="8">Aug</asp:ListItem>
                <asp:ListItem Value="9">Sep</asp:ListItem>
                <asp:ListItem Value="10">Oct</asp:ListItem>
                <asp:ListItem Value="11">Nov</asp:ListItem>
                <asp:ListItem Value="12">Dec</asp:ListItem>
            </asp:DropDownList>
&nbsp;<asp:DropDownList ID="yers" runat="server" CssClass="ttxt2" 
                onselectedindexchanged="yers_SelectedIndexChanged">
            </asp:DropDownList>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style3">
            Select Course</td>
        <td class="style2">
            <asp:DropDownList ID="course" runat="server" DataTextField="course_name" DataValueField="code" 
                onselectedindexchanged="course_SelectedIndexChanged" CssClass="ttxt2">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
        </td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style4">
            </td>
        <td class="style5">
            &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" 
                onclick="LinkButton1_Click" CausesValidation="False">Search</asp:LinkButton>
            &nbsp;
            <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                InsertCommand="INSERT INTO monthly_atten(center_code, course, s_id, name, f_name, categ, tot_days, p_days, abs, per, mont, year, date, date_act, project_code) VALUES (@center_code, @course, @s_id, @name, @f_name, @categ, @tot_days, @p_days, @abs, @per, @mont, @year, @date, @date_act, @project_code)">
                <InsertParameters>
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:ControlParameter ControlID="course" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="s_id" />
                    <asp:Parameter Name="name" />
                    <asp:Parameter Name="f_name" />
                    <asp:Parameter Name="categ" />
                    <asp:Parameter Name="tot_days" />
                    <asp:Parameter Name="p_days" />
                    <asp:Parameter Name="abs" />
                    <asp:Parameter Name="per" />
                    <asp:ControlParameter ControlID="mont" Name="mont" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="yers" Name="year" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="date" />
                    <asp:Parameter Name="date_act" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" />
                </InsertParameters>
                <SelectParameters>
                    <asp:Parameter Name="first" />
                    <asp:Parameter Name="second" />
                    <asp:ControlParameter ControlID="course" Name="course" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList4" Name="code" 
                        PropertyName="SelectedValue" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
        <td class="style6">
            </td>
    </tr>
    <tr>
        <td colspan="3">
            <br />
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                CellPadding="3" Height="133px" Width="912px" 
                EmptyDataText="----No Record Available----">
                <Columns>
                    <asp:TemplateField HeaderText="Student ID">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Bind("s_id") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Participant Name" SortExpression="s_name">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Bind("name") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Father Name" SortExpression="s_f_name">
                      
                        <ItemTemplate>
                            <asp:Label ID="Label3" runat="server" Text='<%# Bind("f_name") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Category" SortExpression="social_status">
                       
                        <ItemTemplate>
                            <asp:Label ID="Label4" runat="server" Text='<%# Bind("categ") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Total Days">
                        <ItemTemplate>
                            <asp:Label ID="tot_days" runat="server" Text='<%# Eval("tot_days") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Present Days">
                        <ItemTemplate>
                            <asp:Label ID="Label5" runat="server" Text='<%# Eval("p_days") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Absent">
                        <ItemTemplate>
                            <asp:Label ID="Label6" runat="server" Text='<%# Eval("abs") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="%Age">
                        <ItemTemplate>
                            <asp:Label ID="per" runat="server" Text='<%# Eval("per") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
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
            <br />
            <table class="style7">
                <tr>
                    <td>
                        &nbsp;</td>
                    <td>
&nbsp;
                        &nbsp;&nbsp;
                        <asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td>
                        &nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</asp:Content>
