using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Sales_Branch_fc27_entry : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        if (TextBox1.Text != "")
        {
            DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            SqlDataSource1.InsertParameters["dt"].DefaultValue = dt1.ToString();
        
        }
        if (TextBox8.Text != "")
        {
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox8.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            SqlDataSource1.InsertParameters["dt1"].DefaultValue = dt2.ToString();
       
        }
        SqlDataSource1.Insert();
        Response.Redirect("fc27_entry.aspx");
    }
}