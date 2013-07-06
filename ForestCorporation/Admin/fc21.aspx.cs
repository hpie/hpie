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
using System.Data.SqlClient;
public partial class fc21 : System.Web.UI.Page
{
    public Int32 r=1;
    protected void Page_Load(object sender, EventArgs e)
    {
       // pn();

    }
    

    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        //Response.Redirect("fc21_report.aspx?sr="+DropDownList1.SelectedValue);
        SqlDataSource3.Delete();
        SqlDataSource4.Delete();
        DropDownList1.DataBind();
    }

   
}
