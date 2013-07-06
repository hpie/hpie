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

public partial class fc13_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString["qty"] != null)
        {
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            Label5.Text = dv.Table.Rows[0][1].ToString();
            Label6.Text = dv.Table.Rows[0][2].ToString();
            Label7.Text = dv.Table.Rows[0][3].ToString();
            Label8.Text = dv.Table.Rows[0][4].ToString();
            Label9.Text = dv.Table.Rows[0][5].ToString();
            Label10.Text = dv.Table.Rows[0][10].ToString();
           
            Label11.Text = dv.Table.Rows[0][11].ToString();
        }
        else
        {
            Response.Redirect("fc13.aspx");
            }

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        
    }
}
