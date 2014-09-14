<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="cpf_detail.aspx.cs" Inherits="cpf_detail" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 500px;
            border: 1px solid #000000;
        }
        .style2
        {
            width: 154px;
            font-family: Verdana;
            font-size: small;
        }
        .style3
        {
            width: 213px;
            height: 19px;
            font-family: Verdana;
            font-size: small;
        }
        .style4
        {
            height: 19px;
        }
        .style5
        {
            font-family: Verdana;
        }
        .style7
        {
            font-size: x-small;
        }
        .style8
        {
            font-family: Verdana;
            font-size: small;
        }
        .style9
        {
            font-size: small;
        }
        .style11
        {
            font-family: Verdana;
            font-size: small;
            text-align: center;
            color: #FFFFFF;
            background-color: #003399;
        }
        .style14
        {
            height: 23px;
            width: 213px;
            font-family: Verdana;
            font-size: small;
        }
        .style15
        {
            font-family: Verdana;
            font-size: small;
            height: 23px;
        }
        .style20
        {
            height: 16px;
            width: 213px;
            font-family: Verdana;
            font-size: small;
        }
        .style21
        {
            font-family: Verdana;
            font-size: small;
            height: 16px;
        }
        .style22
        {
            height: 14px;
            width: 213px;
            font-family: Verdana;
            font-size: small;
        }
        .style23
        {
            font-family: Verdana;
            font-size: small;
            height: 14px;
        }
        .style24
        {
            height: 11px;
            width: 213px;
            font-family: Verdana;
            font-size: small;
        }
        .style25
        {
            font-family: Verdana;
            font-size: small;
            height: 11px;
        }
        .style26
        {
            height: 15px;
            width: 213px;
            font-family: Verdana;
            font-size: small;
        }
        .style27
        {
            font-family: Verdana;
            font-size: small;
            height: 15px;
        }
        .style28
        {
            height: 71px;
            width: 213px;
            font-family: Verdana;
            font-size: small;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style11" colspan="2">
                <b>CPF Advance/Adjustments</b><asp:ScriptManager ID="ScriptManager1" 
                    runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style28">
                AC Number</td>
            <td class="style8">
                <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource1" DataTextField="AC" DataValueField="AC" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [Employee] order by ac"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style24">
                Employee Name</td>
            <td class="style25">
                <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style3">
                Date</td>
                        <td class="style4">
                            <span class="style5"><span class="style7"><span class="style9">
                            <asp:TextBox ID="TextBox1" runat="server" ontextchanged="TextBox1_TextChanged"></asp:TextBox>
                            </span></span></span>
                            <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                            </cc1:MaskedEditExtender>
                            <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                                Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox1">
                            </cc1:CalendarExtender>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                                ControlToValidate="TextBox1" ErrorMessage="Select Date" ValidationGroup="b">*</asp:RequiredFieldValidator>
                            <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
                                ValidationGroup="b">View Record</asp:LinkButton>
                        </td>
                    </tr>
        <tr>
            <td class="style3">
                Final Payment Date</td>
                        <td class="style4">
                            <asp:TextBox ID="TextBox8" runat="server" AutoPostBack="True" 
                                ontextchanged="TextBox8_TextChanged"></asp:TextBox>
                            <cc1:MaskedEditExtender ID="TextBox8_MaskedEditExtender" runat="server" 
                                CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                                CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                                CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                                Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox8">
                            </cc1:MaskedEditExtender>
                            <cc1:CalendarExtender ID="TextBox8_CalendarExtender" runat="server" 
                                Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox8">
                            </cc1:CalendarExtender>
                        </td>
                    </tr>
                    <tr>
                        <td class="style26">
                            CPF Advance/Withdraw Amount</td>
            <td class="style27">
                <asp:TextBox ID="TextBox2" runat="server" AutoPostBack="True"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style14">
                Final Payment of EPF</td>
            <td class="style15">
                <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style20">
                Final Payment of Board Share</td>
            <td class="style21">
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style22">
                <asp:TextBox ID="TextBox3" runat="server" Visible="False"></asp:TextBox>
            </td>
            <td class="style23">
                <asp:TextBox ID="TextBox6" runat="server" Visible="False"></asp:TextBox>
                <asp:TextBox ID="TextBox4" runat="server" Visible="False"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style28">
                &nbsp;</td>
            <td class="style8">
                <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True" 
                    DataTextField="AC" DataValueField="ID" 
                    onselectedindexchanged="ListBox1_SelectedIndexChanged" Width="124px">
                </asp:ListBox>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    SelectCommand="SELECT * FROM [cpf_detail] WHERE ([ID] = @ID)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style22">
                </td>
            <td class="style23">
                <asp:Button ID="Button1" runat="server" Enabled="False" onclick="Button1_Click" 
                    Text="Save" ValidationGroup="b" Width="62px" />
                <asp:Button ID="Button2" runat="server" Enabled="False" onclick="Button2_Click" 
                    Text="Update" ValidationGroup="b" />
                <asp:Button ID="Button3" runat="server" Enabled="False" onclick="Button3_Click" 
                    Text="Delete" ValidationGroup="b" Visible="False" />
                <asp:Button ID="Button4" runat="server" onclick="Button4_Click" 
                    Text="New Record" ValidationGroup="a" />
            </td>
        </tr>
        <tr>
            <td class="style28">
                &nbsp;</td>
            <td class="style8">
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:himuda %>" 
                    DeleteCommand="DELETE FROM cpf_detail WHERE (ID = @id)" 
                    InsertCommand="INSERT INTO cpf_detail(Name, AC, CPF_Adv,CPF_Withd, Adjment, Date,Date1,Ins_Adjment,Share_dur,Share_Adjment) VALUES (@Name, @AC, @CPF_Adv,@CPF_Withd, @Adjment, @Date,@Date1,@Ins_Adjment,@Share_dur,@Share_Adjment)" 
                    SelectCommand="SELECT * FROM [cpf_detail] where date=@date order by ac" 
                    
                    
                    
                    
                    
                    
                    UpdateCommand="UPDATE cpf_detail SET Name =@Name, AC =@AC, CPF_Adv =@CPF_Adv, Adjment =@Adjment, Date =@Date,Date1 =@Date1,Ins_Adjment=@Ins_Adjment,cpf_withd=@cpf_withd where ID=@ID">
                    <SelectParameters>
                        <asp:Parameter Name="date" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:ControlParameter ControlID="ListBox1" Name="id" 
                            PropertyName="SelectedValue" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="Label1" Name="Name" PropertyName="Text" />
                        <asp:Parameter Name="AC" />
                        <asp:ControlParameter ControlID="TextBox2" Name="CPF_Adv" PropertyName="Text" />
                        <asp:Parameter Name="Date" />
                        <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Adjment" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Ins_Adjment" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="cpf_withd" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Date1" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="Name" PropertyName="Text" />
                        <asp:Parameter Name="AC" />
                        <asp:ControlParameter ControlID="TextBox2" DefaultValue="0" Name="CPF_Adv" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" DefaultValue="0" Name="Adjment" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Date" />
                        <asp:ControlParameter ControlID="TextBox4" DefaultValue="0" Name="Ins_Adjment" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" DefaultValue="0" Name="Share_dur" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" DefaultValue="0" 
                            Name="Share_Adjment" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="CPF_Withd" 
                            PropertyName="Text" DefaultValue="0" />
                        <asp:Parameter Name="Date1" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:Label ID="Label2" runat="server" ForeColor="#CC3300"></asp:Label>
                <asp:ValidationSummary ID="ValidationSummary1" runat="server" 
                    ShowMessageBox="True" ShowSummary="False" />
            </td>
        </tr>
    </table>
</asp:Content>

