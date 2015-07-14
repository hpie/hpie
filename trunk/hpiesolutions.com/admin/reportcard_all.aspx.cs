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

    String pcode;





    protected void OnLoadComplete(EventArgs e)
    {
            //pcode = p_code.SelectedValue;
            //dd();
            //dd2();
            //dd3();
            //dd4();
            //dd5();
            //LinkButton2.Attributes.Add("class", "iframe");
            //LinkButton2.Attributes.Add("href", "st_placed.aspx?pcode=" + pcode);
            //lk1.Attributes.Add("class", "iframe");
            //lk1.Attributes.Add("href", "trai_not.aspx?pcode=" + pcode);

            //lk2.Attributes.Add("class", "iframe");
            //lk2.Attributes.Add("href", "under_trai.aspx?pcode=" + pcode);
            //lk3.Attributes.Add("class", "iframe");
            //lk3.Attributes.Add("href", "trai_comp.aspx?pcode=" + pcode);
            //lk4.Attributes.Add("class", "iframe");
            //lk4.Attributes.Add("href", "dropped.aspx?pcode=" + pcode);
    }
    
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            //Add the item at the first position. 
            p_code.AppendDataBoundItems = true;
           // p_code.Items.Insert(0, new ListItem("--Select--", "0"));
           // p_code.SelectedIndex = 0;
        }
        else
        {
            GridView1.DataBind();
            dd();
            dd2();
            dd3();
            dd4();
            dd5();
            LinkButton2.Attributes.Add("class", "iframe");
            LinkButton2.Attributes.Add("href", "st_placed.aspx?pcode=" + pcode);
            lk1.Attributes.Add("class", "iframe");
            lk1.Attributes.Add("href", "trai_not.aspx?pcode=" + pcode);

            lk2.Attributes.Add("class", "iframe");
            lk2.Attributes.Add("href", "under_trai.aspx?pcode=" + pcode);
            lk3.Attributes.Add("class", "iframe");
            lk3.Attributes.Add("href", "trai_comp.aspx?pcode=" + pcode);
            lk4.Attributes.Add("class", "iframe");
            lk4.Attributes.Add("href", "dropped.aspx?pcode=" + pcode);
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
    //OnRowDataBound="GridView1_RowDataBound" 
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string cd = ((Label)(e.Row.FindControl("categ"))).Text;
            pcode = p_code.SelectedValue;
            LinkButton ss;
            ss = ((LinkButton)(e.Row.FindControl("LinkButton1")));
            ss.Attributes.Add("class", "iframe");
            ss.Attributes.Add("href", "categ_details.aspx?sid=" + cd + "&pcode=" + pcode);


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
        //GridView1.DataBind();
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

    protected void pcode_Change(object sender, EventArgs e)
    {
        if (p_code.SelectedValue != "0")
        {
            resultDiv.Visible = true;
        }
        else
        {
            resultDiv.Visible = false;
        }
        
    }
    
}