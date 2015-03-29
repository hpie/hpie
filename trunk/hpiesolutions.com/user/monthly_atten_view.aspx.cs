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
          
                course.DataSource = SqlDataSource2;
                course.DataBind();
                course.Items.Add("ALL");
           
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
        if (course.SelectedItem.Text == "ALL")
        {
            DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
            DateTime dd2 = Convert.ToDateTime(mont.SelectedValue + "/" + DateTime.DaysInMonth(dd.Year, dd.Month) + "/" + yers.SelectedValue);
            SqlDataSource7.SelectCommand = "SELECT * FROM [monthly_atten] WHERE Date between @first and @second and center_code=@code order by s_id";
            SqlDataSource7.SelectParameters["first"].DefaultValue = dd.ToString();
            SqlDataSource7.SelectParameters["second"].DefaultValue = dd2.ToString();
          

            GridView1.DataSource = SqlDataSource7;           
            GridView1.DataBind();
            
        }
        else
        {
            DateTime dd = Convert.ToDateTime(mont.SelectedValue + "/1/" + yers.SelectedValue);
            DateTime dd2 = Convert.ToDateTime(mont.SelectedValue + "/" + DateTime.DaysInMonth(dd.Year, dd.Month) + "/" + yers.SelectedValue);
            SqlDataSource3.SelectCommand = "SELECT * FROM [monthly_atten] WHERE Date between @first and @second and course=@course and center_code=@code order by s_id";
            SqlDataSource3.SelectParameters["first"].DefaultValue = dd.ToString();
            SqlDataSource3.SelectParameters["second"].DefaultValue = dd2.ToString();
            
            GridView1.DataSource = SqlDataSource3;            
            GridView1.DataBind();          
        }
      
        
        }
    private void grid()
    {
        try
        {
            GridView1.DataBind();
        }
        catch
        {
            Response.Redirect("~/Account/Login.aspx");
        }
    }
   
    protected void mont_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }
    protected void yers_SelectedIndexChanged(object sender, EventArgs e)
    {
       
    }

    public override void VerifyRenderingInServerForm(Control control)
    {

    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        export_to_excel exl = new export_to_excel();
        exl.exporttoexcel("Monthly_Attendence_sheet.xls", GridView1);
    }
}