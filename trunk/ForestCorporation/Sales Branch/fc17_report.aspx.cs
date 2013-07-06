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

public partial class fc17_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString["preno"] != null)
        {
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            Label1.Text = dv.Table.Rows[0][2].ToString();
            Label001.Text = dv.Table.Rows[0][1].ToString();
            Label2.Text = Convert.ToDateTime(dv.Table.Rows[0][3]).ToString("dd/MM/yyyy");
            Label3.Text = Convert.ToDateTime(dv.Table.Rows[0][4]).ToString("dd/MM/yyyy");
            Label4.Text = dv.Table.Rows[0][5].ToString();
            Label5.Text = dv.Table.Rows[0][6].ToString();
            Label6.Text = dv.Table.Rows[0][7].ToString();
            Label7.Text = dv.Table.Rows[0][8].ToString();
            Label8.Text = dv.Table.Rows[0][9].ToString();
            Label9.Text = dv.Table.Rows[0][10].ToString();
            Label10.Text = dv.Table.Rows[0][11].ToString();
            Label11.Text = dv.Table.Rows[0][12].ToString();
            Label12.Text = dv.Table.Rows[0][13].ToString();
            Label13.Text = dv.Table.Rows[0][14].ToString();
            Label14.Text = dv.Table.Rows[0][15].ToString();
            Label15.Text = dv.Table.Rows[0][16].ToString();
            Label16.Text = dv.Table.Rows[0][17].ToString();
            Label17.Text = dv.Table.Rows[0]["labour_rs"].ToString();
            Label18.Text = dv.Table.Rows[0]["labour_val"].ToString();
            Label19.Text = dv.Table.Rows[0]["dep_rs"].ToString();
            Label20.Text = dv.Table.Rows[0]["dep_val"].ToString();
            Label21.Text = dv.Table.Rows[0]["inter_per"].ToString();
            Label22.Text = dv.Table.Rows[0]["inter_val"].ToString();
            Label23.Text = dv.Table.Rows[0]["profit_rs"].ToString();
            Label24.Text = dv.Table.Rows[0]["profit_val"].ToString();
            Label25.Text = dv.Table.Rows[0]["sale_val"].ToString();
            Label26.Text = dv.Table.Rows[0]["sellinltr_val"].ToString();
            Label27.Text = dv.Table.Rows[0]["costpro_val"].ToString();
            Label28.Text = dv.Table.Rows[0]["cry_ltr"].ToString();
            Label29.Text = dv.Table.Rows[0]["cry_rs"].ToString();
            Label30.Text = dv.Table.Rows[0]["cry_val"].ToString();
            Label31.Text = dv.Table.Rows[0]["fuel_kg"].ToString();
            Label32.Text = dv.Table.Rows[0]["fuel_rs"].ToString();
            Label33.Text = dv.Table.Rows[0]["fuel_val"].ToString();
            Label34.Text = dv.Table.Rows[0]["overhead_rs"].ToString();
            Label35.Text = dv.Table.Rows[0]["overhead_val"].ToString();
            Label36.Text = dv.Table.Rows[0]["com_rs"].ToString();
            Label37.Text = dv.Table.Rows[0]["com_val"].ToString();


        }
        else
        {
            Response.Redirect("fc17.aspx");
        }
    }
}
