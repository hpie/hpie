using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;
public partial class receipt_register : System.Web.UI.Page
{
    Int32 sr=0, sr2=0;
    Int32 chl_no=0, chl_vol=0, rec_no=0, rec_vol=0, var_no=0, var_vol=0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            Session["spec"] = "nl";
            Session["chl2"] = "nl2";
            ViewState["chl_no"] = "0".ToString();
            ViewState["chl_vol"] = "0".ToString();
            ViewState["rec_no"] = "0".ToString();
            ViewState["rec_vol"] = "0".ToString();
            ViewState["var_no"] = "0".ToString();
            ViewState["var_vol"] = "0".ToString();
        }
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {

            GridView gv3 = sender as GridView;
            GridViewRow row3 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t3 = (Table)gv3.Controls[0];



            // Adding Cells

            TableCell FileDateb1 = new TableHeaderCell();
            FileDateb1.Text = "";
            FileDateb1.ColumnSpan = 7;
            row3.Cells.Add(FileDateb1);


            TableCell FileDateb2 = new TableHeaderCell();
            FileDateb2.Text = "No.";
            row3.Cells.Add(FileDateb2);

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

            TableCell FileDateb13 = new TableHeaderCell();
            FileDateb13.Text = "Vol.";
            row3.Cells.Add(FileDateb13);

            TableCell FileDateb14 = new TableHeaderCell();
            FileDateb2.Text = "No.";
            row3.Cells.Add(FileDateb2);


            t3.Rows.AddAt(0, row3);


            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate = new TableHeaderCell();

            FileDate.Text = "";
            //FileDate.ColumnSpan = 7;
            row.Cells.Add(FileDate);

            TableCell FileDate11 = new TableHeaderCell();

            FileDate11.Text = "";
            //FileDate.ColumnSpan = 7;
            row.Cells.Add(FileDate11);

            TableCell FileDate22 = new TableHeaderCell();

            FileDate22.Text = "";
            //FileDate.ColumnSpan = 7;
            row.Cells.Add(FileDate22);
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




            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();
            cell1.ColumnSpan = 2;
            cell1.Text = "As per Challan";
            row.Cells.Add(cell1);
     

            TableCell cell2 = new TableHeaderCell();
            cell2.Text = "As per Receipt";
            cell2.ColumnSpan = 2;
            row.Cells.Add(cell2);

            TableCell cell3 = new TableHeaderCell();
            cell3.Text = "Variation";
            cell3.ColumnSpan = 2;
            row.Cells.Add(cell3);


            TableCell cell4 = new TableHeaderCell();
            cell4.ColumnSpan = 2;
            cell4.Text = "As per Challan";
            row.Cells.Add(cell4);


            TableCell cell5 = new TableHeaderCell();
            cell5.Text = "As per Receipt";
            cell5.ColumnSpan = 2;
            row.Cells.Add(cell5);

            TableCell cell6 = new TableHeaderCell();
            cell6.Text = "Variation";
            cell6.ColumnSpan = 2;
            row.Cells.Add(cell6);




            t.Rows.AddAt(0, row);





            Table t8 = (Table)gv.Controls[0];



            // Adding Cells
            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            TableCell FileDate8 = new TableHeaderCell();

            FileDate8.Text = "Sr. No.";
            //FileDate8.ColumnSpan = 7;
            row1.Cells.Add(FileDate8);



            TableCell cell8 = new TableHeaderCell();



            cell8.Text = "Challan No. & Date";
            //cell8.ColumnSpan = 2;
            row1.Cells.Add(cell8);



            t8.Rows.AddAt(0, row1);



            TableCell cell18 = new TableHeaderCell();
            //cell18.ColumnSpan = 2;


            cell18.Text = "Date of Receipt";

            row1.Cells.Add(cell18);



            t8.Rows.AddAt(0, row1);

            TableCell cell28 = new TableHeaderCell();
            cell28.Text = "Truck No.";
            //cell28.ColumnSpan = 6;
            row1.Cells.Add(cell28);

            TableCell cell29 = new TableHeaderCell();
            cell29.Text = "Forest Lot No.";
            //cell28.ColumnSpan = 6;
            row1.Cells.Add(cell29);

            TableCell cell30= new TableHeaderCell();
            cell30.Text = "Kind";
            //cell28.ColumnSpan = 6;
            row1.Cells.Add(cell30);

            TableCell cell31 = new TableHeaderCell();
            cell31.Text = "Size";
            //cell28.ColumnSpan = 6;
            row1.Cells.Add(cell31);

            TableCell cell32 = new TableHeaderCell();
            cell32.Text = "Deodar";
            cell32.ColumnSpan = 6;
            row1.Cells.Add(cell32);

            TableCell cell33 = new TableHeaderCell();
            cell33.Text = "Kail";
            cell33.ColumnSpan = 6;
            row1.Cells.Add(cell33);



            t8.Rows.AddAt(0, row1);




        }
    }
    protected void GridView2_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {

            GridView gv3 = sender as GridView;
            GridViewRow row3 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t3 = (Table)gv3.Controls[0];



            // Adding Cells
            TableCell FileDateb2 = new TableHeaderCell();
            FileDateb2.Text = "No.";
            row3.Cells.Add(FileDateb2);

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

            TableCell FileDateb13 = new TableHeaderCell();
            FileDateb13.Text = "Vol.";
            row3.Cells.Add(FileDateb13);

            TableCell FileDateb14 = new TableHeaderCell();
            FileDateb14.Text = "No.";
            row3.Cells.Add(FileDateb2);

            TableCell FileDateb15 = new TableHeaderCell();
            FileDateb15.Text = "Vol.";
            row3.Cells.Add(FileDateb15);

            TableCell FileDateb16 = new TableHeaderCell();
            FileDateb16.Text = "No.";
            row3.Cells.Add(FileDateb16);

            TableCell FileDateb17 = new TableHeaderCell();
            FileDateb17.Text = "Vol..";
            row3.Cells.Add(FileDateb17);

            TableCell FileDateb18 = new TableHeaderCell();
            FileDateb18.Text = "No.";
            row3.Cells.Add(FileDateb18);

            TableCell FileDateb19 = new TableHeaderCell();
            FileDateb19.Text = "Vol.";
            row3.Cells.Add(FileDateb19);

            TableCell FileDateb20 = new TableHeaderCell();
            FileDateb20.Text = "No.";
            row3.Cells.Add(FileDateb20);

            TableCell FileDateb21 = new TableHeaderCell();
            FileDateb21.Text = "Vol.";
            row3.Cells.Add(FileDateb21);

            TableCell FileDateb22 = new TableHeaderCell();
            FileDateb22.Text = "No.";
            row3.Cells.Add(FileDateb22);

            TableCell FileDateb23 = new TableHeaderCell();
            FileDateb23.Text = "Vol.";
            row3.Cells.Add(FileDateb23);

            TableCell FileDateb24 = new TableHeaderCell();
            FileDateb24.Text = "No.";
            row3.Cells.Add(FileDateb24);

            TableCell FileDateb25 = new TableHeaderCell();
            FileDateb25.Text = "Vol.";
            row3.Cells.Add(FileDateb25);

            TableCell FileDateb26 = new TableHeaderCell();
            FileDateb26.Text = "No.";
            row3.Cells.Add(FileDateb26);

            TableCell FileDateb27 = new TableHeaderCell();
            FileDateb27.Text = "";
            row3.Cells.Add(FileDateb27);

            t3.Rows.AddAt(0, row3);





            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];



            


            TableCell cell1 = new TableHeaderCell();
            cell1.ColumnSpan = 2;
            cell1.Text = "As per Challan";
            row.Cells.Add(cell1);


            TableCell cell2 = new TableHeaderCell();
            cell2.Text = "As per Receipt";
            cell2.ColumnSpan = 2;
            row.Cells.Add(cell2);

            TableCell cell3 = new TableHeaderCell();
            cell3.Text = "Variation";
            cell3.ColumnSpan = 2;
            row.Cells.Add(cell3);


            TableCell cell4 = new TableHeaderCell();
            cell4.ColumnSpan = 2;
            cell4.Text = "As per Challan";
            row.Cells.Add(cell4);


            TableCell cell5 = new TableHeaderCell();
            cell5.Text = "As per Receipt";
            cell5.ColumnSpan = 2;
            row.Cells.Add(cell5);

            TableCell cell6 = new TableHeaderCell();
            cell6.Text = "Variation";
            cell6.ColumnSpan = 2;
            row.Cells.Add(cell6);


            TableCell cell7 = new TableHeaderCell();
            cell7.ColumnSpan = 2;
            cell7.Text = "As per Challan";
            row.Cells.Add(cell7);


            TableCell cell8 = new TableHeaderCell();
            cell8.Text = "As per Receipt";
            cell8.ColumnSpan = 2;
            row.Cells.Add(cell8);

            TableCell cell9 = new TableHeaderCell();
            cell9.Text = "Variation";
            cell9.ColumnSpan = 2;
            row.Cells.Add(cell9);

            TableCell cell10= new TableHeaderCell();
            cell10.ColumnSpan = 2;
            cell10.Text = "As per Challan";
            row.Cells.Add(cell10);


            TableCell cell11 = new TableHeaderCell();
            cell11.Text = "As per Receipt";
            cell11.ColumnSpan = 2;
            row.Cells.Add(cell11);

            TableCell cell12 = new TableHeaderCell();
            cell12.Text = "Variation";
            cell12.ColumnSpan = 2;
            row.Cells.Add(cell12);

            //TableCell cell13 = new TableHeaderCell();
            //cell13.Text = "";
            //cell13.ColumnSpan = 2;
            //row.Cells.Add(cell13);

            t.Rows.AddAt(0, row);





            Table t8 = (Table)gv.Controls[0];



            // Adding Cells
            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
           

            TableCell cell32 = new TableHeaderCell();
            cell32.Text = "Fir";
            cell32.ColumnSpan = 6;
            row1.Cells.Add(cell32);

            TableCell cell33 = new TableHeaderCell();
            cell33.Text = "Chil";
            cell33.ColumnSpan = 6;
            row1.Cells.Add(cell33);

            TableCell cell34 = new TableHeaderCell();
            cell34.Text = "Other";
            cell34.ColumnSpan = 6;
            row1.Cells.Add(cell34);

            TableCell cell35 = new TableHeaderCell();
            cell35.Text = "Total";
            cell35.ColumnSpan = 6;
            row1.Cells.Add(cell35);

            TableCell cell36 = new TableHeaderCell();
            cell36.Text = "Remarks";
            cell36.ColumnSpan = 7;
            cell36.RowSpan = 2;
            row1.Cells.Add(cell36);

            t8.Rows.AddAt(0, row1);




        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        ViewState["chl_no"] = "0".ToString();
        ViewState["chl_vol"] = "0".ToString();
        ViewState["rec_no"] = "0".ToString();
        ViewState["rec_vol"] = "0".ToString();
        ViewState["var_no"] = "0".ToString();
        ViewState["var_vol"] = "0".ToString();
        Session["spec"] = "nl";
        Session["chl2"] = "nl2";
        GridView1.DataBind();
        GridView2.DataBind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {

        if (e.Row.RowType == DataControlRowType.Footer)
        {
            Session["spec"] = "nl";
            Session["chl2"] = "nl2";
        }

        if (e.Row.RowType == DataControlRowType.DataRow)
        {

           

            sr = sr + 1;
            string spec, chl, size_type;
            ((Label)(e.Row.FindControl("sr"))).Text = sr.ToString();
            spec = ((Label)(e.Row.FindControl("spec"))).Text;
            chl = ((Label)(e.Row.FindControl("Label2"))).Text;
            size_type = ((Label)(e.Row.FindControl("Label8"))).Text;
            if (Session["spec"].ToString() !=size_type && Session["chl2"].ToString()!=chl)
            {
                Session["spec"] = size_type;
                Session["chl2"] = chl;
                string qry = "select * from tally_sheet where challan_no='" + chl + "' and size_type='"+size_type+"'";

                //string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='" + chl + "' and spec='" + spec + "'";
                SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
                DataSet ds = new DataSet();
                adp.Fill(ds);

                Int32 i;
                for (i = 0; i < ds.Tables[0].Rows.Count; i++)
                {

                    if (i == 0)
                    {

                        if (ds.Tables[0].Rows[i]["spec"].ToString() == "Deodar")
                        {
                            ((Label)(e.Row.FindControl("deo_1"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("deo_2"))).Text = ds.Tables[0].Rows[i]["size"].ToString();
                            ((Label)(e.Row.FindControl("deo_3"))).Text = ds.Tables[0].Rows[i]["as_per_vol"].ToString();
                            ((Label)(e.Row.FindControl("deo_4"))).Text = ds.Tables[0].Rows[i]["size_vol"].ToString();

                            Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                            Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                            Int32 d3 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                            Int32 d4 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);


                            Int32 dd1 = d2 - d1;
                            Int32 dd2 = d4 - d3;

                            //total                       
                            //chl_no = chl_no + d1 + Convert.ToInt32(ViewState["chl_no"]);
                            //chl_vol = chl_vol + d2 + Convert.ToInt32(ViewState["chl_vol"]);
                            //rec_no = rec_no + d3 + Convert.ToInt32(ViewState["rec_no"]);
                            //rec_vol = rec_vol + d4 + Convert.ToInt32(ViewState["rec_vol"]);
                            //var_no = var_no + dd2 + Convert.ToInt32(ViewState["var_no"]);
                            //var_vol = var_vol + dd1 + Convert.ToInt32(ViewState["var_vol"]);

                            //ViewState["chl_no"] = chl_no.ToString();
                            //ViewState["chl_vol"] = chl_vol.ToString();
                            //ViewState["rec_no"] = rec_no.ToString();
                            //ViewState["rec_vol"] = rec_vol.ToString();
                            //ViewState["var_no"] = var_no.ToString();
                            //ViewState["var_vol"] = var_vol.ToString();

                            //((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["chl_no"].ToString();
                            //((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_vol"].ToString();
                            //((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_no"].ToString();
                            //((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["rec_vol"].ToString();
                            //((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                            //((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                            //total


                            ((Label)(e.Row.FindControl("deo_d1"))).Text = dd2.ToString();
                            ((Label)(e.Row.FindControl("deo_d2"))).Text = dd1.ToString();
                        }

                        if (ds.Tables[0].Rows[i]["spec"].ToString() == "Kail")
                        {
                            ((Label)(e.Row.FindControl("kail_1"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                            ((Label)(e.Row.FindControl("kail_2"))).Text = ds.Tables[0].Rows[i]["size"].ToString();
                            ((Label)(e.Row.FindControl("kail_3"))).Text = ds.Tables[0].Rows[i]["as_per_vol"].ToString();
                            ((Label)(e.Row.FindControl("kail_4"))).Text = ds.Tables[0].Rows[i]["size_vol"].ToString();

                            Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                            Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                            Int32 d3 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                            Int32 d4 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);
                            Int32 dd1 = d2 - d1;
                            Int32 dd2 = d4 - d3;
                            ((Label)(e.Row.FindControl("kail_d1"))).Text = dd2.ToString();
                            ((Label)(e.Row.FindControl("kail_d2"))).Text = dd1.ToString();


                            //total                       
                            //chl_no = chl_no + d1 + Convert.ToInt32(ViewState["chl_no"]);
                            //chl_vol = chl_vol + d2 + Convert.ToInt32(ViewState["chl_vol"]);
                            //rec_no = rec_no + d3 + Convert.ToInt32(ViewState["rec_no"]);
                            //rec_vol = rec_vol + d4 + Convert.ToInt32(ViewState["rec_vol"]);
                            //var_no = var_no + dd2 + Convert.ToInt32(ViewState["var_no"]);
                            //var_vol = var_vol + dd1 + Convert.ToInt32(ViewState["var_vol"]);

                            //ViewState["chl_no"] = chl_no.ToString();
                            //ViewState["chl_vol"] = chl_vol.ToString();
                            //ViewState["rec_no"] = rec_no.ToString();
                            //ViewState["rec_vol"] = rec_vol.ToString();
                            //ViewState["var_no"] = var_no.ToString();
                            //ViewState["var_vol"] = var_vol.ToString();

                            //((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["chl_no"].ToString();
                            //((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_vol"].ToString();
                            //((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_no"].ToString();
                            //((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["rec_vol"].ToString();
                            //((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                            //((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                            //total

                        }
                    }
                    else
                    {
                        if (ds.Tables[0].Rows[i]["spec"].ToString() == "Deodar")
                        {

                            Int32 i1, i2, i3, i4;

                            i1 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_1"))).Text);
                            i2 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_2"))).Text);
                            i3 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_3"))).Text);
                            i4 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_4"))).Text);

                          

                            Int32 d1 =i2+ Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                            Int32 d2 =i4+ Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                            Int32 d3 =i1+ Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                            Int32 d4 =i3+ Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                            ((Label)(e.Row.FindControl("deo_1"))).Text =d3.ToString();
                            ((Label)(e.Row.FindControl("deo_2"))).Text = d1.ToString();
                            ((Label)(e.Row.FindControl("deo_3"))).Text = d4.ToString();
                            ((Label)(e.Row.FindControl("deo_4"))).Text = d2.ToString();


                            Int32 dd1 = d2 - d1;
                            Int32 dd2 = d4 - d3;


                            ((Label)(e.Row.FindControl("deo_d1"))).Text = dd2.ToString();
                            ((Label)(e.Row.FindControl("deo_d2"))).Text = dd1.ToString();
                        }

                        if (ds.Tables[0].Rows[i]["spec"].ToString() == "Kail")
                        {
                            Int32 i1, i2, i3, i4;
                            i1 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_1"))).Text);
                            i2 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_2"))).Text);
                            i3 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_3"))).Text);
                            i4 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_4"))).Text);



                            Int32 d1 = i2 + Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                            Int32 d2 = i4 + Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                            Int32 d3 = i1 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                            Int32 d4 = i3 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                            ((Label)(e.Row.FindControl("kail_1"))).Text = d3.ToString();
                            ((Label)(e.Row.FindControl("kail_2"))).Text = d1.ToString();
                            ((Label)(e.Row.FindControl("kail_3"))).Text = d4.ToString();
                            ((Label)(e.Row.FindControl("kail_4"))).Text = d2.ToString();


                            Int32 dd1 = d2 - d1;
                            Int32 dd2 = d4 - d3;


                            ((Label)(e.Row.FindControl("kail_d1"))).Text = dd2.ToString();
                            ((Label)(e.Row.FindControl("kail_d2"))).Text = dd1.ToString();

                        }
                    }

                }

            }
            else
            {
                sr--;
                Session["spec"] = "nl";
                Session["chl2"] = "nl2";
                e.Row.Visible = false;
            }
           


        }
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
       
            if (e.Row.RowType == DataControlRowType.DataRow)
            {
                string spec, chl, size_type;
                //((Label)(e.Row.FindControl("sr"))).Text = sr.ToString();
                spec = ((Label)(e.Row.FindControl("spec"))).Text;
                chl = ((Label)(e.Row.FindControl("Label2"))).Text;
                size_type = ((Label)(e.Row.FindControl("Label8"))).Text;

                if (Session["spec"].ToString() != size_type && Session["chl2"].ToString() != chl)
                {
                    Session["spec"] = size_type;
                    Session["chl2"] = chl;

                    string qry = "select * from tally_sheet where challan_no='" + chl + "' and size_type='" + size_type + "'";

                   // string qry = "select * from tally_sheet where challan_no='" + chl + "' and spec='" + spec + "' or challan_no='" + chl + "' and size_type='" + size_type + "' or challan_no='"+chl+"' and spec='"+spec+"'";
                    SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
                    DataSet ds = new DataSet();
                    adp.Fill(ds);

                    Int32 i;
                    for (i = 0; i < ds.Tables[0].Rows.Count; i++)
                    {


                        if (i == 0)
                        {


                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Deodar")
                            {



                                Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;

                                //total                       
                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                                //((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["chl_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["rec_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                                //total


                            }

                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Kail")
                            {

                                Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);
                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;



                                //total                       
                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                                //((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["chl_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["rec_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                                //total

                            }
                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Fir")
                            {

                                ((Label)(e.Row.FindControl("fir_1"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                                ((Label)(e.Row.FindControl("fir_2"))).Text = ds.Tables[0].Rows[i]["size"].ToString();
                                ((Label)(e.Row.FindControl("fir_3"))).Text = ds.Tables[0].Rows[i]["as_per_vol"].ToString();
                                ((Label)(e.Row.FindControl("fir_4"))).Text = ds.Tables[0].Rows[i]["size_vol"].ToString();

                                Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);
                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;
                                ((Label)(e.Row.FindControl("fir_d1"))).Text = dd2.ToString();
                                ((Label)(e.Row.FindControl("fir_d2"))).Text = dd1.ToString();


                                //total                       
                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                                //((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["chl_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["rec_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                                //total

                            }
                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Chil")
                            {
                                ((Label)(e.Row.FindControl("chil_1"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                                ((Label)(e.Row.FindControl("chil_2"))).Text = ds.Tables[0].Rows[i]["size"].ToString();
                                ((Label)(e.Row.FindControl("chil_3"))).Text = ds.Tables[0].Rows[i]["as_per_vol"].ToString();
                                ((Label)(e.Row.FindControl("chil_4"))).Text = ds.Tables[0].Rows[i]["size_vol"].ToString();

                                Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);
                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;
                                ((Label)(e.Row.FindControl("chil_d1"))).Text = dd2.ToString();
                                ((Label)(e.Row.FindControl("chil_d2"))).Text = dd1.ToString();

                                //total                       
                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                                //((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["chl_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["rec_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                                //total

                            }

                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Other")
                            {
                                ((Label)(e.Row.FindControl("other_1"))).Text = ds.Tables[0].Rows[i]["as_per_no"].ToString();
                                ((Label)(e.Row.FindControl("other_2"))).Text = ds.Tables[0].Rows[i]["size"].ToString();
                                ((Label)(e.Row.FindControl("other_3"))).Text = ds.Tables[0].Rows[i]["as_per_vol"].ToString();
                                ((Label)(e.Row.FindControl("other_4"))).Text = ds.Tables[0].Rows[i]["size_vol"].ToString();

                                Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);
                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;
                                ((Label)(e.Row.FindControl("other_d1"))).Text = dd2.ToString();
                                ((Label)(e.Row.FindControl("other_d2"))).Text = dd1.ToString();

                                //total                       
                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                                //((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["chl_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["rec_vol"].ToString();
                                //((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                                //((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                                //total



                            }

                        }
                        else
                        {
                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Deodar")
                            {


                                //Int32 i1, i2, i3, i4;

                                //i1 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_1"))).Text);
                                //i2 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_2"))).Text);
                                //i3 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_3"))).Text);
                                //i4 = Convert.ToInt32(((Label)(e.Row.FindControl("deo_4"))).Text);



                                Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 =Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 =Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                                //((Label)(e.Row.FindControl("deo_1"))).Text = d3.ToString();
                                //((Label)(e.Row.FindControl("deo_2"))).Text = d1.ToString();
                                //((Label)(e.Row.FindControl("deo_3"))).Text = d4.ToString();
                                //((Label)(e.Row.FindControl("deo_4"))).Text = d2.ToString();


                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;


                                //((Label)(e.Row.FindControl("deo_d1"))).Text = dd2.ToString();
                                //((Label)(e.Row.FindControl("deo_d2"))).Text = dd1.ToString();

                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();


                            }

                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Kail")
                            {

                                //Int32 i1, i2, i3, i4;

                                //i1 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_1"))).Text);
                                //i2 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_2"))).Text);
                                //i3 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_3"))).Text);
                                //i4 = Convert.ToInt32(((Label)(e.Row.FindControl("kail_4"))).Text);



                                Int32 d1 = Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 =Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 =Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 =Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                                //((Label)(e.Row.FindControl("kail_1"))).Text = d3.ToString();
                                //((Label)(e.Row.FindControl("kail_2"))).Text = d1.ToString();
                                //((Label)(e.Row.FindControl("kail_3"))).Text = d4.ToString();
                                //((Label)(e.Row.FindControl("kail_4"))).Text = d2.ToString();


                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;


                                //((Label)(e.Row.FindControl("kail_d1"))).Text = dd2.ToString();
                                //((Label)(e.Row.FindControl("kail_d2"))).Text = dd1.ToString();

                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                            }
                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Fir")
                            {

                                Int32 i1, i2, i3, i4;

                                i1 = Convert.ToInt32(((Label)(e.Row.FindControl("fir_1"))).Text);
                                i2 = Convert.ToInt32(((Label)(e.Row.FindControl("fir_2"))).Text);
                                i3 = Convert.ToInt32(((Label)(e.Row.FindControl("fir_3"))).Text);
                                i4 = Convert.ToInt32(((Label)(e.Row.FindControl("fir_4"))).Text);



                                Int32 d1 = i2 + Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = i4 + Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = i1 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = i3 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                                ((Label)(e.Row.FindControl("fir_1"))).Text = d3.ToString();
                                ((Label)(e.Row.FindControl("fir_2"))).Text = d1.ToString();
                                ((Label)(e.Row.FindControl("fir_3"))).Text = d4.ToString();
                                ((Label)(e.Row.FindControl("fir_4"))).Text = d2.ToString();


                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;


                                ((Label)(e.Row.FindControl("fir_d1"))).Text = dd2.ToString();
                                ((Label)(e.Row.FindControl("fir_d2"))).Text = dd1.ToString();

                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                            }
                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Chil")
                            {
                                Int32 i1, i2, i3, i4;

                                i1 = Convert.ToInt32(((Label)(e.Row.FindControl("chil_1"))).Text);
                                i2 = Convert.ToInt32(((Label)(e.Row.FindControl("chil_2"))).Text);
                                i3 = Convert.ToInt32(((Label)(e.Row.FindControl("chil_3"))).Text);
                                i4 = Convert.ToInt32(((Label)(e.Row.FindControl("chil_4"))).Text);



                                Int32 d1 = i2 + Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = i4 + Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = i1 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = i3 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                                ((Label)(e.Row.FindControl("chil_1"))).Text = d3.ToString();
                                ((Label)(e.Row.FindControl("chil_2"))).Text = d1.ToString();
                                ((Label)(e.Row.FindControl("chil_3"))).Text = d4.ToString();
                                ((Label)(e.Row.FindControl("chil_4"))).Text = d2.ToString();


                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;


                                ((Label)(e.Row.FindControl("chil_d1"))).Text = dd2.ToString();
                                ((Label)(e.Row.FindControl("chil_d2"))).Text = dd1.ToString();

                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();

                            }

                            if (ds.Tables[0].Rows[i]["spec"].ToString() == "Other")
                            {
                                Int32 i1, i2, i3, i4;

                                i1 = Convert.ToInt32(((Label)(e.Row.FindControl("other_1"))).Text);
                                i2 = Convert.ToInt32(((Label)(e.Row.FindControl("other_2"))).Text);
                                i3 = Convert.ToInt32(((Label)(e.Row.FindControl("other_3"))).Text);
                                i4 = Convert.ToInt32(((Label)(e.Row.FindControl("other_4"))).Text);



                                Int32 d1 = i2 + Convert.ToInt32(ds.Tables[0].Rows[i]["size"]);
                                Int32 d2 = i4 + Convert.ToInt32(ds.Tables[0].Rows[i]["size_vol"]);
                                Int32 d3 = i1 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_no"]);
                                Int32 d4 = i3 + Convert.ToInt32(ds.Tables[0].Rows[i]["as_per_vol"]);

                                ((Label)(e.Row.FindControl("other_1"))).Text = d3.ToString();
                                ((Label)(e.Row.FindControl("other_2"))).Text = d1.ToString();
                                ((Label)(e.Row.FindControl("other_3"))).Text = d4.ToString();
                                ((Label)(e.Row.FindControl("other_4"))).Text = d2.ToString();


                                Int32 dd1 = d2 - d1;
                                Int32 dd2 = d4 - d3;


                                ((Label)(e.Row.FindControl("other_d1"))).Text = dd2.ToString();
                                ((Label)(e.Row.FindControl("other_d2"))).Text = dd1.ToString();

                                chl_no = Convert.ToInt32(ViewState["chl_no"]) + d1;
                                chl_vol = Convert.ToInt32(ViewState["chl_vol"]) + d2;
                                rec_no = Convert.ToInt32(ViewState["rec_no"]) + d3;
                                rec_vol = Convert.ToInt32(ViewState["rec_vol"]) + d4;
                                var_no = Convert.ToInt32(ViewState["var_no"]) + dd2;
                                var_vol = Convert.ToInt32(ViewState["var_vol"]) + dd1;

                                ViewState["chl_no"] = chl_no.ToString();
                                ViewState["chl_vol"] = chl_vol.ToString();
                                ViewState["rec_no"] = rec_no.ToString();
                                ViewState["rec_vol"] = rec_vol.ToString();
                                ViewState["var_no"] = var_no.ToString();
                                ViewState["var_vol"] = var_vol.ToString();



                            }
                        }
                    }

                }
                else
                {
                    Session["spec"] = "nl";
                    Session["chl2"] = "nl2";
                    e.Row.Visible = false;
                }


            
        }


            if (e.Row.RowType == DataControlRowType.DataRow)
            {
                ((Label)(e.Row.FindControl("tot_4"))).Text = ViewState["chl_vol"].ToString();
                ((Label)(e.Row.FindControl("tot_2"))).Text = ViewState["chl_no"].ToString();
                ((Label)(e.Row.FindControl("tot_3"))).Text = ViewState["rec_vol"].ToString();
                ((Label)(e.Row.FindControl("tot_1"))).Text = ViewState["rec_no"].ToString();
                ((Label)(e.Row.FindControl("tot_d2"))).Text = ViewState["var_vol"].ToString();
                ((Label)(e.Row.FindControl("tot_d1"))).Text = ViewState["var_no"].ToString();
                chl_no = 0;
                chl_vol = 0;
                rec_no = 0;
                rec_vol = 0;
                var_no = 0;
                var_vol = 0;
                //ViewState["chl_no"] = "0".ToString();
                //ViewState["chl_vol"] = "0".ToString();
                //ViewState["rec_no"] = "0".ToString();
                //ViewState["rec_vol"] = "0".ToString();
                //ViewState["var_no"] = "0".ToString();
                //ViewState["var_vol"] = "0".ToString();
            }
            if (e.Row.RowType == DataControlRowType.Footer)
            {
                Session["spec"] = "nl";
                Session["chl2"] = "nl2";
            }
    }
}