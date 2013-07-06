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
public partial class fc05 : System.Web.UI.Page
{

   
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            bind();
        }
    }


    private void bind()
    {
      SqlDataSource1.SelectParameters["des"].DefaultValue = User.Identity.Name.ToString();
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
    public string dt(DateTime dt)
    {
        return dt.ToString("dd-MM-yyyy");
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
          string path =Request.QueryString["mass"];
       //Response.Redirect( path);
        Response.Redirect("fc05_entry1.aspx?req=" + GridView1.DataKeys[GridView1.SelectedIndex].Value.ToString()+"&mass="+path);
    }
}


