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

public partial class fc20_report : System.Web.UI.Page
{
    public Int32 sr = 0;
    public Int32 sr1 = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            bind();
        }
    }
    private void bind()
    {
       
            SqlDataSource1.SelectParameters["f_o_no"].DefaultValue = Request.QueryString["ch"].ToString();

      
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        DataView dv2 = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        Label1.Text = dv.Table.Rows[0]["challanno"].ToString();
        TextBox1.Text = dv2.Table.Rows[0]["ms"].ToString();
        Label2.Text =Convert.ToDateTime( dv.Table.Rows[0]["dt"]).ToString("dd/MM/yyyy");
        Label3.Text = dv.Table.Rows[0]["f_o_no"].ToString();
        Label4.Text = Convert.ToDateTime(dv2.Table.Rows[0]["dt"]).ToString("dd/MM/yyyy");
        //GridView1.DataSource = dv;
        //GridView1.DataBind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        
    }
}
