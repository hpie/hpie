<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc05_entry.aspx.cs" Inherits="fc05" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">

        .style6
        {
            background-color: #0066FF;
            height: 16px;
            color: #FFFFFF;
        }
        .style4
        {
            width: 288px;
        }
        .style7
        {
            width: 246px;
            margin-left: 40px;
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
        </style>
</asp:Content>
<asp:Content ID="Content3" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">

       <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <br />
            <table cellpadding="0" cellspacing="0" __designer:mapid="376" >
        <tr __designer:mapid="38b">
            <td class="style6" colspan="2" __designer:mapid="38c">
                MATERIAL REQUISTION CUM ISSUE SLIP</td>
        </tr>
        <tr __designer:mapid="38d">
            <td class="style4" __designer:mapid="38e">
                Pre-Number</td>
            <td class="style7" __designer:mapid="38f">
              
                <asp:Label ID="Label25" runat="server" Text="1001"></asp:Label>
            </td>
        </tr>
                <tr __designer:mapid="391">
                    <td class="style11" __designer:mapid="392">
                        Enter Date</td>
                    <td class="style12" __designer:mapid="393">
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
                <tr __designer:mapid="397">
                    <td class="style4" __designer:mapid="398">
                        Requistion no.</td>
                    <td class="style7" __designer:mapid="399">
                        <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr __designer:mapid="39b">
                    <td class="style4" __designer:mapid="39c">
                        Section</td>
                    <td class="style7" __designer:mapid="39d">
                        <asp:DropDownList ID="DropDownList1" runat="server" 
                            DataSourceID="SqlDataSource3" DataTextField="Store" DataValueField="Store">
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                            SelectCommand="SELECT * FROM [Storename]"></asp:SqlDataSource>
                    </td>
                </tr>
                <tr __designer:mapid="39f">
                    <td class="style4" __designer:mapid="3a0">
                        Destination</td>
                    <td class="style7" __designer:mapid="3a1">
                        <asp:DropDownList ID="DropDownList2" runat="server" 
                            DataSourceID="SqlDataSource4" DataTextField="Store" DataValueField="Store">
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                            SelectCommand="SELECT * FROM [Storename]"></asp:SqlDataSource>
                    </td>
                </tr>
                <tr __designer:mapid="3a3">
                    <td class="style4" __designer:mapid="3a4">
                        Materials required</td>
                    <td class="style7" __designer:mapid="3a5">
                        <asp:DropDownList ID="DropDownList3" runat="server" 
                            DataSourceID="SqlDataSource5" DataTextField="Name" DataValueField="Name">
                        </asp:DropDownList>
                        <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                            SelectCommand="SELECT * FROM [tbitems]"></asp:SqlDataSource>
                    </td>
                </tr>
                <tr __designer:mapid="3a7">
                    <td class="style4" __designer:mapid="3a8">
                        Particular</td>
                    <td class="style7" __designer:mapid="3a9">
                        <asp:TextBox ID="part" runat="server" Height="66px" TextMode="MultiLine"></asp:TextBox>
                    </td>
                </tr>
                <tr __designer:mapid="3ab">
                    <td class="style4" __designer:mapid="3ac">
                        Purpose</td>
                    <td class="style7" __designer:mapid="3ad">
                        <asp:TextBox ID="part0" runat="server" Height="66px" TextMode="MultiLine"></asp:TextBox>
                    </td>
                </tr>
                <tr __designer:mapid="3af">
                    <td class="style4" __designer:mapid="3b0">
                        Quantity Requisitioned</td>
                    <td class="style7" __designer:mapid="3b1">
                        <asp:TextBox ID="qty" runat="server" Wrap="False"></asp:TextBox>
                    </td>
                </tr>
                <tr __designer:mapid="3c1">
                    <td class="style9" __designer:mapid="3c2">
                    </td>
                    <td class="style10" __designer:mapid="3c3">
                        <asp:Button ID="Button1" runat="server" BorderColor="#006600" BorderWidth="1px" 
                            onclick="Button1_Click" Text="Save" />
                        <ajaxToolkit:ConfirmButtonExtender ID="Button1_ConfirmButtonExtender" 
                            runat="server" ConfirmOnFormSubmit="True" ConfirmText="You want to save record" 
                            Enabled="True" TargetControlID="Button1">
                        </ajaxToolkit:ConfirmButtonExtender>
                        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                            InsertCommand="INSERT INTO fc05(Date, Particular,Des,section,Material,Pur,Qty, Reqslipno) VALUES (@Date, @Particular,@Des,@section,@Material,@Pur,@Qty, @Reqslipno)" 
                            SelectCommand="SELECT * FROM [fc05] order by reqslipno">
                            <InsertParameters>
                                <asp:Parameter DefaultValue="" Name="Date" />
                                <asp:ControlParameter ControlID="part" Name="Particular" PropertyName="Text" />
                                <asp:ControlParameter ControlID="Label25" Name="Reqslipno" 
                                    PropertyName="Text" />
                                <asp:ControlParameter ControlID="DropDownList2" Name="Des" 
                                    PropertyName="SelectedValue" />
                                <asp:ControlParameter ControlID="DropDownList3" Name="Material" 
                                    PropertyName="SelectedValue" />
                                <asp:ControlParameter ControlID="qty" Name="Qty" PropertyName="Text" />
                                <asp:ControlParameter ControlID="part0" Name="Pur" PropertyName="Text" />
                                <asp:ControlParameter ControlID="DropDownList1" Name="section" 
                                    PropertyName="SelectedValue" />
                            </InsertParameters>
                        </asp:SqlDataSource>
                    </td>
                </tr>
    </table>
    <br />
     <div class="demoarea">
          <br />
          <asp:DropDownList ID="month" runat="server" AutoPostBack="True" 
              onselectedindexchanged="month_SelectedIndexChanged" Visible="False">
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
              onselectedindexchanged="yer_SelectedIndexChanged" Visible="False">
          </asp:DropDownList>
        <br />
    </div>
    
    
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" ondatabound="GridView1_DataBound" 
        onrowdatabound="GridView1_RowDataBound" style="font-size: small" 
        onrowupdating="GridView1_RowUpdating" onrowcommand="GridView1_RowCommand" 
        onrowediting="GridView1_RowEditing" 
    onselectedindexchanged="GridView1_SelectedIndexChanged" Visible="False">
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
                    <asp:Label ID="Label27" runat="server" 
                        Text='<%# Container.DataItem %>'></asp:Label>
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
                <%--<asp:LinkButton ID="dd" Text='<%# Eval("reqslipno") %>' runat="server" CommandName="select"></asp:LinkButton>--%>
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
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        
        
        
        SelectCommand="SELECT        *
FROM            fc05
order BY Date">
    </asp:SqlDataSource>
  
    

</asp:Content>


