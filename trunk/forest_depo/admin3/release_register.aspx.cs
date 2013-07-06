using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Configuration;
using System.Data.SqlClient;

public partial class release_register : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Label10.Text="";
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            Label10.Text = dv.Table.Rows[0]["work_div"].ToString();
            GridView1.DataSource = SqlDataSource2;
            GridView1.DataBind();
        }
       

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        
       

        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string qry, division, lot_no, stack, auc_date, name_pur;

            division = DropDownList1.SelectedItem.Text;
            lot_no = ((Label)(e.Row.FindControl("Label1"))).Text;
            auc_date = ((Label)(e.Row.FindControl("Label6"))).Text;
            stack = ((Label)(e.Row.FindControl("stack"))).Text;
            name_pur = ((Label)(e.Row.FindControl("Label7"))).Text;

            qry = "select  challan_no, date_of_chl, as_per_no, as_per_vol from tally_sheet where division='" + division + "' and lot_no='" + lot_no + "' and stack='" + stack + "' and auction_date='" + auc_date + "' and name_purchaser='" + name_pur + "'";
       SqlDataAdapter adp=new SqlDataAdapter(qry,ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
       DataSet ds = new DataSet();
       adp.Fill(ds);
       if (ds.Tables[0].Rows.Count != 0)
       {
           ((Label)(e.Row.FindControl("ch_no"))).Text = ds.Tables[0].Rows[0]["challan_no"].ToString();
           ((Label)(e.Row.FindControl("ch_date"))).Text =Convert.ToDateTime(ds.Tables[0].Rows[0]["date_of_chl"]).ToString("d");
           ((Label)(e.Row.FindControl("size"))).Text = ds.Tables[0].Rows[0]["as_per_no"].ToString();
           ((Label)(e.Row.FindControl("size_vol"))).Text = ds.Tables[0].Rows[0]["as_per_vol"].ToString();

       }
        }
    }
}