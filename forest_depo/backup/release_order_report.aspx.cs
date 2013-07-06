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
public partial class release_order_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        //Int32 i;
        //for (i = 0; i < dv.Table.Rows.Count; i++)
        //{
        if (dv.Table.Rows.Count != 0)
        {
            pur_amt.Text = dv.Table.Rows[0]["pur_amt"].ToString();

            decimal iAmt = Convert.ToDecimal(dv.Table.Rows[0]["pur_amt"].ToString());
            string strAmount = wordify(iAmt);
            wrd.Text = strAmount;

            rece_vide_no.Text = dv.Table.Rows[0]["rece_vide_no"].ToString();
            rece_date.Text = Convert.ToDateTime(dv.Table.Rows[0]["rece_date"]).ToString("MM/dd/yyyy");
            issued_at.Text = dv.Table.Rows[0]["issued_at"].ToString();

         

            payable_at.Text = dv.Table.Rows[0]["pay_at"].ToString();
            rece_no.Text = dv.Table.Rows[0]["rece_no"].ToString();
            date3.Text = dv.Table.Rows[0]["date3"].ToString();
            work_div.Text = dv.Table.Rows[0]["work_div"].ToString();
            ms.Text = dv.Table.Rows[0]["m_s"].ToString();
            auc_held_on.Text = dv.Table.Rows[0]["auc_held_on"].ToString();
            sanc_vide_no.Text = dv.Table.Rows[0]["sanc_vide_no"].ToString();
            date4.Text = dv.Table.Rows[0]["date4"].ToString();
            effe_from.Text = dv.Table.Rows[0]["effe_from"].ToString();
            lot_no.Text = dv.Table.Rows[0]["lot_no"].ToString();
            stack_no.Text = dv.Table.Rows[0]["stack_no"].ToString();
            des_spp.Text = dv.Table.Rows[0]["des_spp"].ToString();
            des_size.Text = dv.Table.Rows[0]["des_size"].ToString();
            no.Text = dv.Table.Rows[0]["no"].ToString();
            vol.Text = dv.Table.Rows[0]["vol"].ToString();
            rate.Text = dv.Table.Rows[0]["rate"].ToString();
            amt.Text = dv.Table.Rows[0]["amt"].ToString();


        }
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
}