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
    protected void LinkButton1_Click(object sender, EventArgs e)
    {

        try
        {
            statu.Text = "";
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            //Int32 i;
            //for (i = 0; i < dv.Table.Rows.Count; i++)
            //{
            if (dv.Table.Rows.Count != 0)
            {
                no.Text = dv.Table.Rows[0]["rel_no"].ToString();


                if (dv.Table.Rows[0]["date"].ToString() != "")
                {
                    date.Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("d");
                }
                pur_amt.Text = dv.Table.Rows[0]["pur_amt"].ToString();

                decimal iAmt = Convert.ToDecimal(dv.Table.Rows[0]["pur_amt"].ToString());
                string strAmount = wordify(iAmt);
                wrd.Text = strAmount;

                rece_vide_no.Text = dv.Table.Rows[0]["rece_vide_no"].ToString();

                if (dv.Table.Rows[0]["rece_date"].ToString() != "")
                {

                    rece_date.Text = Convert.ToDateTime(dv.Table.Rows[0]["rece_date"]).ToString("d");
                }
                issued_at.Text = dv.Table.Rows[0]["issued_at"].ToString();
                pay_type.Text = dv.Table.Rows[0]["pay_type"].ToString();



                payable_at.Text = dv.Table.Rows[0]["pay_at"].ToString();
                rece_no.Text = dv.Table.Rows[0]["rece_no"].ToString();
                if (dv.Table.Rows[0]["date3"].ToString() != "")
                {
                    date3.Text = Convert.ToDateTime(dv.Table.Rows[0]["date3"]).ToString("d");
                }
                work_div.Text = dv.Table.Rows[0]["work_div"].ToString();
                ms.Text = dv.Table.Rows[0]["m_s"].ToString();
                if (dv.Table.Rows[0]["auc_held_on"].ToString() != "")
                {

                    auc_held_on.Text = Convert.ToDateTime(dv.Table.Rows[0]["auc_held_on"]).ToString("d");
                }
                sanc_vide_no.Text = dv.Table.Rows[0]["sanc_vide_no"].ToString();
                if (dv.Table.Rows[0]["date4"].ToString() != "")
                {
                    date4.Text = Convert.ToDateTime(dv.Table.Rows[0]["date4"]).ToString("d");
                }
                
                
                effe_from.Text = dv.Table.Rows[0]["effe_from"].ToString();


                discount0.Text =Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["discount1"]),0).ToString();
                discount1.Text = Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["discount"]), 0).ToString();
                decimal tot=Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["discount1"]),0);
                decimal tot2 = Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["discount"]), 0);

                decimal tot3 =Math.Round(tot + tot2,0);
                tot_l.Text = tot3.ToString();
                

                decimal l_dis= Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["less_dis1"]), 0);
                less_discount1.Text = l_dis.ToString();
                l_dis =Math.Round(tot - l_dis,0);
                
                less_discount0.Text = l_dis.ToString();

                decimal l_tds = Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["tds1"]), 0);
                tds1.Text = l_tds.ToString();
                l_tds =Math.Round(l_tds + l_dis,0);
                tds0.Text = l_tds.ToString();

                decimal l_vat = Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["vat1"]), 0);
                vat1.Text = l_vat.ToString();
                l_vat =Math.Round(l_vat + l_tds,0);
                vat0.Text = l_vat.ToString();

                decimal l_market = Math.Round(Convert.ToDecimal(dv.Table.Rows[0]["market_fee1"]), 0);
                market_fee1.Text = l_market.ToString();
                l_market =Math.Round(l_market + l_vat,0);
                market_fee0.Text = l_market.ToString();

                factor.Text = dv.Table.Rows[0]["factor"].ToString();
                discount.Text = dv.Table.Rows[0]["discount"].ToString();
                less_discount.Text = dv.Table.Rows[0]["less_dis"].ToString();
                tds.Text = dv.Table.Rows[0]["tds"].ToString();
                vat.Text = dv.Table.Rows[0]["vat"].ToString();
                market_fee.Text = dv.Table.Rows[0]["market_fee"].ToString();
                net_amt.Text = dv.Table.Rows[0]["net_amt"].ToString();

                GridView1.DataSource = SqlDataSource1;
                GridView1.DataBind();


            }
        }
        catch
        {
            statu.Text = " No Record Find..";
        }
    }
}