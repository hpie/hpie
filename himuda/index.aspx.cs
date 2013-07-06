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
            //Int32 aob = 0;
            //ArrayList arrd = new ArrayList();
            //e.Row.Cells[13].Text = "0".ToString();
            //e.Row.Cells[15].Text = "0".ToString();
            //month = 4;
            decimal total31 = 0, total3 = 0;
            decimal total41 = 0, total4 = 0;
            //decimal inter = 0;
            Int32 ac = Convert.ToInt32(((Label)(e.Row.FindControl("label2"))).Text);

            string session = DropDownList1.SelectedItem.Text;
           //inob
            e.Row.Cells[14].Text = "0.00".ToString();
            e.Row.Cells[6].Text = "0.00".ToString();
           
            e.Row.Cells[7].Text = "0.00".ToString();
            e.Row.Cells[8].Text = "0.00".ToString();
            e.Row.Cells[9].Text = "0.00".ToString();

         //ob
            ((Label)(e.Row.FindControl("label4"))).Text = "0.00".ToString();
            ((Label)(e.Row.FindControl("label5"))).Text = "0.00".ToString();
            ((Label)(e.Row.FindControl("label6"))).Text = "0.00".ToString();

            DateTime sdate = Convert.ToDateTime("04/01/" + session.Substring(0, 4));
            DateTime edate = Convert.ToDateTime("03/31/" + session.Substring(5, 4));
            decimal dur = 0, rec = 0, arear = 0, cpf = 0, adjment = 0, ins_adjment = 0, share_dur = 0, share_ajment = 0;
            decimal c_with=0;
            //decimal odur = 0, orec = 0, ocpf = 0, oadjment = 0, oins_adjment = 0, oshare_dur = 0, oshare_ajment = 0;
            //decimal odur2 = 0, orec2 = 0, ocpf2 = 0, oadjment2 = 0, oins_adjment2 = 0, oshare_dur2 = 0, oshare_ajment2 = 0;
            //decimal odur1 = 0, orec1 = 0, ocpf1 = 0, oadjment1 = 0, owithd = 0;
            //decimal ncpf = 0, nadjment = 0;
            //string st1 = "SELECT  date,sum(During_Year) as During_Year, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear FROM cpf where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + "group by date order by date;"
            //+ "SELECT  * FROM cpf_detail where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + ";"
            //+ "SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac=" + ac + ";" +
            //"SELECT  During_Year, Recovery_o_adv FROM cpf where date<'" + sdate + "' and ac=" + ac + ";" +
            //"SELECT  * FROM cpf_detail where date1>='" + sdate + "' and date1<='" + edate + "' and ac=" + ac;


            //string st12 = "SELECT date, During_Year, Recovery_o_adv FROM cpf where date<'" + sdate + "' and ac=" + ac + ";" +
            //    "SELECT  * FROM cpf_detail where date<'" + sdate + "' and ac=" + ac;

            string st="select ob,ins_ob from employee where session<='"+sdate+"' and ac="+ac+";"+
                "SELECT  date,sum(During_Year) as During_Year, sum(Recovery_o_adv) as Recovery_o_adv,sum(arear) as arear FROM cpf where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + "group by date order by date;"+
            "SELECT  date,sum(cpf_adv) as cpf_adv, sum(adjment) as adjment,sum(cpf_withd) as cpf_withd FROM cpf_detail where date>='" + sdate + "' and date<='" + edate + "' and ac=" + ac + " group by date order by date";

            SqlDataAdapter adp12 = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["himuda"].ConnectionString);
            DataSet ds12 = new DataSet();
            adp12.Fill(ds12);
            if (ds12.Tables[0].Rows.Count != 0)
            {
                ((Label)(e.Row.FindControl("label4"))).Text = ds12.Tables[0].Rows[0][0].ToString();
                e.Row.Cells[14].Text =Math.Round(Convert.ToDecimal( ds12.Tables[0].Rows[0][1]),2).ToString();
            }
            for (Int32 i = 0; i < ds12.Tables[1].Rows.Count; i++)
            {
                if (ds12.Tables[1].Rows[i][1].ToString() == "")
                {
                    ds12.Tables[1].Rows[i][1] = "0.00".ToString();

                }
                dur = dur + Convert.ToDecimal(ds12.Tables[1].Rows[i][1]);
                if (ds12.Tables[1].Rows[i][2].ToString() == "")
                {
                    ds12.Tables[1].Rows[i][2] = "0.00".ToString();

                }
                if (ds12.Tables[1].Rows[i][3].ToString() == "")
                {
                    ds12.Tables[1].Rows[i][3] = "0.00".ToString();
                }
                rec = rec + (Convert.ToDecimal(ds12.Tables[1].Rows[i][2]) + Convert.ToDecimal(ds12.Tables[1].Rows[i][3]));
            }
            for (Int32 i = 0; i < ds12.Tables[2].Rows.Count; i++)
            {
                if (ds12.Tables[2].Rows[i][1].ToString() == "")
                {
                    ds12.Tables[2].Rows[i][1] = "0.00".ToString();

                }
                cpf = cpf + Convert.ToDecimal(ds12.Tables[2].Rows[i][1]);
                if (ds12.Tables[2].Rows[i][2].ToString() == "")
                {
                    ds12.Tables[2].Rows[i][2] = "0.00".ToString();

                }
                if (ds12.Tables[2].Rows[i][3].ToString() == "")
                {
                    ds12.Tables[2].Rows[i][3] = "0.00".ToString();

                }
               c_with=c_with+ Convert.ToDecimal(ds12.Tables[2].Rows[i][3]);
                adjment = adjment + (Convert.ToDecimal(ds12.Tables[2].Rows[i][2]) + Convert.ToDecimal(ds12.Tables[2].Rows[i][3]));
            }
            ((Label)(e.Row.FindControl("label5"))).Text = dur.ToString();
            ((Label)(e.Row.FindControl("label6"))).Text = rec.ToString();
            e.Row.Cells[6].Text = (Convert.ToDecimal(((Label)(e.Row.FindControl("label4"))).Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label5"))).Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label6"))).Text)).ToString();

            e.Row.Cells[7].Text = cpf.ToString();
            e.Row.Cells[8].Text = adjment.ToString();
            if(c_with==0)
                e.Row.Cells[9].Text = (Convert.ToDecimal(e.Row.Cells[6].Text) - (cpf + adjment)).ToString();
           
            //interest
            ArrayList ar4 = new ArrayList();
            string[] yr = DropDownList1.SelectedItem.Text.Split('-');
            Int32 kk1 = Convert.ToInt32(yr[1]);
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

                 arear = 0;
                decimal total8 = 0;
                total4 = 0;
                //if (ds1.Tables[3].Rows.Count != 0)
                //{
                if (ppob1 == 1)
                {
                    ppob1 = (Convert.ToDecimal()+Convert.ToDecimal(e.Row.Cells[10].Text));
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
                //total8 = odur + orec + arear;
                //}
                //else
                //{

                //    total4 = jk;
                //}
                double num3 = (double)1 / (double)12;
                //Math.Round(Convert.ToDouble(tot * 8 / 100) * num3, 2).ToString();
                if (c1 == 1)
                {
                    if (pob8 == 1)
                    {

                        gtotal = Convert.ToDecimal((total8 + gtotal) - withd4);
                        Label5.Text = gtotal.ToString();
                    }
                    else
                    {
                        decimal n = Convert.ToDecimal((Convert.ToDouble(total4 * 8 / 100) * num3));
                        decimal n1 = Convert.ToDecimal(total8 + gtotal);
                        decimal n2 = n + n1;
                        // n1 =Convert.ToDouble(total4 * 8 / 100) * num3);
                        // gtotal = Convert.ToDecimal((((Convert.ToDouble(total4 * 8 / 100) * num3) + Convert.ToDouble(total8) + Convert.ToDouble(gtotal)) - Convert.ToDouble(withd4)));
                        gtotal = Convert.ToDecimal(n2 - withd4);

                        //Label5.Text = gtotal.ToString();

                    }
                }
                else
                {
                    gtotal = Convert.ToDecimal(pob);
                   // Label5.Text = gtotal.ToString();
                }
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
}
