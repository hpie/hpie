<%@ Page Title="" Language="C#" MasterPageFile="~/reports/Site.master" AutoEventWireup="true" CodeFile="Details.aspx.cs" Inherits="user_Details" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 913px;
            height: 238px;
        }
        .style2
        {
            height: 65px;
        }
        .style3
        {
        width: 122px;
    }
        .style4
        {
            height: 65px;
            width: 122px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner"> Center Details</div>
    <table class="style1">
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                Select Center Name</td>
            <td>
                <asp:DropDownList ID="DropDownList3" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="name" 
                    DataValueField="center_code_main" CssClass="ttxt2">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [tb1]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Project Code</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="project_name" 
                    DataValueField="code" CssClass="ttxt2">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Course</td>
            <td class="style2">
                <asp:DropDownList ID="DropDownList2" runat="server" DataTextField="course_name" 
                    DataValueField="code" CssClass="ttxt2">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [course_detail]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            &nbsp;
                <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Total Students</td>
            <td>
                <asp:Label ID="Label1" runat="server"></asp:Label>
            </td>
        </tr>
    </table>
    <br />
    <asp:GridView ID="GridView1" runat="server" AllowPaging="True" 
    AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
    BorderStyle="None" BorderWidth="1px" CellPadding="3" PageSize="15" Width="654px" 
        DataKeyNames="s_id_main" 
        onselectedindexchanging="GridView1_SelectedIndexChanging" 
        style="margin-right: 0px" 
        onpageindexchanging="GridView1_PageIndexChanging" 
        onrowdeleting="GridView1_RowDeleting">
    <Columns>
        <asp:BoundField DataField="center_code" HeaderText="Center Code" />
        <asp:BoundField DataField="s_id_main" HeaderText="Student ID" 
            SortExpression="s_id" />
        <asp:BoundField DataField="s_name" HeaderText="Student Name" 
            SortExpression="s_name" />
        <asp:BoundField DataField="s_f_name" HeaderText="Father Name" 
            SortExpression="s_f_name" />
        <asp:CommandField ShowSelectButton="True" />
        <asp:CommandField ShowDeleteButton="True" />
        <asp:CommandField />
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
    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
        style="font-size: 7pt" Visible="False">
        <Columns>
            <asp:BoundField DataField="s_id_main" HeaderText="Student ID" 
                SortExpression="s_id_main" />
            <asp:BoundField DataField="sub_date" HeaderText="Enrollment Date" 
                SortExpression="sub_date" DataFormatString="{0:dd MMM, yyyy}" />
            <asp:BoundField DataField="s_name" HeaderText="Name1" SortExpression="s_name" />
            <asp:BoundField DataField="s_name2" HeaderText="Name2" SortExpression="s_name2" />
            <asp:BoundField DataField="s_name3" HeaderText="Name3" SortExpression="s_name3" />
            <asp:BoundField DataField="s_f_name" HeaderText="Father/Husband Name" 
                SortExpression="s_f_name" />
                 <asp:BoundField DataField="f_name2" HeaderText="Father/Husband Name2" 
                SortExpression="f_name2" />
                 <asp:BoundField DataField="f_name3" HeaderText="Father/Husband Name3" 
                SortExpression="f_name3" />
                 <asp:BoundField DataField="m_status" HeaderText="Mstatus" 
                SortExpression="m_status" />
            <asp:BoundField DataField="gen" HeaderText="Gender" SortExpression="gen" />
            <asp:BoundField DataField="dob" DataFormatString="{0:dd MMM, yyyy}" 
                HeaderText="Date of Birth" SortExpression="dob" />
                 <asp:BoundField DataField="age" HeaderText="Age" 
                SortExpression="age" />
                    <asp:BoundField DataField="social_status" HeaderText="Caste" 
                SortExpression="social_status" />
                            
                         <asp:BoundField DataField="addr" HeaderText="Address1" 
                SortExpression="addr" />
                <asp:BoundField DataField="addr2" HeaderText="Address2" 
                SortExpression="addr2" />
                <asp:BoundField DataField="addr3" HeaderText="Address3" 
                SortExpression="addr3" />
                      <asp:BoundField DataField="city1" HeaderText="City" 
                SortExpression="city1" />
                      <asp:BoundField DataField="p_code" HeaderText="Pin" 
                SortExpression="p_code" />


                                         <asp:BoundField DataField="p_addr" HeaderText="pAddress1" 
                SortExpression="p_addr" />
                 <asp:BoundField DataField="p_addr2" HeaderText="PAddress2" 
                SortExpression="p_addr2" />
                 <asp:BoundField DataField="p_addr3" HeaderText="PAddress3" 
                SortExpression="p_addr3" />
                      <asp:BoundField DataField="city2" HeaderText="PCity" 
                SortExpression="city2" />
                      <asp:BoundField DataField="p_p_code" HeaderText="pPin" 
                SortExpression="p_p_code" />

            <asp:BoundField DataField="email" HeaderText="Email ID" 
                SortExpression="email" />
            <asp:BoundField DataField="landline" HeaderText="Landline" 
                SortExpression="landline" />
            <asp:BoundField DataField="mobile" HeaderText="Mobile" 
                SortExpression="mobile" />
                <asp:BoundField DataField="city2" HeaderText="Location" 
                SortExpression="city2" />
                 <asp:BoundField DataField="c_name" HeaderText="Course" 
                SortExpression="c_name" />

            <asp:BoundField DataField="travel" HeaderText="Travel" 
                SortExpression="travel" />

                 <asp:BoundField DataField="an_income" HeaderText="Annual Income" 
                SortExpression="an_income" />
                <asp:BoundField DataField="other_inc" HeaderText="Other Income" 
                SortExpression="other_inc" />
 
            <asp:BoundField DataField="quli" HeaderText="HQ" 
                SortExpression="quli" />
           
                  <asp:BoundField DataField="SSC_Sub" HeaderText="SSC_Sub" 
                SortExpression="SSC_Sub" />
                        <asp:BoundField DataField="SSC_Yr" HeaderText="SSC_Yr" 
                SortExpression="SSC_Yr" />
                        <asp:BoundField DataField="SSC_Per" HeaderText="SSC_Per" 
                SortExpression="SSC_Per" />

                 <asp:BoundField DataField="HSC_Sub" HeaderText="HSC_Sub" 
                SortExpression="HSC_Sub" />
                        <asp:BoundField DataField="HSC_Yr" HeaderText="HSC_Yr" 
                SortExpression="HSC_Yr" />
                        <asp:BoundField DataField="HSC_Per" HeaderText="HSC_Per" 
                SortExpression="HSC_Per" />

                         <asp:BoundField DataField="Gra_Sub" HeaderText="Gra_Sub" 
                SortExpression="Gra_Sub" />
                        <asp:BoundField DataField="Gra_Yr" HeaderText="Gra_Yr" 
                SortExpression="Gra_Yr" />
                        <asp:BoundField DataField="Gra_Per" HeaderText="Gra_Per" 
                SortExpression="Gra_Per" />

                                     <asp:BoundField DataField="Post_Gra_Sub" HeaderText="Post_Gra_Sub" 
                SortExpression="Post_Gra_Sub" />
                        <asp:BoundField DataField="Post_Gra_Yr" HeaderText="Post_Gra_Yr" 
                SortExpression="Post_Gra_Yr" />
                        <asp:BoundField DataField="Post_Gra_Per" HeaderText="Post_Gra_Per" 
                SortExpression="Post_Gra_Per" />

            <asp:BoundField DataField="complevel" HeaderText="Complevel" 
                SortExpression="complevel" />
          
            <asp:BoundField DataField="tr_date" DataFormatString="{0:dd MMM, yyyy}" 
                HeaderText="Training Start Date" SortExpression="tr_date" />
            <asp:BoundField DataField="tr_com_date" DataFormatString="{0:dd MMM, yyyy}" 
                HeaderText="Training Completion Date" SortExpression="tr_com_date" />
            
        </Columns>
    </asp:GridView>
<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        DeleteCommand="DELETE FROM student_detail where s_id_main=@s_id_main">
    <DeleteParameters>
        <asp:Parameter Name="s_id_main" />
    </DeleteParameters>
    <SelectParameters>
        <asp:ControlParameter ControlID="DropDownList3" Name="code" 
            PropertyName="SelectedValue" />
        <asp:ControlParameter ControlID="DropDownList2" Name="course" 
            PropertyName="SelectedValue" />
        <asp:ControlParameter ControlID="DropDownList1" Name="project" 
            PropertyName="SelectedValue" />
    </SelectParameters>
</asp:SqlDataSource>
</asp:Content>

