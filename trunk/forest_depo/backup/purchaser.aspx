<%@ Page Title="" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="purchaser.aspx.cs" Inherits="purchaser" %>

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
    <style type="text/css">
        .style1
        {
            width: 170px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <p>
       <h2>
           <asp:ScriptManager ID="ScriptManager1" runat="server">
           </asp:ScriptManager>
           set Purchaser </h2> 
    <table style="width: 734px; text-align: left;">
        <tr>
            <td class="style1">
                Select Auction Date</td>
            <td>
                <asp:DropDownList DataTextFormatString = "{0:MM/dd/yyyy}" ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="auction_date" 
                    DataValueField="auction_date" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                    <asp:ListItem></asp:ListItem>
                </asp:DropDownList>
            </td>
            <td rowspan="6">
                <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource_pur" 
                    DataTextField="name_purchaser" DataValueField="name_purchaser" Height="238px" 
                    Width="114px" AutoPostBack="True" 
                    onselectedindexchanged="ListBox1_SelectedIndexChanged"></asp:ListBox>
                <asp:SqlDataSource ID="SqlDataSource_pur" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [name_purchaser] FROM [tally_sheet] WHERE (([auction_date] = @auction_date) AND ([hsd_lot_no] = @hsd_lot_no)) group by name_purchaser">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                            PropertyName="SelectedValue" Type="DateTime" />
                        <asp:ControlParameter ControlID="DropDownList2" Name="hsd_lot_no" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style1">
                Select Hsd Lot No:</td>
            <td>
                <asp:DropDownList ID="DropDownList2" runat="server" 
                    DataSourceID="SqlDataSource2" DataTextField="hsd_lot_no" 
                    DataValueField="hsd_lot_no" AutoPostBack="True" 
                    onselectedindexchanged="DropDownList2_SelectedIndexChanged">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT [hsd_lot_no] FROM [tally_sheet] WHERE ([auction_date] = @auction_date) group by [hsd_lot_no]">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                            PropertyName="SelectedValue" Type="DateTime" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
        <tr>
            <td class="style1">
                Enter Purchaser Name</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="TextBox1" ErrorMessage="Enter Purchaser Name !" 
                    ForeColor="#CC3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style1">
                Bid Ammount</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="TextBox2" ErrorMessage="Enter Bid Ammount !" 
                    ForeColor="#CC3300" SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style1">
                &nbsp;</td>
            <td>
                <asp:Label ID="Label1" runat="server" ForeColor="#CC3300"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style1">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT auction_date FROM [tally_sheet] where auction_date is not null  group by auction_date " 
        
        
    UpdateCommand="UPDATE dbo.tally_sheet SET name_purchaser =@name_purchaser, bid_amt=@bid_amt, bid_avg=@bid_avg where auction_date=@auction_date and hsd_lot_no=@hsd_lot_no">
        <UpdateParameters>
            <asp:ControlParameter ControlID="TextBox1" Name="name_purchaser" 
                PropertyName="Text" />
            <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="DropDownList2" Name="hsd_lot_no" 
                PropertyName="SelectedValue" />
            <asp:ControlParameter ControlID="TextBox2" Name="bid_amt" PropertyName="Text" />
            <asp:Parameter Name="bid_avg" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        SelectCommand="SELECT [name_purchaser] FROM [tally_sheet] WHERE (([auction_date] = @auction_date) AND ([hsd_lot_no] = @hsd_lot_no)) and name_purchaser is null">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                PropertyName="SelectedValue" Type="DateTime" />
            <asp:ControlParameter ControlID="DropDownList2" Name="hsd_lot_no" 
                PropertyName="SelectedValue" Type="String" />
        </SelectParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
        SelectCommand="SELECT [bid_amt], name_purchaser FROM [tally_sheet] WHERE (([auction_date] = @auction_date) AND ([hsd_lot_no] = @hsd_lot_no))">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                PropertyName="SelectedValue" Type="DateTime" />
            <asp:ControlParameter ControlID="DropDownList2" Name="hsd_lot_no" 
                PropertyName="SelectedValue" Type="String" />
        </SelectParameters>
    </asp:SqlDataSource>
    <br />
    <asp:SqlDataSource ID="bid_avg" runat="server" 
        ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
        
    SelectCommand="SELECT [hsd_lot_no], [spec], [kind], size_type, [grade],  sum(as_per_no) as as_per_no FROM [tally_sheet] where auction_date=@auction_date  group by[hsd_lot_no], [spec], [kind], size_type, [grade]">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList1" Name="auction_date" 
                PropertyName="SelectedValue" />
        </SelectParameters>
    </asp:SqlDataSource>
    </p>
</asp:Content>

