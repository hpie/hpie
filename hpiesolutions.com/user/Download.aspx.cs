using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.IO;
using System.Threading;

public partial class user_Download : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    //protected void ImageButton1_Click(object sender, ImageClickEventArgs e)
    //{
    //    Response.ContentType = "excel/xls";
    //    Response.AppendHeader("Content-Disposition", "attachment; filename=02 Attendance Sheet For Sign.xls");
    //    Response.TransmitFile(Server.MapPath("~/download/02 Attendance Sheet For Sign.xls"));
    //    Response.End();
    //  //  OpenFile("~/download/02 Attendance Sheet For Sign.xls");
    //}
    protected void GridView1_SelectedIndexChanging(object sender, GridViewSelectEventArgs e)
    {
        string con_type, cname, loc;
        con_type = ((Label)(GridView1.Rows[e.NewSelectedIndex].FindControl("l1"))).Text;
        cname = ((Label)(GridView1.Rows[e.NewSelectedIndex].FindControl("l2"))).Text;
        loc = ((Label)(GridView1.Rows[e.NewSelectedIndex].FindControl("l3"))).Text;
        Response.ContentType = con_type;
        Response.AppendHeader("Content-Disposition", "attachment; filename="+cname);
        Response.TransmitFile(loc);
        Response.End();
    }
}