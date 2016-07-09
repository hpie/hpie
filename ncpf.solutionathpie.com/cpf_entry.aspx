
<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master"  CodeFile="cpf_entry.aspx.cs" Inherits="cpf_entry" %>

<%--<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
   
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    </asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style6" colspan="2">
                CPF Detail</td>
        </tr>
        <tr>
            <td class="style3">
                Date</td>
            <td>
                Year<b><asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                </b>Month<b><asp:DropDownList ID="DropDownList2" runat="server" 
                    AutoPostBack="True" onselectedindexchanged="DropDownList2_SelectedIndexChanged">
                </asp:DropDownList>
                </b>
            </td>
        </tr>
        <tr>
            <td class="style3">
                AC</td>
                                    <td>
                                        <b>
                                        <asp:DropDownList ID="DropDownList3" runat="server" AutoPostBack="True" 
                                            DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC" 
                                            onselectedindexchanged="DropDownList3_SelectedIndexChanged">
                                        </asp:DropDownList>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style3">
                                        Name</td>
            <td>
                <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3">
                During Year</td>
            <td>
                <b>
                <asp:TextBox ID="TextBox1" runat="server">0</asp:TextBox>
                <asp:Label ID="Label3" runat="server"></asp:Label>
                </b></td>
        </tr>
        <tr>
            <td class="style3">
                Recovery of Advance</td>
            <td>
                <b>
                <asp:TextBox ID="TextBox3" runat="server">0</asp:TextBox>
                <asp:Label ID="Label4" runat="server"></asp:Label>
                </b></td>
        </tr>
        <tr>
            <td class="style3">
                Arear</td>
            <td>
                <asp:TextBox ID="arear" runat="server">0</asp:TextBox>
                <b>
                <asp:Label ID="Label5" runat="server"></asp:Label>
                </b>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Board Share</td>
            <td>
                <asp:TextBox ID="shared" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Division</td>
            <td>
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="Div" DataValueField="ID">
                    <asp:ListItem Selected="True"></asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                    Text="Save" />
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                    Text="New Record" />
                <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                    Text="Update" />
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                    DataTextField="AC" DataValueField="ID" 
                    onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="135px">
                </asp:ListBox>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    
                    SelectCommand="SELECT * FROM [cpf] where date&gt;=@date and date&lt;=@date1 and ac=@ac">
                    <SelectParameters>
                        <asp:Parameter Name="date" />
                        <asp:Parameter Name="date1" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="ac" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    InsertCommand="INSERT INTO cpf(Name_Des, AC, During_Year, Recovery_o_adv,date,div,Arear,Shared) VALUES (@Name_Des, @AC, @During_Year, @Recovery_o_adv,@date,@div,@Arear,@Shared)" 
                    SelectCommand="SELECT * FROM [cpf] where id=@id" 
                    
                    
                    
                    
                    
                    
                    
                    UpdateCommand="UPDATE dbo.cpf SET During_Year = @During_Year, Recovery_o_adv = @Recovery_o_adv, Arear = @Arear, Shared = @Shared, Div =@Div WHERE (ID = @id)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="TextBox3" Name="During_Year" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Recovery_o_adv" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" DefaultValue="" />
                        <asp:ControlParameter ControlID="arear" Name="Arear" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="shared" DefaultValue="" Name="Shared" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList4" DefaultValue="" Name="Div" 
                            PropertyName="SelectedValue" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="Name_Des" PropertyName="Text" />
                        <asp:Parameter Name="AC" />
                        <asp:ControlParameter ControlID="TextBox3" Name="During_Year" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Recovery_o_adv" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:Parameter Name="date" />
                        <asp:Parameter Name="div" />
                        <asp:ControlParameter ControlID="arear" Name="Arear" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="shared" Name="Shared" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                                        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                            ConnectionString="<%$ ConnectionStrings:himuda %>" 
                                            SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [tbdiv] order by div"></asp:SqlDataSource>
                <asp:Label ID="Label2" runat="server"></asp:Label>
            </td>
        </tr>
    </table>
</asp:Content>--%>

<asp:Content ID="Content1" runat="server" 
    contentplaceholderid="ContentPlaceHolder1">
         <style type="text/css">
        .style1
        {
            width: 549px;
            border: 1px solid #000000;
        font-family: Verdana;
        font-size: small;
    }
        .style2
        {
            width: 328px;
        }
        .style3
        {
        font-weight: 700;
    }
    .style5
    {
        text-align: center;
    }
    .style6
    {
        font-weight: 700;
        font-size: medium;
                 color: #FFFFFF;
                 background-color: #003300;
             }
    </style>
                       <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style6" colspan="2">
                CPF Detail</td>
        </tr>
        <tr>
            <td class="style3">
                Date</td>
            <td>
                Year<b><asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                </b>Month<b><asp:DropDownList ID="DropDownList2" runat="server" 
                    AutoPostBack="True" onselectedindexchanged="DropDownList2_SelectedIndexChanged">
                </asp:DropDownList>
                </b>
            </td>
        </tr>
        <tr>
            <td class="style3">
                AC</td>
                                    <td>
                                        <b>
                                        <asp:DropDownList ID="DropDownList3" runat="server" AutoPostBack="True" 
                                            DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC" 
                                            onselectedindexchanged="DropDownList3_SelectedIndexChanged">
                                        </asp:DropDownList>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="style3">
                                        Name</td>
            <td>
                <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3">
                During Year</td>
            <td>
                <b>
                <asp:TextBox ID="TextBox1" runat="server">0</asp:TextBox>
                <asp:Label ID="Label3" runat="server"></asp:Label>
                </b></td>
        </tr>
        <tr>
            <td class="style3">
                Recovery of Advance</td>
            <td>
                <b>
                <asp:TextBox ID="TextBox3" runat="server">0</asp:TextBox>
                <asp:Label ID="Label4" runat="server"></asp:Label>
                </b></td>
        </tr>
        <tr>
            <td class="style3">
                Arear</td>
            <td>
                <asp:TextBox ID="arear" runat="server">0</asp:TextBox>
                <b>
                <asp:Label ID="Label5" runat="server"></asp:Label>
                </b>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Board Share</td>
            <td>
                <asp:TextBox ID="shared" runat="server">0</asp:TextBox>
            </td>
        </tr>

        <tr>
            <td class="style3">
                Board Share Arear</td>
            <td>
                <asp:TextBox ID="Shared_arear" runat="server">0</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Division</td>
            <td>
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="Div" DataValueField="ID">
                    <asp:ListItem Selected="True"></asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style5" colspan="2">
                <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                    Text="Save" />
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" 
                    Text="New Record" />
                <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                    Text="Update" />
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                    DataTextField="AC" DataValueField="ID" 
                    onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="135px">
                </asp:ListBox>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    
                    SelectCommand="SELECT * FROM [cpf] where date&gt;=@date and date&lt;=@date1 and ac=@ac">
                    <SelectParameters>
                        <asp:Parameter Name="date" />
                        <asp:Parameter Name="date1" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="ac" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    InsertCommand="INSERT INTO cpf(Name_Des, AC, During_Year, Recovery_o_adv,date,div,Arear,Shared,Shared_arear) VALUES (@Name_Des, @AC, @During_Year, @Recovery_o_adv,@date,@div,@Arear,@Shared,@Shared_arear)" 
                    SelectCommand="SELECT * FROM [cpf] where id=@id" 
                    
                    
                    
                    
                    
                    
                    
                    UpdateCommand="UPDATE dbo.cpf SET During_Year = @During_Year, Recovery_o_adv = @Recovery_o_adv, Arear = @Arear, Shared = @Shared, Shared_arear = @Shared_arear, Div =@Div WHERE (ID = @id)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="TextBox3" Name="During_Year" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Recovery_o_adv" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" DefaultValue="" />
                        <asp:ControlParameter ControlID="arear" Name="Arear" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="shared" DefaultValue="" Name="Shared" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="Shared_arear" Name="Shared_arear" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="DropDownList4" DefaultValue="" Name="Div" 
                            PropertyName="SelectedValue" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="Name_Des" PropertyName="Text" />
                        <asp:Parameter Name="AC" />
                        <asp:ControlParameter ControlID="TextBox3" Name="During_Year" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Recovery_o_adv" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:Parameter Name="date" />
                        <asp:Parameter Name="div" />
                        <asp:ControlParameter ControlID="arear" Name="Arear" PropertyName="Text" 
                            DefaultValue="0" />
                        <asp:ControlParameter ControlID="shared" Name="Shared" PropertyName="Text" />
                        <asp:ControlParameter ControlID="Shared_arear" Name="Shared_arear" PropertyName="Text" 
                            DefaultValue="0" />
                    </InsertParameters>
                </asp:SqlDataSource>
                                        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                            ConnectionString="<%$ ConnectionStrings:himuda %>" 
                                            SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [tbdiv] order by div"></asp:SqlDataSource>
                <asp:Label ID="Label2" runat="server"></asp:Label>
            </td>
        </tr>
    </table>
        
        </asp:Content>


