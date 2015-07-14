<%@ Page Title="" Language="C#" MasterPageFile="~/admin/Site.master" AutoEventWireup="true" CodeFile="center_details.aspx.cs" Inherits="admin_center_details" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
    <link rel="stylesheet" href="colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="jquery.colorbox.js"></script>
		<script>
		    $(document).ready(function () {
		        //Examples of how to assign the Colorbox event to elements
		        $(".group1").colorbox({ rel: 'group1' });
		        $(".group2").colorbox({ rel: 'group2', transition: "fade" });
		        $(".group3").colorbox({ rel: 'group3', transition: "none", width: "75%", height: "75%" });
		        $(".group4").colorbox({ rel: 'group4', slideshow: true });
		        $(".ajax").colorbox();
		        $(".youtube").colorbox({ iframe: true, innerWidth: 640, innerHeight: 390 });
		        $(".vimeo").colorbox({ iframe: true, innerWidth: 500, innerHeight: 409 });
		        $(".iframe").colorbox({ iframe: true, width: "80%", height: "90%" });
		        $(".inline").colorbox({ inline: true, width: "50%" });
		        $(".callbacks").colorbox({
		            onOpen: function () { alert('onOpen: colorbox is about to open'); },
		            onLoad: function () { alert('onLoad: colorbox has started to load the targeted content'); },
		            onComplete: function () { alert('onComplete: colorbox has displayed the loaded content'); },
		            onCleanup: function () { alert('onCleanup: colorbox has begun the close process'); },
		            onClosed: function () { alert('onClosed: colorbox has completely closed'); }
		        });

		        $('.non-retina').colorbox({ rel: 'group5', transition: 'none' })
		        $('.retina').colorbox({ rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true });

		        //Example of preserving a JavaScript event for inline calls.
		        $("#click").click(function () {
		            $('#click').css({ "background-color": "#f00", "color": "#fff", "cursor": "inherit" }).text("Open this window again and this message will still be here.");
		            return false;
		        });
		    });
		</script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <div class="banner">Center Details<br />
        <br />
    </div>
  
    <br />
    <br />
    <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">Export</asp:LinkButton>
    &nbsp;|
    <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">Search</asp:LinkButton>
    <br />
  
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" Width="885px" 
        onselectedindexchanging="GridView1_SelectedIndexChanging" 
        DataKeyNames="center_code_main" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
        onrowdatabound="GridView1_RowDataBound">
        <Columns>
           <asp:TemplateField HeaderText="Sr. No.">   
              <ItemTemplate>
                   <%# Container.DataItemIndex + 1 %>   
              </ItemTemplate>
            </asp:TemplateField>
            <asp:BoundField DataField="center_code_main" HeaderText="Center Code" 
                SortExpression="center_code_main" />
            <asp:BoundField DataField="name" HeaderText="Name" SortExpression="name" />
            <asp:BoundField DataField="distt" HeaderText="Distt" SortExpression="dist" />
            <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
            <asp:TemplateField>
                <ItemTemplate>
               
               
                    <asp:LinkButton ID="LinkButton1"  runat="server" CommandName="select">Detail</asp:LinkButton>
                </ItemTemplate>
            </asp:TemplateField>
          
        </Columns>
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        
        
        
        
        SelectCommand="SELECT dbo.tb1.code, dbo.tb1.email, dbo.tb1.name, dbo.tb1.website, dbo.tb1.address, dbo.tb1.ph, dbo.tb1.country, dbo.tb1.state, dbo.tb1.pcode, dbo.tb1.center_code, dbo.tb1.pass, dbo.tb1.center_code_main, dbo.tb1.role, dbo.city.city, dbo.distt.distt, tb4.ac_no, tb4.bank_name, tb4.ifsc, tb4.branch, tb4.pan_no, dbo.tb3.capacity, dbo.tb3.tot_working_space, dbo.tb3.no_of_pc, dbo.tb3.pc_on_lan, dbo.tb3.no_of_room, dbo.tb3.no_of_lab, dbo.tb3.power_backup, dbo.tb2.name AS name2, dbo.tb2.job_title, dbo.tb2.email AS email2, dbo.tb2.mobile FROM dbo.tb1 INNER JOIN dbo.distt ON dbo.tb1.dist = dbo.distt.code INNER JOIN dbo.city ON dbo.tb1.city = dbo.city.code INNER JOIN tb4 ON dbo.tb1.center_code_main = tb4.center_code INNER JOIN dbo.tb3 ON dbo.tb1.center_code_main = dbo.tb3.center_code INNER JOIN dbo.tb2 ON dbo.tb1.center_code_main = dbo.tb2.center_code ORDER BY dbo.tb1.center_code"></asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:hpieConnectionString %>" 
        
        
        
        
        SelectCommand="SELECT dbo.tb1.code, dbo.tb1.email, dbo.tb1.name, dbo.tb1.website, dbo.tb1.address, dbo.tb1.ph, dbo.tb1.country, dbo.tb1.state, dbo.tb1.pcode, dbo.tb1.center_code, dbo.tb1.pass, dbo.tb1.center_code_main, dbo.tb1.role, dbo.city.city, dbo.distt.distt, tb4.ac_no, tb4.bank_name, tb4.ifsc, tb4.branch, tb4.pan_no FROM dbo.tb1 INNER JOIN dbo.distt ON dbo.tb1.dist = dbo.distt.code INNER JOIN dbo.city ON dbo.tb1.city = dbo.city.code INNER JOIN tb4 ON dbo.tb1.center_code_main = tb4.center_code order by dbo.tb1.center_code"></asp:SqlDataSource>
    <br />
    <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
        Visible="False" Width="910px">
        <Columns>
            <asp:BoundField DataField="center_code_main" HeaderText="Center Code" 
                SortExpression="center_code_main" />
            <asp:BoundField DataField="name" HeaderText="Name" SortExpression="name" />
            <asp:BoundField DataField="email" HeaderText="Email" SortExpression="email" />
            <asp:BoundField DataField="website" HeaderText="Website" 
                SortExpression="website" />
            <asp:BoundField DataField="address" HeaderText="Address" 
                SortExpression="address" />
            <asp:BoundField DataField="ph" HeaderText="Phone/Mobile" SortExpression="ph" />
            <asp:BoundField DataField="country" HeaderText="Country" 
                SortExpression="country" />
            <asp:BoundField DataField="state" HeaderText="State" SortExpression="state" />
            <asp:BoundField DataField="distt" HeaderText="Distt" SortExpression="distt" />
            <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
            <asp:BoundField DataField="pcode" HeaderText="Pin Code" 
                SortExpression="pcode" />
            <asp:BoundField DataField="capacity" HeaderText="Capacity" 
                SortExpression="capacity" />
            <asp:BoundField DataField="tot_working_space" HeaderText="Total Working Space" 
                SortExpression="tot_working_space" />
            <asp:BoundField DataField="no_of_pc" HeaderText="No of PC" 
                SortExpression="no_of_pc" />
            <asp:BoundField DataField="pc_on_lan" HeaderText="No of PC's on Lan" 
                SortExpression="pc_on_lan" />
            <asp:BoundField DataField="no_of_room" HeaderText="No of Classrooms" 
                SortExpression="no_of_room" />
            <asp:BoundField DataField="no_of_lab" HeaderText="No of Labs" 
                SortExpression="no_of_lab" />
            <asp:BoundField DataField="power_backup" HeaderText="Power Backup" 
                SortExpression="power_backup" />
            <asp:BoundField DataField="ac_no" HeaderText="AC No." SortExpression="ac_no" />
            <asp:BoundField DataField="bank_name" HeaderText="Bank Name" 
                SortExpression="bank_name" />
            <asp:BoundField DataField="ifsc" HeaderText="IFSC Code" SortExpression="ifsc" />
            <asp:BoundField DataField="branch" HeaderText="Branch Name" 
                SortExpression="branch" />
            <asp:BoundField DataField="pan_no" HeaderText="Pan No." 
                SortExpression="pan_no" />
            <asp:BoundField DataField="name2" HeaderText="Contact person name" 
                SortExpression="name1" />
            <asp:BoundField DataField="job_title" HeaderText="C. Job Title" 
                SortExpression="job_title" />
            <asp:BoundField DataField="Email2" HeaderText="C. Email" 
                SortExpression="Email1" />
            <asp:BoundField DataField="mobile" HeaderText="C. Mobile" 
                SortExpression="mobile" />
        </Columns>
    </asp:GridView>
</asp:Content>

