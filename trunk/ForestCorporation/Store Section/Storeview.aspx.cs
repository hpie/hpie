using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Data.SqlClient;
using System.Configuration;
public partial class Storeview : System.Web.UI.Page
{
    public Int32 r;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    private void bind()
    {
        ArrayList arr = new ArrayList();
        int i;
        DateTime chdt ;
        DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox4.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

        DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox5.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

         //  DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + count.ToString() + "/" + yer.SelectedItem.Text);
        //  ((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");
       // Int32 m, y;
        //m = live.Month;
        //y = live.Year;
       // Int32 d = DateTime.DaysInMonth(y, m);
        while(dt1< dt2)
        {
            chdt = dt1.AddDays(1);
            arr.Add(chdt.ToString("dd-MM-yyyy"));
            dt1 = chdt;
        }
        //DateTime dd = Convert.ToDateTime(month.SelectedValue + "/01/2012");
        //Label28.Text = dd.ToString("MMMM");
        GridView1.DataSource = arr;
        GridView1.DataBind();




    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Response.Redirect("store.aspx");
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        r = r + 1;
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string dd6 = ((Label)(e.Row.FindControl("label1"))).Text;
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(dd6, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            string st1511 = "select * from store where date='" + dt2 + "'";
            SqlDataAdapter adp1511 = new SqlDataAdapter(st1511, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds1511 = new DataSet();
            adp1511.Fill(ds1511);
            if (ds1511.Tables[0].Rows.Count != 0)
            {
                for (int j = 0; j < ds1511.Tables[0].Rows.Count; j++)
                {
                    e.Row.Cells[2].Text += ds1511.Tables[0].Rows[j]["partyname"].ToString() + ",";
                    e.Row.Cells[3].Text += ds1511.Tables[0].Rows[j]["items"].ToString() + ",";
                    e.Row.Cells[4].Text += ds1511.Tables[0].Rows[j]["billno"].ToString() + ",";
                    //e.Row.Cells[5].Text += ds1511.Tables[0].Rows[j]["billno"].ToString() + ",";
                }
            }
           
            string st151 = "select date,sum(qty) as Qty from fc05 where date='" + dt2 + "' and section='store' group by date";
            SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds151 = new DataSet();
            adp151.Fill(ds151);
            if (ds151.Tables[0].Rows.Count != 0)
            {
                e.Row.Cells[9].Text = ds151.Tables[0].Rows[0]["qty"].ToString();
            }
            else
            {
                e.Row.Cells[9].Text = "0".ToString();
            }
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        SqlDataSource1.SelectCommand = "SELECT * FROM [store]";
        GridView1.DataBind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        bind();
        //DateTime sdate = DateTime.Parse(TextBox4.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
        //DateTime edate = DateTime.Parse(TextBox5.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));

        //SqlDataSource1.SelectCommand = "SELECT * FROM [store] where items='"+DropDownList1.SelectedValue+"' or date>='"+sdate +"' and date<='"+edate+"'";
        //GridView1.DataBind();
    }
}
