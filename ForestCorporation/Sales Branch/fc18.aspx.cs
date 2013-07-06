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

public partial class fc18 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

        pn();
    }
    private void pn()
    {


        DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            Int32 rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
            rr++;
            Label1.Text = rr.ToString();
        }
        else
        {
            Label1.Text = "1001".ToString();
        }
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        cal();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        cal();
        SqlDataSource1.InsertParameters["periodstart"].DefaultValue = DateTime.Parse(TextBox2.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.InsertParameters["periodend"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.Insert();
        Response.Redirect("fc18_report.aspx?preno=" + Label1.Text);
    }
    private void cal()
    {
        decimal cry_kg, cry_rs, cry, fuel_kg, fuel_rs, fuel, over2_head, over2, fuel_kg2, fuel_rs2, fuel2;
        cry_kg = Math.Round(Convert.ToDecimal(TextBox28.Text), 2);
        cry_rs = Math.Round(Convert.ToDecimal(TextBox29.Text), 2);
        cry = Math.Round(cry_kg * cry_rs, 2);
        TextBox30.Text = cry.ToString();

        fuel_kg = Math.Round(Convert.ToDecimal(TextBox31.Text), 2);
        fuel_rs = Math.Round(Convert.ToDecimal(TextBox32.Text), 2);
        fuel = Math.Round(fuel_kg * fuel_rs, 2);
        TextBox33.Text = fuel.ToString();

        fuel_kg2 = Math.Round(Convert.ToDecimal(TextBox38.Text), 2);
        fuel_rs2 = Math.Round(Convert.ToDecimal(TextBox39.Text), 2);
        fuel2 = Math.Round(fuel_kg2 * fuel_rs2, 2);
        TextBox40.Text = fuel2.ToString();



        decimal res_kg, res_rs, res, mto_oil, mto_rs, mto, lime_kg, lime_rs, lime, st_kg, st_rs, st, cost;
        res_kg = Math.Round(Convert.ToDecimal(TextBox5.Text), 2);
        res_rs = Math.Round(Convert.ToDecimal(TextBox6.Text), 2);
        res = Math.Round(res_kg * res_rs, 2);
        TextBox7.Text = res.ToString();


        mto_oil = Math.Round(Convert.ToDecimal(TextBox8.Text), 2);
        mto_rs = Math.Round(Convert.ToDecimal(TextBox9.Text), 2);
        mto = Math.Round(mto_oil * mto_rs, 2);
        TextBox10.Text = mto.ToString();

        lime_kg = Math.Round(Convert.ToDecimal(TextBox11.Text), 2);
        lime_rs = Math.Round(Convert.ToDecimal(TextBox12.Text), 2);
        lime = Math.Round(lime_kg * lime_rs, 2);
        TextBox13.Text = lime.ToString();

        st_kg = Math.Round(Convert.ToDecimal(TextBox14.Text), 2);
        st_rs = Math.Round(Convert.ToDecimal(TextBox15.Text), 2);
        st = Math.Round(st_kg * st_rs, 2);
        TextBox16.Text = st.ToString();

        decimal lab_charge, lab, over_charge, over, prod;
        prod = Math.Round(Convert.ToDecimal(TextBox4.Text), 2);
        lab_charge = Math.Round(Convert.ToDecimal(TextBox17.Text), 2);
        over_charge = Math.Round(Convert.ToDecimal(TextBox34.Text), 2);
        lab = Math.Round(lab_charge * prod, 2);
        over = Math.Round(over_charge * prod, 2);

        over2_head = Math.Round(Convert.ToDecimal(TextBox34.Text), 2);
        over2 = Math.Round(over2_head * prod, 2);
        TextBox35.Text = over2.ToString();


        TextBox18.Text = lab.ToString();
        //TextBox20.Text = over.ToString();





        cost = Math.Round(res + mto + lime + st + lab + cry + fuel + over2+fuel2, 2);
        TextBox27.Text = cost.ToString();

        decimal profit_per, profit, comm_agent_per, comm_agent, pro_per, pro, sel_val, sel_prc;
        profit_per = Math.Round(Convert.ToDecimal(TextBox23.Text), 2);
        comm_agent_per = Math.Round(Convert.ToDecimal(TextBox36.Text), 2);
        pro_per = Math.Round(Convert.ToDecimal(TextBox23.Text), 2);
        profit = Math.Round(prod / 100 * profit_per, 2);
        comm_agent = Math.Round(prod / 100 * comm_agent_per, 2);
        pro = Math.Round(prod / 100 * pro_per, 2);
        TextBox24.Text = profit.ToString();
        TextBox37.Text = comm_agent.ToString();
        TextBox24.Text = pro.ToString();
        sel_val = Math.Round(Convert.ToDecimal(TextBox25.Text), 2);
        sel_prc = Math.Round(sel_val / prod, 2);
        TextBox26.Text = sel_prc.ToString();
    }
}
