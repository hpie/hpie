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
public partial class fc10 : System.Web.UI.Page
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
    protected void month_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }
    protected void yer_SelectedIndexChanged(object sender, EventArgs e)
    {
        bind();
    }

    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        GridView1.EditIndex = e.NewEditIndex;
        bind();
        DateTime dt = Convert.ToDateTime(DateTime.Parse(((Label)(GridView1.Rows[e.NewEditIndex].FindControl("Label1"))).Text, System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")));

        //string live =((Label)(e.Row.FindControl("Label1"))).Text;
        // DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
        SqlDataAdapter adp = new SqlDataAdapter("select * from fc10 where dt='" + dt + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
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
    //((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox15"))).Text = ds.Tables[0].Rows[0]["rem"].ToString();
            //((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox16"))).Text = ds.Tables[0].Rows[0][17].ToString();
            //((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox17"))).Text = ds.Tables[0].Rows[0][18].ToString();
            //((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox18"))).Text = ds.Tables[0].Rows[0][19].ToString();
            //((TextBox)(GridView1.Rows[e.NewEditIndex].FindControl("TextBox19"))).Text = ds.Tables[0].Rows[0][20].ToString();


        }
    }
    protected void GridView1_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {
        GridView1.EditIndex = -1;
        bind();
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow && e.Row.RowState == DataControlRowState.Normal || e.Row.RowState == DataControlRowState.Alternate)
        {

            string live = ((Label)(e.Row.FindControl("Label1"))).Text;
            DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
            SqlDataAdapter adp = new SqlDataAdapter("select * from fc10 where dt='" + live1 + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
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
           // ((Label)(e.Row.FindControl("Label16"))).Text = ds.Tables[0].Rows[0]["rem"].ToString();




            }
            else
            {
                ((Label)(e.Row.FindControl("Label2"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label3"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label4"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label5"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label6"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label7"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label8"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label9"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label10"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label11"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label12"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label13"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label14"))).Text = 0.ToString();
                ((Label)(e.Row.FindControl("Label15"))).Text = 0.ToString();
            }
        }
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        DateTime live = Convert.ToDateTime(DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        //DateTime live1 = DateTime.Parse(live.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA"));
        SqlDataAdapter adp = new SqlDataAdapter("select * from fc10 where dt='" + live + "'", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        if (ds.Tables[0].Rows.Count == 0)
        {
            SqlDataSource1.InsertParameters["dt"].DefaultValue = DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            SqlDataSource1.InsertParameters["r_b_g"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text.ToString();
            SqlDataSource1.InsertParameters["c_o"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text.ToString();
            SqlDataSource1.InsertParameters["s_c"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text.ToString();
            SqlDataSource1.InsertParameters["cr_o"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text.ToString();
            SqlDataSource1.InsertParameters["cr_a"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text.ToString();
            SqlDataSource1.InsertParameters["ch_x"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text.ToString();
            SqlDataSource1.InsertParameters["st_c"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text.ToString();
            SqlDataSource1.InsertParameters["d_p"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox8"))).Text.ToString();
            SqlDataSource1.InsertParameters["p_t"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text.ToString();
            SqlDataSource1.InsertParameters["lot_no"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text.ToString();
            SqlDataSource1.InsertParameters["b_n"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox11"))).Text.ToString();
            SqlDataSource1.InsertParameters["S_ic"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text.ToString();
            SqlDataSource1.InsertParameters["s_fm"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox13"))).Text.ToString();
            SqlDataSource1.InsertParameters["rem"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox14"))).Text.ToString();
           


            SqlDataSource1.Insert();
            GridView1.EditIndex = -1;
            bind();
            //GridView1.DataBind();
        }
        else
        {
            SqlDataSource1.UpdateParameters["dt"].DefaultValue = DateTime.Parse(((Label)(GridView1.Rows[e.RowIndex].FindControl("Label1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
            SqlDataSource1.UpdateParameters["r_b_g"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox1"))).Text.ToString();
            SqlDataSource1.UpdateParameters["c_o"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text.ToString();
            SqlDataSource1.UpdateParameters["s_c"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text.ToString();
            SqlDataSource1.UpdateParameters["cr_o"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text.ToString();
            SqlDataSource1.UpdateParameters["cr_a"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text.ToString();
            SqlDataSource1.UpdateParameters["ch_x"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox6"))).Text.ToString();
            SqlDataSource1.UpdateParameters["st_c"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text.ToString();
            SqlDataSource1.UpdateParameters["d_p"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox8"))).Text.ToString();
            SqlDataSource1.UpdateParameters["p_t"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text.ToString();
            SqlDataSource1.UpdateParameters["lot_no"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text.ToString();
            SqlDataSource1.UpdateParameters["b_n"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox11"))).Text.ToString();
            SqlDataSource1.UpdateParameters["S_ic"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text.ToString();
            SqlDataSource1.UpdateParameters["s_fm"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox13"))).Text.ToString();
            SqlDataSource1.UpdateParameters["rem"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox14"))).Text.ToString();


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



            cell.Text = "Rosin B grade";

            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Castor oil";

            row.Cells.Add(cell1);



            t.Rows.AddAt(0, row);

            TableCell cell2 = new TableHeaderCell();



            cell2.Text = "Soda caustic";

            row.Cells.Add(cell2);



            t.Rows.AddAt(0, row);

            TableCell cell3 = new TableHeaderCell();



            cell3.Text = "Creosote oil";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();



            cell4.Text = "Cresylic acid";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

            TableCell cell6 = new TableHeaderCell();



            cell6.Text = "Chlorinated xylenol/cresylic acid";

            row.Cells.Add(cell6);



            t.Rows.AddAt(0, row);

            TableCell cell7 = new TableHeaderCell();



            cell7.Text = "Steam coal";

            row.Cells.Add(cell7);



            t.Rows.AddAt(0, row);
            TableCell cell8 = new TableHeaderCell();



            cell8.Text = "Daily production";

            row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
            TableCell cell9 = new TableHeaderCell();



            cell9.Text = "Progressive total";

            row.Cells.Add(cell9);



            t.Rows.AddAt(0, row);
            TableCell cell10 = new TableHeaderCell();



            cell10.Text = "Lot No.";

            row.Cells.Add(cell10);



            t.Rows.AddAt(0, row);
            TableCell cell11 = new TableHeaderCell();



            cell11.Text = "Batch no.";

            row.Cells.Add(cell11);



            t.Rows.AddAt(0, row);
            TableCell cell12 = new TableHeaderCell();



            cell12.Text = "Sign. of sec.I/C";

            row.Cells.Add(cell12);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell13 = new TableHeaderCell();



            cell13.Text = "Sign. of FM/GM";

            row.Cells.Add(cell13);



            t.Rows.AddAt(0, row);

            t.Rows.AddAt(0, row);
            TableCell cell14 = new TableHeaderCell();



            cell14.Text = "Remarks";

            row.Cells.Add(cell14);



            t.Rows.AddAt(0, row);

          

                   }
    }
}
