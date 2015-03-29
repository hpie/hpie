using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_center_details : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void GridView1_SelectedIndexChanging(object sender, GridViewSelectEventArgs e)
    {
        //string cd = GridView1.DataKeys[e.NewSelectedIndex].Value.ToString();
        //LinkButton ss;
        //ss = ((LinkButton)(GridView1.Rows[e.NewSelectedIndex].FindControl("LinkButton1")));
        //ss.Attributes.Add("class", "iframe");
        //ss.Attributes.Add("href", "profile2.aspx?cd="+cd);
        //ss.DataBind();
       
    }

    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string cd = GridView1.DataKeys[e.Row.RowIndex].Value.ToString();
            LinkButton ss;
            ss = ((LinkButton)(e.Row.FindControl("LinkButton1")));
            ss.Attributes.Add("class", "iframe");
            ss.Attributes.Add("href", "profile2.aspx?cd=" + cd);
            ss.DataBind();
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        GridView2.Visible = true;
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("Center_details.xls", GridView2);
        GridView2.Visible = false;
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

    }
}