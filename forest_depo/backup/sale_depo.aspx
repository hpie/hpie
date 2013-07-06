<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="sale_depo.aspx.cs" Inherits="sale_depo" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
            width: 253px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        himkasth sale depo</h2>
 
      
    <br />
    &nbsp;<br />
    <br />
    &nbsp;<asp:ScriptManager ID="ScriptManager1" runat="server">
</asp:ScriptManager>
    <br />
    <table class="style1">
        <tr>
            <td class="style2">
    Name of Division:&nbsp;&nbsp;</td>
            <td>
    <asp:DropDownList ID="DropDownList1" runat="server" 
        DataSourceID="SqlDataSource5" DataTextField="division" DataValueField="division">
    </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [division] FROM [tally_sheet] group by division"></asp:SqlDataSource>
            </td>
        </tr>
       
        <tr>
            <td class="style2">
                Sl. No.</td>
            <td>
<asp:TextBox ID="sl_no_m" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="sl_no_m" ErrorMessage="Type Sl No. !" ForeColor="#990000" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Date of Disposal</td>
            <td>
                <asp:TextBox ID="date_of_dosposal" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="date_of_dosposal_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="date_of_dosposal">
                </asp:CalendarExtender>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="date_of_dosposal" ErrorMessage="Type Date of Disposal !" 
                    ForeColor="#990000" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Remarks</td>
            <td>
                <asp:TextBox ID="remark" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ControlToValidate="remark" ErrorMessage="Enter Remarks !" ForeColor="#990000"></asp:RequiredFieldValidator>
            </td>
        </tr>
         <tr>
            <td class="style2">
    Register of Disposal for the Month of.</td>
            <td>
                <asp:DropDownList ID="mon" runat="server">
                    <asp:ListItem Value="1">Jan</asp:ListItem>
                    <asp:ListItem Value="2">Feb</asp:ListItem>
                    <asp:ListItem Value="3">Mar</asp:ListItem>
                    <asp:ListItem Value="4">April</asp:ListItem>
                    <asp:ListItem Value="5">May</asp:ListItem>
                    <asp:ListItem Value="6">Jun</asp:ListItem>
                    <asp:ListItem Value="7">Jul</asp:ListItem>
                    <asp:ListItem Value="8">Aug</asp:ListItem>
                    <asp:ListItem Value="9">Sep</asp:ListItem>
                    <asp:ListItem Value="10">Oct</asp:ListItem>
                    <asp:ListItem Value="11">Nov</asp:ListItem>
                    <asp:ListItem Value="12">Dec</asp:ListItem>
                </asp:DropDownList>
&nbsp;<asp:DropDownList ID="year" runat="server">
                </asp:DropDownList>
    <asp:TextBox ID="TextBox1" runat="server" AutoPostBack="True" 
                    ontextchanged="TextBox1_TextChanged" Visible="False"></asp:TextBox>
                <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">Search</asp:LinkButton>
            </td>
        </tr>
    </table>
<br />
    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        
        
        
        
        
        
        SelectCommand="SELECT tally_sheet.challan_no, release_order.rece_vide_no, release_order.rece_date, tally_sheet.truck_no, tally_sheet.lot_no, tally_sheet.spec, tally_sheet.size_type, tally_sheet.size, gate_pass.vol, rawana_challan.name_add, tally_sheet.date_of_chl FROM tally_sheet INNER JOIN rawana_challan ON tally_sheet.challan_no = rawana_challan.no INNER JOIN gate_pass ON rawana_challan.no = gate_pass.challan_no INNER JOIN release_order ON gate_pass.challan_no = release_order.challan_no WHERE (CONVERT (datetime, tally_sheet.date_of_chl, 101) BETWEEN @first AND @second) and tally_sheet.division=@div">
        <SelectParameters>
            <asp:Parameter Name="first" />
            <asp:Parameter Name="second" />
            <asp:ControlParameter ControlID="DropDownList1" Name="div" 
                PropertyName="SelectedValue" />
        </SelectParameters>
    </asp:SqlDataSource>
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        EmptyDataText="-No Record Find-" 
        onrowcommand="GridView1_RowCommand" ShowFooter="True" 
    onrowdeleting="GridView1_RowDeleting">
        <Columns>
            <asp:TemplateField HeaderText="Sl. No." SortExpression="sl_no">
                <ItemTemplate>
                    <asp:Label ID="Label3" runat="server" Text='<%# sl %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="sl_no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Date of Disposal" SortExpression="date_of_dis">
                <ItemTemplate>
                    <asp:Label ID="Label4" runat="server" Text='<%# dtm%>' ></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox4" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="date_of_dis" runat="server" Width="70px"></asp:TextBox>
                    <asp:CalendarExtender ID="date_of_dis_CalendarExtender" runat="server" 
                        Enabled="True" TargetControlID="date_of_dis">
                    </asp:CalendarExtender>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Removal Order No." SortExpression="rem_ord_no">
                <ItemTemplate>
                    <asp:Label ID="Label5" runat="server" Text='<%# Bind("rece_vide_no") %>'></asp:Label>

                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox5" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="rem_ord" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Removal Date" SortExpression="rem_date">
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox6" runat="server" Text='<%# Eval("rem_date", "{0:MM-dd-yyyy}") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="remo_date" runat="server" Width="70px"></asp:TextBox>
                    <asp:CalendarExtender ID="remo_date_CalendarExtender" runat="server" 
                        Enabled="True" TargetControlID="remo_date">
                    </asp:CalendarExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="rec_date" runat="server" Text='<%# Eval("rece_date", "{0:MM-dd-yyyy}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="How Disposed of" SortExpression="how_disp">
                <ItemTemplate>
                    <asp:Label ID="Label7" runat="server" Text='<%# Bind("name_add") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox7" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="how_dis" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Challan No." SortExpression="challan_no">
                <ItemTemplate>
                    <asp:Label ID="Label8" runat="server" Text='<%# Bind("challan_no") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox8" runat="server" Text='<%# Bind("challan_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:DropDownList ID="challan_no" runat="server" DataSourceID="SqlDataSource1" 
                        DataTextField="challan_no" DataValueField="challan_no">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                        SelectCommand="SELECT * FROM [tally_sheet]"></asp:SqlDataSource>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vehicle No." SortExpression="vehicle_no">
                <ItemTemplate>
                    <asp:Label ID="Label9" runat="server" Text='<%# Bind("truck_no") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox9" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="veh_no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Lot. No." SortExpression="lot_no">
                <ItemTemplate>
                    <asp:Label ID="Label10" runat="server" Text='<%# Bind("lot_no") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox10" runat="server" Text='<%# Bind("lot_no") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="lot_no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Species" SortExpression="species">
                <ItemTemplate>
                    <asp:Label ID="Label11" runat="server" Text='<%# Bind("spec") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox11" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="species" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Size" SortExpression="size">
                <ItemTemplate>
                    <asp:Label ID="Label12" runat="server" Text='<%# Bind("size_type") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox12" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="size" runat="server" Width="50px"></asp:TextBox>
                    <asp:FilteredTextBoxExtender ID="size_FilteredTextBoxExtender" runat="server" 
                        Enabled="True" FilterType="Numbers" TargetControlID="size">
                    </asp:FilteredTextBoxExtender>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No." SortExpression="no">
                <ItemTemplate>
                    <asp:Label ID="Label13" runat="server" Text='<%# Bind("size") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox13" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="no" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vol" SortExpression="vol">
                <ItemTemplate>
                    <asp:Label ID="Label14" runat="server" Text='<%# Bind("vol") %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox14" runat="server" Text='<%# Bind("vol") %>'></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="vol" runat="server" Width="50px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Remarks" SortExpression="remarks">
                <ItemTemplate>
                    <asp:Label ID="Label15" runat="server" Text='<%# rem %>'></asp:Label>
                </ItemTemplate>
                <EditItemTemplate>
                    <asp:TextBox ID="TextBox15" runat="server" ></asp:TextBox>
                </EditItemTemplate>
                <FooterTemplate>
                    <asp:TextBox ID="remarks" runat="server" Width="100px"></asp:TextBox>
                </FooterTemplate>
            </asp:TemplateField>
            <asp:TemplateField>
                <ItemTemplate>
                    <asp:ImageButton ID="ImageButton1" runat="server" CommandName="delete" 
                        Height="18px" ImageUrl="~/images.jpg" Width="23px" />
                </ItemTemplate>
                <FooterTemplate>
                    <asp:LinkButton ID="LinkButton1" runat="server" CommandName="insert">Insert</asp:LinkButton>
                </FooterTemplate>
            </asp:TemplateField>
        </Columns>
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [gate_pass]"></asp:SqlDataSource>
    <br />
<br />
<asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Submit</asp:LinkButton>
&nbsp;<asp:LinkButton ID="LinkButton4" runat="server" onclick="LinkButton4_Click">Print</asp:LinkButton>
<br />
<br />
<asp:Label ID="Label16" runat="server"></asp:Label>
    &nbsp;<asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [sale_depo]"></asp:SqlDataSource>
    <asp:CalendarExtender ID="TextBox1_CalendarExtender" runat="server" 
        DefaultView="Years" Enabled="True" TargetControlID="TextBox1" 
        DaysModeTitleFormat="M" TodaysDateFormat="d, yyyy">
    </asp:CalendarExtender>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        InsertCommand="INSERT INTO sale_depo(name_div, date, sl_no, date_of_dis, rem_ord_no, rem_date, how_disp, challan_no, vehicle_no, lot_no, species, size, no, vol, remarks) VALUES (@name_div, @date, @sl_no, @date_of_dis, @rem_ord_no, @rem_date, @how_disp, @challan_no, @vehicle_no, @lot_no, @species, @size, @no, @vol, @remarks)" 
        SelectCommand="SELECT * FROM [division]">
        <InsertParameters>
            <asp:Parameter Name="name_div" />
            <asp:Parameter Name="date" />
            <asp:Parameter Name="sl_no" />
            <asp:Parameter Name="date_of_dis" />
            <asp:Parameter Name="rem_ord_no" />
            <asp:Parameter Name="rem_date" />
            <asp:Parameter Name="how_disp" />
            <asp:Parameter Name="challan_no" />
            <asp:Parameter Name="vehicle_no" />
            <asp:Parameter Name="lot_no" />
            <asp:Parameter Name="species" />
            <asp:Parameter Name="size" />
            <asp:Parameter Name="no" />
            <asp:Parameter Name="vol" />
            <asp:Parameter Name="remarks" />
        </InsertParameters>
    </asp:SqlDataSource>
 
      
</asp:Content>

