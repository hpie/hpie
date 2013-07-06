<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="summary_of_tally_sheet.aspx.cs" Inherits="summary_of_tally_sheet" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

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
            height: 44px;
        }
        .style2
        {
        }
        .style3
        {
            height: 51px;
        }
        .style4
        {
            width: 218px;
        }
        .style5
        {
            width: 218px;
            height: 33px;
        }
        .style6
        {
            height: 33px;
        }
        .style7
        {
            width: 210px;
        }
        .style8
        {
            height: 33px;
            width: 210px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        summary of tally sheet !
    </h2>
    <br />
    <table class="style1" style="text-align: left">

    <tr>
            <td class="style3">
                Challan No:
            </td>
            <td class="style3">
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="challan_no" 
                    DataValueField="challan_no" 
                    onselectedindexchanged="DropDownList2_SelectedIndexChanged" 
                    AutoPostBack="True">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [tally_sheet] WHERE ([challan_no] = @challan_no)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList2" Name="challan_no" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
        </tr>

    <tr>
            <td class="style3">
                Date:</td>
            <td class="style3">
                <asp:TextBox ID="date" runat="server" ReadOnly="True"></asp:TextBox>
                <asp:CalendarExtender ID="date_CalendarExtender" runat="server" Enabled="True" 
                    TargetControlID="date">
                </asp:CalendarExtender>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" 
                    ControlToValidate="date" ErrorMessage="Enter Date First !" 
                    ForeColor="#FF3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
            <td class="style3">
            </td>
            <td class="style3">
            </td>
            <td class="style3">
            </td>
            <td class="style3">
            </td>
        </tr>

        <tr>
            <td class="style2">
                Truck No:
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="truck_no" 
                    DataValueField="truck_no">
                </asp:DropDownList>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [truck_no] FROM [tally_sheet] group by truck_no">
                </asp:SqlDataSource>
                <br />
                <br />
                <br />
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT challan_no FROM [tally_sheet] group by challan_no"></asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <br />
    <asp:Panel ID="Panel1" runat="server" Visible="False">
    <asp:Button ID="btnPrint" runat="server" 
            OnClientClick="return printDiv('div_print');" Text="Print" />
            
            <div id="div_print">
       
    <br />
    <table class="style1">
        <tr>
            <td class="style4">
                Truck No: 
                <asp:Label ID="Label6" runat="server"></asp:Label>
            </td>
            <td class="style7">
                Challan No:
                <asp:Label ID="Label7" runat="server"></asp:Label>
            </td>
            <td>
                Date:
                <asp:Label ID="Label8" runat="server"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td class="style8">
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style6">
            </td>
        </tr>
    </table>
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataSourceID="SqlDataSource2" Width="658px" 
            onrowdatabound="GridView1_RowDataBound" DataKeyNames="code">
                    <Columns>
                        <%--<asp:TemplateField HeaderText="Species" SortExpression="stack">
                            <ItemTemplate>
                                <asp:Label ID="deodar" runat="server" Text='<%# Bind("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>--%>
                        <asp:TemplateField HeaderText="Size" SortExpression="size">
                          
                            <ItemTemplate>
                                <asp:Label ID="size" runat="server" Text='<%# Bind("size_type") %>'></asp:Label>
                             <%--   <asp:Label ID="code" runat="server" Text='<%# Eval("code") %>' Visible="False"></asp:Label>--%>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Deodar">
                           <ItemTemplate>
                                <asp:Label ID="deodar" runat="server" ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Kail">
                           <ItemTemplate>
                                <asp:Label ID="kail" runat="server" ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Fir">
                           <ItemTemplate>
                                <asp:Label ID="fir" runat="server"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Chil">
                           <ItemTemplate>
                                <asp:Label ID="chil" runat="server"></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                    </Columns>
                    <RowStyle HorizontalAlign="Center" />
                </asp:GridView>
                 <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            
            
            
                    
                    SelectCommand="SELECT * FROM size_type">
        </asp:SqlDataSource>
        </div>
                 </asp:Panel>
</asp:Content>

