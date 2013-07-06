using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_qry_admin : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        try
        {
            
            SqlDataSource1.SelectCommand = TextBox1.Text;
            GridView1.DataSource = SqlDataSource1;
            GridView1.DataBind();
            Label1.Text = "";
        }
        catch (Exception r)
        {
            Label1.Text = r.Message;
        }
    }
}