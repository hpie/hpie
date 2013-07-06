using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
public partial class auc_cal : System.Web.UI.Page
{

    string hsd = string.Empty;
    // To keep track of the previous row Group Identifier
    string strPreviousRowID = string.Empty;
    // To keep track the Index of Group Total
    int intSubTotalIndex = 1;

    string strGroupHeaderText = string.Empty;

    // To temporarily store Sub Total
    double dblSubTotalUnitPrice = 0;
    double dblSubTotalQuantity = 0;
    double dblSubTotalDiscount = 0;
    double dblSubTotalAmount = 0;

    // To temporarily store Grand Total
    double dblGrandTotalUnitPrice = 0;
    double dblGrandTotalQuantity = 0;
    double dblGrandTotalDiscount = 0;
    double dblGrandTotalAmount = 0;

    double rate = 0;
    double bid_amt = 0;
    double avr_rate = 0;
    double avr_bid = 0;
    double f_f_amt = 0;
    double f_bid_amt = 0;


    double rate_g = 0;
    double bid_amt_g = 0;
    double avr_rate_g = 0;
    double avr_bid_g = 0;
    double f_f_amt_g = 0;
    double f_bid_amt_g = 0;

    public Int32 count = 0;

    string err;
    protected void Page_Load(object sender, EventArgs e)
    {

        EnableViewState = true;

        if (Page.IsPostBack == false)
        {

            //try
            //{

            if (Request.QueryString["chl"] != null)
            {

                SqlDataSource1.SelectParameters["challan_no"].DefaultValue = Request.QueryString["chl"].ToString();
                err = "";
                DropDownList1.DataBind();
                SqlDataSource1.DataBind();
                DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
                if (dv.Table.Rows.Count != 0)
                {
                    GridView1.DataSource = SqlDataSource1;
                    GridView1.DataBind();
                }
                else
                {
                    //bnk();
                }
            }


            //}
            //catch
            //{
            //    //bnk();

            //}

        }

    }
    private void bnk()
    {
        Session.Remove("dts");

        DataTable tb = new DataTable();
        tb.Columns.Add(new DataColumn("challan_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("lot_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("stack", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("size", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
        //tb.Columns.Add(new DataColumn("total_vol", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("ctt", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("remarks", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("name_party", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("bid", Type.GetType("System.String")));



        DataRow r;
        r = tb.NewRow();

        r[4] = "0";
        r[5] = "0";
        r[6] = "0";
        tb.Rows.Add(r);
        GridView1.DataSource = tb;
        GridView1.DataBind();
        GridView1.Rows[0].Visible = false;
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {

        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            if (count == 0)
            {
                count = 1;
            }
            else
            {
                count++;
            }

            ((Label)(e.Row.FindControl("srn"))).Text = count.ToString();

            decimal no;
            decimal f_rate, a_prc;
            no = Convert.ToInt32(((Label)(e.Row.FindControl("no"))).Text);
            f_rate =Math.Round(Convert.ToDecimal(((Label)(e.Row.FindControl("avr_prc"))).Text),0);
            a_prc = Math.Round(Convert.ToDecimal(((Label)(e.Row.FindControl("bid_avr"))).Text), 0);

            ((Label)(e.Row.FindControl("floor_amt"))).Text = (f_rate * no).ToString();
            ((Label)(e.Row.FindControl("bid_amt"))).Text = (a_prc * no).ToString();



        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            count++;
            ((Label)(e.Row.FindControl("srn"))).Text = count.ToString();
        }


        if (e.Row.RowType == DataControlRowType.DataRow)
        {

            decimal no;
            decimal f_rate, a_prc;
            no = Convert.ToInt32(((Label)(e.Row.FindControl("no"))).Text);
            f_rate = Math.Round(Convert.ToDecimal(((Label)(e.Row.FindControl("avr_prc"))).Text), 0);
            a_prc = Math.Round(Convert.ToDecimal(((Label)(e.Row.FindControl("bid_avr"))).Text), 0);

            ((Label)(e.Row.FindControl("floor_amt"))).Text = (f_rate * no).ToString();
            ((Label)(e.Row.FindControl("bid_amt"))).Text = (a_prc * no).ToString();



            hsd = DataBinder.Eval(e.Row.DataItem, "hsd_lot_no").ToString();
            strPreviousRowID = DataBinder.Eval(e.Row.DataItem, "hsd_lot_no").ToString();

            double dblUnitPrice = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "as_per_no").ToString());
            //double dblQuantity = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "as_per_vol").ToString());


            double rate1 = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "rate").ToString());
            double bid_amt1 = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "bid_amt").ToString());
            double avr_rate1 = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "average").ToString());
            double avr_bid1 = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "bid_avg").ToString());

            double f_f_amt1 = Convert.ToDouble(f_rate * no);
            double f_bid_amt1 = Convert.ToDouble(a_prc * no);
           
            //   double dblDiscount = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "ctt").ToString());


            // Cumulating Sub Total
            dblSubTotalUnitPrice += dblUnitPrice;
            //dblSubTotalQuantity += dblQuantity;
            //dblSubTotalDiscount += dblDiscount;


            // Cumulating Grand Total
            dblGrandTotalUnitPrice += dblUnitPrice;
            //dblGrandTotalQuantity += dblQuantity;
            // dblGrandTotalDiscount += dblDiscount;


            rate += rate1;
            bid_amt += bid_amt1;
            avr_rate += avr_rate1;
            avr_bid += avr_bid1;
            f_f_amt += f_f_amt1;
            f_bid_amt += f_bid_amt1;


            rate_g += rate1;
            bid_amt_g += bid_amt1;
            avr_rate_g += avr_rate1;
            avr_bid_g += avr_bid1;
            f_f_amt_g += f_f_amt1;
            f_bid_amt_g += f_bid_amt1;


        }
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "insert")
        {
            string lot_no, stack, size, no, vol, ctt, remarks, name_party, bid;
            DropDownList chl = ((DropDownList)(GridView1.FooterRow.FindControl("chl")));
            lot_no = ((TextBox)(GridView1.FooterRow.FindControl("lot_no"))).Text;
            stack = ((TextBox)(GridView1.FooterRow.FindControl("stack_no"))).Text;
            size = ((DropDownList)(GridView1.FooterRow.FindControl("size"))).Text;
            no = ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text;
            vol = ((TextBox)(GridView1.FooterRow.FindControl("vol"))).Text;
            ctt = ((TextBox)(GridView1.FooterRow.FindControl("ctt"))).Text;
            remarks = ((TextBox)(GridView1.FooterRow.FindControl("remarks"))).Text;
            name_party = ((TextBox)(GridView1.FooterRow.FindControl("name_party"))).Text;
            bid = ((TextBox)(GridView1.FooterRow.FindControl("bid"))).Text;


            SqlDataSource1.InsertParameters["challan_no"].DefaultValue = chl.SelectedItem.Text.ToString();
            SqlDataSource1.InsertParameters["date"].DefaultValue = TextBox1.Text.ToString();
            SqlDataSource1.InsertParameters["stack"].DefaultValue = stack.ToString();
            SqlDataSource1.InsertParameters["lot_no"].DefaultValue = lot_no.ToString();
            SqlDataSource1.InsertParameters["size"].DefaultValue = size.ToString();
            SqlDataSource1.InsertParameters["no"].DefaultValue = no;
            SqlDataSource1.InsertParameters["vol"].DefaultValue = vol.ToString();
            SqlDataSource1.InsertParameters["ctt"].DefaultValue = ctt.ToString();
            SqlDataSource1.InsertParameters["remarks"].DefaultValue = remarks.ToString();
            SqlDataSource1.InsertParameters["bid"].DefaultValue = bid.ToString();
            SqlDataSource1.InsertParameters["name_party"].DefaultValue = name_party.ToString();

            SqlDataSource1.Insert();
            GridView1.DataSource = SqlDataSource1;
            GridView1.DataBind();
            bnk();
        }
    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        try
        {
            Label1.Text = TextBox1.Text.ToString();
            //Page.EnableViewState = false;
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count != 0)
            {

                GridView1.DataSource = SqlDataSource1;
                GridView1.DataBind();
            }
            else
            {
                //bnk();
            }

        }
        catch (Exception x)
        {
            //  bnk();

        }

    }
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {


        bool IsSubTotalRowNeedToAdd = false;
        bool IsGrandTotalRowNeedtoAdd = false;

        bool head_t = false;
        if (DataBinder.Eval(e.Row.DataItem, "hsd_lot_no") == null)
        {
            head_t = true;
        }


        if ((strPreviousRowID != string.Empty) && (DataBinder.Eval(e.Row.DataItem, "hsd_lot_no") != null))
            if (strPreviousRowID != DataBinder.Eval(e.Row.DataItem, "hsd_lot_no").ToString())
                IsSubTotalRowNeedToAdd = true;

        if ((strPreviousRowID != string.Empty) && (DataBinder.Eval(e.Row.DataItem, "hsd_lot_no") == null))
        {
            IsSubTotalRowNeedToAdd = true;
            IsGrandTotalRowNeedtoAdd = true;
            intSubTotalIndex = 0;
        }

        #region Getting the first Group Header Text
        if ((strPreviousRowID == string.Empty) && (DataBinder.Eval(e.Row.DataItem, "hsd_lot_no") != null))
            // Getting the First column text of first group
            strGroupHeaderText = DataBinder.Eval(e.Row.DataItem, "hsd_lot_no").ToString();
        #endregion





        if (IsSubTotalRowNeedToAdd)
        {

            #region Adding Sub Total Row
            GridView grdViewOrders = (GridView)sender;

            // Creating a Row
            GridViewRow row = new GridViewRow(0, 0, DataControlRowType.DataRow, DataControlRowState.Insert);

            //Adding Total Cell 
            TableCell cell = new TableCell();
            // Displaying the Group Total First Column Text here.
            // This value can be decided when assigning strGroupHeaderText variable value.
            // cell.Text = strGroupHeaderText;
            cell.HorizontalAlign = HorizontalAlign.Right;

            cell.Text = "HSD Lot No:  " + hsd.ToString();

            cell.ColumnSpan = 4;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);

           

            //Adding Quantity Column
            cell = new TableCell();
            cell.Text = string.Format("{0:0.00}", "");
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);

            //Adding Unit Price Column
            cell = new TableCell();
            cell.Text = string.Format("{0:0.00}", dblSubTotalUnitPrice);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);

            //Adding Quantity Column
            //cell = new TableCell();
            //cell.Text = string.Format("{0:0.000}", bid_amt);
            //cell.HorizontalAlign = HorizontalAlign.Center;
            //cell.CssClass = "SubTotalRowStyle";
            //row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", rate);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", avr_rate);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", avr_bid);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", f_f_amt);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);
            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", f_bid_amt);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "SubTotalRowStyle";
            row.Cells.Add(cell);


            //Adding the Row at the RowIndex position in the Grid
            grdViewOrders.Controls[0].Controls.AddAt(e.Row.RowIndex + intSubTotalIndex, row);
            intSubTotalIndex++;
            #endregion

            #region Getting Next Group Header Details
            if (DataBinder.Eval(e.Row.DataItem, "hsd_lot_no") != null)
                // Once each group completed, getting the first column text of next group.
                strGroupHeaderText = DataBinder.Eval(e.Row.DataItem, "hsd_lot_no").ToString();
            #endregion

            #region Reseting the Sub Total Variables
            dblSubTotalUnitPrice = 0;
            dblSubTotalQuantity = 0;
            dblSubTotalDiscount = 0;
            dblSubTotalAmount = 0;
            #endregion
        }
        if (IsGrandTotalRowNeedtoAdd)
        {
            #region Grand Total Row
            GridView grdViewOrders = (GridView)sender;

            // Creating a Row
            GridViewRow row = new GridViewRow(0, 0, DataControlRowType.DataRow, DataControlRowState.Insert);

            //Adding Total Cell 
            TableCell cell = new TableCell();
            cell.Text = "Grand Total";
            cell.HorizontalAlign = HorizontalAlign.Right;
            cell.ColumnSpan = 4;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);

            //Adding Quantity Column
            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", "");
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);


            //Adding Unit Price Column
            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", dblGrandTotalUnitPrice);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);


            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", "");
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
           
  
         
           

            //Adding Quantity Column
            //cell = new TableCell();
            //cell.Text = string.Format("{0:0.000}", bid_amt_g);
            //cell.HorizontalAlign = HorizontalAlign.Center;
            //cell.CssClass = "GrandTotalRowStyle";
            //row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", rate_g);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", avr_rate_g);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", avr_bid_g);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);

            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", f_f_amt_g);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);
            cell = new TableCell();
            cell.Text = string.Format("{0:0.000}", f_bid_amt_g);
            cell.HorizontalAlign = HorizontalAlign.Center;
            cell.CssClass = "GrandTotalRowStyle";
            row.Cells.Add(cell);

          



            //Adding the Row at the RowIndex position in the Grid
            grdViewOrders.Controls[0].Controls.AddAt(e.Row.RowIndex, row);
            #endregion
        }

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Redirect("broad_level_timber_add.aspx");
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        //try
        //{
            Label3.Text = "";
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                Label2.Text = dv.Table.Rows[0]["bid_amt"].ToString();
                Label1.Text = Convert.ToDateTime(TextBox1.Text).ToString("D");
                GridView1.DataSource = SqlDataSource1;
                GridView1.DataBind();
            }
        //}
        //catch(Exception ex)
        //{
        //    Label3.Text = ex.Message.ToString();
        //}
    }
    protected void TextBox1_TextChanged(object sender, EventArgs e)
    {

    }
}