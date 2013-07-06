<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc32_report.aspx.cs" Inherits="fc31" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 531px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 161px;
        }
        .style4
        {
            text-align: center;
        }
        .style5
        {
            width: 355px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <br />
    <br />
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <asp:DropDownList ID="month" runat="server" AutoPostBack="True" 
        onselectedindexchanged="month_SelectedIndexChanged" Visible="False" 
              >
              <asp:ListItem Value="1">Jan</asp:ListItem>
              <asp:ListItem Value="2">Feb</asp:ListItem>
              <asp:ListItem Value="3">March</asp:ListItem>
              <asp:ListItem Value="4">April</asp:ListItem>
              <asp:ListItem Value="5">May</asp:ListItem>
              <asp:ListItem Value="6">June</asp:ListItem>
              <asp:ListItem Value="7">July</asp:ListItem>
              <asp:ListItem Value="8">Aug</asp:ListItem>
              <asp:ListItem Value="9">Sep</asp:ListItem>
              <asp:ListItem Value="10">Oct</asp:ListItem>
              <asp:ListItem Value="11">Nov</asp:ListItem>
              <asp:ListItem Value="12">Dec</asp:ListItem>
          </asp:DropDownList>
          <asp:DropDownList ID="yer" runat="server" AutoPostBack="True" 
        onselectedindexchanged="yer_SelectedIndexChanged" style="height: 22px" Visible="False" 
              >
          </asp:DropDownList>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        InsertCommand="INSERT INTO fc32(f_time, t_time, sf_time, st_time, f_oil, t_oil, B_steam, t_oil_ser, PH_water, Water_charge, F_oil_ex, Particulars, time,dt,shift,fur_exp,water_ch,blow_time,shif_in) VALUES (@f_time, @t_time, @sf_time, @st_time, @f_oil, @t_oil, @B_steam, @t_oil_ser, @PH_water, @Water_charge, @F_oil_ex, @Particulars, @time,@dt,@shift,@fur_exp,@water_ch,@blow_time,@shif_in)" 
        
        SelectCommand="SELECT * FROM [fc32] where dt=@dt and shift=@shift ">
            <InsertParameters>
                <asp:Parameter Name="f_time" />
                <asp:Parameter Name="t_time" />
                <asp:Parameter Name="sf_time" />
                <asp:Parameter Name="st_time" />
                <asp:Parameter Name="f_oil" />
                <asp:Parameter Name="t_oil" />
                <asp:Parameter Name="B_steam" />
                <asp:Parameter Name="t_oil_ser" />
                <asp:Parameter Name="PH_water" />
                <asp:Parameter Name="Water_charge" />
                <asp:Parameter Name="F_oil_ex" />
                <asp:Parameter Name="Particulars" />
                <asp:Parameter Name="time" />
                <asp:Parameter Name="dt" />
                <asp:ControlParameter ControlID="DropDownList1" Name="shift" 
                    PropertyName="SelectedValue" />
                <asp:ControlParameter ControlID="TextBox22" Name="fur_exp" 
                    PropertyName="Text" />
                <asp:ControlParameter ControlID="TextBox23" Name="water_ch" 
                    PropertyName="Text" />
                <asp:ControlParameter ControlID="TextBox24" Name="blow_time" 
                    PropertyName="Text" />
                <asp:ControlParameter ControlID="TextBox21" Name="shif_in" 
                    PropertyName="Text" />
            </InsertParameters>
            <SelectParameters>
                <asp:Parameter Name="dt" />
                <asp:QueryStringParameter Name="shift" QueryStringField="Shift" />
            </SelectParameters>
    </asp:SqlDataSource>
        <table cellpadding="0" cellspacing="0" class="style1" runat="server" visible=false>
            <tr>
                <td class="style4" colspan="2">
                    <strong>Boiler Log Book</strong></td>
            </tr>
            <tr>
                <td class="style2">
                    Date</td>
                <td class="style5">
                    <asp:TextBox ID="TextBox20" runat="server"></asp:TextBox>
                                            <cc1:MaskedEditExtender ID="TextBox20_MaskedEditExtender" runat="server" 
                            CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                            CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                            CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                            Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox20">
                        </cc1:MaskedEditExtender>
                        <cc1:CalendarExtender ID="TextBox20_CalendarExtender" runat="server" 
                            Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox20">
                        </cc1:CalendarExtender>
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                        ControlToValidate="TextBox20" ErrorMessage="RequiredFieldValidator">Valid Date</asp:RequiredFieldValidator>
                    (dd/MM/yyyy)</td>
            </tr>
            <tr>
                <td class="style2">
                    Shift</td>
                <td class="style5">
                    <asp:DropDownList ID="DropDownList1" runat="server">
                        <asp:ListItem>I</asp:ListItem>
                        <asp:ListItem>II</asp:ListItem>
                        <asp:ListItem>III</asp:ListItem>
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Shift Incharge</td>
                <td class="style5">
                    <asp:TextBox ID="TextBox21" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Furnace oil exp.</td>
                <td class="style5">
                    <asp:TextBox ID="TextBox22" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Water Charge</td>
                <td class="style5">
                    <asp:TextBox ID="TextBox23" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Blow down time</td>
                <td class="style5">
                    <asp:TextBox ID="TextBox24" runat="server"></asp:TextBox>
                     <cc1:MaskedEditExtender ID="time2_MaskedEditExtender" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="TextBox24">
            </cc1:MaskedEditExtender>
                </td>

            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    <asp:Button ID="Button2" runat="server" Text="Search" onclick="Button2_Click" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    &nbsp;</td>
                <td class="style5">
                    &nbsp;</td>
                
            </tr>
    </table>
    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" onrowdatabound="GridView2_RowDataBound">
        <Columns>
            <asp:BoundField DataField="Dt" HeaderText="Date" SortExpression="Dt" />
            <asp:BoundField DataField="shift" HeaderText="Shift" SortExpression="shift" />
            <asp:BoundField DataField="Shif_in" HeaderText="Shift Incharge" 
                SortExpression="Shif_in" />
            <asp:BoundField DataField="Fur_exp" HeaderText="Furnace oil exp." 
                SortExpression="Fur_exp" />
            <asp:BoundField DataField="Water_ch" HeaderText="Water Charge" 
                SortExpression="Water_ch" />
            <asp:BoundField DataField="Blow_time" HeaderText="Blow Down Time" 
                SortExpression="Blow_time" />
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <RowStyle ForeColor="#000066" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <SortedAscendingCellStyle BackColor="#F1F1F1" />
        <SortedAscendingHeaderStyle BackColor="#007DBB" />
        <SortedDescendingCellStyle BackColor="#CAC9C9" />
        <SortedDescendingHeaderStyle BackColor="#00547E" />
                </asp:GridView>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        
        SelectCommand="SELECT [Dt], [shift], [Fur_exp], [Water_ch], [Blow_time], [Shif_in] FROM [fc32] where dt=@dt and shift=@shift">
            <SelectParameters>
                <asp:Parameter Name="dt" />
                <asp:QueryStringParameter Name="shift" QueryStringField="shift" />
            </SelectParameters>
    </asp:SqlDataSource>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" onrowcreated="GridView1_RowCreated" 
        onrowediting="GridView1_RowEditing" 
        onrowcommand="GridView1_RowCommand" 
        onrowdatabound="GridView1_RowDataBound" style="font-size: 10pt" 
        onrowcancelingedit="GridView1_RowCancelingEdit">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="1">

                    <FooterTemplate>
                        <asp:TextBox ID="TextBox7" runat="server" Width="80px"></asp:TextBox>
                                    <ajaxToolkit:MaskedEditValidator ID="MaskedEditValidator31" runat="server"
            ControlExtender="time_MaskedEditExtender"
            ControlToValidate="TextBox7"
            IsValidEmpty="False"
            EmptyValueMessage="Time is required"
            InvalidValueMessage="Time is invalid"
            Display="Dynamic"
            TooltipMessage="Input a time"
            EmptyValueBlurredText="*"
            InvalidValueBlurredMessage="*"
            ValidationGroup="MKE" 
           />
            <cc1:MaskedEditExtender ID="time_MaskedEditExtender33" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="TextBox7">
            </cc1:MaskedEditExtender>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label5" runat="server" Text='<%# Eval("time") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2.1">

                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                                 <asp:TextBox ID="time" runat="server">0</asp:TextBox>
            <ajaxToolkit:MaskedEditValidator ID="MaskedEditValidator3" runat="server"
            ControlExtender="time_MaskedEditExtender"
            ControlToValidate="time"
            IsValidEmpty="False"
            EmptyValueMessage="Time is required"
            InvalidValueMessage="Time is invalid"
            Display="Dynamic"
            TooltipMessage="Input a time"
            EmptyValueBlurredText="*"
            InvalidValueBlurredMessage="*"
            ValidationGroup="MKE" 
           />
            <cc1:MaskedEditExtender ID="time_MaskedEditExtender" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="time">
            </cc1:MaskedEditExtender>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label6" runat="server" Text='<%# Eval("f_time") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2.2">

                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                                 <asp:TextBox ID="time2" runat="server">0</asp:TextBox>
            <ajaxToolkit:MaskedEditValidator ID="MaskedEditValidator4" runat="server"
            ControlExtender="time2_MaskedEditExtender"
            ControlToValidate="time2"
            IsValidEmpty="False"
            EmptyValueMessage="Time is required"
            InvalidValueMessage="Time is invalid"
            Display="Dynamic"
            TooltipMessage="Input a time"
            EmptyValueBlurredText="*"
            InvalidValueBlurredMessage="*"
            ValidationGroup="MKE" 
           />
            <cc1:MaskedEditExtender ID="time2_MaskedEditExtender" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="time2">
            </cc1:MaskedEditExtender>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label7" runat="server" Text='<%# Eval("t_time") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3.1">

                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox10" runat="server" Width="80px"></asp:TextBox>
                          <ajaxToolkit:MaskedEditValidator ID="MaskedEditValidator39" runat="server"
            ControlExtender="time_MaskedEditExtender"
            ControlToValidate="TextBox10"
            IsValidEmpty="False"
            EmptyValueMessage="Time is required"
            InvalidValueMessage="Time is invalid"
            Display="Dynamic"
            TooltipMessage="Input a time"
            EmptyValueBlurredText="*"
            InvalidValueBlurredMessage="*"
            ValidationGroup="MKE" 
           />
            <cc1:MaskedEditExtender ID="time_MaskedEditExtender40" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="TextBox10">
            </cc1:MaskedEditExtender>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label8" runat="server" Text='<%# Eval("sf_time") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3.2">

                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox11" runat="server" Width="80px"></asp:TextBox>
                          <ajaxToolkit:MaskedEditValidator ID="MaskedEditValidator41" runat="server"
            ControlExtender="time_MaskedEditExtender"
            ControlToValidate="TextBox11"
            IsValidEmpty="False"
            EmptyValueMessage="Time is required"
            InvalidValueMessage="Time is invalid"
            Display="Dynamic"
            TooltipMessage="Input a time"
            EmptyValueBlurredText="*"
            InvalidValueBlurredMessage="*"
            ValidationGroup="MKE" 
           />
            <cc1:MaskedEditExtender ID="time_MaskedEditExtender43" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="TextBox11">
            </cc1:MaskedEditExtender>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label19" runat="server" Text='<%# Eval("st_time") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4">

                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox12" runat="server" Width="80px"></asp:TextBox>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label9" runat="server" Text='<%# Eval("f_oil") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5">

                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox13" runat="server" Width="80px"></asp:TextBox>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label10" runat="server" Text='<%# Eval("t_oil") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox15" runat="server"></asp:TextBox>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label11" runat="server" Text='<%# Eval("b_steam") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox16" runat="server"></asp:TextBox>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label12" runat="server" Text='<%# Eval("t_oil_ser") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox14" runat="server" Width="80px"></asp:TextBox>
                
                    </FooterTemplate>
                    
                    <ItemTemplate>
                        <asp:Label ID="Label13" runat="server" Text='<%# Eval("ph_water") %>'></asp:Label>
                    </ItemTemplate>
                    
                </asp:TemplateField>
                 <asp:TemplateField HeaderText="9">
                     <FooterTemplate>
                         <asp:TextBox ID="TextBox17" runat="server"></asp:TextBox>
                     </FooterTemplate>
                     <ItemTemplate>
                         <asp:Label ID="Label14" runat="server" Text='<%# Eval("water_charge") %>'></asp:Label>
                     </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox18" runat="server"></asp:TextBox>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label15" runat="server" Text='<%# Eval("f_oil_ex") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox19" runat="server"></asp:TextBox>
                        
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label16" runat="server" Text='<%# Eval("particulars") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField>
             <FooterTemplate>
                <asp:Button ID="Button1" runat="server" CommandName="add" Text="Add" />
                </FooterTemplate>
                </asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
</asp:Content>

