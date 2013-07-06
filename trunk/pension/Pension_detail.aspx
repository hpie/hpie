<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="Pension_detail.aspx.cs" Inherits="Pension_detail" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="Head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 614px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 355px;
        }
        .style3
        {
            width: 355px;
            height: 18px;
        }
        .style4
        {
            height: 18px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" Runat="Server">
    <form id="form1" runat="server">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style2">
                &nbsp;</td>
                                            <td>
                                                <asp:ScriptManager ID="ScriptManager1" runat="server">
                                                </asp:ScriptManager>
                                            </td>
                                        </tr>
        <tr>
            <td class="style2">
                Update Record PPo No </td>
                                            <td>
                                                <asp:TextBox ID="TextBox29" runat="server"></asp:TextBox>
                                                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Search" />
                                            </td>
                                        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
                                            <td>
                                                New Record</td>
                                        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
                                            <td>
                                                &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="style2">
                                                PPO No.</td>
                                            <td>
                                                <asp:TextBox ID="TextBox28" runat="server"></asp:TextBox>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="style2">
                                                Start Date</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server">01/01/2006</asp:TextBox>
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
        </tr>
        <tr>
            <td class="style2">
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
        </tr>
        <tr>
            <td class="style3">
                Status</td>
            <td class="style4">
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="Status" DataValueField="ID">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Family Member</td>
            <td>
                <asp:TextBox ID="TextBox3" runat="server">Spouse</asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Bank Option Opted</td>
            <td>
                <asp:DropDownList ID="DropDownList3" runat="server">
                    <asp:ListItem>Y</asp:ListItem>
                    <asp:ListItem>N</asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Medical allowance Op</td>
            <td>
                <asp:DropDownList ID="DropDownList4" runat="server">
                    <asp:ListItem>Y</asp:ListItem>
                    <asp:ListItem>N</asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Commutation Percentage</td>
            <td>
                <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Proposed Retirement Date</td>
            <td>
                <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
                <cc1:MaskedEditExtender ID="TextBox5_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox5">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox5_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox5">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Qualifying Service</td>
            <td>
                YY<asp:TextBox ID="TextBox6" runat="server" Width="30px"></asp:TextBox>
                MM<asp:TextBox ID="TextBox7" runat="server" Width="30px"></asp:TextBox>
                DD<asp:TextBox ID="TextBox8" runat="server" Width="30px"></asp:TextBox>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Cal</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Six Monthy H Y</td>
            <td>
                <asp:TextBox ID="TextBox9" runat="server" Width="30px"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Pay Scale as on 01.01.1996</td>
            <td>
                <asp:DropDownList ID="DropDownList5" runat="server" AutoPostBack="True" 
                    DataSourceID="SqlDataSource3" DataTextField="pay" DataValueField="Pay">
                </asp:DropDownList>
                <asp:TextBox ID="TextBox24" runat="server"></asp:TextBox>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT Pay_band, Pay FROM payband GROUP BY Pay_band, Pay">
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Existing Pension w/o 50 % DR as on 31.12.2005</td>
            <td>
                <asp:DropDownList ID="DropDownList6" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="Grade_pay" 
                    DataValueField="Grade_pay">
                </asp:DropDownList>
                <asp:TextBox ID="TextBox25" runat="server"></asp:TextBox>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT ID, Pay_band, Pay, Grade_pay, Inital_pay, PS_level FROM payband WHERE (Pay = @Pay)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList5" Name="Pay" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Revised Pay Scale Group Range</td>
            <td>
                <asp:DropDownList ID="DropDownList7" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="Pay" DataValueField="Pay">
                </asp:DropDownList>
                <asp:TextBox ID="TextBox26" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Revised Pay Scale Level Amt</td>
            <td>
                <asp:DropDownList ID="DropDownList8" runat="server" 
                    DataSourceID="SqlDataSource5" DataTextField="grade_pay" 
                    DataValueField="grade_pay">
                </asp:DropDownList>
                <asp:TextBox ID="TextBox27" runat="server" style="margin-bottom: 0px"></asp:TextBox>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT ID, Pay_band, Pay, Grade_pay, Inital_pay, PS_level FROM payband WHERE (Pay = @Pay)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList7" Name="Pay" 
                            PropertyName="SelectedValue" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                50% of min of Rev Pay Scale</td>
            <td>
                <asp:TextBox ID="TextBox14" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Consol Pension</td>
            <td>
                <asp:TextBox ID="TextBox15" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Revised Pension as on 01.01.2006</td>
            <td>
                <asp:TextBox ID="TextBox16" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Additional Pension</td>
            <td>
                <asp:TextBox ID="TextBox17" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Pension as on 01.01.2006</td>
            <td>
                <asp:TextBox ID="TextBox18" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Existing Family Pension w/o 50 % DR as on 31.12.2005</td>
            <td>
                <asp:TextBox ID="TextBox19" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Family Pension consol as on 01.01.2006</td>
            <td>
                <asp:TextBox ID="TextBox20" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                30% of min PB+ GP</td>
            <td>
                <asp:TextBox ID="TextBox21" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                FP authorised as on 01.01.2006</td>
            <td>
                <asp:TextBox ID="TextBox22" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Additional F/Pension</td>
            <td>
                <asp:TextBox ID="TextBox23" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" />
                <asp:Button ID="Button3" runat="server" onclick="Button3_Click" Text="Update" />
                <br />
                <asp:Label ID="Label1" runat="server"></asp:Label>
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
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [status]">
                    <UpdateParameters>
                     <asp:ControlParameter ControlID="TextBox28" Name="PPNo" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Start_date" />
                        <asp:Parameter Name="End_date" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="Status" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Family_member" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="Bank_option" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList4" Name="Medical_all" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Comm_per" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Retirment" />
                        <asp:ControlParameter ControlID="TextBox6" Name="Quali_Service_yy" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="Quali_Service_mm" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox8" Name="Quali_Service_dd" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="Six_month" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Pay_scale" />
                        <asp:Parameter Name="Exst_pension" />
                        <asp:Parameter Name="Revi_scal" />
                        <asp:Parameter Name="Rev_amt" />
                        <asp:ControlParameter ControlID="TextBox14" Name="Rev_pay_scale" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox15" Name="Con_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox16" Name="Rev_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox17" Name="Add_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox18" Name="Pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox19" Name="Ext_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="Fam_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox21" Name="PB_GP" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox22" Name="FP_Au" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox23" Name="Addtion_Pn" 
                            PropertyName="Text" />
                    
                    </UpdateParameters>
                    </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    InsertCommand="INSERT INTO info(PPNo, Start_date, End_date, Status, Family_member, Bank_option, Medical_all, Comm_per, Retirment, Quali_Service_yy, Quali_Service_mm, Quali_Service_dd, Six_month, Pay_scale, Exst_pension, Revi_scal, Rev_amt, Rev_pay_scale, Con_pension, Rev_pension, Add_pension, Pension, Ext_pension, Fam_pension, PB_GP, FP_Au, Addtion_Pn,User1) VALUES (@PPNo, @Start_date, @End_date, @Status, @Family_member, @Bank_option, @Medical_all, @Comm_per, @Retirment, @Quali_Service_yy, @Quali_Service_mm, @Quali_Service_dd, @Six_month, @Pay_scale, @Exst_pension, @Revi_scal, @Rev_amt, @Rev_pay_scale, @Con_pension, @Rev_pension, @Add_pension, @Pension, @Ext_pension, @Fam_pension, @PB_GP, @FP_Au, @Addtion_Pn,@User1)" 
                    SelectCommand="SELECT [Ppno] FROM [Joining]" 
                    
                    
                    UpdateCommand="UPDATE dbo.info SET Start_date =@Start_date, End_date =@End_date, Status =@Status, Family_member =@Family_member, Medical_all =@Medical_all,
                     Comm_per =@Comm_per, Retirment =@Retirment, Quali_Service_yy =@Quali_Service_yy,
                      Quali_Service_mm =@Quali_Service_mm, Quali_Service_dd =@Quali_Service_dd, 
                      Six_month =@Six_month, Pay_scale =@Pay_scale, Exst_pension =@Exst_pension, Revi_scal =@Revi_scal,
                       Rev_amt =@Rev_amt, Con_pension =@Con_pension, Rev_pay_scale =@Rev_pay_scale,
                        Rev_pension =@Rev_pension, Add_pension =@Add_pension, Pension =@Pension, Ext_pension =@Ext_pension, 
                       Fam_pension =@Fam_pension, PB_GP =@PB_GP, FP_Au =@FP_Au, Addtion_Pn =@Addtion_Pn where PPNO=@PPNO">
                    <InsertParameters>
                        <asp:ControlParameter ControlID="TextBox28" Name="PPNo" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Start_date" />
                        <asp:Parameter Name="End_date" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="Status" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Family_member" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="Bank_option" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList4" Name="Medical_all" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Comm_per" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Retirment" />
                        <asp:ControlParameter ControlID="TextBox6" Name="Quali_Service_yy" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="Quali_Service_mm" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox8" Name="Quali_Service_dd" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="Six_month" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Pay_scale" />
                        <asp:Parameter Name="Exst_pension" />
                        <asp:Parameter Name="Revi_scal" />
                        <asp:Parameter Name="Rev_amt" />
                        <asp:ControlParameter ControlID="TextBox14" Name="Rev_pay_scale" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox15" Name="Con_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox16" Name="Rev_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox17" Name="Add_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox18" Name="Pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox19" Name="Ext_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="Fam_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox21" Name="PB_GP" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox22" Name="FP_Au" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox23" Name="Addtion_Pn" 
                            PropertyName="Text" />
                        <asp:Parameter Name="User1" />
                    </InsertParameters>
                    <UpdateParameters>
                       <asp:ControlParameter ControlID="TextBox28" Name="PPNo" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Start_date" />
                        <asp:Parameter Name="End_date" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="Status" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Family_member" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="Bank_option" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="DropDownList4" Name="Medical_all" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox4" Name="Comm_per" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Retirment" />
                        <asp:ControlParameter ControlID="TextBox6" Name="Quali_Service_yy" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox7" Name="Quali_Service_mm" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox8" Name="Quali_Service_dd" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox9" Name="Six_month" 
                            PropertyName="Text" />
                        <asp:Parameter Name="Pay_scale" />
                        <asp:Parameter Name="Exst_pension" />
                        <asp:Parameter Name="Revi_scal" />
                        <asp:Parameter Name="Rev_amt" />
                        <asp:ControlParameter ControlID="TextBox14" Name="Rev_pay_scale" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox15" Name="Con_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox16" Name="Rev_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox17" Name="Add_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox18" Name="Pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox19" Name="Ext_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox20" Name="Fam_pension" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox21" Name="PB_GP" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox22" Name="FP_Au" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox23" Name="Addtion_Pn" 
                            PropertyName="Text" />
                    </UpdateParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    </form>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="Footer" Runat="Server">
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="AfterBody" Runat="Server">
</asp:Content>

