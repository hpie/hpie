using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class user_placement_view : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            SqlDataSource1.DataBind();
            SqlDataSource2.DataBind();

            DropDownList1.DataBind();
            DropDownList2.DataBind();
            SqlDataSource4.DataBind();

            DropDownList3.DataBind();
            SqlDataSource5.DataBind();
            DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    GridView1.DataBind();
                }
            }
        }
    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        DropDownList3.DataBind();
        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                GridView1.DataBind();
            }
        }
    }
    protected void DropDownList3_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                GridView1.DataBind();
            }
        }
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        string cname, c_add, city, desig, j_date, salary, c_per_name, c_per_no, sid;
        cname = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text;
        c_add = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text;
        city = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text;
        desig = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text;
        j_date = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text;
        salary = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox8"))).Text;
        c_per_name = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text;
        c_per_no = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text;
        sid = GridView1.DataKeys[e.RowIndex].Value.ToString();

        SqlDataSource5.UpdateParameters["cname"].DefaultValue = cname;
        SqlDataSource5.UpdateParameters["c_add"].DefaultValue = c_add;
        SqlDataSource5.UpdateParameters["city"].DefaultValue = city;
        SqlDataSource5.UpdateParameters["desig"].DefaultValue = desig;
        SqlDataSource5.UpdateParameters["j_date"].DefaultValue = j_date;
        SqlDataSource5.UpdateParameters["salary"].DefaultValue = salary;
        SqlDataSource5.UpdateParameters["c_per_name"].DefaultValue = c_per_name;
        SqlDataSource5.UpdateParameters["c_per_no"].DefaultValue = c_per_no;
        SqlDataSource5.UpdateParameters["sid"].DefaultValue = sid;
        SqlDataSource5.Update();
        GridView1.EditIndex = -1;
        GridView1.DataBind();


    }
}