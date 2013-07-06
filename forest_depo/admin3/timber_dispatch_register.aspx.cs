using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class timber_dispatch_register : System.Web.UI.Page
{
    Int32 sr = 0;
    protected void Page_Load(object sender, EventArgs e)
    {

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
            FileDateb1.Text = "S. No";
           
            row3.Cells.Add(FileDateb1);


            TableCell FileDateb2 = new TableHeaderCell();
            FileDateb2.Text = "Date of Lifting";
            row3.Cells.Add(FileDateb2);

            TableCell FileDateb3 = new TableHeaderCell();
            FileDateb3.Text = "Release Order No. & Date";
            row3.Cells.Add(FileDateb3);

            TableCell FileDateb4 = new TableHeaderCell();
            FileDateb4.Text = "Gate Pass/ Challan No.";
            row3.Cells.Add(FileDateb4);

            TableCell FileDateb5 = new TableHeaderCell();
            FileDateb5.Text = "Receipt No. & Date For Depot Rent(if Lifted after the Lifting Date)";
            row3.Cells.Add(FileDateb5);

            TableCell FileDateb6 = new TableHeaderCell();
            FileDateb6.Text = "Vehicle No.";
            row3.Cells.Add(FileDateb6);

            //TableCell FileDateb7 = new TableHeaderCell();
            //FileDateb7.Text = "Vol.";
            //row3.Cells.Add(FileDateb7);

            //TableCell FileDateb8 = new TableHeaderCell();
            //FileDateb8.Text = "No.";
            //row3.Cells.Add(FileDateb8);

            //TableCell FileDateb9 = new TableHeaderCell();
            //FileDateb9.Text = "Vol.";
            //row3.Cells.Add(FileDateb9);

            //TableCell FileDateb10 = new TableHeaderCell();
            //FileDateb10.Text = "No.";
            //row3.Cells.Add(FileDateb10);

            //TableCell FileDateb11 = new TableHeaderCell();
            //FileDateb11.Text = "Vol.";
            //row3.Cells.Add(FileDateb11);

            //TableCell FileDateb12 = new TableHeaderCell();
            //FileDateb12.Text = "No.";
            //row3.Cells.Add(FileDateb12);

            //TableCell FileDateb13 = new TableHeaderCell();
            //FileDateb13.Text = "Vol.";
            //row3.Cells.Add(FileDateb13);

            //TableCell FileDateb14 = new TableHeaderCell();
            //FileDateb2.Text = "No.";
            //row3.Cells.Add(FileDateb2);


            t3.Rows.AddAt(0, row3);
        }
    }
    protected void GridView2_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {
            GridView gv4 = sender as GridView;
            GridViewRow row4 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t4 = (Table)gv4.Controls[0];



            // Adding Cells

            TableCell FileDateb1 = new TableHeaderCell();
            FileDateb1.Text = "Stack No.";
            row4.Cells.Add(FileDateb1);


            TableCell FileDateb2 = new TableHeaderCell();
            FileDateb2.Text = "Lot No.";
            row4.Cells.Add(FileDateb2);

            TableCell FileDateb3 = new TableHeaderCell();
            FileDateb3.Text = "Species";
            row4.Cells.Add(FileDateb3);

            TableCell FileDateb4 = new TableHeaderCell();
            FileDateb4.Text = "Size";
            row4.Cells.Add(FileDateb4);

            TableCell FileDateb5 = new TableHeaderCell();
            FileDateb5.Text = "No.";
            row4.Cells.Add(FileDateb5);

            TableCell FileDateb6 = new TableHeaderCell();
            FileDateb6.Text = "Vol.";
            row4.Cells.Add(FileDateb6);

            TableCell FileDateb7 = new TableHeaderCell();
            FileDateb7.Text = "Total";
            row4.Cells.Add(FileDateb7);

            TableCell FileDateb8 = new TableHeaderCell();
            FileDateb8.Text = "Date of Auction";
            row4.Cells.Add(FileDateb8);

            TableCell FileDateb9 = new TableHeaderCell();
            FileDateb9.Text = "Remarks";
            row4.Cells.Add(FileDateb9);



            t4.Rows.AddAt(0, row4);
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Label17.Text = DropDownList1.SelectedItem.Text.ToString();
        GridView1.DataBind();

        GridView2.DataBind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            sr++;
            ((Label)(e.Row.FindControl("sr"))).Text = sr.ToString();
        }
    }
}