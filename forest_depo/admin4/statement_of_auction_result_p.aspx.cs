using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Configuration;
using System.Data;

public partial class statement_of_auction_result_p : System.Web.UI.Page
{
    public Int32 sr = 1;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Label4.Text = "";
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            Label1.Text =Convert.ToDateTime(dv.Table.Rows[0]["auction_date"]).ToString("d");
            Label2.Text = dv.Table.Rows[0]["name_of_pur"].ToString();
            Label3.Text = dv.Table.Rows[0]["division"].ToString();
            GridView1.DataBind();
            GridView2.DataBind();
        }
        else
        {
            Label4.Text = "No Record Available !";
        }

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            sr++;
        }
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
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
    protected void GridView2_RowDataBound(object sender, GridViewRowEventArgs e)
    {

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
}