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
public partial class fc24 : System.Web.UI.Page
{
    ArrayList arr=new ArrayList(20);
    ArrayList arr1 = new ArrayList(20);
    decimal tqty = 0, tamt = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            dt();
            bind();
        }
    }
    public string getdate(DateTime dt)
    {
        return dt.ToString("dd/MM/yyyy");
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
    private void bind()
    {
        //ArrayList arr = new ArrayList();
        //Int32 i;
        //// count++;
       DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + "1".ToString() + "/" + yer.SelectedItem.Text);

       Int32 dd = Convert.ToInt32(DateTime.DaysInMonth(Convert.ToInt32( yer.SelectedItem.Text), live.Month));

       DateTime live1 = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + dd.ToString() + "/" + yer.SelectedItem.Text);
        ////  ((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");
        //Int32 m, y;
        //m = live.Month;
        //y = live.Year;
        //Int32 d = DateTime.DaysInMonth(y, m);
        //for (i = 1; i <= d; i++)
        //{

        //    arr.Add(i.ToString() + "/" + month.SelectedValue.ToString() + "/" + yer.SelectedItem.Text);

        //}
        string st151 = "select sdate,sr,name_con from fc21 where sdate>='" +live + "' and sdate<='"+live1+"' order by sdate";
        SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds151 = new DataSet();
        adp151.Fill(ds151);
        GridView1.DataSource = ds151;
        GridView1.DataBind();




    }
    protected void month_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }
    protected void yer_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {
            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate = new TableHeaderCell();

            FileDate.Text = "Date";

            row.Cells.Add(FileDate);



            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t1 = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate3 = new TableHeaderCell();

            FileDate3.ColumnSpan = 4;

            row1.Cells.Add(FileDate3);

            TableCell FileDate31 = new TableHeaderCell();

       
            FileDate31.Text = "Qty";

            row1.Cells.Add(FileDate31);


            TableCell FileDate32 = new TableHeaderCell();

         
            FileDate32.Text = "Amt";

            row1.Cells.Add(FileDate32);

            TableCell FileDate33 = new TableHeaderCell();

        
            FileDate33.Text = "Qty";

            row1.Cells.Add(FileDate33);



            TableCell FileDate326 = new TableHeaderCell();


            FileDate326.Text = "Amt";

            row1.Cells.Add(FileDate326);

            TableCell FileDate337 = new TableHeaderCell();


            FileDate337.Text = "Qty";

            row1.Cells.Add(FileDate337);



            TableCell FileDate327 = new TableHeaderCell();


            FileDate327.Text = "Amt";

            row1.Cells.Add(FileDate327);


            TableCell FileDate338 = new TableHeaderCell();


            FileDate338.Text = "Qty";

            row1.Cells.Add(FileDate338);



            TableCell FileDate328 = new TableHeaderCell();


            FileDate328.Text = "Amt";

            row1.Cells.Add(FileDate328);

            TableCell FileDate339 = new TableHeaderCell();


            FileDate339.Text = "Qty";

            row1.Cells.Add(FileDate339);



            TableCell FileDate329 = new TableHeaderCell();


            FileDate329.Text = "Amt";

            row1.Cells.Add(FileDate329);


            TableCell FileDate34 = new TableHeaderCell();


            FileDate34.Text = "Qty";

            row1.Cells.Add(FileDate34);



            TableCell FileDate324 = new TableHeaderCell();


            FileDate324.Text = "Amt";

            row1.Cells.Add(FileDate324);

            TableCell FileDate341 = new TableHeaderCell();


            FileDate341.Text = "Qty";

            row1.Cells.Add(FileDate341);



            TableCell FileDate3241 = new TableHeaderCell();


            FileDate3241.Text = "Amt";

            row1.Cells.Add(FileDate3241);

            TableCell FileDate342 = new TableHeaderCell();


            FileDate342.Text = "Qty";

            row1.Cells.Add(FileDate342);



            TableCell FileDate3242 = new TableHeaderCell();


            FileDate3242.Text = "Amt";

            row1.Cells.Add(FileDate3242);

            TableCell FileDate343 = new TableHeaderCell();


            FileDate343.Text = "Qty";

            row1.Cells.Add(FileDate343);



            TableCell FileDate3243 = new TableHeaderCell();


            FileDate3243.Text = "Amt";

            row1.Cells.Add(FileDate3243);


            TableCell FileDate344 = new TableHeaderCell();


            FileDate344.Text = "Qty";

            row1.Cells.Add(FileDate344);



            TableCell FileDate3244 = new TableHeaderCell();


            FileDate3244.Text = "Amt";

            row1.Cells.Add(FileDate3244);

            TableCell FileDate345 = new TableHeaderCell();


            FileDate345.Text = "Qty";

            row1.Cells.Add(FileDate345);



            TableCell FileDate3245 = new TableHeaderCell();


            FileDate3245.Text = "Amt";

            row1.Cells.Add(FileDate3245);

            TableCell FileDate346 = new TableHeaderCell();


            FileDate346.Text = "Qty";

            row1.Cells.Add(FileDate346);



            TableCell FileDate3246 = new TableHeaderCell();


            FileDate3246.Text = "Amt";

            row1.Cells.Add(FileDate3246);

            TableCell FileDate347 = new TableHeaderCell();


            FileDate347.Text = "Qty";

            row1.Cells.Add(FileDate347);



            TableCell FileDate3247 = new TableHeaderCell();


            FileDate3247.Text = "Amt";

            row1.Cells.Add(FileDate3247);

            TableCell FileDate348 = new TableHeaderCell();


            FileDate348.Text = "Qty";

            row1.Cells.Add(FileDate348);



            TableCell FileDate3248 = new TableHeaderCell();


            FileDate3248.Text = "Amt";

            row1.Cells.Add(FileDate3248);

           // TableCell FileDate349 = new TableHeaderCell();


            //FileDate349.Text = "Qty";

            //row1.Cells.Add(FileDate349);



            TableCell FileDate3249 = new TableHeaderCell();


            FileDate3249.Text = "Amt";

            row1.Cells.Add(FileDate3249);

           // TableCell FileDate351 = new TableHeaderCell();


            //FileDate351.Text = "Qty";

            //row1.Cells.Add(FileDate351);



            TableCell FileDate3251 = new TableHeaderCell();


            FileDate3251.Text = "Amt";

            row1.Cells.Add(FileDate3251);

            //TableCell FileDate361 = new TableHeaderCell();


            //FileDate361.Text = "Qty";

            //row1.Cells.Add(FileDate361);



            TableCell FileDate3252 = new TableHeaderCell();


            FileDate3252.Text = "Amt";

            //row1.Cells.Add(FileDate3252);


           // TableCell FileDate353 = new TableHeaderCell();


            //FileDate353.Text = "Qty";

            //row1.Cells.Add(FileDate353);



            TableCell FileDate3253 = new TableHeaderCell();


            FileDate3253.Text = "Amt";

           // row1.Cells.Add(FileDate3253);

           // TableCell FileDate354 = new TableHeaderCell();


            //FileDate354.Text = "Qty";

            //row1.Cells.Add(FileDate354);



            TableCell FileDate3254 = new TableHeaderCell();


            FileDate3254.Text = "BED(12%)";

            row1.Cells.Add(FileDate3254);



                        TableCell FileDate3254e = new TableHeaderCell();


                        FileDate3254e.Text = "ED. CESS(2%)";

            row1.Cells.Add(FileDate3254e);

            TableCell FileDate3254h = new TableHeaderCell();


            FileDate3254h.Text = "HR. EDU. CESS(1%)";

            row1.Cells.Add(FileDate3254h);



            //TableCell FileDate3264 = new TableHeaderCell();


       

            //row1.Cells.Add(FileDate3264);

            //TableCell FileDate3551 = new TableHeaderCell();


            //FileDate3551.Text = "EC";

            //row1.Cells.Add(FileDate3551);


            TableCell FileDate355 = new TableHeaderCell();


            FileDate355.Text = "5%";

            row1.Cells.Add(FileDate355);



            TableCell FileDate3255 = new TableHeaderCell();


            FileDate3255.Text = "13.75%";

            row1.Cells.Add(FileDate3255);


            TableCell FileDate32556 = new TableHeaderCell();


            FileDate32556.Text = "";

            row1.Cells.Add(FileDate32556);


            TableCell FileDate32557 = new TableHeaderCell();


            FileDate32557.Text = "TCS(1%)";

            row1.Cells.Add(FileDate32557);


            TableCell FileDate32557S = new TableHeaderCell();


            FileDate32557S.Text = "S.C(10%)";

            row1.Cells.Add(FileDate32557S);

            TableCell FileDate3255S = new TableHeaderCell();


            FileDate3255S.Text = "ED.CESS(2%)";

            row1.Cells.Add(FileDate3255S);

            TableCell FileDate325S = new TableHeaderCell();


            FileDate325S.Text = "HR. ED. CESS(1%)";

            row1.Cells.Add(FileDate325S);


           t1.Rows.AddAt(0, row1);
            TableCell cell = new TableHeaderCell();
            cell.Text = "Invoice No.";
            
            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Name of the Party";

            row.Cells.Add(cell1);



            t.Rows.AddAt(0, row);

            TableCell cell2 = new TableHeaderCell();



            cell2.Text = "L.F";

            row.Cells.Add(cell2);



            t.Rows.AddAt(0, row);

            TableCell cell3 = new TableHeaderCell();

            cell3.ColumnSpan = 2;

            cell3.Text = "X";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();


            cell4.ColumnSpan = 2;
            cell4.Text = "WW";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

            TableCell cell6 = new TableHeaderCell();

            cell6.ColumnSpan = 2;

            cell6.Text = "WG";

            row.Cells.Add(cell6);



            t.Rows.AddAt(0, row);

            TableCell cell7 = new TableHeaderCell();

            cell7.ColumnSpan = 2;

            cell7.Text = "N";

            row.Cells.Add(cell7);



            t.Rows.AddAt(0, row);
            TableCell cell8 = new TableHeaderCell();


            cell8.ColumnSpan = 2;
            cell8.Text = "M";

            row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
            TableCell cell9 = new TableHeaderCell();


            cell9.ColumnSpan = 2;
            cell9.Text = "K";

            row.Cells.Add(cell9);



            t.Rows.AddAt(0, row);
            TableCell cell10 = new TableHeaderCell();

            cell10.ColumnSpan = 2;

            cell10.Text = "H";

            row.Cells.Add(cell10);



            t.Rows.AddAt(0, row);
            TableCell cell11 = new TableHeaderCell();

            cell11.ColumnSpan = 2;

            cell11.Text = "D";

            row.Cells.Add(cell11);



            t.Rows.AddAt(0, row);
            TableCell cell12 = new TableHeaderCell();

            cell12.ColumnSpan = 2;

            cell12.Text = "B";

            row.Cells.Add(cell12);

            TableCell cell121 = new TableHeaderCell();


            cell121.ColumnSpan = 2;
            cell121.Text = "TOTAL";

            row.Cells.Add(cell121);
            TableCell cell122 = new TableHeaderCell();


            cell122.ColumnSpan = 2;
            cell122.Text = "Turpentine";

            row.Cells.Add(cell122);


            TableCell cell15 = new TableHeaderCell();

            cell15.ColumnSpan = 2;

            cell15.Text = "Varinish";

            row.Cells.Add(cell15);


            TableCell cell151 = new TableHeaderCell();


            cell151.ColumnSpan = 2;
            cell151.Text = "Black Japan";

            row.Cells.Add(cell151);

            TableCell cell152 = new TableHeaderCell();


            cell152.ColumnSpan = 2;
            cell152.Text = "Phenyl";

            row.Cells.Add(cell152);


            TableCell cell153 = new TableHeaderCell();

            //cell153.ColumnSpan = 2;

            cell153.Text = "Misc sale";

            row.Cells.Add(cell153);

            TableCell cell154 = new TableHeaderCell();

            //cell154.ColumnSpan = 2;

            cell154.Text = "Freight";

            row.Cells.Add(cell154);

            TableCell cell155 = new TableHeaderCell();

            cell155.ColumnSpan = 3;

            cell155.Text = "Excise Duty";

            row.Cells.Add(cell155);

            TableCell cell156 = new TableHeaderCell();


            cell156.ColumnSpan = 2;
            cell156.Text = "VAT";

            row.Cells.Add(cell156);

            TableCell cell157 = new TableHeaderCell();


            //cell157.ColumnSpan = 2;
            cell157.Text = "C.S.T";

            row.Cells.Add(cell157);

            TableCell cell158 = new TableHeaderCell();

            cell158.ColumnSpan = 4;

            cell158.Text = "Income Tax";

            row.Cells.Add(cell158);

            TableCell cell159 = new TableHeaderCell();


            //cell159.ColumnSpan = 2;
            cell159.Text = "Grand Total";

            row.Cells.Add(cell159);

            t.Rows.AddAt(0, row);

           

        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState == DataControlRowState.Alternate)
        {
            decimal qty1 = 0, amt1 = 0;
            decimal qty12 = 0;
            decimal qty = 0, amt = 0;
            decimal qty14 = 0;
            decimal amt30 = 0;
            decimal amt31 = 0;
         Label ll = ((Label)(e.Row.FindControl("Label1")));
         string sr = ((Label)(e.Row.FindControl("sr"))).Text;
         e.Row.Cells[35].Text = "0".ToString();
         e.Row.Cells[36].Text = "0".ToString();
         //   ((Label)(e.Row.FindControl("Label3"))).Text = "0".ToString();
         //   ((Label)(e.Row.FindControl("Label4"))).Text = "0".ToString();
         //   ((Label)(e.Row.FindControl("Label5"))).Text = "0".ToString();
         DateTime dt2 = Convert.ToDateTime(DateTime.Parse(ll.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
         string st151 = "select *from fc21 where sr=" + sr;
         SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
         DataSet ds151 = new DataSet();
         adp151.Fill(ds151);
         //   if (ds151.Tables[0].Rows.Count != 0)
         //   {
         //       string rep = "";
         //       string rep1 = "";
         //       string rnam = "";
          
         //       for (Int32 h = 0; h < ds151.Tables[0].Rows.Count; h++)
         //       {
         //           rep = rep + ds151.Tables[0].Rows[h]["sr"].ToString();
         //           rnam = rnam + ds151.Tables[0].Rows[h]["name_con"].ToString() ;
                    
         //           rep1 = rep1 + ds151.Tables[0].Rows[h]["sr"].ToString() + "','";
         //       }
         //       rep1 = rep1.Substring(0, rep1.Length - 2);  
         //       e.Row.Cells[1].Text = rep.Substring(0,rep.Length-1).ToString();
         //       e.Row.Cells[2].Text = rnam.ToString();

         Int32 j = 0;
         Int32 c = 2;


         arr.Add("X");
         arr.Add("WW");
         arr.Add("WG");
         arr.Add("N");
         arr.Add("M");
         arr.Add("K");
         arr.Add("H");
         arr.Add("D");
         arr.Add("B");

         arr1.Add("Turpentine Oil");
         arr1.Add("Varnish");
         arr1.Add("Black Japan");
         arr1.Add("Phenyl");
         arr1.Add("Misc.sale");
         arr1.Add("Freight");
         decimal it = 0;

         string st15125 = "select sum(tcs) as sum from c21 where dt='" + dt2.ToString() + "' group by dt";
         SqlDataAdapter adp15125 = new SqlDataAdapter(st15125, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
         DataSet ds15125 = new DataSet();
         adp15125.Fill(ds15125);
         if (ds15125.Tables[0].Rows.Count != 0)
         {
             it = Convert.ToDecimal(ds15125.Tables[0].Rows[0]["sum"]);
         }
         ((Label)(e.Row.FindControl("Label3"))).Text = it.ToString();
         ((Label)(e.Row.FindControl("Label4"))).Text = Math.Round((it * 2 / 100), 2).ToString();
         ((Label)(e.Row.FindControl("Label5"))).Text = Math.Round((it * 1 / 100), 2).ToString();
         //string st1512 = "select *from c21 where srno=" + ds151.Tables[0].Rows[0]["sr"].ToString();
         string st1512 = "select * from c21 where srno="+sr +" order by des";

         SqlDataAdapter adp1512 = new SqlDataAdapter(st1512, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
         DataSet ds1512 = new DataSet();
         adp1512.Fill(ds1512);
         for (Int32 k = 0; k < 9; k++)
         {
             c = c + 2;
             qty = 0;
             qty14 = 0;
             amt = 0;
             decimal tm = 0,qty55=0;
             for (j = 0; j < ds1512.Tables[0].Rows.Count; j++)
             {
                 //qty1 = 0; amt1 = 0; qty12 = 0;
                 //qty = 0; amt = 0;
                 //   qty14 = 0;
                 
                 if (ds1512.Tables[0].Rows[j]["des"].ToString() == arr[k].ToString())
                 {
                     if (ds1512.Tables[0].Rows[j]["wtqtl"].ToString() != "")
                     {
                         qty =  Convert.ToDecimal(ds1512.Tables[0].Rows[j]["wtqtl"]);
                         qty55 =qty55+ Convert.ToDecimal(ds1512.Tables[0].Rows[j]["wtqtl"]);

                     }
                     if (ds1512.Tables[0].Rows[j]["qty"].ToString() != "")
                     {
                         qty14 = qty14 + Convert.ToDecimal(ds1512.Tables[0].Rows[j]["qty"]);
                     }
                     if (ds1512.Tables[0].Rows[j]["rate"].ToString() != "")
                     {
                         amt = Convert.ToDecimal(ds1512.Tables[0].Rows[j]["rate"]);
                     }
                     tm=tm+(amt * qty);
                 }
                 amt30 = amt30 + qty;

                 e.Row.Cells[c].Text = qty55.ToString();
                 e.Row.Cells[c + 1].Text = Math.Round((tm), 2).ToString();
             }

             tqty = tqty + qty;
             tamt = tamt + (amt * qty);
         }
         c = c + 1;

         e.Row.Cells[22].Text = tqty.ToString();
         c = c + 1;
         e.Row.Cells[23].Text = Math.Round(tamt, 0).ToString();
         amt31 = amt31 + Convert.ToDecimal(e.Row.Cells[23].Text);




         tqty = 0;
         tamt = 0;
         c = 24;
         for (Int32 k1 = 0; k1 < 6; k1++)
         {

             qty1 = 0;
             
             amt1 = 0;
             qty12 = 0;
             decimal tmt = 0,qty44=0;
             for (Int32 j1 = 0; j1 < ds1512.Tables[0].Rows.Count; j1++)
             {


                 if (ds1512.Tables[0].Rows[j1]["des"].ToString() == arr1[k1].ToString())
                 {
                     if (ds1512.Tables[0].Rows[j1]["wtqtl"].ToString() != "")
                     {
                         qty1 = Convert.ToDecimal(ds1512.Tables[0].Rows[j1]["wtqtl"]);
                         qty44 =qty44+ Convert.ToDecimal(ds1512.Tables[0].Rows[j1]["wtqtl"]);

                     }
                     if (ds1512.Tables[0].Rows[j1]["rate"].ToString() != "")
                     {
                         amt1 =  Convert.ToDecimal(ds1512.Tables[0].Rows[j1]["rate"]);
                     }
                     if (ds1512.Tables[0].Rows[j1]["qty"].ToString() != "")
                     {
                         qty12 = qty12 + Convert.ToDecimal(ds1512.Tables[0].Rows[j1]["qty"]);
                     }
                     tmt=tmt+(amt1 * qty1);
                 }
             }

            // amt1 = amt1 + qty1;
             e.Row.Cells[c].Text = qty44.ToString();
             e.Row.Cells[c + 1].Text = Math.Round((tmt), 2).ToString();
             amt31 = amt31 + Convert.ToDecimal(e.Row.Cells[c + 1].Text);
             c = c + 2;
             //tqty = tqty + qty;
             //tamt = tamt + amt;
         }
         c = c + 1;
         //if (ds151.Tables[0].Rows[0]["rate_o_duty"].ToString() != "")
         //{
         decimal rate = Convert.ToDecimal(amt + amt1);
         decimal qty6 = Convert.ToDecimal(amt31);
         //decimal total = Convert.ToDecimal(((qty6) * Convert.ToDecimal(ds151.Tables[0].Rows[0]["rate_o_duty"])) / 100);
         decimal total = Convert.ToDecimal(((qty6) * Convert.ToDecimal(12)) / 100);

         //e.Row.Cells[34].Text = Math.Round(total, 2).ToString();
         e.Row.Cells[34].Text = Math.Round(total).ToString();
         e.Row.Cells[35].Text = Math.Round((qty6*2) / 100).ToString();
         e.Row.Cells[36].Text = Math.Round((qty6 * 1) / 100).ToString();
         e.Row.Cells[36].Text = Math.Round((qty6 * 1) / 100).ToString();
         e.Row.Cells[37].Text = Math.Round((qty6 * 5) / 100).ToString();
         e.Row.Cells[37].Text = Math.Round((qty6 * 5) / 100).ToString();
         e.Row.Cells[38].Text = Math.Round((qty6 * Convert.ToDecimal(13.75)) / 100).ToString();

         decimal total1 =Convert.ToDecimal(total * 2 / 100);
         decimal total2 =Convert.ToDecimal( total * 1 / 100);
         decimal tax = Convert.ToDecimal(ds151.Tables[0].Rows[0]["tax"]);
         if (tax.ToString() == "2.00")
         {
             //e.Row.Cells[36].Text = Math.Round(((qty6) + total + total1 + total2) * 2 / 100, 2).ToString();

         }
         else
         {
             //e.Row.Cells[35].Text = Math.Round(((qty6) + total + total1 + total2) * tax / 100, 2).ToString();

         }

         if (ds151.Tables[0].Rows[0]["cst"].ToString() != "")
         {
             e.Row.Cells[39].Text = Math.Round(((qty6) + total + total1 + total2) * Convert.ToDecimal(ds151.Tables[0].Rows[0]["cst"]) / 100, 0).ToString();
         }
         e.Row.Cells[40].Text = Math.Round((qty6 * Convert.ToDecimal(1)) / 100).ToString();
         e.Row.Cells[41].Text = Math.Round((qty6 * Convert.ToDecimal(10)) / 100).ToString();
         e.Row.Cells[42].Text = Math.Round((qty6 * Convert.ToDecimal(2)) / 100).ToString();
         e.Row.Cells[43].Text = Math.Round((qty6 * Convert.ToDecimal(1)) / 100).ToString();


        // ((Label)(e.Row.FindControl("label4"))).Text = Math.Round(total1, 2).ToString();
         //((Label)(e.Row.FindControl("label5"))).Text = Math.Round(total2, 2).ToString();
         e.Row.Cells[44].Text = Math.Round((amt31 + total + Convert.ToDecimal(e.Row.Cells[34].Text) + Convert.ToDecimal(e.Row.Cells[35].Text) + Convert.ToDecimal(e.Row.Cells[36].Text) + Convert.ToDecimal(e.Row.Cells[37].Text) + Convert.ToDecimal(e.Row.Cells[38].Text) + Convert.ToDecimal(e.Row.Cells[39].Text) + Convert.ToDecimal(e.Row.Cells[40].Text) + Convert.ToDecimal(e.Row.Cells[41].Text) + Convert.ToDecimal(e.Row.Cells[42].Text) + Convert.ToDecimal(e.Row.Cells[43].Text)), 0).ToString();

            //   }
            //c = c + 1;
            //e.Row.Cells[c].Text = tamt.ToString();



         //   }

        }
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
    }
    protected void GridView1_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {
        GridView1.EditIndex = -1;
        bind();
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        string dt = ((Label)GridView1.Rows[e.RowIndex].FindControl("label1")).Text;
        DateTime dt2 = Convert.ToDateTime(DateTime.Parse(dt, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
       
        decimal tcs = Convert.ToDecimal(((TextBox)GridView1.Rows[e.RowIndex].FindControl("textbox1")).Text);
        SqlDataSource1.InsertParameters["dt"].DefaultValue = dt2.ToString();
        SqlDataSource1.InsertParameters["tcs"].DefaultValue = tcs.ToString();
        SqlDataSource1.Insert();
        GridView1.EditIndex = -1;
        bind();

    }
}
