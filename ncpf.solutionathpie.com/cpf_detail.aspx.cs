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
public partial class cpf_detail : System.Web.UI.Page
{
     Int32 cc = 0;
    decimal t = 0, t1 = 0, t2 = 0, t3 = 0, t4 = 0, t5 = 0, t6 = 0;
    Int32 row_count=0;
    Int32 a1 = 0;
    decimal total = 0, total4 = 0, withd4 = 0, total41 = 0;
    decimal tot = 0, tot1 = 0, tot2 = 0,fw=0;
    decimal check = 2;
    DateTime ddate ;
    DateTime dd125;
   Int32 pob8=0;
    decimal gt=0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            DropDownList1.DataBind();
            Label1.Text = DropDownList1.SelectedValue.ToString();
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        string st1 = "SELECT  *from employee where ac=" + DropDownList1.SelectedValue;



        SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds1 = new DataSet();
        adp1.Fill(ds1);
        Label1.Text = ds1.Tables[0].Rows[0]["name"].ToString();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        //.DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        if (TextBox8.Text != "")
        {
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox8.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            SqlDataSource2.InsertParameters["date1"].DefaultValue = dt2.ToString();
        }
        else
        {
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            SqlDataSource2.InsertParameters["date1"].DefaultValue = dt2.ToString();
        }
        DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        
        SqlDataSource2.InsertParameters["date"].DefaultValue = dt1.ToString();
        SqlDataSource2.InsertParameters["ac"].DefaultValue = DropDownList1.SelectedItem.Text.ToString();
        SqlDataSource2.Insert();
        TextBox5.Text = "";
        TextBox7.Text = "";
        TextBox2.Text = "";
        Label2.Text = "Record Saved";

        //recalculate
        DateTime sdate = Convert.ToDateTime("04/01/" + TextBox1.Text.ToString().Substring(6, 4));
        triggerRecalculation(DropDownList1.SelectedItem.Text.ToString(), sdate);

       // Response.Redirect("cpf_detail.aspx");
    }
    protected void TextBox1_TextChanged(object sender, EventArgs e)
    {
       
    }
    protected void ListBox1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Button2.Enabled = true;
        Button3.Enabled = true;
        DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows[0]["date1"].ToString() != "")
        {
            TextBox8.Text = Convert.ToDateTime(dv.Table.Rows[0]["date1"]).ToString("dd/MM/yyyy");
        }
        if (dv.Table.Rows[0]["date"].ToString() != "")
        {
            TextBox1.Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("dd/MM/yyyy");
        }
        TextBox2.Text = dv.Table.Rows[0]["cpf_adv"].ToString();
        TextBox3.Text = dv.Table.Rows[0]["adjment"].ToString();
        TextBox7.Text = dv.Table.Rows[0]["cpf_withd"].ToString();

        


    }
    private void bind()
    {
        DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

        SqlDataSource2.SelectParameters["date"].DefaultValue = dt1.ToString();
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        ListBox1.DataSource = dv;
        ListBox1.DataBind();



        //recalculate
        DateTime sdate = Convert.ToDateTime("04/01/" + TextBox1.Text.ToString().Substring(6, 4));
        triggerRecalculation(DropDownList1.SelectedItem.Text.ToString(), sdate);

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        bind(); 
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        //DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        if (TextBox8.Text != "")
        {
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox8.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            SqlDataSource2.InsertParameters["date1"].DefaultValue = dt2.ToString();
        }
        DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        SqlDataSource2.UpdateParameters["date"].DefaultValue = dt1.ToString();
        SqlDataSource2.UpdateParameters["ac"].DefaultValue = DropDownList1.SelectedItem.Text.ToString();
        SqlDataSource2.Update();

        
        //recalculate
        DateTime sdate = Convert.ToDateTime("04/01/" + TextBox1.Text.ToString().Substring(6, 4));
        triggerRecalculation(DropDownList1.SelectedItem.Text.ToString(), sdate);

    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlDataSource2.Delete();
        TextBox1.Text = "";
        TextBox2.Text = "";
        TextBox3.Text = "";
        bind();
    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        Button1.Enabled = true;
        TextBox1.Text="";
        TextBox2.Text = "";
        TextBox3.Text = "";
    }
    private void shared()
    {
        // string session = DropDownList2.SelectedItem.Text;
        string ac = DropDownList1.SelectedValue;
        DateTime sdate = Convert.ToDateTime("04/01/2011");
        DateTime edate = Convert.ToDateTime("03/31/2012");
        string st = "select *from employee;select *from employee where session<='" + sdate + "' and ac=" + DropDownList1.SelectedValue;
        SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        decimal pob = 0, pinsob = 0, pshare = 0;
        if (ds.Tables[1].Rows.Count != 0)
        {
            for (Int16 i = 0; i < ds.Tables[1].Rows.Count; i++)
            {

                //pob = pob + ((odur + orec) + (ocpf - oadjment) + pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]));
               //if(ds.Tables[1].Rows[i]["shared_ob"].ToString()!="")
                //pob = pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["shared_ob"]);
               // if (ds.Tables[1].Rows[i]["Ins_ob"].ToString() != "")
                    //pinsob = pinsob + Convert.ToDecimal(ds.Tables[1].Rows[i]["Ins_ob"]);
                //if (ds.Tables[1].Rows[i]["Shared_ob"].ToString() != "")
                   // pshare = pshare + Convert.ToDecimal(ds.Tables[1].Rows[i]["Shared_ob"]);
                string kk = ds.Tables[1].Rows[i]["session"].ToString();
                if (kk == sdate.ToString())
                {
                    pob8 = 1;
                }
            }
            // pob = pob ;
        }

        pob = pob + pinsob;


        ArrayList ar4 = new ArrayList();

        string[] yr = TextBox1.Text.Split('/');
        Int32 kk1 = Convert.ToInt32(yr[2]);
        DateTime chdate = Convert.ToDateTime(yr[1] + "/" + yr[0] + "/" + yr[2]);
        if (Convert.ToInt32(yr[1]) >= 4)
        {
            kk1 = Convert.ToInt32(yr[2]) + 2;
        }
        else
        {
            kk1 = Convert.ToInt32(yr[2]) + 1;
        }

        for (Int32 y = 2011; y < kk1; y++)
        {
            ar4.Add(y.ToString() + "-" + Convert.ToInt32(y + 1));
        }
        //ar4.Add("2010-2011");

        // ar4.Add("2011-2012");
        //ar4.Add("2012-2013");
        //ar4.Add("2013-2014");
        //ar4.Add("2014-2015");
        decimal gtotal = 0;
        Int32 c1 = 1;
        decimal ppob1 = 1;
        for (Int32 ja = 0; ja < ar4.Count; ja++)
        {

            string tt = "";

            decimal arear = 0;
            decimal total8 = 0;
            total4 = 0;
            //if (ds1.Tables[3].Rows.Count != 0)
            //{
            if (ppob1 == 1)
            {
                ppob1 = pob;
                c1 = 0;
            }
            else
            {
                ppob1 = gtotal;
                c1 = 1;
            }
            withd4 = 0;
            for (Int16 a2 = 1; a2 <= 12; a2++)
            {

                //Int32 yyd = Convert.ToInt32(DropDownList2.SelectedItem.Text.Substring(0, 4));


                //string sessiond = DropDownList2.SelectedItem.Text;

                Int32 yyd = Convert.ToInt32(ar4[ja].ToString().Substring(0, 4));


                string sessiond = ar4[ja].ToString();
                DateTime sdated = Convert.ToDateTime("04/01/" + sessiond.Substring(0, 4));
                DateTime edated = Convert.ToDateTime("03/31/" + sessiond.Substring(5, 4));

                string acd = DropDownList1.SelectedValue.ToString();
                string monthdd = a2.ToString();
                DateTime dd14d;
                DateTime dd15d;
                if (monthdd == "1" || monthdd == "2" || monthdd == "3")
                {
                    dd14d = Convert.ToDateTime(monthdd + "/01/" + (yyd + 1));
                    Int32 dayd = DateTime.DaysInMonth(dd14d.Year, dd14d.Month);
                    dd15d = Convert.ToDateTime(monthdd + "/" + dayd + "/" + (yyd + 1));
                }
                else
                {
                    dd14d = Convert.ToDateTime(monthdd + "/01/" + yyd);
                    Int32 dayd = DateTime.DaysInMonth(dd14d.Year, dd14d.Month);
                    dd15d = Convert.ToDateTime(monthdd + "/" + dayd + "/" + (yyd));
                }




                Int32 yy5 = sdated.Year - 1;
                //   string mm5 = ((Label)(e.Row.FindControl("label1"))).Text;

                Int32 a31 = a2 + 3;
                if (a31 <= 12)
                {
                    if (a31 == 1 || a31 == 2 || a31 == 3)
                    {
                        dd125 = Convert.ToDateTime(a31 + "/01/" + (yy5 + 1));
                    }
                    else
                    {
                        dd125 = Convert.ToDateTime(a31 + "/01/" + yy5);
                    }
                }
                else
                {
                    if (a31 == 13)
                    {
                        a31 = 1;
                    }
                    if (a31 == 14)
                    {
                        a31 = 2;
                    }
                    if (a31 == 15)
                    {
                        a31 = 3;
                    }

                    //a31 = a31 - 12;
                    dd125 = Convert.ToDateTime(a31 + "/01/" + (yy5 + 1));

                }
                DateTime jh = dd125;
                Int32 jd = DateTime.DaysInMonth(jh.Year, jh.Month);
                DateTime jh1 = Convert.ToDateTime(jh.Month + "/" + jd + "/" + jh.Year);
                chdate = Convert.ToDateTime(chdate.Month + "/1/" + chdate.Year);
                if (jh < chdate)
                {

                    string std = "SELECT  sum(Shared) as shared, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear,date FROM cpf where date>='" + jh + "' and date<='" + jh1 + "' and ac=" + ac + " group by date;select *from cpf_detail where date>='" + jh + "' and date<='" + jh1 + "' and ac=" + ac;
                    SqlDataAdapter adp93d = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds93d = new DataSet();
                    // string tt1 = "";
                    adp93d.Fill(ds93d);
                    decimal ocpf2d = 0;
                    decimal oadjment2d = 0;

                    if (ds93d.Tables[1].Rows.Count != 0)
                    {

                        //for (Int16 a2d = 0; a2d < ds93d.Tables[1].Rows.Count; a2d++)
                        //{

                          
                        //    //ocpf2d = ocpf2d + Convert.ToDecimal(ds93d.Tables[1].Rows[a2d]["cpf_adv"]);
                        //    //oadjment2d = oadjment2d + Convert.ToDecimal(ds93d.Tables[1].Rows[a2d]["adjment"]);
                        //}
                        withd4 = withd4 + (ocpf2d + oadjment2d);
                    }
                    if (ds93d.Tables[0].Rows.Count != 0)
                    {
                        //                              string dt44 = ds1.Tables[3].Rows[a2]["date"].ToString();
                        //string[] arr44 = dt44.Split('/');
                        //if (arr44[0].ToString() == a2.ToString())
                        //{
                        if (ds93d.Tables[0].Rows[0]["shared"].ToString() == "")
                        {
                            ds93d.Tables[0].Rows[0]["shared"] = 0;
                        }
                        if (ds93d.Tables[0].Rows[0]["recovery_o_adv"].ToString() == "")
                        {
                            //ds93d.Tables[0].Rows[0]["recovery_o_adv"] = 0;
                        }
                        if (ds93d.Tables[0].Rows[0]["arear"].ToString() == "")
                        {
                            //ds93d.Tables[0].Rows[0]["arear"] = 0;
                        }
                        total41 = ((Convert.ToDecimal(ds93d.Tables[0].Rows[0]["shared"]) + ppob1) - (ocpf2d + oadjment2d));
                        total8 = total8 + ((Convert.ToDecimal(ds93d.Tables[0].Rows[0]["shared"]))); ;
                        // }      
                    }
                    else
                    {
                        total41 = ((ppob1) - (ocpf2d + oadjment2d));

                    }

                    //oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_dur"]);
                    // oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_adjment"]);

                    //}
                    // total41 = total41 - ((ocpf2) + Convert.ToDecimal(oadjment2));

                    //if (c1 == 1)
                    //{
                    total4 = total4 + total41;
                    //    c1 = 0;
                    //}
                    //else
                    //{
                    //    total4 = total4 + total41;

                    //}
                    ppob1 = total41;
                    //total4 = ppob1;
                    //}
                    //else
                    //{
                    //    ppob1 = total41;
                    //}
                }
            }
            double num3 = (double)1 / (double)12;
            //Math.Round(Convert.ToDouble(tot * 8 / 100) * num3, 2).ToString();
            if (c1 == 1)
            {
                //if (pob8 == 1)
                //{

                //    gtotal = Convert.ToDecimal(((Convert.ToDouble(total8) + Convert.ToDouble(gtotal)) - Convert.ToDouble(withd4)));
                //    gt = gtotal;
                //}
                //else
                //{
                decimal n = Convert.ToDecimal((Convert.ToDouble(total4 * 8 / 100) * num3));
                decimal n1 = Convert.ToDecimal(total8 + gtotal);
                decimal n2 = n + n1;
                // n1 =Convert.ToDouble(total4 * 8 / 100) * num3);
                // gtotal = Convert.ToDecimal((((Convert.ToDouble(total4 * 8 / 100) * num3) + Convert.ToDouble(total8) + Convert.ToDouble(gtotal)) - Convert.ToDouble(withd4)));
                gtotal = Convert.ToDecimal(n2 - withd4);

                gt = gtotal;

                //  }
            }
            else
            {
                gtotal = Convert.ToDecimal(pob);
                gt = gtotal;
            }
            // }
            // Label15.Text = (pob).ToString();
            //Label14.Text = total5.ToString();
        }
        //string ck = "select sum(cpf_withd) as amt from cpf_detail where ac=" + ac+" group by ac";
        //SqlDataAdapter adpck = new SqlDataAdapter(ck, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        //DataSet dsck = new DataSet();
        //// string tt1 = "";
        //adpck.Fill(dsck);
        //if (ds.Tables[0].Rows.Count != 0 && Convert.ToDecimal(dsck.Tables[0].Rows[0][0])>=1)
        //{
        //    TextBox7.Text = "Already Paid";
        //}
        //else
        //{
        TextBox5.Text = Math.Round(gt).ToString();
        // }
       
    }
    private void epf()
    {
        // string session = DropDownList2.SelectedItem.Text;
        string ac = DropDownList1.SelectedValue;
        DateTime sdate = Convert.ToDateTime("04/01/2011");
        DateTime edate = Convert.ToDateTime("03/31/2012");
        string st = "select *from employee;select *from employee where session<='" + sdate + "' and ac=" + DropDownList1.SelectedValue;
        SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        decimal pob = 0, pinsob = 0, pshare = 0;
        if (ds.Tables[1].Rows.Count != 0)
        {
            for (Int16 i = 0; i < ds.Tables[1].Rows.Count; i++)
            {

                //pob = pob + ((odur + orec) + (ocpf - oadjment) + pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]));
                pob = pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]);
                if (ds.Tables[1].Rows[i]["Ins_ob"].ToString() != "")
                    pinsob = pinsob + Convert.ToDecimal(ds.Tables[1].Rows[i]["Ins_ob"]);
                if (ds.Tables[1].Rows[i]["Share_ob"].ToString() != "")
                    pshare = pshare + Convert.ToDecimal(ds.Tables[1].Rows[i]["Share_ob"]);
                string kk = ds.Tables[1].Rows[i]["session"].ToString();
                if (kk == sdate.ToString())
                {
                    pob8 = 1;
                }
            }
            // pob = pob ;
        }

        pob = pob + pinsob;


        ArrayList ar4 = new ArrayList();

        string[] yr = TextBox1.Text.Split('/');
        Int32 kk1 = Convert.ToInt32(yr[2]);
        DateTime chdate = Convert.ToDateTime(yr[1] + "/" + yr[0] + "/" + yr[2]);
        if (Convert.ToInt32(yr[1]) >= 4)
        {
            kk1 = Convert.ToInt32(yr[2]) + 2;
        }
        else
        {
            kk1 = Convert.ToInt32(yr[2]) + 1;
        }

        for (Int32 y = 2011; y < kk1; y++)
        {
            ar4.Add(y.ToString() + "-" + Convert.ToInt32(y + 1));
        }
        //ar4.Add("2010-2011");

        // ar4.Add("2011-2012");
        //ar4.Add("2012-2013");
        //ar4.Add("2013-2014");
        //ar4.Add("2014-2015");
        decimal gtotal = 0;
        Int32 c1 = 1;
        decimal ppob1 = 1;
        for (Int32 ja = 0; ja < ar4.Count; ja++)
        {

            string tt = "";

            decimal arear = 0;
            decimal total8 = 0;
            total4 = 0;
            //if (ds1.Tables[3].Rows.Count != 0)
            //{
            if (ppob1 == 1)
            {
                ppob1 = pob;
                c1 = 0;
            }
            else
            {
                ppob1 = gtotal;
                c1 = 1;
            }
            withd4 = 0;
            for (Int16 a2 = 1; a2 <= 12; a2++)
            {

                //Int32 yyd = Convert.ToInt32(DropDownList2.SelectedItem.Text.Substring(0, 4));


                //string sessiond = DropDownList2.SelectedItem.Text;

                Int32 yyd = Convert.ToInt32(ar4[ja].ToString().Substring(0, 4));


                string sessiond = ar4[ja].ToString();
                DateTime sdated = Convert.ToDateTime("04/01/" + sessiond.Substring(0, 4));
                DateTime edated = Convert.ToDateTime("03/31/" + sessiond.Substring(5, 4));

                string acd = DropDownList1.SelectedValue.ToString();
                string monthdd = a2.ToString();
                DateTime dd14d;
                DateTime dd15d;
                if (monthdd == "1" || monthdd == "2" || monthdd == "3")
                {
                    dd14d = Convert.ToDateTime(monthdd + "/01/" + (yyd + 1));
                    Int32 dayd = DateTime.DaysInMonth(dd14d.Year, dd14d.Month);
                    dd15d = Convert.ToDateTime(monthdd + "/" + dayd + "/" + (yyd + 1));
                }
                else
                {
                    dd14d = Convert.ToDateTime(monthdd + "/01/" + yyd);
                    Int32 dayd = DateTime.DaysInMonth(dd14d.Year, dd14d.Month);
                    dd15d = Convert.ToDateTime(monthdd + "/" + dayd + "/" + (yyd));
                }




                Int32 yy5 = sdated.Year - 1;
                //   string mm5 = ((Label)(e.Row.FindControl("label1"))).Text;

                Int32 a31 = a2 + 3;
                if (a31 <= 12)
                {
                    if (a31 == 1 || a31 == 2 || a31 == 3)
                    {
                        dd125 = Convert.ToDateTime(a31 + "/01/" + (yy5 + 1));
                    }
                    else
                    {
                        dd125 = Convert.ToDateTime(a31 + "/01/" + yy5);
                    }
                }
                else
                {
                    if (a31 == 13)
                    {
                        a31 = 1;
                    }
                    if (a31 == 14)
                    {
                        a31 = 2;
                    }
                    if (a31 == 15)
                    {
                        a31 = 3;
                    }

                    //a31 = a31 - 12;
                    dd125 = Convert.ToDateTime(a31 + "/01/" + (yy5 + 1));

                }
                DateTime jh = dd125;
                Int32 jd = DateTime.DaysInMonth(jh.Year, jh.Month);
                DateTime jh1 = Convert.ToDateTime(jh.Month + "/" + jd + "/" + jh.Year);
                chdate = Convert.ToDateTime(chdate.Month + "/1/" + chdate.Year);
                if (jh < chdate)
                {

                    string std = "SELECT  sum(During_Year) as During_Year, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear,date FROM cpf where date>='" + jh + "' and date<='" + jh1 + "' and ac=" + ac + " group by date;select *from cpf_detail where date>='" + jh + "' and date<='" + jh1 + "' and ac=" + ac;
                    SqlDataAdapter adp93d = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds93d = new DataSet();
                    // string tt1 = "";
                    adp93d.Fill(ds93d);
                    decimal ocpf2d = 0;
                    decimal oadjment2d = 0;

                    if (ds93d.Tables[1].Rows.Count != 0)
                    {

                        for (Int16 a2d = 0; a2d < ds93d.Tables[1].Rows.Count; a2d++)
                        {
                            if (ds93d.Tables[1].Rows[a2d]["cpf_adv"].ToString() != "")
                            ocpf2d = ocpf2d + Convert.ToDecimal(ds93d.Tables[1].Rows[a2d]["cpf_adv"]);
                            oadjment2d = oadjment2d + Convert.ToDecimal(ds93d.Tables[1].Rows[a2d]["adjment"]);
                        }
                        withd4 = withd4 + (ocpf2d + oadjment2d);
                    }
                    if (ds93d.Tables[0].Rows.Count != 0)
                    {
                        //                              string dt44 = ds1.Tables[3].Rows[a2]["date"].ToString();
                        //string[] arr44 = dt44.Split('/');
                        //if (arr44[0].ToString() == a2.ToString())
                        //{
                        if (ds93d.Tables[0].Rows[0]["during_year"].ToString() == "")
                        {
                            ds93d.Tables[0].Rows[0]["during_year"] = 0;
                        }
                        if (ds93d.Tables[0].Rows[0]["recovery_o_adv"].ToString() == "")
                        {
                            ds93d.Tables[0].Rows[0]["recovery_o_adv"] = 0;
                        }
                        if (ds93d.Tables[0].Rows[0]["arear"].ToString() == "")
                        {
                            ds93d.Tables[0].Rows[0]["arear"] = 0;
                        }
                        total41 = ((Convert.ToDecimal(ds93d.Tables[0].Rows[0]["during_year"]) + Convert.ToDecimal(ds93d.Tables[0].Rows[0]["recovery_o_adv"]) + Convert.ToDecimal(ds93d.Tables[0].Rows[0]["arear"]) + ppob1) - (ocpf2d + oadjment2d));
                        total8 = total8 + ((Convert.ToDecimal(ds93d.Tables[0].Rows[0]["during_year"]) + Convert.ToDecimal(ds93d.Tables[0].Rows[0]["recovery_o_adv"]) + Convert.ToDecimal(ds93d.Tables[0].Rows[0]["arear"]))); ;
                        // }      
                    }
                    else
                    {
                        total41 = ((ppob1) - (ocpf2d + oadjment2d));

                    }

                    //oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_dur"]);
                    // oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_adjment"]);

                    //}
                    // total41 = total41 - ((ocpf2) + Convert.ToDecimal(oadjment2));

                    //if (c1 == 1)
                    //{
                    total4 = total4 + total41;
                    //    c1 = 0;
                    //}
                    //else
                    //{
                    //    total4 = total4 + total41;

                    //}
                    ppob1 = total41;
                    //total4 = ppob1;
                    //}
                    //else
                    //{
                    //    ppob1 = total41;
                    //}
                }
            }
            double num3 = (double)1 / (double)12;
            //Math.Round(Convert.ToDouble(tot * 8 / 100) * num3, 2).ToString();
            if (c1 == 1)
            {
                //if (pob8 == 1)
                //{

                //    gtotal = Convert.ToDecimal(((Convert.ToDouble(total8) + Convert.ToDouble(gtotal)) - Convert.ToDouble(withd4)));
                //    gt = gtotal;
                //}
                //else
                //{
                decimal n = Convert.ToDecimal((Convert.ToDouble(total4 * 8 / 100) * num3));
                decimal n1 = Convert.ToDecimal(total8 + gtotal);
                decimal n2 = n + n1;
                // n1 =Convert.ToDouble(total4 * 8 / 100) * num3);
                // gtotal = Convert.ToDecimal((((Convert.ToDouble(total4 * 8 / 100) * num3) + Convert.ToDouble(total8) + Convert.ToDouble(gtotal)) - Convert.ToDouble(withd4)));
                gtotal = Convert.ToDecimal(n2 - withd4);

                gt = gtotal;

                //  }
            }
            else
            {
                gtotal = Convert.ToDecimal(pob);
                gt = gtotal;
            }
            // }
            // Label15.Text = (pob).ToString();
            //Label14.Text = total5.ToString();
        }
        //string ck = "select sum(cpf_withd) as amt from cpf_detail where ac=" + ac+" group by ac";
        //SqlDataAdapter adpck = new SqlDataAdapter(ck, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        //DataSet dsck = new DataSet();
        //// string tt1 = "";
        //adpck.Fill(dsck);
        //if (ds.Tables[0].Rows.Count != 0 && Convert.ToDecimal(dsck.Tables[0].Rows[0][0])>=1)
        //{
        //    TextBox7.Text = "Already Paid";
        //}
        //else
        //{
        //TextBox7.Text = Math.Round(gt).ToString(); commented sunil as getting value from proc [employeeWithdrawalCalculation] call
        // }
       

        try
        {
            DateTime dt1 = Convert.ToDateTime(DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            SqlCommand sqlComm = new SqlCommand("employeeWithdrawalCalculation", conn);
            sqlComm.Parameters.AddWithValue("@account", DropDownList1.SelectedItem.Text.ToString());
            sqlComm.Parameters.AddWithValue("@year", dt1);
            sqlComm.CommandType = CommandType.StoredProcedure;

            conn.Open();
            int rowAffected = sqlComm.ExecuteNonQuery();

            SqlDataAdapter adp1 = new SqlDataAdapter(sqlComm);
            
            DataSet prcods = new DataSet();
            adp1.Fill(prcods);
             if (prcods.Tables[0].Rows.Count == 0)
             {
                 TextBox7.Text = "0";
             }else
             {
                 //t_accountName t_account t_withdraw 
                 DataRow dr =  prcods.Tables[0].Rows[0];    
                 TextBox7.Text = dr["t_withdraw"].ToString();
                
                 //foreach (DataRow dr in ds.Tables[0].Rows) //Tables[1]....
                //{
                //if(dr["ColumName"].ToString()==....)
                // store the value for that name
                //}
             }
            
            conn.Close();
           
        }
        catch (SqlException ex)
        {
            Console.WriteLine("SQL Error" + ex.Message.ToString());
        }


    }
    protected void TextBox8_TextChanged(object sender, EventArgs e)
    {
        epf();
        shared();
    }


    protected void triggerRecalculation(String account, DateTime sdate)
    {
        try
        {
            //String session = DropDownList1.SelectedItem.Text;
            //DateTime sdate = Convert.ToDateTime("04/01/" + DropDownList1.SelectedItem.Text);
            //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            //String ac = DropDownList3.SelectedItem.Text;

            SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            SqlCommand sqlComm = new SqlCommand("employeeBalanceCalculation", conn);
            sqlComm.Parameters.AddWithValue("@account", account);
            sqlComm.Parameters.AddWithValue("@year", sdate);
            sqlComm.CommandType = CommandType.StoredProcedure;

            conn.Open();
            int rowAffected = sqlComm.ExecuteNonQuery();
            conn.Close();
        }
        catch (SqlException ex)
        {
            Console.WriteLine("SQL Error" + ex.Message.ToString());
        }
    }


}
