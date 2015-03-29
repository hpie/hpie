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
}