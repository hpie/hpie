using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Drawing;

public partial class vasriation_des_rec : System.Web.UI.Page
{
    Int32 sr=0;
    Int32 sr2 = 0;
    Int32 sr3 = 0;
    decimal volt=0;
    Int32 not=0;

    decimal volt2 = 0;
    Int32 not2 = 0;

    decimal volt3 = 0;
    Int32 not3 = 0;
    string kind, size_type;

    public Int32 no_g=0;
    public decimal vol_g = 0;

    public Int32 no_g2 = 0;
    public decimal vol_g2 = 0;

    public Int32 no_g3 = 0;
    public decimal vol_g3 = 0;

    Int32 no_100 = 0;
    decimal vol_100 = 0;
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    private void dif()
    {
        no_g3 = Convert.ToInt32(ViewState["no"]);
        vol_g3 = Math.Round(Convert.ToDecimal(ViewState["vol"]), 3);
        
        Int32 i;
        for (i = 0; i < GridView1.Rows.Count; i++)
        {
            
            kind = ((Label)(GridView1.Rows[i].FindControl("Label3"))).Text;
            size_type = ((Label)(GridView1.Rows[i].FindControl("Label4"))).Text;
              Int32 i2;
              for (i2 = 0; i2 < GridView2.Rows.Count; i2++)
              {
                  string kind2, size_type2;               
                  kind2 = ((Label)(GridView2.Rows[i2].FindControl("kind2"))).Text;
                  size_type2 = ((Label)(GridView2.Rows[i2].FindControl("size_type2"))).Text;
                  if (kind == kind2 && size_type == size_type2)
                  {
                      GridView2.Rows[i2].BackColor = Color.Gray;

                       Int32 i3;
                       for (i3 = 0; i3 < GridView3.Rows.Count; i3++)
                       {
                           string kind3, size_type3;
                           kind3 = ((Label)(GridView3.Rows[i3].FindControl("kind3"))).Text;
                           size_type3 = ((Label)(GridView3.Rows[i3].FindControl("size_type3"))).Text;
                           if (kind2 == kind3 && size_type2 == size_type3)
                           {
                               if (((Label)(GridView3.Rows[i3].FindControl("deo5"))).Text != "")
                               {
                                   Int32 no = Convert.ToInt32(((Label)(GridView2.Rows[i2].FindControl("deo3"))).Text);
                                   Int32 no2 = Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("deo1"))).Text);
                                   decimal vol = Math.Round(Convert.ToDecimal(((Label)(GridView2.Rows[i2].FindControl("deo4"))).Text), 3);
                                   decimal vol2 = Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("deo2"))).Text), 3);
                                   Int32 no3 = no - no2;
                                   decimal vol3 = Math.Round(vol - vol2, 3);
                                   ((Label)(GridView3.Rows[i3].FindControl("deo5"))).Text = no3.ToString();
                                   ((Label)(GridView3.Rows[i3].FindControl("deo6"))).Text = vol3.ToString();
                                   no_g3 = no_g3 - no2;
                                   vol_g3 = Math.Round(vol_g3 - vol2, 3);

                                   no_100 += no3;
                                   vol_100 += Math.Round(vol3, 3);
                               }
                               if (((Label)(GridView3.Rows[i3].FindControl("kail5"))).Text != "")
                               {
                                   Int32 no = Convert.ToInt32(((Label)(GridView2.Rows[i2].FindControl("kail3"))).Text);
                                   Int32 no2 = Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("kail1"))).Text);
                                   decimal vol = Math.Round(Convert.ToDecimal(((Label)(GridView2.Rows[i2].FindControl("kail4"))).Text), 3);
                                   decimal vol2 = Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("kail2"))).Text), 3);
                                   Int32 no3 = no - no2;
                                   decimal vol3 = Math.Round(vol - vol2, 3);
                                   ((Label)(GridView3.Rows[i3].FindControl("kail5"))).Text = no3.ToString();
                                   ((Label)(GridView3.Rows[i3].FindControl("kail6"))).Text = vol3.ToString();
                                   no_g3 = no_g3 - no2;
                                   vol_g3 = Math.Round(vol_g3 - vol2, 3);
                                   no_100 += no3;
                                   vol_100 += Math.Round(vol3, 3);
                               }
                               if (((Label)(GridView3.Rows[i3].FindControl("fir5"))).Text != "")
                               {
                                   Int32 no = Convert.ToInt32(((Label)(GridView2.Rows[i2].FindControl("fir3"))).Text);
                                   Int32 no2 = Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("fir1"))).Text);
                                   decimal vol = Math.Round(Convert.ToDecimal(((Label)(GridView2.Rows[i2].FindControl("fir4"))).Text), 3);
                                   decimal vol2 = Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("fir2"))).Text), 3);
                                   Int32 no3 = no - no2;
                                   decimal vol3 = Math.Round(vol - vol2, 3);
                                   ((Label)(GridView3.Rows[i3].FindControl("fir5"))).Text = no3.ToString();
                                   ((Label)(GridView3.Rows[i3].FindControl("fir6"))).Text = vol3.ToString();
                                   no_g3 = no_g3 - no2;
                                   vol_g3 = Math.Round(vol_g3 - vol2, 3);
                                   no_100 += no3;
                                   vol_100 += Math.Round(vol3, 3);
                               }
                               if (((Label)(GridView3.Rows[i3].FindControl("chil5"))).Text != "")
                               {
                                   Int32 no = Convert.ToInt32(((Label)(GridView2.Rows[i2].FindControl("chil3"))).Text);
                                   Int32 no2 = Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("chil1"))).Text);
                                   decimal vol = Math.Round(Convert.ToDecimal(((Label)(GridView2.Rows[i2].FindControl("chil4"))).Text), 3);
                                   decimal vol2 = Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("chil2"))).Text), 3);
                                   Int32 no3 = no - no2;
                                   decimal vol3 = Math.Round(vol - vol2, 3);
                                   ((Label)(GridView3.Rows[i3].FindControl("chil5"))).Text = no3.ToString();
                                   ((Label)(GridView3.Rows[i3].FindControl("chil6"))).Text = vol3.ToString();
                                   no_g3 = no_g3 - no2;
                                   vol_g3 = Math.Round(vol_g3 - vol2, 3);
                                   no_100 += no3;
                                   vol_100 += Math.Round(vol3, 3);
                               }
                               if (((Label)(GridView3.Rows[i3].FindControl("other5"))).Text != "")
                               {
                                   Int32 no = Convert.ToInt32(((Label)(GridView2.Rows[i2].FindControl("other3"))).Text);
                                   Int32 no2 = Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("other1"))).Text);
                                   decimal vol = Math.Round(Convert.ToDecimal(((Label)(GridView2.Rows[i2].FindControl("other4"))).Text), 3);
                                   decimal vol2 = Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("other2"))).Text), 3);
                                   Int32 no3 = no - no2;
                                   decimal vol3 = Math.Round(vol - vol2, 3);
                                   ((Label)(GridView3.Rows[i3].FindControl("other5"))).Text = no3.ToString();
                                   ((Label)(GridView3.Rows[i3].FindControl("other6"))).Text = vol3.ToString();
                                   no_g3 = no_g3 - no2;
                                   vol_g3 = Math.Round(vol_g3 - vol2, 3);
                                   no_100 += no3;
                                   vol_100 +=Math.Round(vol3,3);
                               }

                               ((Label)(GridView3.Rows[i3].FindControl("tot_5"))).Text = no_100.ToString();
                               ((Label)(GridView3.Rows[i3].FindControl("tot_6"))).Text = vol_100.ToString();
                               GridView3.Rows[i3].BackColor = Color.Gray;


                           }
                           else
                           {
                              
                               //((Label)(GridView3.Rows[i3].FindControl("deo5"))).Text = "0".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("deo6"))).Text = "0.00".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("kail5"))).Text = "0".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("kail6"))).Text = "0.00".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("fir5"))).Text = "0".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("fir6"))).Text = "0.00".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("chil5"))).Text = "0".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("chil6"))).Text = "0.00".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("other5"))).Text = "0".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("other6"))).Text = "0".ToString();

                               //((Label)(GridView3.Rows[i3].FindControl("tot_5"))).Text = "0".ToString();
                               //((Label)(GridView3.Rows[i3].FindControl("tot_6"))).Text = "0.00".ToString();
                           }



                       }


                  }


              }



        }
        ((Label)(GridView3.FooterRow.FindControl("g_no"))).Text = no_g3.ToString();
        ((Label)(GridView3.FooterRow.FindControl("g_vol"))).Text = vol_g3.ToString();
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {

            GridView gv3 = sender as GridView;
            GridViewRow row3 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t3 = (Table)gv3.Controls[0];



            // Adding Cells
            // Adding Cells

            //TableCell FileDatebu9991 = new TableHeaderCell();
            //FileDatebu9991.Text = "";
            //row3.Cells.Add(FileDatebu9991);

            //TableCell FileDatebu9992 = new TableHeaderCell();
            //FileDatebu9992.Text = "";
            //row3.Cells.Add(FileDatebu9992);

            //TableCell FileDatebu9993 = new TableHeaderCell();
            //FileDatebu9993.Text = "";
            //row3.Cells.Add(FileDatebu9993);

            TableCell FileDatebu9994 = new TableHeaderCell();
            FileDatebu9994.Text = "";
            row3.Cells.Add(FileDatebu9994);


            TableCell FileDatebu = new TableHeaderCell();
            FileDatebu.Text = "No.";
            row3.Cells.Add(FileDatebu);

         

            TableCell FileDateb3 = new TableHeaderCell();
            FileDateb3.Text = "Vol.";
            row3.Cells.Add(FileDateb3);

            TableCell FileDateb4 = new TableHeaderCell();
            FileDateb4.Text = "No.";
            row3.Cells.Add(FileDateb4);

            TableCell FileDateb5 = new TableHeaderCell();
            FileDateb5.Text = "Vol.";
            row3.Cells.Add(FileDateb5);

            TableCell FileDateb6 = new TableHeaderCell();
            FileDateb6.Text = "No.";
            row3.Cells.Add(FileDateb6);

            TableCell FileDateb7 = new TableHeaderCell();
            FileDateb7.Text = "Vol.";
            row3.Cells.Add(FileDateb7);

            TableCell FileDateb8 = new TableHeaderCell();
            FileDateb8.Text = "No.";
            row3.Cells.Add(FileDateb8);

            TableCell FileDateb9 = new TableHeaderCell();
            FileDateb9.Text = "Vol.";
            row3.Cells.Add(FileDateb9);

            TableCell FileDateb10 = new TableHeaderCell();
            FileDateb10.Text = "No.";
            row3.Cells.Add(FileDateb10);

            TableCell FileDateb11 = new TableHeaderCell();
            FileDateb11.Text = "Vol.";
            row3.Cells.Add(FileDateb11);

            TableCell FileDateb12 = new TableHeaderCell();
            FileDateb12.Text = "No.";
            row3.Cells.Add(FileDateb12);

            TableCell FileDateb2 = new TableHeaderCell();
            FileDateb2.Text = "Vol.";
            row3.Cells.Add(FileDateb2);

            TableCell FileDateb099 = new TableHeaderCell();
            FileDateb099.Text = "";
            row3.Cells.Add(FileDateb099);
 





            t3.Rows.AddAt(0, row3);


            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];



            // Adding Cells

          
            TableCell FileDate33 = new TableHeaderCell();

            FileDate33.Text = "";
            //FileDate.ColumnSpan = 7;
            row.Cells.Add(FileDate33);
            TableCell FileDate44 = new TableHeaderCell();

            FileDate44.Text = "";
            //FileDate.ColumnSpan = 7;
            row.Cells.Add(FileDate44);
            TableCell FileDate55 = new TableHeaderCell();

            FileDate55.Text = "";
            //FileDate.ColumnSpan = 7;
            row.Cells.Add(FileDate55);


            TableCell FileDate66 = new TableHeaderCell();
            FileDate66.Text = "";
            //FileDate.ColumnSpan = 7;
            row.Cells.Add(FileDate66);




            




            Table t8 = (Table)gv.Controls[0];



            // Adding Cells
            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            TableCell FileDate8 = new TableHeaderCell();

            FileDate8.Text = "Sr. No.";
            //FileDate8.ColumnSpan = 7;
            row1.Cells.Add(FileDate8);



            TableCell cell8 = new TableHeaderCell();



            cell8.Text = "Period";
            cell8.RowSpan = 2;
            cell8.VerticalAlign = VerticalAlign.Top;
            row1.Cells.Add(cell8);
            


            t8.Rows.AddAt(0, row1);



            TableCell cell18 = new TableHeaderCell();
            cell18.VerticalAlign = VerticalAlign.Top;

            cell18.RowSpan = 2;
            cell18.Text = "Kind";

            row1.Cells.Add(cell18);



            t8.Rows.AddAt(0, row1);

            TableCell cell28 = new TableHeaderCell();
            cell28.VerticalAlign = VerticalAlign.Top;
            cell28.Text = "Size";
            cell28.RowSpan = 2;
            row1.Cells.Add(cell28);

           


            TableCell cell32 = new TableHeaderCell();
            cell32.Text = "Deodar";
            cell32.ColumnSpan = 2;
            row1.Cells.Add(cell32);

            TableCell cell33 = new TableHeaderCell();
            cell33.Text = "Kail";
            cell33.ColumnSpan = 2;
            row1.Cells.Add(cell33);



            TableCell cell321 = new TableHeaderCell();
            cell321.Text = "Fir";
            cell321.ColumnSpan = 2;
            row1.Cells.Add(cell321);

            TableCell cell331 = new TableHeaderCell();
            cell331.Text = "Chil";
            cell331.ColumnSpan = 2;
            row1.Cells.Add(cell331);

            TableCell cell34 = new TableHeaderCell();
            cell34.Text = "Other";
            cell34.ColumnSpan = 2;
            row1.Cells.Add(cell34);

            TableCell cell35 = new TableHeaderCell();
            cell35.Text = "Total";
            cell35.ColumnSpan = 2;
            row1.Cells.Add(cell35);

            TableCell cell36 = new TableHeaderCell();
            cell36.Text = "Remarks";
            cell36.ColumnSpan = 2;
            //cell36.RowSpan = 2;
            row1.Cells.Add(cell36);

            t8.Rows.AddAt(0, row1);




        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
        GridView2.DataBind();
        GridView3.DataBind();
        dif();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            sr = sr + 1;
            ((Label)(e.Row.FindControl("sr"))).Text = sr.ToString();

            DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    // string spec = ((Label)(e.Row.FindControl("spec"))).Text;

                    Int32 i;
                    for (i = 0; i < dv.Table.Rows.Count; i++)
                    {
                        string spec = dv.Table.Rows[i]["species"].ToString();

                        if (spec == "Deodar")
                        {

                            not += Convert.ToInt32(dv.Table.Rows[i]["no_2"]);
                            volt += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["vol"]), 3);
                            ((Label)(e.Row.FindControl("deo1"))).Text = dv.Table.Rows[i]["no_2"].ToString();
                            ((Label)(e.Row.FindControl("deo2"))).Text = dv.Table.Rows[i]["vol"].ToString();


                        }
                        if (spec == "Kail")
                        {
                            not += Convert.ToInt32(dv.Table.Rows[i]["no_2"]);
                            volt += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["vol"]), 3);
                            ((Label)(e.Row.FindControl("kail1"))).Text = dv.Table.Rows[i]["no_2"].ToString();
                            ((Label)(e.Row.FindControl("kail2"))).Text = dv.Table.Rows[i]["vol"].ToString();
                        }
                        if (spec == "Fir")
                        {
                            not += Convert.ToInt32(dv.Table.Rows[i]["no_2"]);
                            volt += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["vol"]), 3);
                            ((Label)(e.Row.FindControl("fir1"))).Text = dv.Table.Rows[i]["no_2"].ToString();
                            ((Label)(e.Row.FindControl("fir2"))).Text = dv.Table.Rows[i]["vol"].ToString();

                        }
                        if (spec == "Chil")
                        {
                            not += Convert.ToInt32(dv.Table.Rows[i]["no_2"]);
                            volt += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["vol"]), 3);
                            ((Label)(e.Row.FindControl("chil1"))).Text = dv.Table.Rows[i]["no_2"].ToString();
                            ((Label)(e.Row.FindControl("chil2"))).Text = dv.Table.Rows[i]["vol"].ToString();
                        }
                        if (spec == "Other")
                        {
                            not += Convert.ToInt32(dv.Table.Rows[i]["no_2"]);
                            volt += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["vol"]), 3);
                            ((Label)(e.Row.FindControl("other1"))).Text = dv.Table.Rows[i]["no_2"].ToString();
                            ((Label)(e.Row.FindControl("other2"))).Text = dv.Table.Rows[i]["vol"].ToString();
                        }

                        string ck = ((Label)(e.Row.FindControl("tot_2"))).Text;
                        ((Label)(e.Row.FindControl("tot_1"))).Text = not.ToString();
                        ((Label)(e.Row.FindControl("tot_2"))).Text = volt.ToString();

                    }
                }
            }
            no_g += not;
            vol_g += Math.Round(volt, 3);
            not = 0;
            volt = 0;
            
        }
    }

    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {

            string spec2, kind2, size_type2, date_of_rec2;
            //spec2 = ((Label)(e.Row.FindControl("spec2"))).Text;
            kind2 = ((Label)(e.Row.FindControl("kind2"))).Text;
            size_type2 = ((Label)(e.Row.FindControl("size_type2"))).Text;
            date_of_rec2 = ((Label)(e.Row.FindControl("date_of_rec2"))).Text;
            sr2 = sr2 + 1;
            ((Label)(e.Row.FindControl("sr2"))).Text = sr2.ToString();
            //SqlDataSource_4.SelectParameters["spec"].DefaultValue = spec2.ToString();
            SqlDataSource_4.SelectParameters["kind"].DefaultValue = kind2.ToString();
            SqlDataSource_4.SelectParameters["size_type"].DefaultValue = size_type2.ToString();
            SqlDataSource_4.SelectParameters["date_of_rec"].DefaultValue = date_of_rec2.ToString();
            //SqlDataSource_4.DataBind();
            DataView dv = (DataView)(SqlDataSource_4.Select(DataSourceSelectArguments.Empty));

            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    // string spec = ((Label)(e.Row.FindControl("spec"))).Text;

                    Int32 i;
                    for (i = 0; i < dv.Table.Rows.Count; i++)
                    {
                        string spec = dv.Table.Rows[i]["spec"].ToString();

                        if (spec == "Deodar")
                        {
                            not2 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt2 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("deo3"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("deo4"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }
                        if (spec == "Kail")
                        {
                            not2 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt2 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("kail3"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("kail4"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }
                        if (spec == "Fir")
                        {
                            not2 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt2 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("fir3"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("fir4"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();

                        }
                        if (spec == "Chil")
                        {
                            not2 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt2 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("chil3"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("chil4"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }
                        if (spec == "Other")
                        {
                            not2 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt2 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("other3"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("other4"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }


                        ((Label)(e.Row.FindControl("tot_3"))).Text = not2.ToString();
                        ((Label)(e.Row.FindControl("tot_4"))).Text = volt2.ToString();



                    }
                }
            }
            no_g2 += not2;
            vol_g2 += Math.Round(volt2, 3);

            not2 = 0;
            volt2 = 0;
        }
    }
    protected void GridView3_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {

            string spec2, kind2, size_type2, date_of_rec2;
            //spec2 = ((Label)(e.Row.FindControl("spec2"))).Text;
            kind2 = ((Label)(e.Row.FindControl("kind3"))).Text;
            size_type2 = ((Label)(e.Row.FindControl("size_type3"))).Text;
            date_of_rec2 = ((Label)(e.Row.FindControl("date_of_rec3"))).Text;
            sr3 = sr3 + 1;
            ((Label)(e.Row.FindControl("sr3"))).Text = sr3.ToString();
            //SqlDataSource_4.SelectParameters["spec"].DefaultValue = spec2.ToString();
            SqlDataSource_4.SelectParameters["kind"].DefaultValue = kind2.ToString();
            SqlDataSource_4.SelectParameters["size_type"].DefaultValue = size_type2.ToString();
            SqlDataSource_4.SelectParameters["date_of_rec"].DefaultValue = date_of_rec2.ToString();
            //SqlDataSource_4.DataBind();
            DataView dv = (DataView)(SqlDataSource_4.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    // string spec = ((Label)(e.Row.FindControl("spec"))).Text;

                    Int32 i;
                    for (i = 0; i < dv.Table.Rows.Count; i++)
                    {
                        string spec = dv.Table.Rows[i]["spec"].ToString();

                        if (spec == "Deodar")
                        {
                            not3 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt3 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("deo5"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("deo6"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }
                        if (spec == "Kail")
                        {
                            not3 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt3 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("kail5"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("kail6"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }
                        if (spec == "Fir")
                        {
                            not3 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt3 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("fir5"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("fir6"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();

                        }
                        if (spec == "Chil")
                        {
                            not3 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt3 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("chil5"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("chil6"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }
                        if (spec == "Other")
                        {
                            not3 += Convert.ToInt32(dv.Table.Rows[i]["as_per_no"]);
                            volt3 += Math.Round(Convert.ToDecimal(dv.Table.Rows[i]["as_per_vol"]), 3);
                            ((Label)(e.Row.FindControl("other5"))).Text = dv.Table.Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("other6"))).Text = dv.Table.Rows[i]["as_per_vol"].ToString();
                        }


                        ((Label)(e.Row.FindControl("tot_5"))).Text = not3.ToString();
                        ((Label)(e.Row.FindControl("tot_6"))).Text = volt3.ToString();



                    }
                }
            }
            no_g3 += not3;
            vol_g3 += Math.Round(volt3, 3);
            ViewState["no"] = no_g3.ToString();
            ViewState["vol"] = vol_g3.ToString();



            not3 = 0;
            volt3 = 0;
        }
    }
}