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
public partial class gate_pass_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        //Int32 i;
        //for (i = 0; i < dv.Table.Rows.Count; i++)
        //{
        if(dv.Table.Rows.Count!=0)
        {
            sr_no.Text = dv.Table.Rows[0]["sno"].ToString();
            challan_no_1.Text = dv.Table.Rows[0][0].ToString();
            date.Text =Convert.ToDateTime(dv.Table.Rows[0][1]).ToString("MM/dd/yyyy");
            rel_order.Text = dv.Table.Rows[0][3].ToString();

            decimal iAmt = Convert.ToDecimal(dv.Table.Rows[0][3].ToString());
            string strAmount = wordify(iAmt);
            wrd.Text = strAmount;

           add_purchaser.Text = dv.Table.Rows[0]["name_add"].ToString();
            veh_no.Text = dv.Table.Rows[0]["veh_no"].ToString();
            name_driver.Text = dv.Table.Rows[0]["name_driver"].ToString();

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