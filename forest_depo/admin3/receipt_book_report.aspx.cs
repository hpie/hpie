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
public partial class receipt_book_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv != null)
        {
            no.Text = dv.Table.Rows[0][1].ToString();
            book_no.Text = dv.Table.Rows[0][2].ToString();
            pur_name.Text = dv.Table.Rows[0][3].ToString();
            rs.Text = dv.Table.Rows[0][4].ToString();

            decimal iAmt = Convert.ToDecimal(dv.Table.Rows[0][4].ToString());
            string strAmount = wordify(iAmt);
            rs_t.Text = strAmount;

            emd.Text = dv.Table.Rows[0][5].ToString();
            payment_type.Text = dv.Table.Rows[0][6].ToString();
            pay_no.Text = dv.Table.Rows[0][7].ToString();
            dat.Text = Convert.ToDateTime(dv.Table.Rows[0][8]).ToString("d");
            payable_at.Text = dv.Table.Rows[0][9].ToString();

            rec_date.Text = Convert.ToDateTime(dv.Table.Rows[0]["rec_date"]).ToString("d");







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
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
}