<%@ Page Title="" Language="C#" MasterPageFile="~/reports/Site.master" AutoEventWireup="true" CodeFile="reportcard_all.aspx.cs" Inherits="admin_reportcard_all" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 810px;
        }
        .style2
        {
        }
        .style3
        {
            width: 627px;
        }
    .style4
    {
        height: 120px;
    }
    .style5
    {
        width: 234px;
    }
    .style6
    {
        height: 120px;
        width: 234px;
    }
    </style>
     <link rel="stylesheet" href="colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="jquery.colorbox.js"></script>
		<script>
		    $(document).ready(function () {
		        //Examples of how to assign the Colorbox event to elements
		        $(".group1").colorbox({ rel: 'group1' });
		        $(".group2").colorbox({ rel: 'group2', transition: "fade" });
		        $(".group3").colorbox({ rel: 'group3', transition: "none", width: "75%", height: "75%" });
		        $(".group4").colorbox({ rel: 'group4', slideshow: true });
		        $(".ajax").colorbox();
		        $(".youtube").colorbox({ iframe: true, innerWidth: 640, innerHeight: 390 });
		        $(".vimeo").colorbox({ iframe: true, innerWidth: 500, innerHeight: 409 });
		        $(".iframe").colorbox({ iframe: true, width: "80%", height: "90%" });
		        $(".inline").colorbox({ inline: true, width: "50%" });
		        $(".callbacks").colorbox({
		            onOpen: function () { alert('onOpen: colorbox is about to open'); },
		            onLoad: function () { alert('onLoad: colorbox has started to load the targeted content'); },
		            onComplete: function () { alert('onComplete: colorbox has displayed the loaded content'); },
		            onCleanup: function () { alert('onCleanup: colorbox has begun the close process'); },
		            onClosed: function () { alert('onClosed: colorbox has completely closed'); }
		        });

		        $('.non-retina').colorbox({ rel: 'group5', transition: 'none' })
		        $('.retina').colorbox({ rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true });

		        //Example of preserving a JavaScript event for inline calls.
		        $("#click").click(function () {
		            $('#click').css({ "background-color": "#f00", "color": "#fff", "cursor": "inherit" }).text("Open this window again and this message will still be here.");
		            return false;
		        });
		    });
		</script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Report Card</div>
    <table class="style1">
        <tr>
            <td class="style2">
                Total No of Beneficiaries  Enrolled</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Refresh</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style2" colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataSourceID="SqlDataSource1" Height="193px" 
                    onrowdatabound="GridView1_RowDataBound" Width="359px" 
                    onselectedindexchanging="GridView1_SelectedIndexChanging" 
                    ShowFooter="True" CellPadding="4" ForeColor="#333333" GridLines="None">
                    <AlternatingRowStyle BackColor="White" ForeColor="#284775" />
                    <Columns>
                        <asp:TemplateField HeaderText="Category" SortExpression="categ" HeaderStyle-HorizontalAlign="Left" ItemStyle-HorizontalAlign="Left">
                            <ItemTemplate>
                                <asp:Label ID="categ" runat="server" Text='<%# Bind("categ") %>'></asp:Label>
                            </ItemTemplate>

<HeaderStyle HorizontalAlign="Left"></HeaderStyle>

<ItemStyle HorizontalAlign="Left"></ItemStyle>
                        </asp:TemplateField>
                        <asp:TemplateField ConvertEmptyStringToNull="False" HeaderText="Male" 
                            SortExpression="categ">
                            <FooterTemplate>
                                <asp:Label ID="male_f" runat="server" Text="0"></asp:Label>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="male" runat="server" Text="0"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField ConvertEmptyStringToNull="False" HeaderText="Female" 
                            SortExpression="categ">
                            <FooterTemplate>
                                <asp:Label ID="female_f" runat="server" Text="0"></asp:Label>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="female" runat="server" Text="0"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Total">
                            <FooterTemplate>
                                <asp:Label ID="tot_f" runat="server" Text="0"></asp:Label>
                            </FooterTemplate>
                         <ItemTemplate>
                                <asp:Label ID="tot" runat="server" ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                         <asp:TemplateField>
                <ItemTemplate>
               
               
                    <asp:LinkButton ID="LinkButton1"  runat="server" CommandName="select">Detail</asp:LinkButton>
                </ItemTemplate>
            </asp:TemplateField>
                    </Columns>
                    <EditRowStyle BackColor="#999999" />
                    <FooterStyle HorizontalAlign="Center" BackColor="#5D7B9D" Font-Bold="True" 
                        ForeColor="White" />
                    <HeaderStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
                    <PagerStyle BackColor="#284775" ForeColor="White" HorizontalAlign="Center" />
                    <RowStyle HorizontalAlign="Center" BackColor="#F7F6F3" ForeColor="#333333" />
                    <SelectedRowStyle BackColor="#E2DED6" Font-Bold="True" ForeColor="#333333" />
                    <SortedAscendingCellStyle BackColor="#E9E7E2" />
                    <SortedAscendingHeaderStyle BackColor="#506C8C" />
                    <SortedDescendingCellStyle BackColor="#FFFDF8" />
                    <SortedDescendingHeaderStyle BackColor="#6F8DAE" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [categ]"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                    SelectCommand="SELECT COUNT(code) AS cnt, count(gen) as gen1, gen FROM student_detail WHERE (social_status = @st) GROUP BY gen">
                    <SelectParameters>
                        <asp:Parameter Name="st" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <br />
                <table class="style3">
                    <tr>
                        <td class="style5">
                            Training Not Started</td>
                        <td>
                            <asp:Label ID="Label1" runat="server"></asp:Label>
                        </td>
                        <td>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                                SelectCommand="SELECT count(code) as cnt FROM [student_detail] WHERE ([tr_status] ='Not Active')"></asp:SqlDataSource>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                             Beneficiaries Under Training</td>
                        <td>
                            <asp:Label ID="Label2" runat="server"></asp:Label>
                        </td>
                        <td>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                                SelectCommand="SELECT count(code) as cnt FROM [student_detail] WHERE ([tr_status] ='Active')"></asp:SqlDataSource>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                             Beneficiaries Training Completed</td>
                        <td>
                            <asp:Label ID="Label3" runat="server"></asp:Label>
                        </td>
                        <td>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                                SelectCommand="SELECT count(code) as cnt FROM [student_detail] WHERE ([tr_status] ='Completed')"></asp:SqlDataSource>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                             Beneficiaries Discontinued</td>
                        <td>
                            <asp:Label ID="Label4" runat="server"></asp:Label>
                        </td>
                        <td>
                <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    
                                SelectCommand="SELECT count(code) as cnt FROM [student_detail] WHERE ([tr_status] ='Dropped')"></asp:SqlDataSource>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                             Beneficiaries Placed</td>
                        <td>
                            <asp:Label ID="Label5" runat="server"></asp:Label>
                        </td>
                        <td>
                <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT count(code) as cnt FROM [placement]"></asp:SqlDataSource>
                            <asp:LinkButton ID="LinkButton2" runat="server">Details...</asp:LinkButton>
                        </td>
                    </tr>
                    <tr>
                        <td class="style5">
                             &nbsp;</td>
                        <td>
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style6">
                             </td>
                        <td class="style4">
                            </td>
                        <td class="style4">
                            &nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</asp:Content>

