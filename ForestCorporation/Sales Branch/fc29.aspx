<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc29.aspx.cs" Inherits="fc29" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
    .style2
    {
        width: 884px;
        border: 1px solid #000000;
    }
    .style3
    {
        width: 72px;
        font-size: small;
    }
    .style5
    {
        width: 72px;
        color: #FFFFFF;
        height: 18px;
        font-size: small;
        background-color: #009900;
    }
    .style7
    {
        width: 72px;
        text-align: center;
        font-size: small;
    }
    .style8
    {
        font-size: x-small;
    }
    .style11
    {
        text-align: center;
        font-size: small;
        width: 121px;
    }
    .style12
    {
        font-size: small;
        width: 121px;
    }
    .style14
    {
        width: 72px;
        font-size: small;
        height: 16px;
    }
    .style15
    {
        font-size: small;
        width: 121px;
        height: 16px;
    }
    .style16
    {
        color: #FFFFFF;
        height: 18px;
        font-size: small;
        background-color: #009900;
    }
    .style17
    {
        text-align: left;
        font-size: small;
        width: 130px;
    }
    .style18
    {
        font-size: small;
        height: 16px;
        width: 130px;
    }
    .style19
    {
        font-size: small;
        width: 130px;
    }
    .style20
    {
        color: #FFFFFF;
        height: 18px;
        font-size: small;
        width: 84px;
        background-color: #009900;
    }
    .style21
    {
        text-align: center;
        font-size: small;
        width: 84px;
    }
    .style22
    {
        font-size: small;
        height: 16px;
        width: 84px;
    }
    .style23
    {
        font-size: small;
        width: 84px;
    }
    .style24
    {
        color: #FFFFFF;
        height: 18px;
        font-size: small;
        width: 69px;
        background-color: #009900;
    }
    .style25
    {
        text-align: center;
        font-size: small;
        width: 69px;
    }
    .style26
    {
        font-size: small;
        height: 16px;
        width: 69px;
    }
    .style27
    {
        font-size: small;
        width: 69px;
    }
    .style28
    {
        color: #FFFFFF;
        height: 18px;
        font-size: small;
        width: 85px;
        background-color: #009900;
    }
    .style29
    {
        text-align: center;
        font-size: small;
        width: 85px;
    }
    .style30
    {
        font-size: small;
        height: 16px;
        width: 85px;
    }
    .style31
    {
        font-size: small;
        width: 85px;
    }
    .style32
    {
        color: #FFFFFF;
        height: 18px;
        font-size: small;
        width: 96px;
        background-color: #009900;
    }
    .style33
    {
        text-align: center;
        font-size: small;
        width: 96px;
    }
    .style34
    {
        font-size: small;
        height: 16px;
        width: 96px;
    }
    .style35
    {
        font-size: small;
        width: 96px;
    }
    .style36
    {
        color: #FFFFFF;
        height: 18px;
        font-size: small;
        width: 88px;
        background-color: #009900;
    }
    .style37
    {
        text-align: center;
        font-size: small;
        width: 88px;
    }
    .style38
    {
        font-size: small;
        height: 16px;
        width: 88px;
    }
    .style39
    {
        font-size: small;
        width: 88px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <br />
    <asp:DropDownList ID="month" runat="server" AutoPostBack="True" 
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
              >
          </asp:DropDownList>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" onrowdatabound="GridView1_RowDataBound" 
    onrowcreated="GridView1_RowCreated">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="1">
                <ItemTemplate>
                <%#sr  %>
                </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2">
                    <ItemTemplate>
                        <asp:Label ID="Label1" runat="server" Text="<%# Container.DataItem %>"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3"></asp:TemplateField>
                <asp:TemplateField HeaderText="4"></asp:TemplateField>
                <asp:TemplateField HeaderText="5"></asp:TemplateField>
                <asp:TemplateField HeaderText="6"></asp:TemplateField>
                <asp:TemplateField HeaderText="7"></asp:TemplateField>
                <asp:TemplateField HeaderText="8"></asp:TemplateField>
                <asp:TemplateField HeaderText="9"></asp:TemplateField>
                <asp:TemplateField HeaderText="10"></asp:TemplateField>
                <asp:TemplateField HeaderText="11"></asp:TemplateField>
                <asp:TemplateField HeaderText="12"></asp:TemplateField>
                <asp:TemplateField HeaderText="13"></asp:TemplateField>
                <asp:TemplateField HeaderText="14"></asp:TemplateField>
                <asp:TemplateField HeaderText="15.1"></asp:TemplateField>
                <asp:TemplateField HeaderText="15.2"></asp:TemplateField>
                <asp:TemplateField HeaderText="15.3"></asp:TemplateField>
                <asp:TemplateField HeaderText="16"></asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
<br />
<table cellpadding="0" cellspacing="0" class="style2">
    <tr class="style8">
        <td class="style32">
            No of Charge</td>
        <td class="style36">
            Grage</td>
        <td class="style28">
            G.L Drum</td>
        <td class="style24">
            Tin Patra</td>
        <td class="style5">
            Tin</td>
        <td class="style20">
            T.Oil Production</td>
        <td class="style16" colspan="2">
            Reasons of Low Production Foreman</td>
    </tr>
    <tr class="style8">
        <td class="style33">
            1</td>
        <td class="style37">
            2</td>
        <td class="style29">
            3</td>
        <td class="style25">
            4</td>
        <td class="style7">
            5</td>
        <td class="style21">
            6</td>
        <td class="style17">
            Pale
        </td>
        <td class="style11">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style34">
        </td>
        <td class="style38">
            X</td>
        <td class="style30">
        </td>
        <td class="style26">
        </td>
        <td class="style14">
        </td>
        <td class="style22">
        </td>
        <td class="style18">
            Charge %</td>
        <td class="style15">
        </td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            WW</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            Medium</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            WG</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            Charge %</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            N</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            Dark</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            M</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            Charge%</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            K</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            &nbsp;</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            H</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            &nbsp;</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            D</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            &nbsp;</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            &nbsp;</td>
        <td class="style39">
            B</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            &nbsp;</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
    <tr class="style8">
        <td class="style35">
            Total</td>
        <td class="style39">
            &nbsp;</td>
        <td class="style31">
            &nbsp;</td>
        <td class="style27">
            &nbsp;</td>
        <td class="style3">
            &nbsp;</td>
        <td class="style23">
            &nbsp;</td>
        <td class="style19">
            &nbsp;</td>
        <td class="style12">
            &nbsp;</td>
    </tr>
</table>
</asp:Content>

