<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="receipt_book.aspx.cs" Inherits="receipt_book" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="HeaderContent" runat="server" ContentPlaceHolderID="HeadContent">
    <style type="text/css">
        .style1
        {
            width: 500px;
        }
    </style>
</asp:Content>
<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" Runat="Server">
     <h2>
         receipt book
    </h2>
     <table class="style1" style="text-align: left">
         <tr>
             <td>
                 <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click" 
                     CausesValidation="False">Report</asp:LinkButton>
             </td>
             <td>
                 <asp:ScriptManager ID="ScriptManager1" runat="server">
                 </asp:ScriptManager>
             </td>
         </tr>
         <tr>
             <td>
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
         <tr>
             <td>
                 No</td>
             <td>
                 <asp:Label ID="no" runat="server"></asp:Label>
                 <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                     ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                     InsertCommand="INSERT INTO receipt_book(no, book_no, purchaser_name, rs, pro_emd, pay_type, pay_no, date, payable) VALUES (@no, @book_no, @purchaser_name, @rs, @pro_emd, @pay_type, @pay_no, @date, @payable)" 
                     SelectCommand="SELECT * FROM receipt_book">
                     <InsertParameters>
                         <asp:ControlParameter ControlID="no" Name="no" PropertyName="Text" />
                         <asp:ControlParameter ControlID="book_no" Name="book_no" PropertyName="Text" />
                         <asp:ControlParameter ControlID="purchaser_name" Name="purchaser_name" 
                             PropertyName="SelectedValue" />
                         <asp:ControlParameter ControlID="rs" Name="rs" PropertyName="Text" />
                         <asp:ControlParameter ControlID="emd" Name="pro_emd" 
                             PropertyName="Text" />
                         <asp:ControlParameter ControlID="payment_method" Name="pay_type" 
                             PropertyName="SelectedValue" />
                         <asp:ControlParameter ControlID="cdr_no" Name="pay_no" PropertyName="Text" />
                         <asp:ControlParameter ControlID="dat" Name="date" PropertyName="Text" />
                         <asp:ControlParameter ControlID="payable_at" Name="payable" 
                             PropertyName="Text" />
                     </InsertParameters>
                 </asp:SqlDataSource>
             </td>
         </tr>
         <tr>
             <td>
                 Date of Receipt</td>
             <td>
                 <asp:TextBox ID="rec_date" runat="server"></asp:TextBox>
                 <asp:CalendarExtender ID="rec_date_CalendarExtender" runat="server" Enabled="True" 
                     TargetControlID="rec_date">
                 </asp:CalendarExtender>
             &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                     ErrorMessage="Enter Date of Receipt !" ForeColor="#CC3300" 
                     ControlToValidate="rec_date" SetFocusOnError="True"></asp:RequiredFieldValidator>
             </td>
         </tr>
         <tr>
             <td>
                 Book No</td>
             <td>
                 <asp:TextBox ID="book_no" runat="server"></asp:TextBox>
             &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                     ErrorMessage="Enter Book No !" ForeColor="#CC3300" 
                     ControlToValidate="book_no" SetFocusOnError="True"></asp:RequiredFieldValidator>
             </td>
         </tr>
         <tr>
             <td>
                 Purchaser Name</td>
             <td>
                 <asp:DropDownList ID="purchaser_name" runat="server" 
                     DataSourceID="SqlDataSource1" DataTextField="name_of_pur" 
                     DataValueField="name_of_pur">
                 </asp:DropDownList>
                 <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                     ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                     InsertCommand="INSERT INTO receipt_book(no, book_no, purchaser_name, rs, pro_emd, pay_type, pay_no, date, payable, rec_date) VALUES (@no, @book_no, @purchaser_name, @rs, @pro_emd, @pay_type, @pay_no, @date, @payable, @rec_date)" 
                     
                     SelectCommand="SELECT [name_of_pur] FROM [statement_auc_result] group by [name_of_pur]">
                     <InsertParameters>
                         <asp:ControlParameter ControlID="no" Name="no" PropertyName="Text" />
                         <asp:ControlParameter ControlID="book_no" Name="book_no" PropertyName="Text" />
                         <asp:ControlParameter ControlID="purchaser_name" Name="purchaser_name" 
                             PropertyName="SelectedValue" />
                         <asp:ControlParameter ControlID="rs" Name="rs" PropertyName="Text" />
                         <asp:ControlParameter ControlID="emd" Name="pro_emd" 
                             PropertyName="Text" />
                         <asp:ControlParameter ControlID="payment_method" Name="pay_type" 
                             PropertyName="SelectedValue" />
                         <asp:ControlParameter ControlID="cdr_no" Name="pay_no" PropertyName="Text" />
                         <asp:ControlParameter ControlID="dat" Name="date" PropertyName="Text" />
                         <asp:ControlParameter ControlID="payable_at" Name="payable" 
                             PropertyName="Text" />
                         <asp:ControlParameter ControlID="rec_date" Name="rec_date" 
                             PropertyName="Text" />
                     </InsertParameters>
                 </asp:SqlDataSource>
             </td>
         </tr>
         <tr>
             <td>
                 Rs</td>
             <td>
                 <asp:TextBox ID="rs" runat="server"></asp:TextBox>
             &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                     ErrorMessage="Enter Rs !" ForeColor="#CC3300" ControlToValidate="rs" 
                     SetFocusOnError="True"></asp:RequiredFieldValidator>
             </td>
         </tr>
         <tr>
             <td>
                 Proceeds/EMD of</td>
             <td>
                 <asp:TextBox ID="emd" runat="server"></asp:TextBox>
&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" 
                     ErrorMessage="Enter Proceeds/EMD !" ForeColor="#CC3300" ControlToValidate="emd" 
                     SetFocusOnError="True"></asp:RequiredFieldValidator>
             </td>
         </tr>
         <tr>
             <td>
                 Payment Method</td>
             <td>
                 <asp:DropDownList ID="payment_method" runat="server">
                     <asp:ListItem>Cash</asp:ListItem>
                     <asp:ListItem>Cheque</asp:ListItem>
                     <asp:ListItem>Draft</asp:ListItem>
                     <asp:ListItem>CDR</asp:ListItem>
                 </asp:DropDownList>
             </td>
         </tr>
         <tr>
             <td>
                 No.</td>
             <td>
                 <asp:TextBox ID="cdr_no" runat="server"></asp:TextBox>
&nbsp;</td>
         </tr>
         <tr>
             <td>
                 Date</td>
             <td>
                 <asp:TextBox ID="dat" runat="server"></asp:TextBox>
                 <asp:CalendarExtender ID="dat_CalendarExtender" runat="server" Enabled="True" 
                     TargetControlID="dat">
                 </asp:CalendarExtender>
             &nbsp;</td>
         </tr>
         <tr>
             <td>
                 Payable At</td>
             <td>
                 <asp:TextBox ID="payable_at" runat="server"></asp:TextBox>
             &nbsp;</td>
         </tr>
         <tr>
             <td>
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
         <tr>
             <td>
                 &nbsp;</td>
             <td>
                 <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Submit</asp:LinkButton>
             &nbsp;
                 <asp:Label ID="Label1" runat="server" ForeColor="#CC3300"></asp:Label>
             </td>
         </tr>
     </table>
</asp:Content>

