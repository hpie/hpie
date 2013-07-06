<%@ Page Language="C#" AutoEventWireup="true"  CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
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
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <asp:GridView ID="gridViewMaster" runat="server" AllowPaging="True" 
            AutoGenerateColumns="False" BackColor="LightGoldenrodYellow" BorderColor="Tan" 
            BorderWidth="1px" CellPadding="2" DataKeyNames="CustomerID" 
            DataSourceID="SqlDataSource1" ForeColor="Black" GridLines="None" 
            onrowdatabound="gridViewMaster_RowDataBound">
            <Columns>
            <asp:TemplateField>
                        <ItemTemplate>
                            <a href="javascript:showNestedGridView('customerID-<%# Eval("CustomerID") %>');">
                                <img id="imagecustomerID-<%# Eval("CustomerID") %>" alt="Click to show/hide orders" border="0" src="plus.png" />
                            </a>
                        </ItemTemplate>
                       </asp:TemplateField>
                <asp:BoundField DataField="CustomerID" HeaderText="CustomerID" ReadOnly="True" 
                    SortExpression="CustomerID" />
                <asp:BoundField DataField="CompanyName" HeaderText="CompanyName" 
                    SortExpression="CompanyName" />
                    <asp:TemplateField>
                    <ItemTemplate>
                      <tr>
                                <td colspan="100%">
                                   <div id="customerID-<%# Eval("CustomerID") %>" style="display:none;position:relative;left:25px;" >
                         <asp:GridView ID="nestedGridView" runat="server" AutoGenerateColumns="False" 
                            DataKeyNames="OrderID">
                             <RowStyle VerticalAlign="Top" BackColor="White" ForeColor="#330099" />
                            <Columns>
                                <asp:BoundField DataField="OrderID" HeaderText="OrderID" InsertVisible="False" 
                                    ReadOnly="True" SortExpression="OrderID" />
                                <asp:BoundField DataField="OrderDate" HeaderText="OrderDate" 
                                    SortExpression="OrderDate" />
                                    <asp:BoundField DataField="Freight" HeaderText="Freight" 
                                    SortExpression="Freight" />
                            </Columns>
                             <FooterStyle BackColor="#FFFFCC" ForeColor="#330099" />
            <PagerStyle BackColor="#FFFFCC" ForeColor="#330099" HorizontalAlign="Center" />
            <AlternatingRowStyle BackColor="#FFCC66" Font-Bold="True" ForeColor="#663399" />
            <HeaderStyle BackColor="#990000" Font-Bold="True" ForeColor="#FFFFCC" />
                        </asp:GridView>
                        </div>
                                </td>
                            </tr>
                    </ItemTemplate>
                </asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="Tan" />
            <PagerStyle BackColor="PaleGoldenrod" ForeColor="DarkSlateBlue" 
                HorizontalAlign="Center" />
            <SelectedRowStyle BackColor="DarkSlateBlue" ForeColor="GhostWhite" />
            <HeaderStyle BackColor="Tan" Font-Bold="True" />
            <AlternatingRowStyle BackColor="PaleGoldenrod" />
        </asp:GridView>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
            SelectCommand="SELECT [CustomerID], [CompanyName] FROM [Customers]">
        </asp:SqlDataSource>
            
    </div>
    </form>
</body>
</html>
