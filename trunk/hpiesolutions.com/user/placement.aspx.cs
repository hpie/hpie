using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class user_placement : System.Web.UI.Page
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
                    name.Text = dv.Table.Rows[0]["s_name"].ToString();
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
                name.Text = dv.Table.Rows[0]["s_name"].ToString();
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
                name.Text = dv.Table.Rows[0]["s_name"].ToString();
            }
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            SqlDataSource5.Update();
            SqlDataSource5.InsertParameters["date"].DefaultValue = DateTime.Now.ToString();
            SqlDataSource5.Insert();
            Label1.Text = "successfull....";
        }
        catch(Exception r)
        {
            Label1.Text = "Error!(" + r.Message + ")";
        }
    }
}