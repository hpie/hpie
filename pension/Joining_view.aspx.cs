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
    public Int32 sr = 0;
    protected void Page_Load(object sender, EventArgs e)
    { 
       string user = User.Identity.Name.ToString();
       FormsIdentity fi;
       fi = (FormsIdentity)(User.Identity);
       FormsAuthenticationTicket tkt;
       tkt = fi.Ticket;
       string ud;
       ud = tkt.UserData;
    if (ud=="user")
    {

        SqlDataSource1.SelectCommand = "SELECT * FROM [Joining] where User1='"+user+"'";
        //SqlDataSource1.SelectParameters["User1"].DefaultValue = user.ToString();
    }
    else if (ud == "adm")
    {
        SqlDataSource1.SelectCommand = "SELECT * FROM [Joining]";
        
    }
    else
    {
        Response.Redirect("default.aspx");
    }
    DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
    GridView1.DataSource = dv;
    GridView1.DataBind();
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
    public override void VerifyRenderingInServerForm(Control control)
    {

        /* Verifies that a Form control was rendered */

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            if(((Label)(e.Row.FindControl("Label3"))).Text!="")
            {
                ((Label)(e.Row.FindControl("Label3"))).Text = getdate(Convert.ToDateTime(((Label)(e.Row.FindControl("Label3"))).Text)).ToString();
          }
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
