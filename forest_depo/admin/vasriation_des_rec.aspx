<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="vasriation_des_rec.aspx.cs" Inherits="vasriation_des_rec" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 100%;
        }
        .style2
        {
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <h1>
        Month Statement Showing the Detail of Variation Between Despatch and Receipt of 
        Timber Fwd________</h1>
    <table class="style1">
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
&nbsp;&nbsp;
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="Enter Start Date" 
                    ForeColor="#CC3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="TextBox2" ErrorMessage="Enter End Date !" 
                    ForeColor="#CC3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2" colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataSourceID="SqlDataSource1" 
                    onrowcreated="GridView1_RowCreated" 
                    onrowdatabound="GridView1_RowDataBound" style="font-size: 8pt" 
                    Width="850px" ShowFooter="True">
                    <Columns>
                        <asp:TemplateField HeaderText="1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="sr" runat="server" ></asp:Label>
                                
                            </ItemTemplate>
                   
<ItemStyle Width="40px"></ItemStyle>
                   
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="2" ItemStyle-Width="60px">
                            <ItemTemplate>
                                <asp:Label ID="Label2" runat="server" Text='<%# Eval("date", "{0:d}") %>' ></asp:Label>
                            </ItemTemplate>

<ItemStyle Width="60px"></ItemStyle>

                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="3" ItemStyle-Width="60px">
                            <ItemTemplate>
                            <asp:Label ID="spec" Visible="false" runat="server" Text='<%# Eval("species") %>' ></asp:Label>
                                <asp:Label  ID="Label3" runat="server" Text='<%# Eval("spec") %>' ></asp:Label>
                            </ItemTemplate>
       
<ItemStyle Width="60px"></ItemStyle>
       
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="4" ItemStyle-Width="80px">
                            <ItemTemplate>
                                <asp:Label ID="Label4" runat="server" Text='<%# Eval("size") %>' ></asp:Label>
                            </ItemTemplate>
         
<ItemStyle Width="80px"></ItemStyle>
         
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="5.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="deo1" runat="server" ></asp:Label>
                            </ItemTemplate>
  
<ItemStyle Width="40px"></ItemStyle>
  
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="5.2"  ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="deo2" runat="server" ></asp:Label>
                            </ItemTemplate>
          
<ItemStyle Width="40px"></ItemStyle>
          
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="6.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="kail1" runat="server" ></asp:Label>
                            </ItemTemplate>
           
<ItemStyle Width="40px"></ItemStyle>
           
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="6.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="kail2" runat="server" ></asp:Label>
                            </ItemTemplate>
     
<ItemStyle Width="40px"></ItemStyle>
     
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="7.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="fir1" runat="server" ></asp:Label>
                            </ItemTemplate>
                         
<ItemStyle Width="40px"></ItemStyle>
                         
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="7.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="fir2" runat="server" ></asp:Label>
                            </ItemTemplate>
                     
<ItemStyle Width="40px"></ItemStyle>
                     
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="8.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="chil1" runat="server" ></asp:Label>
                            </ItemTemplate>
                    
<ItemStyle Width="40px"></ItemStyle>
                    
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="8.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="chil2" runat="server" ></asp:Label>
                            </ItemTemplate>
           
<ItemStyle Width="40px"></ItemStyle>
           
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="9.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="other1" runat="server" ></asp:Label>
                            </ItemTemplate>
              
<ItemStyle Width="40px"></ItemStyle>
              
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="9.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="other2" runat="server" ></asp:Label>
                            </ItemTemplate>
             
<ItemStyle Width="40px"></ItemStyle>
             
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="10.1" ItemStyle-Width="40px">
                            <FooterTemplate>
                                <asp:Label ID="no_g" runat="server" Text='<%#no_g %>' style="font-weight: 700" ></asp:Label>
                            </FooterTemplate>
                            <ItemTemplate>
                                 <asp:Label ID="tot_1" runat="server" ></asp:Label>
                            </ItemTemplate>
                
<ItemStyle Width="40px"></ItemStyle>
                
                        </asp:TemplateField>
                  <asp:TemplateField HeaderText="10.2" ItemStyle-Width="40px">
                            <FooterTemplate>
                                <asp:Label ID="vol_g" runat="server" Text='<%#vol_g %>' 
                                    style="font-weight: 700" ></asp:Label>
                            </FooterTemplate>
                            <ItemTemplate>
                                 <asp:Label ID="tot_2" runat="server" ></asp:Label>
                            </ItemTemplate>

<ItemStyle Width="40px"></ItemStyle>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="11" ItemStyle-Width="60px">
                            <ItemTemplate>
                                <asp:Label ID="Label150" runat="server" ></asp:Label>
                            </ItemTemplate>
                
<ItemStyle Width="60px"></ItemStyle>
                
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
       
                <table class="style1">
                    <tr>
                        <td>
                            &nbsp;</td>
                        <td>
                            Receipt of Timber</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                </table>
                
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataSourceID="SqlDataSource_2" 
                    onrowdatabound="GridView2_RowDataBound" style="font-size: 8pt" 
                    Width="850px" ShowFooter="True">
                    <Columns>
                        <asp:TemplateField HeaderText="1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="sr2" runat="server" ></asp:Label>
                                
                            </ItemTemplate>
                   
<ItemStyle Width="40px"></ItemStyle>
                   
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="2" ItemStyle-Width="60px">
                            <ItemTemplate>
                                <asp:Label ID="date_of_rec2" runat="server" Text='<%# Eval("date_of_rec", "{0:d}") %>' ></asp:Label>
                            </ItemTemplate>

<ItemStyle Width="60px"></ItemStyle>

                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="3" ItemStyle-Width="60px">
                            <ItemTemplate>
                         <%--   <asp:Label Visible="false" ID="spec2" runat="server" Text='<%# Eval("spec") %>' ></asp:Label>--%>
                                <asp:Label ID="kind2" runat="server" Text='<%# Eval("kind") %>' ></asp:Label>
                            </ItemTemplate>
       
<ItemStyle Width="60px"></ItemStyle>
       
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="4" ItemStyle-Width="80px">
                            <ItemTemplate>
                                <asp:Label ID="size_type2" runat="server" Text='<%# Eval("size_type") %>' ></asp:Label>
                            </ItemTemplate>
         
<ItemStyle Width="80px"></ItemStyle>
         
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="5.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="deo3" runat="server" ></asp:Label>
                            </ItemTemplate>
  
<ItemStyle Width="40px"></ItemStyle>
  
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="5.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="deo4" runat="server" ></asp:Label>
                            </ItemTemplate>
          
<ItemStyle Width="40px"></ItemStyle>
          
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="6.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="kail3" runat="server" ></asp:Label>
                            </ItemTemplate>
           
<ItemStyle Width="40px"></ItemStyle>
           
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="6.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="kail4" runat="server" ></asp:Label>
                            </ItemTemplate>
     
<ItemStyle Width="40px"></ItemStyle>
     
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="7.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="fir3" runat="server" ></asp:Label>
                            </ItemTemplate>
                         
<ItemStyle Width="40px"></ItemStyle>
                         
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="7.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="fir4" runat="server" ></asp:Label>
                            </ItemTemplate>
                     
<ItemStyle Width="40px"></ItemStyle>
                     
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="8.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="chil3" runat="server" ></asp:Label>
                            </ItemTemplate>
                    
<ItemStyle Width="40px"></ItemStyle>
                    
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="8.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="chil4" runat="server" ></asp:Label>
                            </ItemTemplate>
           
<ItemStyle Width="40px"></ItemStyle>
           
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="9.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="other3" runat="server" ></asp:Label>
                            </ItemTemplate>
              
<ItemStyle Width="40px"></ItemStyle>
              
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="9.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="other4" runat="server" ></asp:Label>
                            </ItemTemplate>
             
<ItemStyle Width="40px"></ItemStyle>
             
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="10.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                 <asp:Label ID="tot_3" runat="server" ></asp:Label>
                            </ItemTemplate>
                 <FooterTemplate>
                                <asp:Label ID="no_g2" runat="server" Text='<%#no_g2 %>' 
                                    style="font-weight: 700" ></asp:Label>
                            </FooterTemplate>

<ItemStyle Width="40px"></ItemStyle>
                        </asp:TemplateField>
                  <asp:TemplateField HeaderText="10.2" ItemStyle-Width="40px">

                     <FooterTemplate>
                                <asp:Label ID="vol_g2" runat="server" Text='<%#vol_g2 %>' 
                                    style="font-weight: 700" ></asp:Label>
                            </FooterTemplate>

                            <ItemTemplate>
                                 <asp:Label ID="tot_4" runat="server" ></asp:Label>
                            </ItemTemplate>

<ItemStyle Width="40px"></ItemStyle>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="11" ItemStyle-Width="60px">
                            <ItemTemplate>
                                <asp:Label ID="Label154" runat="server" ></asp:Label>
                            </ItemTemplate>
                
<ItemStyle Width="60px"></ItemStyle>
                
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
                
             
                <table class="style1">
                    <tr>
                        <td>
                            &nbsp;</td>
                        <td>
                            Variation</td>
                        <td>
                            &nbsp;</td>
                    </tr>
                </table>
                
         
                
                <asp:GridView ID="GridView3" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataSourceID="SqlDataSource_2" 
                    onrowdatabound="GridView3_RowDataBound" style="font-size: 8pt" 
                    Width="850px" ShowFooter="True">
                    <Columns>
                        <asp:TemplateField HeaderText="1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="sr3" runat="server" ></asp:Label>
                                
                            </ItemTemplate>
                   
<ItemStyle Width="40px"></ItemStyle>
                   
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="2" ItemStyle-Width="60px">
                            <ItemTemplate>
                                <asp:Label ID="date_of_rec3" runat="server" 
                                    Text='<%# Eval("date_of_rec", "{0:d}") %>' ></asp:Label>
                            </ItemTemplate>

<ItemStyle Width="60px"></ItemStyle>

                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="3" ItemStyle-Width="60px">
                            <ItemTemplate>
                         <%--   <asp:Label Visible="false" ID="spec2" runat="server" Text='<%# Eval("spec") %>' ></asp:Label>--%>
                                <asp:Label ID="kind3" runat="server" Text='<%# Eval("kind") %>' ></asp:Label>
                            </ItemTemplate>
       
<ItemStyle Width="60px"></ItemStyle>
       
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="4" ItemStyle-Width="80px">
                            <ItemTemplate>
                                <asp:Label ID="size_type3" runat="server" Text='<%# Eval("size_type") %>' ></asp:Label>
                            </ItemTemplate>
         
<ItemStyle Width="80px"></ItemStyle>
         
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="5.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="deo5" runat="server" ></asp:Label>
                            </ItemTemplate>
  
<ItemStyle Width="40px"></ItemStyle>
  
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="5.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="deo6" runat="server" ></asp:Label>
                            </ItemTemplate>
          
<ItemStyle Width="40px"></ItemStyle>
          
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="6.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="kail5" runat="server" ></asp:Label>
                            </ItemTemplate>
           
<ItemStyle Width="40px"></ItemStyle>
           
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="6.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="kail6" runat="server" ></asp:Label>
                            </ItemTemplate>
     
<ItemStyle Width="40px"></ItemStyle>
     
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="7.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="fir5" runat="server" ></asp:Label>
                            </ItemTemplate>
                         
<ItemStyle Width="40px"></ItemStyle>
                         
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="7.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="fir6" runat="server" ></asp:Label>
                            </ItemTemplate>
                     
<ItemStyle Width="40px"></ItemStyle>
                     
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="8.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="chil5" runat="server" ></asp:Label>
                            </ItemTemplate>
                    
<ItemStyle Width="40px"></ItemStyle>
                    
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="8.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="chil6" runat="server" ></asp:Label>
                            </ItemTemplate>
           
<ItemStyle Width="40px"></ItemStyle>
           
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="9.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="other5" runat="server" ></asp:Label>
                            </ItemTemplate>
              
<ItemStyle Width="40px"></ItemStyle>
              
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="9.2" ItemStyle-Width="40px">
                            <ItemTemplate>
                                <asp:Label ID="other6" runat="server" ></asp:Label>
                            </ItemTemplate>
             
<ItemStyle Width="40px"></ItemStyle>
             
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="10.1" ItemStyle-Width="40px">
                            <ItemTemplate>
                                 <asp:Label ID="tot_5" runat="server" ></asp:Label>
                            </ItemTemplate>
                 <FooterTemplate>
                               <asp:Label ID="g_no" runat="server" style="font-weight: 700" ></asp:Label>
                            </FooterTemplate>

<ItemStyle Width="40px"></ItemStyle>
                        </asp:TemplateField>
                  <asp:TemplateField HeaderText="10.2" ItemStyle-Width="40px">
                             <FooterTemplate>
                               <asp:Label ID="g_vol" runat="server" style="font-weight: 700" ></asp:Label>
                            </FooterTemplate>
                            <ItemTemplate>
                                 <asp:Label ID="tot_6" runat="server" ></asp:Label>
                            </ItemTemplate>

<ItemStyle Width="40px"></ItemStyle>
                       </asp:TemplateField>
                       <asp:TemplateField HeaderText="11" ItemStyle-Width="60px">
                            <ItemTemplate>
                                <asp:Label ID="Label155" runat="server" ></asp:Label>
                            </ItemTemplate>
                
<ItemStyle Width="60px"></ItemStyle>
                
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
                
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
                    
                    
                    
                    SelectCommand="SELECT dbo.rawana_challan.size, dbo.rawana_challan.date, dbo.rawana_challan.species, spec_size_type.spec FROM dbo.rawana_challan INNER JOIN spec_size_type ON dbo.rawana_challan.size = spec_size_type.size_type WHERE (CONVERT (datetime, dbo.rawana_challan.date, 101) BETWEEN @first AND @second) group by dbo.rawana_challan.size, dbo.rawana_challan.date, spec_size_type.spec, dbo.rawana_challan.species order by dbo.rawana_challan.date">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
                    
                    
                    SelectCommand="SELECT dbo.rawana_challan.size, dbo.rawana_challan.date, dbo.rawana_challan.species, sum(dbo.rawana_challan.no_2) as no_2, sum(dbo.rawana_challan.vol) as vol, spec_size_type.spec FROM dbo.rawana_challan INNER JOIN spec_size_type ON dbo.rawana_challan.size = spec_size_type.size_type WHERE (CONVERT (datetime, dbo.rawana_challan.date, 101) BETWEEN @first AND @second) group by dbo.rawana_challan.size, dbo.rawana_challan.date, dbo.rawana_challan.species, spec_size_type.spec">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
                    
                    
                    
                    SelectCommand="SELECT dbo.rawana_challan.size, dbo.rawana_challan.date, dbo.rawana_challan.species, sum(dbo.rawana_challan.no_2) as no_2, sum(dbo.rawana_challan.vol) as vol, spec_size_type.spec FROM dbo.rawana_challan INNER JOIN spec_size_type ON dbo.rawana_challan.size = spec_size_type.size_type WHERE (CONVERT (datetime, dbo.rawana_challan.date, 101) BETWEEN @first AND @second) group by dbo.rawana_challan.size, dbo.rawana_challan.date, dbo.rawana_challan.species, spec_size_type.spec order by dbo.rawana_challan.date">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <br />
                <asp:SqlDataSource ID="SqlDataSource_2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    SelectCommand="SELECT size_type, date_of_rec, kind FROM dbo.tally_sheet WHERE (CONVERT (datetime, date_of_rec, 101) BETWEEN @first AND @second) GROUP BY date_of_rec, kind, size_type order by date_of_rec">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <br />
                <asp:SqlDataSource ID="SqlDataSource_4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    SelectCommand="SELECT date_of_rec, kind, size_type, spec, SUM(as_per_no) AS as_per_no, SUM(as_per_vol) AS as_per_vol FROM dbo.tally_sheet WHERE (CONVERT (datetime, date_of_rec, 101) BETWEEN @first AND @second) AND (kind = @kind) AND (size_type = @size_type) AND (date_of_rec = @date_of_rec) GROUP BY date_of_rec, kind, size_type, spec ORDER BY date_of_rec">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="TextBox1" Name="first" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="second" PropertyName="Text" />
                        <asp:Parameter Name="kind" />
                        <asp:Parameter Name="size_type" />
                        <asp:Parameter Name="date_of_rec" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

