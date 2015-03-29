using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class user_support_visit : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            SqlDataSource2.InsertParameters["date"].DefaultValue = DateTime.Now.ToString();
            SqlDataSource2.Insert();
            Label1.Text = "Successfull..";
            Label1.Focus();
        }
        catch (Exception r)
        {
            Label1.Text = "Error!(" + r.Message + ")";
            Label1.Focus();
        }
    }
}