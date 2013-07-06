<%@ Page Language="C#" MasterPageFile="~/Admin/MasterPage.master" AutoEventWireup="true" CodeFile="OB.aspx.cs" Inherits="Admin_OB" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
    .style2
    {
        width: 440px;
    }
    .style3
    {
        font-size: medium;
        font-family: Verdana;
        height: 29px;
    }
    .style4
    {
        width: 174px;
        font-size: medium;
        font-family: Verdana;
        height: 29px;
    }
    .style6
    {
        width: 133px;
        font-size: medium;
        font-family: Verdana;
        height: 26px;
        background-color: #000066;
    }
    .style7
    {
        width: 174px;
        font-size: medium;
        font-family: Verdana;
        height: 26px;
        color: #FFFFFF;
        background-color: #000066;
    }
    .style9
    {
        width: 133px;
        font-size: medium;
        font-family: Verdana;
        height: 35px;
    }
    .style10
    {
        width: 174px;
        font-size: medium;
        font-family: Verdana;
        height: 35px;
    }
    .style12
    {
        width: 133px;
        font-size: medium;
        font-family: Verdana;
        height: 34px;
    }
    .style13
    {
        width: 174px;
        font-size: medium;
        font-family: Verdana;
        height: 34px;
    }
    .style15
    {
        width: 133px;
        font-size: medium;
        font-family: Verdana;
        height: 36px;
    }
    .style16
    {
        width: 174px;
        font-size: medium;
        font-family: Verdana;
        height: 36px;
    }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style2">
    <tr>
        <td class="style6">
        </td>
        <td class="style7">
            Stock Item&#39;s OB</td>
    </tr>
    <tr>
        <td class="style9">
            Items</td>
        <td class="style10">
            <asp:DropDownList ID="DropDownList2" runat="server" 
                DataSourceID="SqlDataSource3" DataTextField="Name" DataValueField="ID">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [tbitems]"></asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style9">
            Type</td>
        <td class="style10">
            <asp:RadioButtonList ID="RadioButtonList1" runat="server" 
                RepeatDirection="Horizontal">
                <asp:ListItem>Tins</asp:ListItem>
                <asp:ListItem>Drums</asp:ListItem>
            </asp:RadioButtonList>
        </td>
    </tr>
    <tr>
        <td class="style12">
            Qty</td>
        <td class="style13">
            <asp:TextBox ID="TextBox1" runat="server">0</asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style15">
            Qtl./Kg</td>
        <td class="style16">
            <asp:TextBox ID="TextBox2" runat="server">0</asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style3">
            Session</td>
        <td class="style4">
            <asp:DropDownList ID="DropDownList1" runat="server">
            </asp:DropDownList>
        </td>
    </tr>
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td class="style4">
            <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource1" DataTextField="session" DataValueField="code" 
                onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="132px">
            </asp:ListBox>
        </td>
    </tr>
    <tr>
        <td class="style3" colspan="2">
            <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                Text="Save" Width="55px" />
            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                Text="New Record" Width="94px" />
            <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                Text="Update" />
            <asp:Button ID="Button4" runat="server" Enabled="False" onclick="Button4_Click" 
                Text="Delete" />
        </td>
    </tr>
    <tr>
        <td class="style3">
            &nbsp;</td>
        <td class="style4">
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                DeleteCommand="DELETE FROM ob WHERE (session = @session)" 
                InsertCommand="INSERT INTO ob(type, obtin, obqtl, dt,session,itemcode) VALUES (@type, @obtin, @obqtl, @dt,@session,@itemcode)" 
                SelectCommand="SELECT * FROM [ob]" 
                
                
                UpdateCommand="UPDATE ob SET type =@type, obtin =@obtin, obqtl =@obqtl, dt =@dt, session =@session,itemcode=@itemcode where code=@code">
                <DeleteParameters>
                    <asp:Parameter Name="session" />
                </DeleteParameters>
                <UpdateParameters>
                    <asp:ControlParameter ControlID="RadioButtonList1" Name="type" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="TextBox1" Name="obtin" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox2" Name="obqtl" PropertyName="Text" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="dt" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="session" />
                    <asp:ControlParameter ControlID="ListBox1" Name="code" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="itemcode" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:Parameter Name="type" />
                    <asp:ControlParameter ControlID="TextBox1" Name="obtin" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox2" Name="obqtl" PropertyName="Text" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="dt" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="session" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="itemcode" 
                        PropertyName="SelectedValue" />
                </InsertParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                SelectCommand="SELECT * FROM [ob] where session=@session">
                <SelectParameters>
                    <asp:Parameter Name="session" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:Label ID="Label1" runat="server"></asp:Label>
        </td>
    </tr>
</table>
</asp:Content>

