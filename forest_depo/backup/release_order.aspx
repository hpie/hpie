<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="release_order.aspx.cs" Inherits="release_order" %>

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
                <asp:DropDownList ID="challan_no" runat="server" DataSourceID="SqlDataSource2" 
                    DataTextField="challan_no" DataValueField="challan_no">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [challan_no] FROM [tally_sheet] group by challan_no">
                </asp:SqlDataSource>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="challan_no" ErrorMessage="*" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                Dated
                <asp:TextBox ID="date" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="date_CalendarExtender" runat="server" Enabled="True" 
                    TargetControlID="date">
                </asp:CalendarExtender>
            </td>
        </tr>
 
    </table>
                    &nbsp;<br />
    in purchase of an ammount of Rs.
                <asp:TextBox ID="pur_amt" runat="server" AutoPostBack="True" 
        ontextchanged="pur_amt_TextChanged"></asp:TextBox>
                <asp:FilteredTextBoxExtender ID="pur_amt_FilteredTextBoxExtender" 
        runat="server" Enabled="True" FilterType="Numbers" TargetControlID="pur_amt">
    </asp:FilteredTextBoxExtender>
                &nbsp;&nbsp; (in words:&nbsp;
                <asp:Label ID="wrd" runat="server"></asp:Label>
&nbsp;) received vide Draft/CDR No.
                <asp:TextBox ID="rece_vide_no" runat="server"></asp:TextBox>

    <br />
    Dated
                <asp:TextBox ID="rece_date" runat="server"></asp:TextBox>
 
    <asp:CalendarExtender ID="rece_date_CalendarExtender" runat="server" 
        Enabled="True" TargetControlID="rece_date">
    </asp:CalendarExtender>
 
&nbsp;issued at
                <asp:TextBox ID="issued_at" runat="server"></asp:TextBox>
&nbsp;Payable at
                <asp:TextBox ID="payable_at" runat="server"></asp:TextBox>
&nbsp;and receipt No
                <asp:TextBox ID="rece_no" runat="server"></asp:TextBox>
&nbsp; 
    <br />
    Dated
    <asp:TextBox ID="date3" runat="server"></asp:TextBox>
    <asp:CalendarExtender ID="date3_CalendarExtender" runat="server" Enabled="True" 
        TargetControlID="date3">
    </asp:CalendarExtender>
&nbsp;the following Timber of Forest
   
    Working Division 
    <asp:TextBox ID="work_div" runat="server"></asp:TextBox>
&nbsp; of&nbsp;&nbsp; M/s
    <asp:TextBox ID="ms" runat="server"></asp:TextBox>
&nbsp; 
    <br />
    purchased by him/them in the open auction held on
    <asp:TextBox ID="auc_held_on" runat="server"></asp:TextBox>
&nbsp; Sanctioned vide No
    <asp:TextBox ID="sanc_vide_no" runat="server"></asp:TextBox>
&nbsp;Dated
    <asp:TextBox ID="date4" runat="server"></asp:TextBox>
    <asp:CalendarExtender ID="date4_CalendarExtender" runat="server" Enabled="True" 
        TargetControlID="date4">
    </asp:CalendarExtender>
&nbsp; 
    <br />
    effective from&nbsp;
    <asp:TextBox ID="effe_from" runat="server"></asp:TextBox>
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
                <asp:DropDownList ID="lot_no" runat="server" DataSourceID="SqlDataSource3" 
                    DataTextField="lot_no" DataValueField="lot_no">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [lot_no] FROM [tally_sheet] group by lot_no">
                </asp:SqlDataSource>
            </td>
            <td>
                <asp:DropDownList ID="stack_no" runat="server" DataSourceID="SqlDataSource4" 
                    DataTextField="stack" DataValueField="stack">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [stack] FROM [tally_sheet] group by stack">
                </asp:SqlDataSource>
            </td>
            <td>
                <asp:TextBox ID="des_spp" runat="server" Width="90px"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="des_size" runat="server" Width="70px"></asp:TextBox>
                <asp:FilteredTextBoxExtender ID="des_size_FilteredTextBoxExtender" 
                    runat="server" Enabled="True" FilterType="Numbers" TargetControlID="des_size">
                </asp:FilteredTextBoxExtender>
            </td>
            <td>
                <asp:TextBox ID="no" runat="server" Width="70px"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="vol" runat="server" Width="70px"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="rate" runat="server" Width="70px"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="amt" runat="server" Width="70px"></asp:TextBox>
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
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
&nbsp;&nbsp;
                <asp:Label ID="Label1" runat="server"></asp:Label>
&nbsp;<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    InsertCommand="INSERT INTO release_order(challan_no, date, pur_amt, rece_vide_no, rece_date, issued_at, pay_at, rece_no, date3, work_div, m_s, auc_held_on, sanc_vide_no, date4, effe_from, lot_no, stack_no, des_spp, des_size, no, vol, rate, amt) VALUES (@challan_no, @date, @pur_amt, @rece_vide_no, @rece_date, @issued_at, @pay_at, @rece_no, @date3, @work_div, @m_s, @auc_held_on, @sanc_vide_no, @date4, @effe_from, @lot_no, @stack_no, @des_spp, @des_size, @no, @vol, @rate, @amt)" 
                    SelectCommand="SELECT * FROM [release_order]">
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

