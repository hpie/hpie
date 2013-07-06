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

public partial class fc15 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    private void cal()
    {
        decimal a1, a2, a3, a4, a5, a6, a7, a8, net, net2;
        a1 =Math.Round(Convert.ToDecimal(TextBox6.Text),2);
        a2 = Math.Round(Convert.ToDecimal(TextBox7.Text), 2);
        a3 = Math.Round(Convert.ToDecimal(TextBox8.Text), 2);
        a4 = Math.Round(Convert.ToDecimal(TextBox9.Text), 2);

        TextBox10.Text = Math.Round(a1 - a3, 2).ToString();
        TextBox11.Text = Math.Round(a2 - a4, 2).ToString();

        a5 = Math.Round(Convert.ToDecimal(TextBox10.Text), 2);
        a6 = Math.Round(Convert.ToDecimal(TextBox11.Text), 2);
        a7 = Math.Round(Convert.ToDecimal(TextBox12.Text), 2);
        a8 = Math.Round(Convert.ToDecimal(TextBox13.Text), 2);

       

        net = Math.Round(a5 + a7, 2);
        net2 = Math.Round(a6 + a8, 2);
        Label1.Text = net.ToString();
        Label2.Text = net2.ToString();

       

        decimal b1, b2, b3, b4, b5, b6, b7, b8, b9, b10, b11, b12, b13, b14, b15, b16, b17, b18, bnet, bnet2;
        b1 = Math.Round(Convert.ToDecimal(TextBox14.Text), 2);
        b2 = Math.Round(Convert.ToDecimal(TextBox15.Text), 2);
        b3 = Math.Round(Convert.ToDecimal(TextBox36.Text), 2);
        b4 = Math.Round(Convert.ToDecimal(TextBox37.Text), 2);
        b5 = Math.Round(Convert.ToDecimal(TextBox16.Text), 2);
        b6 = Math.Round(Convert.ToDecimal(TextBox17.Text), 2);
        b7 = Math.Round(Convert.ToDecimal(TextBox18.Text), 2);
        b8 = Math.Round(Convert.ToDecimal(TextBox19.Text), 2);
        b9 = Math.Round(Convert.ToDecimal(TextBox20.Text), 2);
        b10 = Math.Round(Convert.ToDecimal(TextBox21.Text), 2);
        b11 = Math.Round(Convert.ToDecimal(TextBox22.Text), 2);
        b12 = Math.Round(Convert.ToDecimal(TextBox23.Text), 2);
        b13 = Math.Round(Convert.ToDecimal(TextBox24.Text), 2);
        b14 = Math.Round(Convert.ToDecimal(TextBox25.Text), 2);
        b15 = Math.Round(Convert.ToDecimal(TextBox26.Text), 2);
        b16 = Math.Round(Convert.ToDecimal(TextBox27.Text), 2);
        b17 = Math.Round(Convert.ToDecimal(TextBox28.Text), 2);
        b18 = Math.Round(Convert.ToDecimal(TextBox29.Text), 2);
        bnet = Math.Round(b1 + b3 + b5 + b7+b9+b11+b13+b15+b17,  2);
        bnet2 = Math.Round(b2 + b4 + b6 + b8+b10+b12+b14+b16+b18, 2);
        Label3.Text = bnet.ToString();
        Label4.Text = bnet2.ToString();


    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        cal();
        SqlDataSource1.InsertParameters["periodstart"].DefaultValue = DateTime.Parse(TextBox2.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.InsertParameters["periodend"].DefaultValue = DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.Insert();
        ClearFields(Form.Controls); 
    }
    public static void ClearFields(ControlCollection pageControls)
{
foreach (Control contl in pageControls)
{
string strCntName = (contl.GetType()).Name;
switch (strCntName)
{
case "TextBox":
TextBox tbSource = (TextBox)contl;
tbSource.Text ="";
break;

}
ClearFields(contl.Controls);
}
}
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        cal();
        TextBox32.Focus();
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        cal();
        TextBox32.Focus();
    }
}
