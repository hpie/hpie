using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class rawana_challan : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Insert();
        Label1.Text = "Sucessfull...";
        Response.Redirect("rawana_chalan_print.aspx?challan_no=" + DropDownList1.SelectedItem.Text);


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
}