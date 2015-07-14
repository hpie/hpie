<%@ Page Language="C#" AutoEventWireup="true" CodeFile="categ_details.aspx.cs" Inherits="admin_categ_details" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
      <link href="../Styles/Site.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" DataSourceID="SqlDataSource1" 
            EmptyDataText="-No Record Available-" Width="1065px">
            <Columns>
                <asp:TemplateField HeaderText="Sr. No.">   
                    <ItemTemplate>
                        <%# Container.DataItemIndex + 1 %>   
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:BoundField DataField="s_name" HeaderText="Student Name" 
                    SortExpression="s_name" />
                <asp:BoundField DataField="s_f_name" HeaderText="Father's Name" 
                    SortExpression="s_f_name" />
                <asp:BoundField DataField="dob" DataFormatString="{0:dd MMM, yyyy}" 
                    HeaderText="DOB" SortExpression="dob" />
                <asp:BoundField DataField="gen" HeaderText="Gender" SortExpression="gen" />
                <asp:BoundField DataField="email" HeaderText="Email" SortExpression="email" />
                <asp:BoundField DataField="mobile" HeaderText="Mobile" 
                    SortExpression="mobile" />
                <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
                <asp:BoundField DataField="name" HeaderText="Center Name" 
                    SortExpression="name" />
                <asp:BoundField DataField="social_status" HeaderText="Social Status" 
                    SortExpression="social_status" />
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
            
            SelectCommand="SELECT dbo.student_detail.code, dbo.student_detail.s_id, dbo.student_detail.s_name, dbo.student_detail.s_f_name, dbo.student_detail.dob, dbo.student_detail.gen, dbo.student_detail.email, dbo.student_detail.landline, dbo.student_detail.mobile, dbo.student_detail.addr, dbo.student_detail.distt, dbo.student_detail.state, dbo.student_detail.p_code, dbo.student_detail.degree, dbo.student_detail.quli, dbo.student_detail.an_income, dbo.student_detail.social_status, dbo.student_detail.phy_chall, dbo.student_detail.bank_ac, dbo.student_detail.bank_name, dbo.student_detail.ifsc_code, dbo.student_detail.bpl_irdp_no, dbo.student_detail.center_code, dbo.student_detail.p_addr, dbo.student_detail.p_city, dbo.student_detail.p_distt, dbo.student_detail.p_state, dbo.student_detail.p_p_code, dbo.student_detail.s_id_main, dbo.student_detail.img, dbo.student_detail.course, dbo.student_detail.date_of_add, dbo.student_detail.sub_date, dbo.student_detail.project_code, dbo.student_detail.tr_date, dbo.student_detail.tr_com_date, dbo.student_detail.tr_status, dbo.city.city, dbo.tb1.name FROM dbo.student_detail INNER JOIN dbo.city ON dbo.student_detail.city = dbo.city.code INNER JOIN dbo.tb1 ON dbo.student_detail.center_code = dbo.tb1.center_code_main WHERE (dbo.student_detail.social_status = @social_status) AND (dbo.student_detail.project_code = @project_code) order by dbo.tb1.center_code_main">
            <SelectParameters>
                <asp:QueryStringParameter Name="social_status" QueryStringField="sid" 
                    Type="String" />
                 <asp:QueryStringParameter Name="project_code" QueryStringField="pcode" 
                    Type="String" />
            </SelectParameters>
        </asp:SqlDataSource>
    
    </div>
    </form>
</body>
</html>
