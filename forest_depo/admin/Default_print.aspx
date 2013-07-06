<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="Default_print.aspx.cs" Inherits="Default_print" %>

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
        .style9
        {
        }
        </style>

</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
  <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" />
    <br />
    <br />
    Select Challan No:
    <asp:DropDownList ID="DropDownList1" runat="server" 
        DataSourceID="SqlDataSource2" DataTextField="challan_no" 
        DataValueField="challan_no" 
        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
    </asp:DropDownList>
    &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" 
        onclick="LinkButton1_Click">Search</asp:LinkButton>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT challan_no FROM [tally_sheet] group by challan_no">
    </asp:SqlDataSource>
    <br />
     <div id="div_print">

        

    <table class="style1" align="left">
        <tr>
            <td class="style3">
                   <h2>
        Timber Receipt Tally Sheet
    </h2></td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td>
                <table class="style1">
                    <tr valign="top">
                        <td valign="top" class="style9">
                            <asp:SqlDataSource ID="SqlDataSource_chl" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                SelectCommand="SELECT * FROM [tally_sheet_chl] WHERE ([challan_no] = @challan_no)">
                                <SelectParameters>
                                    <asp:QueryStringParameter Name="challan_no" QueryStringField="chl" />
                                </SelectParameters>
                            </asp:SqlDataSource>
            
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    ShowFooter="True" 
                    EnableModelValidation="False" 
                    style="font-size: 8pt" DataSourceID="SqlDataSource_rec" 
                                Width="1031px" DataKeyNames="code">
                    <Columns>
                      
                       
                       

                        <asp:TemplateField HeaderText="Scant No.">
                         
                            <ItemTemplate>
                                <asp:Label ID="scant_no1" runat="server" Text='<%# Eval("scant_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>


                        <asp:TemplateField HeaderText="Date of Challan">
                         
                            <ItemTemplate>
                                <asp:Label ID="date_of_chl" runat="server" 
                                    Text='<%# Eval("date_of_chl", "{0:d}") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>


                          <asp:TemplateField HeaderText="Date of Receipt">
                         
                            <ItemTemplate>
                                <asp:Label ID="date_of_rec" runat="server" 
                                    Text='<%# Eval("date_of_rec", "{0:d}") %>'></asp:Label>
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

                        

                        <asp:TemplateField HeaderText="Size Type">
                        
                            <ItemTemplate>
                                <asp:Label ID="size_type5" runat="server" Text='<%# Eval("size_type") %>' ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                   
                        <asp:TemplateField HeaderText="Grade/ Class">
                            <ItemTemplate>
                                <asp:Label ID="grade1" runat="server" Text='<%# Eval("grade") %>' ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Stack No.">
                            <ItemTemplate>
                                <asp:Label ID="stack1" runat="server" Text='<%# Eval("stack") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:CommandField ShowDeleteButton="True" />
                    </Columns>
                </asp:GridView>
                            <asp:SqlDataSource ID="SqlDataSource_rec" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                
                                SelectCommand="SELECT * FROM [tally_sheet] WHERE ([challan_no] = @challan_no)" 
                                DeleteCommand="DELETE FROM tally_sheet WHERE (code = @code)">
                                <DeleteParameters>
                                    <asp:ControlParameter ControlID="GridView2" Name="code" 
                                        PropertyName="SelectedDataKey" />
                                </DeleteParameters>
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
            <td class="style3">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>

    </div>
    </asp:Content>

