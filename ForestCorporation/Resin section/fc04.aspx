<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc04.aspx.cs" Inherits="fc04" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            color: #000000;
        }
        .style5
        {
        }
        .style6
        {
        }
        .style7
        {
    }
        .style8
        {
            width: 622px;
            height: 160px;
        }
        .style9
        {
            color: #FFFFFF;
            font-weight: bold;
            background-color: #003399;
            height: 39px;
        }
        .style10
        {
            height: 45px;
        }
        .style11
        {
            height: 45px;
            width: 185px;
        }
        .style12
        {
        }
        .style13
        {
            height: 64px;
        }
        .style14
        {
            height: 52px;
        }
        .style15
        {
            height: 80px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">
<asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td class="style4" colspan="2" style="text-align: center">
                <table cellpadding="0" cellspacing="0" class="style8">
                    <tr>
                        <td class="style9" colspan="2">
                CREDIT NOTE (RESIN)</td>
                    </tr>
                    <tr>
                        <td class="style11">
                            Start Date</td>
                        <td class="style10">
                            <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                            <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                            </cc1:MaskedEditExtender>
                            <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
                            </cc1:CalendarExtender>
                        </td>
                    </tr>
                    <tr>
                        <td class="style14">
&nbsp;End Date</td>
                        <td class="style14">
                            <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                            <cc1:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                                Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox3">
                            </cc1:CalendarExtender>
                            <cc1:MaskedEditExtender ID="TextBox3_MaskedEditExtender" runat="server" 
                                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox3">
                            </cc1:MaskedEditExtender>
                        </td>
                    </tr>
                    <tr>
                        <td class="style15">
                            Select Div</td>
                                                <td class="style15">
                                                    <asp:DropDownList ID="DropDownList2" runat="server" AutoPostBack="True" 
                                                        DataSourceID="SqlDataSource4" DataTextField="div" DataValueField="id">
                                                    </asp:DropDownList>
                                                    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                                                        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                                        SelectCommand="SELECT * FROM [tbdiv]"></asp:SqlDataSource>
                                                </td>
                                            </tr>
                    <tr>
                        <td class="style15">
                            Select Div/Unit</td>
                                                <td class="style15">
                                                    <asp:DropDownList ID="DropDownList1" runat="server" 
                                                        DataSourceID="SqlDataSource3" DataTextField="unit" 
                                                        DataValueField="unit" 
                                                        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                                                    </asp:DropDownList>
                                                    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                                                        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                                        SelectCommand="SELECT id, div, unit FROM tbunit where div=@div">
                                                        <SelectParameters>
                                                            <asp:ControlParameter ControlID="DropDownList2" Name="div" 
                                                                PropertyName="SelectedValue" />
                                                        </SelectParameters>
                                                    </asp:SqlDataSource>
                                                </td>
                                            </tr>
                    <tr>
                        <td class="style12" colspan="2">
                            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Search" />
                        </td>
                                            </tr>
                                        </table>
                                        <br />
                                        <br />
                                        <br />
                        </td>
        </tr>
        <tr>
            <td class="style7">
                Credit not No:<asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Date<asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                    ClearTextOnInvalid="True" CultureAMPMPlaceholder="" 
                    CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                    CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox1">
                </cc1:CalendarExtender>
                        </td>
        </tr>
        <tr>
            <td class="style7">
                Name of Division:                 <asp:Label ID="Label11" runat="server" ></asp:Label>&nbsp;&nbsp;&nbsp;                 
                <asp:Label ID="Label15" runat="server" ></asp:Label>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style5" colspan="2">
                            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" onrowdatabound="GridView1_RowDataBound" 
                                style="font-size: small" DataKeyNames="preno" 
                                onrowediting="GridView1_RowEditing" onrowupdating="GridView1_RowUpdating">
                                <Columns>
                                    <asp:TemplateField HeaderText="Sr.No">
                                    <ItemTemplate>
                                    <%#r %>
                                    </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Name of unit/FWD">
                                        <ItemTemplate>
                                            <asp:Label ID="Label1" runat="server" Text='<%# Eval("ResFWD") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Name of LSM &amp; Lot No.">
                                        <ItemTemplate>
                                            <asp:Label ID="Label2" runat="server" Text='<%# Eval("name_lsm_name") %>'></asp:Label>
                                            &nbsp;&amp;
                                            <asp:Label ID="Label3" runat="server" Text='<%# Eval("name_lsm_lot") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Challan No.">
                                        <ItemTemplate>
                                            <asp:Label ID="Label4" runat="server" Text='<%# Eval("ChallanNo") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="No of tins/drums">
                                        <ItemTemplate>
                                            <asp:Label ID="Label5" runat="server" Text='<%# Eval("SType") %>'></asp:Label>
                                            :<asp:Label ID="Label6" runat="server" Text='<%# Eval("NoSType") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Gross wt. with tins/drums">
                                        <ItemTemplate>
                                            <asp:Label ID="Label7" runat="server" Text='<%# Eval("GrossWe") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Net wt. Resin recived with Sakki">
                                        <ItemTemplate>
                                            <asp:Label ID="Label8" runat="server" Text='<%# Eval("NetRWS") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Sakki wt.">
                                        <ItemTemplate>
                                            <asp:Label ID="Label9" runat="server" Text='<%# Eval("sakki_wt_fc03") %>'></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Net wt. without Sakki">
                                        <ItemTemplate>
                                            <asp:Label ID="Label12" runat="server" Text="Label"></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Rate">
                                        <ItemTemplate>
                                            <asp:Label ID="Label13" runat="server" Text='<%# Eval("rate_fc04") %>'></asp:Label>
                                        </ItemTemplate>
                                        <EditItemTemplate>
                                            <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                                        </EditItemTemplate>
                                    </asp:TemplateField>
                                    <asp:TemplateField HeaderText="Amount">
                                        <ItemTemplate>
                                            <asp:Label ID="Label14" runat="server" Text="Label"></asp:Label>
                                        </ItemTemplate>
                                    </asp:TemplateField>
                                    <asp:CommandField ShowEditButton="True" />
                                </Columns>
                            </asp:GridView>
                        </td>
                    </tr>
                    <tr>
                        <td class="style7">
                            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                
                                
                                
                                SelectCommand="SELECT preno,date,ResFWD, name_lsm_name, name_lsm_lot, ChallanNo, SType, NoSType, GrossWe, NetRWS, sakki_wt_fc03, unit_div_fc03,rate_fc04 FROM fc01 where unit_div_fc03=@unit_div_fc03 and date&gt;=@sdate and date&lt;=@edate" 
                                UpdateCommand="UPDATE fc01 SET rate_fc04 = @rate_fc04 WHERE (PreNo = @preno)">
                                <SelectParameters>
                                    <asp:ControlParameter ControlID="DropDownList1" DefaultValue="" 
                                        Name="unit_div_fc03" PropertyName="SelectedValue" />
                                    <asp:Parameter Name="sdate" />
                                    <asp:Parameter Name="edate" />
                                </SelectParameters>
                                <UpdateParameters>
                                    <asp:Parameter Name="rate_fc04" />
                                    <asp:Parameter Name="preno" />
                                </UpdateParameters>
                            </asp:SqlDataSource>
                            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                SelectCommand="SELECT * FROM [Credit] ORDER BY [Creditno]" 
                                
                                InsertCommand="INSERT INTO Credit(Creditno, Date, Notd,sdate,edate) VALUES (@Creditno, @Date, @Notd,@sdate,@edate)">
                                <InsertParameters>
                                    <asp:ControlParameter ControlID="Label10" Name="Creditno" PropertyName="Text" />
                                    <asp:Parameter Name="Date" />
                                    <asp:ControlParameter ControlID="Label11" Name="Notd" PropertyName="Text" />
                                    <asp:Parameter Name="sdate" />
                                    <asp:Parameter Name="edate" />
                                </InsertParameters>
                            </asp:SqlDataSource>
                        </td>
                        <td>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style6" colspan="2">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="style13" colspan="2">
                            NOTE:To be prepared in triplicate<br />
                First Copy:To be&nbsp; sent to the division<br />
                Second copy:To be attached with the voucher<br />
                Third Copy:For record<br />
            </td>
        </tr>
        <tr>
            <td class="style7" colspan="2">
                <asp:Button ID="Button1" runat="server" BorderColor="#003300" 
                    BorderStyle="Solid" BorderWidth="1px" onclick="Button1_Click" Text="Save" 
                    Width="94px" />
                <cc1:ConfirmButtonExtender ID="Button1_ConfirmButtonExtender" runat="server" 
                    ConfirmText="You Want To Create Credit Note" Enabled="True" 
                    TargetControlID="Button1">
                </cc1:ConfirmButtonExtender>
            </td>
        </tr>
    </table>
  
    

</asp:Content>


