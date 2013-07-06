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
        ArrayList arr = new ArrayList();
        Int32 i;
        // count++;
        DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + "1".ToString() + "/" + yer.SelectedItem.Text);
        //  ((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");
        Int32 m, y;
        m = live.Month;
        y = live.Year;
        Int32 d = DateTime.DaysInMonth(y, m);
        DateTime live1 = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + d.ToString() + "/" + yer.SelectedItem.Text);
        SqlDataSource1.SelectParameters["dt"].DefaultValue = live.ToString();
        SqlDataSource1.SelectParameters["dt1"].DefaultValue = live1.ToString();
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));


        //for (i = 1; i <= d; i++)
        //{

        //    arr.Add(i.ToString() + "/" + month.SelectedValue.ToString() + "/" + yer.SelectedItem.Text);

        //}
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

            FileDate.Text = "Date";

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


            FileDate33.Text = "";

            row1.Cells.Add(FileDate33);



            TableCell FileDate326 = new TableHeaderCell();


            FileDate326.Text = "Steam coal(in Qtls)";

            row1.Cells.Add(FileDate326);

            TableCell FileDate337 = new TableHeaderCell();


            FileDate337.Text = "Fuel wood(in Qtls)";

            row1.Cells.Add(FileDate337);



            TableCell FileDate327 = new TableHeaderCell();


            FileDate327.Text = "";

            row1.Cells.Add(FileDate327);


            TableCell FileDate338 = new TableHeaderCell();


            FileDate338.Text = "Boiler foreman";

            row1.Cells.Add(FileDate338);



            TableCell FileDate328 = new TableHeaderCell();


            FileDate328.Text = "Factory manager/General Manager";

            row1.Cells.Add(FileDate328);

            TableCell FileDate339 = new TableHeaderCell();


            FileDate339.Text = "";

            row1.Cells.Add(FileDate339);



           

           


            t1.Rows.AddAt(0, row1);
         

            TableCell cell3 = new TableHeaderCell();

            cell3.ColumnSpan = 2;

            cell3.Text = "Working hours";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();


            //cell4.ColumnSpan = 2;
            cell4.Text = "Total hours";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

            TableCell cell6 = new TableHeaderCell();

            cell6.ColumnSpan = 2;

            cell6.Text = "Fuel consumed in boiler";

            row.Cells.Add(cell6);



            t.Rows.AddAt(0, row);


            TableCell cell71 = new TableHeaderCell();

            // cell71.ColumnSpan = 2;

            cell71.Text = "Indent number";

            row.Cells.Add(cell71);



            TableCell cell7 = new TableHeaderCell();

            cell7.ColumnSpan = 2;

            cell7.Text = "Signature";

            row.Cells.Add(cell7);

            t.Rows.AddAt(0, row);
            TableCell cell8 = new TableHeaderCell();


           // cell8.ColumnSpan = 2;
            cell8.Text = "Remarks";

            row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
           
           

            t.Rows.AddAt(0, row);



        }
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "add")
        {
            DateTime dt, work_from, work_to;
            decimal steam_coal, fuel_wood;
            Int32 indent_number;
            string rem, dt1;
            dt1 = ((TextBox)(GridView1.FooterRow.FindControl("TextBox7"))).Text;
            dt = Convert.ToDateTime(DateTime.Parse(dt1.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));

            work_from = Convert.ToDateTime(((TextBox)(GridView1.FooterRow.FindControl("time"))).Text);
            work_to = Convert.ToDateTime(((TextBox)(GridView1.FooterRow.FindControl("time2"))).Text);
            steam_coal = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox11"))).Text);
            fuel_wood = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox12"))).Text);
           indent_number = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("TextBox13"))).Text);
           rem = ((TextBox)(GridView1.FooterRow.FindControl("TextBox14"))).Text;

           SqlDataSource1.InsertParameters["dt"].DefaultValue = dt.ToString();
           SqlDataSource1.InsertParameters["fm"].DefaultValue = work_from.ToString();
           SqlDataSource1.InsertParameters["t_o"].DefaultValue = work_to.ToString();
           SqlDataSource1.InsertParameters["steam_coal"].DefaultValue = steam_coal.ToString();
           SqlDataSource1.InsertParameters["fuel_wood"].DefaultValue = fuel_wood.ToString();
           SqlDataSource1.InsertParameters["indent_number"].DefaultValue = indent_number.ToString();
           SqlDataSource1.InsertParameters["rem"].DefaultValue = rem.ToString();
           SqlDataSource1.Insert();
           DataBind();
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        //if (e.Row.RowType == DataControlRowType.DataRow)
        //{
        //    DateTime dt3;
        //    Label lb=((Label)(e.Row.FindControl("Label1")));
        //     dt3 = Convert.ToDateTime(DateTime.Parse(lb.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));
            
        //    string st151 = "select *from fc31 where dt='"+dt3+"'";
        //    SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        //    DataSet ds151 = new DataSet();
        //    adp151.Fill(ds151); 
        
        //    if (ds151.Tables[0].Rows.Count != 0)
        //    {
        //        Int32 i;
              
        //        DateTime dt, work_from, work_to;

        //        for (i = 0; i < ds151.Tables[0].Rows.Count; i++)
        //        {
        //            if (ds151.Tables[0].Rows.Count == 1)
        //            {
        //                //((Label)(e.Row.FindControl("Label2"))).Text = Convert.ToDateTime(ds151.Tables[0].Rows[i][2]).ToString("hh:mm tt");
        //              //  ((Label)(e.Row.FindControl("Label3"))).Text = Convert.ToDateTime(ds151.Tables[0].Rows[i][3]).ToString("hh:mm tt");

        //                //((Label)(e.Row.FindControl("Label4"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //              //  ((Label)(e.Row.FindControl("Label5"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //              //  ((Label)(e.Row.FindControl("Label6"))).Text = ds151.Tables[0].Rows[i][5].ToString();
        //               // ((Label)(e.Row.FindControl("Label7"))).Text = ds151.Tables[0].Rows[i][6].ToString();
        //               // ((Label)(e.Row.FindControl("Label8"))).Text = ds151.Tables[0].Rows[i][7].ToString();
        //            }
        //            else
        //            {


        //                //((Label)(e.Row.FindControl("Label2"))).Text += Convert.ToDateTime(ds151.Tables[0].Rows[i][2]).ToString("hh:mm tt") + "<br>";
        //                //((Label)(e.Row.FindControl("Label3"))).Text += Convert.ToDateTime(ds151.Tables[0].Rows[i][3]).ToString("hh:mm tt") + "<br>";
        //                ////((Label)(e.Row.FindControl("Label4"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //                //((Label)(e.Row.FindControl("Label5"))).Text = ds151.Tables[0].Rows[i][4].ToString();
        //                //((Label)(e.Row.FindControl("Label6"))).Text = ds151.Tables[0].Rows[i][5].ToString();
        //                //((Label)(e.Row.FindControl("Label7"))).Text = ds151.Tables[0].Rows[i][6].ToString();
        //                //((Label)(e.Row.FindControl("Label8"))).Text = ds151.Tables[0].Rows[i][7].ToString();
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
        GridView1.EditIndex = -1;
        bind();
    }

    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        DateTime dt, work_from, work_to;
        decimal steam_coal, fuel_wood;
        Int32 indent_number;
        string rem, dt1, dt2, dt3;
        dt1 = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("fTextBox7"))).Text;
        dt = Convert.ToDateTime(DateTime.Parse(dt1.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));
        dt2 = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text;
        dt3 = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text;

        work_from = Convert.ToDateTime(DateTime.Parse(dt2.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"))); ;
        work_to = Convert.ToDateTime(DateTime.Parse(dt3.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"))); ;
       
        // work_to = Convert.ToDateTime(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text);
        steam_coal = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text);
        fuel_wood = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text);
        indent_number = Convert.ToInt32(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text);
        rem = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("fTextBox14"))).Text;
        SqlDataSource1.UpdateParameters["code"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.UpdateParameters["dt"].DefaultValue = dt.ToString();
        SqlDataSource1.UpdateParameters["fm"].DefaultValue = work_from.ToString();
        SqlDataSource1.UpdateParameters["t_o"].DefaultValue = work_to.ToString();
        SqlDataSource1.UpdateParameters["steam_coal"].DefaultValue = steam_coal.ToString();
        SqlDataSource1.UpdateParameters["fuel_wood"].DefaultValue = fuel_wood.ToString();
        SqlDataSource1.UpdateParameters["indent_number"].DefaultValue = indent_number.ToString();
        SqlDataSource1.UpdateParameters["rem"].DefaultValue = rem.ToString();
        SqlDataSource1.Update();
        GridView1.EditIndex = -1;
        bind();
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        SqlDataSource1.DeleteParameters["Code"].DefaultValue = GridView1.DataKeys[e.RowIndex].Value.ToString();
        SqlDataSource1.Delete();
        bind();
    }
}
