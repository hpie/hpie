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
using System.IO;
using System.Text;
public partial class detail : System.Web.UI.Page
{
    Int32 cc = 0;
    decimal t = 0, t1 = 0, t2 = 0, t3 = 0, t4 = 0, t5 = 0, t6 = 0;
    Int32 row_count=0;
    Int32 a1 = 0;
    decimal total = 0;
    decimal tot = 0, tot1 = 0, tot2 = 0,fw=0;
    decimal check = 2;
    decimal check1 = 2;
    DateTime ddate ;
    DateTime dd125;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {

            session();
          //  bind();

           
        }
    }
    

    private void session()
    {
        for (Int32 y = 2008; y < DateTime.Now.Year + 1; y++)
        {
            DropDownList2.Items.Add(y.ToString() + "-" + Convert.ToInt32(y + 1));
        }
    }
    private void bind()
    {
        ArrayList arr = new ArrayList();
        arr.Add("APRIL");
        arr.Add("MAY");
        arr.Add("JUNE");
        arr.Add("JULY");
        arr.Add("AUGUST");
        arr.Add("SEPTEMBER");
        arr.Add("OCTOBER");
        arr.Add("NOVEMBER");
        arr.Add("DECEMBER");
        arr.Add("JANUARY");
        arr.Add("FEBRUARY");
        arr.Add("MARCH"); 
        GridView1.DataSource = arr;
        GridView1.DataBind();
    }

   
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        table.Visible = true;
        row_count = 0;
         a1 = 0;
        total = 0;
        tot = 0; tot1 = 0; tot2 = 0;
        Label3.Text = DropDownList1.SelectedItem.Text;
        string st1 = "SELECT  *from employee where ac=" + DropDownList1.SelectedValue;



        SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds1 = new DataSet();
        adp1.Fill(ds1);
        Label2.Text = ds1.Tables[0].Rows[0]["name"].ToString();
        Label16.Text = ds1.Tables[0].Rows[0]["des"].ToString();
        Label193.Text = ds1.Tables[0].Rows[0]["des"].ToString();
        Label4.Text = DropDownList2.SelectedItem.Text;
        Label8.Text = DropDownList2.SelectedItem.Text;
        bind();
        //Label13.Text = ((Convert.ToDecimal(Label9.Text) + Convert.ToDecimal(Label10.Text) + Convert.ToDecimal(Label11.Text)) - Convert.ToDecimal(Label12.Text)).ToString();
  
      // bind();

    }
    protected void GridView1_RowDataBound1(object sender, GridViewRowEventArgs e)
    {

        Label9.Text="0".ToString();
        Label10.Text = "0".ToString();
        Label11.Text = "0".ToString();
        Label12.Text = "0".ToString();
        Label6.Text = "0".ToString();
   
        if (e.Row.RowType == DataControlRowType.DataRow)
        {


            check1 = 2;
            Int32 yy =Convert.ToInt32( DropDownList2.SelectedItem.Text.Substring(0, 4));
            decimal total31 = 0, total3 = 0, pob8 = 0;
            decimal total41 = 0, total4 = 0, total5 = 0;
            decimal odur2 = 0, orec2 = 0, ocpf2 = 0, oadjment2 = 0, oins_adjment2 = 0, oshare_dur2 = 0, oshare_ajment2 = 0;
            decimal odur = 0, orec = 0, ocpf = 0, oadjment = 0, oins_adjment = 0, oshare_dur = 0, oshare_ajment = 0;

            //ob
            string session = DropDownList2.SelectedItem.Text;
            DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
            DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            Label191.Text = sdate.ToString("dd-MM-yyyy");

            string ac=Label3.Text;
              string monthd = ((Label)(e.Row.FindControl("label1"))).Text.ToString();
              DateTime dd14;
              DateTime dd15;
              if (monthd == "JANUARY" || monthd == "FEBRUARY" || monthd == "MARCH")
              {
                  dd14 = Convert.ToDateTime(monthd + "/01/" + (yy + 1));
                  Int32 dayd = DateTime.DaysInMonth(dd14.Year, dd14.Month);
                  dd15 = Convert.ToDateTime(monthd + "/"+dayd+"/" + (yy + 1));
              }
              else
              {
                  dd14 = Convert.ToDateTime(monthd + "/01/" + yy);
                  Int32 dayd = DateTime.DaysInMonth(dd14.Year, dd14.Month);
                  dd15 = Convert.ToDateTime(monthd + "/" + dayd + "/" + (yy));
              }
             // DateTime ddd = Convert.ToDateTime(monthd + "/01/" + session.Substring(0, 4));
              ArrayList arrd = new ArrayList();
              string std2 = "select *from deput where  ac=" + Label3.Text ;

              SqlDataAdapter adpd2 = new SqlDataAdapter(std2, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
              DataSet dsd2 = new DataSet();
              adpd2.Fill(dsd2);
            if(dsd2.Tables[0].Rows.Count!=0)
            {
                for (Int32 j = 0; j < dsd2.Tables[0].Rows.Count; j++)
                {
                    DateTime t1 = Convert.ToDateTime(dsd2.Tables[0].Rows[j]["s_date"]);
                    DateTime t3 = Convert.ToDateTime(t1.Month + "/01/" + t1.Year);
                    DateTime t2 = Convert.ToDateTime(dsd2.Tables[0].Rows[j]["e_date"]);
                    DateTime t4 = Convert.ToDateTime(t2.Month + "/01/" + t2.Year);
                    for (DateTime date = t3; date < t4; date = date.AddDays(1.0))
                    {
                        arrd.Add(date);
                    }
                }
            }
            bool anothermatch = arrd.Contains(dd14);
            //  string std = "select *from deput where s_date<'" + dd14+ "'  and ac=" + Label3.Text + ";select *from deput where e_date>='" + dd14+"' and ac=" + Label3.Text;
           
            //SqlDataAdapter adpd = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            //DataSet dsd = new DataSet();
            //adpd.Fill(dsd);
         
            if (anothermatch==false)
            {
                    row_count++;
                    string st = "select *from employee where session='" + sdate + "' and ac=" + Label3.Text + ";select *from employee where session<='" + sdate + "' and ac=" + Label3.Text;
                    SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds = new DataSet();
                    adp.Fill(ds);
                    decimal pob = 0, pinsob = 0, pshare = 0;
                    if (ds.Tables[1].Rows.Count != 0)
                    {
                        for (Int16 i = 0; i < ds.Tables[1].Rows.Count; i++)
                        {
                            
                                //pob = pob + ((odur + orec) + (ocpf - oadjment) + pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]));
                            if(   ds.Tables[1].Rows[i]["shared_ob"].ToString()!="") 
                            pob = pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["shared_ob"]);
                            //if(ds.Tables[1].Rows[i]["Ins_ob"].ToString()!="")
                               // pinsob = pinsob + Convert.ToDecimal(ds.Tables[1].Rows[i]["Ins_ob"]);
                            //if (ds.Tables[1].Rows[i]["Share_ob"].ToString() != "")
                             //   pshare = pshare + Convert.ToDecimal(ds.Tables[1].Rows[i]["Share_ob"]);
                                string kk = ds.Tables[1].Rows[i]["session"].ToString();
                                if (kk == sdate.ToString())
                                {
                                    pob8 = 1;
                                }
                        }
                        // pob = pob ;
                    }
                  
                        pob = pob + pinsob;
                    

                    string st1 = "SELECT  date,Shared, Recovery_o_adv,arear FROM cpf where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + " order by date; SELECT  * FROM cpf_detail where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + "; SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac=" + ac + ";SELECT  sum(Shared) as Shared, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear,date FROM cpf where date<'" + sdate + "' and ac=" + ac + " group by date";


                    SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds1 = new DataSet();
                    adp1.Fill(ds1);






                    decimal obp = 0, obp1 = 0;
                    SqlDataAdapter adp6 = new SqlDataAdapter("select *from cpf where date<'" + sdate + "' and ac=" + ac + " order by date;select *from cpf_detail where date<'" + sdate + "' and ac=" + ac + " order by date", ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds6 = new DataSet();
                    adp6.Fill(ds6);
                    decimal ppob2 = 0;
                    decimal ppob3 = 0;
                    decimal inter = 0;
                    decimal inter1 = 0;
                    decimal withd = 0;
                    decimal cpf_adv9 = 0;
                    decimal adjment9 = 0;
                    decimal withd4 = 0;
                    if (ds6.Tables[1].Rows.Count != 0)
                    {

                        for (Int16 a = 0; a < ds6.Tables[1].Rows.Count; a++)
                        {
                            if (ds6.Tables[1].Rows[a]["Share_dur"].ToString() != "")
                            {
                                withd = withd + Convert.ToDecimal(ds6.Tables[1].Rows[a]["Share_dur"]);
                            }
                                if (ds6.Tables[1].Rows[a]["cpf_adv"].ToString() != "")
                                {
                                   // cpf_adv9 = cpf_adv9 + Convert.ToDecimal(ds6.Tables[1].Rows[a]["cpf_adv"]);
                                }
                                if (ds6.Tables[1].Rows[a]["adjment"].ToString() != "")
                                {
                                //adjment9 = adjment9 + Convert.ToDecimal(ds6.Tables[1].Rows[a]["adjment"]);
                            }
                        }
                        withd4 = withd + cpf_adv9 + adjment9;
                    }

                    if (ds6.Tables[0].Rows.Count != 0)
                    {

                        for (Int16 a = 0; a < ds6.Tables[0].Rows.Count; a++)
                        {
                            if (ppob2 == 0)
                            {
                                ppob2 = pob;
                            }
                            if (ppob3 == 0)
                            {
                                ppob3 = pinsob;
                            }
                            if(ds6.Tables[0].Rows[a]["Shared"].ToString()!="")
                            obp1 = (Convert.ToDecimal(ds6.Tables[0].Rows[a]["Shared"]) + ppob2);
                            //  inter = inter + obp1;
                            if (a < ds6.Tables[0].Rows.Count - 1)
                            {
                                ppob2 = obp1;
                                inter = ppob2;
                            }
                            DateTime dt8 = Convert.ToDateTime(ds6.Tables[0].Rows[a]["date"]);
                            Int32 dd = DateTime.DaysInMonth(dt8.Year, dt8.Month);
                            DateTime dt9 = Convert.ToDateTime(dt8.Month + "/" + dd + "/" + dt8.Year);
                            string ss13 = "select *from cpf_detail where date>='" + dt8 + "' and date<='" + dt9 + "' and ac=" + ac;
                            SqlDataAdapter adp93 = new SqlDataAdapter(ss13, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                            DataSet ds93 = new DataSet();
                            string tt1 = "";
                            adp93.Fill(ds93);
                            string hh = "";
                            if (hh == "")
                            {
                                if (ds93.Tables[0].Rows.Count != 0)
                                {
                                    ocpf2 = 0;
                                    oadjment2 = 0;
                                    //for (Int16 a2 = 0; a2 < ds91.Tables[0].Rows.Count; a2++)
                                    //{
                                    if (a <= ds93.Tables[0].Rows.Count - 1)
                                    {
                                      //  ocpf2 = ocpf2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["cpf_adv"]);
                                        //oadjment2 = oadjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["adjment"]);
                                        //oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["ins_adjment"]);
                                        //oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["share_dur"]);
                                        //oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["share_adjment"]);

                                        //}
                                        inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
                                        ppob2 = inter;
                                        obp1 = ppob2;
                                    }


                                }
                                else
                                {
                                    // hh = "dd";
                                    //inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
                                    //ppob2 = inter;
                                    //obp1 = ppob2;
                                }
                            }
                            else
                            {
                                hh = "ss";
                                inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
                                ppob2 = inter;
                                obp1 = ppob2;
                            }


                        }

                    }
                    else
                    {
                        inter = pob;

                    }
                    decimal jk = inter;

                    ArrayList ar4 = new ArrayList();
                    string[] yr = DropDownList2.SelectedItem.Text.Split('-');
                    Int32 kk1 = Convert.ToInt32(yr[1]);
                    for (Int32 y = 2011; y < kk1 ; y++)
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
                                string acd = Label3.Text;
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






                                //if (a2 <= ds1.Tables[3].Rows.Count)
                                //{
                                //    //string dt44 = ds1.Tables[3].Rows[a2]["date"].ToString();
                                //    //string[] arr44 = dt44.Split('/');
                                //    //if (arr44[0].ToString() == a2.ToString())
                                //    //{
                                //    odur = odur + Convert.ToDecimal(ds1.Tables[3].Rows[a2 - 1]["during_year"]);
                                //    orec = orec + Convert.ToDecimal(ds1.Tables[3].Rows[a2 - 1]["recovery_o_adv"]);
                                //    if (ds1.Tables[3].Rows[a2 - 1]["arear"].ToString() != "")
                                //    {
                                //        arear = arear + Convert.ToDecimal(ds1.Tables[3].Rows[a2 - 1]["arear"]);
                                //    }
                                //    else
                                //    {
                                //        ds1.Tables[3].Rows[a2 - 1]["arear"] = "0".ToString();
                                //    }
                                //    // }
                                //    // total41 = (Convert.ToDecimal(ds1.Tables[3].Rows[a2]["during_year"]) + Convert.ToDecimal(ds1.Tables[3].Rows[a2]["recovery_o_adv"]) + Convert.ToDecimal(ds1.Tables[3].Rows[a2]["arear"]) + ppob1);
                                //}
                               // //total4 = total4 + total41;

                                Int32 yy5 = sdated.Year - 1;
                                string mm5 = ((Label)(e.Row.FindControl("label1"))).Text;

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

                                SqlDataAdapter adp692 = new SqlDataAdapter("select *from cpf_detail where date<='" + jh + "' and ac=" + ac + " order by date", ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                                DataSet ds692 = new DataSet();
                                adp692.Fill(ds692);
                                if (ds692.Tables[0].Rows.Count != 0)
                                {

                                    for (Int16 a = 0; a < ds692.Tables[0].Rows.Count; a++)
                                    {
                                        if (ds692.Tables[0].Rows[a]["Share_dur"].ToString() != "")
                                        {
                                            string jkl = ds692.Tables[0].Rows[a]["Share_dur"].ToString();
                                            if (jkl != "0.00")
                                            {
                                                string date11 = ds692.Tables[0].Rows[a]["date1"].ToString();
                                                if (date11 != "")
                                                {
                                                    ddate = Convert.ToDateTime(ds692.Tables[0].Rows[a]["date1"]);

                                                    if (jh1 <= ddate)
                                                    {
                                                        //check = Convert.ToDecimal(e.Row.Cells[7].Text);
                                                        check1 = 0;

                                                    }

                                                }
                                            }
                                        }
                                    }
                                }

                                //string ss1 = "select *from cpf_detail where date>='" + jh + "' and date<='" + jh1 + "' and ac=" + ac;
                                //SqlDataAdapter adp91 = new SqlDataAdapter(ss1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                                //DataSet ds91 = new DataSet();
                                //adp91.Fill(ds91);
                                ////if (tt == "")
                                ////{
                                //ocpf2 = 0;
                                //oadjment2 = 0;
                                //if (ds91.Tables[0].Rows.Count != 0)
                                //{

                                //    //cpf_w = 0;
                                //    for (Int16 a3 = 0; a3 < ds91.Tables[0].Rows.Count; a3++)
                                //    {
                                //        //if (a2 <= ds91.Tables[0].Rows.Count - 1)
                                //        //{

                                //        ocpf2 = ocpf2 + Convert.ToDecimal(ds91.Tables[0].Rows[a3]["cpf_adv"]);
                                //        oadjment2 = oadjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a3]["adjment"]);
                                //        //  cpf_w = cpf_w + Convert.ToDecimal(ds91.Tables[0].Rows[a2]["cpf_withd"]);
                                //        if (ds91.Tables[0].Rows[a3]["ins_adjment"].ToString() != "")
                                //        {
                                //            oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a3]["ins_adjment"]);

                                //        }
                                //    }


                                //}
                                ////else
                                ////{
                                ////    tt = "ss";
                                ////    //total41 = total41 - ((ocpf2) + Convert.ToDecimal(oadjment2));
                                ////    //ppob1 = total41;
                                ////    //total4 = ppob1;
                                ////}
                                ////if (a2 <= ds1.Tables[3].Rows.Count - 1)
                                ////{
                                string std = "SELECT  sum(Shared) as Shared, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear,date FROM cpf where date>='" + jh + "' and date<='" + jh1 + "' and ac=" + ac + " group by date;select *from cpf_detail where date>='" + jh + "' and date<='" + jh1 + "' and ac=" + ac;
                                SqlDataAdapter adp93d = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                                DataSet ds93d = new DataSet();
                                // string tt1 = "";
                                adp93d.Fill(ds93d);
                             decimal   ocpf2d = 0;
                               decimal oadjment2d = 0;
                               
                                if (ds93d.Tables[1].Rows.Count != 0)
                                {
                                    
                                    //for (Int16 a2d = 0; a2d < ds93d.Tables[1].Rows.Count; a2d++)
                                    //{

                                    //    //ocpf2d = ocpf2d + Convert.ToDecimal(ds93d.Tables[1].Rows[a2d]["cpf_adv"]);
                                    ////    oadjment2d = oadjment2d + Convert.ToDecimal(ds93d.Tables[1].Rows[a2d]["adjment"]);
                                    //}
                                    withd4 =withd4+( ocpf2d + oadjment2d);
                                }
                                if (ds93d.Tables[0].Rows.Count != 0)
                                {
                                    //                              string dt44 = ds1.Tables[3].Rows[a2]["date"].ToString();
                                    //string[] arr44 = dt44.Split('/');
                                    //if (arr44[0].ToString() == a2.ToString())
                                    //{
                                    if (ds93d.Tables[0].Rows[0]["Shared"].ToString() == "")
                                    {
                                        ds93d.Tables[0].Rows[0]["Shared"] = 0;
                                    }
                                    if (ds93d.Tables[0].Rows[0]["recovery_o_adv"].ToString() == "")
                                    {
                                        //ds93d.Tables[0].Rows[0]["recovery_o_adv"] = 0;
                                    }
                                    if (ds93d.Tables[0].Rows[0]["arear"].ToString() == "")
                                    {
                                        //ds93d.Tables[0].Rows[0]["arear"] = 0;
                                    }
                                    total41 = ((Convert.ToDecimal(ds93d.Tables[0].Rows[0]["Shared"]) + ppob1) - (ocpf2d + oadjment2d));
                                    total8 = total8 + ((Convert.ToDecimal(ds93d.Tables[0].Rows[0]["Shared"]))); ;
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
                                if (check1 != 0)
                                {
                                    total4 = total4 + total41;
                                }
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
                           //total8 = odur + orec + arear;
                        //}
                        //else
                        //{

                        //    total4 = jk;
                        //}
                       double num3 = (double)1 / (double)12;
                        //Math.Round(Convert.ToDouble(tot * 8 / 100) * num3, 2).ToString();

                       string mm1 = ((Label)(e.Row.FindControl("label1"))).Text;
                       DateTime dd121;
                       if (mm1 == "JANUARY" || mm1 == "FEBRUARY" || mm1 == "MARCH")
                       {
                           dd121 = Convert.ToDateTime(mm1 + "/01/" + (yy + 1));
                       }
                       else
                       {
                           dd121 = Convert.ToDateTime(mm1 + "/01/" + yy);
                       }
                       DateTime dt812 = dd121;
                       //SqlDataAdapter adp692 = new SqlDataAdapter("select *from cpf_detail where date<='" + dt812 + "' and ac=" + ac + " order by date", ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                       //DataSet ds692 = new DataSet();
                       //adp692.Fill(ds692);
                       //if (ds692.Tables[0].Rows.Count != 0)
                       //{

                       //    for (Int16 a = 0; a < ds692.Tables[0].Rows.Count; a++)
                       //    {
                       //        if (ds692.Tables[0].Rows[a]["cpf_withd"].ToString() != "")
                       //     {
                       //         string jkl = ds692.Tables[0].Rows[a]["cpf_withd"].ToString();
                       //         if (jkl!= "0.00")
                       //         {
                       //                string date11 = ds692.Tables[0].Rows[a]["date1"].ToString();
                       //             if (date11 != "")
                       //             {
                       //                 ddate = Convert.ToDateTime(ds692.Tables[0].Rows[a]["date1"]);

                       //                 if (edate >= ddate)
                       //                 {
                       //                     //check = Convert.ToDecimal(e.Row.Cells[7].Text);
                       //                     check1 = 0;
                       //                 }

                       //             }
                       //         }
                       //     }
                       //    }
                       //}
                        if (c1 == 1)
                        {
                            if (pob8 == 1)
                            {

                              //if(check1!=0)
                              //{
                                    gtotal = Math.Round(Convert.ToDecimal((total8 + gtotal) - withd4));
                              //}
                                    Label5.Text = gtotal.ToString();
                                
                            }
                            else
                            {
                                decimal n=Convert.ToDecimal((Convert.ToDouble(total4 * 8 / 100) * num3));
                                decimal n1 =Convert.ToDecimal( total8 + gtotal);
                                decimal n2 = n + n1;
                                // n1 =Convert.ToDouble(total4 * 8 / 100) * num3);
                               // gtotal = Convert.ToDecimal((((Convert.ToDouble(total4 * 8 / 100) * num3) + Convert.ToDouble(total8) + Convert.ToDouble(gtotal)) - Convert.ToDouble(withd4)));
                              //if(check1!=0)
                              //{
                                    gtotal = Math.Round(Convert.ToDecimal(n2 - withd4));
                              //}
                                Label5.Text = gtotal.ToString();

                            }
                        }
                        else
                        {
                            gtotal = Convert.ToDecimal(pob);
                            Label5.Text = gtotal.ToString();
                        }
                    }
                  // Label15.Text = (pob).ToString();
                    Label14.Text = total5.ToString();
                    //end


                    e.Row.Cells[1].Text = "0.00".ToString();
                    e.Row.Cells[2].Text = "0.00".ToString();
                    e.Row.Cells[3].Text = "0.00".ToString();
                    e.Row.Cells[4].Text = "0.00".ToString();
                    e.Row.Cells[5].Text = "0.00".ToString();
                    e.Row.Cells[6].Text = "0.00".ToString();
                    e.Row.Cells[7].Text = "0.00".ToString();
                    e.Row.Cells[8].Text = "0.00".ToString();
                    string mm = ((Label)(e.Row.FindControl("label1"))).Text;
                    DateTime dd12;
                    if (mm == "JANUARY" || mm == "FEBRUARY" || mm == "MARCH")
                    {
                        dd12 = Convert.ToDateTime(mm + "/01/" + (yy + 1));
                    }
                    else
                    {
                        dd12 = Convert.ToDateTime(mm + "/01/" + yy);
                    }

                    DateTime dt81 = dd12;
                    Int32 dd1 = DateTime.DaysInMonth(dt81.Year, dt81.Month);
                    DateTime dt91 = Convert.ToDateTime(dt81.Month + "/" + dd1 + "/" + dt81.Year);
                    string st12 = "select *from cpf where date>='" + dt81 + "' and date<='" + dt91 + "' and ac=" + Label3.Text + ";select *from cpf_detail where date>='" + dt81 + "' and date<='" + dt91 + "' and ac=" + Label3.Text;
                    SqlDataAdapter adp12 = new SqlDataAdapter(st12, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds12 = new DataSet();
                    adp12.Fill(ds12);
                    if (ds12.Tables[0].Rows.Count != 0)
                    {
                        decimal sub = 0;
                        decimal sub1 = 0;
                        decimal sub2 = 0;
                        for (Int32 a = 0; a < ds12.Tables[0].Rows.Count; a++)
                        {
                           // string test = ds12.Tables[0].Rows[a]["recovery_o_adv"].ToString();
                            string test1 = ds12.Tables[0].Rows[a]["Shared"].ToString();
                            //if (test != "")
                            //{
                            //    sub = sub + Convert.ToDecimal(ds12.Tables[0].Rows[a]["recovery_o_adv"]);
                            //}
                            if (test1 != "")
                            {
                                sub1 = sub1 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["Shared"]);
                            }
                            string arr = ds12.Tables[0].Rows[a]["Arear"].ToString();
                            if (arr != "")
                            {
                              //  sub2 = sub2 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["Arear"]);
                            }

                        }
                        e.Row.Cells[1].Text = sub.ToString();
                        t = t + Convert.ToDecimal(e.Row.Cells[1].Text);
                        e.Row.Cells[2].Text = sub2.ToString();
                        t1 = t1 + Convert.ToDecimal(e.Row.Cells[2].Text);
                        e.Row.Cells[3].Text = sub1.ToString();
                        t2 = t2 + Convert.ToDecimal(e.Row.Cells[3].Text);
                        e.Row.Cells[4].Text = (sub + sub1 + sub2).ToString();
                        t3 = t3 + Convert.ToDecimal(e.Row.Cells[4].Text);

                    }

                    if (ds12.Tables[1].Rows.Count != 0)
                    {
                        decimal sub = 0;
                        decimal sub1 = 0;
                        decimal sub2 = 0;
                        decimal f_with = 0;
                        for (Int32 a = 0; a < ds12.Tables[1].Rows.Count; a++)
                        {
                            if (ds12.Tables[1].Rows[a]["cpf_adv"].ToString() != "")
                            {
                                //sub = sub + Convert.ToDecimal(ds12.Tables[1].Rows[a]["cpf_adv"]);
                            }
                            if (ds12.Tables[1].Rows[a]["adjment"].ToString() != "")
                            {
                                //sub1 = sub1 + Convert.ToDecimal(ds12.Tables[1].Rows[a]["adjment"]);
                            }
                            if (ds12.Tables[1].Rows[a]["Share_dur"].ToString() != "")
                            {
                                f_with = f_with + Convert.ToDecimal(ds12.Tables[1].Rows[a]["Share_dur"]);
                            }
                            //string jj = ds12.Tables[1].Rows[a]["cpf_withd"].ToString();
                            // if (jj != "")
                            //{
                            //sub2 = sub2 + Convert.ToDecimal(ds12.Tables[1].Rows[a]["cpf_withd"]);
                            //}
                        }
                        //e.Row.Cells[1].Text = sub.ToString();
                        //e.Row.Cells[2].Text = sub1.ToString();
                        e.Row.Cells[5].Text = (sub + sub1).ToString();
                        e.Row.Cells[8].Text = f_with.ToString();
                        fw = fw + f_with;
                        t4 = t4 + Convert.ToDecimal(e.Row.Cells[5].Text);
                    }

                    e.Row.Cells[6].Text = (Convert.ToDecimal(e.Row.Cells[4].Text) - Convert.ToDecimal(e.Row.Cells[5].Text)).ToString();
                    t5 = t5 + Convert.ToDecimal(e.Row.Cells[6].Text);
                    //if (e.Row.Cells[4].Text != "0.00".ToString())
                    //{
                    if (row_count == 1)
                    {
                        total = total + (Convert.ToDecimal(e.Row.Cells[6].Text) + Convert.ToDecimal(Label5.Text));


                    }
                    else
                    {
                        total = total + (Convert.ToDecimal(e.Row.Cells[6].Text));

                    }
                    a1 = a1 + 1;
                    tot = tot + total;
                    tot1 = tot1 + Convert.ToDecimal(e.Row.Cells[4].Text);
                    tot2 = tot2 + Convert.ToDecimal(e.Row.Cells[5].Text);
                    //}
                    DateTime dtt = dt81.AddMonths(-1);

                    SqlDataAdapter adp69 = new SqlDataAdapter("select *from cpf where date<'" + dtt + "' and ac=" + ac + " order by date;select *from cpf_detail where date<='" + dt81 + "' and ac=" + ac + " order by date", ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds69 = new DataSet();
                    adp69.Fill(ds69);

                    decimal withd1 = 0;
                    //ddate = edate;
                    if (ds69.Tables[1].Rows.Count != 0)
                    {

                        for (Int16 a = 0; a < ds69.Tables[1].Rows.Count; a++)
                        {
                            if (ds69.Tables[1].Rows[a]["Share_dur"].ToString() != "")
                            {
                                string jkl = ds69.Tables[1].Rows[a]["Share_dur"].ToString();
                                if (jkl!= "0.00")
                                {
                                    withd1 = withd1 + Convert.ToDecimal(ds69.Tables[1].Rows[a]["Share_dur"]);
                                    string date11 = ds69.Tables[1].Rows[a]["date1"].ToString();
                                    if (date11 != "")
                                    {
                                        ddate = Convert.ToDateTime(ds69.Tables[1].Rows[a]["date1"]);

                                        if (edate >= ddate)
                                        {
                                            //check = Convert.ToDecimal(e.Row.Cells[7].Text);
                                            check = 0;

                                        }
                                    }
                                }
                               

                            }
                           
                        }
                    }



                    if (withd1 != 0 )
                    {
                        e.Row.Cells[7].Text = "0".ToString();
                       
                    }
                    else
                    {
                        e.Row.Cells[7].Text =Math.Round( (total),2).ToString();
                    }
                   
                    t6 = t6 + Convert.ToDecimal(e.Row.Cells[7].Text);
                    //}
                    //else
                    //{
                    //    e.Row.Cells[7].Text = total4.ToString();
                    //}
              
            }
        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            double num3 = (double)1 / (double)12;
          ((Label)e.Row.FindControl("label7")).Text = tot.ToString();
          Label6.Text =Math.Round(Convert.ToDouble (tot * 8 / 100) * num3,2).ToString();
        }
      Label9.Text =Label5.Text.ToString();
        Label10.Text = tot1.ToString();
        Label11.Text = Label6.Text.ToString();
        Label12.Text = tot2.ToString();
        Label13.Text = ((Convert.ToDecimal(Label9.Text) + Convert.ToDecimal(Label10.Text) + Convert.ToDecimal(Label11.Text)) - Convert.ToDecimal(Label12.Text)).ToString();
        Label17.Text = Label2.Text;
        Label18.Text = Label3.Text;

        Label1.Text = DropDownList2.SelectedValue.ToString();
        Label192.Text = Math.Round(Convert.ToDecimal(Label5.Text)).ToString();
        Label20.Text = Math.Round(Convert.ToDecimal(Label10.Text)).ToString();
        Label21.Text =Math.Round(Convert.ToDecimal( Label11.Text)).ToString();
        Label22.Text =Math.Round(Convert.ToDecimal( ( Convert.ToDecimal(Label192.Text) + Convert.ToDecimal(Label20.Text)+ Convert.ToDecimal(Label21.Text)))).ToString();
        Label23.Text =Math.Round(Convert.ToDecimal( Label12.Text)).ToString();
        if (check != 0)
        {
            Label25.Text = Math.Round(Convert.ToDecimal(Label22.Text) - Convert.ToDecimal(Label23.Text)).ToString(); ;
        }
        else
        {
            Label25.Text = "0".ToString(); ;

        }

        // = tot.ToString();
    }
    public static void GenerateExcel(GridView grdSource)
    {

        StringBuilder sbDocBody = new StringBuilder(); ;
        try
        {
            // Declare Styles
            sbDocBody.Append("<style>");
            sbDocBody.Append(".Header {  background-color:Navy; color:#ffffff; font-weight:bold;font-family:Verdana; font-size:12px;}");
            sbDocBody.Append(".SectionHeader { background-color:#8080aa; color:#ffffff; font-family:Verdana; font-size:12px;font-weight:bold;}");
            sbDocBody.Append(".Content { background-color:#ccccff; color:#000000; font-family:Verdana; font-size:12px;text-align:left}");
            sbDocBody.Append(".Label { background-color:#ccccee; color:#000000; font-family:Verdana; font-size:12px; text-align:right;}");
            sbDocBody.Append("</style>");
            //
            StringBuilder sbContent = new StringBuilder(); ;

            sbDocBody.Append("<br><table align=\"center\" cellpadding=1 cellspacing=0 style=\"background-color:#000000;\">");
            sbDocBody.Append("<tr><td width=\"500\">");
            sbDocBody.Append("<table width=\"100%\" cellpadding=1 cellspacing=2 style=\"background-color:#ffffff;\">");

            // Populate the Employee Details

            //
            if (grdSource.Rows.Count > 0)
            {
                sbDocBody.Append("<tr><td>");
                // Inner Table for Employee Details
                sbDocBody.Append("<table width=\"600\" cellpadding=\"0\" cellspacing=\"2\"><tr><td>");
                //
                // Add Column Headers
                sbDocBody.Append("<tr><td width=\"25\"> </td></tr>");
                sbDocBody.Append("<tr>");
                sbDocBody.Append("<td> </td>");
                for (int i = 0; i < grdSource.Columns.Count; i++)
                {
                    sbDocBody.Append("<td class=\"Header\" width=\"120\">" + grdSource.Columns[i].HeaderText + "</td>");
                }
                sbDocBody.Append("</tr>");
                //
                // Add Data Rows
                for (int i = 0; i < grdSource.Rows.Count; i++)
                {
                    sbDocBody.Append("<tr>");
                    sbDocBody.Append("<td> </td>");
                    for (int j = 0; j < grdSource.Columns.Count; j++)
                    {
                        if (grdSource.Rows[i].Cells[j].Controls.Count == 0)
                        {
                            sbDocBody.Append("<td class=\"Content\">" + grdSource.Rows[i].Cells[j].Text + "</td>");
                        }
                        else
                        {
                            if (grdSource.Rows[i].Cells[j].Controls[1].ToString() == "System.Web.UI.WebControls.LinkButton")
                            {
                                LinkButton lnkBtn = (LinkButton)grdSource.Rows[i].Cells[j].Controls[1];
                                sbDocBody.Append("<td class=\"Content\">" + lnkBtn.Text + "</td>");
                            }
                            else if (grdSource.Rows[i].Cells[j].Controls[1].ToString() == "System.Web.UI.WebControls.Label")
                            {
                                Label lblData = (Label)grdSource.Rows[i].Cells[j].Controls[1];
                                sbDocBody.Append("<td class=\"Content\">" + lblData.Text + "</td>");
                            }
                        }
                    }
                    sbDocBody.Append("</tr>");
                }
                sbDocBody.Append("</table>");
                sbDocBody.Append("</td></tr></table>");
                sbDocBody.Append("</td></tr></table>");
            }
            //
            HttpContext.Current.Response.Clear();
            HttpContext.Current.Response.Buffer = true;
            //
            HttpContext.Current.Response.AppendHeader("Content-Type", "application/ms-excel");
            HttpContext.Current.Response.AppendHeader("Content-disposition", "attachment; filename=EmployeeDetails.xls");
            HttpContext.Current.Response.Write(sbDocBody.ToString());
            HttpContext.Current.Response.End();
        }
        catch (Exception ex)
        {
            // Ignore this error as this is caused due to termination of the Response Stream.
        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {

        string attachment = "attachment; filename=Contacts.xls";

        Response.ClearContent();

        Response.AddHeader("content-disposition", attachment);

        Response.ContentType = "application/ms-excel";

        StringWriter sw = new StringWriter();

        HtmlTextWriter htw = new HtmlTextWriter(sw);

    




      

        HtmlForm frm = new HtmlForm();

        GridView1.Parent.Controls.Add(frm);

        frm.Attributes["runat"] = "server";

        frm.Controls.Add(GridView1);



        frm.RenderControl(htw);

       

        Response.Write(sw.ToString());

        Response.End();
       

    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {

        GridViewRow gvr = e.Row;
        if (e.Row.RowType == DataControlRowType.Footer)
        {
           // GridView gv = sender as GridView;
            //GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

           // Table t = (Table)gv.Controls[0];



            //// Adding Cells

            //TableCell FileDate = new TableHeaderCell();

            //FileDate.Text = "Name";
            //FileDate.ColumnSpan = 2;
            //row.Cells.Add(FileDate);
           

            int index = GridView1.Rows.Count;
            GridViewRow row55 = new GridViewRow(0, 0, DataControlRowType.Footer, DataControlRowState.Normal);

            TableCell cell55 = new TableCell();
            cell55.ColumnSpan = 1;
            cell55.Font.Bold = true;
            cell55.Text ="".ToString();
            row55.Cells.Add(cell55);

            TableCell cell56 = new TableCell();
            cell56.ColumnSpan = 1;
            cell56.Font.Bold = true;
            cell56.Text = t.ToString();
            row55.Cells.Add(cell56);


            TableCell cell57 = new TableCell();
            cell57.ColumnSpan = 1;
            cell57.Text = t1.ToString();
            cell57.Font.Bold = true;
            row55.Cells.Add(cell57);


            TableCell cell58 = new TableCell();
            cell58.ColumnSpan = 1;
            cell58.Text = t2.ToString();
            cell58.Font.Bold = true;
            row55.Cells.Add(cell58);

            TableCell cell59 = new TableCell();
            cell59.ColumnSpan = 1;
            cell59.Text = t3.ToString();
            cell59.Font.Bold = true;
            row55.Cells.Add(cell59);

            TableCell cell60 = new TableCell();
            cell60.ColumnSpan = 1;
            cell60.Font.Bold = true;
            cell60.Text = t4.ToString();
            row55.Cells.Add(cell60);

            TableCell cell61 = new TableCell();
            cell61.ColumnSpan = 1;
            cell61.Text = t5.ToString();
            cell61.Font.Bold = true;
            row55.Cells.Add(cell61);

            TableCell cell62 = new TableCell();
            cell62.ColumnSpan = 1;
            cell62.Font.Bold = true;
            cell62.Text =Math.Round( t6,2).ToString();
            row55.Cells.Add(cell62);

            GridView1.Controls[0].Controls.Add(row55);

            GridViewRow row = new GridViewRow(0, 0, DataControlRowType.Footer, DataControlRowState.Normal);

            TableCell cell = new TableCell();
            cell.ColumnSpan = 2;
            cell.Text = "BALANCE FROM PREVIOUS YEAR";
            row.Cells.Add(cell);
            TableCell cell9 = new TableCell();
            cell9.ColumnSpan = 2;
            cell9.Text = Math.Round(Convert.ToDecimal( Label9.Text),2).ToString(); ;
            row.Cells.Add(cell9);
           GridView1.Controls[0].Controls.Add(row);
            
            GridViewRow row1 = new GridViewRow(0, 0, DataControlRowType.Footer, DataControlRowState.Normal);
            TableCell cell1 = new TableCell();
            cell1.ColumnSpan = 2;
            cell1.Text = "DEPOSITS AND REFUNDS";
            row1.Cells.Add(cell1);

            TableCell cell91 = new TableCell();
            cell91.ColumnSpan = 2;
            cell91.Text =Math.Round(Convert.ToDecimal(  Label10.Text),2).ToString(); ;
            row1.Cells.Add(cell91);
            GridView1.Controls[0].Controls.Add(row);


            GridView1.Controls[0].Controls.Add(row1);


            GridViewRow row2 = new GridViewRow(0, 0, DataControlRowType.Footer, DataControlRowState.Normal);
            TableCell cell2 = new TableCell();
            cell2.ColumnSpan = 2;
            cell2.Text = "INTEREST FOR " + DropDownList2.SelectedItem.Text.ToString();
            row2.Cells.Add(cell2);

            TableCell cell93 = new TableCell();
            cell93.ColumnSpan = 2;

            double num3 = (double)1 / (double)12;
            //((Label)e.Row.FindControl("label7")).Text = tot.ToString();
            Label11.Text = Math.Round(Convert.ToDouble(t6 * 8 / 100) * num3, 2).ToString();
            cell93.Text =Math.Round(Convert.ToDecimal(  Label11.Text),2).ToString(); ;
            row2.Cells.Add(cell93);
            //GridView1.Controls[0].Controls.Add(row);

            GridView1.Controls[0].Controls.Add(row2);

            GridViewRow row3 = new GridViewRow(0, 0, DataControlRowType.Footer, DataControlRowState.Normal);
            TableCell cell3 = new TableCell();
            cell3.ColumnSpan = 2;
            cell3.Text = "LESS ADVANCES/WITHDRAWLS(-)";
            row3.Cells.Add(cell3);
            TableCell cell94 = new TableCell();
            cell94.ColumnSpan = 2;
            cell94.Text = Label12.Text.ToString(); ;
            row3.Cells.Add(cell94);

            GridView1.Controls[0].Controls.Add(row3);


            GridViewRow row39 = new GridViewRow(0, 0, DataControlRowType.Footer, DataControlRowState.Normal);
            TableCell cell39 = new TableCell();
            cell39.ColumnSpan = 2;
            cell39.Text = "Final Payment";
            row39.Cells.Add(cell39);
            TableCell cell949 = new TableCell();
            cell949.ColumnSpan = 2;
            cell949.Text = fw.ToString(); ;
            row39.Cells.Add(cell949);

            GridView1.Controls[0].Controls.Add(row39);


            GridViewRow row4 = new GridViewRow(0, 0, DataControlRowType.Footer, DataControlRowState.Normal);
            TableCell cell4 = new TableCell();
            cell4.ColumnSpan = 2;
            cell4.Text = "BALANCE AS ON(31 March)";
            row4.Cells.Add(cell4);
            TableCell cell95 = new TableCell();
            cell95.ColumnSpan = 2;
            //string session = DropDownList2.SelectedItem.Text;
            //DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
            //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            if (check != 0)
            {
                cell95.Text = Math.Round(Convert.ToDecimal(Label13.Text) + Convert.ToDecimal(Label11.Text), 2).ToString(); ;
            }
            else
            {
                cell95.Text = "0".ToString(); ;

            }
            row4.Cells.Add(cell95);

            GridView1.Controls[0].Controls.Add(row4);
        //}

        //if (cc == 0)
        //{
        //    cc = 1;
           GridView gv = sender as GridView;
            GridViewRow rowa = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table ta = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate = new TableHeaderCell();

            //FileDate.Text = "Name";
            FileDate.ColumnSpan = 2;
            rowa.Cells.Add(FileDate);



            TableCell cella = new TableHeaderCell();



           // cell.Text = DropDownList1.SelectedValue.ToString();
            //cella.Text =Label2.Text.ToString();
            cella.Text ="OPENING BALANCE".ToString();
            
            cella.ColumnSpan = 2;
            rowa.Cells.Add(cella);



            ta.Rows.AddAt(0, rowa);



            TableCell cell1a = new TableHeaderCell();
           cell1a.ColumnSpan = 2;


           cell1a.Text = Math.Round(Convert.ToDecimal(Label5.Text), 2).ToString();
            rowa.Cells.Add(cell1a);



            ta.Rows.AddAt(0, rowa);

            TableCell cell2a = new TableHeaderCell();



           // cell2a.Text = Math.Round(Convert.ToDecimal( Label5.Text)).ToString();
            cell2a.ColumnSpan = 2;
            rowa.Cells.Add(cell2a);



            ta.Rows.AddAt(0, rowa);





            Table t8 = (Table)gv.Controls[0];



            // Adding Cells
            GridViewRow row1a = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            TableCell FileDate8 = new TableHeaderCell();

            //FileDate8.Text = "Account Number";
            FileDate8.ColumnSpan = 2;
            row1a.Cells.Add(FileDate8);



            TableCell cell8 = new TableHeaderCell();



            //cell8.Text = DropDownList1.SelectedItem.Text .ToString();
            cell8.Text = "Account Number".ToString();
            
            cell8.ColumnSpan = 2;
            row1a.Cells.Add(cell8);



            t8.Rows.AddAt(0, row1a);



            TableCell cell18 = new TableHeaderCell();
            cell18.ColumnSpan = 2;


            cell18.Text = DropDownList1.SelectedItem.Text;

            row1a.Cells.Add(cell18);



            t8.Rows.AddAt(0, row1a);

            TableCell cell28 = new TableHeaderCell();



            //cell28.Text =Math.Round(Convert.ToDecimal( Label5.Text)).ToString();
            cell28.ColumnSpan = 2;
            row1a.Cells.Add(cell28);



            t8.Rows.AddAt(0, row1a);



            GridViewRow row1a55 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            TableCell FileDate855 = new TableHeaderCell();

            //FileDate8.Text = "Account Number";
            FileDate855.ColumnSpan = 2;
            row1a55.Cells.Add(FileDate855);



            TableCell cell855 = new TableHeaderCell();



            //cell8.Text = DropDownList1.SelectedItem.Text .ToString();
            cell855.Text = "Designation".ToString();

            cell855.ColumnSpan = 2;
            row1a55.Cells.Add(cell855);



            t8.Rows.AddAt(0, row1a55);



            TableCell cell1855 = new TableHeaderCell();
            cell1855.ColumnSpan = 2;


            cell1855.Text = Label16.Text;

            row1a55.Cells.Add(cell1855);



            t8.Rows.AddAt(0, row1a55);

            TableCell cell2855 = new TableHeaderCell();



            //cell28.Text =Math.Round(Convert.ToDecimal( Label5.Text)).ToString();
            cell2855.ColumnSpan = 2;
            row1a55.Cells.Add(cell2855);



            t8.Rows.AddAt(0, row1a55);

            
            
            
            
            GridViewRow row1a9 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            TableCell FileDate89 = new TableHeaderCell();

            //FileDate8.Text = "Account Number";
            FileDate89.ColumnSpan = 2;
            row1a9.Cells.Add(FileDate89);



            TableCell cell89 = new TableHeaderCell();



            //cell8.Text = DropDownList1.SelectedItem.Text .ToString();
            cell89.Text = "Name Of Subscriber".ToString();

            cell89.ColumnSpan = 2;
            row1a9.Cells.Add(cell89);



            t8.Rows.AddAt(0, row1a9);



            TableCell cell189 = new TableHeaderCell();
            cell189.ColumnSpan = 2;


            cell189.Text = Label2.Text;

            row1a9.Cells.Add(cell189);



            t8.Rows.AddAt(0, row1a9);

            TableCell cell289 = new TableHeaderCell();



           // cell289.Text = Math.Round(Convert.ToDecimal(Label5.Text)).ToString();
            cell289.ColumnSpan = 2;
            row1a9.Cells.Add(cell289);



            t8.Rows.AddAt(0, row1a9);

            GridViewRow row1a91 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            TableCell FileDate891 = new TableHeaderCell();

            //FileDate8.Text = "Account Number";
            FileDate891.ColumnSpan = 2;
            row1a91.Cells.Add(FileDate891);



            TableCell cell891 = new TableHeaderCell();



            //cell8.Text = DropDownList1.SelectedItem.Text .ToString();
            cell891.Text = "Year".ToString();

            cell891.ColumnSpan = 2;
            row1a91.Cells.Add(cell891);



            t8.Rows.AddAt(0, row1a91);



            TableCell cell1891 = new TableHeaderCell();
            cell1891.ColumnSpan = 2;


            cell1891.Text = DropDownList2.SelectedItem.Text;

            row1a91.Cells.Add(cell1891);



            t8.Rows.AddAt(0, row1a91);

            TableCell cell2891 = new TableHeaderCell();



            //cell2891.Text = Math.Round(Convert.ToDecimal(Label5.Text)).ToString();
            cell2891.ColumnSpan = 2;
            row1a91.Cells.Add(cell2891);



            t8.Rows.AddAt(0, row1a91);



        }
        
       
    }
}
