<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="release_order_report.aspx.cs" Inherits="release_order_report" %>
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
        height: 160px;
    }
        .style2
        {
            width: 813px;
        }
    .style3
    {
        width: 130px;
        height: 59px;
    }
    .style4
    {
        height: 59px;
    }
    .style5
    {
        width: 130px;
    }
    .style6
    {
        height: 59px;
        width: 715px;
    }
    .style7
    {
        width: 715px;
    }
    .style8
    {
        width: 135px;
    }
    .style9
    {
        width: 728px;
    }
    .style10
    {
        width: 117px;
    }
    .style13
    {
        width: 114px;
    }
    .style14
    {
        width: 114px;
        font-weight: bold;
    }
    .style17
    {
        width: 117px;
        font-weight: bold;
    }
    .style18
    {
        width: 117px;
        height: 22px;
    }
    .style21
    {
        width: 114px;
        height: 22px;
    }
    .style22
    {
        height: 22px;
    }
    .style24
    {
        width: 152px;
        height: 22px;
    }
    .style25
    {
        width: 152px;
        font-weight: bold;
    }
    .style26
    {
        width: 152px;
    }
    .style27
    {
        width: 121px;
    }
    .style28
    {
        width: 121px;
        height: 22px;
    }
    .style29
    {
        width: 121px;
        font-weight: bold;
    }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
     <table class="style1"
        <tr>
            <td class="style2">
                Select Release
                No:&nbsp;<asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged" 
                    DataTextField="rel_no" DataValueField="rel_no">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [rel_no] FROM [release_order] group by [rel_no]">
                </asp:SqlDataSource>
&nbsp;<asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
                <br />
                <br />
                <asp:Label ID="statu" runat="server" ForeColor="#CC3300"></asp:Label>
                <br />
                <br />
<asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" /><asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
               
                <br />
                <br />
               
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                     
                    SelectCommand="SELECT * FROM [release_order] where rel_no=@rel_no">
                  
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="rel_no" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                </asp:SqlDataSource>
               
                <br />
               
            </td>
            <td>
                &nbsp;</td>
        </tr>
        </table>

        <div id="div_print">
 <table class="style1" style="text-align: left">
        <tr>
            <td class="style3" style="text-align: left">
                &nbsp;</td>
            <td class="style6" style="text-align: left">
               
<h2>
        release order
    </h2>
               
            </td>
            <td class="style4" style="text-align: left">
                 &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" style="text-align: left">
                &nbsp;</td>
            <td class="style6" style="text-align: left">
               
                No:
                <asp:Label ID="no" runat="server"></asp:Label>
               
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dated : 
                <asp:Label ID="date" runat="server"></asp:Label>
               
            </td>
            <td class="style4" style="text-align: left">
                 &nbsp;</td>
        </tr>
 <tr>
 <td class="style5"></td>
 <td class="style7">
                  
    <b>in purchase of an ammount of Rs.
                </b>
                <asp:Label ID="pur_amt" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
                <b>&nbsp;&nbsp; (in words: </b> &nbsp;
                <asp:Label ID="wrd" runat="server"></asp:Label>
&nbsp;) <strong>received</strong> 
   
    <asp:Label ID="pay_type" runat="server" CssClass="bold"></asp:Label>
            <b>&nbsp;under no
                </b>
                <asp:Label ID="rece_vide_no" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>

    
    <b>Dated
                </b>
                <asp:Label ID="rece_date" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
 
    <b>&nbsp;issued at
                </b>
                <asp:Label ID="issued_at" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp;Payable at
                </b>
                <asp:Label ID="payable_at" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp;and receipt No
                </b>
                <asp:Label ID="rece_no" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp; 
    
    Dated
    </b>
    <asp:Label ID="date3" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp;the following Timber of Forest
   
    Working Division 
    </b> 
    <asp:Label ID="work_div" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp; of&nbsp;&nbsp; M/s
    </b>
    <asp:Label ID="ms" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp; 
   
    purchased by him/them in the open auction held on
    </b>
    <asp:Label ID="auc_held_on" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b style="text-align: left">&nbsp; Sanctioned vide No
    </b>
    <asp:Label ID="sanc_vide_no" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp;Dated
    </b>
    <asp:Label ID="date4" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp; 
   
    effective from&nbsp;
    </b>
    <asp:Label ID="effe_from" runat="server" 
        style="text-decoration: underline" CssClass="bold"></asp:Label>
    <b>&nbsp;is here with released.
    </b>
    <br />
    <br />

    </td>
 <td>
                  
     &nbsp;</td>
 </tr>
    </table>
            <br />
    <table  style="text-align: left"  cellspacing="0">
        <tr>
        <td class="style8"></td>
            <td class="style9">
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" Width="715px">
        <Columns>
            <asp:TemplateField HeaderText="Lot No.">
                <ItemTemplate>
                    <asp:Label ID="lot_no" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Stack No.">
                <ItemTemplate>
                    <asp:Label ID="stack_no" runat="server" Text='<%# Eval("stack_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Description of Produce(Spps., Size)">
                <ItemTemplate>
                 <asp:Label ID="spec" runat="server" Text='<%# Eval("des_spp") %>'></asp:Label> and
                    <asp:Label ID="size_type" runat="server" Text='<%# Eval("des_size") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No.">
                <ItemTemplate>
                    <asp:Label ID="no" runat="server" Text='<%# Eval("no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vol">
                <ItemTemplate>
                    <asp:Label ID="vol" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Floor Rate">
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server" Text='<%# Eval("floor_rate") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Rate">
                <ItemTemplate>
                    <asp:Label ID="rate" runat="server" Text='<%# Eval("rate") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Ammount">
                <ItemTemplate>
                    <asp:Label ID="amt" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
        </Columns>
    </asp:GridView>
            </td>
            <td></td>

        </tr>
        <tr>
        <td class="style8">&nbsp;</td>
            <td class="style9">
                <table class="style1">
                    <tr>
                        <td class="style10">
                            &nbsp;</td>
                        <td class="style27">
                            &nbsp;</td>
                        <td class="style13">
                            &nbsp;</td>
                        <td class="style26">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Factor</td>
                        <td class="style27">
                            <asp:Label ID="factor" runat="server"></asp:Label>
                        </td>
                        <td class="style13">
                            &nbsp;</td>
                        <td class="style26">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Total</td>
                        <td class="style27">
                            &nbsp;</td>
                        <td class="style13">
                            &nbsp;</td>
                        <td class="style26">
                            <asp:Label ID="tot_l" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Discount:</td>
                        <td class="style27">
                            <asp:Label ID="discount" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td class="style13">
                            <asp:Label ID="discount1" runat="server"></asp:Label>
                        </td>
                        <td class="style26">
                            <asp:Label ID="discount0" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Less Discount:</td>
                        <td class="style27">
                            <asp:Label ID="less_discount" runat="server"></asp:Label>
                        &nbsp;%</td>
                        <td class="style13">
                            <asp:Label ID="less_discount1" runat="server"></asp:Label>
                        </td>
                        <td class="style26">
                            <asp:Label ID="less_discount0" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style10">
                            TDS</td>
                        <td class="style27">
                            <asp:Label ID="tds" runat="server"></asp:Label>
                        &nbsp;%</td>
                        <td class="style13">
                            <asp:Label ID="tds1" runat="server"></asp:Label>
                        </td>
                        <td class="style26">
                            <asp:Label ID="tds0" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Vat</td>
                        <td class="style27">
                            <asp:Label ID="vat" runat="server"></asp:Label>
                        &nbsp;%</td>
                        <td class="style13">
                            <asp:Label ID="vat1" runat="server"></asp:Label>
                        </td>
                        <td class="style26">
                            <asp:Label ID="vat0" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style18">
                            Market Fee</td>
                        <td class="style28">
                            <asp:Label ID="market_fee" runat="server"></asp:Label>
                        &nbsp;%</td>
                        <td class="style21">
                            <asp:Label ID="market_fee1" runat="server"></asp:Label>
                        </td>
                        <td class="style24">
                            <asp:Label ID="market_fee0" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td class="style22">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style17">
                            &nbsp;</td>
                        <td class="style29">
                            &nbsp;</td>
                        <td class="style14">
                            &nbsp;</td>
                        <td class="style25">
                            &nbsp;</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style17">
                            Net Ammount</td>
                        <td class="style29">
                            &nbsp;</td>
                        <td class="style14">
                            &nbsp;</td>
                        <td class="style25">
                            <asp:Label ID="net_amt" runat="server"></asp:Label>
                        &nbsp;Rs.</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                </table>
                <br />
                <br />
                <br />
                <br />
                <br />
            </td>
            <td>&nbsp;</td>

        </tr>
        </table>
    </div>
    <br />
</asp:Content>

