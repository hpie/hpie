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
using System.Text;
using System.IO;
public partial class view : System.Web.UI.Page
{
    Int32 a1 = 0;
    decimal total = 0;
    decimal tot = 0, tot1 = 0, tot2 = 0, tot3 = 0, tot4 = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
            session();
    }
    private void session()
    {
        for (Int32 y = 2000; y < DateTime.Now.Year + 1; y++)
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
    //private void bind()
    //{
          
    //        Int32 yy =Convert.ToInt32( DropDownList2.SelectedItem.Text.Substring(0, 4));
    //        decimal total31 = 0, total3 = 0;
    //        decimal total41 = 0, total4 = 0;
    //        decimal odur2 = 0, orec2 = 0, ocpf2 = 0, oadjment2 = 0, oins_adjment2 = 0, oshare_dur2 = 0, oshare_ajment2 = 0;
    //        decimal odur = 0, orec = 0, ocpf = 0, oadjment = 0, oins_adjment = 0, oshare_dur = 0, oshare_ajment = 0;

    //        //ob
    //        string session = DropDownList2.SelectedItem.Text;
    //        DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
    //        DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
    //        string ac=Label3.Text;
    //        string st = "select *from employee where session='" + sdate + "' and ac=" + Label3.Text + ";select *from employee where session<'" + sdate + "' and ac=" + Label3.Text;
    //        SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
    //        DataSet ds = new DataSet();
    //        adp.Fill(ds);
    //        decimal pob = 0, pinsob = 0, pshare = 0;
    //        if (ds.Tables[1].Rows.Count != 0)
    //        {
    //            for (Int16 i = 0; i < ds.Tables[1].Rows.Count; i++)
    //            {
    //                //pob = pob + ((odur + orec) + (ocpf - oadjment) + pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]));
    //                pob = pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]);
    //                pinsob = pinsob + Convert.ToDecimal(ds.Tables[1].Rows[i]["Ins_ob"]);
    //                pshare = pshare + Convert.ToDecimal(ds.Tables[1].Rows[i]["Share_ob"]);
    //            }
    //        }

    //        string st1 = "SELECT  date,During_Year, Recovery_o_adv FROM cpf where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + " order by date; SELECT  * FROM cpf_detail where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + "; SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac=" + ac + ";SELECT  During_Year, Recovery_o_adv FROM cpf where date<'" + sdate + "' and ac=" + ac;


    //        SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
    //        DataSet ds1 = new DataSet();
    //        adp1.Fill(ds1);
            


    //        decimal obp = 0, obp1 = 0;
    //        SqlDataAdapter adp6 = new SqlDataAdapter("select *from cpf where date<'" + sdate + "' and ac=" + ac + " order by date", ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
    //        DataSet ds6 = new DataSet();
    //        adp6.Fill(ds6);
    //        decimal ppob2 = 0;
    //        decimal inter = 0;
    //        if (ds6.Tables[0].Rows.Count != 0)
    //        {

    //            for (Int16 a = 0; a < ds6.Tables[0].Rows.Count; a++)
    //            {
    //                if (ppob2 == 0)
    //                {
    //                    ppob2 = pob;
    //                }
    //                obp1 = (Convert.ToDecimal(ds6.Tables[0].Rows[a]["during_year"]) + Convert.ToDecimal(ds6.Tables[0].Rows[a]["recovery_o_adv"]) + ppob2);
    //                inter = inter + obp1;
    //                if (a < ds6.Tables[0].Rows.Count - 1)
    //                {
    //                    ppob2 = obp1;
    //                    inter = ppob2;
    //                }
    //                DateTime dt8 = Convert.ToDateTime(ds6.Tables[0].Rows[a]["date"]);
    //                Int32 dd = DateTime.DaysInMonth(dt8.Year, dt8.Month);
    //                DateTime dt9 = Convert.ToDateTime(dt8.Month + "/" + dd + "/" + dt8.Year);
    //                string ss13 = "select *from cpf_detail where date>='" + dt8 + "' and date<='" + dt9 + "' and ac=" + ac;
    //                SqlDataAdapter adp93 = new SqlDataAdapter(ss13, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
    //                DataSet ds93 = new DataSet();
    //                string tt1 = "";
    //                adp93.Fill(ds93);
    //                string hh = "";
    //                if (hh == "")
    //                {
    //                    if (ds93.Tables[0].Rows.Count != 0)
    //                    {
    //                        ocpf2 = 0;
    //                        oadjment2 = 0;
    //                        //for (Int16 a2 = 0; a2 < ds91.Tables[0].Rows.Count; a2++)
    //                        //{
    //                        if (a <= ds93.Tables[0].Rows.Count - 1)
    //                        {
    //                            ocpf2 = ocpf2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["cpf_adv"]);
    //                            oadjment2 = oadjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["adjment"]);
    //                            //oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["ins_adjment"]);
    //                            //oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["share_dur"]);
    //                            //oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds93.Tables[0].Rows[a]["share_adjment"]);

    //                            //}
    //                            inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
    //                            ppob2 = inter;
    //                            obp1 = ppob2;
    //                        }


    //                    }
    //                    else
    //                    {
    //                        // hh = "dd";
    //                        //inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
    //                        //ppob2 = inter;
    //                        //obp1 = ppob2;
    //                    }
    //                }
    //                else
    //                {
    //                    hh = "ss";
    //                    inter = inter - ((ocpf2) + Convert.ToDecimal(oadjment2));
    //                    ppob2 = inter;
    //                    obp1 = ppob2;
    //                }


    //            }

    //        }
    //        else
    //        {
    //            inter = pob;
    //        }
    //        decimal jk = inter;
    //        string tt = "";
    //        if (ds1.Tables[3].Rows.Count != 0)
    //        {
    //            decimal ppob1 = 0;
    //            for (Int16 a = 0; a < ds1.Tables[3].Rows.Count; a++)
    //            {
    //                if (ppob1 == 0)
    //                {
    //                    ppob1 = pob;
    //                }
    //                odur = odur + Convert.ToDecimal(ds1.Tables[3].Rows[a]["during_year"]);
    //                orec = orec + Convert.ToDecimal(ds1.Tables[3].Rows[a]["recovery_o_adv"]);

    //                total41 = (Convert.ToDecimal(ds1.Tables[3].Rows[a]["during_year"]) + Convert.ToDecimal(ds1.Tables[3].Rows[a]["recovery_o_adv"]) + ppob1);
    //                total4 = total4 + total41;

    //                string ss1 = "select *from cpf_detail where date<'" + sdate + "' and ac=" + ac;
    //                SqlDataAdapter adp91 = new SqlDataAdapter(ss1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
    //                DataSet ds91 = new DataSet();
    //                adp91.Fill(ds91);
    //                if (tt == "")
    //                {
    //                    if (ds91.Tables[0].Rows.Count != 0)
    //                    {
    //                        ocpf2 = 0;
    //                        oadjment2 = 0;
    //                        //for (Int16 a2 = 0; a2 < ds91.Tables[0].Rows.Count; a2++)
    //                        //{
    //                        if (a <= ds91.Tables[0].Rows.Count - 1)
    //                        {
    //                            ocpf2 = ocpf2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["cpf_adv"]);
    //                            oadjment2 = oadjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["adjment"]);
    //                            oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["ins_adjment"]);
    //                            oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_dur"]);
    //                            oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_adjment"]);

    //                            //}
    //                            total41 = total41 - ((ocpf2) + Convert.ToDecimal(oadjment2));
    //                            ppob1 = total41;
    //                            total4 = ppob1;
    //                        }
    //                    }
    //                    else
    //                    {
    //                        tt = "ss";
    //                        total41 = total41 - ((ocpf2) + Convert.ToDecimal(oadjment2));
    //                        ppob1 = total41;
    //                        total4 = ppob1;
    //                    }
    //                }
    //            }
    //        }
    //        else
    //        {
    //            total4 = jk;
    //        }

    //        DateTime dt81 = sdate;
          
    //        DateTime dt91 = edate;
    //        string st12 = "select *from cpf where date>='" + dt81 + "' and date<='" + dt91+ "' and ac=" + Label3.Text + ";select *from cpf_detail where date>='" + dt81 + "' and date<='" + dt91 + "' and ac=" + Label3.Text;
    //        SqlDataAdapter adp12 = new SqlDataAdapter(st12, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
    //        DataSet ds12 = new DataSet();
    //        adp12.Fill(ds12);
    //      decimal sub = 0;
    //            decimal sub1 = 0;   
    //    if (ds12.Tables[0].Rows.Count != 0)
    //        {
              
    //            for (Int32 a = 0; a < ds12.Tables[0].Rows.Count; a++)
    //            {
    //                sub = sub + Convert.ToDecimal(ds12.Tables[0].Rows[a]["recovery_o_adv"]);
    //                sub1 = sub1 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["during_year"]);
    //            }
    //        }

    //    decimal sub2 = 0;
    //    decimal sub21 = 0;
    //    if (ds12.Tables[1].Rows.Count != 0)
    //    {

    //        for (Int32 a = 0; a < ds12.Tables[1].Rows.Count; a++)
    //        {
    //            sub2 = sub2 + Convert.ToDecimal(ds12.Tables[1].Rows[a]["cpf_adv"]);
    //            sub21 = sub21 + Convert.ToDecimal(ds12.Tables[1].Rows[a]["adjment"]);
    //        }
    //    }
    //        Label4.Text = total4.ToString();
    //        Label19.Text = sdate.ToString("dd.MM.yyyy");
    //        Label6.Text = (sub + sub1).ToString();

    //}
    protected void Button1_Click(object sender, EventArgs e)
    {
        table.Visible = true;
        string st12 = "select *from employee where ac='" + DropDownList1.SelectedValue + "'";
        SqlDataAdapter adp12 = new SqlDataAdapter(st12, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
        DataSet ds12 = new DataSet();
        adp12.Fill(ds12);
        Label2.Text = ds12.Tables[0].Rows[0]["name"].ToString();
        Label3.Text = DropDownList1.SelectedItem.Text.ToString();
        if (TextBox1.Text == "")
        {
            Label1.Text = DropDownList2.SelectedItem.Text;
        }
        else
        {
            Label1.Text = "";
        }
        bind();
    }
    protected void GridView1_RowDataBound1(object sender, GridViewRowEventArgs e)
    {
        decimal arear = 0;
         if (e.Row.RowType == DataControlRowType.DataRow)
        {
            
            Int32 yy =Convert.ToInt32( DropDownList2.SelectedItem.Text.Substring(0, 4));
            decimal total31 = 0, total3 = 0;
            decimal total41 = 0, total4 = 0;
            decimal odur2 = 0, orec2 = 0, ocpf2 = 0, oadjment2 = 0, oins_adjment2 = 0, oshare_dur2 = 0, oshare_ajment2 = 0;
            decimal odur = 0, orec = 0, ocpf = 0, oadjment = 0, oins_adjment = 0, oshare_dur = 0, oshare_ajment = 0;
         
            //ob
            DateTime sdate;
            DateTime edate;
            string session = "";
            if (TextBox1.Text == "")
            {
                session = DropDownList2.SelectedItem.Text;
                sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
                edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            }
            else
            {
            sdate  = Convert.ToDateTime(DateTime.Parse(TextBox1.Text , System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

            edate = Convert.ToDateTime(DateTime.Parse(TextBox2.Text , System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            }
            string ac=Label3.Text;
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
                    pob = pob + Convert.ToDecimal(ds.Tables[1].Rows[i]["ob"]);
                    pinsob = pinsob + Convert.ToDecimal(ds.Tables[1].Rows[i]["Ins_ob"]);
                    pshare = pshare + Convert.ToDecimal(ds.Tables[1].Rows[i]["Share_ob"]);
                }
            }


           string st1 = "SELECT  date,During_Year, Recovery_o_adv,arear FROM cpf where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + " order by date; SELECT  * FROM cpf_detail where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + "; SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac=" + ac + ";SELECT  During_Year, Recovery_o_adv FROM cpf where date<'" + sdate + "' and ac=" + ac;


           SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
           DataSet ds1 = new DataSet();
           adp1.Fill(ds1);
            
            
            
            
            
            
            decimal obp = 0, obp1 = 0;
            SqlDataAdapter adp6 = new SqlDataAdapter("select *from cpf where date<='" + sdate + "' and ac=" + ac + " order by date", ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds6 = new DataSet();
            adp6.Fill(ds6);
            decimal ppob2 = 0;
            decimal inter = 0;
            if (ds6.Tables[0].Rows.Count != 0)
            {

                for (Int16 a = 0; a < ds6.Tables[0].Rows.Count; a++)
                {
                    if (ppob2 == 0)
                    {
                        ppob2 = pob;
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
                    odur = odur + Convert.ToDecimal(ds1.Tables[3].Rows[a]["during_year"]);
                    orec = orec + Convert.ToDecimal(ds1.Tables[3].Rows[a]["recovery_o_adv"]);

                    total41 = (Convert.ToDecimal(ds1.Tables[3].Rows[a]["during_year"]) + Convert.ToDecimal(ds1.Tables[3].Rows[a]["recovery_o_adv"]) + ppob1);
                    total4 = total4 + total41;

                    string ss1 = "select *from cpf_detail where date<'" + sdate + "' and ac=" + ac;
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
                                ocpf2 = ocpf2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["cpf_adv"]);
                                oadjment2 = oadjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["adjment"]);
                                oins_adjment2 = oins_adjment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["ins_adjment"]);
                                oshare_dur2 = oshare_dur2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_dur"]);
                                oshare_ajment2 = oshare_ajment2 + Convert.ToDecimal(ds91.Tables[0].Rows[a]["share_adjment"]);

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
            else
            {
                total4 = jk;
            }

               Label19.Text = sdate.ToString("dd-MM-yyyy");
              //DateTime endate = sdate.AddYears(1);
              Label21.Text = edate.ToString("dd-MM-yyyy");

               Label4.Text =Math.Round( (pob + pinsob),0).ToString();
            //end


            e.Row.Cells[1].Text = "0.00".ToString();
            e.Row.Cells[2].Text = "0.00".ToString();
            e.Row.Cells[3].Text = "0.00".ToString();
            e.Row.Cells[4].Text = "0.00".ToString();
            e.Row.Cells[5].Text = "0.00".ToString();
            e.Row.Cells[6].Text = "0.00".ToString();
            e.Row.Cells[7].Text = "0.00".ToString();
            string mm = ((Label)(e.Row.FindControl("label20"))).Text;
            DateTime dd12;
            if ( mm == "JANUARY" || mm == "FEBRUARY" || mm == "MARCH")
            {
               dd12 = Convert.ToDateTime(mm + "/01/" + (yy+1));
            }
            else
            {
              dd12 = Convert.ToDateTime(mm + "/01/" + yy);
            }
            
            DateTime dt81 = dd12;
            Int32 dd1 = DateTime.DaysInMonth(dt81.Year, dt81.Month);
            DateTime dt91 = Convert.ToDateTime(dt81.Month + "/" + dd1 + "/" + dt81.Year);
            string st12 = "select *from cpf where date>='" + dt81 + "' and date<='" + dt91+ "' and ac=" + Label3.Text + ";select *from cpf_detail where date>='" + dt81 + "' and date<='" + dt91 + "' and ac=" + Label3.Text;
            SqlDataAdapter adp12 = new SqlDataAdapter(st12, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds12 = new DataSet();
            adp12.Fill(ds12);
            if (ds12.Tables[0].Rows.Count != 0)
            {
                decimal sub = 0;
                decimal sub1 = 0;
                for (Int32 a = 0; a < ds12.Tables[0].Rows.Count; a++)
                {
                    sub = sub + Convert.ToDecimal(ds12.Tables[0].Rows[a]["recovery_o_adv"]);
                    sub1 = sub1 + Convert.ToDecimal(ds12.Tables[0].Rows[a]["during_year"]);
                    string arear90 = "";
                    arear90 = ds1.Tables[0].Rows[a]["arear"].ToString();
                    if (arear90 != "")
                    {
                        arear = arear + Convert.ToDecimal(ds12.Tables[0].Rows[a]["arear"]);
                    }
                }
                e.Row.Cells[1].Text = sub.ToString();
                e.Row.Cells[2].Text = sub1.ToString();
                e.Row.Cells[4].Text =(sub+ sub1+arear).ToString();

            }

            if (ds12.Tables[1].Rows.Count != 0)
            {
                decimal sub = 0;
                decimal sub1 = 0;
                for (Int32 a = 0; a < ds12.Tables[1].Rows.Count; a++)
                {
                    sub = sub + Convert.ToDecimal(ds12.Tables[1].Rows[a]["cpf_adv"]);
                    sub1 = sub1 + Convert.ToDecimal(ds12.Tables[1].Rows[a]["adjment"]);
                }
                //e.Row.Cells[1].Text = sub.ToString();
                //e.Row.Cells[2].Text = sub1.ToString();
                e.Row.Cells[5].Text = (sub + sub1).ToString();

            }
            
            e.Row.Cells[6].Text = (Convert.ToDecimal(e.Row.Cells[4].Text) - Convert.ToDecimal(e.Row.Cells[5].Text)).ToString();
            if (e.Row.Cells[4].Text != "0.00".ToString())
            {
                if (a1 == 0)
                {
                    total = total + (Convert.ToDecimal(e.Row.Cells[6].Text) + Convert.ToDecimal(Label4.Text));


                }
                else
                {
                    total = total + (Convert.ToDecimal(e.Row.Cells[6].Text));

                }
                a1 = a1 + 1;
                tot = tot + total;
                tot1 = tot1 + Convert.ToDecimal(e.Row.Cells[4].Text);
                tot2 = tot2 + Convert.ToDecimal(e.Row.Cells[5].Text);
            }
                e.Row.Cells[7].Text = total.ToString();
            //}
            //else
            //{
            //    e.Row.Cells[7].Text = total4.ToString();
            //}
                tot3 = tot3 + Convert.ToDecimal(e.Row.Cells[4].Text);
                tot4 = tot4 + Convert.ToDecimal(e.Row.Cells[5].Text);
             
        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            double num3 = (double)1 / (double)12;
          ((Label)e.Row.FindControl("label7")).Text = tot.ToString();
          Label8.Text =Math.Round(Convert.ToDouble (tot * 8 / 100) * num3,0).ToString();
          Label6.Text = Math.Round(tot3,0).ToString();
          Label10.Text = (Convert.ToDecimal(Label4.Text) + Convert.ToDecimal(Label6.Text) + Convert.ToDecimal(Label8.Text)).ToString();
          Label12.Text = tot4.ToString();
          Label16.Text = (Convert.ToDecimal(Label10.Text) - Convert.ToDecimal(Label12.Text)).ToString();
        }
        //Label9.Text =Label5.Text.ToString();
        //Label10.Text = tot1.ToString();
        //Label11.Text = Label6.Text.ToString();
        //Label12.Text = tot2.ToString();
        // = tot.ToString();
   
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

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
        exportGridToExcel(table);








     
    }
    protected void btnPrint_Click(object sender, EventArgs e)
    {

    }
}
