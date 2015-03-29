using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Text;
using System.IO;
using System.Data;

public partial class user_Details : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            DropDownList2.DataSource = SqlDataSource3;
            DropDownList2.DataBind();
            DropDownList2.Items.Add("ALL");
        }

    }
    protected void GridView1_SelectedIndexChanging(object sender, GridViewSelectEventArgs e)
    {
        Response.Redirect("details_1.aspx?sid=" + GridView1.DataKeys[e.NewSelectedIndex].Value+"&ccode="+GridView1.Rows[e.NewSelectedIndex].Cells[0].Text);
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        bind();
       
    }
    private void bind()
    {
        if (DropDownList2.SelectedItem.Text == "ALL")
        {
            SqlDataSource1.SelectCommand = "SELECT a.*,b.city as city1, c.city as city2, d.course_name as c_name  FROM student_detail a, city b, city c, course_detail d   where a.city=b.code and a.city=c.code and a.course=d.code and  center_code=@code and project_code=@project order by s_id";

            GridView1.DataSource = SqlDataSource1;
            GridView2.DataSource = SqlDataSource1;
            GridView1.DataBind();
            GridView2.DataBind();
               DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
               if (dv != null)
               {
                   if (dv.Table.Rows.Count != 0)
                   {
                       Int32 ii = Convert.ToInt32(dv.Table.Rows.Count);
                       Label1.Text = ii.ToString();
                   }
                   else
                   {
                       Label1.Text = "0".ToString();
                   }
               }
               else
               {
                   Label1.Text = "0".ToString();
               }
        }
        else
        {
            SqlDataSource1.SelectCommand = "SELECT a.*,b.city as city1, c.city as city2, d.course_name as c_name  FROM student_detail a, city b, city c, course_detail d   where a.city=b.code and a.city=c.code and a.course=d.code and  a.center_code=@code and a.course=@course and a.project_code=@project order by a.s_id";
            GridView1.DataSource = SqlDataSource1;
            GridView2.DataSource = SqlDataSource1;
            GridView1.DataBind();
            GridView2.DataBind();
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    Int32 ii = Convert.ToInt32(dv.Table.Rows.Count);
                    Label1.Text = ii.ToString();
                }
                else
                {
                    Label1.Text = "0".ToString();
                }
            }
            else
            {
                Label1.Text = "0".ToString();
            }
        }
        
        
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        GridView2.Visible = true;
        export_to_excel exl = new export_to_excel();
       exl.exporttoexcel("StudentReport.xls", GridView2);
        GridView2.Visible = false;
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

    }
    protected void GridView1_PageIndexChanging(object sender, GridViewPageEventArgs e)
    {
        GridView1.PageIndex = e.NewPageIndex;
        bind();
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        string id = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.DeleteParameters["s_id_main"].DefaultValue = id;
        SqlDataSource1.Delete();
        GridView1.DataBind();
    }
}