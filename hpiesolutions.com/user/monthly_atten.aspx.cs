using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;

public partial class user_monthly_atten : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            dd();
        }
    }
    private void dd()
    {
        DateTime live = DateTime.Now;
        Int32 y = live.Year;
        Int32 i;
       
        for (i = y - 2; i <= y+2; i++)
        {
            yers.Items.Add(i.ToString());
            if (i == y)
            {
                yers.Items.FindByText(i.ToString()).Selected = true;
            }
        }
      
    }
    protected void course_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
        DateTime dd2 = Convert.ToDateTime(mont.SelectedValue +"/"+ DateTime.DaysInMonth(dd.Year,dd.Month)+"/" + yers.SelectedValue);
        SqlDataSource3.SelectParameters["first"].DefaultValue = dd.ToString();
            SqlDataSource3.SelectParameters["second"].DefaultValue = dd2.ToString();
        DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count == 0)
            {
                Label1.Text = "";
                grid();
            }
            else
            {




                string ss = "select * from student_detail where center_code='" + Session["start_a"].ToString() + "' and course='" + course.SelectedValue.ToString() + "' and project_code='" + DropDownList1.SelectedValue + "' and tr_status='Active' order by s_id";
                SqlDataAdapter adp = new SqlDataAdapter(ss, ConfigurationManager.ConnectionStrings["hpieConnectionString"].ConnectionString);
                DataSet ds = new DataSet();
                adp.Fill(ds);
                GridView1.DataSource = ds;
                GridView1.DataBind();

                Label1.Text = "Error !(Request allready sumitted for this month)";
            }
        }
        }
    private void grid()
    {
        try
        {
            string ss = "select * from student_detail where center_code='" + Session["start_a"].ToString() + "' and course='" + course.SelectedValue.ToString() + "' and project_code='" + DropDownList1.SelectedValue + "' and tr_status='Active' order by s_id";
            SqlDataAdapter adp = new SqlDataAdapter(ss, ConfigurationManager.ConnectionStrings["hpieConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            GridView1.DataSource = ds;
            GridView1.DataBind();
        }
        catch
        {
            Response.Redirect("~/Account/Login.aspx");
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
      
    }
    protected void mont_SelectedIndexChanged(object sender, EventArgs e)
    {
        //grid();
    }
    protected void yers_SelectedIndexChanged(object sender, EventArgs e)
    {
        //grid();
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        try
        {
            Label1.Text = "";
            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {
                if (GridView1.Rows[i].Visible == true)
                {
                    decimal d2;
                    decimal d1 = Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("tot_days"))).Text);

                    d2 = Convert.ToDecimal(((TextBox)(GridView1.Rows[i].FindControl("p_days"))).Text);
                    ((TextBox)(GridView1.Rows[i].FindControl("abs"))).Text = (d1 - d2).ToString();
                    decimal d3 = d2 / d1 * 100;
                    ((Label)(GridView1.Rows[i].FindControl("per"))).Text = Math.Round(d3, 0).ToString();
                    LinkButton3.Visible = true;
                    //LinkButton2.Visible = false;
                }
            }
        }
        catch (Exception r)
        {
            Label1.Text = "Error !(" + r.Message + ")";
            LinkButton2.Visible = true;
            LinkButton3.Visible = false;
        }
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {


        try
        {
            DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {
                if (GridView1.Rows[i].Visible == true)
                {
                    SqlDataSource3.InsertParameters["s_id"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label1"))).Text;
                    SqlDataSource3.InsertParameters["name"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label2"))).Text;
                    SqlDataSource3.InsertParameters["f_name"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label3"))).Text;
                    SqlDataSource3.InsertParameters["categ"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("Label4"))).Text;
                    SqlDataSource3.InsertParameters["tot_days"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("tot_days"))).Text;
                    SqlDataSource3.InsertParameters["p_days"].DefaultValue = ((TextBox)(GridView1.Rows[i].FindControl("p_days"))).Text;
                    SqlDataSource3.InsertParameters["abs"].DefaultValue = ((TextBox)(GridView1.Rows[i].FindControl("abs"))).Text;
                    SqlDataSource3.InsertParameters["per"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("per"))).Text;
                    SqlDataSource3.InsertParameters["date"].DefaultValue = dd.ToString();
                    SqlDataSource3.InsertParameters["date_act"].DefaultValue = DateTime.Now.ToString();
                    SqlDataSource3.Insert();
                }

              
               
            }
            Label1.Text = "Record submitted successfully..";
            
        }
        catch (Exception r)
        {
            Label1.Text = "Error !(" + r.Message + ")";
          
        }

        LinkButton2.Visible = true;
        LinkButton3.Visible = false;
    }
    protected void GridView1_RowDataBound1(object sender, GridViewRowEventArgs e)
    {
       
    }
    protected void GridView1_RowDataBound2(object sender, GridViewRowEventArgs e)
    {
      
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
            decimal d2;
            ((Label)(e.Row.FindControl("tot_days"))).Text = DateTime.DaysInMonth(dd.Year, dd.Month).ToString();
            decimal d1 = Convert.ToDecimal(((Label)(e.Row.FindControl("tot_days"))).Text);
            try
            {
                d2 = Convert.ToDecimal(((Label)(e.Row.FindControl("p_days"))).Text);
            }
            catch
            {
                d2 = 0;
            }
            decimal d3 = d2 / d1 * 100;
            ((Label)(e.Row.FindControl("per"))).Text = Math.Round(d3, 0).ToString();
        }
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
            DateTime dd2 = Convert.ToDateTime(mont.SelectedValue + "/" + DateTime.DaysInMonth(dd.Year, dd.Month) + "/" + yers.SelectedValue);
            string sccd = ((Label)(e.Row.FindControl("Label1"))).Text;
            string ss = "select * from monthly_atten WHERE (s_id='"+sccd+"') and (date between '" + dd.ToString() + "' and '" + dd2.ToString() + "') and (center_code='" + Session["start_a"].ToString() + "') and (course='" + course.SelectedValue.ToString() + "') and (project_code='" + DropDownList1.SelectedValue + "') order by s_id";
            SqlDataAdapter adp = new SqlDataAdapter(ss, ConfigurationManager.ConnectionStrings["hpieConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                e.Row.Visible = false;
            }
        }
    }
}