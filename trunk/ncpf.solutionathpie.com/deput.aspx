<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="deput.aspx.cs" Inherits="deput" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
   
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td class="style7">
            &nbsp;</td>
        <td>
            <asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
        </td>
    </tr>
    <tr>
        <td class="style7">
            AC</td>
        <td>
            <asp:DropDownList ID="DropDownList1" runat="server" 
                DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC">
            </asp:DropDownList>
        </td>
    </tr>
    <tr>
        <td class="style7">
            Start Date</td>
        <td>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
            </cc1:MaskedEditExtender>
        </td>
    </tr>
    <tr>
        <td class="style7">
            End Date</td>
        <td>
            <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
            </cc1:MaskedEditExtender>
        </td>
    </tr>
    <tr>
        <td class="style7">
            &nbsp;</td>
        <td>
            <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                DataSourceID="SqlDataSource2" DataTextField="AC" DataValueField="ID" 
                Width="128px" onselectedindexchanged="ListBox1_SelectedIndexChanged"></asp:ListBox>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:himuda %>" 
                InsertCommand="INSERT INTO deput(Ac, S_date, E_date) VALUES (@Ac, @S_date, @E_date)" 
                SelectCommand="SELECT *FROM deput" 
                UpdateCommand="UPDATE deput SET Ac = @AC, S_date = @S_date, E_date = @E_date WHERE (ID = @id)">
                <UpdateParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="AC" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="S_date" />
                    <asp:Parameter Name="E_date" />
                    <asp:ControlParameter ControlID="ListBox1" Name="id" 
                        PropertyName="SelectedValue" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="DropDownList1" Name="Ac" 
                        PropertyName="SelectedValue" />
                    <asp:Parameter Name="S_date" />
                    <asp:Parameter Name="E_date" />
                </InsertParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
    <tr>
        <td class="style7">
            &nbsp;</td>
        <td>
            <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
                style="height: 26px" Text="Save" />
            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Update" />
            <br />
            <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:himuda %>" 
                SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:himuda %>" 
                SelectCommand="SELECT * FROM [deput] WHERE ([ID] = @ID)">
                <SelectParameters>
                    <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                        PropertyName="SelectedValue" Type="Int32" />
                </SelectParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
</table>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
</asp:Content>

