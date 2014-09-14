<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master"  CodeFile="div_index.aspx.cs" Inherits="_Default" %>


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
                &nbsp;
                    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Search" />
                    <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Export</asp:LinkButton>
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
                        <asp:Label ID="Label3" runat="server" Text="<%# Container.DataItemIndex+1 %>"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Name &amp; Designation">
                    <ItemTemplate>
                        <asp:Label ID="Label1" runat="server" Text='<%# Eval("Name_des") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="A/C No.">
                    <ItemTemplate>
                        <asp:Label ID="Label2" runat="server" Text='<%# Eval("AC") %>'></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Opening Balance">
                    <FooterTemplate>
                        <asp:Label ID="Label8" runat="server" Text="<%#f8 %>"></asp:Label>
                    </FooterTemplate>
                
                    <ItemTemplate>
                        <asp:Label ID="Label4" runat="server"  ></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Recovery of Advance">
                    <FooterTemplate>
                        <asp:Label ID="Label9" runat="server" Text="<%#f9 %>"></asp:Label>
                    </FooterTemplate>
                    <ItemTemplate>
                         <asp:Label ID="Label5" runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Sub. During the year">
                    <FooterTemplate>
                        <asp:Label ID="Label10" runat="server" Text="<%#f10 %>"></asp:Label>
                    </FooterTemplate>
                    <ItemTemplate>
                       
                        <asp:Label ID="Label6" runat="server"></asp:Label>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Total (4+5+6)">
                    <FooterTemplate>
                        <asp:Label ID="Label11" runat="server" Text="<%#f11 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="CPF Advance">
                    <FooterTemplate>
                        <asp:Label ID="Label12" runat="server" Text="<%#f12 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Final Payment">
                    <FooterTemplate>
                        <asp:Label ID="Label13" runat="server" Text="<%#f13 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Closing Balance">
                    <FooterTemplate>
                        <asp:Label ID="Label14" runat="server" Text="<%#f14 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Opening Balance" Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label15" runat="server" Text="<%#f15 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="During the year" Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label16" runat="server" Text="<%#f16 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Adjustment with LIC" Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label17" runat="server" Text="<%#f17 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Total (11+12-13)" Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label18" runat="server" Text="<%#f18 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Interset  Opening Balance as on">
                    <FooterTemplate>
                        <asp:Label ID="Label19" runat="server" Text="<%#f19 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="During the year ">
                    <FooterTemplate>
                        <asp:Label ID="Label20" runat="server" Text="<%#f20 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Final Payment">
                    <FooterTemplate>
                        <asp:Label ID="Label21" runat="server" Text="<%#f21 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Total (11+12-13)">
                    <FooterTemplate>
                        <asp:Label ID="Label22" runat="server" Text="<%#f22 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Opening Balance as on " Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label23" runat="server" Text="<%#f23 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="During the year " Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label24" runat="server" Text="<%#f24 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Final Payment" Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label25" runat="server" Text="<%#f25 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Total" Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label26" runat="server" Text="<%#f26 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Total Interest " Visible="False">
                    <FooterTemplate>
                        <asp:Label ID="Label27" runat="server" Text="<%#f27 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
                <asp:TemplateField HeaderText="Grand Total ">
                    <FooterTemplate>
                        <asp:Label ID="Label28" runat="server" Text="<%#f28 %>"></asp:Label>
                    </FooterTemplate>
                </asp:TemplateField>
            </Columns>
            <FooterStyle BackColor="White" ForeColor="#000066" Font-Bold="True" />
            <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
            <SelectedRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
            <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
        </asp:GridView>
       </div>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:himuda %>" 
            
            
            
                 SelectCommand="SELECT ac,name_des from cpf where ac is not null and div=@div and date&gt;=@date and date&lt;=@date1  group by ac,name_des order by ac">
            <SelectParameters>
                <asp:ControlParameter ControlID="DropDownList2" Name="div" 
                    PropertyName="SelectedValue" />
                <asp:Parameter Name="date" />
                <asp:Parameter Name="date1" />
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
        </style>
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="head">
    






</asp:Content>

