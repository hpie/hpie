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
public partial class _Default : System.Web.UI.Page 
{
    public Int32 r2;
    decimal inst = 0;
    decimal stot = 0;
    decimal stot1 = 0;
    Int32 month = 4;
 public   decimal f8 = 0;
 public decimal f9 = 0;
 public decimal f10 = 0;
 public decimal f11 = 0;
 public decimal f12 = 0;
 public decimal f13 = 0;
 public decimal f14 = 0;
 public decimal f15 = 0;
 public decimal f16 = 0;
 public decimal f17 = 0;
 public decimal f18 = 0;
 public decimal f19 = 0;
 public decimal f20 = 0;
 public decimal f21 = 0;
 public decimal f22 = 0;
 public decimal f23 = 0;
 public decimal f24 = 0;
 public decimal f25 = 0;
 public decimal f26 = 0;
 public decimal f27 = 0;
 public decimal f28 = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            session();
        }
    }
   
    private void session()
    {
        for (Int32 y = 2011; y < DateTime.Now.Year + 1; y++)
        {
            DateTime dt = Convert.ToDateTime("04/01/" + y);
            DropDownList1.Items.Add(new ListItem(y.ToString() + "-" + Convert.ToInt32(y + 1), dt.ToString()));
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        r2 = r2 + 1;
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            Int32 aob = 0;
            ArrayList arrd = new ArrayList();
            e.Row.Cells[13].Text = "0".ToString();
            e.Row.Cells[15].Text = "0".ToString();
            month = 4;
            decimal total31 = 0, total3 = 0;
            decimal total41 = 0, total4 = 0;
            decimal inter = 0;
            string ac= ((Label)(e.Row.FindControl("label2"))).Text;
           
            string session = DropDownList1.SelectedItem.Text;
            e.Row.Cells[14].Text = "0".ToString();
            DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
            DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            decimal dur = 0, rec = 0,arear=0, cpf = 0, adjment = 0, ins_adjment = 0,share_dur=0,share_ajment=0;

            decimal odur=0,orec=0, ocpf = 0, oadjment = 0, oins_adjment = 0, oshare_dur = 0, oshare_ajment = 0;
            decimal odur2 = 0, orec2 = 0, ocpf2 = 0, oadjment2 = 0, oins_adjment2 = 0, oshare_dur2 = 0, oshare_ajment2 = 0;
            decimal odur1 = 0, orec1 = 0, ocpf1 = 0, oadjment1 = 0,owithd=0;
            decimal ncpf = 0, nadjment = 0;
            string st1 = "SELECT  date,sum(During_Year) as During_Year, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear FROM cpf where date>='" + sdate + "' and date<='" + edate + "' and ac='" + ac + "' group by date order by date; SELECT  * FROM cpf_detail where date>='" + sdate + "' and date<='" + edate + "' and ac='" + ac + "'; SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac='" + ac + "';SELECT  During_Year, Recovery_o_adv FROM cpf where date<'" + sdate + "' and ac='" + ac+"';SELECT  * FROM cpf_detail where date1>='" + sdate + "' and date1<='" + edate + "' and ac='" + ac+"'" ;

            string st12 = "SELECT date, During_Year, Recovery_o_adv FROM cpf where date<'" + sdate + "' and ac='" + ac + "'; SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac='" + ac+"'" ;


            SqlDataAdapter adp12 = new SqlDataAdapter(st12, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds12 = new DataSet();
            adp12.Fill(ds12);
            Int32 k;
            //for (Int16 a = 0; a < ds12.Tables[1].Rows.Count; a++)
            //{
            //    if (ds12.Tables[1].Rows[a]["cpf_adv"].ToString() != "")
            //    {
            //        ncpf = ncpf + Convert.ToDecimal(ds12.Tables[1].Rows[a]["cpf_adv"]);
            //    }
            //    if (ds12.Tables[1].Rows[a]["adjment"].ToString() != "")
            //    {
            //        ncpf = ncpf + Convert.ToDecimal(ds12.Tables[1].Rows[a]["adjment"]);
            //    }
            //}

            SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds1 = new DataSet();
            adp1.Fill(ds1);


            if (ds1.Tables[2].Rows.Count != 0)
            {
                for (Int16 a = 0; a < ds1.Tables[2].Rows.Count; a++)
                {
                    if (ds1.Tables[2].Rows[a]["cpf_adv"].ToString() != "")
                    {
                        ocpf = ocpf + Convert.ToDecimal(ds1.Tables[2].Rows[a]["cpf_adv"]);
                    }
                    if (ds1.Tables[2].Rows[a]["adjment"].ToString() != "")
                    {
                        oadjment = oadjment + Convert.ToDecimal(ds1.Tables[2].Rows[a]["adjment"]);
                    }
                    if (ds1.Tables[2].Rows[a]["ins_adjment"].ToString() != "")
                    {
                        oins_adjment = oins_adjment + Convert.ToDecimal(ds1.Tables[2].Rows[a]["ins_adjment"]);
                    }
                    if (ds1.Tables[2].Rows[a]["share_dur"].ToString() != "")
                    {
                        oshare_dur = oshare_dur + Convert.ToDecimal(ds1.Tables[2].Rows[a]["share_dur"]);
                    }
                    if (ds1.Tables[2].Rows[a]["share_adjment"].ToString() != "")
                    {
                        oshare_ajment = oshare_ajment + Convert.ToDecimal(ds1.Tables[2].Rows[a]["share_adjment"]);
                    }
                }
            }

        
            string st = "select *from employee where session='" + sdate + "' and ac='" + ac + "';select *from employee where session<='" + sdate + "' and ac='" + ac+"'";
            SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            decimal pob = 0, pinsob = 0, pshare = 0;
            if (ds.Tables[1].Rows.Count != 0)
            {
                for (Int16 i = 0; i < ds.Tables[1].Rows.Count; i++)
                {
                    //pob = pob + ((odur + orec) + (ocpf - oadjment) + pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]));
                    if (ds.Tables[1].Rows[i]["ob"].ToString() != "")
                    {
                        pob = pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]);
                    }
                   
                    pinsob = pinsob + Convert.ToDecimal(ds.Tables[1].Rows[i]["Ins_ob"]);
                    pshare = pshare + Convert.ToDecimal(ds.Tables[1].Rows[i]["Share_ob"]);
                }
            }
            double num3 = (double)1 / (double)12;



            decimal obp = 0, obp1 = 0;
            SqlDataAdapter adp6 = new SqlDataAdapter("select *from cpf where date<'"+sdate+"' and ac='"+ac+"' order by date", ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds6 = new DataSet();
            adp6.Fill(ds6);
            decimal ppob2 = 0;
          
            if (ds6.Tables[0].Rows.Count != 0)
            {

                for (Int16 a = 0; a < ds6.Tables[0].Rows.Count; a++)
                {
                    if (ppob2 == 0)
                    {
                        ppob2 = pob;
                    }
                    string dur90 = "",rec90="";
                    dur90 = ds6.Tables[0].Rows[a]["during_year"].ToString();
                    rec90 = ds6.Tables[0].Rows[a]["recovery_o_adv"].ToString();
                    if (dur90 == "")
                    {
                        ds6.Tables[0].Rows[a]["during_year"] = 0;
                    }
                    if (rec90 == "")
                    {
                        ds6.Tables[0].Rows[a]["recovery_o_adv"] = 0;
                    }
                    obp1 = (Convert.ToDecimal(ds6.Tables[0].Rows[a]["during_year"]) + Convert.ToDecimal(ds6.Tables[0].Rows[a]["recovery_o_adv"]) + ppob2);
                    inter = inter + obp1;
                    if (a < ds6.Tables[0].Rows.Count - 1)
                    {
                        ppob2 = obp1;
                        inter = ppob2;
                    }
                    DateTime dt8 = Convert.ToDateTime(ds6.Tables[0].Rows[a]["date"]);
                    Int32 dd = DateTime.DaysInMonth(dt8.Year, dt8.Month);
                    DateTime dt9 = Convert.ToDateTime(dt8.Month + "/" + dd + "/" + dt8.Year);
                    string ss13 = "select *from cpf_detail where date>='" + dt8 + "' and date<='" + dt9 + "' and ac='" + ac+"'";
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
                                ocpf2 = ocpf2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["cpf_adv"]);
                                oadjment2 = oadjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["adjment"]);
                                //oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["ins_adjment"]);
                                //oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["share_dur"]);
                                //oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["share_adjment"]);

                                //}
                                inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
                                ppob2 = inter;
                                obp1 = ppob2;
                            }
                            else
                            {
                                //ocpf2 = ocpf2 + Convert.ToDecimal(ds93.Tables[0].Rows[a-1]["cpf_adv"]);
                                //oadjment2 = oadjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a-1]["adjment"]);
                                //oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a-1]["ins_adjment"]);
                                //oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds93.Tables[0].Rows[a-1]["share_dur"]);
                                //oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a-1]["share_adjment"]);

                                //}
                                //inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
                                //ppob2 = inter;
                                //obp1 = ppob2;
                            }
                        }
                        else
                        {
                            hh = "dd";
                            inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
                            ppob2 = inter;
                            obp1 = ppob2;
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
               //inter = pob;
            }
           // decimal jk = inter;
            decimal jk = 0;

            //if (obp != 0)
            //{
            //    pob = inter;
            //}
           
            decimal ppob = 0;
            stot1 = 0;
            stot = 0;
            decimal cpf99 = 0, adjment99 = 0;
            //if (ds1.Tables[0].Rows.Count != 0)
            //{
                
                for (Int16 a = 0; a < 12; a++)
                {
                    cpf99 = 0; adjment99 = 0;
                    decimal cpf_adv=0;
                   
                    if (a < ds1.Tables[0].Rows.Count)
                    {
                        if (ppob == 0)
                        {
                            ppob = pob;
                        }
                        string dur90 = "";
                        string rec90 = "";
                        string arear90 = "";
                        dur90 = ds1.Tables[0].Rows[a]["during_year"].ToString();
                        if (dur90 != "")
                        {
                            dur = dur + Convert.ToDecimal(ds1.Tables[0].Rows[a]["during_year"]);
                        }
                        else
                        {
                            ds1.Tables[0].Rows[a]["during_year"] = 0;
                        }
                        rec90 = ds1.Tables[0].Rows[a]["recovery_o_adv"].ToString();
                        if (rec90 != "")
                        {
                            rec = rec + Convert.ToDecimal(ds1.Tables[0].Rows[a]["recovery_o_adv"]);
                        }
                        else
                        {
                            ds1.Tables[0].Rows[a]["recovery_o_adv"] = 0;
                        }
                        arear90 = ds1.Tables[0].Rows[a]["arear"].ToString();
                        if (arear90 != "")
                        {
                            arear = arear + Convert.ToDecimal(ds1.Tables[0].Rows[a]["arear"]);
                        }
                        else
                        {
                            ds1.Tables[0].Rows[a]["arear"] = 0;
                        }

                        //total31 =(Convert.ToDecimal(ds1.Tables[0].Rows[a]["during_year"]) + Convert.ToDecimal(ds1.Tables[0].Rows[a]["recovery_o_adv"]) + ppob);
                        //total3 = total3 + total31;
                    }
                       // DateTime dt8 = Convert.ToDateTime(ds1.Tables[0].Rows[a]["date"]);
                    string yyy = DropDownList1.SelectedItem.Text;
                    string yyy1 = yyy.Substring(0, 4);
                    
                   Int32 yy=0;
                    if(a>=3 && a<=11)
                    {
                        yy=Convert.ToInt32( yyy1);
                    }
                    else
                    {
                        yy =( Convert.ToInt32(yyy1)+1);
                    }
                   // month = month + 1;
                    DateTime dt8;
                    if (ds1.Tables[0].Rows.Count> a)
                    {
                         dt8 = Convert.ToDateTime(ds1.Tables[0].Rows[a]["date"].ToString());

                    }
                    else
                    {
                         dt8 = Convert.ToDateTime((a + 1) + "/01/" + yy.ToString());
                    }
                       

                        Int32 dd = DateTime.DaysInMonth(dt8.Year, dt8.Month);
                        DateTime dt9 = Convert.ToDateTime(dt8.Month + "/" + dd + "/" + dt8.Year);
                        string ss = "select *from cpf_detail where date>='" + dt8 + "' and date<='" + dt9 + "' and ac='" + ac+"'";
                        SqlDataAdapter adp9 = new SqlDataAdapter(ss, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                        DataSet ds9 = new DataSet();
                        adp9.Fill(ds9);
                        if (ds9.Tables[0].Rows.Count != 0)
                        {
                            //cpf = 0;
                            //adjment = 0;
                            //ins_adjment = 0;
                            //share_ajment = 0;
                            //share_dur = 0;

                            for (Int16 a1 = 0; a1 < ds9.Tables[0].Rows.Count; a1++)
                            {
                                
                                string cpf90 = "", adjment90 = "", ins_adjment90 = "", share_dur90 = "", share_ajment90 = "";
                                cpf90 = ds9.Tables[0].Rows[a1]["cpf_adv"].ToString();
                                adjment90 = ds9.Tables[0].Rows[a1]["adjment"].ToString();
                                ins_adjment90 = ds9.Tables[0].Rows[a1]["ins_adjment"].ToString();
                                share_dur90 = ds9.Tables[0].Rows[a1]["share_dur"].ToString();
                                share_ajment90 = ds9.Tables[0].Rows[a1]["share_adjment"].ToString();

                                if (cpf90 != "")
                                {
                                    cpf = cpf + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["cpf_adv"]);
                                }
                                else
                                {
                                    ds9.Tables[0].Rows[a1]["cpf_adv"] = 0;
                                }
                                if (adjment90 != "")
                                {
                                    adjment = adjment + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["adjment"]);
                                }
                                else
                                {
                                    ds9.Tables[0].Rows[a1]["adjment"] = 0;
                                }
                                if (ins_adjment90 != "")
                                {
                                    ins_adjment = ins_adjment + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["ins_adjment"]);
                                }
                                else
                                {
                                    ds9.Tables[0].Rows[a1]["ins_adjment"] = 0;
                                }
                                if (share_dur90 != "")
                                {
                                    share_dur = share_dur + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["share_dur"]);
                                }
                                else
                                {
                                    ds9.Tables[0].Rows[a1]["share_dur"] = 0;
                                }
                                if (share_ajment90 != "")
                                {
                                    share_ajment = share_ajment + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["share_adjment"]);
                                }
                                else
                                {
                                    ds9.Tables[0].Rows[a1]["share_adjment"] = 0;
                                }
                                cpf99 = Convert.ToDecimal(ds9.Tables[0].Rows[a1]["cpf_adv"]);
                                adjment99 = Convert.ToDecimal(ds9.Tables[0].Rows[a1]["adjment"]);
                            }
                            //total31 = total31 - ((cpf) + Convert.ToDecimal(adjment));
                            //ppob = total31;
                            //total3 = ppob;
                        }
                   cpf_adv = (adjment99+cpf99);

                    string yyy9 = DropDownList1.SelectedItem.Text;
                    string yyy19 = yyy9.Substring(0, 4);

                    Int32 yy9 = 0;
                    Int32 a3 = a + 4;
                    if (a3 == 13)
                    {
                        a3 = 1;
                    }
                    if (a3 == 14)
                    {
                        a3 = 2;
                    }
                    if (a3 == 15)
                    {
                        a3 = 3;
                    }
                    if (a3 >= 4 && a3 <= 12)
                    {
                        yy9 = Convert.ToInt32(yyy19);
                    }
                    else
                    {
                        yy9 = (Convert.ToInt32(yyy19) + 1);
                    }

                    //if (a < ds1.Tables[0].Rows.Count)
                    //{
                    if (arrd.Count == 0)
                    {
                        string std2 = "select *from deput where  ac='" + ac+"'";

                        SqlDataAdapter adpd2 = new SqlDataAdapter(std2, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                        DataSet dsd2 = new DataSet();
                        adpd2.Fill(dsd2);
                        if (dsd2.Tables[0].Rows.Count != 0)
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
                    }
                    DateTime sd = Convert.ToDateTime(a3 + "/01/" + yy9.ToString());
                    DateTime ed = Convert.ToDateTime(a3 + "/" + DateTime.DaysInMonth(yy9, sd.Month).ToString() + "/" + yy9);
                        DateTime dd14 = sd;
                        bool anothermatch = arrd.Contains(dd14);
                        if (anothermatch == false)
                        {
                            decimal rec901 = 0, du90 = 0, ar90=0;
                              decimal cp901 = 0, ad90 = 0,wth90=0;
                            string st29 = "SELECT  date,sum(During_Year) as During_Year, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear FROM cpf where date>='" + sd + "' and date<='" + ed + "' and ac='" + ac + "' group by date order by date;select sum(cpf_adv) as cpf_adv,sum(adjment) as adjment,sum(cpf_withd) as cpf_withd from cpf_detail where date>='"+sd+"' and date<='"+ed+"' and ac='"+ac+"';select sum(cpf_adv) as cpf_adv,sum(adjment) as adjment,sum(cpf_withd) as cpf_withd from cpf_detail where date<='"+ed+"' and ac='"+ac+"'";
                            SqlDataAdapter ad29 = new SqlDataAdapter(st29, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                            DataSet ds29 = new DataSet();
                            ad29.Fill(ds29);
                            if (ds29.Tables[0].Rows.Count != 0)
                            {
                                for (Int32 h = 0; h < ds29.Tables[0].Rows.Count; h++)
                                {
                                    if (ds29.Tables[0].Rows[h]["recovery_o_adv"].ToString() != "")
                                    rec901 = rec901 + Convert.ToDecimal(ds29.Tables[0].Rows[h]["recovery_o_adv"]);
                                    if (ds29.Tables[0].Rows[h]["during_year"].ToString() != "")
                                    du90 = du90 + Convert.ToDecimal(ds29.Tables[0].Rows[h]["during_year"]);
                                    if(ds29.Tables[0].Rows[h]["arear"].ToString()!="")
                                    ar90 = ar90 + Convert.ToDecimal(ds29.Tables[0].Rows[h]["arear"]);
                                }
                            }
                           
                            if (ds29.Tables[1].Rows.Count != 0)
                            {
                                for (Int32 h1 = 0; h1 < ds29.Tables[1].Rows.Count; h1++)
                                {
                                    if (ds29.Tables[1].Rows[h1]["cpf_adv"].ToString() != "")
                                   cp901 = cp901 + Convert.ToDecimal(ds29.Tables[1].Rows[h1]["cpf_adv"]);
                                    if (ds29.Tables[1].Rows[h1]["adjment"].ToString() != "")
                                    ad90 = ad90 + Convert.ToDecimal(ds29.Tables[1].Rows[h1]["adjment"]);
                                  
                                
                                }
                            }
                            if (ds29.Tables[2].Rows.Count != 0)
                            {
                                for (Int32 h1 = 0; h1 < ds29.Tables[2].Rows.Count; h1++)
                                {
                                    if (ds29.Tables[2].Rows[0]["cpf_withd"].ToString() != "")
                                        wth90 = wth90 + Convert.ToDecimal(ds29.Tables[2].Rows[h1]["cpf_withd"]);
                                }
                            }
                            if (wth90 == 0)
                            {
                                if (aob == 0)
                                {
                                    aob = 3;
                                    stot = stot + ((Convert.ToDecimal(rec901) + Convert.ToDecimal(du90) + Convert.ToDecimal(ar90) + pob + pinsob) - (cp901 + ad90));
                                }
                                else
                                {
                                    stot = stot + (((Convert.ToDecimal(rec901) + Convert.ToDecimal(du90) + Convert.ToDecimal(ar90))) - (cp901 + ad90));


                                }
                                stot1 = stot1 + stot;
                            }
                        }
                   // }
                    

                    
               }
           // }
            string tt = "";
            if (ds1.Tables[3].Rows.Count != 0)
            {
                decimal ppob1 = 0;
                for (Int16 a = 0; a < ds1.Tables[3].Rows.Count; a++)
                {
                    if (ppob1 == 0)
                    {
                        ppob1 = pob;
                    }
                    string odur90 = "";
                    string orec90 = "";
                    odur90 = ds1.Tables[3].Rows[a]["during_year"].ToString();
                    orec90 = ds1.Tables[3].Rows[a]["recovery_o_adv"].ToString();
                    if (odur90 == "")
                    {
                        ds1.Tables[3].Rows[a]["during_year"] = 0;
                    }
                    if (orec90 == "")
                    {
                        ds1.Tables[3].Rows[a]["recovery_o_adv"] = 0;
                    }
                    odur = odur + Convert.ToDecimal(ds1.Tables[3].Rows[a]["during_year"]);
                    orec = orec + Convert.ToDecimal(ds1.Tables[3].Rows[a]["recovery_o_adv"]);

                    total41 = (Convert.ToDecimal(ds1.Tables[3].Rows[a]["during_year"]) + Convert.ToDecimal(ds1.Tables[3].Rows[a]["recovery_o_adv"]) + ppob1);
                    total4 = total4 + total41;

                    string ss1 = "select *from cpf_detail where date<'" + sdate + "' and ac='" + ac+"'";
                    SqlDataAdapter adp91 = new SqlDataAdapter(ss1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds91 = new DataSet();
                    adp91.Fill(ds91);
                    if (tt == "")
                    {
                        if (ds91.Tables[0].Rows.Count != 0)
                        {
                            ocpf2 = 0;
                            oadjment2 = 0;
                            //for (Int16 a2 = 0; a2 < ds91.Tables[0].Rows.Count; a2++)
                            //{
                            if (a <= ds91.Tables[0].Rows.Count - 1)
                            {
                                if (ds91.Tables[0].Rows[a]["cpf_adv"].ToString() != "")
                                {
                                    ocpf2 = ocpf2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["cpf_adv"]);
                                }
                                if (ds91.Tables[0].Rows[a]["adjment"].ToString() != "")
                                {
                                    oadjment2 = oadjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["adjment"]);
                                }
                                if (ds91.Tables[0].Rows[a]["ins_adjment"].ToString() != "")
                                {
                                    oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["ins_adjment"]);
                                }
                                if (ds91.Tables[0].Rows[a]["share_dur"].ToString() != "")
                                {
                                    oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_dur"]);
                                }
                                if (ds91.Tables[0].Rows[a]["share_adjment"].ToString() != "")
                                {
                                    oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_adjment"]);
                                }

                                //}
                                total41 = total41 - ((ocpf2) + Convert.ToDecimal(oadjment2));
                                ppob1 = total41;
                                total4 = ppob1;
                            }
                        }
                        else
                        {
                            tt = "ss";
                            total41 = total41 - ((ocpf2) + Convert.ToDecimal(oadjment2));
                            ppob1 = total41;
                            total4 = ppob1;
                        }
                    }
                }
            }
           
            if (ds1.Tables[1].Rows.Count != 0)
            {
                for (Int16 a = 0; a < ds1.Tables[1].Rows.Count; a++)
                {
                    //cpf = cpf + Convert.ToDecimal(ds1.Tables[1].Rows[a]["cpf_adv"]);
                    //adjment = adjment + Convert.ToDecimal(ds1.Tables[1].Rows[a]["adjment"]);
                    //ins_adjment = ins_adjment + Convert.ToDecimal(ds1.Tables[1].Rows[a]["ins_adjment"]);
                    //share_dur = share_dur + Convert.ToDecimal(ds1.Tables[1].Rows[a]["share_dur"]);
                    //share_ajment = share_ajment + Convert.ToDecimal(ds1.Tables[1].Rows[a]["share_adjment"]);
                    //total3 = total3 + ((cpf + adjment));
                    //total31 = total31 - total3;
                }
            }

            if (ds12.Tables[0].Rows.Count != 0)
            {

                
                for (Int32 a = 0; a < ds12.Tables[0].Rows.Count; a++)
                {

                    string odur901 = "";
                    string orec901 = "";
                    odur901 = ds12.Tables[0].Rows[a]["during_year"].ToString();
                    orec901 = ds12.Tables[0].Rows[a]["recovery_o_adv"].ToString();
                    if (odur901 != "")
                    {
                        odur1 = odur1 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["during_year"]);
                    }
                    if (orec901 != "")
                    {
                        orec1 = orec1 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["recovery_o_adv"]);
                    }
                    //odur1 = odur1 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["during_year"]);
                    //orec1 = orec1 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["recovery_o_adv"]);
                }
            }

            if (ds1.Tables[1].Rows.Count != 0)
            {
                for (Int32 a = 0; a < ds1.Tables[1].Rows.Count; a++)
                {
                    if (ds1.Tables[1].Rows[a]["cpf_adv"].ToString() != "")
                    {
                        ocpf1 = ocpf1 + Convert.ToDecimal(ds1.Tables[1].Rows[a]["cpf_adv"]);
                    }
                    if (ds1.Tables[1].Rows[a]["adjment"].ToString() != "")
                    {
                        oadjment1 = oadjment1 + Convert.ToDecimal(ds1.Tables[1].Rows[a]["adjment"]);
                    }
                   
                }
            }
            if (ds1.Tables[4].Rows.Count != 0)
            {
                for (Int32 a = 0; a < ds1.Tables[4].Rows.Count; a++)
                {
                    if (ds1.Tables[4].Rows[a]["cpf_withd"].ToString() != "")
                    {
                        owithd = owithd + Convert.ToDecimal(ds1.Tables[4].Rows[a]["cpf_withd"]);
                    }
                }
            }
            ((Label)(e.Row.FindControl("label5"))).Text = Math.Round(dur).ToString();
            ((Label)(e.Row.FindControl("label6"))).Text = Math.Round((rec+arear)).ToString();
            e.Row.Cells[7].Text = ocpf1.ToString();
            e.Row.Cells[8].Text = (oadjment1).ToString();

          //decimal total2 = Convert.ToDecimal(((odur1 + orec1 + pob) - (ocpf1 - oadjment1)));





            if (ds.Tables[0].Rows.Count != 0)
            {
               // e.Row.Cells[3].Text = ((odur + orec) + (ocpf - oadjment) + pob+Convert.ToDecimal(ds.Tables[0].Rows[0]["ob"])).ToString();
                e.Row.Cells[3].Text =Math.Round( ((odur + orec) + (ocpf - oadjment) + pob )).ToString();
               
                //e.Row.Cells[14].Text =Math.Round( oins_adjment+ Convert.ToDecimal(ds.Tables[0].Rows[0]["Ins_ob"]),2).ToString();
                e.Row.Cells[10].Text = Math.Round((((pshare + oshare_dur) - oshare_ajment) + Convert.ToDecimal(ds.Tables[0].Rows[0]["Share_ob"]))).ToString();
            }
            else
            {
                e.Row.Cells[3].Text =Math.Round( ((odur + orec+ pob) - (ocpf - oadjment) )).ToString();
               // e.Row.Cells[14].Text =Math.Round( (pinsob-oins_adjment),2).ToString();
                e.Row.Cells[10].Text =Math.Round( ((pshare + oshare_dur) - oshare_ajment)).ToString();
            }


            pob = Convert.ToDecimal(e.Row.Cells[3].Text);
            decimal test = 0;
            decimal ppob9 = 0;
            if (ds1.Tables[0].Rows.Count != 0)
            {
                for (Int16 a = 0; a < ds1.Tables[0].Rows.Count; a++)
                {

                    if (ppob9 == 0)
                    {
                        if (jk == 0)
                        {
                            ppob9 = pob;
                        }
                        else
                        {
                            ppob9 = jk;
                        }
                    }
                    //dur = dur + Convert.ToDecimal(ds1.Tables[0].Rows[a]["during_year"]);
                    //rec = rec + Convert.ToDecimal(ds1.Tables[0].Rows[a]["recovery_o_adv"]);

                    total31 = (Convert.ToDecimal(ds1.Tables[0].Rows[a]["during_year"]) + Convert.ToDecimal(ds1.Tables[0].Rows[a]["recovery_o_adv"]) + ppob9);
                    //if (Convert.ToDecimal(Convert.ToDecimal(ds1.Tables[0].Rows[a]["during_year"]) + Convert.ToDecimal(ds1.Tables[0].Rows[a]["recovery_o_adv"])) != 0)
                    //{
                    total3 = total31;

                    //}
                    //else
                    //{
                    // total3 = total3 + total31;

                    //}
                    DateTime dt8 = Convert.ToDateTime(ds1.Tables[0].Rows[a]["date"]);
                    Int32 dd = DateTime.DaysInMonth(dt8.Year, dt8.Month);
                    DateTime dt9 = Convert.ToDateTime(dt8.Month + "/" + dd + "/" + dt8.Year);
                    string ss = "select *from cpf_detail where date>='" + dt8 + "' and date<='" + dt9 + "' and ac='" + ac+"'";
                    SqlDataAdapter adp9 = new SqlDataAdapter(ss, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                    DataSet ds9 = new DataSet();
                    adp9.Fill(ds9);
                    cpf = 0;
                    adjment = 0;

                    if (test == 0)
                    {
                        if (ds9.Tables[0].Rows.Count != 0)
                        {
                            cpf = 0;
                            adjment = 0;
                            //ins_adjment = 0;
                            //share_ajment = 0;
                            //share_dur = 0;

                            for (Int16 a1 = 0; a1 < ds9.Tables[0].Rows.Count; a1++)
                            {

                                if (ds9.Tables[0].Rows[a1]["cpf_adv"].ToString() != "")
                                    cpf = cpf + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["cpf_adv"]);
                                if (ds9.Tables[0].Rows[a1]["adjment"].ToString() != "")
                                    adjment = adjment + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["adjment"]);
                                //ins_adjment = ins_adjment + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["ins_adjment"]);
                                //share_dur = share_dur + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["share_dur"]);
                                //share_ajment = share_ajment + Convert.ToDecimal(ds9.Tables[0].Rows[a1]["share_adjment"]);

                            }
                            //test = 1;
                            total31 = total31 - ((cpf) + Convert.ToDecimal(adjment));
                            ppob9 = total31;
                            total3 = ppob9;
                            inst = inst + total3;
                        }
                        else
                        {
                            //test = 1;
                            total31 = total31 - ((cpf) + Convert.ToDecimal(adjment));
                            ppob9 = total31;
                            total3 = ppob9;
                            inst = inst + total3;
                        }

                    }
                    else
                    {

                        total31 = total31 - ((cpf) + Convert.ToDecimal(adjment));
                        ppob9 = total31;
                        total3 = ppob9;
                        inst = inst + total3;
                    }
                }
            }
            else
            {
                inst = 0;
            }

            e.Row.Cells[6].Text =Math.Round( (Convert.ToDecimal(e.Row.Cells[3].Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label5"))).Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label6"))).Text))).ToString();
            if (owithd == 0)
            {
                e.Row.Cells[6].Text = Math.Round((Convert.ToDecimal(e.Row.Cells[3].Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label5"))).Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label6"))).Text))).ToString();

                e.Row.Cells[9].Text = Math.Round((Convert.ToDecimal(e.Row.Cells[6].Text) - Convert.ToDecimal(e.Row.Cells[7].Text) - Convert.ToDecimal(e.Row.Cells[8].Text))).ToString();
            }
            else
            {
                e.Row.Cells[8].Text = Math.Round((Convert.ToDecimal(e.Row.Cells[6].Text)-Convert.ToDecimal(e.Row.Cells[7].Text) )).ToString();

                e.Row.Cells[9].Text = "0".ToString();

            }
               // decimal total = Convert.ToDecimal(e.Row.Cells[3].Text) + ((Convert.ToDecimal(((Label)(e.Row.FindControl("label5"))).Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label6"))).Text)) - (Convert.ToDecimal(e.Row.Cells[7].Text) + Convert.ToDecimal(e.Row.Cells[8].Text)));
          //decimal total = Convert.ToDecimal(e.Row.Cells[3].Text);
            decimal total = (inst);
            //decimal jk = Convert.ToDecimal((((odur + orec + pob) - (ocpf - oadjment))+(odur+orec)));
          
           
            decimal total2 = Convert.ToDecimal(obp);
            total2 = Math.Round((decimal)((double)(jk * 8 / 100) * (num3)), 2);
         
       decimal total1 = Math.Round((decimal)((double)(stot1* 8 / 100) * (num3)), 2);
         // decimal total1 = Math.Round(total, 2);
        
 
            //decimal total1 = Math.Round(total, 2);
            //decimal total21 = Math.Round(total2, 2);
       //if (owithd == 0)
       //{
     
           e.Row.Cells[15].Text = Math.Round(total1).ToString();

      
          e.Row.Cells[14].Text =Math.Round( ((total2 - oins_adjment2) + pinsob)).ToString();
       
          e.Row.Cells[16].Text = Math.Round(ins_adjment).ToString();
          if (owithd == 0)
          {
              e.Row.Cells[14].Text = Math.Round(((total2 - oins_adjment2) + pinsob)).ToString();
          }
          else
          {
             // e.Row.Cells[14].Text = "0".ToString();
              e.Row.Cells[16].Text = Math.Round((((total2 - oins_adjment2) + pinsob)+total1)).ToString();
          }
          e.Row.Cells[17].Text = Math.Round(((Convert.ToDecimal(e.Row.Cells[14].Text) + Convert.ToDecimal(e.Row.Cells[15].Text)) - Convert.ToDecimal(e.Row.Cells[16].Text))).ToString();
          e.Row.Cells[11].Text =share_dur .ToString();
          e.Row.Cells[12].Text = share_ajment.ToString();
          //if (owithd == 0)
          //{
              e.Row.Cells[13].Text = ((Convert.ToDecimal(e.Row.Cells[10].Text) + Convert.ToDecimal(e.Row.Cells[11].Text)) - Convert.ToDecimal(e.Row.Cells[12].Text)).ToString();
          //}
          //else
          //{
          //    e.Row.Cells[15].Text = ((Convert.ToDecimal(e.Row.Cells[10].Text) + Convert.ToDecimal(e.Row.Cells[11].Text)) - Convert.ToDecimal(e.Row.Cells[12].Text)).ToString();

          //}

                e.Row.Cells[18].Text = "0".ToString();
          e.Row.Cells[19].Text = "0".ToString();
          e.Row.Cells[20].Text = "0".ToString();
          e.Row.Cells[21].Text =Math.Round( ((Convert.ToDecimal(e.Row.Cells[18].Text) + Convert.ToDecimal(e.Row.Cells[19].Text)) - Convert.ToDecimal(e.Row.Cells[20].Text))).ToString();
          //if (owithd == 0)
          //{
              e.Row.Cells[22].Text = Math.Round(((Convert.ToDecimal(e.Row.Cells[17].Text) + Convert.ToDecimal(e.Row.Cells[21].Text)))).ToString();
          //}
          //else
          //{
          //    e.Row.Cells[22].Text ="0".ToString();

          //}
              if (owithd == 0)
              {
                  e.Row.Cells[23].Text = Math.Round(((Convert.ToDecimal(e.Row.Cells[9].Text) + Convert.ToDecimal(e.Row.Cells[13].Text) + Convert.ToDecimal(e.Row.Cells[22].Text)))).ToString();
              }
              else
              {
                  e.Row.Cells[23].Text = "0".ToString();
              }
                f8 = f8 + Convert.ToDecimal(e.Row.Cells[3].Text);
         f9 = f9 + Convert.ToDecimal(((Label)(e.Row.FindControl("label5"))).Text);
         f10 = f10 + Convert.ToDecimal(((Label)(e.Row.FindControl("label6"))).Text);
         f11 = f11 + Convert.ToDecimal(e.Row.Cells[6].Text);
         f12 = f12 + Convert.ToDecimal(e.Row.Cells[7].Text);
         f13 = f13 + Convert.ToDecimal(e.Row.Cells[8].Text);
         f14 = f14 + Convert.ToDecimal(e.Row.Cells[9].Text);
         f15 = f15 + Convert.ToDecimal(e.Row.Cells[10].Text);
         f16 = f16 + Convert.ToDecimal(e.Row.Cells[11].Text);
         f17 = f17 + Convert.ToDecimal(e.Row.Cells[12].Text);
         f18 = f18 + Convert.ToDecimal(e.Row.Cells[13].Text);
         f19 = f19 + Convert.ToDecimal(e.Row.Cells[14].Text);
         f20 = f20 + Convert.ToDecimal(e.Row.Cells[15].Text);
         f21 = f21 + Convert.ToDecimal(e.Row.Cells[16].Text);
         f22 = f22 + Convert.ToDecimal(e.Row.Cells[17].Text);
         f23 = f23 + Convert.ToDecimal(e.Row.Cells[18].Text);
         f24 = f24 + Convert.ToDecimal(e.Row.Cells[19].Text);
         f25 = f25 + Convert.ToDecimal(e.Row.Cells[20].Text);
         f26 = f26 + Convert.ToDecimal(e.Row.Cells[21].Text);
         f27 = f27 + Convert.ToDecimal(e.Row.Cells[22].Text);
         f28 = f28 + Convert.ToDecimal(e.Row.Cells[23].Text);
        }
        //if (e.Row.RowType == DataControlRowType.Footer)
        //{
           
        //}
       
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {

            GridView gv = sender as GridView;
            //((Label)gv.HeaderRow.FindControl("label8")).Text = "dd".ToString();
            if (gv.HasControls())
            {


                GridViewRow row = new GridViewRow(0, 2, DataControlRowType.Header, DataControlRowState.Normal);
                Table t = (Table)GridView1.Controls[0];

                // Adding Cells
                TableCell FileDate = new TableHeaderCell();
                FileDate.Text = "Particulars";
                FileDate.ColumnSpan = 3;
                row.Cells.Add(FileDate);

                TableCell cell = new TableHeaderCell();
                cell.ColumnSpan = 7; // ********
                cell.Text = "CPF Subscription";
                row.Cells.Add(cell);
                //t.Rows.AddAt(0, row);

                //TableCell FileDate1 = new TableHeaderCell();
                //FileDate1.ColumnSpan = 0;
                //row.Cells.Add(FileDate1);

                //TableCell cell1 = new TableHeaderCell();
                //cell1.ColumnSpan = 4; // ********
                //cell1.Text = "Employer's Share";
                //row.Cells.Add(cell1);

                TableCell cell2 = new TableHeaderCell();
                cell2.ColumnSpan = 4; // ********
                cell2.Text = "Interest on Subscription";
                row.Cells.Add(cell2);
                t.Rows.AddAt(0, row);
                //TableCell cell3 = new TableHeaderCell();
                //cell3.ColumnSpan = 4; // ********
                //cell3.Text = "Interest on Employer Share";
                //row.Cells.Add(cell3);
                //TableCell cell4 = new TableHeaderCell();
                //cell4.ColumnSpan = 2; // ********
                //cell4.Text = "Progressive total issue";
                //row.Cells.Add(cell4);
                //TableCell cell5 = new TableHeaderCell();
                //cell5.ColumnSpan = 2; // ********
                //cell5.Text = "Balance";
                //row.Cells.Add(cell5);
                //TableCell cell6 = new TableHeaderCell();

                //cell6.Text = "";
                //row.Cells.Add(cell6);
                //t.Rows.AddAt(0, row);


                //next row
                //if (e.Row.RowType == DataControlRowType.Header)
                //{

                GridViewRow tr = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
                //for (short i = 1; i <= 13; ++i)
                //{
                TableCell td = new TableCell();
                td.Text = "1".ToString();
                tr.Cells.Add(td);
                //}

                TableCell td1 = new TableCell();
                td1.Text = "2".ToString();
                tr.Cells.Add(td1);

                TableCell td2 = new TableCell();
                td2.Text = "3".ToString();
                tr.Cells.Add(td2);
                TableCell td26 = new TableCell();
                td26.Text = "4".ToString();
                tr.Cells.Add(td26);


                TableCell td27 = new TableCell();
                td27.Text = "5".ToString();
                tr.Cells.Add(td27);
                TableCell td3 = new TableCell();
                td3.Text = "6".ToString();
                tr.Cells.Add(td3);

                TableCell td4 = new TableCell();
                td4.Text = "7".ToString();
                tr.Cells.Add(td4);

                TableCell td5 = new TableCell();
                td5.Text = "8".ToString();
                tr.Cells.Add(td5);


                TableCell td6 = new TableCell();
                td6.Text = "9".ToString();
                tr.Cells.Add(td6);

                TableCell td7 = new TableCell();
                td7.Text = "10".ToString();
                tr.Cells.Add(td7);

                //TableCell td8 = new TableCell();
                //td8.Text = "11".ToString();
                //tr.Cells.Add(td8);

                //TableCell td9 = new TableCell();
                //td9.Text = "12".ToString();
                //tr.Cells.Add(td9);


                //TableCell td10 = new TableCell();
                //td10.Text = "13".ToString();
                //tr.Cells.Add(td10);

                //TableCell td11 = new TableCell();
                //td11.Text = "14".ToString();
                //tr.Cells.Add(td11);

                TableCell td12 = new TableCell();
                td12.Text = "11".ToString();
                tr.Cells.Add(td12);

                TableCell td13 = new TableCell();
                td13.Text = "12".ToString();
                tr.Cells.Add(td13);

                TableCell td14 = new TableCell();
                td14.Text = "13".ToString();
                tr.Cells.Add(td14);


                TableCell td141 = new TableCell();
                td141.Text = "14".ToString();
                tr.Cells.Add(td141);


                //TableCell td142 = new TableCell();
                //td142.Text = "19".ToString();
                //tr.Cells.Add(td142);

                //TableCell td143 = new TableCell();
                //td143.Text = "20".ToString();
                //tr.Cells.Add(td143);
                //TableCell td144 = new TableCell();
                //td144.Text = "21".ToString();
                //tr.Cells.Add(td144);

                //TableCell td145 = new TableCell();
                //td145.Text = "22".ToString();
                //tr.Cells.Add(td145);


                TableCell td146 = new TableCell();
                td146.Text = "15".ToString();
                tr.Cells.Add(td146);

                //TableCell td147 = new TableCell();
                //td147.Text = "16".ToString();
                //tr.Cells.Add(td147);
                ((Table)gv.Controls[0]).Rows.Add(tr);
                //}

            }
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
       // string session = DropDownList1.SelectedItem.Text;
     
       // DateTime sdate =Convert.ToDateTime( "04/01/" + session.Substring(0, 4));
       //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
       //SqlDataSource1.SelectParameters["sdate"].DefaultValue = sdate.ToString();
       //SqlDataSource1.SelectParameters["edate"].DefaultValue = edate.ToString();
       DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
       GridView1.DataSource = dv;
       GridView1.DataBind(); 
    }
    public void exportGridToExcel(Control ctl)
    {
        string attachment = "attachment; filename=etrack_excel_export.xls";
        HttpContext.Current.Response.ClearContent();
        HttpContext.Current.Response.AddHeader("content-disposition", attachment);
        HttpContext.Current.Response.ContentType = "application/ms-excel";
        StringWriter stw = new StringWriter();
        HtmlTextWriter htextw = new HtmlTextWriter(stw);

        ctl.RenderControl(htextw);
        HttpContext.Current.Response.Write(stw.ToString());
        HttpContext.Current.Response.End();
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
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
    protected void Button1_Click(object sender, EventArgs e)
    {
        // string session = DropDownList1.SelectedItem.Text;

        // DateTime sdate =Convert.ToDateTime( "04/01/" + session.Substring(0, 4));
        //DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
        //SqlDataSource1.SelectParameters["sdate"].DefaultValue = sdate.ToString();
        //SqlDataSource1.SelectParameters["edate"].DefaultValue = edate.ToString();
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind(); 
    }
}
