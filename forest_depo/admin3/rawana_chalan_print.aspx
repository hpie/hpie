<%@ Page Title="" Language="C#" MasterPageFile="Site.master" AutoEventWireup="true" CodeFile="rawana_chalan_print.aspx.cs" Inherits="rawana_chalan_print" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <style type="text/css">


        .style1
        {
            width: 100%;
        }
        .style3
        {
        height: 45px;
        width: 749px;
    }
        .style2
        {
            height: 45px;
        }
        .style6
        {
        }
        .style7
    {
        width: 749px;
    }
        </style>

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

//                //Restore orignal HTML
//                document.body.innerHTML = oldPage;

//                //disable postback on print button
//                return false;
            }
    </script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:Button ID="btnPrint" runat="server" Text="Print" OnClientClick="return printDiv('div_print');" /> 
    
 
     <p>
         Select Release Order:
         <asp:DropDownList ID="DropDownList1" runat="server" 
             DataSourceID="SqlDataSource2" DataTextField="rel_order" 
             DataValueField="rel_order">
         </asp:DropDownList>
&nbsp;<asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">Search</asp:LinkButton>
         <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
             ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
             SelectCommand="SELECT [rel_order] FROM [rawana_challan]">
         </asp:SqlDataSource>
       <div id="div_print">     
       <h2>Rawana Challan</h2>
  
    <table class="style1" __designer:mapid="5a1" style="text-align: left">
        <tr __designer:mapid="5a2">
            <td __designer:mapid="5a3" class="style3">
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:forest_depoConnectionString %>" 
                    SelectCommand="SELECT * FROM [rawana_challan] WHERE ([rel_order] = @no)">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="no" 
                            PropertyName="SelectedValue" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </td>
            <td __designer:mapid="5a5" class="style2">
                &nbsp;</td>
            <td __designer:mapid="5a7" class="style2">
                &nbsp;</td>
        </tr>
        <tr __designer:mapid="5a2">
            <td __designer:mapid="5a3" class="style3">
                <strong>Book No.</strong> 
                <asp:Label runat="server" ID="book_no"></asp:Label>
            </td>
            <td __designer:mapid="5a5" class="style2">
                &nbsp;
            </td>
            <td __designer:mapid="5a7" class="style2">
                <strong>Date&nbsp;</strong>
                <asp:Label runat="server" ID="date" style="text-decoration: underline;"></asp:Label>
            </td>
        </tr>
        <tr __designer:mapid="5aa">
            <td __designer:mapid="5ab" class="style6" colspan="3">
                <strong>Time
                <asp:Label ID="time" runat="server"></asp:Label>
&nbsp;Release Order No.&nbsp;</strong>
                <asp:Label runat="server" ID="rel_no" AutoPostBack="True" 
                    ontextchanged="rel_no_TextChanged" style="text-decoration: underline;"></asp:Label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>in Word&nbsp;</strong>&nbsp; 
                <asp:Label ID="wrd" runat="server" style="text-decoration: underline;"></asp:Label>
            </td>
        </tr>
        <tr __designer:mapid="5ae">
            <td __designer:mapid="5af"  colspan="3">
                <strong>Name and Address of the purchaser</strong>&nbsp;
                <asp:Label runat="server"  ID="name_add" style="text-decoration: underline;"></asp:Label>
            </td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style7" >
                <strong>Vehicle 
                (Kind &amp; No.)</strong>&nbsp;
                <asp:Label runat="server" ID="veh_no" style="text-decoration: underline;" ></asp:Label>
            &nbsp;</td>
            <td __designer:mapid="5b5" colspan="2">
                <strong>Name of Driver</strong>&nbsp;
                <asp:Label runat="server" ID="name_driver" style="text-decoration: underline;" ></asp:Label>
            </td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style4" colspan="3">
                <strong>Place to witch consigned</strong>&nbsp;
                <asp:Label ID="place_consig" runat="server"  
                    style="text-decoration: underline;"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Route alone check 
                and post prescribed for transport</strong>&nbsp;
                <asp:Label ID="for_trans" runat="server" style="text-decoration: underline;"></asp:Label>
&nbsp;
            </td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style7">
                <strong>Release Hammer mark</strong>&nbsp;&nbsp;
                <asp:Label ID="rel_hamm_mark" runat="server" 
                    style="text-decoration: underline;" ></asp:Label>
            </td>
            <td __designer:mapid="5b5">
                &nbsp;</td>
            <td __designer:mapid="5b7">
                &nbsp;</td>
        </tr>
        <tr __designer:mapid="5b2">
            <td __designer:mapid="5b3" class="style7">
                &nbsp;</td>
            <td __designer:mapid="5b5">
                &nbsp;</td>
            <td __designer:mapid="5b7">
                &nbsp;</td>
        </tr>
    </table>
      <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False">
          <Columns>
              <asp:TemplateField HeaderText="Name of Division">
                  <ItemTemplate>
                      <asp:Label ID="name_div0" runat="server" Text='<%# Eval("name_div") %>'></asp:Label>
                     
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="Date of Auction">
                  <ItemTemplate>
                      <asp:Label ID="date_auc0" runat="server" Text='<%# Eval("date_auc") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="Lot No">
                  <ItemTemplate>
                      <asp:Label ID="lot_no0" runat="server" Text='<%# Eval("lot_no") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="Stack No.">
                  <ItemTemplate>
                      <asp:Label ID="stack_no0" runat="server" Text='<%# Eval("stack_no") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="Species (Name kind with Distintve Property and/ or Kundan Marks">
                  <ItemTemplate>
                      <asp:Label ID="species0" runat="server" Text='<%# Eval("species") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="Size">
                  <ItemTemplate>
                      <asp:Label ID="size0" runat="server" Text='<%# Eval("size") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="No.">
                  <ItemTemplate>
                      <asp:Label ID="no0" runat="server" Text='<%# Eval("no_2") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="Vol.">
                  <ItemTemplate>
                      <asp:Label ID="vol0" runat="server" Text='<%# Eval("vol") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
              <asp:TemplateField HeaderText="Ammount">
                  <ItemTemplate>
                      <asp:Label ID="amt0" runat="server" Text='<%# Eval("amt") %>'></asp:Label>
                  </ItemTemplate>
              </asp:TemplateField>
          </Columns>
      </asp:GridView>
    <br />
<%--<table class="style1" border="1px" bordercolor="black" cellspacing="2" cellpadding="2" style="border:1px;" >
    <tr>
        <td>
            <b>Name of Division&nbsp;
        </b>
        </td>
        <td>
            <b>Date of Auction</b></td>
        <td>
            <b>Lot No</b></td>
        <td>
            <b>Stack No.</b></td>
        <td>
            <b>Species (Name kind with Distintve Property and/or Kundan Mark</b></td>
        <td>
            <b>Size</b></td>
        <td>
            <b>No.</b></td>
        <td>
            <b>Vol.</b></td>
        <td>
            <b>Amount</b></td>
    </tr>
    <tr>
        <td style="margin-left: 160px">
            <asp:Label ID="name_div" runat="server" >
            </asp:Label>
        </td>
        <td>
            <asp:Label ID="date_auc" runat="server" Width="80px"></asp:Label>
        </td>
        <td>
            <asp:Label ID="lot_no" runat="server" ></asp:Label>
        </td>
        <td>
            <asp:Label ID="stack_no" runat="server" ></asp:Label>
        </td>
        <td>
            <asp:Label ID="species" runat="server"></asp:Label>
        </td>
        <td>
            <asp:Label ID="size" runat="server" ></asp:Label>
        </td>
        <td>
            <asp:Label ID="no" runat="server" ></asp:Label>
        </td>
        <td style="margin-left: 40px">
            <asp:Label ID="vol" runat="server" ></asp:Label>
        </td>
        <td>
            <asp:Label ID="amt" runat="server" Width="60px"></asp:Label>
        </td>
    </tr>
    </table>--%>
    </div>
 </asp:Content>

