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

public partial class Admin_items : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        Button2.Enabled = true;
        TextBox20.Text = "";
    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        TextBox20.Text = dv.Table.Rows[0][1].ToString();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Insert();
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Update();
    }
}
