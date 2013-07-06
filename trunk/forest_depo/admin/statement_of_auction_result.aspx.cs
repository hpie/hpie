using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;
public partial class statement_of_auction_result : System.Web.UI.Page
{
    public Int32 sr = 1;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void date_on_TextChanged(object sender, EventArgs e)
    {


        Label1.Text = "";
       // hsd.Items.Clear();
        division.Items.Clear();
        SqlDataSource1.DataBind();
        GridView1.DataBind();
        GridView2.DataBind();
        DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            //hsd.Items.Add(dv.Table.Rows[0]["hsd_lot_no"].ToString());
           division.Items.Add(dv.Table.Rows[0]["division"].ToString());

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
            TableCell FileDateb2 = new TableHeaderCell();
            FileDateb2.Text = "";
            row3.Cells.Add(FileDateb2);

            TableCell FileDateb3 = new TableHeaderCell();
            FileDateb3.Text = "Per Piece";
            row3.Cells.Add(FileDateb3);

            TableCell FileDateb4 = new TableHeaderCell();
            FileDateb4.Text = "Per M3";
            row3.Cells.Add(FileDateb4);

            TableCell FileDateb5 = new TableHeaderCell();
            FileDateb5.Text = "";
            row3.Cells.Add(FileDateb5);

            TableCell FileDateb6 = new TableHeaderCell();
            FileDateb6.Text = "Per Piece";
            row3.Cells.Add(FileDateb6);

            TableCell FileDateb7 = new TableHeaderCell();
            FileDateb7.Text = "Per M3";
            row3.Cells.Add(FileDateb7);

            TableCell FileDateb8 = new TableHeaderCell();
            FileDateb8.Text = "";
            row3.Cells.Add(FileDateb8);

            TableCell FileDateb9 = new TableHeaderCell();
            FileDateb9.Text = "Amt.";
            row3.Cells.Add(FileDateb9);

            TableCell FileDateb11 = new TableHeaderCell();
            FileDateb11.Text = "%";
            row3.Cells.Add(FileDateb11);


            t3.Rows.AddAt(0, row3);





            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];






            TableCell cell1 = new TableHeaderCell();
            cell1.Text = "Vol. M3";
            row.Cells.Add(cell1);


            TableCell cell2 = new TableHeaderCell();
            cell2.Text = "Rate Obtained Per Piece/Per M3";
            cell2.ColumnSpan = 2;
            row.Cells.Add(cell2);

            TableCell cell3 = new TableHeaderCell();
            cell3.Text = "Sale/Bid Ammount";

            row.Cells.Add(cell3);


            TableCell cell4 = new TableHeaderCell();
            cell4.ColumnSpan = 2;
            cell4.Text = "Floor Rate Per M3";
            row.Cells.Add(cell4);


            TableCell cell5 = new TableHeaderCell();
            cell5.Text = "Ammount";

            row.Cells.Add(cell5);

            TableCell cell6 = new TableHeaderCell();
            cell6.Text = "Variations (+/-)%";
            cell6.ColumnSpan = 2;
            row.Cells.Add(cell6);




            t.Rows.AddAt(0, row);





            Table t8 = (Table)gv.Controls[0];








        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            sr++;
        }
    }
    protected void GridView1_RowCreated1(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {






            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];






            TableCell cell1 = new TableHeaderCell();
            cell1.Text = "S. No";
            row.Cells.Add(cell1);


            TableCell cell2 = new TableHeaderCell();
            cell2.Text = "S. No. of Auction List";
            row.Cells.Add(cell2);

            TableCell cell3 = new TableHeaderCell();
            cell3.Text = "Bid Paper No.";
            row.Cells.Add(cell3);


            TableCell cell4 = new TableHeaderCell();
            cell4.Text = "Name of Purchaser";
            row.Cells.Add(cell4);


            TableCell cell5 = new TableHeaderCell();
            cell5.Text = "Lot No. Purchased";

            row.Cells.Add(cell5);

            TableCell cell6 = new TableHeaderCell();
            cell6.Text = "Stack No. Purchased";
            row.Cells.Add(cell6);

            TableCell cell7 = new TableHeaderCell();
            cell7.Text = "Species";
            row.Cells.Add(cell7);

            TableCell cell8 = new TableHeaderCell();
            cell8.Text = "Sizes";
            row.Cells.Add(cell8);

            TableCell cell9 = new TableHeaderCell();
            cell9.Text = "No.";
            row.Cells.Add(cell9);



            t.Rows.AddAt(0, row);





            Table t8 = (Table)gv.Controls[0];
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Label1.Text = "";
         DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
         if (dv.Table.Rows.Count == 0)
         {

             string s_no, bid_paper_no, name_pur, lot_no, stack_no, spec, size, no;
             string vol_m3, rate_piece, rate_m3, sale_bid_amt, floor_piece, floor_m3, amt, var_amt, var_per;

             Int32 i;
             for (i = 0; i < GridView1.Rows.Count; i++)
             {

                 s_no = ((TextBox)(GridView1.Rows[i].FindControl("s_no"))).Text;
                 bid_paper_no = ((TextBox)(GridView1.Rows[i].FindControl("bid_paper_no"))).Text;
                 name_pur = ((TextBox)(GridView1.Rows[i].FindControl("name_of_pur"))).Text;
                 lot_no = ((TextBox)(GridView1.Rows[i].FindControl("lot_no"))).Text;
                 stack_no = ((TextBox)(GridView1.Rows[i].FindControl("stack_no"))).Text;
                 spec = ((TextBox)(GridView1.Rows[i].FindControl("spec"))).Text;
                 size = ((TextBox)(GridView1.Rows[i].FindControl("size"))).Text;
                 no = ((TextBox)(GridView1.Rows[i].FindControl("no"))).Text;

                 SqlDataSource1.InsertParameters["bid_paper_no"].DefaultValue = bid_paper_no;
                 SqlDataSource1.InsertParameters["name_of_pur"].DefaultValue = name_pur;
                 SqlDataSource1.InsertParameters["lot_no"].DefaultValue = lot_no;
                 SqlDataSource1.InsertParameters["stack_no"].DefaultValue = stack_no;
                 SqlDataSource1.InsertParameters["spec"].DefaultValue = spec;
                 SqlDataSource1.InsertParameters["size"].DefaultValue = size;
                 SqlDataSource1.InsertParameters["no"].DefaultValue = no;

                 vol_m3 = ((TextBox)(GridView2.Rows[i].FindControl("vol_m3"))).Text;
                 rate_piece = ((TextBox)(GridView2.Rows[i].FindControl("rate_ob_per_piece"))).Text;
                 rate_m3 = ((TextBox)(GridView2.Rows[i].FindControl("rate_ob_per_m3"))).Text;
                 sale_bid_amt = ((TextBox)(GridView2.Rows[i].FindControl("sale_bid_amt"))).Text;
                 floor_piece = ((TextBox)(GridView2.Rows[i].FindControl("floor_rate_per_piece"))).Text;
                 floor_m3 = ((TextBox)(GridView2.Rows[i].FindControl("floor_rate_per_m3"))).Text;
                 amt = ((TextBox)(GridView2.Rows[i].FindControl("amt"))).Text;
                 var_amt = ((TextBox)(GridView2.Rows[i].FindControl("var_amt"))).Text;
                 var_per = ((TextBox)(GridView2.Rows[i].FindControl("var_per"))).Text;

               
                 decimal sale_bid_t, amt_t, var_amt_t, var_per_t;
                string no_t = ((Label)(GridView2.Rows[i].FindControl("no"))).Text;   
           
                 sale_bid_t = Math.Round(Convert.ToDecimal(no_t) * Convert.ToDecimal(rate_piece), 3);

                 amt_t = Math.Round(Convert.ToDecimal(no_t) * Convert.ToDecimal(floor_piece), 3);

                 var_amt_t = Math.Round(Convert.ToDecimal(sale_bid_t) - Convert.ToDecimal(amt_t), 3);
                 var_per_t = Math.Round(Convert.ToDecimal(var_amt_t) / Convert.ToDecimal(amt_t) * 100, 3);



                 SqlDataSource1.InsertParameters["vol_m3"].DefaultValue = vol_m3;
                 SqlDataSource1.InsertParameters["rate_ob_per_piece"].DefaultValue = rate_piece;
                 SqlDataSource1.InsertParameters["rate_ob_per_m3"].DefaultValue = rate_m3;
                 SqlDataSource1.InsertParameters["sale_bid_amt"].DefaultValue = sale_bid_t.ToString();
                 SqlDataSource1.InsertParameters["floor_per_piece"].DefaultValue = floor_piece;
                 SqlDataSource1.InsertParameters["floor_per_m3"].DefaultValue = floor_m3;
                 SqlDataSource1.InsertParameters["amt"].DefaultValue = amt_t.ToString();
                 SqlDataSource1.InsertParameters["var_amt"].DefaultValue = var_amt_t.ToString();
                 SqlDataSource1.InsertParameters["var_percent"].DefaultValue = var_per_t.ToString();
                 SqlDataSource1.Insert();

             }


         }
         else
         {
             Label1.Text = "Not Avalailabe for auction ! Slot given to " + dv.Table.Rows[0]["name_of_pur"].ToString();  
         }
         Response.Redirect("statement_of_auction_result_p.aspx");
    }
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string no, vol;
            decimal volm3;
            no = ((Label)(e.Row.FindControl("no"))).Text;
           vol = ((Label)(e.Row.FindControl("vol"))).Text;
           volm3 = Math.Round(Convert.ToDecimal(vol) * Convert.ToDecimal(no), 3);
           ((TextBox)(e.Row.FindControl("vol_m3"))).Text = volm3.ToString();

        }
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Response.Redirect("statement_of_auction_result_p.aspx");
    }
}