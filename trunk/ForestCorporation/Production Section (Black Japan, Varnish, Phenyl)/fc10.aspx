<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc10.aspx.cs" Inherits="fc10" Title="Untitled Page" %>

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
            color: #FFFFFF;
            background-color: #0066FF;
        }
        .style7
        {
            width: 158px;
            color: #FFFFFF;
            background-color: #0066FF;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <br /><b>PHENYL PRODUCTION REGISTER
    <br />
    </b>
    <br />
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style7">
   
    Select Date</td>
            <td class="style6">
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
                &nbsp;</td>
        </tr>
    </table>
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        onrowediting="GridView1_RowEditing" 
        onrowcancelingedit="GridView1_RowCancelingEdit" 
        onrowdatabound="GridView1_RowDataBound" 
        onrowupdating="GridView1_RowUpdating" BackColor="White" BorderColor="#CCCCCC" 
        BorderStyle="None" BorderWidth="1px" CellPadding="3" 
        style="font-size: 10pt" onrowcreated="GridView1_RowCreated">
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
                    <asp:TextBox ID="TextBox1" runat="server" Text=0 ></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label2" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="3">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox2" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label3" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="4">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox3" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label4" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="5">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox4" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label5" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="6">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label6" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="7">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox6" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label7" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="8">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox7" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="9">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox8" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="10">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox9" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="11">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox10" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label11" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="12">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox11" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label12" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="13">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox12" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label13" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="14">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox13" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label14" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="15">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox14" runat="server" Text=0></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label15" runat="server" Text="Label"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
           
            <asp:CommandField ShowEditButton="True" />
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        InsertCommand="INSERT INTO fc10(dt, r_b_g, c_o, s_c, cr_o, cr_a, ch_x, st_c, d_p, p_t, lot_no, b_n, S_ic, s_fm, rem) VALUES (@dt, @r_b_g, @c_o, @s_c, @cr_o, @cr_a, @ch_x, @st_c, @d_p, @p_t, @lot_no, @b_n, @S_ic, @s_fm, @rem)" 
        SelectCommand="SELECT * FROM [fc10]" 
        UpdateCommand="UPDATE fc10 SET r_b_g = @r_b_g, c_o = @c_o, s_c = @s_c, cr_o = @cr_o, cr_a = @cr_a, ch_x = @ch_x, st_c = @st_c, d_p = @d_p, p_t = @p_t, lot_no = @lot_no, b_n = @b_n, S_ic = @S_ic, s_fm = @s_fm, rem = @rem where dt=@dt">
        <UpdateParameters>
            <asp:Parameter Name="r_b_g" />
            <asp:Parameter Name="c_o" />
            <asp:Parameter Name="s_c" />
            <asp:Parameter Name="cr_o" />
            <asp:Parameter Name="cr_a" />
            <asp:Parameter Name="ch_x" />
            <asp:Parameter Name="st_c" />
            <asp:Parameter Name="d_p" />
            <asp:Parameter Name="p_t" />
            <asp:Parameter Name="lot_no" />
            <asp:Parameter Name="b_n" />
            <asp:Parameter Name="S_ic" />
            <asp:Parameter Name="s_fm" />
            <asp:Parameter Name="rem" />
            <asp:Parameter Name="dt" />
        </UpdateParameters>
        <InsertParameters>
            <asp:Parameter Name="dt" />
            <asp:Parameter Name="r_b_g" />
            <asp:Parameter Name="c_o" />
            <asp:Parameter Name="s_c" />
            <asp:Parameter Name="cr_o" />
            <asp:Parameter Name="cr_a" />
            <asp:Parameter Name="ch_x" />
            <asp:Parameter Name="st_c" />
            <asp:Parameter Name="d_p" />
            <asp:Parameter Name="p_t" />
            <asp:Parameter Name="lot_no" />
            <asp:Parameter Name="b_n" />
            <asp:Parameter Name="S_ic" />
            <asp:Parameter Name="s_fm" />
            <asp:Parameter Name="rem" />
        </InsertParameters>
    </asp:SqlDataSource>
    <br />
</asp:Content>

