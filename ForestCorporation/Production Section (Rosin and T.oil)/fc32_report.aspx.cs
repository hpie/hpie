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
public partial class fc31 : System.Web.UI.Page
{
    TimeSpan ts;
    string  tot;
    TimeSpan TS;
    int hour ;
    int mins ;
    int secs ;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            dt();
            bind();
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
        if (Request.QueryString["dt"] == null)
        {
            Response.Redirect("fc32.aspx");
        }
        DateTime dt = Convert.ToDateTime(DateTime.Parse(Request.QueryString["dt"].ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));
        SqlDataSource1.SelectParameters["dt"].DefaultValue = dt.ToString();
        SqlDataSource2.SelectParameters["dt"].DefaultValue = dt.ToString();

        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        DataView dv1 = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        GridView2.DataSource = dv1;
        GridView2.DataBind();

        GridView1.DataSource = dv;
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

            FileDate.Text = "Time";

            row.Cells.Add(FileDate);



            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t1 = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate3 = new TableHeaderCell();

            FileDate3.ColumnSpan = 1;

            row1.Cells.Add(FileDate3);

            TableCell FileDate31 = new TableHeaderCell();


            FileDate31.Text = "From";

            row1.Cells.Add(FileDate31);


            TableCell FileDate32 = new TableHeaderCell();


            FileDate32.Text = "To";

            row1.Cells.Add(FileDate32);

            TableCell FileDate33 = new TableHeaderCell();


            FileDate33.Text = "From";

            row1.Cells.Add(FileDate33);


            TableCell FileDate329 = new TableHeaderCell();


            FileDate329.Text = "To";

            row1.Cells.Add(FileDate329);

            TableCell FileDate326 = new TableHeaderCell();


            FileDate326.Text = "Furnace Oil Pump Pressure";

            row1.Cells.Add(FileDate326);

            TableCell FileDate337 = new TableHeaderCell();


            FileDate337.Text = "Temperature Of Furnace Oil";

            row1.Cells.Add(FileDate337);



            TableCell FileDate327 = new TableHeaderCell();


            FileDate327.Text = "Boiler Steam Pressure";

            row1.Cells.Add(FileDate327);


            TableCell FileDate338 = new TableHeaderCell();


            FileDate338.Text = "Temperature of Oil service tank";

            row1.Cells.Add(FileDate338);



            TableCell FileDate328 = new TableHeaderCell();


            FileDate328.Text = "PH(Water)";

            row1.Cells.Add(FileDate328);

            TableCell FileDate339 = new TableHeaderCell();


            FileDate339.Text = "Water Charges";

            row1.Cells.Add(FileDate339);



            TableCell FileDate340 = new TableHeaderCell();


            FileDate340.Text = "Furanace oil expense";

            row1.Cells.Add(FileDate340);


            TableCell FileDate341 = new TableHeaderCell();


            FileDate341.Text = "Particulars";

            row1.Cells.Add(FileDate341);



            t1.Rows.AddAt(0, row1);
         

            TableCell cell3 = new TableHeaderCell();

            cell3.ColumnSpan = 2;

            cell3.Text = "Start Time";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();


            cell4.ColumnSpan = 2;
            cell4.Text = "Stop Time";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

           // TableCell cell6 = new TableHeaderCell();

           // cell6.ColumnSpan = 2;

           // cell6.Text = "Fuel consumed in boiler";

           // row.Cells.Add(cell6);



           // t.Rows.AddAt(0, row);


           // TableCell cell71 = new TableHeaderCell();

           // // cell71.ColumnSpan = 2;

           // cell71.Text = "Indent number";

           // row.Cells.Add(cell71);



           // TableCell cell7 = new TableHeaderCell();

           // cell7.ColumnSpan = 2;

           // cell7.Text = "Signature";

           // row.Cells.Add(cell7);

           // t.Rows.AddAt(0, row);
           // TableCell cell8 = new TableHeaderCell();


           //// cell8.ColumnSpan = 2;
           // cell8.Text = "Remarks";

           // row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
           
           

            t.Rows.AddAt(0, row);



        }
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {

    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "add")
        {
            string swork_from, swork_to, twork_from, twork_to;
            decimal steam_coal, fuel_wood;
            Int32 indent_number;
            string tim, dt1,f_oil,t_oil,b_steam,t_oil_ser,ph_water,water_charge,f_oil_ex,particulars;
           // dt1 = ((TextBox)(GridView1.FooterRow.FindControl("TextBox7"))).Text;
            tim = ((TextBox)(GridView1.FooterRow.FindControl("TextBox7"))).Text;

            swork_from =((TextBox)(GridView1.FooterRow.FindControl("time"))).Text;
            swork_to = ((TextBox)(GridView1.FooterRow.FindControl("time2"))).Text;
            twork_from = ((TextBox)(GridView1.FooterRow.FindControl("TextBox10"))).Text;
            twork_to = ((TextBox)(GridView1.FooterRow.FindControl("TextBox11"))).Text;
            f_oil = ((TextBox)(GridView1.FooterRow.FindControl("TextBox12"))).Text;
            t_oil = ((TextBox)(GridView1.FooterRow.FindControl("TextBox13"))).Text;
            b_steam = ((TextBox)(GridView1.FooterRow.FindControl("TextBox15"))).Text;
            t_oil_ser = ((TextBox)(GridView1.FooterRow.FindControl("TextBox16"))).Text;
            ph_water = ((TextBox)(GridView1.FooterRow.FindControl("TextBox14"))).Text;
           water_charge = ((TextBox)(GridView1.FooterRow.FindControl("TextBox17"))).Text;
           f_oil_ex = ((TextBox)(GridView1.FooterRow.FindControl("TextBox18"))).Text;
           particulars = ((TextBox)(GridView1.FooterRow.FindControl("TextBox19"))).Text;

           SqlDataSource1.InsertParameters["f_time"].DefaultValue = swork_from.ToString();
           SqlDataSource1.InsertParameters["t_time"].DefaultValue = swork_to.ToString();
           SqlDataSource1.InsertParameters["sf_time"].DefaultValue = twork_from.ToString();
           SqlDataSource1.InsertParameters["st_time"].DefaultValue =twork_to.ToString();
           SqlDataSource1.InsertParameters["f_oil"].DefaultValue =f_oil .ToString();
           SqlDataSource1.InsertParameters["t_oil"].DefaultValue = t_oil.ToString();
           SqlDataSource1.InsertParameters["b_steam"].DefaultValue = b_steam.ToString();
           SqlDataSource1.InsertParameters["t_oil_ser"].DefaultValue =t_oil_ser .ToString();
           SqlDataSource1.InsertParameters["ph_water"].DefaultValue = ph_water .ToString();
           SqlDataSource1.InsertParameters["water_charge"].DefaultValue = water_charge.ToString();
           SqlDataSource1.InsertParameters["f_oil_ex"].DefaultValue = f_oil_ex.ToString();
           SqlDataSource1.InsertParameters["Particulars"].DefaultValue = particulars.ToString();
           SqlDataSource1.InsertParameters["time"].DefaultValue =tim.ToString();
          DateTime dt = Convert.ToDateTime(DateTime.Parse(TextBox20.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));
          SqlDataSource1.InsertParameters["dt"].DefaultValue = dt.ToString();

           SqlDataSource1.Insert();
           DataBind();
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            //DateTime dt3;
            string lb = ((Label)(e.Row.FindControl("Label16"))).Text;
            if (lb == "ss")
            {
                e.Row.Visible = false;
            }
            else
            {
                e.Row.Visible = true;

            }
        }
        //   // dt3 = Convert.ToDateTime(DateTime.Parse(lb.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));

        //    string st151 = "select *from fc32";
        //    SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //    DataSet ds151 = new DataSet();
        //    adp151.Fill(ds151);

        //    if (ds151.Tables[0].Rows.Count != 0)
        //    {
        //        Int32 i;

        //       // DateTime dt, work_from, work_to;

        //        for (i = 0; i < ds151.Tables[0].Rows.Count; i++)
        //        {
                    
        //        for (int i1 = 0; i1 <ds151.Tables[0].Columns.Count-1; i1++)
        //        {
        //           // e.Row.Cells[i1].Text = "";
        //            e.Row.Cells[i1].Text = ds151.Tables[0].Rows[i][i1+1].ToString();
        //        }
        //        }
        //    }
        //}
        //            if (ds151.Tables[0].Rows.Count == 1)
        //            {
        //                ((Label)(e.Row.FindControl("Label2"))).Text = Convert.ToDateTime(ds151.Tables[0].Rows[i][2]).ToString("hh:mm tt");
        //                ((Label)(e.Row.FindControl("Label3"))).Text = Convert.ToDateTime(ds151.Tables[0].Rows[i][3]).ToString("hh:mm tt");

        //                //((Label)(e.Row.FindControl("Label4"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //                ((Label)(e.Row.FindControl("Label5"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //                ((Label)(e.Row.FindControl("Label6"))).Text = ds151.Tables[0].Rows[i][5].ToString();
        //                ((Label)(e.Row.FindControl("Label7"))).Text = ds151.Tables[0].Rows[i][6].ToString();
        //                ((Label)(e.Row.FindControl("Label8"))).Text = ds151.Tables[0].Rows[i][7].ToString();
        //            }
        //            else
        //            {


        //                ((Label)(e.Row.FindControl("Label2"))).Text += Convert.ToDateTime(ds151.Tables[0].Rows[i][2]).ToString("hh:mm tt") + "<br>";
        //                ((Label)(e.Row.FindControl("Label3"))).Text += Convert.ToDateTime(ds151.Tables[0].Rows[i][3]).ToString("hh:mm tt") + "<br>";
        //                //((Label)(e.Row.FindControl("Label4"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //                ((Label)(e.Row.FindControl("Label5"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //                ((Label)(e.Row.FindControl("Label6"))).Text = ds151.Tables[0].Rows[i][5].ToString();
        //                ((Label)(e.Row.FindControl("Label7"))).Text = ds151.Tables[0].Rows[i][6].ToString();
        //                ((Label)(e.Row.FindControl("Label8"))).Text = ds151.Tables[0].Rows[i][7].ToString();
        //            }


        //            work_from = Convert.ToDateTime(ds151.Tables[0].Rows[i][2]);
        //            work_to = Convert.ToDateTime(ds151.Tables[0].Rows[i][3]);        

        //            ts = work_from-work_to;

        //            DateTime dFrom;
        //            DateTime dTo;

        //            string sDateFrom = work_from.ToString("H:mm:ss zzz");
                   
        //            string sDateTo = work_to.ToString("H:mm:ss zzz");
              
        //            if (DateTime.TryParse(sDateFrom, out work_from) && DateTime.TryParse(sDateTo, out work_to))
        //            {
        //              TS=(work_to - work_from);
        //             hour =hour+ TS.Hours;
        //                 mins =mins+ TS.Minutes;
        //                secs =secs+ TS.Seconds;
        //                string timeDiff = hour.ToString("00") + ":" + mins.ToString("00") + ":" + secs.ToString("00");

        //                //DateTime old = Convert.ToDateTime(timeDiff);
        //                //string old5 = old.ToString("H:mm:ss zzz");

        //                //TimeSpan a = new TimeSpan(old5);
        //                //TimeSpan b = new TimeSpan(3, 0, 0);
        //                //TimeSpan c = a + c;


        //                tot = timeDiff;
        //                //  Response.Write(timeDiff); //output 16 mins in format 00:16:00        } 

        //            }

        //        }

        //        ((Label)(e.Row.FindControl("Label4"))).Text = tot.ToString();
        //    }
        //}
    }
    //public static List<TimeSpan> TimeSpansInRange(TimeSpan start, TimeSpan end, TimeSpan interval)
    //{ List<TimeSpan> timeSpans = new List<TimeSpan>(); 
    //    while (start.Add(interval) <= end)
    //    { timeSpans.Add(start); 
    //        start = start.Add(interval);
    //    } return timeSpans; }         
    //public static List<TimeSpan> PossibleTimeSpansInDay() 
    //{ 
    //    return TimeSpansInRange(new TimeSpan(8, 0, 0), new TimeSpan(22, 30, 0), new TimeSpan(0, 30, 0));
    //} 
    protected void GridView1_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {

    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        bind();
    }
    private string getdate(DateTime dt)
    {
        return dt.ToString("dd/MM/yyyy");
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
e.Row.Cells[0].Text=getdate(Convert.ToDateTime(e.Row.Cells[0].Text)).ToString();
        }
    }
}
