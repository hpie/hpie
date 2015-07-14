<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="cen_categ_wise_detail.aspx.cs" Inherits="admin_cen_categ_wise_detail" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 769px;
        }
    .style2
    {
        height: 23px;
    }
    .style5
    {
        width: 197px;
    }
    .style6
    {
        height: 23px;
        width: 197px;
    }
    .style7
    {
        width: 272px;
    }
        .style8
        {
            width: 197px;
            font-weight: bold;
        }
        .style9
        {
            width: 272px;
            font-weight: bold;
        }
        .style10
        {
            height: 23px;
            font-weight: bold;
        }
        .style11
        {
            height: 23px;
            width: 197px;
            font-weight: bold;
        }
        .style12
        {
            width: 233px;
        }
    </style>
    </asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">

<div class="banner">
        Report For...</div>
    <table class="style1">
        <tr>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                Project Code
            </td>
            <td>
                <asp:DropDownList ID="p_code" runat="server" DataSourceID="SqlDataSource8" DataTextField="project_name"
                    DataValueField="code" CssClass="ttxt2" AutoPostBack="True">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource8" runat="server" ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>"
                    SelectCommand="SELECT * FROM [project]"></asp:SqlDataSource>
            </td>
            <td>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td class="style1">
                &nbsp;
            </td>
        </tr>
    </table>
    <div class="banner">
        Center Category Wise Detail  </div>
    <br />
                <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
            <br />
        <br />
        <table style="width: 798px">
            <tr>
                <td>
                    <br />
                </td>
                <td>
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <asp:DataList ID="DataList1" runat="server" DataSourceID="SqlDataSource1" 
                        onitemdatabound="DataList1_ItemDataBound" style="margin-right: 0px">
                    
                        <FooterTemplate>
                            <table border="1px" cellpadding="2px" cellspacing="0px" class="style1">
                                <tr>
                                    <td class="style12" rowspan="5">
                                        <b>&nbsp;Grand Total</b><br />
                                        <br />
                                    </td>
                                    <td class="style8">
                                        Course Name</td>
                                    <td>
                                        <b>SC</b></td>
                                    <td>
                                        <b>ST</b></td>
                                    <td>
                                        <b>OBC</b></td>
                                    <td>
                                        <b>Minority</b></td>
                                    <td>
                                        <b>Total</b></td>
                                </tr>
                                <tr>
                                    <td class="style5">
                                        PGDMCA</td>
                                    <td>
                                        <asp:Label ID="a1" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="a2" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="a3" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="a4" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="a5" runat="server"></asp:Label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style6">
                                        DMOA &amp; FA</td>
                                    <td class="style2">
                                        <asp:Label ID="b1" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="b2" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="b3" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="b4" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="b5" runat="server"></asp:Label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style6">
                                        DCA-DTP</td>
                                    <td class="style2">
                                        <asp:Label ID="c1" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="c2" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="c3" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="c4" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="c5" runat="server"></asp:Label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style6">
                                        <strong>Total</strong></td>
                                    <td class="style2">
                                        <asp:Label ID="d1" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="d2" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="d3" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="d4" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="d5" runat="server"></asp:Label>
                                    </td>
                                </tr>
                            </table>
                        </FooterTemplate>
                    
                        <ItemTemplate>
                            <table class="style1" border="1px"  cellpadding="2px" cellspacing="0px">
                                <tr>
                                    <td>
                                        <b>Sr. </b>
                                    </td>
                                    <td>
                                        <strong>Distt</strong></td>
                                    <td class="style9">
                                        Center name</td>
                                    <td class="style8">
                                        Course Name</td>
                                    <td>
                                        <b>SC</b></td>
                                    <td>
                                        <b>ST</b></td>
                                    <td>
                                        <b>OBC</b></td>
                                    <td>
                                        <b>Minority</b></td>
                                    <td>
                                        <b>Total</b></td>
                                </tr>
                                <tr>
                                    <td rowspan="4">
                                        <asp:Label ID="sr" runat="server"></asp:Label>
                                    </td>
                                    <td rowspan="4">
                                        <asp:Label ID="Label1" runat="server" Text='<%# Eval("distt") %>'></asp:Label>
                                    </td>
                                    <td rowspan="4" class="style7">
                                        <asp:Label ID="cn" runat="server" Text='<%# Eval("name") %>' />
                                        <br />
                                        <asp:Label ID="cd" runat="server" Text='<%# Eval("center_code_main") %>' 
                                            Visible="False"></asp:Label>
                                        <br />
                                    </td>
                                    <td class="style5">
                                        PGDMCA</td>
                                    <td>
                                        <asp:Label ID="pgdm_1" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="pgdm_2" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="pgdm_3" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="pgdm_4" runat="server"></asp:Label>
                                    </td>
                                    <td>
                                        <asp:Label ID="pgdm_tot" runat="server"></asp:Label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style6">
                                        DMOA &amp; FA</td>
                                    <td class="style2">
                                        <asp:Label ID="dmo_1" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dmo_2" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dmo_3" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dmo_4" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dmo_tot" runat="server"></asp:Label>
                                    </td>
                                </tr>
                              
                                <tr>
                                    <td class="style6">
                                        DCA-DTP</td>
                                    <td class="style2">
                                        <asp:Label ID="dca_1" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dca_2" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dca_3" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dca_4" runat="server"></asp:Label>
                                    </td>
                                    <td class="style2">
                                        <asp:Label ID="dca_tot" runat="server"></asp:Label>
                                    </td>
                                </tr>
                              
                                <tr>
                                    <td class="style11">
                                        Total</td>
                                    <td class="style10">
                                        <asp:Label ID="sc_tot" runat="server"></asp:Label>
                                    </td>
                                    <td class="style10">
                                        <asp:Label ID="st_tot" runat="server"></asp:Label>
                                    </td>
                                    <td class="style10">
                                        <asp:Label ID="obc_tot" runat="server"></asp:Label>
                                    </td>
                                    <td class="style10">
                                        <asp:Label ID="min_tot" runat="server"></asp:Label>
                                    </td>
                                    <td class="style10">
                                        <asp:Label ID="tot_tot" runat="server"></asp:Label>
                                    </td>
                                </tr>
                              
                            </table><br />
                             ------------------------------------------------------------------------------------------------
<br />
                            <br />
                        </ItemTemplate>
                    </asp:DataList>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                        
                        
                        SelectCommand="SELECT dbo.tb1.name, dbo.tb1.center_code_main, dbo.distt.distt FROM dbo.tb1 INNER JOIN dbo.distt ON dbo.tb1.dist = dbo.distt.code ORDER BY dbo.tb1.center_code"></asp:SqlDataSource>
                    <br />
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                        SelectCommand="SELECT * FROM [student_detail] WHERE (([center_code] = @center_code) AND ([course] = @course)) AND (project_code=@code)">
                        <SelectParameters>
                            <asp:Parameter Name="center_code" />
                            <asp:Parameter Name="course" />
                            <asp:ControlParameter ControlID="p_code" Name="code" PropertyName="SelectedValue" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
            </tr>
        </table>
  
</asp:Content>

