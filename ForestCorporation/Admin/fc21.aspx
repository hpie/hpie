<%@ Page Language="C#" MasterPageFile="MasterPage.master" AutoEventWireup="true" CodeFile="fc21.aspx.cs" Inherits="fc21" Title="Untitled Page" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style2
        {
            width: 1047px;
            border: 1px solid #000000;
            font-size: xx-small;
        }
        .style19
        {
            text-align: center;
            font-size: small;
            font-weight: bold;
        }
        .style20
        {
            width: 300px;
            border: 1px solid #000000;
        }
        .style21
        {
        }
        .style23
        {
            background-color: #3366CC;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder2" Runat="Server">
    <table cellpadding="0" cellspacing="0" class="style2">
        <tr>
            <td>
                <div class="style19">
                    <table cellpadding="0" cellspacing="0" class="style20">
                        <tr>
                            <td class="style23" colspan="2">
                                Update/Print</td>
                                        </tr>
                                        <tr>
                                            <td class="style21">
                                                Select Sr.No.</td>
                                            <td>
                                                <asp:DropDownList ID="DropDownList1" runat="server" 
                                                    DataSourceID="SqlDataSource3" DataTextField="Sr" DataValueField="Sr">
                                                </asp:DropDownList>
                                                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc21]" DeleteCommand="delete from fc21 where sr=@sr">
                                                    <DeleteParameters>
                                                        <asp:ControlParameter ControlID="DropDownList1" Name="sr" 
                                                            PropertyName="SelectedValue" />
                                                    </DeleteParameters>
                                                </asp:SqlDataSource>
                                                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ForestConnectionString %>" 
                    SelectCommand="SELECT * FROM [fc21]" DeleteCommand="delete from c21 where srno=@sr">
                                                    <DeleteParameters>
                                                        <asp:ControlParameter ControlID="DropDownList1" Name="sr" 
                                                            PropertyName="SelectedValue" />
                                                    </DeleteParameters>
                                                </asp:SqlDataSource>
                                                <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="style21" colspan="2">
                                                <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">Delete</asp:LinkButton>
                                            &nbsp;&nbsp;&nbsp;
                                                </td>
                                        </tr>
                                    </table>
                                </div>
            </td>
        </tr>
        </table>
</asp:Content>

