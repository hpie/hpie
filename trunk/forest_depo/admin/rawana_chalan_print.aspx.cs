using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

public partial class rawana_chalan_print : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
       
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
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        try
        {

            SqlDataSource1.DataBind();
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));

            if (dv.Table.Rows.Count != 0)
            {
                // chl_no.Text = dv.Table.Rows[0]["no"].ToString();
                book_no.Text = dv.Table.Rows[0][2].ToString();
                time.Text = dv.Table.Rows[0][3].ToString();
                rel_no.Text = dv.Table.Rows[0][4].ToString();

                decimal iAmt = Convert.ToDecimal(dv.Table.Rows[0][4].ToString());
                string strAmount = wordify(iAmt);
                wrd.Text = strAmount;

                name_add.Text = dv.Table.Rows[0][5].ToString();
                veh_no.Text = dv.Table.Rows[0][6].ToString();
                name_driver.Text = dv.Table.Rows[0][7].ToString();
                place_consig.Text = dv.Table.Rows[0][8].ToString();
                for_trans.Text = dv.Table.Rows[0][9].ToString();
                rel_hamm_mark.Text = dv.Table.Rows[0][10].ToString();
                //name_div.Text = dv.Table.Rows[0][11].ToString();
                //date_auc.Text = Convert.ToDateTime(dv.Table.Rows[0][12]).ToString("MM/dd/yyyy");
                // lot_no.Text = dv.Table.Rows[0][13].ToString();
                //stack_no.Text = dv.Table.Rows[0][14].ToString();
                // species.Text = dv.Table.Rows[0][15].ToString();
                //size.Text = dv.Table.Rows[0][16].ToString();
                // no.Text = dv.Table.Rows[0][17].ToString();
                // vol.Text = dv.Table.Rows[0][18].ToString();
                // amt.Text = dv.Table.Rows[0][19].ToString();
                date.Text = Convert.ToDateTime(dv.Table.Rows[0][20]).ToString("MM/dd/yyyy");
                GridView1.DataSource = SqlDataSource1;
                GridView1.DataBind();
            }
        }
        catch
        {

        }
    }
}