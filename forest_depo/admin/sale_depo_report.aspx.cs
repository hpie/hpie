using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class sale_depo_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        try
        {
            SqlDataSource2.DataBind();
            DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));

            if (dv.Table.Rows.Count != 0)
            {
                division.Text = dv.Table.Rows[0]["name_div"].ToString();

                date.Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("MMMM-yyyy");

            }
        }
        catch(Exception x)
        {
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource2.DataBind();
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            division.Text = dv.Table.Rows[0]["name_div"].ToString();

            date.Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("MMMM-yyyy");

        }
        GridView1.DataBind();
    }
}