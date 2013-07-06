using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class timber_rec : System.Web.UI.Page
{
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
            FileDateb1.Text = "";
            FileDateb1.ColumnSpan = 3;
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



            cell8.Text = "Name of Division";
            //cell8.ColumnSpan = 2;
            row1.Cells.Add(cell8);



            t8.Rows.AddAt(0, row1);



            TableCell cell18 = new TableHeaderCell();
            //cell18.ColumnSpan = 2;


            cell18.Text = "No. of Trucks";

            row1.Cells.Add(cell18);



            t8.Rows.AddAt(0, row1);

           

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

            TableCell cell10 = new TableHeaderCell();
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

            TableCell cell13 = new TableHeaderCell();
            cell13.Text = "";
            cell13.ColumnSpan = 2;
            row.Cells.Add(cell13);

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
            cell36.ColumnSpan = 6;
            row1.Cells.Add(cell36);

            t8.Rows.AddAt(0, row1);




        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        GridView1.DataBind();
        GridView2.DataBind();
    }
}