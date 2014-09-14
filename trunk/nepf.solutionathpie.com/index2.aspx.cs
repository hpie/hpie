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
    DateTime t31, t41;

    public Int32 r2=1;
    public Int32 r3 = 1;
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
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            for (Int32 k = 3; k <= 23; k++)
            {
                e.Row.Cells[k].Text = "0".ToString();
            }
            string ac = ((Label)(e.Row.FindControl("label2"))).Text;
                          ArrayList arrd = new ArrayList();
                          ArrayList arrd1 = new ArrayList();

                          string std2 = "select *from deput where  ac='" + ac + "';" +
                              "select *from cpf_detail where ac='" + ac + "' and cpf_withd!=0";

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

            if (dsd2.Tables[1].Rows.Count != 0)
            {
                for (Int32 j = 0; j < dsd2.Tables[1].Rows.Count; j++)
                {
                    if (dsd2.Tables[1].Rows[j]["date"].ToString() != "")
                    {
                      t31 = Convert.ToDateTime(dsd2.Tables[1].Rows[j]["date"]);
                        if(dsd2.Tables[1].Rows[j]["date1"].ToString()!="")
                      t41 = Convert.ToDateTime(dsd2.Tables[1].Rows[j]["date1"]);
                        else
                            t41 = Convert.ToDateTime(dsd2.Tables[1].Rows[j]["date"]);


                    }
                    //DateTime t3 = Convert.ToDateTime(t1.Month + "/01/" + t1.Year);
                    //DateTime t4 = Convert.ToDateTime(t2.Month + "/01/" + t2.Year);
                
                    for (DateTime date = t31; date < t41; date = date.AddMonths(1))
                    {
                        arrd1.Add(date);
                    }
                }
            }
            

            Int32 ch2 = 0;
            

            string session = DropDownList1.SelectedItem.Text;
            e.Row.Cells[14].Text = "0".ToString();
            DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
            DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            decimal ob = 0,total12=0,inob=0,insob=0;
            string st1 = "SELECT  ob,ins_ob as ob FROM employee where session<='" + sdate + "' and ac='" + ac + "'";
            
            SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds1 = new DataSet();
            adp1.Fill(ds1);


            if (ds1.Tables[0].Rows.Count != 0)
            {
                if(ds1.Tables[0].Rows[0][0].ToString()!="")
                ob =Convert.ToDecimal(ds1.Tables[0].Rows[0][0]);
                if (ds1.Tables[0].Rows[0][1].ToString() != "")
                {
                    ob = ob + Convert.ToDecimal(ds1.Tables[0].Rows[0][1]);
                    insob = insob + Convert.ToDecimal(ds1.Tables[0].Rows[0][1]);
                }
            }
            string[] yy =DropDownList1.SelectedItem.Text.Split('-');
            Int32 check = 0, check1 = 0;
            if (yy[0] != "2011")
            {
                for (Int32 y = 2011; y <Convert.ToInt32(yy[0]); y++)
                {
                    decimal orec = 0, orec1 = 0, orec2 = 0;

                    decimal total = 0;
                    DateTime fdate = Convert.ToDateTime("4/1/" + y);
                    DateTime fdate1 = Convert.ToDateTime("4/1/" + (y + 1));
                    for (DateTime dt = fdate; dt < fdate1; dt.AddMonths(0))
                    {
                        decimal orec3 = 0, orec4 = 0, orec5 = 0, orec6 = 0, orec7 = 0, orec8 = 0;
                        decimal cpf_adv = 0, adjment = 0, wid = 0;
                        orec1 = 0;
                        //Deput


                       
           
            bool anothermatch = arrd.Contains(dt);
            bool anothermatch1 = arrd1.Contains(dt);

            //  string std = "select *from deput where s_date<'" + dd14+ "'  and ac=" + Label3.Text + ";select *from deput where e_date>='" + dd14+"' and ac=" + Label3.Text;

            //SqlDataAdapter adpd = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            //DataSet dsd = new DataSet();
            //adpd.Fill(dsd);

            if (anothermatch == false && anothermatch1 == false)
            {



                //end






                DateTime sd = dt.AddDays(DateTime.DaysInMonth(dt.Year, dt.Month));
                //string st = "select (sum(during_year+recovery_o_adv+arear)-sum(cpf_adv+adjment)) as sub from cpf where date>='" + dt + "' and date<'"+sd+"' and ac='" + ac + "'";
                string st = "select * from cpf where date>='" + dt + "' and date<'" + sd + "' and ac='" + ac + "';select * from cpf_detail where date>='" + dt + "' and date<'" + sd + "' and ac='" + ac + "'";

                SqlDataAdapter adp2 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                DataSet ds2 = new DataSet();
                adp2.Fill(ds2);
                if (ds2.Tables[0].Rows.Count != 0)
                {


                    for (Int32 j = 0; j < ds2.Tables[0].Rows.Count; j++)
                    {

                        //if (ds2.Tables[0].Rows.Count != "")
                        //{

                        if (ds2.Tables[0].Rows[j]["during_year"].ToString() != "")
                            orec4 = orec4 + Math.Round(Convert.ToDecimal(ds2.Tables[0].Rows[j]["during_year"]));
                        if (ds2.Tables[0].Rows[j]["recovery_o_adv"].ToString() != "")
                            orec5 = orec5 + Math.Round(Convert.ToDecimal(ds2.Tables[0].Rows[j]["recovery_o_adv"]));
                        if (ds2.Tables[0].Rows[j]["arear"].ToString() != "")
                            orec6 = orec6 + Math.Round(Convert.ToDecimal(ds2.Tables[0].Rows[j]["arear"]));
                        if (ds2.Tables[0].Rows[j]["cpf_adv"].ToString() != "")
                            orec7 = orec3 + Math.Round(Convert.ToDecimal(ds2.Tables[0].Rows[j]["cpf_adv"]));
                        if (ds2.Tables[0].Rows[j]["adjment"].ToString() != "")
                            orec8 = orec3 + Math.Round(Convert.ToDecimal(ds2.Tables[0].Rows[j]["adjment"]));
                        // }
                    }

                }
                if (ds2.Tables[1].Rows.Count != 0)
                {
                    for (Int32 j = 0; j < ds2.Tables[1].Rows.Count; j++)
                    {
                        if (ds2.Tables[1].Rows[j]["cpf_adv"].ToString() != "")
                            cpf_adv = cpf_adv + Math.Round(Convert.ToDecimal(ds2.Tables[1].Rows[j]["cpf_adv"]));
                        if (ds2.Tables[1].Rows[j]["adjment"].ToString() != "")
                            adjment = adjment + Math.Round(Convert.ToDecimal(ds2.Tables[1].Rows[j]["adjment"]));


                    }
                }
                orec1 = ((orec4 + orec5 + orec6) - (orec7 + orec8 + cpf_adv + adjment));

                if (check == 0)
                {
                    if (check1 == 0)
                    {
                        orec = orec1 + ob;
                    }
                    else
                    {
                        orec = orec1 + total12;
                        ob = total12;

                    }
                    check = 1;
                }
                else
                {

                    orec = orec + orec1;
                }
                orec2 = orec2 + orec1;
                total = total + orec;
            }
            else
            {
                
            }
           
                        dt = dt.AddMonths(1);
                    }
                    double num3 = (double)1 / (double)12;
                    total12 = Math.Round((decimal)((double)(total * 8 / 100) * (num3)), 2);
                    inob = inob + total12;
                    //if (y <=Convert.ToInt32(yy[0]))
                    //{
                        total12 = Math.Round(total12 + ob + orec2);
                    //}
                    //else
                    //{

                    //}
                    check = 0;
                    check1 = 1;
                }
                //ob = total12;
                e.Row.Cells[3].Text = total12.ToString("0");
                e.Row.Cells[14].Text = (inob+insob).ToString("0");
            }
            else
            {
                e.Row.Cells[3].Text = ob.ToString("0");
                e.Row.Cells[14].Text = insob.ToString("0");


            }
            DateTime ww = Convert.ToDateTime("04/01/" + yy[0]);
            DateTime ww1 = Convert.ToDateTime("04/01/" + yy[1]);
            string st3 = "select sum(cpf_withd) as s from cpf_detail where   date<'" + ww + "' and ac='" + ac + "' and date1 is not null group by cpf_withd;"+
            "select *from cpf where date>='" + ww + "' and date<'" + ww1 + "' and ac='" + ac + "';"+
            "select cpf_adv,date from cpf_detail where   date>='" + ww + "' and date<'" + ww1 + "' and ac='" + ac + "';"+
            "select cpf_withd,date from cpf_detail where   date<'" + ww1 + "' and ac='" + ac + "'"+
            "select * from cpf_detail where   date1>='" + ww1 + "' and ac='" + ac + "' and date1 is not null";        ;
            Decimal during = 0, recov = 0, arear = 0, cpf_with = 0, cpf_with1 = 0;
            SqlDataAdapter adp3 = new SqlDataAdapter(st3, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds3 = new DataSet();
            adp3.Fill(ds3);
            if (ds3.Tables[0].Rows.Count != 0)
            {
                if (ds3.Tables[0].Rows[0][0].ToString() != "")
                {

                    if(Convert.ToInt32(ds3.Tables[0].Rows[0][0])>=1)
                    {
                        e.Row.Cells[8].Text = ds3.Tables[0].Rows[0][0].ToString();
                        e.Row.Cells[16].Text = ds3.Tables[0].Rows[0][0].ToString();
                       // if(Convert.ToDateTime(ds3.Tables[0].Rows[0]["date"])==Convert.ToDateTime(ds3.Tables[0].Rows[0]["date1"]))
                        ch2 = 1;
                       // e.Row.Cells[3].Text = "0".ToString();
                    }

                }
            }

            if (ds3.Tables[4].Rows.Count != 0)
            {
                if (ds3.Tables[4].Rows[0][0].ToString() != "")
                {

                    //if (Convert.ToInt32(ds3.Tables[0].Rows[4][0]) >= 1)
                    //{
                        //e.Row.Cells[8].Text = ds3.Tables[0].Rows[0][0].ToString();
                        //e.Row.Cells[16].Text = ds3.Tables[0].Rows[0][0].ToString();
                    if (ds3.Tables[4].Rows[0]["date1"].ToString() == "")
                    {
                        ds3.Tables[4].Rows[0]["date1"] = ds3.Tables[4].Rows[0]["date"];
                    }
                        if (Convert.ToDateTime(ds3.Tables[4].Rows[0]["date"]) > Convert.ToDateTime(ds3.Tables[4].Rows[0]["date1"]))
                            ch2 = 2;
                        //e.Row.Cells[3].Text = "0".ToString();
                  //  }

                }
            }

            if (ds3.Tables[1].Rows.Count != 0)
            {
                for (Int32 j = 0; j < ds3.Tables[1].Rows.Count; j++)
                {
                    DateTime dt = Convert.ToDateTime(ds3.Tables[1].Rows[j]["date"]);
                     bool anothermatch = arrd.Contains(dt);
            //  string std = "select *from deput where s_date<'" + dd14+ "'  and ac=" + Label3.Text + ";select *from deput where e_date>='" + dd14+"' and ac=" + Label3.Text;

            //SqlDataAdapter adpd = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            //DataSet dsd = new DataSet();
            //adpd.Fill(dsd);

                     if (anothermatch == false)
                     {

                         if (ds3.Tables[1].Rows[j]["during_year"].ToString() != "")
                             during = during + Convert.ToDecimal(ds3.Tables[1].Rows[j]["during_year"]);
                         if (ds3.Tables[1].Rows[j]["recovery_o_adv"].ToString() != "")
                             recov = recov + Convert.ToDecimal(ds3.Tables[1].Rows[j]["recovery_o_adv"]);
                         if (ds3.Tables[1].Rows[j]["arear"].ToString() != "")
                             arear = arear + Convert.ToDecimal(ds3.Tables[1].Rows[j]["arear"]);
                     }    
                }
            }
            if (ds3.Tables[2].Rows.Count != 0)
            {
                for (Int32 j = 0; j < ds3.Tables[2].Rows.Count; j++)
                {
                    DateTime dt = Convert.ToDateTime(ds3.Tables[2].Rows[j]["date"]);
                     bool anothermatch = arrd.Contains(dt);
            //  string std = "select *from deput where s_date<'" + dd14+ "'  and ac=" + Label3.Text + ";select *from deput where e_date>='" + dd14+"' and ac=" + Label3.Text;

            //SqlDataAdapter adpd = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            //DataSet dsd = new DataSet();
            //adpd.Fill(dsd);

                     if (anothermatch == false)
                     {

                         if (ds3.Tables[2].Rows[j][0].ToString() != "")
                             cpf_with = cpf_with + Convert.ToDecimal(ds3.Tables[2].Rows[j][0]);
                     }
                
                }
            }
            if (ds3.Tables[3].Rows.Count != 0)
            {
                for (Int32 j = 0; j < ds3.Tables[3].Rows.Count; j++)
                {
                    if (ds3.Tables[3].Rows[j][0].ToString() != "")
                        cpf_with1 = cpf_with1 + Convert.ToDecimal(ds3.Tables[3].Rows[j][0]);

                }
            }
            if (ch2 != 2)
            {
                e.Row.Cells[8].Text = cpf_with1.ToString("0");
                e.Row.Cells[16].Text = cpf_with1.ToString("0");
            }

            decimal ytot = 0, ytot1 = 0;
            string[] yy1 =DropDownList1.SelectedItem.Text.Split('-');
            Int32 y2 =Convert.ToInt32(yy1[0]);
            Int32 ch = 0,ch1=0;
            if (y2 != 201)
            { 
                DateTime fdate = Convert.ToDateTime("4/1/" + y2);
                    DateTime fdate1 = Convert.ToDateTime("4/1/" + (y2 + 1));
                    for (DateTime dt = fdate; dt < fdate1; dt.AddMonths(0))
                    {
                        //deput

                                    
            bool anothermatch = arrd.Contains(dt);
            //  string std = "select *from deput where s_date<'" + dd14+ "'  and ac=" + Label3.Text + ";select *from deput where e_date>='" + dd14+"' and ac=" + Label3.Text;

            //SqlDataAdapter adpd = new SqlDataAdapter(std, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            //DataSet dsd = new DataSet();
            //adpd.Fill(dsd);

            if (anothermatch == false)
            {
        


                        //end

                        DateTime w = Convert.ToDateTime(dt.Month + "/" + DateTime.DaysInMonth(dt.Year, dt.Month) + "/" + dt.Year);
                        string st4 = "select *from cpf where date>='"+dt+"' and date<='"+w+"' and ac='"+ac+"';select cpf_adv,adjment,cpf_withd from cpf_detail where date>='"+dt+"' and date<='"+w+"' and ac='"+ac+"'";
                        SqlDataAdapter adp4 = new SqlDataAdapter(st4, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
                        DataSet ds4 = new DataSet();
                        adp4.Fill(ds4);
                        if (ds4.Tables[0].Rows.Count != 0)
                        {
                            decimal ydur = 0, yrec = 0, ycpf = 0, yarear = 0;
                            for (Int32 j = 0; j < ds4.Tables[0].Rows.Count; j++)
                            {
                                if(ds4.Tables[0].Rows[j]["during_year"].ToString()!="")
                                ydur = ydur + Convert.ToDecimal(ds4.Tables[0].Rows[j]["during_year"]);
                                if (ds4.Tables[0].Rows[j]["recovery_o_adv"].ToString() != "")
                                    ydur = ydur + Convert.ToDecimal(ds4.Tables[0].Rows[j]["recovery_o_adv"]);
                                //if (ds4.Tables[0].Rows[j]["cpf_adv"].ToString() != "")
                                   // ydur = ydur + Convert.ToDecimal(ds4.Tables[0].Rows[j]["cpf_adv"]);
                                if (ds4.Tables[0].Rows[j]["arear"].ToString() != "")
                                    ydur = ydur + Convert.ToDecimal(ds4.Tables[0].Rows[j]["arear"]);
                                

                            }
                            ytot=ytot+(ydur);
                        }
                        decimal ycpfa = 0, yadj = 0;
                        if (ds4.Tables[1].Rows.Count != 0)
                        {
                            
                            for (Int32 j = 0; j < ds4.Tables[1].Rows.Count; j++)
                            {
                                if (ds4.Tables[1].Rows[j]["cpf_adv"].ToString() != "")
                                    ycpfa = ycpfa + Convert.ToDecimal(ds4.Tables[1].Rows[j]["cpf_adv"]);
                                if (ds4.Tables[1].Rows[j]["adjment"].ToString() != "")
                                    ycpfa = ycpfa + Convert.ToDecimal(ds4.Tables[1].Rows[j]["adjment"]);
                                if (ds4.Tables[1].Rows[j]["cpf_withd"].ToString() != "")
                                    yadj = yadj + Convert.ToDecimal(ds4.Tables[1].Rows[j]["cpf_withd"]);
                                
                            }
                        }
                        if (yadj >= 1)
                        {
                            ch1 = 1;
                        }
                        if (ch1 == 0)
                        {
                            ytot = ytot - ycpfa;
                            if (ch == 0)
                            {
                                ytot = ytot + Convert.ToInt32(e.Row.Cells[3].Text);
                                ch = 1;
                            }
                            ytot1 = ytot1 + ytot;
                        }
                    }
                        dt = dt.AddMonths(1);
                    }
                    double num3 = (double)1 / (double)12;
                    total12 = Math.Round((decimal)((double)(ytot1 * 8 / 100) * (num3)));
                    e.Row.Cells[15].Text = total12.ToString("0");
            }
            if (ch2 == 2)
            {
                e.Row.Cells[15].Text = "0".ToString();
            }
            e.Row.Cells[4].Text = (during).ToString("0");

         
            e.Row.Cells[7].Text = (cpf_with).ToString("0");
            //e.Row.Cells[9].Text = Convert.ToInt32(e.Row.Cells[6].Text).ToString("0");
           
            e.Row.Cells[3].Text = (Convert.ToDecimal(e.Row.Cells[3].Text) - Convert.ToDecimal(e.Row.Cells[14].Text)).ToString();
            e.Row.Cells[5].Text = (recov + arear).ToString("0");
            e.Row.Cells[6].Text = (Convert.ToInt32(e.Row.Cells[3].Text) + Convert.ToInt32(e.Row.Cells[4].Text) + Convert.ToInt32(e.Row.Cells[5].Text)).ToString("0");

            if (Convert.ToInt32(e.Row.Cells[8].Text) <= 0)
            {
                e.Row.Cells[9].Text = (Convert.ToInt32(e.Row.Cells[6].Text) - (Convert.ToInt32(e.Row.Cells[7].Text) + Convert.ToInt32(e.Row.Cells[8].Text))).ToString("0");

                e.Row.Cells[17].Text = ((Convert.ToInt32(e.Row.Cells[14].Text) + Convert.ToInt32(e.Row.Cells[15].Text)) - Convert.ToInt32(e.Row.Cells[16].Text)).ToString("0");

                e.Row.Cells[23].Text = (Convert.ToInt32(e.Row.Cells[9].Text) + Convert.ToInt32(e.Row.Cells[17].Text)).ToString("0");
                // e.Row.Cells[23].Text = (Convert.ToInt32(e.Row.Cells[9].Text)).ToString("0");

            }
            else
            {
                e.Row.Cells[8].Text = (Convert.ToInt32(e.Row.Cells[6].Text) - Convert.ToInt32(e.Row.Cells[7].Text)).ToString("0");
                e.Row.Cells[9].Text = (Convert.ToInt32(e.Row.Cells[6].Text) - (Convert.ToInt32(e.Row.Cells[7].Text) + Convert.ToInt32(e.Row.Cells[8].Text))).ToString("0");

                e.Row.Cells[16].Text = (Convert.ToInt32(e.Row.Cells[14].Text) + Convert.ToInt32(e.Row.Cells[15].Text)).ToString("0");

            }
           
            if (ch2 == 1)
            {
                for (Int32 k = 3; k <= 23; k++)
                {
                    e.Row.Cells[k].Text = "0".ToString();
                }
            }

            if (ch2 == 1)
            {
                e.Row.Visible = false;
            }
            else
            {
                r3 = r3 + 1;
                e.Row.Visible = true;
            }
        }
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
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind(); 
    }
}
