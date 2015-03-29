<%@ Page Language="C#" AutoEventWireup="true" CodeFile="st_placed.aspx.cs" Inherits="admin_st_placed" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" DataSourceID="SqlDataSource1" 
            EmptyDataText="-No Data Available-" 
            style="font-size: 10pt; font-family: Verdana">
            <Columns>
                <asp:BoundField DataField="name" HeaderText="Student Name" 
                    SortExpression="name" />
                <asp:BoundField DataField="name" HeaderText="Center Name" 
                    SortExpression="center_code_main" />
                <asp:BoundField DataField="s_id" HeaderText="Student ID" 
                    SortExpression="s_id" />
                <asp:BoundField DataField="c_name" HeaderText="Company Name" 
                    SortExpression="c_name" />
                <asp:BoundField DataField="desig" HeaderText="Designation" 
                    SortExpression="desig" />
                <asp:BoundField DataField="j_date" DataFormatString="{0:dd MMM, yyyy}" 
                    HeaderText="Joining Date" SortExpression="j_date" />
                <asp:BoundField DataField="salary" HeaderText="Salary" 
                    SortExpression="salary" />
                <asp:BoundField DataField="c_per_name" HeaderText="Contact Person Name" 
                    SortExpression="c_per_name" />
                <asp:BoundField DataField="c_per_no" HeaderText="Contact Person No" 
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
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
            SelectCommand="SELECT dbo.placement.code, dbo.placement.center_code, dbo.placement.project_code, dbo.placement.s_id, dbo.placement.c_name, dbo.placement.c_add, dbo.placement.city, dbo.placement.desig, dbo.placement.j_date, dbo.placement.salary, dbo.placement.c_per_name, dbo.placement.c_per_no, dbo.placement.date, dbo.placement.course, dbo.placement.name, dbo.tb1.center_code_main, dbo.tb1.name AS Expr1 FROM dbo.placement INNER JOIN dbo.tb1 ON dbo.placement.center_code = dbo.tb1.center_code_main order by dbo.placement.code desc">
        </asp:SqlDataSource>
    
    </div>
    </form>
</body>
</html>
