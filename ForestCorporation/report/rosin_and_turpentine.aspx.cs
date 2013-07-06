using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
public partial class report_rosin_and_turpentine : System.Web.UI.Page
{
    public Int32 sr=0;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            SqlDataSource dd = (SqlDataSource)(e.Row.FindControl("SqlDataSource12"));
            GridView dv = (GridView)(e.Row.FindControl("Gridview2"));
            dd.SelectParameters["name"].DefaultValue = GridView1.DataKeys[e.Row.RowIndex].Value.ToString();
            DataView dv1 = (DataView)(dd.Select(DataSourceSelectArguments.Empty));
            dv.DataSource = dv1;
            dv.DataBind();
        }
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string sr = e.Row.Cells[0].Text;
            string qry = "select des,sum(qty) as qty from c21 where srno='" + sr + "' and des!='Turpentine Oil' and des!='Phenyl' group by des";
            SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            Int32 i;
            for (i = 0; i < ds.Tables[0].Rows.Count; i++)
            {
                if(ds.Tables[0].Rows[i][0].ToString()=="X")
                    e.Row.Cells[3].Text = ds.Tables[0].Rows[i][1].ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "WW")
                    e.Row.Cells[4].Text = ds.Tables[0].Rows[i][1].ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "WG")
                    e.Row.Cells[5].Text = ds.Tables[0].Rows[i][1].ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "N")
                    e.Row.Cells[6].Text =(Convert.ToInt32(ds.Tables[0].Rows[i][1])*2).ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "M")
                    e.Row.Cells[7].Text = ds.Tables[0].Rows[i][1].ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "K")
                    e.Row.Cells[8].Text = ds.Tables[0].Rows[i][1].ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "H")
                    e.Row.Cells[9].Text = ds.Tables[0].Rows[i][1].ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "D")
                    e.Row.Cells[10].Text = ds.Tables[0].Rows[i][1].ToString();
                if (ds.Tables[0].Rows[i][0].ToString() == "B")
                    e.Row.Cells[11].Text = ds.Tables[0].Rows[i][1].ToString();
            }

        }
    }
}