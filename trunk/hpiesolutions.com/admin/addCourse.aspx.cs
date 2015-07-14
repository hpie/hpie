using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class admin_addCourse : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Insert();
        Label2.Text = "";
        Label1.Text = "Successfull..";
        GridView1.DataBind();
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        SqlDataSource2.Insert();
        TextBox2.Text = "";
        Label2.Text = "Successfull..";
        GridView2.DataBind();
    }
    protected void DropDownList3_SelectedIndexChanged(object sender, EventArgs e)
    {
        GridView2.DataBind();
    }
    protected void GridView2_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        SqlDataSource2.UpdateParameters["code"].DefaultValue = GridView2.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource2.UpdateParameters["sub"].DefaultValue = ((TextBox)(GridView2.Rows[e.RowIndex].FindControl("sub"))).Text.ToString();
        SqlDataSource2.UpdateParameters["dur"].DefaultValue = ((DropDownList)(GridView2.Rows[e.RowIndex].FindControl("dur"))).SelectedItem.Text;
        SqlDataSource2.Update();
        GridView2.EditIndex = -1;
        GridView2.DataBind();
    }
    protected void GridView2_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        SqlDataSource2.Delete();
        GridView2.DataBind();
    }


    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        SqlDataSource1.UpdateParameters["code"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.UpdateParameters["courseName"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("course_name"))).Text.ToString();
        SqlDataSource1.UpdateParameters["coursePeriod"].DefaultValue = ((DropDownList)(GridView1.Rows[e.RowIndex].FindControl("period"))).SelectedItem.Text;
        SqlDataSource1.UpdateParameters["courseQualification"].DefaultValue = ((DropDownList)(GridView1.Rows[e.RowIndex].FindControl("min_qui"))).SelectedItem.Text;
        SqlDataSource1.Update();
        GridView1.EditIndex = -1;
        GridView1.DataBind();
    }
}