<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="release_order_report.aspx.cs" Inherits="release_order_report" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
<style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
            width: 813px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
<h2>
        release order
    </h2>
    <table class="style1">
        <tr>
            <td class="style2">
                Challan
                No:&nbsp;
                <asp:Label ID="challan_no" runat="server"></asp:Label>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
               
            </td>
            <td>
                Dated
                <asp:Label ID="date" runat="server"></asp:Label>
            </td>
        </tr>
 
    </table>
                  
    in purchase of an ammount of Rs.
                <asp:Label ID="pur_amt" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
                &nbsp;&nbsp; (in words:&nbsp;
                <asp:Label ID="wrd" runat="server"></asp:Label>
&nbsp;) received vide Draft/CDR No.
                <asp:Label ID="rece_vide_no" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>

    
    Dated
                <asp:Label ID="rece_date" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
 
&nbsp;issued at
                <asp:Label ID="issued_at" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp;Payable at
                <asp:Label ID="payable_at" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp;and receipt No
                <asp:Label ID="rece_no" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp; 
    
    Dated
    <asp:Label ID="date3" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp;the following Timber of Forest
   
    Working Division 
    <asp:Label ID="work_div" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp; of&nbsp;&nbsp; M/s
    <asp:Label ID="ms" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp; 
   
    purchased by him/them in the open auction held on
    <asp:Label ID="auc_held_on" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp; Sanctioned vide No
    <asp:Label ID="sanc_vide_no" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp;Dated
    <asp:Label ID="date4" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp; 
   
    effective from&nbsp;
    <asp:Label ID="effe_from" runat="server" 
        style="font-weight: 700; text-decoration: underline"></asp:Label>
&nbsp;is here with released.
    <br />
    <br />
    <table class="style1" style="text-align: center" border="1px" cellspacing="0">
        <tr>
            <td>
                Lot No.</td>
            <td>
                Stack No.</td>
            <td colspan="2">
                Description of Produce</td>
            <td>
                No.</td>
            <td>
                Vol.</td>
            <td>
                Rate</td>
            <td>
                Amount</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                Spps.</td>
            <td>
                Size</td>
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
            <td>
                <asp:Label ID="lot_no" runat="server" Width="90px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
            <td>
                <asp:Label ID="stack_no" runat="server" Width="90px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
            <td>
                <asp:Label ID="des_spp" runat="server" Width="90px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
            <td>
                <asp:Label ID="des_size" runat="server" Width="70px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
            <td>
                <asp:Label ID="no" runat="server" Width="70px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
            <td>
                <asp:Label ID="vol" runat="server" Width="70px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
            <td>
                <asp:Label ID="rate" runat="server" Width="70px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
            <td>
                <asp:Label ID="amt" runat="server" Width="70px" Height="17px" 
                    style="font-weight: 700; text-decoration: underline"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
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
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td colspan="4">
&nbsp;&nbsp;
                <asp:Label ID="Label1" runat="server"></asp:Label>
&nbsp;<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    InsertCommand="INSERT INTO release_order(challan_no, date, pur_amt, rece_vide_no, rece_date, issued_at, pay_at, rece_no, date3, work_div, m_s, auc_held_on, sanc_vide_no, date4, effe_from, lot_no, stack_no, des_spp, des_size, no, vol, rate, amt) VALUES (@challan_no, @date, @pur_amt, @rece_vide_no, @rece_date, @issued_at, @pay_at, @rece_no, @date3, @work_div, @m_s, @auc_held_on, @sanc_vide_no, @date4, @effe_from, @lot_no, @stack_no, @des_spp, @des_size, @no, @vol, @rate, @amt)" 
                    SelectCommand="SELECT * FROM [release_order] where challan_no=@challan_no">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="challan_no" Name="challan_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="date" Name="date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="pur_amt" Name="pur_amt" PropertyName="Text" />
                        <asp:ControlParameter ControlID="rece_vide_no" Name="rece_vide_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="rece_date" Name="rece_date" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="issued_at" Name="issued_at" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="payable_at" Name="pay_at" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="rece_no" Name="rece_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="date3" Name="date3" PropertyName="Text" />
                        <asp:ControlParameter ControlID="work_div" Name="work_div" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="ms" Name="m_s" PropertyName="Text" />
                        <asp:ControlParameter ControlID="auc_held_on" Name="auc_held_on" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="sanc_vide_no" Name="sanc_vide_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="date4" Name="date4" PropertyName="Text" />
                        <asp:ControlParameter ControlID="effe_from" Name="effe_from" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="lot_no" Name="lot_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="stack_no" Name="stack_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="des_spp" Name="des_spp" PropertyName="Text" />
                        <asp:ControlParameter ControlID="des_size" Name="des_size" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="no" Name="no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="vol" Name="vol" PropertyName="Text" />
                        <asp:ControlParameter ControlID="rate" Name="rate" PropertyName="Text" />
                        <asp:ControlParameter ControlID="amt" Name="amt" PropertyName="Text" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:QueryStringParameter Name="challan_no" QueryStringField="chl" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <br />
</asp:Content>

