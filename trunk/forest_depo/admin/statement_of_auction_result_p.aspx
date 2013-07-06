<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="statement_of_auction_result_p.aspx.cs" Inherits="statement_of_auction_result_p" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
  
  <script language="javascript" type="text/javascript">
      function printDiv(divID) {
          //Get the HTML of div
          var divElements = document.getElementById(divID).innerHTML;
          //Get the HTML of whole page
          var oldPage = document.body.innerHTML;

          //Reset the page's HTML with div's HTML only
          document.body.innerHTML = "" + divElements + "</body>";

          //Print Page
          window.print();

          //Restore orignal HTML
          document.body.innerHTML = oldPage;

          //disable postback on print button
          return false;
      }
    </script>
    <style type="text/css">
        .style1
        {
            width: 42%;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
 <br />
 
 
    <table class="style1" style="text-align: left">
        <tr>
            <td>
                Select Purchaser Name
            </td>
            <td>
                <asp:DropDownList DataTextFormatString = "{0:MM/dd/yyyy}" ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="name_of_pur" 
                    DataValueField="name_of_pur" AutoPostBack="True">
                    <asp:ListItem></asp:ListItem>
                </asp:DropDownList>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT name_of_pur FROM [statement_auc_result] where name_of_pur is not null  group by name_of_pur " 
        
                    UpdateCommand="UPDATE dbo.tally_sheet SET name_purchaser =@name_purchaser where auction_date=@auction_date and hsd_lot_no=@hsd_lot_no">
        <UpdateParameters>
            <asp:ControlParameter ControlID="TextBox1" Name="name_purchaser" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="DropDownList2" Name="hsd_lot_no" 
                PropertyName="SelectedValue" />
        </UpdateParameters>
    </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td>
                Select Date of Auction</td>
            <td>
                <asp:TextBox ID="auc_date" runat="server"></asp:TextBox>
                <asp:CalendarExtender ID="auc_date_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="auc_date">
                </asp:CalendarExtender>
                <br />
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="auc_date" ErrorMessage="Enter Auction Date !" 
                    ForeColor="#CC3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:Label ID="Label4" runat="server" ForeColor="#CC3300"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td>
               <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" /></td>
            <td>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
            </td>
        </tr>
    </table>
 
  <div id="div_print">
  <br />
 <h2>
       
        statement of auction results</h2>

        <br />
                Satement showing auction results of higher put to auction on&nbsp;<asp:Label 
          ID="Label1" runat="server" style="font-weight: 700"></asp:Label>
&nbsp;at HSD
      <asp:Label ID="Label2" runat="server" style="font-weight: 700"></asp:Label>
&nbsp;Division
      <asp:Label ID="Label3" runat="server" style="font-weight: 700"></asp:Label>

        <br />

        <br />
    
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT * FROM statement_auc_result where name_of_pur=@name_of_pur and auction_date=@date_auction" 
        
          
          
          UpdateCommand="UPDATE dbo.tally_sheet SET name_purchaser =@name_purchaser where auction_date=@auction_date and hsd_lot_no=@hsd_lot_no">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList1" Name="name_of_pur" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="auc_date" Name="date_auction" 
                PropertyName="Text" />
        </SelectParameters>
        <UpdateParameters>
            <asp:ControlParameter ControlID="TextBox1" Name="name_purchaser" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="DropDownList2" Name="hsd_lot_no" 
                PropertyName="SelectedValue" />
        </UpdateParameters>
    </asp:SqlDataSource>
        <br />
        <asp:GridView ID="GridView1" runat="server" DataSourceID="SqlDataSource2" 
            AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
            BorderStyle="Solid" BorderWidth="1px" CellPadding="3" style="font-size: 8pt" 
            EmptyDataText="No Data Available" Width="1036px" 
        onrowdatabound="GridView1_RowDataBound" 
        onrowcreated="GridView1_RowCreated">
            <Columns>
                <asp:TemplateField HeaderText="1">
                  
                    <ItemTemplate>
                        <asp:Label ID="sr" runat="server" Text='<%#sr %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2">
                    <ItemTemplate>
                <asp:Label  ID="s_no" runat="server"  ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3">
                    <ItemTemplate>
                        <asp:Label  ID="bid_paper_no" runat="server" Text='<%# Eval("bid_paper_no") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4">
                    <ItemTemplate>
                       <asp:Label Width="100px" ID="name_of_pur" Text='<%# Eval("name_of_pur") %>' runat="server" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5">
                    <ItemTemplate>
                       <asp:Label  ID="lot_no" runat="server" 
                            Text='<%# Eval("lot_no") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6">
                    <ItemTemplate>
                       <asp:Label  ID="stack_no" runat="server" 
                            Text='<%# Eval("stack_no") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7">
                    <ItemTemplate>
                       <asp:Label  ID="spec" runat="server" Text='<%# Eval("spec") %>' 
                            ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8">
                    <ItemTemplate>
                        <asp:Label  ID="size" runat="server" 
                            Text='<%# Eval("size") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                                <asp:TemplateField HeaderText="9">
                    <ItemTemplate>
                        <asp:Label  ID="no" runat="server" 
                            Text='<%# Eval("no") %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <RowStyle ForeColor="#000066" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <SortedAscendingCellStyle BackColor="#F1F1F1" />
            <SortedAscendingHeaderStyle BackColor="#007DBB" />
            <SortedDescendingCellStyle BackColor="#CAC9C9" />
            <SortedDescendingHeaderStyle BackColor="#00547E" />
        </asp:GridView>
    <br />
    <br />
        <asp:GridView ID="GridView2" runat="server" DataSourceID="SqlDataSource2" 
            AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
            BorderStyle="Solid" BorderWidth="1px" CellPadding="3" 
            onrowcreated="GridView2_RowCreated" style="font-size: 8pt" 
            EmptyDataText="No Data Available" Width="1033px" 
        onrowdatabound="GridView2_RowDataBound">
            <Columns>
                <asp:TemplateField HeaderText="9">
                   
                    <ItemTemplate>

                 

                      <asp:Label  ID="vol_m3" runat="server" Text='<%# Eval("vol_m3") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.1">
                    <ItemTemplate>
                   <asp:Label  ID="rate_ob_per_piece" runat="server" Text='<%# Eval("rate_ob_per_piece") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="10.2">
                    <ItemTemplate>
                      <asp:Label  ID="rate_ob_per_m3" runat="server" Text='<%# Eval("rate_ob_per_m3") %>'>></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11">
                    <ItemTemplate>
                        <asp:Label  ID="sale_bid_amt" runat="server" Text='<%# Eval("sale_bid_amt") %>'>  ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.1">
                    <ItemTemplate>
                          <asp:Label  ID="floor_rate_per_piece" runat="server" Text='<%# Eval("floor_per_piece") %>'>></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12.2">
                    <ItemTemplate>
                       <asp:Label  ID="floor_rate_per_m3" runat="server" Text='<%# Eval("rate_ob_per_m3") %>'>></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13">
                    <ItemTemplate>
                        <asp:Label  ID="amt" runat="server" Text='<%# Eval("amt") %>'>  ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="14.1">
                    <ItemTemplate>
                       <asp:Label  ID="var_amt" runat="server" Text='<%# Eval("var_amt") %>'>  ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="14.2">
                
                   <ItemTemplate>
                       <asp:Label  ID="var_per" runat="server" Text='<%# Eval("var_percent") %>'>  ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <RowStyle ForeColor="#000066" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <SortedAscendingCellStyle BackColor="#F1F1F1" />
            <SortedAscendingHeaderStyle BackColor="#007DBB" />
            <SortedDescendingCellStyle BackColor="#CAC9C9" />
            <SortedDescendingHeaderStyle BackColor="#00547E" />
        </asp:GridView>
        </div>
</asp:Content>

