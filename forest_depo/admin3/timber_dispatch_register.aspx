<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="timber_dispatch_register.aspx.cs" Inherits="timber_dispatch_register" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        //disable postback on print button
        return false;
    }
    </script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <br />
        Select Division:
        <asp:DropDownList ID="DropDownList1" runat="server" 
            DataSourceID="SqlDataSource2" DataTextField="name_div" 
            DataValueField="name_div">
        </asp:DropDownList>
&nbsp;<asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
        <br />
    <br />
  <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" />
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT [name_div] FROM [rawana_challan] group by name_div">
        </asp:SqlDataSource>
           <div id="div_print">
           <br /><br />

    <h1>
        Timber Dispatch Register</h1>
    <p>
        Name Of Division&nbsp;
        <asp:Label ID="Label17" runat="server" style="font-weight: 700"></asp:Label>
    </p>
    <p>
        &nbsp;</p>
    <p>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            DataSourceID="SqlDataSource1" onrowcreated="GridView1_RowCreated" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" Width="681px" onrowdatabound="GridView1_RowDataBound">
            <Columns>
                <asp:TemplateField HeaderText="1">
                    <ItemTemplate>
                        <asp:Label ID="sr" runat="server" Text="Label"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="2">
                    <ItemTemplate>
                        <asp:Label ID="Label2" runat="server" Text='<%# Eval("date", "{0:d}") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="3">
                    <ItemTemplate>
                        <asp:Label ID="Label3" runat="server" Text='<%# Eval("rel_order") %>'></asp:Label>
                        &nbsp;&amp;
                        <asp:Label ID="Label18" runat="server" Text='<%# Eval("date", "{0:d}") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="4">
                 <ItemTemplate>
                        <asp:Label ID="Label4" runat="server" Text="Label"></asp:Label>
                        &nbsp;&amp;
                        <asp:Label ID="Label19" runat="server" Text="Label"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="5">
                 <ItemTemplate>
                        <asp:Label ID="Label5" runat="server" Text='<%# Eval("book_no") %>'></asp:Label>
                        &nbsp;&amp;
                        <asp:Label ID="Label6" runat="server" Text='<%# Eval("date", "{0:d}") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="6">
                 <ItemTemplate>
                        <asp:Label ID="Label7" runat="server" Text='<%# Eval("veh_kind_no") %>'></asp:Label>
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
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
            SelectCommand="SELECT * FROM [rawana_challan] where name_div=@name_div">
            <SelectParameters>
                <asp:ControlParameter ControlID="DropDownList1" Name="name_div" 
                    PropertyName="SelectedValue" />
            </SelectParameters>
        </asp:SqlDataSource>
    </p>
    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
        BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" DataSourceID="SqlDataSource1" 
        onrowcreated="GridView2_RowCreated" Width="682px">
        <Columns>
            <asp:TemplateField HeaderText="7">
                <ItemTemplate>
                    <asp:Label ID="Label8" runat="server" Text='<%# Eval("stack_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="8">
                <ItemTemplate>
                    <asp:Label ID="Label9" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="9">
                <ItemTemplate>
                    <asp:Label ID="Label10" runat="server" Text='<%# Eval("species") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="10">
                <ItemTemplate>
                    <asp:Label ID="Label11" runat="server" Text='<%# Eval("size") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="11">
                <ItemTemplate>
                    <asp:Label ID="Label12" runat="server" Text='<%# Eval("no_2") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="12">
                <ItemTemplate>
                    <asp:Label ID="Label13" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="13">
                <ItemTemplate>
                    <asp:Label ID="Label14" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="14">
                <ItemTemplate>
                    <asp:Label ID="Label15" runat="server" Text='<%# Eval("date_auc", "{0:d}") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="15">
                <ItemTemplate>
                    <asp:Label ID="Label16" runat="server" Text="Label"></asp:Label>
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

