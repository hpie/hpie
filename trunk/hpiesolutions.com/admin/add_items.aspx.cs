using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;
public partial class user_add_items : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count == 0)
            {
                SqlDataSource2.Insert();
                TextBox1.Text = "";
                GridView3.DataBind();
                DropDownList1.DataBind();
                Label1.Text = "Successfully...";
            }
            else
            {
                Label1.Text = "Error !(Item allready in your list.)";
            }
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count == 0)
            {
                SqlDataSource4.Insert();
                TextBox2.Text = "";
                GridView2.DataBind();
                Label2.Text = "Successfully...";
            }
            else
            {
                Label2.Text = "Error !(Item allready in your list.)";
            }
        }
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count == 0)
            {
                SqlDataSource7.Insert();
                TextBox1.Text = "";
                GridView1.DataBind();
                DropDownList2.DataBind();
                Label3.Text = "Successfully...";
            }
            else
            {
                Label3.Text = "Error !(Item allready in your list.)";
            }
        }
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        GridView3.DataBind();
    }
    protected void TextBox4_TextChanged(object sender, EventArgs e)
    {
               

    }
}