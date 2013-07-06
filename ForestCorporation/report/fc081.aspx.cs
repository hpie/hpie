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

public partial class fc08 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            bind();
        }
    }
    private void bind()
    {
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {
            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            row.HorizontalAlign = HorizontalAlign.Center;
            Table t = (Table)gv.Controls[0];



            // Adding Cells

            TableCell FileDate = new TableHeaderCell();

            FileDate.Text = "Date";

            row.Cells.Add(FileDate);



            TableCell cell = new TableHeaderCell();



            cell.Text = "Shift";

            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Stream pressure after every hour";

            cell1.ColumnSpan = 2;
            row.Cells.Add(cell1);



            t.Rows.AddAt(0, row);

            TableCell cell2 = new TableHeaderCell();



            cell2.Text = "Resin consumed";
            cell2.ColumnSpan = 3;
            row.Cells.Add(cell2);



            t.Rows.AddAt(0, row);

            TableCell cell3 = new TableHeaderCell();



            cell3.Text = "At what time mixing Vat filled by the resin party with name of mate";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();



            cell4.Text = "Times of putting steam in mixing Vat";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

            TableCell cell6 = new TableHeaderCell();



            cell6.Text = "Putting Closed Mixer";

            row.Cells.Add(cell6);



            t.Rows.AddAt(0, row);

            TableCell cell7 = new TableHeaderCell();



            cell7.Text = "How Many Litre in T .Oil put in mixing Vat & Time";

            row.Cells.Add(cell7);



            t.Rows.AddAt(0, row);
            TableCell cell8 = new TableHeaderCell();



            cell8.Text = "How Much Common selt put in Mixing Vat and Time";

            row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
            TableCell cell9 = new TableHeaderCell();



            cell9.Text = "How much Sulphur Dioxide gas put in mixing vat with time";

            row.Cells.Add(cell9);



            t.Rows.AddAt(0, row);
            TableCell cell10 = new TableHeaderCell();



            cell10.Text = "At what time resin lifted from mixing vat to Rest Vat No.";

            row.Cells.Add(cell10);


            TableCell cell11 = new TableHeaderCell();
            cell11.ColumnSpan = 2;
            cell11.Text = "Dirty ";
            row.Cells.Add(cell11);
           

       

            TableCell cell12 = new TableHeaderCell();
        
            cell12.Text = "Vat No. from which charge taken out ";
            row.Cells.Add(cell12);


            t.Rows.AddAt(0, row);
//..............................
            TableCell cellx = new TableHeaderCell();
            cellx.Text = "Charge No. ";
            row.Cells.Add(cellx);          
//................................
            //..............................
            TableCell cellx1 = new TableHeaderCell();
            cellx1.Text = "At what time charge put in the mixing vat ";
            row.Cells.Add(cellx1);
            //................................
            //..............................
            TableCell cellx2 = new TableHeaderCell();
            cellx2.Text = "At what time taken from the mixing vat ";
            row.Cells.Add(cellx2);
            //................................
            //..............................
            TableCell cellx3 = new TableHeaderCell();
            cellx3.Text = "How Mutch Oxalic Acid put in charge ";
            row.Cells.Add(cellx3);
            //................................
            //..............................
            TableCell cellx4 = new TableHeaderCell();
            cellx4.ColumnSpan = 3;
            cellx4.Text = "Rosin Production";
            row.Cells.Add(cellx4);
            //................................
            //..............................
            TableCell cellx5 = new TableHeaderCell();
            cellx5.Text = "Rosin Grade ";
            row.Cells.Add(cellx5);
            //................................
            //..............................
            TableCell cellx6 = new TableHeaderCell();
            cellx6.Text = "Turpentine oil production in Ltrs. including columns No. 21 ";
            row.Cells.Add(cellx6);
            //................................
            //..............................
            TableCell cellx7 = new TableHeaderCell();
            cellx7.Text = "Tank No. in T oil shed in witch Turpentine filled which measured level";
            row.Cells.Add(cellx7);
            //................................
            //..............................
            TableCell cellx8 = new TableHeaderCell();
            cellx8.Text = "How many ltrs. T oil issued to resin party for hand washing";
            row.Cells.Add(cellx8);
            //................................
            //..............................
            TableCell cellx9 = new TableHeaderCell();
            cellx9.Text = "Sakki found from mixing vat";
            cellx9.ColumnSpan = 2;
            row.Cells.Add(cellx9);
            //................................
            //..............................
            TableCell cellx10 = new TableHeaderCell();
            cellx10.Text = "Name of shift workers";
            row.Cells.Add(cellx10);
            //................................
            //..............................
            TableCell cellx11 = new TableHeaderCell();
            cellx11.ColumnSpan = 2;
            cellx11.Text = "How much rosin leak received in shift";
            row.Cells.Add(cellx11);
            //................................
           
            //..............................
            TableCell cellx12 = new TableHeaderCell();
            cellx12.Text = "Remarks";
            row.Cells.Add(cellx12);
            //................................
 
            t.Rows.AddAt(0, row);


           // t1.Rows.AddAt(1, row1);

        

            GridViewRow row1 = new GridViewRow(2, -1, DataControlRowType.Header, DataControlRowState.Normal);
            row1.HorizontalAlign = HorizontalAlign.Center;
            Table t1 = (Table)gv.Controls[0];



            // Adding Cells

            TableCell cc= new TableHeaderCell();

            cc.Text = "";
            cc.ColumnSpan = 2;
            row1.Cells.Add(cc);

        
           
           
            //.............................
            TableCell cc2 = new TableHeaderCell();
            cc2.Text = "Time";
            row1.Cells.Add(cc2);
            //.............................
            
            //.............................
            TableCell cc3 = new TableHeaderCell();
            cc3.Text = "Pressure";
            row1.Cells.Add(cc3);
            //.............................
            //.............................
            TableCell cc4 = new TableHeaderCell();
            cc4.Text = "Time";
            row1.Cells.Add(cc4);
            //.............................
            //.............................
            TableCell cc5 = new TableHeaderCell();
            cc5.Text = "Kgs.";
            row1.Cells.Add(cc5);
            //.............................

            //.............................
            TableCell cc6 = new TableHeaderCell();
            cc6.Text = "No. of tins";
            row1.Cells.Add(cc6);
            //.............................

            TableCell cc00 = new TableHeaderCell();

            cc00.Text = "";
            cc00.ColumnSpan = 7;
            row1.Cells.Add(cc00);

            //.............................
            TableCell cc66 = new TableHeaderCell();
            cc66.Text = "Vat No.";
            row1.Cells.Add(cc66);
            //.............................

            //.............................
            TableCell cc67 = new TableHeaderCell();
            cc67.Text = "Barrel";
            row1.Cells.Add(cc67);
            //.............................



            //.............................
            TableCell cc07 = new TableHeaderCell();
            cc07.ColumnSpan = 5;
            cc07.Text = "";
            row1.Cells.Add(cc07);
            //.............................

            //.............................
            TableCell cc7 = new TableHeaderCell();
            cc7.Text = "Qtls.";
            row1.Cells.Add(cc7);
            //.............................
            //.............................
            TableCell cc8 = new TableHeaderCell();
            cc8.Text = "Kgs";
            row1.Cells.Add(cc8);
            //.............................
            //.............................
            TableCell cc11 = new TableHeaderCell();
            cc11.ColumnSpan = 4;
            cc11.Text = "";
            row1.Cells.Add(cc11);
            //.............................

            //.............................
            TableCell cc12 = new TableHeaderCell();
            cc12.Text = "Qlts.";
            row1.Cells.Add(cc12);
            //.............................

            TableCell cc13 = new TableHeaderCell();
            cc13.Text = "kgs";
            row1.Cells.Add(cc13);
            //.............................
            //.............................
            TableCell cc14 = new TableHeaderCell();
            
            cc11.Text = "";
            row1.Cells.Add(cc14);
            //.............................

            //.............................
            TableCell cc15 = new TableHeaderCell();
            cc15.Text = "Qlts.";
            row1.Cells.Add(cc15);
            //.............................

            TableCell cc16 = new TableHeaderCell();
            cc16.Text = "kgs";
            row1.Cells.Add(cc16);
            //.............................

            //.............................

            TableCell cc17 = new TableHeaderCell();
            cc17.Text = "";
            row1.Cells.Add(cc17);
            //.............................


            //.............................
            TableCell cc9 = new TableHeaderCell();
            cc9.ColumnSpan = 7;
            cc9.Text = "";           
            //.............................
      
            t1.Rows.AddAt(1, row1);

            GridViewRow row3 = new GridViewRow(1, -1, DataControlRowType.Header, DataControlRowState.Normal);
            row3.HorizontalAlign = HorizontalAlign.Center;
            Table t3 = (Table)gv.Controls[0];

          TableCell ee = new TableHeaderCell();
            ee.ColumnSpan = 21;
            ee.Text = "";
            row3.Cells.Add(ee);
            //.............................


            TableCell ee0 = new TableHeaderCell();
            ee0.RowSpan = 2;
            ee0.Text = "No. of T.P. barrels filled";
            row3.Cells.Add(ee0);

            //.............................
            TableCell ee1 = new TableHeaderCell();
            ee1.ColumnSpan = 2;
            ee1.Text = "Weight";
            row3.Cells.Add(ee1);
            //.............................

            //.............................
            TableCell ee2 = new TableHeaderCell();
            ee2.ColumnSpan = 10;
            ee2.Text = "";
            row3.Cells.Add(ee2);
            //.............................
           

            t3.Rows.AddAt(1, row3);
        }
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {

        if (e.CommandName == "view")
        {
            bind();
        }
        if (e.CommandName == "submit")
        {
            string shift, steam_p_time,
at_what_5,
times_6,
how_much_10,
at_what_11,
at_what_15,
at_what_16,
rosin_grade,
name_of_24,
remarks, resin_con_time, putting_7, how_much_9, how_many_8;
            DateTime dt;
            decimal steam_p_press,
            
            resin_con_kgs,
          
        
       
            dirty_vatno,
            dirty_barrel,
            vat_no_13,
            charge_no_14,
            how_murch_17,
            rosin_pro_18_1,
            weight_qtl,
            weight_kgs,
            tur_20,
            tank_21,
            how_many_22,
            sakki_found_qlts,
            sakki_found_kgs,
            how_much_qlts,
            how_much_kgs;

            Int32 resin_con_nooftins;

            dt = Convert.ToDateTime(DateTime.Parse(((TextBox)(GridView1.FooterRow. FindControl("TextBox1"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());


//dt =Convert.ToDateTime(((TextBox)(GridView1.FooterRow.FindControl("TextBox1"))).Text);
shift=((TextBox)(GridView1.FooterRow.FindControl("TextBox2"))).Text;
steam_p_time=((TextBox)(GridView1.FooterRow.FindControl("TextBox3"))).Text;
steam_p_press=Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox4"))).Text);
resin_con_time = ((TextBox)(GridView1.FooterRow.FindControl("TextBox5"))).Text;
resin_con_kgs = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox6"))).Text);
resin_con_nooftins=Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("TextBox7"))).Text);
at_what_5=((TextBox)(GridView1.FooterRow.FindControl("TextBox8"))).Text;
times_6=((TextBox)(GridView1.FooterRow.FindControl("TextBox9"))).Text;
putting_7 = ((TextBox)(GridView1.FooterRow.FindControl("TextBox10"))).Text.ToString();
how_many_8 = ((TextBox)(GridView1.FooterRow.FindControl("TextBox11"))).Text.ToString();
how_much_9 = ((TextBox)(GridView1.FooterRow.FindControl("TextBox12"))).Text.ToString();
how_much_10=((TextBox)(GridView1.FooterRow.FindControl("TextBox13"))).Text;
at_what_11=((TextBox)(GridView1.FooterRow.FindControl("TextBox14"))).Text;
dirty_vatno = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox15"))).Text);
dirty_barrel = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox16"))).Text);
vat_no_13 = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox17"))).Text);
charge_no_14 = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox18"))).Text);
at_what_15=((TextBox)(GridView1.FooterRow.FindControl("TextBox19"))).Text;
at_what_16=((TextBox)(GridView1.FooterRow.FindControl("TextBox20"))).Text;
how_murch_17 = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox21"))).Text);
rosin_pro_18_1 = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox22"))).Text);
weight_qtl = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox23"))).Text);
weight_kgs = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox24"))).Text);
rosin_grade = ((DropDownList)(GridView1.FooterRow.FindControl("DropDownList1"))).SelectedItem.Text ;
tur_20 = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox26"))).Text);
tank_21 = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox27"))).Text);
how_many_22 = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox28"))).Text);
sakki_found_qlts = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox29"))).Text);
sakki_found_kgs = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox30"))).Text);
name_of_24=((TextBox)(GridView1.FooterRow.FindControl("TextBox31"))).Text;
how_much_qlts = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox32"))).Text);
how_much_kgs = Convert.ToDecimal(((TextBox)(GridView1.FooterRow.FindControl("TextBox33"))).Text);
remarks = ((TextBox)(GridView1.FooterRow.FindControl("TextBox34"))).Text;

SqlDataSource1.InsertParameters["dt"].DefaultValue = dt.ToString();
SqlDataSource1.InsertParameters["shift"].DefaultValue = shift.ToString();
SqlDataSource1.InsertParameters["steam_p_time"].DefaultValue = steam_p_time.ToString();
SqlDataSource1.InsertParameters["steam_p_press"].DefaultValue = steam_p_press.ToString();
SqlDataSource1.InsertParameters["resin_con_time"].DefaultValue = resin_con_time.ToString();
SqlDataSource1.InsertParameters["resin_con_kgs"].DefaultValue = resin_con_kgs.ToString();
SqlDataSource1.InsertParameters["resin_con_nooftins"].DefaultValue = resin_con_nooftins.ToString();
SqlDataSource1.InsertParameters["at_what_5"].DefaultValue = at_what_5.ToString();
SqlDataSource1.InsertParameters["times_6"].DefaultValue = times_6.ToString();
SqlDataSource1.InsertParameters["putting_7"].DefaultValue = putting_7.ToString();
SqlDataSource1.InsertParameters["how_many_8"].DefaultValue = how_many_8.ToString();
SqlDataSource1.InsertParameters["how_much_9"].DefaultValue = how_much_9.ToString();
SqlDataSource1.InsertParameters["how_much_10"].DefaultValue = how_much_10.ToString();
SqlDataSource1.InsertParameters["at_what_11"].DefaultValue = at_what_11.ToString();
SqlDataSource1.InsertParameters["dirty_vatno"].DefaultValue = dirty_vatno.ToString();
SqlDataSource1.InsertParameters["dirty_barrel"].DefaultValue = dirty_barrel.ToString();
SqlDataSource1.InsertParameters["vat_no_13"].DefaultValue = vat_no_13.ToString();
SqlDataSource1.InsertParameters["charge_no_14"].DefaultValue = charge_no_14.ToString();
SqlDataSource1.InsertParameters["at_what_15"].DefaultValue = at_what_15.ToString();
SqlDataSource1.InsertParameters["at_what_16"].DefaultValue = at_what_16.ToString();
SqlDataSource1.InsertParameters["how_murch_17"].DefaultValue = how_murch_17.ToString();
SqlDataSource1.InsertParameters["rosin_pro_18_1"].DefaultValue = rosin_pro_18_1.ToString();
SqlDataSource1.InsertParameters["weight_qtl"].DefaultValue = weight_qtl.ToString();
SqlDataSource1.InsertParameters["weight_kgs"].DefaultValue = weight_kgs.ToString();
SqlDataSource1.InsertParameters["rosin_grade"].DefaultValue = rosin_grade.ToString();
SqlDataSource1.InsertParameters["tur_20"].DefaultValue = tur_20.ToString();
SqlDataSource1.InsertParameters["tank_21"].DefaultValue = tank_21.ToString();
SqlDataSource1.InsertParameters["how_many_22"].DefaultValue = how_many_22.ToString();
SqlDataSource1.InsertParameters["sakki_found_qlts"].DefaultValue = sakki_found_qlts.ToString();
SqlDataSource1.InsertParameters["sakki_found_kgs"].DefaultValue = sakki_found_kgs.ToString();
SqlDataSource1.InsertParameters["name_of_24"].DefaultValue = name_of_24.ToString();
SqlDataSource1.InsertParameters["how_much_qlts"].DefaultValue = how_much_qlts.ToString();
SqlDataSource1.InsertParameters["how_much_kgs"].DefaultValue = how_much_kgs.ToString();
SqlDataSource1.InsertParameters["remarks"].DefaultValue = remarks.ToString();
SqlDataSource1.Insert();
//GridView1.DataBind();

	

	
	
        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string des = ((Label)(e.Row.FindControl("label8"))).Text;
            if (des == "ss")
            {
                e.Row.Visible = false;
            }
            else
            {
                e.Row.Visible = true;
            }
        }
    }
}
