using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class user_profile : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DataList1_EditCommand(object source, DataListCommandEventArgs e)
    {
        DataList1.EditItemIndex = e.Item.ItemIndex;
        DataList1.DataBind();
    }
    protected void DataList1_CancelCommand(object source, DataListCommandEventArgs e)
    {
        DataList1.EditItemIndex = -1;
        DataList1.DataBind();
    }
    protected void DataList2_EditCommand(object source, DataListCommandEventArgs e)
    {
        DataList2.EditItemIndex = e.Item.ItemIndex;
        DataList2.DataBind();
    }
    protected void DataList2_CancelCommand(object source, DataListCommandEventArgs e)
    {
        DataList2.EditItemIndex = -1;
        DataList2.DataBind();
    }
    protected void DataList1_UpdateCommand(object source, DataListCommandEventArgs e)
    {
        string name, website, address, ph;
        
        name = ((TextBox)(e.Item.FindControl("txt2"))).Text;
        website = ((TextBox)(e.Item.FindControl("txt3"))).Text;
        address = ((TextBox)(e.Item.FindControl("txt4"))).Text;
        ph = ((TextBox)(e.Item.FindControl("txt5"))).Text;
        SqlDataSource1.UpdateParameters["name"].DefaultValue = name;
        SqlDataSource1.UpdateParameters["website"].DefaultValue = website;
        SqlDataSource1.UpdateParameters["address"].DefaultValue = address;
        SqlDataSource1.UpdateParameters["ph"].DefaultValue = ph;
        SqlDataSource1.UpdateParameters["code"].DefaultValue = DataList1.DataKeys[e.Item.ItemIndex].ToString();
        SqlDataSource1.Update();
        DataList1.EditItemIndex = -1;
        DataList1.DataBind();
    }
    protected void DataList2_UpdateCommand(object source, DataListCommandEventArgs e)
    {
        string capacity, tot_working_space, no_of_pc, pc_on_lan, no_of_room, no_of_lab, power_backup;
        capacity = ((TextBox)(e.Item.FindControl("txt1"))).Text;
        tot_working_space = ((TextBox)(e.Item.FindControl("txt2"))).Text;
        no_of_pc = ((TextBox)(e.Item.FindControl("txt3"))).Text;
        pc_on_lan = ((TextBox)(e.Item.FindControl("txt4"))).Text;
        no_of_room = ((TextBox)(e.Item.FindControl("txt5"))).Text;
        no_of_lab = ((TextBox)(e.Item.FindControl("txt6"))).Text;
        power_backup = ((TextBox)(e.Item.FindControl("txt7"))).Text;

        SqlDataSource3.UpdateParameters["capacity"].DefaultValue = capacity;
        SqlDataSource3.UpdateParameters["tot_working_space"].DefaultValue = tot_working_space;
        SqlDataSource3.UpdateParameters["no_of_pc"].DefaultValue = no_of_pc;
        SqlDataSource3.UpdateParameters["pc_on_lan"].DefaultValue = pc_on_lan;
        SqlDataSource3.UpdateParameters["no_of_room"].DefaultValue = no_of_room;
        SqlDataSource3.UpdateParameters["no_of_lab"].DefaultValue = no_of_lab;
        SqlDataSource3.UpdateParameters["power_backup"].DefaultValue = power_backup;
        SqlDataSource3.UpdateParameters["code"].DefaultValue = DataList2.DataKeys[e.Item.ItemIndex].ToString();
        SqlDataSource3.Update();
        DataList2.EditItemIndex = -1;
        DataList2.DataBind();
    }
    protected void DataList3_UpdateCommand(object source, DataListCommandEventArgs e)
    {
         SqlDataSource4.UpdateParameters["ac_no"].DefaultValue = ((TextBox)(e.Item.FindControl("ac"))).Text;
         SqlDataSource4.UpdateParameters["bank_name"].DefaultValue = ((DropDownList)(e.Item.FindControl("bank_name"))).SelectedItem.Text;
         SqlDataSource4.UpdateParameters["ifsc"].DefaultValue = ((TextBox)(e.Item.FindControl("ifsc"))).Text;
         SqlDataSource4.UpdateParameters["branch"].DefaultValue = ((TextBox)(e.Item.FindControl("branch"))).Text;
         SqlDataSource4.Update();
         DataList3.EditItemIndex = -1;
         DataList3.DataBind();
    }
    protected void DataList3_EditCommand(object source, DataListCommandEventArgs e)
    {
        DataList3.EditItemIndex = e.Item.ItemIndex;
        DataList3.DataBind();
    }
    protected void DataList3_CancelCommand(object source, DataListCommandEventArgs e)
    {
        DataList3.EditItemIndex = -1;
        DataList3.DataBind();
    }
}