using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class user_tracking : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            c_name.DataBind();
            s_code.DataBind();
            DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    name.Text = dv.Table.Rows[0]["s_name"].ToString();
                }
            }
        }
    }
    protected void s_code_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                name.Text = dv.Table.Rows[0]["s_name"].ToString();
            }
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            SqlDataSource7.InsertParameters["date"].DefaultValue = DateTime.Now.ToString();
            SqlDataSource7.Insert();
            batch_no.Text = "";
            l_contact_date.Text = "";
            c_comp_name.Text = "";
            c_comp_add.Text = "";
            city.Text = "";
            c_per_name.Text = "";
            c_e_contact_no.Text = "";
            j_date.Text = "";
            desig.Text = "";
            salary.Text = "";
            mode_of_cotr.Text = "";
            tracking_status.Text = "";
            work_status.Text = "";
            per_contacted.Text = "";
            relation.Text = "";
            remarks.Text = "";
            name_of_tracker.Text = "";
            categ_of_tracker.Text = "";
            comm_of_tracker.Text = "";


            Label1.Text = "Successfull..";
        }
        catch (Exception r)
        {
            Label1.Text = "Error !(" + r.Message + ")";
            Label1.Focus();
        }
    }
    protected void c_name_SelectedIndexChanged(object sender, EventArgs e)
    {
        s_code.DataBind();
        DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            if (dv.Table.Rows.Count != 0)
            {
                name.Text = dv.Table.Rows[0]["s_name"].ToString();
            }
            else
            {
                name.Text = "";
            }
        }
        else
        {
            name.Text = "";
        }
    }
}