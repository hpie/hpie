<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc09.aspx.cs" Inherits="fc09" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 100%;
        }
        .style5
        {
            height: 22px;
        }
        .style6
        {
            height: 22px;
            width: 562px;
        }
        .style7
        {
            width: 562px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
   
    <br />
    <b>VARNISH PRODUCTION REGISTER
    <br />
    <br />
   
    </b>
    <br />
    <table cellpadding="0" cellspacing="0" class="style4" width="200px">
        <tr>
            <td class="style6">
                Select Date</td>
            <td class="style5">
            </td>
        </tr>
        <tr>
            <td class="style7">
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
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        InsertCommand="INSERT INTO fc09(dt, resin, rosin_h, rosin_b, raw_lin, bitu_black, toil_dtoil, db_lin_oil, lime_slak, lith_yel, lamp_black, stand_oil, steam_coal, batch_no, tank_no, production, prog__ve_tot, sig_of_sec, sig_of_fm_gm, remark) VALUES (@dt, @resin, @rosin_h, @rosin_b, @raw_lin, @bitu_black, @toil_dtoil, @db_lin_oil, @lime_slak, @lith_yel, @lamp_black, @stand_oil, @steam_coal, @batch_no, @tank_no, @production, @prog__ve_tot, @sig_of_sec, @sig_of_fm_gm, @remark)" 
        SelectCommand="SELECT * FROM [fc07]" 
        
        
        UpdateCommand="UPDATE fc09 SET resin =@resin, rosin_h =@rosin_h, rosin_b=@rosin_b, raw_lin =@raw_lin, bitu_black =@bitu_black, toil_dtoil =@toil_dtoil, db_lin_oil =@db_lin_oil, lime_slak =@lime_slak, lith_yel =@lith_yel, lamp_black =@lamp_black, stand_oil =@stand_oil, steam_coal =@steam_coal, batch_no =@batch_no, tank_no =@tank_no, production =@production, prog__ve_tot =@prog__ve_tot, sig_of_sec =@sig_of_sec, sig_of_fm_gm =@sig_of_fm_gm, remark =@remark where  dt =@dt ">
        <UpdateParameters>
            <asp:Parameter Name="resin" />
            <asp:Parameter Name="rosin_h" />
            <asp:Parameter Name="rosin_b" />
            <asp:Parameter Name="raw_lin" />
            <asp:Parameter Name="bitu_black" />
            <asp:Parameter Name="toil_dtoil" />
            <asp:Parameter Name="db_lin_oil" />
            <asp:Parameter Name="lime_slak" />
            <asp:Parameter Name="lith_yel" />
            <asp:Parameter Name="lamp_black" />
            <asp:Parameter Name="stand_oil" />
            <asp:Parameter Name="steam_coal" />
            <asp:Parameter Name="batch_no" />
            <asp:Parameter Name="tank_no" />
            <asp:Parameter Name="production" />
            <asp:Parameter Name="prog__ve_tot" />
            <asp:Parameter Name="sig_of_sec" />
            <asp:Parameter Name="sig_of_fm_gm" />
            <asp:Parameter Name="remark" />
            <asp:Parameter Name="dt" />
        </UpdateParameters>
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="resin" />
            <asp:Parameter Name="rosin_h" />
             <asp:Parameter Name="rosin_b" />
            <asp:Parameter Name="raw_lin" />
            <asp:Parameter Name="bitu_black" />
            <asp:Parameter Name="toil_dtoil" />
            <asp:Parameter Name="db_lin_oil" />
            <asp:Parameter Name="lime_slak" />
            <asp:Parameter Name="lith_yel" />
            <asp:Parameter Name="lamp_black" />
            <asp:Parameter Name="stand_oil" />
            <asp:Parameter Name="steam_coal" />
            <asp:Parameter Name="batch_no" />
            <asp:Parameter Name="tank_no" />
            <asp:Parameter Name="production" />
            <asp:Parameter Name="prog__ve_tot" />
            <asp:Parameter Name="sig_of_sec" />
            <asp:Parameter Name="sig_of_fm_gm" />
            <asp:Parameter Name="remark" />
        </InsertParameters>
    </asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <br />
    <asp:GridView ID="GridView1" runat="server" BackColor="White" 
        BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
        style="font-size: 9pt" AutoGenerateColumns="False" 
        HorizontalAlign="Center" onrowcancelingedit="GridView1_RowCancelingEdit" 
        onrowdatabound="GridView1_RowDataBound" 
        onrowediting="GridView1_RowEditing" onrowupdating="GridView1_RowUpdating" 
        onrowcreated="GridView1_RowCreated">
        <RowStyle ForeColor="#000066" />
        <Columns>
            <asp:TemplateField HeaderText="1">
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server" 
                        Text='<%# Container.DataItem %>'></asp:Label>
                </ItemTemplate>
               
            </asp:TemplateField>
            <asp:TemplateField HeaderText="2">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox1" runat="server" Text="0" Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label2" runat="server" ></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="3">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox2" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label3" runat="server"  ></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="4">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox3" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label4" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="5">
            
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox4" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label5" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="6">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label6" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="7">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox6" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label7" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="8">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox7" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label8" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="9">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox8" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label9" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="10">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox9" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label10" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="11">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox10" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label11" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="12">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox11" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label12" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="13">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox12" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label13" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="14">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox13" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label14" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="15">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox14" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label15" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="16">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox15" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
            
             <ItemTemplate>
                    <asp:Label ID="Label16" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="17">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox16" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label17" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="18">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox17" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label18" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="19">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox18" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label19" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="20">
             <EditItemTemplate>
                    <asp:TextBox ID="TextBox19" runat="server" Text="0"  Height="20px" Width="64px"></asp:TextBox>
                </EditItemTemplate>
             <ItemTemplate>
                    <asp:Label ID="Label20" runat="server"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
           
            <asp:CommandField ShowEditButton="True" />
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" 
            Font-Size="9pt" HorizontalAlign="Center" />
    </asp:GridView>
</asp:Content>

