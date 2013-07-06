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

public partial class fc12_report : System.Web.UI.Page
{
    public Int32 r;
    protected void Page_Load(object sender, EventArgs e)
    {
        pn();
    }
    private void pn()
    {
        string dt = Request.QueryString["code"];
        Label1.Text = dt.ToString();
        SqlDataSource1.SelectParameters["no_pre"].DefaultValue = dt.ToString();
        DataBind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        r = r + 1;
    }
    protected void TextBox1_TextChanged(object sender, EventArgs e)
    {
   //     SqlDataSource1.SelectParameters["dt"].DefaultValue = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
   //DataBind();
    }
    
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.InsertParameters["dt"].DefaultValue = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.Insert();
    }
  
}
