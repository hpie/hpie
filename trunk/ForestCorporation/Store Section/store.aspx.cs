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

public partial class store_store : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.InsertParameters["Date"].DefaultValue = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.InsertParameters["BillDate"].DefaultValue = DateTime.Parse(TextBox4.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.Insert();
        Response.Redirect("storeview.aspx");
    }
}
