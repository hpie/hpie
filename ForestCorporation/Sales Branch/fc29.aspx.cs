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

public partial class fc29 : System.Web.UI.Page
{
    public Int32 sr = 0;
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
        for (i = 1; i <= d; i++)
        {

            arr.Add(i.ToString() + "/" + month.SelectedValue.ToString() + "/" + yer.SelectedItem.Text);

        }
        GridView1.DataSource = arr;
        GridView1.DataBind();




    }

    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
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
            FileDate.ColumnSpan = 11;
            FileDate.Text = "Left Hand Side of Register";

            row.Cells.Add(FileDate);



            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t1 = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate3 = new TableHeaderCell();

            FileDate3.ColumnSpan = 1;
            FileDate3.Text = "Srno.";
            row1.Cells.Add(FileDate3);

            TableCell FileDate31 = new TableHeaderCell();


            FileDate31.Text = "Date";

            row1.Cells.Add(FileDate31);


            TableCell FileDate32 = new TableHeaderCell();


            FileDate32.Text = "Shift";

            row1.Cells.Add(FileDate32);

            TableCell FileDate33 = new TableHeaderCell();


            FileDate33.Text = "Division from Resin Received";

            row1.Cells.Add(FileDate33);



            TableCell FileDate326 = new TableHeaderCell();


            FileDate326.Text = "Time of Filling Mix-vat";

            row1.Cells.Add(FileDate326);

            TableCell FileDate337 = new TableHeaderCell();


            FileDate337.Text = "Temperature of Mix-vat";

            row1.Cells.Add(FileDate337);
            


            TableCell FileDate327 = new TableHeaderCell();


            FileDate327.Text = "Quantity of T.Oil";

            row1.Cells.Add(FileDate327);


            TableCell FileDate338 = new TableHeaderCell();


            FileDate338.Text = "Salt";

            row1.Cells.Add(FileDate338);



            TableCell FileDate328 = new TableHeaderCell();


            FileDate328.Text = "Gas";

            row1.Cells.Add(FileDate328);

            TableCell FileDate339 = new TableHeaderCell();


            FileDate339.Text = "Time of filling Rest Vat";

            row1.Cells.Add(FileDate339);



            TableCell FileDate329 = new TableHeaderCell();

            
            FileDate329.Text = "Name of Person who filled Rest Vat.";

            row1.Cells.Add(FileDate329);


            TableCell FileDate34 = new TableHeaderCell();


            FileDate34.Text = "Charge No.";

            row1.Cells.Add(FileDate34);



            TableCell FileDate324 = new TableHeaderCell();


            FileDate324.Text = "Rest";

            row1.Cells.Add(FileDate324);

            TableCell FileDate341 = new TableHeaderCell();


            FileDate341.Text = "Acid";

            row1.Cells.Add(FileDate341);



            TableCell FileDate3241 = new TableHeaderCell();


            FileDate3241.Text = "200kg";

            row1.Cells.Add(FileDate3241);

            TableCell FileDate342 = new TableHeaderCell();


            FileDate342.Text = "Other Pack";

            row1.Cells.Add(FileDate342);



            TableCell FileDate3242 = new TableHeaderCell();


            FileDate3242.Text = "Rosin Grade";

            row1.Cells.Add(FileDate3242);

            TableCell FileDate343 = new TableHeaderCell();


            FileDate343.Text = "Name of Shift Workers";

            row1.Cells.Add(FileDate343);



          

          

            t1.Rows.AddAt(0, row1);
           

            TableCell cell3 = new TableHeaderCell();

            cell3.ColumnSpan = 7;

            cell3.Text = "Right Hand Side of Register";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

          
          

            //t.Rows.AddAt(0, row);



        }
    }
}
