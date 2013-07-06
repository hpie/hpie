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

public partial class Resin_section_request : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    public string dt(DateTime dt)
    {
     return   dt.ToString("dd-MM-yyyy");
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Response.Redirect("../material/fc05_entry1.aspx?req="+GridView1.DataKeys[GridView1.SelectedIndex].Value. ToString());
    }
}
