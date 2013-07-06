<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="gate_pass_report.aspx.cs" Inherits="gate_pass_report" %>

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
            width: 971px;
        }
        .style2
        {
            width: 173px;
        }
        .style3
        {
            width: 397px;
        }
        .style5
        {
            width: 170px;
        }
        .style6
        {
            width: 323px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" />
 <div id="div_print">
    <h2>
        Rawana challan cum gate pass</h2>
        <p>
          (Original/Duplicate/Triplicate/Quardruplicate)
        </p>

    <table class="style1">
        <tr>
            <td class="style3">
                Sr. No.
                <asp:Label ID="sr_no" runat="server"></asp:Label>
            </td>
            <td class="style6">
                Challan No.&nbsp;
                <asp:Label ID="challan_no_1" runat="server"></asp:Label>
            </td>
            <td class="style2">
                Date&nbsp;
                <asp:Label ID="date" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Release Order No.
                <asp:Label ID="rel_order" runat="server"></asp:Label>
            </td>
            <td class="style6">
                in Word :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:Label ID="wrd" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                Name and Address of the purchaser&nbsp;
                <asp:Label ID="add_purchaser" runat="server"></asp:Label>
            </td>
            <td class="style5">
            </td>
        </tr>
        <tr>
            <td class="style3">
                Vehicle No.&nbsp;
                <asp:Label ID="veh_no" runat="server"></asp:Label>
            </td>
            <td class="style6">
                Name of Driver
                :&nbsp;
                <asp:Label ID="name_driver" runat="server"></asp:Label>
                </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <br />
                <asp:GridView ID="GridView1" runat="server" 
        AutoGenerateColumns="False" DataSourceID="SqlDataSource1" Width="974px">
                    <Columns>
                        <asp:TemplateField HeaderText="Name of Division">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList2" runat="server" 
                                    DataSourceID="SqlDataSource_div" DataTextField="div" DataValueField="div">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource_div" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [division]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="name_div" runat="server" Text='<%# Eval("name_div") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Date of Auction">
                            <FooterTemplate>
                                <asp:TextBox ID="date_auc" runat="server" Width="70px"></asp:TextBox>
                            
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="date_auc0" runat="server" 
                                    Text='<%# Eval("date_auc", "{0:d}") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Species">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList3" runat="server" 
                                    DataSourceID="SqlDataSource_spec" DataTextField="spec" DataValueField="spec">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource_spec" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [spec]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Name and Kind">
                            <FooterTemplate>
                                <asp:TextBox ID="name_kind" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="name_kind0" runat="server" Text='<%# Eval("name_kind") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Size">
                            <FooterTemplate>
                                <asp:TextBox ID="size" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="size0" runat="server" Text='<%# Eval("size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No.">
                            <FooterTemplate>
                                <asp:TextBox ID="no" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="no0" runat="server" Text='<%# Eval("no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol.">
                            <FooterTemplate>
                                <asp:TextBox ID="vol" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="vol0" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Ammount Rs.">
                            <FooterTemplate>
                                <asp:TextBox ID="amt" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="amt0" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                    </Columns>
                </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [gate_pass] WHERE ([challan_no] = @challan_no)">
                <SelectParameters>
                    <asp:QueryStringParameter Name="challan_no" QueryStringField="challan_no" 
                        Type="String" />
                </SelectParameters>
    </asp:SqlDataSource>
            <br />
            </div>
</asp:Content>

