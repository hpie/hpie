using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_user : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        SqlDataSource1.UpdateParameters["up"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text;
        SqlDataSource1.Update();
        GridView1.EditIndex = -1;
        GridView1.DataBind();
    }
}