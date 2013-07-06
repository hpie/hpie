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
public partial class actreason : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    private string sr()
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from subaction where action='"+DropDownList1.SelectedValue+"' order by act_reason", ConfigurationManager.ConnectionStrings["pension"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            return (ds.Tables[0].Rows.Count + 1).ToString();
        }
        else
        {
            return "1".ToString();
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataSource2.InsertParameters["act_reason"].DefaultValue = sr();
        SqlDataSource2.Insert();
        TextBox1.Text = "";
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlDataSource2.Update();

    }
}
