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

public partial class fc21 : System.Web.UI.Page
{
    public Int32 r=1;
    decimal total = 0;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            if (Request.QueryString["sr"] == null)
            {
                Response.Redirect("fc21.aspx");
            }
            pn();
            bind();
        }


    }
    private void bind()
    {
        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows[0]["cst"].ToString() != "0".ToString())
        {
            Panel1.Visible = false;
        }
        else
        {
            Panel1.Visible = true;
        }
        TextBox1.Text = dv.Table.Rows[0]["range"].ToString();
        TextBox2.Text = dv.Table.Rows[0]["sr"].ToString();
        TextBox2.Text = dv.Table.Rows[0]["sr"].ToString();
        TextBox3.Text =Convert.ToDateTime( dv.Table.Rows[0]["sdate"]).ToString("dd/MM/yyyy");
        TextBox6.Text = Convert.ToDateTime(dv.Table.Rows[0]["fdate"]).ToString("dd/MM/yyyy");
        TextBox4.Text = dv.Table.Rows[0]["division"].ToString();
        TextBox5.Text = dv.Table.Rows[0]["f_o_no"].ToString();
        TextBox46.Text = dv.Table.Rows[0]["order_ref"].ToString();
        TextBox47.Text = Convert.ToDateTime(dv.Table.Rows[0]["odate"]).ToString("dd/MM/yyyy");
        TextBox7.Text = dv.Table.Rows[0]["name"].ToString();
        TextBox10.Text = dv.Table.Rows[0]["date_time"].ToString();
        TextBox8.Text = dv.Table.Rows[0]["regno"].ToString();
        TextBox9.Text = dv.Table.Rows[0]["plano"].ToString();
        TextBox11.Text = dv.Table.Rows[0]["ass_code"].ToString();
        TextBox12.Text = dv.Table.Rows[0]["tariff"].ToString();
        TextBox13.Text = dv.Table.Rows[0]["exemption"].ToString();
        TextBox14.Text = dv.Table.Rows[0]["name_con"].ToString();
        TextBox15.Text = dv.Table.Rows[0]["name_agent"].ToString();
        TextBox16.Text = dv.Table.Rows[0]["c_cst"].ToString();
        TextBox17.Text = dv.Table.Rows[0]["c_gst"].ToString();
        TextBox18.Text = Convert.ToDateTime(dv.Table.Rows[0]["c_date"]).ToString("dd/MM/yyyy");
        TextBox19.Text = dv.Table.Rows[0]["g_cst"].ToString();
        TextBox20.Text = dv.Table.Rows[0]["g_gst"].ToString();
        TextBox21.Text = Convert.ToDateTime(dv.Table.Rows[0]["g_date"]).ToString("dd/MM/yyyy");
        TextBox22.Text = dv.Table.Rows[0]["rate_o_duty"].ToString();
        TextBox24.Text = dv.Table.Rows[0]["ecc_no"].ToString();
        TextBox30.Text = dv.Table.Rows[0]["s_no"].ToString();
        TextBox31.Text = dv.Table.Rows[0]["in_rga"].ToString();
        TextBox34.Text = dv.Table.Rows[0]["in_rgc"].ToString();
        TextBox35.Text = dv.Table.Rows[0]["d_t"].ToString();
        TextBox36.Text = dv.Table.Rows[0]["mode"].ToString();
        TextBox37.Text = dv.Table.Rows[0]["reg"].ToString();
        TextBox38.Text = dv.Table.Rows[0]["gr"].ToString();
        TextBox39.Text = Convert.ToDateTime(dv.Table.Rows[0]["date"]).ToString("dd/MM/yyyy");
        Label24.Text = dv.Table.Rows[0]["tax"].ToString();
    }
    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource2.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            Int32 rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
            rr++;
            TextBox2.Text = rr.ToString();
        }
        else
        {
            TextBox2.Text = "1001".ToString();
        }
    }
    private String changeToWords(String numb, bool isCurrency)
    {
        String val = "", wholeNo = numb, points = "", andStr = "", pointStr = "";
        String endStr = (isCurrency) ? ("Only") : ("");
        try
        {
            int decimalPlace = numb.IndexOf(".");
            if (decimalPlace > 0)
            {
                wholeNo = numb.Substring(0, decimalPlace);
                points = numb.Substring(decimalPlace + 1);
                if (Convert.ToInt32(points) > 0)
                {
                    andStr = (isCurrency) ? ("and") : ("point");// just to separate whole numbers from points/cents 
                    endStr = (isCurrency) ? ("Cents " + endStr) : ("");
                    pointStr = translateCents(points);
                }
            }
            val = String.Format("{0} {1}{2} {3}", translateWholeNumber(wholeNo).Trim(), andStr, pointStr, endStr);
        }
        catch { ;}
        return val;
    }
    private String translateWholeNumber(String number)
    {
        string word = "";
        try
        {
            bool beginsZero = false;//tests for 0XX 
            bool isDone = false;//test if already translated 
            double dblAmt = (Convert.ToDouble(number));
            //if ((dblAmt > 0) && number.StartsWith("0")) 
            if (dblAmt > 0)
            {//test for zero or digit zero in a nuemric 
                beginsZero = number.StartsWith("0");
                int numDigits = number.Length;
                int pos = 0;//store digit grouping 
                String place = "";//digit grouping name:hundres,thousand,etc... 
                switch (numDigits)
                {
                    case 1://ones' range 
                        word = ones(number);
                        isDone = true;
                        break;
                    case 2://tens' range 
                        word = tens(number);
                        isDone = true;
                        break;
                    case 3://hundreds' range 
                        pos = (numDigits % 3) + 1;
                        place = " Hundred ";
                        break;
                    case 4://thousands' range 
                    case 5:
                    case 6:
                        pos = (numDigits % 4) + 1;
                        place = " Thousand ";
                        break;
                    case 7://millions' range 
                    case 8:
                    case 9:
                        pos = (numDigits % 7) + 1;
                        place = " Million ";
                        break;
                    case 10://Billions's range 
                        pos = (numDigits % 10) + 1;
                        place = " Billion ";
                        break;
                    //add extra case options for anything above Billion... 
                    default:
                        isDone = true;
                        break;
                }
                if (!isDone)
                {//if transalation is not done, continue...(Recursion comes in now!!) 
                    word = translateWholeNumber(number.Substring(0, pos)) + place + translateWholeNumber(number.Substring(pos));
                    //check for trailing zeros 
                    if (beginsZero) word = " and " + word.Trim();
                }
                //ignore digit grouping names 
                if (word.Trim().Equals(place.Trim())) word = "";
            }
        }
        catch { ;}
        return word.Trim();
    }
    private String tens(String digit)
    {
        int digt = Convert.ToInt32(digit);
        String name = null;
        switch (digt)
        {
            case 10:
                name = "Ten";
                break;
            case 11:
                name = "Eleven";
                break;
            case 12:
                name = "Twelve";
                break;
            case 13:
                name = "Thirteen";
                break;
            case 14:
                name = "Fourteen";
                break;
            case 15:
                name = "Fifteen";
                break;
            case 16:
                name = "Sixteen";
                break;
            case 17:
                name = "Seventeen";
                break;
            case 18:
                name = "Eighteen";
                break;
            case 19:
                name = "Nineteen";
                break;
            case 20:
                name = "Twenty";
                break;
            case 30:
                name = "Thirty";
                break;
            case 40:
                name = "Fourty";
                break;
            case 50:
                name = "Fifty";
                break;
            case 60:
                name = "Sixty";
                break;
            case 70:
                name = "Seventy";
                break;
            case 80:
                name = "Eighty";
                break;
            case 90:
                name = "Ninety";
                break;
            default:
                if (digt > 0)
                {
                    name = tens(digit.Substring(0, 1) + "0") + " " + ones(digit.Substring(1));
                }
                break;
        }
        return name;
    }
    private String ones(String digit)
    {
        int digt = Convert.ToInt32(digit);
        String name = "";
        switch (digt)
        {
            case 1:
                name = "One";
                break;
            case 2:
                name = "Two";
                break;
            case 3:
                name = "Three";
                break;
            case 4:
                name = "Four";
                break;
            case 5:
                name = "Five";
                break;
            case 6:
                name = "Six";
                break;
            case 7:
                name = "Seven";
                break;
            case 8:
                name = "Eight";
                break;
            case 9:
                name = "Nine";
                break;
        }
        return name;
    }
    private String translateCents(String cents)
    {
        String cts = "", digit = "", engOne = "";
        for (int i = 0; i < cents.Length; i++)
        {
            digit = cents[i].ToString();
            if (digit.Equals("0"))
            {
                engOne = "Zero";
            }
            else
            {
                engOne = ones(digit);
            }
            cts += " " + engOne;
        }
        return cts;
    } 
    protected void GridView1_RowDataBound(object sender, GridViewRowEventArgs e)
    {
       
       
    }
    protected void TextBox15_TextChanged(object sender, EventArgs e)
    {

    }


    protected void GridView1_RowDataBound1(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {
            string jj = ((Label)(e.Row.FindControl("label1"))).Text;
            if (jj == "ss")
            {
                e.Row.Visible = false;
            }
            else
            {
                r = r + 1;
                e.Row.Visible = true;
                decimal rate = Convert.ToDecimal(((Label)(e.Row.FindControl("label3"))).Text);
                decimal qty = Convert.ToDecimal(((Label)(e.Row.FindControl("label4"))).Text);
                e.Row.Cells[5].Text = Math.Round((rate * qty), 2).ToString();
                string l6 = ((Label)(e.Row.FindControl("label6"))).Text.ToString();
                if (l6 == "")
                {
                    ((Label)(e.Row.FindControl("label6"))).Text = "0".ToString();
                }

                string l7 = ((Label)(e.Row.FindControl("label7"))).Text.ToString();
                if (l7 == "")
                {
                    ((Label)(e.Row.FindControl("label7"))).Text = "0".ToString();
                }
                
                ((Label)(e.Row.FindControl("label8"))).Text = Math.Round(((rate * qty) + Convert.ToDecimal(((Label)(e.Row.FindControl("label6"))).Text) + Convert.ToDecimal(((Label)(e.Row.FindControl("label7"))).Text)), 2).ToString();
                total = total + Convert.ToDecimal(((Label)(e.Row.FindControl("label8"))).Text);
            }
        }
        Label10.Text = (total * Convert.ToDecimal(TextBox22.Text) / 100).ToString();
        Label17.Text = Math.Round((Convert.ToDecimal(Label10.Text) * 2 / 100), 0).ToString();
        Label18.Text = Math.Round((Convert.ToDecimal(Label10.Text) * 1 / 100), 0).ToString();
        Label19.Text = (Convert.ToDecimal(Label10.Text) + Convert.ToDecimal(Label17.Text) + Convert.ToDecimal(Label18.Text)).ToString();
        Label20.Text = (Convert.ToDecimal(Label19.Text) + Convert.ToDecimal(total)).ToString();
        Label21.Text = Math.Round((Convert.ToDecimal(Label20.Text) * Convert.ToDecimal(Label24.Text) / 100), 0).ToString();
        //Label22.Text = "";
       // Label22.Text = Math.Round((Convert.ToDecimal(Label20.Text) * 2 / 100), 2).ToString();

        //Label23.Text = (Convert.ToDecimal(Label20.Text) + Convert.ToDecimal(Label21.Text) + Convert.ToDecimal(Label22.Text)).ToString();
        
        Label23.Text =Math.Round( (Convert.ToDecimal(Label20.Text) + Convert.ToDecimal(Label21.Text)),0).ToString();
        TextBox26.Text = changeToWords(Label19.Text, false);
        TextBox28.Text = changeToWords(Label23.Text, false);
    }
}
