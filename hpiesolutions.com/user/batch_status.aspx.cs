using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class user_batch_status : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.InsertParameters["date"].DefaultValue = DateTime.Now.ToString();
        SqlDataSource1.Insert();
        TextBox1.Text = "";
        TextBox2.Text = "";
        TextBox3.Text = "";
        Label1.Text = "Successfull..";
        GridView1.DataBind();
    }
}