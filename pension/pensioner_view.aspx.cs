using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Text;
using System.IO;
public partial class Joining_view : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    public string getdate(DateTime dr)
    {
        if (dr != null)
        {
            return dr.ToString("dd.MM.yyyy");
        }
        else
        {
            return "";
        }
    }

    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Clear();
        Response.AddHeader("content-disposition", "attachment;filename=GridView1.xls");
        Response.Charset = "";
        Response.ContentType = "application/vnd.xls";
        StringWriter StringWriter = new System.IO.StringWriter();
        HtmlTextWriter HtmlTextWriter = new HtmlTextWriter(StringWriter);
        GridView1.RenderControl(HtmlTextWriter);
        Response.Write(StringWriter.ToString());
        Response.End();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
           
            if (((Label)(e.Row.FindControl("Label1"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label1"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label1"))).Text)).ToString();
            }
            if (((Label)(e.Row.FindControl("Label2"))).Text != "")
            {
                ((Label)(e.Row.FindControl("Label2"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label2"))).Text)).ToString();
            }
        }
    }
}
