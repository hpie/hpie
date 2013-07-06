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
public partial class PA : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    private string sr()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from pa order by id", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count == 0)
        {
            return "0000".ToString();
        }
        else
        {
        Int32 cc = ds.Tables[0].Rows.Count + 1;
        if (cc == 1)
        {
            return "000" + cc;
        }
        else if (cc == 2)
        {
            return "00" + cc;
        }
        else if (cc == 3)
        {
            return "0" + cc;
        }
        else
        {
            return cc.ToString();
        }
       
    }
       

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.InsertParameters["id"].DefaultValue = sr();
        SqlDataSource1.Insert();
        Response.Redirect("pa.aspx");
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Update();
    }
}
