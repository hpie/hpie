<%@ Page Title="" Language="C#" MasterPageFile="~/user/Site.master" AutoEventWireup="true" CodeFile="atten_upload.aspx.cs" Inherits="user_atten_upload" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
    {
        width: 898px;
    }
    .style2
    {
            width: 106px;
        }
    .style3
    {
            width: 106px;
            height: 34px;
        }
    .style4
    {
        height: 34px;
    }
    .style5
    {
        width: 106px;
        height: 54px;
    }
    .style6
    {
        height: 54px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Upload Attendance Sheet</div>
    <table class="style1">
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
        </td>
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
    </tr>
    <tr>
        <td class="style2">
            Choose File</td>
        <td>
            <asp:FileUpload ID="FileUpload1" runat="server" CssClass="ttxt2" 
                Enabled="False" />
        &nbsp;<asp:RegularExpressionValidator runat="server" 
                    ID="valUpTest" ControlToValidate="FileUpload1"

                ErrorMessage="Image Files Only (.jpg, .bmp, .png, .gif, .doc, .docx, .xls, .xlsx, .zip, .rar)" ValidationGroup="a"

ValidationExpression="^(([a-zA-Z]:)|(\\{2}\w+)\$?)(\\(\w[\w].*))(.jpg|.JPG|.gif|.GIF|.jpeg|.JPEG|.bmp|.BMP|.png|.PNG|.doc|.docx|.xls|.xlsx|.zip|.rar)$" 
                                             ForeColor="#990000" SetFocusOnError="True" />
        </td>
    </tr>
    <tr>
        <td class="style3">
            Date</td>
        <td class="style4">
            <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt"></asp:TextBox>
            <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                Enabled="True" TargetControlID="TextBox1">
            </ajaxToolkit:CalendarExtender>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator11" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="a"></asp:RequiredFieldValidator>
            </td>
    </tr>
    <tr>
        <td class="style3">
            Description</td>
        <td class="style4">
            <asp:TextBox ID="TextBox2" runat="server" Height="47px" TextMode="MultiLine" 
                Width="209px" CssClass="ttxt2"></asp:TextBox>
        &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator12" runat="server" 
                    ControlToValidate="TextBox2" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True" ValidationGroup="a"></asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style5">
        </td>
        <td class="style6">
            <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Submit" 
                style="height: 26px" ValidationGroup="a" Enabled="False" />
&nbsp;<asp:Label ID="Label1" runat="server" ForeColor="#990000" style="font-weight: 700"></asp:Label>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                InsertCommand="INSERT INTO dbo.atten_sheet(file_name, date, des, date_act, center_code, project_code, con_type) VALUES (@file_name, @date, @des, @date_act, @center_code, @project_code, @con_type)" 
                SelectCommand="SELECT * FROM [atten_sheet]">
                <InsertParameters>
                    <asp:Parameter Name="file_name" />
                    <asp:ControlParameter ControlID="TextBox1" Name="date" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox2" Name="des" PropertyName="Text" />
                    <asp:Parameter Name="date_act" />
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="con_type" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                InsertCommand="INSERT INTO dbo.atten_sheet(file_name, date, des, date_act, center_code, project_code, con_type) VALUES (@file_name, @date, @des, @date_act, @center_code, @project_code, @con_type)" 
                
                SelectCommand="SELECT * FROM [atten_sheet] where (center_code=@center_code) and (date between @first and @second)">
                <InsertParameters>
                    <asp:Parameter Name="file_name" />
                    <asp:ControlParameter ControlID="TextBox1" Name="date" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox2" Name="des" PropertyName="Text" />
                    <asp:Parameter Name="date_act" />
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="project_code" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="con_type" />
                </InsertParameters>
                <SelectParameters>
                    <asp:SessionParameter Name="center_code" SessionField="start_a" />
                    <asp:Parameter Name="first" />
                    <asp:Parameter Name="second" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
</table>
</asp:Content>

