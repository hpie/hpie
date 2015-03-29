<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="profile.aspx.cs" Inherits="user_profile" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">
        .style1
    {
        width: 404px;
    }
        .style2
        {
            width: 100%;
        }
        .style3
        {
            height: 30px;
        }
        .style4
        {
            width: 873px;
        }
        .style5
        {
            height: 37px;
        }
        .style6
        {
            height: 37px;
            width: 185px;
        }
        .style7
        {
            height: 30px;
            width: 185px;
        }
        .style8
        {
            width: 185px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
     <div class="banner"> User Profile</div>
     <br />
     <table class="style4">
         <tr>
             <td class="style6">
                 Select Center Name</td>
             <td class="style5">
                <asp:DropDownList ID="DropDownList4" runat="server" 
                    DataSourceID="SqlDataSource6" DataTextField="name" 
                    DataValueField="center_code_main">
                </asp:DropDownList>
                <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [tb1]"></asp:SqlDataSource>
             </td>
         </tr>
         <tr>
             <td class="style7">
                 <asp:LinkButton ID="LinkButton4" runat="server" onclick="LinkButton4_Click">Search</asp:LinkButton>
             </td>
             <td class="style3">
             </td>
         </tr>
         <tr>
             <td class="style8">
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
     </table>
    <table class="style2">
        <tr>
            <td valign="top">
    <asp:DataList ID="DataList1" runat="server" DataSourceID="SqlDataSource1" 
        oncancelcommand="DataList1_CancelCommand" oneditcommand="DataList1_EditCommand" 
        Width="321px" DataKeyField="code" onupdatecommand="DataList1_UpdateCommand">
        <EditItemTemplate>
           
             <strong>Company &amp; Mailing Address Details</strong>
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <asp:LinkButton ID="LinkButton1" runat="server" CommandName="update">Update</asp:LinkButton>
            &nbsp;|
            <asp:LinkButton ID="LinkButton2" runat="server" CommandName="cancel">Cancel</asp:LinkButton>
            <br />
            ---------------------------------------------------------------<br />
             <table class="style1">
                 <tr>
                     <td>
                         Email:</td>
                     <td>
                         <asp:TextBox ID="txt1" runat="server" Text='<%# Eval("email") %>' 
                             CssClass="ttxt"></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Name:</td>
                     <td>
                         <asp:TextBox CssClass="ttxt" ID="txt2" runat="server" 
                             Text='<%# Eval("name") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Website:</td>
                     <td>
                         <asp:TextBox CssClass="ttxt" ID="txt3" runat="server" 
                             Text='<%# Eval("website") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Address:</td>
                     <td>
                         <asp:TextBox CssClass="ttxt" ID="txt4" runat="server" 
                             Text='<%# Eval("address") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Phone:</td>
                     <td>
                         <asp:TextBox CssClass="ttxt" ID="txt5" runat="server" 
                             Text='<%# Eval("ph") %>' />
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Country:</td>
                     <td>
                         <asp:TextBox CssClass="ttxt" ID="txt6" runat="server" ReadOnly="True" 
                             Text='<%# Eval("country") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         State:</td>
                     <td>
                         <asp:TextBox ID="txt7" CssClass="ttxt" runat="server" ReadOnly="True" 
                             Text='<%# Eval("state") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Dist:
                     </td>
                     <td>
                         <asp:TextBox ID="txt8" CssClass="ttxt" runat="server" ReadOnly="True" 
                             Text='<%# Eval("distt") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         City:
                     </td>
                     <td>
                         <asp:TextBox ID="txt9" CssClass="ttxt" runat="server" ReadOnly="True" 
                             Text='<%# Eval("city") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Pin Code:</td>
                     <td>
                         <asp:TextBox ID="txt10" CssClass="ttxt" runat="server" ReadOnly="True" 
                             Text='<%# Eval("pcode") %>'></asp:TextBox>
                     </td>
                 </tr>
             </table>
            ---------------------------------------------------------------
           
        </EditItemTemplate>
        <ItemTemplate>
           
            <strong>Company &amp; Mailing Address Details</strong>
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <asp:LinkButton ID="LinkButton1" runat="server" CommandName="edit">Edit</asp:LinkButton>
            <br />
            ---------------------------------------------------------------<br />
            <table class="style1">
                <tr class="style3">
                    <td >
                        Email:</td>
                    <td >
                        <asp:Label ID="emailLabel" runat="server" Text='<%# Eval("email") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Name:</td>
                    <td>
                        <asp:Label ID="nameLabel" runat="server" Text='<%# Eval("name") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Website:</td>
                    <td>
                        <asp:Label ID="websiteLabel" runat="server" Text='<%# Eval("website") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Address:
                    </td>
                    <td>
                        <asp:Label ID="addressLabel" runat="server" Text='<%# Eval("address") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Phone:</td>
                    <td>
                        <asp:Label ID="phLabel" runat="server" Text='<%# Eval("ph") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Country:</td>
                    <td>
                        <asp:Label ID="countryLabel" runat="server" Text='<%# Eval("country") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        State:</td>
                    <td>
                        <asp:Label ID="stateLabel" runat="server" Text='<%# Eval("state") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Dist:</td>
                    <td>
                        <asp:Label ID="distLabel" runat="server" Text='<%# Eval("distt") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        City:</td>
                    <td>
                        <asp:Label ID="cityLabel" runat="server" Text='<%# Eval("city") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Pin Code:</td>
                    <td>
                        <asp:Label ID="pcodeLabel" runat="server" Text='<%# Eval("pcode") %>' />
                    </td>
                </tr>
            </table>
            <br />
            &nbsp;&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />---------------------------------------------------------------<br /> <br />
        </ItemTemplate>
    </asp:DataList>
            </td>
            <td valign="top">
               
    <asp:DataList ID="DataList2" runat="server" DataSourceID="SqlDataSource3" 
        oncancelcommand="DataList2_CancelCommand" oneditcommand="DataList2_EditCommand" 
        Width="514px" DataKeyField="code" onupdatecommand="DataList2_UpdateCommand">
        <EditItemTemplate>
           
             <strong>Project Details &amp; Business Detail </strong>
            <br />
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <asp:LinkButton ID="LinkButton1" runat="server" CommandName="update">Update</asp:LinkButton>
            &nbsp;|
            <asp:LinkButton ID="LinkButton2" runat="server" CommandName="cancel">Cancel</asp:LinkButton>
            <br />
             --------------------------------------------------------------------------------------------<br />
             <table class="style1">
                 <tr >
                     <td>
                         Capacity:</td>
                     <td>
                         <asp:TextBox ID="txt1" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("capacity") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         Total Working Space:</td>
                     <td>
                         <asp:TextBox ID="txt2" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("tot_working_space") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         No of PC: </td>
                     <td>
                         <asp:TextBox ID="txt3" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("no_of_pc") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         No PC On Lan:</td>
                     <td>
                         <asp:TextBox ID="txt4" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("pc_on_lan") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         No of Rooms:</td>
                     <td>
                         <asp:TextBox ID="txt5" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("no_of_room") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         No of Labs:</td>
                     <td>
                         <asp:TextBox ID="txt6" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("no_of_lab") %>'></asp:TextBox>
                     </td>
                 </tr>
                 <tr>
                     <td>Power Backup:
                     </td>
                     <td>
                         <asp:TextBox ID="txt7" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("power_backup") %>'></asp:TextBox>
                     </td>
                 </tr>
             </table>
             -------------------------------------------------------------------------------------------
           
        </EditItemTemplate>
        <ItemTemplate>
           
            <strong>Project Details &amp; Business Detail</strong><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            &nbsp;
            <asp:LinkButton ID="LinkButton3" runat="server" CommandName="edit">Edit</asp:LinkButton>
            <br />
            --------------------------------------------------------------------------------------------<br />
            <table class="style1">
                <tr class="style3">
                    <td>
                        Capacity:</td>
                    <td>
                        <asp:Label ID="emailLabel0" runat="server" Text='<%# Eval("capacity") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Total Working Space:</td>
                    <td>
                        <asp:Label ID="nameLabel0" runat="server" 
                            Text='<%# Eval("tot_working_space") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        No of PC:</td>
                    <td>
                        <asp:Label ID="websiteLabel0" runat="server" Text='<%# Eval("no_of_pc") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        No PC On Lan:
                    </td>
                    <td>
                        <asp:Label ID="addressLabel0" runat="server" Text='<%# Eval("pc_on_lan") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        No of Rooms:</td>
                    <td>
                        <asp:Label ID="phLabel0" runat="server" Text='<%# Eval("no_of_room") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        No of Labs:</td>
                    <td>
                        <asp:Label ID="countryLabel0" runat="server" Text='<%# Eval("no_of_lab") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        Power Backup:</td>
                    <td>
                        <asp:Label ID="stateLabel0" runat="server" Text='<%# Eval("power_backup") %>' />
                    </td>
                </tr>
            </table>
            --------------------------------------------------------------------------------------------<br /> 
            <br />
        </ItemTemplate>
    </asp:DataList>
               
                <br /> <strong>
                Contact Personal Details<br />
                <br />
                --------------------------------------------------------------------------------------------<br />
                <br />
                </strong>
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="code" DataSourceID="SqlDataSource2" Width="401px">
                    <Columns>
                        <asp:BoundField DataField="name" HeaderText="Name" SortExpression="name" ControlStyle-Width="80px" />
                        <asp:BoundField DataField="job_title" HeaderText="Job Title" 
                            SortExpression="job_title" ControlStyle-Width="80px" />
                        <asp:BoundField DataField="email" HeaderText="Email" SortExpression="email" ControlStyle-Width="80px" />
                        <asp:BoundField DataField="mobile" HeaderText="Mobile" 
                            SortExpression="mobile" ControlStyle-Width="80px" />
                        <asp:CommandField ShowEditButton="True" />
                    </Columns>
                </asp:GridView>
                <br />
                <br />
                -----------------------------------------------------------------------------------------------<br />
                <br />
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        
        
        SelectCommand="SELECT tb1.code, tb1.email, tb1.name, tb1.website, tb1.address, tb1.ph, tb1.country, tb1.state, tb1.pcode, tb1.center_code, tb1.pass, tb1.center_code_main, tb1.role, distt.distt, city.city FROM tb1 INNER JOIN city ON tb1.city = city.code INNER JOIN distt ON tb1.dist = distt.code WHERE (tb1.center_code_main = @center_code)" 
        UpdateCommand="UPDATE tb1 SET name =@name, website =@website, address =@address, ph =@ph where code=@code">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList4" Name="center_code" 
                PropertyName="SelectedValue" Type="String" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="name" />
            <asp:Parameter Name="website" />
            <asp:Parameter Name="address" />
            <asp:Parameter Name="ph" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        SelectCommand="SELECT * FROM tb2 where center_code=@code" 
        
        UpdateCommand="UPDATE tb2 SET name =@name, job_title =@job_title, email =@email, mobile =@mobile where code=@code">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList4" Name="code" 
                PropertyName="SelectedValue" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="name" />
            <asp:Parameter Name="job_title" />
            <asp:Parameter Name="email" />
            <asp:Parameter Name="mobile" />
            <asp:ControlParameter ControlID="GridView1" Name="code" 
                PropertyName="SelectedDataKey" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        SelectCommand="SELECT * FROM tb3 where center_code=@code" 
        
        
        UpdateCommand="UPDATE tb3 SET capacity =@capacity, tot_working_space =@tot_working_space, no_of_pc =@no_of_pc, pc_on_lan =@pc_on_lan, no_of_room =@no_of_room, no_of_lab =@no_of_lab, power_backup =@power_backup where code=@code">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList4" Name="code" 
                PropertyName="SelectedValue" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="capacity" />
            <asp:Parameter Name="tot_working_space" />
            <asp:Parameter Name="no_of_pc" />
            <asp:Parameter Name="pc_on_lan" />
            <asp:Parameter Name="no_of_room" />
            <asp:Parameter Name="no_of_lab" />
            <asp:Parameter Name="power_backup" />
            <asp:Parameter Name="code" />
        </UpdateParameters>
    </asp:SqlDataSource>
</asp:Content>

