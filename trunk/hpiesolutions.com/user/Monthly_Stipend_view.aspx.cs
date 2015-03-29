using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;

public partial class user_Monthly_Stipend : System.Web.UI.Page
{
    decimal month_f, tot_f;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            dd();

            c_name.DataSource = SqlDataSource5;
            c_name.DataBind();
            //c_name.Items.Add("ALL");

        }
    }
    private void gd()
    {
        if (c_name.SelectedItem.Text == "ALL")
        {
            DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
            DateTime dd2 = Convert.ToDateTime(mont.SelectedValue + "/" + DateTime.DaysInMonth(dd.Year, dd.Month) + "/" + yers.SelectedValue);
            SqlDataSource3.SelectParameters["first"].DefaultValue = dd.ToString();
            SqlDataSource3.SelectParameters["second"].DefaultValue = dd2.ToString();
            SqlDataSource3.SelectCommand = "SELECT * FROM [monthly_stipend] WHERE Date between @first and @second and center_code='"+Session["start_a"].ToString()+"' order by course";
            GridView2.DataSource = SqlDataSource3;
            GridView2.DataBind();

        }
        else
        {
            DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
            DateTime dd2 = Convert.ToDateTime(mont.SelectedValue + "/" + DateTime.DaysInMonth(dd.Year, dd.Month) + "/" + yers.SelectedValue);
            SqlDataSource3.SelectParameters["first"].DefaultValue = dd.ToString();
            SqlDataSource3.SelectParameters["second"].DefaultValue = dd2.ToString();
            SqlDataSource3.SelectCommand = "SELECT * FROM [monthly_stipend] WHERE Date between @first and @second and course_code=@course and center_code='" + Session["start_a"].ToString() + "' order by course_code";
            GridView2.DataSource = SqlDataSource3;
            GridView2.DataBind();
        }
    }
    private void dd()
    {
        DateTime live = DateTime.Now;
        Int32 y = live.Year;
        Int32 i;

        for (i = y - 2; i <= y + 2; i++)
        {
            yers.Items.Add(i.ToString());
            if (i == y)
            {
                yers.Items.FindByText(i.ToString()).Selected = true;
            }
        }

    }
    private void grid()
    {
        try
        {
            string ss = "select * from student_detail where center_code='" + Session["start_a"].ToString() + "' and course='" + c_name.SelectedValue.ToString() + "' and project_code='" + p_code.SelectedValue + "'";
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
    protected void c_name_SelectedIndexChanged(object sender, EventArgs e)
    {
      
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        gd();
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            month_f += Convert.ToDecimal(((Label)(e.Row.FindControl("month_stip"))).Text);
            tot_f += Convert.ToDecimal(((Label)(e.Row.FindControl("tot_stip"))).Text);
        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            ((Label)(e.Row.FindControl("month_stip_f"))).Text = month_f.ToString();
            ((Label)(e.Row.FindControl("tot_stip_f"))).Text = tot_f.ToString();
        }
        //    DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
        //DateTime dd2 = Convert.ToDateTime(mont.SelectedValue +"/"+ DateTime.DaysInMonth(dd.Year,dd.Month)+"/" + yers.SelectedValue);
        //SqlDataSource7.SelectParameters["first"].DefaultValue = dd.ToString();
        //    SqlDataSource7.SelectParameters["last"].DefaultValue = dd2.ToString();
        //    SqlDataSource7.SelectParameters["s_code"].DefaultValue = ((Label)(e.Row.FindControl("Label1"))).Text;
        //DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
        //if (dv != null)
        //{
        //    if (dv.Table.Rows.Count == 0)
        //    {
        //        Int32 i = Convert.ToInt32(((Label)(e.Row.FindControl("per"))).Text);
        //        if (i >= 85)
        //        {
        //            decimal tot, tot_days, p_days, tot_stip;
        //            tot = Convert.ToDecimal(((Label)(e.Row.FindControl("month_stip"))).Text);
        //            tot_days = Convert.ToDecimal(((Label)(e.Row.FindControl("tot_days"))).Text);
        //            p_days = Convert.ToDecimal(((Label)(e.Row.FindControl("Label5"))).Text);
        //            tot_stip = tot / tot_days * p_days;
        //            ((Label)(e.Row.FindControl("tot_stip"))).Text = Math.Round(tot_stip, 0).ToString();
        //            ((Label)(e.Row.FindControl("stat"))).Text = "Not Paid";
        //            CheckBox chk = ((CheckBox)(e.Row.FindControl("chk")));
        //            chk.Checked = false;
        //            chk.Enabled = true;
        //        }
        //        else
        //        {
        //            ((Label)(e.Row.FindControl("stat"))).Text = "Not Paid(LP)";
        //            CheckBox chk = ((CheckBox)(e.Row.FindControl("chk")));
        //            chk.Checked = false;
        //            chk.Enabled = true;
        //            ((Label)(e.Row.FindControl("tot_stip"))).Text = "0.00".ToString();
        //        }
        //    }
        //    else
        //    {
                
                   
        //            ((Label)(e.Row.FindControl("month_stip"))).Text = dv.Table.Rows[0]["monthly_stip"].ToString();
        //            ((Label)(e.Row.FindControl("tot_days"))).Text = dv.Table.Rows[0]["tot_days"].ToString();
        //            ((Label)(e.Row.FindControl("Label5"))).Text = dv.Table.Rows[0]["pre_days"].ToString();
        //            ((Label)(e.Row.FindControl("tot_stip"))).Text = dv.Table.Rows[0]["tot_stip"].ToString();
        //            ((Label)(e.Row.FindControl("stat"))).Text = "Paid";
        //            CheckBox chk = ((CheckBox)(e.Row.FindControl("chk")));
        //            chk.Checked = true;
        //            chk.Enabled = false;
        //    }
        //}


            


        //}
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        //Int32 i, i2=0;
        //DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
        //for (i = 0; i < GridView2.Rows.Count; i++)
        //{
        //    CheckBox chk = ((CheckBox)(GridView2.Rows[i].FindControl("chk")));
        //    if (chk.Checked == true)
        //    {

        //        SqlDataSource3.InsertParameters["date"].DefaultValue = dd.ToString();
        //        SqlDataSource3.InsertParameters["p_name"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("Label2"))).Text;
        //        SqlDataSource3.InsertParameters["f_name"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("Label3"))).Text;
        //        SqlDataSource3.InsertParameters["s_code"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("Label1"))).Text;
        //        SqlDataSource3.InsertParameters["categ"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("Label4"))).Text;
        //        SqlDataSource3.InsertParameters["monthly_stip"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("month_stip"))).Text;
        //        SqlDataSource3.InsertParameters["tot_days"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("tot_days"))).Text;
        //        SqlDataSource3.InsertParameters["pre_days"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("Label5"))).Text;
        //        SqlDataSource3.InsertParameters["per"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("per"))).Text;
        //        SqlDataSource3.InsertParameters["tot_stip"].DefaultValue = ((Label)(GridView2.Rows[i].FindControl("tot_stip"))).Text;
        //        SqlDataSource3.Insert();
        //        i2++;
        //    }
        //}
        //Label7.Text = i2.ToString() + " records saved successfully";
        //gd();
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("StudentReport.xls", GridView2);
    }
    public override void VerifyRenderingInServerForm(Control control)
    {

    }
}