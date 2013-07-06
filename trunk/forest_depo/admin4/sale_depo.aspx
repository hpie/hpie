<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="sale_depo.aspx.cs" Inherits="sale_depo" %>

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
    <table class="style1" style="text-align: left">
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
        
        
        
        
        
        
        
        
        SelectCommand="SELECT challan_no, truck_no, lot_no, spec, size_type, as_per_no, as_per_vol, date_of_chl FROM dbo.tally_sheet WHERE (CONVERT (datetime, date_of_chl, 101) BETWEEN @first AND @second) AND (division = @div)">
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
    
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Date of Disposal" SortExpression="date_of_dis">
                <ItemTemplate>
                    <asp:Label ID="Label4" runat="server" Text='<%# dtm%>' ></asp:Label>
                </ItemTemplate>
   
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Removal Order No." SortExpression="rem_ord_no">
                <ItemTemplate>
                   
                 <%--   <asp:Label ID="Label5" runat="server" Text='<%# Bind("rece_vide_no") %>'></asp:Label>--%>

                </ItemTemplate>
   
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Removal Date" SortExpression="rem_date">

                <ItemTemplate>
                   <%-- <asp:Label ID="rec_date" runat="server" Text='<%# Eval("rece_date", "{0:MM-dd-yyyy}") %>'></asp:Label>--%>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="How Disposed of" SortExpression="how_disp">
                <ItemTemplate>
                   <%-- <asp:Label ID="Label7" runat="server" Text='<%# Bind("name_add") %>'></asp:Label>--%>
                </ItemTemplate>
              

            </asp:TemplateField>
            <asp:TemplateField HeaderText="Challan No." SortExpression="challan_no">
                <ItemTemplate>
                    <asp:Label ID="Label8" runat="server" Text='<%# Bind("challan_no") %>'></asp:Label>
                </ItemTemplate>
     
              
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vehicle No." SortExpression="vehicle_no">
                <ItemTemplate>
                    <asp:Label ID="Label9" runat="server" Text='<%# Bind("truck_no") %>'></asp:Label>
                </ItemTemplate>
              

            </asp:TemplateField>
            <asp:TemplateField HeaderText="Lot. No." SortExpression="lot_no">
                <ItemTemplate>
                    <asp:Label ID="Label10" runat="server" Text='<%# Bind("lot_no") %>'></asp:Label>
                </ItemTemplate>
              
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Species" SortExpression="species">
                <ItemTemplate>
                    <asp:Label ID="Label11" runat="server" Text='<%# Bind("spec") %>'></asp:Label>
                </ItemTemplate>
              
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Size" SortExpression="size">
           
                <ItemTemplate>
                    <asp:Label ID="Label12" runat="server" Text='<%# Bind("size_type") %>'></asp:Label>
                </ItemTemplate>
              
            </asp:TemplateField>
            <asp:TemplateField HeaderText="No." SortExpression="no">
             
                <ItemTemplate>
                    <asp:Label ID="Label13" runat="server" Text='<%# Bind("as_per_no") %>'></asp:Label>
                </ItemTemplate>
              
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Vol" SortExpression="vol">
                <ItemTemplate>
                    <asp:Label ID="Label14" runat="server" Text='<%# Bind("as_per_vol") %>'></asp:Label>
                </ItemTemplate>
              
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Remarks" SortExpression="remarks">
                <ItemTemplate>
                    <asp:Label ID="Label15" runat="server" Text='<%# rem %>'></asp:Label>
                </ItemTemplate>
               
            </asp:TemplateField>
            <asp:TemplateField>
                <ItemTemplate>
                <%--    <asp:ImageButton ID="ImageButton1" runat="server" CommandName="delete" 
                        Height="18px" ImageUrl="~/images.jpg" Width="23px" />--%>
                </ItemTemplate>
              
            </asp:TemplateField>
        </Columns>
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM [gate_pass]"></asp:SqlDataSource>
    <br />
<br />
<asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Submit</asp:LinkButton>
&nbsp;<asp:LinkButton ID="LinkButton4" runat="server" onclick="LinkButton4_Click" 
        CausesValidation="False">Print</asp:LinkButton>
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

