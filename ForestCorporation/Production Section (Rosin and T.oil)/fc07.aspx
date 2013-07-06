<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc07.aspx.cs" Inherits="fc07" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 200px;
        }
        .style5
        {
            width: 158px;
        }
        .style6
        {
            width: 652px;
        }
        .style7
        {
            font-size: small;
            font-weight: bold;
            text-align: center;
            color: #FFFFFF;
            background-color: #006699;
        }
        .style8
        {
        }
        .style9
        {
            width: 125px;
        }
        .style10
        {
            width: 296px;
            height: 18px;
        }
        .style11
        {
            width: 125px;
            height: 18px;
        }
        .style12
        {
            height: 18px;
        }
        .style13
        {
            color: #FFFFFF;
            background-color: #006699;
        }
        .style14
        {
            width: 75px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
   
    <br />
   
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        InsertCommand="INSERT INTO fc07(dt, tin, drum, net_wt_ski, x_tpb, x_wt, ww_tpb, ww_wt, wg_tpb, wg_wt, n_tpb, n_wt, m_tpb, m_wt, k_tpb, k_wt, h_tpb, h_wt, d_tpb, d_wt, b_tpb1, b_wt1,  t_oil, sign_pro_for, sign_fac_man) VALUES (@dt, @tin, @drum, @net_wt_ski, @x_tpb, @x_wt, @ww_tpb, @ww_wt, @wg_tpb, @wg_wt, @n_tpb, @n_wt, @m_tpb, @m_wt, @k_tpb, @k_wt, @h_tpb, @h_wt, @d_tpb, @d_wt, @b_tpb1,  @b_wt1,  @t_oil, @sign_pro_for, @sign_fac_man)" 
        SelectCommand="SELECT * FROM [fc07]" 
        UpdateCommand="UPDATE fc07 SET tin = @tin, drum = @drum, net_wt_ski = @net_wt_ski, x_tpb = @x_tpb, x_wt = @x_wt, ww_tpb = @ww_tpb, ww_wt = @ww_wt, wg_tpb = @wg_tpb, wg_wt = @wg_wt, n_tpb = @n_tpb, n_wt = @n_wt, m_tpb = @m_tpb, m_wt = @m_wt, k_tpb = @k_tpb, k_wt = @k_wt, h_tpb = @h_tpb, h_wt = @h_wt, d_tpb = @d_tpb, d_wt = @d_wt, b_tpb1 = @b_tpb1, b_wt1 = @b_wt1, t_oil = @t_oil, sign_pro_for = @sign_pro_for, sign_fac_man = @sign_fac_man where dt=@dt">
        <UpdateParameters>
            <asp:Parameter Name="tin" />
            <asp:Parameter Name="drum" />
            <asp:Parameter Name="net_wt_ski" />
            <asp:Parameter Name="x_tpb" />
            <asp:Parameter Name="x_wt" />
            <asp:Parameter Name="ww_tpb" />
            <asp:Parameter Name="ww_wt" />
            <asp:Parameter Name="wg_tpb" />
            <asp:Parameter Name="wg_wt" />
            <asp:Parameter Name="n_tpb" />
            <asp:Parameter Name="n_wt" />
            <asp:Parameter Name="m_tpb" />
            <asp:Parameter Name="m_wt" />
            <asp:Parameter Name="k_tpb" />
            <asp:Parameter Name="k_wt" />
            <asp:Parameter Name="h_tpb" />
            <asp:Parameter Name="h_wt" />
            <asp:Parameter Name="d_tpb" />
            <asp:Parameter Name="d_wt" />
            <asp:Parameter Name="b_tpb1" />
            <asp:Parameter Name="b_wt1" />
            <asp:Parameter Name="t_oil" />
            <asp:Parameter Name="sign_pro_for" />
            <asp:Parameter Name="sign_fac_man" />
            <asp:Parameter Name="dt" />
        </UpdateParameters>
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="tin" />
            <asp:Parameter Name="drum" />
            <asp:Parameter Name="net_wt_ski" />
            <asp:Parameter Name="x_tpb" />
            <asp:Parameter Name="x_wt" />
            <asp:Parameter Name="ww_tpb" />
            <asp:Parameter Name="ww_wt" />
            <asp:Parameter Name="wg_tpb" />
            <asp:Parameter Name="wg_wt" />
            <asp:Parameter Name="n_tpb" />
            <asp:Parameter Name="n_wt" />
            <asp:Parameter Name="m_tpb" />
            <asp:Parameter Name="m_wt" />
            <asp:Parameter Name="k_tpb" />
            <asp:Parameter Name="k_wt" />
            <asp:Parameter Name="h_tpb" />
            <asp:Parameter Name="h_wt" />
            <asp:Parameter Name="d_tpb" />
            <asp:Parameter Name="d_wt" />
            <asp:Parameter Name="b_tpb1" />
            <asp:Parameter Name="b_wt1" />
            <asp:Parameter Name="t_oil" />
            <asp:Parameter Name="sign_pro_for" />
            <asp:Parameter Name="sign_fac_man" />
        </InsertParameters>
    </asp:SqlDataSource>
    <br />
    <b>DAILY PRODUCTION REGISTER<br />
    <br />
    </b>
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style5">
   
    Select Date<br />
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
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
            </td>
            <td>
                <br />
            </td>
        </tr>
    </table>
    <br />
    <asp:GridView ID="GridView1" runat="server" BackColor="White" 
        BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
        style="font-size: 9pt" AutoGenerateColumns="False" 
        HorizontalAlign="Center" onrowcancelingedit="GridView1_RowCancelingEdit" 
        onrowdatabound="GridView1_RowDataBound" 
        onrowediting="GridView1_RowEditing" onrowupdating="GridView1_RowUpdating" 
        onrowcreated="GridView1_RowCreated" 
        onselectedindexchanged="GridView1_SelectedIndexChanged">
        <RowStyle ForeColor="#000066" />
        <Columns>
            <asp:TemplateField HeaderText="1.1">
                <ItemTemplate>
                    <asp:LinkButton  ID="Label1" runat="server" 
                        Text='<%# Container.DataItem %>' CommandName="select"></asp:LinkButton>
                </ItemTemplate>
               
            </asp:TemplateField>
            <asp:TemplateField HeaderText="1.2">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox1" runat="server" Text="0" Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label2" runat="server" ></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="1.3">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox2" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label3" runat="server"  ></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="1.4">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox3" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label4" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.1.1">
            
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox4" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label5" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
              <asp:TemplateField HeaderText="2.1.2">

             <ItemTemplate>
                    <asp:Label ID="w1" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                        <asp:TemplateField HeaderText="2.1.1">
            
            <ItemTemplate>                <asp:Label ID="gx" runat="server"></asp:Label>

                </ItemTemplate>
            </asp:TemplateField>

            <asp:TemplateField HeaderText="2.1.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label6" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>

            <asp:TemplateField HeaderText="2.2.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox6" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>

             <ItemTemplate>
                    <asp:Label ID="Label7" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
              <asp:TemplateField HeaderText="2.2.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox7" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label8" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                        <asp:TemplateField HeaderText="2.2.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
 <asp:Label ID="gww" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.2.2">
             
             <ItemTemplate>
                    <asp:Label ID="w2" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.3.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox8" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label9" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                          <asp:TemplateField HeaderText="2.3.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox9" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label10" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                        <asp:TemplateField HeaderText="2.3.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
                 <asp:Label ID="gwg" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.3.2">

             <ItemTemplate>
                    <asp:Label ID="w3" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.4.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox10" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label11" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.4.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox11" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label12" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.4.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
 <asp:Label ID="gn" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.4.2">
             
             <ItemTemplate>
                   <asp:Label ID="w4" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.5.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox12" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label13" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.5.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox13" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label14" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.5.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
 <asp:Label ID="gm" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.5.2">

             <ItemTemplate>
<asp:Label ID="w5" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.6.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox14" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label15" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                        <asp:TemplateField HeaderText="2.6.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox15" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
            
             <ItemTemplate>
                    <asp:Label ID="Label16" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.6.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
                 <asp:Label ID="gk" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.6.2">

             <ItemTemplate>
                    <asp:Label ID="w6" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.7.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox16" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label17" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                        <asp:TemplateField HeaderText="2.7.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox17" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label18" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.7.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
 <asp:Label ID="gh" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.7.2">

             <ItemTemplate>
                    <asp:Label ID="w7" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.8.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox18" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label19" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.8.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox19" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label20" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.8.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
                 <asp:Label ID="gd" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.8.2">

             <ItemTemplate>
                    <asp:Label ID="w8" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.9.1">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox20" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label21" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                        <asp:TemplateField HeaderText="2.9.2">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox21" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label22" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.9.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
                <asp:Label ID="gb" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.9.2">
             
             <ItemTemplate>
                    <asp:Label ID="w9" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.10.1">
           <%--  <EditItemTemplate>
                    <asp:TextBox ID="TextBox22" runat="server" Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>--%>
             <ItemTemplate>
                    <asp:Label ID="Label23" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
                        <asp:TemplateField HeaderText="2.10.2">
            <%-- <EditItemTemplate>
                    <asp:TextBox ID="TextBox23" runat="server" Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>--%>
            
             <ItemTemplate>
                    <asp:Label ID="Label24" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.10.1">
            
            <ItemTemplate>
<%--                    <asp:Label ID="Label5" runat="server"></asp:Label>--%>
                <asp:Label ID="gt" runat="server"></asp:Label>
               
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.10.2">
            <%-- <EditItemTemplate>
                    <asp:TextBox ID="TextBox23" runat="server" Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>--%>
            
             <ItemTemplate>
                  <asp:Label ID="w10" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.11">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox24" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label25" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.12">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox25" runat="server"   Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label26" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2.13">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox26" runat="server"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label27" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField>
            
            </asp:TemplateField>
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" 
            Font-Size="9pt" HorizontalAlign="Center" />
    </asp:GridView>
    <br />
    <table cellpadding="0" cellspacing="0" class="style6" border="1">
        <tr>
            <td class="style7" colspan="2">
                Remarks</td>
            <td class="style7" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style13" colspan="2" style="text-align: center">
                3</td>
            <td class="style13" style="text-align: center" colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style8">
                Production figures for the month of</td>
            <td class="style9">
                &nbsp;</td>
            <td style="margin-left: 40px" colspan="2">
                <asp:Label ID="Label28" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Resin received</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label29" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Less Sakki</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label30" runat="server" Text="0"></asp:Label>
                <asp:Label ID="Label61" runat="server" Text="Label" Visible="False"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Pure resin processed</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label31" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Resin under process during last month</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label48" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Total</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label49" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Resin under process during current month</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label50" runat="server" Text="428"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                pure resin Processed</td>
            <td class="style9">
                &nbsp;</td>
            <td class="style14">
                <asp:Label ID="Label51" runat="server" Text="0"></asp:Label>
            </td>
            <td>
                %</td>
        </tr>
        <tr>
            <td class="style8">
                Rosin recovered</td>
            <td class="style9">
                &nbsp;</td>
            <td class="style14">
                <asp:Label ID="Label52" runat="server" Text="0"></asp:Label>
            </td>
            <td>
                <asp:Label ID="Label57" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                T OIL recovered in ltrs.<asp:Label ID="Label53" runat="server" Text="0"></asp:Label>
            </td>
            <td class="style9">
                &nbsp;</td>
            <td class="style14">
                <asp:Label ID="Label54" runat="server" Text="0"></asp:Label>
            </td>
            <td>
                <asp:Label ID="Label58" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Processing waste</td>
            <td class="style9">
                &nbsp;</td>
            <td class="style14">
                <asp:Label ID="Label55" runat="server" Text="0"></asp:Label>
            </td>
            <td>
                <asp:Label ID="Label59" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Total</td>
            <td class="style9">
                &nbsp;</td>
            <td>
                <asp:Label ID="Label56" runat="server" Text="0"></asp:Label>
            </td>
            <td>
                <asp:Label ID="Label60" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Turpentine oil production</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label32" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Rosin percentage</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label33" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style10">
                Turpentine oil %</td>
            <td class="style11">
            </td>
            <td class="style12" colspan="2">
                <asp:Label ID="Label34" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Sakki percentage</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label35" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                Wastage %age</td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:Label ID="Label37" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8" colspan="4">
                Rosin grade wise</td>
        </tr>
        <tr>
            <td class="style8">
                X</td>
            <td class="style9" rowspan="4">
                Pale</td>
            <td colspan="2">
                <asp:Label ID="Label39" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                WW</td>
            <td colspan="2">
                <asp:Label ID="Label40" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                WG</td>
            <td colspan="2">
                <asp:Label ID="Label41" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                N</td>
            <td colspan="2">
                <asp:Label ID="Label42" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                M</td>
            <td class="style9" rowspan="3">
                Medium</td>
            <td colspan="2">
                <asp:Label ID="Label43" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style10">
                K</td>
            <td class="style12" colspan="2">
                <asp:Label ID="Label44" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                H</td>
            <td colspan="2">
                <asp:Label ID="Label45" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                D</td>
            <td class="style9" rowspan="2">
                Dark</td>
            <td colspan="2">
                <asp:Label ID="Label46" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                B</td>
            <td colspan="2">
                <asp:Label ID="Label47" runat="server" Text="0"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style8">
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc07] WHERE ([dt] = @dt)">
                    <SelectParameters>
                        <asp:Parameter DbType="Date" Name="dt" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td class="style9">
                &nbsp;</td>
            <td colspan="2">
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc08] WHERE ([dt] = @dt)">
                    <SelectParameters>
                        <asp:Parameter DbType="Date" Name="dt" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
</asp:Content>

