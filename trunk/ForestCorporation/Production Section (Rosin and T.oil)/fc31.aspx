<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc31.aspx.cs" Inherits="fc31" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <br />
    <br />
    <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <asp:DropDownList ID="month" runat="server" AutoPostBack="True" onselectedindexchanged="month_SelectedIndexChanged" 
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
        onselectedindexchanged="yer_SelectedIndexChanged" style="height: 22px" 
              >
          </asp:DropDownList>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        InsertCommand="INSERT INTO fc31(dt, fm, t_o, steam_coal, fuel_wood, indent_number, rem) VALUES (@dt, @fm, @t_o, @steam_coal, @fuel_wood, @indent_number, @rem)" 
        SelectCommand="SELECT * FROM [fc31]">
            <InsertParameters>
                <asp:Parameter Name="dt" />
                <asp:Parameter Name="fm" />
                <asp:Parameter Name="t_o" />
                <asp:Parameter Name="steam_coal" />
                <asp:Parameter Name="fuel_wood" />
                <asp:Parameter Name="indent_number" />
                <asp:Parameter Name="rem" />
            </InsertParameters>
    </asp:SqlDataSource>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" onrowcreated="GridView1_RowCreated" 
        onrowediting="GridView1_RowEditing" ShowFooter="True" 
        onrowcommand="GridView1_RowCommand" 
        onrowdatabound="GridView1_RowDataBound" style="font-size: 10pt" 
        onrowcancelingedit="GridView1_RowCancelingEdit">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="1">
                    <ItemTemplate>
                        <asp:Label ID="Label1" runat="server" Text="<%# Container.DataItem %>"></asp:Label>
                    </ItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox7" runat="server" Width="80px"></asp:TextBox>
                        <cc1:MaskedEditExtender ID="TextBox7_MaskedEditExtender" runat="server" 
                            CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                            CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                            CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                            Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox7">
                        </cc1:MaskedEditExtender>
                        <cc1:CalendarExtender ID="TextBox7_CalendarExtender" runat="server" 
                            Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox7">
                        </cc1:CalendarExtender>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2.1">
                    <ItemTemplate>
                        <asp:Label ID="Label2" runat="server"></asp:Label>
                    </ItemTemplate>
                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox1" runat="server" 
                            Text='<%# Eval("fm","{0:dd/MM/yyyy}") %>'></asp:TextBox>
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
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2.2">
                    <ItemTemplate>
                        <asp:Label ID="Label3" runat="server"></asp:Label>
                    </ItemTemplate>
                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox2" runat="server" 
                            Text='<%# Eval("t_o","{0:dd/MM/yyyy}") %>'></asp:TextBox>
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
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3">
                    <ItemTemplate>
                        <asp:Label ID="Label4" runat="server"></asp:Label>
                    </ItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox10" runat="server" Width="80px"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.1">
                    <ItemTemplate>
                        <asp:Label ID="Label5" runat="server"></asp:Label>
                    </ItemTemplate>
                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox4" runat="server" Text='<%# Eval("steam_coal") %>'></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox11" runat="server" Width="80px"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4.2">
                    <ItemTemplate>
                        <asp:Label ID="Label6" runat="server"></asp:Label>
                    </ItemTemplate>
                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox5" runat="server" Text='<%# Eval("fuel_wood") %>'></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox12" runat="server" Width="80px"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5">
                    <ItemTemplate>
                        <asp:Label ID="Label7" runat="server"></asp:Label>
                    </ItemTemplate>
                    <EditItemTemplate>
                        <asp:TextBox ID="TextBox6" runat="server" Text='<%# Eval("indent_number") %>'></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox13" runat="server" Width="80px"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6.1">
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="7">
                    <EditItemTemplate>
                        <asp:TextBox ID="fTextBox14" runat="server" Text='<%# Eval("rem") %>' 
                            Width="80px"></asp:TextBox>
                    </EditItemTemplate>
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox14" runat="server" Width="80px"></asp:TextBox>
                
                    </FooterTemplate>
                      <ItemTemplate>
                        <asp:Label ID="Label8" runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                 <asp:TemplateField HeaderText="">
                    <FooterTemplate>
             
                        <asp:Button ID="Button1" runat="server" CommandName="add" Text="Add" />
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:CommandField />
                <asp:CommandField ShowEditButton="True" Visible="False" />
                <asp:CommandField ShowDeleteButton="True" Visible="False" />
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
</asp:Content>

