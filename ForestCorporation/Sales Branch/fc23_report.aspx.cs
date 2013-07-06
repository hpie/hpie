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
public partial class fc23 : System.Web.UI.Page
{
    public Int32 sr = 0;
    public Int32 sr1 = 0;
    public decimal kg = 0, kg1 = 0;
    DateTime dt=Convert.ToDateTime("01/01/1900");
    DateTime dt1=Convert.ToDateTime("01/01/1900");
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            bind();
        
        }
    }
    private void bind()
    {
        string st="select *from fc23 where prno=2301";
        SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet dv = new DataSet();
        adp.Fill(dv);
        Label1.Text = dv.Tables[0].Rows[0]["prno"].ToString();
        TextBox1.Text = dv.Tables[0].Rows[0]["truckno"].ToString();
        TextBox2.Text = dv.Tables[0].Rows[0]["s_no"].ToString();
        if (Convert.ToDateTime(dv.Tables[0].Rows[0]["dt"]).ToString("dd/MM/yyyy") != "01/01/1900")
        {
            TextBox6.Text = Convert.ToDateTime(dv.Tables[0].Rows[0]["dt"]).ToString("dd/MM/yyyy");
        }
        if (Convert.ToDateTime(dv.Tables[0].Rows[0]["dt1"]).ToString("dd/MM/yyyy") != "01/01/1900")
        {
            TextBox7.Text = Convert.ToDateTime(dv.Tables[0].Rows[0]["dt1"]).ToString("dd/MM/yyyy");
        }
        TextBox3.Text = dv.Tables[0].Rows[0]["nameofd"].ToString();
        TextBox4.Text = dv.Tables[0].Rows[0]["challanno"].ToString();
        TextBox5.Text = dv.Tables[0].Rows[0]["cashmemo"].ToString();
        TextBox8.Text = dv.Tables[0].Rows[0]["nameofpur"].ToString();

        string st1 = "";
        string st2 = "";
        if (TextBox4.Text != "")
        {
            st2 = "select *from fc20 where challanno='" + TextBox4.Text + "'";
            SqlDataAdapter adp11 = new SqlDataAdapter(st2, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet dv11 = new DataSet();
            adp11.Fill(dv11);
            st1 = "select pro_size as a,wtkg as b,qty as c from fc13 where  fac_ord_no='" + dv11.Tables[0].Rows[0]["f_o_no"].ToString() + "'";
        }
        else
        {
            st1 = "select des as a,gg as b,qty as c from fc22 where prno='"+TextBox5.Text+"'";
        }
        SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet dv1 = new DataSet();
        adp1.Fill(dv1);
        GridView1.DataSource = dv1;
        GridView1.DataBind();
    }
  
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        String ss = "";
        String ss1 = "";
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            ss = ((Label)(e.Row.FindControl("Label6"))).Text.ToString();
            ss1 = ((Label)(e.Row.FindControl("Label5"))).Text.ToString();
            if (ss1 != "")
            {
                kg = kg + Convert.ToDecimal(((Label)(e.Row.FindControl("Label5"))).Text);
            }
       
        if (ss != "")
        {
            kg1 = kg1 + Convert.ToDecimal(((Label)(e.Row.FindControl("Label6"))).Text);
        }
        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
           // ((Label)(GridView1.FooterRow.FindControl("Label8"))).Text = kg.ToString();
        }
       
    }
   
}
