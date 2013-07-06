<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc11.aspx.cs" Inherits="fc011" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style5
        {
            font-size: 9pt;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
   
    <br />
    <b>BLACK JAPAN PRODUCTION REGISTER
    </b>


     <br /> 
    <br />
    <span class="style5">Select Date<br />
          <br />
          </span>
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
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        InsertCommand="INSERT INTO fc011(dt, rosin_grade, t_oil, bitu, lime, black_lamp, steam_fuel, daily_prod, prog_tot, lot_no, batch_no, sign_sub, sign_fm_gm, remark) VALUES (@dt, @rosin_grade, @t_oil, @bitu, @lime, @black_lamp, @steam_fuel, @daily_prod, @prog_tot, @lot_no, @batch_no, @sign_sub, @sign_fm_gm, @remark)" 
        SelectCommand="SELECT * FROM [fc07]" 
        
        
        
        UpdateCommand="UPDATE fc011 SET rosin_grade =@rosin_grade, t_oil =@t_oil, bitu =@bitu, lime =@lime, black_lamp =@black_lamp, steam_fuel =@steam_fuel, daily_prod =@daily_prod, prog_tot =@prog_tot, lot_no =@lot_no, batch_no =@batch_no, sign_sub =@sign_sub, sign_fm_gm =@sign_fm_gm, remark =@remark where dt=@dt">
        <UpdateParameters>
            <asp:Parameter Name="rosin_grade" />
            <asp:Parameter Name="t_oil" />
            <asp:Parameter Name="bitu" />
            <asp:Parameter Name="lime" />
            <asp:Parameter Name="black_lamp" />
            <asp:Parameter Name="steam_fuel" />
            <asp:Parameter Name="daily_prod" />
            <asp:Parameter Name="prog_tot" />
            <asp:Parameter Name="lot_no" />
            <asp:Parameter Name="batch_no" />
            <asp:Parameter Name="sign_sub" />
            <asp:Parameter Name="sign_fm_gm" />
            <asp:Parameter Name="remark" />
            <asp:Parameter Name="dt" />
        </UpdateParameters>
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="rosin_grade" />
            <asp:Parameter Name="t_oil" />
             <asp:Parameter Name="bitu" />
            <asp:Parameter Name="lime" />
            <asp:Parameter Name="black_lamp" />
            <asp:Parameter Name="steam_fuel" />
            <asp:Parameter Name="daily_prod" />
            <asp:Parameter Name="prog_tot" />
            <asp:Parameter Name="lot_no" />
            <asp:Parameter Name="batch_no" />
            <asp:Parameter Name="sign_sub" />
            <asp:Parameter Name="sign_fm_gm" />
            <asp:Parameter Name="remark" />
        </InsertParameters>
    </asp:SqlDataSource>
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
           
            <asp:CommandField ShowEditButton="True" />
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" 
            Font-Size="9pt" HorizontalAlign="Center" />
    </asp:GridView>
</asp:Content>

