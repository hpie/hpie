using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class admin_reportcard_all : System.Web.UI.Page
{
    Int32 male1, female1, tot1, tot2; 
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            dd();
            dd2();
            dd3();
            dd4();
            dd5();
            LinkButton2.Attributes.Add("class", "iframe");
            LinkButton2.Attributes.Add("href", "st_placed.aspx");
        }
    }
    private void dd()
    {      
           
            DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                   Label1.Text = dv.Table.Rows[0]["cnt"].ToString();
                }
                else
                {
                    Label1.Text = "0";
                }
            }
        
    }
    private void dd2()
    {

        DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                Label2.Text = dv.Table.Rows[0]["cnt"].ToString();
            }
            else
            {
                Label2.Text = "0";
            }
        }

    }
    private void dd3()
    {
        DataView dv = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                Label3.Text = dv.Table.Rows[0]["cnt"].ToString();
            }
            else
            {
                Label3.Text = "0";
            }
        }
    }
    private void dd4()
    {
        DataView dv = (DataView)(SqlDataSource6.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                Label4.Text = dv.Table.Rows[0]["cnt"].ToString();
            }
            else
            {
                Label4.Text = "0";
            }
        }
    }
    private void dd5()
    {
        DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                Label5.Text = dv.Table.Rows[0]["cnt"].ToString();
            }
            else
            {
                Label5.Text = "0";
            }
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string cd = ((Label)(e.Row.FindControl("categ"))).Text;
            LinkButton ss;
            ss = ((LinkButton)(e.Row.FindControl("LinkButton1")));
            ss.Attributes.Add("class", "iframe");
            ss.Attributes.Add("href", "categ_details.aspx?sid=" + cd);


            SqlDataSource2.SelectParameters["st"].DefaultValue = ((Label)(e.Row.FindControl("categ"))).Text.ToString();
             DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
             if (dv != null)
             {
                 if (dv.Table.Rows.Count != 0)
                 {
                     
                   
                     Int32 i;
                     for (i = 0; i < dv.Table.Rows.Count; i++)
                     {

                         if (dv.Table.Rows[i]["gen"].ToString() == "Male")
                         {
                             tot2 += Convert.ToInt32(dv.Table.Rows[i]["cnt"]);                           
                             tot1 += Convert.ToInt32(dv.Table.Rows[i]["cnt"]);
                             male1 += Convert.ToInt32(dv.Table.Rows[i]["gen1"]);
                             
                             ((Label)(e.Row.FindControl("male"))).Text = dv.Table.Rows[i]["gen1"].ToString();
                         }
                         else
                         {
                             tot2 += Convert.ToInt32(dv.Table.Rows[i]["cnt"]);
                          
                             tot1 += Convert.ToInt32(dv.Table.Rows[i]["cnt"]);
                             female1 += Convert.ToInt32(dv.Table.Rows[i]["gen1"]);
                             ((Label)(e.Row.FindControl("female"))).Text = dv.Table.Rows[i]["gen1"].ToString();
                         }

                     }
                     ((Label)(e.Row.FindControl("tot"))).Text = tot2.ToString();
                     tot2 = 0;
                 }
                 else
                 {
                     ((Label)(e.Row.FindControl("tot"))).Text = "0";

                 }

             }

        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            ((Label)(e.Row.FindControl("tot_f"))).Text = tot1.ToString();
            ((Label)(e.Row.FindControl("male_f"))).Text = male1.ToString();
            ((Label)(e.Row.FindControl("female_f"))).Text = female1.ToString();
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
        dd();       
        dd2();
        dd3();
        dd4();
        dd5();
    }
    protected void GridView1_SelectedIndexChanging(object sender, GridViewSelectEventArgs e)
    {
        //string cd = ((Label)(GridView1.Rows[e.NewSelectedIndex].FindControl("categ"))).Text;
        //LinkButton ss;
        //ss = ((LinkButton)(GridView1.Rows[e.NewSelectedIndex].FindControl("LinkButton1")));
        //ss.Attributes.Add("class", "iframe");
        //ss.Attributes.Add("href", "categ_details.aspx?sid=" + cd);
    }
    //protected void LinkButton2_Click(object sender, EventArgs e)
    //{
    //    //LinkButton2.Attributes.Add("class", "iframe");
    //    //LinkButton2.Attributes.Add("href", "st_placed.aspx");
    //}
}