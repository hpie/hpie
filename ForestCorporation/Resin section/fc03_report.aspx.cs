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
using System.Web.UI.HtmlControls;

public partial class fc03_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString["code"] != "")
        {
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
          Label55.Text =Convert.ToDateTime( dv.Table.Rows[0]["Preno1"]).ToString("ddMMyyyy");
           Label56.Text = dv.Table.Rows[0]["SType"].ToString();
           Label57.Text = dv.Table.Rows[0]["SType"].ToString();
            TextBox3.Text =Convert.ToDateTime(dv.Table.Rows[0]["date_fc03"]).ToString("dd-MM-yyyy");
            TextBox4.Text = dv.Table.Rows[0]["ResFWD"].ToString();

            TextBox5.Text = dv.Table.Rows[0]["name_lsm_name"].ToString();
            TextBox6.Text = dv.Table.Rows[0]["ChallanNo"].ToString();
            TextBox7.Text = dv.Table.Rows[0]["name_lsm_lot"].ToString();
            TextBox8.Text = dv.Table.Rows[0]["NoStype"].ToString();
          
            TextBox10.Text = dv.Table.Rows[0]["Grosswetin"].ToString();
            TextBox11.Text = dv.Table.Rows[0]["wt_of_tin_fc03"].ToString();
            TextBox12.Text = dv.Table.Rows[0]["netrws"].ToString();
            TextBox13.Text = dv.Table.Rows[0]["sakki_wt_fc03"].ToString();
            TextBox14.Text = dv.Table.Rows[0]["saaki_per"].ToString();
            TextBox15.Text = dv.Table.Rows[0]["unit_div_fc03"].ToString();

        }

    }
    protected void BtnExportGrid_Click(object sender, EventArgs e)
    {
       
    }
}
