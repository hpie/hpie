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
using System.Web.UI.HtmlControls;
public partial class Laboratory_report : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack == false)
            bind();

    }
    private void bind()
    {
        if (Request.QueryString["code"] != "")
        {
            DataView dv = (DataView)(SqlDataSource1.Select(DataSourceSelectArguments.Empty));
            //Label55.Text =Convert.ToDateTime( dv.Table.Rows[0]["Preno1"]).ToString("ddMMyyyy");
            // Label56.Text = dv.Table.Rows[0]["SType"].ToString();
            // Label57.Text = dv.Table.Rows[0]["SType"].ToString();

           //  TextBox3.Text =Convert.ToDateTime(dv.Table.Rows[0]["date_fc03"]).ToString("dd/MM/yyyy");
            TextBox2.Text = dv.Table.Rows[0]["Impurity"].ToString();
           
            TextBox4.Text = dv.Table.Rows[0]["resunit"].ToString();

            TextBox5.Text = dv.Table.Rows[0]["name_lsm_name"].ToString();
            TextBox6.Text = dv.Table.Rows[0]["ChallanNo"].ToString();
            TextBox7.Text = dv.Table.Rows[0]["name_lsm_lot"].ToString();
            TextBox8.Text = dv.Table.Rows[0]["NoStype"].ToString();
            TextBox9.Text = dv.Table.Rows[0]["impwt"].ToString();

            TextBox10.Text = dv.Table.Rows[0]["Grosswetin"].ToString();
            TextBox11.Text = dv.Table.Rows[0]["NoSType"].ToString();
            TextBox12.Text = dv.Table.Rows[0]["netrws"].ToString();
            TextBox13.Text = dv.Table.Rows[0]["sakki_tin"].ToString();
            TextBox14.Text = dv.Table.Rows[0]["saaki_per"].ToString();
            TextBox16.Text = dv.Table.Rows[0]["remark"].ToString();
            TextBox18.Text = dv.Table.Rows[0]["net"].ToString();
            
            TextBox20.Text = dv.Table.Rows[0]["sakki_wt"].ToString();

            TextBox15.Text = dv.Table.Rows[0]["unit_div_fc03"].ToString();
            //Label68.Text = dv.Table.Rows[0]["water"].ToString();
            //Label69.Text = dv.Table.Rows[0]["impurity"].ToString();
            //Label70.Text = Math.Round(((Convert.ToDecimal(Label69.Text) * Convert.ToDecimal(TextBox12.Text)) / 100), 2).ToString();
            //Label71.Text = (Convert.ToDecimal(TextBox12.Text) - Convert.ToDecimal(Label70.Text)).ToString();
            //decimal ski_wt = Convert.ToDecimal(TextBox14.Text);
            //decimal net_resin_rec = Convert.ToDecimal(TextBox12.Text);
            //// ski_wt = Math.Round(net_resin_rec * ski_per / 100, 2);
            //decimal net_rec = Math.Round(net_resin_rec - ski_wt, 2);
            ////((Label)(e.Row.FindControl("Label61"))).Text = ski_wt.ToString();
            //Label67.Text = net_rec.ToString();
        }
    }
    protected void CancelButton_Click(object sender, EventArgs e)
    {
        Response.Redirect("fc02.aspx");
    }
    protected void Ok_Click(object sender, EventArgs e)
    {
        

    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        decimal per, wt, net;
        //GridViewRow gvRow = (GridViewRow)(((LinkButton)e.CommandSource).NamingContainer);
        per = Convert.ToDecimal(TextBox14.Text);
        wt = Convert.ToDecimal(TextBox12.Text);
        net = Math.Round(((wt * per) / 100), 2);
        TextBox20.Text = net.ToString();
    }
    protected void jk_Click(object sender, EventArgs e)
    {
        decimal per, wt, net;
       // GridViewRow gvRow = (GridViewRow)(((LinkButton)e.CommandSource).NamingContainer);
        per = Convert.ToDecimal(TextBox2.Text);
        net = Math.Round(((Convert.ToDecimal(TextBox12.Text) * per) / 100), 2);
       
        TextBox9.Text = net.ToString();
        wt = ((Convert.ToDecimal(TextBox12.Text) - Convert.ToDecimal(TextBox20.Text)) - Convert.ToDecimal(TextBox9.Text));
        
        TextBox18.Text = (wt).ToString();
           

    }
    protected void Ok_Click1(object sender, EventArgs e)
    {
        Int32 lotno, tindrum, pre;
        decimal g_w_tins_drums, wt_tin_drum, net_wt_resin_ski, ski_wt, per_ski;
        string nm_res, nm_lsm, unit_div, challan, remark;
        DateTime dt;
        pre = Convert.ToInt32(Request.QueryString["code"]);
        DateTime no = Convert.ToDateTime(DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());
        //lotno = Convert.ToInt32(((TextBox)(GridView1.Rows[e.RowIndex].FindControl("TextBox7"))).Text);
        string unit = TextBox4.Text;
        // g_w_tins_drums = Convert.ToDecimal(((Label)(GridView1.Rows[e.RowIndex].FindControl("TextBox10"))).Text);
        wt_tin_drum = Convert.ToDecimal(TextBox11.Text);
        net_wt_resin_ski = Convert.ToDecimal(TextBox12.Text);



        ski_wt = Convert.ToDecimal(TextBox13.Text);
        per_ski = Convert.ToDecimal(TextBox14.Text);
        decimal net5;
        net5 = Math.Round(net_wt_resin_ski / 100 * per_ski, 2);



        dt = Convert.ToDateTime(DateTime.Parse(TextBox3.Text.ToString(), System.Globalization.CultureInfo.CreateSpecificCulture("en-CA")).ToString());

        nm_res = TextBox4.Text;
        nm_lsm = TextBox5.Text;
        unit_div = TextBox15.Text;
        remark = TextBox16.Text;
        decimal imp = Convert.ToDecimal(TextBox2.Text);
        decimal imp1 = Convert.ToDecimal(TextBox9.Text);
        decimal imp2 = Convert.ToDecimal(TextBox18.Text);
        decimal imp3 = Convert.ToDecimal(TextBox20.Text);

        SqlDataSource1.UpdateParameters["no_fc03"].DefaultValue = no.ToString();
        SqlDataSource1.UpdateParameters["date_fc03"].DefaultValue = dt.ToString();
        SqlDataSource1.UpdateParameters["wt_of_tin_fc03"].DefaultValue = wt_tin_drum.ToString();
        SqlDataSource1.UpdateParameters["sakki_wt_fc03"].DefaultValue = net5.ToString();
        SqlDataSource1.UpdateParameters["saaki_per"].DefaultValue = per_ski.ToString();
        SqlDataSource1.UpdateParameters["name_lsm_name"].DefaultValue = nm_lsm.ToString();
        SqlDataSource1.UpdateParameters["name_lsm_lot"].DefaultValue = TextBox7.Text.ToString();
        SqlDataSource1.UpdateParameters["unit_div_fc03"].DefaultValue = unit_div.ToString();
        SqlDataSource1.UpdateParameters["remark"].DefaultValue = remark.ToString();
        SqlDataSource1.UpdateParameters["PreNo"].DefaultValue = pre.ToString();
        SqlDataSource1.UpdateParameters["PreNo1"].DefaultValue = no.ToString();
        SqlDataSource1.UpdateParameters["sakki_tin"].DefaultValue = ski_wt.ToString();
        SqlDataSource1.UpdateParameters["resunit"].DefaultValue = unit.ToString();

        SqlDataSource1.UpdateParameters["Impurity"].DefaultValue = imp.ToString();
        SqlDataSource1.UpdateParameters["Impwt"].DefaultValue = imp1.ToString();
        SqlDataSource1.UpdateParameters["net"].DefaultValue = imp2.ToString();
        SqlDataSource1.UpdateParameters["sakki_wt"].DefaultValue = imp3.ToString();

       SqlDataSource1.Update();
       Response.Redirect("fc02.aspx");
    }
}