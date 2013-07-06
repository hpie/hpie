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

public partial class Admin_OB : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            session();
        }
    }
    private void session()
    {
        for (Int32 y = 2000; y < DateTime.Now.Year + 1; y++)
        {
            //DropDownList3.Items.Add(y.ToString() + "-" + Convert.ToInt32(y + 1));
            DateTime dt = Convert.ToDateTime("04/01/" + y);
            DropDownList1.Items.Add(new ListItem(y.ToString() + "-" + Convert.ToInt32(y + 1), dt.ToString()));
        }
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        Button1.Enabled = true;
        TextBox1.Text = "";
        TextBox2.Text = "";
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        if (RadioButtonList1.SelectedIndex < 0)
        {
            SqlDataSource1.InsertParameters["type"].DefaultValue = "0".ToString();

        }
        else
        {
            SqlDataSource1.InsertParameters["type"].DefaultValue = RadioButtonList1.SelectedValue.ToString();
        }
        SqlDataSource1.InsertParameters["session"].DefaultValue = DropDownList1.SelectedItem.Text.ToString();
        SqlDataSource1.Insert();

        Label1.Text = "Record Saved";

    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Button3.Enabled = true;
        Button4.Enabled = true;
        SqlDataSource2.SelectParameters["session"].DefaultValue = ListBox1.SelectedItem.Text.ToString();
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        RadioButtonList1.Items.FindByText("Tins").Selected = false;
        RadioButtonList1.Items.FindByText(dv.Table.Rows[0]["type"].ToString()).Selected = true;
        TextBox1.Text = dv.Table.Rows[0]["obtin"].ToString();
        TextBox2.Text = dv.Table.Rows[0]["obqtl"].ToString();
       DropDownList1.Items.FindByText(DropDownList1.SelectedItem.Text).Selected = false;
       DropDownList1.Items.FindByText(dv.Table.Rows[0]["session"].ToString()).Selected = true;
       DropDownList2.Items.FindByValue(DropDownList2.SelectedValue.ToString()).Selected = false;
       DropDownList2.Items.FindByValue(dv.Table.Rows[0]["itemcode"].ToString()).Selected = true;
    

    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlDataSource1.DeleteParameters["session"].DefaultValue = ListBox1.SelectedItem.Text.ToString();
        SqlDataSource1.Delete();
        Label1.Text = "Record Deleted";
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlDataSource1.UpdateParameters["session"].DefaultValue = ListBox1.SelectedItem.Text.ToString();
        SqlDataSource1.Update();
        Label1.Text = "Record Updated";
    }
}
