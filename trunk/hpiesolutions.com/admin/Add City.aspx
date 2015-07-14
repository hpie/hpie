<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="Add City.aspx.cs" Inherits="admin_Add_City" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 880px;
    }
    .style2
    {
        width: 168px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Add New City</div>

<table class="style1">
    <tr>
        <td class="style2">
            Select Distt</td>
        <td>
            <asp:DropDownList ID="DropDownList1" runat="server" 
                DataSourceID="SqlDataSource1" DataTextField="distt" DataValueField="code" 
                AutoPostBack="True" onselectedindexchanged="DropDownList1_SelectedIndexChanged">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                InsertCommand="INSERT INTO city(city, distt) VALUES (@city, @distt)" 
                SelectCommand="SELECT * FROM [distt]">
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="city" PropertyName="Text" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="distt" 
                        PropertyName="SelectedValue" />
                </InsertParameters>
            </asp:SqlDataSource>
        </td>
        <td rowspan="12">
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                DataSourceID="SqlDataSource2" Width="292px">
                <Columns>
                    <asp:TemplateField HeaderText="Sr. No.">   
                            <ItemTemplate>
                                <%# Container.DataItemIndex + 1 %>   
                            </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
                    <asp:BoundField DataField="distt" HeaderText="Distt" SortExpression="distt" />
                </Columns>
            </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                
                SelectCommand="SELECT dbo.city.code, dbo.city.city, dbo.distt.distt FROM dbo.city INNER JOIN dbo.distt ON dbo.city.distt = dbo.distt.code WHERE (dbo.city.distt = @distt)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="distt" 
                        PropertyName="SelectedValue" Type="String" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Enter New City Name</td>
        <td>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#990000" 
                SetFocusOnError="True"></asp:RequiredFieldValidator>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
&nbsp;
            <asp:Label ID="Label1" runat="server" style="font-weight: 700; color: #990000"></asp:Label>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                InsertCommand="INSERT INTO city(city, distt) VALUES (@city, @distt)" 
                SelectCommand="SELECT code, city, distt FROM city WHERE (distt = @distt) and(city=@city)">
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="city" PropertyName="Text" />
                    <asp:ControlParameter ControlID="DropDownList1" Name="distt" 
                        PropertyName="SelectedValue" />
                </InsertParameters>
                <SelectParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="distt" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="TextBox1" Name="city" PropertyName="Text" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
</table>

</asp:Content>

