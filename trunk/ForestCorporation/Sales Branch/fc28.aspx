<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc28.aspx.cs" Inherits="fc27" Title="Untitled Page" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <p>
          &nbsp;</p>
    <p>
          Sale Day Book<asp:DropDownList ID="month" runat="server" AutoPostBack="True" 
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
          <asp:ScriptManager ID="ScriptManager1" runat="server">
          </asp:ScriptManager>
        </p>
    <p>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" onrowcreated="GridView1_RowCreated" 
            onrowdatabound="GridView1_RowDataBound" style="font-size: small" 
            onrowcancelingedit="GridView1_RowCancelingEdit" 
            onrowediting="GridView1_RowEditing" onrowupdating="GridView1_RowUpdating" 
            ShowFooter="True">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="1">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                    </FooterTemplate>
                    <ItemTemplate>
                    <%#sr %>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2">

                    <FooterTemplate>
                        <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                                                                  <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                            CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                            CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                            CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                            Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                        </cc1:MaskedEditExtender>
                        <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                            Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
                        </cc1:CalendarExtender>
                    </FooterTemplate>
                    <ItemTemplate>
                        <asp:Label ID="Label1" runat="server" 
                            Text='<%# Container.DataItem %>'></asp:Label>
                    </ItemTemplate>

                </asp:TemplateField>
                <asp:TemplateField HeaderText="3">
               
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                  
            <cc1:MaskedEditExtender ID="TextBox3_MaskedEditExtender" runat="server" 
                AcceptAMPM="True" CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99:99:99" MaskType="Time" TargetControlID="TextBox3">
            </cc1:MaskedEditExtender>
                    </FooterTemplate>
               
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="9">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox9" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.1">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox10" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.2">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox11" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox12" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12">
                    <FooterTemplate>
                        <asp:TextBox ID="TextBox13" runat="server"></asp:TextBox>
                    </FooterTemplate>
                </asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        </asp:GridView>
        <br />
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
            InsertCommand="INSERT INTO c21(dt, TCS) VALUES (@dt, @TCS)" 
            SelectCommand="SELECT * FROM [fc27]">
            <InsertParameters>
                <asp:Parameter Name="dt" />
                <asp:Parameter Name="TCS" />
            </InsertParameters>
        </asp:SqlDataSource>
    </p>
    <p>
        &nbsp;</p>
</asp:Content>

