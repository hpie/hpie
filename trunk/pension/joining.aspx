<%@ Page Language="C#" AutoEventWireup="true" CodeFile="joining.aspx.cs" MasterPageFile="~/MasterPage.master" Inherits="joining" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>
<asp:Content ID="Content1" runat="server" contentplaceholderid="Content">


        <form id="form1" runat="server">
        <table cellpadding="0" cellspacing="0"  >
            <tr>
                <td class="style3">
                 
                </td>
                                            <td>
                                                &nbsp;</td>
                                        </tr>
            <tr>
                <td class="style3">
                 
                    Enter PPo No</td>
                                            <td>
                                                <asp:TextBox ID="TextBox16" runat="server"></asp:TextBox>
                                                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Search" />
                                            </td>
                                        </tr>
            <tr>
                <td class="style3">
                 
                    &nbsp;</td>
                                            <td>
                                                <asp:ScriptManager ID="ScriptManager1" runat="server">
                                                </asp:ScriptManager>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="style4">
                                                PAN NO</td>
                <td class="style2">
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    ID Type</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        DataSourceID="SqlDataSource1" DataTextField="Key1" DataValueField="Key1">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [Denomition]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    GPF</td>
                <td>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    PPO No.</td>
                <td>
                    HPSEB-<asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Date Of Ret.</td>
                <td>
                    <asp:TextBox ID="TextBox15" runat="server"></asp:TextBox>
                    <cc1:MaskedEditExtender ID="TextBox15_MaskedEditExtender" runat="server" 
                        CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox15">
                    </cc1:MaskedEditExtender>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Qul. Service</td>
                <td>
                    YY<asp:TextBox ID="TextBox12" runat="server" Width="30px"></asp:TextBox>
                    MM<asp:TextBox ID="TextBox13" runat="server" Width="30px">01</asp:TextBox>
                    DD<asp:TextBox ID="TextBox14" runat="server" Width="30px">01</asp:TextBox>
                    <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Cal.</asp:LinkButton>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Joining Date</td>
                <td>
                    <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
                    <cc1:MaskedEditExtender ID="TextBox4_MaskedEditExtender" runat="server" 
                        CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                        CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                        CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                        Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox4">
                    </cc1:MaskedEditExtender>
                    <cc1:CalendarExtender ID="TextBox4_CalendarExtender" runat="server" 
                        Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox4">
                    </cc1:CalendarExtender>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Personnel Area</td>
                <td>
                    <asp:DropDownList ID="DropDownList2" runat="server" 
                        DataSourceID="SqlDataSource2" DataTextField="name" DataValueField="ID" 
                        AutoPostBack="True">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [PA] order by name"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Personnel Subarea</td>
                <td>
                    <asp:DropDownList ID="DropDownList8" runat="server" 
                        DataSourceID="SqlDataSource8" DataTextField="PSAName" DataValueField="ID" 
                        EnableTheming="False">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource8" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [PSA] WHERE ([PACode] = @PACode)">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="DropDownList2" Name="PACode" 
                                PropertyName="SelectedValue" Type="String" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Group</td>
                <td>
                    <asp:DropDownList ID="DropDownList3" runat="server" 
                        DataSourceID="SqlDataSource3" DataTextField="group_Name" 
                        DataValueField="ID" AutoPostBack="True">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [Group]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Sub Group</td>
                <td>
                    <asp:DropDownList ID="DropDownList4" runat="server" 
                        DataSourceID="SqlDataSource4" DataTextField="Group_des" 
                        DataValueField="ID">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [SubGroup] WHERE ([Groupcode] = @Groupcode)">
                        <SelectParameters>
                            <asp:ControlParameter ControlID="DropDownList3" Name="Groupcode" 
                                PropertyName="SelectedValue" Type="String" />
                        </SelectParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Date of Birth</td>
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
                <td class="style3">
                    Title</td>
                <td>
                    <asp:DropDownList ID="DropDownList5" runat="server" 
                        DataSourceID="SqlDataSource5" DataTextField="Title" DataValueField="ID">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [Title]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    First Name</td>
                <td>
                    <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                        ControlToValidate="DropDownList7" ErrorMessage="RequiredFieldValidator">First Name Must Be Fill</asp:RequiredFieldValidator>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Last Name</td>
                <td>
                    <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Gender</td>
                <td>
                    <asp:DropDownList ID="DropDownList6" runat="server" 
                        DataSourceID="SqlDataSource6" DataTextField="Gender" DataValueField="ID">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [Gender]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    Married Since</td>
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
            </tr>
            <tr>
                <td class="style3">
                    Remarks</td>
                <td>
                    <asp:TextBox ID="TextBox10" runat="server" Height="43px" TextMode="MultiLine"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    &nbsp;</td>
                <td>
                    <asp:Label ID="Label1" runat="server"></asp:Label>
                    <asp:DropDownList ID="DropDownList7" runat="server" 
                        DataSourceID="SqlDataSource7" DataTextField="Status" DataValueField="ID" 
                        Enabled="False" Visible="False">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource7" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        SelectCommand="SELECT * FROM [status]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td class="style3">
                    &nbsp;</td>
                <td>
                    <asp:Button ID="Button1" runat="server" Text="Save" onclick="Button1_Click" />
                    <asp:Button ID="Button3" runat="server" Text="Update" Visible="False" 
                        onclick="Button3_Click" />
                    <asp:Button ID="Button4" runat="server" onclick="Button4_Click" 
                        Text="New Record" Visible="False" />
                </td>
            </tr>
            <tr>
                <td class="style3">
                    &nbsp;</td>
                <td>
                    <asp:SqlDataSource ID="SqlDataSource9" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:pension %>" 
                        InsertCommand="INSERT INTO Joining(Panno, IdType, GPF, Ppno, JoinDate, PersonnelArea, Employee_group, Employee_Sub, BirthDate, Title, First, Last, Gender, Matrial_status, Married_Since, No_Child, Personnel_subarea, Payroll_area, Remark,User1) VALUES (@Panno, @IdType, @GPF, @Ppno, @JoinDate, @PersonnelArea, @Employee_group, @Employee_Sub, @BirthDate, @Title, @First, @Last, @Gender, @Matrial_status, @Married_Since, @No_Child, @Personnel_subarea, @Payroll_area, @Remark,@User1)" 
                        SelectCommand="SELECT * FROM [Joining]" 
                        
                        UpdateCommand="UPDATE dbo.Joining SET Panno =@Panno, IdType =@IdType, GPF =@GPF,  JoinDate =@JoinDate, PersonnelArea =@PersonnelArea, Employee_group =@Employee_group, Employee_Sub =@Employee_Sub, BirthDate =@BirthDate, Title =@Title, First =@First, Last = @Last, Gender =@Gender,  Married_Since =@Married_Since, Personnel_subarea =@Personnel_subarea,Remark = @Remark where Ppno =@Ppno">
                        <InsertParameters>
                            <asp:ControlParameter ControlID="TextBox1" Name="Panno" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList1" Name="IdType" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="GPF" PropertyName="Text" />
                            <asp:Parameter Name="Ppno" />
                            <asp:Parameter Name="JoinDate" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="PersonnelArea" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="DropDownList3" Name="Employee_group" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="DropDownList4" Name="Employee_Sub" 
                                PropertyName="SelectedValue" />
                            <asp:Parameter Name="BirthDate" />
                            <asp:ControlParameter ControlID="DropDownList5" Name="Title" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox7" Name="First" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox6" Name="Last" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList6" Name="Gender" 
                                PropertyName="SelectedValue" />
                            <asp:Parameter Name="Matrial_status" />
                            <asp:Parameter Name="Married_Since" />
                            <asp:ControlParameter ControlID="TextBox9" Name="No_Child" 
                                PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList8" Name="Personnel_subarea" 
                                PropertyName="SelectedValue" />
                            <asp:Parameter DefaultValue="HP" Name="Payroll_area" />
                            <asp:ControlParameter ControlID="TextBox10" Name="Remark" PropertyName="Text" />
                            <asp:Parameter Name="User1" />
                        </InsertParameters>
                        <UpdateParameters>
                              <asp:ControlParameter ControlID="TextBox1" Name="Panno" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList1" Name="IdType" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox2" Name="GPF" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox3" Name="Ppno" PropertyName="Text" />
                            <asp:Parameter Name="JoinDate" />
                            <asp:ControlParameter ControlID="DropDownList2" Name="PersonnelArea" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="DropDownList3" Name="Employee_group" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="DropDownList4" Name="Employee_Sub" 
                                PropertyName="SelectedValue" />
                            <asp:Parameter Name="BirthDate" />
                            <asp:ControlParameter ControlID="DropDownList5" Name="Title" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox7" Name="First" PropertyName="Text" />
                            <asp:ControlParameter ControlID="TextBox6" Name="Last" PropertyName="Text" />
                            <asp:ControlParameter ControlID="DropDownList6" Name="Gender" 
                                PropertyName="SelectedValue" />
                            <asp:Parameter Name="Married_Since" />
                            <asp:ControlParameter ControlID="DropDownList8" Name="Personnel_subarea" 
                                PropertyName="SelectedValue" />
                            <asp:ControlParameter ControlID="TextBox10" Name="Remark" PropertyName="Text" />
                        </UpdateParameters>
                    </asp:SqlDataSource>
                    <asp:TextBox ID="TextBox9" runat="server" Visible="False"></asp:TextBox>
                </td>
            </tr>
        </table>
        &nbsp;<asp:LinkButton ID="LinkButton1" runat="server" 
            onclick="LinkButton1_Click">View</asp:LinkButton>
    </form>
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="Head">

    <style type="text/css">
        .style2
        {
            height: 22px;
        }
        .style3
        {
            width: 156px;
        }
        .style4
        {
            height: 22px;
            width: 156px;
        }
        </style>
</asp:Content>
