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

public partial class fc02 : System.Web.UI.Page
{
    public Int32 r=0;
    public decimal empty_tin_wt;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            bind();
        }
        
            }

    public string pre()
    {
        DateTime dt = DateTime.Now;
        return dt.ToString("dd/MM/yyyy");
    }

    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {

        r = r + 1;
        GridView gv = sender as GridView;
        if (e.Row.RowType == DataControlRowType.Header)
        {
            if (gv.HasControls())
            {
                GridViewRow tr = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Alternate);
                for (short i = 1; i <= 13; ++i)
                {
                    TableCell td = new TableCell();
                    td.Text = i.ToString();
                    tr.Cells.Add(td);
                }
                //((Table)gv.Controls[0]).Rows.Add(tr);
            }

        }
        if (e.Row.RowType == DataControlRowType.DataRow)
        {




            decimal ski_per = 0, net_resin_rec = 0, ski_wt = 0, net_rec = 0;
            string check = ((Label)(e.Row.FindControl("Label61"))).Text.ToString();
            if (check != "")
            {
                ski_wt = Convert.ToDecimal(((Label)(e.Row.FindControl("Label61"))).Text);
                net_resin_rec = Convert.ToDecimal(((Label)(e.Row.FindControl("Label91"))).Text);
                // ski_wt = Math.Round(net_resin_rec * ski_per / 100, 2);
                net_rec = Math.Round(net_resin_rec - ski_wt, 2);
                //((Label)(e.Row.FindControl("Label61"))).Text = ski_wt.ToString();
                ((Label)(e.Row.FindControl("Label62"))).Text = net_rec.ToString();
            }
            else
            {
                //  ((Label)(e.Row.FindControl("Label61"))).Text = "0".ToString();
                ((Label)(e.Row.FindControl("Label62"))).Text = "0".ToString();
            }

        }

        //if ((e.Row.RowState & DataControlRowState.Edit)>0)
        //{
        //    decimal per, wt, net;
        //    per = Convert.ToDecimal(((TextBox)(e.Row.FindControl("TextBox2"))).Text);
        //    wt = Convert.ToDecimal(((TextBox)(e.Row.FindControl("TextBox12"))).Text);

        //    net = Math.Round(((wt * per) / 100), 2);
        //    ((TextBox)(e.Row.FindControl("TextBox9"))).Text = net.ToString();
        //    ((TextBox)(e.Row.FindControl("TextBox18"))).Text = (wt - net).ToString();
        //}
       
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
      Int32  lotno, tindrum, pre;
      decimal g_w_tins_drums, wt_tin_drum, net_wt_resin_ski, ski_wt, per_ski;
      string nm_res, nm_lsm, unit_div, challan, remark;
      DateTime dt;
      pre = Convert.ToInt32(GridView1.DataKeys[e.RowIndex].Value);
      DateTime no = Convert.ToDateTime(DateTime.Parse(((TextBox )(GridView1.Rows[e.RowIndex].FindControl("textbox3"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
      //lotno = Convert.ToInt32(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text);
      string unit = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text;
     // g_w_tins_drums = Convert.ToDecimal(((Label)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text);
      wt_tin_drum = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox11"))).Text);
      net_wt_resin_ski = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox12"))).Text);

   
      
       ski_wt = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox13"))).Text);
      per_ski = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox14"))).Text);
decimal net5;
  net5 = Math.Round(net_wt_resin_ski / 100 * per_ski, 2);
        

    
      dt = Convert.ToDateTime(  DateTime.Parse(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox3"))).Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

      nm_res = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox4"))).Text;
      nm_lsm = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox5"))).Text;
      unit_div = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox15"))).Text;
     remark = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox16"))).Text;
     decimal imp = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox2"))).Text);
     decimal imp1 = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox9"))).Text);
     decimal imp2 = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox18"))).Text);
     decimal imp3 = Convert.ToDecimal(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox20"))).Text);
      
        SqlDataSource1.UpdateParameters["no_fc03"].DefaultValue = no.ToString();
      SqlDataSource1.UpdateParameters["date_fc03"].DefaultValue = dt.ToString();
      SqlDataSource1.UpdateParameters["wt_of_tin_fc03"].DefaultValue = wt_tin_drum.ToString();
      SqlDataSource1.UpdateParameters["sakki_wt_fc03"].DefaultValue = net5.ToString();
      SqlDataSource1.UpdateParameters["saaki_per"].DefaultValue = per_ski.ToString();
      SqlDataSource1.UpdateParameters["name_lsm_name"].DefaultValue = nm_lsm.ToString();
      SqlDataSource1.UpdateParameters["name_lsm_lot"].DefaultValue = ((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text.ToString();
      SqlDataSource1.UpdateParameters["unit_div_fc03"].DefaultValue = unit_div.ToString();
      SqlDataSource1.UpdateParameters["remark"].DefaultValue = remark.ToString();
      SqlDataSource1.UpdateParameters["PreNo"].DefaultValue = pre.ToString();
      SqlDataSource1.UpdateParameters["PreNo1"].DefaultValue = no.ToString();
      SqlDataSource1.UpdateParameters["sakki_tin"].DefaultValue = ski_wt.ToString();
      SqlDataSource1.UpdateParameters["resunit"].DefaultValue = unit.ToString();
    
      SqlDataSource1.UpdateParameters["Impurity"].DefaultValue = imp.ToString();
      SqlDataSource1.UpdateParameters["Impwt"].DefaultValue = imp1.ToString();
      SqlDataSource1.UpdateParameters["net"].DefaultValue = imp2.ToString();
      SqlDataSource1.UpdateParameters["sakki_wt"].DefaultValue = imp3.ToString();

      SqlDataSource1.Update();
      GridView1.DataBind();
    
       
    }
    protected void GridView1_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        string kk = "";
    }
    protected void GridView1_DataBound(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "cal")
        {
           decimal per, wt, net;
           GridViewRow gvRow = (GridViewRow)(((LinkButton)e.CommandSource).NamingContainer);
           per =Convert.ToDecimal(((TextBox)(gvRow.FindControl("TextBox2"))).Text);
           wt = Convert.ToDecimal(((TextBox)(gvRow.FindControl("TextBox12"))).Text);
           net = Math.Round(((wt * per)/100),2);
           ((TextBox)(gvRow.FindControl("TextBox9"))).Text = net.ToString();
           ((TextBox)(gvRow.FindControl("TextBox18"))).Text = (wt-net).ToString();
           

        }
        if (e.CommandName == "cal1")
        {
            decimal per, wt, net;
            GridViewRow gvRow = (GridViewRow)(((LinkButton)e.CommandSource).NamingContainer);
            per = Convert.ToDecimal(((TextBox)(gvRow.FindControl("TextBox14"))).Text);
            wt = Convert.ToDecimal(((TextBox)(gvRow.FindControl("TextBox12"))).Text);
            net = Math.Round(((wt * per) / 100), 2);
            ((TextBox)(gvRow.FindControl("TextBox20"))).Text = net.ToString();
            //((TextBox)(gvRow.FindControl("TextBox18"))).Text = (wt - net).ToString();


        }
        if (e.CommandName=="select1")
        {
            //Label sr = ((Label)(GridView1..Row.FindControl("label55")));
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));

            Int32 rr = 0;
            if (dv.Table.Rows[dv.Table.Rows.Count - 1]["no_fc03"].ToString() != "")
            {
                rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1]["no_fc03"]);
                rr++;
            }
            else
            {
                rr = 101;
            }

            //Label1.Text = rr.ToString();
            //sr.Text = rr.ToString();
        }
    }
    protected void GridView1_RowEditing(object sender, GridViewEditEventArgs e)
    {
        Response.Redirect("report.aspx?code=" + GridView1.DataKeys[e.NewEditIndex].Value);
        
    }
    protected void GridView1_SelectedIndexChanging(object sender, GridViewSelectEventArgs e)
    {
    }
    protected void GridView1_SelectedIndexChanged1(object sender, EventArgs e)
    {
        Response.Redirect("fc03_report.aspx?code=" + GridView1.DataKeys[GridView1.SelectedIndex].Value);

    }

    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {
            GridView gv = sender as GridView;
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);

            Table t = (Table)gv.Controls[0];



            // Adding Cells

            TableCell File = new TableHeaderCell();

            File.Text = "Sr.no";

            row.Cells.Add(File);

            TableCell File1 = new TableHeaderCell();

            File1.Text = "Vehical No.";

            row.Cells.Add(File1);

            TableCell FileDate = new TableHeaderCell();

            FileDate.Text = "Date";

            row.Cells.Add(FileDate);



            TableCell cell = new TableHeaderCell();



            cell.Text = "Challan no. & Date";

            row.Cells.Add(cell);



            t.Rows.AddAt(0, row);



            TableCell cell1 = new TableHeaderCell();



            cell1.Text = "Name of LSM & Lot. No.";

            row.Cells.Add(cell1);



            t.Rows.AddAt(0, row);

            TableCell cell2 = new TableHeaderCell();



            cell2.Text = "Name of the resin unit";

            row.Cells.Add(cell2);



            TableCell cell28 = new TableHeaderCell();



            cell28.Text = "Name of the resin FWD";

            row.Cells.Add(cell28);

            t.Rows.AddAt(0, row);

            TableCell cell3 = new TableHeaderCell();



            cell3.Text = "Weighment ship No. & Date";

            row.Cells.Add(cell3);



            t.Rows.AddAt(0, row);

            TableCell cell4 = new TableHeaderCell();



            cell4.Text = "No. of Tins/Drums";

            row.Cells.Add(cell4);



            t.Rows.AddAt(0, row);

            TableCell cell6 = new TableHeaderCell();



            cell6.Text = "Net Resin received with Sakki (as per weighment slip)";

            row.Cells.Add(cell6);



            TableCell cell68 = new TableHeaderCell();



            cell68.Text = "Weight of Empty tin/drum";

            row.Cells.Add(cell68);

            TableCell cell681 = new TableHeaderCell();



            cell681.Text = "Net Weight With Sakki";

            row.Cells.Add(cell681);


            t.Rows.AddAt(0, row);

            TableCell cell7 = new TableHeaderCell();



            cell7.Text = "Saaki analysis report no. & date";

            row.Cells.Add(cell7);



            t.Rows.AddAt(0, row);
            TableCell cell8 = new TableHeaderCell();



            cell8.Text = "No. of Tins/ Drums taken for Saaki analysis";

            row.Cells.Add(cell8);



            t.Rows.AddAt(0, row);
            TableCell cell9 = new TableHeaderCell();



            cell9.Text = "Saaki(%)";

            row.Cells.Add(cell9);



            t.Rows.AddAt(0, row);
            TableCell cell10 = new TableHeaderCell();



            cell10.Text = "Sakki weight";

            row.Cells.Add(cell10);



            t.Rows.AddAt(0, row);
            TableCell cell11 = new TableHeaderCell();



            cell11.Text = "Net resin after sakki";

            row.Cells.Add(cell11);



            t.Rows.AddAt(0, row);
            TableCell cell12 = new TableHeaderCell();



            cell12.Text = "Remarks";

            row.Cells.Add(cell12);



            t.Rows.AddAt(0, row);



        }
    }
    private void bind()
    {
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv;
        GridView1.DataBind();
    }
    private void bind1()
    {
        if (TextBox19.Text != "")
        {
            DateTime sdate =Convert.ToDateTime( DateTime.Parse(TextBox17.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            DateTime edate =Convert.ToDateTime( DateTime.Parse(TextBox19.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
            
            SqlDataSource3.SelectCommand = "SELECT * FROM [fc01] where date>='"+sdate+"' and date<='"+edate+"' order by date";
            
        }
        else
        {
            DateTime sdate = Convert.ToDateTime(DateTime.Parse(TextBox17.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
           

            SqlDataSource3.SelectCommand = "SELECT * FROM [fc01] where date='" + sdate + "' order by date";
            
        }
        DataView dv1 = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
        GridView1.DataSource = dv1;
        GridView1.DataBind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        bind1();
    }
}
