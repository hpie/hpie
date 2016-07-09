<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master"  CodeFile="div_index1.aspx.cs" Inherits="_Default" %>


<asp:Content ID="Content1" runat="server" 
    contentplaceholderid="ContentPlaceHolder1">

             <div id="print">
    <div id="divPrint" runat="server"   >
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
                    Select Division</td>
                <td>
                    <asp:DropDownList ID="DropDownList2" runat="server" 
                        DataSourceID="SqlDataSource2" DataTextField="Div" DataValueField="ID">
                    </asp:DropDownList>
                    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:himuda %>" 
                        SelectCommand="SELECT * FROM [tbdiv]"></asp:SqlDataSource>
                </td>
            </tr>
            <tr>
                <td >
                    Select Session</td>
                <td>
                    <asp:DropDownList ID="DropDownList1" runat="server" 
                        onselectedindexchanged="DropDownList1_SelectedIndexChanged" Width="118px">
                    </asp:DropDownList>
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
                &nbsp;
                    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Export</asp:LinkButton>
                    <asp:HiddenField ID="ReportDateParam" runat="server" />
                    <asp:HiddenField ID="ReportDivParam" runat="server" />
                </td>
            </tr>
        </table>
    <div id="excel" runat="server">
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            BackColor="White" BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" 
            CellPadding="3" 
            onrowcreated="GridView1_RowCreated" onrowdatabound="GridView1_RowDataBound" 
            style="font-family: Verdana; font-size: xx-small" ShowFooter="True">
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
                <asp:BoundField DataField="t_totalBoardShare" HeaderText="Board Share" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_totalWithdrawal6" HeaderText="Final Payment" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_closingBalance" HeaderText="Closing Balance" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_interestOpeningBalance" HeaderText="Interset  Opening Balance as on" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_interestDuringYear" HeaderText="During the year" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_totalWithdrawal10" HeaderText="Final Payment" ItemStyle-HorizontalAlign="Right"/>
                <asp:BoundField DataField="t_total8910" HeaderText="Total (11+12-13)" ItemStyle-HorizontalAlign="Right"/>
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
                 SelectCommand="Annual_Report_Board_Share_Division"
            SelectCommandType="StoredProcedure">
            <SelectParameters>
                <asp:ControlParameter Name="year" ControlID="ReportDateParam" PropertyName="Value" />
                <asp:ControlParameter Name="division" ControlID="ReportDivParam" PropertyName="Value" />
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

