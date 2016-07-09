<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master"  CodeFile="index2.aspx.cs" Inherits="_Default" %>


<asp:Content ID="Content1" runat="server" 
    contentplaceholderid="ContentPlaceHolder1">

  <div id="print">
    <div id="divPrint" runat="server">
        <div>
    
        <table cellpadding="0" cellspacing="0" 
                 style="border-style: 1; border-color: 1; border-width: 1px;" >
            <tr>
                <td  colspan="2" 
                    style="text-align: center; color:Black; font-weight: 700; background-color: #003366">
                    Session Detail</td>
            </tr>
            <tr>
                <td >
                    Select Session</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="118px">
                    </asp:DropDownList>
                    &nbsp;
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
                        Text="Search" />
                    &nbsp;
                    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Export</asp:LinkButton>
                    <asp:HiddenField ID="ReportDateParam" runat="server" />
                </td>
            </tr>
        </table>
    <div id="excel" runat="server">
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" 
            onrowcreated="GridView1_RowCreated" onrowdatabound="GridView1_RowDataBound" 
            style="font-family: Verdana; font-size: xx-small">
            <RowStyle ForeColor="#000066" />
            <Columns>
                <asp:TemplateField HeaderText="Sr.No">
                    <ItemTemplate>
                        <asp:Label ID="Label" runat="server" Text="<%#r3 %>"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:BoundField DataField="t_accountName" HeaderText="Name &amp; Designation" ItemStyle-HorizontalAlign="Left" />
                <asp:BoundField DataField ="t_account" HeaderText="A/C No" />
                <asp:BoundField DataField="t_openingBalance" HeaderText="Opening Balance" ItemStyle-HorizontalAlign="Right" />
                <asp:BoundField DataField="t_totalRecovery" HeaderText="Recovery of Advance" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_totalSubscription" HeaderText="Sub. During the year" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_total456" HeaderText="Total (4+5+6)" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_totalAdvance" HeaderText="CPF Advance" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_totalWithdrawal9" HeaderText="Final Payment" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_closingBalance" HeaderText="Closing Balance" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_interestOpeningBalance" HeaderText="Interset  Opening Balance as on" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_interestDuringYear" HeaderText="During the year" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_totalWithdrawal13" HeaderText="Final Payment" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_total111213" HeaderText="Total (11+12-13)" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_grandTotal" HeaderText="Grand Total" ItemStyle-HorizontalAlign="Right"/>
            </Columns>
 
            <FooterStyle BackColor="White" ForeColor="#000066" Font-Bold="True" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        </asp:GridView>
       </div>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:himuda %>" 
                 SelectCommand="Annual_Report"
            SelectCommandType="StoredProcedure">
            <SelectParameters>
                <asp:ControlParameter Name="year" ControlID="ReportDateParam" PropertyName="Value" />
            </SelectParameters>
        </asp:SqlDataSource>
    
    </div>
        </div></div>


    <style type="text/css">
        .style1
        {
            width: 353px;
            border: 1px solid #000000;
            height: 399px;
        }
        .style2
        {
            width: 219px;
        }
        .style5
        {
            width: 322px;
        }
        .numberStyle
        {
            text-align:right;
        }
    </style>

</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="head">

</asp:Content>

