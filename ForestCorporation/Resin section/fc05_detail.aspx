<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc05_detail.aspx.cs" Inherits="fc05" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 288px;
        }
        .style6
        {
            background-color: #0066FF;
            height: 16px;
            color: #FFFFFF;
        }
        .style7
        {
            width: 246px;
            margin-left: 40px;
        }
        .style9
        {
            height: 75px;
            width: 288px;
        }
        .style10
        {
            width: 246px;
            height: 75px;
        }
        .style11
        {
            width: 288px;
            height: 22px;
        }
        .style12
        {
            width: 246px;
            height: 22px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content3" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">

       <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <br />
    <br />
     <div>
          <asp:Panel ID="Panel2" runat="server" CssClass="collapsePanelHeader" Height="30px"> 
            <div style="padding:5px; cursor: pointer; vertical-align: middle;">
                <div style="float: left;">RESIN STOCK REGISTER</div>
                <div style="float: left; margin-left: 20px;">
                  <%--  <asp:Label ID="Label1" runat="server">(Show Details...)</asp:Label>--%>
                </div>
                <div style="float: right; vertical-align: middle;">
                   <%-- <asp:ImageButton ID="Image1" runat="server" ImageUrl="~/images/expand_blue.jpg" AlternateText="(Show Details...)"/>--%>
                </div>
            </div>
        </asp:Panel>
        <asp:Panel ID="Panel1" runat="server" CssClass="collapsePanel" Height="0">
            <br />
            <table cellpadding="0" cellspacing="0" >
        <tr>
            <td class="style6" colspan="2">
                MATERIAL REQUISTION CUM ISSUE SLIP</td>
        </tr>
        <tr>
            <td class="style4">
                Pre-Number</td>
            <td class="style7">
              
                <asp:Label ID="Label25" runat="server" Text="1001"></asp:Label>
            </td>
        </tr>
                <tr>
                    <td class="style11">
                        Enter Date</td>
                    <td class="style12">
                        <asp:TextBox ID="TextBox2" runat="server" ontextchanged="TextBox2_TextChanged"></asp:TextBox>
                        <ajaxToolkit:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                            CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                            CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                            CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                            Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                        </ajaxToolkit:MaskedEditExtender>
                        <ajaxToolkit:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                            Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox2">
                        </ajaxToolkit:CalendarExtender>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Requistion no.</td>
                    <td class="style7">
                        <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Section</td>
                    <td class="style7">
                        <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Destination</td>
                    <td class="style7">
                        <asp:TextBox ID="des" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Materials required</td>
                    <td class="style7">
                        <asp:TextBox ID="material" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Particular</td>
                    <td class="style7">
                        <asp:TextBox ID="part" runat="server" Height="66px" TextMode="MultiLine"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Purpose</td>
                    <td class="style7">
                        <asp:TextBox ID="part0" runat="server" Height="66px" TextMode="MultiLine"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Quantity Requisitioned</td>
                    <td class="style7">
                        <asp:TextBox ID="qty" runat="server" Wrap="False"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="style4">
                        Issues Qty.<asp:RadioButtonList ID="RadioButtonList1" runat="server" 
                            RepeatColumns="2">
                            <asp:ListItem Selected="True">Tins</asp:ListItem>
                            <asp:ListItem>Drum</asp:ListItem>
                        </asp:RadioButtonList>
                    </td>
                    <td class="style7">
                        <asp:TextBox ID="tins_drums" runat="server"></asp:TextBox>
                        <asp:Label ID="Label26" runat="server" Text="0"></asp:Label>
                    </td>
                </tr>
        <tr>
            <td class="style4">
                Net weight with sakki</td>
            <td class="style7">
                <asp:TextBox ID="net_wt_sakki" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Remarks</td>
            <td class="style7">
                <asp:TextBox ID="remark" runat="server" Height="73px" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
                <tr>
                    <td class="style9">
                    </td>
                    <td class="style10">
                        <asp:Button ID="Button1" runat="server" BorderColor="#006600" BorderWidth="1px" 
                            onclick="Button1_Click" Text="Save" />
                        <ajaxToolkit:ConfirmButtonExtender ID="Button1_ConfirmButtonExtender" 
                            runat="server" ConfirmOnFormSubmit="True" ConfirmText="You want to save record" 
                            Enabled="True" TargetControlID="Button1">
                        </ajaxToolkit:ConfirmButtonExtender>
                        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                            InsertCommand="INSERT INTO fc05(Date, Particular,Des,section,Material,Pur,Qty, Reqslipno, stype, notin, netsakki, rem) VALUES (@Date, @Particular,@Des,@section,@Material,@Pur,@Qty, @Reqslipno, @stype, @notin, @netsakki, @rem)" 
                            SelectCommand="SELECT * FROM [fc05] order by reqslipno">
                            <InsertParameters>
                                <asp:Parameter DefaultValue="" Name="Date" />
                                <asp:ControlParameter ControlID="part" Name="Particular" PropertyName="Text" />
                                <asp:ControlParameter ControlID="Label25" Name="Reqslipno" 
                                    PropertyName="Text" />
                                <asp:ControlParameter ControlID="RadioButtonList1" Name="stype" 
                                    PropertyName="SelectedValue" />
                                <asp:ControlParameter ControlID="tins_drums" Name="notin" PropertyName="Text" />
                                <asp:ControlParameter ControlID="net_wt_sakki" Name="netsakki" 
                                    PropertyName="Text" />
                                <asp:ControlParameter ControlID="remark" Name="rem" PropertyName="Text" />
                                <asp:ControlParameter ControlID="des" Name="Des" PropertyName="Text" />
                                <asp:ControlParameter ControlID="material" Name="Material" 
                                    PropertyName="Text" />
                                <asp:ControlParameter ControlID="qty" Name="Qty" PropertyName="Text" />
                                <asp:ControlParameter ControlID="part0" Name="Pur" PropertyName="Text" />
                                <asp:ControlParameter ControlID="TextBox4" Name="section" PropertyName="Text" />
                            </InsertParameters>
                        </asp:SqlDataSource>
                    </td>
                </tr>
    </table>
        </asp:Panel>
          Select Date<br />
          <asp:DropDownList ID="month" runat="server" AutoPostBack="True" 
              onselectedindexchanged="month_SelectedIndexChanged">
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
              onselectedindexchanged="yer_SelectedIndexChanged">
          </asp:DropDownList>
        <br />
    </div>
    
     <ajaxToolkit:CollapsiblePanelExtender ID="cpeDemo" runat="Server"
        TargetControlID="Panel1"
        ExpandControlID="Panel2"
        CollapseControlID="Panel2" 
        Collapsed="True"
        TextLabelID="Label1"
        ImageControlID="Image1"    
        ExpandedText="(Hide Details...)"
        CollapsedText="(Show Details...)"
        ExpandedImage="~/images/collapse_blue.jpg"
        CollapsedImage="~/images/expand_blue.jpg"
        SuppressPostBack="true"
        SkinID="CollapsiblePanelDemo" />

    
    <br />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        
        
        
        SelectCommand="SELECT        *
FROM            fc05
order BY Date">
    </asp:SqlDataSource>
  
    

    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" ondatabound="GridView1_DataBound" 
        onrowdatabound="GridView1_RowDataBound" style="font-size: small" 
        onrowupdating="GridView1_RowUpdating" onrowcommand="GridView1_RowCommand" 
        onrowediting="GridView1_RowEditing" 
    onselectedindexchanged="GridView1_SelectedIndexChanged">
        <RowStyle ForeColor="#000066" />
        <Columns>
            <asp:TemplateField HeaderText="Date">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                    <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                        CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                    </cc1:MaskedEditExtender>
                    <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                        Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox1">
                    </cc1:CalendarExtender>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:LinkButton ID="Label27" runat="server" CommandName="select" 
                        Text="<%# Container.DataItem %>"></asp:LinkButton>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Particular">
                <ItemTemplate>
                    <asp:Label ID="Label28" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Daily resin receipt register folio no.">
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="OB Tins/Drum">
                <ItemTemplate>
                    <asp:Label ID="Label37" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="OB Net Wt. Sakki">
                <ItemTemplate>
                    <asp:Label ID="Label38" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No. of tins/drum">
                <ItemTemplate>
                    <asp:Label ID="Label3" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Net weight with sakki">
                <ItemTemplate>
                    <asp:Label ID="Label22" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No. of tins/drum">
                <ItemTemplate>
                    <asp:Label ID="Label23" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Net weight with sakki">
                <ItemTemplate>
                    <asp:Label ID="Label24" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Requistion slip">
                <ItemTemplate>
             <%--  <asp:LinkButton ID="dd"  runat="server" CommandName="select"></asp:LinkButton>--%>
                    <asp:Label ID="Label29" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No. of tins/drum">
                <ItemTemplate>
                    <asp:Label ID="Label30" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Net weight with sakki">
                <ItemTemplate>
                    <asp:Label ID="Label31" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No. of tins/drum">
                <ItemTemplate>
                    <asp:Label ID="Label33" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Net weight with sakki">
                <ItemTemplate>
                    <asp:Label ID="Label32" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No. of tins/drum (5.1-7.1)">
                <ItemTemplate>
                    <asp:Label ID="Label34" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Net weight with sakki (5.2-7.2)">
                <ItemTemplate>
                    <asp:Label ID="Label35" runat="server" Text="0"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Remarks">
                <ItemTemplate>
                    <asp:Label ID="Label36" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
      
    

</asp:Content>


