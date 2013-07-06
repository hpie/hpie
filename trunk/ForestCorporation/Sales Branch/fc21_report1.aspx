<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc21_report1.aspx.cs" Inherits="fc21" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style2
        {
            width: 1021px;
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
            width: 401px;
              border: 1px solid #000000;
        }
        .style7
        {
            width: 401px;
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
            width: 401px;
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
            width: 401px;
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
            width: 401px;
            height: 41px;
              border: 1px solid #000000;
        }
        .style19
        {
            text-align: center;
            font-size: small;
            font-weight: bold;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style2">
        <tr>
            <td  colspan="3">
                <div class="style19">
                INVOICE CUM CENTRAL EXCISE GATE PASS</div>
                <asp:ScriptManager ID="ScriptManager1" 
                    runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style14" colspan="2">
                Range
                <asp:Label ID="TextBox1" runat="server"></asp:Label>
            </td>
            <td class="style13">
                Sr.No.<asp:Label ID="TextBox2" runat="server"></asp:Label>
                &nbsp;Date<asp:Label ID="TextBox3" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style15" colspan="2">
                Division<asp:Label ID="TextBox4" runat="server"></asp:Label>
            </td>
            <td class="style16">
                Factory order no.<asp:Label ID="TextBox5" runat="server" Width="89px"></asp:Label>
                Date<asp:Label ID="TextBox6" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style15" colspan="2">
                &nbsp;</td>
            <td class="style16">
                Order ref<asp:Label ID="TextBox46" runat="server"></asp:Label>
                Date<asp:Label ID="TextBox47" runat="server"></asp:Label>
                <br />
                TIN NO. 02120100100</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Name &amp; Address of the factory<br />
                <asp:Label ID="TextBox7" runat="server" Height="72px" TextMode="MultiLine" 
                    Width="340px"></asp:Label>
                            </td>
                            <td class="style6" valign="top">
                                Date &amp; Time of removal of excisable goods from factory<asp:Label 
                                    ID="TextBox10" runat="server" Height="68px" TextMode="MultiLine" 
                                    Width="422px"></asp:Label>
                            </td>
                        </tr>
                        <tr>
                            <td class="style4">
                                Registration no:<asp:Label ID="TextBox8" runat="server"></asp:Label>
            </td>
            <td class="style4">
                PLA no:-<br /><asp:Label ID="TextBox9" runat="server"></asp:Label>
                            </td>
                            <td class="style7">
                                &nbsp;</td>
                        </tr>
                        <tr>
                            <td class="style3" colspan="2">
                                Assessee code no<asp:Label ID="TextBox11" runat="server"></asp:Label>
            </td>
            <td class="style6">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Tariff heading no<asp:Label ID="TextBox12" runat="server"></asp:Label>
            </td>
            <td class="style6">
                Exemption notification no<asp:Label ID="TextBox13" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8" colspan="2">
                Name &amp; address of consignee<asp:Label ID="TextBox14" runat="server" 
                    Height="59px" TextMode="MultiLine"></asp:Label>
            </td>
            <td class="style9">
                Name &amp; address of agent if any<br />
                <asp:Label ID="TextBox15" runat="server" Height="63px" 
                    ontextchanged="TextBox15_TextChanged" TextMode="MultiLine"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                CST NO<asp:Label ID="TextBox16" runat="server" Width="68px"></asp:Label>
                GST NO<asp:Label ID="TextBox17" runat="server"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp; 
                <br />
                Date<asp:Label ID="TextBox18" runat="server"></asp:Label>
            </td>
            <td class="style6">
                CST NO<asp:Label ID="TextBox19" runat="server" Width="61px"></asp:Label>
&nbsp;GST NO<asp:Label ID="TextBox20" runat="server"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br />
                Date<asp:Label ID="TextBox21" runat="server"></asp:Label>
                            </td>
                        </tr>
                        <tr>
                            <td class="style10" colspan="3">
                                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                                    DataSourceID="SqlDataSource1" onrowdatabound="GridView1_RowDataBound1">
                                    <Columns>
                                        <asp:TemplateField HeaderText="Sr.No">
                                        <ItemTemplate>
                                        <%#r %>
                                        </ItemTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Description &amp; Specification of Goods">
                                            <ItemTemplate>
                                                <asp:Label ID="Label1" runat="server" Text='<%# Eval("Des") %>'></asp:Label>
                                                &nbsp;&amp;
                                                <asp:Label ID="Label9" runat="server" Text='<%# Eval("S_good") %>'></asp:Label>
                                            </ItemTemplate>
                                            <FooterTemplate>
                                                <asp:Label ID="TextBox40" runat="server"></asp:Label>
                                                &nbsp;<asp:Label ID="TextBox411" runat="server"></asp:Label>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Description of Packages">
                                            <ItemTemplate>
                                                <asp:Label ID="Label2" runat="server" Text='<%# Eval("Des_p") %>'></asp:Label>
                                            </ItemTemplate>
                                            <FooterTemplate>
                                                <asp:Label ID="TextBox41" runat="server"></asp:Label>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Total Qty.(No. of goods)">
                                            <ItemTemplate>
                                                <asp:Label ID="Label3" runat="server" Text='<%# Eval("wtqtl") %>'></asp:Label>
                                            </ItemTemplate>
                                            <FooterTemplate>
                                                <asp:Label ID="TextBox42" runat="server"></asp:Label>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Rate">
                                            <ItemTemplate>
                                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("Rate") %>'></asp:Label>
                                            </ItemTemplate>
                                            <FooterTemplate>
                                                <asp:Label ID="TextBox43" runat="server"></asp:Label>
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
                                            <FooterTemplate>
                                                <asp:Label ID="TextBox44" runat="server"></asp:Label>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Assessable value Tariff value per unit">
                                            <ItemTemplate>
                                                <asp:Label ID="Label7" runat="server" Text='<%# Eval("Tariff") %>'></asp:Label>
                                            </ItemTemplate>
                                            <FooterTemplate>
                                                <asp:Label ID="TextBox45" runat="server"></asp:Label>
                                            </FooterTemplate>
                                        </asp:TemplateField>
                                        <asp:TemplateField HeaderText="Total Assessable value Tariff Value">
                                            <ItemTemplate>
                                                <asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
                                            </ItemTemplate>
                                        </asp:TemplateField>
                                    </Columns>
                                </asp:GridView>
                                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                                    SelectCommand="SELECT * FROM [c21] where srno=@sr and des is not null" 
                                    
                                    InsertCommand="INSERT INTO c21(Des, S_good, Des_p, Qty, Rate, Detail, Tariff, Srno) VALUES (@Des, @S_good, @Des_p, @Qty, @Rate, @Detail, @Tariff, @Srno)">
                                    <SelectParameters>
                                        <asp:QueryStringParameter Name="sr" QueryStringField="sr" />
                                    </SelectParameters>
                                    <InsertParameters>
                                        <asp:Parameter Name="Des" />
                                        <asp:Parameter Name="S_good" />
                                        <asp:Parameter Name="Des_p" />
                                        <asp:Parameter Name="Qty" />
                                        <asp:Parameter Name="Rate" />
                                        <asp:Parameter Name="Detail" />
                                        <asp:Parameter Name="Tariff" />
                                        <asp:Parameter Name="Srno" />
                                    </InsertParameters>
                                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    InsertCommand="INSERT INTO fc21(Range, Division, Sr, Sdate, F_o_no, Fdate, Order_ref, Odate, Name, Date_time, Regno, Plano, Ass_code, Tariff, Exemption, Name_con, Name_agent, c_cst, c_gst, c_date, g_cst, g_gst, g_date, Rate_o_duty, ecc_no, s_no, in_rga, in_rgc, d_t, mode, reg, gr, date) VALUES (@Range, @Division, @Sr, @Sdate, @F_o_no, @Fdate, @Order_ref, @Odate, @Name, @Date_time, @Regno, @Plano, @Ass_code, @Tariff, @Exemption, @Name_con, @Name_agent, @c_cst, @c_gst, @c_date, @g_cst, @g_gst, @g_date, @Rate_o_duty, @ecc_no, @s_no, @in_rga, @in_rgc, @d_t, @mode, @reg, @gr, @date)" 
                    SelectCommand="SELECT * FROM [fc21] where sr=@sr" 
                    
                    
                                    UpdateCommand="UPDATE fc21 SET Range =@Range, Division =@Division,Sdate =@Sdate, F_o_no =@F_o_no, Fdate =@Fdate, Order_ref =@Order_ref, Odate =@Odate, Name =@Name, Date_time =@Date_time, Regno =@Regno, Plano =@Plano, Ass_code =@Ass_code, Tariff =@Tariff, Exemption =@Exemption, Name_con =@Name_con, Name_agent =@Name_agent, c_cst =@c_cst , c_gst =@c_gst, c_date =@c_date, g_cst =@g_cst, g_gst =@g_gst, g_date =@g_date, Rate_o_duty =@Rate_o_duty, ecc_no =@ecc_no, s_no =@s_no, in_rga =@in_rga, in_rgc =@in_rgc , d_t =@d_t, mode =@mode, reg = @reg, gr =@gr, date =@date where sr=@sr">
                    <SelectParameters>
                        <asp:QueryStringParameter Name="sr" QueryStringField="sr" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="Range" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Division" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="Sr" PropertyName="Text" />
                        <asp:Parameter Name="Sdate" />
                        <asp:ControlParameter ControlID="TextBox4" Name="F_o_no" PropertyName="Text" />
                        <asp:Parameter Name="Fdate" />
                        <asp:ControlParameter ControlID="TextBox46" Name="Order_ref" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Odate" />
                        <asp:ControlParameter ControlID="TextBox7" Name="Name" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="Date_time" 
                            PropertyName="Text" />
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
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="Range" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Division" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="Sr" PropertyName="Text" />
                        <asp:Parameter Name="Sdate" />
                        <asp:ControlParameter ControlID="TextBox4" Name="F_o_no" PropertyName="Text" />
                        <asp:Parameter Name="Fdate" />
                        <asp:ControlParameter ControlID="TextBox46" Name="Order_ref" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Odate" />
                        <asp:ControlParameter ControlID="TextBox7" Name="Name" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox10" Name="Date_time" 
                            PropertyName="Text" />
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
                    </InsertParameters>
                </asp:SqlDataSource>
                            </td>
                        </tr>
                        <tr>
                            <td class="style3" colspan="2">
                                Rate of Duty:BED                Rate of Duty:BED<asp:Label ID="TextBox22" runat="server"></asp:Label>
            </td>
            <td class="style6">
                Duty Paid BED
                <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
                            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                Higher Eud. Cess
                <asp:Label ID="Label17" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                Edu. Cess
                <asp:Label ID="Label18" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                ECC No.<asp:Label ID="TextBox24" runat="server"></asp:Label>
            </td>
            <td class="style6">
                Total Duty
                <asp:Label ID="Label19" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Total duty paid in word:<asp:Label ID="TextBox26" runat="server"></asp:Label>
            </td>
            <td class="style6">
                SUB TOTAL
                <asp:Label ID="Label20" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Invoice value in Words:Rupees:<asp:Label ID="TextBox28" runat="server"></asp:Label>
            </td>
            <td class="style6">
                VAT/CST(<asp:Label ID="Label24" runat="server" Text="Label"></asp:Label>
                )
                <asp:Label ID="Label21" runat="server" Text="Label"></asp:Label>
                &nbsp;</td>
        </tr>
        <asp:Panel ID="Panel1" runat="server">
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                TSC(1%)-<asp:Label ID="Label25" runat="server" Text="Label"></asp:Label>
                
               
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                S/Charge-<asp:Label ID="Label26" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                CESS(2%)-<asp:Label ID="Label27" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                CESS(1%)-<asp:Label ID="Label28" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                TOTAL AMOUNT-<asp:Label ID="Label29" runat="server" style="font-weight: 700" 
                    Text="Label"></asp:Label>
            </td>
        </tr>
         </asp:Panel>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                GRAND Total
                <asp:Label ID="Label23" runat="server" Text="Label"></asp:Label>
                            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Serial No. and date of entry in PLA<asp:Label ID="TextBox30" runat="server"></asp:Label>
            </td>
            <td class="style6">
                in RG-23 A part II:&nbsp;<asp:Label ID="TextBox31" runat="server" 
                     Width="74px"></asp:Label>
                in RG-23 C part II<asp:Label ID="TextBox34" runat="server" Width="67px"></asp:Label>
                </td>
        </tr>
        <tr>
            <td class="style3" colspan="3">
                date &amp; time of preparation of Invoiceation of Invoice<asp:Label 
                    ID="TextBox35" runat="server" Width="684px"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                Mode of Transport<asp:Label ID="TextBox36" runat="server"></asp:Label>
            </td>
            <td class="style6">
                Registration No.<asp:Label ID="TextBox37" runat="server" Width="64px"></asp:Label>
&nbsp;GR No.<asp:Label ID="TextBox38" runat="server" Width="82px"></asp:Label>
&nbsp;Date<asp:Label ID="TextBox39" runat="server" Width="90px"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3" colspan="2">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
        </tr>
        </table>
</asp:Content>

