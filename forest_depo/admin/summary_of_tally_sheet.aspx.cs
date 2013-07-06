using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;

public partial class summary_of_tally_sheet : System.Web.UI.Page
{
    string size_type2, size_type3;
    string comp;
    Int32 count;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DropDownList2_SelectedIndexChanged(object sender, EventArgs e)
    {
        SqlDataSource4.DataBind();

        DataView dv = (DataView)(SqlDataSource4.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            DropDownList1.Items.FindByText(DropDownList1.SelectedItem.Text.ToString()).Selected = false;
            DropDownList1.Items.FindByText(dv.Table.Rows[0]["truck_no"].ToString()).Selected = true;
            date.Text =Convert.ToDateTime(dv.Table.Rows[0]["date_of_chl"]).ToString("d");
        }

   
       
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            count++;
            size_type2 = ((Label)(e.Row.FindControl("size"))).Text;

            string qry = "select spec, size_type, sum(as_per_no) as as_per_no from tally_sheet where challan_no='" + DropDownList2.SelectedItem.Text+"' and size_type='"+size_type2+"' group by spec, size_type order by spec";
            SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);



            if (ds.Tables[0].Rows.Count != 0)
            {

                Int32 i;
                for (i = 0; i < ds.Tables[0].Rows.Count; i++)
                {

                    comp = ds.Tables[0].Rows[i]["spec"].ToString();
                    if (comp == "Deodar")
                    {
                        ((Label)(e.Row.FindControl("deodar"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                    }
                    if (comp == "Kail")
                    {
                        ((Label)(e.Row.FindControl("kail"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                    }
                    if (comp == "Fir")
                    {
                        ((Label)(e.Row.FindControl("fir"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                    }
                    if (comp == "Chil")
                    {
                        ((Label)(e.Row.FindControl("chil"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                    }

                }



            }
            else
            {
                e.Row.Visible = false;
            }

        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource2.DataBind();

        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        //try
        //{
        //    if (dv.Table.Rows.Count != 0)
        //    {
                Panel1.Visible = true;
                Label6.Text = DropDownList1.SelectedItem.Text;
                Label7.Text = DropDownList2.SelectedItem.Text;
                Label8.Text = date.Text;
                GridView1.DataBind();
        //    }
        //}
        //catch (Exception r)
        //{
        //    Panel1.Visible = false;
        //}
    }
}