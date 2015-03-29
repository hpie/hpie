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
using System.Data.SqlClient;
using System.Security.Cryptography;
using System.Data;
public partial class SiteMaster : System.Web.UI.MasterPage
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["start_a"] == null)
        {
            string ss=HttpContext.Current.User.Identity.Name.ToString();
            SqlDataSource_sess.SelectParameters["un"].DefaultValue = ss;
             DataView dv = (DataView)(SqlDataSource_sess.Select(DataSourceSelectArguments.Empty));
             if (dv != null)
             {
                 if (dv.Table.Rows.Count != 0)
                 {
                     Session["start_a"] = dv.Table.Rows[0][5].ToString();
                 }
                 else
                 {
                     Response.Redirect("~/Account/Login.aspx");
                 }
             }
             else
             {
                 Response.Redirect("~/Account/Login.aspx");
             }

           
        }
    }
}
