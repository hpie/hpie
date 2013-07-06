<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="bank_detail.aspx.cs" Inherits="bank_detail" Title="Untitled Page" %>

<asp:Content ID="Content1" ContentPlaceHolderID="Head" Runat="Server">
    <style type="text/css">
    .style1
    {
        width: 500px;
        border-style: solid;
        border-width: 1px;
    }
    .style2
    {
        width: 220px;
    }
</style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="Content" Runat="Server">
    <form id="form1" runat="server">
<table cellpadding="0" cellspacing="0" class="style1">
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            Record Update</td>
        <td>
            <asp:TextBox ID="TextBox8" runat="server"></asp:TextBox>
            <asp:Button ID="Button3" runat="server" onclick="Button3_Click" Text="Search" />
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            PPO No.</td>
        <td>
            <asp:TextBox ID="TextBox9" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Bank account</td>
        <td>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Payment method</td>
        <td>
            <asp:DropDownList ID="DropDownList2" runat="server" 
                DataSourceID="SqlDataSource2" DataTextField="Text" DataValueField="Text">
            </asp:DropDownList>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Bank Name</td>
        <td>
            <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Bank City</td>
        <td>
            <asp:TextBox ID="TextBox3" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            IFSC/Branch Code</td>
        <td>
            <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Bank Branch</td>
        <td>
            <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Bank House No and Street</td>
        <td>
            <asp:TextBox ID="TextBox6" runat="server" TextMode="MultiLine"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            Remarks</td>
        <td>
            <asp:TextBox ID="TextBox7" runat="server" Height="58px" TextMode="MultiLine"></asp:TextBox>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            &nbsp;</td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Save" />
            <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Update" />
            <br />
            <asp:Label ID="Label1" runat="server"></asp:Label>
        </td>
    </tr>
    <tr>
        <td class="style2">
            &nbsp;</td>
        <td>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>" 
                
                SelectCommand="SELECT [Ppno] FROM [Joining] where user1=@user order by id desc">
                <SelectParameters>
                    <asp:Parameter DefaultValue="web2" Name="user" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>" 
                SelectCommand="SELECT * FROM [pay_code]"></asp:SqlDataSource>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:pension %>" 
                InsertCommand="INSERT INTO Bank_Detail(Bank_ac, Payment_method, Bank_name, Bank_City, Branch_code,Bank_branch, Bank_address, PPO_NO, Remarks,User1) VALUES (@Bank_ac, @Payment_method, @Bank_name, @Bank_City, @Branch_code, @Bank_branch,@Bank_address, @PPO_NO, @Remarks,@User1)" 
                SelectCommand="SELECT * FROM [Bank_Detail]" 
                UpdateCommand="UPDATE Bank_Detail SET Bank_ac = @Bank_ac, Payment_method = @Payment_method, Bank_name = @Bank_name, Bank_City = @Bank_City, Branch_code = @Branch_code, Bank_branch = @Bank_branch, Bank_address = @Bank_address, Remarks = @Remarks where PPO_NO =@PPO_NO">
                <UpdateParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="Bank_ac" PropertyName="Text" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="Payment_method" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="TextBox2" Name="Bank_name" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox3" Name="Bank_City" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox4" Name="Branch_code" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox5" Name="Bank_branch" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox6" Name="Bank_address" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox7" Name="Remarks" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox8" Name="PPO_NO" 
                        PropertyName="Text" />
                </UpdateParameters>
                <InsertParameters>
                    <asp:ControlParameter ControlID="TextBox1" Name="Bank_ac" PropertyName="Text" />
                    <asp:ControlParameter ControlID="DropDownList2" Name="Payment_method" 
                        PropertyName="SelectedValue" />
                    <asp:ControlParameter ControlID="TextBox2" Name="Bank_name" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox3" Name="Bank_City" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox4" Name="Branch_code" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox6" Name="Bank_address" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox9" Name="PPO_NO" 
                        PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox7" Name="Remarks" PropertyName="Text" />
                    <asp:ControlParameter ControlID="TextBox5" Name="Bank_branch" 
                        PropertyName="Text" />
                    <asp:Parameter Name="User1" />
                </InsertParameters>
            </asp:SqlDataSource>
        </td>
    </tr>
</table>
</form>
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="Footer" Runat="Server">
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="AfterBody" Runat="Server">
</asp:Content>

