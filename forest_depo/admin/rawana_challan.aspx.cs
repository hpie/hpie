using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;

public partial class rawana_challan : System.Web.UI.Page
{
    Int32 no_i;
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {
            cal();
            Int32 i;
            for (i = 0; i < GridView1.Rows.Count; i++)
            {

                SqlDataSource1.InsertParameters["name_div"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("division"))).Text.ToString();
                SqlDataSource1.InsertParameters["date_auc"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("auc_date"))).Text.ToString();
                SqlDataSource1.InsertParameters["lot_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("lot_no"))).Text.ToString();
                SqlDataSource1.InsertParameters["stack_no"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("stack"))).Text.ToString();
                SqlDataSource1.InsertParameters["species"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("spec"))).Text.ToString();
                SqlDataSource1.InsertParameters["size"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("size"))).Text.ToString();
                SqlDataSource1.InsertParameters["no_2"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("no"))).Text.ToString();

                SqlDataSource1.InsertParameters["vol"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("vol"))).Text.ToString();
                SqlDataSource1.InsertParameters["amt"].DefaultValue = ((Label)(GridView1.Rows[i].FindControl("amt"))).Text.ToString();
                SqlDataSource1.Insert();
            }


          

            Label1.Text = "Sucessfull...";
            ViewState["val"] = null;
            Response.Redirect("rawana_chalan_print.aspx?rel_no=" + DropDownList1.SelectedItem.Text);
        }
        catch(Exception t)
        {
            Label1.Text = t.Message.ToString();
        }


    }
    protected void rel_no_TextChanged(object sender, EventArgs e)
    {
        decimal iAmt = Convert.ToDecimal(rel_no.Text);
        string strAmount = wordify(iAmt);
        wrd.Text = strAmount;
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
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        ViewState["val"] = null;
        GridView1.DataBind();
        try
        {
            Label2.Text = "";
            DataView dv = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
            if (dv.Table.Rows.Count == 0)
            {
                rel_no.Text = dv.Table.Rows[0]["rel_no"].ToString();
                name_add.Text = dv.Table.Rows[0]["m_s"].ToString();

                SqlDataSource8.SelectParameters["lot_no"].DefaultValue = dv.Table.Rows[0]["lot_no"].ToString();
                DataView dv2 = (DataView)(SqlDataSource7.Select(DataSourceSelectArguments.Empty));
                veh_no.Text = dv2.Table.Rows[0]["truck_no"].ToString();


            }
        }
        catch (Exception t)
        {
            Label2.Text = t.Message.ToString();
        }

    }
    protected void LinkButton3_Click(object sender, EventArgs e)
    {
        Response.Redirect("rawana_chalan_print.aspx");
    }
    protected void GridView1_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {

    }
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        //if ((e.Row.RowState & DataControlRowState.Edit) > 0)
        //{
        if (e.Row.RowType==DataControlRowType.DataRow)
        {
            if (ViewState["val"] == null)
            {
                no_i = Convert.ToInt32(((Label)(e.Row.FindControl("no"))).Text);
                ViewState["val"] = no_i.ToString();
                ViewState["vol_v"] =((Label)(e.Row.FindControl("vol"))).Text.ToString();

                ViewState["prc_v"] = ((Label)(e.Row.FindControl("amt"))).Text.ToString();
            }
        }
    }
    protected void LinkButton4_Click(object sender, EventArgs e)
    {
        Int32 i;
        for (i = 0; i < GridView1.Rows.Count; i++)
        {
            decimal no2 = Convert.ToDecimal(ViewState["val"]);
            decimal no3 = Convert.ToDecimal(ViewState["vol_v"]);
            decimal prc = Convert.ToDecimal(ViewState["prc_v"]);
            decimal no4 = no3 / no2;
            decimal no5 = prc / no2;

            decimal vol5 = Convert.ToDecimal(((TextBox)(GridView1.Rows[i].FindControl("no_e"))).Text);

            if (vol5 > no2)
            {

                err.Text = "Only Available "+no2.ToString()+ " in Stocks.".ToString();

            }
            if (vol5 <= no2)
            {
                decimal vol_c = no4 * vol5;
                decimal prc_c = no5 * vol5;

                ((Label)(GridView1.Rows[i].FindControl("vol"))).Text = vol_c.ToString();
                ((Label)(GridView1.Rows[i].FindControl("amt"))).Text = prc_c.ToString();

                decimal vol_c2 = no3 - vol_c;
                decimal prc_c2 = prc - prc_c;
                decimal no_c2 = no2 - vol5;


                //SqlDataSource7.UpdateParameters["vol"].DefaultValue = vol_c2.ToString();
                //SqlDataSource7.UpdateParameters["amt"].DefaultValue = vol_c2.ToString();
                //SqlDataSource7.Update();
                //err.Text = "Successfull..";
            }
        }
       
    }
    private void cal()
    {
        Int32 i;
        for (i = 0; i < GridView1.Rows.Count; i++)
        {
            decimal no2 = Convert.ToDecimal(ViewState["val"]);
            decimal no3 = Convert.ToDecimal(ViewState["vol_v"]);
            decimal prc = Convert.ToDecimal(ViewState["prc_v"]);
            decimal no4 = no3 / no2;
            decimal no5 = prc / no2;

            decimal vol5 = Convert.ToDecimal(((TextBox)(GridView1.Rows[i].FindControl("no_e"))).Text);

            if (vol5 > no2)
            {

                err.Text = "Only Available " + no2.ToString() + " in Stocks.".ToString();

            }
            if (vol5 <= no2)
            {
                decimal vol_c = no4 * vol5;
                decimal prc_c = no5 * vol5;

                //((Label)(GridView1.Rows[i].FindControl("vol"))).Text = vol_c.ToString();
                //((Label)(GridView1.Rows[i].FindControl("amt"))).Text = prc_c.ToString();

                decimal vol_c2 = no3 - vol_c;
                decimal prc_c2 = prc - prc_c;
                decimal no_c2 = no2 - vol5;


                SqlDataSource7.UpdateParameters["vol"].DefaultValue = vol_c2.ToString();
                SqlDataSource7.UpdateParameters["amt"].DefaultValue = prc_c2.ToString();
                SqlDataSource7.UpdateParameters["no"].DefaultValue = no_c2.ToString();
                SqlDataSource7.Update();
                err.Text = "Successfull..";
            }
        }

    }
    protected void veh_no_TextChanged(object sender, EventArgs e)
    {

    }
    protected void rel_no_TextChanged1(object sender, EventArgs e)
    {

    }
}