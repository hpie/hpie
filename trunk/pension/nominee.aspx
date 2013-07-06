<%@ Page Title="" Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="nominee.aspx.cs" Inherits="nominee" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="Head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 500px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 147px;
        }
        .style3
        {
            width: 147px;
            font-weight: bold;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" Runat="Server">
    <form id="form1" runat="server">
    <br />
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style2">
                Record Update</td>
            <td>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                <asp:TextBox ID="TextBox7" runat="server" BorderColor="Black" 
                    BorderStyle="Solid" BorderWidth="1px" Width="84px"></asp:TextBox>
                <asp:Button ID="Button3" runat="server" onclick="Button3_Click" Text="Search" 
                    ValidationGroup="a" />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox7" ErrorMessage="RequiredFieldValidator" 
                    ValidationGroup="a">Not Empty</asp:RequiredFieldValidator>
                <asp:Label ID="Label2" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                <b>New Nominee</b></td>
        </tr>
        <tr>
            <td class="style2">
                PPO Number</td>
            <td>
    <asp:DropDownList ID="DropDownList1" runat="server" 
        DataSourceID="SqlDataSource1" DataTextField="ppno" DataValueField="ppno" 
                    AutoPostBack="True" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged" Visible="False">
    </asp:DropDownList>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:pension %>" 
        SelectCommand="SELECT *FROM dbo.Joining where user1=@user order by id desc" 
                    UpdateCommand="UPDATE Nominee SET Nominee = @Nominee, Address = @Address, NBirth_Date = @NBirth_Date, Share = @Share, Gar_Address = @Gar_Address, remarks =@remarks where  PPO=@PPO">
        <SelectParameters>
            <asp:Parameter DefaultValue="" Name="user" />
        </SelectParameters>
       <UpdateParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="Nominee" PropertyName="Text" />
                        <asp:Parameter Name="Address" />
                        <asp:Parameter Name="NBirth_Date" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Share" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" Name="Gar_Address" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="remarks" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="PPO" 
                            PropertyName="Text" />
                    </UpdateParameters>
    </asp:SqlDataSource>
                <asp:TextBox ID="TextBox8" runat="server" AutoCompleteType="Company"></asp:TextBox>
                <cc1:AutoCompleteExtender ID="AutoCompleteExtender1" runat="server" MinimumPrefixLength="1" ServiceMethod="GetCountryInfo" ServicePath="WebService.asmx" TargetControlID="TextBox8"> </cc1:AutoCompleteExtender> 
            </td>
        </tr>
        <tr>
            <td class="style2">
                Nominee Name</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                Nominee Address</td>
        </tr>
         <asp:Panel ID="Panel1" runat="server">
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server" Height="22px" Width="309px"></asp:TextBox>
               
                
            </td>
        </tr>
        <tr>
            <td class="style2">
                Vill.</td>
            <td>
                <asp:TextBox ID="TextBox9" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                P.O</td>
            <td>
                <asp:TextBox ID="TextBox10" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Teh</td>
            <td>
                <asp:TextBox ID="TextBox11" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Distt</td>
            <td>
                <asp:TextBox ID="TextBox12" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                State</td>
            <td>
                <asp:TextBox ID="TextBox13" runat="server">HP</asp:TextBox>
            </td>
        </tr></asp:Panel>
        <tr> 
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="TextBox14" runat="server" Height="72px" TextMode="MultiLine" 
                    Width="184px" Visible="False"></asp:TextBox>
            </td>
        </tr>
       
        <tr>
            <td class="style2">
                Birth Date</td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox3_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox3">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox3">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Share</td>
            <td>
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Guardian&#39;s Address</td>
            <td>
                <asp:RadioButtonList ID="RadioButtonList1" runat="server" AutoPostBack="True" 
                    onselectedindexchanged="RadioButtonList1_SelectedIndexChanged" 
                    RepeatDirection="Horizontal" style="font-size: xx-small">
                    <asp:ListItem>Same Nominee Address</asp:ListItem>
                    <asp:ListItem>No Same Nominee Address</asp:ListItem>
                </asp:RadioButtonList>
                <asp:TextBox ID="TextBox5" runat="server" Height="74px" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Remarks</td>
            <td>
                <asp:TextBox ID="TextBox6" runat="server" Height="58px" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:Button ID="Button4" runat="server" Text="Save" onclick="Button1_Click" 
                    style="height: 26px" />
                <asp:Button ID="Button2" runat="server" Text="Update" onclick="Button2_Click" />
    <asp:Label ID="dd" runat="server" Visible="False"></asp:Label>
                <br />
                <asp:Label ID="Label1" runat="server"></asp:Label>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    
                    
                    
                    UpdateCommand="UPDATE Nominee SET Nominee = @Nominee, Address = @Address, NBirth_Date = @NBirth_Date, Share = @Share, Gar_Address = @Gar_Address, remarks =@remarks where  PPO=@PPO" 
                    
                    
                    SelectCommand="SELECT * FROM [joining]   where  User1=@user order by id desc">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="Label2" DefaultValue="" Name="user" 
                            PropertyName="Text" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="Nominee" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox14" Name="Address" 
                            PropertyName="Text" />
                        <asp:Parameter Name="NBirth_Date" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Share" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" Name="Gar_Address" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox6" Name="remarks" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="PPO" 
                            PropertyName="Text" />
                    </UpdateParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    InsertCommand="INSERT INTO Nominee(PPO, Nominee, Address, Relition, NBirth_Date, Share, Gar_Address,User1,remarks) VALUES (@PPO, @Nominee, @Address, @Relition, @NBirth_Date, @Share, @Gar_Address,@User1,@remarks)" 
                    SelectCommand="SELECT * FROM [Nominee]">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox8" Name="PPO" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Nominee" PropertyName="Text" />
                        <asp:Parameter Name="Address" />
                        <asp:Parameter DefaultValue="SPOUSE" Name="Relition" />
                        <asp:Parameter DefaultValue="" Name="NBirth_Date" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Share" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox5" DefaultValue="" Name="Gar_Address" 
                            PropertyName="Text" />
                        <asp:Parameter Name="User1" />
                        <asp:ControlParameter ControlID="TextBox6" Name="remarks" PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="Footer" Runat="Server">
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="AfterBody" Runat="Server">
</asp:Content>

