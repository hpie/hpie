<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc20_report.aspx.cs" Inherits="fc20_report" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 600px;
            border: 1px solid #000000;
        }
        .style5
        {
        }
        .style6
        {
            width: 258px;
            height: 37px;
        }
        .style7
        {
            height: 37px;
        }
        .style8
        {
            width: 258px;
            height: 18px;
        }
        .style9
        {
            height: 18px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style4">
        <tr>
            <td class="style6">
                Challan No:<asp:Label ID="Label1" runat="server" Text="Label"></asp:Label>
            </td>
            <td class="style7">
                Date:<asp:Label ID="Label2" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style6">
                Name of the party</td>
            <td class="style7">
                <asp:TextBox ID="TextBox1" runat="server" BorderWidth="0px" Height="133px" 
                    TextMode="MultiLine" Width="216px" ReadOnly="True"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style5">
                Factory order No:&nbsp;
                <asp:Label ID="Label3" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Date:
                <asp:Label ID="Label4" runat="server" Text="Label"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                    </td>
                    <td class="style9">
                    </td>
                </tr>
                <tr>
                    <td class="style5" colspan="2">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False"  
                    EmptyDataText="there is no data for this request" 
                            onrowdatabound="GridView1_RowDataBound" DataKeyNames="code" 
                            DataSourceID="SqlDataSource2">
                    <Columns>
                        <asp:TemplateField HeaderText="Sr.No">
                       <ItemTemplate>
                       <asp:Label ID="sr" Text="<%#sr %>" runat="server"></asp:Label>
                       </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Description of goods">
                         
                            <ItemTemplate>
                                <asp:Label ID="Label6" runat="server" Text='<%# Eval("pro_size") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:BoundField DataField="type" HeaderText="TPB/PGI" />
                        <asp:TemplateField HeaderText="No">
                          
                            <ItemTemplate>
                                <asp:Label ID="Label7" runat="server" Text='<%# Eval("qty") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Qtl./Litre">
                           
                            <ItemTemplate>
                                <asp:Label ID="Label8" runat="server" Text='<%# Eval("wtqtl") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                        <asp:TemplateField HeaderText="Kg.">
                          
                            <ItemTemplate>
                                <asp:Label ID="Label5" runat="server" Text='<%# Eval("wtKg") %>'></asp:Label>
                            </ItemTemplate>
                        </asp:TemplateField>
                       
                          
                    </Columns>
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT        Code, Description, No, Qtl_lit, Kg, F_o_no, dt, Challanno, dt1, Nameofparty
FROM            fc20
WHERE       
                         (F_o_no = @F_o_no)" 
                            DeleteCommand="DELETE FROM fc20 WHERE (Code = @code)" 
                            
                            
                            
                            
                            UpdateCommand="UPDATE fc20 SET Description =@Description, No =@No, Qtl_lit =@Qtl_lit, Kg =@Kg where code =@code">
                    <SelectParameters>
                        <asp:Parameter Name="F_o_no" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="code" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="Description" />
                        <asp:Parameter Name="No" />
                        <asp:Parameter Name="Qtl_lit" />
                        <asp:Parameter Name="Kg" />
                        <asp:Parameter Name="code" />
                    </UpdateParameters>
                </asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT       *
FROM            fc13
WHERE       
                         (fac_ord_no = @fac_ord_no)" 
                    DeleteCommand="DELETE FROM fc20 WHERE (Code = @code)" 
                    
                    
                            
                            UpdateCommand="UPDATE fc20 SET Description =@Description, No =@No, Qtl_lit =@Qtl_lit, Kg =@Kg where code =@code">
                    <SelectParameters>
                        <asp:QueryStringParameter Name="fac_ord_no" QueryStringField="ch" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="code" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="Description" />
                        <asp:Parameter Name="No" />
                        <asp:Parameter Name="Qtl_lit" />
                        <asp:Parameter Name="Kg" />
                        <asp:Parameter Name="code" />
                    </UpdateParameters>
                </asp:SqlDataSource>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td class="style5">
                        Despatch Foreman</td>
            <td>
                Store-keeper</td>
        </tr>
        <tr>
            <td class="style5">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style5">
                Notes:
                <br />
                To be prepared in triplicate<br />
                First copy to sales section<br />
                Second copy with the truck<br />
                Third copy for record</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
</asp:Content>

