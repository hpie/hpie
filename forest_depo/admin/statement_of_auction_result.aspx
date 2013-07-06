<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="statement_of_auction_result.aspx.cs" Inherits="statement_of_auction_result" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
  
  
    <style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
            height: 41px;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h2>
        statement of auction results<br />
    </h2>
    <table class="style1">
        <tr>
            <td style="text-align: left" valign="middle" class="style2" align="right">
                <asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="False" 
                    onclick="LinkButton2_Click">Report</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td style="text-align: left" valign="middle" class="style2">
                Satement showing auction results of higher put to auction on&nbsp;
                <asp:TextBox ID="date_on" runat="server" AutoPostBack="True" 
                    ontextchanged="date_on_TextChanged"></asp:TextBox>
                <asp:CalendarExtender ID="date_on_CalendarExtender" runat="server" 
                    Enabled="True" TargetControlID="date_on">
                </asp:CalendarExtender>
&nbsp;&nbsp; HSD&nbsp;&nbsp;&nbsp;&nbsp;<asp:TextBox ID="hsd" runat="server"></asp:TextBox>
                &nbsp;&nbsp; Division&nbsp;
                <asp:DropDownList ID="division" runat="server" DataTextField="division" 
                    DataValueField="division">
                </asp:DropDownList>
            &nbsp;</td>
        </tr>
        <tr>
            <td >
                
                <br />
                <br />
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
                &nbsp;<asp:Label ID="Label1" runat="server" ForeColor="#CC3300"></asp:Label>
                &nbsp;<br />
                
            </td>
        </tr>
    </table>
        <asp:GridView ID="GridView1" runat="server" DataSourceID="SqlDataSource1" 
            AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
            BorderStyle="Solid" BorderWidth="1px" CellPadding="3" style="font-size: 8pt" 
            EmptyDataText="No Data Available" Width="860px" 
        onrowdatabound="GridView1_RowDataBound" 
        onrowcreated="GridView1_RowCreated1">
            <Columns>
                <asp:TemplateField HeaderText="1">
                  
                    <ItemTemplate>
                        <asp:Label ID="sr" runat="server" Text='<%#sr %>' ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2">
                    <ItemTemplate>
                <asp:TextBox Width="50px" ID="s_no" runat="server" ></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3">
                    <ItemTemplate>
                        <asp:TextBox Width="50px" ID="bid_paper_no" runat="server" ></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4">
                    <ItemTemplate>
                       <asp:TextBox Width="100px" ID="name_of_pur" Text='<%# Eval("name_purchaser") %>' runat="server" ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5">
                    <ItemTemplate>
                       <asp:TextBox Width="50px" ID="lot_no" runat="server" 
                            Text='<%# Eval("lot_no") %>' ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6">
                    <ItemTemplate>
                       <asp:TextBox Width="50px" ID="stack_no" runat="server" 
                            Text='<%# Eval("stack") %>' ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="7">
                    <ItemTemplate>
                       <asp:TextBox Width="50px" ID="spec" runat="server" Text='<%# Eval("spec") %>' 
                            ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="8">
                    <ItemTemplate>
                        <asp:TextBox Width="90px" ID="size" runat="server" 
                            Text='<%# Eval("size_type") %>' ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                                <asp:TemplateField HeaderText="9">
                    <ItemTemplate>
                        <asp:TextBox Width="50px" ID="no" runat="server" 
                            Text='<%# Eval("as_per_no") %>' ReadOnly="True"></asp:TextBox>
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
        <asp:GridView ID="GridView2" runat="server" DataSourceID="SqlDataSource1" 
            AutoGenerateColumns="False" BackColor="White" BorderColor="#CCCCCC" 
            BorderStyle="Solid" BorderWidth="1px" CellPadding="3" 
            onrowcreated="GridView1_RowCreated" style="font-size: 8pt" 
            EmptyDataText="No Data Available" Width="860px" 
        onrowdatabound="GridView2_RowDataBound">
            <Columns>
                <asp:TemplateField HeaderText="10">
                   
                    <ItemTemplate>

                    <asp:Label ID="no" Text='<%# Eval("as_per_no") %>'  Visible="false" runat="server"></asp:Label>
                    <asp:Label ID="vol" Text='<%# Eval("as_per_vol") %>'  Visible="false" runat="server"></asp:Label>

                      <asp:TextBox Width="50px" ID="vol_m3" runat="server"  ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.1">
                    <ItemTemplate>
                   <asp:TextBox Width="50px" ID="rate_ob_per_piece" runat="server" Text='<%# Eval("average") %>'></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="11.2">
                    <ItemTemplate>
                      <asp:TextBox Width="50px" ID="rate_ob_per_m3" runat="server"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="12">
                    <ItemTemplate>
                        <asp:TextBox Width="50px" ID="sale_bid_amt" runat="server"  ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.1">
                    <ItemTemplate>
                          <asp:TextBox Width="50px" ID="floor_rate_per_piece" runat="server" Text='<%# Eval("bid_avg") %>'></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="13.2">
                    <ItemTemplate>
                       <asp:TextBox Width="50px" ID="floor_rate_per_m3" runat="server"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="14">
                    <ItemTemplate>
                        <asp:TextBox Width="50px" ID="amt" runat="server"  ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="15.1">
                    <ItemTemplate>
                       <asp:TextBox Width="50px" ID="var_amt" runat="server"  ReadOnly="True"></asp:TextBox>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="15.2">
                
                   <ItemTemplate>
                       <asp:TextBox Width="50px" ID="var_per" runat="server"  ReadOnly="True"></asp:TextBox>
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
    <%--<table class="style1" style="text-align: left" border="1px">
        <tr>
            <td class="style4">
                Bid Paper No:</td>
            <td class="style5">
                <asp:TextBox ID="bid_paper_no" runat="server"></asp:TextBox>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style9">
                Vol. M3</td>
            <td class="style8">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="vol_m3" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Name of Purchaser</td>
            <td class="style5">
                <asp:TextBox ID="name_of_pur" runat="server"></asp:TextBox>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style9" rowspan="2">
                Rate Obtained Per Piece Per M3</td>
            <td class="style8">
                Per Piece</td>
            <td>
                <asp:TextBox ID="rate_ob_per_piece" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Lot No. Purchased</td>
            <td class="style5">
                <asp:TextBox ID="lot_no_pur" runat="server"></asp:TextBox>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style8">
                Per M3</td>
            <td>
                <asp:TextBox ID="rate_ob_per_m3" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Stack No. Purchased</td>
            <td class="style5">
                <asp:TextBox ID="stack_no" runat="server"></asp:TextBox>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style9">
                Sale/Bid Ammount</td>
            <td class="style8">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="sale_bid_amt" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Species</td>
            <td class="style5">
                <asp:TextBox ID="spec" runat="server"></asp:TextBox>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style9" rowspan="2">
                Floor Rate Per M3</td>
            <td class="style8">
                Per Piece</td>
            <td>
                <asp:TextBox ID="floor_rate_per_piece" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Sizes</td>
            <td class="style5">
                <asp:TextBox ID="size" runat="server"></asp:TextBox>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style8">
                Per M3</td>
            <td>
                <asp:TextBox ID="floor_rate_per_m3" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                No.</td>
            <td class="style5">
                <asp:TextBox ID="no" runat="server"></asp:TextBox>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style9">
                Ammount</td>
            <td class="style8">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="amt" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style5">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
            <td class="style9" rowspan="2">
                Variations(+/-)%</td>
            <td class="style8">
                Amt.</td>
            <td>
                <asp:TextBox ID="var_amt" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style5">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
            <td class="style8">
                %</td>
            <td>
                <asp:TextBox ID="var_percent" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style5">
                &nbsp;</td>
            <td class="style6">
                &nbsp;</td>
            <td class="style8">
                &nbsp;</td>
            <td>
                &nbsp;</td>
                <td>
                    &nbsp;</td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td class="style5">
                <asp:LinkButton ID="LinkButton1" runat="server">Submit</asp:LinkButton>
            </td>
            <td class="style6">
                &nbsp;</td>
            <td class="style8">
                &nbsp;</td>
            <td>
                &nbsp;</td>
                <td>
                    &nbsp;</td>
        </tr>
        </table>--%>
        <asp:SqlDataSource ID="SqlDataSource_hsd" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [hsd_lot_no] FROM [tally_sheet] group by hsd_lot_no order by hsd_lot_no">
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource_div" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    SelectCommand="SELECT [division] FROM [tally_sheet] group by division order by division">
                </asp:SqlDataSource>
                <asp:ScriptManager ID="ScriptManager1" runat="server">
                </asp:ScriptManager>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
        SelectCommand="SELECT name_purchaser, lot_no, stack, spec, size_type, average, bid_avg, sum(as_per_no) as as_per_no, sum(as_per_vol) as as_per_vol FROM dbo.tally_sheet WHERE (auction_date = @auction_date) AND (name_purchaser IS NOT NULL) group by name_purchaser, lot_no, stack, spec, size_type, average, bid_avg" 
        
        
        
        InsertCommand="INSERT INTO statement_auc_result(bid_paper_no, name_of_pur, lot_no, stack_no, spec, size, no, vol_m3, rate_ob_per_piece, rate_ob_per_m3, sale_bid_amt, floor_per_piece, floor_per_m3, amt, var_amt, var_percent, auction_date, hsd_lot_no, division) VALUES (@bid_paper_no, @name_of_pur, @lot_no, @stack_no, @spec, @size, @no, @vol_m3, @rate_ob_per_piece, @rate_ob_per_m3, @sale_bid_amt, @floor_per_piece, @floor_per_m3, @amt, @var_amt, @var_percent, @auction_date, @hsd_lot_no, @division)">
                    <InsertParameters>
                        <asp:Parameter Name="bid_paper_no" />
                        <asp:Parameter Name="name_of_pur" />
                        <asp:Parameter Name="lot_no" />
                        <asp:Parameter Name="stack_no" />
                        <asp:Parameter Name="spec" />
                        <asp:Parameter Name="size" />
                        <asp:Parameter Name="no" />
                        <asp:Parameter Name="vol_m3" />
                        <asp:Parameter Name="rate_ob_per_piece" />
                        <asp:Parameter Name="rate_ob_per_m3" />
                        <asp:Parameter Name="sale_bid_amt" />
                        <asp:Parameter Name="floor_per_piece" />
                        <asp:Parameter Name="floor_per_m3" />
                        <asp:Parameter Name="amt" />
                        <asp:Parameter Name="var_amt" />
                        <asp:Parameter Name="var_percent" />
                        <asp:ControlParameter ControlID="date_on" Name="auction_date" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="hsd" Name="hsd_lot_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="division" Name="division" 
                            PropertyName="SelectedValue" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:ControlParameter ControlID="date_on" Name="auction_date" 
                            PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <br />
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
        SelectCommand="SELECT division FROM dbo.tally_sheet WHERE (auction_date = @auction_date) AND (name_purchaser IS NOT NULL)" 
        
        
        InsertCommand="INSERT INTO statement_auc_result(bid_paper_no, name_of_pur, lot_no, stack_no, spec, size, no, vol_m3, rate_ob_per_piece, rate_ob_per_m3, sale_bid_amt, floor_per_piece, floor_per_m3, amt, var_amt, var_percent, auction_date, hsd_lot_no, division) VALUES (@bid_paper_no, @name_of_pur, @lot_no, @stack_no, @spec, @size, @no, @vol_m3, @rate_ob_per_piece, @rate_ob_per_m3, @sale_bid_amt, @floor_per_piece, @floor_per_m3, @amt, @var_amt, @var_percent, @auction_date, @hsd_lot_no, @division)">
                    <InsertParameters>
                        <asp:Parameter Name="bid_paper_no" />
                        <asp:Parameter Name="name_of_pur" />
                        <asp:Parameter Name="lot_no" />
                        <asp:Parameter Name="stack_no" />
                        <asp:Parameter Name="spec" />
                        <asp:Parameter Name="size" />
                        <asp:Parameter Name="no" />
                        <asp:Parameter Name="vol_m3" />
                        <asp:Parameter Name="rate_ob_per_piece" />
                        <asp:Parameter Name="rate_ob_per_m3" />
                        <asp:Parameter Name="sale_bid_amt" />
                        <asp:Parameter Name="floor_per_piece" />
                        <asp:Parameter Name="floor_per_m3" />
                        <asp:Parameter Name="amt" />
                        <asp:Parameter Name="var_amt" />
                        <asp:Parameter Name="var_percent" />
                        <asp:ControlParameter ControlID="date_on" Name="auction_date" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="hsd" Name="hsd_lot_no" 
                            PropertyName="Text" />
                        <asp:ControlParameter ControlID="division" Name="division" 
                            PropertyName="SelectedValue" />
                    </InsertParameters>
                    <SelectParameters>
                        <asp:ControlParameter ControlID="date_on" Name="auction_date" 
                            PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
        SelectCommand="SELECT * FROM [statement_auc_result] where auction_date=@auction_date" 
        
        >
                    <SelectParameters>
                        <asp:ControlParameter ControlID="date_on" Name="auction_date" 
                            PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </asp:Content>

