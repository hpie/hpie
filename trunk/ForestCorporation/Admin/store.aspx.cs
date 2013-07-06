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

public partial class Admin_store : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        TextBox1.Text = "";
        Button1.Enabled = true;
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Insert();
        Label1.Text = "Record Saved";
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Update();
        Label1.Text = "Record Updated";
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Delete();
        Label1.Text = "Record Deleted";
    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Button3.Enabled = true;
        Button4.Enabled = true;

        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));

        TextBox1.Text = dv.Table.Rows[0][1].ToString();
    }
}
