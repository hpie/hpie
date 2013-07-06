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
public partial class Denomination : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    private string sr()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from denomition", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        Int32 cc = ds.Tables[0].Rows.Count + 1;
        return "Z" + cc;

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.InsertParameters["key1"].DefaultValue = sr();
        SqlDataSource1.Insert();
        TextBox1.Text = "";
        TextBox2.Text = "";
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Update();
    }
}
