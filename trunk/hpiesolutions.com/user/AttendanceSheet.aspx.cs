using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_AttendanceSheet : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //if (Page.IsPostBack == false)
        //{

        //    SqlDataSource1.DataBind();
        //    DropDownList1.DataBind();
        //    SqlDataSource2.DataBind();
        //    DropDownList2.DataBind();
        //}

    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
        DataList1.DataBind();
    }
   
    protected void DataList1_UpdateCommand(object source, DataListCommandEventArgs e)
    {
       
       
      
       
    }
protected void  DataList1_DeleteCommand(object source, DataListCommandEventArgs e)
{
    SqlDataSource3.DeleteParameters["code"].DefaultValue = DataList1.DataKeys[e.Item.ItemIndex].ToString();
    SqlDataSource3.Delete();
    DataList1.DataBind();
    DropDownList2.DataBind();
}
protected void DataList1_SelectedIndexChanged(object sender, EventArgs e)
{
    Label1.Text = "";

    string loc, cont;
    loc = ((Label)(DataList1.Items[DataList1.SelectedIndex].FindControl("loc"))).Text;
    cont = ((Label)(DataList1.Items[DataList1.SelectedIndex].FindControl("cont"))).Text;


    Int32 i = loc.LastIndexOf("/");
    string nm = loc.Substring(i + 1);
    Response.ContentType = cont;
    Response.AppendHeader("Content-Disposition", "attachment; filename=" + nm);
    Response.TransmitFile(loc);
    Response.End();
    Label1.Text = "downloading...";
}
protected void DataList1_ItemCommand(object source, DataListCommandEventArgs e)
{
    if (e.CommandName == "chk")
    {
        Label1.Text = "";

        string loc, cont;
        loc = ((Label)(e.Item.FindControl("loc"))).Text;
        cont = ((Label)(e.Item.FindControl("cont"))).Text;


        Int32 i = loc.LastIndexOf("/");
        string nm = loc.Substring(i + 1);
        Response.ContentType = cont;
        Response.AppendHeader("Content-Disposition", "attachment; filename=" + nm);
        Response.TransmitFile(loc);
        Response.End();
        Label1.Text = "downloading...";
    }
}
protected void DataList1_ItemDataBound(object sender, DataListItemEventArgs e)
{
    if (e.Item.ItemType == ListItemType.Item || e.Item.ItemType == ListItemType.AlternatingItem)
    {
        LinkButton lk = ((LinkButton)(e.Item.FindControl("lk2")));
       
        string loc, cont;
        loc = ((Label)(e.Item.FindControl("loc"))).Text;
        cont = ((Label)(e.Item.FindControl("cont"))).Text;
        lk.Attributes.Add("href", loc);
        lk.Attributes.Add("target", "_blank");
    }
}
protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
{

}
}