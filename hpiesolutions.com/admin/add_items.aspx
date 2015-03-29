<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="add_items.aspx.cs" Inherits="user_add_items" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 888px;
        }
        .style2
        {
            height: 36px;
        }
        .style3
        {
        }
        .style4
        {
            width: 136px;
        }
        .style5
        {
            height: 36px;
            width: 136px;
        }
        .style6
        {
            width: 270px;
        }
        .style7
        {
            height: 36px;
            width: 270px;
        }
        .style8
        {
            width: 883px;
        }
        .style9
        {
            width: 159px;
        }
        .style10
        {
            width: 291px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Add More Items<asp:ScriptManager ID="ScriptManager1" 
                    runat="server">
                </asp:ScriptManager>
            </div>
    <br />
    <br />
    <br />
    <table class="style8">
        <tr>
            <td class="style9">
                Enter Project Name</td>
            <td class="style10">
                <asp:TextBox ID="TextBox5" runat="server" CssClass="ttxt" ValidationGroup="c" 
                    Height="63px" TextMode="MultiLine" Width="223px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                    ControlToValidate="TextBox5" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="c"></asp:RequiredFieldValidator>
            </td>
            <td rowspan="4" valign="top">
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [project_detail]" 
                    InsertCommand="INSERT INTO project_detail(project, date) VALUES (@project, @date)">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox5" Name="project" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="date" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="code" DataSourceID="SqlDataSource5" style="text-align: left">
                    <Columns>
                        <asp:BoundField DataField="project" HeaderText="Project Name" 
                            SortExpression="project_name" />
                    </Columns>
                </asp:GridView>
                </td>
        </tr>
        <tr>
            <td class="style9">
                Date</td>
            <td class="style10">
                <asp:TextBox ID="TextBox6" runat="server" CssClass="ttxt" ValidationGroup="c"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="TextBox6_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="TextBox6">
                </ajaxToolkit:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                    ControlToValidate="TextBox6" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="c"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style9">
                &nbsp;</td>
            <td class="style10">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style9">
                &nbsp;</td>
            <td class="style10">
                <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click" 
                    ValidationGroup="c">Submit</asp:LinkButton>
            &nbsp;<asp:Label ID="Label3" runat="server" 
                    style="font-weight: 700; color: #990000"></asp:Label>
                <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [project_detail] where project=@project" 
                    InsertCommand="INSERT INTO project_detail(project, date) VALUES (@project, @date)">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox5" Name="project" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="date" PropertyName="Text" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox5" Name="project" PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    <br />
    <table class="style1">
        <tr>
            <td class="style2" colspan="2">
                <strong>Add Projects</strong></td>
            <td class="style2">
                </td>
        </tr>
        <tr>
            <td class="style4">
                Select Project Name</td>
            <td class="style6">
                <asp:DropDownList ID="DropDownList2" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource6" DataTextField="project" 
                    DataValueField="code" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList2_SelectedIndexChanged" ValidationGroup="a">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [project_detail]"></asp:SqlDataSource>
            </td>
            <td rowspan="7" valign="top">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    DeleteCommand="DELETE FROM project where code=@code" 
                    SelectCommand="SELECT * FROM [project] where project_code=@code">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="GridView1" Name="code" 
                            PropertyName="SelectedDataKey" />
                    </DeleteParameters>
                  
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList2" Name="code" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                  
                </asp:SqlDataSource>
                <asp:GridView ID="GridView3" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="code" DataSourceID="SqlDataSource1" style="text-align: left">
                    <Columns>
                        <asp:BoundField DataField="project_name" HeaderText="Project Name" 
                            SortExpression="project_name" />
                    </Columns>
                </asp:GridView>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Enter Project Code</td>
            <td class="style6">
                <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt" ValidationGroup="a" 
                    Height="63px" TextMode="MultiLine" Width="223px"></asp:TextBox>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="a"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Starting Date</td>
            <td class="style6">
                <asp:TextBox ID="TextBox3" runat="server" CssClass="ttxt" ValidationGroup="a"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="TextBox3">
                </ajaxToolkit:CalendarExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ControlToValidate="TextBox3" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="a"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style5">
                End Date</td>
            <td class="style7">
                <asp:TextBox ID="TextBox4" runat="server" CssClass="ttxt" 
                    ontextchanged="TextBox4_TextChanged" ValidationGroup="a"></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="TextBox4_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="TextBox4">
                </ajaxToolkit:CalendarExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                    ControlToValidate="TextBox4" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="a"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style6">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
                    ValidationGroup="a">Submit</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style6">
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    InsertCommand="INSERT INTO project(project_name, center_code, s_date, e_date, project_code) VALUES (@project_name, @center_code, @s_date, @e_date, @project_code)" 
                    
                    
                    
                    
                    SelectCommand="SELECT * FROM [project] WHERE project_name = @project_name and project_code=@code">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="project_name" 
                            PropertyName="Text" />
                        <asp:SessionParameter Name="center_code" SessionField="start_a" />
                        <asp:ControlParameter ControlID="TextBox3" Name="s_date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox4" Name="e_date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="project_code" 
                            PropertyName="SelectedValue" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="project_name" 
                            PropertyName="Text" Type="String" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="code" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
        </tr>
        </table>
    <p>
    </p>
    <table class="style1" runat="server" visible="false">
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td valign="top">
                &nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
                ---------------------------------------------------------------------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                <strong>Add Subjects</strong></td>
                <td class="style3" rowspan="6" valign="top">
                    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                        DataKeyNames="code" DataSourceID="SqlDataSource3" Width="221px">
                        <Columns>
                            <asp:BoundField DataField="project_code" HeaderText="Project Code" 
                                SortExpression="project_code" />
                            <asp:BoundField DataField="sub" HeaderText="Subject" SortExpression="sub" />
                            <asp:CommandField ShowDeleteButton="True" />
                        </Columns>
                    </asp:GridView>
                    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                        DeleteCommand="DELETE FROM subject where code=@code" 
                        SelectCommand="SELECT * FROM [subject] WHERE ([center_code] = @center_code)">
                        <DeleteParameters>
                            <asp:ControlParameter ControlID="GridView2" Name="code" 
                                PropertyName="SelectedDataKey" />
                        </DeleteParameters>
                        <SelectParameters>
                            <asp:SessionParameter Name="center_code" SessionField="session_a" 
                                Type="String" />
                        </SelectParameters>
                    </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Enter Subject Name</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server" CssClass="ttxt" ValidationGroup="b"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="TextBox2" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="b"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Select Project</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" CssClass="ttxt2" 
                    DataSourceID="SqlDataSource1" DataTextField="project_name" 
                    DataValueField="code" ValidationGroup="b">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click" 
                    ValidationGroup="b">Submit</asp:LinkButton>
&nbsp;<asp:Label ID="Label2" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    InsertCommand="INSERT INTO subject(project_code, center_code, sub) VALUES (@project_code, @center_code, @sub)" 
                    SelectCommand="SELECT * FROM [subject] WHERE (([center_code] = @center_code) AND ([sub] = @sub))">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                            PropertyName="SelectedValue" />
                        <asp:SessionParameter Name="center_code" SessionField="start_a" />
                        <asp:ControlParameter ControlID="TextBox2" Name="sub" PropertyName="Text" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:SessionParameter Name="center_code" SessionField="start_a" Type="String" />
                        <asp:ControlParameter ControlID="TextBox2" Name="sub" PropertyName="Text" 
                            Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

