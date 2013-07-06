<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc21.aspx.cs" Inherits="fc21" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style2
        {
            width: 1047px;
            border: 1px solid #000000;
            font-size: xx-small;
        }
        .style3
        {
        	  border: 1px solid #000000;
        }
        .style4
        {
            width: 94px;
            height: 53px;
              border: 1px solid #000000;
        }
        .style6
        {
            width: 436px;
            border: 1px solid #000000;
        }
        .style7
        {
            width: 436px;
            height: 53px;
              border: 1px solid #000000;
        }
        .style8
        {
            width: 327px;
            height: 65px;
              border: 1px solid #000000;
        }
        .style9
        {
            width: 436px;
            height: 65px;
              border: 1px solid #000000;
        }
        .style10
        {
            height: 37px;
              border: 1px solid #000000;
        }
        .style13
        {
            width: 436px;
            height: 43px;
              border: 1px solid #000000;
        }
        .style14
        {
            height: 43px;
              border: 1px solid #000000;
        }
        .style15
        {
            height: 41px;
              border: 1px solid #000000;
        }
        .style16
        {
            width: 436px;
            height: 41px;
            border: 1px solid #000000;
        }
        .style17
        {
            border: 1px solid #000000;
            height: 121px;
        }
        .style18
        {
            width: 436px;
            border: 1px solid #000000;
            height: 121px;
        }
        .style19
        {
            text-align: center;
            font-size: small;
            font-weight: bold;
        }
        .style20
        {
            width: 300px;
            border: 1px solid #000000;
        }
        .style21
        {
        }
        .style23
        {
            background-color: #3366CC;
        }
        .style24
        {
            width: 49px;
            height: 53px;
            border: 1px solid #000000;
        }
        .style25
        {
            width: 62px;
            border: 1px solid #000000;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style2">
        <tr>
            <td  colspan="4">
                <div class="style19">
                    <table cellpadding="0" cellspacing="0" class="style20">
                        <tr>
                            <td class="style23" colspan="2">
                                Update/Print</td>
                                        </tr>
                                        <tr>
                                            <td class="style21">
                                                Select Sr.No.</td>
                                            <td>
                                                <asp:DropDownList ID="DropDownList1" runat="server" 
                                                    DataSourceID="SqlDataSource3" DataTextField="Sr" DataValueField="Sr">
                                                </asp:DropDownList>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="style21" colspan="2">
                                                <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">Update</asp:LinkButton>
                                            &nbsp;&nbsp;&nbsp;
                                                <asp:LinkButton ID="LinkButton5" runat="server" onclick="LinkButton5_Click">Print</asp:LinkButton>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
                INVOICE CUM CENTRAL EXCISE GATE PASS</div>
                <asp:ScriptManager ID="ScriptManager1" 
                    runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style14" colspan="2">
                Range
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            &nbsp;<asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc21]"></asp:SqlDataSource>
            </td>
            <td class="style13" colspan="2">
                Sr.No.<asp:Label ID="TextBox2" runat="server"></asp:Label>
                &nbsp;Date<asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox3_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox3">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox3">
                </cc1:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox3" ErrorMessage="Enter Date" ValidationGroup="a">*</asp:RequiredFieldValidator>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO c21(Des, Qty,Rate,Srno,fc_ord,wtqtl) VALUES (@Des, @Qty,@Rate,@Srno,@fc_ord,@wtqtl)" 
                    SelectCommand="SELECT * FROM [c21]" 
                    DeleteCommand="DELETE FROM c21 WHERE (srno = @id)">
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="TextBox2" Name="id" PropertyName="Text" />
                    </DeleteParameters>
                    <InsertParameters>
                        <asp:Parameter Name="Des" />
                        <asp:Parameter Name="Qty" />
                        <asp:Parameter Name="Rate" />
                        <asp:ControlParameter ControlID="TextBox2" Name="Srno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" Name="fc_ord" PropertyName="Text" />
                        <asp:Parameter Name="wtqtl" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style15" colspan="2">
                Division<asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
            <td class="style16" colspan="2">
                Factory order no.<asp:TextBox ID="TextBox5" runat="server" Width="89px" 
                    ontextchanged="TextBox5_TextChanged" Visible="False"></asp:TextBox>
                &nbsp;<asp:DropDownList ID="DropDownList3" runat="server" 
                    DataSourceID="SqlDataSource5" DataTextField="fac_ord_no" 
                    DataValueField="fac_ord_no">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT fac_ord_no  FROM [fc13] group by fac_ord_no ">
                </asp:SqlDataSource>
                <asp:LinkButton ID="LinkButton4" runat="server" 
                    onclick="LinkButton4_Click" ValidationGroup="b">click</asp:LinkButton>
                Date<asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox6_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox6">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox6_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox6">
                </cc1:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="TextBox6" ErrorMessage="Enter Date" ValidationGroup="a">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style15" colspan="2">
                &nbsp;</td>
            <td class="style16" colspan="2">
                Order ref<asp:TextBox ID="TextBox46" runat="server"></asp:TextBox>
                Date<asp:TextBox ID="TextBox47" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox47_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox47">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox47_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox47">
                </cc1:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ControlToValidate="TextBox47" ErrorMessage="Enter Date" 
                    ValidationGroup="a">*</asp:RequiredFieldValidator>
                <br />
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Name &amp; Address of the factory<br />
                <asp:TextBox ID="TextBox7" runat="server" Height="72px" TextMode="MultiLine" 
                    Width="340px"></asp:TextBox>
                            </td>
                            <td class="style6" valign="top" colspan="2">
                                Date &amp; Time of removal of excisable goods from factory<asp:TextBox 
                                    ID="TextBox10" runat="server" Height="68px" TextMode="MultiLine" 
                                    Width="422px"></asp:TextBox>
                            </td>
                        </tr>
                        <tr>
                            <td class="style4">
                                Registration no:<asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
            </td>
            <td class="style24">
                PLA no:-<br /><asp:TextBox ID="TextBox9" runat="server"></asp:TextBox>
                            </td>
                            <td class="style7" colspan="2">
                                &nbsp;</td>
                        </tr>
                        <tr>
                            <td class="style3" colspan="2">
                                Assessee code no<asp:TextBox ID="TextBox11" runat="server"></asp:TextBox>
            </td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Tariff heading no<asp:TextBox ID="TextBox12" runat="server"></asp:TextBox>
            </td>
            <td class="style6" colspan="2">
                Exemption notification no<asp:TextBox ID="TextBox13" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style8" colspan="2">
                Name &amp; address of consignee<asp:TextBox ID="TextBox14" runat="server" 
                    Height="59px" TextMode="MultiLine"></asp:TextBox>
            </td>
            <td class="style9" colspan="2">
                Name &amp; address of agent if any<br />
                <asp:TextBox ID="TextBox15" runat="server" Height="63px" 
                    ontextchanged="TextBox15_TextChanged" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                CST NO<asp:TextBox ID="TextBox16" runat="server" Width="68px"></asp:TextBox>
                GST NO<asp:TextBox ID="TextBox17" runat="server"></asp:TextBox>
&nbsp;&nbsp;&nbsp;&nbsp; 
                <br />
                Date<asp:TextBox ID="TextBox18" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox18_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox18">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox18_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox18">
                </cc1:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                    ControlToValidate="TextBox18" ErrorMessage="Enter Date" 
                    ValidationGroup="a">*</asp:RequiredFieldValidator>
            </td>
            <td class="style6" colspan="2">
                CST NO<asp:TextBox ID="TextBox19" runat="server" Width="61px"></asp:TextBox>
&nbsp;GST NO<asp:TextBox ID="TextBox20" runat="server"></asp:TextBox>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br />
                Date<asp:TextBox ID="TextBox21" runat="server"></asp:TextBox>
                            <cc1:MaskedEditExtender ID="TextBox21_MaskedEditExtender" 
                    runat="server" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox21">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox21_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox21">
                </cc1:CalendarExtender>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator5" 
                    runat="server" ControlToValidate="TextBox21" ErrorMessage="Enter Date" 
                    ValidationGroup="a">*</asp:RequiredFieldValidator>
                            </td>
                        </tr>
                        <tr>
                            <td class="style10" colspan="4">
                                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                                    DataSourceID="SqlDataSource1" onrowdatabound="GridView1_RowDataBound" 
                                    ShowFooter="True" onrowcommand="GridView1_RowCommand" DataKeyNames="id" 
                                    onrowdeleting="GridView1_RowDeleting" onrowupdating="GridView1_RowUpdating">
                                    <Columns>
                                        <asp:TemplateField HeaderText="Sr.No">
                                        <ItemTemplate>
                                        <%#r %>
                                        </ItemTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Description &amp; Specification of Goods">
                                            <ItemTemplate>
                                                <asp:Label ID="Label1" runat="server" Text='<%# Eval("Des") %>'></asp:Label>
                                                &nbsp;&nbsp;
                                                <asp:Label ID="Label9" runat="server" Text='<%# Eval("S_good") %>'></asp:Label>
                                            </ItemTemplate>
                                         <%--   <EditItemTemplate>
                                                <asp:DropDownList ID="DropDownList2" runat="server" 
                                                    DataSourceID="SqlDataSource1" DataTextField="name" DataValueField="name" 
                                                    SelectedValue='<%# Eval("Des") %>'>
                                                </asp:DropDownList>
                                                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                                    SelectCommand="SELECT * FROM [catgory]"></asp:SqlDataSource>
                                                <br />
                                                <asp:TextBox ID="TextBox413" runat="server" Text='<%# Eval("s_good") %>'></asp:TextBox>
                                            </EditItemTemplate>--%>
                                            <FooterTemplate>
                                                <asp:DropDownList ID="TextBox40" runat="server" DataSourceID="SqlDataSource1" 
                                                    DataTextField="name" DataValueField="name">
                                                </asp:DropDownList>
                                                <asp:TextBox ID="TextBox411" runat="server" Visible="False"></asp:TextBox>
                                                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                                    SelectCommand="SELECT * FROM [catgory]"></asp:SqlDataSource>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Description of Packages">
                                            <ItemTemplate>
                                                <asp:Label ID="Label2" runat="server" Text='<%# Eval("Des_p") %>'></asp:Label>
                                            </ItemTemplate>
                                          <%--  <EditItemTemplate>
                                                <asp:TextBox ID="TextBox414" runat="server" Text='<%# Eval("Des_p") %>'></asp:TextBox>
                                            </EditItemTemplate>--%>
                                            <FooterTemplate>
                                                <asp:TextBox ID="TextBox41" runat="server"></asp:TextBox>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Total Qty.(No. of goods)">
                                            <ItemTemplate>
                                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("wtqtl") %>'></asp:Label>
                                            </ItemTemplate>
                                            <EditItemTemplate>
                                                <asp:TextBox ID="TextBox415" runat="server" Text='<%# Eval("wtqtl") %>'></asp:TextBox>
                                            </EditItemTemplate>
                                            <FooterTemplate>
                                                <asp:TextBox ID="TextBox42" runat="server"></asp:TextBox>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Rate">
                                            <ItemTemplate>
                                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("Rate") %>'></asp:Label>
                                            </ItemTemplate>
                                           <%-- <EditItemTemplate>
                                                <asp:TextBox ID="TextBox416" runat="server" Text='<%# Eval("rate") %>'></asp:TextBox>
                                            </EditItemTemplate>--%>
                                            <FooterTemplate>
                                                <asp:TextBox ID="TextBox43" runat="server"></asp:TextBox>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Total Price of the Goods">
                                            <ItemTemplate>
                                                <asp:Label ID="Label5" runat="server"></asp:Label>
                                            </ItemTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Details of(-+) made to arrive at value U-S4 of the C.E &amp; S. Act 1994">
                                            <ItemTemplate>
                                                <asp:Label ID="Label6" runat="server" Text='<%# Eval("Detail") %>'></asp:Label>
                                            </ItemTemplate>
                                          <%--  <EditItemTemplate>
                                                <asp:TextBox ID="TextBox417" runat="server" Text='<%# Eval("detail") %>'></asp:TextBox>
                                            </EditItemTemplate>--%>
                                            <FooterTemplate>
                                                <asp:TextBox ID="TextBox44" runat="server"></asp:TextBox>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Assessable value Tariff value per unit">
                                            <ItemTemplate>
                                                <asp:Label ID="Label7" runat="server" Text='<%# Eval("Tariff") %>'></asp:Label>
                                            </ItemTemplate>
                                        <%--    <EditItemTemplate>
                                                <asp:TextBox ID="TextBox418" runat="server" Text='<%# Eval("tariff") %>'></asp:TextBox>
                                            </EditItemTemplate>--%>
                                            <FooterTemplate>
                                                <asp:TextBox ID="TextBox45" runat="server"></asp:TextBox>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Total Assessable value Tariff Value">
                                            <ItemTemplate>
                                                <asp:Label ID="Label8" runat="server" Text=""></asp:Label>
                                            </ItemTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField ShowHeader="False">
                                            <EditItemTemplate>
                                                <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="True" 
                                                    CommandName="Update" Text="Update"></asp:LinkButton>
                                                &nbsp;<asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="False" 
                                                    CommandName="Cancel" Text="Cancel"></asp:LinkButton>
                                            </EditItemTemplate>
                                            <FooterTemplate>
                                                <asp:Button ID="Button2" runat="server" CommandName="Add" Text="Add" />
                                            </FooterTemplate>
                                            <ItemTemplate>
                                                <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="False" 
                                                    CommandName="Edit" Text="Edit"></asp:LinkButton>
                                            </ItemTemplate>
                                        </asp:TemplateField>
                                        <asp:CommandField ShowDeleteButton="True" />
                                    </Columns>
                                </asp:GridView>
                                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                    SelectCommand="SELECT * FROM [c21] where srno=@srno or des='ss'" 
                                    
                                    InsertCommand="INSERT INTO c21(Des, S_good, Des_p, wtqtl, Rate, Detail, Tariff, Srno) VALUES (@Des, @S_good, @Des_p, @wtqtl, @Rate, @Detail, @Tariff, @Srno)" 
                                    DeleteCommand="DELETE FROM c21 WHERE (id = @id)" 
                                    
                                    
                                    
                                    
                                    UpdateCommand="UPDATE c21 SET wtqtl =@wtqtl where id=@id">
                                    <SelectParameters>
                                        <asp:ControlParameter ControlID="TextBox2" Name="srno" PropertyName="Text" />
                                    </SelectParameters>
                                    <DeleteParameters>
                                        <asp:Parameter Name="id" />
                                    </DeleteParameters>
                                    <UpdateParameters>
                                        <asp:Parameter Name="id" />
                                        <asp:Parameter Name="wtqtl" />
                                    </UpdateParameters>
                                    <InsertParameters>
                                        <asp:Parameter Name="Des" />
                                        <asp:Parameter Name="S_good" />
                                        <asp:Parameter Name="Des_p" />
                                        <asp:Parameter Name="Rate" />
                                        <asp:Parameter Name="Detail" />
                                        <asp:Parameter Name="Tariff" />
                                        <asp:Parameter Name="Srno" />
                                        <asp:Parameter Name="wtqtl" />
                                    </InsertParameters>
                                </asp:SqlDataSource>
                            </td>
                        </tr>
                        <tr>
                            <td class="style3" colspan="2">
                                Rate of Duty:BED                Rate of Duty:BED<asp:TextBox ID="TextBox22" runat="server">12</asp:TextBox>
            </td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                ECC No.<asp:TextBox ID="TextBox24" runat="server"></asp:TextBox>
            </td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Serial No. and date of entry in PLA<asp:TextBox ID="TextBox30" runat="server" 
                    Width="242px"></asp:TextBox>
            </td>
            <td class="style6" colspan="2">
                in RG-23 A part II&nbsp;<asp:TextBox ID="TextBox31" runat="server" 
                    Height="22px" Width="74px"></asp:TextBox>
                in RG-23 C part II<asp:TextBox ID="TextBox34" runat="server" Width="67px"></asp:TextBox>
                </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style25">
                <asp:RadioButtonList ID="RadioButtonList1" runat="server" 
                    RepeatDirection="Horizontal">
                    <asp:ListItem Selected="True">VAT</asp:ListItem>
                    <asp:ListItem>CST</asp:ListItem>
                </asp:RadioButtonList>
&nbsp;&nbsp;&nbsp;
                </td>
            <td class="style6">
                <asp:TextBox ID="vat" runat="server" Width="25px">2</asp:TextBox>
                </td>
        </tr>
        <tr>
            <td class="style3" colspan="4">
                date &amp; time of preparation of Invoiceation of Invoice<asp:TextBox 
                    ID="TextBox35" runat="server" Width="684px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Mode of Transport<asp:TextBox ID="TextBox36" runat="server"></asp:TextBox>
            </td>
            <td class="style6" colspan="2">
                Registration No.<asp:TextBox ID="TextBox37" runat="server" Width="64px"></asp:TextBox>
&nbsp;GR No.<asp:TextBox ID="TextBox38" runat="server" Width="82px"></asp:TextBox>
&nbsp;Date<asp:TextBox ID="TextBox39" runat="server" Width="90px"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox39_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox39">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox39_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox39">
                </cc1:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                    ControlToValidate="TextBox39" ErrorMessage="Enter Date" 
                    ValidationGroup="a">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6" colspan="2">
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" 
                    Width="80px" ValidationGroup="a" />
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                </td>
            <td class="style6" colspan="2">
                </td>
        </tr>
        <tr>
            <td class="style17" colspan="2">
                </td>
            <td class="style18" colspan="2">
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO fc21(Range, Division, Sr, Sdate, F_o_no, Fdate, Order_ref, Odate, Name, Date_time, Regno, Plano, Ass_code, Tariff, Exemption, Name_con, Name_agent, c_cst, c_gst, c_date, g_cst, g_gst, g_date, Rate_o_duty, ecc_no, s_no, in_rga, in_rgc, d_t, mode, reg, gr, date,tax,cst) VALUES (@Range, @Division, @Sr, @Sdate, @F_o_no, @Fdate, @Order_ref, @Odate, @Name, @Date_time, @Regno, @Plano, @Ass_code, @Tariff, @Exemption, @Name_con, @Name_agent, @c_cst, @c_gst, @c_date, @g_cst, @g_gst, @g_date, @Rate_o_duty, @ecc_no, @s_no, @in_rga, @in_rgc, @d_t, @mode, @reg, @gr, @date,@vat,@cst)" 
                    SelectCommand="SELECT * FROM [fc21] order by sr">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="Range" PropertyName="Text" 
                            Type="String" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Division" 
                            PropertyName="Text" Type="String" />
                        <asp:ControlParameter ControlID="TextBox2" Name="Sr" PropertyName="Text" 
                            Type="Int32" />
                        <asp:Parameter Name="Sdate" />
                        <asp:ControlParameter ControlID="TextBox5" Name="F_o_no" PropertyName="Text" />
                        <asp:Parameter Name="Fdate" />
                        <asp:ControlParameter ControlID="TextBox46" Name="Order_ref" 
                            PropertyName="Text" Type="String" />
                        <asp:Parameter Name="Odate" />
                        <asp:ControlParameter ControlID="TextBox7" Name="Name" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="Date_time" 
                            PropertyName="Text" Type="String" />
                        <asp:ControlParameter ControlID="TextBox8" Name="Regno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="Plano" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox11" Name="Ass_code" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox12" Name="Tariff" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox13" Name="Exemption" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox14" Name="Name_con" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox15" Name="Name_agent" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox16" Name="c_cst" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox17" Name="c_gst" PropertyName="Text" />
                        <asp:Parameter Name="c_date" />
                        <asp:ControlParameter ControlID="TextBox19" Name="g_cst" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="g_gst" PropertyName="Text" />
                        <asp:Parameter Name="g_date" />
                        <asp:ControlParameter ControlID="TextBox22" Name="Rate_o_duty" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox24" Name="ecc_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox30" Name="s_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox31" Name="in_rga" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox34" Name="in_rgc" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox35" Name="d_t" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox36" Name="mode" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox37" Name="reg" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox38" Name="gr" PropertyName="Text" />
                        <asp:Parameter Name="date" />
                        <asp:Parameter DefaultValue="0" Name="vat" />
                        <asp:Parameter DefaultValue="0" Name="cst" />
                    </InsertParameters>
                </asp:SqlDataSource>
                </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6" colspan="2">
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

