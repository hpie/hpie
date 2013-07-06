using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class Default_print : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString != null)
        {
            SqlDataSource_chl.DataBind();
             DataView dv=(DataView)(SqlDataSource_chl.Select(DataSourceSelectArguments.Empty));
             if (dv!=null)
             {
                 //division.Text = dv.Table.Rows[0]["division"].ToString();
                 //challan_no.Text = dv.Table.Rows[0]["challan_no"].ToString();
                 //date_of_challan.Text =Convert.ToDateTime(dv.Table.Rows[0]["date_of_chl"]).ToString("d");
                 //date_of_recept.Text = Convert.ToDateTime(dv.Table.Rows[0]["date_of_rec"]).ToString("d");
                 //truck_no.Text = dv.Table.Rows[0]["truck_no"].ToString();
                 //TextBox8.Text = dv.Table.Rows[0]["remarks"].ToString();
             }
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        SqlDataSource_chl.SelectParameters["challan_no"].DefaultValue=DropDownList1.SelectedItem.Text.ToString();
        SqlDataSource_rec.SelectParameters["challan_no"].DefaultValue=DropDownList1.SelectedItem.Text.ToString();

        DataView dv=(DataView)(SqlDataSource_chl.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            //division.Text = dv.Table.Rows[0]["division"].ToString();
            //challan_no.Text = dv.Table.Rows[0]["challan_no"].ToString();
            //date_of_challan.Text = Convert.ToDateTime(dv.Table.Rows[0]["date_of_chl"]).ToString("d");
            //date_of_recept.Text = Convert.ToDateTime(dv.Table.Rows[0]["date_of_rec"]).ToString("d");
            //truck_no.Text = dv.Table.Rows[0]["truck_no"].ToString();
            //TextBox8.Text = dv.Table.Rows[0]["remarks"].ToString();

            //GridView1.DataBind();
            GridView2.DataBind();
        }

        
             
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource_chl.SelectParameters["challan_no"].DefaultValue = DropDownList1.SelectedItem.Text.ToString();
        SqlDataSource_rec.SelectParameters["challan_no"].DefaultValue = DropDownList1.SelectedItem.Text.ToString();

        DataView dv = (DataView)(SqlDataSource_chl.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            //division.Text = dv.Table.Rows[0]["division"].ToString();
            //challan_no.Text = dv.Table.Rows[0]["challan_no"].ToString();
            //date_of_challan.Text = Convert.ToDateTime(dv.Table.Rows[0]["date_of_chl"]).ToString("d");
            //date_of_recept.Text = Convert.ToDateTime(dv.Table.Rows[0]["date_of_rec"]).ToString("d");
            //truck_no.Text = dv.Table.Rows[0]["truck_no"].ToString();
            //TextBox8.Text = dv.Table.Rows[0]["remarks"].ToString();

            //GridView1.DataBind();
            GridView2.DataBind();
        }

    }
}