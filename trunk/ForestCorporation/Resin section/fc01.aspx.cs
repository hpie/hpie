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
using System.Data.SqlClient;

public partial class fc01 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        pn();
    }
    private void pn()
{
    
        
        DataView dv=(DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
        if (dv.Table.Rows.Count != 0)
        {
            Int32 rr = Convert.ToInt32(dv.Table.Rows[dv.Table.Rows.Count - 1][0]);
            rr++;
            Label3.Text = rr.ToString();
        }
        else
        {
            Label3.Text = "661".ToString();
        }
}
   
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        SqlDataSource1.InsertParameters["Date"].DefaultValue = DateTime.Parse(TextBox1.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
        SqlDataSource1.InsertParameters["Dated"].DefaultValue = DateTime.Parse(dt.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString();
       SqlDataSource1.InsertParameters["ResFWD"].DefaultValue = resin_u.SelectedItem.Text.ToString();
       SqlDataSource1.InsertParameters["ResUnit"].DefaultValue = DropDownList2.SelectedItem.Text.ToString();

     SqlDataSource1.Insert();
       Response.Redirect("pc01_report.aspx?code=" + Label3.Text);
    }
    protected void standard_l_weight_TextChanged(object sender, EventArgs e)
    {
        decimal g_w, tin, kgtoq, net;
        
        tin= Math.Round(Convert.ToDecimal(tins.Text) * Convert.ToDecimal(standard_l_weight.Text), 2);
         g_w= Convert.ToDecimal(gross_w_w_tin.Text);
       
        kgtoq = tin / 100;
        net = g_w - kgtoq;
        net_resin.Text = net.ToString();
        

    }

    [System.Web.Services.WebMethodAttribute(), System.Web.Script.Services.ScriptMethodAttribute()]
    public static string GetDynamicContent(string contextKey)
    {
        return default(string);
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Response.Redirect("pc01_report.aspx?code=" + DropDownList1.SelectedValue.ToString());

    }
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        Label1.Text = RadioButtonList1.SelectedValue.ToString();
        Label2.Text = RadioButtonList1.SelectedValue.ToString();
    }
    protected void gross_w_w_t_TextChanged(object sender, EventArgs e)
    {
        gross_w_w_tin.Text = Convert.ToDecimal(Convert.ToDecimal(gross_w_w_t.Text) - Convert.ToDecimal(empty_t_weight.Text)).ToString();
    }
    protected void gross_w_w_tin_TextChanged(object sender, EventArgs e)
    {

    }
    protected void empty_t_weight_TextChanged(object sender, EventArgs e)
    {
        gross_w_w_tin.Text = Convert.ToDecimal(Convert.ToDecimal(gross_w_w_t.Text) - Convert.ToDecimal(empty_t_weight.Text)).ToString();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {

    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlDataSource1.Delete();
        DropDownList1.DataBind();
    }
    protected void TextBox3_TextChanged(object sender, EventArgs e)
    {
        decimal a1 = Convert.ToDecimal(net_resin.Text);
        decimal a2 = Convert.ToDecimal(TextBox3.Text);

        TextBox4.Text = Math.Round((a1-a2), 2).ToString();
    }

    [System.Web.Services.WebMethodAttribute(), System.Web.Script.Services.ScriptMethodAttribute()]
    public static string[] GetCompletionList(string prefixText, int count, string contextKey)
    {
        SqlDataAdapter adp = new SqlDataAdapter("select *from fc01", ConfigurationManager.ConnectionStrings["ForestConnectionString"].ConnectionString);
        DataSet ds = new DataSet();
        adp.Fill(ds);
        string ss = "";
        if (ds.Tables[0].Rows.Count != 0)
        {
            for (Int32 j = 0; j < ds.Tables[0].Rows.Count; j++)
            {
                ss = ss + ds.Tables[0].Rows[j]["pvt_name"].ToString() + ",";
            }
        }
        string[] movies = ss.Substring(0, ss.Length - 1).Split(',');


        // Return matching movies  
        return (from m in movies where m.StartsWith(prefixText, StringComparison.CurrentCultureIgnoreCase) select m).Take(count).ToArray();
    
    }
}
