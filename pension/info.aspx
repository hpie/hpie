<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="info.aspx.cs" Inherits="info" Title="Untitled Page" %>

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
            width: 187px;
        }
        .style3
        {
            width: 134px;
        }
        .style4
        {
            width: 187px;
            color: #FFFFFF;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" Runat="Server">
    <form id="form1" runat="server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td colspan="2">
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Update Record PPO No.</td>
            <td colspan="2">
                <asp:TextBox ID="TextBox10" runat="server"></asp:TextBox>
                <asp:Button ID="Button3" runat="server" onclick="Button3_Click" Text="Search" />
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td colspan="2">
                New Record</td>
        </tr>
        <tr>
            <td class="style2">
                PPO No.</td>
            <td colspan="2">
                <asp:TextBox ID="TextBox9" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Select Type</td>
            <td colspan="2">
                <asp:CheckBoxList ID="CheckBoxList1" runat="server" 
                    RepeatDirection="Horizontal">
                    <asp:ListItem Selected="True">SE</asp:ListItem>
                    <asp:ListItem>DF</asp:ListItem>
                </asp:CheckBoxList>
            </td>
        </tr>
        <tr>
            <td class="style2">
                SE
                Start Date</td>
            <td class="style3">
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox1_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox1">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox1">
                </cc1:CalendarExtender>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                SE
                End Date</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server">31/12/9999</asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox2_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox2">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox2_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox2">
                </cc1:CalendarExtender>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                DF
                Start Date</td>
            <td>
                <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox7_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox7">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox7_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox7">
                </cc1:CalendarExtender>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                SE
                End Date</td>
            <td>
                <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
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
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                Reason for Action</td>
            <td colspan="2">
                <asp:DropDownList ID="DropDownList7" runat="server" 
                    DataSourceID="SqlDataSource8" DataTextField="Remarks" DataValueField="Name">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource8" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [SubAction]"></asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Remarks</td>
            <td colspan="2">
                <asp:TextBox ID="TextBox6" runat="server" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td colspan="2">
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" />
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Update" />
                <asp:Label ID="Label1" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Personnel Area</td>
            <td colspan="2">
                <asp:DropDownList ID="DropDownList2" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource2" DataTextField="Name" DataValueField="ID" 
                    Visible="False">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style4">
                EmployeeGroup</td>
            <td colspan="2">
                <asp:DropDownList ID="DropDownList3" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource3" DataTextField="Group_name" 
                    DataValueField="ID" Visible="False">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Employee Subgroup</td>
            <td colspan="2">
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="Group_des" 
                    DataValueField="Sub_Group" Visible="False">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Personnel Subarea</td>
            <td colspan="2">
                <asp:DropDownList ID="DropDownList5" runat="server" 
                    DataSourceID="SqlDataSource5" DataTextField="PSAName" 
                    DataValueField="PACode" Visible="False">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Payroll Area</td>
            <td colspan="2">
                <asp:TextBox ID="TextBox5" runat="server" Width="30px" Visible="False">HP</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Position</td>
            <td colspan="2">
                <asp:TextBox ID="TextBox4" runat="server" Width="70px" Visible="False">99999999</asp:TextBox>
                <br />
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td colspan="2">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [Action]"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [PA]"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [Group]"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [SubGroup] WHERE ([Groupcode] = @Groupcode)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList3" Name="Groupcode" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [PSA] WHERE ([PACode] = @PACode)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList2" Name="PACode" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    InsertCommand="INSERT INTO Other_Action(PPONo, ActionType, Start_Date, End_Date, Action_Reason, Position, PA, Group1, Sub_Group1, PSA, Payroll_Area, Remarks,User1) VALUES (@PPONo, @ActionType, @Start_Date, @End_Date, @Action_Reason, @Position, @PA, @Group1, @Sub_Group1, @PSA, @Payroll_Area, @Remarks,@User1)" 
                    SelectCommand="SELECT * FROM [info]" 
                    
                    UpdateCommand="UPDATE Other_Action SET ActionType =@ActionType, Start_Date =@Start_Date, End_Date =@End_Date, Action_Reason =@Action_Reason,Remarks =@Remarks where ppono=@ppono">
                    <UpdateParameters>
                                                
                        <asp:Parameter Name="ActionType" />
                        <asp:Parameter Name="Start_Date" />
                        <asp:Parameter Name="End_Date" />
                        <asp:ControlParameter ControlID="DropDownList7" Name="Action_Reason" 
                            PropertyName="SelectedValue" />
                        
                        
                        
                        
                          <asp:ControlParameter ControlID="TextBox6" Name="Remarks" PropertyName="Text" />
                                                
                          <asp:ControlParameter ControlID="TextBox10" Name="ppono" 
                            PropertyName="Text" />
                        
                        
                        
                        
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox9" Name="PPONo" 
                            PropertyName="Text" />
                        <asp:Parameter Name="ActionType" />
                        <asp:Parameter Name="Start_Date" />
                        <asp:Parameter Name="End_Date" />
                        <asp:ControlParameter ControlID="DropDownList7" Name="Action_Reason" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Position" 
                            PropertyName="Text" DefaultValue="99999999" />
                        <asp:Parameter Name="PA" />
                        <asp:Parameter Name="Group1" />
                        <asp:Parameter Name="Sub_Group1" />
                        <asp:Parameter Name="PSA" />
                        <asp:Parameter DefaultValue="HP" Name="Payroll_Area" />
                        <asp:ControlParameter ControlID="TextBox6" Name="Remarks" PropertyName="Text" />
                        <asp:Parameter Name="User1" />
                    </InsertParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT [Ppno] FROM [Joining]"></asp:SqlDataSource>
            </td>
        </tr>
    </table>
    </form>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="Footer" Runat="Server">
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="AfterBody" Runat="Server">
</asp:Content>

