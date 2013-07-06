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
public partial class fc27 : System.Web.UI.Page
{
    ArrayList arr = new ArrayList(20);
    ArrayList arr1 = new ArrayList(20);
    decimal tqty = 0, tamt = 0;
    public Int32 sr = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            dt();
            bind();
        }
    }
    public string getdate(DateTime dt)
    {
        return dt.ToString("dd/MM/yyyy");
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

        Int32 dd = Convert.ToInt32(DateTime.DaysInMonth(Convert.ToInt32(yer.SelectedItem.Text), live.Month));

        DateTime live1 = Convert.ToDateTime(month.SelectedValue.ToString() + "/" + dd.ToString() + "/" + yer.SelectedItem.Text);
        //  ((Label)(e.Row.FindControl("Label27"))).Text = live.ToString("dd/MM/yyyy");
        Int32 m, y;
        m = live.Month;
        y = live.Year;
        Int32 d = DateTime.DaysInMonth(y, m);
        for (i = 1; i <= d; i++)
        {

            arr.Add(i.ToString() + "/" + month.SelectedValue.ToString() + "/" + yer.SelectedItem.Text);

        }
        string st151 = "select * from fc27 where dt>='" + live + "' and dt<='" + live1 + "' order by dt";
        SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds151 = new DataSet();
        adp151.Fill(ds151);
        GridView1.DataSource = arr;
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

            FileDate.Text = "Sr.";

            row.Cells.Add(FileDate);


            TableCell cell77 = new TableHeaderCell();
            cell77.Text = "Date";

            row.Cells.Add(cell77);



           // t.Rows.AddAt(0, row);

            GridViewRow row1 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t1 = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate3 = new TableHeaderCell();

            FileDate3.ColumnSpan = 8;

            row1.Cells.Add(FileDate3);

            TableCell FileDate31 = new TableHeaderCell();


            FileDate31.Text = "";

            row1.Cells.Add(FileDate31);


            TableCell FileDate32 = new TableHeaderCell();


            FileDate32.Text = "Amt";

           // row1.Cells.Add(FileDate32);

            TableCell FileDate33 = new TableHeaderCell();


            FileDate33.Text = "No.";

            row1.Cells.Add(FileDate33);



            TableCell FileDate326 = new TableHeaderCell();


            FileDate326.Text = "Weight";

            row1.Cells.Add(FileDate326);

            
            t1.Rows.AddAt(0, row1);
            TableCell cell = new TableHeaderCell();
            cell.Text = "Time";

            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Name of Supplier";

            row.Cells.Add(cell1);



            t.Rows.AddAt(0, row);

            
            TableCell cell122 = new TableHeaderCell();


            //cell122.ColumnSpan = 2;
            cell122.Text = "Supplier order No.";

            row.Cells.Add(cell122);


            TableCell cell15 = new TableHeaderCell();

           // cell15.ColumnSpan = 2;

            cell15.Text = "Challan/Bill/cash memo";

            row.Cells.Add(cell15);


            TableCell cell151 = new TableHeaderCell();


           // cell151.ColumnSpan = 2;
            cell151.Text = "Description of goods";

            row.Cells.Add(cell151);

            TableCell cell152 = new TableHeaderCell();


           // cell152.ColumnSpan = 2;
            cell152.Text = "Vehicle No.";

            row.Cells.Add(cell152);


            TableCell cell153 = new TableHeaderCell();

            //cell153.ColumnSpan = 2;

            cell153.Text = "Name of drive";

            row.Cells.Add(cell153);

            TableCell cell1537 = new TableHeaderCell();

            cell1537.ColumnSpan = 2;

           cell1537.Text = "Quantity";

            row.Cells.Add(cell1537);


            TableCell cell1538 = new TableHeaderCell();

           // cell1537.ColumnSpan = 2;

            cell1538.Text = "Remarks";

            row.Cells.Add(cell1538);


            TableCell cell1539 = new TableHeaderCell();

            // cell1537.ColumnSpan = 2;

            cell1539.Text = "Sign. of gate-keeper";

            row.Cells.Add(cell1539);


            TableCell cell90 = new TableHeaderCell();

            // cell1537.ColumnSpan = 2;

            cell90.Text = "Remarks";

            row.Cells.Add(cell90);
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        sr = sr + 1;
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            

            Label ll = ((Label)(e.Row.FindControl("Label1")));
            DateTime dt2 = Convert.ToDateTime(DateTime.Parse(ll.Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            string st151 = "select *from fc27 where dt='" + dt2+"'";
            SqlDataAdapter adp151 = new SqlDataAdapter(st151, ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
            DataSet ds151 = new DataSet();
            adp151.Fill(ds151);
            if (ds151.Tables[0].Rows.Count != 0)
            {
                for (Int16 a = 0; a < ds151.Tables[0].Rows.Count; a++)
                {

                    e.Row.Cells[2].Text = ds151.Tables[0].Rows[a][2].ToString();
                    e.Row.Cells[3].Text = ds151.Tables[0].Rows[a][3].ToString();
                    e.Row.Cells[4].Text = ds151.Tables[0].Rows[a][4].ToString();
                    e.Row.Cells[5].Text = ds151.Tables[0].Rows[a]["challan"].ToString() + "/" + ds151.Tables[0].Rows[a]["bill"].ToString() + "/" + ds151.Tables[0].Rows[a]["cash"].ToString() + "&" +Convert.ToDateTime( ds151.Tables[0].Rows[a]["dt1"]).ToString("d");
                    e.Row.Cells[6].Text = ds151.Tables[0].Rows[a]["des"].ToString();
                    e.Row.Cells[7].Text = ds151.Tables[0].Rows[a]["veh"].ToString();
                    e.Row.Cells[8].Text = ds151.Tables[0].Rows[a]["name_drive"].ToString();
                    e.Row.Cells[9].Text = ds151.Tables[0].Rows[a]["qno"].ToString();
                    e.Row.Cells[10].Text = ds151.Tables[0].Rows[a]["we"].ToString();
                    e.Row.Cells[11].Text = ds151.Tables[0].Rows[a]["rem"].ToString();


                    
                }
            }
           }
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
    }
    protected void GridView1_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {
        GridView1.EditIndex = -1;
        bind();
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        string dt = ((Label)GridView1.Rows[e.RowIndex].FindControl("label1")).Text;
        DateTime dt2 = Convert.ToDateTime(DateTime.Parse(dt, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

        decimal tcs = Convert.ToDecimal(((TextBox)GridView1.Rows[e.RowIndex].FindControl("textbox1")).Text);
        SqlDataSource1.InsertParameters["dt"].DefaultValue = dt2.ToString();
        SqlDataSource1.InsertParameters["tcs"].DefaultValue = tcs.ToString();
        SqlDataSource1.Insert();
        GridView1.EditIndex = -1;
        bind();

    }
}