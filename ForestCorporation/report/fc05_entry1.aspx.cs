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
public partial class fc05 : System.Web.UI.Page
{

    Int32 count=0;
    decimal btin = 0, bwt = 0;
    decimal obtin = 0, obwt = 0;
    decimal tinn = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            dt();
            sr();

           // bind();

        }
    }
    private void bind()
{
        ArrayList arr=new ArrayList();
        Int32 i;       
        count++;
            DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() +"/"+ count.ToString()+"/" + yer.SelectedItem.Text);
          //  ((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");
        Int32 m, y;
        m=live.Month;
        y=live.Year;
        Int32 d = DateTime.DaysInMonth(y,m);
        for (i = 1; i <= d; i++)
        {

            arr.Add(i.ToString() + "/" + month.SelectedValue.ToString() + "/" + yer.SelectedItem.Text);
            
        }
        GridView1.DataSource=arr;
        GridView1.DataBind();
        ob();
            
   

}
    public string dt(DateTime dt5)
    {
       return  dt5.ToString("dd/MM/yyyy");
    }
    private void sr()
    {
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            Label25.Text =(Convert.ToInt32( dv.Table.Rows[dv.Table.Rows.Count  - 1]["reqslipno"])+1).ToString();
        }
    }
    protected void GridView1_DataBound(object sender, EventArgs e)
    {
       
    }
    private void ob()
    {
        DateTime dt9;
        if (Convert.ToInt32( month.SelectedValue) == 1)
        {
            dt9 = Convert.ToDateTime("12/01/" + (Convert.ToInt32(yer.SelectedValue) - 1).ToString());
        }
        else
        {
            dt9 = Convert.ToDateTime(Convert.ToInt32(month.SelectedValue) - 1 + "/01/" + yer.SelectedValue.ToString());
        }
        string st151 = "select *from fc01 where preno1<='" + dt9 + "'";
        SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds151 = new DataSet();
        adp151.Fill(ds151);
        if (ds151.Tables[0].Rows.Count != 0)
        {
            
            for (Int32 k = 0; k < ds151.Tables[0].Rows.Count; k++)
            {
                tinn = tinn + Convert.ToDecimal(ds151.Tables[0].Rows[k]["nostype"]);
            }

        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            
            //count++;
            //DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() +"/"+ count.ToString()+"/" + yer.SelectedItem.Text);
            //((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");








            tinn = 0;

            decimal sakki11 = 0;
           decimal tin11 = 0;
            Label ll = ((Label)(e.Row.FindControl("Label27")));
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(ll.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            Label l28 = ((Label)(e.Row.FindControl("Label28")));
            Label l29 = ((Label)(e.Row.FindControl("Label29")));
            Label l30 = ((Label)(e.Row.FindControl("Label30")));
            Label l31 = ((Label)(e.Row.FindControl("Label31")));
            Label l36 = ((Label)(e.Row.FindControl("Label36")));

            Label l37 = ((Label)(e.Row.FindControl("Label37")));
            Label l38 = ((Label)(e.Row.FindControl("Label38")));
            //DateTime dt9;
            DateTime dt9;
            if (Convert.ToInt32(month.SelectedValue) == 1)
            {
                dt9 = Convert.ToDateTime("12/01/" + (Convert.ToInt32(yer.SelectedValue) - 1).ToString());
            }
            else
            {
                dt9 = Convert.ToDateTime(Convert.ToInt32(month.SelectedValue) + "/01/" + yer.SelectedValue.ToString());
            }
            string st1511 = "select *from fc01 where preno1<'" + dt9 + "'";
            SqlDataAdapter adp1511 = new SqlDataAdapter(st1511, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds1511 = new DataSet();
            adp1511.Fill(ds1511);
            if (ds1511.Tables[0].Rows.Count != 0)
            {

                for (Int32 k = 0; k < ds1511.Tables[0].Rows.Count; k++)
                {
                    //tinn = tinn + Convert.ToDecimal(ds1511.Tables[0].Rows[k]["nostype"]);
                }

            }
            string st151 = "select *from fc05 where date='" + dt2 + "';select *from ob where dt<='" + dt2 + "'";
            obtin = 0;
            obwt = 0;
            SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds151 = new DataSet();
            adp151.Fill(ds151);
            //if (ds151.Tables[1].Rows.Count != 0)
            //{
            //    obtin  =Convert.ToDecimal( ds151.Tables[1].Rows[0]["obtin"]);
            //    obwt  = Convert.ToDecimal(ds151.Tables[1].Rows[0]["obqtl"]);

            //}
            //if (btin == 0)
            //{
            //    l37.Text = (obtin).ToString();
            //    l38.Text = obwt.ToString();
            //}
            //else
            //{
            //    l37.Text = btin.ToString();
            //    l38.Text = bwt.ToString();
            //}
        
            if (ds151.Tables[0].Rows.Count != 0)
            {
                Int32 k;
                string p = "";
                string p1 = "";
                string p4 = "";
                Int32 p2 = 0;
                decimal p3 = 0;
                for (k = 0; k < ds151.Tables[0].Rows.Count ; k++)
                {
                    p4 = p4 + ds151.Tables[0].Rows[k]["rem"].ToString() + ",";
                    p4 = p4.Substring(0, p4.Length - 1);
                   p = p + ds151.Tables[0].Rows[k]["Particular"].ToString() + ",";
                   p = p.Substring(0, p.Length - 1);
                   p1 = p1 + ds151.Tables[0].Rows[k]["reqslipno"].ToString() + ",";
                   p1 = p1.Substring(0, p1.Length - 1);
                   p2 = p2 + Convert.ToInt32(ds151.Tables[0].Rows[k]["notin"]);
                   p3 = p3 + Convert.ToDecimal (ds151.Tables[0].Rows[k]["netsakki"]);
                }
                l28.Text = p.ToString();
                l29.Text = p1.ToString();
                l30.Text = p2.ToString();
                l31.Text = p3.ToString();
                l36.Text = p4.ToString();
            }
            else
            {
                l28.Text = "";
                l29.Text = "";
                l30.Text = 0.ToString();
                l31.Text = 0.ToString();
                l36.Text = "";
            }

            string st1 = "select PreNo1,sum(nostype) as notine1,sum(netrws) as sakkiwt1 from fc01 where preno1='" + dt2 + "' group by preno1";
            SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds1 = new DataSet();
            adp1.Fill(ds1);
            Label ptin = ((Label)(e.Row.FindControl("Label23")));
            Label ptin3 = ((Label)(e.Row.FindControl("Label3")));
            Label ptin31 = ((Label)(e.Row.FindControl("Label22")));
            if (ds1.Tables[0].Rows.Count != 0)
            {
                //Int32 a;
                //for (a = 0; a < ds1.Tables[0].Rows.Count; a++)
                //{
                    //tin11 = tin11 + Convert.ToInt32(ds1.Tables[0].Rows[a]["notine1"]);
                //}
                ptin31.Text = ds1.Tables[0].Rows[0]["sakkiwt1"].ToString();
                ptin3.Text = ds1.Tables[0].Rows[0]["notine1"].ToString();
            }
            else
            {
                ptin31.Text = "0".ToString();
                ptin3.Text = "0".ToString();
            }
            Label ptin1 = ((Label)(e.Row.FindControl("Label24")));

            Label ll5 = ((Label)(e.Row.FindControl("Label27")));
        
           // DateTime dt25 = Convert.ToDateTime(DateTime.Parse(ll.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

            string st15 = "select PreNo1,sum(nostype) as notine1,sum(netRWS) as sakkiwt1 from fc01 where preno1<'" + dt2 + "' group by preno1";
            SqlDataAdapter adp15 = new SqlDataAdapter(st15, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds15 = new DataSet();
            adp15.Fill(ds15);
            if (ds15.Tables[0].Rows.Count != 0)
            {
                 Int32 a1;
                 for (a1 = 0; a1 < ds15.Tables[0].Rows.Count; a1++)
                 {
                     sakki11 = sakki11 + Convert.ToDecimal(ds15.Tables[0].Rows[a1]["sakkiwt1"]);
                     tin11 = tin11 + Convert.ToDecimal(ds15.Tables[0].Rows[a1]["notine1"]);
                 }
              
            }
       


            string st14 = "select date,sum(notin) as notine1,sum(netsakki) as sakki from fc05 where date<'" + dt2 + "' group by date";
            SqlDataAdapter adp14 = new SqlDataAdapter(st14, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds14 = new DataSet();
            adp14.Fill(ds14);
            Int32 tini = 0;
            //Int32 tini = 0;
            Label ptin32 = ((Label)(e.Row.FindControl("Label23")));
            Label ptin33 = ((Label)(e.Row.FindControl("Label24")));
            Label ptin321 = ((Label)(e.Row.FindControl("Label33")));
            Label ptin331 = ((Label)(e.Row.FindControl("Label32")));

            Label ptin301 = ((Label)(e.Row.FindControl("Label30")));
            Label ptin311 = ((Label)(e.Row.FindControl("Label31")));
            if (ds14.Tables[0].Rows.Count != 0)
            {
                Int32 a1;
                for (a1 = 0; a1 < ds14.Tables[0].Rows.Count; a1++)
                {
                    ptin.Text =(Convert.ToInt32(ptin.Text)+ Convert.ToInt32( ds14.Tables[0].Rows[a1]["notine1"])).ToString();
                    ptin33.Text =(Convert.ToDecimal(ptin33.Text)+Convert.ToDecimal(  ds14.Tables[0].Rows[a1]["sakki"])).ToString();
                    ptin321.Text =(Convert.ToInt32(ptin321.Text)+Convert.ToInt32( ds14.Tables[0].Rows[a1]["notine1"])).ToString();
                    ptin331.Text = (Convert.ToDecimal(ptin331.Text)+Convert.ToDecimal( ds14.Tables[0].Rows[a1]["sakki"])).ToString();
                }
            }



            ptin1.Text = (sakki11 - Convert.ToDecimal(ptin33.Text)).ToString();
            ptin.Text = (tin11 - Convert.ToInt32(ptin.Text)).ToString();


            //ptin1.Text = ( Convert.ToDecimal(ptin33.Text)).ToString();
            //ptin.Text = ( Convert.ToInt32(ptin.Text)).ToString();
            Label ptin34 = ((Label)(e.Row.FindControl("Label34")));

            Label ptin35 = ((Label)(e.Row.FindControl("Label35")));
            Label ptin24 = ((Label)(e.Row.FindControl("Label24")));
            Label label3 = ((Label)(e.Row.FindControl("Label3")));
            Label label22 = ((Label)(e.Row.FindControl("Label22")));
            Label ptin23 = ((Label)(e.Row.FindControl("Label23")));

            if (ds151.Tables[1].Rows.Count != 0)
            {
                obtin = (Convert.ToDecimal(ds151.Tables[1].Rows[0]["obtin"])+ Convert.ToInt32(ptin23.Text) + Convert.ToInt32(label3.Text)) - Convert.ToInt32(ptin301.Text);
                obwt = ((Convert.ToDecimal(ds151.Tables[1].Rows[0]["obqtl"])+Convert.ToDecimal(ptin24.Text) + Convert.ToDecimal(label22.Text )) - Convert.ToDecimal(ptin311.Text));

            }
            if (btin == 0)
            {
                l37.Text = (obtin).ToString();
                l38.Text = obwt.ToString();
            }
            else
            {
                l37.Text = btin.ToString();
                l38.Text = bwt.ToString();
            }



            ptin34.Text = (Convert.ToDecimal(((Label)(e.Row.FindControl("Label23"))).Text) - Convert.ToDecimal(((Label)(e.Row.FindControl("Label30"))).Text)).ToString();
            ptin35.Text = (Convert.ToDecimal(((Label)(e.Row.FindControl("Label24"))).Text) - Convert.ToDecimal(((Label)(e.Row.FindControl("Label31"))).Text)).ToString();
            btin = Convert.ToDecimal(obtin);
           bwt = Convert.ToDecimal(obwt);
        }


        if (e.Row.RowType == DataControlRowType.Header )
        {
            GridView gv = sender as GridView;

            if (gv.HasControls())
            {

            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            Table t = (Table)GridView1.Controls[0];

            // Adding Cells
            TableCell FileDate = new TableHeaderCell();
            FileDate.ColumnSpan = 5;
            row.Cells.Add(FileDate);

            TableCell cell = new TableHeaderCell();
            cell.ColumnSpan = 2; // ********
            cell.Text = "Daily receipt";
            row.Cells.Add(cell);
            //t.Rows.AddAt(0, row);

            //TableCell FileDate1 = new TableHeaderCell();
            //FileDate1.ColumnSpan = 0;
            //row.Cells.Add(FileDate1);

            TableCell cell1 = new TableHeaderCell();
            cell1.ColumnSpan = 2; // ********
            cell1.Text = "Progressive receipt total";
            row.Cells.Add(cell1);

            TableCell cell2 = new TableHeaderCell();
            cell2.ColumnSpan = 1; // ********
            cell2.Text = "";
            row.Cells.Add(cell2);
            t.Rows.AddAt(0, row);
            TableCell cell3 = new TableHeaderCell();
            cell3.ColumnSpan = 2; // ********
            cell3.Text = "Daily issues";
            row.Cells.Add(cell3);
            TableCell cell4 = new TableHeaderCell();
            cell4.ColumnSpan = 2; // ********
            cell4.Text = "Progressive total issue";
            row.Cells.Add(cell4);
            TableCell cell5 = new TableHeaderCell();
            cell5.ColumnSpan = 2; // ********
            cell5.Text = "Balance";
            row.Cells.Add(cell5);
            TableCell cell6 = new TableHeaderCell();
          
            cell6.Text = "";
            row.Cells.Add(cell6);
            t.Rows.AddAt(0, row);


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
                        td26.Text = " ".ToString();
                        tr.Cells.Add(td26);


                        TableCell td27 = new TableCell();
                        td27.Text = " ".ToString();
                        tr.Cells.Add(td27);
                        TableCell td3 = new TableCell();
                        td3.Text = "4.1".ToString();
                        tr.Cells.Add(td3);

                        TableCell td4 = new TableCell();
                        td4.Text = "4.2".ToString();
                        tr.Cells.Add(td4);

                        TableCell td5 = new TableCell();
                        td5.Text = "5.1".ToString();
                        tr.Cells.Add(td5);


                        TableCell td6 = new TableCell();
                        td6.Text = "5.2".ToString();
                        tr.Cells.Add(td6);

                        TableCell td7 = new TableCell();
                        td7.Text = "6".ToString();
                        tr.Cells.Add(td7);

                        TableCell td8 = new TableCell();
                        td8.Text = "7.1".ToString();
                        tr.Cells.Add(td8);

                        TableCell td9 = new TableCell();
                        td9.Text = "7.2".ToString();
                        tr.Cells.Add(td9);


                        TableCell td10 = new TableCell();
                        td10.Text = "8.1".ToString();
                        tr.Cells.Add(td10);

                        TableCell td11 = new TableCell();
                        td11.Text = "8.2".ToString();
                        tr.Cells.Add(td11);

                        TableCell td12 = new TableCell();
                        td12.Text = "9.1".ToString();
                        tr.Cells.Add(td12);

                        TableCell td13 = new TableCell();
                        td13.Text = "9.2".ToString();
                        tr.Cells.Add(td13);

                        TableCell td14 = new TableCell();
                        td14.Text = "10".ToString();
                        tr.Cells.Add(td14);
                    ((Table)gv.Controls[0]).Rows.Add(tr);
                //}

            }
        }
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
       

    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
       
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        //if (e.CommandName == "Cancel")
        //{
        //    DateTime dt1 = Convert.ToDateTime(((TextBox)(GridView1.FindControl("TextBox1"))).Text);
        //}
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox2.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

        //string st = "select PreNo1,sum(nostype) as notine,sum(sakki_wt_fc03) as sakkiwt from fc01 where preno1<='" + dt2 + "' group by preno1";
        //SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //DataSet ds = new DataSet();
        //adp.Fill(ds);
        //GridView1.DataSource = ds;
        //GridView1.DataBind();


        //string st1 = "select PreNo1,sum(nostype) as notine1,sum(sakki_wt_fc03) as sakkiwt1 from fc01 where preno1<'" + dt2 + "' group by preno1";
        //SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //DataSet ds1 = new DataSet();
        //adp1.Fill(ds1);
        //GridView1.DataSource = ds1;
        //GridView1.DataBind();

        //Label stine = ((Label)(GridView1.Rows[e.RowIndex].FindControl("Label3")));
        //stine.Text = ds.Tables[0].Rows[0]["stine"].ToString();
        //Label sakkiwt = ((Label)(GridView1.Rows[e.RowIndex].FindControl("Label22")));
        //sakkiwt.Text = ds.Tables[0].Rows[0]["sakkiwt"].ToString();
        SqlDataSource2.InsertParameters["date"].DefaultValue = dt2.ToString();
        SqlDataSource2.Insert();
        Response.Redirect("fc05.aspx");
    }
   
    protected void TextBox2_TextChanged(object sender, EventArgs e)
    {
        //DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox2.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

        //string st = "select PreNo1,sum(nostype) as notine,sum(sakki_wt_fc03) as sakkiwt from fc01 where preno1<'" + dt2 + "' group by preno1";
        //SqlDataAdapter adp = new SqlDataAdapter(st, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //DataSet ds = new DataSet();
        //adp.Fill(ds);
        //Int32 notin = 0;
        //if (ds.Tables[0].Rows.Count != 0)
        //{
        //    Int32 i;
        //    for (i = 0; i < ds.Tables[0].Rows.Count; i++)
        //    {
        //        notin  = notin  + Convert.ToInt32(ds.Tables[0].Rows[i]["notine"]);
        //    }
        //}

        ////DateTime dt2 = Convert.ToDateTime(DateTime.Parse(TextBox2.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

        //string st1 = "select date,sum(notin) as notine from fc05 where date<'" + dt2 + "' group by date";
        //SqlDataAdapter adp1 = new SqlDataAdapter(st1, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //DataSet ds1 = new DataSet();
        //adp1.Fill(ds1);
        //if (ds1.Tables[0].Rows.Count != 0)
        //{
        //    notin = notin - Convert.ToInt32(ds1.Tables[0].Rows[0]["notine"]);
        //}
        //Label26.Text = notin.ToString();



      
        
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Response.Redirect("fc06.aspx?id=" + GridView1.DataKeys[GridView1.SelectedIndex].Value);
    }
    protected void month_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }
    protected void yer_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }
    private void dt()
    {
        DateTime live = DateTime.Now;
        Int32 y = live.Year - 1;
        Int32 y2 = live.Year;
        Int32 i;
        for (i = y; i <= y+2; i++)
        {
            yer.Items.Add(i.ToString());


            if (y2 == i)
            {
                yer.Items.FindByText(yer.SelectedItem.Text  ).Selected = false;
               yer.Items.FindByText(i.ToString()).Selected = true;
            }

        }
        Int32 m = live.Month;
        Int32 i2;
        for (i2 = 1; i2 <=month.Items.Count; i2++)
        {
            
           
            if (m == i2)
            {
                month.Items.FindByValue(month.SelectedValue ).Selected = false;
                month.Items.FindByValue(i2.ToString()).Selected = true;
            }
          
        }


    }
}


