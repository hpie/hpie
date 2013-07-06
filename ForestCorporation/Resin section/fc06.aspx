<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc06.aspx.cs" Inherits="fc06" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 599px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content3" runat="server" 
    contentplaceholderid="ContentPlaceHolder2">

          <asp:DropDownList ID="DropDownList1" runat="server" 
        DataSourceID="SqlDataSource2" DataTextField="PreNo" DataValueField="PreNo">
    </asp:DropDownList>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        SelectCommand="SELECT * FROM [fc05] ORDER BY [PreNo]"></asp:SqlDataSource>
    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
    <br />
    <table>
        <tr>
            <td class="style4">
                Pre-numbered :
                <asp:Label ID="Label7" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Date:-</td>
            <td>
                <asp:Label ID="Label9" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style4">
                &nbsp;</td>
            <td>
                Section:-</td>
            <td>
                <asp:Label ID="Label11" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style4">
                Requisition No. :
                &nbsp;<asp:Label ID="Label10" runat="server" Text="Label"></asp:Label>
            </td>
            <td>
                Destination:-</td>
            <td>
                <asp:Label ID="Label8" runat="server" Text="Label"></asp:Label>
            </td>
        </tr>
    </table>
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        style="font-size: 9pt" BackColor="White" BorderColor="#CCCCCC" 
    BorderStyle="None" BorderWidth="1px" CellPadding="3">
        <RowStyle ForeColor="#000066" />
        <Columns>
            <asp:TemplateField HeaderText="S. No.">
                <ItemTemplate>
                    <asp:Label ID="count" runat="server" Text="1"></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Materials Required">
                <FooterTemplate>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label1" runat="server" Text='<%# Eval("Material") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Purpose">
                <FooterTemplate>
                    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label2" runat="server" Text='<%# Eval("pur") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Quantity Requisitioned">
                <FooterTemplate>
                    <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
                    <cc1:FilteredTextBoxExtender ID="TextBox3_FilteredTextBoxExtender" 
                        runat="server" Enabled="True" FilterType="Numbers" TargetControlID="TextBox3">
                    </cc1:FilteredTextBoxExtender>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label3" runat="server" Text='<%# Eval("qty") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="Quantity issued">
                <ItemTemplate>
                    <asp:Label ID="Label4" runat="server" Text='<%# Eval("notin") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
           
            <asp:TemplateField HeaderText="Qtl.">
            <ItemTemplate>
            <%# Eval("netsakki") %>
            </ItemTemplate>
            
            </asp:TemplateField>
           
            <asp:TemplateField HeaderText="Remarks">
                <FooterTemplate>
                    <asp:TextBox ID="TextBox6" runat="server"></asp:TextBox>
                </FooterTemplate>
                <ItemTemplate>
                    <asp:Label ID="Label6" runat="server" Text='<%# Eval("rem") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
        </Columns>
        <FooterStyle BackColor="White" ForeColor="#000066" />
        <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
        <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
        InsertCommand="INSERT INTO fc06(mat_req, pur, qty_req, qty_iss, stock_req_folio, remark, date, sec, preno) VALUES (@mat_req, @pur, @qty_req, @qty_iss, @stock_req_folio, @remark, @date, @sec, @preno)" 
        
        SelectCommand="SELECT * FROM [fc05] where Preno=@Preno" 
        DeleteCommand="DELETE FROM fc06 WHERE (code = @code)">
        <SelectParameters>
            <asp:Parameter Name="Preno" DefaultValue="22" />
        </SelectParameters>
        <DeleteParameters>
            <asp:Parameter Name="code" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="mat_req" />
            <asp:Parameter Name="pur" />
            <asp:Parameter Name="qty_req" />
            <asp:Parameter Name="qty_iss" />
            <asp:Parameter Name="stock_req_folio" />
            <asp:Parameter Name="remark" />
            <asp:Parameter Name="date" />
            <asp:Parameter Name="preno" />
             <asp:Parameter Name="sec" />
        </InsertParameters>
    </asp:SqlDataSource>
    <br />
    Requisitioned by&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Approved by(FM/GM)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Issued by&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Receiver<br />
    <br />
    Note:<br />
    1. Prepared in duplicate carboon copy.<br />
    2. Material requistion slip shall be prepared by the indentor<br />
    3. On receipt of requisition store section shall number the slip chronologically 
    and enter in the stock register
  
    

</asp:Content>


