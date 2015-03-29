<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="upload.aspx.cs" Inherits="admin_upload" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 500px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Upload</div>
   
    <table class="style1">
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                Select Files</td>
            <td>
                <asp:FileUpload ID="FileUpload1" runat="server" CssClass="ttxt2" 
                    Enabled="False" />
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="FileUpload1" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
                                         <asp:RegularExpressionValidator runat="server" 
                    ID="valUpTest" ControlToValidate="FileUpload1"
ErrorMessage="Image Files Only (.jpg, .bmp, .png, .gif, .doc, .docx, .xls, .xlsx)" ValidationGroup="up"

ValidationExpression="^(([a-zA-Z]:)|(\\{2}\w+)\$?)(\\(\w[\w].*))(.jpg|.JPG|.gif|.GIF|.jpeg|.JPEG|.bmp|.BMP|.png|.PNG|.doc|.docx|.xls|.xlsx)$" 
                                             ForeColor="#990000" SetFocusOnError="True" />
                   </td>
        </tr>
        <tr>
            <td>
                Description</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server" CssClass="ttxt"></asp:TextBox>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
                    Enabled="False">Submit</asp:LinkButton>
                &nbsp;<asp:Label ID="lblmessage" runat="server" 
                    style="font-weight: 700; color: #990000"></asp:Label>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [other_files]" 
                    
                    InsertCommand="INSERT INTO other_files(file_name, date, des, file_type, con_type, file_loc) VALUES (@file_name, @date, @des, @file_type, @con_type, @file_loc)">
                    <InsertParameters>
                        <asp:Parameter Name="file_name" />
                        <asp:Parameter Name="date" />
                        <asp:ControlParameter ControlID="TextBox1" Name="des" PropertyName="Text" />
                        <asp:Parameter Name="file_type" />
                        <asp:Parameter Name="con_type" />
                        <asp:Parameter Name="file_loc" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

