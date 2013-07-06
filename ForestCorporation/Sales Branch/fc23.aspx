<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc23.aspx.cs" Inherits="fc23" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 768px;
            border: 1px solid #000000;
            background-color: #FFFFFF;
        }
        .style5
        {            text-align: center;
        }
        .style6
        {
            width: 268px;
        }
        .style9
        {
            height: 28px;
            width: 426px;
        }
        .style10
        {
            width: 268px;
            height: 28px;
        }
        .style11
        {
            height: 43px;
            width: 426px;
            font-size: small;
        }
        .style12
        {
            width: 268px;
            height: 43px;
        }
        .style13
        {
            height: 47px;
            width: 426px;
            font-size: small;
        }
        .style14
        {
            width: 268px;
            height: 47px;
        }
        .style15
        {
            height: 56px;
            width: 426px;
            font-size: small;
        }
        .style16
        {
            width: 268px;
            height: 56px;
            font-size: small;
        }
        .style17
        {
            text-align: left;
            width: 426px;
        }
        .style18
        {
            font-size: small;
        }
        .style19
        {
            text-align: left;
            font-size: small;
        }
        .style20
        {
            width: 268px;
            font-size: small;
        }
        .style21
        {
            text-align: left;
            width: 426px;
            font-size: small;
        }
        .style22
        {
            height: 8px;
            width: 426px;
            font-size: small;
        }
        .style23
        {
            width: 268px;
            height: 8px;
            font-size: small;
        }
        .style24
        {
            height: 14px;
            width: 426px;
            font-size: small;
        }
        .style25
        {
            width: 268px;
            height: 14px;
            font-size: small;
        }
        .style26
        {
            text-align: left;
            width: 426px;
            font-size: small;
            height: 23px;
        }
        .style27
        {
            width: 268px;
            font-size: small;
            height: 23px;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td  colspan="3" class="style18" style="text-align: center">
                <b>Gate Pass</b><asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
        <tr>
            <td class="style26">
                Pre-Numbered:</td>
            <td class="style26" valign="top">
                <asp:DropDownList ID="DropDownList5" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="Prno" DataValueField="Prno">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT prno FROM [fc23]  group by prno"></asp:SqlDataSource>
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Print" 
                    Height="21px" />
                    </td>
            <td class="style27">
                Pre-Numbered:
                        <asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style24">
                Challan no:</td>
            <td class="style24">
                <asp:DropDownList ID="DropDownList3" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="Challanno" 
                    DataValueField="f_o_no">
                </asp:DropDownList>
                <asp:Button ID="Button3" runat="server" onclick="Button2_Click" Text="Search" 
                    Height="21px" />
                    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    
                    SelectCommand="SELECT Challanno,f_o_no FROM [fc20] group by Challanno,f_o_no order by Challanno">
                </asp:SqlDataSource>
            </td>
            <td class="style25">
            </td>
        </tr>
        <tr>
            <td class="style22">
                Invoice No:</td>
            <td class="style22">
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="sr" DataValueField="fdate">
                </asp:DropDownList>
                <asp:Button ID="Button4" runat="server" onclick="Button4_Click" Text="Search" 
                    Height="21px" />
                    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT *FROM [fc21] order by sr">
                </asp:SqlDataSource>
            </td>
            <td class="style23">
            </td>
        </tr>
        <tr>
            <td class="style15" colspan="2">
                Truck no<asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            </td>
            <td class="style16">
                S.No<asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style21" colspan="2">
                Name of driver<asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
            </td>
            <td class="style20">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style9" colspan="2">
            </td>
            <td class="style10">
            </td>
        </tr>
        <tr>
            <td class="style11" colspan="2">
                Challan no:<asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
            </td>
            <td class="style12">
                <span class="style18">Date:<asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                </span>
                <cc1:MaskedEditExtender ID="TextBox6_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox6">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox6_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox6">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style13" colspan="2">
                Cash memo:<asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
            </td>
            <td class="style14">
                <span class="style18">Date:<asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
                </span>
                <cc1:MaskedEditExtender ID="TextBox7_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox7">
                </cc1:MaskedEditExtender>
                <cc1:CalendarExtender ID="TextBox7_CalendarExtender" runat="server" 
                    Enabled="True" Format="d/MM/yyyy" TargetControlID="TextBox7">
                </cc1:CalendarExtender>
            </td>
        </tr>
        <tr>
            <td class="style13" colspan="2">
                Name of purchaser:<asp:TextBox ID="TextBox8" runat="server" Height="21px" 
                    Width="193px"></asp:TextBox>
            </td>
            <td class="style14">
            </td>
        </tr>
        <tr>
            <td class="style19" colspan="3">
        Allowed the following goods from the factory</td>
                </tr>
                <tr>
                    <td class="style5" colspan="3">
                        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                            onrowdatabound="GridView1_RowDataBound" 
                            onrowcommand="GridView1_RowCommand" 
                            onrowdeleting="GridView1_RowDeleting" onrowediting="GridView1_RowEditing" 
                            onrowupdating="GridView1_RowUpdating" CssClass="style18" Width="546px" 
                            ShowFooter="True">
                            <Columns>
                                <asp:TemplateField HeaderText="Sr.no">
                                    <ItemTemplate>
                                        <asp:Label ID="Label3" runat="server" Text="<%#sr %>"></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Description of produce">
                                   
                                   
                                    <FooterTemplate>
                                        Total
                                    </FooterTemplate>
                                   
                                   
                                    <ItemTemplate>
                                        <asp:Label ID="Label4" runat="server" Text='<%# Eval("a") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Kgs./Litre">
                                   
                                   
                                    <FooterTemplate>
                                        <asp:Label ID="Label8" runat="server" Text="<%#kg %>"></asp:Label>
                                    </FooterTemplate>
                                   
                                   
                                    <ItemTemplate>
                                        <asp:Label ID="Label5" runat="server" Text='<%# Eval("b") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="No. of drums/container">
                                   
                                    
                                    <FooterTemplate>
                                        <asp:Label ID="Label9" runat="server" Text="<%#kg1 %>"></asp:Label>
                                    </FooterTemplate>
                                   
                                    
                                    <ItemTemplate>
                                        <asp:Label ID="Label6" runat="server" Text='<%# Eval("c") %>'></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                                <asp:TemplateField HeaderText="Remarks">
                                   
                                  
                                    <ItemTemplate>
                                        <asp:Label ID="Label7" runat="server" ></asp:Label>
                                    </ItemTemplate>
                                </asp:TemplateField>
                            </Columns>
                        </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    
                    InsertCommand="INSERT INTO fc23(Prno, Truckno, s_no, Nameofd, challanno, dt, cashmemo, dt1, nameofpur) VALUES (@Prno, @Truckno, @s_no, @Nameofd, @challanno, @dt, @cashmemo, @dt1, @nameofpur)" 
                    DeleteCommand="DELETE FROM fc23 WHERE (Code = @code)" 
                    
                    
                    
                            
                            
                            
                            UpdateCommand="UPDATE fc23 SET des =@des, kg =@kg, no =@no, rem =@rem where code=@code">
                    <DeleteParameters>
                        <asp:Parameter Name="code" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="des" />
                        <asp:Parameter Name="kg" />
                        <asp:Parameter Name="no" />
                        <asp:Parameter Name="rem" />
                        <asp:Parameter Name="code" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="Label1" Name="Prno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Truckno" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="s_no" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox3" Name="Nameofd" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox4" Name="challanno" 
                            PropertyName="Text" />
                        <asp:Parameter Name="dt" />
                        <asp:ControlParameter ControlID="TextBox5" Name="cashmemo" 
                            PropertyName="Text" />
                        <asp:Parameter Name="dt1" />
                        <asp:ControlParameter ControlID="TextBox8" Name="nameofpur" 
                            PropertyName="Text" />
                    </InsertParameters>
                </asp:SqlDataSource>
                        <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                            ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                            ProviderName="<%$ ConnectionStrings:ForestConnectionString.ProviderName %>" 
                            SelectCommand="SELECT *FROM fc23 order by prno"></asp:SqlDataSource>
                        <asp:Button ID="Button5" runat="server" onclick="Button5_Click" Text="Print" 
                            Width="61px" />
                    </td>
                </tr>
                <tr class="style18">
                    <td class="style17" colspan="2">
                        &nbsp;</td>
                    <td class="style6">
                        &nbsp;</td>
        </tr>
        <tr class="style18">
            <td class="style17" colspan="2">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

