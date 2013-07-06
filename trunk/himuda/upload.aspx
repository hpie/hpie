<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="upload.aspx.cs" Inherits="upload" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 400px;
            border: 1px solid #000000;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
     <div>
    
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <br />
&nbsp;&nbsp;&nbsp;
        <br />
        <asp:Label ID="Label1" runat="server"></asp:Label>
         <table cellpadding="0" cellspacing="0" class="style1">
             <tr>
                 <td>
                     Select Division&nbsp;
                 </td>
                 <td>
                     <asp:DropDownList ID="DropDownList1" runat="server" 
                         DataSourceID="SqlDataSource2" DataTextField="Div" DataValueField="ID">
                     </asp:DropDownList>
                     <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                         ConnectionString="<%$ ConnectionStrings:himuda %>" 
                         SelectCommand="SELECT * FROM [tbdiv]"></asp:SqlDataSource>
                 </td>
             </tr>
             <tr>
                 <td>
    
        Choose an Excel file&nbsp;</td>
                 <td>
        <asp:FileUpload ID="FileUpload1" runat="server" />
                 </td>
             </tr>
             <tr>
                 <td>
                     &nbsp;</td>
                 <td>
        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Upload" />
                 </td>
             </tr>
         </table>
        <br />
    
    </div>
    <asp:GridView ID="GridView1" runat="server" 
        onrowdatabound="GridView1_RowDataBound">
    </asp:GridView>
    <asp:GridView ID="GridView2" runat="server" Visible="False">
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:himuda %>" 
        InsertCommand="INSERT INTO dbo.cpf(Name_Des, AC, During_Year, Recovery_o_adv, Date, Div, Arear,File_name) VALUES (@Name_Des, @AC, @During_Year, @Recovery_o_adv, @Date, @Div, @Arear,@File_name)" 
        SelectCommand="SELECT * FROM [cpf] where File_name=@File_name">
        <SelectParameters>
            <asp:Parameter Name="File_name" />
        </SelectParameters>
        <InsertParameters>
            <asp:Parameter Name="Name_Des" />
            <asp:Parameter Name="AC" />
            <asp:Parameter Name="During_Year" />
            <asp:Parameter Name="Recovery_o_adv" />
            <asp:Parameter Name="Date" />
            <asp:Parameter Name="Div" />
            <asp:Parameter Name="Arear" />
            <asp:ControlParameter ControlID="FileUpload1" Name="File_name" 
                PropertyName="FileName" />
        </InsertParameters>
    </asp:SqlDataSource>
</asp:Content>

