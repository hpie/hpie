﻿<%@ Page Title="Home Page" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true"
    CodeFile="Default.aspx.cs" Inherits="_Default" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="HeaderContent" runat="server" ContentPlaceHolderID="HeadContent">
    <style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
            text-align: left;
            width: 250px;
        }
        .style3
        {
            width: 250px;
        }
    </style>


</asp:Content>
<asp:Content ID="BodyContent" runat="server" ContentPlaceHolderID="MainContent">
  

    <h2>
        Timber receipt tally sheet !
    </h2>
 

    <table class="style1" align="left">
        <tr>
            <td class="style3">
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
            <td>
                <asp:SqlDataSource ID="chk_chl" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [tally_sheet] WHERE ([challan_no] = @challan_no)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="challan_no" Name="challan_no" 
                            PropertyName="Text" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                Must fill every fields.</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                Division</td>
            <td style="text-align: left">
                <asp:DropDownList ID="DropDownList3" runat="server" 
                    DataSourceID="SqlDataSource3" DataTextField="div" DataValueField="div">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [division]"></asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                Challan No.</td>
            <td style="text-align: left">
                <asp:TextBox ID="challan_no" runat="server"></asp:TextBox>
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" 
                    ControlToValidate="challan_no" ErrorMessage="Enter Challan No. First !" 
                    ForeColor="#FF3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            &nbsp;<asp:Label ID="Label2" runat="server" ForeColor="#FF3300"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style2">
                Date of Challan</td>
            <td style="text-align: left">
                <asp:TextBox ID="date_of_challan" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="date_of_challan_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="date_of_challan">
                </asp:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator9" runat="server" 
                    ControlToValidate="date_of_challan" ErrorMessage="Enter Date of Challan !" 
                    ForeColor="#FF3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style2">
                Date of Receipt</td>
            <td style="text-align: left">
                <asp:TextBox ID="date_of_recept" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="date_of_recept_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="date_of_recept">
                </asp:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator10" runat="server" 
                    ControlToValidate="date_of_recept" ErrorMessage="Enter Date of Receipt !" 
                    ForeColor="#FF3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style2">
                Truck No.</td>
            <td style="text-align: left">
                <asp:TextBox ID="truck_no" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                    ControlToValidate="truck_no" ErrorMessage="Enter Truck No !" 
                    ForeColor="#FF3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td class="style2">
                Remarks</td>
            <td style="text-align: left">
                <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
       
        <tr>
            <td colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    ShowFooter="True" onrowcommand="GridView1_RowCommand" 
                    onrowdeleting="GridView1_RowDeleting" 
                    EnableModelValidation="False" onrowdatabound="GridView1_RowDataBound">
                    <Columns>
                        <asp:TemplateField HeaderText="Scant No.">
                            <FooterTemplate>
                                <asp:TextBox ID="scant_no" runat="server" Width="70px" Text='<%#scant_auto %>' 
                                    ReadOnly="True"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="scant_no" runat="server" Text='<%# Eval("scant_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Lot No.">
                            <FooterTemplate>
                                <asp:TextBox ID="lot_no" runat="server" Width="70px" Text='<%#lot_auto %>'></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="lot_no" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                       <%--   <asp:TemplateField HeaderText="Date of Challan">
                            <FooterTemplate>
                                <asp:TextBox ID="date_of_chl" runat="server" Width="70px"></asp:TextBox>
                                <asp:CalendarExtender ID="date_of_chl_CalendarExtender" runat="server" 
                                    Enabled="True" TargetControlID="date_of_chl">
                                </asp:CalendarExtender>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="date_of_chl" runat="server" Text='<%# Eval("date_of_chl") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                      <asp:TemplateField HeaderText="Date of Receipt">
                            <FooterTemplate>
                                <asp:TextBox ID="date_of_rec" runat="server" Width="70px"></asp:TextBox>
                                <asp:CalendarExtender ID="date_of_rec_CalendarExtender" runat="server" 
                                    Enabled="True" TargetControlID="date_of_rec">
                                </asp:CalendarExtender>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="date_of_rec" runat="server" Text='<%# Eval("date_of_rec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>--%>
                        <asp:TemplateField HeaderText="Species">
                            <FooterTemplate>
                                <asp:DropDownList ID="DropDownList4" runat="server" 
                                    DataSourceID="SqlDataSource_spec" DataTextField="spec" DataValueField="spec">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource_spec" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [spec]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="spec" runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                          <asp:TemplateField HeaderText="Kind">
                            <FooterTemplate>
                                <asp:DropDownList ID="kind" runat="server" 
                                    DataSourceID="SqlDataSource_kind" DataTextField="kind" DataValueField="kind">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="SqlDataSource_kind" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [kind]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="kind" runat="server" Text='<%# Eval("kind") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>

                        <asp:TemplateField HeaderText="Size Type">
                            <FooterTemplate>
                                <asp:DropDownList ID="size_type" runat="server" DataSourceID="size_type2" 
                                    DataTextField="size_type" DataValueField="size_type" AutoPostBack="True" 
                                    onselectedindexchanged="size_type_SelectedIndexChanged">
                                </asp:DropDownList>
                                <asp:SqlDataSource ID="size_type2" runat="server" 
                                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                                    SelectCommand="SELECT * FROM [size_type]"></asp:SqlDataSource>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="size_type" runat="server" Text='<%# Eval("size_type") %>' ></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No (as per receipt)">
                            <FooterTemplate>
                                <asp:TextBox ID="size" runat="server" Width="70px">1</asp:TextBox>
                                <asp:FilteredTextBoxExtender ID="size_FilteredTextBoxExtender" runat="server" 
                                    Enabled="True" FilterType="Numbers" TargetControlID="size">
                                </asp:FilteredTextBoxExtender>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="size" runat="server" Text='<%# Eval("size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol (as per receipt)">
                            <FooterTemplate>
                                <asp:TextBox ID="size_vol" runat="server" Width="70px"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="size_vol" runat="server" Text='<%# Eval("size_vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="No (As per challan)">
                            <FooterTemplate>
                                <asp:TextBox ID="as_per_no" runat="server" Width="70px">1</asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="as_per_no" runat="server" Text='<%# Eval("as_per_no") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Vol (As per challan)">
                            <FooterTemplate>
                                <asp:TextBox ID="as_per_vol" runat="server" Width="70px"></asp:TextBox>
                               
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="as_per_vol" runat="server" Text='<%# Eval("as_per_vol") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Grade/ Class">
                            <FooterTemplate>
                                <asp:DropDownList ID="grade" runat="server">
                                    <asp:ListItem></asp:ListItem>
                                </asp:DropDownList>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="grade" runat="server" Text='<%# Eval("grade") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Stack No.">
                            <FooterTemplate>
                                <asp:TextBox ID="stack" runat="server" Width="70px" ReadOnly="True"></asp:TextBox>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:Label ID="stack" runat="server" Text='<%# Eval("stack") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField>
                            <FooterTemplate>
                                <asp:LinkButton ID="insert" runat="server" CommandName="insert">Add</asp:LinkButton>
                            </FooterTemplate>
                            <ItemTemplate>
                                <asp:ImageButton ID="ImageButton1" runat="server" CommandName="delete" 
                                    Height="18px" ImageUrl="~/images.jpg" Width="23px" />
                            </ItemTemplate>
                        </asp:TemplateField>
                    </Columns>
                </asp:GridView>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    InsertCommand="INSERT INTO tally_sheet(scant_no, lot_no, date_of_chl, spec, size, size_type, grade, stack, remarks, date_of_rec, challan_no, division, truck_no, size_vol, as_per_no, as_per_vol, kind) VALUES (@scant_no, @lot_no, @date_of_chl, @spec, @size, @size_type, @grade, @stack, @remarks, @date_of_rec, @challan_no, @division, @truck_no, @size_vol, @as_per_no, @as_per_vol, @kind)" 
                    SelectCommand="SELECT * FROM [tally_sheet]">
                    <InsertParameters>
                        <asp:Parameter Name="scant_no" />
                        <asp:Parameter Name="lot_no" />
                        <asp:Parameter Name="date_of_chl" />
                        <asp:Parameter Name="spec" />
                        <asp:Parameter Name="grade" />
                        <asp:Parameter Name="stack" />
                        <asp:ControlParameter ControlID="TextBox8" Name="remarks" 
                            PropertyName="Text" />
                        <asp:Parameter Name="date_of_rec" />
                        <asp:Parameter Name="size" />
                        <asp:ControlParameter ControlID="challan_no" Name="challan_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="DropDownList3" Name="division" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="truck_no" Name="truck_no" 
                            PropertyName="Text" />
                        <asp:Parameter Name="size_type" />
                        <asp:Parameter Name="size_vol" />
                        <asp:Parameter Name="as_per_no" />
                        <asp:Parameter Name="as_per_vol" />
                        <asp:Parameter Name="kind" />
                    </InsertParameters>
                </asp:SqlDataSource>

            </td>
            <td>
                <asp:Label ID="Label1" runat="server" ForeColor="#CC3300"></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>

</asp:Content>
