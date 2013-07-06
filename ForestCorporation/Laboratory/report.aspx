<%@ Page Title="" Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="report.aspx.cs" Inherits="Laboratory_report" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<%@ Register
    Assembly="AjaxControlToolkit"
    Namespace="AjaxControlToolkit"
    TagPrefix="ajaxToolkit" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 298px;
        }
        .style3
        {
            width: 276px;
        }
        .style4
        {
            width: 295px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
     <table cellpadding="2" cellspacing="0">
        <tr>
            <td  colspan="2" align="center">
                SAKKI ANALYSIS REPORT</td>
        </tr>
     <tr>
            <td class="style3"  >
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                <br />
                Date:
                <asp:TextBox ID="TextBox3" runat="server" 
                    Text='<%# Eval("date_fc03", " {0:d/MM/yyyy}") %>'></asp:TextBox>
                <ajaxtoolkit:calendarextender ID="TextBox3_CalendarExtender" runat="server" 
                    Enabled="True" Format="dd/MM/yyyy" TargetControlID="TextBox3">
                </ajaxtoolkit:calendarextender>
                <ajaxtoolkit:maskededitextender ID="TextBox3_MaskedEditExtender" runat="server" 
                    CultureAMPMPlaceholder="" CultureCurrencySymbolPlaceholder="" 
                    CultureDateFormat="" CultureDatePlaceholder="" CultureDecimalPlaceholder="" 
                    CultureThousandsPlaceholder="" CultureTimePlaceholder="" Enabled="True" 
                    Mask="99/99/9999" MaskType="Date" TargetControlID="TextBox3">
                </ajaxtoolkit:maskededitextender>
            </td>
            <td class="style4">
                &nbsp;</td>
        </tr>
        </table>
    <table cellpadding="0" cellspacing="0" >
        <tr>
            <td>
                S. No</td>
            <td >
                Particulars</td>
            <td class="style1" >
                Unit/Div:<asp:TextBox ID="TextBox15" runat="server" 
                    Text='<%# Eval("resfwd") %>' ReadOnly="true"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                .</td>
            <td >
                1</td>
            <td class="style1">
                2</td>
        </tr>
        <tr>
            <td >
                1</td>
            <td >
                Name of the resin unit:</td>
            <td class="style1" >
                <asp:TextBox ID="TextBox4" runat="server" Text='<%# Eval("resunit") %>' 
                 ReadOnly="true"   ></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                2</td>
            <td >
                Name of LSM/Contractor</td>
            <td class="style1">
                <asp:TextBox ID="TextBox5" runat="server" Text='<%# Eval("name_lsm_name") %>'></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                3</td>
            <td >
                Challan No.</td>
            <td class="style1" >
                <asp:TextBox ID="TextBox6" runat="server" Text='<%# Eval("challanno") %>' 
                    ReadOnly="True"></asp:TextBox>
                </td>
        </tr>
        <tr>
            <td >
                4</td>
            <td >
                Lot no.</td>
            <td class="style1" >
                <asp:TextBox ID="TextBox7" runat="server" Text='<%# Eval("name_lsm_lot") %>'></asp:TextBox>
<%--                <ajaxToolkit:FilteredTextBoxExtender ID="TextBox7_FilteredTextBoxExtender" 
                    runat="server" Enabled="True" FilterType="Numbers" TargetControlID="TextBox7">
                </ajaxToolkit:FilteredTextBoxExtender>--%>
            </td>
        </tr>
        <tr>
            <td >
                5</td>
            <td >
                No. of
                <asp:Label ID="Label56" runat="server" Text='<%# Eval("Stype") %>'></asp:Label>
            </td>
            <td class="style1" >
                <asp:TextBox ID="TextBox8" runat="server" Text='<%# Eval("nostype") %>' 
                    ReadOnly="True"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                6</td>
            <td >
                Gross wt. with tins/drums:</td>
            <td class="style1" >
                <asp:TextBox ID="TextBox10" runat="server" ReadOnly="True" 
                    Text='<%# Eval("grosswetin") %>'></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                7</td>
            <td >
                wt. of tins/drums</td>
            <td class="style1" >
                <asp:TextBox ID="TextBox11" runat="server" Text='<%# Eval("NoSType") %>'></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td>
                8</td>
            <td >
                net wt. of resin with Sakki</td>
            <td class="style1" >
                <asp:TextBox ID="TextBox12" runat="server" ReadOnly="True" 
                    Text='<%# Eval("netrws") %>'></asp:TextBox>
            </td>
        </tr>
        
          <tr>
            <td >
                9</td>
            <td >Sakki % :
                </td>
            <td class="style1" >
                <asp:TextBox ID="TextBox14" runat="server" Text='<%# Eval("saaki_per") %>' ></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox14" ErrorMessage="RequiredFieldValidator" 
                    ValidationGroup="a">*</asp:RequiredFieldValidator>
                <asp:LinkButton ID="LinkButton1" runat="server" CommandName="cal1" 
                    onclick="LinkButton1_Click">Calculate</asp:LinkButton>

            </td>
        </tr>
                  <tr>
            <td >
                10</td>
            <td >Sakki Wt. :
                </td>
            <td class="style1" >
                <asp:TextBox ID="TextBox20" runat="server" Text='<%# Eval("sakki_wt") %>' ></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="TextBox20" ErrorMessage="RequiredFieldValidator" 
                    ValidationGroup="a">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td >
                11</td>
            <td >
                No of tins/drums taken for sakki analysis</td>
            <td class="style1" >
                <asp:TextBox ID="TextBox13" runat="server" Text='<%# Eval("sakki_tin") %>'></asp:TextBox>
            </td>
        </tr>
         <tr>
                <td>
                    12</td>
                <td>
                    Impurity %</td>
                <td class="style1">
                    <asp:TextBox ID="TextBox2" runat="server" Text='<%# Eval("Impurity") %>'></asp:TextBox>
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                        ControlToValidate="TextBox2" ErrorMessage="RequiredFieldValidator" 
                        ValidationGroup="a">*</asp:RequiredFieldValidator>
                <asp:LinkButton ID="jk" runat="server" CommandName="cal" onclick="jk_Click">Calculate</asp:LinkButton>

                </td>
            </tr>
             <tr>
                <td>
                    13</td>
                <td>
                    Impurity Wt.</td>
                <td class="style1">
                    <asp:TextBox ID="TextBox9" runat="server" Text='<%# Eval("Impwt") %>'></asp:TextBox>
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                        ControlToValidate="TextBox9" ErrorMessage="RequiredFieldValidator" 
                        ValidationGroup="a">*</asp:RequiredFieldValidator>
                </td>
            </tr>

                         <tr>
                <td>
                    14</td>
                <td>
                    Net Pure Resin</td>
                <td class="style1">
                    <asp:TextBox ID="TextBox18" Text='<%# Eval("net") %>' runat="server"></asp:TextBox>
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                        ControlToValidate="TextBox18" ErrorMessage="RequiredFieldValidator" 
                        ValidationGroup="a">*</asp:RequiredFieldValidator>
                </td>
            </tr>

            <tr>
                <td>
                    15</td>
                <td>
                    Remarks</td>
                <td class="style1">
                    <asp:TextBox ID="TextBox16" runat="server" Text='<%# Eval("remark") %>'></asp:TextBox>
                </td>
            </tr>

            <tr>
                <td>
                    &nbsp;</td>
                <td style="text-align: center" colspan="2">
                      
                        <asp:Button ID="Ok" runat="server" Text="OK" CommandName="Update" 
                            onclick="Ok_Click1" Width="54px" ValidationGroup="a" />
                        <asp:Button ID="CancelButton" runat="server" Text="Cancel" 
                            onclick="CancelButton_Click" />
                    </td>
            </tr>

            <tr>
                <td>
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
                <td class="style1">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc01] WHERE ([PreNo] = @PreNo)" 
                        UpdateCommand="UPDATE fc01 SET no_fc03 =@no_fc03, date_fc03 =@date_fc03, name_lsm_name =@name_lsm_name, name_lsm_lot =@name_lsm_lot, wt_of_tin_fc03 =@wt_of_tin_fc03, unit_div_fc03 =@unit_div_fc03, sakki_wt_fc03 =@sakki_wt_fc03, saaki_per =@saaki_per, remark=@remark,PreNo1=@PreNo1,sakki_tin=@sakki_tin,resunit=@resunit,Impurity=@Impurity ,impwt=@impwt,net=@net,sakki_wt=@sakki_wt where PreNo=@PreNo">
                    <SelectParameters>
                        <asp:QueryStringParameter Name="PreNo" QueryStringField="code" Type="Int32" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="no_fc03" />
                        <asp:Parameter Name="date_fc03" />
                        <asp:Parameter Name="name_lsm_name" />
                        <asp:Parameter Name="name_lsm_lot" />
                        <asp:Parameter Name="wt_of_tin_fc03" />
                        <asp:Parameter Name="unit_div_fc03" />
                        <asp:Parameter Name="sakki_wt_fc03" />
                        <asp:Parameter Name="saaki_per" />
                        <asp:Parameter Name="remark" />
                        <asp:Parameter Name="PreNo1" />
                        <asp:Parameter Name="sakki_tin" />
                        <asp:Parameter Name="resunit" />
                        <asp:Parameter Name="Impurity" />
                        <asp:Parameter Name="impwt" />
                        <asp:Parameter Name="net" />
                        <asp:Parameter Name="sakki_wt" />
                        <asp:Parameter Name="PreNo" />
                    </UpdateParameters>
                </asp:SqlDataSource>
                </td>
            </tr>
    </table>
</asp:Content>

