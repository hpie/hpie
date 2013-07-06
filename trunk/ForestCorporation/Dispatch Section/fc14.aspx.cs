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

public partial class fc14 : System.Web.UI.Page
{
    decimal tpacks1 = 0;
    decimal obj = 0;
    Int32 oa = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            dt();
            //bind();
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
        ArrayList arr = new ArrayList();
        Int32 i;
       // count++;
        DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + "1".ToString() + "/" + yer.SelectedItem.Text);
        //  ((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");
        Int32 m, y;
        m = live.Month;
        y = live.Year;
        Int32 d = DateTime.DaysInMonth(y, m);
        for (i = 1; i <= d; i++)
        {

            arr.Add(i.ToString() + "/" + month.SelectedValue.ToString() + "/" + yer.SelectedItem.Text);

        }
        GridView1.DataSource = arr;
        GridView1.DataBind();




    }
    protected void month_SelectedIndexChanged(object sender, EventArgs e)
    {
        //bind();
    }
    protected void yer_SelectedIndexChanged(object sender, EventArgs e)
    {
        //bind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState == DataControlRowState.Alternate)
        {




           

            Label ll = ((Label)(e.Row.FindControl("Label27")));
            Label l29 = ((Label)(e.Row.FindControl("Label29")));
            Label l30 = ((Label)(e.Row.FindControl("Label30")));
          Label l31 = ((Label)(e.Row.FindControl("Label31")));
          Label l32 = ((Label)(e.Row.FindControl("Label32")));
          Label l33 = ((Label)(e.Row.FindControl("Label33")));
          Label l34 = ((Label)(e.Row.FindControl("Label34")));
          Label l35 = ((Label)(e.Row.FindControl("Label35")));
          Label l36 = ((Label)(e.Row.FindControl("Label36")));
          Label l37 = ((Label)(e.Row.FindControl("Label37")));
          Label l38 = ((Label)(e.Row.FindControl("Label38")));
          Label l39 = ((Label)(e.Row.FindControl("Label39")));
          Label l40 = ((Label)(e.Row.FindControl("Label40")));
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(ll.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            DateTime dt4 = Convert.ToDateTime(month.SelectedValue + "/01/" + yer.SelectedValue);
            string st151 = "select *from fc12 where dt='" + dt2 + "' and des!='Turpentine Oil' and des='"+DropDownList1.SelectedValue+"'";
            string st157 = "select *from fc12 where dt<'" + dt2 + "'  and des!='Turpentine Oil' and des='" + DropDownList1.SelectedValue + "'";
            string st158 = "select sum(notin) as notin,sum(netsakki) as netsakki,sum(qty) as qty from fc05 where issuedate='" + dt2 + "' and section='Dispatch Section' and des='Production Section1'";
            SqlDataAdapter adp151 = new SqlDataAdapter(st151 + ";" + st157 + ";" + st158, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds151 = new DataSet();
            adp151.Fill(ds151);
            decimal packs1 = 0, npacks1 = 0;
            decimal ob = 0, ob1 = 0;
            decimal notin = 0, netsakki = 0, qty90 = 0;
            //string mt1 = "";
            //if (ds151.Tables[1].Rows.Count != 0)
            //{
            //    Int32 i1;
            //    //packs1 = 0; npacks1 = 0; tpacks1 = 0;
            //    for (i1 = 0; i1 < ds151.Tables[1].Rows.Count; i1++)
            //    {
            //       // mt1 = mt1 + ds151.Tables[1].Rows[i1]["no_pre"].ToString() + ",";
            //        Int32 jj = i1 + 1;
            //    npacks1 =npacks1+  Convert.ToDecimal(ds151.Tables[1].Rows[i1]["pack_size"]);
            //      packs1 = packs1 + Convert.ToDecimal(ds151.Tables[1].Rows[i1]["no_pack"]);
            //   // tpacks1 =  tpacks1+jj ;
            //    }
            //   // tpacks1 = tpacks1 + ds151.Tables[1].Rows.Count;
            //}
            DateTime odt = Convert.ToDateTime(month.SelectedValue + "/01/" + yer.SelectedValue);
            SqlDataAdapter aob = new SqlDataAdapter("select * from ob where dt<='"+odt+"' and itemcode in('3','4','5','6','7','8','9','10','11','12','13','14','15','16','17')", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet aob1 = new DataSet();
            aob.Fill(aob1);
            if (aob1.Tables[0].Rows.Count != 0)
            {
                for (Int32 a = 0; a < aob1.Tables[0].Rows.Count; a++)
                {
                    ob = ob + Convert.ToDecimal(aob1.Tables[0].Rows[a]["obtin"]);
                    ob1 = ob1 + Convert.ToDecimal(aob1.Tables[0].Rows[a]["obqtl"]);
                }
            }
        
            
            decimal packs = 0, npacks = 0,wtpak=0;
            string mt = "";
            if (ds151.Tables[0].Rows.Count != 0)
            {
                Int32 i;
               
                for (i = 0; i < ds151.Tables[0].Rows.Count; i++)
                {
                    mt = mt + ds151.Tables[0].Rows[i]["no_pre"].ToString() + ",";
                    packs = packs + Convert.ToDecimal(ds151.Tables[0].Rows[i]["pack_size"]);
                    npacks = npacks + Convert.ToDecimal(ds151.Tables[0].Rows[i]["no_pack"]);
                    wtpak = wtpak + Convert.ToDecimal(ds151.Tables[0].Rows[i]["wt"]);
                }
               
            }
            if (ds151.Tables[2].Rows.Count != 0)
            {
                Int32 i1;
             
                for (i1 = 0; i1 < ds151.Tables[2].Rows.Count; i1++)
                {
                    //mt = mt + ds151.Tables[2].Rows[i1]["reqslipno"].ToString() + ",";
                    if (ds151.Tables[2].Rows[i1]["notin"].ToString() != "")
                    {
                        notin = notin + Convert.ToDecimal(ds151.Tables[2].Rows[i1]["notin"]);
                    }
                    if (ds151.Tables[2].Rows[i1]["netsakki"].ToString() != "")
                    {
                        netsakki = netsakki + Convert.ToDecimal(ds151.Tables[2].Rows[i1]["netsakki"]);
                    }
                    if (ds151.Tables[2].Rows[i1]["qty"].ToString() != "")
                    {
                        qty90 = qty90 + Convert.ToDecimal(ds151.Tables[2].Rows[i1]["qty"]);
                    }
                }

            }
            l29.Text = mt.ToString();
            l32.Text = npacks.ToString();
            l33.Text = packs.ToString();
            l34.Text = wtpak.ToString();
           

            string st152 = "select *from fc20 where dt='" + dt2 + "'";
            SqlDataAdapter adp152 = new SqlDataAdapter(st152, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds152 = new DataSet();
            adp152.Fill(ds152);
            if (ds152.Tables[0].Rows.Count != 0)
            {
                Int32 i1;
                string mt1 = "";
                for (i1 = 0; i1 < ds152.Tables[0].Rows.Count; i1++)
                {
                    mt1 = mt1 + ds152.Tables[0].Rows[i1]["challanno"].ToString() + ",";
                }
                mt1 = mt1.Substring(0, mt1.Length - 1);
                l30.Text = mt1.ToString();
            }

            string st153 = "select *from fc22 where dt='" + dt2 + "'";
            SqlDataAdapter adp153 = new SqlDataAdapter(st153, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds153= new DataSet();
            adp153.Fill(ds153);
            if (ds153.Tables[0].Rows.Count != 0)
            {
                //Int32 i1;
                //string mt1 = "";
                //for (i1 = 0; i1 < ds152.Tables[0].Rows.Count; i1++)
                //{
                //    mt1 = mt1 + ds152.Tables[0].Rows[i1]["challanno"].ToString() + ",";
                //}
                l30.Text =l30.Text+"/"+ ds153.Tables[0].Rows[0]["prno"].ToString();
            }

            string st1538 = "select *from fc20 where dt='" + dt2 + "'";
            SqlDataAdapter adp1538 = new SqlDataAdapter(st1538, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds1538 = new DataSet();
            adp1538.Fill(ds1538);
            decimal qt90 = 0, wt90 = 0;
            if (ds1538.Tables[0].Rows.Count != 0)
            {
                Int32 i1;
             
                for (i1 = 0; i1 < ds1538.Tables[0].Rows.Count; i1++)
                {
                    string st1539 = "select sum(qty) as qty,sum(wtqtl) as wtqtl,count(qty) qty1 from fc13 where pro_size!='Turpentine Oil' and pro_size='"+DropDownList1.SelectedValue+"' and fac_ord_no='" + ds1538.Tables[0].Rows[i1]["f_o_no"].ToString() + "' group by fac_ord_no";
                    SqlDataAdapter adp1539 = new SqlDataAdapter(st1539, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
                    DataSet ds1539 = new DataSet();
                    adp1539.Fill(ds1539);
                    if (ds1539.Tables[0].Rows.Count != 0)
                    {
                        qt90 = qt90 + Convert.ToDecimal(ds1539.Tables[0].Rows[0]["qty"]);
                        wt90 = wt90 + Convert.ToDecimal(ds1539.Tables[0].Rows[0]["wtqtl"]);
                    }
                }
               
            }
            l35.Text = Math.Round((qt90+(qty90/2)), 0).ToString();
            if (oa == 0)
            {
                oa = 3;
                obj = obj + (Convert.ToDecimal(l32.Text) - Convert.ToDecimal(l35.Text))+ob;
            }
            else
            {
                obj = obj + (Convert.ToDecimal(l32.Text) - Convert.ToDecimal(l35.Text));

            }
            l37.Text = Math.Round(wt90+qty90, 0).ToString();
            //l38.Text = (packs1 + (Convert.ToDecimal(l32.Text)) - Convert.ToDecimal(l35.Text)).ToString();
            l38.Text = obj.ToString();
            l39.Text = (npacks1 + Convert.ToDecimal(l33.Text) - Convert.ToDecimal(l36.Text)).ToString();
            l40.Text = (obj * 2).ToString();
            string st154 = "select *from fc23 where dt='" + dt2 + "'";
            SqlDataAdapter adp154 = new SqlDataAdapter(st154, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds154 = new DataSet();
            adp154.Fill(ds154);
            if (ds154.Tables[0].Rows.Count != 0)
            {
                //Int32 i1;
                //string mt1 = "";
                //for (i1 = 0; i1 < ds152.Tables[0].Rows.Count; i1++)
                //{
                //    mt1 = mt1 + ds152.Tables[0].Rows[i1]["challanno"].ToString() + ",";
                //}
                l31.Text =ds154.Tables[0].Rows[0]["prno"].ToString();
            }

            string st155 = "select *from fc14 where dt='" + dt2 + "'";
            SqlDataAdapter adp155 = new SqlDataAdapter(st155, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds155 = new DataSet();
            adp155.Fill(ds155);
            if (ds155.Tables[0].Rows.Count != 0)
            {
                Label parti = ((Label)(e.Row.FindControl("Label28")));
                Label gate_pass = ((Label)(e.Row.FindControl("Label31")));
                Label daily_rec_6_2 = ((Label)(e.Row.FindControl("Label33")));
                Label daily_rec_6_3 = ((Label)(e.Row.FindControl("Label34")));
                Label daily_des_7_1 = ((Label)(e.Row.FindControl("Label35")));
                Label daily_des_7_3 = ((Label)(e.Row.FindControl("Label37")));
                Label bal_8_1 = ((Label)(e.Row.FindControl("Label38")));
                Label bal_8_2 = ((Label)(e.Row.FindControl("Label39")));
                Label bal_8_3 = ((Label)(e.Row.FindControl("Label40")));
                Label remark = ((Label)(e.Row.FindControl("Label41")));
                
                parti.Text = ds155.Tables[0].Rows[0][2].ToString();
                gate_pass.Text = ds155.Tables[0].Rows[0][3].ToString();
                daily_rec_6_2.Text = ds155.Tables[0].Rows[0][4].ToString();
                daily_rec_6_3.Text = ds155.Tables[0].Rows[0][5].ToString();
                daily_des_7_1.Text = ds155.Tables[0].Rows[0][6].ToString();
                daily_des_7_3.Text = ds155.Tables[0].Rows[0][7].ToString();
                bal_8_1.Text = ds155.Tables[0].Rows[0][8].ToString();
                bal_8_2.Text = ds155.Tables[0].Rows[0][9].ToString();
                bal_8_3.Text = ds155.Tables[0].Rows[0][10].ToString();
                remark.Text = ds155.Tables[0].Rows[0][11].ToString();
            }
        }
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

            FileDate3.ColumnSpan = 5;

            row1.Cells.Add(FileDate3);

            TableCell FileDate31 = new TableHeaderCell();

            FileDate31.ColumnSpan = 3;
            FileDate31.Text = "Daily receipt";

            row1.Cells.Add(FileDate31);


            TableCell FileDate32 = new TableHeaderCell();

            FileDate32.ColumnSpan = 3;
            FileDate32.Text = "Daily Despatch";

            row1.Cells.Add(FileDate32);

            TableCell FileDate33 = new TableHeaderCell();

            FileDate33.ColumnSpan = 3;
            FileDate33.Text = "Balance";

            row1.Cells.Add(FileDate33);

            TableCell cell = new TableHeaderCell();



            cell.Text = "Particular";

            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Material transfer note no.";

            row.Cells.Add(cell1);



            t.Rows.AddAt(0, row);

            TableCell cell2 = new TableHeaderCell();



            cell2.Text = "Challan no/Cash memo no/MRN";

            row.Cells.Add(cell2);



            t.Rows.AddAt(0, row);

            TableCell cell3 = new TableHeaderCell();



            cell3.Text = "Gate Pass";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();



            cell4.Text = "No. of case";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

            TableCell cell6 = new TableHeaderCell();



            cell6.Text = "Packing size";

            row.Cells.Add(cell6);



            t.Rows.AddAt(0, row);

            TableCell cell7 = new TableHeaderCell();



            cell7.Text = "Qty";

            row.Cells.Add(cell7);



            t.Rows.AddAt(0, row);
            TableCell cell8 = new TableHeaderCell();



            cell8.Text = "No. of case";

            row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
            TableCell cell9 = new TableHeaderCell();



            cell9.Text = "Packing size";

            row.Cells.Add(cell9);



            t.Rows.AddAt(0, row);
            TableCell cell10 = new TableHeaderCell();



            cell10.Text = "Qty";

            row.Cells.Add(cell10);



            t.Rows.AddAt(0, row);
            TableCell cell11 = new TableHeaderCell();



            cell11.Text = "No. of case";

            row.Cells.Add(cell11);



            t.Rows.AddAt(0, row);
            TableCell cell12 = new TableHeaderCell();



            cell12.Text = "Packing size";

            row.Cells.Add(cell12);

            TableCell cell121 = new TableHeaderCell();



            cell121.Text = "Qty";

            row.Cells.Add(cell121);
            TableCell cell122 = new TableHeaderCell();



            cell122.Text = "Remark";

            row.Cells.Add(cell122);

            t.Rows.AddAt(0, row);

            t1.Rows.AddAt(0, row1);

        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        bind();
    }
}
