using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class report_1_print : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
        Label11.Text = TextBox8.Text + " to ".ToString();
        Label12.Text = TextBox9.Text.ToString();

    }
}