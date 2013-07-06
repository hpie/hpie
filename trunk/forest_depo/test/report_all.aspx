<%@ Page Title=""  Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="report_all.aspx.cs" Inherits="broad_level_timber" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
                
        .SubTotalRowStyle{
    border:solid 1px Black;
    background-color:#81BEF7;
    font-weight:bold;
}
.GrandTotalRowStyle{
    border:solid 1px Black;  
    background-color:Gray;
    font-weight:bold;
}
.GroupHeaderStyle{
    border:solid 1px Black;
    background-color:#81BEF7;
    font-weight:bold;
}
        
    </style>
     <script type="text/javascript">
         function showNestedGridView(obj) {
             var nestedGridView = document.getElementById(obj);
             var imageID = document.getElementById('image' + obj);

             if (nestedGridView.style.display == "none") {
                 nestedGridView.style.display = "inline";
                 imageID.src = "minus.png";
             } else {
                 nestedGridView.style.display = "none";
                 imageID.src = "plus.png";
             }
         }
</script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <p>
        <br />
        <asp:ScriptManager ID="ScriptManager1" runat="server">
        </asp:ScriptManager>
        DATE OF AUCTION :
        <asp:DropDownList ID="DropDownList1" runat="server">
            <asp:ListItem Value="1">Jan</asp:ListItem>
            <asp:ListItem Value="2">Feb</asp:ListItem>
            <asp:ListItem Value="3">March</asp:ListItem>
            <asp:ListItem Value="4">Apr</asp:ListItem>
            <asp:ListItem Value="5">May</asp:ListItem>
            <asp:ListItem Value="6">Jun</asp:ListItem>
            <asp:ListItem Value="7">Jul</asp:ListItem>
            <asp:ListItem Value="8">Aug</asp:ListItem>
            <asp:ListItem Value="9">Sep</asp:ListItem>
            <asp:ListItem Value="10">Oct</asp:ListItem>
            <asp:ListItem Value="11">Nov</asp:ListItem>
            <asp:ListItem Value="12">Dec</asp:ListItem>
        </asp:DropDownList>
        &nbsp;<asp:DropDownList ID="DropDownList2" runat="server">
        </asp:DropDownList>
&nbsp;<asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Search</asp:LinkButton>
&nbsp;
        
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT [challan_no] FROM [tally_sheet] group by challan_no">
        </asp:SqlDataSource>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            InsertCommand="INSERT INTO auc_sale_list(lot_no, stack, size, no, vol, ctt, remarks, bid, name_party, challan_no, date) VALUES (@lot_no, @stack, @size, @no, @vol, @ctt, @remarks, @bid, @name_party, @challan_no, @date)" 
            
            
            
            
            
            
            
            
            
            SelectCommand="SELECT dbo.spec.categ, dbo.statement_auc_result.spec, SUM(dbo.statement_auc_result.sale_bid_amt) AS sale_bid_amt, SUM(CONVERT (decimal(10 , 2), dbo.statement_auc_result.vol_m3)) AS vol_m3 FROM dbo.statement_auc_result INNER JOIN dbo.spec ON dbo.statement_auc_result.spec = dbo.spec.spec WHERE (dbo.statement_auc_result.spec=@spec) and (CONVERT (datetime, dbo.statement_auc_result.auction_date, 101) BETWEEN @first AND @second) GROUP BY dbo.spec.categ, dbo.statement_auc_result.spec ORDER BY dbo.spec.categ DESC">
            <InsertParameters>
                <asp:Parameter Name="lot_no" />
                <asp:Parameter Name="stack" />
                <asp:Parameter Name="size" />
                <asp:Parameter Name="no" />
                <asp:Parameter Name="vol" />
                <asp:Parameter Name="ctt" />
                <asp:Parameter Name="remarks" />
                <asp:Parameter Name="name_party" />
                <asp:Parameter Name="challan_no" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="bid" />
            </InsertParameters>
            <SelectParameters>
                <asp:Parameter Name="first" />
                <asp:Parameter Name="second" />
                <asp:Parameter Name="spec" />
            </SelectParameters>
        </asp:SqlDataSource>
    </p>
        <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            InsertCommand="INSERT INTO auc_sale_list(lot_no, stack, size, no, vol, ctt, remarks, bid, name_party, challan_no, date) VALUES (@lot_no, @stack, @size, @no, @vol, @ctt, @remarks, @bid, @name_party, @challan_no, @date)" 
            
            
            
            
            
            
            
        
        SelectCommand="SELECT dbo.spec.categ, dbo.statement_auc_result.spec, SUM(dbo.statement_auc_result.sale_bid_amt) AS sale_bid_amt, SUM(CONVERT (decimal(10 , 2), dbo.statement_auc_result.vol_m3)) AS vol_m3 FROM dbo.statement_auc_result INNER JOIN dbo.spec ON dbo.statement_auc_result.spec = dbo.spec.spec where (statement_auc_result.spec=@spec) and  (CONVERT (datetime, dbo.statement_auc_result.auction_date, 101) BETWEEN @first AND @second) GROUP BY dbo.spec.categ, dbo.statement_auc_result.spec">
            <InsertParameters>
                <asp:Parameter Name="lot_no" />
                <asp:Parameter Name="stack" />
                <asp:Parameter Name="size" />
                <asp:Parameter Name="no" />
                <asp:Parameter Name="vol" />
                <asp:Parameter Name="ctt" />
                <asp:Parameter Name="remarks" />
                <asp:Parameter Name="name_party" />
                <asp:Parameter Name="challan_no" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="bid" />
            </InsertParameters>
            <SelectParameters>
                <asp:Parameter Name="spec" />
                <asp:Parameter Name="first" />
                <asp:Parameter Name="second" />
            </SelectParameters>
        </asp:SqlDataSource>
    <br />
        <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            InsertCommand="INSERT INTO auc_sale_list(lot_no, stack, size, no, vol, ctt, remarks, bid, name_party, challan_no, date) VALUES (@lot_no, @stack, @size, @no, @vol, @ctt, @remarks, @bid, @name_party, @challan_no, @date)" 
            
            
            
            
            
            
            
        
        SelectCommand="SELECT dbo.tally_sheet.spec, dbo.spec.categ, bid_avg, dbo.tally_sheet.bid_amt, SUM(dbo.tally_sheet.as_per_vol) AS as_per_vol FROM dbo.tally_sheet INNER JOIN dbo.spec ON dbo.tally_sheet.spec = dbo.spec.spec WHERE  (dbo.tally_sheet.spec=@spec) and (CONVERT (datetime, dbo.tally_sheet.auction_date, 101) BETWEEN @first AND @second) GROUP BY dbo.tally_sheet.spec, dbo.spec.categ, dbo.tally_sheet.bid_amt, bid_avg">
            <InsertParameters>
                <asp:Parameter Name="lot_no" />
                <asp:Parameter Name="stack" />
                <asp:Parameter Name="size" />
                <asp:Parameter Name="no" />
                <asp:Parameter Name="vol" />
                <asp:Parameter Name="ctt" />
                <asp:Parameter Name="remarks" />
                <asp:Parameter Name="name_party" />
                <asp:Parameter Name="challan_no" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="bid" />
            </InsertParameters>
            <SelectParameters>
                <asp:Parameter Name="first" />
                <asp:Parameter Name="second" />
                <asp:Parameter Name="spec" />
            </SelectParameters>
        </asp:SqlDataSource>
    <br />
        <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            InsertCommand="INSERT INTO auc_sale_list(lot_no, stack, size, no, vol, ctt, remarks, bid, name_party, challan_no, date) VALUES (@lot_no, @stack, @size, @no, @vol, @ctt, @remarks, @bid, @name_party, @challan_no, @date)" 
            
            
            
            
            
            
            
            
            
        SelectCommand="SELECT dbo.spec.categ, dbo.statement_auc_result.spec, SUM(dbo.statement_auc_result.sale_bid_amt) AS sale_bid_amt, SUM(CONVERT (decimal(10 , 2), dbo.statement_auc_result.vol_m3)) AS vol_m3 FROM dbo.statement_auc_result INNER JOIN dbo.spec ON dbo.statement_auc_result.spec = dbo.spec.spec WHERE (dbo.statement_auc_result.spec=@spec) and (CONVERT (datetime, dbo.statement_auc_result.auction_date, 101) BETWEEN @first AND @second) GROUP BY dbo.spec.categ, dbo.statement_auc_result.spec ORDER BY dbo.spec.categ DESC">
            <InsertParameters>
                <asp:Parameter Name="lot_no" />
                <asp:Parameter Name="stack" />
                <asp:Parameter Name="size" />
                <asp:Parameter Name="no" />
                <asp:Parameter Name="vol" />
                <asp:Parameter Name="ctt" />
                <asp:Parameter Name="remarks" />
                <asp:Parameter Name="name_party" />
                <asp:Parameter Name="challan_no" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="bid" />
            </InsertParameters>
            <SelectParameters>
                <asp:Parameter Name="first" />
                <asp:Parameter Name="second" />
                <asp:Parameter Name="spec" />
            </SelectParameters>
        </asp:SqlDataSource>
        <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            InsertCommand="INSERT INTO auc_sale_list(lot_no, stack, size, no, vol, ctt, remarks, bid, name_party, challan_no, date) VALUES (@lot_no, @stack, @size, @no, @vol, @ctt, @remarks, @bid, @name_party, @challan_no, @date)" 
            
            
            
            
            
            
            
        
        
        SelectCommand="SELECT dbo.spec.categ, dbo.statement_auc_result.spec, SUM(dbo.statement_auc_result.sale_bid_amt) AS sale_bid_amt, SUM(CONVERT (decimal(10 , 2), dbo.statement_auc_result.vol_m3)) AS vol_m3 FROM dbo.statement_auc_result INNER JOIN dbo.spec ON dbo.statement_auc_result.spec = dbo.spec.spec where (statement_auc_result.spec=@spec) and  (CONVERT (datetime, dbo.statement_auc_result.auction_date, 101) BETWEEN @first AND @second) GROUP BY dbo.spec.categ, dbo.statement_auc_result.spec">
            <InsertParameters>
                <asp:Parameter Name="lot_no" />
                <asp:Parameter Name="stack" />
                <asp:Parameter Name="size" />
                <asp:Parameter Name="no" />
                <asp:Parameter Name="vol" />
                <asp:Parameter Name="ctt" />
                <asp:Parameter Name="remarks" />
                <asp:Parameter Name="name_party" />
                <asp:Parameter Name="challan_no" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="bid" />
            </InsertParameters>
            <SelectParameters>
                <asp:Parameter Name="spec" />
                <asp:Parameter Name="first" />
                <asp:Parameter Name="second" />
            </SelectParameters>
        </asp:SqlDataSource>
    <br />
    <asp:Label ID="Label2" runat="server"></asp:Label>
    <p>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CC9966" BorderStyle="None" BorderWidth="1px" 
            CellPadding="4" EmptyDataText="No Record Available" ShowHeaderWhenEmpty="True" 
            Width="1053px" onrowdatabound="GridView1_RowDataBound" 
            onselectedindexchanged="GridView1_SelectedIndexChanged" 
            onrowcommand="GridView1_RowCommand" onrowcreated="GridView1_RowCreated" 
            EnableViewState="False" style="font-size: 7pt">
            <Columns>

                <asp:TemplateField HeaderText="">
                  
                    <ItemTemplate>
                     <asp:Label ID="Label1"  runat="server" Text='<%# Eval("categ") %>' Visible="False"></asp:Label>
                        &nbsp;<asp:Label ID="srn"  runat="server" Text='<%# Eval("spec") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
        
                <asp:TemplateField HeaderText="Vol. in m3">
                   
                     <ItemTemplate>
                        <asp:Label ID="vol11"  runat="server" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Amount">
                  
                     <ItemTemplate>
                        <asp:Label ID="amt11"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Rate.">
                   
                     <ItemTemplate>
                        <asp:Label ID="rate11"  runat="server" ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Vol.">
                 
                     <ItemTemplate>
                        <asp:Label ID="vol_2"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Amount">
                  
                     <ItemTemplate>
                        <asp:Label ID="amt_2"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Rate">
                   
                     <ItemTemplate>
                         <asp:Label ID="rate_2" runat="server"></asp:Label>
                     </ItemTemplate>
                </asp:TemplateField>
                  <asp:TemplateField HeaderText="Vol.">
                  
                     <ItemTemplate>
                        <asp:Label ID="vol_3"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Amount">
                 
                     <ItemTemplate>
                        <asp:Label ID="amt_3"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Rate">
                   
                     <ItemTemplate>
                        <asp:Label ID="rate_3"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                  <asp:TemplateField HeaderText="Vol.">
                 
                     <ItemTemplate>
                        <asp:Label ID="vol_4"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Amount">
                
                     <ItemTemplate>
                        <asp:Label ID="amt_4"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Rate">
                  
                     <ItemTemplate>
                        <asp:Label ID="rate_4"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                  <asp:TemplateField HeaderText="Vol.">
                  
                     <ItemTemplate>
                        <asp:Label ID="vol_5"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Amount">
                 
                     <ItemTemplate>
                        <asp:Label ID="amt_5"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Rate">
                
                     <ItemTemplate>
                        <asp:Label ID="rate_5"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                  <asp:TemplateField HeaderText="Vol.">
                 
                     <ItemTemplate>
                        <asp:Label ID="vol_6"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Amount">
                 
                     <ItemTemplate>
                        <asp:Label ID="amt_6"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Rate">
                  
                     <ItemTemplate>
                        <asp:Label ID="rate_6"  runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>

           
             
            </Columns>
            <FooterStyle ForeColor="#330099" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="#FFFFCC" />
            <PagerStyle BackColor="#FFFFCC" ForeColor="#330099" HorizontalAlign="Center" />
            <RowStyle BackColor="White" ForeColor="#330099" />
            <SelectedRowStyle BackColor="#FFCC66" Font-Bold="True" ForeColor="#663399" />
            <SortedAscendingCellStyle BackColor="#FEFCEB" />
            <SortedAscendingHeaderStyle BackColor="#AF0101" />
            <SortedDescendingCellStyle BackColor="#F6F0C0" />
            <SortedDescendingHeaderStyle BackColor="#7E0000" />
        </asp:GridView>
        <asp:SqlDataSource ID="spec_data" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            
            SelectCommand="SELECT        categ, spec
FROM            dbo.spec
GROUP BY categ, spec
ORDER BY categ DESC"></asp:SqlDataSource>
    </p>
    <p>
        <br />
        <br />
    </p>
   
</asp:Content>

