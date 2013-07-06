<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="Default_print.aspx.cs" Inherits="Default_print" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        //disable postback on print button
        return false;
    }
    </script>

    <style type="text/css">

        .style1
        {
            width: 100%;
        }
        .style2
        {
            text-align: left;
            width: 105px;
        }
        .style5
        {
            text-align: left;
            width: 105px;
            height: 58px;
        }
        .style6
        {
            height: 58px;
        }
        .style7
        {
            height: 30px;
        }
        .style8
        {
            height: 30px;
            width: 375px;
        }
        .style9
        {
            width: 375px;
        }
        </style>

</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
  <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" />
    <br />
    <br />
    Select Challan No:
    <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
        DataSourceID="SqlDataSource2" DataTextField="challan_no" 
        DataValueField="challan_no" 
        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
    </asp:DropDownList>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT challan_no FROM [tally_sheet] group by challan_no">
    </asp:SqlDataSource>
    <br />
     <div id="div_print">

        

    <table class="style1" align="left">
        <tr>
            <td class="style3" colspan="2">
                   <h2>
        Timber Receipt Tally Sheet
    </h2></td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                Division</td>
            <td style="text-align: left">
                <asp:Label ID="division" runat="server"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                Challan No.</td>
            <td style="text-align: left">
                <asp:Label ID="challan_no" runat="server"></asp:Label>
            &nbsp;&nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style2">
                Date of Challan</td>
            <td style="text-align: left">
                <asp:Label ID="date_of_challan" runat="server"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style2">
                Date of Receipt</td>
            <td style="text-align: left">
                <asp:Label ID="date_of_recept" runat="server"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style2">
                Truck No.</td>
            <td style="text-align: left">
                <asp:Label ID="truck_no" runat="server"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style5">
                Remarks</td>
            <td style="text-align: left" class="style6">
                <asp:Label ID="TextBox8" runat="server"></asp:Label>
                &nbsp;</td>
            <td class="style6">
                </td>
        </tr>
       
        <tr>
            <td colspan="2">
                <table class="style1">
                    <tr>
                        <td class="style8">
                            <strong>As Per Challan<br />
                            |</strong></td>
                        <td class="style7">
            
                            <strong>As Per Receipt<br />
                            |</strong></td>
                    </tr>
                    <tr valign="top">
                        <td valign="top" class="style9">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    ShowFooter="True" 
                    EnableModelValidation="False" 
                    style="font-size: 8pt" BackColor="White" BorderColor="Black" BorderStyle="Solid" 
                                BorderWidth="1px" CellPadding="3" DataSourceID="SqlDataSource_chl" 
                                Width="420px">
                    <Columns>

                        <asp:TemplateField HeaderText="Lot No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="lot_no0" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                   
                        <asp:TemplateField HeaderText="Species">
                         
                            <ItemTemplate>
                                <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                          <asp:TemplateField HeaderText="Kind">
                           
                            <ItemTemplate>
                                <asp:Label ID="kind2" runat="server" Text='<%# Eval("kind") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                        <asp:TemplateField HeaderText="Size Type">
                         
                            <ItemTemplate>
                                <asp:Label ID="size_type6" runat="server" Text='<%# Eval("size_type") %>' ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
        
                        <asp:TemplateField HeaderText="Vol (As per challan)">
                          
                            <ItemTemplate>
                                <asp:Label ID="size_vol0" runat="server" Text='<%# Eval("size_vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                     
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
                            <asp:SqlDataSource ID="SqlDataSource_chl" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                SelectCommand="SELECT * FROM [tally_sheet_chl] WHERE ([challan_no] = @challan_no)">
                                <SelectParameters>
                                    <asp:QueryStringParameter Name="challan_no" QueryStringField="chl" />
                                </SelectParameters>
                            </asp:SqlDataSource>
                        </td>
                        <td valign="top">
            
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    ShowFooter="True" 
                    EnableModelValidation="False" 
                    style="font-size: 8pt" BackColor="White" BorderColor="Black" BorderStyle="Solid" 
                                BorderWidth="1px" CellPadding="3" DataSourceID="SqlDataSource_rec" 
                                Width="623px">
                    <Columns>
                      
                       
                       

                        <asp:TemplateField HeaderText="Scant No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="scant_no1" runat="server" Text='<%# Eval("scant_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                         <asp:TemplateField HeaderText="Lot No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="lot_no2" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                        <asp:TemplateField HeaderText="Species">
                           
                            <ItemTemplate>
                                <asp:Label ID="spec0" runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                          <asp:TemplateField HeaderText="Kind">
                         
                            <ItemTemplate>
                                <asp:Label ID="kind1" runat="server" Text='<%# Eval("kind") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                        <asp:TemplateField HeaderText="Size Type">
                        
                            <ItemTemplate>
                                <asp:Label ID="size_type5" runat="server" Text='<%# Eval("size_type") %>' ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol (as per receipt)">
                          
                            <ItemTemplate>
                                <asp:Label ID="as_per_vol1" runat="server" Text='<%# Eval("as_per_vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Grade/ Class">
                            <ItemTemplate>
                                <asp:Label ID="grade1" runat="server" ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Stack No.">
                            <ItemTemplate>
                                <asp:Label ID="stack1" runat="server"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
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
                            <asp:SqlDataSource ID="SqlDataSource_rec" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                SelectCommand="SELECT * FROM [tally_sheet] WHERE ([challan_no] = @challan_no)">
                                <SelectParameters>
                                    <asp:QueryStringParameter Name="challan_no" QueryStringField="chl" />
                                </SelectParameters>
                            </asp:SqlDataSource>
                        </td>
                    </tr>
                </table>
                <br />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>

    </div>
    </asp:Content>

