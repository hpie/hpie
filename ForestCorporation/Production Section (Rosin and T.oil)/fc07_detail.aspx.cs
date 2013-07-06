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

public partial class fc07 : System.Web.UI.Page
{
    Int32 count;
    decimal twt = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            dt();
          

            bind();
            bind5();
        }
    }
    private void bind5()
    {
        Label29.Text = "0";
        Label30.Text = "0";
        Label31.Text = "0";
        Label32.Text = "0";
        Label33.Text = "0";
        Label34.Text = "0";
        Label35.Text = "0";
       // Label36.Text = "0";
        Label37.Text = "0";
       // Label38.Text = "0";
        Label39.Text = "0";
        Label40.Text = "0";
        Label41.Text = "0";
        Label42.Text = "0";
        Label43.Text = "0";
        Label44.Text = "0";
        Label45.Text = "0";
        Label46.Text = "0";
        Label47.Text = "0";
        decimal x3 = 0, ww3 = 0, wg3 = 0, n3 = 0, m3 = 0, k3 = 0, h3 = 0, d3 = 0, b3 = 0;
        decimal x4 = 0, ww4 = 0, wg4 = 0, n4 = 0, m4 = 0, k4 = 0, h4 = 0, d4 = 0, b4 = 0;
        //DateTime sdate = Convert.ToDateTime(month.SelectedValue.ToString() + "/01/" + yer.SelectedValue.ToString());
        //Int32 day = DateTime.DaysInMonth(Convert.ToInt32(yer.SelectedValue), sdate.Month);
        //DateTime edate = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + day + "/" + yer.SelectedValue.ToString());
        Int32 j1;
        string live = Request.QueryString["dt"].ToString();
        DateTime sdate = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
        SqlDataAdapter adp = new SqlDataAdapter("select * from fc05 where date='" + sdate + "';select * from fc08 where dt='" + sdate + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        decimal resin = 0,tur=0;
        for (j1 = 0; j1 < ds.Tables[0].Rows.Count; j1++)
        {
            resin = resin + Convert.ToDecimal(ds.Tables[0].Rows[j1]["netsakki"]);
            
        }
        Label29.Text = resin.ToString();

 Int32 j;
 decimal sakki23=0, sakki24=0;
 string sakki25 = "0";
 for (j = 0; j < ds.Tables[1].Rows.Count; j++)
 {
     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "X")
     {

         x3 = x3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         x3 = Math.Round(x3, 0);
         x4 = x4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (x4 == 100)
         {
             x4 = 0;
             x3 = x3 + 1;
         }
         else
         {
             if (x4.ToString().Length == 1)
             {
                 x3 = Convert.ToDecimal(Convert.ToString(x3) + ".0" + x4.ToString());
             }
             else
             {
                 x3 = Convert.ToDecimal(Convert.ToString(x3) + "." + x4.ToString());
             }


         }
     }
     Label39.Text = x3.ToString();


     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "WW")
     {

         ww3 = ww3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         ww3 = Math.Round(ww3, 0);
         ww4 = ww4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (ww4 == 100)
         {
             ww4 = 0;
             ww3 = ww3 + 1;
         }
         else
         {
             if (ww4.ToString().Length == 1)
             {
                 ww3 = Convert.ToDecimal(Convert.ToString(ww3) + ".0" + ww4.ToString());
             }
             else
             {
                 ww3 = Convert.ToDecimal(Convert.ToString(ww3) + "." + ww4.ToString());
             }


         }
     }
     Label40.Text = ww3.ToString();


     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "WG")
     {

         wg3 = wg3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         wg3 = Math.Round(wg3, 0);
         wg4 = wg4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (wg4 == 100)
         {
             ww4 = 0;
             ww3 = ww3 + 1;
         }
         else
         {
             if (ww4.ToString().Length == 1)
             {
                 wg3 = Convert.ToDecimal(Convert.ToString(wg3) + ".0" + wg4.ToString());
             }
             else
             {
                 wg3 = Convert.ToDecimal(Convert.ToString(wg3) + "." + wg4.ToString());
             }


         }
     }
     Label41.Text = wg3.ToString();

     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "N")
     {

         n3 = n3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         n3 = Math.Round(n3, 0);
         n4 = n4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (n4 == 100)
         {
             n4 = 0;
             n3 = n3 + 1;
         }
         else
         {
             if (n4.ToString().Length == 1)
             {
                 n3 = Convert.ToDecimal(Convert.ToString(n3) + ".0" + n4.ToString());
             }
             else
             {
                 n3 = Convert.ToDecimal(Convert.ToString(n3) + "." + n4.ToString());
             }


         }
     }
     Label42.Text = n3.ToString();

     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "M")
     {

         m3 = m3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         m3 = Math.Round(m3, 0);
         m4 = m4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (m4 == 100)
         {
             m4 = 0;
             m3 = m3 + 1;
         }
         else
         {
             if (m4.ToString().Length == 1)
             {
                 m3 = Convert.ToDecimal(Convert.ToString(m3) + ".0" + m4.ToString());
             }
             else
             {
                 m3 = Convert.ToDecimal(Convert.ToString(m3) + "." + m4.ToString());
             }


         }
     }
     Label43.Text = m3.ToString();

     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "K")
     {

         k3 = k3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         k3 = Math.Round(k3, 0);
         k4 = k4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (k4 == 100)
         {
             k4 = 0;
             k3 = k3 + 1;
         }
         else
         {
             if (k4.ToString().Length == 1)
             {
                 k3 = Convert.ToDecimal(Convert.ToString(k3) + ".0" + k4.ToString());
             }
             else
             {
                 k3 = Convert.ToDecimal(Convert.ToString(k3) + "." + k4.ToString());
             }


         }
     }
     Label44.Text = k3.ToString();


     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "H")
     {

         h3 = h3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         h3 = Math.Round(h3, 0);
         h4 = h4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (h4 == 100)
         {
             h4 = 0;
             h3 = h3 + 1;
         }
         else
         {
             if (h4.ToString().Length == 1)
             {
                 h3 = Convert.ToDecimal(Convert.ToString(h3) + ".0" + h4.ToString());
             }
             else
             {
                 h3 = Convert.ToDecimal(Convert.ToString(h3) + "." + h4.ToString());
             }


         }
     }
     Label45.Text = h3.ToString();

     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "D")
     {

         d3 = d3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         d3 = Math.Round(d3, 0);
         d4 = d4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (d4 == 100)
         {
             d4 = 0;
             d3 = d3 + 1;
         }
         else
         {
             if (d4.ToString().Length == 1)
             {
                 d3 = Convert.ToDecimal(Convert.ToString(d3) + ".0" + d4.ToString());
             }
             else
             {
                 d3 = Convert.ToDecimal(Convert.ToString(d3) + "." + d4.ToString());
             }


         }
     }
     Label46.Text = d3.ToString();


     if (ds.Tables[1].Rows[j]["rosin_grade"].ToString() == "B")
     {

         b3 = b3 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_qtl"]);
         b3 = Math.Round(b3, 0);
         b4 = b4 + Convert.ToDecimal(ds.Tables[1].Rows[j]["weight_kgs"]);
         if (b4 == 100)
         {
             b4 = 0;
             b3 = b3 + 1;
         }
         else
         {
             if (b4.ToString().Length == 1)
             {
                 b3 = Convert.ToDecimal(Convert.ToString(b3) + ".0" + b4.ToString());
             }
             else
             {
                 b3 = Convert.ToDecimal(Convert.ToString(b3) + "." + b4.ToString());
             }


         }
     }
     Label47.Text = b3.ToString();

     sakki23 = sakki23 + Convert.ToDecimal(ds.Tables[1].Rows[j]["sakki_found_qlts"]);
     sakki23 = Math.Round(sakki23, 0);
     sakki24 = sakki24 + Convert.ToDecimal(ds.Tables[1].Rows[j]["sakki_found_kgs"]);
     tur = tur + Convert.ToDecimal(ds.Tables[1].Rows[j]["tur_20"]);
     sakki25 = sakki24.ToString();
     if (sakki24 == 100)
     {
         sakki24 = 0;
         sakki23 = sakki23 + 1;
     }
     else
     {
         if (sakki23.ToString().Length == 1)
         {
             sakki24 = Math.Round(sakki24, 0);
             sakki25 =Convert.ToString(sakki23) + ".0" +sakki24.ToString();
         }
         else
         {
             sakki24 = Math.Round(sakki24, 0);
             sakki25 = Convert.ToString(sakki23) +"."+  sakki24.ToString();
         }


     }
 }
 Label30.Text = sakki25.ToString();

 Label31.Text = (Convert.ToDecimal(Label29.Text) - Convert.ToDecimal(Label30.Text)).ToString();
 Label32.Text = tur.ToString();
 if (Label30.Text != "0".ToString())
 {
     Label33.Text = Math.Round((( twt/Convert.ToDecimal(Label31.Text)) * 100), 2).ToString();
     Label34.Text = Math.Round(((  Convert.ToDecimal(Label32.Text)/Convert.ToDecimal(Label31.Text)) * 100), 2).ToString();
     Label35.Text = Math.Round(((  Convert.ToDecimal(Label29.Text)/Convert.ToDecimal(Label30.Text)) * 100), 2).ToString();
 }
 else
 {
     Label33.Text = "0".ToString();
     Label34.Text = "0".ToString();
      Label35.Text = "0".ToString();
 }

    
    }
    protected void yer_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
        bind5();
    }
    protected void month_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
        bind5();
    }
    private void bind()
    {
        ArrayList arr = new ArrayList();
        Int32 i;
        count++;
        DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + count.ToString() + "/" + yer.SelectedItem.Text);
        //  ((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");
        Int32 m, y;
        m = live.Month;
        y = live.Year;
        Int32 d = DateTime.DaysInMonth(y, m);
        for (i = 1; i <= d; i++)
        {

            arr.Add(i.ToString() + "/" + month.SelectedValue.ToString() + "/" + yer.SelectedItem.Text);

        }
        DateTime dd=Convert.ToDateTime(month.SelectedValue+"/01/2012");
        Label28.Text = dd.ToString("MMMM");
        GridView1.DataSource = arr;
        GridView1.DataBind();




    }
    public string dt(DateTime dt5)
    {
        return dt5.ToString("dd/MM/yyyy");
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
        Int32 m = live.Month;
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
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
        DateTime dt=  Convert.ToDateTime(DateTime.Parse(     ((LinkButton )(GridView1.Rows[e.NewEditIndex].FindControl("Label1"))).Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));

            //string live =((Label)(e.Row.FindControl("Label1"))).Text;
           // DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc07 where dt='" + dt + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox1"))).Text = ds.Tables[0].Rows[0][2].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox2"))).Text = ds.Tables[0].Rows[0][3].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox3"))).Text = ds.Tables[0].Rows[0][4].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox4"))).Text = ds.Tables[0].Rows[0][5].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox5"))).Text = ds.Tables[0].Rows[0][6].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox6"))).Text = ds.Tables[0].Rows[0][7].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox7"))).Text = ds.Tables[0].Rows[0][8].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox8"))).Text = ds.Tables[0].Rows[0][9].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox9"))).Text = ds.Tables[0].Rows[0][10].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox10"))).Text = ds.Tables[0].Rows[0][11].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox11"))).Text = ds.Tables[0].Rows[0][12].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox12"))).Text = ds.Tables[0].Rows[0][13].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox13"))).Text = ds.Tables[0].Rows[0][14].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox14"))).Text = ds.Tables[0].Rows[0][15].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox15"))).Text = ds.Tables[0].Rows[0][16].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox16"))).Text = ds.Tables[0].Rows[0][17].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox17"))).Text = ds.Tables[0].Rows[0][18].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox18"))).Text = ds.Tables[0].Rows[0][19].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox19"))).Text = ds.Tables[0].Rows[0][20].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox20"))).Text = ds.Tables[0].Rows[0][21].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox21"))).Text = ds.Tables[0].Rows[0][22].ToString();
                ((Label)(GridView1.Rows[e.NewEditIndex].FindControl("Label1"))).Text = dt.ToString("dd/MM/yyyy");
                //((Label)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox23"))).Text = (Convert.ToDecimal(ds.Tables[0].Rows[0][6]) + Convert.ToDecimal(ds.Tables[0].Rows[0][8]) + Convert.ToDecimal(ds.Tables[0].Rows[0][10]) + Convert.ToDecimal(ds.Tables[0].Rows[0][12]) + Convert.ToDecimal(ds.Tables[0].Rows[0][14]) + Convert.ToDecimal(ds.Tables[0].Rows[0][16]) + Convert.ToDecimal(ds.Tables[0].Rows[0][18]) + Convert.ToDecimal(ds.Tables[0].Rows[0][20]) + Convert.ToDecimal(ds.Tables[0].Rows[0][22])).ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox24"))).Text = ds.Tables[0].Rows[0][25].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox25"))).Text = ds.Tables[0].Rows[0][26].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox26"))).Text = ds.Tables[0].Rows[0][27].ToString();
            }
    }
    protected void GridView1_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {
        GridView1.EditIndex = -1;
        bind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState==DataControlRowState.Alternate)
        {
            
            //DateTime live9 = DateTime.Parse(live8.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            ((Label)(e.Row.FindControl("Label25"))).Text = 0.ToString();
  
            decimal x = 0, ww = 0, wg = 0, n = 0, m = 0, k = 0, h = 0, d = 0, b = 0;
             decimal x1 = 0, ww1 = 0, wg1 = 0, n1 = 0, m1 = 0, k1 = 0, h1 = 0, d1 = 0, b1 = 0;
                 decimal x2 = 0, ww2 = 0, wg2 = 0, n2 = 0, m2 = 0, k2 = 0, h2 = 0, d2 = 0, b2 = 0;
                
               
            string live = ((LinkButton )(e.Row.FindControl("Label1"))).Text;
            string live8 = Request.QueryString["dt"].ToString();
            if (live == live8)
            {
                e.Row.Visible = true;
                DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
                SqlDataAdapter adp = new SqlDataAdapter("select * from fc08 where dt='" + live1 + "';select * from fc05 where date='" + live1 + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
                DataSet ds = new DataSet();
                adp.Fill(ds);
                decimal tin = 0, drum = 0, wt = 0;
                if (ds.Tables[1].Rows.Count != 0)
                {
                    Int32 j;
                    for (j = 0; j < ds.Tables[1].Rows.Count; j++)
                    {
                        if (ds.Tables[1].Rows[j]["stype"].ToString() == "Tins")
                        {
                            tin = tin + Convert.ToDecimal(ds.Tables[1].Rows[j]["notin"]);
                        }
                        else
                        {
                            drum = drum + Convert.ToDecimal(ds.Tables[1].Rows[j]["notin"]);
                        }
                        wt = wt + Convert.ToDecimal(ds.Tables[1].Rows[j]["netsakki"]);
                    }

                }



                if (ds.Tables[0].Rows.Count != 0)
                {
                    Int32 j;
                    for (j = 0; j < ds.Tables[0].Rows.Count; j++)
                    {
                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "X")
                        {
                            x = x + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            x1 = x1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            x1 = Math.Round(x1, 0);
                            x2 = x2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (x2 == 100)
                            {
                                x2 = 0;
                                x1 = x1 + 1;
                            }
                            else
                            {
                                if (x2.ToString().Length == 1)
                                {
                                    x1 = Convert.ToDecimal(Convert.ToString(x1) + ".0" + x2.ToString());
                                }
                                else
                                {
                                    x1 = Convert.ToDecimal(Convert.ToString(x1) + "." + x2.ToString());
                                }


                            }

                        }

                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "WW")
                        {
                            ww = ww + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            ww1 = ww1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            ww1 = Math.Round(ww1, 0);
                            ww2 = ww2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (ww2 == 100)
                            {
                                ww2 = 0;
                                ww1 = ww1 + 1;
                            }
                            else
                            {
                                if (ww2.ToString().Length == 1)
                                {
                                    ww1 = Convert.ToDecimal(Convert.ToString(ww1) + ".0" + ww2.ToString());
                                }
                                else
                                {
                                    ww1 = Convert.ToDecimal(Convert.ToString(ww1) + "." + ww2.ToString());
                                }


                            }

                        }
                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "WG")
                        {
                            wg = wg + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            wg1 = wg1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            wg1 = Math.Round(wg1, 0);
                            wg2 = wg2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (wg2 == 100)
                            {
                                wg2 = 0;
                                wg1 = wg1 + 1;
                            }
                            else
                            {
                                if (wg2.ToString().Length == 1)
                                {
                                    wg1 = Convert.ToDecimal(Convert.ToString(wg1) + ".0" + wg2.ToString());
                                }
                                else
                                {
                                    wg1 = Convert.ToDecimal(Convert.ToString(wg1) + "." + wg2.ToString());
                                }


                            }

                        }

                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "N")
                        {
                            n = n + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            n1 = n1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            n1 = Math.Round(n1, 0);
                            n2 = n2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (n2 == 100)
                            {
                                n2 = 0;
                                n1 = n1 + 1;
                            }
                            else
                            {
                                if (n2.ToString().Length == 1)
                                {
                                    n1 = Convert.ToDecimal(Convert.ToString(n1) + ".0" + n2.ToString());
                                }
                                else
                                {
                                    n1 = Convert.ToDecimal(Convert.ToString(n1) + "." + n2.ToString());
                                }


                            }

                        }
                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "M")
                        {
                            m = m + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            m1 = m1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            m1 = Math.Round(m1, 0);
                            m2 = m2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (m2 == 100)
                            {
                                m2 = 0;
                                m1 = m1 + 1;
                            }
                            else
                            {
                                if (m2.ToString().Length == 1)
                                {
                                    m1 = Convert.ToDecimal(Convert.ToString(m1) + ".0" + m2.ToString());
                                }
                                else
                                {
                                    m1 = Convert.ToDecimal(Convert.ToString(m1) + "." + m2.ToString());
                                }


                            }

                        }
                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "K")
                        {
                            k = k + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            k1 = k1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            k1 = Math.Round(k1, 0);
                            k2 = k2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (k2 == 100)
                            {
                                k2 = 0;
                                k1 = k1 + 1;
                            }
                            else
                            {
                                if (k2.ToString().Length == 1)
                                {
                                    k1 = Convert.ToDecimal(Convert.ToString(k1) + ".0" + m2.ToString());
                                }
                                else
                                {
                                    k1 = Convert.ToDecimal(Convert.ToString(k1) + "." + k2.ToString());
                                }


                            }

                        }

                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "H")
                        {
                            h = h + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            h1 = h1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            h1 = Math.Round(h1, 0);
                            h2 = h2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (h2 == 100)
                            {
                                h2 = 0;
                                h1 = h1 + 1;
                            }
                            else
                            {
                                if (h2.ToString().Length == 1)
                                {
                                    h1 = Convert.ToDecimal(Convert.ToString(h1) + ".0" + h2.ToString());
                                }
                                else
                                {
                                    h1 = Convert.ToDecimal(Convert.ToString(h1) + "." + h2.ToString());
                                }


                            }

                        }

                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "D")
                        {
                            d = d + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            d1 = d1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            d1 = Math.Round(d1, 0);
                            d2 = d2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (d2 == 100)
                            {
                                d2 = 0;
                                d1 = d1 + 1;
                            }
                            else
                            {
                                if (d2.ToString().Length == 1)
                                {
                                    d1 = Convert.ToDecimal(Convert.ToString(d1) + ".0" + d2.ToString());
                                }
                                else
                                {
                                    d1 = Convert.ToDecimal(Convert.ToString(d1) + "." + d2.ToString());
                                }


                            }

                        }


                        if (ds.Tables[0].Rows[j]["rosin_grade"].ToString() == "B")
                        {
                            b = b + Convert.ToDecimal(ds.Tables[0].Rows[j]["rosin_pro_18_1"]);

                            b1 = b1 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_qtl"]);
                            b1 = Math.Round(b1, 0);
                            b2 = b2 + Convert.ToDecimal(ds.Tables[0].Rows[j]["weight_kgs"]);
                            if (b2 == 100)
                            {
                                b2 = 0;
                                b1 = b1 + 1;
                            }
                            else
                            {
                                if (b2.ToString().Length == 1)
                                {
                                    b1 = Convert.ToDecimal(Convert.ToString(b1) + ".0" + b2.ToString());
                                }
                                else
                                {
                                    b1 = Convert.ToDecimal(Convert.ToString(b1) + "." + b2.ToString());
                                }


                            }

                        }

                        ((Label)(e.Row.FindControl("Label25"))).Text = (Convert.ToDecimal(((Label)(e.Row.FindControl("Label25"))).Text) + Convert.ToDecimal(ds.Tables[0].Rows[j]["tur_20"].ToString())).ToString();
                    }
                    ((Label)(e.Row.FindControl("Label2"))).Text = tin.ToString();
                    ((Label)(e.Row.FindControl("Label3"))).Text = drum.ToString();
                    ((Label)(e.Row.FindControl("Label4"))).Text = wt.ToString();
                    ((Label)(e.Row.FindControl("Label5"))).Text = x.ToString();
                    ((Label)(e.Row.FindControl("Label6"))).Text = x1.ToString();
                    ((Label)(e.Row.FindControl("Label7"))).Text = ww.ToString();
                    ((Label)(e.Row.FindControl("Label8"))).Text = ww1.ToString();
                    ((Label)(e.Row.FindControl("Label9"))).Text = wg.ToString();
                    ((Label)(e.Row.FindControl("Label10"))).Text = wg1.ToString();
                    ((Label)(e.Row.FindControl("Label11"))).Text = n.ToString();
                    ((Label)(e.Row.FindControl("Label12"))).Text = n1.ToString();
                    ((Label)(e.Row.FindControl("Label13"))).Text = m.ToString();
                    ((Label)(e.Row.FindControl("Label14"))).Text = m1.ToString();
                    ((Label)(e.Row.FindControl("Label15"))).Text = k.ToString();
                    ((Label)(e.Row.FindControl("Label16"))).Text = k1.ToString();
                    ((Label)(e.Row.FindControl("Label17"))).Text = h.ToString();
                    ((Label)(e.Row.FindControl("Label18"))).Text = h1.ToString();
                    ((Label)(e.Row.FindControl("Label19"))).Text = d.ToString();
                    ((Label)(e.Row.FindControl("Label20"))).Text = d1.ToString();
                    ((Label)(e.Row.FindControl("Label21"))).Text = b.ToString();
                    ((Label)(e.Row.FindControl("Label22"))).Text = b1.ToString();
                    ((Label)(e.Row.FindControl("Label23"))).Text = (Convert.ToDecimal(x) + Convert.ToDecimal(ww) + Convert.ToDecimal(wg) + Convert.ToDecimal(n) + Convert.ToDecimal(m) + Convert.ToDecimal(k) + Convert.ToDecimal(h) + Convert.ToDecimal(d) + Convert.ToDecimal(b)).ToString();
                    ((Label)(e.Row.FindControl("Label24"))).Text = (Convert.ToDecimal(x1) + Convert.ToDecimal(ww1) + Convert.ToDecimal(wg1) + Convert.ToDecimal(n1) + Convert.ToDecimal(m1) + Convert.ToDecimal(k1) + Convert.ToDecimal(h1) + Convert.ToDecimal(d1) + Convert.ToDecimal(b1)).ToString();
                    twt = twt + Convert.ToDecimal(((Label)(e.Row.FindControl("Label24"))).Text);
                    //((Label)(e.Row.FindControl("Label26"))).Text = tin.ToString();
                    // ((Label)(e.Row.FindControl("Label27"))).Text = wt.ToString();


                }
            }
            else
            {
                e.Row.Visible = false;
            }
           
        }
        if (e.Row.RowState == DataControlRowState.Edit  )
        {
            DateTime dt=  Convert.ToDateTime(DateTime.Parse(     ((Label)(e.Row.FindControl("Label1"))).Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));

            //string live =((Label)(e.Row.FindControl("Label1"))).Text;
           // DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc07 where dt='" + dt + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                //((TextBox)(e.Row.FindControl("TextBox1"))).Text = ds.Tables[0].Rows[0][2].ToString();
                //((TextBox)(e.Row.FindControl("TextBox2"))).Text = ds.Tables[0].Rows[0][3].ToString();
                //((TextBox)(e.Row.FindControl("TextBox3"))).Text = ds.Tables[0].Rows[0][4].ToString();
                //((TextBox)(e.Row.FindControl("TextBox4"))).Text = ds.Tables[0].Rows[0][5].ToString();
                //((TextBox)(e.Row.FindControl("TextBox5"))).Text = ds.Tables[0].Rows[0][6].ToString();
                //((TextBox)(e.Row.FindControl("TextBox6"))).Text = ds.Tables[0].Rows[0][7].ToString();
                //((TextBox)(e.Row.FindControl("TextBox7"))).Text = ds.Tables[0].Rows[0][8].ToString();
                //((TextBox)(e.Row.FindControl("TextBox8"))).Text = ds.Tables[0].Rows[0][9].ToString();
                //((TextBox)(e.Row.FindControl("TextBox9"))).Text = ds.Tables[0].Rows[0][10].ToString();
                //((TextBox)(e.Row.FindControl("TextBox10"))).Text = ds.Tables[0].Rows[0][11].ToString();
                //((TextBox)(e.Row.FindControl("TextBox11"))).Text = ds.Tables[0].Rows[0][12].ToString();
                //((TextBox)(e.Row.FindControl("TextBox12"))).Text = ds.Tables[0].Rows[0][13].ToString();
                //((TextBox)(e.Row.FindControl("TextBox13"))).Text = ds.Tables[0].Rows[0][14].ToString();
                //((TextBox)(e.Row.FindControl("TextBox14"))).Text = ds.Tables[0].Rows[0][15].ToString();
                //((TextBox)(e.Row.FindControl("TextBox15"))).Text = ds.Tables[0].Rows[0][16].ToString();
                //((TextBox)(e.Row.FindControl("TextBox16"))).Text = ds.Tables[0].Rows[0][17].ToString();
                //((TextBox)(e.Row.FindControl("TextBox17"))).Text = ds.Tables[0].Rows[0][18].ToString();
                //((TextBox)(e.Row.FindControl("TextBox18"))).Text = ds.Tables[0].Rows[0][19].ToString();
                //((TextBox)(e.Row.FindControl("TextBox19"))).Text = ds.Tables[0].Rows[0][20].ToString();
                //((TextBox)(e.Row.FindControl("TextBox20"))).Text = ds.Tables[0].Rows[0][21].ToString();
                //((TextBox)(e.Row.FindControl("TextBox21"))).Text = ds.Tables[0].Rows[0][22].ToString();
                //((Label)(e.Row.FindControl("Label1"))).Text = dt.ToString("dd/MM/yyyy");
                ////((Label)(e.Row.FindControl("TextBox23"))).Text = (Convert.ToDecimal(ds.Tables[0].Rows[0][6]) + Convert.ToDecimal(ds.Tables[0].Rows[0][8]) + Convert.ToDecimal(ds.Tables[0].Rows[0][10]) + Convert.ToDecimal(ds.Tables[0].Rows[0][12]) + Convert.ToDecimal(ds.Tables[0].Rows[0][14]) + Convert.ToDecimal(ds.Tables[0].Rows[0][16]) + Convert.ToDecimal(ds.Tables[0].Rows[0][18]) + Convert.ToDecimal(ds.Tables[0].Rows[0][20]) + Convert.ToDecimal(ds.Tables[0].Rows[0][22])).ToString();
                //((TextBox)(e.Row.FindControl("TextBox24"))).Text = ds.Tables[0].Rows[0][25].ToString();
                //((TextBox)(e.Row.FindControl("TextBox25"))).Text = ds.Tables[0].Rows[0][26].ToString();
                //((TextBox)(e.Row.FindControl("TextBox26"))).Text = ds.Tables[0].Rows[0][27].ToString();



            }
            else
            {
                //((TextBox)(e.Row.FindControl("TextBox1"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox2"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox3"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox4"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox5"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox6"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox7"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox8"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox9"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox10"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox11"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox12"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox13"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox14"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox15"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox16"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox17"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox18"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox19"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox20"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox21"))).Text = 0.ToString();
                ////((Label)(e.Row.FindControl("TextBox22"))).Text = (Convert.ToDecimal(ds.Tables[0].Rows[0][5]) + Convert.ToDecimal(ds.Tables[0].Rows[0][7]) + Convert.ToDecimal(ds.Tables[0].Rows[0][9]) + Convert.ToDecimal(ds.Tables[0].Rows[0][11]) + Convert.ToDecimal(ds.Tables[0].Rows[0][13]) + Convert.ToDecimal(ds.Tables[0].Rows[0][15]) + Convert.ToDecimal(ds.Tables[0].Rows[0][17]) + Convert.ToDecimal(ds.Tables[0].Rows[0][19]) + Convert.ToDecimal(ds.Tables[0].Rows[0][21])).ToString();
                ////((Label)(e.Row.FindControl("TextBox23"))).Text = (Convert.ToDecimal(ds.Tables[0].Rows[0][6]) + Convert.ToDecimal(ds.Tables[0].Rows[0][8]) + Convert.ToDecimal(ds.Tables[0].Rows[0][10]) + Convert.ToDecimal(ds.Tables[0].Rows[0][12]) + Convert.ToDecimal(ds.Tables[0].Rows[0][14]) + Convert.ToDecimal(ds.Tables[0].Rows[0][16]) + Convert.ToDecimal(ds.Tables[0].Rows[0][18]) + Convert.ToDecimal(ds.Tables[0].Rows[0][20]) + Convert.ToDecimal(ds.Tables[0].Rows[0][22])).ToString();
                //((TextBox)(e.Row.FindControl("TextBox24"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox25"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox26"))).Text = 0.ToString();
            }
          
                     
        }
        if (e.Row.RowType == DataControlRowType.Header)
        {
            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            GridViewRow row3 = new GridViewRow(4, 4, DataControlRowType.Header, DataControlRowState.Normal);
            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            Table t = (Table)GridView1.Controls[0];
            if (gv.HasControls())
            {

                



              


                row.HorizontalAlign = HorizontalAlign.Center;
               
                row1.HorizontalAlign = HorizontalAlign.Center;
                TableCell FileDate1 = new TableHeaderCell();
                FileDate1.Text = "Date";
                FileDate1.HorizontalAlign = HorizontalAlign.Center;
                row1.Cells.Add(FileDate1);
                TableCell FileDate2 = new TableHeaderCell();
                FileDate2.Text = "Tins";
                FileDate2.HorizontalAlign = HorizontalAlign.Center;
                row1.Cells.Add(FileDate2);
                TableCell FileDate3 = new TableHeaderCell();
                FileDate3.Text = "Drums";
                FileDate3.HorizontalAlign = HorizontalAlign.Center;
                row1.Cells.Add(FileDate3);

                TableCell FileDate4 = new TableHeaderCell();
                FileDate4.Text = "Net Wt with Sakki";
                row1.Cells.Add(FileDate4);

                TableCell FileDate5 = new TableHeaderCell();
                FileDate5.Text = "X";
                FileDate5.ColumnSpan = 2;
           
                row3.HorizontalAlign = HorizontalAlign.Center;
                TableCell FileDate51 = new TableHeaderCell();
                FileDate51.Text = "";               
                FileDate51.ColumnSpan = 4;
                 row3.Cells.Add(FileDate51);

                TableCell FileDate52 = new TableHeaderCell();
                FileDate52.Text = "TPB";
                row3.Cells.Add(FileDate52);

                TableCell FileDate53 = new TableHeaderCell();
                FileDate53.Text = "wt.";
                row3.Cells.Add(FileDate53);

                TableCell FileDate54 = new TableHeaderCell();
                FileDate54.Text = "TPB";
                row3.Cells.Add(FileDate54);

                TableCell FileDate55 = new TableHeaderCell();
                FileDate55.Text = "wt.";
                row3.Cells.Add(FileDate55);

                TableCell FileDate56 = new TableHeaderCell();
                FileDate56.Text = "TPB";
                row3.Cells.Add(FileDate56);
                TableCell FileDate57 = new TableHeaderCell();
                FileDate57.Text = "wt.";
                row3.Cells.Add(FileDate57);
                TableCell FileDate58 = new TableHeaderCell();
                FileDate58.Text = "TPB";
                row3.Cells.Add(FileDate58);
                TableCell FileDate59 = new TableHeaderCell();
                FileDate59.Text = "wt.";
                row3.Cells.Add(FileDate59);
                TableCell FileDate60 = new TableHeaderCell();
                FileDate60.Text = "TPB";
                row3.Cells.Add(FileDate60);
                TableCell FileDate61 = new TableHeaderCell();
                FileDate61.Text = "wt.";
                row3.Cells.Add(FileDate61);
                TableCell FileDate62 = new TableHeaderCell();
                FileDate62.Text = "TPB";
                row3.Cells.Add(FileDate62);
                TableCell FileDate63 = new TableHeaderCell();
                FileDate63.Text = "wt.";
                row3.Cells.Add(FileDate63);
                TableCell FileDate64 = new TableHeaderCell();
                FileDate64.Text = "TPB";
                row3.Cells.Add(FileDate64);
                TableCell FileDate65 = new TableHeaderCell();
                FileDate65.Text = "wt.";
                row3.Cells.Add(FileDate65);

                TableCell FileDate66 = new TableHeaderCell();
                FileDate66.Text = "TPB";
                row3.Cells.Add(FileDate66);
                TableCell FileDate67 = new TableHeaderCell();
                FileDate67.Text = "wt.";
                row3.Cells.Add(FileDate67);

                TableCell FileDate68 = new TableHeaderCell();
                FileDate68.Text = "TPB";
                row3.Cells.Add(FileDate68);
                TableCell FileDate69 = new TableHeaderCell();
                FileDate69.Text = "wt.";
                row3.Cells.Add(FileDate69);

                TableCell FileDate70 = new TableHeaderCell();
                FileDate70.Text = "TPB";
                row3.Cells.Add(FileDate70);
                TableCell FileDate71 = new TableHeaderCell();
                FileDate71.Text = "wt.";
                row3.Cells.Add(FileDate71);

                TableCell FileDate72 = new TableHeaderCell();
                FileDate72.Text = "";
                FileDate72.ColumnSpan = 4;
                row3.Cells.Add(FileDate72);

              
            
                row1.Cells.Add(FileDate5);




                TableCell FileDate6 = new TableHeaderCell();
                FileDate6.Text = "WW";
                FileDate6.ColumnSpan = 2;
                row1.Cells.Add(FileDate6);

                TableCell FileDate7 = new TableHeaderCell();
                FileDate7.Text = "WG";
                FileDate7.ColumnSpan = 2;
                row1.Cells.Add(FileDate7);

                TableCell FileDate8 = new TableHeaderCell();
                FileDate8.Text = "N";
                FileDate8.ColumnSpan = 2;
                row1.Cells.Add(FileDate8);

                TableCell FileDate9 = new TableHeaderCell();
                FileDate9.Text = "M";
                FileDate9.ColumnSpan = 2;
                row1.Cells.Add(FileDate9);

                TableCell FileDate10 = new TableHeaderCell();
                FileDate10.Text = "K";
                FileDate10.ColumnSpan = 2;
                row1.Cells.Add(FileDate10);


                TableCell FileDate11 = new TableHeaderCell();
                FileDate11.Text = "H";
                FileDate11.ColumnSpan = 2;
                row1.Cells.Add(FileDate11);


                TableCell FileDate12 = new TableHeaderCell();
                FileDate12.Text = "D";
                FileDate12.ColumnSpan = 2;
                row1.Cells.Add(FileDate12);

                TableCell FileDate13 = new TableHeaderCell();
                FileDate13.Text = "B";
                FileDate13.ColumnSpan = 2;
                row1.Cells.Add(FileDate13);

                TableCell FileDate14 = new TableHeaderCell();
                FileDate14.Text = "Total";
                FileDate14.ColumnSpan = 2;
                row1.Cells.Add(FileDate14);

                TableCell FileDate15 = new TableHeaderCell();
                FileDate15.Text = "T.Oil";
             
                row1.Cells.Add(FileDate15);

                TableCell FileDate16 = new TableHeaderCell();
                FileDate16.Text = "Sign of production foreman";

                row1.Cells.Add(FileDate16);

                TableCell FileDate17 = new TableHeaderCell();
                FileDate17.Text = "Sign of factory manager";

                row1.Cells.Add(FileDate17);

                TableCell FileDate17a = new TableHeaderCell();
                FileDate17a.Text = "";

                row1.Cells.Add(FileDate17a);



                // Adding Cells
                TableCell FileDate = new TableHeaderCell();
                FileDate.Text = "Resin receipts for production";
                FileDate.ColumnSpan = 3;
                row.Cells.Add(FileDate);

                TableCell cell = new TableHeaderCell();
                cell.ColumnSpan = 25; // ********
                cell.Text = "Production figures Rosin For the month of";
                row.Cells.Add(cell);
               

             


               
                //}

            }
            //t.Rows.AddAt(0, row3);
            //t.Rows.AddAt(0, row1);
            //t.Rows.AddAt(0, row);
            //((Table)GridView1.Controls[0]).Rows.AddAt(1, row);
            //((Table)GridView1.Controls[0]).Rows.AddAt(1, row1);
            //((Table)GridView1.Controls[0]).Rows.AddAt(1, row3);
        }
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        DateTime live =Convert.ToDateTime( DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            //DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc07 where dt='" + live + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count == 0)
            {



                SqlDataSource1.InsertParameters["dt"].DefaultValue = DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.InsertParameters["tin"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text.ToString();
                SqlDataSource1.InsertParameters["drum"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text.ToString();
                SqlDataSource1.InsertParameters["net_wt_ski"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text.ToString();
                SqlDataSource1.InsertParameters["x_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text.ToString();
                SqlDataSource1.InsertParameters["x_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text.ToString();
                SqlDataSource1.InsertParameters["ww_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text.ToString();
                SqlDataSource1.InsertParameters["ww_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text.ToString();
                SqlDataSource1.InsertParameters["wg_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox8"))).Text.ToString();
                SqlDataSource1.InsertParameters["wg_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text.ToString();
                SqlDataSource1.InsertParameters["n_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text.ToString();
                SqlDataSource1.InsertParameters["n_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox11"))).Text.ToString();
                SqlDataSource1.InsertParameters["m_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text.ToString();
                SqlDataSource1.InsertParameters["m_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox13"))).Text.ToString();
                SqlDataSource1.InsertParameters["k_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox14"))).Text.ToString();
                SqlDataSource1.InsertParameters["k_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox15"))).Text.ToString();
                SqlDataSource1.InsertParameters["h_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox16"))).Text.ToString();
                SqlDataSource1.InsertParameters["h_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox17"))).Text.ToString();
                SqlDataSource1.InsertParameters["d_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox18"))).Text.ToString();
                SqlDataSource1.InsertParameters["d_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox19"))).Text.ToString();
                SqlDataSource1.InsertParameters["b_tpb1"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox20"))).Text.ToString();
                SqlDataSource1.InsertParameters["b_wt1"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox21"))).Text.ToString();
                //SqlDataSource1.InsertParameters["tot_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox22"))).Text.ToString(); 
                //SqlDataSource1.InsertParameters["tot_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox23"))).Text.ToString(); 
                SqlDataSource1.InsertParameters["t_oil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox24"))).Text.ToString();
                SqlDataSource1.InsertParameters["sign_pro_for"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox25"))).Text.ToString();
                SqlDataSource1.InsertParameters["sign_fac_man"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox26"))).Text.ToString();
                SqlDataSource1.Insert();
                GridView1.EditIndex = -1;
                bind();
                //GridView1.DataBind();
            }
            else
            {
                SqlDataSource1.UpdateParameters["dt"].DefaultValue = DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.UpdateParameters["tin"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text.ToString();
                SqlDataSource1.UpdateParameters["drum"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text.ToString();
                SqlDataSource1.UpdateParameters["net_wt_ski"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text.ToString();
                SqlDataSource1.UpdateParameters["x_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text.ToString();
                SqlDataSource1.UpdateParameters["x_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text.ToString();
                SqlDataSource1.UpdateParameters["ww_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text.ToString();
                SqlDataSource1.UpdateParameters["ww_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text.ToString();
                SqlDataSource1.UpdateParameters["wg_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox8"))).Text.ToString();
                SqlDataSource1.UpdateParameters["wg_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text.ToString();
                SqlDataSource1.UpdateParameters["n_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text.ToString();
                SqlDataSource1.UpdateParameters["n_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox11"))).Text.ToString();
                SqlDataSource1.UpdateParameters["m_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text.ToString();
                SqlDataSource1.UpdateParameters["m_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox13"))).Text.ToString();
                SqlDataSource1.UpdateParameters["k_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox14"))).Text.ToString();
                SqlDataSource1.UpdateParameters["k_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox15"))).Text.ToString();
                SqlDataSource1.UpdateParameters["h_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox16"))).Text.ToString();
                SqlDataSource1.UpdateParameters["h_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox17"))).Text.ToString();
                SqlDataSource1.UpdateParameters["d_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox18"))).Text.ToString();
                SqlDataSource1.UpdateParameters["d_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox19"))).Text.ToString();
                SqlDataSource1.UpdateParameters["b_tpb1"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox20"))).Text.ToString();
                SqlDataSource1.UpdateParameters["b_wt1"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox21"))).Text.ToString();
                //SqlDataSource1.UpdateParameters["tot_tpb"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox22"))).Text.ToString(); 
                //SqlDataSource1.UpdateParameters["tot_wt"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox23"))).Text.ToString(); 
                SqlDataSource1.UpdateParameters["t_oil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox24"))).Text.ToString();
                SqlDataSource1.UpdateParameters["sign_pro_for"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox25"))).Text.ToString();
                SqlDataSource1.UpdateParameters["sign_fac_man"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox26"))).Text.ToString();
                SqlDataSource1.Update();
                GridView1.EditIndex = -1;
                bind();
                //GridView1.DataBind();

            }
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {

        if (e.Row.RowType == DataControlRowType.Header)
        {
            GridView gv = sender as GridView;
           
            
            
            
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];

            GridViewRow rows1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);


            TableCell hh = new TableHeaderCell();


            hh.ColumnSpan = 4;
           // hh.Text = "Date";

            rows1.Cells.Add(hh);



            t.Rows.AddAt(0, rows1);
           
            TableCell hh1 = new TableHeaderCell();


           // hh.ColumnSpan = 4;
             hh1.Text = "TPB";

            rows1.Cells.Add(hh1);



            t.Rows.AddAt(0, rows1);

            TableCell hh2 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2.Text = "Wt.";

            rows1.Cells.Add(hh2);



            t.Rows.AddAt(0, rows1);


            TableCell hh11 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh11.Text = "TPB";

            rows1.Cells.Add(hh11);



            t.Rows.AddAt(0, rows1);

            TableCell hh21 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh21.Text = "Wt.";

            rows1.Cells.Add(hh21);



            t.Rows.AddAt(0, rows1);
            TableCell hh212 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh212.Text = "TPB";

            rows1.Cells.Add(hh212);



            t.Rows.AddAt(0, rows1);

            TableCell hh22 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh22.Text = "Wt.";

            rows1.Cells.Add(hh22);



            t.Rows.AddAt(0, rows1);



            TableCell hh2121 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2121.Text = "TPB";

            rows1.Cells.Add(hh2121);



            t.Rows.AddAt(0, rows1);

            TableCell hh221 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh221.Text = "Wt.";

            rows1.Cells.Add(hh221);



            t.Rows.AddAt(0, rows1);

            TableCell hh2122 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2122.Text = "TPB";

            rows1.Cells.Add(hh2122);



            t.Rows.AddAt(0, rows1);

            TableCell hh222 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh222.Text = "Wt.";

            rows1.Cells.Add(hh222);



            t.Rows.AddAt(0, rows1);



            TableCell hh2123 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2123.Text = "TPB";

            rows1.Cells.Add(hh2123);



            t.Rows.AddAt(0, rows1);

            TableCell hh223 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh223.Text = "Wt.";

            rows1.Cells.Add(hh223);



            t.Rows.AddAt(0, rows1);

            TableCell hh2124 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2124.Text = "TPB";

            rows1.Cells.Add(hh2124);



            t.Rows.AddAt(0, rows1);

            TableCell hh224 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh224.Text = "Wt.";

            rows1.Cells.Add(hh224);



            t.Rows.AddAt(0, rows1);


            TableCell hh2125 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2125.Text = "TPB";

            rows1.Cells.Add(hh2125);



            t.Rows.AddAt(0, rows1);

            TableCell hh225 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh225.Text = "Wt.";

            rows1.Cells.Add(hh225);



            t.Rows.AddAt(0, rows1);


            TableCell hh2126 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2126.Text = "TPB";

            rows1.Cells.Add(hh2126);



            t.Rows.AddAt(0, rows1);

            TableCell hh226 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh226.Text = "Wt.";

            rows1.Cells.Add(hh226 );



            t.Rows.AddAt(0, rows1);


            TableCell hh2127 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh2127.Text = "TPB";

            rows1.Cells.Add(hh2127);



            t.Rows.AddAt(0, rows1);

            TableCell hh227 = new TableHeaderCell();


            // hh.ColumnSpan = 4;
            hh227.Text = "Wt.";

            rows1.Cells.Add(hh227);



            t.Rows.AddAt(0, rows1);

            GridViewRow rows = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);


            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Date";

            rows.Cells.Add(cell1);



            t.Rows.AddAt(0, rows);

            TableCell cell2 = new TableHeaderCell();



            cell2.Text = "Tins";

            rows.Cells.Add(cell2);



            t.Rows.AddAt(0, rows);

            TableCell cell3 = new TableHeaderCell();



            cell3.Text = "Drums";

            rows.Cells.Add(cell3);



            t.Rows.AddAt(0, rows);

            TableCell cell4 = new TableHeaderCell();



            cell4.Text = "Net Wt. with Sakki";

            rows.Cells.Add(cell4);



            t.Rows.AddAt(0, rows);

            TableCell cell6 = new TableHeaderCell();


            cell6.ColumnSpan = 2;
            cell6.Text = "X";

            rows.Cells.Add(cell6);
            


            t.Rows.AddAt(0, rows);

            TableCell cell7 = new TableHeaderCell();


            cell7.ColumnSpan = 2;
            cell7.Text = "WW";

            rows.Cells.Add(cell7);



            t.Rows.AddAt(0, rows);
            TableCell cell8 = new TableHeaderCell();

            cell8.ColumnSpan = 2;

            cell8.Text = "WG";

            rows.Cells.Add(cell8);



            t.Rows.AddAt(0, rows);
            TableCell cell9 = new TableHeaderCell();


            cell9.ColumnSpan = 2;
            cell9.Text = "N";

            rows.Cells.Add(cell9);



            t.Rows.AddAt(0, rows);
            TableCell cell10 = new TableHeaderCell();


            cell10.ColumnSpan = 2;
            cell10.Text = "M";

            rows.Cells.Add(cell10);



            t.Rows.AddAt(0, rows);
            TableCell cell11 = new TableHeaderCell();


            cell11.ColumnSpan = 2;
            cell11.Text = "K";

            rows.Cells.Add(cell11);



            t.Rows.AddAt(0, rows);
            TableCell cell12 = new TableHeaderCell();

            cell12.ColumnSpan = 2;

            cell12.Text = "H";

            rows.Cells.Add(cell12);



            t.Rows.AddAt(0, rows);


            TableCell cell13 = new TableHeaderCell();

            cell13.ColumnSpan = 2;

            cell13.Text = "D";

            rows.Cells.Add(cell13);



            t.Rows.AddAt(0, rows);
            TableCell cell14 = new TableHeaderCell();

            cell14.ColumnSpan = 2;

            cell14.Text = "B";

            rows.Cells.Add(cell14);



            t.Rows.AddAt(0, rows);
            TableCell cell15 = new TableHeaderCell();

            cell15.ColumnSpan = 2;

            cell15.Text = "TOTAL";

            rows.Cells.Add(cell15);



            t.Rows.AddAt(0, rows);


            TableCell cell151 = new TableHeaderCell();

            //cell151.ColumnSpan = 2;

            cell151.Text = "T.Oil";

            rows.Cells.Add(cell151);



            t.Rows.AddAt(0, rows);


            TableCell cell16 = new TableHeaderCell();

            //cell16.ColumnSpan = 2;

            cell16.Text = "Sign. of production";

            rows.Cells.Add(cell16);



            t.Rows.AddAt(0, rows);
            TableCell cell17 = new TableHeaderCell();

            //cell16.ColumnSpan = 2;

            cell17.Text = "Sign. of factory manager";

            rows.Cells.Add(cell17);



            t.Rows.AddAt(0, rows);
            // Adding Cells

            TableCell FileDate = new TableHeaderCell();
            FileDate.ColumnSpan = 4;
            FileDate.Text = "Resin receipts for production";

            row.Cells.Add(FileDate);



            TableCell cell = new TableHeaderCell();


            cell.ColumnSpan = 23;
            cell.Text = "Production figures Rosin For the month of";

            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);

           



        }
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        string dt=((LinkButton)(GridView1.Rows[GridView1.SelectedIndex].FindControl("Label1"))).Text;
        Response.Redirect("fc07_detail.aspx?dt=" + dt.ToString());
    }
}
