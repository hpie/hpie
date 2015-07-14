<%@ Page Language="C#" AutoEventWireup="true" CodeFile="trai_comp.aspx.cs" Inherits="admin_trai_comp" %>

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
            EmptyDataText="-No Record Available-" ShowHeaderWhenEmpty="True" 
            style="font-family: Verdana; font-size: 10pt">
            <Columns>
                 <asp:TemplateField HeaderText="Sr. No.">   
                    <ItemTemplate>
                        <%# Container.DataItemIndex + 1 %>   
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:BoundField DataField="s_id_main" HeaderText="Student ID" 
                    SortExpression="s_id_main" />
                <asp:BoundField DataField="s_name" HeaderText="Name" SortExpression="s_name" />
                <asp:BoundField DataField="s_f_name" HeaderText="Father Name" 
                    SortExpression="s_f_name" />
                <asp:BoundField DataField="social_status" HeaderText="Social Status" 
                    SortExpression="social_status" />
                <asp:BoundField DataField="center_code" HeaderText="Center Code" 
                    SortExpression="center_code" />
                <asp:BoundField DataField="tr_date" DataFormatString="{0: dd MMM, yyyy}" 
                    HeaderText="Training Start Date" SortExpression="tr_date" />
                <asp:BoundField DataField="tr_com_date" DataFormatString="{0: dd MMM, yyyy}" 
                    HeaderText="Training Completion Date" />
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
            
            
            SelectCommand="SELECT [s_name], [s_f_name], [social_status], [center_code], [s_id_main], [tr_date], [tr_com_date] FROM [student_detail] WHERE ([tr_status] = @tr_status) AND ([project_code] = @project_code) order by center_code, s_id">
            <SelectParameters>
                <asp:Parameter DefaultValue="Completed" Name="tr_status" Type="String" />
                <asp:QueryStringParameter Name="project_code" QueryStringField="pcode" 
                    Type="String" />
            </SelectParameters>
        </asp:SqlDataSource>
    
    </div>
    </form>
</body>
</html>
