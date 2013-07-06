<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master" CodeFile="actreason.aspx.cs" Inherits="actreason" %>

<asp:Content ID="Content1" runat="server" contentplaceholderid="Content">


    
    <form id="form1" runat="server" visible="False">
    <table cellpadding="0" cellspacing="0" class="style1">
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
                Action</td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" 
                    DataSourceID="SqlDataSource1" DataTextField="Action" 
                    DataValueField="Action">
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Name Of Reason</td>
            <td>
                <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                Remarks</td>
            <td>
                <asp:TextBox ID="TextBox2" runat="server" Height="61px" TextMode="MultiLine"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:ListBox ID="ListBox1" runat="server" DataSourceID="SqlDataSource2" 
                    DataTextField="reason" DataValueField="ID" Width="123px"></asp:ListBox>
            </td>
        </tr>
        <tr>
            <td class="style2">
                &nbsp;</td>
            <td>
                <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" />
                <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Update" />
            </td>
        </tr>
        <tr>
            <td class="style3">
            </td>
            <td class="style4">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3">
                &nbsp;</td>
            <td class="style4">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    SelectCommand="SELECT * FROM [Action]"></asp:SqlDataSource>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:pension %>" 
                    InsertCommand="INSERT INTO reason(ActionCode, Reason,remark,act_reason) VALUES (@ActionCode, @Reason,@remark,@actreason)" 
                    SelectCommand="SELECT * FROM [reason]" 
                    
                    UpdateCommand="UPDATE reason SET ActionCode =@ActionCode, Reason =@Reason where ID=@ID">
                    <UpdateParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="ActionCode" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Reason" PropertyName="Text" />
                        <asp:ControlParameter ControlID="ListBox1" Name="ID" 
                            PropertyName="SelectedValue" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="ActionCode" 
                            PropertyName="SelectedValue" />
                        <asp:ControlParameter ControlID="TextBox1" Name="Reason" PropertyName="Text" />
                        <asp:ControlParameter ControlID="TextBox2" Name="remark" PropertyName="Text" />
                        <asp:Parameter Name="actreason" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </td>
        </tr>
    </table>
    </form>


    
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="Head">

    <style type="text/css">
        .style1
        {
            width: 500px;
            border-style: solid;
            border-width: 1px;
        }
        .style2
        {
            width: 161px;
        }
        .style3
        {
            width: 161px;
            height: 18px;
        }
        .style4
        {
            height: 18px;
        }
    </style>
</asp:Content>

