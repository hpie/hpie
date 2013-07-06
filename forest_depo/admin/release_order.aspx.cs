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
using System.Data;
using System.Data.SqlClient;

public partial class release_order : System.Web.UI.Page
{
    Int32 dl;
    Int32 i;
    decimal tot;
   public decimal vol_c=0, vol_t=0;
   public Int32 no_c=0, no_t=0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
        {
            ViewState["tot2"] = "0.00".ToString();
            Session.Remove("dt6");
        }
    }
    private void bb()
    {
        try
        {
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count != 0)
            {
                Int32 ii;
                for (ii = 0; ii < dv.Table.Rows.Count; ii++)
                {
                    i = Convert.ToInt32(dv.Table.Rows[ii][1]);
                }
                i++;
                no.Text = i.ToString();
            }
            else
            {
                no.Text = "101".ToString();
            }
        }
        catch
        {
            no.Text = "101".ToString();
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        decimal discount2, less_discount2, tds2, vat2, market_fee2;
        decimal discount1, less_discount1, tds1, vat1, market_fee1, net_amt1=0;
        Int32 r;
        for (r = 1; r < GridView1.Rows.Count; r++)
        {
            net_amt1 = Math.Round(net_amt1 + Convert.ToDecimal(((Label)(GridView1.Rows[r].FindControl("amt"))).Text), 2);
        }


        
        discount1 = Convert.ToDecimal(discount.Text);
        less_discount1 = Convert.ToDecimal(less_discount.Text);
        tds1 = Convert.ToDecimal(tds.Text);
        vat1 = Convert.ToDecimal(vat.Text);
        market_fee1 = Convert.ToDecimal(market_fee.Text);

        discount2 = Math.Round(net_amt1-discount1, 2);
       

        less_discount2 = Math.Round((net_amt1 / 100) * less_discount1, 2);
        net_amt1 = Math.Round(net_amt1 - less_discount2, 2);

        tds2 = Math.Round((net_amt1 / 100) * tds1, 2);
        net_amt1 = Math.Round(net_amt1 + tds2, 2);

        vat2 = Math.Round((net_amt1 / 100) * vat1, 2);
        net_amt1 = Math.Round(net_amt1 + vat2, 2);

        market_fee2 = Math.Round((net_amt1 / 100) * market_fee1, 2);
        net_amt1 = Math.Round(net_amt1 + market_fee2, 2);






        if (ViewState["dl"].ToString() == "del")
        {
            DataTable tb = (DataTable)(Session["dt6"]);
            tb.Rows.RemoveAt(0);
            ViewState["dl"] = "none".ToString();
        }
        Int32 i;
        for (i = 1; i < GridView1.Rows.Count; i++)
        {

            SqlDataSource1.InsertParameters["discount1"].DefaultValue = discount2.ToString();
            SqlDataSource1.InsertParameters["less_dis1"].DefaultValue = less_discount2.ToString();
            SqlDataSource1.InsertParameters["tds1"].DefaultValue = tds2.ToString();
            SqlDataSource1.InsertParameters["vat1"].DefaultValue = vat2.ToString();
            SqlDataSource1.InsertParameters["market_fee1"].DefaultValue = market_fee2.ToString();

            string ss = ((Label)(GridView1.Rows[i].FindControl("rate"))).Text.ToString();
            SqlDataSource1.InsertParameters["lot_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("lot_no"))).Text.ToString();
            SqlDataSource1.InsertParameters["stack_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("stack_no"))).Text.ToString();
            SqlDataSource1.InsertParameters["des_spp"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text.ToString();
            SqlDataSource1.InsertParameters["des_size"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size_type"))).Text.ToString();
            SqlDataSource1.InsertParameters["no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("no"))).Text.ToString();
            SqlDataSource1.InsertParameters["vol"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("vol"))).Text.ToString();
            SqlDataSource1.InsertParameters["rate"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("rate"))).Text.ToString();
            SqlDataSource1.InsertParameters["amt"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("amt"))).Text.ToString();
            SqlDataSource1.InsertParameters["floor_rate"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("floor_rate"))).Text.ToString();
            SqlDataSource1.InsertParameters["net_amt"].DefaultValue = net_amt1.ToString();




            SqlDataSource1.Insert();

            string lot_e, stack_e, spec_e, size_type_e;
            lot_e = ((Label)(GridView1.Rows[i].FindControl("lot_no"))).Text.ToString();
            stack_e = ((Label)(GridView1.Rows[i].FindControl("stack_no"))).Text.ToString();
            spec_e = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text.ToString();
            size_type_e = ((Label)(GridView1.Rows[i].FindControl("size_type"))).Text.ToString();

            string qry = "select * from tally_sheet WHERE (([name_purchaser] = '" + name_purchaser.SelectedItem.Text + "') AND ([auction_date] = '" + DropDownList2.SelectedItem.Text + "')and (hsd_lot_no='" + lot_e + "') and (stack='" + stack_e + "') and (spec='" + spec_e + "')and (size_type='" + size_type_e + "'))";
            SqlDataAdapter adp = new SqlDataAdapter(qry, ConfigurationManager.ConnectionStrings["forest_depoConnectionString"].ConnectionString);
            DataSet sd = new System.Data.DataSet();
            adp.Fill(sd);
            if (sd.Tables[0].Rows.Count != 0)
            {

                Int32 i2;
                Int32 count = Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("no"))).Text);
                for (i2 = 0; i2 < count; i2++)
                {
                    string code = sd.Tables[0].Rows[i2]["code"].ToString();
                    SqlDataSource_main.UpdateParameters["code"].DefaultValue = code;
                    //SqlDataSource_main.UpdateParameters["hsd_lot_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("lot_no"))).Text.ToString();
                    //SqlDataSource_main.UpdateParameters["stack"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("stack_no"))).Text.ToString();
                    //SqlDataSource_main.UpdateParameters["spec"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text.ToString();
                    //SqlDataSource_main.UpdateParameters["size_type"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size_type"))).Text.ToString();
                    SqlDataSource_main.Update();
                }
            }
        }





        Response.Redirect("release_order_report.aspx?chl=" + name_purchaser.SelectedItem.Text);
        Label1.Text = "successfull....";
    }
   
    static string wordify(decimal v)
    {
        if (v == 0) return "zero";
        var units = "|One|Two|Three|Four|Five|Six|Seven|Eight|Nine".Split('|');
        var teens = "|eleven|twelve|thir#|four#|fif#|six#|seven#|eigh#|nine#".Replace("#", "teen").Split('|');
        var tens = "|Ten|Twenty|Thirty|Forty|Fifty|Sixty|Seventy|Eighty|Ninety".Split('|');
        var thou = "|Thousand|m#|b#|tr#|quadr#|quint#|sex#|sept#|oct#".Replace("#", "illion").Split('|');
        //var g = (v  +"<style=color: rgb(163, 21, 21);>minus :");
        var w = "";
        var p = 0;
        v = Math.Abs(v);
        while (v > 0)
        {
            int b = (int)(v % 1000);
            if (b > 0)
            {
                var h = (b / 100);
                var t = (b - h * 100) / 10;
                var u = (b - h * 100 - t * 10);
                var s = ((h > 0) ? units[h] + " Hundred" + ((t > 0 | u > 0) ? " and " : "") : "") + ((t > 0) ? (t == 1 && u > 0) ? teens[u] : tens[t] + ((u > 0) ? "-" : "") : "") + ((t != 1) ? units[u] : ""); s = (((v > 1000) && (h == 0) && (p == 0)) ? " and " : (v > 1000) ? ", " : "") + s; w = s + " " + thou[p] + w;
            } v = v / 1000; p++;
        }
        return w;
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {

        try
        {

            statu.Text = "";
            DataView dv = (DataView)(SqlDataSource_main2.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count != 0)
            {

                DataView dv2 = (DataView)(SqlDataSource_main.Select(DataSourceSelectArguments.Empty));
                if (dv2.Table.Rows.Count != 0)
                {
                    bb();
                    date_2.Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("d");
                    payment_type.Text = dv.Table.Rows[0]["pay_type"].ToString();
                    payment_no.Text = dv.Table.Rows[0]["pay_no"].ToString();
                    payable_at.Text = dv.Table.Rows[0]["payable"].ToString();
                    ms.Text = dv.Table.Rows[0]["purchaser_name"].ToString();
                    auc_held_on.Text = Convert.ToDateTime(DropDownList2.SelectedItem.Text).ToString("d");
                    ammount.Text = dv.Table.Rows[0]["rs"].ToString();
                    rec_no.Text = dv.Table.Rows[0]["no"].ToString();
                    bnk();
                    //DataTable tb = (DataTable)(Session["dt6"]);
                   
                    //DataRow r;
                    //r = tb.NewRow();

                    //r[0] = "-";
                    //r[1] = "-";
                    //r[2] = "-";
                    //r[3] = "-";
                    //r[4] = "-";
                    //r[5] = "-";
                    //r[6] = "-";
                    //r[7] = "-";
                    //tb.Rows.Add(r);
                    //Session["dt6"] = tb;
                    //GridView1.DataSource = tb;
                    //GridView1.DataBind();
                    
                    //ViewState["dl"] = "del";

                    

                }
                else
                {
                    statu.Text = " No Record Find";
                    date_2.Text = "";
                    payment_type.Text = "";
                    payment_no.Text = "";
                    payable_at.Text = "";
                    ms.Text = "";
                    auc_held_on.Text = "";
                    ammount.Text = "";
                    GridView1.DataSource = null;
                    GridView1.DataBind();
                }
            }

            else
            {
                statu.Text = " No Record Find";
                date_2.Text = "";
                payment_type.Text = "";
                payment_no.Text = "";
                payable_at.Text = "";
                ms.Text = "";
                auc_held_on.Text = "";
                ammount.Text = "";

                GridView1.DataSource = null;
                GridView1.DataBind();
            }
        }
        catch(Exception t)
        {
            statu.Text = t.Message.ToString();
            date_2.Text = "";
            payment_type.Text = "";
            payment_no.Text = "";
            payable_at.Text = "";
            ms.Text = "";
            auc_held_on.Text = "";
            ammount.Text = "";

            GridView1.DataSource = null;
            GridView1.DataBind();
        }
    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        Response.Redirect("release_order_report.aspx");
    }


    private void bnk()
    {
        Session.Remove("dts6");

        DataTable tb = new DataTable();

        tb.Columns.Add(new DataColumn("hsd_lot_no", Type.GetType("System.String")));

        tb.Columns.Add(new DataColumn("stack_no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("des_spp", Type.GetType("System.String")));


        tb.Columns.Add(new DataColumn("des_size", Type.GetType("System.String")));

        tb.Columns.Add(new DataColumn("no", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("vol", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("floor_rate", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("rate", Type.GetType("System.String")));
        tb.Columns.Add(new DataColumn("amt", Type.GetType("System.String")));






        DataRow r;
        r = tb.NewRow();

        r[0] = "-";
        r[1] = "-";
        r[2] = "-";
        r[3] = "-";
        r[4] = "-";
        r[5] = "-";
        r[6] = "-";
        r[7] = "-";
        tb.Rows.Add(r);
        Session["dt6"] = tb;
        GridView1.DataSource = tb;
        GridView1.DataBind();
        ViewState["dl"] = "del";
      
    }
    protected void GridView1_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if (e.CommandName == "add")
        {
            DataTable tb = (DataTable)(Session["dt6"]);

            DataRow r;
            r = tb.NewRow();

            string lot_no, stack_no, spec, size_type, no, vol, floor_rate;
            decimal rate;

            lot_no = ((DropDownList)(GridView1.FooterRow.FindControl("lot_no"))).SelectedItem.Text;
            stack_no = ((DropDownList)(GridView1.FooterRow.FindControl("stack_no"))).SelectedItem.Text;
            spec = ((DropDownList)(GridView1.FooterRow.FindControl("spec"))).SelectedItem.Text;
            size_type = ((DropDownList)(GridView1.FooterRow.FindControl("size_type"))).SelectedItem.Text;
            no = ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text;
            vol = ((Label)(GridView1.FooterRow.FindControl("vol"))).Text;
            floor_rate = ((Label)(GridView1.FooterRow.FindControl("floor_rate"))).Text;
            rate =Math.Round(Convert.ToDecimal(((Label)(GridView1.FooterRow.FindControl("rate"))).Text),2);

            decimal amt;
            amt = Math.Round(Convert.ToDecimal(rate) * Convert.ToDecimal(no), 2);

            amt = Math.Round((amt * (Convert.ToDecimal(DropDownList3.SelectedValue))), 0);


            tot = Convert.ToDecimal(ViewState["tot2"].ToString());
            tot += amt;
            ViewState["tot2"] =tot.ToString();
            r[0] = lot_no;
            r[1] = stack_no;
            r[2] = spec;
            r[3] = size_type;
            r[4] = no;
            r[5] = vol;
            r[6] = floor_rate;
            r[7] = rate;
            r[8] = amt.ToString();
          
            tb.Rows.Add(r);
            Session["dt6"] = tb;            
            GridView1.DataSource = tb;
            GridView1.DataBind();
            GridView1.Rows[0].Visible = false;
            ((Label)(GridView1.FooterRow.FindControl("rate"))).Focus();
        }
    }
    protected void size_type_SelectedIndexChanged(object sender, EventArgs e)
    {
        SqlDataSource_size_c.SelectCommand = "SELECT size_type, average, bid_avg, sum(as_per_no) as as_per_no, sum(as_per_vol) as as_per_vol FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date) and(hsd_lot_no=@hsd_lot_no) and (stack=@stack) and (size_type=@size_type)and(rel is null)) group by size_type, average, bid_avg";

        SqlDataSource_size_c.SelectParameters["name_purchaser"].DefaultValue = name_purchaser.SelectedItem.Text.ToString();

        SqlDataSource_size_c.SelectParameters["auction_date"].DefaultValue = DropDownList2.SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["hsd_lot_no"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("lot_no"))).SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["stack"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("stack_no"))).SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["size_type"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("size_type"))).SelectedItem.Text.ToString();
        DataView dv=(DataView)(SqlDataSource_size_c.Select(DataSourceSelectArguments.Empty));
        if(dv.Table.Rows.Count!=0)
        {

           
            //Int32 i;
            //for (i = 1; i < GridView1.Rows.Count; i++)
            //{
            //    vol_c += Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("vol"))).Text), 3);
            //    no_c += Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("no"))).Text);
            //}


            no_t = Convert.ToInt32(dv.Table.Rows[0]["as_per_no"]);
            //vol_t =Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["as_per_vol"]),3);

            //vol_t=Math.Round(vol_t-vol_c,3);
            //no_t = no_t - no_c;
            //((Label)(GridView1.FooterRow.FindControl("no_t"))).Text = no_t.ToString();
            //((Label)(GridView1.FooterRow.FindControl("vol_t"))).Text = vol_t.ToString();

            //DropDownList no, vol;
            //no=((DropDownList)(GridView1.FooterRow.FindControl("no")));
            //vol=((DropDownList)(GridView1.FooterRow.FindControl("vol")));

            //no.Items.FindByText(no.SelectedItem.Text).Selected=false;
            //no.Items.FindByText(dv.Table.Rows[0]["as_per_no"].ToString()).Selected=true;

            // vol.Items.FindByText(vol.SelectedItem.Text).Selected=false;
            //vol.Items.FindByText(dv.Table.Rows[0]["as_per_vol"].ToString()).Selected=true;
            ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text = dv.Table.Rows[0]["as_per_no"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("vol"))).Text = dv.Table.Rows[0]["as_per_vol"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("no_t"))).Text = no_t.ToString();

            ((Label)(GridView1.FooterRow.FindControl("floor_rate"))).Text = dv.Table.Rows[0]["average"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("rate"))).Text = dv.Table.Rows[0]["bid_avg"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("rate"))).Focus();

        }
    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.Footer)
        {
            //((Label)(
        }
    }


    protected void no_TextChanged(object sender, EventArgs e)
    {
        SqlDataSource_size_c.SelectCommand = "SELECT size_type, as_per_no, as_per_vol FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date) and(hsd_lot_no=@hsd_lot_no) and (stack=@stack) and (size_type=@size_type)and(rel is null))";

        SqlDataSource_size_c.SelectParameters["name_purchaser"].DefaultValue = name_purchaser.SelectedItem.Text.ToString();

        SqlDataSource_size_c.SelectParameters["auction_date"].DefaultValue = DropDownList2.SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["hsd_lot_no"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("lot_no"))).SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["stack"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("stack_no"))).SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["size_type"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("size_type"))).SelectedItem.Text.ToString();
        DataView dv = (DataView)(SqlDataSource_size_c.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            vol_c = Convert.ToDecimal(dv.Table.Rows[0]["as_per_vol"]);
            Int32 no = Convert.ToInt32(((TextBox)(GridView1.FooterRow.FindControl("no"))).Text);

            Int32 i;
            for (i = 1; i < no; i++)
            {
                vol_c += Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["as_per_vol"]), 3);

            }


            //no_t = Convert.ToInt32(dv.Table.Rows[0]["as_per_no"]);
            //vol_t =Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["as_per_vol"]),3);

            //vol_t=Math.Round(vol_t-vol_c,3);
            //no_t = no_t - no_c;
            //((Label)(GridView1.FooterRow.FindControl("no_t"))).Text = no_t.ToString();
            //((Label)(GridView1.FooterRow.FindControl("vol_t"))).Text = vol_t.ToString();

            //DropDownList no, vol;
            //no=((DropDownList)(GridView1.FooterRow.FindControl("no")));
            //vol=((DropDownList)(GridView1.FooterRow.FindControl("vol")));

            //no.Items.FindByText(no.SelectedItem.Text).Selected=false;
            //no.Items.FindByText(dv.Table.Rows[0]["as_per_no"].ToString()).Selected=true;

            // vol.Items.FindByText(vol.SelectedItem.Text).Selected=false;
            //vol.Items.FindByText(dv.Table.Rows[0]["as_per_vol"].ToString()).Selected=true;
            // ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text = dv.Table.Rows[0]["as_per_no"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("vol"))).Text = vol_c.ToString();
            ((Label)(GridView1.FooterRow.FindControl("rate"))).Focus();
        }
    }
    protected void LinkButton5_Click(object sender, EventArgs e)
    {
        SqlDataSource_size_c.SelectCommand = "SELECT size_type, average, bid_avg, sum(as_per_no) as as_per_no, sum(as_per_vol) as as_per_vol FROM [tally_sheet] WHERE (([name_purchaser] = @name_purchaser) AND ([auction_date] = @auction_date) and(hsd_lot_no=@hsd_lot_no) and (stack=@stack) and (size_type=@size_type)and(rel is null)) group by size_type, average, bid_avg";

        SqlDataSource_size_c.SelectParameters["name_purchaser"].DefaultValue = name_purchaser.SelectedItem.Text.ToString();

        SqlDataSource_size_c.SelectParameters["auction_date"].DefaultValue = DropDownList2.SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["hsd_lot_no"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("lot_no"))).SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["stack"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("stack_no"))).SelectedItem.Text.ToString();
        SqlDataSource_size_c.SelectParameters["size_type"].DefaultValue = ((DropDownList)(GridView1.FooterRow.FindControl("size_type"))).SelectedItem.Text.ToString();
        DataView dv = (DataView)(SqlDataSource_size_c.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {


            //Int32 i;
            //for (i = 1; i < GridView1.Rows.Count; i++)
            //{
            //    vol_c += Math.Round(Convert.ToDecimal(((Label)(GridView1.Rows[i].FindControl("vol"))).Text), 3);
            //    no_c += Convert.ToInt32(((Label)(GridView1.Rows[i].FindControl("no"))).Text);
            //}


            no_t = Convert.ToInt32(dv.Table.Rows[0]["as_per_no"]);
            //vol_t =Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["as_per_vol"]),3);

            //vol_t=Math.Round(vol_t-vol_c,3);
            //no_t = no_t - no_c;
            //((Label)(GridView1.FooterRow.FindControl("no_t"))).Text = no_t.ToString();
            //((Label)(GridView1.FooterRow.FindControl("vol_t"))).Text = vol_t.ToString();

            //DropDownList no, vol;
            //no=((DropDownList)(GridView1.FooterRow.FindControl("no")));
            //vol=((DropDownList)(GridView1.FooterRow.FindControl("vol")));

            //no.Items.FindByText(no.SelectedItem.Text).Selected=false;
            //no.Items.FindByText(dv.Table.Rows[0]["as_per_no"].ToString()).Selected=true;

            // vol.Items.FindByText(vol.SelectedItem.Text).Selected=false;
            //vol.Items.FindByText(dv.Table.Rows[0]["as_per_vol"].ToString()).Selected=true;
            ((TextBox)(GridView1.FooterRow.FindControl("no"))).Text = dv.Table.Rows[0]["as_per_no"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("vol"))).Text = dv.Table.Rows[0]["as_per_vol"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("no_t"))).Text = no_t.ToString();

            ((Label)(GridView1.FooterRow.FindControl("floor_rate"))).Text = dv.Table.Rows[0]["average"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("rate"))).Text = dv.Table.Rows[0]["bid_avg"].ToString();
            ((Label)(GridView1.FooterRow.FindControl("rate"))).Focus();

        }
    }
}
