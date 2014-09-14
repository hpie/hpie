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

public partial class deput : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox2.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        SqlDataSource2.InsertParameters["s_date"].DefaultValue = dt1.ToString();
        SqlDataSource2.InsertParameters["e_date"].DefaultValue = dt2.ToString();
        SqlDataSource2.Insert();
        Label1.Text = "Record Saved";
        TextBox1.Text = "";
        TextBox2.Text = "";

    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
        TextBox1.Text =Convert.ToDateTime( dv.Table.Rows[0]["s_date"]).ToString("dd/MM/yyyy");
        TextBox2.Text = Convert.ToDateTime(dv.Table.Rows[0]["e_date"]).ToString("dd/MM/yyyy");;
        DropDownList1.Items.FindByValue(DropDownList1.SelectedValue).Selected = false;
        DropDownList1.Items.FindByValue(dv.Table.Rows[0]["ac"].ToString()).Selected = true;
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox2.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        SqlDataSource2.UpdateParameters["s_date"].DefaultValue = dt1.ToString();
        SqlDataSource2.UpdateParameters["e_date"].DefaultValue = dt2.ToString();
        SqlDataSource2.Update();
        Label1.Text = "Record Update";
    }
}
