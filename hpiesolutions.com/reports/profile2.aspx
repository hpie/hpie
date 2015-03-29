<%@ Page Language="C#" AutoEventWireup="true" CodeFile="profile2.aspx.cs" Inherits="profile2" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
     <link href="../Styles/Site.css" rel="stylesheet" type="text/css" />
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
        .style8
        {
            width: 185px;
        }
          .style9
          {
              height: 55px;
          }
          .style10
          {
              width: 385px;
              height: 164px;
          }
          .style11
          {
              height: 38px;
          }
          .style12
          {
              width: 106px;
          }
    </style>
</head>
<body>
    <form id="form1" runat="server">
   <div class="banner"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Center 
       Details</strong></div>
     <br />
     <table class="style4">
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
                     <td class="style9">
                         Phone:</td>
                     <td class="style9">
                         <asp:TextBox ID="std" runat="server" CssClass="ttxt" 
                             Text='<%# Eval("std_code") %>' Width="75px" />
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
            <asp:LinkButton ID="LinkButton1" runat="server" CommandName="edit" 
                Visible="False">Edit</asp:LinkButton>
            <br />
            ---------------------------------------------------------------<br />
            <table class="style1">
                <tr class="style3">
                    <td >
                        <b>Email:</b></td>
                    <td >
                        <asp:Label ID="emailLabel" runat="server" Text='<%# Eval("email") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>Name:</b></td>
                    <td>
                        <asp:Label ID="nameLabel" runat="server" Text='<%# Eval("name") %>' />
                    </td>
                </tr>
                <tr class="style3" valign="top">
                    <td>
                        <b>Website:</b></td>
                    <td>
                        <asp:Label ID="websiteLabel" runat="server" Text='<%# Eval("website") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td valign="top">
                        <b>Address: </b>
                    </td>
                    <td>
                        <asp:Label ID="addressLabel" runat="server" Text='<%# Eval("address") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>Phone:</b></td>
                    <td>
                        <asp:Label ID="std" runat="server" Text='<%# Eval("std_code") %>'></asp:Label>
                        -<asp:Label ID="phLabel" runat="server" Text='<%# Eval("ph") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>Country:</b></td>
                    <td>
                        <asp:Label ID="countryLabel" runat="server" Text='<%# Eval("country") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>State:</b></td>
                    <td>
                        <asp:Label ID="stateLabel" runat="server" Text='<%# Eval("state") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>Dist:</b></td>
                    <td>
                        <asp:Label ID="distLabel" runat="server" Text='<%# Eval("distt") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>City:</b></td>
                    <td>
                        <asp:Label ID="cityLabel" runat="server" Text='<%# Eval("city") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>Pin Code:</b></td>
                    <td>
                        <asp:Label ID="pcodeLabel" runat="server" Text='<%# Eval("pcode") %>' />
                    </td>
                </tr>
            </table>
            <br />---------------------------------------------------------------<br />
        </ItemTemplate>
    </asp:DataList>
                <br />
                <asp:DataList ID="DataList3" runat="server" DataSourceID="SqlDataSource4" 
                    oncancelcommand="DataList3_CancelCommand" oneditcommand="DataList3_EditCommand" 
                    onupdatecommand="DataList3_UpdateCommand">
                    <EditItemTemplate>
                        <table class="style10">
                            <tr>
                                <td class="style11">
                                </td>
                                <td class="style11">
                                    <asp:LinkButton ID="LinkButton5" runat="server" CommandName="update">Update</asp:LinkButton>
                                    &nbsp;<asp:LinkButton ID="LinkButton6" runat="server" CommandName="cancel">Cancel</asp:LinkButton>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Account No</td>
                                <td>
                                    <asp:TextBox ID="ac" runat="server" Text='<%# Eval("ac_no") %>'></asp:TextBox>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Bank Name</td>
                                <td>
                                    <asp:DropDownList ID="bank_name" runat="server" DataSourceID="SqlDataSource1" 
                                        DataTextField="bank_name" DataValueField="bank_name" 
                                        SelectedValue='<%# Eval("bank_name") %>'>
                                    </asp:DropDownList>
                                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                                        SelectCommand="SELECT * FROM [bank_detail]"></asp:SqlDataSource>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    IFSC Code</td>
                                <td>
                                    <asp:TextBox ID="ifsc" runat="server" Text='<%# Eval("ifsc") %>'></asp:TextBox>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Branch Name</td>
                                <td>
                                    <asp:TextBox ID="branch" runat="server" Text='<%# Eval("branch") %>'></asp:TextBox>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pan No.</td>
                                <td>
                                    <asp:TextBox ID="pan_no" runat="server" Text='<%# Eval("pan_no") %>'></asp:TextBox>
                                </td>
                            </tr>
                        </table>
                    </EditItemTemplate>
                    <FooterTemplate>
                        -------------------------------------------------------------
                    </FooterTemplate>
                    <HeaderTemplate>
                        <strong>Bank Detail<br /> 
                        ---------------------------------------------------------------</strong>
                    </HeaderTemplate>
                    <ItemTemplate>
                        <table class="style10">
                            <tr>
                                <td class="style12">
                                    &nbsp;</td>
                                <td>
                                    <asp:LinkButton ID="LinkButton4" runat="server" CommandName="edit" 
                                        Visible="False">Edit</asp:LinkButton>
                                </td>
                            </tr>
                            <tr>
                                <td class="style12">
                                    Account No</td>
                                <td>
                                    <asp:Label ID="ac_noLabel" runat="server" Text='<%# Eval("ac_no") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td class="style12">
                                    Bank Name</td>
                                <td>
                                    <asp:Label ID="bank_nameLabel" runat="server" Text='<%# Eval("bank_name") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td class="style12">
                                    IFSC Code</td>
                                <td>
                                    <asp:Label ID="branchLabel" runat="server" Text='<%# Eval("ifsc") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td class="style12">
                                    Branch Name</td>
                                <td>
                                    <asp:Label ID="center_codeLabel" runat="server" 
                                        Text='<%# Eval("branch") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td class="style12">
                                    Pan No.</td>
                                <td>
                                    <asp:Label ID="Label1" runat="server" Text='<%# Eval("pan_no") %>'></asp:Label>
                                </td>
                            </tr>
                        </table>
                        <br />
<br />
                    </ItemTemplate>
                </asp:DataList>
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
                    SelectCommand="SELECT * FROM [tb4] WHERE ([center_code] = @center_code)" 
                    
                    UpdateCommand="UPDATE tb4 SET ac_no =@ac_no, bank_name =@bank_name, ifsc =@ifsc, branch =@branch, pan_no=@pan_no where center_code=@center_code">
                    <SelectParameters>
                        <asp:QueryStringParameter DefaultValue="" Name="center_code" 
                            QueryStringField="cd" Type="String" />
                    </SelectParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="ac_no" />
                        <asp:Parameter Name="bank_name" />
                        <asp:Parameter Name="ifsc" />
                        <asp:Parameter Name="branch" />
                        <asp:QueryStringParameter Name="center_code" QueryStringField="cd" />
                        <asp:Parameter Name="pan_no" />
                    </UpdateParameters>
                </asp:SqlDataSource>
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
            <asp:LinkButton ID="LinkButton3" runat="server" CommandName="edit" 
                Visible="False">Edit</asp:LinkButton>
            <br />
            --------------------------------------------------------------------------------------------<br />
            <table class="style1">
                <tr class="style3">
                    <td>
                        <b>Capacity:</b></td>
                    <td>
                        <asp:Label ID="emailLabel0" runat="server" Text='<%# Eval("capacity") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>Total Working Space:</b></td>
                    <td>
                        <asp:Label ID="nameLabel0" runat="server" 
                            Text='<%# Eval("tot_working_space") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>No of PC:</b></td>
                    <td>
                        <asp:Label ID="websiteLabel0" runat="server" Text='<%# Eval("no_of_pc") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>No PC On Lan: </b>
                    </td>
                    <td>
                        <asp:Label ID="addressLabel0" runat="server" Text='<%# Eval("pc_on_lan") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>No of Rooms:</b></td>
                    <td>
                        <asp:Label ID="phLabel0" runat="server" Text='<%# Eval("no_of_room") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>No of Labs:</b></td>
                    <td>
                        <asp:Label ID="countryLabel0" runat="server" Text='<%# Eval("no_of_lab") %>' />
                    </td>
                </tr>
                <tr class="style3">
                    <td>
                        <b>Power Backup:</b></td>
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
                Contact Personal Detailsails<br />
                <br />
                --------------------------------------------------------------------------------------------<br />
                <br />
                </strong>
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="code" DataSourceID="SqlDataSource2" Width="401px">
                    <Columns>
                        <asp:BoundField DataField="name" HeaderText="Name" SortExpression="name" 
                            ControlStyle-Width="80px" >
<ControlStyle Width="80px"></ControlStyle>
                        </asp:BoundField>
                        <asp:BoundField DataField="job_title" HeaderText="Job Title" 
                            SortExpression="job_title" ControlStyle-Width="80px" >
<ControlStyle Width="80px"></ControlStyle>
                        </asp:BoundField>
                        <asp:BoundField DataField="email" HeaderText="Email" SortExpression="email" 
                            ControlStyle-Width="80px" >
<ControlStyle Width="80px"></ControlStyle>
                        </asp:BoundField>
                        <asp:BoundField DataField="mobile" HeaderText="Mobile" 
                            SortExpression="mobile" ControlStyle-Width="80px" >
<ControlStyle Width="80px"></ControlStyle>
                        </asp:BoundField>
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
        
        
        SelectCommand="SELECT tb1.code, tb1.email, tb1.name, tb1.website, tb1.address, tb1.ph, tb1.country, tb1.state, tb1.pcode, tb1.center_code, tb1.pass, tb1.center_code_main, tb1.role, tb1.std_code, distt.distt, city.city FROM tb1 INNER JOIN city ON tb1.city = city.code INNER JOIN distt ON tb1.dist = distt.code WHERE (tb1.center_code_main = @center_code)" 
        
        
        UpdateCommand="UPDATE tb1 SET name =@name, website =@website, address =@address, ph =@ph, std_code=@std where code=@code">
        <SelectParameters>
            <asp:QueryStringParameter Name="center_code" QueryStringField="cd" 
                Type="String" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="name" />
            <asp:Parameter Name="website" />
            <asp:Parameter Name="address" />
            <asp:Parameter Name="ph" />
            <asp:Parameter Name="code" />
            <asp:Parameter Name="std" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        SelectCommand="SELECT * FROM tb2 where center_code=@code" 
        
        UpdateCommand="UPDATE tb2 SET name =@name, job_title =@job_title, email =@email, mobile =@mobile where code=@code">
        <SelectParameters>
            <asp:QueryStringParameter Name="code" QueryStringField="cd" />
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
            <asp:QueryStringParameter Name="code" QueryStringField="cd" />
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
    </form>
</body>
</html>
