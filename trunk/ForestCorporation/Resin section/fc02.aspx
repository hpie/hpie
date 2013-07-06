<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc02.aspx.cs" Inherits="fc02" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
    
  
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">

    <style type="text/css">
        .style2
        {
            width: 587px;
            border: 1px solid #000000;
        }
        .style3
        {
        }
        .style4
        {
            width: 275px;
        }
    </style>

</asp:Content>
<asp:Content ID="Content2" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">

         <table cellpadding="0" cellspacing="0" class="style2">
        <tr>
            <td  colspan="2" 
                style="color: #FFFFFF; font-weight: 700; background-color: #0033CC">
                Search Date wish</td>
                                    </tr>
                                    <tr>
                                        <td class="style3">
                                            FWD&nbsp;</td>
            <td class="style4">
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="div" DataValueField="div" 
                    AutoPostBack="True">
                </asp:DropDownList>
                <asp:CheckBox ID="CheckBox1" runat="server" />
            </td>
        </tr>
                                    <tr>
                                        <td class="style3">
                                            Pvt. Resin Owner</td>
            <td class="style4">
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource5" DataTextField="pvt_name" 
                    DataValueField="pvt_name">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc01] WHERE ([ResFWD] = @ResFWD)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="ResFWD" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:CheckBox ID="CheckBox2" runat="server" />
            </td>
        </tr>
                                    <tr>
                                        <td class="style3">
                                            Start Date</td>
            <td class="style4">
                <asp:TextBox ID="TextBox17" runat="server"></asp:TextBox>
                <ajaxToolkit:MaskedEditExtender ID="TextBox17_MaskedEditExtender" 
                    runat="server" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox17">
                </ajaxToolkit:MaskedEditExtender>
                <ajaxToolkit:CalendarExtender ID="TextBox17_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox17">
                </ajaxToolkit:CalendarExtender>
            </td>
        </tr>
                                    <tr>
                                        <td class="style3">
                                            End Date<asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
   
    
                                        </td>
            <td class="style4">
                <asp:TextBox ID="TextBox19" runat="server"></asp:TextBox>
                <ajaxToolkit:MaskedEditExtender ID="TextBox19_MaskedEditExtender" 
                    runat="server" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox19">
                </ajaxToolkit:MaskedEditExtender>
                <ajaxToolkit:CalendarExtender ID="TextBox19_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox19">
                </ajaxToolkit:CalendarExtender>
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [tbdiv]"></asp:SqlDataSource>
            </td>
        </tr>
    </table>

         <br />
    <b>DAILY RESIN RECEIPT REGISTER</b><br />
    <br />

    <br />

    <br />

    <br />

    
    <div class="demoarea">
       
        
        
        
        
        
        
        
        
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
            SelectCommand="SELECT * FROM [fc01]"></asp:SqlDataSource>
    
    
    
    
    
    
 
    
    
    
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" style="font-family: Verdana; font-size: 8pt" 
        Width="1100px" onrowdatabound="GridView1_RowDataBound" DataKeyNames="PreNo" 
           onrowupdating="GridView1_RowUpdating" 
           onrowdeleting="GridView1_RowDeleting" ondatabound="GridView1_DataBound" 
           onrowcommand="GridView1_RowCommand" onrowediting="GridView1_RowEditing" 
            onselectedindexchanged="GridView1_SelectedIndexChanged1" 
            onselectedindexchanging="GridView1_SelectedIndexChanging" 
            onrowcreated="GridView1_RowCreated" ShowFooter="True">
        <Columns>
           <asp:TemplateField HeaderText="1">
           <ItemTemplate>
           <%#r %>
           </ItemTemplate>
           </asp:TemplateField>
             <asp:TemplateField HeaderText="2">
           <ItemTemplate>
          <%#Eval("vehicleno") %>
           </ItemTemplate>
           </asp:TemplateField>
            <asp:TemplateField HeaderText="3">
                <EditItemTemplate>
                    <asp:TextBox ID="dt_fc02" runat="server" Width="100px"></asp:TextBox>
                    <cc1:MaskedEditExtender ID="dt_fc02_MaskedEditExtender" runat="server" 
                        CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99/99/9999" MaskType="Date" TargetControlID="dt_fc02">
                    </cc1:MaskedEditExtender>
                    <cc1:CalendarExtender ID="dt_fc02_CalendarExtender" runat="server" 
                        Enabled="True" Format="dd/MM/yyyy" TargetControlID="dt_fc02">
                    </cc1:CalendarExtender>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="dt_fc02" runat="server" Text='<%# Eval("date", " {0:d/MM/yyyy}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
      <asp:TemplateField HeaderText="4" ControlStyle-Width="200">
<ControlStyle Width="200px"></ControlStyle>
            <ItemTemplate>
            Challan No<asp:Label ID="Label1" runat="server" 
                        Text='<%# Eval("Challanno") %>'></asp:Label>
                    Date:
                    <asp:Label ID="dt" runat="server" Text='<%# Eval("Date", " {0:d/MM/yyyy}") %>'></asp:Label>
            </ItemTemplate>
            
            </asp:TemplateField>
<asp:TemplateField HeaderText="5">
      <EditItemTemplate>
                    <asp:TextBox ID="name_lsm_lot" runat="server" 
                        Text='<%# Bind("name_lsm_lot") %>' Width="100px"></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                 Name:   <asp:Label ID="Label63" runat="server" Text='<%# Eval("name_lsm_name") %>'></asp:Label>& Lot. No.:<%# Eval("name_lsm_lot") %> 
                  
                   
                </ItemTemplate>
    <ControlStyle Width="200px" />
</asp:TemplateField>
            <asp:TemplateField HeaderText="6">
          <ItemTemplate>
             <asp:Label ID="name_lsm_lot" runat="server" Text='<%# Eval("resunit") %>'></asp:Label>
            </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="7">
            <ItemTemplate>
                    <asp:Label ID="name_fwd" runat="server" Text='<%# Eval("ResFWD") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="8">
                <ItemTemplate>
                    &nbsp;<asp:Label ID="Label3" runat="server" Text='<%# Eval("Preno") %>'></asp:Label>
                    &nbsp;&amp; <asp:Label ID="Label4" runat="server" Text='<%# Eval("date", "{0:d/MM/yyyy}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="9">
                <FooterTemplate>
                    <asp:Label ID="Label102" runat="server" style="font-weight: 700" Text="<%#tt %>"></asp:Label>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label31" runat="server" Text='<%# Eval("SType") %>'></asp:Label>
                    :<asp:Label ID="Label41" runat="server" Text='<%# Eval("NoSType") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="10">
                <FooterTemplate>
                    <asp:Label ID="Label103" runat="server" style="font-weight: 700" Text="<%#tw %>"></asp:Label>
                </FooterTemplate>
                <ItemTemplate>
            <%#Eval("netrws") %>
             
                <asp:Label ID="Label66" runat="server" Text='<%# Eval("netrws") %>' Visible="False"></asp:Label>
             
            </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="11">
            
            <ItemTemplate>
             <asp:Label  ID="Label101" runat="server" Text='<%# Eval("emptytruckwe") %>'></asp:Label>
        <%--      <asp:Label Visible="false" ID="Label102" runat="server" Text='<%# Eval("StTinWe") %>'></asp:Label>
             <asp:Label  ID="Label103" runat="server"></asp:Label>--%>
            </ItemTemplate>
            
            
            </asp:TemplateField>
            
            <asp:TemplateField HeaderText="12">
            <ItemTemplate>
        
            
            <asp:Label ID="Label91" runat="server" Text='<%# Eval("netrws") %>'></asp:Label>
            </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="13">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                    &nbsp;&amp;
                  <%--  <asp:TextBox ID="TextBox2" runat="server" 
                        Text='<%# Bind("sakki_date", "{0:d/MM/yyyy}") %>'></asp:TextBox>
                    <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                        Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
                    </cc1:CalendarExtender>
                    <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                        CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99/99/99" MaskType="Date" TargetControlID="TextBox2">
                    </cc1:MaskedEditExtender>--%>
                </EditItemTemplate>
                <ItemTemplate>
                  <%--  <asp:Label ID="Label5" runat="server" Text='<%# Eval("netrws") %>' ></asp:Label>--%>
          
                 <asp:Label ID="Label64" runat="server" 
                        Text='<%# Eval("preno1", " {0:dMMyyyy}") %>'></asp:Label>
                    &amp;
                    <asp:Label ID="Label7" runat="server" 
                        Text='<%# Eval("date_fc03", " {0:d/MM/yyyy}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="14">
                <ItemTemplate>
                    <asp:Label ID="Label57" runat="server" Text='<%# Eval("stype") %>'></asp:Label>
                    :
                    <asp:Label ID="Label58" runat="server" Text='<%# Eval("sakki_tin") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="15">
                <ItemTemplate>
                    <asp:Label ID="Label59" runat="server" Text='<%# Eval("sakki_wt_fc03") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="16">
                <ItemTemplate>
                    <asp:Label ID="Label61" runat="server" Text='<%# Eval("saaki_per") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="17">
                <ItemTemplate>
                    <asp:Label ID="Label62" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="18">
                <ItemTemplate>
                    <asp:Label ID="Label60" runat="server" Text='<%# Eval("remark") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField>
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton4" Text="SAKKI ANALYSIS REPORT" runat="server" 
                        CommandName="edit" Visible="False"/>
                        <a href="#" ></a>
                        
                  
                  
                  
                  
               <%--   Style="display: none" --%>
                   <asp:Panel ID="Panel55" runat="server" Style="display: none"  >
            <asp:Panel ID="Panel66" runat="server" Style="cursor: move;background-color:#DDDDDD;border:solid 1px Gray;color:Black">
                <div>
                    <p align="center">Move Windows here</p>
                </div>
            </asp:Panel>
                <div class="fform" Style="cursor: default;background-color:#DDDDDD;border:solid 1px Gray;color:Black">
                <table cellpadding="2" cellspacing="0">
        <tr>
            <td  colspan="2" align="center">
                SAKKI ANALYSIS REPORT</td>
        </tr>
        <tr>
            <td  >
                Date:
                <asp:TextBox ID="TextBox3" runat="server" 
                    Text='<%# Eval("date_fc03", " {0:d/MM/yyyy}") %>'></asp:TextBox>
                <ajaxToolkit:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox3">
                </ajaxToolkit:CalendarExtender>
                <ajaxToolkit:MaskedEditExtender ID="TextBox3_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox3">
                </ajaxToolkit:MaskedEditExtender>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        </table>
        <table cellpadding="0" cellspacing="0" >
        <tr>
            <td c>
                S. No</td>
            <td >
                Particulars</td>
            <td >
                Unit/Div:<asp:TextBox ID="TextBox15" runat="server" 
                    Text='<%# Eval("resfwd") %>' ReadOnly="true"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                .</td>
            <td >
                1</td>
            <td>
                2</td>
        </tr>
        <tr>
            <td >
                1</td>
            <td >
                Name of the resin unit:</td>
            <td >
                <asp:TextBox ID="TextBox4" runat="server" Text='<%# Eval("resunit") %>' 
                 ReadOnly="true"   ></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                2</td>
            <td >
                Name of LSM/Contractor</td>
            <td>
                <asp:TextBox ID="TextBox5" runat="server" Text='<%# Eval("name_lsm_name") %>'></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                3</td>
            <td >
                Challan No.</td>
            <td >
                <asp:TextBox ID="TextBox6" runat="server" Text='<%# Eval("challanno") %>' 
                    ReadOnly="True"></asp:TextBox>
                </td>
        </tr>
        <tr>
            <td >
                4</td>
            <td >
                Lot no.</td>
            <td >
                <asp:TextBox ID="TextBox7" runat="server" Text='<%# Eval("name_lsm_lot") %>'></asp:TextBox>
<%--                <ajaxToolkit:FilteredTextBoxExtender ID="TextBox7_FilteredTextBoxExtender" 
                    runat="server" Enabled="True" FilterType="Numbers" TargetControlID="TextBox7">
                </ajaxToolkit:FilteredTextBoxExtender>--%>
            </td>
        </tr>
        <tr>
            <td >
                5</td>
            <td >
                No. of
                <asp:Label ID="Label56" runat="server" Text='<%# Eval("Stype") %>'></asp:Label>
            </td>
            <td >
                <asp:TextBox ID="TextBox8" runat="server" Text='<%# Eval("nostype") %>' 
                    ReadOnly="True"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                6</td>
            <td >
                Gross wt. with tins/drums:</td>
            <td >
                <asp:TextBox ID="TextBox10" runat="server" ReadOnly="True" 
                    Text='<%# Eval("grosswetin") %>'></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                7</td>
            <td >
                wt. of tins/drums</td>
            <td >
                <asp:TextBox ID="TextBox11" runat="server" Text='<%# Eval("NoSType") %>'></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td>
                8</td>
            <td >
                net wt. of resin with Sakki</td>
            <td >
                <asp:TextBox ID="TextBox12" runat="server" ReadOnly="True" 
                    Text='<%# Eval("netrws") %>'></asp:TextBox>
            </td>
        </tr>
        
          <tr>
            <td >
                9</td>
            <td >Sakki wt. :
                </td>
            <td >
                <asp:TextBox ID="TextBox14" runat="server" Text='<%# Eval("saaki_per") %>' ></asp:TextBox><br />
                <asp:LinkButton ID="LinkButton1" runat="server" CommandName="cal" Visible="false">Calculate</asp:LinkButton>
            </td>"
        </tr>
        
        <tr>
            <td >
                10</td>
            <td >
                No of tins/drums taken for sakki analysis</td>
            <td >
                <asp:TextBox ID="TextBox13" runat="server" Text='<%# Eval("sakki_tin") %>'></asp:TextBox>
            </td>
        </tr>
      
            <tr>
                <td>
                    11</td>
                <td>
                    Remarks</td>
                <td>
                    <asp:TextBox ID="TextBox16" runat="server" Text='<%# Eval("remark") %>'></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                        InsertCommand="fc01_ins" InsertCommandType="StoredProcedure" 
                        SelectCommand="SELECT * FROM [fc01] order by no_fc03">
                        <InsertParameters>
                            <asp:Parameter Name="Date" Type="DateTime" />
                            <asp:ControlParameter ControlID="Label1" Name="SType" PropertyName="Text" 
                                Type="String" />
                            <asp:ControlParameter ControlID="tins" Name="NoSType" PropertyName="Text" 
                                Type="Int32" />
                            <asp:ControlParameter ControlID="gross_w_w_t" Name="GrossWe" 
                                PropertyName="Text" Type="Decimal" />
                            <asp:ControlParameter ControlID="empty_t_weight" Name="EmptyTruckWe" 
                                PropertyName="Text" Type="Decimal" />
                            <asp:ControlParameter ControlID="gross_w_w_tin" Name="GrossWetin" 
                                PropertyName="Text" Type="Decimal" />
                            <asp:ControlParameter ControlID="standard_l_weight" Name="StTinWe" 
                                PropertyName="Text" Type="Decimal" />
                            <asp:ControlParameter ControlID="net_resin" Name="NetRWS" PropertyName="Text" 
                                Type="Decimal" />
                            <asp:ControlParameter ControlID="challan_no" Name="ChallanNo" 
                                PropertyName="Text" Type="String" />
                            <asp:Parameter Name="Dated" Type="DateTime" />
                            <asp:ControlParameter ControlID="vehicle_n" Name="VehicleNo" 
                                PropertyName="Text" Type="String" />
                            <asp:ControlParameter ControlID="time" Name="Time" PropertyName="Text" 
                                Type="DateTime" />
                            <asp:ControlParameter ControlID="resin_u" Name="ResFWD" PropertyName="Text" 
                                Type="String" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
    </table>
                    
                    <p style="text-align: center;">
                        <asp:Button ID="Ok" runat="server" Text="OK" CommandName="Update" />
                        <asp:Button ID="CancelButton" runat="server" Text="Cancel" />
                    </p>
                </div>
        </asp:Panel>
                  
                  
                  
                  
                  
                  
                  
                  
                 <ajaxToolkit:ModalPopupExtender ID="ModalPopupExtender55" runat="server" 
            TargetControlID="LinkButton4"
            PopupControlID="Panel55" 
            BackgroundCssClass="modalBackground" 
           OnOkScript="num()"
          
            CancelControlID="CancelButton" 
            DropShadow="true"
            PopupDragHandleControlID="Panel66" CacheDynamicResults="True" />
            
            
            
            
                </ItemTemplate>
            </asp:TemplateField>
           <%--
            <asp:TemplateField HeaderText="Report">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton5" runat="server" CommandName="select">Print</asp:LinkButton>
                </ItemTemplate>
            </asp:TemplateField>--%>
           
        </Columns>
        <PagerStyle BorderColor="#003300" BorderStyle="Solid" BorderWidth="1px" />
        <AlternatingRowStyle BorderColor="#003300" BorderStyle="Solid" 
            BorderWidth="1px" />
    </asp:GridView>
        <br />
        <br />
      
    </div>
    
    
    
    
    
    
 
    
    
    
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc01] order by preno1" 
           
           
           
        
        UpdateCommand="UPDATE fc01 SET no_fc03 =@no_fc03, date_fc03 =@date_fc03, name_lsm_name =@name_lsm_name, name_lsm_lot =@name_lsm_lot, wt_of_tin_fc03 =@wt_of_tin_fc03, unit_div_fc03 =@unit_div_fc03, sakki_wt_fc03 =@sakki_wt_fc03, saaki_per =@saaki_per, remark=@remark,PreNo1=@PreNo1,sakki_tin=@sakki_tin,resunit=@resunit where PreNo=@PreNo">
        <UpdateParameters>
            <asp:Parameter Name="no_fc03" />
            <asp:Parameter Name="date_fc03" />
            <asp:Parameter Name="name_lsm_name" />
            <asp:Parameter Name="name_lsm_lot" />
            <asp:Parameter Name="wt_of_tin_fc03" />
            <asp:Parameter Name="unit_div_fc03" />
            <asp:Parameter Name="sakki_wt_fc03" />
            <asp:Parameter Name="saaki_per" />
            <asp:Parameter Name="PreNo" />
            <asp:Parameter Name="remark" />
            <asp:Parameter Name="PreNo1" />
            <asp:Parameter Name="sakki_tin" />
              <asp:Parameter Name="resunit" />
        </UpdateParameters>
       </asp:SqlDataSource>
    <br />
    
    
    
    
    
    
 
    
    
    
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
           
           
           
        
    UpdateCommand="UPDATE fc01 SET no_fc03 =@no_fc03, date_fc03 =@date_fc03, name_lsm_name =@name_lsm_name, name_lsm_lot =@name_lsm_lot, wt_of_tin_fc03 =@wt_of_tin_fc03, unit_div_fc03 =@unit_div_fc03, sakki_wt_fc03 =@sakki_wt_fc03, saaki_per =@saaki_per, remark=@remark,PreNo1=@PreNo1 where PreNo=@PreNo">
        <UpdateParameters>
            <asp:Parameter Name="no_fc03" />
            <asp:Parameter Name="date_fc03" />
            <asp:Parameter Name="name_lsm_name" />
            <asp:Parameter Name="name_lsm_lot" />
            <asp:Parameter Name="wt_of_tin_fc03" />
            <asp:Parameter Name="unit_div_fc03" />
            <asp:Parameter Name="sakki_wt_fc03" />
            <asp:Parameter Name="saaki_per" />
            <asp:Parameter Name="PreNo" />
            <asp:Parameter Name="remark" />
            <asp:Parameter Name="PreNo1" />
        </UpdateParameters>
       </asp:SqlDataSource>
  
    

</asp:Content>


<asp:Content ID="Content3" runat="server" 
    contentplaceholderid="ContentPlaceHolder3">


</asp:Content>



