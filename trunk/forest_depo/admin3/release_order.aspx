<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="release_order.aspx.cs" Inherits="release_order" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 78%;
        }
        .style2
        {
            width: 813px;
        }
        .style3
        {
            width: 685px;
        }
        .style4
        {
            height: 129px;
        }
        .style5
        {
            width: 207px;
        }
        .style6
        {
            width: 165px;
        }
        .style7
        {
            width: 100px;
        }
        .style9
        {
            width: 76px;
        }
        .style10
        {
            width: 93px;
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
                select Purchaser Name: &nbsp;
                <asp:DropDownList ID="name_purchaser" runat="server" DataSourceID="SqlDataSource2" 
                    DataTextField="name_purchaser" DataValueField="name_purchaser">
                </asp:DropDownList>
                <br />
                <br />
                Select Auction Date :
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource_auc" DataTextField="auction_date" 
                    DataValueField="auction_date" DataTextFormatString="{0:MM/dd/yy}">
                </asp:DropDownList>
                <br />
                <br />
                <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Search</asp:LinkButton>
                &nbsp;
                <br />
                <br />
                <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click" 
                    CausesValidation="False">Report</asp:LinkButton>
                <br />
                <br />
                <asp:Label ID="statu" runat="server" ForeColor="#CC3300"></asp:Label>
                <asp:SqlDataSource ID="SqlDataSource_auc" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [auction_date] FROM [tally_sheet] group by auction_date">
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    SelectCommand="SELECT [name_purchaser] FROM [tally_sheet] group by name_purchaser">
                </asp:SqlDataSource>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
               
            </td>
            <td>
                &nbsp;</td>
        </tr>
 
    </table>
                    &nbsp;<br />
    <table class="style3" style="text-align: left">
        <tr>
            <td class="style4">
                No:</td>
            <td class="style4">
                <asp:Label ID="no" runat="server"></asp:Label>
            </td>
            <td class="style4">
                Dated</td>
            <td class="style4">
                <asp:TextBox ID="date" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="date_CalendarExtender" runat="server" Enabled="True" 
                    TargetControlID="date">
                </asp:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td>
                Ammount</td>
            <td>
                <asp:Label ID="ammount" runat="server"></asp:Label>
                </td>
            <td>
                Payment Type and No:</td>
            <td>
                <asp:Label ID="payment_type" runat="server"></asp:Label>
&nbsp;and&nbsp;<asp:Label ID="payment_no" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                Dated</td>
            <td style="margin-left: 40px">
                <asp:Label ID="date_2" runat="server"></asp:Label>
            </td>
            <td>
                Issued at</td>
            <td>
                <asp:TextBox ID="issued_at" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td>
                Payable At</td>
            <td>
                <asp:Label ID="payable_at" runat="server"></asp:Label>
            </td>
            <td>
                Receipt No</td>
            <td>
                <asp:Label ID="rec_no" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                Date</td>
            <td>
                <asp:TextBox ID="date3" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="date3_CalendarExtender" runat="server" Enabled="True" 
                    TargetControlID="date3">
                </asp:CalendarExtender>
            </td>
            <td>
                Forest Working Division</td>
            <td>
                <asp:DropDownList ID="forest_division" runat="server" 
                    DataSourceID="SqlDataSource_div" DataTextField="division" 
                    DataValueField="division">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource_div" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    SelectCommand="SELECT division FROM [tally_sheet] where auction_date=@auction_date and name_purchaser =@purchaser group by division">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="name_purchaser" Name="purchaser" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                M/S</td>
            <td>
                <asp:Label ID="ms" runat="server"></asp:Label>
            </td>
            <td>
                Auction Held On</td>
            <td>
                <asp:Label ID="auc_held_on" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                Sanctioned Vide No</td>
            <td>
                <asp:TextBox ID="vide_no" runat="server"></asp:TextBox>
            </td>
            <td>
                Date</td>
            <td>
                <asp:TextBox ID="date4" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="date4_CalendarExtender" runat="server" Enabled="True" 
                    TargetControlID="date4">
                </asp:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td>
                Effective From</td>
            <td>
                <asp:TextBox ID="eff_from" runat="server"></asp:TextBox>
            </td>
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
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        </table>
    <br />

    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
    <ContentTemplate>
    
   
<asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        Width="876px" ShowFooter="True" onrowcommand="GridView1_RowCommand" 
            onrowdatabound="GridView1_RowDataBound">
        <Columns>
            <asp:TemplateField HeaderText="Lot No.">
                <FooterTemplate>
                    <asp:DropDownList ID="lot_no" runat="server" 
                        DataSourceID="SqlDataSource_lot" DataTextField="hsd_lot_no" DataValueField="hsd_lot_no">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource_lot" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT [hsd_lot_no] FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date)) group by hsd_lot_no">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="name_purchaser" Name="name_purchaser" 
                                PropertyName="SelectedValue" Type="String" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                                PropertyName="SelectedValue" Type="DateTime" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="lot_no" runat="server" Text='<%# Eval("hsd_lot_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Stack No.">


             <FooterTemplate>
                    <asp:DropDownList ID="stack_no" runat="server" 
                        DataSourceID="SqlDataSource_stack" DataTextField="stack" DataValueField="stack">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource_stack" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT [stack] FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date)) group by stack">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="name_purchaser" Name="name_purchaser" 
                                PropertyName="SelectedValue" Type="String" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                                PropertyName="SelectedValue" Type="DateTime" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </FooterTemplate>


                <ItemTemplate>
                    <asp:Label ID="stack_no" runat="server" Text='<%# Eval("stack_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Description of Produce(Spps., Size)">
                <ItemTemplate>
                    <asp:Label ID="spec" runat="server" Text='<%# Eval("des_spp") %>'></asp:Label> and
                    <asp:Label ID="size_type" runat="server" Text='<%# Eval("des_size") %>'></asp:Label>
                </ItemTemplate>


                             <FooterTemplate>
                    <asp:DropDownList ID="spec" runat="server" 
                        DataSourceID="SqlDataSource_spec" DataTextField="spec" DataValueField="spec">
                    </asp:DropDownList>
                                 &nbsp;and<asp:SqlDataSource ID="SqlDataSource_spec" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        
                                     SelectCommand="SELECT [spec] FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date) and(rel is null)) group by spec">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="name_purchaser" Name="name_purchaser" 
                                PropertyName="SelectedValue" Type="String" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                                PropertyName="SelectedValue" Type="DateTime" />
                        </SelectParameters>
                        </asp:SqlDataSource>

                                       <asp:DropDownList ID="size_type" runat="server" 
                        DataSourceID="SqlDataSource_size_type" DataTextField="size_type" 
                                     DataValueField="size_type" AutoPostBack="True" 
                                     onselectedindexchanged="size_type_SelectedIndexChanged">
                    </asp:DropDownList>
                                 &nbsp;<asp:LinkButton ID="LinkButton5" runat="server" onclick="LinkButton5_Click">Search</asp:LinkButton>
                    <asp:SqlDataSource ID="SqlDataSource_size_type" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        
                                     
                                     SelectCommand="SELECT size_type, sum(as_per_no) as as_per_no, sum(as_per_vol) as as_per_no FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date) and(rel is null)) group by size_type">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="name_purchaser" Name="name_purchaser" 
                                PropertyName="SelectedValue" Type="String" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                                PropertyName="SelectedValue" Type="DateTime" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </FooterTemplate>


            </asp:TemplateField>
            <asp:TemplateField HeaderText="No.">
                <ItemTemplate>
                    <asp:Label ID="no" runat="server" Text='<%# Eval("no") %>'></asp:Label>
                </ItemTemplate>

                         <FooterTemplate>
                    <asp:SqlDataSource ID="SqlDataSource_no" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        
                                 SelectCommand="SELECT size_type, sum(as_per_no) as as_per_no FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date)) group by size_type">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="name_purchaser" Name="name_purchaser" 
                                PropertyName="SelectedValue" Type="String" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                                PropertyName="SelectedValue" Type="DateTime" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                             <asp:TextBox ID="no" runat="server" Width="40px" AutoPostBack="True" 
                                 ontextchanged="no_TextChanged"></asp:TextBox>
                             <br />Available:<asp:Label ID="no_t" runat="server"></asp:Label>
                </FooterTemplate>

            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vol">
                <ItemTemplate>
                    <asp:Label ID="vol" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                </ItemTemplate>

                <FooterTemplate>
                    <asp:Label ID="vol" runat="server"></asp:Label>
                  <%--  <br />Available:<asp:Label ID="vol_t" runat="server" Text='<%#vol_t %>'></asp:Label>--%>

                    <asp:SqlDataSource ID="SqlDataSource_vol" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        
                        SelectCommand="SELECT size_type, sum(as_per_vol) as as_per_vol FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date)) group by size_type">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="name_purchaser" Name="name_purchaser" 
                                PropertyName="SelectedValue" Type="String" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                                PropertyName="SelectedValue" Type="DateTime" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </FooterTemplate>


            </asp:TemplateField>
            <asp:TemplateField HeaderText="Floor Rate">
                <ItemTemplate>
                    <asp:Label ID="floor_rate" runat="server" Text='<%# Eval("floor_rate") %>'></asp:Label>
                </ItemTemplate>
                <FooterTemplate>
                <asp:Label ID="floor_rate" runat="server" Text='<%# Eval("floor_rate") %>'></asp:Label>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Rate">
                <FooterTemplate>
                    <asp:Label ID="rate" runat="server"></asp:Label>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="rate" runat="server" Text='<%# Eval("rate") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Ammount" >
                <ItemTemplate>
                    <asp:Label ID="amt" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                </ItemTemplate>
                 <FooterTemplate>
                
                     <asp:Label ID="tot" runat="server" ></asp:Label>                
                </FooterTemplate>

            </asp:TemplateField>
            <asp:TemplateField>
                <FooterTemplate>
                    <asp:LinkButton ID="LinkButton4" runat="server" CommandName="add" 
                        ValidationGroup="a">Add</asp:LinkButton>
                </FooterTemplate>
            </asp:TemplateField>
        </Columns>
    </asp:GridView>

        <table class="style1" style="text-align: center">
            <tr>
                <td class="style5">
                    &nbsp;</td>
                <td class="style6">
                    &nbsp;</td>
                <td class="style7">
                    &nbsp;</td>
                <td class="style10">
                    &nbsp;</td>
                <td class="style9">
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="style5">
                    Factor</td>
                <td class="style6">
                    Discount</td>
                <td class="style7">
                    Less Discount</td>
                <td class="style10">
                    TDS</td>
                <td class="style9">
                    VAT</td>
                <td>
                    Market Fee</td>
            </tr>
            <tr>
                <td class="style5">
                    <asp:DropDownList ID="DropDownList3" runat="server" 
                        DataSourceID="SqlDataSource_fac" DataTextField="factor" DataValueField="val">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource_fac" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT * FROM [factor]"></asp:SqlDataSource>
                </td>
                <td class="style6">
                    <asp:TextBox ID="discount" runat="server"></asp:TextBox>
                    &nbsp;Rs</td>
                <td class="style7">
                    <asp:TextBox ID="less_discount" runat="server" Width="50px"></asp:TextBox>
                    &nbsp;%</td>
                <td class="style10">
                    <asp:TextBox ID="tds" runat="server" Width="50px"></asp:TextBox>
                    &nbsp;%</td>
                <td class="style9">
                    <asp:TextBox ID="vat" runat="server" Width="50px"></asp:TextBox>
                    &nbsp;%</td>
                <td>
                    <asp:TextBox ID="market_fee" runat="server" Width="50px"></asp:TextBox>
                    &nbsp;%</td>
            
                    <tr>
                        <td class="style5">
                    &nbsp;</td>
                <td class="style6">
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                        ControlToValidate="discount" ErrorMessage="Enter Discount !" 
                        ForeColor="#CC3300" SetFocusOnError="True" ValidationGroup="b"></asp:RequiredFieldValidator>
                </td>
                <td class="style7">
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                        ControlToValidate="less_discount" ErrorMessage="Enter Less % !" 
                        ForeColor="#CC3300" SetFocusOnError="True" ValidationGroup="b"></asp:RequiredFieldValidator>
                </td>
                <td class="style10">
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                        ControlToValidate="tds" ErrorMessage="Enter TDS % !" ForeColor="#CC3300" 
                        SetFocusOnError="True" ValidationGroup="b"></asp:RequiredFieldValidator>
                </td>
                <td class="style9">
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                        ControlToValidate="vat" ErrorMessage="Enter Vat % !" ForeColor="#CC3300" 
                        SetFocusOnError="True" ValidationGroup="b"></asp:RequiredFieldValidator>
                </td>
                <td>
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                        ControlToValidate="market_fee" ErrorMessage="Enter Market Fee %" 
                        ForeColor="#CC3300" SetFocusOnError="True" ValidationGroup="b"></asp:RequiredFieldValidator>
                </td>
            </tr>
        </table>

        <br />

     </ContentTemplate>
    </asp:UpdatePanel>

    <asp:SqlDataSource ID="SqlDataSource_main" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT * FROM [tally_sheet] where auction_date=@auction_date and name_purchaser =@purchaser" 
        
        
        UpdateCommand="UPDATE dbo.tally_sheet SET rel =@rel WHERE code=@code">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="name_purchaser" Name="purchaser" 
                PropertyName="SelectedValue" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="rel" DefaultValue="Yes" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource_main2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT * FROM [receipt_book] where purchaser_name =@purchaser">
        <SelectParameters>
            <asp:ControlParameter ControlID="name_purchaser" Name="purchaser" 
                PropertyName="SelectedValue" />
        </SelectParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource_size_c" runat="server" 
                        
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>">
        <SelectParameters>
            <asp:ControlParameter ControlID="name_purchaser" Name="name_purchaser" 
                                PropertyName="SelectedValue" Type="String" />
            <asp:ControlParameter ControlID="DropDownList2" Name="auction_date" 
                                PropertyName="SelectedValue" Type="DateTime" />
            <asp:Parameter Name="stack" />
            <asp:Parameter Name="size_type" />
            <asp:Parameter Name="hsd_lot_no" />
        </SelectParameters>
    </asp:SqlDataSource>
    <br />
    <br />
    <table class="style1" style="text-align: center" border="1px" cellspacing="0">
        <tr>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
                    ValidationGroup="b">Submit</asp:LinkButton>
&nbsp;&nbsp;
                <asp:Label ID="Label1" runat="server"></asp:Label>
&nbsp;<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    InsertCommand="INSERT INTO release_order(rel_no, date, pur_amt, rece_vide_no, rece_date, issued_at, pay_at, rece_no, date3, work_div, m_s, auc_held_on, sanc_vide_no, date4, effe_from, lot_no, stack_no, des_spp, des_size, no, vol, rate, amt, pay_type, discount, less_dis, tds, vat, market_fee, net_amt, floor_rate, discount1, less_dis1, tds1, vat1, market_fee1, factor) VALUES (@rel_no, @date, @pur_amt, @rece_vide_no, @rece_date, @issued_at, @pay_at, @rece_no, @date3, @work_div, @m_s, @auc_held_on, @sanc_vide_no, @date4, @effe_from, @lot_no, @stack_no, @des_spp, @des_size, @no, @vol, @rate, @amt, @pay_type, @discount, @less_dis, @tds, @vat, @market_fee, @net_amt, @floor_rate, @discount1, @less_dis1, @tds1, @vat1, @market_fee1, @factor)" 
                    SelectCommand="SELECT * FROM [release_order] order by rel_no">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="no" Name="rel_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="date" Name="date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="ammount" Name="pur_amt" PropertyName="Text" />
                        <asp:ControlParameter ControlID="rec_no" Name="rece_vide_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="date_2" Name="rece_date" PropertyName="Text" />
                        <asp:ControlParameter ControlID="issued_at" Name="issued_at" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="payable_at" Name="pay_at" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="rec_no" Name="rece_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="date3" Name="date3" PropertyName="Text" />
                        <asp:ControlParameter ControlID="forest_division" Name="work_div" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="ms" Name="m_s" PropertyName="Text" />
                        <asp:ControlParameter ControlID="auc_held_on" Name="auc_held_on" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="vide_no" Name="sanc_vide_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="date4" Name="date4" PropertyName="Text" />
                        <asp:ControlParameter ControlID="eff_from" Name="effe_from" 
                            PropertyName="Text" />
                        <asp:Parameter Name="lot_no" />
                        <asp:Parameter Name="stack_no" />
                        <asp:Parameter Name="des_spp" />
                        <asp:Parameter Name="des_size" />
                        <asp:Parameter Name="no" />
                        <asp:Parameter Name="vol" />
                        <asp:Parameter Name="rate" />
                        <asp:Parameter Name="amt" />
                        <asp:Parameter Name="pay_type" />
                        <asp:ControlParameter ControlID="discount" Name="discount" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="less_discount" Name="less_dis" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="tds" Name="tds" PropertyName="Text" />
                        <asp:ControlParameter ControlID="vat" Name="vat" PropertyName="Text" />
                        <asp:ControlParameter ControlID="market_fee" Name="market_fee" 
                            PropertyName="Text" />
                        <asp:Parameter Name="net_amt" />
                        <asp:Parameter Name="floor_rate" />
                        <asp:Parameter Name="discount1" />
                        <asp:Parameter Name="less_dis1" />
                        <asp:Parameter Name="tds1" />
                        <asp:Parameter Name="vat1" />
                        <asp:Parameter Name="market_fee1" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="factor" 
                            PropertyName="SelectedValue" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    <br />
</asp:Content>

