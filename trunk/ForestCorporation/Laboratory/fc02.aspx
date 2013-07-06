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
            width: 365px;
            border: 1px solid #000000;
        }
        .style3
        {
        }
    </style>

</asp:Content>
<asp:Content ID="Content2" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">

         <br />
    <b>DAILY RESIN RECEIPT REGISTER</b><br />
    <br />

    <br />

    <br />

    <br />

    <table cellpadding="0" cellspacing="0" class="style2">
        <tr>
            <td class="style3" colspan="2">
                Search Date wish</td>
                                    </tr>
                                    <tr>
                                        <td class="style3">
                                            Start Date</td>
            <td>
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
                                            End Date</td>
            <td>
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
            </td>
        </tr>
    </table>

    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
   
    
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
            onrowcreated="GridView1_RowCreated">
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
                <ItemTemplate>
                    <asp:Label ID="Label31" runat="server" Text='<%# Eval("SType") %>'></asp:Label>
                    :<asp:Label ID="Label41" runat="server" Text='<%# Eval("NoSType") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="10">
                <ItemTemplate>
            <%#Eval("netrws") %>
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
                    <asp:Label ID="Label59" runat="server" Text='<%# Eval("saaki_per") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="16">
                <ItemTemplate>
                    <asp:Label ID="Label61" runat="server" Text='<%# Eval("sakki_wt") %>'></asp:Label>
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
                        CommandName="edit"/>
                        
                        
                  
                  
                  
              
            
            
                </ItemTemplate>
            </asp:TemplateField>
           
            <asp:TemplateField HeaderText="Report">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton5" runat="server" CommandName="select">Print</asp:LinkButton>
                </ItemTemplate>
            </asp:TemplateField>
           
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
           
           
           
        
        
             
             
             UpdateCommand="UPDATE fc01 SET no_fc03 =@no_fc03, date_fc03 =@date_fc03, name_lsm_name =@name_lsm_name, name_lsm_lot =@name_lsm_lot, wt_of_tin_fc03 =@wt_of_tin_fc03, unit_div_fc03 =@unit_div_fc03, sakki_wt_fc03 =@sakki_wt_fc03, saaki_per =@saaki_per, remark=@remark,PreNo1=@PreNo1,sakki_tin=@sakki_tin,resunit=@resunit,Impurity=@Impurity ,impwt=@impwt,net=@net,sakki_wt=@sakki_wt where PreNo=@PreNo">
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
            <asp:Parameter Name="Impurity" />
            <asp:Parameter Name="impwt" />
            <asp:Parameter Name="net" />
            <asp:Parameter Name="sakki_wt" />
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


