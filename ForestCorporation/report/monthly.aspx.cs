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
public partial class report_monthly : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            dt();
            ss();
           // bind();
        }
    }
    private void bind()
    {
        Label1.Text = 0.ToString();
        Label2.Text = 0.ToString();
        Label3.Text = 0.ToString();
        Label4.Text = 0.ToString();
         Label5.Text =0.ToString();
         Label6.Text = 0.ToString();
         Label7.Text = 0.ToString();
         Label8.Text = 0.ToString();
         Label9.Text = 0.ToString();
         Label10.Text = 0.ToString();
         Label11.Text = 0.ToString();


         Label12.Text = 0.ToString();
         Label13.Text = 0.ToString();
         Label14.Text = 0.ToString();
         Label15.Text = 0.ToString();
         Label16.Text = 0.ToString();
         Label17.Text = 0.ToString();
         Label18.Text = 0.ToString();
         Label19.Text = 0.ToString();
         Label20.Text = 0.ToString();
         //Label21.Text = 0.ToString();
         //Label22.Text = 0.ToString();
         //Label23.Text = 0.ToString();

         Int32 mm =Convert.ToInt32( month.SelectedValue);
         Int32 mm1 = 0;

         Int32 yy = Convert.ToInt32(yer.SelectedValue);
         Int32 yy1 = 0;
         if (mm == 1)
         {
             mm1 = 12;
            yy = yy - 1;
         }
         else
         {
             mm1 = mm - 1;
         }
        DateTime dt2 = Convert.ToDateTime(DateTime.Parse("1/4/"+year.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        DateTime sdate = Convert.ToDateTime( mm1.ToString() + "/01/" + yy.ToString());
        Int32 day = DateTime.DaysInMonth(Convert.ToInt32( yer.SelectedValue), sdate.Month);
        DateTime edate = Convert.ToDateTime(mm1.ToString() + "/"+day+"/" + yy.ToString());

        DateTime sdate1 = Convert.ToDateTime(Convert.ToInt32(month.SelectedValue) + "/01/" + yer.SelectedValue.ToString());
        Int32 day1 = DateTime.DaysInMonth(Convert.ToInt32(yer.SelectedValue), sdate1.Month);
        DateTime edate1 = Convert.ToDateTime(month.SelectedValue + "/" + day1 + "/" + yer.SelectedValue.ToString());
        string st = "select obtin,obqtl from ob where dt='" + dt2 + "';";
        string st1 = "select sum(nostype) as nostype,sum(netrws) as netrws from fc01 where date_fc03>='" + dt2 + "' and date_fc03<='" + edate + "' group by date_fc03;";
        string st2 = "select sum(nostype) as nostype,sum(netrws) as netrws from fc01 where date_fc03>='" + sdate1 + "' and date_fc03<='" + edate1 + "' group by date_fc03;";
            string st3="select notin,netsakki from fc05 where date>='" + dt2 + "' and date<='" + edate + "';" ;
        string st4= "select notin,netsakki from fc05 where date>='" + sdate1 + "' and date<='" + edate1 + "';";
       string st5= "select * from ob where dt='" + dt2 + "';";
         string st6="select * from fc08 where dt>='" + dt2 + "' and dt<='" + edate + "';";
        string st7= "select * from fc08 where dt>='" + sdate1 + "' and dt<='" + edate1 + "';";
       // string st1 = "select obtin,obqtl from ob where dt='" + dt2 + "'";
        SqlDataAdapter adp = new SqlDataAdapter(st+st1+st2+st3+st4+st5+st6+st7, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count != 0)
        {
            Label1.Text = ds.Tables[0].Rows[0]["obtin"].ToString();
            Label2.Text = ds.Tables[0].Rows[0]["obqtl"].ToString();
        }
        if (ds.Tables[1].Rows.Count != 0)
        {
            for (Int32 a = 0; a < ds.Tables[1].Rows.Count; a++)
            {
                Label3.Text =(Convert.ToDecimal(Label3.Text)+Convert.ToDecimal( ds.Tables[1].Rows[a][0])).ToString();
                Label4.Text = (Convert.ToDecimal(Label4.Text) + Convert.ToDecimal(ds.Tables[1].Rows[a][1])).ToString();
            
            }
        }


        if (ds.Tables[2].Rows.Count != 0)
        {
            for (Int32 a = 0; a < ds.Tables[2].Rows.Count; a++)
            {
                Label5.Text = (Convert.ToDecimal(Label5.Text) + Convert.ToDecimal(ds.Tables[2].Rows[a][0])).ToString();
                Label6.Text = (Convert.ToDecimal(Label6.Text) + Convert.ToDecimal(ds.Tables[2].Rows[a][1])).ToString();

            }
        }

       
        Label7.Text = (Convert.ToDecimal(Label3.Text) + Convert.ToDecimal(Label5.Text)).ToString();
        Label8.Text = (Convert.ToDecimal(Label4.Text) + Convert.ToDecimal(Label6.Text)).ToString();
        Label9.Text = (Convert.ToDecimal(Label7.Text) + Convert.ToDecimal(Label1.Text)).ToString();
        Label10.Text = (Convert.ToDecimal(Label8.Text) + Convert.ToDecimal(Label2.Text)).ToString();
        if (ds.Tables[3].Rows.Count != 0)
        {
            for (Int32 a = 0; a < ds.Tables[3].Rows.Count; a++)
            {
                Label11.Text = (Convert.ToDecimal(Label11.Text) + Convert.ToDecimal(ds.Tables[3].Rows[a][0])).ToString();
                Label12.Text = (Convert.ToDecimal(Label12.Text) + Convert.ToDecimal(ds.Tables[3].Rows[a][1])).ToString();

            }
        }
        if (ds.Tables[4].Rows.Count != 0)
        {
            for (Int32 a = 0; a < ds.Tables[4].Rows.Count; a++)
            {
                Label13.Text = (Convert.ToDecimal(Label13.Text) + Convert.ToDecimal(ds.Tables[4].Rows[a][0])).ToString();
                Label14.Text = (Convert.ToDecimal(Label14.Text) + Convert.ToDecimal(ds.Tables[4].Rows[a][1])).ToString();

            }
        }
        Label15.Text = (Convert.ToDecimal(Label11.Text) + Convert.ToDecimal(Label13.Text)).ToString();
        Label16.Text = (Convert.ToDecimal(Label12.Text) + Convert.ToDecimal(Label14.Text)).ToString();


        Label19.Text = (Convert.ToDecimal(Label15.Text) - Convert.ToDecimal(Label17.Text)).ToString();
        Label20.Text = (Convert.ToDecimal(Label16.Text) - Convert.ToDecimal(Label18.Text)).ToString();



        //3.
        if (ds.Tables[5].Rows.Count != 0)
        {
            Label21.Text = "0".ToString();
            Label22.Text = "0".ToString();
            Label23.Text = "0".ToString();
            Label24.Text = "0".ToString();
            Label25.Text = "0".ToString();
            Label26.Text = "0".ToString();
            Label27.Text = "0".ToString();
            Label28.Text = "0".ToString();
            Label29.Text = "0".ToString();
            Label30.Text = "0".ToString();
            for (Int32 a = 0; a < ds.Tables[5].Rows.Count; a++)
            {
                if (ds.Tables[5].Rows[a][4].ToString() == "3".ToString())
                {
                    Label21.Text = (Convert.ToDecimal(Label21.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a]["obtin"])).ToString();
                }
                if (ds.Tables[5].Rows[a][4].ToString() == "4".ToString())
                Label22.Text = (Convert.ToDecimal(Label22.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                if (ds.Tables[5].Rows[a][4].ToString() == "5".ToString())      
                Label23.Text = (Convert.ToDecimal(Label23.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                if (ds.Tables[5].Rows[a][4].ToString() == "6".ToString())       
                Label24.Text = (Convert.ToDecimal(Label24.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                if (ds.Tables[5].Rows[a][4].ToString() == "7".ToString())                  
                Label25.Text = (Convert.ToDecimal(Label25.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                if (ds.Tables[5].Rows[a][4].ToString() == "8".ToString())                     
                Label26.Text = (Convert.ToDecimal(Label26.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                if (ds.Tables[5].Rows[a][4].ToString() == "9".ToString())                 
                Label27.Text = (Convert.ToDecimal(Label27.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                if (ds.Tables[5].Rows[a][4].ToString() == "10".ToString())                       
                Label28.Text = (Convert.ToDecimal(Label28.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                if (ds.Tables[5].Rows[a][4].ToString() == "11".ToString())                       
                Label29.Text = (Convert.ToDecimal(Label29.Text) + Convert.ToDecimal(ds.Tables[5].Rows[a][1])).ToString();
                //if (ds.Tables[5].Rows[a]["type"].ToString() == "6".ToString())                  
                Label30.Text = (Convert.ToDecimal(Label21.Text) + Convert.ToDecimal(Label22.Text) + Convert.ToDecimal(Label23.Text) + Convert.ToDecimal(Label24.Text) + Convert.ToDecimal(Label25.Text) + Convert.ToDecimal(Label26.Text) + Convert.ToDecimal(Label27.Text) + Convert.ToDecimal(Label28.Text) + Convert.ToDecimal(Label29.Text)).ToString();

            }
        }
        if (ds.Tables[6].Rows.Count != 0)
        {
            Label31.Text = "0".ToString();
            Label32.Text = "0".ToString();
            Label33.Text = "0".ToString();
            Label34.Text = "0".ToString();
            Label35.Text = "0".ToString();
            Label36.Text = "0".ToString();
            Label37.Text = "0".ToString();
            Label38.Text = "0".ToString();
            Label39.Text = "0".ToString();
            Label40.Text = "0".ToString();
            for (Int32 a = 0; a < ds.Tables[6].Rows.Count; a++)
            {
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString()=="X")
                Label31.Text = (Convert.ToDecimal(Label31.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "WW")
                    Label32.Text = (Convert.ToDecimal(Label32.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "WG")
                    Label33.Text = (Convert.ToDecimal(Label33.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "N")
                    Label34.Text = (Convert.ToDecimal(Label34.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "M")
                    Label35.Text = (Convert.ToDecimal(Label35.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "K")
                    Label36.Text = (Convert.ToDecimal(Label36.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "H")
                    Label37.Text = (Convert.ToDecimal(Label37.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "D")
                    Label38.Text = (Convert.ToDecimal(Label38.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[6].Rows[a]["rosin_grade"].ToString() == "B")
                    Label39.Text = (Convert.ToDecimal(Label39.Text) + Convert.ToDecimal(ds.Tables[6].Rows[a]["rosin_pro_18_1"])).ToString();
                Label40.Text = (Convert.ToDecimal(Label31.Text) + Convert.ToDecimal(Label32.Text) + Convert.ToDecimal(Label33.Text) + Convert.ToDecimal(Label34.Text) + Convert.ToDecimal(Label35.Text) + Convert.ToDecimal(Label36.Text) + Convert.ToDecimal(Label37.Text) + Convert.ToDecimal(Label38.Text) + Convert.ToDecimal(Label39.Text)).ToString();

            }
        }


        if (ds.Tables[7].Rows.Count != 0)
        {
            Label41.Text = "0".ToString();
            Label42.Text = "0".ToString();
            Label43.Text = "0".ToString();
            Label44.Text = "0".ToString();
            Label45.Text = "0".ToString();
            Label46.Text = "0".ToString();
            Label47.Text = "0".ToString();
            Label48.Text = "0".ToString();
            Label49.Text = "0".ToString();
            Label50.Text = "0".ToString();
            for (Int32 a1 = 0; a1 < ds.Tables[7].Rows.Count; a1++)
            {
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "X")
                   Label40.Text = (Convert.ToDecimal(Label41.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "WW")
                    Label42.Text = (Convert.ToDecimal(Label42.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "WG")
                    Label43.Text = (Convert.ToDecimal(Label43.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "N")
                    Label44.Text = (Convert.ToDecimal(Label44.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "M")
                    Label45.Text = (Convert.ToDecimal(Label45.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "K")
                    Label46.Text = (Convert.ToDecimal(Label46.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "H")
                    Label47.Text = (Convert.ToDecimal(Label47.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "D")
                    Label48.Text = (Convert.ToDecimal(Label48.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                if (ds.Tables[7].Rows[a1]["rosin_grade"].ToString() == "B")
                    Label49.Text = (Convert.ToDecimal(Label49.Text) + Convert.ToDecimal(ds.Tables[7].Rows[a1]["rosin_pro_18_1"])).ToString();
                
                Label50.Text = (Convert.ToDecimal(Label41.Text) + Convert.ToDecimal(Label42.Text) + Convert.ToDecimal(Label43.Text) + Convert.ToDecimal(Label44.Text) + Convert.ToDecimal(Label45.Text) + Convert.ToDecimal(Label46.Text) + Convert.ToDecimal(Label47.Text) + Convert.ToDecimal(Label48.Text) + Convert.ToDecimal(Label49.Text)).ToString();

            }
        }
        Label51.Text = (Convert.ToDecimal(Label31.Text) + Convert.ToDecimal(Label41.Text)).ToString();
        Label52.Text = (Convert.ToDecimal(Label32.Text) + Convert.ToDecimal(Label42.Text)).ToString();


        Label53.Text = (Convert.ToDecimal(Label33.Text) + Convert.ToDecimal(Label43.Text)).ToString();
        Label54.Text = (Convert.ToDecimal(Label34.Text) + Convert.ToDecimal(Label44.Text)).ToString();

        Label55.Text = (Convert.ToDecimal(Label35.Text) + Convert.ToDecimal(Label45.Text)).ToString();
        Label56.Text = (Convert.ToDecimal(Label36.Text) + Convert.ToDecimal(Label46.Text)).ToString();
        Label57.Text = (Convert.ToDecimal(Label37.Text) + Convert.ToDecimal(Label47.Text)).ToString();
        Label58.Text = (Convert.ToDecimal(Label38.Text) + Convert.ToDecimal(Label48.Text)).ToString();
        Label59.Text = (Convert.ToDecimal(Label39.Text) + Convert.ToDecimal(Label49.Text)).ToString();
        Label60.Text = (Convert.ToDecimal(Label40.Text) + Convert.ToDecimal(Label50.Text)).ToString();


        Label61.Text = (Convert.ToDecimal(Label21.Text) + Convert.ToDecimal(Label51.Text)).ToString();
        Label62.Text = (Convert.ToDecimal(Label22.Text) + Convert.ToDecimal(Label52.Text)).ToString();


        Label63.Text = (Convert.ToDecimal(Label23.Text) + Convert.ToDecimal(Label53.Text)).ToString();
        Label64.Text = (Convert.ToDecimal(Label24.Text) + Convert.ToDecimal(Label54.Text)).ToString();

        Label65.Text = (Convert.ToDecimal(Label25.Text) + Convert.ToDecimal(Label55.Text)).ToString();
        Label66.Text = (Convert.ToDecimal(Label26.Text) + Convert.ToDecimal(Label56.Text)).ToString();
        Label67.Text = (Convert.ToDecimal(Label27.Text) + Convert.ToDecimal(Label57.Text)).ToString();
        Label68.Text = (Convert.ToDecimal(Label28.Text) + Convert.ToDecimal(Label58.Text)).ToString();
        Label69.Text = (Convert.ToDecimal(Label29.Text) + Convert.ToDecimal(Label59.Text)).ToString();
        Label70.Text = (Convert.ToDecimal(Label30.Text) + Convert.ToDecimal(Label60.Text)).ToString();



    }
    private void ss()
    {
        if (Convert.ToInt32( month.SelectedValue) >= 4)
        {
            year.Text = (Convert.ToInt32(yer.SelectedValue) - 1).ToString();
        }
        else
        {
            year.Text = (Convert.ToInt32(yer.SelectedValue)-1).ToString();
        }
    }
    private void dt()
    {
        DateTime live = DateTime.Now;
        Int32 y = live.Year - 1;
        Int32 y2 = live.Year;
        Int32 i;
        for (i = y; i <= y + 2; i++)
        {
            yer.Items.Add(i.ToString());


            if (y2 == i)
            {
                yer.Items.FindByText(yer.SelectedItem.Text).Selected = false;
                yer.Items.FindByText(i.ToString()).Selected = true;
            }

        }
        Int32 m = live.Month+1;
        Int32 i2;
        for (i2 = 1; i2 <= month.Items.Count; i2++)
        {


            if (m == i2)
            {
                month.Items.FindByValue(month.SelectedValue).Selected = false;
                month.Items.FindByValue(i2.ToString()).Selected = true;
            }

        }
   

    }

    protected void yer_SelectedIndexChanged(object sender, EventArgs e)
    {

        ss();
        bind();
    }
    protected void month_SelectedIndexChanged(object sender, EventArgs e)
    {
        ss();
        bind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        bind();
    }
}
