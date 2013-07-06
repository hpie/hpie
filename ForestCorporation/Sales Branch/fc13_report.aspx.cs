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
        if (Request.QueryString["ord"] != null)
        {
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            Label5.Text = dv.Table.Rows[0]["fac_ord_no"].ToString();
            Label6.Text = dv.Table.Rows[0]["pri_no"].ToString();
            Label7.Text = dv.Table.Rows[0]["your_o_no"].ToString();
            Label8.Text =Convert.ToDateTime(dv.Table.Rows[0]["dt"]).ToString("dd/MM/yyyy");
            Label9.Text = dv.Table.Rows[0][5].ToString();
            Label10.Text = dv.Table.Rows[0]["desti"].ToString();
           
            Label11.Text = dv.Table.Rows[0]["consi"].ToString();
        }
        else
        {
            Response.Redirect("fc13.aspx");
            }

    }
   
}
