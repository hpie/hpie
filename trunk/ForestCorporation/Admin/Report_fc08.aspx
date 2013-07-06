<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="Report_fc08.aspx.cs" Inherits="fc08" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager> <br />
    <b>SHIFT WISE LOG BOOK</b><br />
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" Font-Size="7pt" 
        onrowcreated="GridView1_RowCreated" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
        onrowcommand="GridView1_RowCommand" 
    onrowdatabound="GridView1_RowDataBound" DataKeyNames="code" 
        onrowcancelingedit="GridView1_RowCancelingEdit" 
        onrowediting="GridView1_RowEditing" onrowupdating="GridView1_RowUpdating">
        <RowStyle ForeColor="#000066" />
        <Columns>
            <asp:TemplateField HeaderText="1">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox1" runat="server" 
                        Text='<%# Eval("dt","{0:dd/MM/yyyy}") %>' Width="96px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="fTextBox1_MaskedEditExtender" 
                        runat="server" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99/99/9999" MaskType="Date" TargetControlID="fTextBox1">
                    </ajaxToolkit:MaskedEditExtender>
                    <ajaxToolkit:CalendarExtender ID="fTextBox1_CalendarExtender" runat="server" 
                        Enabled="True" Format="dd/MM/yyyy" TargetControlID="fTextBox1">
                    </ajaxToolkit:CalendarExtender>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="TextBox1" runat="server" Width="96px"></asp:TextBox>
                    <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                        CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                    </cc1:MaskedEditExtender>
                    <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                        Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
                    </cc1:CalendarExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server" 
                        Text='<%# Eval("dt", "{0:dd/MM/yyyy}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox2" runat="server" Text='<%# Eval("shift") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="TextBox2" runat="server" Text="0" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label2" runat="server" Text='<%# Eval("shift") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="3.1">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox3" runat="server" Text='<%# Eval("steam_p_time") %>' 
                        Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="fTextBox3_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="fTextBox3">
                    </ajaxToolkit:MaskedEditExtender>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox3" runat="server" Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="TextBox3_MaskedEditExtender" runat="server" 
                        AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="TextBox3">
                    </ajaxToolkit:MaskedEditExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label3" runat="server" Text='<%# Eval("steam_p_time") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="3.2">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox4" runat="server" Text='<%# Eval("steam_p_press") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox4"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label4" runat="server" Text='<%# Eval("steam_p_press") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="4.1">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox5" runat="server" Text='<%# Eval("resin_con_time") %>' 
                        Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="fTextBox5_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="fTextBox5">
                    </ajaxToolkit:MaskedEditExtender>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="TextBox5_MaskedEditExtender" runat="server" 
                        AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="TextBox5">
                    </ajaxToolkit:MaskedEditExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label5" runat="server" Text='<%# Eval("resin_con_time") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="4.2">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox6" runat="server" Text='<%# Eval("resin_con_kgs") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox6"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label6" runat="server" Text='<%# Eval("resin_con_kgs") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="4.3">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox7" runat="server" 
                        Text='<%# Eval("resin_con_nooftins") %>' Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox7"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label7" runat="server" Text='<%# Eval("resin_con_nooftins") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="5">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox8" runat="server" Text='<%# Eval("at_what_5") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox8"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label8" runat="server" Text='<%# Eval("at_what_5") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="6">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox9" runat="server" Text='<%# Eval("times_6") %>' 
                        Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="fTextBox9_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="fTextBox9">
                    </ajaxToolkit:MaskedEditExtender>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox9" runat="server" Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="TextBox9_MaskedEditExtender" runat="server" 
                        AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="TextBox9">
                    </ajaxToolkit:MaskedEditExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label9" runat="server" Text='<%# Eval("times_6") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="7">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox10" runat="server" Text='<%# Eval("times_6") %>' 
                        Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="fTextBox10_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="fTextBox10">
                    </ajaxToolkit:MaskedEditExtender>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox10" runat="server" Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="TextBox10_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="TextBox10">
                    </ajaxToolkit:MaskedEditExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label10" runat="server" Text='<%# Eval("putting_7") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="8">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox11" runat="server" Text='<%# Eval("putting_7") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox11"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label11" runat="server" Text='<%# Eval("how_many_8") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
              <asp:CommandField ShowEditButton="True" />
              </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
            <!--end  -->
            
             <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" Font-Size="7pt" 
        onrowcreated="GridView2_RowCreated" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
        onrowcommand="GridView1_RowCommand" 
    onrowdatabound="GridView1_RowDataBound" DataKeyNames="code" 
        onrowcancelingedit="GridView2_RowCancelingEdit" 
        onrowediting="GridView2_RowEditing" onrowupdating="GridView2_RowUpdating">
        <RowStyle ForeColor="#000066" />
        <Columns>
            
            <asp:TemplateField HeaderText="9">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox12" runat="server" Text='<%# Eval("how_much_9") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox12"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label12" runat="server" Text='<%# Eval("how_much_9") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="10">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox13" runat="server" Text='<%# Eval("how_much_10") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox13"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label13" runat="server" Text='<%# Eval("how_much_10") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="11">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox14" runat="server" Text='<%# Eval("at_what_11") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox14"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label14" runat="server" Text='<%# Eval("at_what_11") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="12.1">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox15" runat="server" Text='<%# Eval("dirty_vatno") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox15"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label15" runat="server" Text='<%# Eval("dirty_vatno") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="12.2">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox16" runat="server" Text='<%# Eval("dirty_barrel") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox16"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label16" runat="server" Text='<%# Eval("dirty_barrel") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="13">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox17" runat="server" Text='<%# Eval("vat_no_13") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox17"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label17" runat="server" Text='<%# Eval("vat_no_13") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="14">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox18" runat="server" Text='<%# Eval("charge_no_14") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox18"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label18" runat="server" Text='<%# Eval("charge_no_14") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="15">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox19" runat="server" Text='<%# Eval("at_what_15") %>' 
                        Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="fTextBox19_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="fTextBox19">
                    </ajaxToolkit:MaskedEditExtender>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox19" runat="server" Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="TextBox19_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="TextBox19">
                    </ajaxToolkit:MaskedEditExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label19" runat="server" Text='<%# Eval("at_what_15") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
              <asp:CommandField ShowEditButton="True" />
              </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
              <!--end  -->
            
             <asp:GridView ID="GridView3" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" Font-Size="7pt" 
        onrowcreated="GridView3_RowCreated" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
        onrowcommand="GridView1_RowCommand" 
    onrowdatabound="GridView1_RowDataBound" DataKeyNames="code" 
        onrowcancelingedit="GridView3_RowCancelingEdit" 
        onrowediting="GridView3_RowEditing" onrowupdating="GridView3_RowUpdating">
        <RowStyle ForeColor="#000066" />
        <Columns>
            
            
            <asp:TemplateField HeaderText="16">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox20" runat="server" Text='<%# Eval("at_what_16") %>' 
                        Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="fTextBox20_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="fTextBox20">
                    </ajaxToolkit:MaskedEditExtender>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox20" runat="server" Width="68px"></asp:TextBox>
                    <ajaxToolkit:MaskedEditExtender ID="TextBox20_MaskedEditExtender" 
                        runat="server" AcceptAMPM="True" CultureAMPMPlaceholder="" 
                        CultureCurrencySymbolPlaceholder="" CultureDateFormat="" 
                        CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99:99:99" MaskType="Time" TargetControlID="TextBox20">
                    </ajaxToolkit:MaskedEditExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label20" runat="server" Text='<%# Eval("at_what_16") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="17">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox21" runat="server" Text='<%# Eval("how_murch_17") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox21"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label21" runat="server" Text='<%# Eval("how_murch_17") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="18.1">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox22" runat="server" 
                        Text='<%# Eval("rosin_pro_18_1") %>' Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox22"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label22" runat="server" Text='<%# Eval("rosin_pro_18_1") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
             <asp:TemplateField HeaderText="18.1.1">
                 <EditItemTemplate>
                     <asp:TextBox ID="fTextBox221" runat="server" Text='<%# Eval("weight_qtl") %>' 
                         Width="68px"></asp:TextBox>
                 </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox221"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label221" runat="server" Text='<%# Eval("rosin_pro_18_11") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
             <asp:TemplateField HeaderText="18.1.2">
                 <EditItemTemplate>
                     <asp:TextBox ID="fTextBox222" runat="server" Text='<%# Eval("weight_kgs") %>' 
                         Width="68px"></asp:TextBox>
                 </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox222"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label222" runat="server" Text='<%# Eval("rosin_pro_18_112") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="18.2">
                <EditItemTemplate>
                    <asp:TextBox ID="fpgit" runat="server" Text='<%# Eval("rosin_pro_18_11") %>' 
                        Width="44px"></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="pgit" runat="server" Width="44px">0</asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="pgi" runat="server" Text='<%# Eval("rosin_pro_18_111") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="18.2.1">
                <EditItemTemplate>
                    <asp:TextBox ID="fpgit" runat="server" Text='<%# Eval("rosin_pro_18_111") %>' 
                        Width="44px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox23"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label23" runat="server" Text='<%# Eval("weight_qtl") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="18.2.2">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox24" runat="server" 
                        Text='<%# Eval("rosin_pro_18_112") %>' Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox24"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label24" runat="server" Text='<%# Eval("weight_kgs") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="19">
                <EditItemTemplate>
                    <asp:DropDownList ID="fDropDownList1" runat="server" 
                        SelectedValue='<%# Eval("rosin_grade") %>'>
                        <asp:ListItem>X</asp:ListItem>
                        <asp:ListItem>WW</asp:ListItem>
                        <asp:ListItem>WG</asp:ListItem>
                        <asp:ListItem>N</asp:ListItem>
                        <asp:ListItem>M</asp:ListItem>
                        <asp:ListItem>K</asp:ListItem>
                        <asp:ListItem>H</asp:ListItem>
                        <asp:ListItem>D</asp:ListItem>
                        <asp:ListItem>B</asp:ListItem>
                    </asp:DropDownList>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:DropDownList ID="DropDownList1" runat="server">
                        <asp:ListItem>X</asp:ListItem>
                        <asp:ListItem>WW</asp:ListItem>
                        <asp:ListItem>WG</asp:ListItem>
                        <asp:ListItem>N</asp:ListItem>
                        <asp:ListItem>M</asp:ListItem>
                        <asp:ListItem>K</asp:ListItem>
                        <asp:ListItem>H</asp:ListItem>
                        <asp:ListItem>D</asp:ListItem>
                        <asp:ListItem>B</asp:ListItem>
                    </asp:DropDownList>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label25" runat="server" Text='<%# Eval("rosin_grade") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="20">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox26" runat="server" Text='<%# Eval("tur_20") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox26"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label26" runat="server" Text='<%# Eval("tur_20") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="21">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox27" runat="server" Text='<%# Eval("tank_21") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox27"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label27" runat="server" Text='<%# Eval("tank_21") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                    <asp:CommandField ShowEditButton="True" />
                    </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
             <!--end  -->
            
             <asp:GridView ID="GridView4" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" Font-Size="7pt" 
        onrowcreated="GridView4_RowCreated" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
        onrowcommand="GridView1_RowCommand" 
    onrowdatabound="GridView1_RowDataBound" DataKeyNames="code" 
        onrowcancelingedit="GridView4_RowCancelingEdit" 
        onrowediting="GridView4_RowEditing" onrowdeleting="GridView4_RowDeleting" 
        onrowupdating="GridView4_RowUpdating">
        <RowStyle ForeColor="#000066" />
        <Columns>
            
            <asp:TemplateField HeaderText="22">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox28" runat="server" Text='<%# Eval("how_many_22") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox28"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label28" runat="server" Text='<%# Eval("how_many_22") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="23.1">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox29" runat="server" 
                        Text='<%# Eval("sakki_found_qlts") %>' Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox29"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label29" runat="server" Text='<%# Eval("sakki_found_qlts") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="23.2">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox30" runat="server" 
                        Text='<%# Eval("sakki_found_kgs") %>' Width="68px"></asp:TextBox>
                </EditItemTemplate>
              <FooterTemplate>
                    <asp:TextBox ID="TextBox30"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label30" runat="server" Text='<%# Eval("sakki_found_kgs") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="24">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox31" runat="server" Text='<%# Eval("name_of_24") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
             <FooterTemplate>
                    <asp:TextBox ID="TextBox31"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label31" runat="server" Text='<%# Eval("name_of_24") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="25.1">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox32" runat="server" Text='<%# Eval("how_much_qtls") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
             <FooterTemplate>
                    <asp:TextBox ID="TextBox32"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label32" runat="server" Text='<%# Eval("how_much_qlts") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="25.2">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox33" runat="server" Text='<%# Eval("how_much_kgs") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
             <FooterTemplate>
                    <asp:TextBox ID="TextBox33"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label33" runat="server" Text='<%# Eval("how_much_kgs") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="26">
                <EditItemTemplate>
                    <asp:TextBox ID="fTextBox34" runat="server" Text='<%# Eval("remarks") %>' 
                        Width="68px"></asp:TextBox>
                </EditItemTemplate>
             <FooterTemplate>
                    <asp:TextBox ID="TextBox34"  Text="0" runat="server" Width="68px"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label34" runat="server" Text='<%# Eval("remarks") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField>
                <FooterTemplate>
                    <asp:LinkButton ID="Submit" runat="server" CommandName="submit">Submit</asp:LinkButton>
                    <br />
                    <asp:LinkButton ID="LinkButton2" runat="server" CommandName="view">View Record</asp:LinkButton>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:CommandField ShowEditButton="True" />
            <asp:CommandField ShowDeleteButton="True" />
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc08] where at_what_5!='ss'" 
        
        
        
        
        
        
        InsertCommand="INSERT INTO fc08(dt, shift, steam_p_time, steam_p_press, resin_con_time, resin_con_kgs, resin_con_nooftins, at_what_5, times_6, putting_7, how_many_8, how_much_9, how_much_10, at_what_11, dirty_vatno, dirty_barrel, vat_no_13, charge_no_14, at_what_15, at_what_16, how_murch_17, rosin_pro_18_1, weight_qtl, weight_kgs, rosin_grade, tur_20, tank_21, how_many_22, sakki_found_qlts, sakki_found_kgs, name_of_24, how_much_qlts, how_much_kgs, remarks,rosin_pro_18_11,rosin_pro_18_111,rosin_pro_18_112) VALUES (@dt, @shift, @steam_p_time, @steam_p_press, @resin_con_time, @resin_con_kgs, @resin_con_nooftins, @at_what_5, @times_6, @putting_7, @how_many_8, @how_much_9, @how_much_10, @at_what_11, @dirty_vatno, @dirty_barrel, @vat_no_13, @charge_no_14, @at_what_15, @at_what_16, @how_murch_17, @rosin_pro_18_1, @weight_qtl, @weight_kgs, @rosin_grade, @tur_20, @tank_21, @how_many_22, @sakki_found_qlts, @sakki_found_kgs, @name_of_24, @how_much_qlts, @how_much_kgs, @remarks,@rosin_pro_18_11,@rosin_pro_18_111,@rosin_pro_18_112)" 
        
        UpdateCommand="update fc08 set dt=@dt, shift=@shift, steam_p_time=@steam_p_time, steam_p_press=@steam_p_press, resin_con_time=@resin_con_time, resin_con_kgs=@resin_con_kgs, resin_con_nooftins=@resin_con_nooftins, at_what_5=@at_what_5, times_6=@times_6, putting_7=@putting_7, how_many_8=@how_many_8,  where code=@code" 
        DeleteCommand="delete from fc08 where code=@code">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="shift" />
            <asp:Parameter Name="steam_p_time" />
            <asp:Parameter Name="steam_p_press" />
            <asp:Parameter Name="resin_con_time" />
            <asp:Parameter Name="resin_con_kgs" />
            <asp:Parameter Name="resin_con_nooftins" />
            <asp:Parameter Name="at_what_5" />
            <asp:Parameter Name="times_6" />
            <asp:Parameter Name="putting_7" />
            <asp:Parameter Name="how_many_8" />
            <asp:Parameter Name="how_much_9" />
            <asp:Parameter Name="how_much_10" />
            <asp:Parameter Name="at_what_11" />
            <asp:Parameter Name="dirty_vatno" />
            <asp:Parameter Name="dirty_barrel" />
            <asp:Parameter Name="vat_no_13" />
            <asp:Parameter Name="charge_no_14" />
            <asp:Parameter Name="at_what_15" />
            <asp:Parameter Name="at_what_16" />
            <asp:Parameter Name="how_murch_17" />
            <asp:Parameter Name="rosin_pro_18_1" />
            <asp:Parameter Name="weight_qtl" />
            <asp:Parameter Name="weight_kgs" />
            <asp:Parameter Name="rosin_grade" />
            <asp:Parameter Name="tur_20" />
            <asp:Parameter Name="tank_21" />
            <asp:Parameter Name="how_many_22" />
            <asp:Parameter Name="sakki_found_qlts" />
            <asp:Parameter Name="sakki_found_kgs" />
            <asp:Parameter Name="name_of_24" />
            <asp:Parameter Name="how_much_qlts" />
            <asp:Parameter Name="how_much_kgs" />
            <asp:Parameter Name="remarks" />
            <asp:Parameter Name="rosin_pro_18_11" />
            <asp:Parameter Name="rosin_pro_18_111" />
            <asp:Parameter Name="rosin_pro_18_112" />
        </InsertParameters>
        <UpdateParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="shift" />
            <asp:Parameter Name="steam_p_time" />
            <asp:Parameter Name="steam_p_press" />
            <asp:Parameter Name="resin_con_time" />
            <asp:Parameter Name="resin_con_kgs" />
            <asp:Parameter Name="resin_con_nooftins" />
            <asp:Parameter Name="at_what_5" />
            <asp:Parameter Name="times_6" />
            <asp:Parameter Name="putting_7" />
            <asp:Parameter Name="how_many_8" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc08] where at_what_5!='ss'" 
        
        
        
        
        
        
        InsertCommand="INSERT INTO fc08(dt, shift, steam_p_time, steam_p_press, resin_con_time, resin_con_kgs, resin_con_nooftins, at_what_5, times_6, putting_7, how_many_8, how_much_9, how_much_10, at_what_11, dirty_vatno, dirty_barrel, vat_no_13, charge_no_14, at_what_15, at_what_16, how_murch_17, rosin_pro_18_1, weight_qtl, weight_kgs, rosin_grade, tur_20, tank_21, how_many_22, sakki_found_qlts, sakki_found_kgs, name_of_24, how_much_qlts, how_much_kgs, remarks,rosin_pro_18_11,rosin_pro_18_111,rosin_pro_18_112) VALUES (@dt, @shift, @steam_p_time, @steam_p_press, @resin_con_time, @resin_con_kgs, @resin_con_nooftins, @at_what_5, @times_6, @putting_7, @how_many_8, @how_much_9, @how_much_10, @at_what_11, @dirty_vatno, @dirty_barrel, @vat_no_13, @charge_no_14, @at_what_15, @at_what_16, @how_murch_17, @rosin_pro_18_1, @weight_qtl, @weight_kgs, @rosin_grade, @tur_20, @tank_21, @how_many_22, @sakki_found_qlts, @sakki_found_kgs, @name_of_24, @how_much_qlts, @how_much_kgs, @remarks,@rosin_pro_18_11,@rosin_pro_18_111,@rosin_pro_18_112)" 
        
        UpdateCommand="update fc08 set how_much_9=@how_much_9, how_much_10=@how_much_10, at_what_11=@at_what_11, dirty_vatno=@dirty_vatno, dirty_barrel=@dirty_barrel, vat_no_13=@vat_no_13, charge_no_14=@charge_no_14, at_what_15=@at_what_15 where code=@code">
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="shift" />
            <asp:Parameter Name="steam_p_time" />
            <asp:Parameter Name="steam_p_press" />
            <asp:Parameter Name="resin_con_time" />
            <asp:Parameter Name="resin_con_kgs" />
            <asp:Parameter Name="resin_con_nooftins" />
            <asp:Parameter Name="at_what_5" />
            <asp:Parameter Name="times_6" />
            <asp:Parameter Name="putting_7" />
            <asp:Parameter Name="how_many_8" />
            <asp:Parameter Name="how_much_9" />
            <asp:Parameter Name="how_much_10" />
            <asp:Parameter Name="at_what_11" />
            <asp:Parameter Name="dirty_vatno" />
            <asp:Parameter Name="dirty_barrel" />
            <asp:Parameter Name="vat_no_13" />
            <asp:Parameter Name="charge_no_14" />
            <asp:Parameter Name="at_what_15" />
            <asp:Parameter Name="at_what_16" />
            <asp:Parameter Name="how_murch_17" />
            <asp:Parameter Name="rosin_pro_18_1" />
            <asp:Parameter Name="weight_qtl" />
            <asp:Parameter Name="weight_kgs" />
            <asp:Parameter Name="rosin_grade" />
            <asp:Parameter Name="tur_20" />
            <asp:Parameter Name="tank_21" />
            <asp:Parameter Name="how_many_22" />
            <asp:Parameter Name="sakki_found_qlts" />
            <asp:Parameter Name="sakki_found_kgs" />
            <asp:Parameter Name="name_of_24" />
            <asp:Parameter Name="how_much_qlts" />
            <asp:Parameter Name="how_much_kgs" />
            <asp:Parameter Name="remarks" />
            <asp:Parameter Name="rosin_pro_18_11" />
            <asp:Parameter Name="rosin_pro_18_111" />
            <asp:Parameter Name="rosin_pro_18_112" />
        </InsertParameters>
        <UpdateParameters>
            <asp:Parameter Name="how_much_9" />
            <asp:Parameter Name="how_much_10" />
            <asp:Parameter Name="at_what_11" />
            <asp:Parameter Name="dirty_vatno" />
            <asp:Parameter Name="dirty_barrel" />
            <asp:Parameter Name="vat_no_13" />
            <asp:Parameter Name="charge_no_14" />
            <asp:Parameter Name="at_what_15" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc08] where at_what_5!='ss'" 
        
        
        
        
        
        
        InsertCommand="INSERT INTO fc08(dt, shift, steam_p_time, steam_p_press, resin_con_time, resin_con_kgs, resin_con_nooftins, at_what_5, times_6, putting_7, how_many_8, how_much_9, how_much_10, at_what_11, dirty_vatno, dirty_barrel, vat_no_13, charge_no_14, at_what_15, at_what_16, how_murch_17, rosin_pro_18_1, weight_qtl, weight_kgs, rosin_grade, tur_20, tank_21, how_many_22, sakki_found_qlts, sakki_found_kgs, name_of_24, how_much_qlts, how_much_kgs, remarks,rosin_pro_18_11,rosin_pro_18_111,rosin_pro_18_112) VALUES (@dt, @shift, @steam_p_time, @steam_p_press, @resin_con_time, @resin_con_kgs, @resin_con_nooftins, @at_what_5, @times_6, @putting_7, @how_many_8, @how_much_9, @how_much_10, @at_what_11, @dirty_vatno, @dirty_barrel, @vat_no_13, @charge_no_14, @at_what_15, @at_what_16, @how_murch_17, @rosin_pro_18_1, @weight_qtl, @weight_kgs, @rosin_grade, @tur_20, @tank_21, @how_many_22, @sakki_found_qlts, @sakki_found_kgs, @name_of_24, @how_much_qlts, @how_much_kgs, @remarks,@rosin_pro_18_11,@rosin_pro_18_111,@rosin_pro_18_112)" 
        
        UpdateCommand="update fc08 set  at_what_16=@at_what_16, how_murch_17=@how_murch_17, rosin_pro_18_1=@rosin_pro_18_1, weight_qtl=@weight_qtl, weight_kgs=@weight_kgs, rosin_grade=@rosin_grade, tur_20=@tur_20, tank_21=@tank_21,,rosin_pro_18_11=@rosin_pro_18_11,rosin_pro_18_111=@rosin_pro_18_111,rosin_pro_18_112=@rosin_pro_18_112  where code=@code">
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="shift" />
            <asp:Parameter Name="steam_p_time" />
            <asp:Parameter Name="steam_p_press" />
            <asp:Parameter Name="resin_con_time" />
            <asp:Parameter Name="resin_con_kgs" />
            <asp:Parameter Name="resin_con_nooftins" />
            <asp:Parameter Name="at_what_5" />
            <asp:Parameter Name="times_6" />
            <asp:Parameter Name="putting_7" />
            <asp:Parameter Name="how_many_8" />
            <asp:Parameter Name="how_much_9" />
            <asp:Parameter Name="how_much_10" />
            <asp:Parameter Name="at_what_11" />
            <asp:Parameter Name="dirty_vatno" />
            <asp:Parameter Name="dirty_barrel" />
            <asp:Parameter Name="vat_no_13" />
            <asp:Parameter Name="charge_no_14" />
            <asp:Parameter Name="at_what_15" />
            <asp:Parameter Name="at_what_16" />
            <asp:Parameter Name="how_murch_17" />
            <asp:Parameter Name="rosin_pro_18_1" />
            <asp:Parameter Name="weight_qtl" />
            <asp:Parameter Name="weight_kgs" />
            <asp:Parameter Name="rosin_grade" />
            <asp:Parameter Name="tur_20" />
            <asp:Parameter Name="tank_21" />
            <asp:Parameter Name="how_many_22" />
            <asp:Parameter Name="sakki_found_qlts" />
            <asp:Parameter Name="sakki_found_kgs" />
            <asp:Parameter Name="name_of_24" />
            <asp:Parameter Name="how_much_qlts" />
            <asp:Parameter Name="how_much_kgs" />
            <asp:Parameter Name="remarks" />
            <asp:Parameter Name="rosin_pro_18_11" />
            <asp:Parameter Name="rosin_pro_18_111" />
            <asp:Parameter Name="rosin_pro_18_112" />
        </InsertParameters>
        <UpdateParameters>
            <asp:Parameter Name="at_what_16" />
            <asp:Parameter Name="how_murch_17" />
            <asp:Parameter Name="rosin_pro_18_1" />
            <asp:Parameter Name="weight_qtl" />
            <asp:Parameter Name="weight_kgs" />
            <asp:Parameter Name="rosin_grade" />
            <asp:Parameter Name="tur_20" />
            <asp:Parameter Name="tank_21" />
            <asp:Parameter Name="code" />
            <asp:Parameter Name="rosin_pro_18_11" />
            <asp:Parameter Name="rosin_pro_18_111" />
            <asp:Parameter Name="rosin_pro_18_112" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc08] where at_what_5!='ss'" 
        
        
        
        
        
        
        InsertCommand="INSERT INTO fc08(dt, shift, steam_p_time, steam_p_press, resin_con_time, resin_con_kgs, resin_con_nooftins, at_what_5, times_6, putting_7, how_many_8, how_much_9, how_much_10, at_what_11, dirty_vatno, dirty_barrel, vat_no_13, charge_no_14, at_what_15, at_what_16, how_murch_17, rosin_pro_18_1, weight_qtl, weight_kgs, rosin_grade, tur_20, tank_21, how_many_22, sakki_found_qlts, sakki_found_kgs, name_of_24, how_much_qlts, how_much_kgs, remarks,rosin_pro_18_11,rosin_pro_18_111,rosin_pro_18_112) VALUES (@dt, @shift, @steam_p_time, @steam_p_press, @resin_con_time, @resin_con_kgs, @resin_con_nooftins, @at_what_5, @times_6, @putting_7, @how_many_8, @how_much_9, @how_much_10, @at_what_11, @dirty_vatno, @dirty_barrel, @vat_no_13, @charge_no_14, @at_what_15, @at_what_16, @how_murch_17, @rosin_pro_18_1, @weight_qtl, @weight_kgs, @rosin_grade, @tur_20, @tank_21, @how_many_22, @sakki_found_qlts, @sakki_found_kgs, @name_of_24, @how_much_qlts, @how_much_kgs, @remarks,@rosin_pro_18_11,@rosin_pro_18_111,@rosin_pro_18_112)" 
        
        UpdateCommand="update fc08 set  how_many_22=@how_many_22, sakki_found_qlts=@sakki_found_qlts, sakki_found_kgs=@sakki_found_kgs, name_of_24=@name_of_24, how_much_qlts=@how_much_qlts, how_much_kgs=@how_much_kgs, remarks=@remarks where code=@code" 
        DeleteCommand="delete from fc08 where code=@code">
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="shift" />
            <asp:Parameter Name="steam_p_time" />
            <asp:Parameter Name="steam_p_press" />
            <asp:Parameter Name="resin_con_time" />
            <asp:Parameter Name="resin_con_kgs" />
            <asp:Parameter Name="resin_con_nooftins" />
            <asp:Parameter Name="at_what_5" />
            <asp:Parameter Name="times_6" />
            <asp:Parameter Name="putting_7" />
            <asp:Parameter Name="how_many_8" />
            <asp:Parameter Name="how_much_9" />
            <asp:Parameter Name="how_much_10" />
            <asp:Parameter Name="at_what_11" />
            <asp:Parameter Name="dirty_vatno" />
            <asp:Parameter Name="dirty_barrel" />
            <asp:Parameter Name="vat_no_13" />
            <asp:Parameter Name="charge_no_14" />
            <asp:Parameter Name="at_what_15" />
            <asp:Parameter Name="at_what_16" />
            <asp:Parameter Name="how_murch_17" />
            <asp:Parameter Name="rosin_pro_18_1" />
            <asp:Parameter Name="weight_qtl" />
            <asp:Parameter Name="weight_kgs" />
            <asp:Parameter Name="rosin_grade" />
            <asp:Parameter Name="tur_20" />
            <asp:Parameter Name="tank_21" />
            <asp:Parameter Name="how_many_22" />
            <asp:Parameter Name="sakki_found_qlts" />
            <asp:Parameter Name="sakki_found_kgs" />
            <asp:Parameter Name="name_of_24" />
            <asp:Parameter Name="how_much_qlts" />
            <asp:Parameter Name="how_much_kgs" />
            <asp:Parameter Name="remarks" />
            <asp:Parameter Name="rosin_pro_18_11" />
            <asp:Parameter Name="rosin_pro_18_111" />
            <asp:Parameter Name="rosin_pro_18_112" />
        </InsertParameters>
        <UpdateParameters>
            <asp:Parameter Name="how_many_22" />
            <asp:Parameter Name="sakki_found_qlts" />
            <asp:Parameter Name="sakki_found_kgs" />
            <asp:Parameter Name="name_of_24" />
            <asp:Parameter Name="how_much_qlts" />
            <asp:Parameter Name="how_much_kgs" />
            <asp:Parameter Name="remarks" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
</asp:Content>

