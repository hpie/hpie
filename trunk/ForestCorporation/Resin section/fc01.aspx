<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc01.aspx.cs" Inherits="fc01" Title="Untitled Page" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    </asp:Content>
<asp:Content ID="Content2" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">
    <asp:UpdatePanel ID="dd" runat="server">
    <ContentTemplate>
    
  
        <table class="style1">
    <tr>
        <td colspan="2" style="text-align: center" class="style4">
           
            WEIGHMENT SLIP<asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager></td>
    </tr>
    <tr>
        <td class="style5">
            Search Pre Numbered</td>
        <td>
            <asp:DropDownList ID="DropDownList1" runat="server" 
                DataSourceID="SqlDataSource1" DataTextField="preno" DataValueField="preno">
            </asp:DropDownList>
            <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Print" 
                ValidationGroup="print" />
            <asp:Button ID="Button3" runat="server" onclick="Button3_Click" 
                Text="Delete Record" />
            <ajaxToolkit:ConfirmButtonExtender ID="Button3_ConfirmButtonExtender" 
                runat="server" ConfirmText="You want to delete record" Enabled="True" 
                TargetControlID="Button3">
            </ajaxToolkit:ConfirmButtonExtender>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Pre Numbered</td>
        <td>
            <asp:Label ID="Label3" runat="server" Text="Label" ForeColor="Black"></asp:Label>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Date<Date</td>
        <td>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <ajaxToolkit:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
            </ajaxToolkit:MaskedEditExtender>
            <ajaxToolkit:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
            </ajaxToolkit:CalendarExtender>
            
            <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                ControlToValidate="TextBox1" ErrorMessage="RequiredFieldValidator" 
                ForeColor="Red" ToolTip="Not Empty" ValidationGroup="MKE">Not Empty</asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Type     </td>
        <td>
            <asp:RadioButtonList ID="RadioButtonList1" runat="server" AutoPostBack="True" 
                onselectedindexchanged="RadioButtonList1_SelectedIndexChanged" 
                RepeatColumns="2" ForeColor="Black">
                <asp:ListItem Selected="True">Tins</asp:ListItem>
                <asp:ListItem>Drum</asp:ListItem>
            </asp:RadioButtonList>
                        </td>
    </tr>
    <tr>
        <td class="style5">
            No Of&nbsp;
            <asp:Label ID="Label1" runat="server">Tins</asp:Label>
        </td>
        <td>
            <asp:TextBox ID="tins" runat="server" Height="22px" Width="50px">0</asp:TextBox>
            <asp:TextBox ID="tins0" runat="server" Height="21px" Width="50px" 
                Visible="False">0</asp:TextBox>
                        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" 
                runat="server" ControlToValidate="tins" 
                ErrorMessage="No Of&nbsp; TinsTinsTins" ValidationGroup="MKE" 
                ForeColor="Red"></asp:RequiredFieldValidator>
                        </td>
    </tr>
    <tr>
        <td class="style5">
            Gross Weight with Truck (qtl.)</td>
        <td>
            <asp:TextBox ID="gross_w_w_t" runat="server" AutoPostBack="True" 
                ontextchanged="gross_w_w_t_TextChanged">0</asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                ControlToValidate="gross_w_w_t" ErrorMessage="Gross Weight with Truck" 
                ValidationGroup="MKE" ForeColor="Red"></asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Empty Truck Weight (qtl.)</td>
        <td>
            <asp:TextBox ID="empty_t_weight" runat="server" AutoPostBack="True" 
                ontextchanged="empty_t_weight_TextChanged">0</asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                ControlToValidate="empty_t_weight" ErrorMessage="Empty Truck Weight" 
                ForeColor="Red"></asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Gross Weight With Tin (qtl.)</td>
        <td>
            <asp:TextBox ID="gross_w_w_tin" runat="server" 
                ontextchanged="gross_w_w_tin_TextChanged" ReadOnly="True">0</asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                ControlToValidate="gross_w_w_tin" ErrorMessage="Gross Weight With Tin" 
                ForeColor="Red"></asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Standard
            <asp:Label ID="Label2" runat="server" Text="Tins"></asp:Label>
&nbsp; Weight (kg)</td>
        <td>
            <asp:TextBox ID="standard_l_weight" runat="server" AutoPostBack="True" 
                ontextchanged="standard_l_weight_TextChanged">0</asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                ControlToValidate="standard_l_weight" 
                ErrorMessage="Standard Label&nbsp; Weight" ForeColor="Red"></asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Net Resin Received With Sakki</td>
        <td>
            <asp:TextBox ID="net_resin" runat="server" ReadOnly="True">0</asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Challan No.</td>
        <td>
            <asp:TextBox ID="challan_no" runat="server">0</asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Dated</td>
        <td>
            <asp:TextBox ID="dt" runat="server">0</asp:TextBox>
            <cc1:MaskedEditExtender ID="dt_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="dt">
            </cc1:MaskedEditExtender>
            <cc1:CalendarExtender ID="dt_CalendarExtender" runat="server" Enabled="True" 
                TargetControlID="dt" Format="dd/MM/yyyy">
            </cc1:CalendarExtender>
            
        </td>
    </tr>
    <tr>
        <td class="style5">
            Vehicle No.</td>
        <td>
            <asp:TextBox ID="vehicle_n" runat="server">0</asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Time</td>
        <td>
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
            ValidationGroup="MKE" ForeColor="Red" 
           />
            <cc1:MaskedEditExtender ID="time_MaskedEditExtender" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="time">
            </cc1:MaskedEditExtender>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Water Contents </td>
        <td>
            <asp:TextBox ID="TextBox3" runat="server" AutoPostBack="True" 
                ontextchanged="TextBox3_TextChanged">0</asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Net Resin</td>
        <td>
            <asp:TextBox ID="TextBox4" runat="server">0</asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Resin FWD</td>
        <td>
            <asp:DropDownList ID="resin_u" runat="server" AppendDataBoundItems="True" 
                DataSourceID="SqlDataSource3" DataTextField="div" DataValueField="ID" 
                AutoPostBack="True">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [tbdiv]"></asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Pvt. Resin Owner</td>
        <td>
            <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            <ajaxToolkit:AutoCompleteExtender ID="TextBox5_AutoCompleteExtender" 
                runat="server" DelimiterCharacters="" Enabled="True" 
                ServiceMethod="GetCompletionList" ServicePath="" TargetControlID="TextBox5" 
                UseContextKey="True">
            </ajaxToolkit:AutoCompleteExtender>
        </td>
    </tr>
    <tr>
        <td class="style5">
            Resin unit</td>
        <td>
            <asp:DropDownList ID="DropDownList2" runat="server" 
                DataSourceID="SqlDataSource2" DataTextField="unit" DataValueField="id">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [tbunit] WHERE ([div] = @div)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="resin_u" Name="div" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
            <br />
            <asp:TextBox ID="TextBox2" runat="server" Visible="False"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                InsertCommandType="StoredProcedure" SelectCommand="SELECT * FROM [fc01] order by preno" 
                InsertCommand="fc01_ins" 
                DeleteCommand="DELETE FROM fc01 WHERE (PreNo = @preno)">
                <DeleteParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="preno" 
                        PropertyName="SelectedValue" />
                </DeleteParameters>
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
                    <asp:Parameter Name="ResFWD" Type="String" />
                    <asp:ControlParameter ControlID="Label3" Name="PreNo" PropertyName="Text" 
                        Type="Int32" />
                    <asp:Parameter Direction="ReturnValue" Name="RETURN_VALUE" Type="Int32" />
                    <asp:Parameter Name="Resunit" />
                    <asp:ControlParameter ControlID="TextBox3" Name="water" PropertyName="Text" 
                        Type="Decimal" />
                    <asp:ControlParameter ControlID="TextBox4" Name="water_wt" PropertyName="Text" 
                        Type="Decimal" />
                    <asp:ControlParameter ControlID="TextBox5" Name="pvt_name" PropertyName="Text" 
                        Type="String" />
                </InsertParameters>
            </asp:SqlDataSource>
        </td>
        <td >
         
            <asp:Button ID="Button2" runat="server" Text="Button" onclick="Button2_Click" 
                Visible="False" />
        </td>
    </tr>
    <tr>
        <td >
            &nbsp;</td>
        <td >
            &nbsp;</td>
    </tr>
</table>
  
    
      </ContentTemplate>
    </asp:UpdatePanel>
       <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
        ValidationGroup="MKE">Submit</asp:LinkButton>
</asp:Content>


