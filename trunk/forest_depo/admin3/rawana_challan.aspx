<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="rawana_challan.aspx.cs" Inherits="rawana_challan" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">

        .style1
        {
            width: 100%;
            font-size: 8pt;
        }
        .style6
        {
        }
        .style7
        {
            width: 995px;
        }
        .style10
        {
            width: 215px;
        }
        .style12
        {
            height: 75px;
            width: 215px;
        }
        .style13
        {
            width: 323px;
        }
        .style15
        {
            height: 75px;
            width: 323px;
        }
        .style16
        {
            width: 163px;
        }
        .style17
        {
            height: 75px;
            width: 163px;
        }
        .style18
        {
            width: 1004px;
        }
        .style19
        {
            width: 327px;
        }
        .style20
        {
            height: 75px;
            width: 327px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2><asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            Rawana Challan</h2>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
        SelectCommand="SELECT rel_no FROM [release_order] group by rel_no"></asp:SqlDataSource>
                Select Release Order No.: &nbsp;
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="rel_no" 
                    DataValueField="rel_no" 
        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
    &nbsp;
    <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Search</asp:LinkButton>
&nbsp;<asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
        
        
        SelectCommand="SELECT code, rel_no, date, pur_amt, rece_vide_no, rece_date, issued_at, pay_at, rece_no, date3, work_div, m_s, auc_held_on, sanc_vide_no, date4, effe_from, lot_no, stack_no, des_spp, des_size, no, vol, rate, amt, pay_type, discount, less_dis, tds, vat, market_fee, net_amt, floor_rate, discount1, less_dis1, tds1, vat1, market_fee1, factor, dep FROM dbo.release_order WHERE (rel_no = @rel_no)" 
        
        UpdateCommand="UPDATE dbo.release_order SET vol = @vol, amt = @amt, no =@no WHERE (rel_no = @rel_no)">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList1" Name="rel_no" 
                PropertyName="SelectedValue" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="vol" />
            <asp:ControlParameter ControlID="DropDownList1" Name="rel_no" 
                PropertyName="SelectedValue" />
            <asp:Parameter Name="amt" />
            <asp:Parameter Name="no" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:Label ID="Label2" runat="server" ForeColor="#CC3300"></asp:Label>
<br />
<br />
<asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">Report</asp:LinkButton>
    <br />
    <asp:SqlDataSource ID="SqlDataSource8" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
        SelectCommand="SELECT * FROM [tally_sheet] where lot_no=@lot_no">
        <SelectParameters>
            <asp:Parameter Name="lot_no" />
        </SelectParameters>
    </asp:SqlDataSource>
    <br />
    <table class="style1" __designer:mapid="5a1">
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style18">
                <table class="style7" style="text-align: left; height: 213px;">
                    <tr>
                        <td class="style10">
                Book No.</td>
                        <td class="style13">
                <asp:TextBox runat="server" ID="book_no"></asp:TextBox>
                        </td>
                        <td class="style16">
                            Date</td>
                        <td class="style19">
                <asp:TextBox runat="server" ID="date"></asp:TextBox>
                <asp:CalendarExtender ID="date_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="date">
                </asp:CalendarExtender>
                        </td>
                    </tr>
                    <tr>
                        <td class="style10">
                            Time</td>
                        <td class="style13">
                <asp:TextBox ID="time" runat="server"></asp:TextBox>
                <asp:MaskedEditExtender ID="time_MaskedEditExtender" runat="server" 
                    AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99:99" MaskType="Time" TargetControlID="time">
                </asp:MaskedEditExtender>
                            <br />
                <em style="font-style: italic; color: rgb(102, 102, 102); font-family: Tahoma, Arial, sans-serif; font-size: 12px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; ">
                <span style="font-size: 8pt; ">Tip: Type &#39;A&#39; or &#39;P&#39; to switch AM/PM</span></em><span 
                    style="color: rgb(102, 102, 102); font-family: Tahoma, Arial, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none; "><span 
                    class="Apple-converted-space">&nbsp;</span></span></td>
                        <td class="style16">
                            Release order No.
                        </td>
                        <td class="style19">
                <asp:TextBox runat="server" ID="rel_no" ontextchanged="rel_no_TextChanged1"></asp:TextBox>
                <asp:FilteredTextBoxExtender ID="rel_no_FilteredTextBoxExtender" runat="server" 
                    Enabled="True" FilterType="Numbers" TargetControlID="rel_no">
                </asp:FilteredTextBoxExtender>
                            <asp:Label ID="wrd" runat="server"></asp:Label>
                        </td>
                    </tr>
            

                    <tr>
                        <td class="style12">
                            Name and Address of the purchaser</td>
                        <td class="style15">
                <asp:TextBox runat="server" TextMode="MultiLine" Height="65px" Width="308px" 
                    ID="name_add"></asp:TextBox>
                        </td>
                        <td class="style17">
                Vehicle 
                (Kind &amp; No.)&nbsp;&nbsp;&nbsp;</td>
                        <td class="style20">
                <asp:TextBox runat="server" ID="veh_no" Width="271px" ontextchanged="veh_no_TextChanged"></asp:TextBox>
                        </td>
                    </tr>
                   
                 
                    <tr>
                        <td class="style10">
                Name of Driver</td>
                        <td class="style13">
                <asp:TextBox runat="server" ID="name_driver" Width="300px"></asp:TextBox>
                        </td>
                        <td class="style16">
                Place to witch consigned</td>
                        <td class="style19">
                <asp:TextBox ID="place_consig" runat="server" Width="268px"></asp:TextBox>
                        </td>
                    </tr>
                 
                    <tr>
                        <td class="style10">
                            Route alone check and post prescribed for transport</td>
                        <td class="style13">
                <asp:TextBox ID="for_trans" runat="server"></asp:TextBox>
                        </td>
                        <td class="style16">
                            Release Hammer mark</td>
                        <td class="style19">
                <asp:TextBox ID="rel_hamm_mark" runat="server" Width="265px"></asp:TextBox>
                        </td>
                    </tr>
                    </table>
                <br />
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataSourceID="SqlDataSource7" onrowdatabound="GridView1_RowDataBound" 
                    onrowupdating="GridView1_RowUpdating" style="font-size: 8pt" Width="967px">
                    <Columns>
                        <asp:TemplateField HeaderText="Name of Division">
                            <ItemTemplate>
                                <asp:Label ID="division" runat="server" Text='<%# Eval("work_div") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Date of Auction">
                          <ItemTemplate>
                                <asp:Label ID="auc_date" runat="server" Text='<%# Eval("auc_held_on") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Lot No.">
                          <ItemTemplate>
                                <asp:Label ID="lot_no" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                            </ItemTemplate>
                        
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Stack No.">
                        
                         <ItemTemplate>
                                <asp:Label ID="stack" runat="server" Text='<%# Eval("stack_no") %>'></asp:Label>
                            </ItemTemplate>
                        
                        </asp:TemplateField>
                      <%--  <asp:TemplateField HeaderText="Kind">
                            <ItemTemplate>
                                <asp:Label ID="kind" runat="server" Text='<%# Eval("kind") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>--%>
                        
                        <asp:TemplateField HeaderText="Species (Name kind with Distintve Property and/or Kundan Mark">
                       
                        <ItemTemplate>
                                <asp:Label ID="spec" runat="server" Text='<%# Eval("des_spp") %>'></asp:Label>
                            </ItemTemplate>
                       
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Size">
                        
                         <ItemTemplate>
                                <asp:Label ID="size" runat="server" Text='<%# Eval("des_size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No">
                         <ItemTemplate>
                                <asp:Label ID="no" runat="server" Text='<%# Eval("no") %>' Visible="False"></asp:Label>
                                &nbsp;<asp:TextBox ID="no_e" runat="server" Text='<%# Eval("no") %>' Width="50px"></asp:TextBox>
                                <br />
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol.">
                        
                            <EditItemTemplate>
                                <asp:Label ID="vol_e" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                            </EditItemTemplate>
                        
                         <ItemTemplate>
                                <asp:Label ID="vol" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Ammount">
                            <EditItemTemplate>
                                <asp:Label ID="amt_e" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                            </EditItemTemplate>
                         <ItemTemplate>
                                <asp:Label ID="amt" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        
                    </Columns>
                </asp:GridView>
               
            </td>
            <td __designer:mapid="5b3" class="style6">
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />
                 <asp:LinkButton ID="LinkButton4" runat="server" 
    onclick="LinkButton4_Click">Calculate</asp:LinkButton>
                &nbsp;<asp:Label ID="err" runat="server" style="color: #CC3300"></asp:Label>
                </td>
        </tr>
    </table>
    <br />
 <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
&nbsp;&nbsp;&nbsp;
            <asp:Label ID="Label1" runat="server"></asp:Label>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                InsertCommand="INSERT INTO rawana_challan(no, book_no, time, rel_order, name_add, veh_kind_no, name_driver, place_to_consig, for_trans, hammer_mark, name_div, date_auc, lot_no, stack_no, species, size, no_2, vol, amt, date) VALUES (@no, @book_no, @time, @rel_order, @name_add, @veh_kind_no, @name_driver, @place_to_consig, @for_trans, @hammer_mark, @name_div, @date_auc, @lot_no, @stack_no, @species, @size, @no_2, @vol, @amt, @date)" 
                SelectCommand="SELECT * FROM [division]">
                <InsertParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="no" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="book_no" Name="book_no" PropertyName="Text" />
                    <asp:ControlParameter ControlID="time" Name="time" PropertyName="Text" />
                    <asp:ControlParameter ControlID="rel_no" Name="rel_order" PropertyName="Text" />
                    <asp:ControlParameter ControlID="name_add" Name="name_add" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="veh_no" Name="veh_kind_no" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="name_driver" Name="name_driver" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="place_consig" Name="place_to_consig" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="for_trans" Name="for_trans" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="rel_hamm_mark" Name="hammer_mark" 
                        PropertyName="Text" />
                    <asp:Parameter Name="name_div" />
                    <asp:Parameter Name="date_auc" />
                    <asp:Parameter Name="lot_no" />
                    <asp:Parameter Name="stack_no" />
                    <asp:Parameter Name="species" />
                    <asp:Parameter Name="size" />
                    <asp:Parameter Name="no_2" />
                    <asp:Parameter Name="vol" />
                    <asp:Parameter Name="amt" />
                    <asp:ControlParameter ControlID="date" Name="date" 
                        PropertyName="Text" />
                </InsertParameters>
            </asp:SqlDataSource>
<br />
</asp:Content>

