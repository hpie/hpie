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

public partial class fc09 : System.Web.UI.Page
{
    Int32 count;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            dt();
          

            bind();
        }
    }
    protected void yer_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }
    protected void month_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }
    private void bind()
    {
        ArrayList arr = new ArrayList();
        Int32 i;
        count++;
        DateTime live = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + count.ToString() + "/" + yer.SelectedItem.Text);
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
    public string dt(DateTime dt5)
    {
        return dt5.ToString("dd/MM/yyyy");
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
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
        DateTime dt=  Convert.ToDateTime(DateTime.Parse(     ((Label)(GridView1.Rows[e.NewEditIndex].FindControl("Label1"))).Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));

            //string live =((Label)(e.Row.FindControl("Label1"))).Text;
           // DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc09 where dt='" + dt + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox1"))).Text = ds.Tables[0].Rows[0][2].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox2"))).Text = ds.Tables[0].Rows[0][3].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox3"))).Text = ds.Tables[0].Rows[0][4].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox4"))).Text = ds.Tables[0].Rows[0][5].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox5"))).Text = ds.Tables[0].Rows[0][6].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox6"))).Text = ds.Tables[0].Rows[0][7].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox7"))).Text = ds.Tables[0].Rows[0][8].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox8"))).Text = ds.Tables[0].Rows[0][9].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox9"))).Text = ds.Tables[0].Rows[0][10].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox10"))).Text = ds.Tables[0].Rows[0][11].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox11"))).Text = ds.Tables[0].Rows[0][12].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox12"))).Text = ds.Tables[0].Rows[0][13].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox13"))).Text = ds.Tables[0].Rows[0][14].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox14"))).Text = ds.Tables[0].Rows[0][15].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox15"))).Text = ds.Tables[0].Rows[0][16].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox16"))).Text = ds.Tables[0].Rows[0][17].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox17"))).Text = ds.Tables[0].Rows[0][18].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox18"))).Text = ds.Tables[0].Rows[0][19].ToString();
                ((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox19"))).Text = ds.Tables[0].Rows[0][20].ToString();
              
               
            }
    }
    protected void GridView1_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {
        GridView1.EditIndex = -1;
        bind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState==DataControlRowState.Alternate)
        {

            string live = ((Label)(e.Row.FindControl("Label1"))).Text;
            DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc09 where dt='" + live1 + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                ((Label)(e.Row.FindControl("Label2"))).Text = ds.Tables[0].Rows[0][2].ToString();
                ((Label)(e.Row.FindControl("Label3"))).Text = ds.Tables[0].Rows[0][3].ToString();
                ((Label)(e.Row.FindControl("Label4"))).Text = ds.Tables[0].Rows[0][4].ToString();
                ((Label)(e.Row.FindControl("Label5"))).Text = ds.Tables[0].Rows[0][5].ToString();
                ((Label)(e.Row.FindControl("Label6"))).Text = ds.Tables[0].Rows[0][6].ToString();
                ((Label)(e.Row.FindControl("Label7"))).Text = ds.Tables[0].Rows[0][7].ToString();
                ((Label)(e.Row.FindControl("Label8"))).Text = ds.Tables[0].Rows[0][8].ToString();
                ((Label)(e.Row.FindControl("Label9"))).Text = ds.Tables[0].Rows[0][9].ToString();
                ((Label)(e.Row.FindControl("Label10"))).Text = ds.Tables[0].Rows[0][10].ToString();
                ((Label)(e.Row.FindControl("Label11"))).Text = ds.Tables[0].Rows[0][11].ToString();
                ((Label)(e.Row.FindControl("Label12"))).Text = ds.Tables[0].Rows[0][12].ToString();
                ((Label)(e.Row.FindControl("Label13"))).Text = ds.Tables[0].Rows[0][13].ToString();
                ((Label)(e.Row.FindControl("Label14"))).Text = ds.Tables[0].Rows[0][14].ToString();
                ((Label)(e.Row.FindControl("Label15"))).Text = ds.Tables[0].Rows[0][15].ToString();
                ((Label)(e.Row.FindControl("Label16"))).Text = ds.Tables[0].Rows[0][16].ToString();
                ((Label)(e.Row.FindControl("Label17"))).Text = ds.Tables[0].Rows[0][17].ToString();
                ((Label)(e.Row.FindControl("Label18"))).Text = ds.Tables[0].Rows[0][18].ToString();
                ((Label)(e.Row.FindControl("Label19"))).Text = ds.Tables[0].Rows[0][19].ToString();
                ((Label)(e.Row.FindControl("Label20"))).Text = ds.Tables[0].Rows[0][20].ToString();
       
               


            }
        }
        if (e.Row.RowState == DataControlRowState.Edit  )
        {
            DateTime dt=  Convert.ToDateTime(DateTime.Parse(     ((Label)(e.Row.FindControl("Label1"))).Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));

            //string live =((Label)(e.Row.FindControl("Label1"))).Text;
           // DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc09 where dt='" + dt + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count != 0)
            {
                //((TextBox)(e.Row.FindControl("TextBox1"))).Text = ds.Tables[0].Rows[0][2].ToString();
                //((TextBox)(e.Row.FindControl("TextBox2"))).Text = ds.Tables[0].Rows[0][3].ToString();
                //((TextBox)(e.Row.FindControl("TextBox3"))).Text = ds.Tables[0].Rows[0][4].ToString();
                //((TextBox)(e.Row.FindControl("TextBox4"))).Text = ds.Tables[0].Rows[0][5].ToString();
                //((TextBox)(e.Row.FindControl("TextBox5"))).Text = ds.Tables[0].Rows[0][6].ToString();
                //((TextBox)(e.Row.FindControl("TextBox6"))).Text = ds.Tables[0].Rows[0][7].ToString();
                //((TextBox)(e.Row.FindControl("TextBox7"))).Text = ds.Tables[0].Rows[0][8].ToString();
                //((TextBox)(e.Row.FindControl("TextBox8"))).Text = ds.Tables[0].Rows[0][9].ToString();
                //((TextBox)(e.Row.FindControl("TextBox9"))).Text = ds.Tables[0].Rows[0][10].ToString();
                //((TextBox)(e.Row.FindControl("TextBox10"))).Text = ds.Tables[0].Rows[0][11].ToString();
                //((TextBox)(e.Row.FindControl("TextBox11"))).Text = ds.Tables[0].Rows[0][12].ToString();
                //((TextBox)(e.Row.FindControl("TextBox12"))).Text = ds.Tables[0].Rows[0][13].ToString();
                //((TextBox)(e.Row.FindControl("TextBox13"))).Text = ds.Tables[0].Rows[0][14].ToString();
                //((TextBox)(e.Row.FindControl("TextBox14"))).Text = ds.Tables[0].Rows[0][15].ToString();
                //((TextBox)(e.Row.FindControl("TextBox15"))).Text = ds.Tables[0].Rows[0][16].ToString();
                //((TextBox)(e.Row.FindControl("TextBox16"))).Text = ds.Tables[0].Rows[0][17].ToString();
                //((TextBox)(e.Row.FindControl("TextBox17"))).Text = ds.Tables[0].Rows[0][18].ToString();
                //((TextBox)(e.Row.FindControl("TextBox18"))).Text = ds.Tables[0].Rows[0][19].ToString();
                //((TextBox)(e.Row.FindControl("TextBox19"))).Text = ds.Tables[0].Rows[0][20].ToString();
                //((TextBox)(e.Row.FindControl("TextBox20"))).Text = ds.Tables[0].Rows[0][21].ToString();
                //((TextBox)(e.Row.FindControl("TextBox21"))).Text = ds.Tables[0].Rows[0][22].ToString();
                //((Label)(e.Row.FindControl("Label1"))).Text = dt.ToString("dd/MM/yyyy");
                ////((Label)(e.Row.FindControl("TextBox23"))).Text = (Convert.ToDecimal(ds.Tables[0].Rows[0][6]) + Convert.ToDecimal(ds.Tables[0].Rows[0][8]) + Convert.ToDecimal(ds.Tables[0].Rows[0][10]) + Convert.ToDecimal(ds.Tables[0].Rows[0][12]) + Convert.ToDecimal(ds.Tables[0].Rows[0][14]) + Convert.ToDecimal(ds.Tables[0].Rows[0][16]) + Convert.ToDecimal(ds.Tables[0].Rows[0][18]) + Convert.ToDecimal(ds.Tables[0].Rows[0][20]) + Convert.ToDecimal(ds.Tables[0].Rows[0][22])).ToString();
                //((TextBox)(e.Row.FindControl("TextBox24"))).Text = ds.Tables[0].Rows[0][25].ToString();
                //((TextBox)(e.Row.FindControl("TextBox25"))).Text = ds.Tables[0].Rows[0][26].ToString();
                //((TextBox)(e.Row.FindControl("TextBox26"))).Text = ds.Tables[0].Rows[0][27].ToString();



            }
            else
            {
                //((TextBox)(e.Row.FindControl("TextBox1"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox2"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox3"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox4"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox5"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox6"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox7"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox8"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox9"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox10"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox11"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox12"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox13"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox14"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox15"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox16"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox17"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox18"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox19"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox20"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox21"))).Text = 0.ToString();
                ////((Label)(e.Row.FindControl("TextBox22"))).Text = (Convert.ToDecimal(ds.Tables[0].Rows[0][5]) + Convert.ToDecimal(ds.Tables[0].Rows[0][7]) + Convert.ToDecimal(ds.Tables[0].Rows[0][9]) + Convert.ToDecimal(ds.Tables[0].Rows[0][11]) + Convert.ToDecimal(ds.Tables[0].Rows[0][13]) + Convert.ToDecimal(ds.Tables[0].Rows[0][15]) + Convert.ToDecimal(ds.Tables[0].Rows[0][17]) + Convert.ToDecimal(ds.Tables[0].Rows[0][19]) + Convert.ToDecimal(ds.Tables[0].Rows[0][21])).ToString();
                ////((Label)(e.Row.FindControl("TextBox23"))).Text = (Convert.ToDecimal(ds.Tables[0].Rows[0][6]) + Convert.ToDecimal(ds.Tables[0].Rows[0][8]) + Convert.ToDecimal(ds.Tables[0].Rows[0][10]) + Convert.ToDecimal(ds.Tables[0].Rows[0][12]) + Convert.ToDecimal(ds.Tables[0].Rows[0][14]) + Convert.ToDecimal(ds.Tables[0].Rows[0][16]) + Convert.ToDecimal(ds.Tables[0].Rows[0][18]) + Convert.ToDecimal(ds.Tables[0].Rows[0][20]) + Convert.ToDecimal(ds.Tables[0].Rows[0][22])).ToString();
                //((TextBox)(e.Row.FindControl("TextBox24"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox25"))).Text = 0.ToString();
                //((TextBox)(e.Row.FindControl("TextBox26"))).Text = 0.ToString();
            }
          
                     
        }
        if (e.Row.RowType == DataControlRowType.Header)
        {
            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            GridViewRow row3 = new GridViewRow(4, 4, DataControlRowType.Header, DataControlRowState.Normal);
            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            Table t = (Table)GridView1.Controls[0];
            if (gv.HasControls())
            {

                



              


                row.HorizontalAlign = HorizontalAlign.Center;
               
                row1.HorizontalAlign = HorizontalAlign.Center;
                TableCell FileDate1 = new TableHeaderCell();
                FileDate1.Text = "Date";
                FileDate1.HorizontalAlign = HorizontalAlign.Center;
                row1.Cells.Add(FileDate1);
                TableCell FileDate2 = new TableHeaderCell();
                FileDate2.Text = "Tins";
                FileDate2.HorizontalAlign = HorizontalAlign.Center;
                row1.Cells.Add(FileDate2);
                TableCell FileDate3 = new TableHeaderCell();
                FileDate3.Text = "Drums";
                FileDate3.HorizontalAlign = HorizontalAlign.Center;
                row1.Cells.Add(FileDate3);

                TableCell FileDate4 = new TableHeaderCell();
                FileDate4.Text = "Net Wt with Sakki";
                row1.Cells.Add(FileDate4);

                TableCell FileDate5 = new TableHeaderCell();
                FileDate5.Text = "X";
                FileDate5.ColumnSpan = 2;
           
                row3.HorizontalAlign = HorizontalAlign.Center;
                TableCell FileDate51 = new TableHeaderCell();
                FileDate51.Text = "";               
                FileDate51.ColumnSpan = 4;
                 row3.Cells.Add(FileDate51);

                TableCell FileDate52 = new TableHeaderCell();
                FileDate52.Text = "TPB";
                row3.Cells.Add(FileDate52);

                TableCell FileDate53 = new TableHeaderCell();
                FileDate53.Text = "wt.";
                row3.Cells.Add(FileDate53);

                TableCell FileDate54 = new TableHeaderCell();
                FileDate54.Text = "TPB";
                row3.Cells.Add(FileDate54);

                TableCell FileDate55 = new TableHeaderCell();
                FileDate55.Text = "wt.";
                row3.Cells.Add(FileDate55);

                TableCell FileDate56 = new TableHeaderCell();
                FileDate56.Text = "TPB";
                row3.Cells.Add(FileDate56);
                TableCell FileDate57 = new TableHeaderCell();
                FileDate57.Text = "wt.";
                row3.Cells.Add(FileDate57);
                TableCell FileDate58 = new TableHeaderCell();
                FileDate58.Text = "TPB";
                row3.Cells.Add(FileDate58);
                TableCell FileDate59 = new TableHeaderCell();
                FileDate59.Text = "wt.";
                row3.Cells.Add(FileDate59);
                TableCell FileDate60 = new TableHeaderCell();
                FileDate60.Text = "TPB";
                row3.Cells.Add(FileDate60);
                TableCell FileDate61 = new TableHeaderCell();
                FileDate61.Text = "wt.";
                row3.Cells.Add(FileDate61);
                TableCell FileDate62 = new TableHeaderCell();
                FileDate62.Text = "TPB";
                row3.Cells.Add(FileDate62);
                TableCell FileDate63 = new TableHeaderCell();
                FileDate63.Text = "wt.";
                row3.Cells.Add(FileDate63);
                TableCell FileDate64 = new TableHeaderCell();
                FileDate64.Text = "TPB";
                row3.Cells.Add(FileDate64);
                TableCell FileDate65 = new TableHeaderCell();
                FileDate65.Text = "wt.";
                row3.Cells.Add(FileDate65);

                TableCell FileDate66 = new TableHeaderCell();
                FileDate66.Text = "TPB";
                row3.Cells.Add(FileDate66);
                TableCell FileDate67 = new TableHeaderCell();
                FileDate67.Text = "wt.";
                row3.Cells.Add(FileDate67);

                TableCell FileDate68 = new TableHeaderCell();
                FileDate68.Text = "TPB";
                row3.Cells.Add(FileDate68);
                TableCell FileDate69 = new TableHeaderCell();
                FileDate69.Text = "wt.";
                row3.Cells.Add(FileDate69);

                TableCell FileDate70 = new TableHeaderCell();
                FileDate70.Text = "TPB";
                row3.Cells.Add(FileDate70);
                TableCell FileDate71 = new TableHeaderCell();
                FileDate71.Text = "wt.";
                row3.Cells.Add(FileDate71);

                TableCell FileDate72 = new TableHeaderCell();
                FileDate72.Text = "";
                FileDate72.ColumnSpan = 4;
                row3.Cells.Add(FileDate72);

              
            
                row1.Cells.Add(FileDate5);




                TableCell FileDate6 = new TableHeaderCell();
                FileDate6.Text = "WW";
                FileDate6.ColumnSpan = 2;
                row1.Cells.Add(FileDate6);

                TableCell FileDate7 = new TableHeaderCell();
                FileDate7.Text = "WG";
                FileDate7.ColumnSpan = 2;
                row1.Cells.Add(FileDate7);

                TableCell FileDate8 = new TableHeaderCell();
                FileDate8.Text = "N";
                FileDate8.ColumnSpan = 2;
                row1.Cells.Add(FileDate8);

                TableCell FileDate9 = new TableHeaderCell();
                FileDate9.Text = "M";
                FileDate9.ColumnSpan = 2;
                row1.Cells.Add(FileDate9);

                TableCell FileDate10 = new TableHeaderCell();
                FileDate10.Text = "K";
                FileDate10.ColumnSpan = 2;
                row1.Cells.Add(FileDate10);


                TableCell FileDate11 = new TableHeaderCell();
                FileDate11.Text = "H";
                FileDate11.ColumnSpan = 2;
                row1.Cells.Add(FileDate11);


                TableCell FileDate12 = new TableHeaderCell();
                FileDate12.Text = "D";
                FileDate12.ColumnSpan = 2;
                row1.Cells.Add(FileDate12);

                TableCell FileDate13 = new TableHeaderCell();
                FileDate13.Text = "B";
                FileDate13.ColumnSpan = 2;
                row1.Cells.Add(FileDate13);

                TableCell FileDate14 = new TableHeaderCell();
                FileDate14.Text = "Total";
                FileDate14.ColumnSpan = 2;
                row1.Cells.Add(FileDate14);

                TableCell FileDate15 = new TableHeaderCell();
                FileDate15.Text = "T.Oil";
             
                row1.Cells.Add(FileDate15);

                TableCell FileDate16 = new TableHeaderCell();
                FileDate16.Text = "Sign of production foreman";

                row1.Cells.Add(FileDate16);

                TableCell FileDate17 = new TableHeaderCell();
                FileDate17.Text = "Sign of factory manager";

                row1.Cells.Add(FileDate17);

                TableCell FileDate17a = new TableHeaderCell();
                FileDate17a.Text = "";

                row1.Cells.Add(FileDate17a);



                // Adding Cells
                TableCell FileDate = new TableHeaderCell();
                FileDate.Text = "Resin receipts for production";
                FileDate.ColumnSpan = 3;
                row.Cells.Add(FileDate);

                TableCell cell = new TableHeaderCell();
                cell.ColumnSpan = 25; // ********
                cell.Text = "Production figures Rosin For the month of";
                row.Cells.Add(cell);
               

             


               
                //}

            }
            //t.Rows.AddAt(0, row3);
            //t.Rows.AddAt(0, row1);
            //t.Rows.AddAt(0, row);
            //((Table)GridView1.Controls[0]).Rows.AddAt(1, row);
            //((Table)GridView1.Controls[0]).Rows.AddAt(1, row1);
            //((Table)GridView1.Controls[0]).Rows.AddAt(1, row3);
        }
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        DateTime live =Convert.ToDateTime( DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            //DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc09 where dt='" + live + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds = new DataSet();
            adp.Fill(ds);
            if (ds.Tables[0].Rows.Count == 0)
            {
                SqlDataSource1.InsertParameters["dt"].DefaultValue = DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.InsertParameters["resin"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text.ToString();
                SqlDataSource1.InsertParameters["rosin_h"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text.ToString();
                SqlDataSource1.InsertParameters["rosin_b"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text.ToString();
                SqlDataSource1.InsertParameters["raw_lin"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text.ToString();
                SqlDataSource1.InsertParameters["bitu_black"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text.ToString();
                SqlDataSource1.InsertParameters["toil_dtoil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text.ToString();
                SqlDataSource1.InsertParameters["db_lin_oil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text.ToString();
                SqlDataSource1.InsertParameters["lime_slak"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox8"))).Text.ToString();
                SqlDataSource1.InsertParameters["lith_yel"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text.ToString();
                SqlDataSource1.InsertParameters["lamp_black"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text.ToString();
                SqlDataSource1.InsertParameters["stand_oil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox11"))).Text.ToString();
                SqlDataSource1.InsertParameters["steam_coal"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text.ToString();
                SqlDataSource1.InsertParameters["batch_no"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox13"))).Text.ToString();
                SqlDataSource1.InsertParameters["tank_no"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox14"))).Text.ToString();
                SqlDataSource1.InsertParameters["production"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox15"))).Text.ToString();
                SqlDataSource1.InsertParameters["prog__ve_tot"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox16"))).Text.ToString();
                SqlDataSource1.InsertParameters["sig_of_sec"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox17"))).Text.ToString();
                SqlDataSource1.InsertParameters["sig_of_fm_gm"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox18"))).Text.ToString();
                SqlDataSource1.InsertParameters["remark"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox19"))).Text.ToString();
                
              
                SqlDataSource1.Insert();
                GridView1.EditIndex = -1;
                bind();
                //GridView1.DataBind();
            }
            else
            {
                SqlDataSource1.UpdateParameters["dt"].DefaultValue = DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
                SqlDataSource1.UpdateParameters["resin"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text.ToString();
                SqlDataSource1.UpdateParameters["rosin_h"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text.ToString();
                SqlDataSource1.UpdateParameters["rosin_b"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text.ToString();
                SqlDataSource1.UpdateParameters["raw_lin"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text.ToString();
                SqlDataSource1.UpdateParameters["bitu_black"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text.ToString();
                SqlDataSource1.UpdateParameters["toil_dtoil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text.ToString();
                SqlDataSource1.UpdateParameters["db_lin_oil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text.ToString();
                SqlDataSource1.UpdateParameters["lime_slak"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox8"))).Text.ToString();
                SqlDataSource1.UpdateParameters["lith_yel"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text.ToString();
                SqlDataSource1.UpdateParameters["lamp_black"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text.ToString();
                SqlDataSource1.UpdateParameters["stand_oil"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox11"))).Text.ToString();
                SqlDataSource1.UpdateParameters["steam_coal"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text.ToString();
                SqlDataSource1.UpdateParameters["batch_no"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox13"))).Text.ToString();
                SqlDataSource1.UpdateParameters["tank_no"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox14"))).Text.ToString();
                SqlDataSource1.UpdateParameters["production"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox15"))).Text.ToString();
                SqlDataSource1.UpdateParameters["prog__ve_tot"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox16"))).Text.ToString();
                SqlDataSource1.UpdateParameters["sig_of_sec"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox17"))).Text.ToString();
                SqlDataSource1.UpdateParameters["sig_of_fm_gm"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox18"))).Text.ToString();
                SqlDataSource1.UpdateParameters["remark"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox19"))).Text.ToString();
               
             
                SqlDataSource1.Update();
                GridView1.EditIndex = -1;
                bind();
                //GridView1.DataBind();
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



            TableCell cell = new TableHeaderCell();



            cell.Text = "Resin";

            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Rosin<br>H";

            row.Cells.Add(cell1);



            t.Rows.AddAt(0, row);

            TableCell cell2 = new TableHeaderCell();



            cell2.Text = "Rogsin<br>B";

            row.Cells.Add(cell2);



            t.Rows.AddAt(0, row);

            TableCell cell3 = new TableHeaderCell();



            cell3.Text = "Raw Linseed Oil";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();



            cell4.Text = "Bitumen black";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

            TableCell cell6 = new TableHeaderCell();



            cell6.Text = "T. Oil/D.T.Oil";

            row.Cells.Add(cell6);



            t.Rows.AddAt(0, row);

            TableCell cell7 = new TableHeaderCell();



            cell7.Text = "D.B. Linseed Oil";

            row.Cells.Add(cell7);



            t.Rows.AddAt(0, row);
            TableCell cell8 = new TableHeaderCell();



            cell8.Text = "Lime in Slaked";

            row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
            TableCell cell9 = new TableHeaderCell();



            cell9.Text = "Litharge yellow";

            row.Cells.Add(cell9);



            t.Rows.AddAt(0, row);
            TableCell cell10 = new TableHeaderCell();



            cell10.Text = "Lamp Black ";

            row.Cells.Add(cell10);



            t.Rows.AddAt(0, row);
            TableCell cell11 = new TableHeaderCell();



            cell11.Text = "Stand Oil";

            row.Cells.Add(cell11);



            t.Rows.AddAt(0, row);
            TableCell cell12 = new TableHeaderCell();



            cell12.Text = "Steam Coal";

            row.Cells.Add(cell12);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell13 = new TableHeaderCell();



            cell13.Text = "Batch No.";

            row.Cells.Add(cell13);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell14 = new TableHeaderCell();



            cell14.Text = "Tank No.";

            row.Cells.Add(cell14);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell15 = new TableHeaderCell();



            cell15.Text = "Production(ltr)";

            row.Cells.Add(cell15);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell16 = new TableHeaderCell();



            cell16.Text = "Progressive total";

            row.Cells.Add(cell16);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell17 = new TableHeaderCell();



            cell17.Text = "Sig. of Sec. I/C";

            row.Cells.Add(cell17);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell18 = new TableHeaderCell();



            cell18.Text = "Sig. of FM/GM";

            row.Cells.Add(cell18);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell19 = new TableHeaderCell();



            cell19.Text = "Remarks";

            row.Cells.Add(cell19);



            t.Rows.AddAt(0, row);
            TableCell cell20 = new TableHeaderCell();



            cell20.Text = "";

            row.Cells.Add(cell20);



        }
    }
}
