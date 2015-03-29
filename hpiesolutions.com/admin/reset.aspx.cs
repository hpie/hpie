using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_reset : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.DeleteCommand = "delete from " + DropDownList1.SelectedItem.Text;
        SqlDataSource1.Delete();
        Label1.Text = "Deleted...";
    }
    protected void Button2_Click(object sender, EventArgs e)
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