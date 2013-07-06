using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class broad_level_timber : System.Web.UI.Page
{
    Int32 count555=0;

  decimal vol_sub1=0, amt_sub1=0, rate_sub1=0;
  decimal vol_g1 = 0, amt_g1 = 0, rate_g1 = 0;

  decimal vol_sub2 = 0, amt_sub2 = 0, rate_sub2 = 0;
  decimal vol_g2 = 0, amt_g2 = 0, rate_g2 = 0;

  decimal vol_sub3 = 0, amt_sub3 = 0, rate_sub3 = 0;
  decimal vol_g3 = 0, amt_g3 = 0, rate_g3 = 0;

  decimal vol_sub4 = 0, amt_sub4 = 0, rate_sub4 = 0;
  decimal vol_g4 = 0, amt_g4 = 0, rate_g4 = 0;

  decimal vol_sub5 = 0, amt_sub5 = 0, rate_sub5 = 0;
  decimal vol_g5 = 0, amt_g5 = 0, rate_g5 = 0;

  decimal vol_sub6 = 0, amt_sub6 = 0, rate_sub6 = 0;
  decimal vol_g6 = 0, amt_g6 = 0, rate_g6 = 0;

  //g tot
  decimal gvol_g1 = 0, gamt_g1 = 0, grate_g1 = 0;

  decimal gvol_g2 = 0, gamt_g2 = 0, grate_g2 = 0;

  decimal gvol_g3 = 0, gamt_g3 = 0, grate_g3 = 0;
 
  decimal gvol_g4 = 0, gamt_g4 = 0, grate_g4 = 0;
 
  decimal gvol_g5 = 0, gamt_g5 = 0, grate_g5 = 0;
 
  decimal gvol_g6 = 0, gamt_g6 = 0, grate_g6 = 0;
//endgtot

    decimal vol_tot1=0, amt_tot1=0, rate_tot1=0;
    decimal vol_tot2 = 0, amt_tot2 = 0, rate_tot2 = 0;
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


    public Int32 count=0;

    string err;
    protected void Page_Load(object sender, EventArgs e)
    {

        EnableViewState = true;
       
        if (Page.IsPostBack == false)
        {
            
            ViewState["chk2"] = "";
            ViewState["dt1"] = "";
            ViewState["dt2"] = "";
            ViewState["dt3"] = "1/1/2000";
            ViewState["dt4"] = "";
            ViewState["dt5"] = "";
            ViewState["dt6"] = "1/1/2000";
            yer();
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
            string kk = ((Label)(e.Row.FindControl("srn"))).Text;
            DateTime dd = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);
            dd = dd.AddMonths(-1);
            dd = dd.AddYears(-2);
            DateTime dd5 = Convert.ToDateTime("4/1/" + dd.Year);
           
          
            DateTime  dd4 = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);
            Int32 d = DateTime.DaysInMonth(dd4.Year, dd4.Month);
          dd4 = Convert.ToDateTime(dd4.Month +"/"+ d +"/"+ dd4.Year);
           dd4 = dd4.AddYears(-1);
           dd4 = dd4.AddMonths(-1);
           dd4 = Convert.ToDateTime(dd4.Month + "/" + DateTime.DaysInMonth(dd4.Year, dd4.Month) + "/" + dd4.Year);
            //dd = dd.AddYears(-2);
            //Int32 i = dd.Year;
            //i++;
            ////DateTime dd3;
            //string sdk = "3/31/" + i.ToString();
            //dd3 = Convert.ToDateTime("3/31/" + i);
           DateTime dd6 = dd4.AddMonths(1);
           
            ViewState["dt4"] = dd5.ToString("d");
            ViewState["dt5"] = dd4.ToString("d");
            dd4 = dd4.AddDays(1);
            SqlDataSource5.SelectParameters["first"].DefaultValue = dd5.ToString();
            SqlDataSource5.SelectParameters["second"].DefaultValue = dd4.ToString();
            SqlDataSource5.SelectParameters["spec"].DefaultValue = ((Label)(e.Row.FindControl("srn"))).Text;
            DataView dv2 = (DataView)(SqlDataSource5.Select(DataSourceSelectArguments.Empty));
            if (dv2 != null)
            {

                if (dv2.Table.Rows.Count != 0)
                {
                    decimal v1, v2, v3;
                    v1 = Convert.ToDecimal(dv2.Table.Rows[0]["vol_m3"]);
                    v2 = Convert.ToDecimal(dv2.Table.Rows[0]["sale_bid_amt"]);
                    v3 = Math.Round(v2 / v1, 0);
                    ((Label)(e.Row.FindControl("vol_4"))).Text = dv2.Table.Rows[0]["vol_m3"].ToString();
                    ((Label)(e.Row.FindControl("amt_4"))).Text = dv2.Table.Rows[0]["sale_bid_amt"].ToString();
                    ((Label)(e.Row.FindControl("rate_4"))).Text = v3.ToString();

                    vol_tot2 += Convert.ToDecimal(dv2.Table.Rows[0]["vol_m3"]);
                    amt_tot2 += Convert.ToDecimal(dv2.Table.Rows[0]["sale_bid_amt"]);
                    rate_tot2 += v3;

                    vol_g4 += v1;
                    amt_g4 += v2;
                    rate_g4 += v3;

                    gvol_g4 += v1;
                    gamt_g4 += v2;
                    grate_g4 += v3;

                }
            }

         


            DateTime dd22 = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);
            dd22= dd22.AddYears(-1);         
        
            Int32 m22 = DateTime.DaysInMonth(dd22.Year, dd22.Month);
            DateTime dd222 = Convert.ToDateTime(dd22.Month + "/" + m22 + "/" + dd22.Year);
           
            ViewState["dt6"] = dd222.ToString("d");

            SqlDataSource6.SelectParameters["first"].DefaultValue = dd22.ToString();
            SqlDataSource6.SelectParameters["second"].DefaultValue = dd222.ToString();
            SqlDataSource6.SelectParameters["spec"].DefaultValue = ((Label)(e.Row.FindControl("srn"))).Text;
            SqlDataSource6.DataBind();
            DataView dv = (DataView)(SqlDataSource6.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    decimal v1, v2, v3;
                    v1 = Convert.ToDecimal(dv.Table.Rows[0]["vol_m3"]);
                    v2 = Convert.ToDecimal(dv.Table.Rows[0]["sale_bid_amt"]);
                    v3 = Math.Round(v2 / v1, 0);
                    ((Label)(e.Row.FindControl("vol_5"))).Text = dv.Table.Rows[0]["vol_m3"].ToString();
                    ((Label)(e.Row.FindControl("amt_5"))).Text = dv.Table.Rows[0]["sale_bid_amt"].ToString();
                    ((Label)(e.Row.FindControl("rate_5"))).Text = v3.ToString();

                    vol_g5 += v1;
                    amt_g5 += v2;
                    rate_g5 += v3;

                    gvol_g5 += v1;
                    gamt_g5 += v2;
                    grate_g5 += v3;


                    vol_tot2 += Convert.ToDecimal(dv.Table.Rows[0]["vol_m3"]);
                    amt_tot2 += Convert.ToDecimal(dv.Table.Rows[0]["sale_bid_amt"]);
                    rate_tot2 += v3;
                    ((Label)(e.Row.FindControl("vol_6"))).Text = Math.Round(vol_tot2, 0).ToString();
                    ((Label)(e.Row.FindControl("amt_6"))).Text = Math.Round(amt_tot2, 0).ToString();
                    ((Label)(e.Row.FindControl("rate_6"))).Text = Math.Round(rate_tot2, 0).ToString();

                    vol_g6 += vol_tot2;
                    amt_g6 += amt_tot2;
                    rate_g6 += rate_tot2;

                    gvol_g6 += vol_tot2;
                    gamt_g6 += amt_tot2;
                    grate_g6 += rate_tot2;

                    vol_tot2 = 0;
                    amt_tot2 = 0;
                    rate_tot2 = 0;


                }
                else
                {
                    ((Label)(e.Row.FindControl("vol_6"))).Text = Math.Round(vol_tot2, 0).ToString();
                    ((Label)(e.Row.FindControl("amt_6"))).Text = Math.Round(amt_tot2, 0).ToString();
                    ((Label)(e.Row.FindControl("rate_6"))).Text = Math.Round(rate_tot2, 0).ToString();

                    vol_g6 += vol_tot2;
                    amt_g6 += amt_tot2;
                    rate_g6 += rate_tot2;

                    gvol_g6 += vol_tot2;
                    gamt_g6 += amt_tot2;
                    grate_g6 += rate_tot2;
                    
                    vol_tot2 = 0;
                    amt_tot2 = 0;
                    rate_tot2 = 0;
                }
            }



        }

        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            


            string kk = ((Label)(e.Row.FindControl("srn"))).Text;

             DateTime dd = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);        
        dd = dd.AddMonths(-1);
            Int32 d = DateTime.DaysInMonth(dd.Year, dd.Month);
            dd = Convert.ToDateTime(dd.Month + "/"+d+"/" + dd.Year);
            
            DateTime dd3 = Convert.ToDateTime("4/1/" + Convert.ToInt32(dd.Year - 1));
            DateTime dd2 = dd.AddYears(-1);

            ViewState["dt1"] = dd3.ToString("d");
            ViewState["dt2"] = dd.ToString("d");
           
            DateTime dt3 = dd.AddMonths(1);
            dt3 = Convert.ToDateTime(dt3.Month + "/" + DateTime.DaysInMonth(dt3.Year, dt3.Month) + "/" + dt3.Year);
            ViewState["dt3"] = dt3.ToString("d");

            SqlDataSource1.SelectParameters["first"].DefaultValue = dd3.ToString();
            SqlDataSource1.SelectParameters["second"].DefaultValue = dd.ToString();
            SqlDataSource1.SelectParameters["spec"].DefaultValue = ((Label)(e.Row.FindControl("srn"))).Text;
             DataView dv2 = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
             if (dv2 != null)
             {
            
                 if (dv2.Table.Rows.Count != 0)
                 {
                     decimal v1, v2, v3;
                     v1 = Convert.ToDecimal(dv2.Table.Rows[0]["vol_m3"]);
                     v2 = Convert.ToDecimal(dv2.Table.Rows[0]["sale_bid_amt"]);
                     v3 = Math.Round(v2 / v1, 0);
                     ((Label)(e.Row.FindControl("vol11"))).Text = dv2.Table.Rows[0]["vol_m3"].ToString();
                     ((Label)(e.Row.FindControl("amt11"))).Text = dv2.Table.Rows[0]["sale_bid_amt"].ToString();
                     ((Label)(e.Row.FindControl("rate11"))).Text = v3.ToString();

                     vol_tot1 += Convert.ToDecimal(dv2.Table.Rows[0]["vol_m3"]);
                     amt_tot1 += Convert.ToDecimal(dv2.Table.Rows[0]["sale_bid_amt"]);
                     rate_tot1 += v3;

                     vol_g1 += v1;
                     amt_g1 += v2;
                     rate_g1 += v3;

                     gvol_g1 += v1;
                     gamt_g1 += v2;
                     grate_g1 += v3;





                 }
             }





            //decimal vv1, vv2, vv3;
            //vv1 = Convert.ToDecimal(((Label)(e.Row.FindControl("lot_no"))).Text);
            //vv2 = Convert.ToDecimal(((Label)(e.Row.FindControl("stack"))).Text);
            //vv3 = Math.Round(vv2 / vv1, 0);
            //((Label)(e.Row.FindControl("size"))).Text = vv3.ToString();


            DateTime dd22 = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);
            //dd = dd.AddMonths(1);
            Int32 m22 = DateTime.DaysInMonth(dd22.Year, dd22.Month);
            DateTime dd222 = Convert.ToDateTime(dd22.Month + "/"+m22+"/" + DropDownList2.SelectedValue);

           

            SqlDataSource3.SelectParameters["first"].DefaultValue = dd22.ToString();
            SqlDataSource3.SelectParameters["second"].DefaultValue = dd222.ToString();
            SqlDataSource3.SelectParameters["spec"].DefaultValue = ((Label)(e.Row.FindControl("srn"))).Text;
            SqlDataSource3.DataBind();
            DataView dv = (DataView)(SqlDataSource3.Select(DataSourceSelectArguments.Empty));
            if (dv != null)
            {
                if (dv.Table.Rows.Count != 0)
                {
                    decimal v1, v2, v3;
                    v1 = Convert.ToDecimal(dv.Table.Rows[0]["vol_m3"]);
                    v2 = Convert.ToDecimal(dv.Table.Rows[0]["sale_bid_amt"]);
                    v3 = Math.Round(v2 / v1, 0);
                    ((Label)(e.Row.FindControl("vol_2"))).Text = dv.Table.Rows[0]["vol_m3"].ToString();
                    ((Label)(e.Row.FindControl("amt_2"))).Text = dv.Table.Rows[0]["sale_bid_amt"].ToString();
                    ((Label)(e.Row.FindControl("rate_2"))).Text = v3.ToString();
                  
                    vol_tot1 += Convert.ToDecimal(dv.Table.Rows[0]["vol_m3"]);
                    amt_tot1 += Convert.ToDecimal(dv.Table.Rows[0]["sale_bid_amt"]);
                    rate_tot1 += v3;

                    gvol_g2 += v1;
                    gamt_g2 += v2;
                    grate_g2 += v3;

                    ((Label)(e.Row.FindControl("vol_3"))).Text = Math.Round(vol_tot1, 0).ToString();
                    ((Label)(e.Row.FindControl("amt_3"))).Text = Math.Round(amt_tot1, 0).ToString();
                    ((Label)(e.Row.FindControl("rate_3"))).Text = Math.Round(rate_tot1, 0).ToString();


                    vol_g3 += vol_tot1;
                    amt_g3 += amt_tot1;
                    rate_g3 += rate_tot1;

                    gvol_g3 += v1;
                    gamt_g3 += v2;
                    grate_g3 += v3;

                    vol_tot1 = 0;
                    amt_tot1 = 0;
                    rate_tot1 = 0;

                    vol_g2 += v1;
                    amt_g2 += v2;
                    rate_g2 += v3;



                }
                else
                {
                    ((Label)(e.Row.FindControl("vol_3"))).Text = Math.Round(vol_tot1, 0).ToString();
                    ((Label)(e.Row.FindControl("amt_3"))).Text = Math.Round(amt_tot1, 0).ToString();
                    ((Label)(e.Row.FindControl("rate_3"))).Text = Math.Round(rate_tot1, 0).ToString();

                    vol_g3 += vol_tot1;
                    amt_g3 += amt_tot1;
                    rate_g3 += rate_tot1;

                    gvol_g3 += vol_tot1;
                    gamt_g3 += amt_tot1;
                    grate_g3 += rate_tot1;

                    vol_tot1 = 0;
                    amt_tot1 = 0;
                    rate_tot1 = 0;
                }
            }


        }
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            //count++;
            //((Label)(e.Row.FindControl("srn"))).Text = count.ToString();
        }


        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            //hsd = DataBinder.Eval(e.Row.DataItem, "categ").ToString();
            strPreviousRowID = DataBinder.Eval(e.Row.DataItem, "categ").ToString();
            ViewState["chk2"] = DataBinder.Eval(e.Row.DataItem, "categ").ToString();
            //double dblUnitPrice = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "vol_m3").ToString());
            //double dblQuantity = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "sale_bid_amt").ToString());
            ////double dblDiscount = Convert.ToDouble(DataBinder.Eval(e.Row.DataItem, "bid_avg").ToString());
           

            //// Cumulating Sub Total
            //dblSubTotalUnitPrice += dblUnitPrice;
            //dblSubTotalQuantity += dblQuantity;
            ////dblSubTotalDiscount += dblDiscount;
           

            //// Cumulating Grand Total
            //dblGrandTotalUnitPrice += dblUnitPrice;
            //dblGrandTotalQuantity += dblQuantity;
            ////dblGrandTotalDiscount += dblDiscount;
            
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
            size= ((DropDownList)(GridView1.FooterRow.FindControl("size"))).Text;
            no = ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text;
            vol = ((TextBox)(GridView1.FooterRow.FindControl("vol"))).Text;
            ctt = ((TextBox)(GridView1.FooterRow.FindControl("ctt"))).Text;
            remarks = ((TextBox)(GridView1.FooterRow.FindControl("remarks"))).Text;
            name_party = ((TextBox)(GridView1.FooterRow.FindControl("name_party"))).Text;
            bid = ((TextBox)(GridView1.FooterRow.FindControl("bid"))).Text;
            

            SqlDataSource1.InsertParameters["challan_no"].DefaultValue = chl.SelectedItem.Text.ToString();
            DateTime dd = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);
            SqlDataSource1.InsertParameters["date"].DefaultValue = dd.ToString();
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
  
    protected void GridView1_RowCreated(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Header)
        {



            //GridView gv55 = sender as GridView;
            //GridViewRow row55 = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);
            //Table t55 = (Table)gv55.Controls[0];
            //TableCell cell55 = new TableHeaderCell();
            //cell55.Text = "Species";
            //cell55.RowSpan = 1;
            //row55.Cells.Add(cell55);

            //t55.Rows.AddAt(0, row55);
          




            GridView gv = sender as GridView;        
            GridViewRow row = new GridViewRow(0, -1, DataControlRowType.Header, DataControlRowState.Normal);   
            Table t = (Table)gv.Controls[0];
            TableCell cell1 = new TableHeaderCell();
            cell1.Text = "Species";
            cell1.RowSpan = 1;          
            row.Cells.Add(cell1);
            TableCell cell2 = new TableHeaderCell();
            cell2.Text = "Previous volume sold w.e.f. "+ViewState["dt1"].ToString()+" to "+ViewState["dt2"].ToString();
            row.Cells.Add(cell2);
            cell2.ColumnSpan = 3;
            TableCell cell3 = new TableHeaderCell();
            cell3.Text = "Current volume sold during "+Convert.ToDateTime(ViewState["dt3"]).ToString("MMM-yyyy");
            cell3.ColumnSpan = 3;
            row.Cells.Add(cell3);
            TableCell cell4 = new TableHeaderCell();
            cell4.Text = "Total upto " + ViewState["dt3"].ToString();
            cell4.ColumnSpan = 3;
            row.Cells.Add(cell4);
            TableCell cell5 = new TableHeaderCell();
            cell5.Text = "Previous volume sold w.e.f. " + ViewState["dt4"].ToString() + " to " + ViewState["dt5"].ToString();
            cell5.ColumnSpan = 3;
            row.Cells.Add(cell5);
            TableCell cell6 = new TableHeaderCell();
            cell6.Text = "Current volume sold during " + Convert.ToDateTime(ViewState["dt6"]).ToString("MMM-yyyy");
            cell6.ColumnSpan = 3;
            row.Cells.Add(cell6);
            TableCell cell7 = new TableHeaderCell();
            cell7.Text = "Total upto " + ViewState["dt6"].ToString();
            cell7.ColumnSpan = 3;
            row.Cells.Add(cell7);             
            t.Rows.AddAt(0, row);
            Table t8 = (Table)gv.Controls[0];
        }
     

            bool IsSubTotalRowNeedToAdd = false;
            bool IsGrandTotalRowNeedtoAdd = false;

            bool head_t = false;
            if (DataBinder.Eval(e.Row.DataItem, "categ") == null)
        {
            head_t=true;
        }

            //if (DataBinder.Eval(e.Row.DataItem, "categ") != null && ViewState["chk2"].ToString() != "")
            //{

            //    string chk = DataBinder.Eval(e.Row.DataItem, "categ").ToString();
            //    if (ViewState["chk2"].ToString() != chk)
            //    {
            //        IsSubTotalRowNeedToAdd = true;
            //        ViewState["chk2"] = chk.ToString();

            //    }
            //    else
            //    {
            //        ViewState["chk2"] = chk.ToString();
            //    }

            //}
           
            if ((strPreviousRowID != string.Empty) && (DataBinder.Eval(e.Row.DataItem, "categ") != null))
                if (strPreviousRowID != DataBinder.Eval(e.Row.DataItem, "categ").ToString())
                    IsSubTotalRowNeedToAdd = true;
           
            if ((strPreviousRowID != string.Empty) && (DataBinder.Eval(e.Row.DataItem, "categ") == null))
            {
                IsSubTotalRowNeedToAdd = true;
                IsGrandTotalRowNeedtoAdd = true;
                intSubTotalIndex = 1;
               
            }

            #region Getting the first Group Header Text
            if ((strPreviousRowID == string.Empty) && (DataBinder.Eval(e.Row.DataItem, "categ") != null))
                // Getting the First column text of first group
                strGroupHeaderText = DataBinder.Eval(e.Row.DataItem, "categ").ToString();
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

                cell.Text = "Total";

                cell.ColumnSpan = 1;
                cell.CssClass = "SubTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Unit Price Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", vol_g1);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Quantity Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", amt_g1);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Discount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", rate_g1);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Amount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", vol_g2);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", amt_g2);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", rate_g2);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                //Adding Amount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", vol_g3);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", amt_g3);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", rate_g3);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                //Adding Amount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", vol_g4);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", amt_g4);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", rate_g4);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                //Adding Amount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", vol_g5);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", amt_g5);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", rate_g5);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                //Adding Amount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", vol_g6);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", amt_g6);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                cell = new TableCell();
                cell.Text = string.Format("{0:0.00}", rate_g6);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "SubTotalRowStyle";
                //cell.ColumnSpan = 18;
                row.Cells.Add(cell);

                //Adding the Row at the RowIndex position in the Grid


                if (count555 == 0)
                {
                    grdViewOrders.Controls[0].Controls.AddAt(7, row);
                    count555++;
                    vol_g1 = 0;
                    amt_g1 = 0;
                    rate_g1 = 0;
                    vol_g2 = 0;
                    amt_g2 = 0;
                    rate_g2 = 0;
                    vol_g3 = 0;
                    amt_g3 = 0;
                    rate_g3 = 0;
                    vol_g4 = 0;
                    amt_g4 = 0;
                    rate_g4 = 0;
                    vol_g5 = 0;
                    amt_g5 = 0;
                    rate_g5 = 0;
                    vol_g6 = 0;
                    amt_g6 = 0;
                    rate_g6 = 0;
                }
                else
                {

                    grdViewOrders.Controls[0].Controls.AddAt(e.Row.RowIndex, row);
                    vol_g1 = 0;
                    amt_g1 = 0;
                    rate_g1 = 0;
                    vol_g2 = 0;
                    amt_g2 = 0;
                    rate_g2 = 0;
                    vol_g3 = 0;
                    amt_g3 = 0;
                    rate_g3 = 0;
                    vol_g4 = 0;
                    amt_g4 = 0;
                    rate_g4 = 0;
                    vol_g5 = 0;
                    amt_g5 = 0;
                    rate_g5 = 0;
                    vol_g6 = 0;
                    amt_g6 = 0;
                    rate_g6 = 0;
                }
                intSubTotalIndex++;
               
                #endregion

                #region Getting Next Group Header Details
                if (DataBinder.Eval(e.Row.DataItem, "categ") != null)
                    // Once each group completed, getting the first column text of next group.
                    strGroupHeaderText = DataBinder.Eval(e.Row.DataItem, "categ").ToString();
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
                cell.ColumnSpan = 1;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Unit Price Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gvol_g1);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Quantity Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gamt_g1);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Discount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", grate_g1);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Unit Price Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gvol_g2);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Quantity Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gamt_g2);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Discount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", grate_g2);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);
                //Adding Unit Price Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gvol_g3);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Quantity Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gamt_g3);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Discount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", grate_g3);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);
                //Adding Unit Price Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gvol_g4);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Quantity Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gamt_g4);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Discount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", grate_g4);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);
                //Adding Unit Price Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gvol_g5);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Quantity Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gamt_g5);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Discount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", grate_g5);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);
                //Adding Unit Price Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gvol_g6);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Quantity Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", gamt_g6);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);

                //Adding Discount Column
                cell = new TableCell();
                cell.Text = string.Format("{0:0.000}", grate_g6);
                cell.HorizontalAlign = HorizontalAlign.Center;
                cell.CssClass = "GrandTotalRowStyle";
                row.Cells.Add(cell);



                //Adding the Row at the RowIndex position in the Grid
                grdViewOrders.Controls[0].Controls.AddAt(e.Row.RowIndex, row);
                count555 = 0;
                #endregion
            }

    }
  
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        DateTime dd = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);
        Label2.Text = "Monthly sale return of Corporation timber sold in open auction during the month of " + dd.ToString("MMMM, yyyy") + " compared with similar figures of corresponding month of " + dd.ToString("MMMM, yyyy");
        //ViewState["chk2"] = "";
        //ViewState["dt1"] = "";
        //ViewState["dt2"] = "";
        //ViewState["dt3"] = "1/1/2000";
        //ViewState["dt4"] = "";
        //ViewState["dt5"] = "";
        //ViewState["dt6"] = "1/1/2000";
        //DateTime dd = Convert.ToDateTime(DropDownList1.SelectedValue + "/1/" + DropDownList2.SelectedValue);        
        //dd = dd.AddMonths(-1);
        //    Int32 d = DateTime.DaysInMonth(dd.Year, dd.Month);
        //    dd = Convert.ToDateTime(dd.Month + "/"+d+"/" + dd.Year);
            
        //    DateTime dd3 = Convert.ToDateTime("4/1/" + Convert.ToInt32(dd.Year - 1));
        //    DateTime dd2 = dd.AddYears(-1);

        //    ViewState["dt1"] = dd3.ToString("d");
        //    ViewState["dt2"] = dd.ToString("d");
           
        //    DateTime dt3 = dd.AddMonths(1);
        //    dt3 = Convert.ToDateTime(dt3.Month + "/" + DateTime.DaysInMonth(dt3.Year, dt3.Month) + "/" + dt3.Year);
        //    ViewState["dt3"] = dt3.ToString("d");

        //    SqlDataSource1.SelectParameters["first"].DefaultValue = dd3.ToString();
        //    SqlDataSource1.SelectParameters["second"].DefaultValue = dd.ToString();
        //    GridView1.DataSource = SqlDataSource1;
        GridView1.DataSource = null;
        GridView1.DataBind();
        GridView1.DataSource = spec_data;
        GridView1.DataBind();
        
        
       
      
     
    }
    protected void TextBox1_TextChanged(object sender, EventArgs e)
    {

    }
    private void yer()
    {
        DateTime live = DateTime.Now;
        Int32 y = live.Year;
        Int32 ct = y - 5;
        Int32 i;
        for (i = ct; i < y + 5; i++)
        {
            if (i == y)
            {
                DropDownList2.Items.Add(i.ToString());
                DropDownList2.Items.FindByText(i.ToString()).Selected = true;
            }
            else
            {
                DropDownList2.Items.Add(i.ToString());
            }

        }
    }
    protected void GridView2_RowCreated(object sender, GridViewRowEventArgs e)
    {

    }
}