<%@ Page Title="" Language="C#" MasterPageFile="~/reports/Site.master" AutoEventWireup="true" CodeFile="AttendanceSheet.aspx.cs" Inherits="admin_AttendanceSheet" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 862px;
        }
        .style2
        {
            width: 157px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Attendance Sheet !</div>
    <br />
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
    <ContentTemplate>
    
    
    <table class="style1">
        <tr>
            <td class="style2">
                Select Center Name</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource1" DataTextField="name" 
                    DataValueField="center_code_main" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [tb1]"></asp:SqlDataSource>
                &nbsp;<asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Select Date</td>
            <td>
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="date" DataValueField="date" 
                    onselectedindexchanged="DropDownList2_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [atten_sheet] WHERE ([center_code] = @center_code)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="center_code" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            &nbsp;</td>
            <td>
                <asp:Label ID="Label1" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:DataList ID="DataList1" runat="server" DataSourceID="SqlDataSource3" 
                    ondeletecommand="DataList1_DeleteCommand" 
                    onupdatecommand="DataList1_UpdateCommand" 
                    onitemcommand="DataList1_ItemCommand" onitemdatabound="DataList1_ItemDataBound" 
                    onselectedindexchanged="DataList1_SelectedIndexChanged" 
                    DataKeyField="code">
                    <ItemTemplate>
                        Description:
                        <asp:LinkButton ID="dn" runat="server" CommandName="select" 
                            Text='<%# Eval("des") %>'></asp:LinkButton>
                        <br />
                        Date:
                        <asp:Label ID="Label2" runat="server" 
                            Text='<%# Eval("date", "{0:dd MMMM, yyyy}") %>'></asp:Label>
                        <br />
                        --------------------------------------------------------------<br />
                        <asp:LinkButton ID="lk2" runat="server" >Download</asp:LinkButton>
                        &nbsp;|
                        <asp:LinkButton ID="LinkButton2" runat="server" CommandName="delete">Delete</asp:LinkButton>
                        <br />
                        --------------------------------------------------------------<br />
                        <asp:Label ID="loc" runat="server" Text='<%# Eval("file_name") %>' 
                            Visible="False"></asp:Label>
                        <br />
                        <asp:Label ID="cont" runat="server" Text='<%# Eval("con_type") %>' 
                            Visible="False"></asp:Label>
                        <br />
                        <br />
                        <br />
<br />
                    </ItemTemplate>
                </asp:DataList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                    SelectCommand="SELECT * FROM [atten_sheet] WHERE (([center_code] = @center_code) AND ([date] = @date)) order by date desc" 
                    DeleteCommand="DELETE FROM dbo.atten_sheet where code=@code">
                    <DeleteParameters>
                        <asp:Parameter Name="code" />
                    </DeleteParameters>
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="center_code" 
                            PropertyName="SelectedValue" Type="String" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="date" 
                            PropertyName="SelectedValue" Type="DateTime" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>

    </ContentTemplate>
    </asp:UpdatePanel>
</asp:Content>

